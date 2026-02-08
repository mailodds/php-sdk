# OpenAPIClient-php

MailOdds provides email validation services to help maintain clean email lists 
and improve deliverability. The API performs multiple validation checks including 
format verification, domain validation, MX record checking, and disposable email detection.

## Authentication

All API requests require authentication using a Bearer token. Include your API key 
in the Authorization header:

```
Authorization: Bearer YOUR_API_KEY
```

API keys can be created in the MailOdds dashboard.

## Rate Limits

Rate limits vary by plan:
- Free: 10 requests/minute
- Starter: 60 requests/minute  
- Pro: 300 requests/minute
- Business: 1000 requests/minute
- Enterprise: Custom limits

## Response Format

All responses include:
- `schema_version`: API schema version (currently \"1.0\")
- `request_id`: Unique request identifier for debugging

Error responses include:
- `error`: Machine-readable error code
- `message`: Human-readable error description


For more information, please visit [https://mailodds.com/contact](https://mailodds.com/contact).

## Installation & Usage

### Requirements

PHP 8.1 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/mailodds/php-sdk.git"
    }
  ],
  "require": {
    "mailodds/php-sdk": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

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

## API Endpoints

All URIs are relative to *https://api.mailodds.com/v1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*BulkValidationApi* | [**cancelJob**](docs/Api/BulkValidationApi.md#canceljob) | **POST** /v1/jobs/{job_id}/cancel | Cancel a job
*BulkValidationApi* | [**createJob**](docs/Api/BulkValidationApi.md#createjob) | **POST** /v1/jobs | Create bulk validation job (JSON)
*BulkValidationApi* | [**createJobFromS3**](docs/Api/BulkValidationApi.md#createjobfroms3) | **POST** /v1/jobs/upload/s3 | Create job from S3 upload
*BulkValidationApi* | [**createJobUpload**](docs/Api/BulkValidationApi.md#createjobupload) | **POST** /v1/jobs/upload | Create bulk validation job (file upload)
*BulkValidationApi* | [**deleteJob**](docs/Api/BulkValidationApi.md#deletejob) | **DELETE** /v1/jobs/{job_id} | Delete a job
*BulkValidationApi* | [**getJob**](docs/Api/BulkValidationApi.md#getjob) | **GET** /v1/jobs/{job_id} | Get job status
*BulkValidationApi* | [**getJobResults**](docs/Api/BulkValidationApi.md#getjobresults) | **GET** /v1/jobs/{job_id}/results | Get job results
*BulkValidationApi* | [**getPresignedUpload**](docs/Api/BulkValidationApi.md#getpresignedupload) | **POST** /v1/jobs/upload/presigned | Get S3 presigned upload URL
*BulkValidationApi* | [**listJobs**](docs/Api/BulkValidationApi.md#listjobs) | **GET** /v1/jobs | List validation jobs
*EmailValidationApi* | [**validateBatch**](docs/Api/EmailValidationApi.md#validatebatch) | **POST** /v1/validate/batch | Validate multiple emails (sync)
*EmailValidationApi* | [**validateEmail**](docs/Api/EmailValidationApi.md#validateemail) | **POST** /v1/validate | Validate single email
*SuppressionListsApi* | [**addSuppression**](docs/Api/SuppressionListsApi.md#addsuppression) | **POST** /v1/suppression | Add suppression entries
*SuppressionListsApi* | [**checkSuppression**](docs/Api/SuppressionListsApi.md#checksuppression) | **POST** /v1/suppression/check | Check suppression status
*SuppressionListsApi* | [**getSuppressionStats**](docs/Api/SuppressionListsApi.md#getsuppressionstats) | **GET** /v1/suppression/stats | Get suppression statistics
*SuppressionListsApi* | [**listSuppression**](docs/Api/SuppressionListsApi.md#listsuppression) | **GET** /v1/suppression | List suppression entries
*SuppressionListsApi* | [**removeSuppression**](docs/Api/SuppressionListsApi.md#removesuppression) | **DELETE** /v1/suppression | Remove suppression entries
*SystemApi* | [**getTelemetrySummary**](docs/Api/SystemApi.md#gettelemetrysummary) | **GET** /v1/telemetry/summary | Get validation telemetry
*SystemApi* | [**healthCheck**](docs/Api/SystemApi.md#healthcheck) | **GET** /health | Health check
*ValidationPoliciesApi* | [**addPolicyRule**](docs/Api/ValidationPoliciesApi.md#addpolicyrule) | **POST** /v1/policies/{policy_id}/rules | Add rule to policy
*ValidationPoliciesApi* | [**createPolicy**](docs/Api/ValidationPoliciesApi.md#createpolicy) | **POST** /v1/policies | Create policy
*ValidationPoliciesApi* | [**createPolicyFromPreset**](docs/Api/ValidationPoliciesApi.md#createpolicyfrompreset) | **POST** /v1/policies/from-preset | Create policy from preset
*ValidationPoliciesApi* | [**deletePolicy**](docs/Api/ValidationPoliciesApi.md#deletepolicy) | **DELETE** /v1/policies/{policy_id} | Delete policy
*ValidationPoliciesApi* | [**deletePolicyRule**](docs/Api/ValidationPoliciesApi.md#deletepolicyrule) | **DELETE** /v1/policies/{policy_id}/rules/{rule_id} | Delete rule
*ValidationPoliciesApi* | [**getPolicy**](docs/Api/ValidationPoliciesApi.md#getpolicy) | **GET** /v1/policies/{policy_id} | Get policy
*ValidationPoliciesApi* | [**getPolicyPresets**](docs/Api/ValidationPoliciesApi.md#getpolicypresets) | **GET** /v1/policies/presets | Get policy presets
*ValidationPoliciesApi* | [**listPolicies**](docs/Api/ValidationPoliciesApi.md#listpolicies) | **GET** /v1/policies | List policies
*ValidationPoliciesApi* | [**testPolicy**](docs/Api/ValidationPoliciesApi.md#testpolicy) | **POST** /v1/policies/test | Test policy evaluation
*ValidationPoliciesApi* | [**updatePolicy**](docs/Api/ValidationPoliciesApi.md#updatepolicy) | **PUT** /v1/policies/{policy_id} | Update policy

## Models

- [AddPolicyRule201Response](docs/Model/AddPolicyRule201Response.md)
- [AddSuppressionRequest](docs/Model/AddSuppressionRequest.md)
- [AddSuppressionRequestEntriesInner](docs/Model/AddSuppressionRequestEntriesInner.md)
- [AddSuppressionResponse](docs/Model/AddSuppressionResponse.md)
- [CheckSuppressionRequest](docs/Model/CheckSuppressionRequest.md)
- [CreateJobFromS3Request](docs/Model/CreateJobFromS3Request.md)
- [CreateJobRequest](docs/Model/CreateJobRequest.md)
- [CreatePolicyFromPresetRequest](docs/Model/CreatePolicyFromPresetRequest.md)
- [CreatePolicyRequest](docs/Model/CreatePolicyRequest.md)
- [DeleteJob200Response](docs/Model/DeleteJob200Response.md)
- [DeletePolicy200Response](docs/Model/DeletePolicy200Response.md)
- [DeletePolicyRule200Response](docs/Model/DeletePolicyRule200Response.md)
- [ErrorResponse](docs/Model/ErrorResponse.md)
- [GetPresignedUploadRequest](docs/Model/GetPresignedUploadRequest.md)
- [HealthCheck200Response](docs/Model/HealthCheck200Response.md)
- [Job](docs/Model/Job.md)
- [JobListResponse](docs/Model/JobListResponse.md)
- [JobResponse](docs/Model/JobResponse.md)
- [JobSummary](docs/Model/JobSummary.md)
- [Pagination](docs/Model/Pagination.md)
- [Policy](docs/Model/Policy.md)
- [PolicyListResponse](docs/Model/PolicyListResponse.md)
- [PolicyListResponseLimits](docs/Model/PolicyListResponseLimits.md)
- [PolicyPresetsResponse](docs/Model/PolicyPresetsResponse.md)
- [PolicyPresetsResponsePresetsInner](docs/Model/PolicyPresetsResponsePresetsInner.md)
- [PolicyResponse](docs/Model/PolicyResponse.md)
- [PolicyRule](docs/Model/PolicyRule.md)
- [PolicyRuleAction](docs/Model/PolicyRuleAction.md)
- [PolicyTestResponse](docs/Model/PolicyTestResponse.md)
- [PresignedUploadResponse](docs/Model/PresignedUploadResponse.md)
- [PresignedUploadResponseUpload](docs/Model/PresignedUploadResponseUpload.md)
- [RemoveSuppression200Response](docs/Model/RemoveSuppression200Response.md)
- [RemoveSuppressionRequest](docs/Model/RemoveSuppressionRequest.md)
- [ResultsResponse](docs/Model/ResultsResponse.md)
- [SuppressionCheckResponse](docs/Model/SuppressionCheckResponse.md)
- [SuppressionEntry](docs/Model/SuppressionEntry.md)
- [SuppressionListResponse](docs/Model/SuppressionListResponse.md)
- [SuppressionStatsResponse](docs/Model/SuppressionStatsResponse.md)
- [SuppressionStatsResponseByType](docs/Model/SuppressionStatsResponseByType.md)
- [TelemetrySummary](docs/Model/TelemetrySummary.md)
- [TelemetrySummaryRates](docs/Model/TelemetrySummaryRates.md)
- [TelemetrySummaryTopDomainsInner](docs/Model/TelemetrySummaryTopDomainsInner.md)
- [TelemetrySummaryTopReasonsInner](docs/Model/TelemetrySummaryTopReasonsInner.md)
- [TelemetrySummaryTotals](docs/Model/TelemetrySummaryTotals.md)
- [TestPolicyRequest](docs/Model/TestPolicyRequest.md)
- [TestPolicyRequestTestResult](docs/Model/TestPolicyRequestTestResult.md)
- [UpdatePolicyRequest](docs/Model/UpdatePolicyRequest.md)
- [ValidateBatch200Response](docs/Model/ValidateBatch200Response.md)
- [ValidateBatch200ResponseSummary](docs/Model/ValidateBatch200ResponseSummary.md)
- [ValidateBatchRequest](docs/Model/ValidateBatchRequest.md)
- [ValidateRequest](docs/Model/ValidateRequest.md)
- [ValidationResponse](docs/Model/ValidationResponse.md)
- [ValidationResponsePolicyApplied](docs/Model/ValidationResponsePolicyApplied.md)
- [ValidationResponseSuppressionMatch](docs/Model/ValidationResponseSuppressionMatch.md)
- [ValidationResult](docs/Model/ValidationResult.md)

## Authorization

Authentication schemes defined for the API:
### BearerAuth

- **Type**: Bearer authentication

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

support@mailodds.com

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.0.0`
    - Generator version: `7.19.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
