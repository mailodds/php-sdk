# MailOdds\DeliverabilityAdvisorApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**dismissDeliverabilityRecommendation()**](DeliverabilityAdvisorApi.md#dismissDeliverabilityRecommendation) | **POST** /v1/deliverability/recommendations/{recommendation_id}/dismiss | Dismiss a deliverability recommendation |
| [**getDeliverabilityRecommendations()**](DeliverabilityAdvisorApi.md#getDeliverabilityRecommendations) | **GET** /v1/deliverability/recommendations | Get deliverability recommendations |


## `dismissDeliverabilityRecommendation()`

```php
dismissDeliverabilityRecommendation($recommendation_id)
```

Dismiss a deliverability recommendation

Dismiss a deliverability recommendation so it no longer appears.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\DeliverabilityAdvisorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$recommendation_id = 'recommendation_id_example'; // string

try {
    $apiInstance->dismissDeliverabilityRecommendation($recommendation_id);
} catch (Exception $e) {
    echo 'Exception when calling DeliverabilityAdvisorApi->dismissDeliverabilityRecommendation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **recommendation_id** | **string**|  | |

### Return type

void (empty response body)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDeliverabilityRecommendations()`

```php
getDeliverabilityRecommendations()
```

Get deliverability recommendations

Retrieve actionable deliverability recommendations for the account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\DeliverabilityAdvisorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->getDeliverabilityRecommendations();
} catch (Exception $e) {
    echo 'Exception when calling DeliverabilityAdvisorApi->getDeliverabilityRecommendations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
