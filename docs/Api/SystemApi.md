# MailOdds\SystemApi

Health and status endpoints

All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getTelemetrySummary()**](SystemApi.md#getTelemetrySummary) | **GET** /v1/telemetry/summary | Get validation telemetry |
| [**healthCheck()**](SystemApi.md#healthCheck) | **GET** /health | Health check |


## `getTelemetrySummary()`

```php
getTelemetrySummary($window): \MailOdds\Model\TelemetrySummary
```

Get validation telemetry

Get validation metrics for your account. Useful for building dashboards and monitoring. Supports ETag caching.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SystemApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$window = '24h'; // string | Time window for metrics

try {
    $result = $apiInstance->getTelemetrySummary($window);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SystemApi->getTelemetrySummary: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **window** | **string**| Time window for metrics | [optional] [default to &#39;24h&#39;] |

### Return type

[**\MailOdds\Model\TelemetrySummary**](../Model/TelemetrySummary.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `healthCheck()`

```php
healthCheck(): \MailOdds\Model\HealthCheck200Response
```

Health check

Check API health status. No authentication required.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new MailOdds\Api\SystemApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->healthCheck();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SystemApi->healthCheck: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\MailOdds\Model\HealthCheck200Response**](../Model/HealthCheck200Response.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
