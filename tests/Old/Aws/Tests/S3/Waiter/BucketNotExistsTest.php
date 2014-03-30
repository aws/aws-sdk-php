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

namespace Aws\Tests\S3\Waiter;

use Guzzle\Http\Message\Response;

class BucketNotExistsTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testReturnsTrueIfBucketNotExists()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, 's3/head_failure');
        $client->waitUntil('bucket_not_exists', array('Bucket' => 'foo'));
        $this->assertEquals(1, count($this->getMockedRequests()));
    }

    public function testRetriesUntilBucketNotExists()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array('s3/head_success', 's3/head_failure'));
        $client->waitUntil('bucket_not_exists', array('Bucket' => 'foo', 'waiter.interval' => 0));
        $this->assertEquals(2, count($this->getMockedRequests()));
    }

    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     */
    public function testDoesNotBuffer500Exceptions()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array(new Response(501)));
        $client->waitUntil('bucket_not_exists', array('Bucket' => 'foo', 'waiter.interval' => 0));
    }
}
