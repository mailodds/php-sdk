# MailOdds\EmailSendingApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deliverBatch()**](EmailSendingApi.md#deliverBatch) | **POST** /v1/deliver/batch | Send to multiple recipients (max 100) |
| [**deliverEmail()**](EmailSendingApi.md#deliverEmail) | **POST** /v1/deliver | Send a single email |


## `deliverBatch()`

```php
deliverBatch($batch_deliver_request): \MailOdds\Model\BatchDeliverResponse
```

Send to multiple recipients (max 100)

Send a single message to up to 100 recipients. Shares the same message body across all recipients. Each recipient is processed independently.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\EmailSendingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$batch_deliver_request = new \MailOdds\Model\BatchDeliverRequest(); // \MailOdds\Model\BatchDeliverRequest

try {
    $result = $apiInstance->deliverBatch($batch_deliver_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailSendingApi->deliverBatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **batch_deliver_request** | [**\MailOdds\Model\BatchDeliverRequest**](../Model/BatchDeliverRequest.md)|  | |

### Return type

[**\MailOdds\Model\BatchDeliverResponse**](../Model/BatchDeliverResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deliverEmail()`

```php
deliverEmail($deliver_request): \MailOdds\Model\DeliverResponse
```

Send a single email

Send a transactional email through the safety pipeline. Validates recipients, checks domain ownership, and queues for delivery. Requires a verified sending domain.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\EmailSendingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$deliver_request = new \MailOdds\Model\DeliverRequest(); // \MailOdds\Model\DeliverRequest

try {
    $result = $apiInstance->deliverEmail($deliver_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailSendingApi->deliverEmail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **deliver_request** | [**\MailOdds\Model\DeliverRequest**](../Model/DeliverRequest.md)|  | |

### Return type

[**\MailOdds\Model\DeliverResponse**](../Model/DeliverResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
