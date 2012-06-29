<?php

namespace Aws\Tests\Common\Signature;

use Aws\Common\Credentials\Credentials;
use Aws\Common\Signature\SignatureListener;
use Guzzle\Http\Message\Request;
use Guzzle\Common\Event;

class SignatureListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Common\Signature\SignatureListener
     */
    public function testSignsRequestsProperly()
    {
        $request = new Request('GET', 'http://www.example.com');
        $credentials = new Credentials('a', 'b');
        $signature = $this->getMock('Aws\Common\Signature\SignatureV4');

        // Ensure that signing the request occurred once with the correct args
        $signature->expects($this->once())
            ->method('signRequest')
            ->with($this->equalTo($request), $this->equalTo($credentials));

        $listener = new SignatureListener($credentials, $signature);

        // Create a mock event
        $event = new Event(array(
            'request' => $request
        ));

        $listener->onRequestBeforeSend($event);
    }

    /**
     * @covers Aws\Common\Signature\SignatureListener::getSubscribedEvents
     */
    public function testSubscribesToEvents()
    {
        $this->assertArrayHasKey('request.before_send', SignatureListener::getSubscribedEvents());
    }
}
