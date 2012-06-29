<?php

namespace Aws\Tests\DynamoDb\Performance;

use Aws\DynamoDb\Exception\ResourceNotFoundException;
use Aws\DynamoDb\Exception\DynamoDbException;
use Guzzle\Service\Inspector;

/**
 * @group performance
 */
class PutItemTest extends \Aws\Tests\IntegrationTestCase
{
    const TOTAL_REQUESTS = 10;
    const READ_CAPACITY = 10;

    protected static function getTableName()
    {
        return self::getResourcePrefix() . '_put_item_perf';
    }

    public static function setUpBeforeClass()
    {
        $client = self::getServiceBuilder()->get('dynamo_db');

        // Get a list of tables in your account
        self::log('Checking if the ' . self::getTableName() . ' table exists');
        $tables = $client->getIterator('ListTables')->toArray();

        // If the table does not exist, then create it
        if (!in_array(self::getTableName(), $tables)) {

            self::log('Table does not exist. Creating now.');
            $client->createTable(array(
                'TableName' => self::getTableName(),
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
                    'ReadCapacityUnits'  => self::READ_CAPACITY,
                    'WriteCapacityUnits' => 5
                )
            ));

            // Wait until the table is created and active
            $client->waitUntil('TableExists', self::getTableName());
        }

        try {
            // Check if the item exists
            self::log('Checking if the test item exists');
            $client->getItem(array(
                'TableName' => self::getTableName(),
                'Key' => array(
                    'HashKeyElement' => array(
                        'S' => 'fizz',
                    ),
                    'RangeKeyElement' => array(
                        'N' => '1'
                    )
                )
            ));
            self::log('Item exists');
        } catch (ResourceNotFoundException $e) {
            // Add the test item if it does not exist
            self::log('Test item does not exist. Creating now.');
            $client->putItem(array(
                'TableName' => self::getTableName(),
                'Item'      => $client->formatAttributes(array(
                    'foo'   => 'fizz',
                    'bar'   => 1,
                    'attr1' => 42,
                    'attr2' => array('a', 'b', 'c', 'd')
                ))
            ));
        } catch (DynamoDbException $e) {
            echo $e->getResponse()->getRequest();
            echo $e->getResponse();
            echo $e->getMessage();
            throw $e;
        }

        self::log('Initialization process completed');

        // Disable type validation for the purpose of this perf test
        Inspector::getInstance()->setTypeValidation(false);
    }

    public function testPutsOneThousandItems()
    {
        $client = self::getServiceBuilder()->get('dynamo_db');
        $retries = 0;
        $totalRequests = self::TOTAL_REQUESTS;

        $this->log('Beginning performance test');

        $s = microtime(true);

        // Create the command to be execute 1000 times
        $command = $command = $client->getCommand('GetItem', array(
            'TableName' => self::getTableName(),
            'Key' => array(
                'HashKeyElement' => array(
                    'S' => 'fizz',
                ),
                'RangeKeyElement' => array(
                    'N' => '1'
                )
            )
        ));

        for ($i = 0; $i < $totalRequests; $i++) {
            $command->execute();
            $params = $command->getRequest()->getParams();
            $retries += $params->get('plugins.exponential_backoff.retry_count');
            $params->set('plugins.exponential_backoff.retry_count', 0);
        }

        $elapsed = microtime(true) - $s;

        $speed = $totalRequests / $elapsed;
        $perRequest = $elapsed / $totalRequests;
        $this->log("Got {$totalRequests} items in {$elapsed} seconds from a " . self::READ_CAPACITY . " table with {$retries} retries ({$perRequest}/request, {$speed}/second)");
    }
}
