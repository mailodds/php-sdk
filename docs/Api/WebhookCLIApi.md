# MailOdds\WebhookCLIApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createWebhookCliSession()**](WebhookCLIApi.md#createWebhookCliSession) | **POST** /v1/webhook-cli/sessions | Create CLI forwarding session |
| [**deleteWebhookCliSession()**](WebhookCLIApi.md#deleteWebhookCliSession) | **DELETE** /v1/webhook-cli/sessions/{session_id} | Close CLI session |
| [**listWebhookDeliveries()**](WebhookCLIApi.md#listWebhookDeliveries) | **GET** /v1/webhook-cli/deliveries | List recent webhook deliveries |
| [**replayWebhookDelivery()**](WebhookCLIApi.md#replayWebhookDelivery) | **POST** /v1/webhook-cli/deliveries/{delivery_id}/replay | Replay webhook delivery |


## `createWebhookCliSession()`

```php
createWebhookCliSession($create_webhook_cli_session_request): \MailOdds\Model\CreateWebhookCliSession201Response
```

Create CLI forwarding session

Register a new session for receiving webhook events via SSE.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\WebhookCLIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_webhook_cli_session_request = new \MailOdds\Model\CreateWebhookCliSessionRequest(); // \MailOdds\Model\CreateWebhookCliSessionRequest

try {
    $result = $apiInstance->createWebhookCliSession($create_webhook_cli_session_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookCLIApi->createWebhookCliSession: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_webhook_cli_session_request** | [**\MailOdds\Model\CreateWebhookCliSessionRequest**](../Model/CreateWebhookCliSessionRequest.md)|  | [optional] |

### Return type

[**\MailOdds\Model\CreateWebhookCliSession201Response**](../Model/CreateWebhookCliSession201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteWebhookCliSession()`

```php
deleteWebhookCliSession($session_id): \MailOdds\Model\DeleteWebhookCliSession200Response
```

Close CLI session

Close a webhook CLI forwarding session.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\WebhookCLIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$session_id = 'session_id_example'; // string

try {
    $result = $apiInstance->deleteWebhookCliSession($session_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookCLIApi->deleteWebhookCliSession: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **session_id** | **string**|  | |

### Return type

[**\MailOdds\Model\DeleteWebhookCliSession200Response**](../Model/DeleteWebhookCliSession200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listWebhookDeliveries()`

```php
listWebhookDeliveries($limit): \MailOdds\Model\ListWebhookDeliveries200Response
```

List recent webhook deliveries

List recent webhook deliveries for replay.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\WebhookCLIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 50; // int | Maximum deliveries to return

try {
    $result = $apiInstance->listWebhookDeliveries($limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookCLIApi->listWebhookDeliveries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Maximum deliveries to return | [optional] [default to 50] |

### Return type

[**\MailOdds\Model\ListWebhookDeliveries200Response**](../Model/ListWebhookDeliveries200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `replayWebhookDelivery()`

```php
replayWebhookDelivery($delivery_id): \MailOdds\Model\ReplayWebhookDelivery200Response
```

Replay webhook delivery

Replay a historical webhook delivery to active CLI sessions.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\WebhookCLIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$delivery_id = 56; // int

try {
    $result = $apiInstance->replayWebhookDelivery($delivery_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookCLIApi->replayWebhookDelivery: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **delivery_id** | **int**|  | |

### Return type

[**\MailOdds\Model\ReplayWebhookDelivery200Response**](../Model/ReplayWebhookDelivery200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
