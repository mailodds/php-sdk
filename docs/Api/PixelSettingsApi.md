# MailOdds\PixelSettingsApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getPixelSettings()**](PixelSettingsApi.md#getPixelSettings) | **GET** /v1/pixel-settings | Get pixel settings |
| [**updatePixelSettings()**](PixelSettingsApi.md#updatePixelSettings) | **PATCH** /v1/pixel-settings | Update pixel settings |


## `getPixelSettings()`

```php
getPixelSettings(): \MailOdds\Model\GetPixelSettings200Response
```

Get pixel settings

Get the web pixel tracking configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\PixelSettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getPixelSettings();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PixelSettingsApi->getPixelSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\MailOdds\Model\GetPixelSettings200Response**](../Model/GetPixelSettings200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updatePixelSettings()`

```php
updatePixelSettings($update_pixel_settings_request): \MailOdds\Model\GetPixelSettings200Response
```

Update pixel settings

Update the web pixel subscribe list configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\PixelSettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$update_pixel_settings_request = new \MailOdds\Model\UpdatePixelSettingsRequest(); // \MailOdds\Model\UpdatePixelSettingsRequest

try {
    $result = $apiInstance->updatePixelSettings($update_pixel_settings_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PixelSettingsApi->updatePixelSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **update_pixel_settings_request** | [**\MailOdds\Model\UpdatePixelSettingsRequest**](../Model/UpdatePixelSettingsRequest.md)|  | |

### Return type

[**\MailOdds\Model\GetPixelSettings200Response**](../Model/GetPixelSettings200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
