# MailOdds\ContactListsApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addContact()**](ContactListsApi.md#addContact) | **POST** /v1/contact-lists/{list_id}/contacts | Add contact to list |
| [**appendToContactList()**](ContactListsApi.md#appendToContactList) | **POST** /v1/contact-lists/{list_id}/append | Append to contact list |
| [**createContactList()**](ContactListsApi.md#createContactList) | **POST** /v1/contact-lists | Create contact list |
| [**deleteContact()**](ContactListsApi.md#deleteContact) | **DELETE** /v1/contact-lists/{list_id}/contacts/{contact_id} | Delete contact |
| [**deleteContactList()**](ContactListsApi.md#deleteContactList) | **DELETE** /v1/contact-lists/{list_id} | Delete a contact list |
| [**exportContactList()**](ContactListsApi.md#exportContactList) | **GET** /v1/contact-lists/{list_id}/export | Export contact list |
| [**getInactiveContactsReport()**](ContactListsApi.md#getInactiveContactsReport) | **GET** /v1/contacts/inactive-report | Get inactive contacts report |
| [**importContactList()**](ContactListsApi.md#importContactList) | **POST** /v1/contact-lists/{list_id}/import | Import contacts from CSV |
| [**listContactLists()**](ContactListsApi.md#listContactLists) | **GET** /v1/contact-lists | List contact lists |
| [**queryContactList()**](ContactListsApi.md#queryContactList) | **POST** /v1/contact-lists/{list_id}/query | Query contact list |
| [**updateContact()**](ContactListsApi.md#updateContact) | **PATCH** /v1/contact-lists/{list_id}/contacts/{contact_id} | Update contact |


## `addContact()`

```php
addContact($list_id, $add_contact_request): \MailOdds\Model\AddContact201Response
```

Add contact to list

Add a single contact to a contact list.

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
$list_id = 'list_id_example'; // string | Contact list ID
$add_contact_request = new \MailOdds\Model\AddContactRequest(); // \MailOdds\Model\AddContactRequest

try {
    $result = $apiInstance->addContact($list_id, $add_contact_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactListsApi->addContact: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_id** | **string**| Contact list ID | |
| **add_contact_request** | [**\MailOdds\Model\AddContactRequest**](../Model/AddContactRequest.md)|  | |

### Return type

[**\MailOdds\Model\AddContact201Response**](../Model/AddContact201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

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

## `deleteContact()`

```php
deleteContact($list_id, $contact_id): \MailOdds\Model\DeletePolicyRule200Response
```

Delete contact

Remove a single contact from a contact list.

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
$list_id = 'list_id_example'; // string | Contact list ID
$contact_id = 'contact_id_example'; // string | Contact ID

try {
    $result = $apiInstance->deleteContact($list_id, $contact_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactListsApi->deleteContact: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_id** | **string**| Contact list ID | |
| **contact_id** | **string**| Contact ID | |

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

## `deleteContactList()`

```php
deleteContactList($list_id): \MailOdds\Model\DeletePolicyRule200Response
```

Delete a contact list

Permanently delete a contact list and all its entries.

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

try {
    $result = $apiInstance->deleteContactList($list_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactListsApi->deleteContactList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_id** | **string**| Contact list UUID | |

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

## `exportContactList()`

```php
exportContactList($list_id): string
```

Export contact list

Export a contact list as CSV.

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
$list_id = 'list_id_example'; // string | Contact list ID

try {
    $result = $apiInstance->exportContactList($list_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactListsApi->exportContactList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_id** | **string**| Contact list ID | |

### Return type

**string**

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `text/csv`, `application/json`

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

## `importContactList()`

```php
importContactList($list_id, $file, $column_mapping, $consent_source, $tags): \MailOdds\Model\ImportContactList200Response
```

Import contacts from CSV

Import contacts into a list from a CSV file (max 10MB).

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
$list_id = 'list_id_example'; // string | Contact list ID
$file = '/path/to/file.txt'; // \SplFileObject | CSV file (max 10MB)
$column_mapping = 'column_mapping_example'; // string | JSON mapping of CSV columns to contact fields
$consent_source = 'consent_source_example'; // string | Source of consent for imported contacts
$tags = 'tags_example'; // string | JSON array of tags to apply

try {
    $result = $apiInstance->importContactList($list_id, $file, $column_mapping, $consent_source, $tags);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactListsApi->importContactList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_id** | **string**| Contact list ID | |
| **file** | **\SplFileObject****\SplFileObject**| CSV file (max 10MB) | |
| **column_mapping** | **string**| JSON mapping of CSV columns to contact fields | [optional] |
| **consent_source** | **string**| Source of consent for imported contacts | [optional] |
| **tags** | **string**| JSON array of tags to apply | [optional] |

### Return type

[**\MailOdds\Model\ImportContactList200Response**](../Model/ImportContactList200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
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

## `updateContact()`

```php
updateContact($list_id, $contact_id, $update_contact_request): \MailOdds\Model\AddContact201Response
```

Update contact

Update a single contact in a contact list.

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
$list_id = 'list_id_example'; // string | Contact list ID
$contact_id = 'contact_id_example'; // string | Contact ID
$update_contact_request = new \MailOdds\Model\UpdateContactRequest(); // \MailOdds\Model\UpdateContactRequest

try {
    $result = $apiInstance->updateContact($list_id, $contact_id, $update_contact_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactListsApi->updateContact: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_id** | **string**| Contact list ID | |
| **contact_id** | **string**| Contact ID | |
| **update_contact_request** | [**\MailOdds\Model\UpdateContactRequest**](../Model/UpdateContactRequest.md)|  | |

### Return type

[**\MailOdds\Model\AddContact201Response**](../Model/AddContact201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
