<?php
namespace Aws\Test\Integ;

use Aws\Exception\DynamoDbException;
use Aws\DynamoDb\WriteRequestBatch;
use GuzzleHttp\Command\Event\ProcessEvent;

class DynamoDbWriteRequestBatchTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    public $client;
    public $table;

    public function testWriteRequestBatch()
    {
        self::log("Creating WriteRequestBatch.");
        $batch = new WriteRequestBatch($this->client, [
            'table' => $this->table,
            'batch_size' => 3,
            'pool_size'  => 2,
            'flush' => function () use (&$autoFlushCount) {
                self::log("The WriteRequestBatch was auto-flushed.");
                $autoFlushCount++;
            },
            'error' => function (ProcessEvent $event) {
                self::log("There was an error: " . $event->getException()->getMessage());
            }
        ]);

        $itemCount = 20;
        for ($i = 0; $i < $itemCount; $i++) {
            self::log("Putting an item to the WriteRequestBatch.");
            $batch->put(['id' => ['N' => (string) $i]]);
        }
        self::log("Flushing the final items in the WriteRequestBatch.");
        $batch->flush();

        $actualItems = $this->client->getIterator('Scan', ['TableName' => $this->table]);

        // Assert that all the items were actually written.
        $this->assertEquals($itemCount, iterator_count($actualItems));
        // Assert that there were the correct number of auto-flushes.
        $this->assertEquals(3, $autoFlushCount);
    }

    public function setUp()
    {
        $this->client = self::getSdk()->getDynamoDb();
        $this->table = self::getResourcePrefix() . '-wrb-test';

        $this->cleanUpTable();

        self::log("Creating table {$this->table}.");
        try {
            $this->client->createTable([
                'TableName' => $this->table,
                'AttributeDefinitions' => [
                    ['AttributeName' => 'id', 'AttributeType' => 'N']
                ],
                'KeySchema' => [
                    ['AttributeName' => 'id', 'KeyType' => 'HASH']
                ],
                'ProvisionedThroughput' => [
                    'ReadCapacityUnits'  => 1,
                    'WriteCapacityUnits' => 1
                ]
            ]);
            self::log("Waiting until table {$this->table} has been created.");
            $this->client->waitUntil('TableExists', ['TableName' => $this->table]);
        } catch (DynamoDbException $e) {
            $this->fail("Could not create table {$this->table}.");
        }
    }

    public function tearDown()
    {
        $this->cleanUpTable();
    }

    private function cleanUpTable()
    {
        self::log("Deleting table {$this->table}.");
        try {
            $this->client->deleteTable(['TableName' => $this->table]);
        } catch (DynamoDbException $e) {
            self::log("Table {$this->table} does not exist.");
        }
    }
}
