<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

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
