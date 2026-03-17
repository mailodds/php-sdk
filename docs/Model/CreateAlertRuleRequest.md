# # CreateAlertRuleRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**metric** | **string** | Metric to monitor (e.g., bounce_rate, complaint_rate) |
**threshold** | **float** | Threshold value to trigger alert |
**channel** | **string** | Notification channel (e.g., webhook) |
**window_minutes** | **int** | Evaluation window in minutes | [optional] [default to 60]
**enabled** | **bool** |  | [optional] [default to true]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
