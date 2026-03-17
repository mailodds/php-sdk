# MailOdds\OutOfOfficeApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**batchCheckOoo()**](OutOfOfficeApi.md#batchCheckOoo) | **POST** /v1/out-of-office/batch-check | Batch check OOO status |
| [**deleteOooContact()**](OutOfOfficeApi.md#deleteOooContact) | **DELETE** /v1/out-of-office/{email} | Delete OOO contact |
| [**getOooStatus()**](OutOfOfficeApi.md#getOooStatus) | **GET** /v1/out-of-office/{email}/status | Get OOO status for email |
| [**listOooContacts()**](OutOfOfficeApi.md#listOooContacts) | **GET** /v1/out-of-office | List out-of-office contacts |
| [**updateOooContact()**](OutOfOfficeApi.md#updateOooContact) | **PATCH** /v1/out-of-office/{email} | Update OOO contact |


## `batchCheckOoo()`

```php
batchCheckOoo($batch_check_ooo_request): \MailOdds\Model\BatchCheckOoo200Response
```

Batch check OOO status

Check OOO status for up to 1000 email addresses at once. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\OutOfOfficeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$batch_check_ooo_request = new \MailOdds\Model\BatchCheckOooRequest(); // \MailOdds\Model\BatchCheckOooRequest

try {
    $result = $apiInstance->batchCheckOoo($batch_check_ooo_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutOfOfficeApi->batchCheckOoo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **batch_check_ooo_request** | [**\MailOdds\Model\BatchCheckOooRequest**](../Model/BatchCheckOooRequest.md)|  | |

### Return type

[**\MailOdds\Model\BatchCheckOoo200Response**](../Model/BatchCheckOoo200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteOooContact()`

```php
deleteOooContact($email): \MailOdds\Model\DeleteOooContact200Response
```

Delete OOO contact

Clear out-of-office status for an email address. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\OutOfOfficeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email = 'email_example'; // string | Email address

try {
    $result = $apiInstance->deleteOooContact($email);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutOfOfficeApi->deleteOooContact: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email** | **string**| Email address | |

### Return type

[**\MailOdds\Model\DeleteOooContact200Response**](../Model/DeleteOooContact200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getOooStatus()`

```php
getOooStatus($email): \MailOdds\Model\GetOooStatus200Response
```

Get OOO status for email

Check if a specific email address is currently out-of-office. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\OutOfOfficeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email = 'email_example'; // string | Email address to check

try {
    $result = $apiInstance->getOooStatus($email);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutOfOfficeApi->getOooStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email** | **string**| Email address to check | |

### Return type

[**\MailOdds\Model\GetOooStatus200Response**](../Model/GetOooStatus200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listOooContacts()`

```php
listOooContacts($active_only, $page, $per_page): \MailOdds\Model\ListOooContacts200Response
```

List out-of-office contacts

List contacts detected as out-of-office. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\OutOfOfficeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$active_only = true; // bool | Only return currently active OOO contacts
$page = 1; // int
$per_page = 100; // int

try {
    $result = $apiInstance->listOooContacts($active_only, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutOfOfficeApi->listOooContacts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **active_only** | **bool**| Only return currently active OOO contacts | [optional] [default to true] |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 100] |

### Return type

[**\MailOdds\Model\ListOooContacts200Response**](../Model/ListOooContacts200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateOooContact()`

```php
updateOooContact($email, $update_ooo_contact_request): object
```

Update OOO contact

Manually set or clear out-of-office status for an email. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\OutOfOfficeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email = 'email_example'; // string | Email address
$update_ooo_contact_request = new \MailOdds\Model\UpdateOooContactRequest(); // \MailOdds\Model\UpdateOooContactRequest

try {
    $result = $apiInstance->updateOooContact($email, $update_ooo_contact_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutOfOfficeApi->updateOooContact: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email** | **string**| Email address | |
| **update_ooo_contact_request** | [**\MailOdds\Model\UpdateOooContactRequest**](../Model/UpdateOooContactRequest.md)|  | |

### Return type

**object**

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
