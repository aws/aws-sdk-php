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

namespace Aws\Tests\S3;

use Aws\S3\BucketStyleListener;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\S3\BucketStyleListener
 */
class BucketStyleListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHasEvents()
    {
        $this->assertNotEmpty(BucketStyleListener::getSubscribedEvents());
    }

    public function testUsesPathStyleWhenHttpsContainsDots()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $this->setMockResponse($s3, array(new Response(200)));
        $command = $s3->getCommand('GetObject', array(
            'Bucket'    => 'test.123',
            'Key'       => 'Bar'
        ));
        $command->execute();
        $this->assertEquals('s3.amazonaws.com', $command->getRequest()->getHost());
        $this->assertEquals('/test.123/Bar', $command->getRequest()->getResource());
    }

    public function testUsesPathStyleWhenNotDnsCompatible()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $this->setMockResponse($s3, array(new Response(200)));
        $command = $s3->getCommand('GetObject', array(
            'Bucket'    => '_baz_!',
            'Key'       => 'Bar'
        ));
        $command->execute();
        $this->assertEquals('s3.amazonaws.com', $command->getRequest()->getHost());
        $this->assertEquals('/_baz_%21/Bar', $command->getRequest()->getResource());
    }

    public function testUsesPathStyleWhenForced()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $this->setMockResponse($s3, array(new Response(200)));
        $command = $s3->getCommand('GetObject', array(
            'Bucket'    => 'foo',
            'Key'       => 'Bar',
            'PathStyle' => true
        ));
        $command->execute();
        $this->assertEquals('s3.amazonaws.com', $command->getRequest()->getHost());
        $this->assertEquals('/foo/Bar', $command->getRequest()->getResource());
    }

    public function testUsesVirtualHostedWhenPossible()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $this->setMockResponse($s3, array(new Response(200)));
        $command = $s3->getCommand('GetObject', array('Bucket' => 'foo', 'Key' => 'Bar'));
        $command->execute();
        $this->assertEquals('foo.s3.amazonaws.com', $command->getRequest()->getHost());
        $this->assertEquals('/Bar', $command->getRequest()->getResource());
    }
}
