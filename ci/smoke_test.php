<?php
// SDK smoke test -- validates build-from-source and API integration using the SDK client.

$apiKey = getenv('MAILODDS_TEST_KEY');
if (!$apiKey) { echo "ERROR: MAILODDS_TEST_KEY not set\n"; exit(1); }

require_once __DIR__ . '/../vendor/autoload.php';

use MailOdds\Configuration;
use MailOdds\ApiException;
use MailOdds\Api\EmailValidationApi;
use MailOdds\Api\BulkValidationApi;
use MailOdds\Api\SuppressionListsApi;
use MailOdds\Api\ValidationPoliciesApi;
use MailOdds\Api\SystemApi;
use MailOdds\Api\SendingDomainsApi;
use MailOdds\Api\SubscriberListsApi;
use MailOdds\Api\EmailSendingApi;
use MailOdds\Model\ValidateRequest;
use MailOdds\Model\CreateJobRequest;
use MailOdds\Model\AddSuppressionRequest;
use MailOdds\Model\AddSuppressionRequestEntriesInner;
use MailOdds\Model\CheckSuppressionRequest;
use MailOdds\Model\RemoveSuppressionRequest;
use MailOdds\Model\CreatePolicyFromPresetRequest;
use MailOdds\Model\CreateSendingDomainRequest;
use MailOdds\Model\CreateListRequest;
use MailOdds\Model\SubscribeRequest;

$config = Configuration::getDefaultConfiguration();
$config->setAccessToken($apiKey);
$config->setHost('https://api.mailodds.com');

$passed = 0;
$failed = 0;

function check($label, $expected, $actual) {
    global $passed, $failed;
    if ($expected === $actual) { $passed++; }
    else { $failed++; echo "  FAIL: $label expected=$expected got=$actual\n"; }
}

$ts = (string)time();

// -------------------------------------------------------------------------
// 1. Email Validation
// -------------------------------------------------------------------------
echo "--- Email Validation ---\n";

$api = new EmailValidationApi(new GuzzleHttp\Client(), $config);

$cases = [
    ['test@deliverable.mailodds.com', 'valid', 'accept', null, false, false, false, true, 'enhanced'],
    ['test@invalid.mailodds.com', 'invalid', 'reject', 'smtp_rejected', false, false, false, true, 'enhanced'],
    ['test@risky.mailodds.com', 'catch_all', 'accept_with_caution', 'catch_all_detected', false, false, false, true, 'enhanced'],
    ['test@disposable.mailodds.com', 'do_not_mail', 'reject', 'disposable', false, true, false, true, 'enhanced'],
    ['test@role.mailodds.com', 'do_not_mail', 'reject', 'role_account', false, false, true, true, 'enhanced'],
    ['test@timeout.mailodds.com', 'unknown', 'retry_later', 'smtp_unreachable', false, false, false, true, 'enhanced'],
    ['test@freeprovider.mailodds.com', 'valid', 'accept', null, true, false, false, true, 'enhanced'],
];

foreach ($cases as [$email, $expStatus, $expAction, $expSub, $expFree, $expDisp, $expRole, $expMx, $expDepth]) {
    $domain = explode('.', explode('@', $email)[1])[0];
    try {
        $req = new ValidateRequest(['email' => $email]);
        $resp = $api->validateEmail($req);
        check("$domain.status", $expStatus, $resp->getStatus());
        check("$domain.action", $expAction, $resp->getAction());
        check("$domain.sub_status", $expSub, $resp->getSubStatus());
        check("$domain.free_provider", $expFree, $resp->getFreeProvider());
        check("$domain.disposable", $expDisp, $resp->getDisposable());
        check("$domain.role_account", $expRole, $resp->getRoleAccount());
        check("$domain.mx_found", $expMx, $resp->getMxFound());
        check("$domain.depth", $expDepth, $resp->getDepth());
        if (!$resp->getProcessedAt()) {
            $failed++;
            echo "  FAIL: $domain.processed_at is empty\n";
        } else {
            $passed++;
        }
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: $domain " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
}

// Error handling: 401 with bad key
try {
    $badConfig = clone $config;
    $badConfig->setAccessToken('invalid_key');
    $badApi = new EmailValidationApi(new GuzzleHttp\Client(), $badConfig);
    $badApi->validateEmail(new ValidateRequest(['email' => 'test@deliverable.mailodds.com']));
    $failed++;
    echo "  FAIL: error.401 no exception raised\n";
} catch (ApiException $e) {
    check('error.401', 401, $e->getCode());
}

// Error handling: 400/422 with missing email
try {
    $api->validateEmail(new ValidateRequest(['email' => '']));
    $failed++;
    echo "  FAIL: error.400 no exception raised\n";
} catch (ApiException $e) {
    if ($e->getCode() === 400 || $e->getCode() === 422) { $passed++; }
    else { $failed++; echo "  FAIL: error.400 expected=400|422 got=" . $e->getCode() . "\n"; }
}

// -------------------------------------------------------------------------
// 2. Bulk Validation
// -------------------------------------------------------------------------
echo "--- Bulk Validation ---\n";

$bulkApi = new BulkValidationApi(new GuzzleHttp\Client(), $config);

try {
    $jobReq = new CreateJobRequest(['emails' => ['test@deliverable.mailodds.com']]);
    $jobResp = $bulkApi->createJob($jobReq);
    $job = $jobResp->getJob();
    $jobId = $job->getId();

    if (str_starts_with($jobId, 'job_')) {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: bulk.job_id_prefix expected=job_ got=$jobId\n";
    }
    check('bulk.status', 'pending', $job->getStatus());

    // Get job
    try {
        $getResp = $bulkApi->getJob($jobId);
        $getJob = $getResp->getJob();
        check('bulk.get.id', $jobId, $getJob->getId());
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: bulk.get " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Delete job
    try {
        $delResp = $bulkApi->deleteJob($jobId);
        check('bulk.delete.deleted', true, $delResp->getDeleted());
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: bulk.delete " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: bulk.create " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// -------------------------------------------------------------------------
// 3. Suppression Lists
// -------------------------------------------------------------------------
echo "--- Suppression Lists ---\n";

$suppApi = new SuppressionListsApi(new GuzzleHttp\Client(), $config);
$testEmail = "smoketest-$ts@example.com";

try {
    // Add suppression
    $entry = new AddSuppressionRequestEntriesInner(['type' => 'email', 'value' => $testEmail]);
    $addReq = new AddSuppressionRequest(['entries' => [$entry]]);
    $addResp = $suppApi->addSuppression($addReq);
    if ($addResp->getAdded() >= 1) {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: suppression.add.added expected>=1 got=" . $addResp->getAdded() . "\n";
    }

    // Check suppression
    try {
        $checkReq = new CheckSuppressionRequest(['email' => $testEmail]);
        $checkResp = $suppApi->checkSuppression($checkReq);
        check('suppression.check.suppressed', true, $checkResp->getSuppressed());
        check('suppression.check.email', $testEmail, $checkResp->getEmail());
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: suppression.check " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Suppression stats
    try {
        $statsResp = $suppApi->getSuppressionStats();
        if ($statsResp->getTotal() !== null) {
            $passed++;
        } else {
            $failed++;
            echo "  FAIL: suppression.stats.total is null\n";
        }
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: suppression.stats " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Remove suppression (cleanup)
    try {
        $removeReq = new RemoveSuppressionRequest(['entries' => [$testEmail]]);
        $removeResp = $suppApi->removeSuppression($removeReq);
        if ($removeResp->getRemoved() >= 1) {
            $passed++;
        } else {
            $failed++;
            echo "  FAIL: suppression.remove.removed expected>=1 got=" . $removeResp->getRemoved() . "\n";
        }
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: suppression.remove " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: suppression.add " . get_class($e) . ": " . $e->getMessage() . "\n";
    // Attempt cleanup even if add failed
    try {
        $removeReq = new RemoveSuppressionRequest(['entries' => [$testEmail]]);
        $suppApi->removeSuppression($removeReq);
    } catch (Exception $ignored) {}
}

// -------------------------------------------------------------------------
// 4. Validation Policies
// -------------------------------------------------------------------------
echo "--- Validation Policies ---\n";

$polApi = new ValidationPoliciesApi(new GuzzleHttp\Client(), $config);

// Cleanup leftover smoke policies (free plan allows only 1)
try {
    $existingPolicies = $polApi->listPolicies();
    foreach ($existingPolicies->getPolicies() ?? [] as $p) {
        if ($p->getName() && str_starts_with($p->getName(), 'smoke')) {
            try { $polApi->deletePolicy($p->getId()); } catch (Exception $e) {}
        }
    }
} catch (Exception $e) {}

try {
    // Get presets
    $presetsResp = $polApi->getPolicyPresets();
    $presets = $presetsResp->getPresets();
    if (count($presets) > 0) {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: policies.presets.count expected>0 got=0\n";
    }

    // Create policy from first preset
    if (count($presets) > 0) {
        $presetId = $presets[0]->getId();
        $policyName = "php-smoke-$ts";

        try {
            $createPolReq = new CreatePolicyFromPresetRequest([
                'preset_id' => $presetId,
                'name' => $policyName,
            ]);
            $policyResp = $polApi->createPolicyFromPreset($createPolReq);
            $policy = $policyResp->getPolicy();
            $policyId = $policy->getId();
            check('policies.create.name', $policyName, $policy->getName());

            // Delete policy (cleanup)
            try {
                $delPolResp = $polApi->deletePolicy($policyId);
                check('policies.delete.deleted', true, $delPolResp->getDeleted());
            } catch (Exception $e) {
                $failed++;
                echo "  FAIL: policies.delete " . get_class($e) . ": " . $e->getMessage() . "\n";
            }
        } catch (Exception $e) {
            $failed++;
            echo "  FAIL: policies.create " . get_class($e) . ": " . $e->getMessage() . "\n";
        }
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: policies.presets " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// -------------------------------------------------------------------------
// 5. System
// -------------------------------------------------------------------------
echo "--- System ---\n";

// Health check (no auth required)
$noAuthConfig = clone $config;
$noAuthConfig->setAccessToken('');
$noAuthSysApi = new SystemApi(new GuzzleHttp\Client(), $noAuthConfig);

try {
    $healthResp = $noAuthSysApi->healthCheck();
    check('system.health.status', 'healthy', $healthResp->getStatus());
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: system.health " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// Telemetry summary (requires auth)
$sysApi = new SystemApi(new GuzzleHttp\Client(), $config);

try {
    $telResp = $sysApi->getTelemetrySummary();
    if ($telResp !== null) {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: system.telemetry response is null\n";
    }
    $window = $telResp->getWindow();
    if ($window !== null && $window !== '') {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: system.telemetry.window expected non-empty\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: system.telemetry " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// -------------------------------------------------------------------------
// 6. Sending Domains
// -------------------------------------------------------------------------
echo "--- Sending Domains ---\n";

$domApi = new SendingDomainsApi(new GuzzleHttp\Client(), $config);

// List sending domains
try {
    $listDomainsResp = $domApi->listSendingDomains();
    $domains = $listDomainsResp->getDomains();
    if (is_array($domains)) {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: sending.list.domains expected array\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: sending.list " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// Create sending domain
$smokeDomain = "php-smoke-$ts.example.com";
try {
    $createDomReq = new CreateSendingDomainRequest(['domain' => $smokeDomain]);
    $createDomResp = $domApi->createSendingDomain($createDomReq);
    $domain = $createDomResp->getDomain();
    $domainId = $domain->getId();

    if ($domainId !== null && $domainId !== '') {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: sending.create.id expected non-empty\n";
    }
    check('sending.create.domain', $smokeDomain, $domain->getDomain());

    // Delete sending domain (cleanup)
    try {
        $delDomResp = $domApi->deleteSendingDomain($domainId);
        check('sending.delete.deleted', true, $delDomResp->getDeleted());
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: sending.delete " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: sending.create " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// -------------------------------------------------------------------------
// 7. Subscriber Lists
// -------------------------------------------------------------------------
echo "--- Subscriber Lists ---\n";

$listsApi = new SubscriberListsApi(new GuzzleHttp\Client(), $config);

$listName = "php-smoke-$ts";
try {
    // Create list
    $createListReq = new CreateListRequest(['name' => $listName]);
    $createListResp = $listsApi->createList($createListReq);
    $list = $createListResp->getList();
    $listId = $list->getId();

    if ($listId !== null && $listId !== '') {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: subscribers.create.id expected non-empty\n";
    }
    check('subscribers.create.name', $listName, $list->getName());

    // Get lists
    try {
        $getListsResp = $listsApi->getLists();
        $lists = $getListsResp->getLists();
        if (count($lists) > 0) {
            $passed++;
        } else {
            $failed++;
            echo "  FAIL: subscribers.get_lists.count expected>0 got=0\n";
        }
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: subscribers.get_lists " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Subscribe
    $subEmail = "php-smoke-$ts@example.com";
    try {
        $subReq = new SubscribeRequest(['email' => $subEmail]);
        $subResp = $listsApi->subscribe($listId, $subReq);
        $subscriber = $subResp->getSubscriber();
        if ($subscriber->getId() !== null && $subscriber->getId() !== '') {
            $passed++;
        } else {
            $failed++;
            echo "  FAIL: subscribers.subscribe.id expected non-empty\n";
        }
        check('subscribers.subscribe.email', $subEmail, $subscriber->getEmail());
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: subscribers.subscribe " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Delete list (cleanup)
    try {
        $delListResp = $listsApi->deleteList($listId);
        check('subscribers.delete.deleted', true, $delListResp->getDeleted());
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: subscribers.delete " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: subscribers.create " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// -------------------------------------------------------------------------
// 8. Email Sending (import-only verification)
// -------------------------------------------------------------------------
echo "--- Email Sending ---\n";

$sendingApi = new EmailSendingApi(new GuzzleHttp\Client(), $config);
check('sending.class_exists', true, method_exists($sendingApi, 'deliverEmail'));
check('sending.batch_exists', true, method_exists($sendingApi, 'deliverBatch'));

// -------------------------------------------------------------------------
// Summary
// -------------------------------------------------------------------------
$total = $passed + $failed;
$result = $failed === 0 ? 'PASS' : 'FAIL';
echo "\n$result: PHP SDK ($passed/$total)\n";
exit($failed === 0 ? 0 : 1);
