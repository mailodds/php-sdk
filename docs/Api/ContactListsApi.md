# MailOdds\ContactListsApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**appendToContactList()**](ContactListsApi.md#appendToContactList) | **POST** /v1/contact-lists/{list_id}/append | Append to contact list |
| [**createContactList()**](ContactListsApi.md#createContactList) | **POST** /v1/contact-lists | Create contact list |
| [**getInactiveContactsReport()**](ContactListsApi.md#getInactiveContactsReport) | **GET** /v1/contacts/inactive-report | Get inactive contacts report |
| [**listContactLists()**](ContactListsApi.md#listContactLists) | **GET** /v1/contact-lists | List contact lists |
| [**queryContactList()**](ContactListsApi.md#queryContactList) | **POST** /v1/contact-lists/{list_id}/query | Query contact list |


## `appendToContactList()`

```php
appendToContactList($list_id, $append_to_contact_list_request): \MailOdds\Model\AppendToContactList200Response
```

Append to contact list

Append validated emails from additional jobs to an existing contact list. Duplicates are automatically skipped.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ContactListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$list_id = 'list_id_example'; // string | Contact list UUID
$append_to_contact_list_request = new \MailOdds\Model\AppendToContactListRequest(); // \MailOdds\Model\AppendToContactListRequest

try {
    $result = $apiInstance->appendToContactList($list_id, $append_to_contact_list_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactListsApi->appendToContactList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_id** | **string**| Contact list UUID | |
| **append_to_contact_list_request** | [**\MailOdds\Model\AppendToContactListRequest**](../Model/AppendToContactListRequest.md)|  | |

### Return type

[**\MailOdds\Model\AppendToContactList200Response**](../Model/AppendToContactList200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createContactList()`

```php
createContactList($create_contact_list_request): \MailOdds\Model\CreateContactList201Response
```

Create contact list

Create a new contact list from one or more completed validation jobs. Only accepted (valid) emails are included.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ContactListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_contact_list_request = new \MailOdds\Model\CreateContactListRequest(); // \MailOdds\Model\CreateContactListRequest

try {
    $result = $apiInstance->createContactList($create_contact_list_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactListsApi->createContactList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_contact_list_request** | [**\MailOdds\Model\CreateContactListRequest**](../Model/CreateContactListRequest.md)|  | |

### Return type

[**\MailOdds\Model\CreateContactList201Response**](../Model/CreateContactList201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getInactiveContactsReport()`

```php
getInactiveContactsReport($days): \MailOdds\Model\GetInactiveContactsReport200Response
```

Get inactive contacts report

Get a report of contacts across all lists with no engagement activity (opens, clicks) in the specified period.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ContactListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$days = 90; // int | Inactivity threshold in days

try {
    $result = $apiInstance->getInactiveContactsReport($days);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactListsApi->getInactiveContactsReport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **days** | **int**| Inactivity threshold in days | [optional] [default to 90] |

### Return type

[**\MailOdds\Model\GetInactiveContactsReport200Response**](../Model/GetInactiveContactsReport200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listContactLists()`

```php
listContactLists($page, $per_page): \MailOdds\Model\ListContactLists200Response
```

List contact lists

List contact lists for the authenticated account. Contact lists are built from validated email jobs.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ContactListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$per_page = 20; // int

try {
    $result = $apiInstance->listContactLists($page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactListsApi->listContactLists: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 20] |

### Return type

[**\MailOdds\Model\ListContactLists200Response**](../Model/ListContactLists200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `queryContactList()`

```php
queryContactList($list_id, $query_contact_list_request): \MailOdds\Model\QueryContactList200Response
```

Query contact list

Query contact list entries with structured filters. Supports filtering by validation status, domain, and other attributes.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ContactListsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$list_id = 'list_id_example'; // string | Contact list UUID
$query_contact_list_request = new \MailOdds\Model\QueryContactListRequest(); // \MailOdds\Model\QueryContactListRequest

try {
    $result = $apiInstance->queryContactList($list_id, $query_contact_list_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactListsApi->queryContactList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_id** | **string**| Contact list UUID | |
| **query_contact_list_request** | [**\MailOdds\Model\QueryContactListRequest**](../Model/QueryContactListRequest.md)|  | |

### Return type

[**\MailOdds\Model\QueryContactList200Response**](../Model/QueryContactList200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
