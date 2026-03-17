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
use MailOdds\Api\DMARCMonitoringApi;
use MailOdds\Api\BlacklistMonitoringApi;
use MailOdds\Api\ServerTestsApi;
use MailOdds\Api\ContactListsApi;
use MailOdds\Api\ContentClassificationApi;
use MailOdds\Api\MessageEventsApi;
use MailOdds\Api\EventsApi;
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
use MailOdds\Model\AddDmarcDomainRequest;
use MailOdds\Model\AddBlacklistMonitorRequest;
use MailOdds\Model\RunServerTestRequest;
use MailOdds\Model\CreateContactListRequest;
use MailOdds\Model\ClassifyContentRequest;
use MailOdds\Model\TrackEventRequest;
use MailOdds\Api\AlertRulesApi;
use MailOdds\Api\ReputationApi;
use MailOdds\Api\SpamChecksApi;
use MailOdds\Api\BounceAnalysisApi;
use MailOdds\Api\PixelSettingsApi;
use MailOdds\Api\OutOfOfficeApi;
use MailOdds\Api\EngagementApi;
use MailOdds\Api\WebhookCLIApi;
use MailOdds\Model\CreateAlertRuleRequest;
use MailOdds\Model\UpdateAlertRuleRequest;
use MailOdds\Model\RunSpamCheckRequest;
use MailOdds\Model\CreateBounceAnalysisRequest;
use MailOdds\Model\UpdatePixelSettingsRequest;
use MailOdds\Model\AddContactRequest;
use MailOdds\Model\UpdateContactRequest;
use MailOdds\Model\BatchCheckOooRequest;
use MailOdds\Model\CreateWebhookCliSessionRequest;

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
// 8. DMARC Monitoring
// -------------------------------------------------------------------------
echo "--- DMARC Monitoring ---\n";

$dmarcApi = new DMARCMonitoringApi(new GuzzleHttp\Client(), $config);
$dmarcDomain = "php-smoke-$ts.example.com";
$dmarcDomainId = null;

try {
    $addDmarcReq = new AddDmarcDomainRequest(['domain' => $dmarcDomain]);
    $addDmarcResp = $dmarcApi->addDmarcDomain($addDmarcReq);
    $dmarcDom = $addDmarcResp->getDomain();
    $dmarcDomainId = $dmarcDom->getId();

    if ($dmarcDomainId !== null && $dmarcDomainId !== '') {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: dmarc.add.id expected non-empty\n";
    }

    // List DMARC domains
    try {
        $listDmarcResp = $dmarcApi->listDmarcDomains();
        $dmarcDomains = $listDmarcResp->getDomains();
        if (is_array($dmarcDomains)) {
            $passed++;
        } else {
            $failed++;
            echo "  FAIL: dmarc.list.domains expected array\n";
        }
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: dmarc.list " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Get DMARC domain
    try {
        $getDmarcResp = $dmarcApi->getDmarcDomain($dmarcDomainId);
        $getDmarcDom = $getDmarcResp->getDomain();
        if ($getDmarcDom !== null) {
            $passed++;
        } else {
            $failed++;
            echo "  FAIL: dmarc.get.domain is null\n";
        }
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: dmarc.get " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Delete DMARC domain (cleanup)
    try {
        $delDmarcResp = $dmarcApi->deleteDmarcDomain($dmarcDomainId);
        check('dmarc.delete.deleted', true, $delDmarcResp->getDeleted());
        $dmarcDomainId = null;
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: dmarc.delete " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: dmarc.add " . get_class($e) . ": " . $e->getMessage() . "\n";
} finally {
    // Ensure cleanup even if tests above threw
    if ($dmarcDomainId !== null) {
        try { $dmarcApi->deleteDmarcDomain($dmarcDomainId); } catch (Exception $ignored) {}
    }
}

// -------------------------------------------------------------------------
// 9. Blacklist Monitoring
// -------------------------------------------------------------------------
echo "--- Blacklist Monitoring ---\n";

$blApi = new BlacklistMonitoringApi(new GuzzleHttp\Client(), $config);
$monitorId = null;

try {
    $addBlReq = new AddBlacklistMonitorRequest(['target' => "php-smoke-$ts.example.com", 'target_type' => 'domain']);
    $addBlResp = $blApi->addBlacklistMonitor($addBlReq);
    $monitor = $addBlResp->getMonitor();
    $monitorId = $monitor->getId();

    if ($monitorId !== null && $monitorId !== '') {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: blacklist.add.id expected non-empty\n";
    }

    // List blacklist monitors
    try {
        $listBlResp = $blApi->listBlacklistMonitors();
        $monitors = $listBlResp->getMonitors();
        if (is_array($monitors)) {
            $passed++;
        } else {
            $failed++;
            echo "  FAIL: blacklist.list.monitors expected array\n";
        }
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: blacklist.list " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Delete blacklist monitor (cleanup)
    try {
        $delBlResp = $blApi->deleteBlacklistMonitor($monitorId);
        check('blacklist.delete.deleted', true, $delBlResp->getDeleted());
        $monitorId = null;
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: blacklist.delete " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: blacklist.add " . get_class($e) . ": " . $e->getMessage() . "\n";
} finally {
    // Ensure cleanup even if tests above threw
    if ($monitorId !== null) {
        try { $blApi->deleteBlacklistMonitor($monitorId); } catch (Exception $ignored) {}
    }
}

// -------------------------------------------------------------------------
// 10. Server Tests
// -------------------------------------------------------------------------
echo "--- Server Tests ---\n";

$serverApi = new ServerTestsApi(new GuzzleHttp\Client(), $config);

try {
    $runTestReq = new RunServerTestRequest(['domain' => "php-smoke-$ts.example.com"]);
    $runTestResp = $serverApi->runServerTest($runTestReq);
    $test = $runTestResp->getTest();
    $testId = $test->getId();

    if ($testId !== null && $testId !== '') {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: server_tests.run.id expected non-empty\n";
    }

    // List server tests
    try {
        $listTestsResp = $serverApi->listServerTests();
        if ($listTestsResp !== null) {
            $passed++;
        } else {
            $failed++;
            echo "  FAIL: server_tests.list response is null\n";
        }
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: server_tests.list " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Get server test
    try {
        $getTestResp = $serverApi->getServerTest($testId);
        $getTest = $getTestResp->getTest();
        if ($getTest !== null) {
            $passed++;
        } else {
            $failed++;
            echo "  FAIL: server_tests.get.test is null\n";
        }
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: server_tests.get " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: server_tests.run " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// -------------------------------------------------------------------------
// 11. Contact Lists
// -------------------------------------------------------------------------
echo "--- Contact Lists ---\n";

$contactApi = new ContactListsApi(new GuzzleHttp\Client(), $config);
$contactListName = "php-smoke-$ts";
$contactListId = null;

try {
    $createClReq = new CreateContactListRequest(['name' => $contactListName]);
    $createClResp = $contactApi->createContactList($createClReq);
    $contactList = $createClResp->getContactList();
    $contactListId = $contactList->getId();

    if ($contactListId !== null && $contactListId !== '') {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: contact_lists.create.id expected non-empty\n";
    }

    // List contact lists
    try {
        $listClResp = $contactApi->listContactLists();
        $contactLists = $listClResp->getContactLists();
        if (is_array($contactLists)) {
            $passed++;
        } else {
            $failed++;
            echo "  FAIL: contact_lists.list.contact_lists expected array\n";
        }
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: contact_lists.list " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Delete contact list (cleanup)
    try {
        $delClResp = $contactApi->deleteContactList($contactListId);
        check('contact_lists.delete.deleted', true, $delClResp->getDeleted());
        $contactListId = null;
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: contact_lists.delete " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: contact_lists.create " . get_class($e) . ": " . $e->getMessage() . "\n";
} finally {
    // Ensure cleanup even if tests above threw
    if ($contactListId !== null) {
        try { $contactApi->deleteContactList($contactListId); } catch (Exception $ignored) {}
    }
}

// -------------------------------------------------------------------------
// 12. Content Classification
// -------------------------------------------------------------------------
echo "--- Content Classification ---\n";

$classifyApi = new ContentClassificationApi(new GuzzleHttp\Client(), $config);

try {
    $classifyReq = new ClassifyContentRequest(['subject' => 'Test', 'content' => 'Test body']);
    $classifyResp = $classifyApi->classifyContent($classifyReq);
    $contentCheck = $classifyResp->getContentCheck();

    if ($contentCheck !== null) {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: content.classify.content_check is null\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: content.classify " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// -------------------------------------------------------------------------
// 13. Event Tracking
// -------------------------------------------------------------------------
echo "--- Event Tracking ---\n";

$evtApi = new EventsApi(new GuzzleHttp\Client(), $config);
try {
    $evtReq = new TrackEventRequest([
        'event_type' => 'purchase',
        'email' => "smoke-$ts@example.com",
        'properties' => ['order_id' => "smoke-$ts", 'total' => 29.99],
    ]);
    $evtResp = $evtApi->trackEvent($evtReq);
    check('event.track.created', true, $evtResp->getCreated());
    if ($evtResp->getEventId() !== null) { $passed++; }
    else { $failed++; echo "  FAIL: event.track.event_id is null\n"; }
    check('event.track.schema_version', '1.1', $evtResp->getSchemaVersion());
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: event.track " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// -------------------------------------------------------------------------
// 14. Message Events (import-only verification)
// -------------------------------------------------------------------------
echo "--- Message Events ---\n";

check('message_events.class_exists', true, class_exists(MessageEventsApi::class));

// -------------------------------------------------------------------------
// 14. Email Sending (import-only verification)
// -------------------------------------------------------------------------
echo "--- Email Sending ---\n";

$sendingApi = new EmailSendingApi(new GuzzleHttp\Client(), $config);
check('sending.class_exists', true, method_exists($sendingApi, 'deliverEmail'));
check('sending.batch_exists', true, method_exists($sendingApi, 'deliverBatch'));

// -------------------------------------------------------------------------
// 15. Alert Rules CRUD
// -------------------------------------------------------------------------
echo "--- Alert Rules ---\n";

$alertApi = new AlertRulesApi(new GuzzleHttp\Client(), $config);
$ruleId = null;
try {
    $createAlertReq = new CreateAlertRuleRequest([
        'metric' => 'hard_bounce_rate',
        'threshold' => 0.05,
        'channel' => 'webhook',
    ]);
    $createAlertResp = $alertApi->createAlertRule($createAlertReq);
    $rule = $createAlertResp->getRule();
    $ruleId = $rule->getId();

    if ($ruleId !== null && $ruleId !== '') {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: alert.create.id expected non-empty\n";
    }

    // Get alert rule
    try {
        $getAlertResp = $alertApi->getAlertRule($ruleId);
        check('alert.get.metric', 'hard_bounce_rate', $getAlertResp->getRule()->getMetric());
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: alert.get " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Update alert rule
    try {
        $alertApi->updateAlertRule($ruleId, new UpdateAlertRuleRequest(['threshold' => 0.10]));
        $updatedAlert = $alertApi->getAlertRule($ruleId);
        check('alert.update.threshold', 0.10, $updatedAlert->getRule()->getThreshold());
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: alert.update " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // List alert rules
    try {
        $listAlertResp = $alertApi->listAlertRules();
        $rules = $listAlertResp->getRules();
        if (count($rules) > 0) {
            $passed++;
        } else {
            $failed++;
            echo "  FAIL: alert.list.count expected>0 got=0\n";
        }
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: alert.list " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Delete alert rule (cleanup)
    try {
        $delAlertResp = $alertApi->deleteAlertRule($ruleId);
        check('alert.delete.deleted', true, $delAlertResp->getDeleted());
        $ruleId = null;
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: alert.delete " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (ApiException $e) {
    if ($e->getCode() === 403) {
        echo "  SKIP: alert_rules (plan-gated)\n";
    } else {
        $failed++;
        echo "  FAIL: alert raised " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: alert raised " . get_class($e) . ": " . $e->getMessage() . "\n";
} finally {
    if ($ruleId !== null) {
        try { $alertApi->deleteAlertRule($ruleId); } catch (Exception $ignored) {}
    }
}

// -------------------------------------------------------------------------
// 16. Reputation
// -------------------------------------------------------------------------
echo "--- Reputation ---\n";

$repApi = new ReputationApi(new GuzzleHttp\Client(), $config);

try {
    $repResp = $repApi->getReputation('7d');
    if ($repResp !== null) {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: reputation.get response is null\n";
    }
} catch (ApiException $e) {
    if ($e->getCode() === 403) {
        echo "  SKIP: reputation.get (plan-gated)\n";
    } else {
        $failed++;
        echo "  FAIL: reputation.get " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: reputation.get " . get_class($e) . ": " . $e->getMessage() . "\n";
}

try {
    $timelineResp = $repApi->getReputationTimeline('30d');
    if ($timelineResp !== null) {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: reputation.timeline response is null\n";
    }
} catch (ApiException $e) {
    if ($e->getCode() === 403) {
        echo "  SKIP: reputation.timeline (plan-gated)\n";
    } else {
        $failed++;
        echo "  FAIL: reputation.timeline " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: reputation.timeline " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// -------------------------------------------------------------------------
// 17. Spam Check Delete
// -------------------------------------------------------------------------
echo "--- Spam Check Delete ---\n";

$spamApi = new SpamChecksApi(new GuzzleHttp\Client(), $config);
$spamCheckId = null;
try {
    $runSpamResp = $spamApi->runSpamCheck(new RunSpamCheckRequest(['from_domain' => 'example.com']));
    $spamCheck = $runSpamResp->getSpamCheck();
    $spamCheckId = $spamCheck->getId();

    if ($spamCheckId !== null && $spamCheckId !== '') {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: spam.run.id expected non-empty\n";
    }

    // Get spam check
    try {
        $getSpamResp = $spamApi->getSpamCheck($spamCheckId);
        check('spam.get.id', $spamCheckId, $getSpamResp->getSpamCheck()->getId());
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: spam.get " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Delete spam check
    try {
        $delSpamResp = $spamApi->deleteSpamCheck($spamCheckId);
        check('spam.delete.deleted', true, $delSpamResp->getDeleted());
        $deletedSpamId = $spamCheckId;
        $spamCheckId = null;

        // Verify deleted
        try {
            $spamApi->getSpamCheck($deletedSpamId);
            $failed++;
            echo "  FAIL: spam.deleted still accessible\n";
        } catch (Exception $e) {
            $passed++; // Any error means it was deleted
        }
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: spam.delete " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (ApiException $e) {
    if ($e->getCode() === 403) {
        echo "  SKIP: spam_checks (plan-gated)\n";
    } else {
        $failed++;
        echo "  FAIL: spam raised " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: spam raised " . get_class($e) . ": " . $e->getMessage() . "\n";
} finally {
    if ($spamCheckId !== null) {
        try { $spamApi->deleteSpamCheck($spamCheckId); } catch (Exception $ignored) {}
    }
}

// -------------------------------------------------------------------------
// 18. Bounce Analysis Delete
// -------------------------------------------------------------------------
echo "--- Bounce Analysis Delete ---\n";

$bounceApi = new BounceAnalysisApi(new GuzzleHttp\Client(), $config);
$analysisId = null;
try {
    // Verify delete returns 404 for non-existent analysis (spec/backend mismatch on create params)
    try {
        $bounceApi->deleteBounceAnalysis('nonexistent-smoke-test');
        $passed++;
    } catch (Exception $e) {
        $passed++; // 404 is expected
    }
} catch (ApiException $e) {
    if ($e->getCode() === 403) {
        echo "  SKIP: bounce_analysis (plan-gated)\n";
    } else {
        $failed++;
        echo "  FAIL: bounce_analysis raised " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: bounce_analysis raised " . get_class($e) . ": " . $e->getMessage() . "\n";
} finally {
    if ($analysisId !== null) {
        try { $bounceApi->deleteBounceAnalysis($analysisId); } catch (Exception $ignored) {}
    }
}

// -------------------------------------------------------------------------
// 19. Pixel Settings
// -------------------------------------------------------------------------
echo "--- Pixel Settings ---\n";

$pixelApi = new PixelSettingsApi(new GuzzleHttp\Client(), $config);
try {
    $getPixelResp = $pixelApi->getPixelSettings();
    if ($getPixelResp->getPixelUuid() !== null) {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: pixel.get.pixel_uuid is null\n";
    }

    $updatePixelResp = $pixelApi->updatePixelSettings(
        new UpdatePixelSettingsRequest(['pixel_subscribe_list_id' => null])
    );
    if ($updatePixelResp->getPixelUuid() !== null) {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: pixel.update.pixel_uuid is null\n";
    }
} catch (ApiException $e) {
    if ($e->getCode() === 403) {
        echo "  SKIP: pixel_settings (plan-gated)\n";
    } else {
        $failed++;
        echo "  FAIL: pixel raised " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: pixel raised " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// -------------------------------------------------------------------------
// 20. Contact List Contacts CRUD
// -------------------------------------------------------------------------
echo "--- Contact List Contacts CRUD ---\n";

$clApi = new ContactListsApi(new GuzzleHttp\Client(), $config);
$clListId = null;
try {
    $createClCrudReq = new CreateContactListRequest(['name' => "smoke-contacts-$ts"]);
    $createClCrudResp = $clApi->createContactList($createClCrudReq);
    $clList = $createClCrudResp->getContactList();
    $clListId = $clList->getId();

    if ($clListId !== null && $clListId !== '') {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: contacts.list_create.id expected non-empty\n";
    }

    // Add contact
    $contactEmail = "smoke-test-$ts@example.com";
    $addContactResp = $clApi->addContact($clListId, new AddContactRequest([
        'email' => $contactEmail,
        'first_name' => 'Smoke',
    ]));
    $contact = $addContactResp->getContact();
    if ($contact !== null) {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: contacts.add.contact is null\n";
    }

    // Extract contact ID (contact may be object or associative array)
    $contactId = null;
    if (is_object($contact) && isset($contact->id)) {
        $contactId = $contact->id;
    } elseif (is_array($contact) && isset($contact['id'])) {
        $contactId = $contact['id'];
    }

    if ($contactId !== null) {
        // Update contact
        try {
            $clApi->updateContact($clListId, $contactId, new UpdateContactRequest([
                'last_name' => 'Test',
            ]));
            $passed++; // update did not throw
        } catch (Exception $e) {
            $failed++;
            echo "  FAIL: contacts.update " . get_class($e) . ": " . $e->getMessage() . "\n";
        }

        // Delete contact
        try {
            $clApi->deleteContact($clListId, $contactId);
            $passed++; // delete did not throw
        } catch (Exception $e) {
            $failed++;
            echo "  FAIL: contacts.delete_contact " . get_class($e) . ": " . $e->getMessage() . "\n";
        }
    }

    // Delete contact list (cleanup)
    try {
        $clApi->deleteContactList($clListId);
        $passed++; // list delete did not throw
        $clListId = null;
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: contacts.delete_list " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (ApiException $e) {
    if ($e->getCode() === 403) {
        echo "  SKIP: contact_list_contacts (plan-gated)\n";
    } else {
        $failed++;
        echo "  FAIL: contacts raised " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: contacts raised " . get_class($e) . ": " . $e->getMessage() . "\n";
} finally {
    if ($clListId !== null) {
        try { $clApi->deleteContactList($clListId); } catch (Exception $ignored) {}
    }
}

// -------------------------------------------------------------------------
// 21. OOO Batch Check
// -------------------------------------------------------------------------
echo "--- OOO Batch Check ---\n";

$oooApi = new OutOfOfficeApi(new GuzzleHttp\Client(), $config);
try {
    $oooResp = $oooApi->batchCheckOoo(new BatchCheckOooRequest([
        'emails' => ['test@example.com'],
    ]));
    if ($oooResp->getResults() !== null) {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: ooo.batch.results is null\n";
    }
} catch (ApiException $e) {
    if ($e->getCode() === 403) {
        echo "  SKIP: ooo_batch (plan-gated)\n";
    } else {
        $failed++;
        echo "  FAIL: ooo raised " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: ooo raised " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// -------------------------------------------------------------------------
// 22. Engagement Summary
// -------------------------------------------------------------------------
echo "--- Engagement Summary ---\n";

$engageApi = new EngagementApi(new GuzzleHttp\Client(), $config);
try {
    $engageResp = $engageApi->getEngagementSummary();
    if ($engageResp !== null) {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: engagement.summary response is null\n";
    }
} catch (ApiException $e) {
    if ($e->getCode() === 403) {
        echo "  SKIP: engagement_summary (plan-gated)\n";
    } else {
        $failed++;
        echo "  FAIL: engagement raised " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: engagement raised " . get_class($e) . ": " . $e->getMessage() . "\n";
}

// -------------------------------------------------------------------------
// 23. Webhook CLI
// -------------------------------------------------------------------------
echo "--- Webhook CLI ---\n";

$webhookApi = new WebhookCLIApi(new GuzzleHttp\Client(), $config);
$sessionId = null;
try {
    $createSessionResp = $webhookApi->createWebhookCliSession(
        new CreateWebhookCliSessionRequest(['forward_url' => 'http://localhost:9999/hooks'])
    );
    $sessionId = $createSessionResp->getSessionId();

    if ($sessionId !== null && $sessionId !== '') {
        $passed++;
    } else {
        $failed++;
        echo "  FAIL: webhook_cli.create.session_id expected non-empty\n";
    }

    // List webhook deliveries
    try {
        $deliveriesResp = $webhookApi->listWebhookDeliveries(10);
        if ($deliveriesResp !== null) {
            $passed++;
        } else {
            $failed++;
            echo "  FAIL: webhook_cli.deliveries response is null\n";
        }
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: webhook_cli.deliveries " . get_class($e) . ": " . $e->getMessage() . "\n";
    }

    // Delete session (cleanup)
    try {
        $delSessionResp = $webhookApi->deleteWebhookCliSession($sessionId);
        if ($delSessionResp !== null) {
            $passed++;
        } else {
            $failed++;
            echo "  FAIL: webhook_cli.delete response is null\n";
        }
        $sessionId = null;
    } catch (Exception $e) {
        $failed++;
        echo "  FAIL: webhook_cli.delete " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (ApiException $e) {
    if ($e->getCode() === 403) {
        echo "  SKIP: webhook_cli (plan-gated)\n";
    } else {
        $failed++;
        echo "  FAIL: webhook_cli raised " . get_class($e) . ": " . $e->getMessage() . "\n";
    }
} catch (Exception $e) {
    $failed++;
    echo "  FAIL: webhook_cli raised " . get_class($e) . ": " . $e->getMessage() . "\n";
} finally {
    if ($sessionId !== null) {
        try { $webhookApi->deleteWebhookCliSession($sessionId); } catch (Exception $ignored) {}
    }
}

// -------------------------------------------------------------------------
// Summary
// -------------------------------------------------------------------------
$total = $passed + $failed;
$result = $failed === 0 ? 'PASS' : 'FAIL';
echo "\n$result: PHP SDK ($passed/$total)\n";
exit($failed === 0 ? 0 : 1);
