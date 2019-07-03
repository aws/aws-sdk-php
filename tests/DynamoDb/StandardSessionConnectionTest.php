<?php
namespace Aws\Test\DynamoDb;

use Aws\CommandInterface;
use Aws\DynamoDb\StandardSessionConnection;
use Aws\Middleware;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\DynamoDb\StandardSessionConnection
 */
class StandardSessionConnectionTest extends TestCase
{
    use UsesServiceTrait;

    public function testStandardConfig()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $scc = new StandardSessionConnection($client);
        $this->assertEquals('sessions', $scc->getTableName());
        $this->assertEquals('id', $scc->getHashKey());
        $this->assertEquals('data', $scc->getDataAttribute());
        $this->assertEquals('string', $scc->getDataAttributeType());
        $this->assertEquals((int) ini_get('session.gc_maxlifetime'), $scc->getSessionLifetime());
        $this->assertEquals('expires', $scc->getSessionLifetimeAttribute());
        $this->assertTrue($scc->isConsistentRead());
        $this->assertFalse($scc->isLocking());
        $this->assertEquals(10, $scc->getMaxLockWaitTime());
        $this->assertEquals(10000, $scc->getMinLockRetryMicrotime());
        $this->assertEquals(50000, $scc->getMaxLockRetryMicrotime());
    }

    public function testCustomConfig()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $config = [
            'table_name'                    => 'sessions_custom',
            'hash_key'                      => 'id_custom',
            'data_attribute'                => 'data_custom',
            'data_attribute_type'           => 'binary',
            'session_lifetime'              => 2019,
            'session_lifetime_attribute'    => 'expires_custom',
            'consistent_read'               => false,
            'batch_config'                  => ['hello' => 'hello'],
            'locking'                       => true,
            'max_lock_wait_time'            => 2019,
            'min_lock_retry_microtime'      => 2019,
            'max_lock_retry_microtime'      => 2019
        ];
        $scc = new StandardSessionConnection($client, $config);
        $this->assertEquals('sessions_custom', $scc->getTableName());
        $this->assertEquals('id_custom', $scc->getHashKey());
        $this->assertEquals('data_custom', $scc->getDataAttribute());
        $this->assertEquals('binary', $scc->getDataAttributeType());
        $this->assertEquals(2019, $scc->getSessionLifetime());
        $this->assertEquals('expires_custom', $scc->getSessionLifetimeAttribute());
        $this->assertFalse($scc->isConsistentRead());
        $this->assertTrue($scc->isLocking());
        $this->assertEquals(2019, $scc->getMaxLockWaitTime());
        $this->assertEquals(2019, $scc->getMinLockRetryMicrotime());
        $this->assertEquals(2019, $scc->getMaxLockRetryMicrotime());
    }

    public function testReadRetrievesItemData()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [
            new Result(['Item' => [
                'sessionid' => ['S' => 'session1'],
                'otherkey'  => ['S' => 'foo'],
                'binarykey' => ['B' => 'bar']
            ]]),
        ]);
        
        $client->getHandlerList()->appendBuild(Middleware::tap(function ($command) {
            $this->assertEquals(
                ['sessionid' => ['S' => 'session1']],
                $command['Key']
            );
        }));
        
        $connection = new StandardSessionConnection($client, [
            'hash_key' => 'sessionid',
        ]);
        $data = $connection->read('session1');

        $this->assertEquals(
            ['sessionid' => 'session1', 'otherkey' => 'foo', 'binarykey' => 'bar'],
            $data
        );
    }

    public function testReadReturnsEmptyArrayIfNoItem()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [
            $this->createMockAwsException('ERROR', 'Aws\DynamoDb\Exception\DynamoDbException')
        ]);
        $connection = new StandardSessionConnection($client);
        $data = $connection->read('session1');

        $this->assertEquals([], $data);
    }

    public function testWriteUpdatesItemData()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [new Result([])]);
        $client->getHandlerList()->appendBuild(Middleware::tap(function ($command) {
            $updates = $command['AttributeUpdates'];
            $this->assertArrayHasKey('expires', $updates);
            $this->assertArrayHasKey('lock', $updates);
            $this->assertArrayHasKey('data', $updates);
            $this->assertArrayHasKey('S', $updates['data']['Value']);
        }));
        $connection = new StandardSessionConnection($client);
        $return = $connection->write('s1', serialize(['foo' => 'bar']), true);
        $this->assertTrue($return);
    }

    public function testWriteUpdatesItemDataAsBinary()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [new Result([])]);
        $client->getHandlerList()->appendBuild(Middleware::tap(function ($command) {
            $updates = $command['AttributeUpdates'];
            $this->assertArrayHasKey('data', $updates);
            $this->assertArrayHasKey('B', $updates['data']['Value']);
        }));
        $connection = new StandardSessionConnection($client, [
            'data_attribute_type' => 'binary',
        ]);
        $return = $connection->write('s1', serialize(['foo' => 'bar']), true);
        $this->assertTrue($return);
    }

    public function testWriteReturnsFalseOnFailure()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [
            $this->createMockAwsException('ERROR', 'Aws\DynamoDb\Exception\DynamoDbException')
        ]);
        $client->getHandlerList()->appendBuild(Middleware::tap(function ($command) {
            $this->assertEquals(
                ['Action' => 'DELETE'],
                $command['AttributeUpdates']['data']
            );
        }));
        $connection = new StandardSessionConnection($client);
        $return = @$connection->write('s1', '', true);

        $this->assertFalse($return);
    }

    /**
     * @expectedException \PHPUnit\Framework\Error\Warning
     */
    public function testWriteTriggersWarningOnFailure()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [
            $this->createMockAwsException('ERROR', 'Aws\DynamoDb\Exception\DynamoDbException')
        ]);
        $client->getHandlerList()->appendBuild(Middleware::tap(function ($command) {
            $this->assertEquals(
                ['Action' => 'DELETE'],
                $command['AttributeUpdates']['data']
            );
        }));
        $connection = new StandardSessionConnection($client);
        $connection->write('s1', '', true);
    }

    public function testDeleteReturnsBoolBasedOnSuccess()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [
             new Result([]),
             $this->createMockAwsException('ERROR', 'Aws\DynamoDb\Exception\DynamoDbException')
        ]);

        $connection = new StandardSessionConnection($client);

        $return = $connection->delete('s1');
        $this->assertTrue($return);

        $return = @$connection->delete('s1');
        $this->assertFalse($return);
    }

    /**
     * @expectedException \PHPUnit\Framework\Error\Warning
     */
    public function testDeleteTriggersWarningOnFailure()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [
            new Result([]),
            $this->createMockAwsException('ERROR', 'Aws\DynamoDb\Exception\DynamoDbException')
        ]);

        $connection = new StandardSessionConnection($client);

        $return = $connection->delete('s1');
        $this->assertTrue($return);

        $connection->delete('s1');
    }

    public function testDeleteExpiredReturnsBoolBasedOnSuccess()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [
            new Result(['LastEvaluatedKey' => ['foo' => ['S' => 'bar']]]),
            new Result(['Items' => [
                ['id' => ['S' => 'foo']],
                ['id' => ['S' => 'bar']],
                ['id' => ['S' => 'baz']],
            ]]),
            new Result(),
        ]);

        $commands = [];
        $client->getHandlerList()->appendBuild(Middleware::tap(
            function (CommandInterface $command) use (&$commands) {
                $commands[] = $command->getName();
            })
        );

        (new StandardSessionConnection($client))->deleteExpired();

        $this->assertEquals(['Scan', 'Scan', 'BatchWriteItem'], $commands);
    }
}
