<?php

namespace MailOdds\Enterprise;

use MailOdds\ApiException;

/**
 * Typed error classes for MailOdds API responses.
 * Each HTTP status code maps to a specific exception type.
 */
class MailOddsError extends \RuntimeException
{
    private ?string $errorCode;
    private ?string $requestId;
    private int $statusCode;
    private ?array $body;

    public function __construct(
        string $message,
        int $statusCode,
        ?string $errorCode = null,
        ?string $requestId = null,
        ?array $body = null
    ) {
        parent::__construct($message, $statusCode);
        $this->statusCode = $statusCode;
        $this->errorCode = $errorCode;
        $this->requestId = $requestId;
        $this->body = $body;
    }

    public function getStatusCode(): int { return $this->statusCode; }
    public function getErrorCode(): ?string { return $this->errorCode; }
    public function getRequestId(): ?string { return $this->requestId; }
    public function getBody(): ?array { return $this->body; }

    /**
     * Create a typed error from an ApiException.
     */
    public static function fromApiException(ApiException $e): self
    {
        $body = json_decode($e->getResponseBody() ?? '{}', true) ?: [];
        $message = $body['message'] ?? $e->getMessage();
        $errorCode = $body['error'] ?? null;
        $requestId = $body['request_id'] ?? null;
        $status = $e->getCode();

        return match ($status) {
            400 => new BadRequestError($message, $errorCode, $requestId, $body),
            401 => new UnauthorizedError($message, $errorCode, $requestId, $body),
            402 => new InsufficientCreditsError($message, $errorCode, $requestId, $body),
            403 => new ForbiddenError($message, $errorCode, $requestId, $body),
            429 => new RateLimitError($message, $errorCode, $requestId, $body),
            default => $status >= 500
                ? new ServerError($message, $status, $errorCode, $requestId, $body)
                : new self($message, $status, $errorCode, $requestId, $body),
        };
    }
}

class BadRequestError extends MailOddsError
{
    public function __construct(string $msg, ?string $code, ?string $reqId, ?array $body)
    {
        parent::__construct($msg, 400, $code, $reqId, $body);
    }
}

class UnauthorizedError extends MailOddsError
{
    public function __construct(string $msg, ?string $code, ?string $reqId, ?array $body)
    {
        parent::__construct($msg, 401, $code, $reqId, $body);
    }
}

class InsufficientCreditsError extends MailOddsError
{
    public function __construct(string $msg, ?string $code, ?string $reqId, ?array $body)
    {
        parent::__construct($msg, 402, $code, $reqId, $body);
    }

    public function getCreditsAvailable(): ?int
    {
        return $this->getBody()['credits_available'] ?? null;
    }

    public function getCreditsNeeded(): ?int
    {
        return $this->getBody()['credits_needed'] ?? null;
    }

    public function getUpgradeUrl(): ?string
    {
        return $this->getBody()['upgrade_url'] ?? null;
    }
}

class ForbiddenError extends MailOddsError
{
    public function __construct(string $msg, ?string $code, ?string $reqId, ?array $body)
    {
        parent::__construct($msg, 403, $code, $reqId, $body);
    }
}

class RateLimitError extends MailOddsError
{
    public function __construct(string $msg, ?string $code, ?string $reqId, ?array $body)
    {
        parent::__construct($msg, 429, $code, $reqId, $body);
    }
}

class ServerError extends MailOddsError {}
