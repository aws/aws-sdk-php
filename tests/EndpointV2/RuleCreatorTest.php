<?php
namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\Rule;
use Aws\Exception\UnresolvedEndpointException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\EndpointV2\Rule\RuleCreator
 */
class RuleCreatorTest extends TestCase
{
    public function ruleCreationProvider()
    {
        return [
            [
                [
                    'type' => "endpoint",
                    'conditions' => [],
                    'endpoint' => [
                        'url' => 'https://{Region}.someService.{PartitionResult#dnsSuffix}'
                    ],
                    'properties' => [],
                    'headers' => []
                ],
                Rule\EndpointRule::class
            ],
            [
                [
                    'type' => "error",
                    'conditions' => [],
                    'error' => 'This is an error'
                ],
                Rule\ErrorRule::class
            ],
            [
                [
                    'type' => "tree",
                    'conditions' => [],
                    'rules' => []
                ],
                Rule\TreeRule::class
            ]
        ];
    }

    /**
     * @dataProvider RuleCreationProvider
     */
    public function testRuleCreation($spec, $expected) {
        $result = Rule\RuleCreator::create($spec['type'], $spec);
        $this->assertInstanceOf($expected, $result);
    }

    public function invalidRuleTypeProvider()
    {
        return [
            ['foo'],
            [1],
            [null],
        ];
    }

    /**
     * @dataProvider invalidRuleTypeProvider
     */
    public function testThrowsExceptionForInvalidRuleType($input)
    {
        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage(
            'Unknown rule type ' . $input .
            ' must be of type `endpoint`, `tree` or `error`'
        );
        Rule\RuleCreator::create($input, null);
    }
}
