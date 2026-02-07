# MailOdds SDK for PHP

[![Packagist](https://img.shields.io/packagist/v/mailodds/mailodds-php)](https://packagist.org/packages/mailodds/mailodds-php)

Enterprise-ready PHP client for the [MailOdds Email Validation API](https://mailodds.com/docs).

## Installation

```bash
composer require mailodds/mailodds-php
```

## Quick Start

```php
<?php
require_once 'vendor/autoload.php';

$config = MailOdds\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_API_KEY');

$api = new MailOdds\Api\EmailValidationApi(new GuzzleHttp\Client(), $config);

$result = $api->validateEmail(
    new MailOdds\Model\ValidateEmailRequest(['email' => 'user@example.com'])
);

// Branch on action for decisioning
switch ($result->getAction()) {
    case 'accept':
        echo "Safe to send\n";
        break;
    case 'accept_with_caution':
        echo "Valid but risky -- flag for review\n";
        break;
    case 'reject':
        echo "Do not send\n";
        break;
    case 'retry_later':
        echo "Temporary failure -- retry after backoff\n";
        break;
}
```

## Enterprise Features

This SDK includes enterprise-ready features beyond the generated API client:

### Built-in Retry (429/5xx)

```php
use MailOdds\Enterprise\RetryMiddleware;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;

$stack = HandlerStack::create();
$stack->push((new RetryMiddleware(maxRetries: 3, baseDelay: 1.0))->handler());

$client = new Client(['handler' => $stack]);
$api = new MailOdds\Api\EmailValidationApi($client, $config);
```

### Typed Errors

```php
use MailOdds\Enterprise\MailOddsError;
use MailOdds\Enterprise\InsufficientCreditsError;

try {
    $result = $api->validateEmail($request);
} catch (MailOdds\ApiException $e) {
    $error = MailOddsError::fromApiException($e);
    if ($error instanceof InsufficientCreditsError) {
        echo "Need {$error->getCreditsNeeded()} credits, have {$error->getCreditsAvailable()}\n";
        echo "Upgrade: {$error->getUpgradeUrl()}\n";
    }
}
```

### Webhook Signature Verification

```php
use MailOdds\Enterprise\WebhookVerifier;

$verifier = new WebhookVerifier('your_webhook_secret');

$payload = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_MAILODDS_SIGNATURE'] ?? '';

$event = $verifier->verifyAndParse($payload, $signature);
echo "Event: " . $event['event'] . "\n";
echo "Job ID: " . $event['job']['id'] . "\n";
```

## Response Handling

Branch on the `action` field for decisioning:

| Action | Meaning | Recommended |
|--------|---------|-------------|
| `accept` | Safe to send | Add to mailing list |
| `accept_with_caution` | Valid but risky (catch-all, role account) | Flag for review |
| `reject` | Invalid or disposable | Do not send |
| `retry_later` | Temporary failure | Retry after backoff |

## Test Mode

Use an `mo_test_` prefixed API key with test domains for predictable responses without consuming credits.

## API Reference

- Full documentation: https://mailodds.com/docs
- OpenAPI spec: https://mailodds.com/openapi.yaml

## License

MIT
