# MailOdds\CampaignsApi

Create and send email campaigns with A/B testing

All URIs are relative to https://api.mailodds.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cancelCampaign()**](CampaignsApi.md#cancelCampaign) | **POST** /v1/campaigns/{campaign_id}/cancel | Cancel a campaign |
| [**createCampaign()**](CampaignsApi.md#createCampaign) | **POST** /v1/campaigns | Create a campaign |
| [**createCampaignVariant()**](CampaignsApi.md#createCampaignVariant) | **POST** /v1/campaigns/{campaign_id}/variants | Create A/B variant |
| [**getCampaign()**](CampaignsApi.md#getCampaign) | **GET** /v1/campaigns/{campaign_id} | Get campaign with stats |
| [**listCampaigns()**](CampaignsApi.md#listCampaigns) | **GET** /v1/campaigns | List campaigns |
| [**scheduleCampaign()**](CampaignsApi.md#scheduleCampaign) | **POST** /v1/campaigns/{campaign_id}/schedule | Schedule a campaign |
| [**sendCampaign()**](CampaignsApi.md#sendCampaign) | **POST** /v1/campaigns/{campaign_id}/send | Send a campaign |


## `cancelCampaign()`

```php
cancelCampaign($campaign_id): \MailOdds\Model\CampaignResponse
```

Cancel a campaign

Cancel a scheduled or in-progress campaign. Messages already delivered are not recalled.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\CampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 'campaign_id_example'; // string | Campaign UUID

try {
    $result = $apiInstance->cancelCampaign($campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->cancelCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Campaign UUID | |

### Return type

[**\MailOdds\Model\CampaignResponse**](../Model/CampaignResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createCampaign()`

```php
createCampaign($create_campaign_request): \MailOdds\Model\CampaignResponse
```

Create a campaign

Create a new email campaign. Campaigns target a subscriber list and support A/B variant testing.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\CampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_campaign_request = new \MailOdds\Model\CreateCampaignRequest(); // \MailOdds\Model\CreateCampaignRequest

try {
    $result = $apiInstance->createCampaign($create_campaign_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->createCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_campaign_request** | [**\MailOdds\Model\CreateCampaignRequest**](../Model/CreateCampaignRequest.md)|  | |

### Return type

[**\MailOdds\Model\CampaignResponse**](../Model/CampaignResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createCampaignVariant()`

```php
createCampaignVariant($campaign_id, $create_variant_request): \MailOdds\Model\CreateCampaignVariant201Response
```

Create A/B variant

Add an A/B test variant to a campaign. Each variant has its own subject, body, and traffic weight. The campaign must be in draft status.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\CampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 'campaign_id_example'; // string | Campaign UUID
$create_variant_request = new \MailOdds\Model\CreateVariantRequest(); // \MailOdds\Model\CreateVariantRequest

try {
    $result = $apiInstance->createCampaignVariant($campaign_id, $create_variant_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->createCampaignVariant: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Campaign UUID | |
| **create_variant_request** | [**\MailOdds\Model\CreateVariantRequest**](../Model/CreateVariantRequest.md)|  | |

### Return type

[**\MailOdds\Model\CreateCampaignVariant201Response**](../Model/CreateCampaignVariant201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCampaign()`

```php
getCampaign($campaign_id): \MailOdds\Model\CampaignResponse
```

Get campaign with stats

Get a campaign by ID including delivery statistics and engagement metrics.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\CampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 'campaign_id_example'; // string | Campaign UUID

try {
    $result = $apiInstance->getCampaign($campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->getCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Campaign UUID | |

### Return type

[**\MailOdds\Model\CampaignResponse**](../Model/CampaignResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCampaigns()`

```php
listCampaigns($page, $per_page, $status): \MailOdds\Model\ListCampaigns200Response
```

List campaigns

List all campaigns for the authenticated account with pagination.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\CampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page number
$per_page = 25; // int | Items per page
$status = 'status_example'; // string | Filter by campaign status

try {
    $result = $apiInstance->listCampaigns($page, $per_page, $status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->listCampaigns: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page number | [optional] [default to 1] |
| **per_page** | **int**| Items per page | [optional] [default to 25] |
| **status** | **string**| Filter by campaign status | [optional] |

### Return type

[**\MailOdds\Model\ListCampaigns200Response**](../Model/ListCampaigns200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `scheduleCampaign()`

```php
scheduleCampaign($campaign_id, $schedule_campaign_request): \MailOdds\Model\CampaignResponse
```

Schedule a campaign

Schedule a campaign for future delivery. Provide a send_at timestamp in ISO 8601 format.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\CampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 'campaign_id_example'; // string | Campaign UUID
$schedule_campaign_request = new \MailOdds\Model\ScheduleCampaignRequest(); // \MailOdds\Model\ScheduleCampaignRequest

try {
    $result = $apiInstance->scheduleCampaign($campaign_id, $schedule_campaign_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->scheduleCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Campaign UUID | |
| **schedule_campaign_request** | [**\MailOdds\Model\ScheduleCampaignRequest**](../Model/ScheduleCampaignRequest.md)|  | |

### Return type

[**\MailOdds\Model\CampaignResponse**](../Model/CampaignResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendCampaign()`

```php
sendCampaign($campaign_id): \MailOdds\Model\CampaignResponse
```

Send a campaign

Begin sending a campaign immediately. The campaign must be in draft status with at least one variant and a target list.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\CampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 'campaign_id_example'; // string | Campaign UUID

try {
    $result = $apiInstance->sendCampaign($campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->sendCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **string**| Campaign UUID | |

### Return type

[**\MailOdds\Model\CampaignResponse**](../Model/CampaignResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
