<?php
namespace Aws\Test\Service\DynamoDb;

use Aws\Service\DynamoDb\DynamoDbClient;
use Aws\Test\UsesServiceClientTrait;

/**
 * @covers Aws\Service\DynamoDb\DynamoDbClient
 */
class DynamoDbClientTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceClientTrait;

    /**
     * @dataProvider dataForFormatValueTest
     */
    public function testCanFormatVariousTypesOfValues($value, $expected)
    {
        if ($expected === null) {
            $this->setExpectedException('InvalidArgumentException');
        }

        $client = $this->getTestSdk()->getDynamoDb();
        $actual = $client->formatValue($value);

        $this->assertSame($expected, json_encode($actual));
    }
    
    public function dataForFormatValueTest()
    {
        $handle = fopen('php://memory', 'w+');
        fwrite($handle, 'foo');
        rewind($handle);
        $stream = \GuzzleHttp\Stream\create('bar');

        return [
            // String values
            [ 'foo',   '{"S":"foo"}' ],
            [ ['foo'], '{"SS":["foo"]}' ],
            [ ['foo',  'bar', 'baz'], '{"SS":["foo","bar","baz"]}' ],

            // Numerical values
            [ 1,               '{"N":"1"}' ],
            [ 0,               '{"N":"0"}' ],
            [ 50,              '{"N":"50"}' ],
            [ 1.23,            '{"N":"1.23"}' ],
            [ 1e10,            '{"N":"10000000000"}' ],
            [ [1],             '{"NS":["1"]}' ],
            [ [0],             '{"NS":["0"]}' ],
            [ [1, 2, 3],       '{"NS":["1","2","3"]}' ],
            [ [1.2, 3.4, 5.6], '{"NS":["1.2","3.4","5.6"]}' ],

            // Numerical strings values
            [ '1',                   '{"S":"1"}' ],
            [ '0',                   '{"S":"0"}' ],
            [ '50',                  '{"S":"50"}' ],
            [ '1.23',                '{"S":"1.23"}' ],
            [ '1e10',                '{"S":"1e10"}' ],
            [ ['1'],                 '{"SS":["1"]}' ],
            [ ['0'],                 '{"SS":["0"]}' ],
            [ ['1', '2', '3'],       '{"SS":["1","2","3"]}' ],
            [ ['1.2', '3.4', '5.6'], '{"SS":["1.2","3.4","5.6"]}' ],

            // Boolean values
            [ true,    '{"N":"1"}' ],
            [ false,   '{"N":"0"}' ],
            [ [true],  '{"NS":["1"]}' ],
            [ [false], '{"NS":["0"]}' ],

            // Empty and non-scalar values
            [ '',            null ],
            [ null,          null ],
            [ [],            null ],
            [ [null],        null ],
            [ ['foo', 1],    null ],
            [ new \stdClass, null ],
            [ $handle,       '{"B":"foo"}' ],
            [ $stream,       '{"B":"bar"}' ],
        ];
    }
    
    public function testCanFormatValuesIntoVariousFormats()
    {
        $client = $this->getTestSdk()->getDynamoDb();

        $this->assertEquals('foo', $client->formatValue('foo', null));
        $this->assertEquals(['S' => 'foo'], $client->formatValue('foo', 'put'));
        $this->assertEquals(['Value' => ['S' => 'foo']], $client->formatValue('foo', 'update'));
    }

    public function testCanFormatArraysOfData()
    {
        $client = $this->getTestSdk()->getDynamoDb();

        $original = ['letter' => 'C', 'number' => 3];
        $expected = [
            'letter' => ['S' => 'C'],
            'number' => ['N' => '3'],
        ];

        $this->assertSame($expected, $client->formatAttributes($original));
    }
}