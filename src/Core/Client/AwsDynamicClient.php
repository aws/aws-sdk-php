<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Client;

use Aws\Core\Checksum\{
    FlexibleChecksumPlugin,
    RequestChecksumCalculation,
    ResponseChecksumValidation
};
use Aws\Core\Endpoint\AwsFunctions;
use Aws\Core\Retry\StandardRetryPlugin;
use Aws\Core\S3\{
    S3AddressingPlugin,
    S3ErrorPlugin,
    S3UseArnRegionPlugin
};
use Aws\Core\UserAgent\{
    UserAgentPlugin,
    WaiterFeaturePlugin
};
use Smithy\Auth\{
    AuthSchemeInterface,
    IdentityResolverInterface
};
use Smithy\Auth\Aws\AwsCredentialsIdentityInterface;
use Smithy\Auth\Aws\SigV4AuthScheme;
use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Auth\AuthSchemeResolverInterface;
use Smithy\Client\Dynamic\{
    DynamicClient,
    DynamicClientRuntime
};
use Smithy\Client\Endpoint\{
    Bytecode\RulesFunctionInterface,
    EndpointResolverInterface
};
use Smithy\Client\Interceptor\InterceptorChain;
use Smithy\Client\Plugin\PluginCollection;
use Smithy\Client\Protocol\ProtocolResolverInterface;
use Smithy\Client\RequestOverrideConfig;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Client\Waiter\{
    Waiter,
    WaiterConfig
};
use Smithy\Core\Model\SmithyModel;
use Smithy\Core\Serde\{
    Schema,
    SchemaTraitRegistry
};
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Transport\TransportInterface;
use Smithy\Http\Client\CurlClient;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Protocol\Aws\{
    AwsJson1_0Protocol,
    AwsJson1_1Protocol,
    AwsQueryProtocol,
    Ec2QueryProtocol,
    RestJsonProtocol,
    RestXmlProtocol
};
use Smithy\Protocol\HttpPathLabelPolicy;
use Smithy\Protocol\ProtocolInterface;
use Smithy\Protocol\ProtocolSettings;

/**
 * Execute a runtime-loaded AWS Smithy service without generated types.
 */
class AwsDynamicClient extends DynamicClient implements AwsClientInterface
{
    private const AWS_JSON_1_0 = AwsJson1_0Protocol::ID;
    private const AWS_JSON_1_1 = AwsJson1_1Protocol::ID;
    private const AWS_QUERY = AwsQueryProtocol::ID;
    private const AWS_QUERY_ERROR = 'aws.protocols#awsQueryError';
    private const EC2_QUERY = Ec2QueryProtocol::ID;
    private const EC2_QUERY_NAME = 'aws.protocols#ec2QueryName';
    private const HTTP_CHECKSUM = 'aws.protocols#httpChecksum';
    private const UNSIGNED_PAYLOAD = 'aws.auth#unsignedPayload';
    private const REST_JSON = RestJsonProtocol::ID;
    private const REST_XML = RestXmlProtocol::ID;
    private const RPC_V2_CBOR = 'smithy.protocols#rpcv2Cbor';

    private const CONFIG_OPTIONS = 'aws.dynamicClientOptions';

    private const ENDPOINT_AUTH_SCHEME_IDS = [
        'sigv4' => 'aws.auth#sigv4',
        'sigv4a' => 'aws.auth#sigv4a',
        'sigv4-s3express' => 'aws.auth#sigv4S3Express'
    ];

    /**
     * AWS auth scheme traits that service models apply without trait shapes.
     */
    private const AUTH_SCHEME_IDS = [
        'aws.auth#sigv4',
        'aws.auth#sigv4a'
    ];

    /**
     * Create an AWS dynamic client from a runtime model or JSON AST path.
     *
     * @param array<string, ProtocolInterface> $protocols Available protocol
     *     implementations keyed by protocol shape ID.
     * @param list<string> $protocolPreference Preferred protocol shape IDs.
     * @param InterceptorChain $interceptors Client interceptors.
     * @param list<AuthSchemeInterface> $supportedAuthSchemes Available auth
     *     schemes.
     * @param list<string>|null $authSchemePreference Auth scheme names in
     *     customer-preferred order.
     * @param TransportInterface|null $transport Transport implementation for
     *     serialized protocol messages. Mutually exclusive with `$httpClient`.
     * @param array<string, RulesFunctionInterface> $endpointFunctions
     *     Endpoint rules functions keyed by function name.
     * @param array<string, string> $endpointAuthSchemeIds Raw endpoint
     *     auth scheme names mapped to canonical Smithy shape IDs.
     * @param array<string, mixed> $endpointParameters Client endpoint
     *     parameter values.
     * @param array<string, mixed> $context Client context.
     */
    public static function create(
        SmithyModel|string $model,
        ?string $serviceId = null,
        ?string $protocolId = null,
        ?ProtocolInterface $protocol = null,
        array $protocols = [],
        ?HttpClientInterface $httpClient = null,
        ?TransportInterface $transport = null,
        ?EndpointResolverInterface $endpointResolver = null,
        ?string $endpoint = null,
        array $endpointFunctions = [],
        array $endpointAuthSchemeIds = [],
        array $endpointParameters = [],
        array $protocolPreference = [],
        InterceptorChain $interceptors = new InterceptorChain(),
        array $supportedAuthSchemes = [],
        ?AuthSchemeResolverInterface $authSchemeResolver = null,
        ?array $authSchemePreference = null,
        ?RetryStrategyInterface $retryStrategy = null,
        string $retryScope = '',
        array $context = [],
        PluginCollection $plugins = new PluginCollection(),
        ?string $region = null,
        IdentityResolverInterface|AwsCredentialsIdentityInterface|null
            $credentials = null,
        ?IdentityResolverInterface $tokenProvider = null,
        ?string $signingRegion = null,
        bool $useDualStack = false,
        bool $useFips = false,
        ?string $userAgentAppId = null,
        ?string $retryMode = null,
        ?int $maxAttempts = null,
        RequestChecksumCalculation|string|null
            $requestChecksumCalculation = null,
        ResponseChecksumValidation|string|null
            $responseChecksumValidation = null
    ): static
    {
        $model = \is_string($model)
            ? SmithyModel::fromFile($model)
            : $model;
        $model = self::normalizeModel($model);
        $serviceId = self::resolveServiceId($model, $serviceId);
        $isS3 = self::isS3($model, $serviceId);
        if ($isS3) {
            $plugins = $plugins->add(self::s3AddressingPlugin(
                $context,
                $endpointParameters
            ))->add(new S3UseArnRegionPlugin());
            if ($httpClient === null && $transport === null) {
                $httpClient = new CurlClient(preservePath: true);
            }
        }
        $protocols = [
            ...self::protocolsForService(
                $model,
                $serviceId,
                $protocolId,
                $isS3
            ),
            ...$protocols
        ];
        $context[self::CONFIG_OPTIONS] = [
            'region' => $region,
            'credentials' => $credentials,
            'tokenProvider' => $tokenProvider,
            'signingRegion' => $signingRegion,
            'useDualStack' => $useDualStack,
            'useFips' => $useFips,
            'userAgentAppId' => $userAgentAppId,
            'retryMode' => $retryMode,
            'maxAttempts' => $maxAttempts,
            'requestChecksumCalculation' => $requestChecksumCalculation,
            'responseChecksumValidation' => $responseChecksumValidation
        ];

        return parent::create(
            model: $model,
            serviceId: $serviceId,
            protocolId: $protocolId,
            protocol: $protocol,
            protocols: $protocols,
            httpClient: $httpClient,
            transport: $transport,
            endpointResolver: $endpointResolver,
            endpoint: $endpoint,
            endpointFunctions: $endpointFunctions,
            endpointAuthSchemeIds: $endpointAuthSchemeIds,
            endpointParameters: $endpointParameters,
            protocolPreference: $protocolPreference,
            interceptors: $interceptors,
            supportedAuthSchemes: $supportedAuthSchemes,
            authSchemeResolver: $authSchemeResolver,
            authSchemePreference: $authSchemePreference,
            retryStrategy: $retryStrategy,
            retryScope: $retryScope,
            context: $context,
            plugins: $plugins
        );
    }

    /**
     * Create a dynamic client with resolved AWS configuration.
     *
     * @param array<string, string> $errorDiscriminatorTraits Error trait
     *     shape IDs mapped to their discriminator member names.
     * @param list<string> $authSchemeIds Auth scheme trait IDs counted
     *     alongside the AWS SigV4 and SigV4a scheme traits.
     */
    public function __construct(
        SmithyModel $model,
        AbstractClientConfig $config,
        ?string $serviceId = null,
        ?string $protocolId = null,
        PluginCollection $plugins = new PluginCollection(),
        ?SchemaTraitRegistry $traitRegistry = null,
        array $errorDiscriminatorTraits = [],
        array $authSchemeIds = []
    ) {
        if (!$config instanceof AwsDynamicClientConfig) {
            throw new \InvalidArgumentException(
                self::class . ' requires ' . AwsDynamicClientConfig::class
                . '.'
            );
        }

        $plugins = $plugins->prepend(AwsClientConfigPlugin::instance());
        if ($config->supportsFlexibleChecksums()) {
            $plugins = $plugins->add(new FlexibleChecksumPlugin());
        }
        $plugins = $plugins->add(StandardRetryPlugin::instance());
        if (self::isS3(
            $model,
            self::resolveServiceId($model, $serviceId)
        )) {
            $plugins = $plugins->add(new S3ErrorPlugin());
        }
        $plugins = $plugins->add(UserAgentPlugin::instance());

        parent::__construct(
            $model,
            $config,
            $serviceId,
            $protocolId,
            $plugins,
            $traitRegistry,
            $errorDiscriminatorTraits,
            [...$authSchemeIds, ...self::AUTH_SCHEME_IDS]
        );
    }

    /**
     * Build AWS configuration from the resolved dynamic dependencies.
     *
     * @param InterceptorChain $interceptors Client interceptors.
     * @param list<AuthSchemeInterface> $supportedAuthSchemes Available auth
     *     schemes.
     * @param list<string>|null $authSchemePreference Auth scheme names in
     *     customer-preferred order.
     * @param TransportInterface|null $transport Resolved client transport.
     * @param array<string, mixed> $context Client context.
     *
     * @internal Called by the shared dynamic client factory.
     */
    public static function createClientConfig(
        SmithyModel $model,
        string $serviceId,
        ?string $protocolId,
        ?ProtocolInterface $protocol,
        ProtocolResolverInterface $protocolResolver,
        ?HttpClientInterface $httpClient,
        ?TransportInterface $transport,
        EndpointResolverInterface $endpointResolver,
        InterceptorChain $interceptors,
        array $supportedAuthSchemes,
        ?AuthSchemeResolverInterface $authSchemeResolver,
        ?array $authSchemePreference,
        ?RetryStrategyInterface $retryStrategy,
        string $retryScope,
        array $context
    ): AwsDynamicClientConfig
    {
        $options = $context[self::CONFIG_OPTIONS] ?? [];
        unset($context[self::CONFIG_OPTIONS]);
        if (!\is_array($options)) {
            throw new \InvalidArgumentException(
                'AWS dynamic client options must be an associative array.'
            );
        }

        return new AwsDynamicClientConfig(
            resolvedProtocol: $protocol,
            protocolResolver: $protocolResolver,
            protocolId: $protocolId,
            resolvedEndpointResolver: $endpointResolver,
            resolvedSigningName: self::resolveSigningName(
                $model,
                $serviceId
            ),
            enableSigV4: self::usesSigV4($model, $serviceId),
            region: $options['region'] ?? null,
            credentials: $options['credentials'] ?? null,
            tokenProvider: $options['tokenProvider'] ?? null,
            signingRegion: $options['signingRegion'] ?? null,
            useDualStack: $options['useDualStack'] ?? false,
            useFips: $options['useFips'] ?? false,
            userAgentAppId: $options['userAgentAppId'] ?? null,
            interceptors: $interceptors,
            supportedAuthSchemes: $supportedAuthSchemes,
            authSchemeResolver: $authSchemeResolver,
            authSchemePreference: $authSchemePreference,
            retryMode: $options['retryMode'] ?? null,
            maxAttempts: $options['maxAttempts'] ?? null,
            requestChecksumCalculation:
                $options['requestChecksumCalculation'] ?? null,
            responseChecksumValidation:
                $options['responseChecksumValidation'] ?? null,
            supportsFlexibleChecksums:
                self::supportsFlexibleChecksums($model, $serviceId),
            retryStrategy: $retryStrategy,
            retryScope: $retryScope,
            context: $context,
            httpClient: $httpClient,
            transport: $transport
        );
    }

    /**
     * Create a waiter whose polling requests carry the WAITER metric.
     */
    protected function createWaiter(
        OperationInterface $operation,
        string $waiterName,
        ?WaiterConfig $config = null
    ): Waiter
    {
        $overrides = $config?->requestOverrides
            ?? RequestOverrideConfig::fromArray([]);

        return parent::createWaiter(
            $operation,
            $waiterName,
            new WaiterConfig(
                $config?->minDelay,
                $config?->maxDelay,
                $overrides->withPlugin(WaiterFeaturePlugin::instance())
            )
        );
    }

    public function getConfig(): AwsDynamicClientConfig
    {
        /** @var AwsDynamicClientConfig */
        return parent::getConfig();
    }

    /**
     * The untransformed specification serviceId (aws.api#service sdkId) of the
     * runtime-loaded service, for example "S3" or "SSO OIDC". Reuses the
     * sdkId on the resolved service schema and falls back to the service
     * name when the trait is absent.
     */
    public function sdkId(): string
    {
        $service = $this->getConfig()->service;
        if ($service === null) {
            return '';
        }

        $sdkId = $service->getSchema()
            ->getTraitById('aws.api#service')['sdkId'] ?? null;

        return \is_string($sdkId) && $sdkId !== ''
            ? $sdkId
            : $service->getName();
    }

    /**
     * Return AWS runtime implementations registered by default.
     */
    protected static function getDefaultRuntime(): DynamicClientRuntime
    {
        static $runtime;

        if ($runtime !== null) {
            return $runtime;
        }

        $traitRegistry = new SchemaTraitRegistry();
        $traitRegistry->register(
            self::EC2_QUERY_NAME,
            Schema::T_EC2_QUERY_NAME
        );
        $traitRegistry->register(
            self::HTTP_CHECKSUM,
            Schema::T_HTTP_CHECKSUM
        );
        $traitRegistry->register(
            self::UNSIGNED_PAYLOAD,
            Schema::T_UNSIGNED_PAYLOAD
        );

        return $runtime = parent::getDefaultRuntime()->merge(
            new DynamicClientRuntime(
                endpointFunctions: AwsFunctions::all(),
                endpointAuthSchemeIds: self::ENDPOINT_AUTH_SCHEME_IDS,
                protocolPreference: [
                    self::RPC_V2_CBOR,
                    self::AWS_JSON_1_0,
                    self::AWS_JSON_1_1,
                    self::REST_JSON,
                    self::REST_XML,
                    self::AWS_QUERY,
                    self::EC2_QUERY
                ],
                traitRegistry: $traitRegistry,
                errorDiscriminatorTraits: [
                    self::AWS_QUERY_ERROR => 'code'
                ]
            )
        );
    }

    /**
     * Resolve an explicit or unique modeled service.
     */
    private static function resolveServiceId(
        SmithyModel $model,
        ?string $serviceId
    ): string
    {
        if ($serviceId !== null) {
            $service = $model->expectShape($serviceId);
            if (($service['type'] ?? null) !== 'service') {
                throw new \InvalidArgumentException(
                    "Shape {$serviceId} is not a service."
                );
            }

            return $serviceId;
        }

        $serviceIds = $model->getServiceIds();
        if (\count($serviceIds) !== 1) {
            throw new \InvalidArgumentException(
                $serviceIds === []
                    ? 'Smithy model contains no service shapes.'
                    : 'Smithy model contains multiple service shapes: '
                        . \implode(', ', $serviceIds)
            );
        }

        return $serviceIds[0];
    }

    /**
     * Return true when the service's `aws.api#service` SDK ID is `S3`.
     */
    private static function isS3(
        SmithyModel $model,
        string $serviceId
    ): bool
    {
        $service = $model->getTraits($serviceId)['aws.api#service'] ?? null;

        return \is_array($service) && ($service['sdkId'] ?? null) === 'S3';
    }

    /**
     * Build the S3 addressing plugin from the client endpoint parameters.
     *
     * @param array<string, mixed> $context Client context.
     * @param array<string, mixed> $endpointParameters Client endpoint
     *     parameter values.
     */
    private static function s3AddressingPlugin(
        array $context,
        array $endpointParameters
    ): S3AddressingPlugin
    {
        $configured = $context[EndpointResolverInterface::CONTEXT_PARAMETERS]
            ?? [];
        $parameters = [
            ...(\is_array($configured) ? $configured : []),
            ...$endpointParameters
        ];

        return new S3AddressingPlugin(
            ($parameters['ForcePathStyle'] ?? false) === true,
            ($parameters['Accelerate'] ?? false) === true
        );
    }

    /**
     * Build protocol instances that depend on service model data.
     *
     * @return array<string, ProtocolInterface>
     */
    private static function protocolsForService(
        SmithyModel $model,
        string $serviceId,
        ?string $protocolId,
        bool $isS3 = false
    ): array
    {
        $service = $model->expectShape($serviceId);
        $traits = $model->getTraits($serviceId);
        $xmlNamespace = $traits['smithy.api#xmlNamespace'] ?? null;
        $xmlNamespace = \is_array($xmlNamespace)
            && \is_string($xmlNamespace['uri'] ?? null)
                ? $xmlNamespace['uri']
                : null;

        $protocols = [
            self::AWS_JSON_1_0 => new AwsJson1_0Protocol(
                self::resolveAwsJsonTargetPrefix(
                    $model,
                    $serviceId,
                    self::AWS_JSON_1_0
                )
            ),
            self::AWS_JSON_1_1 => new AwsJson1_1Protocol(
                self::resolveAwsJsonTargetPrefix(
                    $model,
                    $serviceId,
                    self::AWS_JSON_1_1
                )
            ),
            self::REST_JSON => new RestJsonProtocol(),
            self::REST_XML => $isS3
                ? new RestXmlProtocol(
                    $xmlNamespace,
                    new ProtocolSettings(
                        HttpPathLabelPolicy::PreserveGreedySegments
                    )
                )
                : new RestXmlProtocol($xmlNamespace)
        ];

        if (\array_key_exists(self::AWS_QUERY, $traits)
            || $protocolId === self::AWS_QUERY
        ) {
            $protocols[self::AWS_QUERY] = new AwsQueryProtocol(
                self::serviceVersion($service, $serviceId)
            );
        }
        if (\array_key_exists(self::EC2_QUERY, $traits)
            || $protocolId === self::EC2_QUERY
        ) {
            $protocols[self::EC2_QUERY] = new Ec2QueryProtocol(
                self::serviceVersion($service, $serviceId)
            );
        }

        return $protocols;
    }

    private static function resolveAwsJsonTargetPrefix(
        SmithyModel $model,
        string $serviceId,
        string $protocolId
    ): string
    {
        $protocol = $model->getTraits($serviceId)[$protocolId] ?? null;
        $targetPrefix = \is_array($protocol)
            ? $protocol['targetPrefix'] ?? null
            : null;

        return \is_string($targetPrefix) && $targetPrefix !== ''
            ? $targetPrefix
            : SmithyModel::getShapeName($serviceId);
    }

    /**
     * Resolve the service's SigV4 signing name.
     */
    private static function resolveSigningName(
        SmithyModel $model,
        string $serviceId
    ): string
    {
        $traits = $model->getTraits($serviceId);
        $sigV4 = $traits[SigV4AuthScheme::SCHEME_ID] ?? null;
        if (\is_array($sigV4)
            && \is_string($sigV4['name'] ?? null)
            && $sigV4['name'] !== ''
        ) {
            return $sigV4['name'];
        }

        $service = $traits['aws.api#service'] ?? null;
        if (\is_array($service)) {
            foreach (['endpointPrefix', 'arnNamespace'] as $field) {
                $value = $service[$field] ?? null;
                if (\is_string($value) && $value !== '') {
                    return $value;
                }
            }
        }

        return \strtolower(SmithyModel::getShapeName($serviceId));
    }

    private static function usesSigV4(
        SmithyModel $model,
        string $serviceId
    ): bool
    {
        if (\array_key_exists(
                SigV4AuthScheme::SCHEME_ID,
                $model->getTraits($serviceId)
            )
        ) {
            return true;
        }

        foreach ($model->getServiceOperationIds($serviceId) as $operationId) {
            if (\in_array(
                    SigV4AuthScheme::SCHEME_ID,
                    $model->getEffectiveAuthSchemeIds(
                        $serviceId,
                        $operationId
                    ),
                    true
                )
            ) {
                return true;
            }
        }

        return false;
    }

    private static function normalizeModel(SmithyModel $model): SmithyModel
    {
        $shapes = S3AddressingPlugin::normalizeShapes(
            $model->getShapes()
        );
        if ($shapes === $model->getShapes()) {
            return $model;
        }

        return SmithyModel::fromArray([
            'smithy' => '2.0',
            'metadata' => $model->getMetadata(),
            'shapes' => $shapes
        ]);
    }

    private static function supportsFlexibleChecksums(
        SmithyModel $model,
        string $serviceId
    ): bool
    {
        foreach ($model->getServiceOperationIds($serviceId) as $operationId) {
            if (\array_key_exists(
                    self::HTTP_CHECKSUM,
                    $model->getTraits($operationId)
                )
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param array<string, mixed> $service
     */
    private static function serviceVersion(
        array $service,
        string $serviceId
    ): string
    {
        $version = $service['version'] ?? null;
        if (!\is_string($version) || $version === '') {
            throw new \InvalidArgumentException(
                "AWS query service {$serviceId} has no modeled version."
            );
        }

        return $version;
    }
}
