<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen;

use Aws\Codegen\Generator\EndpointConformanceTestGenerator;
use Aws\Codegen\Generator\S3ServiceExceptionCustomizer;
use Smithy\Codegen\CodeGenerator;
use Smithy\Codegen\CodegenSettings;
use Smithy\Codegen\Generator\GeneratedFile;
use Smithy\Codegen\Generator\GeneratedOutputPublisher;
use Smithy\Codegen\Model\SmithyModel;

/**
 * Add AWS SDK policy to the generic Smithy PHP generator.
 */
final class AwsCodeGenerator
{
    private readonly SmithyModel $model;
    private readonly CodegenSettings $settings;
    private readonly CodeGenerator $generator;
    private readonly ?EndpointConformanceTestGenerator $endpointConformanceTestGenerator;
    private readonly ?string $testsOutputDir;

    /**
     * @param array<string, mixed> $config Generic codegen configuration.
     */
    public function __construct(
        array $config,
        SmithyModel $model
    ) {
        $integration = new AwsCodegenIntegration($config);
        $this->generator = new CodeGenerator(
            $integration->createBaseSettings(),
            $model,
            [new S3CodegenIntegration(), $integration]
        );
        $this->model = $integration->getResolvedModel();
        $this->settings = $integration->getResolvedSettings();
        $testsOutputDir = $integration->getTestsOutputDir();
        $this->testsOutputDir = $testsOutputDir;
        $this->endpointConformanceTestGenerator = $testsOutputDir === null
            ? null
            : new EndpointConformanceTestGenerator(
                $this->model,
                $this->settings,
                $testsOutputDir
            );
    }

    public function getSettings(): CodegenSettings
    {
        return $this->settings;
    }

    /**
     * @return list<GeneratedFile>
     */
    public function generate(): array
    {
        $files = [
            ...$this->generateSources(),
            ...$this->generateEndpointConformanceTests()
        ];

        $this->assertUniquePaths($files);

        return $files;
    }

    public function generateAndWrite(): int
    {
        $sourceFiles = $this->generateSources();
        (new GeneratedOutputPublisher())->publish(
            $sourceFiles,
            $this->settings->outputDir
        );

        $testFiles = $this->generateEndpointConformanceTests();
        foreach ($testFiles as $file) {
            $file->writeToDisk($this->testsOutputDir);
        }

        return \count($sourceFiles) + \count($testFiles);
    }

    /**
     * @return list<GeneratedFile>
     */
    private function generateSources(): array
    {
        return (new S3ServiceExceptionCustomizer(
            $this->model,
            $this->settings
        ))->apply($this->generator->generate());
    }

    /**
     * @return list<GeneratedFile>
     */
    private function generateEndpointConformanceTests(): array
    {
        if ($this->endpointConformanceTestGenerator === null) {
            return [];
        }

        $files = [];
        foreach ($this->model->getServiceShapes() as $serviceId => $_) {
            \array_push(
                $files,
                ...$this->endpointConformanceTestGenerator->generate(
                    $serviceId
                )
            );
        }

        return $files;
    }

    /**
     * @param list<GeneratedFile> $files
     */
    private function assertUniquePaths(array $files): void
    {
        $paths = [];
        foreach ($files as $file) {
            if (isset($paths[$file->path])) {
                throw new \LogicException(
                    "Multiple generators emitted {$file->path}"
                );
            }
            $paths[$file->path] = true;
        }
    }
}
