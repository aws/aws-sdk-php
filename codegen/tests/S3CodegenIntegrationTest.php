<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen\Tests;

use Aws\Codegen\AwsCodeGenerator;
use Aws\Codegen\S3CodegenIntegration;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Smithy\Codegen\CodegenSettings;
use Smithy\Codegen\Generator\GeneratedFile;
use Smithy\Codegen\Model\SmithyModel;

#[CoversClass(S3CodegenIntegration::class)]
final class S3CodegenIntegrationTest extends TestCase
{
    public function testPreprocessDropsTheBucketFromS3OperationUris(): void
    {
        $model = (new S3CodegenIntegration())->preprocessModel(
            $this->model('S3'),
            CodegenSettings::fromArray([
                'namespace' => 'Aws\\Generated\\Example',
                'outputDir' => '/tmp/aws-codegen-test'
            ])
        );

        $operation = $model->getShape('example.aws#DoThing');
        self::assertSame(
            '/{Key+}?x-id=DoThing',
            $operation['traits']['smithy.api#http']['uri']
        );
        self::assertArrayHasKey(
            'smithy.api#httpLabel',
            $model->getShape('example.aws#DoThingInput')['members']['Bucket']['traits']
        );
    }

    public function testGeneratedS3OperationUsesTheKeyOnlyPath(): void
    {
        $files = (new AwsCodeGenerator(
            [
                'namespace' => 'Aws\\Generated\\Example',
                'outputDir' => '/tmp/aws-codegen-test'
            ],
            $this->model('S3')
        ))->generate();

        $operation = $this->content($files, 'DoThingOperation.php');
        self::assertStringContainsString(
            "'uri' => '/{Key+}?x-id=DoThing'",
            $operation
        );
        self::assertStringNotContainsString('{Bucket}', $operation);

        $config = $this->content($files, 'S3ClientConfig.php');
        self::assertStringContainsString(
            'new S3AddressingPlugin(false, false),',
            $config
        );
        self::assertStringContainsString(
            'new S3UseArnRegionPlugin(null)',
            $config
        );
    }

    public function testOtherServicesKeepTheirOperationUris(): void
    {
        $files = (new AwsCodeGenerator(
            [
                'namespace' => 'Aws\\Generated\\Example',
                'outputDir' => '/tmp/aws-codegen-test'
            ],
            $this->model('Example')
        ))->generate();

        self::assertStringContainsString(
            "'uri' => '/{Bucket}/{Key+}?x-id=DoThing'",
            $this->content($files, 'DoThingOperation.php')
        );
    }

    /**
     * Build the shared AWS fixture as a REST-XML service with bucket labels.
     */
    private function model(string $sdkId): SmithyModel
    {
        $data = \json_decode(
            (string) \file_get_contents(
                __DIR__ . '/fixtures/aws-query-model.json'
            ),
            true,
            512,
            \JSON_THROW_ON_ERROR
        );
        $service = &$data['shapes']['example.aws#ExampleService'];
        $service['traits']['aws.api#service']['sdkId'] = $sdkId;
        unset($service['traits']['aws.protocols#awsQuery']);
        $service['traits']['aws.protocols#restXml'] = [];
        unset($service);

        $data['shapes']['example.aws#DoThing']['traits']['smithy.api#http'] = [
            'method' => 'GET',
            'uri' => '/{Bucket}/{Key+}?x-id=DoThing',
            'code' => 200
        ];
        $label = [
            'target' => 'smithy.api#String',
            'traits' => [
                'smithy.api#httpLabel' => [],
                'smithy.api#required' => []
            ]
        ];
        $data['shapes']['example.aws#DoThingInput']['members']['Bucket'] = $label;
        $data['shapes']['example.aws#DoThingInput']['members']['Key'] = $label;

        return SmithyModel::fromArray($data);
    }

    /**
     * @param list<GeneratedFile> $files
     */
    private function content(array $files, string $basename): string
    {
        foreach ($files as $file) {
            if (\basename($file->path) === $basename) {
                return $file->content;
            }
        }

        self::fail("Missing generated file {$basename}");
    }
}
