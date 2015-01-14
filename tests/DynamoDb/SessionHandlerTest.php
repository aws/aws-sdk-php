<?php
namespace Aws\Test\DynamoDb;

use Aws\DynamoDb\SessionHandler;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\DynamoDb\SessionHandler
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
            'Aws\DynamoDb\StandardSessionConnection',
            $this->readAttribute($sh1, 'connection')
        );
        $this->assertInstanceOf(
            'Aws\DynamoDb\LockingSessionConnection',
            $this->readAttribute($sh2, 'connection')
        );
    }

    public function testHandlerFunctions()
    {
        $data = ['fizz' => 'buzz'];
        $connection = $this->getMockForAbstractClass(
            'Aws\DynamoDb\SessionConnectionInterface'
        );
        $connection->expects($this->any())
            ->method('read')
            ->willReturn([
                'expires' => time() - 1000,
                'data' => ['fizz' => 'buzz'],
            ]);
        $connection->expects($this->any())
            ->method('write')
            ->willReturnOnConsecutiveCalls(false, true);
        $connection->expects($this->any())
            ->method('delete')
            ->willReturn(true);

        $sh = new SessionHandler($connection);
        session_id('test');
        $this->assertTrue($sh->open('foo', 'bar'));
        $this->assertEquals('', $sh->read('test'));
        $this->assertFalse($sh->write('test', serialize($data)));
        $this->assertTrue($sh->close());
    }
}
