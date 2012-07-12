<?php

namespace Aws\Tests\Common\Client;

use Aws\Common\Client\UserAgentListener;
use Guzzle\Common\Event;
use Guzzle\Http\Message\RequestFactory;

/**
 * @covers Aws\Common\Client\UserAgentListener
 */
class UserAgentListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testAppendsStringsToUserAgentHeader()
    {
        $this->assertInternalType('array', UserAgentListener::getSubscribedEvents());

        $listener = new UserAgentListener();
        $request = RequestFactory::getInstance()->create('GET', 'http://www.foo.com', array(
            'User-Agent' => 'Aws/Foo Baz/Bar'
        ));

        $command = $this->getMockBuilder('Aws\Common\Command\JsonCommand')
            ->setMethods(array('getRequest'))
            ->getMock();

        $command->expects($this->any())
            ->method('getRequest')
            ->will($this->returnValue($request));

        $command->add(UserAgentListener::OPTION, 'Test/123')
            ->add(UserAgentListener::OPTION, 'Other/456');

        $event = new Event(array('command' => $command));
        $listener->onBeforeSend($event);
        $this->assertEquals('Aws/Foo Baz/Bar Test/123 Other/456', (string) $request->getHeader('User-Agent'));
    }
}
