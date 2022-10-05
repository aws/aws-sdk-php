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
    private $rulesetParameter;

    protected function set_up()
    {
        $spec = [
            "type" => "string",
            "builtIn" => "AWS::Region",
            "deprecated" => [
                "since" => 'then',
                "message" => 'There is a new parameter.'
            ]
        ];
        $this->rulesetParameter = new RulesetParameter('Region' ,$spec);
    }

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

        $this->rulesetParameter->validateInputParam($inputParameter);
    }

    public function testDeprecatedParameterLogsError()
    {
        $this->expectWarning();
        $this->expectExceptionMessage(
            'Region has been deprecated since then. There is a new parameter.'
        );
        $this->rulesetParameter->validateInputParam('us-east-1');
    }

    public function testUnknownTypeThrowsException() {
        $parameterSpec = [
            'type' => 'tuple'
        ];
        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage(
            'Unknown parameter type `Tuple`. ' .
                'Parameters must be of type `String` or `Boolean`.'
        );

        $rulesetParameter = new RulesetParameter('invalidType', $parameterSpec);
    }
}
