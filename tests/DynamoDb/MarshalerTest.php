<?php
namespace Aws\Test\DynamoDb;

use Aws\DynamoDb\Marshaler;
use Aws\DynamoDb\BinaryValue;
use Aws\DynamoDb\NumberValue;
use Aws\DynamoDb\SetValue;
use GuzzleHttp\Psr7;

/**
 * @covers Aws\DynamoDb\Marshaler
 */
class MarshalerTest extends \PHPUnit_Framework_TestCase
{
    const ERROR = 'ERROR';

    /**
     * @dataProvider getMarshalValueUseCases
     */
    public function testMarshalValueUseCases($value, $expectedResult, $options = [])
    {
        $m = new Marshaler($options);
        try {
            $actualResult = $m->marshalValue($value);
        } catch (\UnexpectedValueException $e) {
            $actualResult = self::ERROR;
        }
        $this->assertSame($expectedResult, $actualResult);
    }

    public function getMarshalValueUseCases()
    {
        $m = new Marshaler;

        $resource = fopen('php://temp', 'w+');
        fwrite($resource, 'foo');
        fseek($resource, 0);

        return [
            // "S"
            ['S', ['S' => 'S']],
            ['3', ['S' => '3']],
            ['', ['NULL' => true], ['nullify_invalid' => true]],

            // "N"
            [1, ['N' => '1']],
            [-1, ['N' => '-1']],
            [0, ['N' => '0']],
            [5000000000, ['N' => '5000000000']],
            [1.23, ['N' => '1.23']],
            [1e10, ['N' => '10000000000']],
            [$m->number('9999999999999999'), ['N' => '9999999999999999']],
            [$m->number(20), ['N' => '20']],

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

            // Binary
            [$m->binary('foo'), ['B' => 'foo']],
            [$resource, ['B' => 'foo']],
            [Psr7\stream_for('foo'), ['B' => 'foo']],

            // Set
            [$m->set(['a', 'b', 'c']), ['SS' => ['a', 'b', 'c']]],
            [$m->set([1, 2, 3]), ['NS' => ['1', '2', '3']]],
            [
                $m->set([$m->binary('a'), $m->binary('b'), $m->binary('c')]),
                ['BS' => ['a', 'b', 'c']]
            ],
            [$m->set(['a', 'b', 'b', 'c']), ['SS' => ['a', 'b', 'c']]],
            [$m->set([]), self::ERROR],

                // Errors
            [$m->set(['a', 2]), self::ERROR],
            [new \SplFileInfo(__FILE__), self::ERROR],
        ];
    }

    public function testMarshalingJsonAndItems()
    {
        $json = <<<JSON
{
    "str":"string",
    "num":1,
    "bool":true,
    "null":null,
    "list":[1,2,[3,4]],
    "map":{"colors":["red","green","blue"]}
}
JSON;

        $array = [
            'str'  => 'string',
            'num'  => 1,
            'bool' => true,
            'null' => null,
            'list' => [1, 2, [3, 4]],
            'map'  => ['colors' => ['red', 'green', 'blue']],
        ];

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

        $m = new Marshaler;
        $this->assertEquals($expected, $m->marshalJson($json));
        $this->assertEquals($expected, $m->marshalItem($array));
    }

    public function testErrorIfMarshalingBadJsonDoc()
    {
        $this->setExpectedException('InvalidArgumentException');
        (new Marshaler)->marshalJson('foo');
    }


    public function testUnmarshalingHandlesAllDynamoDbTypes()
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
        $json = str_replace([" ", "\n"], '', $json); // remove whitespace

        $m = new Marshaler;
        $this->assertEquals($json, $m->unmarshalJson($item));
        $this->assertEquals($json, json_encode($m->unmarshalItem($item)));
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
        $m = new Marshaler;
        $this->setExpectedException('UnexpectedValueException');
        $m->unmarshalValue(['BOMB' => 'BOOM']);
    }

    public function testThatBinaryAndSetValuesGetRoundtrippedWithoutChanges()
    {
        $m = new Marshaler;
        $item = [
            'foo' => $m->binary('foo'),
            'bar' => $m->set(['foo', 'bar']),
            'baz' => $m->set([$m->binary('foo'), $m->binary('baz')]),
        ];
        $formatted = [
            'foo' => ['B' => 'foo'],
            'bar' => ['SS' => ['foo', 'bar']],
            'baz' => ['BS' => ['foo', 'baz']],
        ];

        $marshaled = $m->marshalItem($item);
        $this->assertEquals($formatted, $marshaled);
    }

    public function testCanIgnoreInvalidValuesWithOption()
    {
        $m = new Marshaler(['ignore_invalid' => true]);
        $result = $m->marshalItem([
            'foo' => 'bar',
            'bar' => '',
            'baz' => new \SplFileInfo(__FILE__)
        ]);
        $this->assertSame(['foo' => ['S' => 'bar']], $result);
    }

    public function testCanWrapLargeNumbersWithOption()
    {
        $m = new Marshaler(['wrap_numbers' => true]);
        $result = $m->unmarshalItem([
            'foo' => ['NS' => ['99999999999999999999', '9']],
            'bar' => ['N' => '99999999999999999999.99999999999999999999'],
        ]);
        $this->assertInstanceOf('Aws\DynamoDb\NumberValue', $result['bar']);
        $this->assertEquals('99999999999999999999', (string) iterator_to_array($result['foo'])[0]);
        $this->assertEquals('99999999999999999999.99999999999999999999', (string) $result['bar']);
    }

    /**
     * @covers Aws\DynamoDb\NumberValue
     */
    public function testNumberValueCanBeFormattedAndSerialized()
    {
        $number = new NumberValue('99999999999999999999');
        $this->assertEquals('99999999999999999999', (string) $number);
        $this->assertEquals('"99999999999999999999"', json_encode($number));
    }

    /**
     * @covers Aws\DynamoDb\BinaryValue
     */
    public function testBinaryValueCanBeFormattedAndSerialized()
    {
        $resource = fopen('php://temp', 'w+');
        fwrite($resource, 'foo');
        fseek($resource, 0);

        $binary = new BinaryValue($resource);
        $this->assertEquals('foo', (string) $binary);
        $this->assertEquals('"foo"', json_encode($binary));
    }

    /**
     * @covers Aws\DynamoDb\SetValue
     */
    public function testSetValueCanBeFormattedAndSerialized()
    {
        $set = new SetValue(['foo', 'bar', 'baz']);
        $this->assertEquals(['foo', 'bar', 'baz'], $set->toArray());
        $this->assertEquals('["foo","bar","baz"]', json_encode($set));
        $this->assertEquals(3, count($set));
        $this->assertEquals(3, iterator_count($set));
    }

    public function testUnmarshalItemDoesNotCreateReferences()
    {
        $m = new Marshaler();
        $result = $m->unmarshalItem([
            'foo' => ['S' => 'bar'],
        ]);
        $resultCopy = $result;
        $resultCopy['foo_copy'] = $resultCopy['foo'];
        $resultCopy['foo'] = 'baz';
        $this->assertEquals('bar', $result['foo']);
    }
}
