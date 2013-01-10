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
        $request->getEventDispatcher();
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
