<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Aws\Tests\DynamoDB\Integration;

/**
 * @group integration
 */
class IteratorsTest extends \Aws\Tests\IntegrationTestCase
{
    public function testIteratesBatchGetItemCommand()
    {
        $client = $this->getServiceBuilder()->get('dynamodb');
        $mock = $this->setMockResponse($client, array(
            'dynamodb/batch_get_item_has_more',
            'dynamodb/batch_get_item_empty_has_more',
            'dynamodb/batch_get_item_final'
        ));

        $iterator = $client->getIterator('BatchGetItem', array(
            'RequestItems' => array(
                'Table1' => array(
                    'Keys' => array(
                        array(
                            'HashKeyElement'  => array('S' => 'KeyValue1'),
                            'RangeKeyElement' => array('N' => '2')
                        ),
                        array(
                            'HashKeyElement'  => array('S' => 'KeyValue3'),
                            'RangeKeyElement' => array('N' => '4')
                        ),
                        array(
                            'HashKeyElement'  => array('S' => 'KeyValue5'),
                            'RangeKeyElement' => array('N' => '6')
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
        ));

        foreach ($iterator as $item) {
            $this->assertInternalType('array', $item);
        }

        $requests = $mock->getReceivedRequests();
        $this->assertEquals(3, count($requests));
    }

    public function testIteratesListTableCommand()
    {
        $client = $this->getServiceBuilder()->get('dynamodb');
        $mock = $this->setMockResponse($client, array(
            'dynamodb/list_tables_has_more',
            'dynamodb/list_tables_final'
        ));

        $iterator = $client->getIterator('ListTables');

        $this->assertEquals(array('Table1', 'Table2', 'Table3', 'Table4', 'Table5'), $iterator->toArray());

        $requests = $mock->getReceivedRequests();
        $this->assertEquals(2, count($requests));
        $json = json_decode((string) $requests[1]->getBody(), true);
        $this->assertEquals('Table3', $json['ExclusiveStartTableName']);
    }

    public function testIteratesQueryCommand()
    {
        $client = $this->getServiceBuilder()->get('dynamodb');
        $mock = $this->setMockResponse($client, array(
            'dynamodb/query_has_more',
            'dynamodb/query_final',
        ));

        $iterator = $client->getIterator('Query', array(
            'TableName' => 'foo',
            'HashKeyValue' => array(
                'S' => 'AttributeValue1'
            )
        ));

        $data = $iterator->toArray();
        $this->assertEquals(3, count($data));

        $requests = $mock->getReceivedRequests();
        $this->assertEquals(2, count($requests));
        $json = json_decode((string) $requests[1]->getBody(), true);
        $this->assertArrayHasKey('ExclusiveStartKey', $json);
    }

    public function testIteratesScanCommand()
    {
        $client = $this->getServiceBuilder()->get('dynamodb');
        $mock = $this->setMockResponse($client, array(
            'dynamodb/scan_has_more',
            'dynamodb/scan_empty_has_more',
            'dynamodb/scan_final',
        ));

        $iterator = $client->getIterator('Scan', array(
            'TableName' => 'foo'
        ));

        $data = $iterator->toArray();
        $this->assertEquals(3, count($data));

        $requests = $mock->getReceivedRequests();
        $this->assertEquals(3, count($requests));
        $json = json_decode((string) $requests[1]->getBody(), true);
        $this->assertArrayHasKey('ExclusiveStartKey', $json);

        $this->assertEquals(207, $iterator->getScannedCount());
    }
}
