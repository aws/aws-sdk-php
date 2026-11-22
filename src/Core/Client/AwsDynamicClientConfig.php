<?php

declare(strict_types=1);

namespace Aws\Core\Client;

use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Core\Checksum\ResponseChecksumValidation;
use Smithy\Auth\Aws\AwsCredentialsIdentityInterface;
use Smithy\Auth\Aws\SigV4AuthScheme;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Client\Auth\AuthSchemeResolverInterface;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Interceptor\InterceptorChain;
use Smithy\Client\Plugin\PluginState;
use Smithy\Client\Protocol\ProtocolResolverInterface;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Core\Shape\ServiceInterface;
use Smithy\Core\Transport\TransportInterface;
use Smithy\Http\Client\CurlClient;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Protocol\ProtocolInterface;

/**
 * AWS configuration resolved from a runtime Smithy service model.
 */
final class AwsDynamicClientConfig extends AbstractAwsClientConfig
{
    /**
     * @param InterceptorChain $interceptors Client interceptors.
     * @param list<\Smithy\Auth\AuthSchemeInterface>
     *     $supportedAuthSchemes Available authentication schemes.
     * @param list<string>|null $authSchemePreference Auth scheme names in
     *     customer-preferred order.
     * @param TransportInterface|null $transport Transport implementation for
     *     serialized protocol messages.
     * @param array<string, mixed> $context Client context.
     */
    public function __construct(
        private readonly ?ProtocolInterface $resolvedProtocol,
        ProtocolResolverInterface $protocolResolver,
        ?string $protocolId,
        private readonly EndpointResolverInterface $resolvedEndpointResolver,
        private readonly string $resolvedSigningName,
        private readonly bool $enableSigV4,
        ?string $region = null,
        IdentityResolverInterface|AwsCredentialsIdentityInterface|null
            $credentials = null,
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
        ?ServiceInterface $service = null,
        ?bool $protocolIsExplicit = null
    )
    {
        if ($resolvedSigningName === '') {
            throw new \InvalidArgumentException(
                'AWS signing name cannot be empty.'
            );
        }

        [$region, $context] = self::resolveRegionAndContext(
            $region,
            $context
        );
        if ($enableSigV4
            && !self::containsSigV4($supportedAuthSchemes)
        ) {
            $supportedAuthSchemes[] = new SigV4AuthScheme(
                $resolvedSigningName,
                $signingRegion ?? $region
            );
        }

        parent::__construct(
            region: $region,
            credentials: $credentials,
            tokenProvider: $tokenProvider,
            signingRegion: $signingRegion,
            useDualStack: $useDualStack,
            useFips: $useFips,
            userAgentAppId: $userAgentAppId,
            interceptors: $interceptors,
            supportedAuthSchemes: $supportedAuthSchemes,
            authSchemeResolver: $authSchemeResolver,
            authSchemePreference: $authSchemePreference,
            retryMode: $retryMode,
            maxAttempts: $maxAttempts,
            requestChecksumCalculation: $requestChecksumCalculation,
            responseChecksumValidation: $responseChecksumValidation,
            supportsFlexibleChecksums: $supportsFlexibleChecksums,
            retryStrategy: $retryStrategy,
            retryScope: $retryScope === ''
                ? $resolvedSigningName
                : $retryScope,
            context: $context,
            httpClient: $httpClient,
            pluginState: $pluginState,
            transport: $transport,
            protocol: $resolvedProtocol,
            protocolResolver: $protocolResolver,
            protocolId: $protocolId,
            service: $service,
            protocolIsExplicit: $protocolIsExplicit
        );
    }

    /**
     * @param array<string, mixed> $overrides
     */
    protected function copyWith(array $overrides): static
    {
        return new self(
            resolvedProtocol: \array_key_exists(
                'protocol',
                $overrides
            ) ? $overrides['protocol'] : $this->protocol,
            protocolResolver: $overrides['protocolResolver']
                ?? $this->protocolResolver,
            protocolId: \array_key_exists('protocolId', $overrides)
                ? $overrides['protocolId']
                : $this->protocolId,
            resolvedEndpointResolver: \array_key_exists(
                'endpointResolver',
                $overrides
            ) ? $overrides['endpointResolver'] : $this->resolvedEndpointResolver,
            resolvedSigningName: $this->resolvedSigningName,
            enableSigV4: $this->enableSigV4,
            region: \array_key_exists('region', $overrides)
                ? $overrides['region']
                : $this->region,
            credentials: \array_key_exists('credentials', $overrides)
                ? $overrides['credentials']
                : $this->credentials,
            tokenProvider: \array_key_exists('tokenProvider', $overrides)
                ? $overrides['tokenProvider']
                : $this->tokenProvider,
            signingRegion: \array_key_exists('signingRegion', $overrides)
                ? $overrides['signingRegion']
                : $this->signingRegion,
            useDualStack: \array_key_exists('useDualStack', $overrides)
                ? $overrides['useDualStack']
                : $this->useDualStack,
            useFips: \array_key_exists('useFips', $overrides)
                ? $overrides['useFips']
                : $this->useFips,
            userAgentAppId: \array_key_exists('userAgentAppId', $overrides)
                ? $overrides['userAgentAppId']
                : $this->userAgentAppId,
            interceptors: \array_key_exists('interceptors', $overrides)
                ? $overrides['interceptors']
                : $this->interceptorChain,
            supportedAuthSchemes: \array_key_exists(
                'supportedAuthSchemes',
                $overrides
            ) ? $overrides['supportedAuthSchemes']
                : $this->supportedAuthSchemes,
            authSchemeResolver: \array_key_exists(
                'authSchemeResolver',
                $overrides
            ) ? $overrides['authSchemeResolver']
                : $this->authSchemeResolver,
            authSchemePreference: \array_key_exists(
                'authSchemePreference',
                $overrides
            ) ? $overrides['authSchemePreference']
                : $this->authSchemePreference,
            retryMode: \array_key_exists('retryMode', $overrides)
                ? $overrides['retryMode']
                : $this->retryMode,
            maxAttempts: \array_key_exists('maxAttempts', $overrides)
                ? $overrides['maxAttempts']
                : $this->maxAttempts,
            supportsFlexibleChecksums: $this->supportsFlexibleChecksums(),
            retryStrategy: \array_key_exists('retryStrategy', $overrides)
                ? $overrides['retryStrategy']
                : $this->retryStrategy,
            retryScope: \array_key_exists('retryScope', $overrides)
                ? $overrides['retryScope']
                : $this->retryScope,
            context: \array_key_exists('context', $overrides)
                ? $overrides['context']
                : (\array_key_exists('additional', $overrides)
                    ? $overrides['additional']
                    : $this->context),
            httpClient: $this->httpClientForCopy($overrides),
            pluginState: \array_key_exists('pluginState', $overrides)
                ? $overrides['pluginState']
                : $this->getPluginState(),
            transport: $this->transportForCopy($overrides),
            service: $overrides['service'] ?? $this->service,
            protocolIsExplicit: $overrides['protocolIsExplicit']
                ?? $this->hasExplicitProtocol()
        );
    }

    protected function createProtocol(): ProtocolInterface
    {
        return $this->resolvedProtocol ?? throw new \LogicException(
            'Dynamic client protocol has not been resolved.'
        );
    }

    protected function getHttpClient(): HttpClientInterface
    {
        return new CurlClient();
    }

    protected function getEndpointResolver(): EndpointResolverInterface
    {
        return $this->resolvedEndpointResolver;
    }

    protected function getSigningName(): string
    {
        return $this->resolvedSigningName;
    }

    /**
     * @param list<\Smithy\Auth\AuthSchemeInterface> $schemes
     */
    private static function containsSigV4(array $schemes): bool
    {
        foreach ($schemes as $scheme) {
            if ($scheme->getSchemeId() === SigV4AuthScheme::SCHEME_ID) {
                return true;
            }
        }

        return false;
    }
}
