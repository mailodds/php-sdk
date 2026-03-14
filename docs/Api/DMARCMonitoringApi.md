# MailOdds\DMARCMonitoringApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addDmarcDomain()**](DMARCMonitoringApi.md#addDmarcDomain) | **POST** /v1/dmarc-domains | Add DMARC domain |
| [**getDmarcDomain()**](DMARCMonitoringApi.md#getDmarcDomain) | **GET** /v1/dmarc-domains/{domain_id} | Get DMARC domain |
| [**getDmarcRecommendation()**](DMARCMonitoringApi.md#getDmarcRecommendation) | **GET** /v1/dmarc-domains/{domain_id}/recommendation | Get DMARC policy recommendation |
| [**getDmarcSources()**](DMARCMonitoringApi.md#getDmarcSources) | **GET** /v1/dmarc-domains/{domain_id}/sources | Get DMARC sending sources |
| [**getDmarcTrend()**](DMARCMonitoringApi.md#getDmarcTrend) | **GET** /v1/dmarc-domains/{domain_id}/trend | Get DMARC trend |
| [**listDmarcDomains()**](DMARCMonitoringApi.md#listDmarcDomains) | **GET** /v1/dmarc-domains | List DMARC domains |
| [**verifyDmarcDomain()**](DMARCMonitoringApi.md#verifyDmarcDomain) | **POST** /v1/dmarc-domains/{domain_id}/verify | Verify DMARC DNS records |


## `addDmarcDomain()`

```php
addDmarcDomain($add_dmarc_domain_request): \MailOdds\Model\AddDmarcDomain201Response
```

Add DMARC domain

Add a domain for DMARC monitoring. A unique reporting address is generated for receiving aggregate DMARC reports.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\DMARCMonitoringApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$add_dmarc_domain_request = new \MailOdds\Model\AddDmarcDomainRequest(); // \MailOdds\Model\AddDmarcDomainRequest

try {
    $result = $apiInstance->addDmarcDomain($add_dmarc_domain_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DMARCMonitoringApi->addDmarcDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **add_dmarc_domain_request** | [**\MailOdds\Model\AddDmarcDomainRequest**](../Model/AddDmarcDomainRequest.md)|  | |

### Return type

[**\MailOdds\Model\AddDmarcDomain201Response**](../Model/AddDmarcDomain201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDmarcDomain()`

```php
getDmarcDomain($domain_id, $days): \MailOdds\Model\GetDmarcDomain200Response
```

Get DMARC domain

Get a single DMARC domain with summary statistics including pass/fail rates.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\DMARCMonitoringApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | DMARC domain UUID
$days = 30; // int | Number of days for summary stats

try {
    $result = $apiInstance->getDmarcDomain($domain_id, $days);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DMARCMonitoringApi->getDmarcDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| DMARC domain UUID | |
| **days** | **int**| Number of days for summary stats | [optional] [default to 30] |

### Return type

[**\MailOdds\Model\GetDmarcDomain200Response**](../Model/GetDmarcDomain200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDmarcRecommendation()`

```php
getDmarcRecommendation($domain_id): \MailOdds\Model\GetDmarcRecommendation200Response
```

Get DMARC policy recommendation

Get a recommendation for upgrading the domain's DMARC policy based on alignment data.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\DMARCMonitoringApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | DMARC domain UUID

try {
    $result = $apiInstance->getDmarcRecommendation($domain_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DMARCMonitoringApi->getDmarcRecommendation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| DMARC domain UUID | |

### Return type

[**\MailOdds\Model\GetDmarcRecommendation200Response**](../Model/GetDmarcRecommendation200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDmarcSources()`

```php
getDmarcSources($domain_id, $days, $page, $per_page): \MailOdds\Model\GetDmarcSources200Response
```

Get DMARC sending sources

Get sending IPs that have sent email for this domain with their DKIM/SPF alignment status.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\DMARCMonitoringApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | DMARC domain UUID
$days = 30; // int | Number of days to look back
$page = 1; // int
$per_page = 20; // int

try {
    $result = $apiInstance->getDmarcSources($domain_id, $days, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DMARCMonitoringApi->getDmarcSources: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| DMARC domain UUID | |
| **days** | **int**| Number of days to look back | [optional] [default to 30] |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 20] |

### Return type

[**\MailOdds\Model\GetDmarcSources200Response**](../Model/GetDmarcSources200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDmarcTrend()`

```php
getDmarcTrend($domain_id, $days): \MailOdds\Model\GetDmarcTrend200Response
```

Get DMARC trend

Get daily pass/fail trend data for DMARC authentication over the specified period.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\DMARCMonitoringApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | DMARC domain UUID
$days = 30; // int | Number of days of trend data

try {
    $result = $apiInstance->getDmarcTrend($domain_id, $days);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DMARCMonitoringApi->getDmarcTrend: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| DMARC domain UUID | |
| **days** | **int**| Number of days of trend data | [optional] [default to 30] |

### Return type

[**\MailOdds\Model\GetDmarcTrend200Response**](../Model/GetDmarcTrend200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listDmarcDomains()`

```php
listDmarcDomains(): \MailOdds\Model\ListDmarcDomains200Response
```

List DMARC domains

List all domains being monitored for DMARC compliance.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\DMARCMonitoringApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listDmarcDomains();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DMARCMonitoringApi->listDmarcDomains: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\MailOdds\Model\ListDmarcDomains200Response**](../Model/ListDmarcDomains200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `verifyDmarcDomain()`

```php
verifyDmarcDomain($domain_id): \MailOdds\Model\AddDmarcDomain201Response
```

Verify DMARC DNS records

Check that the domain has the correct DMARC TXT record pointing to the MailOdds reporting address.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\DMARCMonitoringApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | DMARC domain UUID

try {
    $result = $apiInstance->verifyDmarcDomain($domain_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DMARCMonitoringApi->verifyDmarcDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| DMARC domain UUID | |

### Return type

[**\MailOdds\Model\AddDmarcDomain201Response**](../Model/AddDmarcDomain201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
