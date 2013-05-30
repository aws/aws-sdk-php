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

namespace Aws\Tests\Common\Exception;

use Aws\Common\Exception\ExceptionListener;
use Aws\Common\Exception\ServiceResponseException;
use Guzzle\Http\Message\Request;
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
        $request = new Request('POST', 'http://www.example.com');
        $response = new Response(200);

        $factory = $this->getMockBuilder('Aws\Common\Exception\ExceptionFactoryInterface')
            ->setMethods(array('fromResponse'))
            ->getMock();

        $factory->expects($this->once())
            ->method('fromResponse')
            ->with($request, $response)
            ->will($this->returnValue($e));

        $listener = new ExceptionListener($factory);
        $event = new Event(array('request' => $request, 'response' => $response));

        try {
            $listener->onRequestError($event);
            $this->fail('Did not throw expected exception');
        } catch (ServiceResponseException $thrown) {
            $this->assertSame($e, $thrown);
        }
    }
}
