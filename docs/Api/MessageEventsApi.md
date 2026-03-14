# MailOdds\MessageEventsApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getMessageEvents()**](MessageEventsApi.md#getMessageEvents) | **GET** /v1/message-events | Get message events |


## `getMessageEvents()`

```php
getMessageEvents($message_id): \MailOdds\Model\GetMessageEvents200Response
```

Get message events

Get delivery and engagement events for a specific sent message. Returns events in chronological order with bot detection.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\MessageEventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$message_id = 'message_id_example'; // string | UUID of the sent message

try {
    $result = $apiInstance->getMessageEvents($message_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageEventsApi->getMessageEvents: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **message_id** | **string**| UUID of the sent message | |

### Return type

[**\MailOdds\Model\GetMessageEvents200Response**](../Model/GetMessageEvents200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
