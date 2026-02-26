# # DeliverResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**schema_version** | **string** |  | [optional]
**request_id** | **string** | Unique request identifier | [optional]
**message_id** | **string** | Unique message identifier | [optional]
**status** | **string** | Delivery status | [optional]
**delivery** | [**\MailOdds\Model\DeliverResponseDelivery**](DeliverResponseDelivery.md) |  | [optional]
**validation** | **object** | Pre-send validation results (when validate_first is true) | [optional]
**content_scan** | **object** | Content scan results | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
