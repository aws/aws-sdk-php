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

    public function testUsesEmptyHashByDefault(): void
    {
        $j = new JsonBody(new Service([], function() { return []; }));
        $this->assertSame(
            '{}',
            $j->build(new Shape([], new ShapeMap([])), [])
        );
    }

    public function formatProvider()
    {
        yield [['type' => 'string'], ['foo' => 'bar'], '{"foo":"bar"}'];
        yield [['type' => 'integer'], ['foo' => 1], '{"foo":1}'];
        yield [['type' => 'float'], ['foo' => 1], '{"foo":1}'];
        yield [['type' => 'double'], ['foo' => 1], '{"foo":1}'];
        yield 'Test a blob is base64 encoded' => [
            [
                'type' => 'structure',
                'members' => ['foo' => ['type' => 'blob']]
            ],
            ['foo' => 'a'],
            '{"foo":"' .  base64_encode('a') . '"}'
        ];
        yield 'Structure with string' => [
            [
                'type' => 'structure',
                'members' => ['baz' => ['type' => 'string']]
            ],
            ['baz' => 'a'],
            '{"baz":"a"}'
        ];
        yield 'Structure with missing element' => [
            [
                'type' => 'structure',
                'members' => ['baz' => ['type' => 'string']]
            ],
            ['bar' => 'a'],
            '{}'
        ];
        yield 'Skips nulls' => [
            [
                'type' => 'structure',
                'members' => ['baz' => ['type' => 'string']]
            ],
            ['baz' => null],
            '{}'
        ];
        yield 'Formats nested maps and structures' => [
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
        ];
        yield 'Formats lists' => [
            [
                'type' => 'list',
                'member' => ['type' => 'string']
            ],
            ['foo' => ['a', 'b']],
            '{"foo":["a","b"]}'
        ];
        yield 'Formats timestamps' => [
            [
                'type' => 'structure',
                'members' => ['foo' => ['type' => 'timestamp']]
            ],
            ['foo' => 1397259637],
            '{"foo":1397259637}'
        ];
        yield 'Formats nested structures, maps and lists which have no elements' => [
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
        ];
        yield 'Formats nested structures which have invalid elements' => [
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
        ];
    }

    /**
     * @dataProvider formatProvider
     */
    public function testFormatsJson(array $def, array $args, string $result): void
    {
        $j = new JsonBody(new Service([], function() { return []; }));
        $shape = Shape::create($def, new ShapeMap([]));
        $this->assertEquals($result, $j->build($shape, $args));
    }

    public function formatNoReferencesProvider(): iterable
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
    public function testFormatsJsonDoesNotCreateReferences(
        array $def,
        array $args,
        string $result
    ): void
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

    /**
     * @param string|array $args
     * @param string $expected
     *
     * @return void
     * @dataProvider buildsDocTypesProvider
     */
    public function testBuildsDocTypes(string|array $args, string $expected): void
    {
        $j = new JsonBody(new Service([], function() { return []; }));
        $shape = Shape::create(
            [
                'type' => 'structure',
                'members' => [],
                'document' => true,
            ]
            , new ShapeMap([])
        );
        $builtShape = $j->build($shape, $args);
        $this->assertEquals($expected, $builtShape);
    }

    public function buildsDocTypesProvider(): iterable
    {
        return [
            ['hello', '"hello"'],
            [['foo' => 'bar'], '{"foo":"bar"}']
        ];
    }
}
