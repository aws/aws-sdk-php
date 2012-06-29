<?php

namespace Aws\Tests\Common\Exception;

use Aws\Common\Exception\ExceptionListener;
use Aws\Common\Exception\ServiceResponseException;
use Guzzle\Http\Message\Response;
use Guzzle\Common\Event;

/**
 * @covers Aws\Common\Exception\ExceptionListener
 */
class ExceptionListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testSubscribesToEvents()
    {
        $this->assertArrayHasKey('request.error', ExceptionListener::getSubscribedEvents());
    }

    public function testThrowsServiceSpecificExceptions()
    {
        $e = new ServiceResponseException('Foo');
        $response = new Response(200);

        $factory = $this->getMockBuilder('Aws\Common\Exception\ExceptionFactoryInterface')
            ->setMethods(array('fromResponse'))
            ->getMock();

        $factory->expects($this->once())
            ->method('fromResponse')
            ->with($response)
            ->will($this->returnValue($e));

        $listener = new ExceptionListener($factory);

        $event = new Event(array(
            'response' => $response
        ));

        try {
            $listener->onRequestError($event);
            $this->fail('Did not throw expected exception');
        } catch (ServiceResponseException $thrown) {
            $this->assertSame($e, $thrown);
        }
    }
}
