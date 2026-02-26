# # SendingDomain

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Domain UUID | [optional]
**domain** | **string** | Domain name | [optional]
**domain_type** | **string** | Domain type (ns_delegated) | [optional]
**status** | **string** | Domain verification status | [optional]
**dkim_selector** | **string** | DKIM selector (e.g. mo1) | [optional]
**dns_records** | [**\MailOdds\Model\SendingDomainDnsRecords**](SendingDomainDnsRecords.md) |  | [optional]
**bimi_svg_url** | **string** | BIMI SVG logo URL | [optional]
**bimi_vmc_url** | **string** | BIMI VMC certificate URL | [optional]
**bimi_enabled** | **bool** | Whether BIMI is enabled | [optional]
**forward_replies_to** | **string** | Reply forwarding address | [optional]
**created_at** | **\DateTime** |  | [optional]
**updated_at** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
