# MailOdds\ReputationApi

Account reputation scoring and timeline

All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getReputation()**](ReputationApi.md#getReputation) | **GET** /v1/reputation | Get account reputation |
| [**getReputationTimeline()**](ReputationApi.md#getReputationTimeline) | **GET** /v1/reputation/timeline | Get reputation timeline |


## `getReputation()`

```php
getReputation($period): \MailOdds\Model\GetReputation200Response
```

Get account reputation

Get the aggregate reputation score and breakdown for the account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ReputationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$period = '7d'; // string | Evaluation period

try {
    $result = $apiInstance->getReputation($period);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReputationApi->getReputation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **period** | **string**| Evaluation period | [optional] [default to &#39;7d&#39;] |

### Return type

[**\MailOdds\Model\GetReputation200Response**](../Model/GetReputation200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getReputationTimeline()`

```php
getReputationTimeline($period): \MailOdds\Model\GetReputationTimeline200Response
```

Get reputation timeline

Get reputation metrics over time.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ReputationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$period = '30d'; // string | Timeline period

try {
    $result = $apiInstance->getReputationTimeline($period);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReputationApi->getReputationTimeline: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **period** | **string**| Timeline period | [optional] [default to &#39;30d&#39;] |

### Return type

[**\MailOdds\Model\GetReputationTimeline200Response**](../Model/GetReputationTimeline200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
