# # GetDmarcRecommendation200ResponseRecommendation

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**current_policy** | **string** | Current DMARC policy (none, quarantine, reject) | [optional]
**recommended_policy** | **string** | Recommended DMARC policy | [optional]
**confidence** | **float** | Confidence level (0-1) | [optional]
**reasons** | **string[]** | Reasons for the recommendation | [optional]
**ready_to_upgrade** | **bool** | Whether it is safe to upgrade | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
