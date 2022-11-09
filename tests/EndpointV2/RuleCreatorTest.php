<?php
namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\Rule\RuleCreator;
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
                'EndpointRule'
            ],
            [
                [
                    'type' => "error",
                    'conditions' => [],
                    'error' => 'This is an error'
                ],
                'ErrorRule'
            ],
            [
                [
                    'type' => "tree",
                    'conditions' => [],
                    'rules' => []
                ],
                'TreeRule'
            ]
        ];
    }

    /**
     * @dataProvider RuleCreationProvider
     */
    public function testRuleCreation($spec, $expected) {
        $result = RuleCreator::create($spec['type'], $spec);
        $this->assertInstanceOf('Aws\EndpointV2\Rule\\' . $expected, $result);
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
        RuleCreator::create($input, null);
    }
}
