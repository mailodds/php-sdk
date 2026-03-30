# MailOdds\CampaignAnalyticsApi



All URIs are relative to https://api.mailodds.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getCampaignABResults()**](CampaignAnalyticsApi.md#getCampaignABResults) | **GET** /v1/campaigns/{campaign_id}/ab-results | Get A/B test results |
| [**getCampaignAttribution()**](CampaignAnalyticsApi.md#getCampaignAttribution) | **GET** /v1/campaigns/{campaign_id}/conversions/attribution | Get campaign attribution |
| [**getCampaignDeliveryConfidence()**](CampaignAnalyticsApi.md#getCampaignDeliveryConfidence) | **GET** /v1/campaigns/{campaign_id}/delivery-confidence | Get pre-send delivery confidence |
| [**getCampaignFunnel()**](CampaignAnalyticsApi.md#getCampaignFunnel) | **GET** /v1/campaigns/{campaign_id}/funnel | Get campaign funnel |
| [**getCampaignProviderIntelligence()**](CampaignAnalyticsApi.md#getCampaignProviderIntelligence) | **GET** /v1/campaigns/{campaign_id}/provider-intelligence | Get provider intelligence |


## `getCampaignABResults()`

```php
getCampaignABResults($campaign_id): \MailOdds\Model\GetCampaignABResults200Response
```

Get A/B test results

Get per-variant performance metrics for an A/B test campaign including open rate, click rate, and statistical confidence.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\CampaignAnalyticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 'campaign_id_example'; // string | Campaign UUID

try {
    $result = $apiInstance->getCampaignABResults($campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignAnalyticsApi->getCampaignABResults: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Campaign UUID | |

### Return type

[**\MailOdds\Model\GetCampaignABResults200Response**](../Model/GetCampaignABResults200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCampaignAttribution()`

```php
getCampaignAttribution($campaign_id): \MailOdds\Model\GetCampaignAttribution200Response
```

Get campaign attribution

Get first-touch and last-touch attribution comparison for campaign conversions.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\CampaignAnalyticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 'campaign_id_example'; // string | Campaign UUID

try {
    $result = $apiInstance->getCampaignAttribution($campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignAnalyticsApi->getCampaignAttribution: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Campaign UUID | |

### Return type

[**\MailOdds\Model\GetCampaignAttribution200Response**](../Model/GetCampaignAttribution200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCampaignDeliveryConfidence()`

```php
getCampaignDeliveryConfidence($campaign_id): \MailOdds\Model\GetCampaignDeliveryConfidence200Response
```

Get pre-send delivery confidence

Get a predicted delivery confidence score before sending a campaign. Evaluates list quality, sender reputation, and domain authentication.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\CampaignAnalyticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 'campaign_id_example'; // string | Campaign UUID

try {
    $result = $apiInstance->getCampaignDeliveryConfidence($campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignAnalyticsApi->getCampaignDeliveryConfidence: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Campaign UUID | |

### Return type

[**\MailOdds\Model\GetCampaignDeliveryConfidence200Response**](../Model/GetCampaignDeliveryConfidence200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCampaignFunnel()`

```php
getCampaignFunnel($campaign_id): \MailOdds\Model\GetCampaignFunnel200Response
```

Get campaign funnel

Get the full delivery and engagement funnel for a campaign showing progression from sent through delivered, opened, and clicked.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\CampaignAnalyticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 'campaign_id_example'; // string | Campaign UUID

try {
    $result = $apiInstance->getCampaignFunnel($campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignAnalyticsApi->getCampaignFunnel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Campaign UUID | |

### Return type

[**\MailOdds\Model\GetCampaignFunnel200Response**](../Model/GetCampaignFunnel200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCampaignProviderIntelligence()`

```php
getCampaignProviderIntelligence($campaign_id): \MailOdds\Model\GetCampaignProviderIntelligence200Response
```

Get provider intelligence

Get per-provider delivery and engagement breakdown for a campaign (e.g. Gmail, Outlook, Yahoo).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\CampaignAnalyticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 'campaign_id_example'; // string | Campaign UUID

try {
    $result = $apiInstance->getCampaignProviderIntelligence($campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignAnalyticsApi->getCampaignProviderIntelligence: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Campaign UUID | |

### Return type

[**\MailOdds\Model\GetCampaignProviderIntelligence200Response**](../Model/GetCampaignProviderIntelligence200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
