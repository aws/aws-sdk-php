<?php
namespace Aws\Test\DynamoDb;

use Aws\DynamoDb\LockingSessionConnection;
use Aws\DynamoDb\SessionConnectionInterface;
use Aws\DynamoDb\SessionHandler;
use Aws\DynamoDb\StandardSessionConnection;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\DynamoDb\SessionHandler
 */
class SessionHandlerTest extends TestCase
{
    use UsesServiceTrait;

    public function testCanCreateSessionHandler()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $sh1 = SessionHandler::fromClient($client);
        $sh2 = SessionHandler::fromClient($client, ['locking' => true]);

        $this->assertInstanceOf(
            StandardSessionConnection::class,
            $this->getPropertyValue($sh1, 'connection')
        );
        $this->assertInstanceOf(
            LockingSessionConnection::class,
            $this->getPropertyValue($sh2, 'connection')
        );
    }

    public function testHandlerFunctions()
    {
        $data = ['fizz' => 'buzz'];
        $connection = $this->getMockForAbstractClass(
            SessionConnectionInterface::class,
            array(),
            '',
            true,
            true,
            true,
            array('getDataAttribute', 'getSessionLifetimeAttribute')
        );
        $connection->expects($this->any())
            ->method('getDataAttribute')
            ->willReturn('data');
        $connection->expects($this->any())
            ->method('getSessionLifetimeAttribute')
            ->willReturn('expires');
        $connection->expects($this->any())
            ->method('read')
            ->willReturn([
                'expires' => time() - 1000,
                'data' => ['fizz' => 'buzz']
            ]);
        $connection->expects($this->any())
            ->method('write')
            ->willReturnOnConsecutiveCalls(false, true);
        $connection->expects($this->any())
            ->method('delete')
            ->willReturn(true);

        $sh = new SessionHandler($connection);
        $this->assertTrue($sh->open('foo', 'bar'));
        $this->assertSame('', $sh->read('test'));
        $this->assertFalse($sh->write('test', serialize($data)));
        $this->assertTrue($sh->close());
    }

    public function testHandlerWhenNothingWritten()
    {
        $connection = $this->getMockForAbstractClass(
            SessionConnectionInterface::class,
            array(),
            '',
            true,
            true,
            true,
            array('getDataAttribute', 'getSessionLifetimeAttribute')
        );
        $connection->expects($this->any())
            ->method('write')
            ->willReturn( true);
        $connection->expects($this->once())
            ->method('read')
            ->withAnyParameters('test')
            ->willReturn('test');
        $connection->expects($this->any())
            ->method('getDataAttribute')
            ->willReturn('data');

        $sh = new SessionHandler($connection);
        $sh->open('', 'name');
        $sh->read('test');
        $this->assertTrue($sh->close());
    }

    public function testSessionDataCanBeWrittenToNewIdWithNoChanges()
    {
        $data = 'serializedData';
        $connection = $this->getMockForAbstractClass(
            SessionConnectionInterface::class,
            array(),
            '',
            true,
            true,
            true,
            array('getDataAttribute', 'getSessionLifetimeAttribute')
        );
        $connection->expects($this->any())
            ->method('getDataAttribute')
            ->willReturn('data');
        $connection->expects($this->any())
            ->method('getSessionLifetimeAttribute')
            ->willReturn('expires');
        $connection->expects($this->any())
            ->method('write')
            ->willReturn( true);
        $connection->expects($this->any())
            ->method('read')
            ->willReturn( ['expires' => time() + 1000, 'data' => 'serializedData']);
        $sh = new SessionHandler($connection);
        $sh->write(session_id(), $data);

        $this->assertTrue($sh->open('', 'name'));
        $this->assertSame($data, $sh->read(session_id()));
        $sh->write('test2', $data);
        $this->assertTrue($sh->write(session_id(), $data));
    }
}
