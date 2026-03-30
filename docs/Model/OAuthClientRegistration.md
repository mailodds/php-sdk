# # OAuthClientRegistration

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**client_id** | **string** | Issued client identifier |
**client_name** | **string** | Human-readable client name |
**redirect_uris** | **string[]** | Registered redirect URIs |
**grant_types** | **string[]** | Allowed grant types |
**response_types** | **string[]** | Allowed response types |
**token_endpoint_auth_method** | **string** | Token endpoint auth method |
**scope** | **string** | Allowed scope | [optional]
**client_id_issued_at** | **int** | Unix timestamp of client registration |
**client_secret** | **string** | Client secret (only for confidential clients, shown once) | [optional]
**client_secret_expires_at** | **int** | Secret expiry (0 &#x3D; never) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
