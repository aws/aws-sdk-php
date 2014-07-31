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

namespace Aws\Tests\S3\Sync;

use Aws\S3\Sync\AbstractSync;

/**
 * @covers Aws\S3\Sync\AbstractSync
 */
class AbstractSyncTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function setUp()
    {
        if (!\can_mock_internal_classes()) {
            $this->markTestSkipped('Cannot mock internal classes');
        }
    }

    /**
     * @expectedException \Guzzle\Common\Exception\InvalidArgumentException
     */
    public function testConstructorValidatesRequirements()
    {
        $this->getMockBuilder('Aws\S3\Sync\AbstractSync')
            ->setConstructorArgs(array(array()))
            ->getMockForAbstractClass();
    }

    public function testHasEvents()
    {
        $this->assertCount(2, AbstractSync::getAllEvents());
    }

    public function testSendsParallelCommands()
    {
        $ai = new \ArrayIterator(array(1, 2, 3, 4, 5, 6, 7, 8, 9));
        $s = $this->getMockBuilder('Aws\S3\Sync\AbstractSync')
            ->setConstructorArgs(array(
                array('client' => '', 'bucket' => '', 'iterator' => $ai, 'source_converter' => '', 'concurrency' => 4)
            ))
            ->setMethods(array('transferFiles'))
            ->getMockForAbstractClass();
        $called = array();
        $s->expects($this->exactly(3))
            ->method('transferFiles')
            ->will($this->returnCallback(function ($data) use (&$called) {
                $called[] = $data;
            }));
        $s->transfer();
        $this->assertEquals(array(array(1, 2, 3, 4), array(5, 6, 7, 8), array(9)), $called);
    }

    public function testTransfersActions()
    {
        $command = $this->getMockBuilder('Guzzle\Service\Command\CommandInterface')
            ->getMockForAbstractClass();
        $client = $this->getMockBuilder('Guzzle\Service\Client')
            ->setMethods(array('execute'))
            ->getMock();
        $client->expects($this->atLeastOnce())
            ->method('execute')
            ->with($this->equalTo(array($command)));

        $a = $this->getMockBuilder('SplFileinfo')
            ->disableOriginalConstructor()
            ->getMock();

        $b = $this->getMockBuilder('SplFileinfo')
            ->disableOriginalConstructor()
            ->getMock();

        $ai = new \ArrayIterator(array($a, $b));

        $s = $this->getMockBuilder('Aws\S3\Sync\AbstractSync')
            ->setConstructorArgs(array(
                array(
                    'client' => $client,
                    'bucket' => '',
                    'iterator' => $ai,
                    'source_converter' => '',
                )
            ))
            ->setMethods(array('createTransferAction'))
            ->getMockForAbstractClass();

        $events = array();
        $s->getEventDispatcher()->addListener(AbstractSync::BEFORE_TRANSFER, function ($e) use (&$events) {
            $events[] = $e;
        });
        $s->getEventDispatcher()->addListener(AbstractSync::AFTER_TRANSFER, function ($e) use (&$events) {
            $events[] = $e;
        });

        $called = array();

        $s->expects($this->exactly(2))
            ->method('createTransferAction')
            ->will($this->returnCallback(function ($file) use (&$called, $a, $command) {
                if ($file === $a) {
                    return function () use (&$called) { $called['a'] = true; };
                } else {
                    $called['b'] = true;
                    return $command;
                }
            }));

        $s->transfer();

        $this->assertTrue($called['a']);
        $this->assertTrue($called['b']);

        $this->assertCount(4, $events);
        foreach ($events as $e) {
            $this->assertSame($s, $e['sync']);
            $this->assertSame($client, $e['client']);
            $this->assertNotNull($e['command']);
        }
    }
}
