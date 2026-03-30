# MailOdds\ReputationPoliciesApi



All URIs are relative to https://api.mailodds.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createReputationPolicy()**](ReputationPoliciesApi.md#createReputationPolicy) | **POST** /v1/reputation-policies | Create a reputation policy |
| [**createReputationPolicyFromPreset()**](ReputationPoliciesApi.md#createReputationPolicyFromPreset) | **POST** /v1/reputation-policies/from-preset | Create a reputation policy from preset |
| [**deleteReputationPolicy()**](ReputationPoliciesApi.md#deleteReputationPolicy) | **DELETE** /v1/reputation-policies/{policy_id} | Delete a reputation policy |
| [**getReputationPolicy()**](ReputationPoliciesApi.md#getReputationPolicy) | **GET** /v1/reputation-policies/{policy_id} | Get a reputation policy |
| [**getReputationPolicyStatus()**](ReputationPoliciesApi.md#getReputationPolicyStatus) | **GET** /v1/reputation-policies/{policy_id}/status | Get reputation policy status |
| [**listReputationPolicies()**](ReputationPoliciesApi.md#listReputationPolicies) | **GET** /v1/reputation-policies | List reputation policies |
| [**testReputationPolicy()**](ReputationPoliciesApi.md#testReputationPolicy) | **POST** /v1/reputation-policies/{policy_id}/test | Test a reputation policy |
| [**updateReputationPolicy()**](ReputationPoliciesApi.md#updateReputationPolicy) | **PUT** /v1/reputation-policies/{policy_id} | Update a reputation policy |


## `createReputationPolicy()`

```php
createReputationPolicy()
```

Create a reputation policy

Create a new reputation policy with custom rules and thresholds.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ReputationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->createReputationPolicy();
} catch (Exception $e) {
    echo 'Exception when calling ReputationPoliciesApi->createReputationPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createReputationPolicyFromPreset()`

```php
createReputationPolicyFromPreset()
```

Create a reputation policy from preset

Create a reputation policy from a predefined preset template.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ReputationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->createReputationPolicyFromPreset();
} catch (Exception $e) {
    echo 'Exception when calling ReputationPoliciesApi->createReputationPolicyFromPreset: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteReputationPolicy()`

```php
deleteReputationPolicy($policy_id)
```

Delete a reputation policy

Soft-delete a reputation policy.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ReputationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$policy_id = 'policy_id_example'; // string

try {
    $apiInstance->deleteReputationPolicy($policy_id);
} catch (Exception $e) {
    echo 'Exception when calling ReputationPoliciesApi->deleteReputationPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **policy_id** | **string**|  | |

### Return type

void (empty response body)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getReputationPolicy()`

```php
getReputationPolicy($policy_id)
```

Get a reputation policy

Retrieve a single reputation policy by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ReputationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$policy_id = 'policy_id_example'; // string

try {
    $apiInstance->getReputationPolicy($policy_id);
} catch (Exception $e) {
    echo 'Exception when calling ReputationPoliciesApi->getReputationPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **policy_id** | **string**|  | |

### Return type

void (empty response body)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getReputationPolicyStatus()`

```php
getReputationPolicyStatus($policy_id)
```

Get reputation policy status

Evaluate a policy and return per-domain status results.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ReputationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$policy_id = 'policy_id_example'; // string

try {
    $apiInstance->getReputationPolicyStatus($policy_id);
} catch (Exception $e) {
    echo 'Exception when calling ReputationPoliciesApi->getReputationPolicyStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **policy_id** | **string**|  | |

### Return type

void (empty response body)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listReputationPolicies()`

```php
listReputationPolicies()
```

List reputation policies

List all reputation policies for the account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ReputationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->listReputationPolicies();
} catch (Exception $e) {
    echo 'Exception when calling ReputationPoliciesApi->listReputationPolicies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `testReputationPolicy()`

```php
testReputationPolicy($policy_id)
```

Test a reputation policy

Dry-run evaluation of a reputation policy without applying actions.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ReputationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$policy_id = 'policy_id_example'; // string

try {
    $apiInstance->testReputationPolicy($policy_id);
} catch (Exception $e) {
    echo 'Exception when calling ReputationPoliciesApi->testReputationPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **policy_id** | **string**|  | |

### Return type

void (empty response body)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateReputationPolicy()`

```php
updateReputationPolicy($policy_id)
```

Update a reputation policy

Update an existing reputation policy.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\ReputationPoliciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$policy_id = 'policy_id_example'; // string

try {
    $apiInstance->updateReputationPolicy($policy_id);
} catch (Exception $e) {
    echo 'Exception when calling ReputationPoliciesApi->updateReputationPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **policy_id** | **string**|  | |

### Return type

void (empty response body)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
