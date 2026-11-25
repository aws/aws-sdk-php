<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Client;

use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Core\Checksum\ResponseChecksumValidation;
use Aws\Core\Credentials\AwsCredentialChain;
use Aws\Core\Credentials\AwsCredentialProviderRegistry;
use Aws\Core\Endpoint\Bytecode\AwsOpcodeHandler;
use Smithy\Auth\Aws\AwsCredentialsIdentityInterface;
use Smithy\Auth\Aws\SigV4AuthScheme;
use Smithy\Auth\Aws\StaticCredentialProvider;
use Smithy\Auth\CachingIdentityResolver;
use Smithy\Auth\HttpBearerAuthScheme;
use Smithy\Auth\IdentityChainInterface;
use Smithy\Auth\IdentityInterface;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Auth\IdentityResolvers;
use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Auth\AuthSchemeResolverInterface;
use Smithy\Client\Endpoint\Bytecode\Bytecode;
use Smithy\Client\Endpoint\Bytecode\BytecodeEndpointResolver;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Interceptor\InterceptorChain;
use Smithy\Client\Plugin\PluginInterface;
use Smithy\Client\Plugin\PluginState;
use Smithy\Client\Protocol\ProtocolResolverInterface;
use Smithy\Client\Retry\NoRetryStrategy;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Core\Shape\ServiceInterface;
use Smithy\Core\Transport\TransportInterface;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Http\Client\HttpClientTransport;
use Smithy\Protocol\ProtocolInterface;

/**
 * AWS-specific extension of {@see AbstractClientConfig}.
 *
 * A fully-populated AWS config requires service-specific machinery
 * (protocol, endpoint resolver, signing name) that a generated
 * per-service subclass knows. Subclasses supply the machinery via the
 * four abstract template methods:
 *
 *  - {@see createProtocol}
 *  - {@see getHttpClient}
 *  - {@see getEndpointResolver}
 *  - {@see getSigningName}
 *
 * `AbstractAwsClientConfig`'s constructor calls each once and hands the values
 * up to `parent::__construct(...)`.
 *
 * Constructor argument order groups by role, customer knobs first,
 * pipeline hooks last. Subclasses provide the machinery through the
 * template methods.
 *
 * Service-specific fields (`s3UseArnRegion`, `s3ForcePathStyle`, etc.)
 * live on the per-service subclass alongside its machinery.
 */
abstract class AbstractAwsClientConfig extends AbstractClientConfig
{
    private const EXPLICIT_RETRY_STRATEGY_CONTEXT_KEY
        = 'aws.hasExplicitRetryStrategy';
    private const EXPLICIT_REQUEST_CHECKSUM_CALCULATION_KEY =
        'aws.explicitRequestChecksumCalculation';
    private const EXPLICIT_RESPONSE_CHECKSUM_VALIDATION_KEY =
        'aws.explicitResponseChecksumValidation';
    private const RESOLVED_REQUEST_CHECKSUM_CALCULATION_KEY =
        'aws.resolvedRequestChecksumCalculation';
    private const RESOLVED_RESPONSE_CHECKSUM_VALIDATION_KEY =
        'aws.resolvedResponseChecksumValidation';
    private const SUPPORTS_FLEXIBLE_CHECKSUMS_KEY =
        'aws.supportsFlexibleChecksums';

    /**
     * Endpoint rules wire names mapped to modeled AWS auth scheme IDs.
     */
    private const ENDPOINT_AUTH_SCHEME_IDS = [
        'sigv4' => 'aws.auth#sigv4',
        'sigv4a' => 'aws.auth#sigv4a',
        'sigv4-s3express' => 'aws.auth#sigv4S3Express',
    ];

    private readonly bool $transportIsExplicit;
    private readonly ?EndpointResolverInterface $customEndpointResolver;

    public readonly string $region;
    public readonly IdentityResolverInterface $credentials;
    public readonly ?IdentityResolverInterface $tokenProvider;
    public readonly ?string $signingRegion;
    public readonly bool $useDualStack;
    public readonly bool $useFips;
    public readonly ?string $userAgentAppId;
    public readonly string $signingName;
    public readonly ?string $retryMode;
    public readonly ?int $maxAttempts;
    public readonly ?RequestChecksumCalculation $requestChecksumCalculation;
    public readonly ?ResponseChecksumValidation $responseChecksumValidation;
    public readonly bool $hasExplicitRetryStrategy;

    /**
     * Assemble the SDK's current standard credential chain.
     *
     * Generated service configs accept `credentials:` explicitly. Callers
     * can also use `S3ClientConfig::defaultCredentials()` (or another
     * subclass) to assemble the chain through the config class.
     *
     * @param array<string, mixed> $properties Shared chain assembly state.
     */
    public static function defaultCredentials(
        ?AwsCredentialProviderRegistry $registry = null,
        array $properties = [],
    ): IdentityChainInterface
    {
        return new AwsCredentialChain($registry, $properties);
    }

    /**
     * @param string|null $region AWS region (e.g. "us-east-1"). When null,
     *     the constructor resolves the region from env and the selected
     *     shared-config profile.
     * @param IdentityResolverInterface|AwsCredentialsIdentityInterface|null $credentials
     *     Either a credential provider (chained resolution) or a
     *     raw {@see AwsCredentialsIdentityInterface} value. Null resolves the
     *     standard AWS credential chain from the snapshotted shared config
     *     context. The raw form is wrapped in a {@see StaticCredentialProvider}
     *     so downstream signing only deals with the provider contract. Any
     *     resolver not already wrapped in a {@see CachingIdentityResolver} is
     *     decorated with one so per-request `resolveIdentity()` calls hit a
     *     hash-slot read once the identity is warm — see the resolver docblock
     *     for the refresh-window policy.
     * @param IdentityResolverInterface|null $tokenProvider Bearer-token
     *     provider used by `smithy.api#httpBearerAuth`. When configured,
     *     the matching auth scheme is registered automatically.
     * @param string|null $signingRegion Override for the signing region;
     *     falls back to `region` when null. Some services (S3 with
     *     accelerate, cross-region ARN access) sign against a region
     *     different from where the endpoint resolves.
     * @param bool $useDualStack Route to IPv6-capable dual-stack
     *     endpoints when the ruleset supports them.
     * @param bool $useFips Route to FIPS-140-validated endpoints when
     *     the ruleset supports them.
     * @param string|null $userAgentAppId Customer-supplied string
     *     appended to the User-Agent header by the user-agent interceptor.
     * @param list<string>|null $authSchemePreference Auth scheme names in
     *     customer-preferred order. Null resolves AWS environment and
     *     shared-config sources.
     * @param string|null $retryMode High-level AWS retry mode override.
     *     Supported today: `standard`.
     * @param int|null $maxAttempts High-level AWS retry attempt override.
     *     Must be a positive integer when provided.
     * @param RequestChecksumCalculation|string|null $requestChecksumCalculation
     *     Controls when flexible request checksums are calculated.
     * @param ResponseChecksumValidation|string|null $responseChecksumValidation
     *     Controls when flexible response checksums are validated.
     * @param bool $supportsFlexibleChecksums Generated capability marker.
     *     True only when the service binds an operation carrying
     *     `aws.protocols#httpChecksum`.
     * @param array<string, mixed> $context AWS and Smithy extension state.
     * @param HttpClientInterface|null $httpClient Fully-formed HTTP
     *     client to use verbatim. Bypasses the default `CurlClient`
     *     factory entirely — pass this when you have a mock, an
     *     application-owned client with shared plumbing, or a
     *     non-`CurlClient` implementation. When null, the SDK falls
     *     back to {@see getHttpClient()} which builds a `CurlClient`.
     * @param PluginState|null $pluginState Internal plugin application state.
     * @param TransportInterface|null $transport Transport implementation for
     *     serialized protocol messages. Mutually exclusive with `$httpClient`.
     * @param ProtocolInterface|null $protocol Explicit protocol override.
     * @param ProtocolResolverInterface|null $protocolResolver Selects a
     *     modeled protocol when no explicit implementation is configured.
     * @param string|null $protocolId Explicit modeled protocol shape ID.
     * @param ServiceInterface|null $service Runtime service metadata.
     * @param bool|null $protocolIsExplicit Internal protocol provenance.
     * @param string|null $endpoint Endpoint URL. With endpoint rules, it is
     *     the `Endpoint` rule input, kept in `context` so copies carry it.
     *     With no endpoint rules, every operation goes to this URL.
     * @param EndpointResolverInterface|null $endpointResolver Resolver that
     *     replaces the service's built-in endpoint rules. Copies keep it.
     *     Do not combine it with `$endpoint`.
     */
    public function __construct(
        ?string $region = null,
        IdentityResolverInterface|AwsCredentialsIdentityInterface|null $credentials = null,
        ?IdentityResolverInterface $tokenProvider = null,
        ?string $signingRegion = null,
        bool $useDualStack = false,
        bool $useFips = false,
        ?string $userAgentAppId = null,
        InterceptorChain $interceptors = new InterceptorChain(),
        array $supportedAuthSchemes = [],
        ?AuthSchemeResolverInterface $authSchemeResolver = null,
        ?array $authSchemePreference = null,
        ?string $retryMode = null,
        ?int $maxAttempts = null,
        RequestChecksumCalculation|string|null
            $requestChecksumCalculation = null,
        ResponseChecksumValidation|string|null
            $responseChecksumValidation = null,
        bool $supportsFlexibleChecksums = false,
        ?RetryStrategyInterface $retryStrategy = null,
        string $retryScope = '',
        array $context = [],
        ?HttpClientInterface $httpClient = null,
        ?PluginState $pluginState = null,
        ?TransportInterface $transport = null,
        ?ProtocolInterface $protocol = null,
        ?ProtocolResolverInterface $protocolResolver = null,
        ?string $protocolId = null,
        ?ServiceInterface $service = null,
        ?bool $protocolIsExplicit = null,
        ?string $endpoint = null,
        ?EndpointResolverInterface $endpointResolver = null
    ) {
        [$resolvedRegion, $context] = self::resolveRegionAndContext(
            $region,
            $context
        );
        $configResolver = new AwsClientConfigResolver();
        $awsContext = $configResolver->storedContextFromContext($context);
        if (!$awsContext instanceof AwsClientConfigContext) {
            throw new \LogicException('AWS client config context was not initialized.');
        }

        $resolvedCredentials = $credentials
            ?? $configResolver->resolveCredentials($awsContext);
        $resolver = $resolvedCredentials instanceof AwsCredentialsIdentityInterface
            ? new StaticCredentialProvider($resolvedCredentials)
            : $resolvedCredentials;
        // Always front the resolver with a cache. Static providers get a
        // no-op cache (their inner resolver returns the same instance on
        // every call), non-static providers get real refresh-window
        // amortization. Skip wrapping when the caller already handed us
        // a caching resolver — avoids nested decorators when composing
        // custom credential chains.
        $this->credentials = $resolver instanceof CachingIdentityResolver
            || $resolver instanceof IdentityChainInterface
            ? $resolver
            : new CachingIdentityResolver(
                $resolver,
                identityMatcher: self::sameCredential(...)
            );
        $this->tokenProvider = $tokenProvider === null
            ? null
            : self::cacheIdentityResolver($tokenProvider);
        if ($this->tokenProvider !== null
            && !self::containsAuthScheme(
                $supportedAuthSchemes,
                HttpBearerAuthScheme::ID
            )
        ) {
            $supportedAuthSchemes[] = new HttpBearerAuthScheme(
                $this->tokenProvider
            );
        }
        $this->region = $resolvedRegion;
        $this->signingRegion = $signingRegion;
        $this->useDualStack = $useDualStack;
        $this->useFips = $useFips;
        $this->userAgentAppId = $userAgentAppId;
        $this->signingName = $this->getSigningName();
        $this->retryMode = $retryMode;
        $this->maxAttempts = $maxAttempts;
        $authSchemePreference ??=
            $configResolver->resolveAuthSchemePreference($awsContext);
        if ($supportsFlexibleChecksums) {
            $context[self::SUPPORTS_FLEXIBLE_CHECKSUMS_KEY] = true;
        }
        $this->requestChecksumCalculation =
            $this->resolveRequestChecksumCalculation(
                $requestChecksumCalculation,
                $context
            );
        $this->responseChecksumValidation =
            $this->resolveResponseChecksumValidation(
                $responseChecksumValidation,
                $context
            );
        $this->hasExplicitRetryStrategy = $this->resolveExplicitRetryStrategy(
            $retryStrategy,
            $context
        );
        $context = [
            ...$context,
            self::EXPLICIT_RETRY_STRATEGY_CONTEXT_KEY
                => $this->hasExplicitRetryStrategy
        ];
        $endpointParameters = $context[
            EndpointResolverInterface::CONTEXT_PARAMETERS
        ] ?? [];
        if (!\is_array($endpointParameters)) {
            throw new \InvalidArgumentException(
                'Endpoint parameters must be an associative array.'
            );
        }
        $endpointParameters['Region'] = $this->region;
        $endpointParameters['UseFIPS'] = $this->useFips;
        $endpointParameters['UseDualStack'] = $this->useDualStack;
        $this->customEndpointResolver = $endpointResolver;
        $endpointResolver ??= $this->getEndpointResolver();
        if ($this->customEndpointResolver === null
            && $endpointResolver !== null
            && $endpoint !== null
        ) {
            if ($endpoint !== '') {
                $endpointParameters['Endpoint'] = $endpoint;
            }
            $endpoint = null;
        }
        $context[EndpointResolverInterface::CONTEXT_PARAMETERS] =
            $endpointParameters;
        $context[SigV4AuthScheme::IDENTITY_CONTEXT_KEY] =
            $this->getIdentityContext();

        $this->transportIsExplicit = $transport !== null;
        if (!$this->transportIsExplicit) {
            $resolvedClient = $httpClient
                ?? $this->getHttpClient();
            $transport = new HttpClientTransport($resolvedClient);
        }
        if ($protocol === null && $protocolResolver === null) {
            $protocol = $this->createProtocol();
        }

        parent::__construct(
            transport: $transport,
            endpointResolver: $endpointResolver,
            protocol: $protocol,
            protocolResolver: $protocolResolver,
            protocolId: $protocolId,
            interceptors: $interceptors,
            supportedAuthSchemes: $supportedAuthSchemes,
            authSchemeResolver: $authSchemeResolver,
            retryStrategy: $retryStrategy ?? NoRetryStrategy::instance(),
            retryScope: $retryScope,
            context: $context,
            authSchemePreference: $authSchemePreference,
            identityResolvers: new IdentityResolvers([
                AwsCredentialsIdentityInterface::class => $this->credentials,
            ]),
            service: $service,
            pluginState: $pluginState,
            protocolIsExplicit: $protocolIsExplicit,
            endpoint: $endpoint
        );
    }

    /**
     * Wire-format protocol. Hardcoded per service — S3 → `RestXmlProtocol`,
     * DynamoDB → `AwsJsonProtocol`, and so on.
     */
    abstract protected function createProtocol(): ProtocolInterface;

    /**
     * Factory for the SDK's default HTTP transport.
     *
     * Called by the constructor when no explicit `HttpClientInterface`
     * was passed. Each generated subclass returns a `CurlClient` wired
     * with whatever protocol/version affinity that service needs. The
     * parent constructor also accepts a fully-formed `HttpClientInterface`
     * for total override.
     */
    abstract protected function getHttpClient(): HttpClientInterface;

    /**
     * Endpoint rules engine for the target service. Hardcoded per
     * service (e.g., `S3EndpointResolver`).
     *
     * Returns `null` for a service with no endpoint rules; the config then
     * sends every operation to the `endpoint` URL.
     */
    abstract protected function getEndpointResolver(): ?EndpointResolverInterface;

    /**
     * Factory helper for the standard AWS wiring of
     * {@see BytecodeEndpointResolver}. All AWS service configs use
     * bytecode-based resolvers and all want the same
     * {@see AwsOpcodeHandler} composed in — so the abstract base owns
     * that plumbing once and subclasses just say "here's my bytecode".
     *
     * The handler dispatches the fused `aws.parseArn` /
     * `aws.partition` / `aws.isVirtualHostableS3Bucket` opcodes emitted
     * by the AWS codegen path
     * ({@see \Smithy\Codegen\Generator\EndpointBytecodeGenerator::normalizedExtendedOpcodes()}).
     * The handler runs only for those opcodes, so every AWS resolver
     * can carry it safely.
     *
     * @param array<string, mixed> $staticContext Client-wide static
     *     params baked into every resolution (e.g. per-service
     *     `AWS::Auth::SigV4::signingName`). Forwarded verbatim to
     *     {@see BytecodeEndpointResolver::__construct}.
     * @param (\Closure(array<string, mixed>): string)|null $keyBuilder
     *     Optional codegen-supplied cache-key builder. Emitted by
     *     `<Service>EndpointKeyBuilder::build()` when the AWS codegen
     *     pipeline is run with `generateEndpointKeyBuilder` on.
     *     A null value keeps the resolver on the built-in loop, which
     *     suits services and hand-authored subclasses that ship
     *     without a per-service key builder.
     */
    protected function bytecodeEndpointResolver(
        Bytecode $bytecode,
        array $staticContext = [],
        ?\Closure $keyBuilder = null,
    ): BytecodeEndpointResolver
    {
        return new BytecodeEndpointResolver(
            bytecode: $bytecode,
            staticContext: $staticContext,
            handler: new AwsOpcodeHandler(),
            keyBuilder: $keyBuilder,
            endpointAuthSchemeIds: self::ENDPOINT_AUTH_SCHEME_IDS,
        );
    }

    /**
     * SigV4 signing service name. Hardcoded per service ("s3", "sts", ...).
     */
    abstract protected function getSigningName(): string;

    /**
     * Effective signing region. Falls back to {@see $region} when
     * `signingRegion` is null. Callers should use this rather than
     * reading `signingRegion` directly.
     */
    public function getEffectiveSigningRegion(): string
    {
        return $this->signingRegion ?? $this->region;
    }

    /**
     * Config-derived context that credential providers and other
     * resolvers may consult through the `$properties` bag passed to
     * `resolveIdentity()`.
     *
     * Consumers treat these values as *hints*. Providers that vary by
     * profile, such as STS AssumeRole and IMDS, read this state through
     * the properties bag instead of the concrete config class.
     *
     * Standard keys:
     *  - `region`            — the client region.
     *  - `signingRegion`     — effective signing region (falls back to region).
     *  - `signingName`       — service signing name.
     *  - `useFips`           — bool.
     *  - `useDualStack`      — bool.
     *  - `userAgentAppId`    — nullable string.
     *
     * Subclasses may override to add service-specific hints.
     *
     * @return array<string, mixed>
     */
    public function getIdentityContext(): array
    {
        return [
            'region' => $this->region,
            'signingRegion' => $this->getEffectiveSigningRegion(),
            'signingName' => $this->signingName,
            'useFips' => $this->useFips,
            'useDualStack' => $this->useDualStack,
            'userAgentAppId' => $this->userAgentAppId,
        ];
    }

    public function withRegion(string $region): static
    {
        return $this->copyWith(['region' => $region]);
    }

    /**
     * Replace the credentials. Accepts either a provider or a raw
     * {@see AwsCredentialsIdentityInterface} value. The raw form is wrapped
     * in a {@see StaticCredentialProvider} at the boundary.
     */
    public function withCredentials(
        IdentityResolverInterface|AwsCredentialsIdentityInterface $credentials
    ): static
    {
        return $this->copyWith(['credentials' => $credentials]);
    }

    public function withSigningRegion(?string $signingRegion): static
    {
        return $this->copyWith(['signingRegion' => $signingRegion]);
    }

    public function withUseDualStack(bool $useDualStack): static
    {
        return $this->copyWith(['useDualStack' => $useDualStack]);
    }

    public function withUseFips(bool $useFips): static
    {
        return $this->copyWith(['useFips' => $useFips]);
    }

    public function withUserAgentAppId(?string $userAgentAppId): static
    {
        return $this->copyWith(['userAgentAppId' => $userAgentAppId]);
    }

    public function withRetryMode(?string $retryMode): static
    {
        return $this->copyWith(['retryMode' => $retryMode]);
    }

    public function withMaxAttempts(?int $maxAttempts): static
    {
        return $this->copyWith(['maxAttempts' => $maxAttempts]);
    }

    /**
     * Create a config with a value stored in the context bag.
     */
    public function withContext(string $key, mixed $value): static
    {
        return $this->copyWithContext([
            ...$this->context,
            $key => $value
        ]);
    }

    public function withRequestChecksumCalculation(
        RequestChecksumCalculation|string|null $setting
    ): static
    {
        $context = $this->context;
        unset($context[self::RESOLVED_REQUEST_CHECKSUM_CALCULATION_KEY]);
        if ($setting === null) {
            unset(
                $context[self::EXPLICIT_REQUEST_CHECKSUM_CALCULATION_KEY]
            );
        } else {
            $context[self::EXPLICIT_REQUEST_CHECKSUM_CALCULATION_KEY] =
                $setting instanceof RequestChecksumCalculation
                    ? $setting
                    : RequestChecksumCalculation::fromString($setting);
        }

        return $this->copyWithContext($context);
    }

    public function withResponseChecksumValidation(
        ResponseChecksumValidation|string|null $setting
    ): static
    {
        $context = $this->context;
        unset($context[self::RESOLVED_RESPONSE_CHECKSUM_VALIDATION_KEY]);
        if ($setting === null) {
            unset(
                $context[self::EXPLICIT_RESPONSE_CHECKSUM_VALIDATION_KEY]
            );
        } else {
            $context[self::EXPLICIT_RESPONSE_CHECKSUM_VALIDATION_KEY] =
                $setting instanceof ResponseChecksumValidation
                    ? $setting
                    : ResponseChecksumValidation::fromString($setting);
        }

        return $this->copyWithContext($context);
    }

    public function withResolvedChecksumSettings(
        RequestChecksumCalculation $request,
        ResponseChecksumValidation $response
    ): static
    {
        return $this->copyWithContext([
            ...$this->context,
            self::RESOLVED_REQUEST_CHECKSUM_CALCULATION_KEY => $request,
            self::RESOLVED_RESPONSE_CHECKSUM_VALIDATION_KEY => $response
        ]);
    }

    public function supportsFlexibleChecksums(): bool
    {
        return ($this->context[self::SUPPORTS_FLEXIBLE_CHECKSUMS_KEY]
            ?? false) === true;
    }

    /**
     * Return the service plugins that clients built with this config
     * install by default.
     *
     * @return list<PluginInterface>
     */
    public function getDefaultPlugins(): array
    {
        return [];
    }

    public function withRetryStrategy(RetryStrategyInterface $strategy): static
    {
        return $this->copyWithContext([
            ...$this->context,
            self::EXPLICIT_RETRY_STRATEGY_CONTEXT_KEY => true
        ], [
            'retryStrategy' => $strategy
        ]);
    }

    public function withResolvedRetryStrategy(
        RetryStrategyInterface $strategy
    ): static
    {
        return $this->copyWithContext([
            ...$this->context,
            self::EXPLICIT_RETRY_STRATEGY_CONTEXT_KEY => false
        ], [
            'retryStrategy' => $strategy
        ]);
    }

    /**
     * Build and store the shared AWS context, then resolve the region if needed.
     *
     * @param array<string, mixed> $context
     * @return array{0:string, 1:array<string, mixed>}
     */
    protected static function resolveRegionAndContext(
        ?string $region,
        array $context
    ): array
    {
        $resolver = new AwsClientConfigResolver();
        $awsContext = $resolver->buildContext($context);

        return [
            $region ?? $resolver->resolveRegion($awsContext),
            $resolver->storeContext($context, $awsContext)
        ];
    }

    /**
     * @param array<string, mixed> $overrides
     */
    abstract protected function copyWith(array $overrides): static;

    /**
     * @param array<string, mixed> $context
     * @param array<string, mixed> $overrides
     */
    private function copyWithContext(
        array $context,
        array $overrides = []
    ): static
    {
        return $this->copyWith([
            ...$overrides,
            'context' => $context
        ]);
    }

    /**
     * Select the HTTP client constructor argument for a config copy.
     *
     * Preserve the materialized client for ordinary copies.
     *
     * @param array<string, mixed> $overrides
     */
    protected function httpClientForCopy(
        array $overrides
    ): ?HttpClientInterface
    {
        if (\array_key_exists('httpClient', $overrides)) {
            return $overrides['httpClient'];
        }

        if (\array_key_exists('transport', $overrides)) {
            return null;
        }

        return !$this->transportIsExplicit
            && $this->transport instanceof HttpClientTransport
            ? $this->transport->httpClient
            : null;
    }

    /**
     * Select the endpoint resolver constructor argument for a config copy.
     *
     * Keep a resolver set by the caller. Otherwise return null so the copy
     * rebuilds the built-in resolver from its own settings.
     *
     * @param array<string, mixed> $overrides
     */
    protected function endpointResolverForCopy(
        array $overrides
    ): ?EndpointResolverInterface
    {
        return \array_key_exists('endpointResolver', $overrides)
            ? $overrides['endpointResolver']
            : $this->customEndpointResolver;
    }

    /**
     * Select the transport constructor argument for a config copy.
     *
     * HTTP-backed configs continue through the HTTP client seam so changing
     * its configuration rebuilds the adapter. Explicit transports are
     * preserved until an HTTP client replaces them.
     *
     * @param array<string, mixed> $overrides
     */
    protected function transportForCopy(
        array $overrides
    ): ?TransportInterface
    {
        if (\array_key_exists('transport', $overrides)) {
            return $overrides['transport'];
        }

        if (\array_key_exists('httpClient', $overrides)) {
            return null;
        }

        return $this->transportIsExplicit ? $this->transport : null;
    }

    /**
     * @param array<string, mixed> $context
     */
    private function resolveExplicitRetryStrategy(
        ?RetryStrategyInterface $retryStrategy,
        array $context
    ): bool
    {
        $preserved = $context[self::EXPLICIT_RETRY_STRATEGY_CONTEXT_KEY]
            ?? null;
        if (\is_bool($preserved)) {
            return $preserved;
        }

        return $retryStrategy !== null;
    }

    /**
     * @param array<string, mixed> $context
     */
    private function resolveRequestChecksumCalculation(
        RequestChecksumCalculation|string|null $setting,
        array &$context
    ): ?RequestChecksumCalculation
    {
        $resolved = $context[
            self::RESOLVED_REQUEST_CHECKSUM_CALCULATION_KEY
        ] ?? null;
        if ($resolved instanceof RequestChecksumCalculation) {
            return $resolved;
        }

        $explicitKey = self::EXPLICIT_REQUEST_CHECKSUM_CALCULATION_KEY;
        $explicit = $setting ?? ($context[$explicitKey] ?? null);
        if ($explicit === null) {
            return null;
        }

        $normalized = $explicit instanceof RequestChecksumCalculation
            ? $explicit
            : RequestChecksumCalculation::fromString((string) $explicit);
        $context[$explicitKey] = $normalized;

        return $normalized;
    }

    /**
     * @param array<string, mixed> $context
     */
    private function resolveResponseChecksumValidation(
        ResponseChecksumValidation|string|null $setting,
        array &$context
    ): ?ResponseChecksumValidation
    {
        $resolved = $context[
            self::RESOLVED_RESPONSE_CHECKSUM_VALIDATION_KEY
        ] ?? null;
        if ($resolved instanceof ResponseChecksumValidation) {
            return $resolved;
        }

        $explicitKey = self::EXPLICIT_RESPONSE_CHECKSUM_VALIDATION_KEY;
        $explicit = $setting ?? ($context[$explicitKey] ?? null);
        if ($explicit === null) {
            return null;
        }

        $normalized = $explicit instanceof ResponseChecksumValidation
            ? $explicit
            : ResponseChecksumValidation::fromString((string) $explicit);
        $context[$explicitKey] = $normalized;

        return $normalized;
    }

    private static function cacheIdentityResolver(
        IdentityResolverInterface $resolver
    ): IdentityResolverInterface
    {
        return $resolver instanceof CachingIdentityResolver
            || $resolver instanceof IdentityChainInterface
                ? $resolver
                : new CachingIdentityResolver($resolver);
    }

    private static function sameCredential(
        IdentityInterface $cached,
        IdentityInterface $rejected
    ): bool
    {
        if ($cached instanceof AwsCredentialsIdentityInterface
            && $rejected instanceof AwsCredentialsIdentityInterface
        ) {
            return $cached->getAccessKeyId()
                === $rejected->getAccessKeyId();
        }

        return $cached === $rejected;
    }

    /**
     * @param list<\Smithy\Auth\AuthSchemeInterface> $schemes
     */
    private static function containsAuthScheme(
        array $schemes,
        string $schemeId
    ): bool
    {
        foreach ($schemes as $scheme) {
            if ($scheme->getSchemeId() === $schemeId) {
                return true;
            }
        }

        return false;
    }
}
