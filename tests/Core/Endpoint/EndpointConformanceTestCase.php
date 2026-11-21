<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Endpoint;

use Aws\Core\Endpoint\Bytecode\AwsOpcodeHandler;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Client\Endpoint\Bytecode\{
    Bytecode,
    Evaluator,
    RulesEvaluationException
};

abstract class EndpointConformanceTestCase extends TestCase
{
    /** @var array<class-string, Evaluator> */
    private static array $generatedEvaluators = [];

    /**
     * @return iterable<string, array{
     *     array<string, mixed>|null,
     *     array<string, mixed>|null
     * }>
     */
    public static function endpointCases(): iterable
    {
        if (!\is_file(static::fixturePath())) {
            yield 'endpoint fixtures unavailable' => [null, null];

            return;
        }

        $cases = require static::fixturePath();
        if (!\is_iterable($cases)) {
            throw new \RuntimeException(
                'Endpoint fixture must return an iterable'
            );
        }

        foreach ($cases as $name => $case) {
            yield $name => [
                $case['params'] ?? [],
                $case['expect'] ?? null
            ];
        }
    }

    /**
     * @param array<string, mixed>|null $params
     * @param array<string, mixed>|null $expected
     */
    #[DataProvider('endpointCases')]
    final public function testGeneratedBytecodeMatchesEndpointVector(
        ?array $params,
        ?array $expected
    ): void
    {
        if ($params === null || $expected === null) {
            self::markTestSkipped('Endpoint fixtures are unavailable.');
        }

        $evaluator = self::generatedEvaluator();
        if (isset($expected['error'])) {
            try {
                $evaluator->evaluate($params);
                self::fail('Endpoint evaluator did not return an error.');
            } catch (RulesEvaluationException $exception) {
                self::assertSame(
                    $expected['error'],
                    $exception->getMessage()
                );
            }

            return;
        }

        $endpoint = $evaluator->evaluate($params);
        self::assertSame(
            $expected['endpoint']['url'],
            $endpoint->url
        );
    }

    abstract protected static function generatedBytecode(): Bytecode;

    abstract protected static function fixturePath(): string;

    private static function generatedEvaluator(): Evaluator
    {
        $class = static::class;

        return self::$generatedEvaluators[$class] ??= new Evaluator(
            static::generatedBytecode(),
            new AwsOpcodeHandler()
        );
    }
}
