<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Model\BatchGetItemIterator;

class BatchGetItemIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesBatchGetItemCommand()
    {
        $client = $this->getServiceBuilder()->get('dynamo_db');
        $client->getCredentials()->unserialize(json_encode(array(
            'key'       => 'foo',
            'secret'    => 'bar',
            'token'     => 'baz',
            'token.ttd' => time() + 1000
        )));

        $mock = $this->setMockResponse($client, array(
            'dynamo_db/batch_get_item_has_more',
            'dynamo_db/batch_get_item_empty_has_more',
            'dynamo_db/batch_get_item_final'
        ));

        $iterator = new BatchGetItemIterator($client->getCommand('BatchGetItem', array(
            'RequestItems' => array(
                'Table1' => array(
                    'Keys' => array(
                        array(
                            'HashKeyElement'  => array('S' => 'KeyValue1'),
                            'RangeKeyElement' => array('N' => 'KeyValue2')
                        ),
                        array(
                            'HashKeyElement'  => array('S' => 'KeyValue3'),
                            'RangeKeyElement' => array('N' => 'KeyValue4')
                        ),
                        array(
                            'HashKeyElement'  => array('S' => 'KeyValue5'),
                            'RangeKeyElement' => array('N' => 'KeyValue6')
                        )
                    ),
                    'AttributesToGet' => array('AttributeName1', 'AttributeName2', 'AttributeName3')
                ),
                'Table2' => array(
                    'Keys' => array(
                        array('HashKeyElement' => array('S' => 'KeyValue4')),
                        array('HashKeyElement' => array('S' => 'KeyValue5'))
                    ),
                    'AttributesToGet' => array('AttributeName4', 'AttributeName5', 'AttributeName6')
                )
            )
        )));

        foreach ($iterator as $item) {
            $this->assertInternalType('array', $item);
        }

        $requests = $mock->getReceivedRequests();
        $this->assertEquals(3, count($requests));
    }
}
