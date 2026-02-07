<?php

namespace MailOdds\Enterprise;

/**
 * Verifies MailOdds webhook signatures using HMAC-SHA256.
 */
class WebhookVerifier
{
    private string $secret;

    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    /**
     * Verify a webhook request signature.
     *
     * @param string $payload The raw request body (JSON string)
     * @param string $signature The X-MailOdds-Signature header value
     * @return bool True if the signature is valid
     */
    public function verify(string $payload, string $signature): bool
    {
        $expected = hash_hmac('sha256', $payload, $this->secret);
        return hash_equals($expected, $signature);
    }

    /**
     * Verify and parse a webhook payload.
     *
     * @param string $payload The raw request body
     * @param string $signature The X-MailOdds-Signature header value
     * @return array The parsed webhook event
     * @throws WebhookVerificationError If the signature is invalid
     */
    public function verifyAndParse(string $payload, string $signature): array
    {
        if (!$this->verify($payload, $signature)) {
            throw new WebhookVerificationError('Invalid webhook signature');
        }
        $event = json_decode($payload, true);
        if ($event === null) {
            throw new WebhookVerificationError('Invalid webhook payload: not valid JSON');
        }
        return $event;
    }
}

class WebhookVerificationError extends \RuntimeException {}
