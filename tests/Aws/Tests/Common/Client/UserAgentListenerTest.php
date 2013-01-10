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
