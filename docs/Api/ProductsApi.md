# MailOdds\ProductsApi

Query and manage product catalog from connected stores

All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**batchProducts()**](ProductsApi.md#batchProducts) | **POST** /v1/stores/{store_id}/products/batch | Batch push products |
| [**bulkUpdateProducts()**](ProductsApi.md#bulkUpdateProducts) | **PATCH** /v1/store-products/bulk | Bulk update products |
| [**getProduct()**](ProductsApi.md#getProduct) | **GET** /v1/store-products/{product_id} | Get a product |
| [**queryProducts()**](ProductsApi.md#queryProducts) | **GET** /v1/store-products | Query products |


## `batchProducts()`

```php
batchProducts($store_id, $batch_products_request): \MailOdds\Model\BatchProductsResponse
```

Batch push products

Push up to 100 products to a custom platform store. Creates new products or updates existing ones matched by external_id. Only available for stores with platform=custom.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$store_id = 'store_id_example'; // string | Store connection UUID
$batch_products_request = new \MailOdds\Model\BatchProductsRequest(); // \MailOdds\Model\BatchProductsRequest

try {
    $result = $apiInstance->batchProducts($store_id, $batch_products_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->batchProducts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **store_id** | **string**| Store connection UUID | |
| **batch_products_request** | [**\MailOdds\Model\BatchProductsRequest**](../Model/BatchProductsRequest.md)|  | |

### Return type

[**\MailOdds\Model\BatchProductsResponse**](../Model/BatchProductsResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `bulkUpdateProducts()`

```php
bulkUpdateProducts($bulk_update_products_request): \MailOdds\Model\BulkUpdateProducts200Response
```

Bulk update products

Bulk update product visibility. Maximum 500 products per request.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bulk_update_products_request = new \MailOdds\Model\BulkUpdateProductsRequest(); // \MailOdds\Model\BulkUpdateProductsRequest

try {
    $result = $apiInstance->bulkUpdateProducts($bulk_update_products_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->bulkUpdateProducts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bulk_update_products_request** | [**\MailOdds\Model\BulkUpdateProductsRequest**](../Model/BulkUpdateProductsRequest.md)|  | |

### Return type

[**\MailOdds\Model\BulkUpdateProducts200Response**](../Model/BulkUpdateProducts200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProduct()`

```php
getProduct($product_id): \MailOdds\Model\GetProduct200Response
```

Get a product

Get detailed information about a specific product.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product_id = 'product_id_example'; // string | Product UUID

try {
    $result = $apiInstance->getProduct($product_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->getProduct: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **product_id** | **string**| Product UUID | |

### Return type

[**\MailOdds\Model\GetProduct200Response**](../Model/GetProduct200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `queryProducts()`

```php
queryProducts($store_id, $category, $stock_status, $on_sale, $search, $facets, $group_by_sku, $page, $per_page): \MailOdds\Model\QueryProducts200Response
```

Query products

Search and filter products across all connected stores. Supports faceted search and cross-store SKU deduplication for unified inventory views.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$store_id = 'store_id_example'; // string | Filter by store connection UUID
$category = 'category_example'; // string | Filter by category name
$stock_status = 'stock_status_example'; // string | Filter by stock status
$on_sale = True; // bool | Filter to products currently on sale
$search = 'search_example'; // string | Search by title or SKU
$facets = false; // bool | Include facet aggregations (categories, price ranges, stores)
$group_by_sku = false; // bool | Merge products with same SKU across stores into unified entries
$page = 1; // int
$per_page = 20; // int

try {
    $result = $apiInstance->queryProducts($store_id, $category, $stock_status, $on_sale, $search, $facets, $group_by_sku, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->queryProducts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **store_id** | **string**| Filter by store connection UUID | [optional] |
| **category** | **string**| Filter by category name | [optional] |
| **stock_status** | **string**| Filter by stock status | [optional] |
| **on_sale** | **bool**| Filter to products currently on sale | [optional] |
| **search** | **string**| Search by title or SKU | [optional] |
| **facets** | **bool**| Include facet aggregations (categories, price ranges, stores) | [optional] [default to false] |
| **group_by_sku** | **bool**| Merge products with same SKU across stores into unified entries | [optional] [default to false] |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 20] |

### Return type

[**\MailOdds\Model\QueryProducts200Response**](../Model/QueryProducts200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
