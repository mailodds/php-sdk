# MailOdds\DomainInsightsApi



All URIs are relative to https://api.mailodds.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getDomainHookEffectiveness()**](DomainInsightsApi.md#getDomainHookEffectiveness) | **GET** /v1/sending-domains/{domain_id}/insights/hook-effectiveness | Get hook effectiveness metrics |
| [**getDomainInsightsFunnel()**](DomainInsightsApi.md#getDomainInsightsFunnel) | **GET** /v1/sending-domains/{domain_id}/insights/funnel | Get domain engagement funnel |
| [**getDomainInsightsTrends()**](DomainInsightsApi.md#getDomainInsightsTrends) | **GET** /v1/sending-domains/{domain_id}/insights/trends | Get domain engagement trends |


## `getDomainHookEffectiveness()`

```php
getDomainHookEffectiveness($domain_id, $days): \MailOdds\Model\GetDomainHookEffectiveness200Response
```

Get hook effectiveness metrics

Get webhook delivery effectiveness metrics for a sending domain. Requires Pro+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\DomainInsightsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | Sending domain ID
$days = 30; // int | Lookback period in days

try {
    $result = $apiInstance->getDomainHookEffectiveness($domain_id, $days);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainInsightsApi->getDomainHookEffectiveness: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| Sending domain ID | |
| **days** | **int**| Lookback period in days | [optional] [default to 30] |

### Return type

[**\MailOdds\Model\GetDomainHookEffectiveness200Response**](../Model/GetDomainHookEffectiveness200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDomainInsightsFunnel()`

```php
getDomainInsightsFunnel($domain_id, $days): \MailOdds\Model\GetDomainInsightsFunnel200Response
```

Get domain engagement funnel

Get engagement funnel for a sending domain (sent > delivered > opened > clicked > converted). Requires Pro+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\DomainInsightsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | Sending domain ID
$days = 30; // int | Lookback period in days

try {
    $result = $apiInstance->getDomainInsightsFunnel($domain_id, $days);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainInsightsApi->getDomainInsightsFunnel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| Sending domain ID | |
| **days** | **int**| Lookback period in days | [optional] [default to 30] |

### Return type

[**\MailOdds\Model\GetDomainInsightsFunnel200Response**](../Model/GetDomainInsightsFunnel200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDomainInsightsTrends()`

```php
getDomainInsightsTrends($domain_id, $days): \MailOdds\Model\GetDomainInsightsTrends200Response
```

Get domain engagement trends

Get daily engagement trend data for a sending domain. Requires Pro+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\DomainInsightsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | Sending domain ID
$days = 30; // int | Lookback period in days

try {
    $result = $apiInstance->getDomainInsightsTrends($domain_id, $days);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainInsightsApi->getDomainInsightsTrends: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| Sending domain ID | |
| **days** | **int**| Lookback period in days | [optional] [default to 30] |

### Return type

[**\MailOdds\Model\GetDomainInsightsTrends200Response**](../Model/GetDomainInsightsTrends200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
