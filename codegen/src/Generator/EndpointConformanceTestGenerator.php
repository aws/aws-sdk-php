<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen\Generator;

use Aws\Codegen\AwsCodegenIntegration;
use Smithy\Codegen\CodegenSettings;
use Smithy\Codegen\Generator\GeneratedFile;
use Smithy\Codegen\Model\SmithyModel;
use Smithy\Codegen\Writer\PhpCodeWriter;

/**
 * Generate endpoint conformance fixtures and PHPUnit test classes.
 */
final class EndpointConformanceTestGenerator
{
    private const ENDPOINT_BDD = 'smithy.rules#endpointBdd';
    private const ENDPOINT_TESTS = 'smithy.rules#endpointTests';

    public function __construct(
        private readonly SmithyModel $model,
        private readonly CodegenSettings $settings,
        private readonly string $testsOutputDir
    ) {}

    /**
     * @return list<GeneratedFile>
     */
    public function generate(string $serviceShapeId): array
    {
        $service = $this->model->getShape($serviceShapeId);
        if (($service['type'] ?? null) !== 'service') {
            throw new \InvalidArgumentException(
                "Shape {$serviceShapeId} is not a service"
            );
        }

        $traits = $service['traits'] ?? [];
        $endpointBdd = $traits[self::ENDPOINT_BDD] ?? null;
        $endpointTests = $traits[self::ENDPOINT_TESTS] ?? null;
        $testCases = \is_array($endpointTests)
            ? ($endpointTests['testCases'] ?? null)
            : null;
        if (!\is_array($endpointBdd)
            || !\is_array($testCases)
            || $testCases === []
        ) {
            return [];
        }

        $shortName = AwsCodegenIntegration::serviceShortName($this->settings);
        $directory = $this->testsOutputDir
            . \DIRECTORY_SEPARATOR
            . $shortName
            . \DIRECTORY_SEPARATOR
            . 'Endpoint';

        return [
            new GeneratedFile(
                $directory
                    . \DIRECTORY_SEPARATOR
                    . $shortName
                    . 'EndpointConformanceTest.php',
                $this->testClass($shortName)
            ),
            new GeneratedFile(
                $directory
                    . \DIRECTORY_SEPARATOR
                    . 'fixtures'
                    . \DIRECTORY_SEPARATOR
                    . 'endpoint-tests.php',
                $this->fixture($testCases)
            )
        ];
    }

    private function testClass(string $shortName): string
    {
        $namespace = 'Aws\\Tests\\Services\\' . $shortName . '\\Endpoint';
        $className = $shortName . 'EndpointConformanceTest';
        $bytecodeClass = $shortName . 'EndpointBytecode';
        $writer = new PhpCodeWriter($namespace);
        $writer->addImport(
            $this->settings->resolveEndpointNamespace()
                . '\\'
                . $bytecodeClass
        );
        $writer->addImport(
            'Aws\\Tests\\Core\\Endpoint\\EndpointConformanceTestCase'
        );
        $writer->addImport(
            'Smithy\\Client\\Endpoint\\Bytecode\\Bytecode'
        );
        $writer->writeDocBlock(['@generated Do not edit.']);
        $writer->writeLine(
            "final class {$className} extends EndpointConformanceTestCase"
        );
        $writer->openBlock('{');
        $writer->writeLine(
            'protected static function generatedBytecode(): Bytecode'
        );
        $writer->openBlock('{');
        $writer->writeLine("return {$bytecodeClass}::get();");
        $writer->closeBlock();
        $writer->writeLine();
        $writer->writeLine(
            'protected static function fixturePath(): string'
        );
        $writer->openBlock('{');
        $writer->writeLine(
            "return __DIR__ . '/fixtures/endpoint-tests.php';"
        );
        $writer->closeBlock();
        $writer->closeBlock();

        return $writer->toFileContent();
    }

    /**
     * @param list<array<string, mixed>> $testCases
     */
    private function fixture(array $testCases): string
    {
        $source = <<<'PHP'
<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

/**
 * @generated Do not edit.
 */

return (static function (): \Generator {
PHP;
        // A CRLF checkout must not leak into generated code.
        $source = \str_replace("\r\n", "\n", $source);

        foreach ($testCases as $index => $case) {
            $documentation = $case['documentation'] ?? "case {$index}";
            $name = \sprintf('%03d %s', $index, $documentation);
            $source .= "\n    yield "
                . PhpCodeWriter::exportLiteral($name)
                . ' => '
                . $this->exportValue($case, 1)
                . ';';
        }

        return $source . "\n})();\n";
    }

    private function exportValue(mixed $value, int $indentLevel): string
    {
        if (!\is_array($value)) {
            return PhpCodeWriter::exportLiteral($value);
        }
        if ($value === []) {
            return '[]';
        }

        $lines = ['['];
        $isList = \array_is_list($value);
        $lastKey = \array_key_last($value);
        foreach ($value as $key => $member) {
            $memberLines = \explode(
                "\n",
                $this->exportValue($member, $indentLevel + 1)
            );
            $prefix = $isList
                ? ''
                : PhpCodeWriter::exportLiteral($key) . ' => ';
            $lines[] = \str_repeat('    ', $indentLevel + 1)
                . $prefix
                . \array_shift($memberLines);
            foreach ($memberLines as $line) {
                $lines[] = $line;
            }
            if ($key !== $lastKey) {
                $lines[\array_key_last($lines)] .= ',';
            }
        }
        $lines[] = \str_repeat('    ', $indentLevel) . ']';

        return \implode("\n", $lines);
    }
}
