# # BatchDeliverResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**schema_version** | **string** |  | [optional]
**request_id** | **string** | Unique request identifier | [optional]
**total** | **int** | Total recipients submitted | [optional]
**accepted** | **int** | Number of recipients accepted for delivery | [optional]
**rejected** | [**\MailOdds\Model\BatchDeliverResponseRejectedInner[]**](BatchDeliverResponseRejectedInner.md) | Recipients that were rejected (suppressed or failed validation) | [optional]
**status** | **string** | Batch status | [optional]
**delivery** | [**\MailOdds\Model\BatchDeliverResponseDelivery**](BatchDeliverResponseDelivery.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
