<?php

namespace Aws\Tests\DynamoDb\Model\BatchRequest;

use Aws\DynamoDb\Model\BatchRequest\DeleteRequest;
use Aws\DynamoDb\Model\Attribute;

/**
 * @covers Aws\DynamoDb\Model\BatchRequest\DeleteRequest
 */
class DeleteRequestTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConstructorSetsValues()
    {
        $key = array('HashKeyElement' => array('S' => 'foo'));

        $deleteRequest = new DeleteRequest($key, 'table');

        $this->assertSame($key, $deleteRequest->getKey());
    }

    public function testCanConvertToArray()
    {
        $key = array(
            'HashKeyElement'  => Attribute::factory('foo'),
            'RangeKeyElement' => Attribute::factory(123)
        );

        $deleteRequest = new DeleteRequest($key, 'table');
        $this->assertEquals(array(
            'DeleteRequest' => array(
                'Key' => array(
                    'HashKeyElement'  => array('S' => 'foo'),
                    'RangeKeyElement' => array('N' => '123')
                )
            )
        ), $deleteRequest->toArray());
    }

    public function getTestCasesForCreateFromCommandTest()
    {
        /** @var $client \Aws\DynamoDb\DynamoDbClient */
        $client = self::getServiceBuilder()->get('dynamodb');

        return array(
            array(
                $client->getCommand('ListTables'),
                'Aws\Common\Exception\InvalidArgumentException'
            ),
            array(
                $client->getCommand('DeleteItem', array(
                    'TableName' => 'foo',
                    'Key' => array('HashKeyElement' => array('S' => 'foo'))
                )),
                'Aws\DynamoDb\Model\BatchRequest\DeleteRequest'
            )
        );
    }

    /**
     * @dataProvider getTestCasesForCreateFromCommandTest
     */
    public function testCanCreateFromCommand($command, $expectedObjectType)
    {
        try {
            $result = DeleteRequest::fromCommand($command);
        } catch (\InvalidArgumentException $e) {
            $result = $e;
        }

        $this->assertEquals($expectedObjectType, get_class($result));
    }
}
