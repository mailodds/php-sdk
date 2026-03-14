# # BounceAnalysisResponseAnalysis

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Analysis UUID | [optional]
**domain_id** | **string** |  | [optional]
**period** | **string** |  | [optional]
**status** | **string** |  | [optional]
**total_bounces** | **int** |  | [optional]
**hard_bounces** | **int** |  | [optional]
**soft_bounces** | **int** |  | [optional]
**categories** | [**\MailOdds\Model\BounceAnalysisResponseAnalysisCategories**](BounceAnalysisResponseAnalysisCategories.md) |  | [optional]
**top_domains** | [**\MailOdds\Model\BounceAnalysisResponseAnalysisTopDomainsInner[]**](BounceAnalysisResponseAnalysisTopDomainsInner.md) | Top bouncing recipient domains | [optional]
**recommendations** | **string[]** | Actionable recommendations to reduce bounces | [optional]
**created_at** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
