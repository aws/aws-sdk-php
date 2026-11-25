<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen\Tests;

use Aws\Codegen\AwsCodegenIntegration;
use Aws\Core\Client\AbstractAwsClient;
use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\Client\AwsClientInterface;
use Aws\Core\Exception\AwsException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Codec\Xml\XmlCodec;
use Smithy\Codegen\CodeGenerator;
use Smithy\Codegen\CodegenSettings;
use Smithy\Codegen\Generator\GeneratedFile;
use Smithy\Codegen\Model\SmithyModel;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Http\Message\Response;
use Smithy\Protocol\Aws\AwsXmlErrorDeserializer;

#[CoversClass(AwsCodegenIntegration::class)]
final class AwsCodegenIntegrationTest extends TestCase
{
    public function testRunsAsAGenericCodegenIntegration(): void
    {
        $integration = new AwsCodegenIntegration();
        $files = $this->generate($integration, $this->model());

        self::assertSame(
            AbstractAwsClient::class,
            $integration->getResolvedSettings()->clientBaseClass
        );
        self::assertSame(
            AbstractAwsClientConfig::class,
            $integration->getResolvedSettings()->clientConfigClass
        );
        self::assertSame(
            AwsClientInterface::class,
            $integration->getResolvedSettings()->clientBaseInterface
        );
        self::assertStringContainsString(
            'extends AbstractAwsClientConfig',
            $this->content($files, 'ExampleClientConfig.php')
        );
    }

    public function testGivesTheServiceExceptionAnErrorFactory(): void
    {
        $files = $this->generate(new AwsCodegenIntegration(), $this->model());
        $content = $this->content($files, 'ExampleException.php');

        self::assertStringContainsString(
            "class ExampleException extends AwsException\n{\n",
            $content
        );
        self::assertStringContainsString(
            "    ): self\n    {\n        return new self(\n"
                . "            message: \$message,\n",
            $content
        );
    }

    public function testSkipsTheErrorFactoryForANonAwsBase(): void
    {
        $settings = new CodegenSettings(
            namespace: 'Aws\\Generated\\Example',
            outputDir: '/tmp/aws-codegen-test',
            baseServiceException: \RuntimeException::class
        );

        self::assertSame(
            [],
            (new AwsCodegenIntegration())->serviceExceptionMembers($settings)
        );
    }

    public function testUnmodeledErrorKeepsTheGeneratedServiceException(): void
    {
        $files = $this->generate(new AwsCodegenIntegration(), $this->model());
        $source = $this->content($files, 'ExampleException.php');
        \preg_match('/^namespace ([^;]+);/m', $source, $match);
        $serviceException = $match[1] . '\\ExampleException';
        if (!\class_exists($serviceException, false)) {
            eval(\substr($source, \strlen('<?php')));
        }
        $operation = $this->createStub(OperationInterface::class);
        $operation->method('getServiceExceptionClass')
            ->willReturn($serviceException);
        $operation->method('resolveErrorSchema')->willReturn(null);

        $error = (new AwsXmlErrorDeserializer(new XmlCodec()))->deserialize(
            $operation,
            new Response(400, [], '<ErrorResponse><Error><Code>NoSuchThing'
                . '</Code><Message>Nope</Message></Error>'
                . '<RequestId>req-1</RequestId></ErrorResponse>')
        );

        self::assertSame($serviceException, $error::class);
        self::assertInstanceOf(AwsException::class, $error);
        self::assertSame('NoSuchThing', $error->getAwsErrorCode());
        self::assertSame('req-1', $error->getAwsRequestId());
        self::assertSame(400, $error->getHttpStatusCode());
    }

    public function testSkipsTheClientConfigWhenDisabled(): void
    {
        $files = $this->generate(
            new AwsCodegenIntegration(['generateClientConfig' => false]),
            $this->model()
        );

        foreach ($files as $file) {
            self::assertStringEndsNotWith(
                'ExampleClientConfig.php',
                $file->path
            );
        }
    }

    public function testUsesTheJsonTargetPrefixForOperationTargets(): void
    {
        $data = $this->modelData();
        $service = &$data['shapes']['example.aws#ExampleService'];
        unset($service['traits']['aws.protocols#awsQuery']);
        $service['traits']['aws.protocols#awsJson1_1'] = [
            'targetPrefix' => 'ExamplePrefix'
        ];
        unset($service);

        $files = $this->generate(
            new AwsCodegenIntegration(),
            SmithyModel::fromArray($data)
        );

        self::assertStringContainsString(
            "public const TARGET = 'ExamplePrefix.DoThing';",
            $this->content($files, 'DoThingOperation.php')
        );
    }

    public function testRejectsTheRemovedOperationTraitPluginSetting(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'clientPluginsByOperationTrait is no longer supported'
        );

        new AwsCodegenIntegration(['clientPluginsByOperationTrait' => []]);
    }

    public function testRejectsBothSpellingsOfOneSetting(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Use either testsOutputDir or tests_output_dir, not both'
        );

        new AwsCodegenIntegration([
            'testsOutputDir' => '/tmp/a',
            'tests_output_dir' => '/tmp/b'
        ]);
    }

    public function testRejectsANonBooleanFlag(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('generateClientConfig must be a bool');

        new AwsCodegenIntegration(['generate_client_config' => 'yes']);
    }

    public function testReadsTheTestsOutputDirectoryFromEitherSpelling(): void
    {
        self::assertNull((new AwsCodegenIntegration())->getTestsOutputDir());
        self::assertSame(
            '/tmp/tests',
            (new AwsCodegenIntegration(['tests_output_dir' => '/tmp/tests']))
                ->getTestsOutputDir()
        );
    }

    public function testKeepsTheTestsOutputDirectoryOutOfBaseSettings(): void
    {
        $settings = (new AwsCodegenIntegration([
            'namespace' => 'Aws\\Example',
            'outputDir' => '/tmp/out',
            'testsOutputDir' => '/tmp/tests'
        ]))->createBaseSettings();

        self::assertSame('Aws\\Example', $settings->namespace);
        self::assertSame('/tmp/out', $settings->outputDir);
    }

    public function testResolvedStateIsUnavailableBeforeGeneration(): void
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage(
            'AWS codegen integration has not processed a model'
        );

        (new AwsCodegenIntegration())->getResolvedModel();
    }

    /**
     * @return array<string, array{string, string}>
     */
    public static function sdkIdClientNameProvider(): array
    {
        return [
            'single upper initialism stays' => ['S3', 'S3'],
            'all caps lowercased after first' => ['STS', 'Sts'],
            'already pascal preserved' => ['Lambda', 'Lambda'],
            'letters and digits' => ['EC2', 'Ec2'],
            'three letter acronym' => ['SSO', 'Sso'],
            'multi word acronym joins' => ['SSO OIDC', 'SsoOidc'],
            'spaced marketing name' => ['API Gateway', 'ApiGateway'],
            'mixed case words' => ['DynamoDB', 'Dynamodb'],
            'extra whitespace collapses' => ['  Foo   Bar ', 'FooBar']
        ];
    }

    #[DataProvider('sdkIdClientNameProvider')]
    public function testClientNameFromSdkIdAppliesOnePascalCaseTransform(
        string $sdkId,
        string $expected
    ): void
    {
        self::assertSame(
            $expected,
            AwsCodegenIntegration::clientNameFromSdkId($sdkId)
        );
    }

    public function testServiceShortNameUsesTheLastNamespaceSegment(): void
    {
        self::assertSame(
            'SsoOidc',
            AwsCodegenIntegration::serviceShortName(
                new CodegenSettings(
                    namespace: 'Aws\\Services\\SsoOidc',
                    outputDir: '/tmp/out'
                )
            )
        );
    }

    public function testServiceShortNameKeepsASingleSegmentNamespace(): void
    {
        self::assertSame(
            'Example',
            AwsCodegenIntegration::serviceShortName(
                new CodegenSettings(namespace: 'Example', outputDir: '/tmp/out')
            )
        );
    }

    /**
     * @return list<GeneratedFile>
     */
    private function generate(
        AwsCodegenIntegration $integration,
        SmithyModel $model
    ): array
    {
        return (new CodeGenerator(
            new CodegenSettings(
                namespace: 'Aws\\Generated\\Example',
                outputDir: '/tmp/aws-codegen-test'
            ),
            $model,
            [$integration]
        ))->generate();
    }

    private function model(): SmithyModel
    {
        return SmithyModel::fromArray($this->modelData());
    }

    /**
     * @return array<string, mixed>
     */
    private function modelData(): array
    {
        return \json_decode(
            (string) \file_get_contents(
                __DIR__ . '/fixtures/aws-query-model.json'
            ),
            true,
            512,
            \JSON_THROW_ON_ERROR
        );
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

        self::fail("Generated file {$basename} was not found");
    }
}
