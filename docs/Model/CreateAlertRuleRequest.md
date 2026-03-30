# # CreateAlertRuleRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**metric** | **string** | Metric to monitor (e.g., bounce_rate, complaint_rate) |
**threshold** | **float** | Threshold value (0-1, e.g. 0.02 for 2%) |
**channel** | **string** | Notification channel (e.g., webhook) |
**window_minutes** | **int** | Evaluation window in minutes (15, 60, 1440, or 2880) | [optional] [default to 60]
**enabled** | **bool** |  | [optional] [default to true]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
