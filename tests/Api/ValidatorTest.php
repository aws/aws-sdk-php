<?php
namespace Aws\Test\Api;

use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use Aws\Api\Validator;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Api\Validator
 */
class ValidatorTest extends TestCase
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
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be a string or an object that implements __toString(). Found array(1)"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'string']]
                ],
                ['foo' => false],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be a string or an object that implements __toString(). Found bool(false)"
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
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be a boolean. Found int(1)"
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
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be numeric. Found string(3) \"abc\""
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
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an associative array. Found bool(false)"
            ],
            // Pasing array with jsonvalue trait
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'string',
                            'jsonvalue' => true
                        ]
                    ]
                ],
                ['foo' => ['a' => 'b']],
                true
            ],
            // Ensures the array is associative
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'structure']]
                ],
                ['foo' => [1, 3]],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an associative array. Found array(2)"
            ],
            // empty array must validate as an assoc array
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'structure']]
                ],
                ['foo' => []],
                true
            ],
            // non-contiguous numeric keys must validate as assoc
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'structure']]
                ],
                ['foo' => [0 => 'foo', 1 => 'bar', 5 => 'baz']],
                true
            ],
            // contiguous, but non-sequential numeric keys must validate as assoc
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'structure']]
                ],
                ['foo' => [2 => 'foo', 0 => 'bar', 1 => 'baz']],
                true
            ],
            // mixed numeric and string keys must validate as assoc
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'structure']]
                ],
                ['foo' => [1, 3, 'abc' => '123']],
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
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an array. Found string(3) \"abc\""
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
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an associative array. Found string(3) \"abc\""
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
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an associative array. Found array(1)"
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
                "Found 1 error while validating the input provided for the Foo operation:\n[foo][abc] must be an associative array. Found string(3) \"123\""
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
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an fopen resource, a GuzzleHttp\\Stream\\StreamInterface object, or something that can be cast to a string. Found array(0)"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'blob']]
                ],
                ['foo' => true],
                "Found 1 error while validating the input provided for the Foo operation:\n[foo] must be an fopen resource, a GuzzleHttp\\Stream\\StreamInterface object, or something that can be cast to a string. Found bool(true)"
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
                ['foo' => Psr7\stream_for('test')],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => [
                        'type' => 'string',
                        'min'  => 10,
                        'max'  => 1,
                    ]]
                ],
                ['foo' => 'bar'],
                "Found 2 errors while validating the input provided for the Foo operation:\n"
                . "[foo] expected string length to be >= 10, but found string length of 3\n"
                . "[foo] expected string length to be <= 1, but found string length of 3"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => [
                        'type' => 'integer',
                        'min'  => 10,
                        'max'  => 1,
                    ]]
                ],
                ['foo' => 3],
                "Found 2 errors while validating the input provided for the Foo operation:\n"
                . "[foo] expected numeric value to be >= 10, but found numeric value of 3\n"
                . "[foo] expected numeric value to be <= 1, but found numeric value of 3"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => [
                        'type' => 'list',
                        'member' => ['type' => 'string'],
                        'min'  => 10,
                        'max'  => 1,
                    ]]
                ],
                ['foo' => ['bar', 'baz']],
                "Found 2 errors while validating the input provided for the Foo operation:\n"
                . "[foo] expected list element count to be >= 10, but found list element count of 2\n"
                . "[foo] expected list element count to be <= 1, but found list element count of 2"
            ],
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'string']]
                ],
                ['foo' => new Stringable()],
                true
            ],
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'caps' => [
                            'type' => 'string',
                            'pattern' => '^[A-Z]+$'
                        ]
                    ]
                ],
                ['caps' => 'ABCd'],
                "Found 1 error while validating the input provided for the Foo operation:\n"
                . "[caps] Pattern /^[A-Z]+$/ failed to match 'ABCd'"
            ]
        ];
    }

    /**
     * @dataProvider validationProvider
     */
    public function testValidatesInput($shape, $input, $result)
    {
        $shape = Shape::create($shape, new ShapeMap([]));
        $validator = new Validator([
            'min'      => true,
            'required' => true,
            'max'      => true,
            'pattern'  => true,
        ]);

        try {
            $validator->validate('Foo', $shape, $input);
            if ($result !== true) {
                $this->fail('Should have failed with ' . $result);
            }
        } catch (\InvalidArgumentException $e) {
            if ($result === true) {
                throw $e;
            }

            $this->assertEquals($result, $e->getMessage());
        }
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage expected string length to be >= 1, but found string length of 0
     */
    public function testValidatesMinByDefault()
    {
        $shape = Shape::create(
            [
                'type' => 'structure',
                'members' => ['foo' => ['type' => 'string', 'min' => 1]]
            ],
            new ShapeMap([])
        );
        $validator = new Validator();
        $validator->validate('Foo', $shape, ['foo' => '']);
    }

    public function testDoesNotValidateMaxByDefault()
    {
        $shape = Shape::create(
            [
                'type' => 'structure',
                'members' => ['foo' => ['type' => 'string', 'max' => 5]]
            ],
            new ShapeMap([])
        );
        $validator = new Validator();
        $validator->validate('Foo', $shape, ['foo' => '1234567890']);
    }

    public function testDoesNotValidatePatternsByDefault()
    {
        $validator = new Validator();
        $shape = Shape::create(
            [
                'type' => 'structure',
                'members' => [
                    'caps' => [
                        'type' => 'string',
                        'pattern' => '^[A-Z]+$'
                    ]
                ]
            ],
            new ShapeMap([])
        );
        $validator->validate('Foo', $shape, ['caps' => 'abc']);
    }

    public function testCanDisableRequiredTrait()
    {
        $validator = new Validator(['required' => false]);
        $shape = Shape::create(
            [
                'type' => 'structure',
                'required' => ['value'],
                'members' => ['value' => ['type' => 'string']]
            ],
            new ShapeMap([])
        );
        $validator->validate('Foo', $shape, []);
    }
}
