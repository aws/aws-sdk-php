<?php
namespace Aws\Test\DynamoDb;

use Aws\CommandInterface;
use Aws\DynamoDb\StandardSessionConnection;
use Aws\Middleware;
use Aws\Result;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\DynamoDb\StandardSessionConnection
 */
class StandardSessionConnectionTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testReadRetrievesItemData()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [
            new Result(['Item' => [
                'sessionid' => ['S' => 'session1'],
                'otherkey'  => ['S' => 'foo'],
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
            ['sessionid' => 'session1', 'otherkey' => 'foo'],
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
        }));
        $connection = new StandardSessionConnection($client);
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
     * @expectedException \PHPUnit_Framework_Error_Warning
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
     * @expectedException \PHPUnit_Framework_Error_Warning
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
