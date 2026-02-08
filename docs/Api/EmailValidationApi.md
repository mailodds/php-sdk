# MailOdds\EmailValidationApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**validateBatch()**](EmailValidationApi.md#validateBatch) | **POST** /v1/validate/batch | Validate multiple emails (sync) |
| [**validateEmail()**](EmailValidationApi.md#validateEmail) | **POST** /v1/validate | Validate single email |


## `validateBatch()`

```php
validateBatch($validate_batch_request): \MailOdds\Model\ValidateBatch200Response
```

Validate multiple emails (sync)

Validate up to 100 email addresses synchronously. For larger lists, use the bulk jobs API.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\EmailValidationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$validate_batch_request = new \MailOdds\Model\ValidateBatchRequest(); // \MailOdds\Model\ValidateBatchRequest

try {
    $result = $apiInstance->validateBatch($validate_batch_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailValidationApi->validateBatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **validate_batch_request** | [**\MailOdds\Model\ValidateBatchRequest**](../Model/ValidateBatchRequest.md)|  | |

### Return type

[**\MailOdds\Model\ValidateBatch200Response**](../Model/ValidateBatch200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `validateEmail()`

```php
validateEmail($validate_request): \MailOdds\Model\ValidationResponse
```

Validate single email

Validate a single email address. Returns detailed validation results including status, sub-status, and recommended action.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\EmailValidationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$validate_request = new \MailOdds\Model\ValidateRequest(); // \MailOdds\Model\ValidateRequest

try {
    $result = $apiInstance->validateEmail($validate_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailValidationApi->validateEmail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **validate_request** | [**\MailOdds\Model\ValidateRequest**](../Model/ValidateRequest.md)|  | |

### Return type

[**\MailOdds\Model\ValidationResponse**](../Model/ValidationResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
