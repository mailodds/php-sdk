# # Job

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**name** | **string** | Job name (from metadata or auto-generated) |
**status** | **string** |  |
**total_count** | **int** |  |
**processed_count** | **int** |  |
**summary** | [**\MailOdds\Model\JobSummary**](JobSummary.md) |  | [optional]
**created_at** | **\DateTime** |  |
**started_at** | **\DateTime** | When processing began. Omitted if not yet started. | [optional]
**completed_at** | **\DateTime** | Omitted if not yet completed. | [optional]
**results_expire_at** | **\DateTime** | When job results will be purged |
**metadata** | **object** | Custom metadata attached at creation | [optional]
**error_message** | **string** | Error details. Present only for failed jobs. | [optional]
**request_id** | **string** | Request ID from the job creation request | [optional]
**artifacts** | [**\MailOdds\Model\JobArtifacts**](JobArtifacts.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
