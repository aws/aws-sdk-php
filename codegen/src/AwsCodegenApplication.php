<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen;

use Smithy\Codegen\Model\SmithyModel;

/**
 * Run the AWS SDK for PHP code generator command.
 */
final class AwsCodegenApplication
{
    public const SUCCESS = 0;
    public const FAILURE = 1;
    public const INVALID_USAGE = 2;

    private const VALUE_OPTIONS = [
        'array-access',
        'array-serialization',
        'base-exception',
        'config',
        'namespace',
        'organization',
        'output',
        'service-exception',
        'tests-output'
    ];

    private const SHORT_OPTIONS = [
        'h' => 'help',
        'o' => 'output'
    ];

    /** @var resource */
    private $stdout;

    /** @var resource */
    private $stderr;

    /**
     * @param resource|null $stdout
     * @param resource|null $stderr
     */
    public function __construct(mixed $stdout = null, mixed $stderr = null)
    {
        if ($stdout !== null && !\is_resource($stdout)) {
            throw new \InvalidArgumentException(
                'stdout must be a stream resource'
            );
        }
        if ($stderr !== null && !\is_resource($stderr)) {
            throw new \InvalidArgumentException(
                'stderr must be a stream resource'
            );
        }

        $this->stdout = $stdout ?? STDOUT;
        $this->stderr = $stderr ?? STDERR;
    }

    /**
     * @param list<string> $argv
     */
    public function run(array $argv): int
    {
        try {
            $arguments = $this->parseArguments($argv);
            if (isset($arguments['options']['help'])) {
                $this->write($this->stdout, $this->usage());

                return self::SUCCESS;
            }

            $modelPath = $arguments['model'];
            $this->validateReadableFile($modelPath, 'Model');
            $config = $this->loadConfig($arguments['options']);
            $model = SmithyModel::fromFile($modelPath);
            try {
                $generator = new AwsCodeGenerator($config, $model);
            } catch (\TypeError $exception) {
                throw new \InvalidArgumentException(
                    'Configuration contains an invalid setting type',
                    0,
                    $exception
                );
            }
            $count = $generator->generateAndWrite();
            $this->write(
                $this->stdout,
                "Generated {$count} PHP file(s) in: "
                    . "{$generator->getSettings()->outputDir}\n"
            );

            return self::SUCCESS;
        } catch (\InvalidArgumentException $exception) {
            $this->write(
                $this->stderr,
                'Error: ' . $exception->getMessage() . "\n\n"
            );
            $this->write($this->stderr, $this->usage());

            return self::INVALID_USAGE;
        } catch (\Throwable $exception) {
            $this->write(
                $this->stderr,
                'Error: ' . $exception->getMessage() . "\n"
            );

            return self::FAILURE;
        }
    }

    /**
     * @param list<string> $argv
     * @return array{
     *     model: string,
     *     options: array<string, string|true>
     * }
     */
    private function parseArguments(array $argv): array
    {
        $options = [];
        $positionals = [];
        $endOfOptions = false;

        for ($index = 1, $count = \count($argv); $index < $count; $index++) {
            $argument = $argv[$index];
            if ($endOfOptions) {
                $positionals[] = $argument;
                continue;
            }
            if ($argument === '--') {
                $endOfOptions = true;
                continue;
            }
            if (\str_starts_with($argument, '--')) {
                $this->parseLongOption(
                    $argument,
                    $argv,
                    $index,
                    $options
                );
                continue;
            }
            if (\str_starts_with($argument, '-')) {
                $this->parseShortOption(
                    $argument,
                    $argv,
                    $index,
                    $options
                );
                continue;
            }

            $positionals[] = $argument;
        }

        if (isset($options['help'])) {
            return ['model' => '', 'options' => $options];
        }
        if (\count($positionals) !== 1) {
            throw new \InvalidArgumentException(
                'Exactly one model JSON file is required'
            );
        }

        return ['model' => $positionals[0], 'options' => $options];
    }

    /**
     * @param list<string> $argv
     * @param array<string, string|true> $options
     */
    private function parseLongOption(
        string $argument,
        array $argv,
        int &$index,
        array &$options
    ): void
    {
        $option = \substr($argument, 2);
        $value = null;
        if (\str_contains($option, '=')) {
            [$option, $value] = \explode('=', $option, 2);
        }
        if ($option === 'help') {
            if ($value !== null) {
                throw new \InvalidArgumentException(
                    '--help does not accept a value'
                );
            }
            $this->setOption($options, 'help', true);

            return;
        }
        if (!\in_array($option, self::VALUE_OPTIONS, true)) {
            throw new \InvalidArgumentException(
                "Unknown option: --{$option}"
            );
        }
        if ($value === null) {
            $value = $argv[++$index] ?? null;
            if ($value === null || \str_starts_with($value, '-')) {
                throw new \InvalidArgumentException(
                    "--{$option} requires a value"
                );
            }
        }
        if ($value === '') {
            throw new \InvalidArgumentException(
                "--{$option} requires a non-empty value"
            );
        }

        $this->setOption($options, $option, $value);
    }

    /**
     * @param list<string> $argv
     * @param array<string, string|true> $options
     */
    private function parseShortOption(
        string $argument,
        array $argv,
        int &$index,
        array &$options
    ): void
    {
        $shortName = \substr($argument, 1);
        $option = self::SHORT_OPTIONS[$shortName] ?? null;
        if ($option === null) {
            throw new \InvalidArgumentException(
                "Unknown option: -{$shortName}"
            );
        }
        if ($option === 'help') {
            $this->setOption($options, 'help', true);

            return;
        }

        $value = $argv[++$index] ?? null;
        if ($value === null || \str_starts_with($value, '-')) {
            throw new \InvalidArgumentException(
                "-{$shortName} requires a value"
            );
        }
        $this->setOption($options, $option, $value);
    }

    /**
     * @param array<string, string|true> $options
     */
    private function setOption(
        array &$options,
        string $name,
        string|true $value
    ): void
    {
        if (\array_key_exists($name, $options)) {
            throw new \InvalidArgumentException(
                "Option --{$name} may only be provided once"
            );
        }

        $options[$name] = $value;
    }

    /**
     * @param array<string, string|true> $options
     * @return array<string, mixed>
     */
    private function loadConfig(array $options): array
    {
        if (isset($options['config'])) {
            $directOptions = \array_diff_key(
                $options,
                ['config' => true, 'help' => true]
            );
            if ($directOptions !== []) {
                throw new \InvalidArgumentException(
                    '--config cannot be combined with direct settings'
                );
            }

            $configPath = (string) $options['config'];
            $this->validateReadableFile($configPath, 'Config');
            try {
                $config = \json_decode(
                    (string) \file_get_contents($configPath),
                    true,
                    512,
                    JSON_THROW_ON_ERROR
                );
            } catch (\JsonException $exception) {
                throw new \InvalidArgumentException(
                    'Config file contains invalid JSON: '
                        . $exception->getMessage(),
                    0,
                    $exception
                );
            }
            if (!\is_array($config) || \array_is_list($config)) {
                throw new \InvalidArgumentException(
                    'Config file must contain a JSON object'
                );
            }

            return $config;
        }

        $namespace = $options['namespace'] ?? null;
        $output = $options['output'] ?? null;
        if (!\is_string($namespace)) {
            throw new \InvalidArgumentException('--namespace is required');
        }
        if (!\is_string($output)) {
            throw new \InvalidArgumentException('--output is required');
        }

        $config = [
            'namespace' => $namespace,
            'outputDir' => $output,
            'organization' => $options['organization'] ?? 'categorized',
            'arrayAccess' => $this->parseArrayAccess(
                $options['array-access'] ?? null
            ),
            'arraySerialization' => $this->parseArraySerialization(
                $options['array-serialization'] ?? null
            ),
            'baseServiceException' => isset($options['base-exception'])
                ? (string) $options['base-exception']
                : null,
            'serviceExceptionClass' => isset($options['service-exception'])
                ? (string) $options['service-exception']
                : null
        ];
        if (isset($options['tests-output'])) {
            $config['testsOutputDir'] = (string) $options['tests-output'];
        }

        return $config;
    }

    /**
     * @return array{enabled: bool, categories: list<string>}
     */
    private function parseArrayAccess(string|true|null $value): array
    {
        if ($value === null) {
            return ['enabled' => false, 'categories' => ['output']];
        }

        return [
            'enabled' => true,
            'categories' => \array_map(
                'trim',
                \explode(',', (string) $value)
            )
        ];
    }

    /**
     * @return array{enabled: bool, categories: list<string>}
     */
    private function parseArraySerialization(
        string|true|null $value
    ): array
    {
        if ($value === null) {
            return ['enabled' => false, 'categories' => ['all']];
        }

        return [
            'enabled' => true,
            'categories' => \array_map(
                'trim',
                \explode(',', (string) $value)
            )
        ];
    }

    private function validateReadableFile(string $path, string $label): void
    {
        if (!\is_file($path)) {
            throw new \InvalidArgumentException(
                "{$label} file not found: {$path}"
            );
        }
        if (!\is_readable($path)) {
            throw new \InvalidArgumentException(
                "{$label} file is not readable: {$path}"
            );
        }
    }

    /**
     * @param resource $stream
     */
    private function write(mixed $stream, string $contents): void
    {
        if (\fwrite($stream, $contents) === false) {
            throw new \RuntimeException('Could not write command output');
        }
    }

    private function usage(): string
    {
        return <<<'USAGE'
AWS SDK for PHP Code Generator

Usage:
  aws-php-codegen <model.json> --namespace=<ns> --output=<dir>
  aws-php-codegen <model.json> --config=<config.json>

Options:
  --namespace=<ns>       Base PHP namespace
  --output=<dir>, -o     Output directory
  --organization=<org>   "categorized" or "flat"
  --array-access=<cats>  Comma-separated shape categories
  --array-serialization=<cats>
                         Add toArray/fromArray to shape categories
  --tests-output=<dir>   Endpoint conformance test output directory
  --base-exception=<fqcn>
                         Base exception for modeled errors
  --service-exception=<fqcn>
                         Service exception class to generate
  --config=<file>        JSON configuration file
  --help, -h             Show this help

USAGE;
    }
}
