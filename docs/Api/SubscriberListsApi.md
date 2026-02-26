# MailOdds\SubscriberListsApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**confirmSubscription()**](SubscriberListsApi.md#confirmSubscription) | **GET** /v1/confirm/{token} | Confirm subscription |
| [**createList()**](SubscriberListsApi.md#createList) | **POST** /v1/lists | Create a subscriber list |
| [**deleteList()**](SubscriberListsApi.md#deleteList) | **DELETE** /v1/lists/{list_id} | Delete a subscriber list |
| [**getList()**](SubscriberListsApi.md#getList) | **GET** /v1/lists/{list_id} | Get a subscriber list |
| [**getLists()**](SubscriberListsApi.md#getLists) | **GET** /v1/lists | List subscriber lists |
| [**getSubscribers()**](SubscriberListsApi.md#getSubscribers) | **GET** /v1/lists/{list_id}/subscribers | List subscribers |
| [**subscribe()**](SubscriberListsApi.md#subscribe) | **POST** /v1/subscribe/{list_id} | Subscribe to a list |
| [**unsubscribeSubscriber()**](SubscriberListsApi.md#unsubscribeSubscriber) | **DELETE** /v1/lists/{list_id}/subscribers/{subscriber_id} | Unsubscribe a subscriber |


## `confirmSubscription()`

```php
confirmSubscription($token): \MailOdds\Model\ConfirmSubscription200Response
```

Confirm subscription

Confirm a pending subscription via the token sent in the confirmation email. No authentication required. Redirects to the list's configured redirect URL if set, otherwise returns JSON. Tokens expire after 72 hours.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new MailOdds\Api\SubscriberListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = 'token_example'; // string | Confirmation token from email

try {
    $result = $apiInstance->confirmSubscription($token);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriberListsApi->confirmSubscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token** | **string**| Confirmation token from email | |

### Return type

[**\MailOdds\Model\ConfirmSubscription200Response**](../Model/ConfirmSubscription200Response.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createList()`

```php
createList($create_list_request): \MailOdds\Model\CreateList201Response
```

Create a subscriber list

Create a new subscriber list. Use lists to organize subscribers and manage double opt-in confirmation flows.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SubscriberListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_list_request = new \MailOdds\Model\CreateListRequest(); // \MailOdds\Model\CreateListRequest

try {
    $result = $apiInstance->createList($create_list_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriberListsApi->createList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_list_request** | [**\MailOdds\Model\CreateListRequest**](../Model/CreateListRequest.md)|  | |

### Return type

[**\MailOdds\Model\CreateList201Response**](../Model/CreateList201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteList()`

```php
deleteList($list_id): \MailOdds\Model\DeletePolicyRule200Response
```

Delete a subscriber list

Soft-delete a subscriber list. Existing subscribers are retained but the list is no longer usable.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SubscriberListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$list_id = 'list_id_example'; // string | List UUID

try {
    $result = $apiInstance->deleteList($list_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriberListsApi->deleteList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_id** | **string**| List UUID | |

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

## `getList()`

```php
getList($list_id): \MailOdds\Model\CreateList201Response
```

Get a subscriber list

Get details of a specific subscriber list including subscriber and confirmed counts.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SubscriberListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$list_id = 'list_id_example'; // string | List UUID

try {
    $result = $apiInstance->getList($list_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriberListsApi->getList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_id** | **string**| List UUID | |

### Return type

[**\MailOdds\Model\CreateList201Response**](../Model/CreateList201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLists()`

```php
getLists($page, $per_page): \MailOdds\Model\GetLists200Response
```

List subscriber lists

List all subscriber lists for the authenticated account with pagination.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SubscriberListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page number
$per_page = 25; // int | Items per page

try {
    $result = $apiInstance->getLists($page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriberListsApi->getLists: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page number | [optional] [default to 1] |
| **per_page** | **int**| Items per page | [optional] [default to 25] |

### Return type

[**\MailOdds\Model\GetLists200Response**](../Model/GetLists200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSubscribers()`

```php
getSubscribers($list_id, $page, $per_page, $status): \MailOdds\Model\GetSubscribers200Response
```

List subscribers

List paginated subscribers for a specific list. Optionally filter by status.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SubscriberListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$list_id = 'list_id_example'; // string | List UUID
$page = 1; // int | Page number
$per_page = 50; // int | Items per page
$status = 'status_example'; // string | Filter by subscriber status

try {
    $result = $apiInstance->getSubscribers($list_id, $page, $per_page, $status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriberListsApi->getSubscribers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_id** | **string**| List UUID | |
| **page** | **int**| Page number | [optional] [default to 1] |
| **per_page** | **int**| Items per page | [optional] [default to 50] |
| **status** | **string**| Filter by subscriber status | [optional] |

### Return type

[**\MailOdds\Model\GetSubscribers200Response**](../Model/GetSubscribers200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `subscribe()`

```php
subscribe($list_id, $subscribe_request): \MailOdds\Model\UnsubscribeSubscriber200Response
```

Subscribe to a list

Add a subscriber to a list and initiate the double opt-in confirmation flow. The subscriber receives a confirmation email and must click the link to confirm. Rate limited to 10 requests/min per IP and 1000/hour per account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SubscriberListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$list_id = 'list_id_example'; // string | List UUID
$subscribe_request = new \MailOdds\Model\SubscribeRequest(); // \MailOdds\Model\SubscribeRequest

try {
    $result = $apiInstance->subscribe($list_id, $subscribe_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriberListsApi->subscribe: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_id** | **string**| List UUID | |
| **subscribe_request** | [**\MailOdds\Model\SubscribeRequest**](../Model/SubscribeRequest.md)|  | |

### Return type

[**\MailOdds\Model\UnsubscribeSubscriber200Response**](../Model/UnsubscribeSubscriber200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `unsubscribeSubscriber()`

```php
unsubscribeSubscriber($list_id, $subscriber_id): \MailOdds\Model\UnsubscribeSubscriber200Response
```

Unsubscribe a subscriber

Set a subscriber's status to unsubscribed. The consent record is retained for compliance.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SubscriberListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$list_id = 'list_id_example'; // string | List UUID
$subscriber_id = 'subscriber_id_example'; // string | Subscriber UUID

try {
    $result = $apiInstance->unsubscribeSubscriber($list_id, $subscriber_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriberListsApi->unsubscribeSubscriber: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_id** | **string**| List UUID | |
| **subscriber_id** | **string**| Subscriber UUID | |

### Return type

[**\MailOdds\Model\UnsubscribeSubscriber200Response**](../Model/UnsubscribeSubscriber200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
