<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen\Generator;

use Aws\Codegen\AwsCodegenIntegration;
use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Core\Checksum\ResponseChecksumValidation;
use Aws\Core\Client\AbstractAwsClientConfig;
use Smithy\Auth\Aws\AwsCredentialsIdentityInterface;
use Smithy\Auth\Aws\SigV4AuthScheme;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Client\Auth\AuthSchemeResolverInterface;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Interceptor\InterceptorChain;
use Smithy\Client\Plugin\PluginState;
use Smithy\Client\Protocol\ProtocolResolverInterface;
use Smithy\Client\Retry\RetryStrategyInterface;
use Smithy\Codegen\CodegenSettings;
use Smithy\Codegen\Generator\EndpointRulesetIntrospector;
use Smithy\Codegen\Generator\EndpointRulesetParameter;
use Smithy\Codegen\Generator\GeneratedFile;
use Smithy\Codegen\Model\SmithyModel;
use Smithy\Codegen\Writer\PhpCodeWriter;
use Smithy\Core\Shape\ServiceInterface;
use Smithy\Core\Transport\TransportInterface;
use Smithy\Http\Client\CurlClient;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Protocol\Aws\AwsJson1_0Protocol;
use Smithy\Protocol\Aws\AwsJson1_1Protocol;
use Smithy\Protocol\Aws\AwsQueryProtocol;
use Smithy\Protocol\Aws\Ec2QueryProtocol;
use Smithy\Protocol\Aws\RestJsonProtocol;
use Smithy\Protocol\Aws\RestXmlProtocol;
use Smithy\Protocol\HttpPathLabelPolicy;
use Smithy\Protocol\ProtocolInterface;
use Smithy\Protocol\ProtocolSettings;
use Smithy\Protocol\RpcV2\RpcV2CborProtocol;

/**
 * Generate an AWS service-specific client configuration type.
 */
final class AwsClientConfigGenerator
{
    private const AWS_JSON_1_0 = 'aws.protocols#awsJson1_0';
    private const AWS_JSON_1_1 = 'aws.protocols#awsJson1_1';
    private const AWS_QUERY = 'aws.protocols#awsQuery';
    private const EC2_QUERY = 'aws.protocols#ec2Query';
    private const REST_JSON = 'aws.protocols#restJson1';
    private const REST_XML = 'aws.protocols#restXml';
    private const RPC_V2_CBOR = 'smithy.protocols#rpcv2Cbor';
    private const ENDPOINT_BDD = 'smithy.rules#endpointBdd';

    private const PROTOCOL_PREFERENCE = [
        self::RPC_V2_CBOR,
        self::AWS_JSON_1_0,
        self::AWS_JSON_1_1,
        self::REST_JSON,
        self::REST_XML,
        self::AWS_QUERY,
        self::EC2_QUERY
    ];

    private const BASE_ENDPOINT_PARAMETERS = [
        'Endpoint',
        'Region',
        'UseDualStack',
        'UseFIPS'
    ];

    private readonly EndpointRulesetIntrospector $endpointIntrospector;

    public function __construct(
        private readonly SmithyModel $model,
        private readonly CodegenSettings $settings
    ) {
        $this->endpointIntrospector = new EndpointRulesetIntrospector(
            $model,
            self::BASE_ENDPOINT_PARAMETERS
        );
    }

    public function generate(string $serviceShapeId): GeneratedFile
    {
        $service = $this->model->getShape($serviceShapeId);
        if (($service['type'] ?? null) !== 'service') {
            throw new \InvalidArgumentException(
                "Shape {$serviceShapeId} is not a service"
            );
        }

        $shortName = AwsCodegenIntegration::serviceShortName($this->settings);
        $className = $shortName . 'ClientConfig';
        $traits = $service['traits'] ?? [];
        $requiresPathPreservation = $this->requiresPathPreservation($traits);
        $protocol = $this->resolveProtocol(
            $serviceShapeId,
            $service,
            $traits,
            $requiresPathPreservation
        );
        $signingName = $this->resolveSigningName($serviceShapeId, $traits);
        $usesSigV4 = $this->usesSigV4($serviceShapeId);
        $supportsChecksums = $this->supportsFlexibleChecksums(
            $serviceShapeId
        );
        $endpointParameters = $this->endpointIntrospector->extraParameters(
            $serviceShapeId
        );
        $endpointParameters = [
            ...\array_values(\array_filter(
                $endpointParameters,
                static fn(EndpointRulesetParameter $parameter): bool =>
                    $parameter->required && $parameter->default === null
            )),
            ...\array_values(\array_filter(
                $endpointParameters,
                static fn(EndpointRulesetParameter $parameter): bool =>
                    !$parameter->required || $parameter->default !== null
            ))
        ];

        $writer = new PhpCodeWriter($this->settings->namespace);
        $this->addImports(
            $writer,
            $protocol['class'],
            $usesSigV4,
            $requiresPathPreservation
        );
        $writer->writeDocBlock([
            "Configuration for {@see {$shortName}Client}.",
            '',
            'Wires the AWS runtime, modeled protocol, endpoint rules,',
            "and signing name for {$shortName}."
        ]);
        $writer->writeLine(
            "final class {$className} extends AbstractAwsClientConfig"
        );
        $writer->openBlock('{');

        $this->writeConstructor(
            $writer,
            $endpointParameters,
            $signingName,
            $usesSigV4,
            $supportsChecksums
        );
        $writer->writeLine();
        $this->writeCopyWith($writer, $endpointParameters);
        $writer->writeLine();
        $this->writeProtocolMethod(
            $writer,
            $protocol['expression'],
            $requiresPathPreservation
        );
        $writer->writeLine();
        $this->writeHttpClientMethod(
            $writer,
            $requiresPathPreservation
        );
        $writer->writeLine();
        $this->writeEndpointResolverMethod(
            $writer,
            $serviceShapeId,
            $shortName,
            $endpointParameters,
            \array_key_exists(self::ENDPOINT_BDD, $traits)
        );
        $writer->writeLine();
        if ($this->isS3Service($traits)) {
            $this->writeS3DefaultPluginsMethod($writer, $endpointParameters);
            $writer->writeLine();
        }
        $this->writeSigningNameMethod($writer, $signingName);

        $writer->closeBlock();

        return new GeneratedFile(
            $this->settings->outputDir
                . \DIRECTORY_SEPARATOR
                . $className
                . '.php',
            $writer->toFileContent()
        );
    }

    private function addImports(
        PhpCodeWriter $writer,
        string $protocolClass,
        bool $usesSigV4,
        bool $requiresPathPreservation
    ): void
    {
        $imports = [
            AbstractAwsClientConfig::class,
            AwsCredentialsIdentityInterface::class,
            $protocolClass,
            AuthSchemeResolverInterface::class,
            IdentityResolverInterface::class,
            EndpointResolverInterface::class,
            InterceptorChain::class,
            PluginState::class,
            RetryStrategyInterface::class,
            TransportInterface::class,
            ProtocolResolverInterface::class,
            ServiceInterface::class,
            HttpClientInterface::class,
            CurlClient::class,
            ProtocolInterface::class,
            RequestChecksumCalculation::class,
            ResponseChecksumValidation::class
        ];
        if ($usesSigV4) {
            $imports[] = SigV4AuthScheme::class;
        }
        if ($requiresPathPreservation) {
            $imports[] = HttpPathLabelPolicy::class;
            $imports[] = ProtocolSettings::class;
        }
        foreach ($imports as $import) {
            $writer->addImport($import);
        }
    }

    /**
     * @param list<EndpointRulesetParameter> $endpointParameters
     */
    private function writeConstructor(
        PhpCodeWriter $writer,
        array $endpointParameters,
        string $signingName,
        bool $usesSigV4,
        bool $supportsChecksums
    ): void
    {
        $writer->writeLine('public function __construct(');
        $writer->pushIndent();
        foreach ($endpointParameters as $parameter) {
            $this->writeEndpointParameter($writer, $parameter);
        }
        foreach ($this->baseParameters($signingName) as $parameter) {
            $writer->writeLine($parameter);
        }
        $writer->popIndent();
        $writer->writeLine(') {');
        $writer->pushIndent();
        $writer->writeLine(
            '[$region, $context] = self::resolveRegionAndContext('
        );
        $writer->pushIndent();
        $writer->writeLine('$region,');
        $writer->writeLine('$context');
        $writer->popIndent();
        $writer->writeLine(');');

        if ($usesSigV4) {
            $writer->writeLine();
            $writer->writeLine(
                '$effectiveSigningRegion = $signingRegion ?? $region;'
            );
            $writer->writeLine();
            $writer->writeLine('if ($supportedAuthSchemes === []) {');
            $writer->pushIndent();
            $writer->writeLine('$supportedAuthSchemes = [');
            $writer->pushIndent();
            $writer->writeLine(
                "new SigV4AuthScheme('"
                    . $this->escape($signingName)
                    . "', \$effectiveSigningRegion)"
            );
            $writer->popIndent();
            $writer->writeLine('];');
            $writer->popIndent();
            $writer->writeLine('}');
        }

        $writer->writeLine();
        $writer->writeLine('parent::__construct(');
        $writer->pushIndent();
        foreach ([
            'region',
            'credentials',
            'tokenProvider',
            'signingRegion',
            'useDualStack',
            'useFips',
            'userAgentAppId',
            'interceptors',
            'supportedAuthSchemes',
            'authSchemeResolver',
            'authSchemePreference',
            'retryMode',
            'maxAttempts',
            'requestChecksumCalculation',
            'responseChecksumValidation'
        ] as $name) {
            $writer->writeLine("{$name}: \${$name},");
        }
        $writer->writeLine(
            'supportsFlexibleChecksums: '
                . ($supportsChecksums ? 'true' : 'false')
                . ','
        );
        foreach ([
            'retryStrategy',
            'retryScope',
            'context',
            'httpClient',
            'pluginState',
            'transport',
            'protocol',
            'protocolResolver',
            'protocolId',
            'service',
            'protocolIsExplicit'
        ] as $name) {
            $writer->writeLine("{$name}: \${$name},");
        }
        $writer->popIndent();
        $writer->writeLine(');');
        $writer->popIndent();
        $writer->writeLine('}');
    }

    /**
     * @return list<string>
     */
    private function baseParameters(string $signingName): array
    {
        return [
            '?string $region = null,',
            'IdentityResolverInterface|AwsCredentialsIdentityInterface|null '
                . '$credentials = null,',
            '?IdentityResolverInterface $tokenProvider = null,',
            '?string $signingRegion = null,',
            'bool $useDualStack = false,',
            'bool $useFips = false,',
            '?string $userAgentAppId = null,',
            'InterceptorChain $interceptors = new InterceptorChain(),',
            'array $supportedAuthSchemes = [],',
            '?AuthSchemeResolverInterface $authSchemeResolver = null,',
            '?array $authSchemePreference = null,',
            '?string $retryMode = null,',
            '?int $maxAttempts = null,',
            'RequestChecksumCalculation|string|null '
                . '$requestChecksumCalculation = null,',
            'ResponseChecksumValidation|string|null '
                . '$responseChecksumValidation = null,',
            '?RetryStrategyInterface $retryStrategy = null,',
            "string \$retryScope = '" . $this->escape($signingName) . "',",
            'array $context = [],',
            '?HttpClientInterface $httpClient = null,',
            '?PluginState $pluginState = null,',
            '?TransportInterface $transport = null,',
            '?ProtocolInterface $protocol = null,',
            '?ProtocolResolverInterface $protocolResolver = null,',
            '?string $protocolId = null,',
            '?ServiceInterface $service = null,',
            '?bool $protocolIsExplicit = null'
        ];
    }

    private function writeEndpointParameter(
        PhpCodeWriter $writer,
        EndpointRulesetParameter $parameter
    ): void
    {
        if ($parameter->documentation !== null
            || $parameter->builtIn !== null
        ) {
            $lines = [];
            if ($parameter->documentation !== null) {
                $lines[] = $this->cleanDocumentation(
                    $parameter->documentation
                );
            }
            if ($parameter->builtIn !== null) {
                $lines[] = '@builtIn ' . $parameter->builtIn;
            }
            $writer->writeDocBlock($lines);
        }

        $property = $this->normalizePropertyName(
            $parameter->phpPropertyName
        );
        $type = $parameter->phpType;
        if (!$parameter->required && $parameter->default === null) {
            $type = '?' . $type;
        }
        $default = $parameter->required
            && $parameter->default === null
                ? ''
                : ' = ' . $this->exportLiteral($parameter->default);
        $writer->writeLine(
            "public readonly {$type} \${$property}{$default},"
        );
    }

    /**
     * @param list<EndpointRulesetParameter> $endpointParameters
     */
    private function writeCopyWith(
        PhpCodeWriter $writer,
        array $endpointParameters
    ): void
    {
        $writer->writeDocBlock(['@param array<string, mixed> $overrides']);
        $writer->writeLine(
            'protected function copyWith(array $overrides): static'
        );
        $writer->openBlock('{');
        $writer->writeLine('return new static(');
        $writer->pushIndent();
        foreach ($endpointParameters as $parameter) {
            $this->writeCopyArgument(
                $writer,
                $this->normalizePropertyName(
                    $parameter->phpPropertyName
                )
            );
        }
        foreach ([
            'region',
            'credentials',
            'tokenProvider',
            'signingRegion',
            'useDualStack',
            'useFips',
            'userAgentAppId',
            'interceptors',
            'supportedAuthSchemes',
            'authSchemeResolver',
            'authSchemePreference',
            'retryMode',
            'maxAttempts',
            'retryStrategy',
            'retryScope',
            'context'
        ] as $name) {
            $this->writeCopyArgument($writer, $name);
        }
        $writer->writeLine(
            'httpClient: $this->httpClientForCopy($overrides),'
        );
        $this->writeCopyArgument($writer, 'pluginState');
        $writer->writeLine(
            'transport: $this->transportForCopy($overrides),'
        );
        foreach (['protocol', 'protocolResolver', 'protocolId', 'service']
            as $name
        ) {
            $this->writeCopyArgument($writer, $name);
        }
        $writer->writeLine(
            'protocolIsExplicit: $overrides[\'protocolIsExplicit\']'
        );
        $writer->pushIndent();
        $writer->writeLine('?? $this->hasExplicitProtocol()');
        $writer->popIndent();
        $writer->popIndent();
        $writer->writeLine(');');
        $writer->closeBlock();
    }

    private function writeCopyArgument(
        PhpCodeWriter $writer,
        string $name
    ): void
    {
        $property = match ($name) {
            'interceptors' => 'interceptorChain',
            'pluginState' => 'getPluginState()',
            default => $name
        };
        $writer->writeLine(
            "{$name}: \\array_key_exists('{$name}', \$overrides)"
        );
        $writer->pushIndent();
        $writer->writeLine("? \$overrides['{$name}']");
        $writer->writeLine(': $this->' . $property . ',');
        $writer->popIndent();
    }

    private function writeProtocolMethod(
        PhpCodeWriter $writer,
        string $expression,
        bool $requiresPathPreservation
    ): void
    {
        $writer->writeLine(
            'protected function createProtocol(): ProtocolInterface'
        );
        $writer->openBlock('{');
        if ($requiresPathPreservation) {
            $writer->writeLine('$settings = new ProtocolSettings(');
            $writer->pushIndent();
            $writer->writeLine(
                'HttpPathLabelPolicy::PreserveGreedySegments'
            );
            $writer->popIndent();
            $writer->writeLine(');');
            $writer->writeLine();
        }
        $lines = \explode("\n", $expression);
        $lastIndex = \count($lines) - 1;
        foreach ($lines as $index => $line) {
            $prefix = $index === 0 ? 'return ' : '';
            $suffix = $index === $lastIndex ? ';' : '';
            $writer->writeLine("{$prefix}{$line}{$suffix}");
        }
        $writer->closeBlock();
    }

    private function writeHttpClientMethod(
        PhpCodeWriter $writer,
        bool $requiresPathPreservation
    ): void
    {
        $writer->writeLine('protected function getHttpClient(): HttpClientInterface');
        $writer->openBlock('{');
        $writer->writeLine(
            'return new CurlClient('
                . ($requiresPathPreservation ? 'preservePath: true' : '')
                . ');'
        );
        $writer->closeBlock();
    }

    /**
     * @param list<EndpointRulesetParameter> $endpointParameters
     */
    private function writeEndpointResolverMethod(
        PhpCodeWriter $writer,
        string $serviceShapeId,
        string $shortName,
        array $endpointParameters,
        bool $hasEndpointBdd
    ): void
    {
        $writer->writeLine(
            'protected function getEndpointResolver(): '
                . 'EndpointResolverInterface'
        );
        $writer->openBlock('{');
        if (!$hasEndpointBdd) {
            $writer->writeLine(
                "throw new \\LogicException('Service "
                    . $this->escape($serviceShapeId)
                    . " has no compiled endpoint rules.');"
            );
            $writer->closeBlock();

            return;
        }

        $bytecodeClass = $shortName . 'EndpointBytecode';
        $keyBuilderClass = $shortName . 'EndpointKeyBuilder';
        $writer->addImport(
            $this->settings->resolveEndpointNamespace()
                . '\\'
                . $bytecodeClass
        );
        if ($this->settings->generateEndpointKeyBuilder) {
            $writer->addImport(
                $this->settings->resolveEndpointNamespace()
                    . '\\'
                    . $keyBuilderClass
            );
        }

        $writer->writeLine('return $this->bytecodeEndpointResolver(');
        $writer->pushIndent();
        $writer->writeLine("{$bytecodeClass}::get(),");
        if ($endpointParameters !== []) {
            $writer->writeLine('staticContext: [');
            $writer->pushIndent();
            $lastIndex = \count($endpointParameters) - 1;
            foreach ($endpointParameters as $index => $parameter) {
                $property = $this->normalizePropertyName(
                    $parameter->phpPropertyName
                );
                $suffix = $index === $lastIndex ? '' : ',';
                $writer->writeLine(
                    "'"
                        . $this->escape($parameter->pascalName)
                        . "' => \$this->{$property}{$suffix}"
                );
            }
            $writer->popIndent();
            $writer->writeLine(
                $this->settings->generateEndpointKeyBuilder
                    ? '],'
                    : ']'
            );
        }
        if ($this->settings->generateEndpointKeyBuilder) {
            $writer->writeLine(
                "keyBuilder: {$keyBuilderClass}::build()"
            );
        }
        $writer->popIndent();
        $writer->writeLine(');');
        $writer->closeBlock();
    }

    private function writeSigningNameMethod(
        PhpCodeWriter $writer,
        string $signingName
    ): void
    {
        $writer->writeLine('protected function getSigningName(): string');
        $writer->openBlock('{');
        $writer->writeLine(
            "return '" . $this->escape($signingName) . "';"
        );
        $writer->closeBlock();
    }

    /**
     * @param array<string, mixed> $service
     * @param array<string, mixed> $traits
     * @return array{class: class-string, expression: string}
     */
    private function resolveProtocol(
        string $serviceShapeId,
        array $service,
        array $traits,
        bool $requiresPathPreservation
    ): array
    {
        $selectedProtocol = null;
        foreach (self::PROTOCOL_PREFERENCE as $protocolId) {
            if (\array_key_exists($protocolId, $traits)) {
                $selectedProtocol = $protocolId;
                break;
            }
        }
        if ($selectedProtocol === null) {
            throw new \InvalidArgumentException(
                "AWS service {$serviceShapeId} does not declare a "
                    . 'supported protocol'
            );
        }

        $version = $service['version'] ?? null;
        if (($selectedProtocol === self::AWS_QUERY
                || $selectedProtocol === self::EC2_QUERY)
            && (!\is_string($version) || $version === '')
        ) {
            throw new \InvalidArgumentException(
                "AWS query service {$serviceShapeId} has no modeled version"
            );
        }

        return match ($selectedProtocol) {
            self::AWS_JSON_1_0 => [
                'class' => AwsJson1_0Protocol::class,
                'expression' => 'new AwsJson1_0Protocol()'
            ],
            self::AWS_JSON_1_1 => [
                'class' => AwsJson1_1Protocol::class,
                'expression' => 'new AwsJson1_1Protocol()'
            ],
            self::AWS_QUERY => [
                'class' => AwsQueryProtocol::class,
                'expression' => "new AwsQueryProtocol('"
                    . $this->escape((string) $version)
                    . "')"
            ],
            self::EC2_QUERY => [
                'class' => Ec2QueryProtocol::class,
                'expression' => "new Ec2QueryProtocol('"
                    . $this->escape((string) $version)
                    . "')"
            ],
            self::REST_JSON => [
                'class' => RestJsonProtocol::class,
                'expression' => 'new RestJsonProtocol()'
            ],
            self::REST_XML => [
                'class' => RestXmlProtocol::class,
                'expression' => $this->restXmlExpression(
                    $traits,
                    $requiresPathPreservation
                )
            ],
            self::RPC_V2_CBOR => [
                'class' => RpcV2CborProtocol::class,
                'expression' => 'new RpcV2CborProtocol()'
            ]
        };
    }

    /**
     * @param array<string, mixed> $traits
     */
    private function restXmlExpression(
        array $traits,
        bool $requiresPathPreservation
    ): string
    {
        $namespace = $traits['smithy.api#xmlNamespace'] ?? null;
        $uri = \is_array($namespace) ? ($namespace['uri'] ?? null) : null;
        $arguments = [];
        if (\is_string($uri) && $uri !== '') {
            $arguments[] = "'" . $this->escape($uri) . "'";
        }
        if ($requiresPathPreservation) {
            $arguments[] = '$settings';
        }

        if ($requiresPathPreservation) {
            return "new RestXmlProtocol(\n"
                . '    '
                . \implode(",\n    ", $arguments)
                . "\n)";
        }

        return 'new RestXmlProtocol(' . \implode(', ', $arguments) . ')';
    }

    /**
     * @param array<string, mixed> $traits
     */
    private function requiresPathPreservation(array $traits): bool
    {
        return $this->isS3Service($traits);
    }

    /**
     * @param array<string, mixed> $traits
     */
    private function isS3Service(array $traits): bool
    {
        $service = $traits['aws.api#service'] ?? null;

        return \is_array($service)
            && ($service['sdkId'] ?? null) === 'S3';
    }

    /**
     * @param list<EndpointRulesetParameter> $endpointParameters
     */
    private function writeS3DefaultPluginsMethod(
        PhpCodeWriter $writer,
        array $endpointParameters
    ): void
    {
        $forcePathStyle = $this->builtInPropertyExpression(
            $endpointParameters,
            'AWS::S3::ForcePathStyle'
        );
        $accelerate = $this->builtInPropertyExpression(
            $endpointParameters,
            'AWS::S3::Accelerate'
        );
        $useArnRegion = $this->builtInPropertyExpression(
            $endpointParameters,
            'AWS::S3::UseArnRegion',
            'null'
        );
        $writer->addImport('Aws\\Core\\S3\\S3AddressingPlugin');
        $writer->addImport('Aws\\Core\\S3\\S3ErrorPlugin');
        $writer->addImport('Aws\\Core\\S3\\S3UseArnRegionPlugin');
        $writer->writeDocBlock(['@inheritDoc']);
        $writer->writeLine('public function getDefaultPlugins(): array');
        $writer->openBlock('{');
        $writer->openBlock('return [');
        $writer->writeLine('new S3ErrorPlugin(),');
        $writer->writeLine(
            "new S3AddressingPlugin({$forcePathStyle}, {$accelerate}),"
        );
        $writer->writeLine("new S3UseArnRegionPlugin({$useArnRegion})");
        $writer->closeBlock('];');
        $writer->closeBlock();
    }

    /**
     * Return the config property bound to a built-in, or `$missing` (default
     * `false`) when the ruleset declares no such built-in.
     *
     * @param list<EndpointRulesetParameter> $endpointParameters
     */
    private function builtInPropertyExpression(
        array $endpointParameters,
        string $builtIn,
        string $missing = 'false'
    ): string
    {
        foreach ($endpointParameters as $parameter) {
            if ($parameter->builtIn === $builtIn) {
                return '$this->' . $this->normalizePropertyName(
                    $parameter->phpPropertyName
                );
            }
        }

        return $missing;
    }

    /**
     * @param array<string, mixed> $traits
     */
    private function resolveSigningName(
        string $serviceShapeId,
        array $traits
    ): string
    {
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

        return \strtolower(SmithyModel::getShapeName($serviceShapeId));
    }

    private function usesSigV4(string $serviceShapeId): bool
    {
        if ($this->model->hasTrait(
                $serviceShapeId,
                SigV4AuthScheme::SCHEME_ID
            )
        ) {
            return true;
        }
        foreach ($this->model->getServiceOperationIds($serviceShapeId)
            as $operationId
        ) {
            if (\in_array(
                    SigV4AuthScheme::SCHEME_ID,
                    $this->model->getEffectiveAuthSchemeIds(
                        $serviceShapeId,
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

    private function supportsFlexibleChecksums(
        string $serviceShapeId
    ): bool
    {
        foreach ($this->model->getServiceOperationIds($serviceShapeId)
            as $operationId
        ) {
            if ($this->model->hasTrait(
                    $operationId,
                    'aws.protocols#httpChecksum'
                )
            ) {
                return true;
            }
        }

        return false;
    }

    private function normalizePropertyName(string $name): string
    {
        return \str_replace(
            ['FIPS', 'URL', 'URI'],
            ['Fips', 'Url', 'Uri'],
            $name
        );
    }

    private function exportLiteral(mixed $value): string
    {
        if ($value === null) {
            return 'null';
        }
        if (\is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        if (\is_int($value) || \is_float($value)) {
            return (string) $value;
        }
        if (\is_string($value)) {
            return "'" . $this->escape($value) . "'";
        }
        if (\is_array($value)) {
            return $value === [] ? '[]' : \var_export($value, true);
        }

        throw new \InvalidArgumentException(
            'Unsupported endpoint parameter default'
        );
    }

    private function cleanDocumentation(string $documentation): string
    {
        return \trim((string) \preg_replace(
            '/\s+/',
            ' ',
            \strip_tags($documentation)
        ));
    }

    private function escape(string $value): string
    {
        return \addcslashes($value, "\\'");
    }
}
