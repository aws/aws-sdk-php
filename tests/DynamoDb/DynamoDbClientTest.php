<?php
namespace Aws\Test\DynamoDb;

use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Stream\Stream;

/**
 * @covers \Aws\DynamoDb\DynamoDbClient
 */
class DynamoDbClientTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testRegisterSessionHandlerReturnsHandler()
    {
        $client = $this->getTestSdk()->getDynamoDb();
        $sh = $client->registerSessionHandler(['locking' => true]);
        $this->assertInstanceOf(
            'Aws\DynamoDb\Session\LockingSessionConnection',
            $this->readAttribute($sh, 'connection')
        );
    }
}
