# # CreateJobRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**emails** | **string[]** | List of emails to validate |
**dedup** | **bool** | Remove duplicate emails | [optional] [default to false]
**metadata** | **object** | Custom metadata for the job | [optional]
**webhook_url** | **string** | URL for completion webhook | [optional]
**idempotency_key** | **string** | Unique key for idempotent requests | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
