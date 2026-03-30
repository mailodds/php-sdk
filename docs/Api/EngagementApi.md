# MailOdds\EngagementApi

Contact engagement scoring and sunset management

All URIs are relative to https://api.mailodds.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getDisengagedContacts()**](EngagementApi.md#getDisengagedContacts) | **GET** /v1/engagement/disengaged | List disengaged contacts |
| [**getEngagementScore()**](EngagementApi.md#getEngagementScore) | **GET** /v1/engagement/score/{email} | Get engagement score |
| [**getEngagementSummary()**](EngagementApi.md#getEngagementSummary) | **GET** /v1/engagement/summary | Get engagement summary |
| [**suppressDisengaged()**](EngagementApi.md#suppressDisengaged) | **POST** /v1/engagement/suppress-disengaged | Suppress disengaged contacts |


## `getDisengagedContacts()`

```php
getDisengagedContacts($inactive_days, $min_sends, $domain_id, $page, $per_page): \MailOdds\Model\GetDisengagedContacts200Response
```

List disengaged contacts

List contacts that have not engaged within the specified period. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\EngagementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$inactive_days = 90; // int | Days of inactivity
$min_sends = 5; // int | Minimum emails sent to qualify
$domain_id = 'domain_id_example'; // string | Filter by sending domain ID
$page = 1; // int
$per_page = 100; // int

try {
    $result = $apiInstance->getDisengagedContacts($inactive_days, $min_sends, $domain_id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EngagementApi->getDisengagedContacts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inactive_days** | **int**| Days of inactivity | [optional] [default to 90] |
| **min_sends** | **int**| Minimum emails sent to qualify | [optional] [default to 5] |
| **domain_id** | **string**| Filter by sending domain ID | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 100] |

### Return type

[**\MailOdds\Model\GetDisengagedContacts200Response**](../Model/GetDisengagedContacts200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEngagementScore()`

```php
getEngagementScore($email): \MailOdds\Model\GetEngagementScore200Response
```

Get engagement score

Get the engagement score for a specific email address. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\EngagementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email = 'email_example'; // string

try {
    $result = $apiInstance->getEngagementScore($email);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EngagementApi->getEngagementScore: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email** | **string**|  | |

### Return type

[**\MailOdds\Model\GetEngagementScore200Response**](../Model/GetEngagementScore200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEngagementSummary()`

```php
getEngagementSummary($domain_id): \MailOdds\Model\GetBounceStatsSummary200Response
```

Get engagement summary

Get aggregate engagement metrics across all contacts. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\EngagementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | Filter by sending domain ID

try {
    $result = $apiInstance->getEngagementSummary($domain_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EngagementApi->getEngagementSummary: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| Filter by sending domain ID | [optional] |

### Return type

[**\MailOdds\Model\GetBounceStatsSummary200Response**](../Model/GetBounceStatsSummary200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `suppressDisengaged()`

```php
suppressDisengaged($suppress_disengaged_request): \MailOdds\Model\SuppressDisengaged200Response
```

Suppress disengaged contacts

Add disengaged contacts to the suppression list. Supports dry_run mode. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\EngagementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$suppress_disengaged_request = new \MailOdds\Model\SuppressDisengagedRequest(); // \MailOdds\Model\SuppressDisengagedRequest

try {
    $result = $apiInstance->suppressDisengaged($suppress_disengaged_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EngagementApi->suppressDisengaged: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **suppress_disengaged_request** | [**\MailOdds\Model\SuppressDisengagedRequest**](../Model/SuppressDisengagedRequest.md)|  | |

### Return type

[**\MailOdds\Model\SuppressDisengaged200Response**](../Model/SuppressDisengaged200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
