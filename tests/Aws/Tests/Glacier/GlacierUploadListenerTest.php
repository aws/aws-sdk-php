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

namespace Aws\Tests\Glacier;

use Aws\Glacier\GlacierUploadListener;
use Guzzle\Common\Event;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\Glacier\GlacierUploadListener
 */
class GlacierUploadListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @param array $params
     * @return \Guzzle\Service\Command\CommandInterface
     */
    public function prepareUploadArchiveCommand(array $params = array())
    {
        $client = $this->getServiceBuilder()->get('glacier');
        $command = $client->getCommand('UploadArchive', array_merge(array(
            'vaultName'     => 'foo',
            'body'          => EntityBody::factory(fopen(__FILE__, 'r'))
        ), $params));
        $command->prepare();

        $listener = new GlacierUploadListener();
        $event = new Event(array('command' => $command));
        $listener->onCommandBeforeSend($event);

        return $command;
    }

    public function testContentHashGetsAddedToRequestHeaders()
    {
        // Make sure the subscriber returns its subscriptions
        $this->assertInternalType('array', GlacierUploadListener::getSubscribedEvents());

        // Get an upload archive command, prepare it, and execute the upload listener
        $command = $this->prepareUploadArchiveCommand(array(
            'ContentSHA256' => hash('sha256', 'foo')
        ));
        $request = $command->getRequest();

        // Content hash should be set, but tree hash should be empty because the content hash was explicit
        $this->assertNotEmpty($request->getHeader('x-amz-content-sha256', true));
        $this->assertEmpty($request->getHeader('x-amz-sha256-tree-hash', true));
    }

    public function testBothHashesGetGeneratedAndAddedToRequestHeaders()
    {
        // Get an upload archive command, prepare it, and execute the upload listener
        $request = $this->prepareUploadArchiveCommand()->getRequest();

        // Both the content and tree hash should be set since we did not provide anything
        $this->assertNotEmpty($request->getHeader('x-amz-content-sha256', true));
        $this->assertNotEmpty($request->getHeader('x-amz-sha256-tree-hash', true));
    }
}
