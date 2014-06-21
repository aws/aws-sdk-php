<?php
namespace Aws\Test\DynamoDb\Session;

use Aws\DynamoDb\Session\SessionHandler;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\DynamoDb\Session\SessionHandler
 */
class SessionHandlerTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testCanCreateSessionHandler()
    {
        $client = $this->getTestSdk()->getDynamoDb();
        $sh1 = SessionHandler::fromClient($client);
        $sh2 = SessionHandler::fromClient($client, ['locking' => true]);

        $this->assertInstanceOf(
            'Aws\DynamoDb\Session\StandardSessionConnection',
            $this->readAttribute($sh1, 'connection')
        );
        $this->assertInstanceOf(
            'Aws\DynamoDb\Session\LockingSessionConnection',
            $this->readAttribute($sh2, 'connection')
        );
    }
}
