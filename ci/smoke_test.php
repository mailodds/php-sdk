<?php
// SDK smoke test -- validates build-from-source and API integration using the SDK client.

$apiKey = getenv('MAILODDS_TEST_KEY');
if (!$apiKey) { echo "ERROR: MAILODDS_TEST_KEY not set\n"; exit(1); }

require_once __DIR__ . '/../vendor/autoload.php';

$config = MailOdds\Configuration::getDefaultConfiguration();
$config->setAccessToken($apiKey);
$config->setHost('https://api.mailodds.com');

$api = new MailOdds\Api\EmailValidationApi(new GuzzleHttp\Client(), $config);

$passed = 0;
$failed = 0;

function check($label, $expected, $actual) {
    global $passed, $failed;
    if ($expected === $actual) { $passed++; }
    else { $failed++; echo "  FAIL: $label expected=$expected got=$actual\n"; }
}

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
        $req = new MailOdds\Model\ValidateRequest(['email' => $email]);
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
    $badApi = new MailOdds\Api\EmailValidationApi(new GuzzleHttp\Client(), $badConfig);
    $badApi->validateEmail(new MailOdds\Model\ValidateRequest(['email' => 'test@deliverable.mailodds.com']));
    $failed++;
    echo "  FAIL: error.401 no exception raised\n";
} catch (MailOdds\ApiException $e) {
    check('error.401', 401, $e->getCode());
}

// Error handling: 400/422 with missing email
try {
    $api->validateEmail(new MailOdds\Model\ValidateRequest(['email' => '']));
    $failed++;
    echo "  FAIL: error.400 no exception raised\n";
} catch (MailOdds\ApiException $e) {
    if ($e->getCode() === 400 || $e->getCode() === 422) { $passed++; }
    else { $failed++; echo "  FAIL: error.400 expected=400|422 got=" . $e->getCode() . "\n"; }
}

$total = $passed + $failed;
$result = $failed === 0 ? 'PASS' : 'FAIL';
echo "\n$result: PHP SDK ($passed/$total)\n";
exit($failed === 0 ? 0 : 1);
