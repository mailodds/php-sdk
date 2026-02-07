# # ValidationResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**schema_version** | **string** |  | [optional]
**email** | **string** |  |
**status** | **string** | Validation status |
**sub_status** | **string** | Detailed status reason | [optional]
**action** | **string** | Recommended action |
**domain** | **string** |  | [optional]
**mx_found** | **bool** |  | [optional]
**smtp_check** | **bool** |  | [optional]
**disposable** | **bool** |  | [optional]
**role_account** | **bool** |  | [optional]
**free_provider** | **bool** |  | [optional]
**suppression_match** | [**\MailOdds\Model\ValidationResponseSuppressionMatch**](ValidationResponseSuppressionMatch.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
