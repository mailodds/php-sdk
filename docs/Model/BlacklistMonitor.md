# # BlacklistMonitor

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Monitor UUID | [optional]
**target** | **string** | IP address or domain being monitored | [optional]
**target_type** | **string** |  | [optional]
**status** | **string** | Current status (clean, listed) | [optional]
**listed_count** | **int** | Number of blacklists currently listing this target | [optional]
**last_checked_at** | **\DateTime** |  | [optional]
**latest_check** | [**\MailOdds\Model\BlacklistMonitorLatestCheck**](BlacklistMonitorLatestCheck.md) |  | [optional]
**created_at** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
