# MailOdds\ContentClassificationApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**classifyContent()**](ContentClassificationApi.md#classifyContent) | **POST** /v1/content-check | Classify email content |


## `classifyContent()`

```php
classifyContent($classify_content_request): \MailOdds\Model\ClassifyContent200Response
```

Classify email content

Run LLM-powered content analysis on email content. Detects spam signals, compliance issues, and content quality. Provide either subject+html_body or raw content text.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ContentClassificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$classify_content_request = new \MailOdds\Model\ClassifyContentRequest(); // \MailOdds\Model\ClassifyContentRequest

try {
    $result = $apiInstance->classifyContent($classify_content_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContentClassificationApi->classifyContent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **classify_content_request** | [**\MailOdds\Model\ClassifyContentRequest**](../Model/ClassifyContentRequest.md)|  | |

### Return type

[**\MailOdds\Model\ClassifyContent200Response**](../Model/ClassifyContent200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
