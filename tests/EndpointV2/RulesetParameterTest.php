<?php
namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\Ruleset\RulesetParameter;
use Aws\Exception\UnresolvedEndpointException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use PHPUnit\Framework\TestCase;

#[CoversClass(RulesetParameter::class)]
class RulesetParameterTest extends TestCase
{
    public static function wrongParameterTypeProvider(): array
    {
        return [
            [true],
            [null],
            [1]
        ];
    }

    #[DataProvider('wrongParameterTypeProvider')]
    public function testWrongParameterTypeThrowsException($inputParameter)
    {
        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage(
            "Input parameter `Region` is the wrong type. Must be a String."
        );

        $parameter = $this->createTestParameter('Region', [
            "type" => "string",
            "builtIn" => "AWS::Region"
        ]);
        $parameter->validateInputParam($inputParameter);
    }

    public function testDeprecatedParameterLogsError()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(
            'Region has been deprecated since then. There is a new parameter.'
        );

        set_error_handler(function ($errno, $errstr) {
            throw new \RuntimeException($errstr, $errno);
        });
        try {
            $parameter = new RulesetParameter('Region', [
                "type" => "string",
                "builtIn" => "AWS::Region",
                "deprecated" => [
                    "since" => 'then',
                    "message" => 'There is a new parameter.'
                ]
            ]);
            $parameter->validateInputParam('us-east-1');
        } finally {
            restore_error_handler();
        }
    }

    public function testUnknownTypeThrowsException()
    {
        $parameterSpec = [
            'type' => 'tuple'
        ];
        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage(
            'Unknown parameter type `Tuple`. ' .
                'Parameters must be of type `String`, `Boolean` or `StringArray.'
        );

        $rulesetParameter = new RulesetParameter('invalidType', $parameterSpec);
    }

    public function testGetDefault()
    {
        $spec = [
            "type" => "stringArray",
            "default" => ['foo', 'bar']
        ];
        $ruleset = new RulesetParameter('FooStringArray', $spec);
        $this->assertSame($spec['default'], $ruleset->getDefault());
    }

    #[DataProvider('validTypesProvider')]
    #[DoesNotPerformAssertions]
    public function testRulesetCreationWithValidTypes($spec)
    {
        new RulesetParameter('FooParam', $spec);
    }

    public static function validTypesProvider(): array
    {
        return [
            [
                ["type" => "string",]
            ],
            [
                ["type" => "boolean",]
            ],
            [
                ["type" => "stringArray",]
            ],
        ];
    }

    private function createTestParameter($name, $spec)
    {
        return new RulesetParameter($name, $spec);
    }
}
