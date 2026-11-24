<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen\Tests;

use Aws\Codegen\AwsCodeGenerator;
use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\Client\AwsClientInterface;
use PHPUnit\Framework\TestCase;
use Smithy\Codegen\Generator\GeneratedFile;
use Smithy\Codegen\Model\SmithyModel;

/**
 * Verify AWS policy is applied around the generic generator.
 */
final class AwsCodeGeneratorTest extends TestCase
{
    private string $outputDirectory;

    protected function setUp(): void
    {
        $this->outputDirectory = \sys_get_temp_dir()
            . '/aws-codegen-driver-'
            . \bin2hex(\random_bytes(8));
    }

    protected function tearDown(): void
    {
        if (\is_dir($this->outputDirectory)) {
            self::fail(
                'A failed generation unexpectedly created its output directory'
            );
        }
    }

    public function testGeneratesAwsRuntimeAndOperationMetadata(): void
    {
        $generator = new AwsCodeGenerator(
            [
                'namespace' => 'Aws\\Generated\\Example',
                'outputDir' => '/tmp/aws-codegen-test'
            ],
            $this->model()
        );

        $files = $generator->generate();

        $client = $this->content($files, 'ExampleClient.php');
        $clientInterface = $this->content(
            $files,
            'ExampleClientInterface.php'
        );
        $config = $this->content($files, 'ExampleClientConfig.php');
        $operation = $this->content($files, 'DoThingOperation.php');
        $error = $this->content($files, 'ExampleErrorException.php');

        self::assertStringContainsString(
            'extends AbstractAwsClient implements ExampleClientInterface',
            $client
        );
        self::assertStringContainsString(
            'use Aws\\Core\\Client\\AwsClientInterface;',
            $clientInterface
        );
        self::assertStringContainsString(
            'interface ExampleClientInterface extends AwsClientInterface',
            $clientInterface
        );
        self::assertStringContainsString(
            'public function doThing(',
            $clientInterface
        );
        self::assertStringNotContainsString(
            'FlexibleChecksumPlugin',
            $client
        );
        self::assertStringContainsString(
            'extends AbstractAwsClientConfig',
            $config
        );
        self::assertStringContainsString(
            "new AwsQueryProtocol('2024-01-01')",
            $config
        );
        self::assertStringContainsString(
            '?IdentityResolverInterface $tokenProvider = null',
            $config
        );
        self::assertStringContainsString(
            '?array $authSchemePreference = null',
            $config
        );
        self::assertStringContainsString(
            "public const TARGET = 'DoThing';",
            $operation
        );
        self::assertStringContainsString(
            "'aws.auth#sigv4'",
            $operation
        );
        self::assertStringNotContainsString(
            "'smithy.api#noAuth'",
            $operation
        );
        self::assertStringContainsString(
            "'Customized' => 'example.aws#ExampleError'",
            $operation
        );
        self::assertStringContainsString(
            '28 => [',
            $operation
        );
        self::assertStringContainsString(
            "'aws.protocols#httpChecksum' => [",
            $operation
        );
        self::assertStringContainsString(
            "'aws.auth#unsignedPayload' => []",
            $operation
        );
        self::assertStringContainsString(
            "public const AWS_QUERY_ERROR_CODE = 'Customized';",
            $error
        );
        self::assertFalse(
            $generator->getSettings()->generateClientConfig
        );
        self::assertSame(
            AbstractAwsClientConfig::class,
            $generator->getSettings()->clientConfigClass
        );
        self::assertSame(
            AwsClientInterface::class,
            $generator->getSettings()->clientBaseInterface
        );
        self::assertTrue(
            $generator->getSettings()->generateEndpointKeyBuilder
        );
        self::assertSame(
            'EC2',
            $generator->getSettings()->waiterResourceInitialisms['ec2']
        );
        self::assertSame(
            ['aws.auth#sigv4', 'aws.auth#sigv4a'],
            $generator->getSettings()->authSchemeIds
        );
        self::assertTrue(
            $generator->getSettings()->assumeAsciiEndpointStrings
        );
    }

    public function testEveryGeneratedPhpFileStartsWithTheLicenseHeader(): void
    {
        $generator = new AwsCodeGenerator(
            [
                'namespace' => 'Aws\\Generated\\Example',
                'outputDir' => '/tmp/aws-codegen-test',
                'testsOutputDir' => '/tmp/aws-codegen-tests'
            ],
            $this->model()
        );

        $files = $generator->generate();

        self::assertNotEmpty($files);
        foreach ($files as $file) {
            self::assertStringStartsWith(
                "<?php\n\n/*\n"
                    . " * Copyright Amazon.com, Inc. or its affiliates."
                    . " All Rights Reserved.\n"
                    . " * SPDX-License-Identifier: Apache-2.0\n"
                    . " */\n",
                $file->content,
                "{$file->path} has no license header"
            );
        }
    }

    public function testPreservesAwsMemberTraitsById(): void
    {
        $model = \json_decode(
            (string) \file_get_contents(
                __DIR__ . '/fixtures/aws-query-model.json'
            ),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        $model['shapes']['example.aws#DoThingInput']['members']['name'] = [
            'target' => 'smithy.api#String',
            'traits' => [
                'aws.protocols#ec2QueryName' => 'QueryName'
            ]
        ];
        $generator = new AwsCodeGenerator(
            [
                'namespace' => 'Aws\\Generated\\Example',
                'outputDir' => '/tmp/aws-codegen-test'
            ],
            SmithyModel::fromJson(
                \json_encode($model, JSON_THROW_ON_ERROR)
            )
        );

        $schemas = $this->content($generator->generate(), 'Schemas.php');

        self::assertStringContainsString(
            "traitsById: ['aws.protocols#ec2QueryName' => 'QueryName']",
            $schemas
        );
        self::assertStringContainsString(
            "directTraitsById: ['aws.protocols#ec2QueryName' => "
                . "'QueryName']",
            $schemas
        );
    }

    public function testGeneratesEndpointConformanceArtifacts(): void
    {
        $testsOutputDirectory = '/tmp/aws-codegen-tests';
        $generator = new AwsCodeGenerator(
            [
                'namespace' => 'Aws\\Generated\\Example',
                'outputDir' => '/tmp/aws-codegen-test',
                'testsOutputDir' => $testsOutputDirectory
            ],
            $this->model()
        );

        $files = $generator->generate();

        self::assertSame(
            $testsOutputDirectory
                . \str_replace(
                    '/',
                    \DIRECTORY_SEPARATOR,
                    '/Example/Endpoint/ExampleEndpointConformanceTest.php'
                ),
            $this->file(
                $files,
                'ExampleEndpointConformanceTest.php'
            )->path
        );
        self::assertSame(
            $testsOutputDirectory
                . \str_replace(
                    '/',
                    \DIRECTORY_SEPARATOR,
                    '/Example/Endpoint/fixtures/endpoint-tests.php'
                ),
            $this->file($files, 'endpoint-tests.php')->path
        );
    }

    public function testDoesNotWriteGenericFilesWhenAwsGenerationFails(): void
    {
        $model = \json_decode(
            (string) \file_get_contents(
                __DIR__ . '/fixtures/aws-query-model.json'
            ),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        unset(
            $model['shapes']['example.aws#ExampleService']['traits'][
                'aws.protocols#awsQuery'
            ]
        );

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'does not declare a supported protocol'
        );

        try {
            $generator = new AwsCodeGenerator(
                [
                    'namespace' => 'Aws\\Generated\\Example',
                    'outputDir' => $this->outputDirectory
                ],
                SmithyModel::fromJson(
                    \json_encode($model, JSON_THROW_ON_ERROR)
                )
            );
            $generator->generateAndWrite();
        } finally {
            self::assertDirectoryDoesNotExist($this->outputDirectory);
        }
    }

    public function testGenerateAndWriteRejectsDuplicatePathsBeforeWriting(): void
    {
        $data = \json_decode(
            (string) \file_get_contents(
                __DIR__ . '/fixtures/aws-query-model.json'
            ),
            true,
            512,
            \JSON_THROW_ON_ERROR
        );
        // Name the output shape after the conformance test so a flat
        // source tree and the tests tree emit the same file.
        $data['shapes']['example.aws#ExampleEndpointConformanceTest'] =
            $data['shapes']['example.aws#DoThingOutput'];
        unset($data['shapes']['example.aws#DoThingOutput']);
        $data['shapes']['example.aws#DoThing']['output']['target'] =
            'example.aws#ExampleEndpointConformanceTest';
        $endpointDirectory = $this->outputDirectory
            . \DIRECTORY_SEPARATOR
            . 'Example'
            . \DIRECTORY_SEPARATOR
            . 'Endpoint';
        $generator = new AwsCodeGenerator(
            [
                'namespace' => 'Aws\\Example',
                'outputDir' => $endpointDirectory,
                'organization' => 'flat',
                'testsOutputDir' => $this->outputDirectory
            ],
            SmithyModel::fromArray($data)
        );

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Multiple generators emitted');

        try {
            $generator->generateAndWrite();
        } finally {
            self::assertDirectoryDoesNotExist($this->outputDirectory);
        }
    }

    public function testAddsExtendedRequestIdToS3ServiceException(): void
    {
        $data = \json_decode(
            (string) \file_get_contents(
                __DIR__ . '/fixtures/aws-query-model.json'
            ),
            true,
            512,
            \JSON_THROW_ON_ERROR
        );
        foreach ($data['shapes'] as &$shape) {
            if (isset($shape['traits']['aws.api#service'])) {
                $shape['traits']['aws.api#service']['sdkId'] = 'S3';
            }
        }
        unset($shape);
        $settings = [
            'namespace' => 'Aws\\Generated\\Example',
            'outputDir' => '/tmp/aws-codegen-test'
        ];

        $s3 = $this->content(
            (new AwsCodeGenerator($settings, SmithyModel::fromArray($data)))
                ->generate(),
            'S3Exception.php'
        );
        $other = $this->content(
            (new AwsCodeGenerator($settings, $this->model()))->generate(),
            'ExampleException.php'
        );

        self::assertStringContainsString(
            'class S3Exception extends AwsException implements AwsExtendedRequestIdInterface',
            $s3
        );
        self::assertStringContainsString(
            'public function getExtendedRequestId(): ?string',
            $s3
        );
        self::assertStringContainsString(
            'public function setExtendedRequestId(?string $extendedRequestId): void',
            $s3
        );
        self::assertStringNotContainsString('ExtendedRequestId', $other);
    }

    public function testClientNamespaceIsDerivedFromSdkId(): void
    {
        $data = \json_decode(
            (string) \file_get_contents(
                __DIR__ . '/fixtures/aws-query-model.json'
            ),
            true,
            512,
            \JSON_THROW_ON_ERROR
        );
        foreach ($data['shapes'] as &$shape) {
            if (isset($shape['traits']['aws.api#service'])) {
                $shape['traits']['aws.api#service']['sdkId'] = 'SSO OIDC';
            }
        }
        unset($shape);

        $files = (new AwsCodeGenerator(
            [
                // The configured namespace segment is intentionally not the
                // sdkId transform; the integration must override it.
                'namespace' => 'Aws\\Services\\SSOOIDC',
                'outputDir' => '/tmp/aws-codegen-test'
            ],
            SmithyModel::fromArray($data)
        ))->generate();

        $client = $this->content($files, 'SsoOidcClient.php');
        self::assertStringContainsString('namespace Aws\\Services\\SsoOidc;', $client);
        self::assertStringContainsString(
            'final class SsoOidcClient extends AbstractAwsClient '
                . 'implements SsoOidcClientInterface',
            $client
        );
    }

    private function model(): SmithyModel
    {
        return SmithyModel::fromFile(
            __DIR__ . '/fixtures/aws-query-model.json'
        );
    }

    /**
     * @param list<GeneratedFile> $files
     */
    private function content(array $files, string $basename): string
    {
        return $this->file($files, $basename)->content;
    }

    /**
     * @param list<GeneratedFile> $files
     */
    private function file(
        array $files,
        string $basename
    ): GeneratedFile
    {
        foreach ($files as $file) {
            if (\basename($file->path) === $basename) {
                return $file;
            }
        }

        self::fail("Generated file {$basename} was not found");
    }
}
