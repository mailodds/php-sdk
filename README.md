# OpenAPIClient-php

MailOdds is an email platform for validation, sending, campaigns, deliverability monitoring, and analytics. The API performs multi-layer validation checks, delivers transactional and campaign email with DKIM dual signing, and tracks engagement with privacy-first analytics.

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

## Webhooks

MailOdds can send webhook notifications for job completion and email delivery events.
Configure webhooks in the dashboard or per-job via the `webhook_url` field.

### Event Types

| Event | Description |
|-------|-------------|
| `job.completed` | Validation job finished processing |
| `job.failed` | Validation job failed |
| `message.queued` | Email queued for delivery |
| `message.delivered` | Email delivered to recipient |
| `message.bounced` | Email bounced |
| `message.deferred` | Email delivery deferred |
| `message.failed` | Email delivery failed |
| `message.opened` | Recipient opened the email |
| `message.clicked` | Recipient clicked a link |

### Payload Format

```json
{
  \"event\": \"job.completed\",
  \"job\": { ... },
  \"timestamp\": \"2026-01-15T10:30:00Z\"
}
```

### Webhook Signing

If a webhook secret is configured, each request includes an `X-MailOdds-Signature` header
containing an HMAC-SHA256 hex digest of the request body.

**Verification pseudocode:**
```
expected = HMAC-SHA256(webhook_secret, request_body)
valid = constant_time_compare(request.headers[\"X-MailOdds-Signature\"], hex(expected))
```

The payload is serialized with compact JSON (no extra whitespace, sorted keys) before signing.

### Headers

All webhook requests include:
- `Content-Type: application/json`
- `User-Agent: MailOdds-Webhook/1.0`
- `X-MailOdds-Event: {event_type}`
- `X-Request-Id: {uuid}`
- `X-MailOdds-Signature: {hmac}` (when secret is configured)

### Retry Policy

Failed deliveries (non-2xx response or timeout) are retried up to 3 times with exponential backoff (10s, 60s, 300s).


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


$apiInstance = new MailOdds\Api\BlacklistMonitoringApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$add_blacklist_monitor_request = new \MailOdds\Model\AddBlacklistMonitorRequest(); // \MailOdds\Model\AddBlacklistMonitorRequest

try {
    $result = $apiInstance->addBlacklistMonitor($add_blacklist_monitor_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlacklistMonitoringApi->addBlacklistMonitor: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.mailodds.com/v1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*BlacklistMonitoringApi* | [**addBlacklistMonitor**](docs/Api/BlacklistMonitoringApi.md#addblacklistmonitor) | **POST** /v1/blacklist-monitors | Add blacklist monitor
*BlacklistMonitoringApi* | [**getBlacklistHistory**](docs/Api/BlacklistMonitoringApi.md#getblacklisthistory) | **GET** /v1/blacklist-monitors/{monitor_id}/history | Get blacklist check history
*BlacklistMonitoringApi* | [**listBlacklistMonitors**](docs/Api/BlacklistMonitoringApi.md#listblacklistmonitors) | **GET** /v1/blacklist-monitors | List blacklist monitors
*BlacklistMonitoringApi* | [**runBlacklistCheck**](docs/Api/BlacklistMonitoringApi.md#runblacklistcheck) | **POST** /v1/blacklist-monitors/{monitor_id}/check | Run blacklist check
*BounceAnalysisApi* | [**createBounceAnalysis**](docs/Api/BounceAnalysisApi.md#createbounceanalysis) | **POST** /v1/bounce-analyses | Analyze bounce logs
*BounceAnalysisApi* | [**crossReferenceBounces**](docs/Api/BounceAnalysisApi.md#crossreferencebounces) | **GET** /v1/bounce-analyses/{analysis_id}/cross-reference | Cross-reference bounces with validation logs
*BounceAnalysisApi* | [**getBounceAnalysis**](docs/Api/BounceAnalysisApi.md#getbounceanalysis) | **GET** /v1/bounce-analyses/{analysis_id} | Get bounce analysis
*BounceAnalysisApi* | [**getBounceRecords**](docs/Api/BounceAnalysisApi.md#getbouncerecords) | **GET** /v1/bounce-analyses/{analysis_id}/records | Get bounce records
*BulkValidationApi* | [**cancelJob**](docs/Api/BulkValidationApi.md#canceljob) | **POST** /v1/jobs/{job_id}/cancel | Cancel a job
*BulkValidationApi* | [**createJob**](docs/Api/BulkValidationApi.md#createjob) | **POST** /v1/jobs | Create bulk validation job (JSON)
*BulkValidationApi* | [**createJobFromS3**](docs/Api/BulkValidationApi.md#createjobfroms3) | **POST** /v1/jobs/upload/s3 | Create job from S3 upload
*BulkValidationApi* | [**createJobUpload**](docs/Api/BulkValidationApi.md#createjobupload) | **POST** /v1/jobs/upload | Create bulk validation job (file upload)
*BulkValidationApi* | [**deleteJob**](docs/Api/BulkValidationApi.md#deletejob) | **DELETE** /v1/jobs/{job_id} | Delete a job
*BulkValidationApi* | [**getJob**](docs/Api/BulkValidationApi.md#getjob) | **GET** /v1/jobs/{job_id} | Get job status
*BulkValidationApi* | [**getJobResults**](docs/Api/BulkValidationApi.md#getjobresults) | **GET** /v1/jobs/{job_id}/results | Get job results
*BulkValidationApi* | [**getPresignedUpload**](docs/Api/BulkValidationApi.md#getpresignedupload) | **POST** /v1/jobs/upload/presigned | Get S3 presigned upload URL
*BulkValidationApi* | [**listJobs**](docs/Api/BulkValidationApi.md#listjobs) | **GET** /v1/jobs | List validation jobs
*CampaignAnalyticsApi* | [**getCampaignABResults**](docs/Api/CampaignAnalyticsApi.md#getcampaignabresults) | **GET** /v1/campaigns/{campaign_id}/ab-results | Get A/B test results
*CampaignAnalyticsApi* | [**getCampaignAttribution**](docs/Api/CampaignAnalyticsApi.md#getcampaignattribution) | **GET** /v1/campaigns/{campaign_id}/conversions/attribution | Get campaign attribution
*CampaignAnalyticsApi* | [**getCampaignDeliveryConfidence**](docs/Api/CampaignAnalyticsApi.md#getcampaigndeliveryconfidence) | **GET** /v1/campaigns/{campaign_id}/delivery-confidence | Get pre-send delivery confidence
*CampaignAnalyticsApi* | [**getCampaignFunnel**](docs/Api/CampaignAnalyticsApi.md#getcampaignfunnel) | **GET** /v1/campaigns/{campaign_id}/funnel | Get campaign funnel
*CampaignAnalyticsApi* | [**getCampaignProviderIntelligence**](docs/Api/CampaignAnalyticsApi.md#getcampaignproviderintelligence) | **GET** /v1/campaigns/{campaign_id}/provider-intelligence | Get provider intelligence
*CampaignsApi* | [**cancelCampaign**](docs/Api/CampaignsApi.md#cancelcampaign) | **POST** /v1/campaigns/{campaign_id}/cancel | Cancel a campaign
*CampaignsApi* | [**createCampaign**](docs/Api/CampaignsApi.md#createcampaign) | **POST** /v1/campaigns | Create a campaign
*CampaignsApi* | [**createCampaignVariant**](docs/Api/CampaignsApi.md#createcampaignvariant) | **POST** /v1/campaigns/{campaign_id}/variants | Create A/B variant
*CampaignsApi* | [**getCampaign**](docs/Api/CampaignsApi.md#getcampaign) | **GET** /v1/campaigns/{campaign_id} | Get campaign with stats
*CampaignsApi* | [**listCampaigns**](docs/Api/CampaignsApi.md#listcampaigns) | **GET** /v1/campaigns | List campaigns
*CampaignsApi* | [**scheduleCampaign**](docs/Api/CampaignsApi.md#schedulecampaign) | **POST** /v1/campaigns/{campaign_id}/schedule | Schedule a campaign
*CampaignsApi* | [**sendCampaign**](docs/Api/CampaignsApi.md#sendcampaign) | **POST** /v1/campaigns/{campaign_id}/send | Send a campaign
*ContactListsApi* | [**appendToContactList**](docs/Api/ContactListsApi.md#appendtocontactlist) | **POST** /v1/contact-lists/{list_id}/append | Append to contact list
*ContactListsApi* | [**createContactList**](docs/Api/ContactListsApi.md#createcontactlist) | **POST** /v1/contact-lists | Create contact list
*ContactListsApi* | [**getInactiveContactsReport**](docs/Api/ContactListsApi.md#getinactivecontactsreport) | **GET** /v1/contacts/inactive-report | Get inactive contacts report
*ContactListsApi* | [**listContactLists**](docs/Api/ContactListsApi.md#listcontactlists) | **GET** /v1/contact-lists | List contact lists
*ContactListsApi* | [**queryContactList**](docs/Api/ContactListsApi.md#querycontactlist) | **POST** /v1/contact-lists/{list_id}/query | Query contact list
*ContentClassificationApi* | [**classifyContent**](docs/Api/ContentClassificationApi.md#classifycontent) | **POST** /v1/content-check | Classify email content
*DMARCMonitoringApi* | [**addDmarcDomain**](docs/Api/DMARCMonitoringApi.md#adddmarcdomain) | **POST** /v1/dmarc-domains | Add DMARC domain
*DMARCMonitoringApi* | [**getDmarcDomain**](docs/Api/DMARCMonitoringApi.md#getdmarcdomain) | **GET** /v1/dmarc-domains/{domain_id} | Get DMARC domain
*DMARCMonitoringApi* | [**getDmarcRecommendation**](docs/Api/DMARCMonitoringApi.md#getdmarcrecommendation) | **GET** /v1/dmarc-domains/{domain_id}/recommendation | Get DMARC policy recommendation
*DMARCMonitoringApi* | [**getDmarcSources**](docs/Api/DMARCMonitoringApi.md#getdmarcsources) | **GET** /v1/dmarc-domains/{domain_id}/sources | Get DMARC sending sources
*DMARCMonitoringApi* | [**getDmarcTrend**](docs/Api/DMARCMonitoringApi.md#getdmarctrend) | **GET** /v1/dmarc-domains/{domain_id}/trend | Get DMARC trend
*DMARCMonitoringApi* | [**listDmarcDomains**](docs/Api/DMARCMonitoringApi.md#listdmarcdomains) | **GET** /v1/dmarc-domains | List DMARC domains
*DMARCMonitoringApi* | [**verifyDmarcDomain**](docs/Api/DMARCMonitoringApi.md#verifydmarcdomain) | **POST** /v1/dmarc-domains/{domain_id}/verify | Verify DMARC DNS records
*EmailSendingApi* | [**deliverBatch**](docs/Api/EmailSendingApi.md#deliverbatch) | **POST** /v1/deliver/batch | Send to multiple recipients (max 100)
*EmailSendingApi* | [**deliverEmail**](docs/Api/EmailSendingApi.md#deliveremail) | **POST** /v1/deliver | Send a single email
*EmailValidationApi* | [**validateBatch**](docs/Api/EmailValidationApi.md#validatebatch) | **POST** /v1/validate/batch | Validate multiple emails (sync)
*EmailValidationApi* | [**validateEmail**](docs/Api/EmailValidationApi.md#validateemail) | **POST** /v1/validate | Validate single email
*MessageEventsApi* | [**getMessageEvents**](docs/Api/MessageEventsApi.md#getmessageevents) | **GET** /v1/message-events | Get message events
*SenderHealthApi* | [**getSenderHealth**](docs/Api/SenderHealthApi.md#getsenderhealth) | **GET** /v1/sender-health | Get sender health score
*SenderHealthApi* | [**getSenderHealthTrend**](docs/Api/SenderHealthApi.md#getsenderhealthtrend) | **GET** /v1/sender-health/trend | Get sender health trend
*SendingDomainsApi* | [**createSendingDomain**](docs/Api/SendingDomainsApi.md#createsendingdomain) | **POST** /v1/sending-domains | Add a sending domain
*SendingDomainsApi* | [**deleteSendingDomain**](docs/Api/SendingDomainsApi.md#deletesendingdomain) | **DELETE** /v1/sending-domains/{domain_id} | Delete a sending domain
*SendingDomainsApi* | [**getSendingDomain**](docs/Api/SendingDomainsApi.md#getsendingdomain) | **GET** /v1/sending-domains/{domain_id} | Get a sending domain
*SendingDomainsApi* | [**getSendingDomainIdentityScore**](docs/Api/SendingDomainsApi.md#getsendingdomainidentityscore) | **GET** /v1/sending-domains/{domain_id}/identity-score | Get domain identity score
*SendingDomainsApi* | [**getSendingStats**](docs/Api/SendingDomainsApi.md#getsendingstats) | **GET** /v1/sending-stats | Get sending statistics
*SendingDomainsApi* | [**listSendingDomains**](docs/Api/SendingDomainsApi.md#listsendingdomains) | **GET** /v1/sending-domains | List sending domains
*SendingDomainsApi* | [**verifySendingDomain**](docs/Api/SendingDomainsApi.md#verifysendingdomain) | **POST** /v1/sending-domains/{domain_id}/verify | Verify domain DNS records
*ServerTestsApi* | [**getServerTest**](docs/Api/ServerTestsApi.md#getservertest) | **GET** /v1/server-tests/{test_id} | Get server test
*ServerTestsApi* | [**listServerTests**](docs/Api/ServerTestsApi.md#listservertests) | **GET** /v1/server-tests | List server tests
*ServerTestsApi* | [**runServerTest**](docs/Api/ServerTestsApi.md#runservertest) | **POST** /v1/server-tests | Run server test
*SpamChecksApi* | [**getSpamCheck**](docs/Api/SpamChecksApi.md#getspamcheck) | **GET** /v1/spam-checks/{check_id} | Get spam check
*SpamChecksApi* | [**listSpamChecks**](docs/Api/SpamChecksApi.md#listspamchecks) | **GET** /v1/spam-checks | List spam checks
*SpamChecksApi* | [**runSpamCheck**](docs/Api/SpamChecksApi.md#runspamcheck) | **POST** /v1/spam-checks | Run spam check
*SubscriberListsApi* | [**confirmSubscription**](docs/Api/SubscriberListsApi.md#confirmsubscription) | **GET** /v1/confirm/{token} | Confirm subscription
*SubscriberListsApi* | [**createList**](docs/Api/SubscriberListsApi.md#createlist) | **POST** /v1/lists | Create a subscriber list
*SubscriberListsApi* | [**deleteList**](docs/Api/SubscriberListsApi.md#deletelist) | **DELETE** /v1/lists/{list_id} | Delete a subscriber list
*SubscriberListsApi* | [**getList**](docs/Api/SubscriberListsApi.md#getlist) | **GET** /v1/lists/{list_id} | Get a subscriber list
*SubscriberListsApi* | [**getLists**](docs/Api/SubscriberListsApi.md#getlists) | **GET** /v1/lists | List subscriber lists
*SubscriberListsApi* | [**getSubscribers**](docs/Api/SubscriberListsApi.md#getsubscribers) | **GET** /v1/lists/{list_id}/subscribers | List subscribers
*SubscriberListsApi* | [**subscribe**](docs/Api/SubscriberListsApi.md#subscribe) | **POST** /v1/subscribe/{list_id} | Subscribe to a list
*SubscriberListsApi* | [**unsubscribeSubscriber**](docs/Api/SubscriberListsApi.md#unsubscribesubscriber) | **DELETE** /v1/lists/{list_id}/subscribers/{subscriber_id} | Unsubscribe a subscriber
*SuppressionListsApi* | [**addSuppression**](docs/Api/SuppressionListsApi.md#addsuppression) | **POST** /v1/suppression | Add suppression entries
*SuppressionListsApi* | [**checkSuppression**](docs/Api/SuppressionListsApi.md#checksuppression) | **POST** /v1/suppression/check | Check suppression status
*SuppressionListsApi* | [**getSuppressionAuditLog**](docs/Api/SuppressionListsApi.md#getsuppressionauditlog) | **GET** /v1/suppression/audit | Get suppression audit log
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

- [AddBlacklistMonitor201Response](docs/Model/AddBlacklistMonitor201Response.md)
- [AddBlacklistMonitorRequest](docs/Model/AddBlacklistMonitorRequest.md)
- [AddDmarcDomain201Response](docs/Model/AddDmarcDomain201Response.md)
- [AddDmarcDomainRequest](docs/Model/AddDmarcDomainRequest.md)
- [AddPolicyRule201Response](docs/Model/AddPolicyRule201Response.md)
- [AddSuppressionRequest](docs/Model/AddSuppressionRequest.md)
- [AddSuppressionRequestEntriesInner](docs/Model/AddSuppressionRequestEntriesInner.md)
- [AddSuppressionResponse](docs/Model/AddSuppressionResponse.md)
- [AppendToContactList200Response](docs/Model/AppendToContactList200Response.md)
- [AppendToContactListRequest](docs/Model/AppendToContactListRequest.md)
- [BatchDeliverRequest](docs/Model/BatchDeliverRequest.md)
- [BatchDeliverRequestStructuredData](docs/Model/BatchDeliverRequestStructuredData.md)
- [BatchDeliverResponse](docs/Model/BatchDeliverResponse.md)
- [BatchDeliverResponseDelivery](docs/Model/BatchDeliverResponseDelivery.md)
- [BatchDeliverResponseRejectedInner](docs/Model/BatchDeliverResponseRejectedInner.md)
- [BlacklistMonitor](docs/Model/BlacklistMonitor.md)
- [BlacklistMonitorLatestCheck](docs/Model/BlacklistMonitorLatestCheck.md)
- [BounceAnalysisResponse](docs/Model/BounceAnalysisResponse.md)
- [BounceAnalysisResponseAnalysis](docs/Model/BounceAnalysisResponseAnalysis.md)
- [BounceAnalysisResponseAnalysisCategories](docs/Model/BounceAnalysisResponseAnalysisCategories.md)
- [BounceAnalysisResponseAnalysisTopDomainsInner](docs/Model/BounceAnalysisResponseAnalysisTopDomainsInner.md)
- [Campaign](docs/Model/Campaign.md)
- [CampaignResponse](docs/Model/CampaignResponse.md)
- [CampaignStats](docs/Model/CampaignStats.md)
- [CampaignVariant](docs/Model/CampaignVariant.md)
- [CheckSuppressionRequest](docs/Model/CheckSuppressionRequest.md)
- [ClassifyContent200Response](docs/Model/ClassifyContent200Response.md)
- [ClassifyContent200ResponseContentCheck](docs/Model/ClassifyContent200ResponseContentCheck.md)
- [ClassifyContent200ResponseContentCheckCategoriesInner](docs/Model/ClassifyContent200ResponseContentCheckCategoriesInner.md)
- [ClassifyContentRequest](docs/Model/ClassifyContentRequest.md)
- [ConfirmSubscription200Response](docs/Model/ConfirmSubscription200Response.md)
- [ContactList](docs/Model/ContactList.md)
- [CreateBounceAnalysisRequest](docs/Model/CreateBounceAnalysisRequest.md)
- [CreateCampaignRequest](docs/Model/CreateCampaignRequest.md)
- [CreateCampaignVariant201Response](docs/Model/CreateCampaignVariant201Response.md)
- [CreateContactList201Response](docs/Model/CreateContactList201Response.md)
- [CreateContactListRequest](docs/Model/CreateContactListRequest.md)
- [CreateJobFromS3Request](docs/Model/CreateJobFromS3Request.md)
- [CreateJobRequest](docs/Model/CreateJobRequest.md)
- [CreateList201Response](docs/Model/CreateList201Response.md)
- [CreateListRequest](docs/Model/CreateListRequest.md)
- [CreatePolicyFromPresetRequest](docs/Model/CreatePolicyFromPresetRequest.md)
- [CreatePolicyRequest](docs/Model/CreatePolicyRequest.md)
- [CreateSendingDomain201Response](docs/Model/CreateSendingDomain201Response.md)
- [CreateSendingDomainRequest](docs/Model/CreateSendingDomainRequest.md)
- [CreateVariantRequest](docs/Model/CreateVariantRequest.md)
- [CrossReferenceBounces200Response](docs/Model/CrossReferenceBounces200Response.md)
- [CrossReferenceBounces200ResponseCrossReference](docs/Model/CrossReferenceBounces200ResponseCrossReference.md)
- [CrossReferenceBounces200ResponseCrossReferenceEntriesInner](docs/Model/CrossReferenceBounces200ResponseCrossReferenceEntriesInner.md)
- [DeleteJob200Response](docs/Model/DeleteJob200Response.md)
- [DeletePolicy200Response](docs/Model/DeletePolicy200Response.md)
- [DeletePolicyRule200Response](docs/Model/DeletePolicyRule200Response.md)
- [DeliverRequest](docs/Model/DeliverRequest.md)
- [DeliverRequestOptions](docs/Model/DeliverRequestOptions.md)
- [DeliverRequestStructuredData](docs/Model/DeliverRequestStructuredData.md)
- [DeliverRequestToInner](docs/Model/DeliverRequestToInner.md)
- [DeliverResponse](docs/Model/DeliverResponse.md)
- [DeliverResponseDelivery](docs/Model/DeliverResponseDelivery.md)
- [DmarcDomain](docs/Model/DmarcDomain.md)
- [ErrorResponse](docs/Model/ErrorResponse.md)
- [GetBlacklistHistory200Response](docs/Model/GetBlacklistHistory200Response.md)
- [GetBlacklistHistory200ResponseChecksInner](docs/Model/GetBlacklistHistory200ResponseChecksInner.md)
- [GetBounceRecords200Response](docs/Model/GetBounceRecords200Response.md)
- [GetBounceRecords200ResponseRecordsInner](docs/Model/GetBounceRecords200ResponseRecordsInner.md)
- [GetCampaignABResults200Response](docs/Model/GetCampaignABResults200Response.md)
- [GetCampaignABResults200ResponseVariantsInner](docs/Model/GetCampaignABResults200ResponseVariantsInner.md)
- [GetCampaignABResults200ResponseWinner](docs/Model/GetCampaignABResults200ResponseWinner.md)
- [GetCampaignAttribution200Response](docs/Model/GetCampaignAttribution200Response.md)
- [GetCampaignAttribution200ResponseAttribution](docs/Model/GetCampaignAttribution200ResponseAttribution.md)
- [GetCampaignAttribution200ResponseAttributionFirstTouch](docs/Model/GetCampaignAttribution200ResponseAttributionFirstTouch.md)
- [GetCampaignDeliveryConfidence200Response](docs/Model/GetCampaignDeliveryConfidence200Response.md)
- [GetCampaignDeliveryConfidence200ResponseFactors](docs/Model/GetCampaignDeliveryConfidence200ResponseFactors.md)
- [GetCampaignDeliveryConfidence200ResponseFactorsDomainAuth](docs/Model/GetCampaignDeliveryConfidence200ResponseFactorsDomainAuth.md)
- [GetCampaignDeliveryConfidence200ResponseFactorsListQuality](docs/Model/GetCampaignDeliveryConfidence200ResponseFactorsListQuality.md)
- [GetCampaignDeliveryConfidence200ResponseFactorsSenderReputation](docs/Model/GetCampaignDeliveryConfidence200ResponseFactorsSenderReputation.md)
- [GetCampaignFunnel200Response](docs/Model/GetCampaignFunnel200Response.md)
- [GetCampaignFunnel200ResponseFunnel](docs/Model/GetCampaignFunnel200ResponseFunnel.md)
- [GetCampaignFunnel200ResponseRates](docs/Model/GetCampaignFunnel200ResponseRates.md)
- [GetCampaignProviderIntelligence200Response](docs/Model/GetCampaignProviderIntelligence200Response.md)
- [GetCampaignProviderIntelligence200ResponseProvidersInner](docs/Model/GetCampaignProviderIntelligence200ResponseProvidersInner.md)
- [GetDmarcDomain200Response](docs/Model/GetDmarcDomain200Response.md)
- [GetDmarcDomain200ResponseDomain](docs/Model/GetDmarcDomain200ResponseDomain.md)
- [GetDmarcDomain200ResponseDomainAllOfSummary](docs/Model/GetDmarcDomain200ResponseDomainAllOfSummary.md)
- [GetDmarcRecommendation200Response](docs/Model/GetDmarcRecommendation200Response.md)
- [GetDmarcRecommendation200ResponseRecommendation](docs/Model/GetDmarcRecommendation200ResponseRecommendation.md)
- [GetDmarcSources200Response](docs/Model/GetDmarcSources200Response.md)
- [GetDmarcSources200ResponseSourcesInner](docs/Model/GetDmarcSources200ResponseSourcesInner.md)
- [GetDmarcTrend200Response](docs/Model/GetDmarcTrend200Response.md)
- [GetDmarcTrend200ResponseTrendInner](docs/Model/GetDmarcTrend200ResponseTrendInner.md)
- [GetInactiveContactsReport200Response](docs/Model/GetInactiveContactsReport200Response.md)
- [GetInactiveContactsReport200ResponseByListInner](docs/Model/GetInactiveContactsReport200ResponseByListInner.md)
- [GetLists200Response](docs/Model/GetLists200Response.md)
- [GetMessageEvents200Response](docs/Model/GetMessageEvents200Response.md)
- [GetMessageEvents200ResponseClicksInner](docs/Model/GetMessageEvents200ResponseClicksInner.md)
- [GetMessageEvents200ResponseEventsInner](docs/Model/GetMessageEvents200ResponseEventsInner.md)
- [GetMessageEvents200ResponseSummary](docs/Model/GetMessageEvents200ResponseSummary.md)
- [GetPresignedUploadRequest](docs/Model/GetPresignedUploadRequest.md)
- [GetSenderHealth200Response](docs/Model/GetSenderHealth200Response.md)
- [GetSenderHealth200ResponseComponents](docs/Model/GetSenderHealth200ResponseComponents.md)
- [GetSenderHealth200ResponseComponentsDeliveryRate](docs/Model/GetSenderHealth200ResponseComponentsDeliveryRate.md)
- [GetSenderHealth200ResponseVolume](docs/Model/GetSenderHealth200ResponseVolume.md)
- [GetSenderHealthTrend200Response](docs/Model/GetSenderHealthTrend200Response.md)
- [GetSenderHealthTrend200ResponseDataPointsInner](docs/Model/GetSenderHealthTrend200ResponseDataPointsInner.md)
- [GetSendingDomainIdentityScore200Response](docs/Model/GetSendingDomainIdentityScore200Response.md)
- [GetSendingStats200Response](docs/Model/GetSendingStats200Response.md)
- [GetSendingStats200ResponseStats](docs/Model/GetSendingStats200ResponseStats.md)
- [GetSubscribers200Response](docs/Model/GetSubscribers200Response.md)
- [HealthCheck200Response](docs/Model/HealthCheck200Response.md)
- [IdentityScoreCheck](docs/Model/IdentityScoreCheck.md)
- [Job](docs/Model/Job.md)
- [JobArtifacts](docs/Model/JobArtifacts.md)
- [JobListResponse](docs/Model/JobListResponse.md)
- [JobResponse](docs/Model/JobResponse.md)
- [JobSummary](docs/Model/JobSummary.md)
- [ListBlacklistMonitors200Response](docs/Model/ListBlacklistMonitors200Response.md)
- [ListCampaigns200Response](docs/Model/ListCampaigns200Response.md)
- [ListContactLists200Response](docs/Model/ListContactLists200Response.md)
- [ListDmarcDomains200Response](docs/Model/ListDmarcDomains200Response.md)
- [ListSendingDomains200Response](docs/Model/ListSendingDomains200Response.md)
- [ListServerTests200Response](docs/Model/ListServerTests200Response.md)
- [ListSpamChecks200Response](docs/Model/ListSpamChecks200Response.md)
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
- [QueryContactList200Response](docs/Model/QueryContactList200Response.md)
- [QueryContactList200ResponseEmailsInner](docs/Model/QueryContactList200ResponseEmailsInner.md)
- [QueryContactListRequest](docs/Model/QueryContactListRequest.md)
- [QueryContactListRequestFiltersInner](docs/Model/QueryContactListRequestFiltersInner.md)
- [RemoveSuppression200Response](docs/Model/RemoveSuppression200Response.md)
- [RemoveSuppressionRequest](docs/Model/RemoveSuppressionRequest.md)
- [ResultsResponse](docs/Model/ResultsResponse.md)
- [RunBlacklistCheck200Response](docs/Model/RunBlacklistCheck200Response.md)
- [RunBlacklistCheck200ResponseCheck](docs/Model/RunBlacklistCheck200ResponseCheck.md)
- [RunServerTest201Response](docs/Model/RunServerTest201Response.md)
- [RunServerTestRequest](docs/Model/RunServerTestRequest.md)
- [RunSpamCheck201Response](docs/Model/RunSpamCheck201Response.md)
- [RunSpamCheckRequest](docs/Model/RunSpamCheckRequest.md)
- [ScheduleCampaignRequest](docs/Model/ScheduleCampaignRequest.md)
- [SendingDomain](docs/Model/SendingDomain.md)
- [SendingDomainDnsRecords](docs/Model/SendingDomainDnsRecords.md)
- [SendingDomainDnsRecordsNs](docs/Model/SendingDomainDnsRecordsNs.md)
- [SendingDomainIdentityScore](docs/Model/SendingDomainIdentityScore.md)
- [SendingDomainIdentityScoreBreakdown](docs/Model/SendingDomainIdentityScoreBreakdown.md)
- [ServerTest](docs/Model/ServerTest.md)
- [ServerTestDnsChecks](docs/Model/ServerTestDnsChecks.md)
- [ServerTestMxRecordsInner](docs/Model/ServerTestMxRecordsInner.md)
- [ServerTestSmtpCheck](docs/Model/ServerTestSmtpCheck.md)
- [SpamCheck](docs/Model/SpamCheck.md)
- [SpamCheckChecks](docs/Model/SpamCheckChecks.md)
- [SubscribeRequest](docs/Model/SubscribeRequest.md)
- [Subscriber](docs/Model/Subscriber.md)
- [SubscriberList](docs/Model/SubscriberList.md)
- [SuppressionAuditResponse](docs/Model/SuppressionAuditResponse.md)
- [SuppressionAuditResponseEntriesInner](docs/Model/SuppressionAuditResponseEntriesInner.md)
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
- [UnsubscribeSubscriber200Response](docs/Model/UnsubscribeSubscriber200Response.md)
- [UpdatePolicyRequest](docs/Model/UpdatePolicyRequest.md)
- [ValidateBatch200Response](docs/Model/ValidateBatch200Response.md)
- [ValidateBatch200ResponseSummary](docs/Model/ValidateBatch200ResponseSummary.md)
- [ValidateBatchRequest](docs/Model/ValidateBatchRequest.md)
- [ValidateRequest](docs/Model/ValidateRequest.md)
- [ValidationResponse](docs/Model/ValidationResponse.md)
- [ValidationResponsePolicyApplied](docs/Model/ValidationResponsePolicyApplied.md)
- [ValidationResponseSuppressionMatch](docs/Model/ValidationResponseSuppressionMatch.md)
- [ValidationResult](docs/Model/ValidationResult.md)
- [ValidationResultSuppression](docs/Model/ValidationResultSuppression.md)
- [WebhookEvent](docs/Model/WebhookEvent.md)

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
