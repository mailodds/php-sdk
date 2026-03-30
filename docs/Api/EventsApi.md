# MailOdds\EventsApi

Commerce event tracking and ingestion

All URIs are relative to https://api.mailodds.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**trackEvent()**](EventsApi.md#trackEvent) | **POST** /v1/events/track | Track a commerce event |


## `trackEvent()`

```php
trackEvent($track_event_request): \MailOdds\Model\TrackEventResponse
```

Track a commerce event

Ingest a commerce event (purchase, cart abandonment, browse, wishlist, review, etc.). Supports idempotency via the idempotency_key field (5 minute Redis TTL + DB unique constraint).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$track_event_request = new \MailOdds\Model\TrackEventRequest(); // \MailOdds\Model\TrackEventRequest

try {
    $result = $apiInstance->trackEvent($track_event_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->trackEvent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **track_event_request** | [**\MailOdds\Model\TrackEventRequest**](../Model/TrackEventRequest.md)|  | |

### Return type

[**\MailOdds\Model\TrackEventResponse**](../Model/TrackEventResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
