# # Campaign

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Campaign UUID |
**name** | **string** | Campaign name |
**status** | **string** |  |
**list_id** | **string** | Target subscriber list UUID |
**domain_id** | **string** | Sending domain UUID |
**from_email** | **string** |  |
**from_name** | **string** |  | [optional]
**reply_to** | **string** |  | [optional]
**scheduled_at** | **\DateTime** |  | [optional]
**sent_at** | **\DateTime** |  | [optional]
**cancelled_at** | **\DateTime** |  | [optional]
**variant_count** | **int** | Number of A/B variants | [optional]
**stats** | [**\MailOdds\Model\CampaignStats**](CampaignStats.md) |  | [optional]
**created_at** | **\DateTime** |  |
**updated_at** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
