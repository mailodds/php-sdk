# # SpamCheck

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Spam check UUID | [optional]
**from_domain** | **string** |  | [optional]
**score** | **float** | Overall spam score (0-10, lower is better) | [optional]
**verdict** | **string** | Overall verdict | [optional]
**checks** | [**\MailOdds\Model\SpamCheckChecks**](SpamCheckChecks.md) |  | [optional]
**created_at** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
