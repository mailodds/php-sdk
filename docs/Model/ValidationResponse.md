# # ValidationResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**schema_version** | **string** |  |
**request_id** | **string** | Unique request identifier | [optional]
**email** | **string** |  |
**status** | **string** | Validation status |
**action** | **string** | Recommended action |
**sub_status** | **string** | Detailed status reason. Omitted when none. | [optional]
**domain** | **string** |  |
**mx_found** | **bool** | Whether MX records were found for the domain |
**mx_host** | **string** | Primary MX hostname. Omitted when MX not resolved. | [optional]
**smtp_check** | **bool** | Whether SMTP verification passed. Omitted when SMTP not checked. | [optional]
**catch_all** | **bool** | Whether domain is catch-all. Omitted when SMTP not checked. | [optional]
**disposable** | **bool** | Whether domain is a known disposable email provider |
**role_account** | **bool** | Whether address is a role account (e.g., info@, admin@) |
**free_provider** | **bool** | Whether domain is a known free email provider (e.g., gmail.com) |
**depth** | **string** | Validation depth used for this check |
**processed_at** | **\DateTime** | ISO 8601 timestamp of validation |
**suggested_email** | **string** | Typo correction suggestion. Omitted when no typo detected. | [optional]
**retry_after_ms** | **int** | Suggested retry delay in milliseconds. Present only for retry_later action. | [optional]
**has_spf** | **bool** | Whether the domain has an SPF record. Omitted for standard depth. | [optional]
**has_dmarc** | **bool** | Whether the domain has a DMARC record. Omitted for standard depth. | [optional]
**dmarc_policy** | **string** | The domain&#39;s DMARC policy. Omitted when no DMARC record found. | [optional]
**dnsbl_listed** | **bool** | Whether the domain&#39;s MX IP is on a DNS blocklist (Spamhaus ZEN). Omitted for standard depth. | [optional]
**suppression_match** | [**\MailOdds\Model\ValidationResponseSuppressionMatch**](ValidationResponseSuppressionMatch.md) |  | [optional]
**policy_applied** | [**\MailOdds\Model\ValidationResponsePolicyApplied**](ValidationResponsePolicyApplied.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
