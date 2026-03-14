# # ServerTest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Test UUID | [optional]
**domain** | **string** | Tested domain | [optional]
**status** | **string** | Test status | [optional]
**mx_records** | [**\MailOdds\Model\ServerTestMxRecordsInner[]**](ServerTestMxRecordsInner.md) |  | [optional]
**smtp_check** | [**\MailOdds\Model\ServerTestSmtpCheck**](ServerTestSmtpCheck.md) |  | [optional]
**dns_checks** | [**\MailOdds\Model\ServerTestDnsChecks**](ServerTestDnsChecks.md) |  | [optional]
**score** | **int** | Overall server configuration score (0-100) | [optional]
**recommendations** | **string[]** |  | [optional]
**created_at** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
