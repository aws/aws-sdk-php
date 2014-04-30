<?php
namespace Aws\Test\Service\DynamoDb\Session;

use Aws\Service\DynamoDb\Session\SessionHandler;
use Aws\Test\UsesServiceClientTrait;

/**
 * @covers Aws\Service\DynamoDb\Session\SessionHandler
 */
class SessionHandlerTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceClientTrait;

    public function testCanCreateSessionHandler()
    {
        $client = $this->getTestSdk()->getDynamoDb();
        $sh1 = SessionHandler::fromClient($client);
        $sh2 = SessionHandler::fromClient($client, ['locking' => true]);

        $this->assertInstanceOf(
            'Aws\Service\DynamoDb\Session\StandardSessionConnection',
            $this->readAttribute($sh1, 'connection')
        );
        $this->assertInstanceOf(
            'Aws\Service\DynamoDb\Session\LockingSessionConnection',
            $this->readAttribute($sh2, 'connection')
        );
    }
}
