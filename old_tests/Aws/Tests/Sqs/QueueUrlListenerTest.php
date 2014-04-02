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

namespace Aws\Tests\Sqs;

use Aws\Sqs\QueueUrlListener;
use Guzzle\Http\Message\Request;
use Guzzle\Common\Event;

/**
 * @covers Aws\Sqs\QueueUrlListener
 */
class QueueUrlListenerTest extends \Guzzle\Tests\GuzzleTestCase
{

    public function testUpdatesUrl()
    {
        $listener = new QueueUrlListener();

        // Make sure the subscribed events are declared
        $events = $listener->getSubscribedEvents();
        $this->assertArrayHasKey('command.before_send', $events);

        // Setup state of command/request
        $newUrl = 'https://queue.amazonaws.com/stuff/in/the/path';
        $client = $this->getServiceBuilder()->get('s3', true);
        $command = $client->getCommand('ListBuckets');
        $request = $command->prepare();
        $command->set('QueueUrl', $newUrl);
        $request->getParams()->set('QueueUrl', $newUrl);
        $event = new Event(array('command' => $command));

        // Execute the listener and confirm effects
        $listener->onCommandBeforeSend($event);
        $this->assertEquals($newUrl, $request->getUrl());
        $this->assertFalse($request->getParams()->hasKey('QueueUrl'));
    }
}
