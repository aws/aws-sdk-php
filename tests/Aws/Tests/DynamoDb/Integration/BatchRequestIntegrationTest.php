<?php

namespace Aws\Tests\DynamoDb\Integration;

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Exception\ResourceNotFoundException;
use Aws\DynamoDb\Model\BatchRequest\DeleteRequest;
use Aws\DynamoDb\Model\BatchRequest\PutRequest;
use Aws\DynamoDb\Model\BatchRequest\WriteRequestBatch;
use Aws\DynamoDb\Model\Item;
use Aws\DynamoDb\Model\Key;

/**
 * @group integration
 */
class BatchRequestIntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    public function testWriteRequestBatchProcessWorksAsExpected()
    {
        // Set up
        /** @var $client DynamoDbClient */
        $client = self::getServiceBuilder()->get('dynamodb');
        $table = self::getResourcePrefix() . '-php-test-batch-write';

        try {
            $result = $client->describeTable(array('TableName' => $table));
            self::log('Table exists. Waiting until the status is ACTIVE');
            // Wait until the table is active
            $client->waitUntil('table_exists', $table, array('status' => 'ACTIVE'));
            self::log('Deleting the table');
            // Delete the table to clear out its contents
            $client->deleteTable(array('TableName' => $table));
            self::log('Waiting until the table does not exist');
            // Wait until the table does not exist
            $client->waitUntil('table_not_exists', $table);
        } catch (ResourceNotFoundException $e) {
        }

        self::log("Creating table {$table}...");
        $client->createTable(array(
            'TableName' => $table,
            'KeySchema' => array(
                'HashKeyElement' => array(
                    'AttributeName' => 'foo',
                    'AttributeType' => 'S'
                ),
            ),
            'ProvisionedThroughput' => array(
                'ReadCapacityUnits'  => 20,
                'WriteCapacityUnits' => 20
            )
        ));
        $client->waitUntil('table_exists', $table, array('status' => 'active'));
        self::log("Table created.");

        // Test
        $numItems = 55;
        self::log("Testing the WriteRequestBatch with {$numItems} items.");

        self::log("Put {$numItems} items into the table.");
        $writeBatch = WriteRequestBatch::factory($client, 50);
        for ($i = 1; $i <= $numItems; $i++) {
            $writeBatch->add(new PutRequest(Item::fromArray(array(
                'foo'  => "example_{$i}",
                'time' => time()
            )), $table));
        }
        $writeBatch->flush();

        self::log("Assert that all {$numItems} items made it into the table.");
        $scanner = $client->getIterator('Scan', array(
            'TableName' => $table
        ));
        $this->assertEquals($numItems, iterator_count($scanner), 'Not all of the items were inserted.');

        self::log("Remove {$numItems} items from the table");
        $deleteBatch = WriteRequestBatch::factory($client);
        for ($i = 1; $i <= $numItems; $i++) {
            $deleteBatch->add(new DeleteRequest(new Key("example_{$i}"), $table));
        }
        $deleteBatch->flush();

        self::log("Assert that all {$numItems} items are deleted from the table");
        $scanner = $client->getIterator('Scan', array(
            'TableName' => $table
        ));
        $this->assertEquals(0, iterator_count($scanner), 'Not all of the items were deleted.');
    }

    /**
     * @depends testWriteRequestBatchProcessWorksAsExpected
     */
    public function testWriteRequestBatchCanHandleLargeBatches()
    {
        // Set up
        /** @var $client DynamoDbClient */
        $client = self::getServiceBuilder()->get('dynamodb');
        $table = self::getResourcePrefix() . '-php-test-batch-write-big-5';

        // Test
        $numItems = 30;
        self::log("Testing the WriteRequestBatch with {$numItems} HUGE items.");

        self::log("Put {$numItems} items into the table.");
        $writeBatch = WriteRequestBatch::factory($client);
        for ($i = 1; $i <= $numItems; $i++) {
            $writeBatch->add(new PutRequest(Item::fromArray(array(
                'ID'  => $i,
                'data' => str_repeat('X', 50000)
            )), $table));
        }
        $writeBatch->flush();

        self::log("Assert that all {$numItems} items made it into the table.");
        $scanner = $client->getIterator('Scan', array(
            'TableName' => $table
        ));
        $this->assertEquals($numItems, iterator_count($scanner), 'Not all of the items were inserted.');

        // Tear down
        self::log("Deleting table {$table}...");
        $client->deleteTable(array('TableName' => $table));
        $client->waitUntil('table_not_exists', $table);
    }
}
