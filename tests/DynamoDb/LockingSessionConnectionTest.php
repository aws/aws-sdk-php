<?php
namespace Aws\Test\DynamoDb;

use Aws\DynamoDb\LockingSessionConnection;
use Aws\Result;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\DynamoDb\LockingSessionConnection
 */
class LockingSessionConnectionTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testReadRetrievesItemData()
    {
        $client = $this->getTestSdk()->getDynamoDb();
        $this->addMockResults($client, [
            $this->createMockAwsException(
                'ConditionalCheckFailedException',
                'Aws\Exception\DynamoDbException'
            ),
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
}
