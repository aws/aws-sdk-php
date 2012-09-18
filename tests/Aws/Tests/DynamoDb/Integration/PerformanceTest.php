<?php

namespace Aws\Tests\DynamoDb\Integration;

use Aws\DynamoDb\Exception\ResourceNotFoundException;
use Aws\DynamoDb\Exception\DynamoDbException;

/**
 * @group performance
 */
class PerformanceTest extends \Aws\Tests\IntegrationTestCase
{
    const TOTAL_REQUESTS = 10;
    const READ_CAPACITY = 10;

    protected static function getTableName()
    {
        return self::getResourcePrefix() . '_put_item_perf';
    }

    public static function setUpBeforeClass()
    {
        $client = self::getServiceBuilder()->get('dynamodb');

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
        } else {
            // Wait until the table is active
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
    }

    /**
     * @return array
     */
    public function perfDataProvider()
    {
        $client = self::getServiceBuilder()->get('dynamodb');

        return array(
            array(
                self::TOTAL_REQUESTS,
                $client->getCommand('PutItem', array(
                    'TableName' => self::getTableName(),
                    'Item'      => $client->formatAttributes(array(
                        'foo'   => 'fizz',
                        'bar'   => 1,
                        'attr1' => 42,
                        'attr2' => array('a', 'b', 'c', 'd')
                    ))
                )
            )),
            array(
                self::TOTAL_REQUESTS,
                $client->getCommand('GetItem', array(
                    'TableName' => self::getTableName(),
                    'Key' => array(
                        'HashKeyElement' => array(
                            'S' => 'abcdefghijklm' . implode('-', range('a', 'z')),
                        ),
                        'RangeKeyElement' => array(
                            'N' => '1'
                        )
                    )
                ))
            )
        );
    }

    /**
     * @dataProvider perfDataProvider
     */
    public function testIssuesMultipleOperationsSerially($totalRequests, $command)
    {
        $retries = 0;
        $this->log('Beginning ' . $command->getName() . ' performance test');
        $s = microtime(true);

        for ($i = 0; $i < $totalRequests; $i++) {
            try {
                $command->execute();
            } catch (\Exception $e) {
                echo $command->getRequest();
                echo $command->getResponse();
                throw $e;
            }
            $params = $command->getRequest()->getParams();
            $retries += $params->get('plugins.exponential_backoff.retry_count');
            $params->set('plugins.exponential_backoff.retry_count', 0);
        }

        $elapsed = microtime(true) - $s;

        $speed = $totalRequests / $elapsed;
        $perRequest = $elapsed / $totalRequests;
        $this->log(
            "Executed {$totalRequests} " . $command->getName() . " requests in {$elapsed} seconds from a "
             . self::READ_CAPACITY . " table with {$retries} retries ({$perRequest}/request, {$speed}/second)"
        );
    }
}
