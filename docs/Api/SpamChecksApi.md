# MailOdds\SpamChecksApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteSpamCheck()**](SpamChecksApi.md#deleteSpamCheck) | **DELETE** /v1/spam-checks/{check_id} | Delete spam check |
| [**getSpamCheck()**](SpamChecksApi.md#getSpamCheck) | **GET** /v1/spam-checks/{check_id} | Get spam check |
| [**listSpamChecks()**](SpamChecksApi.md#listSpamChecks) | **GET** /v1/spam-checks | List spam checks |
| [**runSpamCheck()**](SpamChecksApi.md#runSpamCheck) | **POST** /v1/spam-checks | Run spam check |


## `deleteSpamCheck()`

```php
deleteSpamCheck($check_id): \MailOdds\Model\DeletePolicyRule200Response
```

Delete spam check

Delete a spam check result.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SpamChecksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$check_id = 'check_id_example'; // string

try {
    $result = $apiInstance->deleteSpamCheck($check_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SpamChecksApi->deleteSpamCheck: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **check_id** | **string**|  | |

### Return type

[**\MailOdds\Model\DeletePolicyRule200Response**](../Model/DeletePolicyRule200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSpamCheck()`

```php
getSpamCheck($check_id): \MailOdds\Model\RunSpamCheck201Response
```

Get spam check

Get the detailed result of a specific spam check.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SpamChecksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$check_id = 'check_id_example'; // string

try {
    $result = $apiInstance->getSpamCheck($check_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SpamChecksApi->getSpamCheck: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **check_id** | **string**|  | |

### Return type

[**\MailOdds\Model\RunSpamCheck201Response**](../Model/RunSpamCheck201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listSpamChecks()`

```php
listSpamChecks($page, $per_page): \MailOdds\Model\ListSpamChecks200Response
```

List spam checks

List past spam check results with pagination.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SpamChecksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$per_page = 20; // int

try {
    $result = $apiInstance->listSpamChecks($page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SpamChecksApi->listSpamChecks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 20] |

### Return type

[**\MailOdds\Model\ListSpamChecks200Response**](../Model/ListSpamChecks200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `runSpamCheck()`

```php
runSpamCheck($run_spam_check_request): \MailOdds\Model\RunSpamCheck201Response
```

Run spam check

Run backend spam checks on email sending parameters. Checks domain reputation, link safety, and subject line quality.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SpamChecksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$run_spam_check_request = new \MailOdds\Model\RunSpamCheckRequest(); // \MailOdds\Model\RunSpamCheckRequest

try {
    $result = $apiInstance->runSpamCheck($run_spam_check_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SpamChecksApi->runSpamCheck: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **run_spam_check_request** | [**\MailOdds\Model\RunSpamCheckRequest**](../Model/RunSpamCheckRequest.md)|  | |

### Return type

[**\MailOdds\Model\RunSpamCheck201Response**](../Model/RunSpamCheck201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
