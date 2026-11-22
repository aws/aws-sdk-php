<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen\Tests;

use Aws\Codegen\AwsCodegenApplication;
use PHPUnit\Framework\TestCase;

/**
 * Verify the AWS codegen command boundary.
 */
final class AwsCodegenApplicationTest extends TestCase
{
    private string $outputDirectory;

    protected function setUp(): void
    {
        $this->outputDirectory = \sys_get_temp_dir()
            . '/aws-codegen-'
            . \bin2hex(\random_bytes(8));
    }

    protected function tearDown(): void
    {
        $this->removeDirectory($this->outputDirectory);
    }

    public function testGeneratesFromDirectSettings(): void
    {
        [$application, $stdout, $stderr] = $this->application();

        $status = $application->run([
            'aws-php-codegen',
            __DIR__ . '/fixtures/aws-query-model.json',
            '--namespace=Aws\\Generated\\Example',
            '--output=' . $this->outputDirectory . '/src',
            '--tests-output=' . $this->outputDirectory . '/tests',
            '--array-access=output',
            '--array-serialization=all'
        ]);

        self::assertSame(AwsCodegenApplication::SUCCESS, $status);
        self::assertFileExists(
            $this->outputDirectory . '/src/ExampleClientConfig.php'
        );
        self::assertFileExists(
            $this->outputDirectory
                . '/tests/Example/Endpoint/'
                . 'ExampleEndpointConformanceTest.php'
        );
        self::assertFileExists(
            $this->outputDirectory
                . '/tests/Example/Endpoint/fixtures/endpoint-tests.php'
        );
        $output = (string) \file_get_contents(
            $this->outputDirectory . '/src/Output/DoThingOutput.php'
        );
        self::assertStringContainsString(
            'use Smithy\\Core\\Shape\\ReadonlyArrayAccessTrait;',
            $output
        );
        self::assertStringContainsString(
            'use Smithy\\Core\\Shape\\ArraySerializableTrait;',
            $output
        );
        $input = (string) \file_get_contents(
            $this->outputDirectory . '/src/Input/DoThingInput.php'
        );
        self::assertStringNotContainsString(
            'ReadonlyArrayAccessTrait',
            $input
        );
        self::assertStringContainsString(
            'use Smithy\\Core\\Shape\\ArraySerializableTrait;',
            $input
        );
        self::assertStringContainsString(
            'Generated ',
            $this->streamContents($stdout)
        );
        self::assertSame('', $this->streamContents($stderr));
    }

    public function testRejectsUnknownOptionWithoutWritingFiles(): void
    {
        [$application, $stdout, $stderr] = $this->application();

        $status = $application->run([
            'aws-php-codegen',
            __DIR__ . '/fixtures/aws-query-model.json',
            '--namespace=Aws\\Generated\\Example',
            '--output=' . $this->outputDirectory,
            '--unknown=value'
        ]);

        self::assertSame(AwsCodegenApplication::INVALID_USAGE, $status);
        self::assertDirectoryDoesNotExist($this->outputDirectory);
        self::assertSame('', $this->streamContents($stdout));
        self::assertStringContainsString(
            'Unknown option: --unknown',
            $this->streamContents($stderr)
        );
    }

    /**
     * @return array{
     *     AwsCodegenApplication,
     *     resource,
     *     resource
     * }
     */
    private function application(): array
    {
        $stdout = \fopen('php://memory', 'w+');
        $stderr = \fopen('php://memory', 'w+');
        self::assertIsResource($stdout);
        self::assertIsResource($stderr);

        return [
            new AwsCodegenApplication($stdout, $stderr),
            $stdout,
            $stderr
        ];
    }

    /**
     * @param resource $stream
     */
    private function streamContents(mixed $stream): string
    {
        \rewind($stream);

        return (string) \stream_get_contents($stream);
    }

    private function removeDirectory(string $directory): void
    {
        if (!\is_dir($directory)) {
            return;
        }
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $directory,
                \FilesystemIterator::SKIP_DOTS
            ),
            \RecursiveIteratorIterator::CHILD_FIRST
        );
        foreach ($iterator as $entry) {
            if ($entry->isDir()) {
                \rmdir($entry->getPathname());
            } else {
                \unlink($entry->getPathname());
            }
        }
        \rmdir($directory);
    }
}
