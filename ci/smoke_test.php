<?php
// SDK smoke test -- validates build-from-source and API integration.

$apiUrl = 'https://api.mailodds.com';
$apiKey = getenv('MAILODDS_TEST_KEY');
if (!$apiKey) { echo "ERROR: MAILODDS_TEST_KEY not set\n"; exit(1); }

// Prove SDK autoload works
require_once __DIR__ . '/../vendor/autoload.php';
class_exists('MailOdds\Api\EmailValidationApi') || die("SDK class not found\n");

$passed = 0;
$failed = 0;

function check($label, $expected, $actual) {
    global $passed, $failed;
    if ($expected === $actual) { $passed++; }
    else { $failed++; echo "  FAIL: $label expected=$expected got=$actual\n"; }
}

function apiCall($email, $key) {
    global $apiUrl;
    $ch = curl_init("$apiUrl/v1/validate");
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $key",
            'Content-Type: application/json',
        ],
        CURLOPT_POSTFIELDS => json_encode(['email' => $email]),
    ]);
    $body = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // curl_close is a no-op since PHP 8.0
    return ['code' => $code, 'data' => json_decode($body, true)];
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
    $r = apiCall($email, $apiKey);
    $d = $r['data'];
    check("$domain.status", $expStatus, $d['status'] ?? null);
    check("$domain.action", $expAction, $d['action'] ?? null);
    check("$domain.sub_status", $expSub, $d['sub_status'] ?? null);
    check("$domain.test_mode", true, $d['test_mode'] ?? false);
}

// Error handling
$r401 = apiCall('test@deliverable.mailodds.com', 'invalid_key');
check('error.401', 401, $r401['code']);

$ch = curl_init("$apiUrl/v1/validate");
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 10,
    CURLOPT_HTTPHEADER => ["Authorization: Bearer $apiKey", 'Content-Type: application/json'],
    CURLOPT_POSTFIELDS => '{}',
]);
curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
unset($ch);
if ($code === 400 || $code === 422) { $passed++; }
else { $failed++; echo "  FAIL: error.400 expected=400|422 got=$code\n"; }

$total = $passed + $failed;
$result = $failed === 0 ? 'PASS' : 'FAIL';
echo "\n$result: PHP SDK ($passed/$total)\n";
exit($failed === 0 ? 0 : 1);
