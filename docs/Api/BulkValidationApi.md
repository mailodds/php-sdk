# MailOdds\BulkValidationApi



All URIs are relative to https://api.mailodds.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cancelJob()**](BulkValidationApi.md#cancelJob) | **POST** /v1/jobs/{job_id}/cancel | Cancel a job |
| [**createJob()**](BulkValidationApi.md#createJob) | **POST** /v1/jobs | Create bulk validation job (JSON) |
| [**createJobFromS3()**](BulkValidationApi.md#createJobFromS3) | **POST** /v1/jobs/upload/s3 | Create job from S3 upload |
| [**createJobUpload()**](BulkValidationApi.md#createJobUpload) | **POST** /v1/jobs/upload | Create bulk validation job (file upload) |
| [**deleteJob()**](BulkValidationApi.md#deleteJob) | **DELETE** /v1/jobs/{job_id} | Delete a job |
| [**getJob()**](BulkValidationApi.md#getJob) | **GET** /v1/jobs/{job_id} | Get job status |
| [**getJobResults()**](BulkValidationApi.md#getJobResults) | **GET** /v1/jobs/{job_id}/results | Get job results |
| [**getPresignedUpload()**](BulkValidationApi.md#getPresignedUpload) | **POST** /v1/jobs/upload/presigned | Get S3 presigned upload URL |
| [**listJobs()**](BulkValidationApi.md#listJobs) | **GET** /v1/jobs | List validation jobs |


## `cancelJob()`

```php
cancelJob($job_id): \MailOdds\Model\JobResponse
```

Cancel a job

Cancel a pending or processing job. Partial results are preserved.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BulkValidationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$job_id = 'job_id_example'; // string

try {
    $result = $apiInstance->cancelJob($job_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BulkValidationApi->cancelJob: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **job_id** | **string**|  | |

### Return type

[**\MailOdds\Model\JobResponse**](../Model/JobResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createJob()`

```php
createJob($create_job_request): \MailOdds\Model\JobResponse
```

Create bulk validation job (JSON)

Create a new bulk validation job by submitting a JSON array of emails.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BulkValidationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_job_request = new \MailOdds\Model\CreateJobRequest(); // \MailOdds\Model\CreateJobRequest

try {
    $result = $apiInstance->createJob($create_job_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BulkValidationApi->createJob: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_job_request** | [**\MailOdds\Model\CreateJobRequest**](../Model/CreateJobRequest.md)|  | |

### Return type

[**\MailOdds\Model\JobResponse**](../Model/JobResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createJobFromS3()`

```php
createJobFromS3($create_job_from_s3_request): \MailOdds\Model\JobResponse
```

Create job from S3 upload

Create a validation job from a file previously uploaded to S3.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BulkValidationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_job_from_s3_request = new \MailOdds\Model\CreateJobFromS3Request(); // \MailOdds\Model\CreateJobFromS3Request

try {
    $result = $apiInstance->createJobFromS3($create_job_from_s3_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BulkValidationApi->createJobFromS3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_job_from_s3_request** | [**\MailOdds\Model\CreateJobFromS3Request**](../Model/CreateJobFromS3Request.md)|  | |

### Return type

[**\MailOdds\Model\JobResponse**](../Model/JobResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createJobUpload()`

```php
createJobUpload($file, $dedup, $metadata): \MailOdds\Model\JobResponse
```

Create bulk validation job (file upload)

Create a new bulk validation job by uploading a CSV, Excel, or TXT file.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BulkValidationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = '/path/to/file.txt'; // \SplFileObject | CSV, Excel (.xlsx, .xls), ODS, or TXT file
$dedup = false; // bool | Remove duplicate emails
$metadata = 'metadata_example'; // string | JSON metadata for the job

try {
    $result = $apiInstance->createJobUpload($file, $dedup, $metadata);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BulkValidationApi->createJobUpload: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file** | **\SplFileObject****\SplFileObject**| CSV, Excel (.xlsx, .xls), ODS, or TXT file | |
| **dedup** | **bool**| Remove duplicate emails | [optional] [default to false] |
| **metadata** | **string**| JSON metadata for the job | [optional] |

### Return type

[**\MailOdds\Model\JobResponse**](../Model/JobResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteJob()`

```php
deleteJob($job_id): \MailOdds\Model\DeleteJob200Response
```

Delete a job

Permanently delete a completed or cancelled job and its results.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BulkValidationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$job_id = 'job_id_example'; // string

try {
    $result = $apiInstance->deleteJob($job_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BulkValidationApi->deleteJob: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **job_id** | **string**|  | |

### Return type

[**\MailOdds\Model\DeleteJob200Response**](../Model/DeleteJob200Response.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getJob()`

```php
getJob($job_id): \MailOdds\Model\JobResponse
```

Get job status

Get the status and details of a specific validation job.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BulkValidationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$job_id = 'job_id_example'; // string

try {
    $result = $apiInstance->getJob($job_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BulkValidationApi->getJob: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **job_id** | **string**|  | |

### Return type

[**\MailOdds\Model\JobResponse**](../Model/JobResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getJobResults()`

```php
getJobResults($job_id, $format, $filter, $page, $per_page): \MailOdds\Model\ResultsResponse
```

Get job results

Download validation results in JSON, CSV, or NDJSON format.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BulkValidationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$job_id = 'job_id_example'; // string
$format = 'json'; // string
$filter = 'filter_example'; // string
$page = 1; // int
$per_page = 1000; // int

try {
    $result = $apiInstance->getJobResults($job_id, $format, $filter, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BulkValidationApi->getJobResults: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **job_id** | **string**|  | |
| **format** | **string**|  | [optional] [default to &#39;json&#39;] |
| **filter** | **string**|  | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 1000] |

### Return type

[**\MailOdds\Model\ResultsResponse**](../Model/ResultsResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `text/csv`, `application/x-ndjson`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPresignedUpload()`

```php
getPresignedUpload($get_presigned_upload_request): \MailOdds\Model\PresignedUploadResponse
```

Get S3 presigned upload URL

Get a presigned URL for uploading large files (>10MB) directly to S3.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BulkValidationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$get_presigned_upload_request = new \MailOdds\Model\GetPresignedUploadRequest(); // \MailOdds\Model\GetPresignedUploadRequest

try {
    $result = $apiInstance->getPresignedUpload($get_presigned_upload_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BulkValidationApi->getPresignedUpload: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **get_presigned_upload_request** | [**\MailOdds\Model\GetPresignedUploadRequest**](../Model/GetPresignedUploadRequest.md)|  | |

### Return type

[**\MailOdds\Model\PresignedUploadResponse**](../Model/PresignedUploadResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listJobs()`

```php
listJobs($page, $per_page, $status): \MailOdds\Model\JobListResponse
```

List validation jobs

List all validation jobs for the authenticated account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: BearerAuth
$config = MailOdds\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MailOdds\Api\BulkValidationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$per_page = 20; // int
$status = 'status_example'; // string

try {
    $result = $apiInstance->listJobs($page, $per_page, $status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BulkValidationApi->listJobs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 20] |
| **status** | **string**|  | [optional] |

### Return type

[**\MailOdds\Model\JobListResponse**](../Model/JobListResponse.md)

### Authorization

[BearerAuth](../../README.md#BearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
