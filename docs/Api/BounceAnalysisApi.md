# MailOdds\BounceAnalysisApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createBounceAnalysis()**](BounceAnalysisApi.md#createBounceAnalysis) | **POST** /v1/bounce-analyses | Analyze bounce logs |
| [**crossReferenceBounces()**](BounceAnalysisApi.md#crossReferenceBounces) | **GET** /v1/bounce-analyses/{analysis_id}/cross-reference | Cross-reference bounces with validation logs |
| [**deleteBounceAnalysis()**](BounceAnalysisApi.md#deleteBounceAnalysis) | **DELETE** /v1/bounce-analyses/{analysis_id} | Delete bounce analysis |
| [**getBounceAnalysis()**](BounceAnalysisApi.md#getBounceAnalysis) | **GET** /v1/bounce-analyses/{analysis_id} | Get bounce analysis |
| [**getBounceRecords()**](BounceAnalysisApi.md#getBounceRecords) | **GET** /v1/bounce-analyses/{analysis_id}/records | Get bounce records |


## `createBounceAnalysis()`

```php
createBounceAnalysis($create_bounce_analysis_request): \MailOdds\Model\BounceAnalysisResponse
```

Analyze bounce logs

Submit bounce log data for analysis. Identifies patterns, categorizes bounce types, and provides remediation recommendations.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BounceAnalysisApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_bounce_analysis_request = new \MailOdds\Model\CreateBounceAnalysisRequest(); // \MailOdds\Model\CreateBounceAnalysisRequest

try {
    $result = $apiInstance->createBounceAnalysis($create_bounce_analysis_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BounceAnalysisApi->createBounceAnalysis: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_bounce_analysis_request** | [**\MailOdds\Model\CreateBounceAnalysisRequest**](../Model/CreateBounceAnalysisRequest.md)|  | |

### Return type

[**\MailOdds\Model\BounceAnalysisResponse**](../Model/BounceAnalysisResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `crossReferenceBounces()`

```php
crossReferenceBounces($analysis_id): \MailOdds\Model\CrossReferenceBounces200Response
```

Cross-reference bounces with validation logs

Match bounced emails against your validation history to identify emails that were validated as deliverable but later bounced.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BounceAnalysisApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$analysis_id = 'analysis_id_example'; // string | Bounce analysis UUID

try {
    $result = $apiInstance->crossReferenceBounces($analysis_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BounceAnalysisApi->crossReferenceBounces: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **analysis_id** | **string**| Bounce analysis UUID | |

### Return type

[**\MailOdds\Model\CrossReferenceBounces200Response**](../Model/CrossReferenceBounces200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteBounceAnalysis()`

```php
deleteBounceAnalysis($analysis_id): \MailOdds\Model\DeletePolicyRule200Response
```

Delete bounce analysis

Delete a bounce analysis and all associated records.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BounceAnalysisApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$analysis_id = 'analysis_id_example'; // string | Bounce analysis ID

try {
    $result = $apiInstance->deleteBounceAnalysis($analysis_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BounceAnalysisApi->deleteBounceAnalysis: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **analysis_id** | **string**| Bounce analysis ID | |

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

## `getBounceAnalysis()`

```php
getBounceAnalysis($analysis_id): \MailOdds\Model\BounceAnalysisResponse
```

Get bounce analysis

Get the results of a bounce analysis including category breakdown, top offenders, and recommendations.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BounceAnalysisApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$analysis_id = 'analysis_id_example'; // string | Bounce analysis UUID

try {
    $result = $apiInstance->getBounceAnalysis($analysis_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BounceAnalysisApi->getBounceAnalysis: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **analysis_id** | **string**| Bounce analysis UUID | |

### Return type

[**\MailOdds\Model\BounceAnalysisResponse**](../Model/BounceAnalysisResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBounceRecords()`

```php
getBounceRecords($analysis_id, $page, $per_page, $type): \MailOdds\Model\GetBounceRecords200Response
```

Get bounce records

Get individual bounce records from an analysis with pagination.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BounceAnalysisApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$analysis_id = 'analysis_id_example'; // string | Bounce analysis UUID
$page = 1; // int | Page number
$per_page = 50; // int | Items per page
$type = 'type_example'; // string | Filter by bounce type

try {
    $result = $apiInstance->getBounceRecords($analysis_id, $page, $per_page, $type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BounceAnalysisApi->getBounceRecords: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **analysis_id** | **string**| Bounce analysis UUID | |
| **page** | **int**| Page number | [optional] [default to 1] |
| **per_page** | **int**| Items per page | [optional] [default to 50] |
| **type** | **string**| Filter by bounce type | [optional] |

### Return type

[**\MailOdds\Model\GetBounceRecords200Response**](../Model/GetBounceRecords200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
