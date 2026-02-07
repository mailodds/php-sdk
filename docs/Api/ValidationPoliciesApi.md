# MailOdds\ValidationPoliciesApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addPolicyRule()**](ValidationPoliciesApi.md#addPolicyRule) | **POST** /v1/policies/{policy_id}/rules | Add rule to policy |
| [**createPolicy()**](ValidationPoliciesApi.md#createPolicy) | **POST** /v1/policies | Create policy |
| [**createPolicyFromPreset()**](ValidationPoliciesApi.md#createPolicyFromPreset) | **POST** /v1/policies/from-preset | Create policy from preset |
| [**deletePolicy()**](ValidationPoliciesApi.md#deletePolicy) | **DELETE** /v1/policies/{policy_id} | Delete policy |
| [**deletePolicyRule()**](ValidationPoliciesApi.md#deletePolicyRule) | **DELETE** /v1/policies/{policy_id}/rules/{rule_id} | Delete rule |
| [**getPolicy()**](ValidationPoliciesApi.md#getPolicy) | **GET** /v1/policies/{policy_id} | Get policy |
| [**getPolicyPresets()**](ValidationPoliciesApi.md#getPolicyPresets) | **GET** /v1/policies/presets | Get policy presets |
| [**listPolicies()**](ValidationPoliciesApi.md#listPolicies) | **GET** /v1/policies | List policies |
| [**testPolicy()**](ValidationPoliciesApi.md#testPolicy) | **POST** /v1/policies/test | Test policy evaluation |
| [**updatePolicy()**](ValidationPoliciesApi.md#updatePolicy) | **PUT** /v1/policies/{policy_id} | Update policy |


## `addPolicyRule()`

```php
addPolicyRule($policy_id, $policy_rule): \MailOdds\Model\AddPolicyRule201Response
```

Add rule to policy

Add a new rule to an existing policy.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ValidationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$policy_id = 56; // int
$policy_rule = new \MailOdds\Model\PolicyRule(); // \MailOdds\Model\PolicyRule

try {
    $result = $apiInstance->addPolicyRule($policy_id, $policy_rule);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ValidationPoliciesApi->addPolicyRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **policy_id** | **int**|  | |
| **policy_rule** | [**\MailOdds\Model\PolicyRule**](../Model/PolicyRule.md)|  | |

### Return type

[**\MailOdds\Model\AddPolicyRule201Response**](../Model/AddPolicyRule201Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createPolicy()`

```php
createPolicy($create_policy_request): \MailOdds\Model\PolicyResponse
```

Create policy

Create a new validation policy with rules.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ValidationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_policy_request = new \MailOdds\Model\CreatePolicyRequest(); // \MailOdds\Model\CreatePolicyRequest

try {
    $result = $apiInstance->createPolicy($create_policy_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ValidationPoliciesApi->createPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_policy_request** | [**\MailOdds\Model\CreatePolicyRequest**](../Model/CreatePolicyRequest.md)|  | |

### Return type

[**\MailOdds\Model\PolicyResponse**](../Model/PolicyResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createPolicyFromPreset()`

```php
createPolicyFromPreset($create_policy_from_preset_request): \MailOdds\Model\PolicyResponse
```

Create policy from preset

Create a policy using a preset template.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ValidationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_policy_from_preset_request = new \MailOdds\Model\CreatePolicyFromPresetRequest(); // \MailOdds\Model\CreatePolicyFromPresetRequest

try {
    $result = $apiInstance->createPolicyFromPreset($create_policy_from_preset_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ValidationPoliciesApi->createPolicyFromPreset: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_policy_from_preset_request** | [**\MailOdds\Model\CreatePolicyFromPresetRequest**](../Model/CreatePolicyFromPresetRequest.md)|  | |

### Return type

[**\MailOdds\Model\PolicyResponse**](../Model/PolicyResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deletePolicy()`

```php
deletePolicy($policy_id): \MailOdds\Model\DeletePolicy200Response
```

Delete policy

Delete a policy and all its rules.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ValidationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$policy_id = 56; // int

try {
    $result = $apiInstance->deletePolicy($policy_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ValidationPoliciesApi->deletePolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **policy_id** | **int**|  | |

### Return type

[**\MailOdds\Model\DeletePolicy200Response**](../Model/DeletePolicy200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deletePolicyRule()`

```php
deletePolicyRule($policy_id, $rule_id): \MailOdds\Model\DeletePolicyRule200Response
```

Delete rule

Delete a rule from a policy.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ValidationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$policy_id = 56; // int
$rule_id = 56; // int

try {
    $result = $apiInstance->deletePolicyRule($policy_id, $rule_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ValidationPoliciesApi->deletePolicyRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **policy_id** | **int**|  | |
| **rule_id** | **int**|  | |

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

## `getPolicy()`

```php
getPolicy($policy_id): \MailOdds\Model\PolicyResponse
```

Get policy

Get a single policy with its rules.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ValidationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$policy_id = 56; // int

try {
    $result = $apiInstance->getPolicy($policy_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ValidationPoliciesApi->getPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **policy_id** | **int**|  | |

### Return type

[**\MailOdds\Model\PolicyResponse**](../Model/PolicyResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPolicyPresets()`

```php
getPolicyPresets(): \MailOdds\Model\PolicyPresetsResponse
```

Get policy presets

Get available preset templates for quick policy creation.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ValidationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getPolicyPresets();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ValidationPoliciesApi->getPolicyPresets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\MailOdds\Model\PolicyPresetsResponse**](../Model/PolicyPresetsResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPolicies()`

```php
listPolicies($include_rules): \MailOdds\Model\PolicyListResponse
```

List policies

List all validation policies for your account. Includes plan limits.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ValidationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$include_rules = false; // bool | Include full rules in response

try {
    $result = $apiInstance->listPolicies($include_rules);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ValidationPoliciesApi->listPolicies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **include_rules** | **bool**| Include full rules in response | [optional] [default to false] |

### Return type

[**\MailOdds\Model\PolicyListResponse**](../Model/PolicyListResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `testPolicy()`

```php
testPolicy($test_policy_request): \MailOdds\Model\PolicyTestResponse
```

Test policy evaluation

Test how a policy would evaluate a validation result without affecting production.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ValidationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$test_policy_request = new \MailOdds\Model\TestPolicyRequest(); // \MailOdds\Model\TestPolicyRequest

try {
    $result = $apiInstance->testPolicy($test_policy_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ValidationPoliciesApi->testPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **test_policy_request** | [**\MailOdds\Model\TestPolicyRequest**](../Model/TestPolicyRequest.md)|  | |

### Return type

[**\MailOdds\Model\PolicyTestResponse**](../Model/PolicyTestResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updatePolicy()`

```php
updatePolicy($policy_id, $update_policy_request): \MailOdds\Model\PolicyResponse
```

Update policy

Update a policy's settings (name, enabled, default).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ValidationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$policy_id = 56; // int
$update_policy_request = new \MailOdds\Model\UpdatePolicyRequest(); // \MailOdds\Model\UpdatePolicyRequest

try {
    $result = $apiInstance->updatePolicy($policy_id, $update_policy_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ValidationPoliciesApi->updatePolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **policy_id** | **int**|  | |
| **update_policy_request** | [**\MailOdds\Model\UpdatePolicyRequest**](../Model/UpdatePolicyRequest.md)|  | |

### Return type

[**\MailOdds\Model\PolicyResponse**](../Model/PolicyResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
