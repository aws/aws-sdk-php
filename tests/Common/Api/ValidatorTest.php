<?php
namespace Aws\Test\Common\Api;

use Aws\Common\Api\Shape;
use Aws\Common\Api\ShapeMap;
use Aws\Common\Api\Validator;
use GuzzleHttp\Stream\Stream;

/**
 * @covers Aws\Common\Api\Validator
 */
class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function validationProvider()
    {
        return [
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'string']]
                ],
                [],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'required' => ['foo'],
                    'members' => ['foo' => ['type' => 'string']]
                ],
                [],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] is missing and is a required parameter"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'string']]
                ],
                ['foo' => [1]],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be a string or an object that implements __toString(). array given"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'string']]
                ],
                ['foo' => false],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be a string or an object that implements __toString(). boolean given"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'boolean']]
                ],
                ['foo' => false],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'boolean']]
                ],
                ['foo' => true],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'boolean']]
                ],
                ['foo' => 1],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be a boolean. integer given"
            ],
            // must be lax when validating numbers
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'integer']]
                ],
                ['foo' => '1'],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'integer']]
                ],
                ['foo' => 1],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'integer']]
                ],
                ['foo' => 'abc'],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be numeric. string given"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'float']]
                ],
                ['foo' => 1.2],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'long']]
                ],
                ['foo' => 1000],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'character']]
                ],
                ['foo' => 'a'],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'character']]
                ],
                ['foo' => 1],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'structure']]
                ],
                ['foo' => false],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an associative array. boolean given"
            ],
            // Ensures the array is associative
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'structure']]
                ],
                ['foo' => [1, 3]],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an associative array. array given"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'list',
                            'member' => ['type' => 'string']
                        ]
                    ]
                ],
                ['foo' => [1, 3]],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'list',
                            'member' => ['type' => 'string']
                        ]
                    ]
                ],
                ['foo' => ['a' => 'b']],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'list',
                            'member' => ['type' => 'string']
                        ]
                    ]
                ],
                ['foo' => 'abc'],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an array. string given"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'map',
                            'key' => ['type' => 'string'],
                            'value' => ['type' => 'string']
                        ]
                    ]
                ],
                ['foo' => 'abc'],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an associative array. string given"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'map',
                            'key' => ['type' => 'string'],
                            'value' => ['type' => 'string']
                        ]
                    ]
                ],
                ['foo' => ['abc']],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an associative array. array given"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'map',
                            'key' => ['type' => 'string'],
                            'value' => ['type' => 'string']
                        ]
                    ]
                ],
                ['foo' => ['abc' => '123']],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'map',
                            'key' => ['type' => 'string'],
                            'value' => [
                                'type' => 'structure',
                                'required' => 'foo',
                                'members' => [
                                    'foo' => ['type' => 'string']
                                ]
                            ]
                        ]
                    ]
                ],
                ['foo' => ['abc' => '123']],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo][abc] must be an associative array. string given"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'map',
                            'key' => ['type' => 'string'],
                            'value' => [
                                'type' => 'structure',
                                'required' => ['foo'],
                                'members' => [
                                    'foo' => ['type' => 'string']
                                ]
                            ]
                        ]
                    ]
                ],
                ['foo' => ['abc' => []]],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo][abc][foo] is missing and is a required parameter"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'blob']]
                ],
                ['foo' => []],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an fopen resource, a GuzzleHttp\\Stream\\StreamInterface object, or something that can be cast to a string. array given"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'blob']]
                ],
                ['foo' => true],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an fopen resource, a GuzzleHttp\\Stream\\StreamInterface object, or something that can be cast to a string. boolean given"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'blob']]
                ],
                ['foo' => fopen(__FILE__, 'r')],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'blob']]
                ],
                ['foo' => Stream::factory('test')],
                true
            ],
        ];
    }

    /**
     * @dataProvider validationProvider
     */
    public function testValidatesInput($shape, $input, $result)
    {
        $shape = Shape::create($shape, new ShapeMap([]));
        $validator = new Validator();

        try {
            $validator->validate('Foo', $shape, $input);
            if ($result !== true) {
                $this->fail('Should have failed with ' . $result);
            }
        } catch (\InvalidArgumentException $e) {
            if ($result === true) {
                throw $e;
            } else {
                $this->assertEquals($result, $e->getMessage());
            }
        }
    }
}
