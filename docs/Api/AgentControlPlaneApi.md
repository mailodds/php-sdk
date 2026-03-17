# MailOdds\AgentControlPlaneApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getMcpCapabilities()**](AgentControlPlaneApi.md#getMcpCapabilities) | **GET** /v1/mcp/capabilities | Get MCP capabilities |


## `getMcpCapabilities()`

```php
getMcpCapabilities(): \MailOdds\Model\McpCapabilities
```

Get MCP capabilities

Returns a static capability manifest listing all MCP tools organized by pillar. Used by AI agents for tool discovery and scope-based self-correction.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new MailOdds\Api\AgentControlPlaneApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->getMcpCapabilities();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AgentControlPlaneApi->getMcpCapabilities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\MailOdds\Model\McpCapabilities**](../Model/McpCapabilities.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
