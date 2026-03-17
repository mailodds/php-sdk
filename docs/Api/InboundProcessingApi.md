# MailOdds\InboundProcessingApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**correctInboundMessage()**](InboundProcessingApi.md#correctInboundMessage) | **PATCH** /v1/inbound-messages/{message_id}/correction | Correct inbound message classification |
| [**getBounceStats()**](InboundProcessingApi.md#getBounceStats) | **GET** /v1/bounce-stats | Get bounce statistics |
| [**getBounceStatsSummary()**](InboundProcessingApi.md#getBounceStatsSummary) | **GET** /v1/bounce-stats/summary | Get bounce statistics summary |
| [**getComplaintAssessment()**](InboundProcessingApi.md#getComplaintAssessment) | **GET** /v1/complaint-assessment | Get complaint assessment |
| [**getInboundMessage()**](InboundProcessingApi.md#getInboundMessage) | **GET** /v1/inbound-messages/{message_id} | Get inbound message |
| [**listInboundMessages()**](InboundProcessingApi.md#listInboundMessages) | **GET** /v1/inbound-messages | List inbound messages |


## `correctInboundMessage()`

```php
correctInboundMessage($message_id, $correct_inbound_message_request): \MailOdds\Model\GetInboundMessage200Response
```

Correct inbound message classification

Submit a human correction for an inbound message classification. Requires Pro+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\InboundProcessingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$message_id = 'message_id_example'; // string | Message ID
$correct_inbound_message_request = new \MailOdds\Model\CorrectInboundMessageRequest(); // \MailOdds\Model\CorrectInboundMessageRequest

try {
    $result = $apiInstance->correctInboundMessage($message_id, $correct_inbound_message_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundProcessingApi->correctInboundMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **message_id** | **string**| Message ID | |
| **correct_inbound_message_request** | [**\MailOdds\Model\CorrectInboundMessageRequest**](../Model/CorrectInboundMessageRequest.md)|  | |

### Return type

[**\MailOdds\Model\GetInboundMessage200Response**](../Model/GetInboundMessage200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBounceStats()`

```php
getBounceStats($domain_id, $period, $group_by): \MailOdds\Model\GetBounceStats200Response
```

Get bounce statistics

Get bounce and complaint statistics grouped by time period. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\InboundProcessingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | Filter by sending domain ID
$period = '7d'; // string | Time period
$group_by = 'day'; // string | Grouping interval

try {
    $result = $apiInstance->getBounceStats($domain_id, $period, $group_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundProcessingApi->getBounceStats: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| Filter by sending domain ID | [optional] |
| **period** | **string**| Time period | [optional] [default to &#39;7d&#39;] |
| **group_by** | **string**| Grouping interval | [optional] [default to &#39;day&#39;] |

### Return type

[**\MailOdds\Model\GetBounceStats200Response**](../Model/GetBounceStats200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBounceStatsSummary()`

```php
getBounceStatsSummary($domain_id, $period): \MailOdds\Model\GetBounceStatsSummary200Response
```

Get bounce statistics summary

Get aggregated bounce and complaint statistics. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\InboundProcessingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | Filter by sending domain ID
$period = '30d'; // string | Time period

try {
    $result = $apiInstance->getBounceStatsSummary($domain_id, $period);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundProcessingApi->getBounceStatsSummary: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| Filter by sending domain ID | [optional] |
| **period** | **string**| Time period | [optional] [default to &#39;30d&#39;] |

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

## `getComplaintAssessment()`

```php
getComplaintAssessment($domain_id, $period): \MailOdds\Model\GetComplaintAssessment200Response
```

Get complaint assessment

Assess complaint risk based on recent inbound data. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\InboundProcessingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | Filter by sending domain ID
$period = '30d'; // string | Time period

try {
    $result = $apiInstance->getComplaintAssessment($domain_id, $period);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundProcessingApi->getComplaintAssessment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| Filter by sending domain ID | [optional] |
| **period** | **string**| Time period | [optional] [default to &#39;30d&#39;] |

### Return type

[**\MailOdds\Model\GetComplaintAssessment200Response**](../Model/GetComplaintAssessment200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getInboundMessage()`

```php
getInboundMessage($message_id): \MailOdds\Model\GetInboundMessage200Response
```

Get inbound message

Get a single inbound message with full body content. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\InboundProcessingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$message_id = 'message_id_example'; // string | Message ID

try {
    $result = $apiInstance->getInboundMessage($message_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundProcessingApi->getInboundMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **message_id** | **string**| Message ID | |

### Return type

[**\MailOdds\Model\GetInboundMessage200Response**](../Model/GetInboundMessage200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listInboundMessages()`

```php
listInboundMessages($category, $domain_id, $since, $until, $is_read, $recipient, $search, $page, $per_page): \MailOdds\Model\ListInboundMessages200Response
```

List inbound messages

List inbound messages (bounces, complaints, replies, OOO). Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\InboundProcessingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$category = 'category_example'; // string | Filter by category
$domain_id = 'domain_id_example'; // string | Filter by sending domain ID
$since = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Start date (ISO 8601)
$until = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | End date (ISO 8601)
$is_read = True; // bool | Filter by read status
$recipient = 'recipient_example'; // string | Filter by original recipient
$search = 'search_example'; // string | Search in subject and body
$page = 1; // int
$per_page = 50; // int

try {
    $result = $apiInstance->listInboundMessages($category, $domain_id, $since, $until, $is_read, $recipient, $search, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundProcessingApi->listInboundMessages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **category** | **string**| Filter by category | [optional] |
| **domain_id** | **string**| Filter by sending domain ID | [optional] |
| **since** | **\DateTime**| Start date (ISO 8601) | [optional] |
| **until** | **\DateTime**| End date (ISO 8601) | [optional] |
| **is_read** | **bool**| Filter by read status | [optional] |
| **recipient** | **string**| Filter by original recipient | [optional] |
| **search** | **string**| Search in subject and body | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 50] |

### Return type

[**\MailOdds\Model\ListInboundMessages200Response**](../Model/ListInboundMessages200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
