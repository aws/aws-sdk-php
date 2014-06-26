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

namespace Aws\DynamoDb\Integration;

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Exception\ResourceNotFoundException;
use Aws\DynamoDb\Model\BatchRequest\DeleteRequest;
use Aws\DynamoDb\Model\BatchRequest\PutRequest;
use Aws\DynamoDb\Model\BatchRequest\WriteRequestBatch;
use Aws\DynamoDb\Model\Item;

/**
 * @group example
 * @group integration
 * @outputBuffering enabled
 */
class WriteRequestBatch_20120810_Test extends \Aws\Tests\IntegrationTestCase
{
    public static function setUpBeforeClass()
    {
        /** @var $client DynamoDbClient */
        $client = self::getServiceBuilder()->get('dynamodb', array('version' => '2012-08-10'));

        try {
            $client->deleteTable(array('TableName' => 'batch-write-test'));
        } catch (\Exception $e) {}
        $client->waitUntil('TableNotExists', array('TableName' => 'batch-write-test'));
    }

    public static function tearDownAfterClass()
    {
        self::setUpBeforeClass();
    }

    /**
     * Use WriteRequestBatch to batch several PutItem requests
     *
     * @example Aws\DynamoDb\Model\BatchRequest\WriteRequestBatch::factory
     * @example Aws\DynamoDb\Model\BatchRequest\WriteRequestBatch::add
     * @example Aws\DynamoDb\Model\BatchRequest\PutRequest::__construct
     * @example Aws\DynamoDb\Model\Item::fromArray
     */
    public function testWriteRequestBatchForPuts()
    {
        /** @var $client DynamoDbClient */
        $client = self::getServiceBuilder()->get('dynamodb', array('version' => '2012-08-10'));
        $tableName = 'batch-write-test';

        try {
            $client->describeTable(array('TableName' => $tableName));
            self::log("The {$tableName} table exists.");
        } catch (ResourceNotFoundException $e) {
            self::log("Create the {$tableName} table.");
            $client->createTable(array(
                'TableName' => $tableName,
                'AttributeDefinitions' => array(
                    array(
                        'AttributeName' => 'id',
                        'AttributeType' => 'S'
                    )
                ),
                'KeySchema' => array(
                    array(
                        'AttributeName' => 'id',
                        'KeyType'       => 'HASH'
                    ),
                ),
                'ProvisionedThroughput' => array(
                    'ReadCapacityUnits'  => 20,
                    'WriteCapacityUnits' => 20
                )
            ));
        }

        self::log("Wait until the {$tableName} table's status is ACTIVE...");
        $client->waitUntil('TableExists', array('TableName' => $tableName));

        self::log("Test writing items in batches using WriteRequestBatch.");
        // @begin
        $tableName = 'batch-write-test'; // This table has a HashKey named "id"
        $itemIds = array();

        // Put 55 items into the table
        $putBatch = WriteRequestBatch::factory($client);
        for ($i = 0; $i < 55; $i++) {
            $itemIds[] = $itemId = uniqid();
            $item = Item::fromArray(array(
                'id'        => $itemId,
                'timestamp' => time(),
            ));
            $putBatch->add(new PutRequest($item, $tableName));
        }
        $putBatch->flush();
        // @end

        self::log("Assert that all the items made it into the table.");
        $scan = $client->getIterator('Scan', array('TableName' => $tableName));
        $this->assertGreaterThanOrEqual(55, iterator_count($scan), 'Not all of the items were inserted.');

        return array($client, $tableName, $itemIds);
    }

    /**
     * Use WriteRequestBatch to batch several DeleteItem requests
     *
     * @depends testWriteRequestBatchForPuts
     * @example Aws\DynamoDb\Model\BatchRequest\DeleteRequest::__construct 2012-08-10
     */
    public function testWriteRequestBatchForDeletes(array $state)
    {
        /** @var $client DynamoDbClient */
        /** @var $tableName string */
        /** @var $itemIds array */
        list($client, $tableName, $itemIds) = $state;

        self::log("Test deleting items in batches using WriteRequestBatch.");
        // @begin

        // Remove items from the table
        $deleteBatch = WriteRequestBatch::factory($client);
        foreach ($itemIds as $itemId) {
            $key = array('id' => array('S' => $itemId));
            $deleteBatch->add(new DeleteRequest($key, $tableName));
        }
        $deleteBatch->flush();
        // @end

        self::log("Assert that all the items have been deleted from the table");
        $scanner = $client->getIterator('Scan', array('TableName' => $tableName));
        $this->assertEquals(0, iterator_count($scanner), 'Not all of the items were deleted.');
    }
}
