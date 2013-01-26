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

namespace Aws\Tests\DynamoDb\Integration;

use Aws\Common\Waiter\CallableWaiter;
use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Exception\ResourceNotFoundException;
use Aws\DynamoDb\Model\Item;
use Guzzle\Batch\BatchBuilder;
use Guzzle\Plugin\Backoff\BackoffPlugin;
use Guzzle\Plugin\History\HistoryPlugin;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var string DynamoDB table name
     */
    public $table;

    /**
     * @var DynamoDbClient
     */
    public $client;

    /**
     * @var array Array of range key values
     */
    public $rangeKeyValues = array(10, 20, 30);

    /**
     * Attempt to safely delete the test table
     */
    protected static function deleteTable()
    {
        $table = self::getResourcePrefix() . 'phptest';
        $client = self::getServiceBuilder()->get('dynamodb');

        self::log("# Attempting to delete {$table}");

        try {
            $result = $client->describeTable(array('TableName' => $table));
            self::log('Table exists. Waiting until the status is ACTIVE');
            // Wait until the table is active
            $client->waitUntil('TableExists', array('TableName' => $table));
            self::log('Deleting the table');
            // Delete the table to clear out its contents
            $client->deleteTable(array('TableName' => $table));
            self::log('Waiting until the table does not exist');
            // Wait until the table does not exist
            $client->waitUntil('TableNotExists', array('TableName' => $table));
        } catch (ResourceNotFoundException $e) {
            // The table does not exist so we are good
        }

        self::log("{$table} does not exist");
    }

    public static function setUpBeforeClass()
    {
        self::deleteTable();
    }

    public static function tearDownAfterClass()
    {
        self::deleteTable();
    }

    public function setUp()
    {
        $this->table = self::getResourcePrefix() . 'phptest';
        $this->client = self::getServiceBuilder()->get('dynamodb');
    }

    /**
     * Ensures that a DynamoDB table can be created
     */
    public function testCreatesTable()
    {
        self::log("Waiting until {$this->table} does not exist");
        $this->client->waitUntil('TableNotExists', array('TableName' => $this->table));

        self::log("Attempting to create {$this->table}");

        $this->client->createTable(array(
            'TableName' => $this->table,
            'KeySchema' => array(
                'HashKeyElement' => array(
                    'AttributeName' => 'foo',
                    'AttributeType' => 'S'
                ),
                'RangeKeyElement' => array(
                    'AttributeName' => 'bar',
                    'AttributeType' => 'N'
                )
            ),
            'ProvisionedThroughput' => array(
                'ReadCapacityUnits'  => 10,
                'WriteCapacityUnits' => 10
            )
        ));

        // Check/wait until the table exists
        self::log("Table created.  Waiting until it exists.");
        $this->client->waitUntil('TableExists', array('TableName' => $this->table));
        self::log("Table exists");

        // Ensure that the fields were set properly
        $result = $this->client->describeTable(array('TableName' => $this->table));

        self::log("Ensuring the table was created with the proper values");
        $this->assertEquals($this->table, $result['Table']['TableName']);
        $this->assertEquals('foo', $result['Table']['KeySchema']['HashKeyElement']['AttributeName']);
        $this->assertEquals('S', $result['Table']['KeySchema']['HashKeyElement']['AttributeType']);
        $this->assertEquals('bar', $result['Table']['KeySchema']['RangeKeyElement']['AttributeName']);
        $this->assertEquals('N', $result['Table']['KeySchema']['RangeKeyElement']['AttributeType']);
        $this->assertEquals(10, $result['Table']['ProvisionedThroughput']['ReadCapacityUnits']);
        $this->assertEquals(10, $result['Table']['ProvisionedThroughput']['WriteCapacityUnits']);
    }

    /**
     * @depends testCreatesTable
     */
    public function testListsTables()
    {
        $result = $this->client->listTables();
        $this->assertContains($this->table, $result['TableNames']);
    }

    /**
     * @depends testCreatesTable
     */
    public function testIteratesOverListTables()
    {
        self::log('Iterating over all tables');

        $foundTables = array();
        $iterator = $this->client->getIterator('ListTables', array('Limit' => 5));

        foreach ($iterator as $table) {
            $foundTables[] = $table;
            self::log("Found {$table} in tables");
        }

        $this->assertContains($this->table, $foundTables);
    }

    /**
     * @depends testCreatesTable
     */
    public function testUpdatesTable()
    {
        self::log('Updating table');

        // Need to wait until the table is active
        $this->client->waitUntil('TableExists', array('TableName' => $this->table));

        $this->client->updateTable(array(
            'TableName' => $this->table,
            'ProvisionedThroughput' => array(
                'ReadCapacityUnits'  => 20,
                'WriteCapacityUnits' => 20
            )
        ));

        // Wait until the table is active
        self::log('Waiting for the table to become active after updating');
        $this->client->waitUntil('table_exists', array('TableName' => $this->table));

        // Ensure the table is updated
        $result = $this->client->describeTable(array('TableName' => $this->table));

        // Ensure that the updates took effect
        $this->assertEquals(20, $result['Table']['ProvisionedThroughput']['ReadCapacityUnits']);
        $this->assertEquals(20, $result['Table']['ProvisionedThroughput']['WriteCapacityUnits']);
    }

    /**
     * @depends testCreatesTable
     */
    public function testAddsGetsAndDeletesItems()
    {
        $attributes = $this->client->formatAttributes(array(
            'foo' => 'Test',
            'bar' => 10,
            'baz' => 'abc'
        ));

        self::log('Adding an item to the table: ' . var_export($attributes, true));
        $result = $this->client->putItem(array(
            'TableName' => $this->table,
            'Item'       => $attributes
        ));

        $this->assertTrue(isset($result['ConsumedCapacityUnits']));

        self::log('Getting the item');
        // Get the item using the formatAttributes helper
        $result = $this->client->getItem(array(
            'TableName' => $this->table,
            'Key'        => $this->client->formatAttributes(array(
                'HashKeyElement' => 'Test',
                'RangeKeyElement' => 10
            )),
            'ConsistentRead' => true
        ));

        $this->assertEquals('Test', $result['Item']['foo']['S']);
        $this->assertEquals(10, $result['Item']['bar']['N']);
        $this->assertEquals('abc', $result['Item']['baz']['S']);

        self::log('Deleting the item');
        $result = $this->client->deleteItem(array(
            'TableName' => $this->table,
            'Key'       => $this->client->formatAttributes(array(
                'HashKeyElement' => 'Test',
                'RangeKeyElement' => 10
            )),
        ));

        $this->assertTrue(isset($result['ConsumedCapacityUnits']));
    }

    /**
     * @depends testCreatesTable
     */
    public function testBase64EncodesBinaryData()
    {
        self::log("Checking to ensure binary data is base64 encoded before being sent over the wire");
        $cmd = $this->client->getCommand('PutItem', array(
            'TableName' => $this->table,
            'Item'      => array(
                'foo' => array('S' => 'f'),
                'bar' => array('N' => '1'),
                'v'   => array('B' => 'a'),
                'd'   => array('BS' => array('a', 'b'))
            )
        ));

        try {
            $cmd->execute();
        } catch (\Aws\Common\Exception\ServiceResponseException $e) {
            echo $e->getResponse()->getRequest() . "\n" . $e->getResponse() . "\n";
            die();
        }
        $this->assertContains(
            '"Item":{"foo":{"S":"f"},"bar":{"N":"1"},"v":{"B":"YQ=="},"d":{"BS":["YQ==","Yg=="]}}}',
            (string) $cmd->getRequest()->getBody()
        );
    }

    /**
     * @depends testCreatesTable
     */
    public function testIteratesOverScan()
    {
        self::log('Adding 3 items to the table');

        $this->client->putItem(array(
            'TableName' => $this->table,
            'Item'       => Item::fromArray(array(
                'foo' => 'Bar',
                'bar' => 10
            ))
        ));
        self::log('Added 1 item');

        $this->client->putItem(array(
            'TableName' => $this->table,
            'Item'       => Item::fromArray(array(
                'foo' => 'Bar',
                'bar' => 20
            ))
        ));
        self::log('Added 2 items');

        $this->client->putItem(array(
            'TableName' => $this->table,
            'Item'       => Item::fromArray(array(
                'foo' => 'Bar',
                'bar' => 30
            ))
        ));
        self::log('Added 3 items');

        self::log('Waiting until at least 3 items are in the table');
        $client = $this->client;
        $table  = $this->table;
        $waiter = new CallableWaiter();
        $waiter->setCallable(function () use ($client, $table) {
                $result = $client->scan(array(
                    'TableName' => $table
                ));
                return count($result['Items']) >= 3;
            })
            ->setMaxAttempts(10)
            ->setInterval(1);

        $iterator = $client->getIterator('Scan', array(
            'TableName'  => $this->table,
            'Limit'       => 2,
            'ScanFilter' => array(
                'bar' => array(
                    'AttributeValueList' => array(
                        array('N' => '5')
                    ),
                    'ComparisonOperator' => 'GT'
                )
            )
        ));

        $items = $iterator->toArray();
        $this->assertTrue(count($items) >= 3, 'Expected 3 items, got ' . count($items));
        $this->assertTrue($iterator->getRequestCount() >= 2);

        $mustMatch = $this->rangeKeyValues;
        foreach ($items as $item) {
            if (false !== $pos = array_search($item['bar']['N'], $mustMatch)) {
                unset($mustMatch[$pos]);
                if (empty($mustMatch)) {
                    break;
                }
            }
        }

        if (!empty($mustMatch)) {
            $this->fail('All known items were not found in scan: ' . var_export($mustMatch, true) . ' - found: ' . var_export($items, true));
        }

        return $mustMatch;
    }

    /**
     * @depends testIteratesOverScan
     */
    public function testIteratesOverQuery()
    {
        self::log('Querying data');

        $iterator = $this->client->getIterator('Query', array(
            'TableName'         => $this->table,
            'Limit'             => 2,
            'ConsistentRead'    => true,
            'HashKeyValue'      => array('S' => 'Bar'),
            'RangeKeyCondition' => array(
                'AttributeValueList' => array(
                    array('N' => '5')
                ),
                'ComparisonOperator' => 'GT'
            )
        ));

        $items = $iterator->toArray();
        $this->assertTrue(count($items) >= 3);
        $this->assertTrue($iterator->getRequestCount() >= 2);

        $mustMatch = $this->rangeKeyValues;
        foreach ($items as $item) {
            if (false !== $pos = array_search($item['bar']['N'], $mustMatch)) {
                unset($mustMatch[$pos]);
                if (empty($mustMatch)) {
                    break;
                }
            }
        }

        if (!empty($mustMatch)) {
            $this->fail('All known items were not found in scan: ' . var_export($mustMatch, true) . ' - found: ' . var_export($items, true));
        }
    }

    /**
     * @depends testIteratesOverScan
     */
    public function testIteratesOverBatchGetItem()
    {
        self::log('Running BatchGetItem');

        $history = new HistoryPlugin();
        $this->client->addSubscriber($history);

        $iterator = $this->client->getIterator('BatchGetItem', array(
            'RequestItems' => array(
                $this->table => array(
                    'Keys' => array(
                        array(
                            'HashKeyElement' => array('S' => 'Bar'),
                            'RangeKeyElement' => array('N' => '10')
                        ),
                        array(
                            'HashKeyElement' => array('S' => 'Bar'),
                            'RangeKeyElement' => array('N' => '20')
                        ),
                        array(
                            'HashKeyElement' => array('S' => 'Bar'),
                            'RangeKeyElement' => array('N' => '30')
                        )
                    ),
                    'ConsistentRead' => true
                )
            )
        ));

        $items = $iterator->toArray();
        $this->client->getEventDispatcher()->removeSubscriber($history);
        // Ensure that the request was sent using consistent read
        $this->assertContains('"ConsistentRead":"true"', (string) $history->getLastRequest()->getBody());

        $this->assertTrue(count($items) >= 3);
        $this->assertTrue($iterator->getRequestCount() >= 1);

        $mustMatch = $this->rangeKeyValues;
        foreach ($items as $item) {
            if (false !== $pos = array_search($item['bar']['N'], $mustMatch)) {
                unset($mustMatch[$pos]);
                if (empty($mustMatch)) {
                    break;
                }
            }
        }

        if (!empty($mustMatch)) {
            $this->fail('All known items were not found in scan: ' . var_export($mustMatch, true) . ' - found: ' . var_export($items, true));
        }
    }

    /**
     * @depends testIteratesOverScan
     */
    public function testImplementsCustomExponentialBackoffStrategy()
    {
        self::log('Getting an item a bunch of times in parallel');
        $batch = BatchBuilder::factory()->transferCommands(100)->build();
        $s = microtime(true);

        $total = 300;
        for ($i = 0; $i < $total; $i++) {
            $command = $this->client->getCommand('GetItem', array(
                'TableName' => $this->table,
                'Key'       => $this->client->formatAttributes(array(
                    'HashKeyElement'  => 'Test',
                    'RangeKeyElement' => 10
                ))
            ));
            $batch->add($command);
        }

        $retries = 0;
        foreach ($batch->flush() as $command) {
            $retries += $command->getRequest()->getParams()->get(BackoffPlugin::RETRY_PARAM);
        }

        $elapsed = microtime(true) - $s;
        self::log("Got the item {$total} times with {$retries} retries in {$elapsed} seconds");
    }
}
