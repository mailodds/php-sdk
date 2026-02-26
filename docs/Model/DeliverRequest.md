# # DeliverRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**to** | [**\MailOdds\Model\DeliverRequestToInner[]**](DeliverRequestToInner.md) | List of recipient email addresses |
**from** | **string** | Sender email address (must match sending domain) |
**subject** | **string** | Email subject line |
**html** | **string** | HTML email body | [optional]
**text** | **string** | Plain text email body | [optional]
**domain_id** | **string** | Sending domain UUID |
**reply_to** | **string** | Reply-to address | [optional]
**headers** | **object** | Extra email headers | [optional]
**tags** | **string[]** | Tags for categorization | [optional]
**campaign_type** | **string** | Campaign type for JSON-LD auto-generation | [optional]
**structured_data** | [**\MailOdds\Model\DeliverRequestStructuredData**](DeliverRequestStructuredData.md) |  | [optional]
**options** | [**\MailOdds\Model\DeliverRequestOptions**](DeliverRequestOptions.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
