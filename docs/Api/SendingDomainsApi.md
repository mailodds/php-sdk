# MailOdds\SendingDomainsApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createSendingDomain()**](SendingDomainsApi.md#createSendingDomain) | **POST** /v1/sending-domains | Add a sending domain |
| [**deleteSendingDomain()**](SendingDomainsApi.md#deleteSendingDomain) | **DELETE** /v1/sending-domains/{domain_id} | Delete a sending domain |
| [**getSendingDomain()**](SendingDomainsApi.md#getSendingDomain) | **GET** /v1/sending-domains/{domain_id} | Get a sending domain |
| [**getSendingDomainIdentityScore()**](SendingDomainsApi.md#getSendingDomainIdentityScore) | **GET** /v1/sending-domains/{domain_id}/identity-score | Get domain identity score |
| [**getSendingStats()**](SendingDomainsApi.md#getSendingStats) | **GET** /v1/sending-stats | Get sending statistics |
| [**listSendingDomains()**](SendingDomainsApi.md#listSendingDomains) | **GET** /v1/sending-domains | List sending domains |
| [**verifySendingDomain()**](SendingDomainsApi.md#verifySendingDomain) | **POST** /v1/sending-domains/{domain_id}/verify | Verify domain DNS records |


## `createSendingDomain()`

```php
createSendingDomain($create_sending_domain_request): \MailOdds\Model\CreateSendingDomain201Response
```

Add a sending domain

Register a new sending domain with NS delegation. After adding, configure DNS records and verify.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SendingDomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_sending_domain_request = new \MailOdds\Model\CreateSendingDomainRequest(); // \MailOdds\Model\CreateSendingDomainRequest

try {
    $result = $apiInstance->createSendingDomain($create_sending_domain_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SendingDomainsApi->createSendingDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_sending_domain_request** | [**\MailOdds\Model\CreateSendingDomainRequest**](../Model/CreateSendingDomainRequest.md)|  | |

### Return type

[**\MailOdds\Model\CreateSendingDomain201Response**](../Model/CreateSendingDomain201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteSendingDomain()`

```php
deleteSendingDomain($domain_id): \MailOdds\Model\DeletePolicyRule200Response
```

Delete a sending domain

Permanently remove a sending domain from the account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SendingDomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string

try {
    $result = $apiInstance->deleteSendingDomain($domain_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SendingDomainsApi->deleteSendingDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**|  | |

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

## `getSendingDomain()`

```php
getSendingDomain($domain_id): \MailOdds\Model\CreateSendingDomain201Response
```

Get a sending domain

Get details of a specific sending domain including DNS verification status.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SendingDomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string

try {
    $result = $apiInstance->getSendingDomain($domain_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SendingDomainsApi->getSendingDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**|  | |

### Return type

[**\MailOdds\Model\CreateSendingDomain201Response**](../Model/CreateSendingDomain201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSendingDomainIdentityScore()`

```php
getSendingDomainIdentityScore($domain_id): \MailOdds\Model\GetSendingDomainIdentityScore200Response
```

Get domain identity score

Get a composite DNS health score for the sending domain, checking DKIM, SPF, DMARC, MX, and return path configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SendingDomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string

try {
    $result = $apiInstance->getSendingDomainIdentityScore($domain_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SendingDomainsApi->getSendingDomainIdentityScore: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**|  | |

### Return type

[**\MailOdds\Model\GetSendingDomainIdentityScore200Response**](../Model/GetSendingDomainIdentityScore200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSendingStats()`

```php
getSendingStats($period, $domain_id): \MailOdds\Model\GetSendingStats200Response
```

Get sending statistics

Get aggregate sending statistics across all domains for the account, including delivery rates, open rates, and click rates.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SendingDomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$period = '7d'; // string | Time period
$domain_id = 'domain_id_example'; // string | Filter by domain

try {
    $result = $apiInstance->getSendingStats($period, $domain_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SendingDomainsApi->getSendingStats: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **period** | **string**| Time period | [optional] [default to &#39;7d&#39;] |
| **domain_id** | **string**| Filter by domain | [optional] |

### Return type

[**\MailOdds\Model\GetSendingStats200Response**](../Model/GetSendingStats200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listSendingDomains()`

```php
listSendingDomains(): \MailOdds\Model\ListSendingDomains200Response
```

List sending domains

List all sending domains for the authenticated account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SendingDomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listSendingDomains();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SendingDomainsApi->listSendingDomains: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\MailOdds\Model\ListSendingDomains200Response**](../Model/ListSendingDomains200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `verifySendingDomain()`

```php
verifySendingDomain($domain_id): \MailOdds\Model\CreateSendingDomain201Response
```

Verify domain DNS records

Check and verify all DNS records (DKIM, SPF, DMARC, MX, return path) for the sending domain.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\SendingDomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string

try {
    $result = $apiInstance->verifySendingDomain($domain_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SendingDomainsApi->verifySendingDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**|  | |

### Return type

[**\MailOdds\Model\CreateSendingDomain201Response**](../Model/CreateSendingDomain201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
