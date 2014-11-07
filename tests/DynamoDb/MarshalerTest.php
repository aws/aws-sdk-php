<?php
namespace Aws\Test\DynamoDb;

use Aws\DynamoDb\Marshaler;

/**
 * @covers \Aws\DynamoDb\Marshaler
 */
class MarshalerTest extends \PHPUnit_Framework_TestCase
{
    const ERROR = 'ERROR';

    /**
     * @dataProvider getMarshalValueUseCases
     */
    public function testMarshalValueUseCases($value, $expectedResult)
    {
        try {
            $actualResult = (new Marshaler)->marshalValue($value);
        } catch (\UnexpectedValueException $e) {
            $actualResult = self::ERROR;
        }
        $this->assertSame($expectedResult, $actualResult);
    }

    public function getMarshalValueUseCases()
    {
        return [
            // "S"
            ['S', ['S' => 'S']],
            ['3', ['S' => '3']],
            ['', self::ERROR],

            // "N"
            [1, ['N' => '1']],
            [-1, ['N' => '-1']],
            [0, ['N' => '0']],
            [5000000000, ['N' => '5000000000']],
            [1.23, ['N' => '1.23']],
            [1e10, ['N' => '10000000000']],

            // "BOOL" & "NULL"
            [true, ['BOOL' => true]],
            [false, ['BOOL' => false]],
            [null, ['NULL' => true]],

            // "L"
            [ // Homogeneous
                [1, 2, 3],
                ['L' => [
                    ['N' => '1'],
                    ['N' => '2'],
                    ['N' => '3']
                ]]
            ],
            [ // Heterogeneous
                [1, 'one', true],
                ['L' => [
                    ['N' => '1'],
                    ['S' => 'one'],
                    ['BOOL' => true]
                ]]
            ],
            [ // Empty
                [],
                ['L' => []]
            ],
            [ // Traversable
                new \ArrayObject([1, 2, 3]),
                ['L' => [
                    ['N' => '1'],
                    ['N' => '2'],
                    ['N' => '3']
                ]]
            ],

            // "M"
            [ // Associative array
                ['foo' => 'foo', 'bar' => 3, 'baz' => null],
                ['M' => [
                    'foo' => ['S' => 'foo'],
                    'bar' => ['N' => '3'],
                    'baz' => ['NULL' => true]
                ]]
            ],
            [ // Object
                json_decode('{"foo":"foo","bar":3,"baz":null}'),
                ['M' => [
                    'foo' => ['S' => 'foo'],
                    'bar' => ['N' => '3'],
                    'baz' => ['NULL' => true]
                ]]
            ],
            [ // Includes indexes
                ['foo', 'bar', 'baz' => 'baz'],
                ['M' => [
                    '0' => ['S' => 'foo'],
                    '1' => ['S' => 'bar'],
                    'baz' => ['S' => 'baz'],
                ]]
            ],
            [ // Empty
                new \stdClass,
                ['M' => []]
            ],
            [ // Traversable
                new \ArrayObject(['foo' => 'foo', 'bar' => 3, 'baz' => null]),
                ['M' => [
                    'foo' => ['S' => 'foo'],
                    'bar' => ['N' => '3'],
                    'baz' => ['NULL' => true]
                ]]
            ],

            // Nested
            [
                [
                    'name' => [
                        'first' => 'james',
                        'middle' => ['michael', 'john'],
                        'last' => 'richardson',
                    ],
                    'colors' => [
                        ['red' => 0, 'green' => 255, 'blue' => 255],
                        ['red' => 255, 'green' => 0, 'blue' => 127],
                    ]
                ],
                ['M' => [
                    'name' => ['M' => [
                        'first' => ['S' => 'james'],
                        'middle' => ['L' => [
                            ['S' => 'michael'],
                            ['S' => 'john'],
                        ]],
                        'last' => ['S' => 'richardson'],
                    ]],
                    'colors' => ['L' => [
                        ['M' => [
                            'red' => ['N' => '0'],
                            'green' => ['N' => '255'],
                            'blue' => ['N' => '255'],
                        ]],
                        ['M' => [
                            'red' => ['N' => '255'],
                            'green' => ['N' => '0'],
                            'blue' => ['N' => '127'],
                        ]],
                    ]]
                ]]
            ],

            // Errors
            [new \SplFileInfo(__FILE__), self::ERROR],
            [fopen(__FILE__, 'r'), self::ERROR],
        ];
    }

    public function testMarshalingDocumentsAndItems()
    {
        $json = <<<JSON
{
    "str": "string",
    "num": 1,
    "bool": true,
    "null": null,
    "list":[1, 2, [3, 4]],
    "map":{"colors": ["red", "green", "blue"]}
}
JSON;

        $expected = [
            'str' => ['S' => 'string'],
            'num' => ['N' => '1'],
            'bool' => ['BOOL' => true],
            'null' => ['NULL' => true],
            'list' => ['L' => [
                ['N' => '1'],
                ['N' => '2'],
                ['L' => [
                    ['N' => '3'],
                    ['N' => '4'],
                ]],
            ]],
            'map' => ['M' => [
                'colors' => ['L' => [
                    ['S' => 'red'],
                    ['S' => 'green'],
                    ['S' => 'blue'],
                ]]
            ]],
        ];

        $this->assertEquals($expected, (new Marshaler)->marshalDocument($json));
    }

    public function testErrorIfMarshalingBadJsonDoc()
    {
        $this->setExpectedException('InvalidArgumentException');
        (new Marshaler)->marshalDocument('foo');
    }

    public function testUnmarshalDocumentSupportsAllDynamoDbTypes()
    {
        $item = [
            'S' => ['S' => 'S'],
            'N' => ['N' => '1'],
            'B' => ['B' => 'B'],
            'SS' => ['SS' => ['S', 'SS', 'SSS']],
            'NS' => ['NS' => ['1', '2', '3']],
            'BS' => ['BS' => ['B', 'BB', 'BBB']],
            'BOOL' => ['BOOL' => true],
            'NULL' => ['NULL' => true],
            'M' => ['M' => [
                'A' => ['S' => 'A'],
                'B' => ['N' => '1'],
                'C' => ['BOOL' => true],
            ]],
            'L' => ['L' => [
                ['S' => 'A'],
                ['N' => '1'],
                ['BOOL' => true],
            ]]
        ];

        $json = <<<JSON
{
    "S":"S",
    "N":1,
    "B":"B",
    "SS":["S","SS","SSS"],
    "NS":[1,2,3],
    "BS":["B","BB","BBB"],
    "BOOL":true,
    "NULL":null,
    "M":{"A":"A","B":1,"C":true},
    "L":["A",1,true]
}
JSON;

        $doc = (new Marshaler)->unmarshalDocument($item);
        $this->assertEquals(str_replace([" ", "\n"], '', $json), $doc);
    }

    public function testCanUnmarshalToObjectFormat()
    {
        $result = (new Marshaler)->unmarshalValue(
            ['M' => ['a' => ['S' => 'b']]],
            true
        );

        $this->assertInstanceOf('stdClass', $result);
        $this->assertEquals('b', $result->a);
    }

    public function testErrorIfUnmarshalingUnknownType()
    {
        $this->setExpectedException('UnexpectedValueException');
        $result = (new Marshaler)->unmarshalValue(['BOMB' => 'BOOM']);
    }
}
