<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Model\QueryIterator;

class QueryIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesQueryCommand()
    {
        $client = $this->getServiceBuilder()->get('dynamo_db');

        $client->getCredentials()->unserialize(json_encode(array(
            'key'       => 'foo',
            'secret'    => 'bar',
            'token'     => 'baz',
            'token.ttd' => time() + 1000
        )));

        $mock = $this->setMockResponse($client, array(
            'dynamo_db/query_has_more',
            'dynamo_db/query_final',
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
