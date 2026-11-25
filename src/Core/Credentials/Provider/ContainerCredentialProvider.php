<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Credentials\Provider;

use Aws\Core\Credentials\AwsCredentialChain;
use Aws\Core\Credentials\AwsCredentialSource;
use Psr\Http\Message\ResponseInterface;
use Smithy\Auth\Aws\AwsCredentials;
use Smithy\Auth\Aws\AwsCredentialsIdentityInterface;
use Smithy\Auth\CachingIdentityResolver;
use Smithy\Auth\ChainIdentityProviderInterface;
use Smithy\Auth\ChainSetup;
use Smithy\Auth\IdentityInterface;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Auth\IdentityResult;
use Smithy\Auth\NonRecoverableIdentityException;
use Smithy\Auth\OrderingConstraint;
use Smithy\Http\Client\Configuration\ConnectConfiguration;
use Smithy\Http\Client\CurlClient;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Http\Client\HttpRequestOptions;
use Smithy\Http\Message\Request;

/**
 * Resolve credentials from the general HTTP credentials endpoint.
 *
 * This provider implements the generalized container-credentials specification. It
 * validates loopback and approved link-local HTTP hosts, allows arbitrary
 * HTTPS hosts, and re-reads token files for each credentials request.
 *
 * @implements ChainIdentityProviderInterface<AwsCredentialsIdentityInterface>
 * @implements IdentityResolverInterface<AwsCredentialsIdentityInterface>
 */
final class ContainerCredentialProvider implements
    ChainIdentityProviderInterface,
    IdentityResolverInterface
{
    private const FULL_URI_ENV = 'AWS_CONTAINER_CREDENTIALS_FULL_URI';
    private const RELATIVE_URI_ENV = 'AWS_CONTAINER_CREDENTIALS_RELATIVE_URI';
    private const AUTH_TOKEN_ENV = 'AWS_CONTAINER_AUTHORIZATION_TOKEN';
    private const AUTH_TOKEN_FILE_ENV = 'AWS_CONTAINER_AUTHORIZATION_TOKEN_FILE';
    private const DEFAULT_RELATIVE_ENDPOINT = 'http://169.254.170.2';
    private const DEFAULT_OPEN_TIMEOUT = 1.0;
    private const DEFAULT_READ_TIMEOUT = 1.0;

    private ?string $fullUri = null;
    private ?string $relativeUri = null;
    private ?string $authorizationToken = null;
    private ?string $authorizationTokenFile = null;
    private ?HttpClientInterface $httpClient = null;

    /**
     * Create a general HTTP credential provider.
     */
    public function __construct(
        ?HttpClientInterface $httpClient = null,
        private readonly ?int $refreshWindowSeconds = null,
    ) {
        $this->httpClient = $httpClient;
    }

    /**
     * Return the provider name.
     */
    public function name(): string
    {
        return AwsCredentialSource::ECS_CONTAINER->canonicalName();
    }

    /**
     * Return the provider ordering.
     */
    public function ordering(): OrderingConstraint
    {
        return OrderingConstraint::standard(AwsCredentialSource::ECS_CONTAINER->value);
    }

    /**
     * Return the emitted feature IDs.
     *
     * @return list<string>
     */
    public function featureIds(): array
    {
        return ['z'];
    }

    /**
     * Register the provider when endpoint env configuration exists.
     *
     * @return void
     */
    public function setup(ChainSetup $setup): void
    {
        $fullUri = self::readEnv(self::FULL_URI_ENV);
        $relativeUri = self::readEnv(self::RELATIVE_URI_ENV);
        if (!$this->hasEndpointConfiguration($fullUri, $relativeUri)) {
            return;
        }

        $resolver = clone $this;
        $resolver->fullUri = $fullUri;
        $resolver->relativeUri = $relativeUri;
        $resolver->authorizationTokenFile = self::readEnv(self::AUTH_TOKEN_FILE_ENV);
        $resolver->authorizationToken = self::readEnv(self::AUTH_TOKEN_ENV);

        $setup->addTerminalResolver(new CachingIdentityResolver(
            $resolver,
            $this->refreshWindowSeconds,
            AwsCredentialChain::sameCredential(...)
        ));
    }

    /**
     * Resolve credentials from the configured HTTP endpoint.
     */
    public function resolveIdentity(array $properties = []): IdentityResult
    {
        if (!$this->hasEndpointConfiguration(
            $this->fullUri ?? self::readEnv(self::FULL_URI_ENV),
            $this->relativeUri ?? self::readEnv(self::RELATIVE_URI_ENV)
        )) {
            return IdentityResult::notFound(
                self::class,
                'Container credentials endpoint is not configured'
            );
        }

        $endpoint = $this->resolveEndpoint();
        $headers = $this->resolveHeaders();
        $response = $this->sendRequest($endpoint, $headers);

        if ($response->getStatusCode() !== 200) {
            $this->throwForErrorResponse($response);
        }

        return IdentityResult::success($this->parseCredentialsResponse($response));
    }

    /**
     * Leave invalidation to the wrapping cache, which holds the identity state.
     */
    public function invalidate(IdentityInterface $rejectedIdentity): void
    {
    }

    private function hasEndpointConfiguration(?string $fullUri, ?string $relativeUri): bool
    {
        return $fullUri !== null || $relativeUri !== null;
    }

    private function parseCredentialsResponse(ResponseInterface $response): AwsCredentials
    {
        try {
            $data = json_decode((string) $response->getBody(), true, flags: JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new \RuntimeException('credentials endpoint returned invalid JSON', previous: $e);
        }

        if (!\is_array($data)) {
            throw new \RuntimeException('credentials endpoint returned invalid JSON');
        }

        $accessKey = $data['AccessKeyId'] ?? null;
        $secretKey = $data['SecretAccessKey'] ?? null;
        if (!\is_string($accessKey)
            || $accessKey === ''
            || !\is_string($secretKey)
            || $secretKey === ''
        ) {
            throw new \RuntimeException(
                'credentials endpoint response missing AccessKeyId or SecretAccessKey'
            );
        }

        $sessionToken = isset($data['Token']) && \is_string($data['Token']) && $data['Token'] !== ''
            ? $data['Token']
            : null;
        $accountId = isset($data['AccountId'])
            && \is_string($data['AccountId'])
            && $data['AccountId'] !== ''
            ? $data['AccountId']
            : null;
        $expiration = null;
        if (isset($data['Expiration'])
            && \is_string($data['Expiration'])
            && $data['Expiration'] !== ''
        ) {
            try {
                $expiration = (float) (new \DateTimeImmutable($data['Expiration']))->getTimestamp();
            } catch (\Exception) {
                $expiration = null;
            }
        }

        return new AwsCredentials($accessKey, $secretKey, $sessionToken, $expiration, $accountId);
    }

    private function resolveEndpoint(): string
    {
        $relativeUri = $this->relativeUri ?? self::readEnv(self::RELATIVE_URI_ENV);
        $fullUri = $this->fullUri ?? self::readEnv(self::FULL_URI_ENV);

        $endpoint = $relativeUri !== null
            ? self::DEFAULT_RELATIVE_ENDPOINT . $relativeUri
            : $fullUri;

        if (!\is_string($endpoint) || $endpoint === '') {
            throw new NonRecoverableIdentityException('container credentials endpoint is not configured');
        }

        $parts = parse_url($endpoint);
        if (!\is_array($parts) || !isset($parts['scheme'], $parts['host'])) {
            throw new NonRecoverableIdentityException('container credentials endpoint is not a valid URI');
        }

        $scheme = strtolower((string) $parts['scheme']);
        $host = strtolower(trim((string) $parts['host'], '[]'));
        if ($scheme !== 'http' && $scheme !== 'https') {
            throw new NonRecoverableIdentityException('container credentials endpoint must use http or https');
        }

        if ($scheme === 'https') {
            return $endpoint;
        }

        if (!self::isAllowedHttpHost($host)) {
            throw new NonRecoverableIdentityException(sprintf("'%s' is not an allowed host", $host));
        }

        return $endpoint;
    }

    /**
     * @return array<string, string>
     */
    private function resolveHeaders(): array
    {
        $token = $this->resolveAuthorizationToken();
        if ($token === null) {
            return [];
        }

        if (str_contains($token, "\r") || str_contains($token, "\n")) {
            throw new NonRecoverableIdentityException('authorization token must not contain CR or LF characters');
        }

        return ['Authorization' => $token];
    }

    private function resolveAuthorizationToken(): ?string
    {
        $tokenFile = $this->authorizationTokenFile ?? self::readEnv(self::AUTH_TOKEN_FILE_ENV);
        if ($tokenFile !== null) {
            if (!self::isAbsolutePath($tokenFile)) {
                throw new NonRecoverableIdentityException(sprintf(
                    'authorization token file path must be absolute: %s',
                    $tokenFile,
                ));
            }

            $error = null;
            set_error_handler(static function (int $severity, string $message) use (&$error): bool {
                $error = $message;
                return true;
            });

            try {
                $contents = file_get_contents($tokenFile);
            } finally {
                restore_error_handler();
            }

            if (!\is_string($contents)) {
                $suffix = $error !== null ? ': ' . $error : '';
                throw new \RuntimeException(sprintf(
                    "failed to read authorization token from '%s'%s",
                    $tokenFile,
                    $suffix,
                ));
            }

            return $contents;
        }

        return $this->authorizationToken ?? self::readEnv(self::AUTH_TOKEN_ENV);
    }

    private function throwForErrorResponse(ResponseInterface $response): never
    {
        $status = $response->getStatusCode();
        $reason = $response->getReasonPhrase();
        $metadata = $this->extractErrorMetadata($response);
        $prefix = $metadata === []
            ? 'received non-2xx response from credentials endpoint'
            : 'received error response from credentials endpoint';

        throw new \RuntimeException(
            sprintf(
                '%s: %d%s',
                $prefix,
                $status,
                $reason !== '' ? ' ' . $reason : '',
            ),
            $status,
        );
    }

    /**
     * @return array{Code?:string, Message?:string}
     */
    private function extractErrorMetadata(ResponseInterface $response): array
    {
        $body = (string) $response->getBody();
        if ($body === '') {
            return [];
        }

        try {
            $data = json_decode($body, true, flags: JSON_THROW_ON_ERROR);
        } catch (\JsonException) {
            return [];
        }

        if (!\is_array($data)) {
            return [];
        }

        $metadata = [];
        if (isset($data['Code']) && \is_string($data['Code']) && $data['Code'] !== '') {
            $metadata['Code'] = $data['Code'];
        }

        if (isset($data['Message']) && \is_string($data['Message']) && $data['Message'] !== '') {
            $metadata['Message'] = $data['Message'];
        }

        return $metadata;
    }

    /**
     * @param array<string, string> $headers
     */
    private function sendRequest(string $url, array $headers): \Psr\Http\Message\ResponseInterface
    {
        $this->httpClient ??= $this->newHttpClient();

        try {
            return $this->httpClient->sendRequest(
                new Request('GET', $url, $headers),
                new HttpRequestOptions(
                    timeout: self::DEFAULT_OPEN_TIMEOUT
                        + self::DEFAULT_READ_TIMEOUT,
                ),
            );
        } catch (\Throwable $e) {
            throw new \RuntimeException(
                'container credentials HTTP request failed: '
                . $e->getMessage(),
                previous: $e,
            );
        }
    }

    private function newHttpClient(): HttpClientInterface
    {
        return new CurlClient(
            connectConfiguration: new ConnectConfiguration(
                connectTimeout: self::DEFAULT_OPEN_TIMEOUT,
            ),
        );
    }

    private static function readEnv(string $name): ?string
    {
        $value = $_ENV[$name] ?? getenv($name);
        if ($value === false || $value === '') {
            return null;
        }

        return (string) $value;
    }

    private static function isAllowedHttpHost(string $host): bool
    {
        if (self::isLoopbackIpv4($host) || $host === '::1') {
            return true;
        }

        return $host === '169.254.170.2'
            || $host === '169.254.170.23'
            || $host === 'fd00:ec2::23';
    }

    private static function isLoopbackIpv4(string $host): bool
    {
        if (filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) {
            return false;
        }

        return str_starts_with($host, '127.');
    }

    private static function isAbsolutePath(string $path): bool
    {
        if ($path === '') {
            return false;
        }

        if (str_starts_with($path, '/')) {
            return true;
        }

        return (bool) preg_match('/^[A-Za-z]:[\\\\\/]/', $path);
    }
}
