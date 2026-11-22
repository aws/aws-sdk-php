<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen;

use Aws\Codegen\Generator\AwsClientConfigGenerator;
use Aws\Core\Client\AbstractAwsClient;
use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\Client\AwsClientInterface;
use Aws\Core\Endpoint\AwsFunctions;
use Aws\Core\Endpoint\Bytecode\AwsOpcodes;
use Aws\Core\Exception\AwsException;
use Smithy\Codegen\CodegenContext;
use Smithy\Codegen\CodegenSettings;
use Smithy\Codegen\Integration\AbstractCodegenIntegration;
use Smithy\Codegen\Model\SmithyModel;

/**
 * Add AWS SDK policy and artifacts to Smithy PHP code generation.
 */
final class AwsCodegenIntegration extends AbstractCodegenIntegration
{
    private const AWS_JSON_1_0 = 'aws.protocols#awsJson1_0';
    private const AWS_JSON_1_1 = 'aws.protocols#awsJson1_1';
    private const AWS_QUERY = 'aws.protocols#awsQuery';
    private const EC2_QUERY = 'aws.protocols#ec2Query';
    private const REST_JSON = 'aws.protocols#restJson1';
    private const REST_XML = 'aws.protocols#restXml';
    private const RPC_V2_CBOR = 'smithy.protocols#rpcv2Cbor';
    private const AWS_QUERY_ERROR = 'aws.protocols#awsQueryError';
    private const EC2_QUERY_NAME = 'aws.protocols#ec2QueryName';
    private const HTTP_CHECKSUM = 'aws.protocols#httpChecksum';
    private const UNSIGNED_PAYLOAD = 'aws.auth#unsignedPayload';

    private const SERVICE_TRAIT = 'aws.api#service';

    /**
     * AWS auth scheme traits that service models apply without trait shapes.
     */
    private const AUTH_SCHEME_IDS = [
        'aws.auth#sigv4',
        'aws.auth#sigv4a'
    ];

    private const WAITER_RESOURCE_INITIALISMS = [
        'acme' => 'ACME',
        'ami' => 'AMI',
        'api' => 'API',
        'db' => 'DB',
        'dns' => 'DNS',
        'ec2' => 'EC2',
        'ecs' => 'ECS',
        'eks' => 'EKS',
        'emr' => 'EMR',
        'fhir' => 'FHIR',
        'iam' => 'IAM',
        'ip' => 'IP',
        'kms' => 'KMS',
        'nat' => 'NAT',
        'rds' => 'RDS',
        's3' => 'S3',
        'ssm' => 'SSM',
        'vpc' => 'VPC',
        'vpn' => 'VPN'
    ];

    private const PROTOCOL_PREFERENCE = [
        self::RPC_V2_CBOR,
        self::AWS_JSON_1_0,
        self::AWS_JSON_1_1,
        self::REST_JSON,
        self::REST_XML,
        self::AWS_QUERY,
        self::EC2_QUERY
    ];

    /** @var array<string, mixed> */
    private array $configuration = [];
    private bool $generateClientConfig = true;
    private ?string $testsOutputDir = null;
    private ?SmithyModel $resolvedModel = null;
    private ?CodegenSettings $resolvedSettings = null;

    /**
     * @param array<string, mixed> $settings AWS integration settings.
     */
    public function __construct(array $settings = [])
    {
        $this->configure($settings);
    }

    public function name(): string
    {
        return 'aws-sdk-php';
    }

    public function configure(array $settings): void
    {
        $this->assertNoAliasConflicts($settings);
        if (\array_key_exists('clientPluginsByOperationTrait', $settings)
            || \array_key_exists(
                'client_plugins_by_operation_trait',
                $settings
            )
        ) {
            throw new \InvalidArgumentException(
                'clientPluginsByOperationTrait is no longer supported'
            );
        }

        $this->configuration = $settings;
        $this->generateClientConfig = $this->booleanAliasedValue(
            $settings,
            'generateClientConfig',
            'generate_client_config',
            true
        );
        $this->testsOutputDir = $this->stringAliasedValue(
            $settings,
            'testsOutputDir',
            'tests_output_dir'
        );
    }

    /**
     * Build the generic settings consumed before integration customization.
     */
    public function createBaseSettings(): CodegenSettings
    {
        $settings = $this->configuration;
        unset(
            $settings['testsOutputDir'],
            $settings['tests_output_dir']
        );

        return CodegenSettings::fromArray($settings);
    }

    public function preprocessModel(
        SmithyModel $model,
        CodegenSettings $settings
    ): SmithyModel
    {
        $this->resolvedModel = $model;

        return $model;
    }

    public function customizeSettings(
        CodegenSettings $settings,
        SmithyModel $model
    ): CodegenSettings
    {
        $metadata = $this->deriveMetadata($model);
        $namespace = $this->resolveClientNamespace($settings->namespace, $model);
        $settings = $settings->copyWith([
            'namespace' => $namespace,
            'rulesFunctions' => [
                ...$settings->rulesFunctions,
                ...AwsFunctions::all()
            ],
            'extendedOpcodes' => [
                ...$settings->extendedOpcodes,
                'aws.parseArn' => AwsOpcodes::PARSE_ARN,
                'aws.partition' => AwsOpcodes::PARTITION,
                'aws.isVirtualHostableS3Bucket' =>
                    AwsOpcodes::IS_VIRTUAL_HOSTABLE_S3_BUCKET
            ],
            'waiterResourceInitialisms' => [
                ...self::WAITER_RESOURCE_INITIALISMS,
                ...$settings->waiterResourceInitialisms
            ],
            'authSchemeIds' => [
                ...$settings->authSchemeIds,
                ...self::AUTH_SCHEME_IDS
            ],
            'assumeAsciiEndpointStrings' => $this->booleanAliasedValue(
                $this->configuration,
                'assumeAsciiEndpointStrings',
                'assume_ascii_endpoint_strings',
                true
            ),
            'generateEndpointKeyBuilder' => $this->booleanAliasedValue(
                $this->configuration,
                'generateEndpointKeyBuilder',
                'generate_endpoint_key_builder',
                true
            ),
            'operationConstants' => $this->mergeNestedMaps(
                $metadata['operationConstants'],
                $settings->operationConstants
            ),
            'clientBaseClass' => AbstractAwsClient::class,
            'clientBaseInterface' => AwsClientInterface::class,
            'clientConfigClass' => AbstractAwsClientConfig::class,
            'generateClientConfig' => false,
            'baseServiceException' => $settings->baseServiceException
                ?? AwsException::class,
            'shapeConstants' => $this->mergeNestedMaps(
                $metadata['shapeConstants'],
                $settings->shapeConstants
            ),
            'errorDiscriminators' => $this->mergeLists(
                $metadata['errorDiscriminators'],
                $settings->errorDiscriminators
            ),
            'schemaTraitIndices' => [
                ...$settings->schemaTraitIndices,
                self::EC2_QUERY_NAME => 27,
                self::HTTP_CHECKSUM => 28,
                self::UNSIGNED_PAYLOAD => 31
            ],
            'operationSchemaTraits' => $this->mergeNestedMaps(
                $metadata['operationSchemaTraits'],
                $settings->operationSchemaTraits
            )
        ]);

        $this->resolvedModel = $model;
        $this->resolvedSettings = $settings;

        return $settings;
    }

    public function generateAdditionalFiles(CodegenContext $context): iterable
    {
        if (!$this->generateClientConfig) {
            return [];
        }

        $generator = new AwsClientConfigGenerator(
            $context->model,
            $context->settings
        );
        $files = [];
        foreach ($context->model->getServiceShapes() as $serviceId => $_) {
            $files[] = $generator->generate($serviceId);
        }

        return $files;
    }

    public function getResolvedModel(): SmithyModel
    {
        return $this->resolvedModel
            ?? throw new \LogicException(
                'AWS codegen integration has not processed a model'
            );
    }

    public function getResolvedSettings(): CodegenSettings
    {
        return $this->resolvedSettings
            ?? throw new \LogicException(
                'AWS codegen integration has not processed settings'
            );
    }

    public function getTestsOutputDir(): ?string
    {
        return $this->testsOutputDir;
    }

    /**
     * Replace the final namespace segment with the client name derived
     * from the service's specification serviceId (the aws.api#service sdkId trait).
     *
     * Every preview client and namespace name is derived from the sdkId
     * with the single PascalCase transform in {@see clientNameFromSdkId},
     * so the names stay consistent across services (Sso, SsoOidc, Ec2).
     * The configured namespace is kept when the model carries no single
     * service shape or no sdkId.
     */
    private function resolveClientNamespace(
        string $namespace,
        SmithyModel $model
    ): string
    {
        $services = $model->getServiceShapes();
        if (\count($services) !== 1) {
            return $namespace;
        }

        $service = \reset($services);
        $sdkId = $service['traits'][self::SERVICE_TRAIT]['sdkId'] ?? null;
        if (!\is_string($sdkId) || $sdkId === '') {
            return $namespace;
        }

        $clientName = self::clientNameFromSdkId($sdkId);
        $segments = \explode('\\', $namespace);
        $segments[\count($segments) - 1] = $clientName;

        return \implode('\\', $segments);
    }

    /**
     * Derive a PascalCase client and namespace name from a specification serviceId.
     *
     * Splits the serviceId on spaces, upper-cases the first letter of each
     * word and lower-cases the rest, then joins the words. The one
     * transform is applied to every service, so "SSO OIDC" becomes
     * "SsoOidc", "EC2" becomes "Ec2" and "S3" stays "S3".
     */
    public static function clientNameFromSdkId(string $sdkId): string
    {
        $words = \preg_split('/\s+/', \trim($sdkId)) ?: [];
        $name = '';
        foreach ($words as $word) {
            if ($word === '') {
                continue;
            }
            $name .= \ucfirst(\strtolower($word));
        }

        return $name;
    }

    /**
     * Return the service short name generated class names start with: the
     * last segment of the resolved client namespace.
     */
    public static function serviceShortName(CodegenSettings $settings): string
    {
        $separator = \strrpos($settings->namespace, '\\');

        return $separator === false
            ? $settings->namespace
            : \substr($settings->namespace, $separator + 1);
    }

    /**
     * @return array{
     *     operationConstants: array<string, array<string, string>>,
     *     shapeConstants: array<string, array<string, string>>,
     *     errorDiscriminators: array<string, list<string>>,
     *     operationSchemaTraits: array<string, array<int|string, mixed>>
     * }
     */
    private function deriveMetadata(SmithyModel $model): array
    {
        $operationConstants = [];
        $shapeConstants = [];
        $errorDiscriminators = [];
        $operationSchemaTraits = [];

        foreach ($model->getServiceShapes() as $serviceId => $service) {
            $traits = $service['traits'] ?? [];
            $protocolId = $this->resolveProtocolId($serviceId, $traits);
            $targetPrefix = $this->targetPrefix($serviceId, $traits);

            foreach ($model->getServiceOperationIds($serviceId)
                as $operationId
            ) {
                if ($protocolId === self::AWS_QUERY
                    || $protocolId === self::EC2_QUERY
                ) {
                    $operationConstants[$operationId]['TARGET'] =
                        SmithyModel::getShapeName($operationId);
                } elseif ($protocolId === self::AWS_JSON_1_0
                    || $protocolId === self::AWS_JSON_1_1
                ) {
                    $operationConstants[$operationId]['TARGET'] =
                        $targetPrefix . '.'
                        . SmithyModel::getShapeName($operationId);
                }

                $checksum = $model->getTrait(
                    $operationId,
                    self::HTTP_CHECKSUM
                );
                if ($checksum !== null) {
                    $operationSchemaTraits[$operationId][
                        self::HTTP_CHECKSUM
                    ] = $checksum;
                }

                $unsignedPayload = $model->getTrait(
                    $operationId,
                    self::UNSIGNED_PAYLOAD
                );
                if ($unsignedPayload !== null) {
                    $operationSchemaTraits[$operationId][
                        self::UNSIGNED_PAYLOAD
                    ] = $unsignedPayload;
                }
            }
        }

        foreach ($model->getShapes() as $shapeId => $shape) {
            $traits = $shape['traits'] ?? [];
            $queryError = $traits[self::AWS_QUERY_ERROR] ?? null;
            if (!\is_array($queryError)) {
                continue;
            }
            $code = $queryError['code'] ?? null;
            if (!\is_string($code) || $code === '') {
                continue;
            }

            $shapeConstants[$shapeId]['AWS_QUERY_ERROR_CODE'] = $code;
            $errorDiscriminators[$shapeId][] = $code;
        }

        return [
            'operationConstants' => $operationConstants,
            'shapeConstants' => $shapeConstants,
            'errorDiscriminators' => $errorDiscriminators,
            'operationSchemaTraits' => $operationSchemaTraits
        ];
    }

    /**
     * @param array<string, mixed> $traits
     */
    private function targetPrefix(string $serviceId, array $traits): string
    {
        foreach ([self::AWS_JSON_1_0, self::AWS_JSON_1_1] as $traitId) {
            $protocol = $traits[$traitId] ?? null;
            if (\is_array($protocol)
                && \is_string($protocol['targetPrefix'] ?? null)
                && $protocol['targetPrefix'] !== ''
            ) {
                return $protocol['targetPrefix'];
            }
        }

        return SmithyModel::getShapeName($serviceId);
    }

    /**
     * @param array<string, mixed> $traits
     */
    private function resolveProtocolId(
        string $serviceId,
        array $traits
    ): string
    {
        foreach (self::PROTOCOL_PREFERENCE as $protocolId) {
            if (\array_key_exists($protocolId, $traits)) {
                return $protocolId;
            }
        }

        throw new \InvalidArgumentException(
            "AWS service {$serviceId} does not declare a supported protocol"
        );
    }

    /**
     * @param array<string, array<array-key, mixed>> $defaults
     * @param array<string, array<array-key, mixed>> $overrides
     * @return array<string, array<array-key, mixed>>
     */
    private function mergeNestedMaps(
        array $defaults,
        array $overrides
    ): array
    {
        foreach ($overrides as $shapeId => $values) {
            $defaults[$shapeId] = [
                ...($defaults[$shapeId] ?? []),
                ...$values
            ];
        }

        return $defaults;
    }

    /**
     * @param array<string, list<string>> $defaults
     * @param array<string, list<string>> $overrides
     * @return array<string, list<string>>
     */
    private function mergeLists(array $defaults, array $overrides): array
    {
        foreach ($overrides as $shapeId => $values) {
            $defaults[$shapeId] = \array_values(\array_unique([
                ...($defaults[$shapeId] ?? []),
                ...$values
            ]));
        }

        return $defaults;
    }

    /**
     * @param array<string, mixed> $settings
     */
    private function assertNoAliasConflicts(array $settings): void
    {
        foreach ([
            ['generateEndpointKeyBuilder', 'generate_endpoint_key_builder'],
            ['operationConstants', 'operation_constants'],
            ['clientBaseClass', 'client_base_class'],
            ['clientBaseInterface', 'client_base_interface'],
            ['clientConfigClass', 'client_config_class'],
            ['generateClientConfig', 'generate_client_config'],
            ['shapeConstants', 'shape_constants'],
            ['errorDiscriminators', 'error_discriminators'],
            ['schemaTraitIndices', 'schema_trait_indices'],
            ['operationSchemaTraits', 'operation_schema_traits'],
            [
                'waiterResourceInitialisms',
                'waiter_resource_initialisms'
            ],
            [
                'assumeAsciiEndpointStrings',
                'assume_ascii_endpoint_strings'
            ],
            ['testsOutputDir', 'tests_output_dir']
        ] as [$camelCase, $snakeCase]) {
            if (\array_key_exists($camelCase, $settings)
                && \array_key_exists($snakeCase, $settings)
            ) {
                throw new \InvalidArgumentException(
                    "Use either {$camelCase} or {$snakeCase}, not both"
                );
            }
        }
    }

    /**
     * @param array<string, mixed> $settings
     */
    private function booleanAliasedValue(
        array $settings,
        string $camelCase,
        string $snakeCase,
        bool $default
    ): bool
    {
        $value = $settings[$camelCase]
            ?? $settings[$snakeCase]
            ?? $default;
        if (!\is_bool($value)) {
            throw new \InvalidArgumentException(
                "{$camelCase} must be a bool"
            );
        }

        return $value;
    }

    /**
     * @param array<string, mixed> $settings
     */
    private function stringAliasedValue(
        array $settings,
        string $camelCase,
        string $snakeCase
    ): ?string
    {
        $value = $settings[$camelCase] ?? $settings[$snakeCase] ?? null;
        if ($value === null) {
            return null;
        }
        if (!\is_string($value) || $value === '') {
            throw new \InvalidArgumentException(
                "{$camelCase} must be a non-empty string"
            );
        }

        return $value;
    }
}
