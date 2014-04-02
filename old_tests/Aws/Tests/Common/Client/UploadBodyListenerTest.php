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

use Aws\Common\Client\UploadBodyListener;

/**
 * @covers Aws\Common\Client\UploadBodyListener
 */
class UploadBodyListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFilePathsGetConvertedToBodies()
    {
        $this->assertInternalType('array', UploadBodyListener::getSubscribedEvents());

        $client = $this->getServiceBuilder()->get('s3', true);
        $command = $client->getCommand('PutObject', array(
            'Bucket'     => 'foo',
            'Key'        => 'bar',
            'SourceFile' => __FILE__
        ));

        $command->prepare();

        $this->assertInstanceOf('Guzzle\Http\EntityBody', $command->get('Body'));
        $this->assertNull($command->get('Source'));
    }

    public function testFileHandlesGetConvertedToBodies()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $command = $client->getCommand('PutObject', array(
            'Bucket' => 'foo',
            'Key'    => 'bar',
            'Body'   => fopen(__FILE__, 'r')
        ));

        $request = $command->prepare();
        $this->assertInstanceOf('Guzzle\Http\EntityBody', $command->get('Body'));
        $this->assertEquals('text/x-php', (string) $request->getHeader('Content-Type'));
    }
}
