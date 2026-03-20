# MailOdds\OAuth20Api



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createToken()**](OAuth20Api.md#createToken) | **POST** /oauth/token | Create token |
| [**getJwks()**](OAuth20Api.md#getJwks) | **GET** /.well-known/jwks.json | Get JSON Web Key Set |
| [**introspectToken()**](OAuth20Api.md#introspectToken) | **POST** /oauth/introspect | Introspect token |
| [**oauthServerMetadata()**](OAuth20Api.md#oauthServerMetadata) | **GET** /.well-known/oauth-authorization-server | OAuth server metadata |
| [**revokeToken()**](OAuth20Api.md#revokeToken) | **POST** /oauth/revoke | Revoke token |


## `createToken()`

```php
createToken($grant_type, $code, $redirect_uri, $client_id, $client_secret, $refresh_token, $scope, $code_verifier): \MailOdds\Model\CreateToken200Response
```

Create token

Exchange an authorization code, client credentials, or refresh token for access and refresh tokens. Authenticate via client_secret_post or client_secret_basic.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new MailOdds\Api\OAuth20Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$grant_type = 'grant_type_example'; // string
$code = 'code_example'; // string | Authorization code (for authorization_code grant)
$redirect_uri = 'redirect_uri_example'; // string | Must match the original redirect_uri
$client_id = 'client_id_example'; // string
$client_secret = 'client_secret_example'; // string
$refresh_token = 'refresh_token_example'; // string | Refresh token (for refresh_token grant)
$scope = 'scope_example'; // string | Space-separated scopes
$code_verifier = 'code_verifier_example'; // string | PKCE code verifier

try {
    $result = $apiInstance->createToken($grant_type, $code, $redirect_uri, $client_id, $client_secret, $refresh_token, $scope, $code_verifier);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OAuth20Api->createToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grant_type** | **string**|  | |
| **code** | **string**| Authorization code (for authorization_code grant) | [optional] |
| **redirect_uri** | **string**| Must match the original redirect_uri | [optional] |
| **client_id** | **string**|  | [optional] |
| **client_secret** | **string**|  | [optional] |
| **refresh_token** | **string**| Refresh token (for refresh_token grant) | [optional] |
| **scope** | **string**| Space-separated scopes | [optional] |
| **code_verifier** | **string**| PKCE code verifier | [optional] |

### Return type

[**\MailOdds\Model\CreateToken200Response**](../Model/CreateToken200Response.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getJwks()`

```php
getJwks(): \MailOdds\Model\JwksResponse
```

Get JSON Web Key Set

Public key set for verifying JWT access tokens issued by this server.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new MailOdds\Api\OAuth20Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->getJwks();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OAuth20Api->getJwks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\MailOdds\Model\JwksResponse**](../Model/JwksResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `introspectToken()`

```php
introspectToken($token, $token_type_hint, $client_id, $client_secret): \MailOdds\Model\IntrospectToken200Response
```

Introspect token

Introspect a token to determine its active state and metadata (RFC 7662). Requires client authentication.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new MailOdds\Api\OAuth20Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = 'token_example'; // string | Token to introspect
$token_type_hint = 'token_type_hint_example'; // string
$client_id = 'client_id_example'; // string
$client_secret = 'client_secret_example'; // string

try {
    $result = $apiInstance->introspectToken($token, $token_type_hint, $client_id, $client_secret);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OAuth20Api->introspectToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token** | **string**| Token to introspect | |
| **token_type_hint** | **string**|  | [optional] |
| **client_id** | **string**|  | [optional] |
| **client_secret** | **string**|  | [optional] |

### Return type

[**\MailOdds\Model\IntrospectToken200Response**](../Model/IntrospectToken200Response.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `oauthServerMetadata()`

```php
oauthServerMetadata(): \MailOdds\Model\OAuthServerMetadata
```

OAuth server metadata

OAuth 2.0 Authorization Server Metadata (RFC 8414). Returns server configuration including supported grant types, scopes, and endpoints.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new MailOdds\Api\OAuth20Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->oauthServerMetadata();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OAuth20Api->oauthServerMetadata: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\MailOdds\Model\OAuthServerMetadata**](../Model/OAuthServerMetadata.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `revokeToken()`

```php
revokeToken($token, $token_type_hint, $client_id, $client_secret)
```

Revoke token

Revoke an access or refresh token (RFC 7009). Requires client authentication. Always returns 200 per spec to prevent token scanning.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new MailOdds\Api\OAuth20Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = 'token_example'; // string | Token to revoke
$token_type_hint = 'token_type_hint_example'; // string
$client_id = 'client_id_example'; // string
$client_secret = 'client_secret_example'; // string

try {
    $apiInstance->revokeToken($token, $token_type_hint, $client_id, $client_secret);
} catch (Exception $e) {
    echo 'Exception when calling OAuth20Api->revokeToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token** | **string**| Token to revoke | |
| **token_type_hint** | **string**|  | [optional] |
| **client_id** | **string**|  | [optional] |
| **client_secret** | **string**|  | [optional] |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
