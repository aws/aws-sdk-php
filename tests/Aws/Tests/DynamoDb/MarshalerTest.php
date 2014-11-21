<?php
namespace Aws\Tests\DynamoDb;

use Aws\DynamoDb\Marshaler;

/**
 * @covers Aws\DynamoDb\Marshaler
 */
class MarshalerTest extends \Guzzle\Tests\GuzzleTestCase
{
    const ERROR = 'ERROR';

    /**
     * @dataProvider getMarshalValueUseCases
     */
    public function testMarshalValueUseCases($value, $expectedResult)
    {
        $m = new Marshaler;
        try {
            $actualResult = $this->callMethod($m, 'marshalValue', array($value));
        } catch (\UnexpectedValueException $e) {
            $actualResult = self::ERROR;
        }
        $this->assertSame($expectedResult, $actualResult);
    }

    public function getMarshalValueUseCases()
    {
        return array(
            // "S"
            array('S', array('S' => 'S')),
            array('3', array('S' => '3')),
            array('', self::ERROR),

            // "N"
            array(1, array('N' => '1')),
            array(-1, array('N' => '-1')),
            array(0, array('N' => '0')),
            array(5000000000, array('N' => '5000000000')),
            array(1.23, array('N' => '1.23')),
            array(1e10, array('N' => '10000000000')),

            // "BOOL" & "NULL"
            array(true, array('BOOL' => true)),
            array(false, array('BOOL' => false)),
            array(null, array('NULL' => true)),

            // "L"
            array( // Homogeneous
                array(1, 2, 3),
                array('L' => array(
                    array('N' => '1'),
                    array('N' => '2'),
                    array('N' => '3')
                ))
            ),
            array( // Heterogeneous
                array(1, 'one', true),
                array('L' => array(
                    array('N' => '1'),
                    array('S' => 'one'),
                    array('BOOL' => true)
                ))
            ),
            array( // Empty
                array(),
                array('L' => array())
            ),
            array( // Traversable
                new \ArrayObject(array(1, 2, 3)),
                array('L' => array(
                    array('N' => '1'),
                    array('N' => '2'),
                    array('N' => '3')
                ))
            ),

            // "M"
            array( // Associative array
                array('foo' => 'foo', 'bar' => 3, 'baz' => null),
                array('M' => array(
                    'foo' => array('S' => 'foo'),
                    'bar' => array('N' => '3'),
                    'baz' => array('NULL' => true)
                ))
            ),
            array( // Object
                json_decode('{"foo":"foo","bar":3,"baz":null}'),
                array('M' => array(
                    'foo' => array('S' => 'foo'),
                    'bar' => array('N' => '3'),
                    'baz' => array('NULL' => true)
                ))
            ),
            array( // Includes indexes
                array('foo', 'bar', 'baz' => 'baz'),
                array('M' => array(
                    '0' => array('S' => 'foo'),
                    '1' => array('S' => 'bar'),
                    'baz' => array('S' => 'baz'),
                ))
            ),
            array( // Empty
                new \stdClass,
                array('M' => array())
            ),
            array( // Traversable
                new \ArrayObject(array('foo' => 'foo', 'bar' => 3, 'baz' => null)),
                array('M' => array(
                    'foo' => array('S' => 'foo'),
                    'bar' => array('N' => '3'),
                    'baz' => array('NULL' => true)
                ))
            ),

            // Nested
            array(
                array(
                    'name' => array(
                        'first' => 'james',
                        'middle' => array('michael', 'john'),
                        'last' => 'richardson',
                    ),
                    'colors' => array(
                        array('red' => 0, 'green' => 255, 'blue' => 255),
                        array('red' => 255, 'green' => 0, 'blue' => 127),
                    )
                ),
                array('M' => array(
                    'name' => array('M' => array(
                        'first' => array('S' => 'james'),
                        'middle' => array('L' => array(
                            array('S' => 'michael'),
                            array('S' => 'john'),
                        )),
                        'last' => array('S' => 'richardson'),
                    )),
                    'colors' => array('L' => array(
                        array('M' => array(
                            'red' => array('N' => '0'),
                            'green' => array('N' => '255'),
                            'blue' => array('N' => '255'),
                        )),
                        array('M' => array(
                            'red' => array('N' => '255'),
                            'green' => array('N' => '0'),
                            'blue' => array('N' => '127'),
                        )),
                    ))
                ))
            ),

            // Errors
            array(new \SplFileInfo(__FILE__), self::ERROR),
            array(fopen(__FILE__, 'r'), self::ERROR),
        );
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

        $array = array(
            'str'  => 'string',
            'num'  => 1,
            'bool' => true,
            'null' => null,
            'list' => array(1, 2, array(3, 4)),
            'map'  => array('colors' => array('red', 'green', 'blue')),
        );

        $expected = array(
            'str' => array('S' => 'string'),
            'num' => array('N' => '1'),
            'bool' => array('BOOL' => true),
            'null' => array('NULL' => true),
            'list' => array('L' => array(
                array('N' => '1'),
                array('N' => '2'),
                array('L' => array(
                    array('N' => '3'),
                    array('N' => '4'),
                )),
            )),
            'map' => array('M' => array(
                'colors' => array('L' => array(
                    array('S' => 'red'),
                    array('S' => 'green'),
                    array('S' => 'blue'),
                ))
            )),
        );

        $m = new Marshaler;
        $this->assertEquals($expected, $m->marshalJson($json));
        $this->assertEquals($expected, $m->marshalItem($array));
    }

    public function testErrorIfMarshalingBadJsonDoc()
    {
        $m = new Marshaler;
        $this->setExpectedException('InvalidArgumentException');
        $m->marshalJson('foo');
    }

    public function testUnmarshalingHandlesAllDynamoDbTypes()
    {
        $item = array(
            'S' => array('S' => 'S'),
            'N' => array('N' => '1'),
            'B' => array('B' => 'B'),
            'SS' => array('SS' => array('S', 'SS', 'SSS')),
            'NS' => array('NS' => array('1', '2', '3')),
            'BS' => array('BS' => array('B', 'BB', 'BBB')),
            'BOOL' => array('BOOL' => true),
            'NULL' => array('NULL' => true),
            'M' => array('M' => array(
                'A' => array('S' => 'A'),
                'B' => array('N' => '1'),
                'C' => array('BOOL' => true),
            )),
            'L' => array('L' => array(
                array('S' => 'A'),
                array('N' => '1'),
                array('BOOL' => true),
            ))
        );

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
        $json = str_replace(array(" ", "\n"), '', $json); // remove whitespace

        $array = array(
            'S' => 'S',
            'N' => 1,
            'B' => 'B',
            'SS' => array('S', 'SS', 'SSS'),
            'NS' => array(1, 2, 3),
            'BS' => array('B', 'BB', 'BBB'),
            'BOOL' => true,
            'NULL' => null,
            'M' => array('A' => 'A', 'B' => 1, 'C' => true),
            'L' => array('A', 1, true),
        );

        $m = new Marshaler;
        $this->assertEquals($json, $m->unmarshalJson($item));
        $this->assertEquals($array, $m->unmarshalItem($item));
    }

    public function testCanUnmarshalToObjectFormat()
    {
        $m = new Marshaler;
        $result = $this->callMethod($m, 'unmarshalValue', array(
            array('M' => array('a' => array('S' => 'b'))),
            true
        ));

        $this->assertInstanceOf('stdClass', $result);
        $this->assertEquals('b', $result->a);
    }

    public function testErrorIfUnmarshalingUnknownType()
    {
        $m = new Marshaler;
        $this->setExpectedException('UnexpectedValueException');
        $this->callMethod($m, 'unmarshalValue', array(array('BOMB' => 'BOOM')));
    }

    private function callMethod($object, $method, $args)
    {
        $o = new \ReflectionObject($object);
        $m = $o->getMethod($method);
        $m->setAccessible(true);

        return $m->invokeArgs($object, $args);
    }
}
