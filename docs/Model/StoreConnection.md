# # StoreConnection

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Store connection UUID | [optional]
**account_id** | **int** |  | [optional]
**platform** | **string** | E-commerce platform | [optional]
**store_name** | **string** |  | [optional]
**store_url** | **string** |  | [optional]
**status** | **string** |  | [optional]
**auth_method** | **string** |  | [optional]
**product_count** | **int** | Number of active products | [optional]
**last_synced_at** | **\DateTime** |  | [optional]
**last_error** | **string** | Last sync error message | [optional]
**sync_interval_seconds** | **int** | Auto-sync interval in seconds | [optional] [default to 3600]
**settings** | **object** | Platform-specific settings | [optional]
**created_at** | **\DateTime** |  | [optional]
**updated_at** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
