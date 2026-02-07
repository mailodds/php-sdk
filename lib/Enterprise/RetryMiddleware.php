<?php

namespace MailOdds\Enterprise;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Retry middleware for MailOdds API calls.
 *
 * Retries on 429 (rate limit) and 5xx (server error) with exponential backoff + jitter.
 * Does NOT retry on 4xx (except 429) -- those are client errors.
 */
class RetryMiddleware
{
    private int $maxRetries;
    private float $baseDelay;
    private float $maxDelay;

    public function __construct(int $maxRetries = 3, float $baseDelay = 1.0, float $maxDelay = 30.0)
    {
        $this->maxRetries = $maxRetries;
        $this->baseDelay = $baseDelay;
        $this->maxDelay = $maxDelay;
    }

    /**
     * Returns a Guzzle middleware handler for retry logic.
     */
    public function handler(): callable
    {
        return function (callable $handler) {
            return function (Request $request, array $options) use ($handler) {
                return $this->retry($handler, $request, $options, 0);
            };
        };
    }

    private function retry(callable $handler, Request $request, array $options, int $attempt)
    {
        return $handler($request, $options)->then(
            function (ResponseInterface $response) use ($handler, $request, $options, $attempt) {
                $status = $response->getStatusCode();
                if ($this->shouldRetry($status) && $attempt < $this->maxRetries) {
                    $delay = $this->calculateDelay($attempt);
                    usleep((int)($delay * 1_000_000));
                    return $this->retry($handler, $request, $options, $attempt + 1);
                }
                return $response;
            },
            function ($reason) use ($handler, $request, $options, $attempt) {
                if ($attempt < $this->maxRetries && $reason instanceof ConnectException) {
                    $delay = $this->calculateDelay($attempt);
                    usleep((int)($delay * 1_000_000));
                    return $this->retry($handler, $request, $options, $attempt + 1);
                }
                throw $reason;
            }
        );
    }

    private function shouldRetry(int $statusCode): bool
    {
        return $statusCode === 429 || $statusCode >= 500;
    }

    private function calculateDelay(int $attempt): float
    {
        $delay = min($this->baseDelay * (2 ** $attempt), $this->maxDelay);
        $jitter = $delay * 0.1 * (mt_rand() / mt_getrandmax());
        return $delay + $jitter;
    }
}
