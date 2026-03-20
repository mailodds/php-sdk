# MailOdds\GlobalSuppressionsApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addGlobalSuppressionOverride()**](GlobalSuppressionsApi.md#addGlobalSuppressionOverride) | **POST** /v1/global-suppressions/overrides | Add global suppression override |
| [**checkGlobalSuppression()**](GlobalSuppressionsApi.md#checkGlobalSuppression) | **GET** /v1/global-suppressions/check | Check global suppression |
| [**removeGlobalSuppressionOverride()**](GlobalSuppressionsApi.md#removeGlobalSuppressionOverride) | **DELETE** /v1/global-suppressions/overrides | Remove global suppression override |


## `addGlobalSuppressionOverride()`

```php
addGlobalSuppressionOverride()
```

Add global suppression override

Add an override to allow sending to a globally suppressed email address.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\GlobalSuppressionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->addGlobalSuppressionOverride();
} catch (Exception $e) {
    echo 'Exception when calling GlobalSuppressionsApi->addGlobalSuppressionOverride: ', $e->getMessage(), PHP_EOL;
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

## `checkGlobalSuppression()`

```php
checkGlobalSuppression()
```

Check global suppression

Check if an email address is globally suppressed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\GlobalSuppressionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->checkGlobalSuppression();
} catch (Exception $e) {
    echo 'Exception when calling GlobalSuppressionsApi->checkGlobalSuppression: ', $e->getMessage(), PHP_EOL;
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

## `removeGlobalSuppressionOverride()`

```php
removeGlobalSuppressionOverride()
```

Remove global suppression override

Remove an override for a globally suppressed email address.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\GlobalSuppressionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->removeGlobalSuppressionOverride();
} catch (Exception $e) {
    echo 'Exception when calling GlobalSuppressionsApi->removeGlobalSuppressionOverride: ', $e->getMessage(), PHP_EOL;
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
