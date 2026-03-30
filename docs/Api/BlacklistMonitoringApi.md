# MailOdds\BlacklistMonitoringApi



All URIs are relative to https://api.mailodds.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addBlacklistMonitor()**](BlacklistMonitoringApi.md#addBlacklistMonitor) | **POST** /v1/blacklist-monitors | Add blacklist monitor |
| [**deleteBlacklistMonitor()**](BlacklistMonitoringApi.md#deleteBlacklistMonitor) | **DELETE** /v1/blacklist-monitors/{monitor_id} | Delete a blacklist monitor |
| [**getBlacklistHistory()**](BlacklistMonitoringApi.md#getBlacklistHistory) | **GET** /v1/blacklist-monitors/{monitor_id}/history | Get blacklist check history |
| [**listBlacklistMonitors()**](BlacklistMonitoringApi.md#listBlacklistMonitors) | **GET** /v1/blacklist-monitors | List blacklist monitors |
| [**runBlacklistCheck()**](BlacklistMonitoringApi.md#runBlacklistCheck) | **POST** /v1/blacklist-monitors/{monitor_id}/check | Run blacklist check |


## `addBlacklistMonitor()`

```php
addBlacklistMonitor($add_blacklist_monitor_request): \MailOdds\Model\AddBlacklistMonitor201Response
```

Add blacklist monitor

Add an IP address or domain to monitor against DNS blacklists. An initial check is run immediately.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BlacklistMonitoringApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$add_blacklist_monitor_request = new \MailOdds\Model\AddBlacklistMonitorRequest(); // \MailOdds\Model\AddBlacklistMonitorRequest

try {
    $result = $apiInstance->addBlacklistMonitor($add_blacklist_monitor_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlacklistMonitoringApi->addBlacklistMonitor: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **add_blacklist_monitor_request** | [**\MailOdds\Model\AddBlacklistMonitorRequest**](../Model/AddBlacklistMonitorRequest.md)|  | |

### Return type

[**\MailOdds\Model\AddBlacklistMonitor201Response**](../Model/AddBlacklistMonitor201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteBlacklistMonitor()`

```php
deleteBlacklistMonitor($monitor_id): \MailOdds\Model\DeletePolicyRule200Response
```

Delete a blacklist monitor

Permanently remove a blacklist monitor and its check history.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BlacklistMonitoringApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$monitor_id = 'monitor_id_example'; // string

try {
    $result = $apiInstance->deleteBlacklistMonitor($monitor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlacklistMonitoringApi->deleteBlacklistMonitor: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **monitor_id** | **string**|  | |

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

## `getBlacklistHistory()`

```php
getBlacklistHistory($monitor_id, $page, $per_page): \MailOdds\Model\GetBlacklistHistory200Response
```

Get blacklist check history

Get the listing and delisting timeline for a monitored IP or domain.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BlacklistMonitoringApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$monitor_id = 'monitor_id_example'; // string
$page = 1; // int
$per_page = 20; // int

try {
    $result = $apiInstance->getBlacklistHistory($monitor_id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlacklistMonitoringApi->getBlacklistHistory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **monitor_id** | **string**|  | |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 20] |

### Return type

[**\MailOdds\Model\GetBlacklistHistory200Response**](../Model/GetBlacklistHistory200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listBlacklistMonitors()`

```php
listBlacklistMonitors(): \MailOdds\Model\ListBlacklistMonitors200Response
```

List blacklist monitors

List all blacklist monitors for the authenticated account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BlacklistMonitoringApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listBlacklistMonitors();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlacklistMonitoringApi->listBlacklistMonitors: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\MailOdds\Model\ListBlacklistMonitors200Response**](../Model/ListBlacklistMonitors200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `runBlacklistCheck()`

```php
runBlacklistCheck($monitor_id): \MailOdds\Model\RunBlacklistCheck200Response
```

Run blacklist check

Run an on-demand DNSBL check for a monitored IP or domain.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BlacklistMonitoringApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$monitor_id = 'monitor_id_example'; // string

try {
    $result = $apiInstance->runBlacklistCheck($monitor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlacklistMonitoringApi->runBlacklistCheck: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **monitor_id** | **string**|  | |

### Return type

[**\MailOdds\Model\RunBlacklistCheck200Response**](../Model/RunBlacklistCheck200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
