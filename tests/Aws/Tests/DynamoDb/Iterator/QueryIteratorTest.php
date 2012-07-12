<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Iterator\QueryIterator;

/**
 * @covers Aws\DynamoDb\Iterator\QueryIterator
 */
class QueryIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesQueryCommand()
    {
        $client = $this->getServiceBuilder()->get('dynamodb');
        $mock = $this->setMockResponse($client, array(
            'dynamodb/query_has_more',
            'dynamodb/query_final',
        ));

        $iterator = new QueryIterator($client->getCommand('Query', array(
            'TableName' => 'foo',
            'HashKeyValue' => array(
                'S' => 'AttributeValue1'
            )
        )));

        $data = $iterator->toArray();
        $this->assertEquals(3, count($data));

        $requests = $mock->getReceivedRequests();
        $this->assertEquals(2, count($requests));
        $json = json_decode((string) $requests[1]->getBody(), true);
        $this->assertArrayHasKey('ExclusiveStartKey', $json);
    }
}
