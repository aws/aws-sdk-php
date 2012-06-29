<?php

namespace Aws\Tests\DynamoDb\Model\BatchRequest;

use Aws\DynamoDb\Model\BatchRequest\DeleteRequest;
use Aws\DynamoDb\Model\Key;

/**
 * @covers Aws\DynamoDb\Model\BatchRequest\DeleteRequest
 */
class DeleteRequestTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConstructorSetsValues()
    {
        $key = $this->getMockBuilder('Aws\DynamoDb\Model\Key')
            ->disableOriginalConstructor()
            ->getMock();

        $deleteRequest = new DeleteRequest($key, 'table');

        $this->assertSame($key, $deleteRequest->getKey());
    }

    public function testCanConvertToArray()
    {
        $deleteRequest = new DeleteRequest(new Key('foo', 123), 'table');
        $this->assertEquals(array(
            'DeleteRequest' => array(
                'Key' => array(
                    'HashKeyElement'  => array('S' => 'foo'),
                    'RangeKeyElement' => array('N' => '123')
                )
            )
        ), $deleteRequest->toArray());
    }
}
