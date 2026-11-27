<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3;

use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Core\Checksum\ResponseChecksumValidation;
use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\S3\S3AddressingPlugin;
use Aws\Core\S3\S3ErrorPlugin;
use Aws\Core\S3\S3UseArnRegionPlugin;
use Aws\Services\S3\Endpoint\S3EndpointBytecode;
use Aws\Services\S3\Endpoint\S3EndpointKeyBuilder;
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
use Smithy\Protocol\Aws\RestXmlProtocol;
use Smithy\Protocol\HttpPathLabelPolicy;
use Smithy\Protocol\ProtocolInterface;
use Smithy\Protocol\ProtocolSettings;

/**
 * Configuration for {@see S3Client}.
 *
 * Wires the AWS runtime, modeled protocol, endpoint rules,
 * and signing name for S3.
 */
final class S3ClientConfig extends AbstractAwsClientConfig
{
    public function __construct(
        /**
         * The S3 bucket used to send the request. This is an optional parameter that will be set automatically for operations
         * that are scoped to an S3 bucket.
         */
        public readonly ?string $bucket = null,
        /**
         * When true, force a path-style endpoint to be used where the bucket name is part of the path.
         * @builtIn AWS::S3::ForcePathStyle
         */
        public readonly bool $forcePathStyle = false,
        /**
         * When true, use S3 Accelerate. NOTE: Not all regions support S3 accelerate.
         * @builtIn AWS::S3::Accelerate
         */
        public readonly bool $accelerate = false,
        /**
         * Whether the global endpoint should be used, rather then the regional endpoint for us-east-1.
         * @builtIn AWS::S3::UseGlobalEndpoint
         */
        public readonly bool $useGlobalEndpoint = false,
        /**
         * Internal parameter to use object lambda endpoint for an operation (eg: WriteGetObjectResponse)
         */
        public readonly ?bool $useObjectLambdaEndpoint = null,
        /**
         * The S3 Key used to send the request. This is an optional parameter that will be set automatically for operations that
         * are scoped to an S3 Key.
         */
        public readonly ?string $key = null,
        /**
         * The S3 Prefix used to send the request. This is an optional parameter that will be set automatically for operations
         * that are scoped to an S3 Prefix.
         */
        public readonly ?string $prefix = null,
        /**
         * The Copy Source used for Copy Object request. This is an optional parameter that will be set automatically for
         * operations that are scoped to Copy Source.
         */
        public readonly ?string $copySource = null,
        /**
         * Internal parameter to disable Access Point Buckets
         */
        public readonly ?bool $disableAccessPoints = null,
        /**
         * Whether multi-region access points (MRAP) should be disabled.
         * @builtIn AWS::S3::DisableMultiRegionAccessPoints
         */
        public readonly bool $disableMultiRegionAccessPoints = false,
        /**
         * When an Access Point ARN is provided and this flag is enabled, the SDK MUST use the ARN's region when constructing
         * the endpoint instead of the client's configured region.
         * @builtIn AWS::S3::UseArnRegion
         */
        public readonly ?bool $useArnRegion = null,
        /**
         * Internal parameter to indicate whether S3Express operation should use control plane, (ex. CreateBucket)
         */
        public readonly ?bool $useS3ExpressControlEndpoint = null,
        /**
         * Parameter to indicate whether S3Express session auth should be disabled
         */
        public readonly ?bool $disableS3ExpressSessionAuth = null,
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
        RequestChecksumCalculation|string|null $requestChecksumCalculation = null,
        ResponseChecksumValidation|string|null $responseChecksumValidation = null,
        ?RetryStrategyInterface $retryStrategy = null,
        string $retryScope = 's3',
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
        [$region, $context] = self::resolveRegionAndContext(
            $region,
            $context
        );

        $effectiveSigningRegion = $signingRegion ?? $region;

        if ($supportedAuthSchemes === []) {
            $supportedAuthSchemes = [
                new SigV4AuthScheme('s3', $effectiveSigningRegion)
            ];
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
            supportsFlexibleChecksums: true,
            retryStrategy: $retryStrategy,
            retryScope: $retryScope,
            context: $context,
            httpClient: $httpClient,
            pluginState: $pluginState,
            transport: $transport,
            protocol: $protocol,
            protocolResolver: $protocolResolver,
            protocolId: $protocolId,
            service: $service,
            protocolIsExplicit: $protocolIsExplicit,
            endpoint: $endpoint,
            endpointResolver: $endpointResolver
        );
    }

    /**
     * @param array<string, mixed> $overrides
     */
    protected function copyWith(array $overrides): static
    {
        return new static(
            bucket: \array_key_exists('bucket', $overrides)
                ? $overrides['bucket']
                : $this->bucket,
            forcePathStyle: \array_key_exists('forcePathStyle', $overrides)
                ? $overrides['forcePathStyle']
                : $this->forcePathStyle,
            accelerate: \array_key_exists('accelerate', $overrides)
                ? $overrides['accelerate']
                : $this->accelerate,
            useGlobalEndpoint: \array_key_exists('useGlobalEndpoint', $overrides)
                ? $overrides['useGlobalEndpoint']
                : $this->useGlobalEndpoint,
            useObjectLambdaEndpoint: \array_key_exists('useObjectLambdaEndpoint', $overrides)
                ? $overrides['useObjectLambdaEndpoint']
                : $this->useObjectLambdaEndpoint,
            key: \array_key_exists('key', $overrides)
                ? $overrides['key']
                : $this->key,
            prefix: \array_key_exists('prefix', $overrides)
                ? $overrides['prefix']
                : $this->prefix,
            copySource: \array_key_exists('copySource', $overrides)
                ? $overrides['copySource']
                : $this->copySource,
            disableAccessPoints: \array_key_exists('disableAccessPoints', $overrides)
                ? $overrides['disableAccessPoints']
                : $this->disableAccessPoints,
            disableMultiRegionAccessPoints: \array_key_exists('disableMultiRegionAccessPoints', $overrides)
                ? $overrides['disableMultiRegionAccessPoints']
                : $this->disableMultiRegionAccessPoints,
            useArnRegion: \array_key_exists('useArnRegion', $overrides)
                ? $overrides['useArnRegion']
                : $this->useArnRegion,
            useS3ExpressControlEndpoint: \array_key_exists('useS3ExpressControlEndpoint', $overrides)
                ? $overrides['useS3ExpressControlEndpoint']
                : $this->useS3ExpressControlEndpoint,
            disableS3ExpressSessionAuth: \array_key_exists('disableS3ExpressSessionAuth', $overrides)
                ? $overrides['disableS3ExpressSessionAuth']
                : $this->disableS3ExpressSessionAuth,
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
            supportedAuthSchemes: \array_key_exists('supportedAuthSchemes', $overrides)
                ? $overrides['supportedAuthSchemes']
                : $this->supportedAuthSchemes,
            authSchemeResolver: \array_key_exists('authSchemeResolver', $overrides)
                ? $overrides['authSchemeResolver']
                : $this->authSchemeResolver,
            authSchemePreference: \array_key_exists('authSchemePreference', $overrides)
                ? $overrides['authSchemePreference']
                : $this->authSchemePreference,
            retryMode: \array_key_exists('retryMode', $overrides)
                ? $overrides['retryMode']
                : $this->retryMode,
            maxAttempts: \array_key_exists('maxAttempts', $overrides)
                ? $overrides['maxAttempts']
                : $this->maxAttempts,
            retryStrategy: \array_key_exists('retryStrategy', $overrides)
                ? $overrides['retryStrategy']
                : $this->retryStrategy,
            retryScope: \array_key_exists('retryScope', $overrides)
                ? $overrides['retryScope']
                : $this->retryScope,
            context: \array_key_exists('context', $overrides)
                ? $overrides['context']
                : $this->context,
            httpClient: $this->httpClientForCopy($overrides),
            pluginState: \array_key_exists('pluginState', $overrides)
                ? $overrides['pluginState']
                : $this->getPluginState(),
            transport: $this->transportForCopy($overrides),
            protocol: \array_key_exists('protocol', $overrides)
                ? $overrides['protocol']
                : $this->protocol,
            protocolResolver: \array_key_exists('protocolResolver', $overrides)
                ? $overrides['protocolResolver']
                : $this->protocolResolver,
            protocolId: \array_key_exists('protocolId', $overrides)
                ? $overrides['protocolId']
                : $this->protocolId,
            service: \array_key_exists('service', $overrides)
                ? $overrides['service']
                : $this->service,
            protocolIsExplicit: $overrides['protocolIsExplicit']
                ?? $this->hasExplicitProtocol(),
            endpointResolver: $this->endpointResolverForCopy($overrides)
        );
    }

    protected function createProtocol(): ProtocolInterface
    {
        $settings = new ProtocolSettings(
            HttpPathLabelPolicy::PreserveGreedySegments
        );

        return new RestXmlProtocol(
            'http://s3.amazonaws.com/doc/2006-03-01/',
            $settings
        );
    }

    protected function getHttpClient(): HttpClientInterface
    {
        return new CurlClient(preservePath: true);
    }

    protected function getEndpointResolver(): EndpointResolverInterface
    {
        return $this->bytecodeEndpointResolver(
            S3EndpointBytecode::get(),
            staticContext: [
                'Bucket' => $this->bucket,
                'ForcePathStyle' => $this->forcePathStyle,
                'Accelerate' => $this->accelerate,
                'UseGlobalEndpoint' => $this->useGlobalEndpoint,
                'UseObjectLambdaEndpoint' => $this->useObjectLambdaEndpoint,
                'Key' => $this->key,
                'Prefix' => $this->prefix,
                'CopySource' => $this->copySource,
                'DisableAccessPoints' => $this->disableAccessPoints,
                'DisableMultiRegionAccessPoints' => $this->disableMultiRegionAccessPoints,
                'UseArnRegion' => $this->useArnRegion,
                'UseS3ExpressControlEndpoint' => $this->useS3ExpressControlEndpoint,
                'DisableS3ExpressSessionAuth' => $this->disableS3ExpressSessionAuth
            ],
            keyBuilder: S3EndpointKeyBuilder::build()
        );
    }

    /**
     * @inheritDoc
     */
    public function getDefaultPlugins(): array
    {
        return [
            new S3ErrorPlugin(),
            new S3AddressingPlugin($this->forcePathStyle, $this->accelerate),
            new S3UseArnRegionPlugin($this->useArnRegion)
        ];
    }

    protected function getSigningName(): string
    {
        return 's3';
    }
}
