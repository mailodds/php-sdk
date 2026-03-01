# # WebhookEvent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**event** | **string** | Event type |
**timestamp** | **\DateTime** | When the event occurred |
**job** | [**\MailOdds\Model\Job**](Job.md) |  | [optional]
**message_id** | **string** | Message ID (present for message.* and delivery events) | [optional]
**account_id** | **int** | Account ID (present for delivery events) | [optional]
**domain_id** | **string** | Sending domain UUID (present for delivery events) | [optional]
**to** | **string** | Recipient email (present for delivery events) | [optional]
**status** | **string** | Delivery status (present for delivery events) | [optional]
**smtp_code** | **int** | SMTP response code (present for bounced/deferred/failed) | [optional]
**smtp_response** | **string** | SMTP diagnostic string (present for bounced/deferred/failed) | [optional]
**mx_host** | **string** | MX host that handled delivery | [optional]
**bounce_type** | **string** | Bounce classification (present for message.bounced) | [optional]
**enhanced_status_code** | **string** | Enhanced SMTP status code (e.g., 5.1.1) | [optional]
**attempts** | **int** | Number of delivery attempts | [optional]
**isp** | **string** | Receiving ISP name | [optional]
**is_mpp** | **bool** | Whether the open was from Apple Mail Privacy Protection | [optional]
**ip_address** | **string** | Client IP (present for message.opened/clicked) | [optional]
**user_agent** | **string** | Client user agent (present for message.opened/clicked) | [optional]
**is_bot** | **bool** | Whether the event was triggered by a bot (present for message.opened/clicked) | [optional]
**link_url** | **string** | Clicked URL (present for message.clicked) | [optional]
**link_index** | **int** | Position of clicked link in message (present for message.clicked) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
