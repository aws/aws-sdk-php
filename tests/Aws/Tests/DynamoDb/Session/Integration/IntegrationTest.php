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

namespace Aws\Tests\DynamoDb\Session;

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Exception\ResourceNotFoundException;
use Aws\DynamoDb\Model\BatchRequest\PutRequest;
use Aws\DynamoDb\Model\BatchRequest\WriteRequestBatch;
use Aws\DynamoDb\Model\Item;
use Aws\DynamoDb\Session\SessionHandler;
use Aws\Common\Enum\Time;

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
     * @var string Hash key name
     */
    public $hashKey;

    /**
     * @var DynamoDbClient
     */
    public $client;

    /**
     * @var SessionHandler
     */
    public $handler;

    public static function setUpBeforeClass()
    {
        self::deleteSessionsTable();
    }

    public static function tearDownAfterClass()
    {
        self::deleteSessionsTable();
    }

    public function setUp()
    {
        $this->table   = self::getResourcePrefix() . '-php-sessions-test';
        $this->hashKey = 'id';
        $this->client  = self::getServiceBuilder()->get('dynamodb');
    }

    /**
     * Ensures that a DynamoDB table for sessions can be created
     */
    public function testCreatesTable()
    {
        $sh = SessionHandler::factory(array(
            'dynamodb_client' => $this->client,
            'table_name'      => $this->table,
        ));

        self::log("Creating sessions table {$this->table}");
        $sh->createSessionsTable(25, 25);

        self::log("Ensuring the table {$this->table} was created");
        $result = $this->client->describeTable(array('TableName' => $this->table));
        $this->assertEquals($this->table, $result['Table']['TableName']);
    }

    /**
     * Ensures that session storage is working properly
     */
    public function testGeneralSessionStorage()
    {
        session_id('example');
        $sh = SessionHandler::factory(array(
            'dynamodb_client' => $this->client,
            'table_name'      => $this->table,
            'hash_key'        => $this->hashKey,
        ));

        self::log('Start with an empty session, add data, and commit');
        $this->simulateSessionStart($sh);
        $this->assertEquals(array(), $_SESSION, '[1] The session was not empty.');
        $_SESSION['foo'] = 'bar';
        $this->simulateSessionCommit($sh);
        $this->assertEquals(array('foo' => 'bar'), $_SESSION, '[2] The data was not stored in $_SESSION.');
        $_SESSION = array();

        self::log('Check if session data made it into DynamoDB');
        $result = $this->client->getCommand('GetItem', array(
            'TableName' => $this->table,
            'Key' => array(
                $this->hashKey => array(
                    'S' => 'test_example'
                )
            )
        ))->execute();
        $data = unserialize($result['Item']['data']['S']);
        $this->assertArrayHasKey('foo', $data, '[3] The session data was not saved in DynamoDB.');

        self::log('Check if the data was preserved, then destroy the session');
        $this->simulateSessionStart($sh);
        $this->assertEquals(array('foo' => 'bar'), $_SESSION, '[4] The session data was not retrieved.');
        $this->simulateSessionDestroy($sh);

        self::log('Check if session data was deleted in DynamoDB');
        try
        {
            $result = $this->client->getCommand('GetItem', array(
                'TableName' => $this->table,
                'Key' => array(
                    $this->hashKey => array(
                        'S' => 'test_example'
                    )
                )
            ))->execute();
            $result = isset($result['Item']);
        } catch (\Exception $e) {
            $result = false;
        }
        $this->assertFalse($result, '[5] The session data was not deleted from DynamoDB.');

        self::log('Make sure the data does not return after destroying');
        $this->simulateSessionStart($sh);
        $this->assertEquals(array(), $_SESSION, '[6] The session was not properly destroyed.');

        // Clean up
        $this->simulateSessionDestroy($sh);
    }

    /**
     * Ensures that pessimistic locking is really happening correctly
     */
    public function testLockingStrategyDifferences()
    {
        session_id('example');

        self::log('Create 4 instances of the session handler');
        $shNull1 = SessionHandler::factory(array(
            'dynamodb_client' => $this->client,
            'table_name'      => $this->table
        ));

        $shNull2 = SessionHandler::factory(array(
            'dynamodb_client' => $this->client,
            'table_name'      => $this->table
        ));

        $shPessimistic1 = SessionHandler::factory(array(
            'dynamodb_client'    => $this->client,
            'table_name'         => $this->table,
            'locking_strategy'   => 'pessimistic',
            'max_lock_wait_time' => 6,
        ));

        $shPessimistic2 = SessionHandler::factory(array(
            'dynamodb_client'    => $this->client,
            'table_name'         => $this->table,
            'locking_strategy'   => 'pessimistic',
            'max_lock_wait_time' => 6,
        ));

        self::log('Store some session data for reading');
        $this->simulateSessionStart($shNull1);
        $_SESSION['foo'] = 'bar';
        $this->simulateSessionCommit($shNull1);

        self::log('Non-locking, simultaneous reads should happen fast');
        $shNullTime = microtime(true);
        $this->simulateSessionStart($shNull1);
        $this->simulateSessionStart($shNull2);
        $this->simulateSessionCommit($shNull1);
        $shNullTime = microtime(true) - $shNullTime;
        $this->assertLessThan(3, $shNullTime, 'Null locking strategy took longer than expected.');

        self::log('Locking, simultaneous reads should block and timeout');
        $shPessimisticTime = microtime(true);
        $this->simulateSessionStart($shPessimistic1);
        $this->simulateSessionStart($shPessimistic2);
        $this->simulateSessionCommit($shPessimistic1);
        $shPessimisticTime = microtime(true) - $shPessimisticTime;
        $this->assertGreaterThan(5, $shPessimisticTime, 'Pessimistic locking strategy operated faster than expected. Locking may not be occurring.');

        // Clean up
        $this->simulateSessionStart($shNull1);
        $this->simulateSessionDestroy($shNull1);
    }

    /**
     * Ensures that garbage collection functionality is working correctly
     */
    public function testGarbageCollection()
    {
        $currentCount = iterator_count($this->client->getIterator('Scan', array(
            'TableName' => $this->table
        )));

        self::log('Put 10 expired items into the sessions table');
        $writeBatch = WriteRequestBatch::factory($this->client);
        for ($i = 1; $i <= 10; $i++) {
            $writeBatch->add(new PutRequest(Item::fromArray(array(
                'id'      => "example_{$i}",
                'expires' => time() - 5 * Time::SECONDS
            )), $this->table));
        }
        $writeBatch->flush();

        self::log('Assert that all 10 items made it into the sessions table');
        $result = $this->client->getCommand('Scan', array(
            'TableName' => $this->table
        ))->execute();
        $this->assertEquals(10 + $currentCount, $result['Count'], 'Not all of the items were inserted.');

        self::log('Create a session handler to use with a lower batch size');
        $sh = SessionHandler::factory(array(
            'dynamodb_client'    => $this->client,
            'table_name'         => $this->table,
            'gc_batch_size'      => 3, // Smaller batches to test batching works
            'gc_operation_delay' => 3, // Sleep 3 seconds in between operations
        ));

        self::log('Run the garbage collection');
        $gcTime = microtime(true);
        $sh->garbageCollect();
        $gcTime = microtime(true) - $gcTime;
        $this->assertGreaterThan(12, $gcTime, 'The entire garbage collection process should take ~15+ seconds.');

        self::log('Assert that all 10 items were deleted from the sessions table');
        $result = $this->client->getCommand('Scan', array(
            'TableName' => $this->table
        ))->execute();
        $this->assertEquals(0, $result['Count'], 'Not all of the items were removed.');
    }

    protected function simulateSessionStart(SessionHandler $handler)
    {
        $handler->open('dummy', 'test');
        $data = $handler->read('example');
        $_SESSION = unserialize($data) ?: array(); // Instead of session_decode
    }

    protected function simulateSessionCommit(SessionHandler $handler)
    {
        $data = serialize($_SESSION); // Instead of session_encode
        $handler->write('example', $data);
        $handler->close();
    }

    protected function simulateSessionDestroy(SessionHandler $handler)
    {
        $handler->destroy('example');
        $handler->close();
    }

    protected static function deleteSessionsTable()
    {
        $table  = self::getResourcePrefix() . '-php-sessions-test';
        $client = self::getServiceBuilder()->get('dynamodb');

        self::log("# Attempting to delete {$table}");

        try {
            $client->describeTable(array('TableName' => $table));
            // Wait until the table is active
            self::log('Table exists. Waiting until the status is ACTIVE');
            $client->waitUntil('table_exists', array('TableName' => $table));
            // Delete the table to clear out its contents
            self::log('Deleting the table');
            $client->deleteTable(array('TableName' => $table));
            $client->waitUntil('table_not_exists', array('TableName' => $table));
        } catch (ResourceNotFoundException $e) {
            // The table does not exist so we are good
        }

        self::log("{$table} has been deleted.");
    }
}
