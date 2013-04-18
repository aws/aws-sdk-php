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
                'AttributeDefinitions' => array(
                    array('AttributeName' => 'foo', 'AttributeType' => 'S'),
                    array('AttributeName' => 'bar', 'AttributeType' => 'N'),
                ),
                'KeySchema' => array(
                    array('AttributeName' => 'foo', 'KeyType' => 'HASH'),
                    array('AttributeName' => 'bar', 'KeyType' => 'RANGE'),
                ),
                'ProvisionedThroughput' => array(
                    'ReadCapacityUnits'  => self::READ_CAPACITY,
                    'WriteCapacityUnits' => 5
                )
            ));
        }

        // Wait until the table is created and active
        $client->waitUntil('TableExists', array('TableName' => self::getTableName()));
        sleep(5);

        try {
            self::log('Creating the test item');
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
                        'foo' => array('S' => 'abcdefghijklm' . implode('-', range('a', 'z'))),
                        'bar' => array('N' => '1')
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
