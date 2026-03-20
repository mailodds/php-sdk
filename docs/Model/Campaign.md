# # Campaign

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Campaign UUID |
**account_id** | **int** |  | [optional]
**name** | **string** | Campaign name |
**status** | **string** |  |
**domain_id** | **string** | Sending domain UUID |
**subject** | **string** |  | [optional]
**from_address** | **string** | Sender email address |
**reply_to** | **string** |  | [optional]
**html_body** | **string** |  | [optional]
**text_body** | **string** |  | [optional]
**html_body_dark** | **string** |  | [optional]
**text_body_dark** | **string** |  | [optional]
**campaign_type** | **string** |  | [optional]
**auto_detect_schema** | **bool** |  | [optional]
**promo_annotations** | **object** |  | [optional]
**throwaway_policy** | **string** |  | [optional]
**scheduled_at** | **\DateTime** |  | [optional]
**started_at** | **\DateTime** |  | [optional]
**completed_at** | **\DateTime** |  | [optional]
**recipient_count** | **int** |  | [optional]
**is_ab_test** | **bool** |  | [optional]
**winning_variant_id** | **string** |  | [optional]
**ab_test_config** | **object** |  | [optional]
**error_message** | **string** |  | [optional]
**stats** | [**\MailOdds\Model\CampaignStats**](CampaignStats.md) |  | [optional]
**open_rate** | **float** |  | [optional]
**click_rate** | **float** |  | [optional]
**created_at** | **\DateTime** |  |
**updated_at** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
