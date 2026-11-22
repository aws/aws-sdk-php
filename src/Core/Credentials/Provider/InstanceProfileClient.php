<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Credentials\Provider;

use Aws\Core\Credentials\AwsProfile;
use Revolt\EventLoop as Revolt;
use Smithy\Http\Client\Configuration\ConnectConfiguration;
use Smithy\Http\Client\CurlClient;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Http\Client\HttpRequestOptions;
use Smithy\Http\Message\Request;

/**
 * Read raw metadata from IMDSv2.
 *
 * The public surface stays intentionally small: `get(path)` returns the IMDS
 * response body as a string. Token acquisition, token caching, endpoint
 * resolution, and retry behavior are handled internally per the IMDS client
 * specification.
 */
final class InstanceProfileClient
{
    private const DEFAULT_ENDPOINT_IPV4 = 'http://169.254.169.254';
    private const DEFAULT_ENDPOINT_IPV6 = 'http://[fd00:ec2::254]';
    private const TOKEN_PATH = '/latest/api/token';
    private const DEFAULT_RETRIES = 3;
    private const DEFAULT_TOKEN_TTL = 21600;
    private const DEFAULT_OPEN_TIMEOUT = 1.0;
    private const DEFAULT_READ_TIMEOUT = 1.0;

    /** @var null|callable(int):void */
    private readonly mixed $backoff;
    private readonly string $endpoint;
    private readonly int $retries;
    private readonly int $tokenTtl;
    private readonly float $openTimeout;
    private readonly float $readTimeout;
    private ?HttpClientInterface $httpClient = null;
    private ?string $cachedToken = null;
    private ?float $tokenExpiry = null;

    /**
     * @param array{
     *   retries?:int,
     *   endpoint?:?string,
     *   port?:?int,
     *   token_ttl?:?int,
     *   endpoint_mode?:?string,
     *   http_open_timeout?:?float,
     *   http_read_timeout?:?float,
     *   backoff?:null|float|callable(int):void
     * } $options
     * @param null|callable(string):(?string) $getEnv
     */
    public function __construct(
        array $options = [],
        ?AwsProfile $profile = null,
        ?callable $getEnv = null,
        ?HttpClientInterface $httpClient = null,
    ) {
        $getEnv ??= static function (string $name): ?string {
            $value = $_ENV[$name] ?? getenv($name);
            if ($value === false || $value === null || $value === '') {
                return null;
            }

            return (string) $value;
        };

        $this->retries = isset($options['retries'])
            ? max(0, (int) $options['retries'])
            : self::DEFAULT_RETRIES;
        $this->tokenTtl = isset($options['token_ttl'])
            ? (int) $options['token_ttl']
            : self::DEFAULT_TOKEN_TTL;
        $this->openTimeout = isset($options['http_open_timeout'])
            ? (float) $options['http_open_timeout']
            : self::DEFAULT_OPEN_TIMEOUT;
        $this->readTimeout = isset($options['http_read_timeout'])
            ? (float) $options['http_read_timeout']
            : self::DEFAULT_READ_TIMEOUT;
        $this->backoff = $this->normalizeBackoff($options['backoff'] ?? null);
        $this->endpoint = $this->resolveEndpoint($options, $profile, $getEnv);
        $this->httpClient = $httpClient;
    }

    /**
     * Fetch metadata from IMDS.
     */
    public function get(string $path): string
    {
        $path = '/' . ltrim($path, '/');
        $lastError = null;

        for ($attempt = 0; $attempt <= $this->retries; $attempt++) {
            try {
                $token = $this->getToken();
                $response = $this->sendRequest(
                    'GET',
                    $this->endpoint . $path,
                    ['X-aws-ec2-metadata-token' => $token],
                );

                if ($response['status'] === 200) {
                    return $response['body'];
                }

                if ($response['status'] === 401) {
                    $this->cachedToken = null;
                    $this->tokenExpiry = null;
                    $lastError = new \RuntimeException(
                        'IMDS request returned 401 Unauthorized',
                        401,
                    );
                } elseif ($response['status'] === 404) {
                    throw new \RuntimeException('IMDS path not found: ' . $path, 404);
                } else {
                    $lastError = new \RuntimeException(
                        'IMDS request returned status ' . $response['status'],
                        $response['status'],
                    );
                }
            } catch (\RuntimeException $e) {
                if ($e->getCode() === 404) {
                    throw $e;
                }

                $lastError = $e;
            }

            if ($attempt < $this->retries) {
                $this->sleepBeforeRetry($attempt);
            }
        }

        throw $lastError;
    }

    private function getToken(): string
    {
        if ($this->hasFreshToken()) {
            return $this->cachedToken;
        }

        $lastError = null;
        for ($attempt = 0; $attempt <= $this->retries; $attempt++) {
            try {
                $response = $this->sendRequest(
                    'PUT',
                    $this->endpoint . self::TOKEN_PATH,
                    ['X-aws-ec2-metadata-token-ttl-seconds' => (string) $this->tokenTtl],
                );

                if ($response['status'] === 200) {
                    $ttlHeader = $response['headers'][
                        'x-aws-ec2-metadata-token-ttl-seconds'
                    ] ?? null;
                    $ttl = is_string($ttlHeader) && ctype_digit($ttlHeader)
                        ? (int) $ttlHeader
                        : $this->tokenTtl;

                    $this->cachedToken = $response['body'];
                    $this->tokenExpiry = microtime(true) + $ttl;
                    return $this->cachedToken;
                }

                if ($response['status'] === 400 || $response['status'] === 403) {
                    throw new \RuntimeException(
                        'IMDS token request returned status ' . $response['status'],
                        $response['status'],
                    );
                }

                $lastError = new \RuntimeException(
                    'IMDS token request returned status ' . $response['status'],
                    $response['status'],
                );
            } catch (\RuntimeException $e) {
                if ($e->getCode() === 400 || $e->getCode() === 403) {
                    throw $e;
                }

                $lastError = $e;
            }

            if ($attempt < $this->retries) {
                $this->sleepBeforeRetry($attempt);
            }
        }

        throw $lastError;
    }

    private function hasFreshToken(): bool
    {
        return $this->cachedToken !== null
            && $this->tokenExpiry !== null
            && $this->tokenExpiry > microtime(true);
    }

    /**
     * @param array{
     *   endpoint?:?string,
     *   port?:?int,
     *   endpoint_mode?:?string
     * } $options
     * @param callable(string):(?string) $getEnv
     */
    private function resolveEndpoint(array $options, ?AwsProfile $profile, callable $getEnv): string
    {
        $endpoint = $options['endpoint'] ?? null;
        if (!is_string($endpoint) || $endpoint === '') {
            $endpoint = $getEnv('AWS_EC2_METADATA_SERVICE_ENDPOINT')
                ?? $profile?->get('ec2_metadata_service_endpoint');
        }

        if (!is_string($endpoint) || $endpoint === '') {
            $mode = $options['endpoint_mode'] ?? null;
            if (!is_string($mode) || $mode === '') {
                $mode = $getEnv('AWS_EC2_METADATA_SERVICE_ENDPOINT_MODE')
                    ?? $profile?->get('ec2_metadata_service_endpoint_mode')
                    ?? 'IPv4';
            }

            if ($mode !== 'IPv4' && $mode !== 'IPv6') {
                throw new \InvalidArgumentException('endpoint_mode must be IPv4 or IPv6');
            }

            $endpoint = $mode === 'IPv6'
                ? self::DEFAULT_ENDPOINT_IPV6
                : self::DEFAULT_ENDPOINT_IPV4;
        }

        $parts = parse_url($endpoint);
        if (!is_array($parts) || !isset($parts['scheme']) || $parts['scheme'] === '') {
            throw new \InvalidArgumentException('IMDS endpoint must include a URI scheme');
        }

        $port = isset($options['port']) && $options['port'] !== null
            ? (int) $options['port']
            : (isset($parts['port']) ? (int) $parts['port'] : null);

        $scheme = $parts['scheme'];
        $host = $parts['host'] ?? null;
        if (!is_string($host) || $host === '') {
            throw new \InvalidArgumentException('IMDS endpoint must include a host');
        }

        $path = isset($parts['path']) ? rtrim((string) $parts['path'], '/') : '';
        $wrappedHost = str_contains($host, ':') && !str_starts_with($host, '[')
            ? '[' . $host . ']'
            : $host;

        $authority = $port === null
            ? $wrappedHost
            : sprintf('%s:%d', $wrappedHost, $port);

        return sprintf('%s://%s%s', $scheme, $authority, $path);
    }

    /**
     * @param null|float|callable(int):void $backoff
     * @return null|callable(int):void
     */
    private function normalizeBackoff(null|float|callable $backoff): ?callable
    {
        if ($backoff === null) {
            return null;
        }

        if (is_callable($backoff)) {
            return $backoff;
        }

        return static function (int $attempt) use ($backoff): void {
            $suspension = Revolt::getSuspension();
            Revolt::delay($backoff, static fn (): mixed => $suspension->resume());
            $suspension->suspend();
        };
    }

    private function sleepBeforeRetry(int $attempt): void
    {
        if ($this->backoff !== null) {
            ($this->backoff)($attempt);
            return;
        }

        $delay = 0.1 * (2 ** $attempt);
        $suspension = Revolt::getSuspension();
        Revolt::delay($delay, static fn (): mixed => $suspension->resume());
        $suspension->suspend();
    }

    /**
     * @return array{status:int, body:string, headers:array<string, string>}
     */
    private function sendRequest(string $method, string $url, array $headers): array
    {
        $this->httpClient ??= new CurlClient(
            connectConfiguration: new ConnectConfiguration(connectTimeout: $this->openTimeout),
        );

        try {
            $response = $this->httpClient->sendRequest(
                new Request($method, $url, $headers),
                new HttpRequestOptions(timeout: $this->openTimeout + $this->readTimeout),
            );
        } catch (\Throwable $e) {
            throw new \RuntimeException(
                'IMDS HTTP request failed: ' . $e->getMessage(),
                previous: $e,
            );
        }

        $responseHeaders = [];
        foreach ($response->getHeaders() as $name => $values) {
            if ($values === []) {
                continue;
            }

            $responseHeaders[strtolower($name)] = $values[0];
        }

        return [
            'status' => $response->getStatusCode(),
            'body' => (string) $response->getBody(),
            'headers' => $responseHeaders,
        ];
    }
}
