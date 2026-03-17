# MailOdds\StoreConnectionsApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createStore()**](StoreConnectionsApi.md#createStore) | **POST** /v1/stores | Create a store connection |
| [**disconnectStore()**](StoreConnectionsApi.md#disconnectStore) | **DELETE** /v1/stores/{store_id} | Disconnect a store |
| [**getStore()**](StoreConnectionsApi.md#getStore) | **GET** /v1/stores/{store_id} | Get a store connection |
| [**getSyncJobErrors()**](StoreConnectionsApi.md#getSyncJobErrors) | **GET** /v1/stores/{store_id}/sync-jobs/{job_id}/errors | Get sync job errors |
| [**listStores()**](StoreConnectionsApi.md#listStores) | **GET** /v1/stores | List store connections |
| [**listSyncJobs()**](StoreConnectionsApi.md#listSyncJobs) | **GET** /v1/stores/{store_id}/sync-jobs | List sync jobs |
| [**triggerSync()**](StoreConnectionsApi.md#triggerSync) | **POST** /v1/stores/{store_id}/sync | Trigger product sync |
| [**updateStore()**](StoreConnectionsApi.md#updateStore) | **PUT** /v1/stores/{store_id} | Update a store connection |


## `createStore()`

```php
createStore($create_store_request): \MailOdds\Model\CreateStore201Response
```

Create a store connection

Connect an e-commerce store (WooCommerce, PrestaShop, Shopify, or product feed). After creation, trigger a sync to import products.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\StoreConnectionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_store_request = new \MailOdds\Model\CreateStoreRequest(); // \MailOdds\Model\CreateStoreRequest

try {
    $result = $apiInstance->createStore($create_store_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StoreConnectionsApi->createStore: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_store_request** | [**\MailOdds\Model\CreateStoreRequest**](../Model/CreateStoreRequest.md)|  | |

### Return type

[**\MailOdds\Model\CreateStore201Response**](../Model/CreateStore201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `disconnectStore()`

```php
disconnectStore($store_id): \MailOdds\Model\DisconnectStore200Response
```

Disconnect a store

Disconnect a store and deactivate its products. Products are retained but marked inactive.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\StoreConnectionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$store_id = 'store_id_example'; // string | Store connection UUID

try {
    $result = $apiInstance->disconnectStore($store_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StoreConnectionsApi->disconnectStore: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **store_id** | **string**| Store connection UUID | |

### Return type

[**\MailOdds\Model\DisconnectStore200Response**](../Model/DisconnectStore200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStore()`

```php
getStore($store_id): \MailOdds\Model\CreateStore201Response
```

Get a store connection

Get details of a specific store connection including sync status and product count.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\StoreConnectionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$store_id = 'store_id_example'; // string | Store connection UUID

try {
    $result = $apiInstance->getStore($store_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StoreConnectionsApi->getStore: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **store_id** | **string**| Store connection UUID | |

### Return type

[**\MailOdds\Model\CreateStore201Response**](../Model/CreateStore201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSyncJobErrors()`

```php
getSyncJobErrors($store_id, $job_id, $page, $per_page): \MailOdds\Model\GetSyncJobErrors200Response
```

Get sync job errors

Get error details for a sync job.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\StoreConnectionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$store_id = 'store_id_example'; // string | Store ID
$job_id = 'job_id_example'; // string | Sync job ID
$page = 1; // int
$per_page = 50; // int

try {
    $result = $apiInstance->getSyncJobErrors($store_id, $job_id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StoreConnectionsApi->getSyncJobErrors: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **store_id** | **string**| Store ID | |
| **job_id** | **string**| Sync job ID | |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 50] |

### Return type

[**\MailOdds\Model\GetSyncJobErrors200Response**](../Model/GetSyncJobErrors200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listStores()`

```php
listStores($status): \MailOdds\Model\ListStores200Response
```

List store connections

List all store connections for the authenticated account. Optionally filter by status.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\StoreConnectionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$status = 'status_example'; // string | Filter by connection status

try {
    $result = $apiInstance->listStores($status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StoreConnectionsApi->listStores: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **status** | **string**| Filter by connection status | [optional] |

### Return type

[**\MailOdds\Model\ListStores200Response**](../Model/ListStores200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listSyncJobs()`

```php
listSyncJobs($store_id, $page, $per_page): \MailOdds\Model\ListSyncJobs200Response
```

List sync jobs

List sync job history for a store.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\StoreConnectionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$store_id = 'store_id_example'; // string | Store ID
$page = 1; // int
$per_page = 20; // int

try {
    $result = $apiInstance->listSyncJobs($store_id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StoreConnectionsApi->listSyncJobs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **store_id** | **string**| Store ID | |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 20] |

### Return type

[**\MailOdds\Model\ListSyncJobs200Response**](../Model/ListSyncJobs200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `triggerSync()`

```php
triggerSync($store_id, $idempotency_key): \MailOdds\Model\SyncResponse
```

Trigger product sync

Trigger a manual product sync for a store. Supports idempotency via the Idempotency-Key header (5 minute TTL).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\StoreConnectionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$store_id = 'store_id_example'; // string | Store connection UUID
$idempotency_key = 'idempotency_key_example'; // string | Idempotency key to prevent duplicate syncs (5 min TTL)

try {
    $result = $apiInstance->triggerSync($store_id, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StoreConnectionsApi->triggerSync: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **store_id** | **string**| Store connection UUID | |
| **idempotency_key** | **string**| Idempotency key to prevent duplicate syncs (5 min TTL) | [optional] |

### Return type

[**\MailOdds\Model\SyncResponse**](../Model/SyncResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateStore()`

```php
updateStore($store_id, $update_store_request): \MailOdds\Model\CreateStore201Response
```

Update a store connection

Update store settings such as name, sync interval, or credentials.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\StoreConnectionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$store_id = 'store_id_example'; // string | Store connection UUID
$update_store_request = new \MailOdds\Model\UpdateStoreRequest(); // \MailOdds\Model\UpdateStoreRequest

try {
    $result = $apiInstance->updateStore($store_id, $update_store_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StoreConnectionsApi->updateStore: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **store_id** | **string**| Store connection UUID | |
| **update_store_request** | [**\MailOdds\Model\UpdateStoreRequest**](../Model/UpdateStoreRequest.md)|  | |

### Return type

[**\MailOdds\Model\CreateStore201Response**](../Model/CreateStore201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
