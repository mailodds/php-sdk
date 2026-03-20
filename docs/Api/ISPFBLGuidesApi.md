# MailOdds\ISPFBLGuidesApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getIspFblGuide()**](ISPFBLGuidesApi.md#getIspFblGuide) | **GET** /v1/isp-fbl/guides/{isp_id} | Get ISP FBL guide |
| [**listIspFblGuides()**](ISPFBLGuidesApi.md#listIspFblGuides) | **GET** /v1/isp-fbl/guides | List ISP FBL guides |


## `getIspFblGuide()`

```php
getIspFblGuide($isp_id)
```

Get ISP FBL guide

Retrieve a specific ISP feedback loop setup guide.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ISPFBLGuidesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$isp_id = 'isp_id_example'; // string

try {
    $apiInstance->getIspFblGuide($isp_id);
} catch (Exception $e) {
    echo 'Exception when calling ISPFBLGuidesApi->getIspFblGuide: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **isp_id** | **string**|  | |

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

## `listIspFblGuides()`

```php
listIspFblGuides()
```

List ISP FBL guides

List all ISP feedback loop setup guides.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ISPFBLGuidesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->listIspFblGuides();
} catch (Exception $e) {
    echo 'Exception when calling ISPFBLGuidesApi->listIspFblGuides: ', $e->getMessage(), PHP_EOL;
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
