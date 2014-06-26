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
use Aws\DynamoDb\Iterator\ItemIterator;

/**
 * @group example
 * @group integration
 * @outputBuffering enabled
 */
class DynamoDb_20120810_Test extends \Aws\Tests\IntegrationTestCase
{
    /** @var DynamoDbClient */
    protected $client;

    public static function setUpBeforeClass()
    {
        /** @var $client DynamoDbClient */
        $client = self::getServiceBuilder()->get('dynamodb', array('version' => '2012-08-10'));

        // Delete the errors table if it exists
        try {
            $client->deleteTable(array('TableName' => 'errors'));
            $client->waitUntil('TableNotExists', array('TableName' => 'errors'));
        } catch (\Exception $e) {}

        // Delete the Orders table if it exists
        try {
            $client->deleteTable(array('TableName' => 'Orders'));
            $client->waitUntil('TableNotExists', array('TableName' => 'Orders'));
        } catch (\Exception $e) {}
    }

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('dynamodb', array('version' => '2012-08-10'));
    }

    /**
     * Create a table with a hash key and range key
     *
     * @example Aws\DynamoDb\DynamoDbClient::createTable 2012-08-10
     */
    public function testCreateTable()
    {
        $client = $this->client;
        // @begin

        // Create an "errors" table
        $client->createTable(array(
            'TableName' => 'errors',
            'AttributeDefinitions' => array(
                array(
                    'AttributeName' => 'id',
                    'AttributeType' => 'N'
                ),
                array(
                    'AttributeName' => 'time',
                    'AttributeType' => 'N'
                )
            ),
            'KeySchema' => array(
                array(
                    'AttributeName' => 'id',
                    'KeyType'       => 'HASH'
                ),
                array(
                    'AttributeName' => 'time',
                    'KeyType'       => 'RANGE'
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
     * @example Aws\DynamoDb\DynamoDbClient::waitUntilTableExists 2012-08-10
     */
    public function testWaitUntilTableExists()
    {
        $client = $this->client;
        // @begin

        // Wait until the table is created and active
        $client->waitUntil('TableExists', array(
            'TableName' => 'errors'
        ));
    }

    /**
     * Update a table to change the provisioned throughput
     *
     * @depends testWaitUntilTableExists
     * @example Aws\DynamoDb\DynamoDbClient::updateTable 2012-08-10
     * @example Aws\DynamoDb\DynamoDbClient::waitUntilTableExists 2012-08-10
     */
    public function testUpdateTable()
    {
        $client = $this->client;
        // @begin

        // Update the provisioned throughput capacity of the table
        $client->updateTable(array(
            'TableName' => 'errors',
            'ProvisionedThroughput' => array(
                'ReadCapacityUnits'  => 15,
                'WriteCapacityUnits' => 25
            )
        ));

        // Wait until the table is active again after updating
        $client->waitUntil('TableExists', array(
            'TableName' => 'errors'
        ));
    }

    /**
     * Describe a table and grab data from the output
     *
     * @depends testUpdateTable
     * @example Aws\DynamoDb\DynamoDbClient::describeTable 2012-08-10
     */
    public function testDescribeTable()
    {
        $client = $this->client;
        $this->expectOutputString("0\n15\n");
        // @begin

        $result = $client->describeTable(array(
            'TableName' => 'errors'
        ));

        // The result of an operation can be used like an array
        echo $result['Table']['ItemCount'] . "\n";
        //> 0

        // Use the getPath() method to retrieve deeply nested array key values
        echo $result->getPath('Table/ProvisionedThroughput/ReadCapacityUnits') . "\n";
        //> 15
    }

    /**
     * List the first page of results of tables owned by your account
     *
     * @depends testDescribeTable
     * @example Aws\DynamoDb\DynamoDbClient::listTables 2012-08-10
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
     * @example Aws\DynamoDb\DynamoDbClient::listTable 2012-08-10
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
     * @example Aws\DynamoDb\DynamoDbClient::putItem 2012-08-10
     * @example Aws\DynamoDb\DynamoDbClient::formatAttributes 2012-08-10
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
            )),
            'ReturnConsumedCapacity' => 'TOTAL'
        ));

        // The result will always contain ConsumedCapacityUnits
        echo $result->getPath('ConsumedCapacity/CapacityUnits') . "\n";

        // @end
        $this->assertNotEmpty($this->getActualOutput());
        return $time;
    }

    /**
     * Put an item in a table
     *
     * @depends testAddItem
     * @example Aws\DynamoDb\DynamoDbClient::putItem 2012-08-10
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
     * @example Aws\DynamoDb\DynamoDbClient::getItem 2012-08-10
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
                'id'   => array('N' => '1201'),
                'time' => array('N' => $time)
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
     * @example Aws\DynamoDb\DynamoDbClient::query 2012-08-10
     */
    public function testQuery()
    {
        $client = $this->client;
        // @begin

        $iterator = $client->getIterator('Query', array(
            'TableName'     => 'errors',
            'KeyConditions' => array(
                'id' => array(
                    'AttributeValueList' => array(
                        array('N' => '1201')
                    ),
                    'ComparisonOperator' => 'EQ'
                ),
                'time' => array(
                    'AttributeValueList' => array(
                        array('N' => strtotime("-15 minutes"))
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
     * Get all of the results of a Scan operation using a Scan iterator
     *
     * @depends testQuery
     * @example Aws\DynamoDb\DynamoDbClient::scan 2012-08-10
     */
    public function testScan()
    {
        $client = $this->client;
        // @begin

        $iterator = $client->getIterator('Scan', array(
            'TableName' => 'errors',
            'ScanFilter' => array(
                'error' => array(
                    'AttributeValueList' => array(
                        array('S' => 'overflow')
                    ),
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
     * Get normalized results of a Scan operation using a Scan iterator with an ItemIterator
     *
     * @depends testScan
     * @example Aws\DynamoDb\DynamoDbClient::scan 2012-08-10
     * @example Aws\DynamoDb\Iterator\ItemIterator
     */
    public function testScanWithItemIterator()
    {
        $client = $this->client;
        // @begin

        $iterator = new ItemIterator($client->getIterator('Scan', array(
            'TableName' => 'errors'
        )));

        // Each item will contain the attributes we added
        foreach ($iterator as $item) {
            // Grab the time number value
            echo $item['time'] . "\n";
            // Grab the error string value
            echo $item->get('error') . "\n";
        }

        // @end
        $this->assertNotEmpty($this->getActualOutput());
    }

    /**
     * Perform a parallel scan of multiple table segments
     *
     * @depends testScanWithItemIterator
     * @example Aws\DynamoDb\DynamoDbClient::scan 2012-08-10
     */
    public function testParallelScan()
    {
        $client = $this->client;
        // @begin

        $params = array(
            'TableName' => 'errors',
            'ScanFilter' => array(
                'error' => array(
                    'AttributeValueList' => array(
                        array('S' => 'overflow')
                    ),
                    'ComparisonOperator' => 'CONTAINS'
                ),
            ),
            'TotalSegments' => 2
        );

        $scanCommands = array();
        $scanCommands[] = $client->getCommand('Scan', array('Segment' => 0) + $params);
        $scanCommands[] = $client->getCommand('Scan', array('Segment' => 1) + $params);
        $client->execute($scanCommands);

        foreach ($scanCommands as $scanCommand) {
            $result = $scanCommand->getResult();
            foreach ($result->get('Items') as $item) {
                echo $item['error']['S'] . "\n";
            }
        }

        // @end
        $this->assertNotEmpty($this->getActualOutput());
    }

    /**
     * Put and get an item with a binary attribute
     *
     * @depends testParallelScan
     * @example Aws\DynamoDb\DynamoDbClient::putItem 2012-08-10
     * @example Aws\DynamoDb\DynamoDbClient::getItem 2012-08-10
     */
    public function testBinaryType()
    {
        $client = $this->client;
        // @begin

        $data = '¡™£¢∞§¶•ªº';
        $time = time();

        $client->putItem(array(
            'TableName' => 'errors',
            'Item'      => array(
                'id'    => array('N' => '3000'),
                'time'  => array('N' => $time),
                'error' => array('S' => 'Out of bounds'),
                'data'  => array('B' => $data)
            )
        ));

        $result = $client->getItem(array(
            'ConsistentRead' => true,
            'TableName' => 'errors',
            'Key' => array(
                'id'  => array('N' => '3000'),
                'time' => array('N' => $time)
            )
        ));

        if (base64_decode($result['Item']['data']['B']) == $data) {
            echo 'Data was stored and retrieved correctly.';
        } else {
            echo 'Uh oh...';
        }
        //> Data was stored and retrieved correctly.

        // @end
        $this->assertEquals('Data was stored and retrieved correctly.', $this->getActualOutput());
    }

    /**
     * Get batches of items
     *
     * @depends testBinaryType
     * @example Aws\DynamoDb\DynamoDbClient::batchGetItem 2012-08-10
     */
    public function testBatchGetItem()
    {
        $client = $this->client;

        $keyValues = array();
        $scan = $client->getIterator('Scan', array('TableName' => 'errors'));
        foreach ($scan as $item) {
            $keyValues[] = array($item['id']['N'], $item['time']['N']);
        }
        // @begin

        $tableName = 'errors';
        $keys = array();

        // Given that $keyValues contains a list of your hash and range keys:
        //     array(array(<hash>, <range>), ...)
        // Build the array for the "Keys" parameter
        foreach ($keyValues as $values) {
            list($hashKeyValue, $rangeKeyValue) = $values;
            $keys[] = array(
                'id'   => array('N' => $hashKeyValue),
                'time' => array('N' => $rangeKeyValue)
            );
        }

        // Get multiple items by key in a BatchGetItem request
        $result = $client->batchGetItem(array(
            'RequestItems' => array(
                $tableName => array(
                    'Keys'           => $keys,
                    'ConsistentRead' => true
                )
            )
        ));
        $items = $result->getPath("Responses/{$tableName}");
        // @end

        $this->assertEquals(count($keys), count($items));

        // Also check the iterator to make sure it works the same
        $iterator = $client->getIterator('BatchGetItem', array(
            'RequestItems' => array(
                $tableName => array(
                    'Keys' => $keys
                )
            )
        ));
        $iteratedItems = iterator_to_array($iterator);
        print_r($iteratedItems);
        $this->assertEquals(count($keys), count($iteratedItems));
    }

    /**
     * Delete an item
     *
     * @depends testBatchGetItem
     * @example Aws\DynamoDb\DynamoDbClient::deleteItem 2012-08-10
     * @example Aws\DynamoDb\DynamoDbClient::scan 2012-08-10
     */
    public function testDeleteItem()
    {
        $client = $this->client;
        // @begin

        $scan = $client->getIterator('Scan', array('TableName' => 'errors'));
        foreach ($scan as $item) {
            $client->deleteItem(array(
                'TableName' => 'errors',
                'Key' => array(
                    'id'   => array('N' => $item['id']['N']),
                    'time' => array('N' => $item['time']['N'])
                )
            ));
        }
    }

    /**
     * Delete a table
     *
     * @depends testDeleteItem
     * @example Aws\DynamoDb\DynamoDbClient::deleteTable 2012-08-10
     */
    public function testDeleteTable()
    {
        $client = $this->client;
        // @begin

        $client->deleteTable(array(
            'TableName' => 'errors'
        ));

        $client->waitUntil('TableNotExists', array(
            'TableName' => 'errors'
        ));
    }

    /**
     * Create a table with a local secondary index
     *
     * @example Aws\DynamoDb\DynamoDbClient::createTable 2012-08-10
     */
    public function testCreateTableWithLocalSecondaryIndexes()
    {
        $client = $this->client;
        // @begin

        // Create an "Orders" table
        $client->createTable(array(
            'TableName' => 'Orders',
            'AttributeDefinitions' => array(
                array('AttributeName' => 'CustomerId', 'AttributeType' => 'N'),
                array('AttributeName' => 'OrderId',    'AttributeType' => 'N'),
                array('AttributeName' => 'OrderDate',  'AttributeType' => 'N'),
            ),
            'KeySchema' => array(
                array('AttributeName' => 'CustomerId', 'KeyType' => 'HASH'),
                array('AttributeName' => 'OrderId',    'KeyType' => 'RANGE'),
            ),
            'LocalSecondaryIndexes' => array(
                array(
                    'IndexName' => 'OrderDateIndex',
                    'KeySchema' => array(
                        array('AttributeName' => 'CustomerId', 'KeyType' => 'HASH'),
                        array('AttributeName' => 'OrderDate',  'KeyType' => 'RANGE'),
                    ),
                    'Projection' => array(
                        'ProjectionType' => 'KEYS_ONLY',
                    ),
                ),
            ),
            'ProvisionedThroughput' => array(
                'ReadCapacityUnits'  => 10,
                'WriteCapacityUnits' => 20
            )
        ));

        $client->waitUntil('TableExists', array('TableName' => 'Orders'));
    }

    /**
     * Use BatchWriteItem to put multiple items at once
     *
     * @depends testCreateTableWithLocalSecondaryIndexes
     * @example Aws\DynamoDb\DynamoDbClient::batchWriteItem 2012-08-10
     */
    public function testBatchWriteItem()
    {
        $client = $this->client;
        // @begin

        $result = $client->batchWriteItem(array(
            'RequestItems' => array(
                'Orders' => array(
                    array(
                        'PutRequest' => array(
                            'Item' => array(
                                'CustomerId' => array('N' => 1041),
                                'OrderId'    => array('N' => 6),
                                'OrderDate'  => array('N' => strtotime('-5 days')),
                                'ItemId'     => array('N' => 25336)
                            )
                        )
                    ),
                    array(
                        'PutRequest' => array(
                            'Item' => array(
                                'CustomerId' => array('N' => 941),
                                'OrderId'    => array('N' => 8),
                                'OrderDate'  => array('N' => strtotime('-3 days')),
                                'ItemId'     => array('N' => 15596)
                            )
                        )
                    ),
                    array(
                        'PutRequest' => array(
                            'Item' => array(
                                'CustomerId' => array('N' => 941),
                                'OrderId'    => array('N' => 2),
                                'OrderDate'  => array('N' => strtotime('-12 days')),
                                'ItemId'     => array('N' => 38449)
                            )
                        )
                    ),
                    array(
                        'PutRequest' => array(
                            'Item' => array(
                                'CustomerId' => array('N' => 941),
                                'OrderId'    => array('N' => 3),
                                'OrderDate'  => array('N' => strtotime('-1 days')),
                                'ItemId'     => array('N' => 25336)
                            )
                        )
                    )
                )
            )
        ));
    }

    /**
     * Get results of a Query operation with a local secondary index on the table
     *
     * @depends testBatchWriteItem
     * @example Aws\DynamoDb\DynamoDbClient::query 2012-08-10
     */
    public function testQueryWithLocalSecondaryIndexes()
    {
        $client = $this->client;
        // @begin

        // Find the number of orders made by customer 941 in the last 10 days
        $result = $client->query(array(
            'TableName'     => 'Orders',
            'IndexName'     => 'OrderDateIndex',
            'Select'        => 'COUNT',
            'KeyConditions' => array(
                'CustomerId' => array(
                    'AttributeValueList' => array(
                        array('N' => '941')
                    ),
                    'ComparisonOperator' => 'EQ'
                ),
                'OrderDate' => array(
                    'AttributeValueList' => array(
                        array('N' => strtotime("-10 days"))
                    ),
                    'ComparisonOperator' => 'GE'
                )
            )
        ));

        $numOrders = $result['Count'];

        // @end
        $this->assertEquals(2, $numOrders);
    }

    /**
     * @depends testQueryWithLocalSecondaryIndexes
     */
    public function testDeleteIndexedTable()
    {
        $this->client->deleteTable(array(
            'TableName' => 'Orders'
        ));
    }
}
