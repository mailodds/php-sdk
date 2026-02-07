# MailOdds\SuppressionListsApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addSuppression()**](SuppressionListsApi.md#addSuppression) | **POST** /v1/suppression | Add suppression entries |
| [**checkSuppression()**](SuppressionListsApi.md#checkSuppression) | **POST** /v1/suppression/check | Check suppression status |
| [**getSuppressionStats()**](SuppressionListsApi.md#getSuppressionStats) | **GET** /v1/suppression/stats | Get suppression statistics |
| [**listSuppression()**](SuppressionListsApi.md#listSuppression) | **GET** /v1/suppression | List suppression entries |
| [**removeSuppression()**](SuppressionListsApi.md#removeSuppression) | **DELETE** /v1/suppression | Remove suppression entries |


## `addSuppression()`

```php
addSuppression($add_suppression_request): \MailOdds\Model\AddSuppressionResponse
```

Add suppression entries

Add emails or domains to the suppression list.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SuppressionListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$add_suppression_request = new \MailOdds\Model\AddSuppressionRequest(); // \MailOdds\Model\AddSuppressionRequest

try {
    $result = $apiInstance->addSuppression($add_suppression_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionListsApi->addSuppression: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **add_suppression_request** | [**\MailOdds\Model\AddSuppressionRequest**](../Model/AddSuppressionRequest.md)|  | |

### Return type

[**\MailOdds\Model\AddSuppressionResponse**](../Model/AddSuppressionResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `checkSuppression()`

```php
checkSuppression($check_suppression_request): \MailOdds\Model\SuppressionCheckResponse
```

Check suppression status

Check if an email is suppressed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SuppressionListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$check_suppression_request = new \MailOdds\Model\CheckSuppressionRequest(); // \MailOdds\Model\CheckSuppressionRequest

try {
    $result = $apiInstance->checkSuppression($check_suppression_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionListsApi->checkSuppression: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **check_suppression_request** | [**\MailOdds\Model\CheckSuppressionRequest**](../Model/CheckSuppressionRequest.md)|  | |

### Return type

[**\MailOdds\Model\SuppressionCheckResponse**](../Model/SuppressionCheckResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSuppressionStats()`

```php
getSuppressionStats(): \MailOdds\Model\SuppressionStatsResponse
```

Get suppression statistics

Get statistics about the suppression list.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SuppressionListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getSuppressionStats();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionListsApi->getSuppressionStats: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\MailOdds\Model\SuppressionStatsResponse**](../Model/SuppressionStatsResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listSuppression()`

```php
listSuppression($page, $per_page, $type, $search): \MailOdds\Model\SuppressionListResponse
```

List suppression entries

List all suppression entries for the account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SuppressionListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$per_page = 50; // int
$type = 'type_example'; // string
$search = 'search_example'; // string

try {
    $result = $apiInstance->listSuppression($page, $per_page, $type, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionListsApi->listSuppression: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 50] |
| **type** | **string**|  | [optional] |
| **search** | **string**|  | [optional] |

### Return type

[**\MailOdds\Model\SuppressionListResponse**](../Model/SuppressionListResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `removeSuppression()`

```php
removeSuppression($remove_suppression_request): \MailOdds\Model\RemoveSuppression200Response
```

Remove suppression entries

Remove emails or domains from the suppression list.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SuppressionListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$remove_suppression_request = new \MailOdds\Model\RemoveSuppressionRequest(); // \MailOdds\Model\RemoveSuppressionRequest

try {
    $result = $apiInstance->removeSuppression($remove_suppression_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionListsApi->removeSuppression: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **remove_suppression_request** | [**\MailOdds\Model\RemoveSuppressionRequest**](../Model/RemoveSuppressionRequest.md)|  | |

### Return type

[**\MailOdds\Model\RemoveSuppression200Response**](../Model/RemoveSuppression200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
