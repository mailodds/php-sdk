# # TrackEventRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**event_type** | **string** | Type of commerce event |
**email** | **string** | Email address associated with the event |
**properties** | **object** | Event-specific data (e.g., order_id, value, product_url) | [optional]
**occurred_at** | **\DateTime** | When the event occurred (defaults to now) | [optional]
**idempotency_key** | **string** | Unique key to prevent duplicate events (5 min TTL) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
