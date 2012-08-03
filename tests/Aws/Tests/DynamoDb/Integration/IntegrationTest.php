<?php

namespace Aws\Tests\DynamoDb\Integration;

use Aws\Common\Waiter\CallableWaiter;
use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Exception\ResourceNotFoundException;
use Aws\DynamoDb\Model\BatchRequest\DeleteRequest;
use Aws\DynamoDb\Model\BatchRequest\PutRequest;
use Aws\DynamoDb\Model\BatchRequest\WriteRequestBatch;
use Aws\DynamoDb\Model\Item;
use Aws\DynamoDb\Model\Key;
use Guzzle\Common\Batch\BatchBuilder;
use Guzzle\Http\Exception\ClientErrorResponseException;

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
        $client = self::getServiceBuilder()->get('dynamo_db');

        self::log("# Attempting to delete {$table}");

        try {

            $result = $client->describeTable(array(
                'TableName' => $table
            ));

            self::log('Table exists. Waiting until the status is ACTIVE');

            // Wait until the table is active
            $client->waitUntil('table_exists', $table, array(
                'status' => 'ACTIVE'
            ));

            self::log('Deleting the table');

            // Delete the table to clear out its contents
            $client->deleteTable(array(
                'TableName' => $table
            ));

            self::log('Waiting until the table does not exist');

            // Wait until the table does not exist
            $client->waitUntil('table_not_exists', $table);

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
        $this->client = self::getServiceBuilder()->get('dynamo_db');
    }

    /**
     * Ensures that a DynamoDB table can be created
     */
    public function testCreatesTable()
    {
        self::log("Attempting to create {$this->table}");
        $this->client->createTable(array(
            'TableName' => self::getResourcePrefix() . 'phptest',
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
                'WriteCapacityUnits' => 5
            )
        ));

        // Check/wait until the table exists
        self::log("Table created.  Waiting until it exists.");
        $this->client->waitUntil('table_exists', $this->table);
        self::log("Table exists");

        // Ensure that the fields were set properly
        $result = $this->client->describeTable(array(
            'TableName' => $this->table
        ));

        self::log("Ensuring the table was created with the proper values");
        $this->assertEquals($this->table, $result['Table']['TableName']);
        $this->assertEquals('foo', $result['Table']['KeySchema']['HashKeyElement']['AttributeName']);
        $this->assertEquals('S', $result['Table']['KeySchema']['HashKeyElement']['AttributeType']);
        $this->assertEquals('bar', $result['Table']['KeySchema']['RangeKeyElement']['AttributeName']);
        $this->assertEquals('N', $result['Table']['KeySchema']['RangeKeyElement']['AttributeType']);
        $this->assertEquals(10, $result['Table']['ProvisionedThroughput']['ReadCapacityUnits']);
        $this->assertEquals(5, $result['Table']['ProvisionedThroughput']['WriteCapacityUnits']);
    }

    /**
     * @depends testCreatesTable
     */
    public function testListsTables()
    {
        $command = $this->client->getCommand('ListTables');
        $result = $command->execute();
        $this->assertContains($this->table, $result['TableNames']);
    }

    /**
     * @depends testCreatesTable
     */
    public function testIteratesOverListTables()
    {
        self::log('Iterating over all tables');

        $foundTables = array();
        $iterator = $this->client->getIterator('ListTables', array(
            'Limit' => 5
        ));

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
        $this->client->waitUntil('TableExists', $this->table, array(
            'status' => 'active'
        ));

        $this->client->updateTable(array(
            'TableName' => $this->table,
            'ProvisionedThroughput' => array(
                'ReadCapacityUnits'  => 10,
                'WriteCapacityUnits' => 10
            )
        ));

        // Wait until the table is active
        self::log('Waiting for the table to become active after updating');
        $this->client->waitUntil('table_exists', $this->table, array(
            'status' => 'active'
        ));

        // Ensure the table is updated
        $result = $this->client->describeTable(array(
            'TableName' => $this->table
        ));

        // Ensure that the updates took effect
        $this->assertEquals(10, $result['Table']['ProvisionedThroughput']['ReadCapacityUnits']);
        $this->assertEquals(10, $result['Table']['ProvisionedThroughput']['WriteCapacityUnits']);
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

        $this->assertArrayHasKey('ConsumedCapacityUnits', $result);

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
        // Delete the item using a Key object
        $result = $this->client->deleteItem(array(
            'TableName' => $this->table,
            'Key'        => new Key('Test', 10)
        ));

        $this->assertArrayHasKey('ConsumedCapacityUnits', $result);
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
            'TableName'  => $this->table,
            'Limit'       => 2,
            'ConsistentRead' => true,
            'HashKeyValue' => array('S' => 'Bar'),
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

        $iterator = $this->client->getIterator('BatchGetItem', array(
            'RequestItems' => array(
                $this->table => array(
                    'Keys' => array(
                        // Use Key objects
                        new Key('Bar', 10),
                        new Key('Bar', 20),
                        // Use regular array
                        array(
                            'HashKeyElement' => array('S' => 'Bar'),
                            'RangeKeyElement' => array('N' => '30')
                        )
                    )
                )
            )
        ));

        $items = $iterator->toArray();
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

        $total = 300;
        $retries = 0;

        $batch = BatchBuilder::factory()
            ->transferCommands(100)
            ->bufferExceptions()
            ->build();

        $s = microtime(true);

        for ($i = 0; $i < $total; $i++) {
            $command = $this->client->getCommand('GetItem', array(
                'TableName' => $this->table,
                'Key'       => $this->client->formatAttributes(array(
                    'HashKeyElement'  => 'Test',
                    'RangeKeyElement' => 10
                ))
            ));
            $command->prepare()->getEventDispatcher()->addListener('request.sent', function ($event) use (&$retries) {
                if ($event['response'] && !$event['response']->isSuccessful()) {
                    $retries++;
                }
            });
            $batch->add($command);
        }

        $batch->flush();
        foreach ($batch->getExceptions() as $e) {
            self::log($e->getMessage());
            self::log($e->getPrevious()->getMessage());
            foreach ($e->getBatch() as $command) {
                if (!$command->getResponse()->isSuccessful()) {
                    self::log($command->getResponse());
                }
            }
        }
        $elapsed = microtime(true) - $s;

        self::log("Got the item {$total} times with {$retries} retries in {$elapsed} seconds");
    }

    public function testWriteRequestBatchProcessWorksAsExpected()
    {
        // Set up
        $table = self::getResourcePrefix() . '-php-test-batch-write';
        self::log("Creating table {$table}...");
        $this->client->createTable(array(
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
        $this->client->waitUntil('table_exists', $table, array(
            'status' => 'active'
        ));
        self::log("Table created.");

        // Test
        $numItems = 30;
        self::log("Testing the WriteRequestBatch with {$numItems} items.");

        self::log("Put {$numItems} items into the table.");
        $writeBatch = WriteRequestBatch::factory($this->client);
        for ($i = 1; $i <= $numItems; $i++) {
            $writeBatch->add(new PutRequest(Item::fromArray(array(
                'foo'  => "example_{$i}",
                'time' => time()
            )), $table));
        }
        $writeBatch->flush();

        self::log("Assert that all {$numItems} items made it into the table.");
        $scanner = $this->client->getIterator('Scan', array(
            'TableName' => $table
        ));
        $this->assertEquals($numItems, iterator_count($scanner), 'Not all of the items were inserted.');

        self::log("Remove {$numItems} items from the table");
        $deleteBatch = WriteRequestBatch::factory($this->client);
        for ($i = 1; $i <= $numItems; $i++) {
            $deleteBatch->add(new DeleteRequest(new Key("example_{$i}"), $table));
        }
        $deleteBatch->flush();

        self::log("Assert that all {$numItems} items are deleted from the table");
        $scanner = $this->client->getIterator('Scan', array(
            'TableName' => $table
        ));
        $this->assertEquals(0, iterator_count($scanner), 'Not all of the items were deleted.');

        // Tear down
        self::log("Deleting table {$table}...");
        $this->client->deleteTable(array(
            'TableName' => $table
        ));
        $this->client->waitUntil('table_not_exists', $table);
    }
}
