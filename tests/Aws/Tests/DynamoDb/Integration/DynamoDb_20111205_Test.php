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

/**
 * @group example
 * @group integration
 * @outputBuffering enabled
 */
class DynamoDb_20111205_Test extends \Aws\Tests\IntegrationTestCase
{
    protected $client;

    public static function setUpBeforeClass()
    {
        $client = self::getServiceBuilder()->get('dynamodb', true);
        // Delete the table if it exists
        try {
            $client->deleteTable(array('TableName' => 'errors'));
        } catch (\Exception $e) {}

        // Wait until the table is deleted before beginning the examples
        $client->waitUntilTableNotExists(array('TableName' => 'errors'));
    }

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('dynamodb', true);
    }

    /**
     * Create a table with an optional RangeKeyElement
     *
     * @example Aws\DynamoDb\DynamoDbClient::createTable
     */
    public function testCreateTable()
    {
        $client = $this->client;
        // @begin

        // Create an "errors" table
        $client->createTable(array(
            'TableName' => 'errors',
            'KeySchema' => array(
                'HashKeyElement' => array(
                    'AttributeName' => 'id',
                    'AttributeType' => 'N'
                ),
                'RangeKeyElement' => array(
                    'AttributeName' => 'time',
                    'AttributeType' => 'N'
                )
            ),
            'ProvisionedThroughput' => array(
                'ReadCapacityUnits'  => 10,
                'WriteCapacityUnits' => 20
            )
        ));
    }

    /**
     * @depends testCreateTable
     */
    public function testWaitUntilTableExists()
    {
        $client = $this->client;
        // @begin

        // Wait until the table is created and active
        $client->waitUntilTableExists(array(
            'TableName' => 'errors'
        ));
    }

    /**
     * Describe a table and grab data from the output
     *
     * @depends testCreateTable
     * @example Aws\DynamoDb\DynamoDbClient::describeTable
     */
    public function testDescribeTable()
    {
        $client = $this->client;
        $this->expectOutputString("0\n10\n");
        // @begin

        $result = $client->describeTable(array(
            'TableName' => 'errors'
        ));

        // The result of an operation can be used like an array
        echo $result['Table']['ItemCount'] . "\n";
        //> 0

        // Use the getPath() method to retrieve deeply nested array key values
        echo $result->getPath('Table/ProvisionedThroughput/ReadCapacityUnits') . "\n";
        //> 10
    }

    /**
     * List the first page of results of tables owned by your account
     *
     * @depends testDescribeTable
     * @example Aws\DynamoDb\DynamoDbClient::listTable
     */
    public function testListTables()
    {
        $client = $this->client;
        // @begin

        $result = $client->listTables();

        // TableNames contains an array of table names
        foreach ($result['TableNames'] as $tableName) {
            echo $tableName . "\n";
        }

        // @end
        $this->assertContains("errors\n", $this->getActualOutput());
    }

    /**
     * List all of the tables owned by your account using a ListTables iterator
     *
     * @depends testListTables
     * @example Aws\DynamoDb\DynamoDbClient::listTable
     */
    public function testListTablesWithIterator()
    {
        $client = $this->client;
        // @begin

        $iterator = $client->getIterator('ListTables');

        foreach ($iterator as $tableName) {
            echo $tableName . "\n";
        }

        // @end
        $this->assertContains("errors\n", $this->getActualOutput());
    }

    /**
     * Put an item in a table using the formatAttributes() client helper method
     *
     * @depends testListTablesWithIterator
     * @example Aws\DynamoDb\DynamoDbClient::putItem
     * @example Aws\DynamoDb\DynamoDbClient::formatAttributes
     */
    public function testAddItem()
    {
        $client = $this->client;
        // @begin

        $time = time();

        $result = $client->putItem(array(
            'TableName' => 'errors',
            'Item' => $client->formatAttributes(array(
                'id'      => 1201,
                'time'    => $time,
                'error'   => 'Executive overflow',
                'message' => 'no vacant areas'
            ))
        ));

        // The result will always contain ConsumedCapacityUnits
        echo $result['ConsumedCapacityUnits'] . "\n";

        // @end
        $this->assertNotEmpty($this->getActualOutput());
        return $time;
    }

    /**
     * Put an item in a table
     *
     * @depends testAddItem
     * @example Aws\DynamoDb\DynamoDbClient::putItem
     */
    public function testAddItemWithoutHelperMethod($time)
    {
        $client = $this->client;
        // @begin

        $result = $client->putItem(array(
            'TableName' => 'errors',
            'Item' => array(
                'id'      => array('N' => '1201'),
                'time'    => array('N' => $time),
                'error'   => array('S' => 'Executive overflow'),
                'message' => array('S' => 'no vacant areas')
            )
        ));

        // @end
        return $time;
    }

    /**
     * Get an item from a table and interact with the response
     *
     * @depends testAddItemWithoutHelperMethod
     * @example Aws\DynamoDb\DynamoDbClient::getItem
     */
    public function testGetItem($time)
    {
        $client = $this->client;
        $this->expectOutputString("1201\n1201\nExecutive overflow\nno vacant areas\n");
        // @begin

        $result = $client->getItem(array(
            'ConsistentRead' => true,
            'TableName' => 'errors',
            'Key'       => array(
                'HashKeyElement'  => array('N' => '1201'),
                'RangeKeyElement' => array('N' => $time)
            )
        ));

        // Grab value from the result object like an array
        echo $result['Item']['id']['N'] . "\n";
        //> 1201
        echo $result->getPath('Item/id/N') . "\n";
        //> 1201
        echo $result['Item']['error']['S'] . "\n";
        //> Executive overflow
        echo $result['Item']['message']['S'] . "\n";
        //> no vacant areas
    }

    /**
     * Get all results of a Query operation using a Query iterator
     *
     * @depends testGetItem
     * @example Aws\DynamoDb\DynamoDbClient::query
     */
    public function testQuery()
    {
        $client = $this->client;
        // @begin

        $iterator = $client->getIterator('Query', array(
            'TableName'         => 'errors',
            'HashKeyValue'      => array('N' => '1201'),
            'RangeKeyCondition' => array(
                'AttributeValueList' => array(
                    array('N' => strtotime("-15 minutes"))
                ),
                'ComparisonOperator' => 'GT'
            )
        ));

        // Each item will contain the attributes we added
        foreach ($iterator as $item) {
            // Grab the time number value
            echo $item['time']['N'] . "\n";
            // Grab the error string value
            echo $item['error']['S'] . "\n";
        }

        // @end
        $this->assertNotEmpty($this->getActualOutput());
    }

    /**
     * Get all of the results of a Scan operation using a Scan iterator
     *
     * @depends testQuery
     * @example Aws\DynamoDb\DynamoDbClient::scan
     */
    public function testScan()
    {
        $client = $this->client;
        // @begin

        $iterator = $client->getIterator('Scan', array(
            'TableName' => 'errors',
            'ScanFilter' => array(
                'error' => array(
                    'AttributeValueList' => array(array('S' => 'overflow')),
                    'ComparisonOperator' => 'CONTAINS'
                ),
                'time' => array(
                    'AttributeValueList' => array(
                        array('N' => strtotime('-15 minutes'))
                    ),
                    'ComparisonOperator' => 'GT'
                )
            )
        ));

        // Each item will contain the attributes we added
        foreach ($iterator as $item) {
            // Grab the time number value
            echo $item['time']['N'] . "\n";
            // Grab the error string value
            echo $item['error']['S'] . "\n";
        }

        // @end
        $this->assertNotEmpty($this->getActualOutput());
    }

    /**
     * Delete a table
     *
     * @depends testScan
     * @example Aws\DynamoDb\DynamoDbClient::deleteTable
     */
    public function testDeleteTable()
    {
        $client = $this->client;
        // @begin

        $client->deleteTable(array(
            'TableName' => 'errors'
        ));
    }
}
