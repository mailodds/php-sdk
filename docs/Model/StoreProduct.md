# # StoreProduct

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Product UUID | [optional]
**store_id** | **string** | Store connection UUID | [optional]
**external_id** | **string** | Product ID in the source store | [optional]
**sku** | **string** |  | [optional]
**title** | **string** |  | [optional]
**description** | **string** |  | [optional]
**price_current** | **float** | Current price | [optional]
**price_original** | **float** | Original price (before discount) | [optional]
**currency** | **string** |  | [optional] [default to 'USD']
**sale_start** | **\DateTime** |  | [optional]
**sale_end** | **\DateTime** |  | [optional]
**stock_status** | **string** |  | [optional]
**stock_quantity** | **int** |  | [optional]
**image_url** | **string** |  | [optional]
**additional_images** | **string[]** |  | [optional]
**categories** | **string[]** |  | [optional]
**tags** | **string[]** |  | [optional]
**product_url** | **string** |  | [optional]
**variants** | **object[]** |  | [optional]
**is_active** | **bool** |  | [optional]
**created_at** | **\DateTime** |  | [optional]
**updated_at** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
