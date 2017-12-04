<?php
namespace Aws\Test\DynamoDb;

use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\LockingSessionConnection;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\DynamoDb\LockingSessionConnection
 */
class LockingSessionConnectionTest extends TestCase
{
    use UsesServiceTrait;

    public function testReadRetrievesItemData()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [
            $this->createMockAwsException('ConditionalCheckFailedException', DynamoDbException::class),
            new Result(['Attributes' => [
                'sessionid' => ['S' => 'session1'],
                'otherkey'  => ['S' => 'foo'],
            ]]),
        ]);

        $connection = new LockingSessionConnection($client);
        $data = $connection->read('session1');

        $this->assertEquals(
            ['sessionid' => 'session1', 'otherkey' => 'foo'],
            $data
        );
    }

    public function testBailsOnUnexpectedException()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [
            $this->createMockAwsException('Unexpected', DynamoDbException::class),
        ]);

        $connection = new LockingSessionConnection($client);
        $data = $connection->read('session1');

        $this->assertNull($data);
    }
}
