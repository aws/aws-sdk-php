<?php

namespace Aws\Tests\DynamoDb\Model\BatchRequest;

use Aws\DynamoDb\Model\BatchRequest\PutRequest;
use Aws\DynamoDb\Model\Item;

/**
 * @covers Aws\DynamoDb\Model\BatchRequest\PutRequest
 */
class PutRequestTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConstructorSetsValues()
    {
        $item = $this->getMock('Aws\DynamoDb\Model\Item');

        $putRequest = new PutRequest($item, 'table');

        $this->assertSame($item, $putRequest->getItem());
    }

    public function testConstructorSetsValuesWhenItemContainsTable()
    {
        $item = $this->getMock('Aws\DynamoDb\Model\Item');
        $item->expects($this->any())
            ->method('getTableName')
            ->will($this->returnValue('table'));

        $putRequest = new PutRequest($item);

        $this->assertSame($item, $putRequest->getItem());
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     */
    public function testConstructorThrowsExceptionWithoutTable()
    {
        $item = $this->getMock('Aws\DynamoDb\Model\Item');

        $putRequest = new PutRequest($item);;
    }

    public function testCanConvertToArray()
    {
        $putRequest = new PutRequest(Item::fromArray(array(
            'foo' => 'bar',
            'baz' => 123,
        )), 'table');

        $this->assertEquals(array(
            'PutRequest' => array(
                'Item' => array(
                    'foo' => array('S' => 'bar'),
                    'baz' => array('N' => '123')
                )
            )
        ), $putRequest->toArray());
    }
}
