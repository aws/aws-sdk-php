<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Serializer\JsonBody;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Api\Serializer\JsonBody
 */
class JsonBodyTest extends TestCase
{
    use UsesServiceTrait;

    public function testUsesEmptyHashByDefault()
    {
        $j = new JsonBody(new Service([], function() { return []; }));
        $this->assertEquals(
            '{}',
            $j->build(new Shape([], new ShapeMap([])), [])
        );
    }

    public function formatProvider()
    {
        return [
            [['type' => 'string'], ['foo' => 'bar'], '{"foo":"bar"}'],
            [['type' => 'integer'], ['foo' => 1], '{"foo":1}'],
            [['type' => 'float'], ['foo' => 1], '{"foo":1}'],
            [['type' => 'double'], ['foo' => 1], '{"foo":1}'],
            // Test a blob is base64 encoded
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'blob']]
                ],
                ['foo' => 'a'],
                '{"foo":"' .  base64_encode('a') . '"}'
            ],
            // Structure with string
            [
                [
                    'type' => 'structure',
                    'members' => ['baz' => ['type' => 'string']]
                ],
                ['baz' => 'a'],
                '{"baz":"a"}'
            ],
            // Structure with missing element
            [
                [
                    'type' => 'structure',
                    'members' => ['baz' => ['type' => 'string']]
                ],
                ['bar' => 'a'],
                '{}'
            ],
            // Structure with missing element
            [
                [
                    'type' => 'structure',
                    'members' => ['baz' => ['type' => 'string']]
                ],
                ['bar' => 'a'],
                '{}'
            ],
            // Skips nulls
            [
                [
                    'type' => 'structure',
                    'members' => ['baz' => ['type' => 'string']]
                ],
                ['baz' => null],
                '{}'
            ],
            // Formats nested maps and structures
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'map',
                            'value' => [
                                'type' => 'structure',
                                'members' => ['a' => ['type' => 'blob']]
                            ]
                        ]
                    ]
                ],
                [
                    'foo' => [
                        'baz' => ['a' => 'a'],
                        'bar' => ['a' => 'b']
                    ]
                ],
                sprintf('{"foo":{"baz":{"a":"%s"},"bar":{"a":"%s"}}}',
                    base64_encode('a'), base64_encode('b'))
            ],
            // Formats lists
            [
                [
                    'type' => 'list',
                    'member' => ['type' => 'string']
                ],
                ['foo' => ['a', 'b']],
                '{"foo":["a","b"]}'
            ],
            // Formats timestamps
            [
                [
                    'type' => 'structure',
                    'members' => ['foo' => ['type' => 'timestamp']]
                ],
                ['foo' => 1397259637],
                '{"foo":1397259637}'
            ],
            // Formats nested structures, maps and lists which have no elements
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'structure',
                            'members' => [
                                'bar' => [
                                    'type' => 'string'
                                ]
                            ]
                        ],
                        'baz' => [
                            'type' => 'map',
                            'value' => ['type' => 'string']
                        ],
                        'foz' => [
                            'type' => 'list',
                            'member' => ['type' => 'string']
                        ]
                    ]
                ],
                ['foo' => [], 'baz' => [], 'foz' => []],
                '{"foo":{},"baz":{},"foz":[]}'
            ],
            // Formats nested structures which have invalid elements
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'structure',
                            'members' => [
                                'bar' => [
                                    'type' => 'string'
                                ]
                            ]
                        ]
                    ]
                ],
                ['foo' => ['baz' => 'is not a valid member']],
                '{"foo":{}}'
            ],
        ];
    }

    /**
     * @dataProvider formatProvider
     */
    public function testFormatsJson($def, $args, $result)
    {
        $j = new JsonBody(new Service([], function() { return []; }));
        $shape = Shape::create($def, new ShapeMap([]));
        $this->assertEquals($result, $j->build($shape, $args));
    }

    public function formatNoReferencesProvider()
    {
        return [
            // Formats nested maps and structures
            [
                [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'map',
                            'value' => [
                                'type' => 'structure',
                                'members' => ['a' => ['type' => 'blob']]
                            ]
                        ]
                    ]
                ],
                [
                    'foo' => [
                        'baz' => ['a' => 'a'],
                        'bar' => ['a' => 'b']
                    ]
                ],
                sprintf('{"foo":{"baz":{"a":"%s"},"bar":{"a":"%s"}}}',
                    base64_encode('a'), base64_encode('b'))
            ],
            // Formats lists
            [
                [
                    'type' => 'list',
                    'member' => ['type' => 'string']
                ],
                ['foo' => ['a', 'b']],
                '{"foo":["a","b"]}'
            ],
        ];
    }

    /**
     * @dataProvider formatNoReferencesProvider
     */
    public function testFormatsJsonDoesNotCreateReferences($def, $args, $result)
    {
        $j = new JsonBody(new Service([], function() { return []; }));
        $shape = Shape::create($def, new ShapeMap([]));
        $builtShape = $j->build($shape, $args);
        $this->assertEquals($result, $builtShape);
        $argsCopy = $args;
        $argsCopy['foo'] = 'test';
        $builtShape = $j->build($shape, $args);
        $this->assertEquals($result, $builtShape);
    }
}
