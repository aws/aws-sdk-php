<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen\Tests\Generator;

use Aws\Codegen\Generator\S3ServiceExceptionCustomization;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Smithy\Codegen\CodegenSettings;
use Smithy\Codegen\Generator\GeneratedFile;
use Smithy\Codegen\Model\SmithyModel;
use Smithy\Codegen\ShapeCategory;

#[CoversClass(S3ServiceExceptionCustomization::class)]
final class S3ServiceExceptionCustomizationTest extends TestCase
{
    public function testLeavesFilesUnchangedForOtherServices(): void
    {
        $settings = $this->settings();
        $files = [
            new GeneratedFile(
                $this->exceptionPath($settings),
                $this->exceptionSource('S3Exception', ' {}')
            )
        ];

        self::assertSame(
            $files,
            (new S3ServiceExceptionCustomization(
                $this->model('Example'),
                $settings
            ))->apply($files)
        );
    }

    public function testAddsTheExtendedRequestIdToAnInlineEmptyBody(): void
    {
        $content = $this->customize(
            $this->exceptionSource('S3Exception', ' {}')
        );

        self::assertStringContainsString(
            "use Aws\\Core\\Exception\\AwsException;\n"
                . "use Smithy\\Protocol\\Aws\\AwsExtendedRequestIdInterface;\n",
            $content
        );
        self::assertStringContainsString(
            'class S3Exception extends AwsException implements '
                . "AwsExtendedRequestIdInterface\n{\n",
            $content
        );
        self::assertStringContainsString(
            'public function getExtendedRequestId(): ?string',
            $content
        );
        self::assertStringContainsString(
            'public function setExtendedRequestId(?string $extendedRequestId): void',
            $content
        );
        self::assertStringNotContainsString('{}', $content);
    }

    public function testAddsTheExtendedRequestIdToABodyOnItsOwnLine(): void
    {
        $content = $this->customize(
            $this->exceptionSource('S3Exception', "\n{}")
        );

        self::assertStringContainsString(
            'class S3Exception extends AwsException implements '
                . "AwsExtendedRequestIdInterface\n{\n",
            $content
        );
    }

    public function testKeepsExistingMembersAfterTheAccessors(): void
    {
        $content = $this->customize(
            $this->exceptionSource(
                'S3Exception',
                "\n{\n    public const EXISTING = true;\n}"
            )
        );

        self::assertStringContainsString(
            'class S3Exception extends AwsException implements '
                . "AwsExtendedRequestIdInterface\n{\n"
                . "    private ?string \$extendedRequestId = null;\n",
            $content
        );
        self::assertStringContainsString(
            "        \$this->extendedRequestId = \$extendedRequestId;\n"
                . "    }\n\n"
                . "    public const EXISTING = true;\n}\n",
            $content
        );
    }

    public function testLeavesOtherGeneratedFilesUnchanged(): void
    {
        $settings = $this->settings();
        $other = new GeneratedFile('/tmp/aws-codegen-test/Other.php', 'x');

        $files = (new S3ServiceExceptionCustomization(
            $this->model('S3'),
            $settings
        ))->apply([
            $other,
            new GeneratedFile(
                $this->exceptionPath($settings),
                $this->exceptionSource('S3Exception', ' {}')
            )
        ]);

        self::assertSame($other, $files[0]);
    }

    public function testRejectsAnExceptionWhoseClassDeclarationDoesNotMatch(): void
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Cannot customize the S3 service exception');

        $this->customize(
            $this->exceptionSource('S3Exception', " {\n    // body\n}")
        );
    }

    private function customize(string $source): string
    {
        $settings = $this->settings();
        $files = (new S3ServiceExceptionCustomization(
            $this->model('S3'),
            $settings
        ))->apply([
            new GeneratedFile($this->exceptionPath($settings), $source)
        ]);

        return $files[0]->content;
    }

    private function settings(): CodegenSettings
    {
        return CodegenSettings::fromArray([
            'namespace' => 'Aws\\Services\\S3',
            'outputDir' => '/tmp/aws-codegen-test',
            'serviceExceptionClass' => 'Aws\\Services\\S3\\Exception\\S3Exception'
        ]);
    }

    private function exceptionPath(CodegenSettings $settings): string
    {
        return $settings->resolveOutputDir(ShapeCategory::Error)
            . \DIRECTORY_SEPARATOR
            . 'S3Exception.php';
    }

    private function exceptionSource(string $className, string $body): string
    {
        return "<?php\n\nnamespace Aws\\Services\\S3\\Exception;\n\n"
            . "use Aws\\Core\\Exception\\AwsException;\n\n"
            . "class {$className} extends AwsException{$body}\n";
    }

    private function model(string $sdkId): SmithyModel
    {
        return SmithyModel::fromArray([
            'smithy' => '2.0',
            'shapes' => [
                'example.aws#ExampleService' => [
                    'type' => 'service',
                    'version' => '2024-01-01',
                    'traits' => [
                        'aws.api#service' => ['sdkId' => $sdkId]
                    ]
                ]
            ]
        ]);
    }
}
