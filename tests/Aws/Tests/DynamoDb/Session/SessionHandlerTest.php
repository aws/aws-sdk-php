<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Tests\DynamoDb\Session;

use Aws\Tests\DynamoDb\Session\AbstractSessionTestCase;
use Aws\DynamoDb\Session\SessionHandler;

/**
 * @covers Aws\DynamoDb\Session\SessionHandler
 */
class SessionHandlerTest extends AbstractSessionTestCase
{
    /**
     * @var SessionHandler The handler under test
     */
    protected $handler;

    public function setUp()
    {
        $client   = $this->getMockedClient();
        $strategy = $this->getMock('Aws\DynamoDb\Session\LockingStrategy\LockingStrategyInterface');
        $this->handler = SessionHandler::factory(array(
            'dynamodb_client'  => $client,
            'locking_strategy' => $strategy,
        ));

        $command = $this->getMockedCommand($client);
        $command->expects($this->any())
           ->method('execute')
           ->will($this->returnValue(array('foo' => 'bar')));

        $client->expects($this->any())
           ->method('getIterator')
           ->will($this->returnValue(array()));

        $strategy->expects($this->any())
            ->method('doRead')
            ->will($this->returnValue(array(
                'expires' => time() - 5,
                'data' => 'ANYTHING'
            )));
        $strategy->expects($this->any())
            ->method('doWrite')
            ->will($this->returnValue(true));
        $strategy->expects($this->any())
            ->method('doDestroy')
            ->will($this->returnValue(true));
    }

    public function testFactoryCreatesInstanceCorrectly()
    {
        $client   = $this->getMockedClient();
        $strategy = $this->getMock('Aws\DynamoDb\Session\LockingStrategy\LockingStrategyInterface');

        $sh1 = SessionHandler::factory(array(
            'dynamodb_client' => $client
        ));
        $this->assertInstanceOf('Aws\DynamoDb\Session\SessionHandler', $sh1);

        $sh2 = SessionHandler::factory(array(
            'dynamodb_client'  => $client,
            'locking_strategy' => $strategy
        ));
        $this->assertInstanceOf('Aws\DynamoDb\Session\SessionHandler', $sh2);
    }

    public function testRegisterSetsSessionSaveHandlerAndIniSettings()
    {
        ini_set('session.gc_probability', '0');

        $handler = SessionHandler::factory(array(
            'dynamodb_client' => $this->getMockedClient(),
            'automatic_gc'    => true
        ));

        $this->assertTrue($handler->register());
        $this->assertEquals('1', ini_get('session.gc_probability'));

        ini_set('session.gc_probability', '0');
    }

    public function testCreateSessionsTable()
    {
        // For code coverage's sake. See integration test.
        $result = $this->handler->createSessionsTable(10, 5);
        $this->assertEquals(array('foo' => 'bar'), $result);
    }

    public function testSessionOpenAndCloseAreSuccessful()
    {
        session_id('test');
        $this->assertFalse($this->handler->isSessionOpen());
        $this->assertTrue($this->handler->open('test', 'example'));
        $this->assertTrue($this->handler->isSessionOpen());
        $this->assertTrue($this->handler->close());
        $this->assertFalse($this->handler->isSessionOpen());
    }

    public function testSessionReadAndDeleteExpiredItem()
    {
        $this->assertTrue($this->handler->open('test', 'example'));
        $this->assertSame('', $this->handler->read('test'));
    }

    public function testSessionWriteData()
    {
        $this->assertTrue($this->handler->open('test', 'example'));
        $this->assertTrue($this->handler->write('test', 'ANYTHING'));
    }

    public function testSessionGarbageCollection()
    {
        $this->assertTrue($this->handler->gc('ANYTHING'));
    }

    public function testSessionGarbageCollectionReturnsFalseOnException()
    {
        $handler = $this->getMockBuilder('Aws\DynamoDb\Session\SessionHandler')
            ->disableOriginalConstructor()
            ->setMethods(array('garbageCollect'))
            ->getMock();
        $handler->expects($this->any())
            ->method('garbageCollect')
            ->will($this->throwException(new \Exception));

        $this->assertFalse($handler->gc('ANYTHING'));
    }
}
