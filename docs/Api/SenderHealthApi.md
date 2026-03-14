# MailOdds\SenderHealthApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getSenderHealth()**](SenderHealthApi.md#getSenderHealth) | **GET** /v1/sender-health | Get sender health score |
| [**getSenderHealthTrend()**](SenderHealthApi.md#getSenderHealthTrend) | **GET** /v1/sender-health/trend | Get sender health trend |


## `getSenderHealth()`

```php
getSenderHealth($period): \MailOdds\Model\GetSenderHealth200Response
```

Get sender health score

Get an aggregate sender health score (0-100) across all sending domains. Factors in delivery rate, bounce rate, complaint rate, and authentication status.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SenderHealthApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$period = '30d'; // string | Time period for health calculation

try {
    $result = $apiInstance->getSenderHealth($period);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SenderHealthApi->getSenderHealth: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **period** | **string**| Time period for health calculation | [optional] [default to &#39;30d&#39;] |

### Return type

[**\MailOdds\Model\GetSenderHealth200Response**](../Model/GetSenderHealth200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSenderHealthTrend()`

```php
getSenderHealthTrend($period): \MailOdds\Model\GetSenderHealthTrend200Response
```

Get sender health trend

Get historical sender health scores over time for trend analysis. Returns daily data points for the requested period.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SenderHealthApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$period = '30d'; // string | Time period for trend data

try {
    $result = $apiInstance->getSenderHealthTrend($period);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SenderHealthApi->getSenderHealthTrend: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **period** | **string**| Time period for trend data | [optional] [default to &#39;30d&#39;] |

### Return type

[**\MailOdds\Model\GetSenderHealthTrend200Response**](../Model/GetSenderHealthTrend200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
