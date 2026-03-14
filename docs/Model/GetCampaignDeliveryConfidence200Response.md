# # GetCampaignDeliveryConfidence200Response

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**schema_version** | **string** |  | [optional]
**request_id** | **string** | Unique request identifier | [optional]
**campaign_id** | **string** |  | [optional]
**confidence_score** | **int** | Predicted delivery confidence (0-100) | [optional]
**factors** | [**\MailOdds\Model\GetCampaignDeliveryConfidence200ResponseFactors**](GetCampaignDeliveryConfidence200ResponseFactors.md) |  | [optional]
**recommendations** | **string[]** | Actionable recommendations to improve delivery confidence | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
