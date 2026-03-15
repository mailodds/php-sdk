# MailOdds PHP SDK

The official PHP client for the MailOdds email deliverability platform. Validate emails, send transactional messages, and monitor deliverability from any PHP application, with first-class support for Laravel and WordPress.

[![Packagist Version](https://img.shields.io/packagist/v/mailodds/mailodds-php)](https://packagist.org/packages/mailodds/mailodds-php)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![API Docs](https://img.shields.io/badge/API-docs-blue)](https://mailodds.com/docs)

## Installation

```bash
composer require mailodds/mailodds-php
```

Requires PHP 8.1 or later.

## Quick Start

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

$config = MailOdds\Configuration::getDefaultConfiguration()
    ->setAccessToken(getenv('MAILODDS_API_KEY'));

$api = new MailOdds\Api\EmailValidationApi(new GuzzleHttp\Client(), $config);

$request = new MailOdds\Model\ValidateRequest(['email' => 'user@example.com']);
$result = $api->validateEmail($request);

echo "Status: " . $result->getResult()->getStatus() . "\n";
echo "Action: " . $result->getResult()->getAction() . "\n";
```

## MailOdds Platform

MailOdds provides a full-stack email deliverability platform. Explore the capabilities that this SDK connects you to:

- [Email Validation API](https://mailodds.com/email-validation-api) - Real-time email verification with 25+ checks
- [Email Sending API](https://mailodds.com/email-sending-api) - Transactional email delivery with DKIM dual signing
- [Transactional Email](https://mailodds.com/email-sending-api) - Reliable SMTP delivery for application email
- [Email Webhooks](https://mailodds.com/docs) - Real-time delivery, bounce, and engagement notifications
- [Ecommerce Email](https://mailodds.com/ecommerce-email) - Email tools built for online stores
- [DMARC Monitoring](https://mailodds.com/dmarc-monitoring) - Aggregate report parsing and policy recommendations
- [Sender Reputation](https://mailodds.com/sender-reputation) - Domain and IP reputation scoring
- [Email Suppression List](https://mailodds.com/email-suppression-list) - Centralized suppression management
- [Email Validation Policies](https://mailodds.com/email-validation-policies) - Rule-based validation with preset templates
- [Ecommerce Email Integration](https://mailodds.com/ecommerce-email-integration) - WooCommerce, Shopify, and PrestaShop connectors
- [Free Email Validator](https://mailodds.com/) - Try single-email validation on the homepage

## Features

- **PSR-18 compatible** - Works with any HTTP client that implements the PSR-18 standard, with Guzzle included as the default transport
- **Fully typed models** - Every API request and response is represented by a strongly-typed PHP class, providing IDE autocompletion and static analysis support
- **Laravel and WordPress ready** - Drop into Laravel service providers or use alongside the MailOdds WordPress plugin with no additional configuration
- **Bulk validation support** - Submit lists of up to 500,000 emails per job via JSON, file upload, or S3 presigned URL, with webhook callbacks on completion
- **Sending and deliverability** - Send transactional email, monitor DMARC reports, track blacklist status, and score sender reputation from one SDK
- **Comprehensive error handling** - Structured error responses with machine-readable codes and request IDs for debugging

## Why MailOdds

MailOdds is a complete email deliverability platform built for developers. Every email validated or sent through MailOdds passes through 25+ real-time checks including syntax verification, DNS and MX validation, SMTP mailbox probing, disposable domain detection, and role account identification.

The platform maintains sub-200ms median response times for single validations, 99.9% API uptime, and processes bulk lists of up to 500,000 emails per job. MailOdds supports 11 language SDKs, an MCP server for AI agent integration, a CLI for local development, and a WordPress plugin for no-code deployments.

All email sending uses DKIM dual signing with automated key rotation, and the deliverability monitoring stack covers DMARC aggregate reports, blacklist surveillance across 80+ DNSBLs, and real-time sender health scoring.

## API Reference

Full documentation is available at [https://mailodds.com/docs](https://mailodds.com/docs).

All URIs are relative to `https://api.mailodds.com/v1`.

<details>
<summary>All Endpoints</summary>

| Class | Method | HTTP request | Description |
| ----- | ------ | ------------ | ----------- |
| *AgentControlPlaneApi* | **getMcpCapabilities** | **GET** /v1/mcp/capabilities | Get MCP capabilities |
| *BlacklistMonitoringApi* | **addBlacklistMonitor** | **POST** /v1/blacklist-monitors | Add blacklist monitor |
| *BlacklistMonitoringApi* | **deleteBlacklistMonitor** | **DELETE** /v1/blacklist-monitors/{monitor_id} | Delete a blacklist monitor |
| *BlacklistMonitoringApi* | **getBlacklistHistory** | **GET** /v1/blacklist-monitors/{monitor_id}/history | Get blacklist check history |
| *BlacklistMonitoringApi* | **listBlacklistMonitors** | **GET** /v1/blacklist-monitors | List blacklist monitors |
| *BlacklistMonitoringApi* | **runBlacklistCheck** | **POST** /v1/blacklist-monitors/{monitor_id}/check | Run blacklist check |
| *BounceAnalysisApi* | **createBounceAnalysis** | **POST** /v1/bounce-analyses | Analyze bounce logs |
| *BounceAnalysisApi* | **crossReferenceBounces** | **GET** /v1/bounce-analyses/{analysis_id}/cross-reference | Cross-reference bounces with validation logs |
| *BounceAnalysisApi* | **getBounceAnalysis** | **GET** /v1/bounce-analyses/{analysis_id} | Get bounce analysis |
| *BounceAnalysisApi* | **getBounceRecords** | **GET** /v1/bounce-analyses/{analysis_id}/records | Get bounce records |
| *BulkValidationApi* | **cancelJob** | **POST** /v1/jobs/{job_id}/cancel | Cancel a job |
| *BulkValidationApi* | **createJob** | **POST** /v1/jobs | Create bulk validation job (JSON) |
| *BulkValidationApi* | **createJobFromS3** | **POST** /v1/jobs/upload/s3 | Create job from S3 upload |
| *BulkValidationApi* | **createJobUpload** | **POST** /v1/jobs/upload | Create bulk validation job (file upload) |
| *BulkValidationApi* | **deleteJob** | **DELETE** /v1/jobs/{job_id} | Delete a job |
| *BulkValidationApi* | **getJob** | **GET** /v1/jobs/{job_id} | Get job status |
| *BulkValidationApi* | **getJobResults** | **GET** /v1/jobs/{job_id}/results | Get job results |
| *BulkValidationApi* | **getPresignedUpload** | **POST** /v1/jobs/upload/presigned | Get S3 presigned upload URL |
| *BulkValidationApi* | **listJobs** | **GET** /v1/jobs | List validation jobs |
| *CampaignAnalyticsApi* | **getCampaignABResults** | **GET** /v1/campaigns/{campaign_id}/ab-results | Get A/B test results |
| *CampaignAnalyticsApi* | **getCampaignAttribution** | **GET** /v1/campaigns/{campaign_id}/conversions/attribution | Get campaign attribution |
| *CampaignAnalyticsApi* | **getCampaignDeliveryConfidence** | **GET** /v1/campaigns/{campaign_id}/delivery-confidence | Get pre-send delivery confidence |
| *CampaignAnalyticsApi* | **getCampaignFunnel** | **GET** /v1/campaigns/{campaign_id}/funnel | Get campaign funnel |
| *CampaignAnalyticsApi* | **getCampaignProviderIntelligence** | **GET** /v1/campaigns/{campaign_id}/provider-intelligence | Get provider intelligence |
| *CampaignsApi* | **cancelCampaign** | **POST** /v1/campaigns/{campaign_id}/cancel | Cancel a campaign |
| *CampaignsApi* | **createCampaign** | **POST** /v1/campaigns | Create a campaign |
| *CampaignsApi* | **createCampaignVariant** | **POST** /v1/campaigns/{campaign_id}/variants | Create A/B variant |
| *CampaignsApi* | **getCampaign** | **GET** /v1/campaigns/{campaign_id} | Get campaign with stats |
| *CampaignsApi* | **listCampaigns** | **GET** /v1/campaigns | List campaigns |
| *CampaignsApi* | **scheduleCampaign** | **POST** /v1/campaigns/{campaign_id}/schedule | Schedule a campaign |
| *CampaignsApi* | **sendCampaign** | **POST** /v1/campaigns/{campaign_id}/send | Send a campaign |
| *ContactListsApi* | **appendToContactList** | **POST** /v1/contact-lists/{list_id}/append | Append to contact list |
| *ContactListsApi* | **createContactList** | **POST** /v1/contact-lists | Create contact list |
| *ContactListsApi* | **deleteContactList** | **DELETE** /v1/contact-lists/{list_id} | Delete a contact list |
| *ContactListsApi* | **getInactiveContactsReport** | **GET** /v1/contacts/inactive-report | Get inactive contacts report |
| *ContactListsApi* | **listContactLists** | **GET** /v1/contact-lists | List contact lists |
| *ContactListsApi* | **queryContactList** | **POST** /v1/contact-lists/{list_id}/query | Query contact list |
| *ContentClassificationApi* | **classifyContent** | **POST** /v1/content-check | Classify email content |
| *DMARCMonitoringApi* | **addDmarcDomain** | **POST** /v1/dmarc-domains | Add DMARC domain |
| *DMARCMonitoringApi* | **deleteDmarcDomain** | **DELETE** /v1/dmarc-domains/{domain_id} | Delete a DMARC domain |
| *DMARCMonitoringApi* | **getDmarcDomain** | **GET** /v1/dmarc-domains/{domain_id} | Get DMARC domain |
| *DMARCMonitoringApi* | **getDmarcRecommendation** | **GET** /v1/dmarc-domains/{domain_id}/recommendation | Get DMARC policy recommendation |
| *DMARCMonitoringApi* | **getDmarcSources** | **GET** /v1/dmarc-domains/{domain_id}/sources | Get DMARC sending sources |
| *DMARCMonitoringApi* | **getDmarcTrend** | **GET** /v1/dmarc-domains/{domain_id}/trend | Get DMARC trend |
| *DMARCMonitoringApi* | **listDmarcDomains** | **GET** /v1/dmarc-domains | List DMARC domains |
| *DMARCMonitoringApi* | **verifyDmarcDomain** | **POST** /v1/dmarc-domains/{domain_id}/verify | Verify DMARC DNS records |
| *EmailSendingApi* | **deliverBatch** | **POST** /v1/deliver/batch | Send to multiple recipients (max 100) |
| *EmailSendingApi* | **deliverEmail** | **POST** /v1/deliver | Send a single email |
| *EmailValidationApi* | **validateBatch** | **POST** /v1/validate/batch | Validate multiple emails (sync) |
| *EmailValidationApi* | **validateEmail** | **POST** /v1/validate | Validate single email |
| *EventsApi* | **trackEvent** | **POST** /v1/events/track | Track a commerce event |
| *MessageEventsApi* | **getMessageEvents** | **GET** /v1/message-events | Get message events |
| *OAuth20Api* | **createToken** | **POST** /oauth/token | Create token |
| *OAuth20Api* | **getJwks** | **GET** /.well-known/jwks.json | Get JSON Web Key Set |
| *OAuth20Api* | **introspectToken** | **POST** /oauth/introspect | Introspect token |
| *OAuth20Api* | **oauthServerMetadata** | **GET** /.well-known/oauth-authorization-server | OAuth server metadata |
| *OAuth20Api* | **revokeToken** | **POST** /oauth/revoke | Revoke token |
| *ProductsApi* | **batchProducts** | **POST** /v1/stores/{store_id}/products/batch | Batch push products |
| *ProductsApi* | **getProduct** | **GET** /v1/store-products/{product_id} | Get a product |
| *ProductsApi* | **queryProducts** | **GET** /v1/store-products | Query products |
| *SenderHealthApi* | **getSenderHealth** | **GET** /v1/sender-health | Get sender health score |
| *SenderHealthApi* | **getSenderHealthTrend** | **GET** /v1/sender-health/trend | Get sender health trend |
| *SendingDomainsApi* | **createSendingDomain** | **POST** /v1/sending-domains | Add a sending domain |
| *SendingDomainsApi* | **deleteSendingDomain** | **DELETE** /v1/sending-domains/{domain_id} | Delete a sending domain |
| *SendingDomainsApi* | **getSendingDomain** | **GET** /v1/sending-domains/{domain_id} | Get a sending domain |
| *SendingDomainsApi* | **getSendingDomainIdentityScore** | **GET** /v1/sending-domains/{domain_id}/identity-score | Get domain identity score |
| *SendingDomainsApi* | **getSendingStats** | **GET** /v1/sending-stats | Get sending statistics |
| *SendingDomainsApi* | **listSendingDomains** | **GET** /v1/sending-domains | List sending domains |
| *SendingDomainsApi* | **verifySendingDomain** | **POST** /v1/sending-domains/{domain_id}/verify | Verify domain DNS records |
| *ServerTestsApi* | **getServerTest** | **GET** /v1/server-tests/{test_id} | Get server test |
| *ServerTestsApi* | **listServerTests** | **GET** /v1/server-tests | List server tests |
| *ServerTestsApi* | **runServerTest** | **POST** /v1/server-tests | Run server test |
| *SpamChecksApi* | **getSpamCheck** | **GET** /v1/spam-checks/{check_id} | Get spam check |
| *SpamChecksApi* | **listSpamChecks** | **GET** /v1/spam-checks | List spam checks |
| *SpamChecksApi* | **runSpamCheck** | **POST** /v1/spam-checks | Run spam check |
| *StoreConnectionsApi* | **createStore** | **POST** /v1/stores | Create a store connection |
| *StoreConnectionsApi* | **disconnectStore** | **DELETE** /v1/stores/{store_id} | Disconnect a store |
| *StoreConnectionsApi* | **getStore** | **GET** /v1/stores/{store_id} | Get a store connection |
| *StoreConnectionsApi* | **listStores** | **GET** /v1/stores | List store connections |
| *StoreConnectionsApi* | **triggerSync** | **POST** /v1/stores/{store_id}/sync | Trigger product sync |
| *SubscriberListsApi* | **confirmSubscription** | **GET** /v1/confirm/{token} | Confirm subscription |
| *SubscriberListsApi* | **createList** | **POST** /v1/lists | Create a subscriber list |
| *SubscriberListsApi* | **deleteList** | **DELETE** /v1/lists/{list_id} | Delete a subscriber list |
| *SubscriberListsApi* | **getList** | **GET** /v1/lists/{list_id} | Get a subscriber list |
| *SubscriberListsApi* | **getLists** | **GET** /v1/lists | List subscriber lists |
| *SubscriberListsApi* | **getSubscribers** | **GET** /v1/lists/{list_id}/subscribers | List subscribers |
| *SubscriberListsApi* | **subscribe** | **POST** /v1/subscribe/{list_id} | Subscribe to a list |
| *SubscriberListsApi* | **unsubscribeSubscriber** | **DELETE** /v1/lists/{list_id}/subscribers/{subscriber_id} | Unsubscribe a subscriber |
| *SuppressionListsApi* | **addSuppression** | **POST** /v1/suppression | Add suppression entries |
| *SuppressionListsApi* | **checkSuppression** | **POST** /v1/suppression/check | Check suppression status |
| *SuppressionListsApi* | **getSuppressionAuditLog** | **GET** /v1/suppression/audit | Get suppression audit log |
| *SuppressionListsApi* | **getSuppressionStats** | **GET** /v1/suppression/stats | Get suppression statistics |
| *SuppressionListsApi* | **listSuppression** | **GET** /v1/suppression | List suppression entries |
| *SuppressionListsApi* | **removeSuppression** | **DELETE** /v1/suppression | Remove suppression entries |
| *SystemApi* | **getTelemetrySummary** | **GET** /v1/telemetry/summary | Get validation telemetry |
| *SystemApi* | **healthCheck** | **GET** /health | Health check |
| *ValidationPoliciesApi* | **addPolicyRule** | **POST** /v1/policies/{policy_id}/rules | Add rule to policy |
| *ValidationPoliciesApi* | **createPolicy** | **POST** /v1/policies | Create policy |
| *ValidationPoliciesApi* | **createPolicyFromPreset** | **POST** /v1/policies/from-preset | Create policy from preset |
| *ValidationPoliciesApi* | **deletePolicy** | **DELETE** /v1/policies/{policy_id} | Delete policy |
| *ValidationPoliciesApi* | **deletePolicyRule** | **DELETE** /v1/policies/{policy_id}/rules/{rule_id} | Delete rule |
| *ValidationPoliciesApi* | **getPolicy** | **GET** /v1/policies/{policy_id} | Get policy |
| *ValidationPoliciesApi* | **getPolicyPresets** | **GET** /v1/policies/presets | Get policy presets |
| *ValidationPoliciesApi* | **listPolicies** | **GET** /v1/policies | List policies |
| *ValidationPoliciesApi* | **testPolicy** | **POST** /v1/policies/test | Test policy evaluation |
| *ValidationPoliciesApi* | **updatePolicy** | **PUT** /v1/policies/{policy_id} | Update policy |

</details>

<details>
<summary>All Models</summary>

- AddBlacklistMonitor201Response
- AddBlacklistMonitorRequest
- AddDmarcDomain201Response
- AddDmarcDomainRequest
- AddPolicyRule201Response
- AddSuppressionRequest
- AddSuppressionRequestEntriesInner
- AddSuppressionResponse
- AppendToContactList200Response
- AppendToContactListRequest
- BatchDeliverRequest
- BatchDeliverRequestStructuredData
- BatchDeliverResponse
- BatchDeliverResponseDelivery
- BatchDeliverResponseRejectedInner
- BatchProductsRequest
- BatchProductsRequestProductsInner
- BatchProductsResponse
- BatchProductsResponseErrorsInner
- BlacklistMonitor
- BlacklistMonitorLatestCheck
- BounceAnalysisResponse
- BounceAnalysisResponseAnalysis
- BounceAnalysisResponseAnalysisCategories
- BounceAnalysisResponseAnalysisTopDomainsInner
- Campaign
- CampaignResponse
- CampaignStats
- CampaignVariant
- CheckSuppressionRequest
- ClassifyContent200Response
- ClassifyContent200ResponseContentCheck
- ClassifyContentRequest
- ConfirmSubscription200Response
- ContactList
- CreateBounceAnalysisRequest
- CreateCampaignRequest
- CreateCampaignVariant201Response
- CreateContactList201Response
- CreateContactListRequest
- CreateJobFromS3Request
- CreateJobRequest
- CreateList201Response
- CreateListRequest
- CreatePolicyFromPresetRequest
- CreatePolicyRequest
- CreateSendingDomain201Response
- CreateSendingDomainRequest
- CreateStore201Response
- CreateStoreRequest
- CreateToken200Response
- CreateVariantRequest
- CrossReferenceBounces200Response
- CrossReferenceBounces200ResponseCrossReference
- CrossReferenceBounces200ResponseCrossReferenceEntriesInner
- DeleteJob200Response
- DeletePolicy200Response
- DeletePolicyRule200Response
- DeliverRequest
- DeliverRequestOptions
- DeliverRequestStructuredData
- DeliverRequestToInner
- DeliverResponse
- DeliverResponseDelivery
- DisconnectStore200Response
- DmarcDomain
- ErrorResponse
- GetBlacklistHistory200Response
- GetBlacklistHistory200ResponseChecksInner
- GetBounceRecords200Response
- GetBounceRecords200ResponseRecordsInner
- GetCampaignABResults200Response
- GetCampaignABResults200ResponseVariantsInner
- GetCampaignABResults200ResponseWinner
- GetCampaignAttribution200Response
- GetCampaignAttribution200ResponseAttribution
- GetCampaignAttribution200ResponseAttributionFirstTouch
- GetCampaignDeliveryConfidence200Response
- GetCampaignDeliveryConfidence200ResponseFactors
- GetCampaignDeliveryConfidence200ResponseFactorsDomainAuth
- GetCampaignDeliveryConfidence200ResponseFactorsListQuality
- GetCampaignDeliveryConfidence200ResponseFactorsSenderReputation
- GetCampaignFunnel200Response
- GetCampaignFunnel200ResponseFunnel
- GetCampaignFunnel200ResponseRates
- GetCampaignProviderIntelligence200Response
- GetCampaignProviderIntelligence200ResponseProvidersInner
- GetDmarcDomain200Response
- GetDmarcDomain200ResponseDomain
- GetDmarcDomain200ResponseDomainAllOfSummary
- GetDmarcRecommendation200Response
- GetDmarcRecommendation200ResponseRecommendation
- GetDmarcSources200Response
- GetDmarcSources200ResponseSourcesInner
- GetDmarcTrend200Response
- GetDmarcTrend200ResponseTrendInner
- GetInactiveContactsReport200Response
- GetInactiveContactsReport200ResponseByListInner
- GetLists200Response
- GetMessageEvents200Response
- GetMessageEvents200ResponseClicksInner
- GetMessageEvents200ResponseEventsInner
- GetMessageEvents200ResponseSummary
- GetPresignedUploadRequest
- GetProduct200Response
- GetSenderHealth200Response
- GetSenderHealth200ResponseComponents
- GetSenderHealth200ResponseComponentsDeliveryRate
- GetSenderHealth200ResponseVolume
- GetSenderHealthTrend200Response
- GetSenderHealthTrend200ResponseDataPointsInner
- GetSendingDomainIdentityScore200Response
- GetSendingStats200Response
- GetSendingStats200ResponseStats
- GetSubscribers200Response
- HealthCheck200Response
- IdentityScoreCheck
- IntrospectToken200Response
- Job
- JobArtifacts
- JobListResponse
- JobResponse
- JobSummary
- JwksResponse
- JwksResponseKeysInner
- ListBlacklistMonitors200Response
- ListCampaigns200Response
- ListContactLists200Response
- ListDmarcDomains200Response
- ListSendingDomains200Response
- ListServerTests200Response
- ListSpamChecks200Response
- ListStores200Response
- McpCapabilities
- McpCapabilitiesPillarsInner
- McpCapabilitiesPillarsInnerToolsInner
- OAuthServerMetadata
- Pagination
- Policy
- PolicyListResponse
- PolicyListResponseLimits
- PolicyPresetsResponse
- PolicyPresetsResponsePresetsInner
- PolicyResponse
- PolicyRule
- PolicyRuleAction
- PolicyTestResponse
- PresignedUploadResponse
- PresignedUploadResponseUpload
- ProductFacets
- ProductFacetsCategoriesInner
- ProductFacetsPriceRangesInner
- ProductFacetsStoresInner
- QueryContactList200Response
- QueryContactList200ResponseEmailsInner
- QueryContactListRequest
- QueryContactListRequestFiltersInner
- QueryProducts200Response
- RemoveSuppression200Response
- RemoveSuppressionRequest
- ResultsResponse
- RunBlacklistCheck200Response
- RunBlacklistCheck200ResponseCheck
- RunServerTest201Response
- RunServerTestRequest
- RunSpamCheck201Response
- RunSpamCheckRequest
- ScheduleCampaignRequest
- SendingDomain
- SendingDomainDnsRecords
- SendingDomainDnsRecordsNs
- SendingDomainIdentityScore
- SendingDomainIdentityScoreBreakdown
- ServerTest
- ServerTestDnsChecks
- ServerTestMxRecordsInner
- ServerTestSmtpCheck
- SpamCheck
- SpamCheckChecks
- StoreConnection
- StoreProduct
- SubscribeRequest
- Subscriber
- SubscriberList
- SuppressionAuditResponse
- SuppressionAuditResponseEntriesInner
- SuppressionCheckResponse
- SuppressionEntry
- SuppressionListResponse
- SuppressionStatsResponse
- SuppressionStatsResponseByType
- SyncResponse
- TelemetrySummary
- TelemetrySummaryRates
- TelemetrySummaryTopDomainsInner
- TelemetrySummaryTopReasonsInner
- TelemetrySummaryTotals
- TestPolicyRequest
- TestPolicyRequestTestResult
- TrackEventRequest
- TrackEventResponse
- UnsubscribeSubscriber200Response
- UpdatePolicyRequest
- ValidateBatch200Response
- ValidateBatch200ResponseSummary
- ValidateBatchRequest
- ValidateRequest
- ValidationResponse
- ValidationResponsePolicyApplied
- ValidationResponseSuppressionMatch
- ValidationResult
- ValidationResultSuppression
- WebhookEvent

</details>

## Other SDKs

| Language | Package | Source |
|----------|---------|--------|
| [Python](https://mailodds.com/sdks) | [PyPI](https://pypi.org/project/mailodds/) | [GitHub](https://github.com/mailodds/python-sdk) |
| [TypeScript](https://mailodds.com/sdks) | [npm](https://www.npmjs.com/package/@mailodds/sdk) | [GitHub](https://github.com/mailodds/typescript-sdk) |
| [PHP](https://mailodds.com/sdks) | [Packagist](https://packagist.org/packages/mailodds/mailodds-php) | [GitHub](https://github.com/mailodds/php-sdk) |
| [Java](https://mailodds.com/sdks) | [GitHub](https://github.com/mailodds/java-sdk) | [GitHub](https://github.com/mailodds/java-sdk) |
| [Go](https://mailodds.com/sdks) | [pkg.go.dev](https://pkg.go.dev/github.com/mailodds/go-sdk) | [GitHub](https://github.com/mailodds/go-sdk) |
| [C# / .NET](https://mailodds.com/sdks) | [GitHub](https://github.com/mailodds/csharp-sdk) | [GitHub](https://github.com/mailodds/csharp-sdk) |
| [Ruby](https://mailodds.com/sdks) | [RubyGems](https://rubygems.org/gems/mailodds) | [GitHub](https://github.com/mailodds/ruby-sdk) |
| [Kotlin](https://mailodds.com/sdks) | [GitHub](https://github.com/mailodds/kotlin-sdk) | [GitHub](https://github.com/mailodds/kotlin-sdk) |
| [Rust](https://mailodds.com/sdks) | [crates.io](https://crates.io/crates/mailodds) | [GitHub](https://github.com/mailodds/rust-sdk) |
| [Swift](https://mailodds.com/sdks) | [GitHub](https://github.com/mailodds/swift-sdk) | [GitHub](https://github.com/mailodds/swift-sdk) |
| [Dart / Flutter](https://mailodds.com/sdks) | [pub.dev](https://pub.dev/packages/mailodds) | [GitHub](https://github.com/mailodds/dart-sdk) |

## Resources

- [API Documentation](https://mailodds.com/docs)
- [Dashboard](https://mailodds.com/dashboard)
- [Privacy Policy](https://mailodds.com/privacy)
- [Blog](https://mailodds.com/blog)
- [Contact Support](https://mailodds.com/contact)

## License

MIT
