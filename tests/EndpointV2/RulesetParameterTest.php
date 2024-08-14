<?php
namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\Ruleset\RulesetParameter;
use Aws\Exception\UnresolvedEndpointException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\EndpointV2\Ruleset\RulesetParameter
 */
class RulesetParameterTest extends TestCase
{
    public function wrongParameterTypeProvider()
    {
        return [
            [true],
            [null],
            [1]
        ];
    }

    /**
     * @dataProvider wrongParameterTypeProvider
     *
     * @param $inputParameter
     */
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
        $this->expectWarning();
        $this->expectExceptionMessage(
            'Region has been deprecated since then. There is a new parameter.'
        );
        $parameter = new RulesetParameter('Region', [
            "type" => "string",
            "builtIn" => "AWS::Region",
            "deprecated" => [
                "since" => 'then',
                "message" => 'There is a new parameter.'
            ]
        ]);
        $parameter->validateInputParam('us-east-1');
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

    /**
     * @dataProvider validTypesProvider
     * @doesNotPerformAssertions
     */
    public function testRulesetCreationWithValidTypes($spec)
    {
        new RulesetParameter('FooParam', $spec);
    }

    public function validTypesProvider()
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
