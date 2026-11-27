<?php
namespace Aws\Test\DynamoDb;

use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\LockingSessionConnection;
use Aws\Middleware;
use Aws\Result;
use Aws\DynamoDb\SessionConnectionInterface;
use Aws\DynamoDb\SessionHandler;
use Aws\DynamoDb\StandardSessionConnection;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(SessionHandler::class)]
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

    public function testCreatesSessionId()
    {
        $connection = $this->getMockBuilder(SessionConnectionInterface::class)
            ->getMock();
        $sh = new SessionHandler($connection);

        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9,-]+$/', $sh->create_sid());
        $this->assertNotSame($sh->create_sid(), $sh->create_sid());
    }

    public static function validateIdProvider(): array
    {
        $future = (string) (time() + 1000);
        $past = (string) (time() - 1000);

        return [
            'active session' => [false, ['ttl' => ['N' => $future], 'data' => ['S' => 'a|i:1;']], true],
            'empty session that has not expired' => [false, ['ttl' => ['N' => $future]], true],
            'expired session' => [false, ['ttl' => ['N' => $past], 'data' => ['S' => 'a|i:1;']], false],
            'lock without session' => [false, ['lock' => ['N' => '1']], false],
            'unknown session' => [false, null, false],
            'active session, locking' => [true, ['ttl' => ['N' => $future]], true],
            'locked before the first write' => [true, ['lock' => ['N' => '1']], true],
            'expired but locked' => [true, ['ttl' => ['N' => $past], 'lock' => ['N' => '1']], true],
            'expired session, locking' => [true, ['ttl' => ['N' => $past]], false],
            'unknown session, locking' => [true, null, false],
        ];
    }

    #[DataProvider('validateIdProvider')]
    public function testValidateIdChecksTheSessionExists($locking, $item, $expected)
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $result = $item === null
            ? []
            : ['Item' => ['sid' => ['S' => 'name_abc']] + $item];
        $this->addMockResults($client, [new Result($result)]);
        $commands = [];
        $client->getHandlerList()->appendBuild(Middleware::tap(
            function ($command) use (&$commands) {
                $commands[] = $command->toArray() + ['@name' => $command->getName()];
            }
        ));

        $sh = SessionHandler::fromClient($client, [
            'locking' => $locking,
            'table_name' => 'my_sessions',
            'hash_key' => 'sid',
            'session_lifetime_attribute' => 'ttl',
            'consistent_read' => false,
        ]);
        $sh->open('', 'name');

        $this->assertSame($expected, $sh->validateId('abc'));
        // A single strongly consistent GetItem, which never takes the lock.
        $this->assertCount(1, $commands);
        $this->assertSame('GetItem', $commands[0]['@name']);
        $this->assertSame('my_sessions', $commands[0]['TableName']);
        $this->assertEquals(['sid' => ['S' => 'name_abc']], $commands[0]['Key']);
        $this->assertTrue($commands[0]['ConsistentRead']);
    }

    public function testValidateIdKeepsTheIdWhenTheLookupFails()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [
            $this->createMockAwsException('ResourceNotFoundException', DynamoDbException::class),
            $this->createMockAwsException('ResourceNotFoundException', DynamoDbException::class),
        ]);

        $sh = SessionHandler::fromClient($client);
        $sh->open('', 'name');

        // The error is left to read(), like before validateId() existed.
        $this->assertTrue($sh->validateId('abc'));
        // A freshly generated ID is still treated as free.
        $this->assertFalse($sh->validateId($sh->create_sid()));
    }

    public function testReadWithoutLockReportsFailuresThatReadIgnores()
    {
        $client = $this->getTestSdk()->createDynamoDb();
        $this->addMockResults($client, [
            $this->createMockAwsException('AccessDeniedException', DynamoDbException::class),
            $this->createMockAwsException('AccessDeniedException', DynamoDbException::class),
            new Result([]),
        ]);
        $connection = new StandardSessionConnection($client);

        $this->assertSame([], $connection->read('name_abc'));
        try {
            $connection->readWithoutLock('name_abc');
            $this->fail('Expected a DynamoDbException');
        } catch (DynamoDbException $e) {
            $this->assertSame('AccessDeniedException', $e->getAwsErrorCode());
        }
        $this->assertSame([], $connection->readWithoutLock('name_abc'));
    }

    public function testValidateIdWithCustomConnections()
    {
        $connection = $this->getMockForAbstractClass(
            SessionConnectionInterface::class,
            [],
            '',
            true,
            true,
            true,
            ['getDataAttribute', 'getSessionLifetimeAttribute']
        );
        $connection->method('getDataAttribute')->willReturn('data');
        $connection->method('getSessionLifetimeAttribute')->willReturn('expires');
        $connection->method('read')->willReturn([]);
        $connection->method('write')->willReturn(true);

        $sh = new SessionHandler($connection);
        $sh->open('', 'name');

        // IDs PHP received are accepted, as without validateId().
        $this->assertTrue($sh->validateId('abc'));

        // A freshly generated ID is free, so session_create_id() and
        // session_regenerate_id() can use it.
        $id = $sh->create_sid();
        $this->assertFalse($sh->validateId($id));

        // Once PHP uses it, it is an ID like any other.
        $sh->read($id);
        $this->assertTrue($sh->validateId($id));

        $id = $sh->create_sid();
        $sh->close();
        $this->assertTrue($sh->validateId($id));

        $id = $sh->create_sid();
        $sh->open('', 'name');
        $this->assertTrue($sh->validateId($id));
    }
}
