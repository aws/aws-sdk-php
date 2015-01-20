<?php
namespace Aws\Test\DynamoDb;

use Aws\DynamoDb\StandardSessionConnection;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Command\Event\PreparedEvent;

/**
 * @covers Aws\DynamoDb\StandardSessionConnection
 */
class StandardSessionConnectionTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testReadRetrievesItemData()
    {
        $client = $this->getTestSdk()->getDynamoDb();
        $this->addMockResults($client, [
            new Result(['Item' => [
                'sessionid' => ['S' => 'session1'],
                'otherkey'  => ['S' => 'foo'],
            ]]),
        ]);
        $client->getEmitter()->on('prepared', function (PreparedEvent $e) {
            $this->assertEquals(
                ['sessionid' => ['S' => 'session1']],
                $e->getCommand()['Key']
            );
        });

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
        $client = $this->getTestSdk()->getDynamoDb();
        $this->addMockResults($client, [
            $this->createMockAwsException('ERROR', 'Aws\DynamoDb\Exception\DynamoDbException')
        ]);
        $connection = new StandardSessionConnection($client);
        $data = $connection->read('session1');

        $this->assertEquals([], $data);
    }

    public function testWriteUpdatesItemData()
    {
        $client = $this->getTestSdk()->getDynamoDb();
        $this->addMockResults($client, [new Result([])]);
        $client->getEmitter()->on('prepared', function (PreparedEvent $e) {
            $updates = $e->getCommand()['AttributeUpdates'];
            $this->assertArrayHasKey('expires', $updates);
            $this->assertArrayHasKey('lock', $updates);
            $this->assertArrayHasKey('data', $updates);
        });

        $connection = new StandardSessionConnection($client);
        $return = $connection->write('s1', serialize(['foo' => 'bar']), true);

        $this->assertTrue($return);
    }

    public function testWriteReturnsFalseOnFailure()
    {
        $client = $this->getTestSdk()->getDynamoDb();
        $this->addMockResults($client, [
            $this->createMockAwsException('ERROR', 'Aws\DynamoDb\Exception\DynamoDbException')
        ]);
        $client->getEmitter()->on('prepared', function (PreparedEvent $e) {
            $this->assertEquals(
                ['Action' => 'DELETE'],
                $e->getCommand()['AttributeUpdates']['data']
            );
        });

        $connection = new StandardSessionConnection($client);
        $return = $connection->write('s1', '', true);

        $this->assertFalse($return);
    }

    public function testDeleteReturnsBoolBasedOnRSuccess()
    {
        $client = $this->getTestSdk()->getDynamoDb();
        $this->addMockResults($client, [
             new Result([]),
             $this->createMockAwsException('ERROR', 'Aws\DynamoDb\Exception\DynamoDbException')
        ]);

        $connection = new StandardSessionConnection($client);

        $return = $connection->delete('s1');
        $this->assertTrue($return);

        $return = $connection->delete('s1');
        $this->assertFalse($return);
    }

    public function testDeleteReturnsBoolBasedOnSuccess()
    {
        $client = $this->getTestSdk()->getDynamoDb();
        $this->addMockResults($client, [
            new Result(['Items' => [
                ['id' => ['S' => 'foo']],
                ['id' => ['S' => 'bar']],
                ['id' => ['S' => 'baz']],
            ]]),
            new Result([]),
        ]);

        $called = 0;
        $client->getEmitter()->on('prepared', function (PreparedEvent $e) use (&$called) {
            $called++;
            if ($called === 1) {
                $this->assertEquals('Scan', $e->getCommand()->getName());
            } elseif ($called === 2) {
                $this->assertEquals('Scan', $e->getCommand()->getName());
            } else {
                $this->fail('Unexpected state.');
            }
        });

        (new StandardSessionConnection($client))->deleteExpired();
    }
}
