# MailOdds\AlertRulesApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createAlertRule()**](AlertRulesApi.md#createAlertRule) | **POST** /v1/alert-rules | Create alert rule |
| [**deleteAlertRule()**](AlertRulesApi.md#deleteAlertRule) | **DELETE** /v1/alert-rules/{rule_id} | Delete alert rule |
| [**getAlertRule()**](AlertRulesApi.md#getAlertRule) | **GET** /v1/alert-rules/{rule_id} | Get alert rule |
| [**listAlertRules()**](AlertRulesApi.md#listAlertRules) | **GET** /v1/alert-rules | List alert rules |
| [**updateAlertRule()**](AlertRulesApi.md#updateAlertRule) | **PUT** /v1/alert-rules/{rule_id} | Update alert rule |


## `createAlertRule()`

```php
createAlertRule($create_alert_rule_request): \MailOdds\Model\CreateAlertRule201Response
```

Create alert rule

Create a new metric threshold alert rule. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\AlertRulesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_alert_rule_request = new \MailOdds\Model\CreateAlertRuleRequest(); // \MailOdds\Model\CreateAlertRuleRequest

try {
    $result = $apiInstance->createAlertRule($create_alert_rule_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertRulesApi->createAlertRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_alert_rule_request** | [**\MailOdds\Model\CreateAlertRuleRequest**](../Model/CreateAlertRuleRequest.md)|  | |

### Return type

[**\MailOdds\Model\CreateAlertRule201Response**](../Model/CreateAlertRule201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAlertRule()`

```php
deleteAlertRule($rule_id): \MailOdds\Model\DeletePolicyRule200Response
```

Delete alert rule

Delete an alert rule. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\AlertRulesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rule_id = 'rule_id_example'; // string | Alert rule ID

try {
    $result = $apiInstance->deleteAlertRule($rule_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertRulesApi->deleteAlertRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rule_id** | **string**| Alert rule ID | |

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

## `getAlertRule()`

```php
getAlertRule($rule_id): \MailOdds\Model\CreateAlertRule201Response
```

Get alert rule

Get a single alert rule by ID. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\AlertRulesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rule_id = 'rule_id_example'; // string | Alert rule ID

try {
    $result = $apiInstance->getAlertRule($rule_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertRulesApi->getAlertRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rule_id** | **string**| Alert rule ID | |

### Return type

[**\MailOdds\Model\CreateAlertRule201Response**](../Model/CreateAlertRule201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAlertRules()`

```php
listAlertRules(): \MailOdds\Model\ListAlertRules200Response
```

List alert rules

List all configured alert rules. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\AlertRulesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listAlertRules();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertRulesApi->listAlertRules: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\MailOdds\Model\ListAlertRules200Response**](../Model/ListAlertRules200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAlertRule()`

```php
updateAlertRule($rule_id, $update_alert_rule_request): \MailOdds\Model\CreateAlertRule201Response
```

Update alert rule

Update an existing alert rule. Requires Growth+ plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\AlertRulesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rule_id = 'rule_id_example'; // string | Alert rule ID
$update_alert_rule_request = new \MailOdds\Model\UpdateAlertRuleRequest(); // \MailOdds\Model\UpdateAlertRuleRequest

try {
    $result = $apiInstance->updateAlertRule($rule_id, $update_alert_rule_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertRulesApi->updateAlertRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rule_id** | **string**| Alert rule ID | |
| **update_alert_rule_request** | [**\MailOdds\Model\UpdateAlertRuleRequest**](../Model/UpdateAlertRuleRequest.md)|  | |

### Return type

[**\MailOdds\Model\CreateAlertRule201Response**](../Model/CreateAlertRule201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
