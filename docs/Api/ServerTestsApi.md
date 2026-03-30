# MailOdds\ServerTestsApi



All URIs are relative to https://api.mailodds.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getServerTest()**](ServerTestsApi.md#getServerTest) | **GET** /v1/server-tests/{test_id} | Get server test |
| [**listServerTests()**](ServerTestsApi.md#listServerTests) | **GET** /v1/server-tests | List server tests |
| [**runServerTest()**](ServerTestsApi.md#runServerTest) | **POST** /v1/server-tests | Run server test |


## `getServerTest()`

```php
getServerTest($test_id): \MailOdds\Model\RunServerTest201Response
```

Get server test

Get the detailed results of a specific server test.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ServerTestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$test_id = 'test_id_example'; // string

try {
    $result = $apiInstance->getServerTest($test_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerTestsApi->getServerTest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **test_id** | **string**|  | |

### Return type

[**\MailOdds\Model\RunServerTest201Response**](../Model/RunServerTest201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listServerTests()`

```php
listServerTests($page, $per_page): \MailOdds\Model\ListServerTests200Response
```

List server tests

List past server test results with pagination.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ServerTestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$per_page = 20; // int

try {
    $result = $apiInstance->listServerTests($page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerTestsApi->listServerTests: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 20] |

### Return type

[**\MailOdds\Model\ListServerTests200Response**](../Model/ListServerTests200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `runServerTest()`

```php
runServerTest($run_server_test_request): \MailOdds\Model\RunServerTest201Response
```

Run server test

Run an SMTP handshake test and MX configuration audit for a domain.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ServerTestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$run_server_test_request = new \MailOdds\Model\RunServerTestRequest(); // \MailOdds\Model\RunServerTestRequest

try {
    $result = $apiInstance->runServerTest($run_server_test_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerTestsApi->runServerTest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **run_server_test_request** | [**\MailOdds\Model\RunServerTestRequest**](../Model/RunServerTestRequest.md)|  | |

### Return type

[**\MailOdds\Model\RunServerTest201Response**](../Model/RunServerTest201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
