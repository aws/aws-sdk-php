<?php

namespace Aws\Tests\DynamoDb\Model;

use Aws\DynamoDb\Iterator\BatchGetItemIterator;

/**
 * @covers Aws\DynamoDb\Iterator\BatchGetItemIterator
 */
class BatchGetItemIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesBatchGetItemCommand()
    {
        $client = $this->getServiceBuilder()->get('dynamodb');
        $mock = $this->setMockResponse($client, array(
            'dynamodb/batch_get_item_has_more',
            'dynamodb/batch_get_item_empty_has_more',
            'dynamodb/batch_get_item_final'
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
