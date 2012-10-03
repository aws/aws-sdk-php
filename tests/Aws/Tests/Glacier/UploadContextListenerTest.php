<?php

namespace Aws\Tests\Glacier;

use Aws\Glacier\UploadContextListener;
use Guzzle\Common\Event;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\Glacier\UploadContextListener
 */
class UploadContextListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testListeningToCorrectEvents()
    {
        $events = UploadContextListener::getSubscribedEvents();
        $this->assertArrayHasKey('command.before_prepare', $events);
        $this->assertContains('onCommandBeforePrepare', $events['command.before_prepare']);
    }

    public function testCommandBeforePrepareEventIsHandled()
    {
        // Setup all of the data
        $content = 'foo';
        $hash = hash('sha256', $content);

        $context = $this->getMockBuilder('Aws\Glacier\Model\UploadPartContext')
            ->disableOriginalConstructor()
            ->getMock();
        $context->expects($this->any())
            ->method('getChecksum')
            ->will($this->returnValue($hash));
        $context->expects($this->any())
            ->method('getContentHash')
            ->will($this->returnValue($hash));
        $context->expects($this->any())
            ->method('getSize')
            ->will($this->returnValue(3));
        $context->expects($this->any())
            ->method('getOffset')
            ->will($this->returnValue(0));
        $context->expects($this->any())
            ->method('getRange')
            ->will($this->returnValue(array(0, 2)));

        $command = $this->getMockForAbstractClass('Guzzle\Service\Command\AbstractCommand',
            array(), '', false, false, false, array('getName')
        );
        $command->expects($this->any())
            ->method('getName')
            ->will($this->returnValue('UploadMultipartPart'));
        $command->set('body', EntityBody::factory($content));
        $command->set('glacier.context', $context);

        $event = new Event();
        $event['command'] = $command;

        // Check the initial state of the command
        $this->assertEmpty($command->get('checksum'));
        $this->assertEmpty($command->get('range'));

        // Activate the listener
        $listener = new UploadContextListener();
        $listener->onCommandBeforePrepare($event);

        // Check the post-listener state of the command
        $this->assertEquals($hash, $command->get('checksum'));
        $this->assertEquals('bytes 0-2/*', $command->get('range'));
    }
}
