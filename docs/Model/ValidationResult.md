# # ValidationResult

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **string** |  |
**status** | **string** |  |
**sub_status** | **string** | Detailed reason. Omitted when none. | [optional]
**action** | **string** |  |
**domain** | **string** | Email domain |
**mx_host** | **string** | Primary MX hostname. Omitted when not resolved. | [optional]
**checks** | **array<string,mixed>** | Detailed check results (JSONB). Omitted when not available. | [optional]
**suppression** | [**\MailOdds\Model\ValidationResultSuppression**](ValidationResultSuppression.md) |  | [optional]
**processed_at** | **\DateTime** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
