# # PolicyRule

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional]
**type** | **string** | Rule type determines how condition is evaluated |
**condition** | **object** | Condition depends on rule type. status_override: {status}, domain_filter: {domain_mode, domains}, check_requirement: {check, required}, sub_status_override: {sub_status} |
**action** | [**\MailOdds\Model\PolicyRuleAction**](PolicyRuleAction.md) |  |
**sequence** | **int** |  | [optional]
**is_enabled** | **bool** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
