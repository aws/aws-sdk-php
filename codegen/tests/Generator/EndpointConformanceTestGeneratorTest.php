<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen\Tests\Generator;

use Aws\Codegen\Generator\EndpointConformanceTestGenerator;
use PHPUnit\Framework\TestCase;
use Smithy\Codegen\CodegenSettings;
use Smithy\Codegen\Generator\GeneratedFile;
use Smithy\Codegen\Model\SmithyModel;

final class EndpointConformanceTestGeneratorTest extends TestCase
{
    private string $testsOutputDirectory;

    protected function setUp(): void
    {
        $this->testsOutputDirectory = \sys_get_temp_dir()
            . '/aws-endpoint-tests-'
            . \bin2hex(\random_bytes(8));
    }

    protected function tearDown(): void
    {
        $this->removeDirectory($this->testsOutputDirectory);
    }

    public function testGeneratesFixtureAndTestClass(): void
    {
        $testCase = [
            'documentation' => 'resolves the regional endpoint',
            'expect' => [
                'endpoint' => [
                    'url' => 'https://us-east-1.example.com'
                ]
            ],
            'operationInputs' => [
                [
                    'operationName' => 'DoThing',
                    'operationParams' => ['name' => 'example']
                ]
            ],
            'params' => ['Region' => 'us-east-1']
        ];
        $generator = new EndpointConformanceTestGenerator(
            $this->model([$testCase]),
            new CodegenSettings(
                namespace: 'Aws\\Example',
                outputDir: '/tmp/aws-codegen-test'
            ),
            $this->testsOutputDirectory
        );

        $files = $generator->generate('example.aws#ExampleService');

        self::assertCount(2, $files);
        $test = $this->file($files, 'ExampleEndpointConformanceTest.php');
        $fixture = $this->file($files, 'endpoint-tests.php');
        self::assertStringContainsString(
            'namespace Aws\\Tests\\Services\\Example\\Endpoint;',
            $test->content
        );
        self::assertStringContainsString(
            'return ExampleEndpointBytecode::get();',
            $test->content
        );
        self::assertStringContainsString(
            "return __DIR__ . '/fixtures/endpoint-tests.php';",
            $test->content
        );

        $fixture->writeToDisk();
        $cases = require $fixture->path;
        self::assertInstanceOf(\Generator::class, $cases);
        self::assertSame(
            ['000 resolves the regional endpoint' => $testCase],
            \iterator_to_array($cases)
        );
    }

    public function testSkipsServicesWithoutBothEndpointTraits(): void
    {
        $generator = new EndpointConformanceTestGenerator(
            $this->model([]),
            new CodegenSettings(
                namespace: 'Aws\\Example',
                outputDir: '/tmp/aws-codegen-test'
            ),
            $this->testsOutputDirectory
        );

        self::assertSame(
            [],
            $generator->generate('example.aws#ExampleService')
        );
    }

    /**
     * @param list<array<string, mixed>> $testCases
     */
    private function model(array $testCases): SmithyModel
    {
        $traits = [
            'smithy.rules#endpointBdd' => []
        ];
        if ($testCases !== []) {
            $traits['smithy.rules#endpointTests'] = [
                'testCases' => $testCases
            ];
        }

        return SmithyModel::fromJson(\json_encode([
            'smithy' => '2.0',
            'shapes' => [
                'example.aws#ExampleService' => [
                    'type' => 'service',
                    'version' => '2026-09-03',
                    'operations' => [],
                    'traits' => $traits
                ]
            ]
        ], JSON_THROW_ON_ERROR));
    }

    /**
     * @param list<GeneratedFile> $files
     */
    private function file(array $files, string $basename): GeneratedFile
    {
        foreach ($files as $file) {
            if (\basename($file->path) === $basename) {
                return $file;
            }
        }

        self::fail("Generated file {$basename} was not found");
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
