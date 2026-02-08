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
    ['test@deliverable.mailodds.com', 'valid', 'accept', null],
    ['test@invalid.mailodds.com', 'invalid', 'reject', 'smtp_rejected'],
    ['test@risky.mailodds.com', 'catch_all', 'accept_with_caution', 'catch_all_detected'],
    ['test@disposable.mailodds.com', 'do_not_mail', 'reject', 'disposable'],
    ['test@role.mailodds.com', 'do_not_mail', 'reject', 'role_account'],
    ['test@timeout.mailodds.com', 'unknown', 'retry_later', 'smtp_unreachable'],
    ['test@freeprovider.mailodds.com', 'valid', 'accept', null],
];

foreach ($cases as [$email, $expStatus, $expAction, $expSub]) {
    $domain = explode('.', explode('@', $email)[1])[0];
    try {
        $req = new MailOdds\Model\ValidateRequest(['email' => $email]);
        $resp = $api->validateEmail($req);
        check("$domain.status", $expStatus, $resp->getStatus());
        check("$domain.action", $expAction, $resp->getAction());
        check("$domain.sub_status", $expSub, $resp->getSubStatus());
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
