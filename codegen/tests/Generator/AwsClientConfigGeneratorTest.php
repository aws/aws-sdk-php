<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen\Tests\Generator;

use Aws\Codegen\Generator\AwsClientConfigGenerator;
use PHPUnit\Framework\TestCase;
use Smithy\Codegen\CodegenSettings;
use Smithy\Codegen\Model\SmithyModel;

/**
 * Verify service-specific AWS client configuration generation.
 */
final class AwsClientConfigGeneratorTest extends TestCase
{
    public function testGeneratesEndpointParametersAndStaticContext(): void
    {
        $model = $this->modelWithEndpointParameters();
        $settings = new CodegenSettings(
            namespace: 'Aws\\Generated\\Example',
            outputDir: '/tmp/aws-codegen-test',
            generateEndpointKeyBuilder: true
        );

        $file = (new AwsClientConfigGenerator(
            $model,
            $settings
        ))->generate('example.aws#ExampleService');

        self::assertStringContainsString(
            'public readonly ?string $bucket = null,',
            $file->content
        );
        self::assertStringContainsString(
            "'Bucket' => \$this->bucket",
            $file->content
        );
        self::assertStringContainsString(
            'ExampleEndpointBytecode::get()',
            $file->content
        );
        self::assertStringContainsString(
            'keyBuilder: ExampleEndpointKeyBuilder::build()',
            $file->content
        );
        self::assertStringNotContainsString(
            'public readonly string $region',
            $file->content
        );
        self::assertStringNotContainsString(
            'public readonly ?string $endpoint',
            $file->content
        );
        self::assertStringContainsString(
            'array $context = [],',
            $file->content
        );
        self::assertStringContainsString(
            'context: $context,',
            $file->content
        );
        self::assertStringContainsString(
            "?bool \$protocolIsExplicit = null,\n"
                . "        ?string \$endpoint = null\n",
            $file->content
        );
        self::assertStringContainsString(
            "protocolIsExplicit: \$protocolIsExplicit,\n"
                . "            endpoint: \$endpoint\n",
            $file->content
        );
        self::assertStringContainsString(
            'use Smithy\Client\Interceptor\InterceptorChain;',
            $file->content
        );
        self::assertStringContainsString(
            'use Smithy\Client\Plugin\PluginState;',
            $file->content
        );
        self::assertStringContainsString(
            'use Smithy\Core\Transport\TransportInterface;',
            $file->content
        );
        self::assertStringContainsString(
            'use Smithy\Http\Client\CurlClient;',
            $file->content
        );
        self::assertStringContainsString(
            'InterceptorChain $interceptors = new InterceptorChain(),',
            $file->content
        );
        self::assertStringContainsString(
            '?PluginState $pluginState = null,',
            $file->content
        );
        self::assertStringContainsString(
            '?TransportInterface $transport = null',
            $file->content
        );
        self::assertStringContainsString(
            'pluginState: $pluginState,',
            $file->content
        );
        self::assertStringContainsString(
            'transport: $transport',
            $file->content
        );
        self::assertStringContainsString(
            ': $this->getPluginState()',
            $file->content
        );
        self::assertStringContainsString(
            ': $this->interceptorChain,',
            $file->content
        );
        self::assertStringContainsString(
            'transport: $this->transportForCopy($overrides)',
            $file->content
        );
        self::assertStringNotContainsString(
            '$additional',
            $file->content
        );
        self::assertStringNotContainsString(
            'preservePath: true',
            $file->content
        );
        self::assertStringNotContainsString(
            'HttpPathLabelPolicy',
            $file->content
        );
    }

    public function testGeneratesS3PathPreservationSettings(): void
    {
        $model = $this->modelWithEndpointParameters()->toArray();
        $traits = &$model['shapes']['example.aws#ExampleService']['traits'];
        $traits['aws.api#service']['sdkId'] = 'S3';
        unset($traits['aws.protocols#awsQuery']);
        $traits['aws.protocols#restXml'] = [
            'noErrorWrapping' => true
        ];
        $traits['smithy.api#xmlNamespace'] = [
            'uri' => 'http://s3.amazonaws.com/doc/2006-03-01/'
        ];
        $model = SmithyModel::fromArray($model);
        $settings = new CodegenSettings(
            namespace: 'Aws\\Generated\\S3',
            outputDir: '/tmp/aws-codegen-test',
            generateEndpointKeyBuilder: true
        );

        $file = (new AwsClientConfigGenerator(
            $model,
            $settings
        ))->generate('example.aws#ExampleService');

        self::assertStringContainsString(
            'use Smithy\\Protocol\\HttpPathLabelPolicy;',
            $file->content
        );
        self::assertStringContainsString(
            'use Smithy\\Protocol\\ProtocolSettings;',
            $file->content
        );
        self::assertStringContainsString(
            '$settings = new ProtocolSettings(',
            $file->content
        );
        self::assertStringContainsString(
            'HttpPathLabelPolicy::PreserveGreedySegments',
            $file->content
        );
        self::assertStringContainsString(
            "return new RestXmlProtocol(\n"
                . "            'http://s3.amazonaws.com/doc/2006-03-01/',\n"
                . "            \$settings\n"
                . '        );',
            $file->content
        );
        self::assertStringContainsString(
            'preservePath: true',
            $file->content
        );
    }

    private function modelWithEndpointParameters(): SmithyModel
    {
        $model = \json_decode(
            (string) \file_get_contents(
                __DIR__ . '/../fixtures/aws-query-model.json'
            ),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        $model['shapes']['example.aws#ExampleService']['traits'][
            'smithy.rules#endpointBdd'
        ] = [
            'parameters' => [
                'Region' => [
                    'type' => 'string',
                    'builtIn' => 'AWS::Region',
                    'required' => true
                ],
                'UseFIPS' => [
                    'type' => 'boolean',
                    'builtIn' => 'AWS::UseFIPS',
                    'default' => false
                ],
                'Endpoint' => [
                    'type' => 'string',
                    'builtIn' => 'SDK::Endpoint'
                ],
                'Bucket' => [
                    'type' => 'string',
                    'documentation' => 'The bucket used for endpoint routing.'
                ]
            ]
        ];

        return SmithyModel::fromJson(
            \json_encode($model, JSON_THROW_ON_ERROR)
        );
    }
}
