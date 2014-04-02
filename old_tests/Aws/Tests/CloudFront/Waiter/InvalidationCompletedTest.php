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

namespace Aws\Tests\CloudFront\Waiter;

use Guzzle\Http\Message\Response;

class InvalidationCompletedTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testValidatesInvalidationResource()
    {
        $client = $this->getServiceBuilder()->get('cloudfront');
        $client->waitUntil('InvalidationCompleted', array('Id' => 'foo'));
    }

    public function testReturnsTrueIfDeployed()
    {
        $client = $this->getServiceBuilder()->get('cloudfront');
        $this->setMockResponse($client, array(
            'cloudfront/GetInvalidation_InProgress',
            'cloudfront/GetInvalidation_Completed'
        ));
        $client->waitUntil(
            'InvalidationCompleted',
            array('DistributionId' => 'foo', 'Id' => 'bar', 'waiter.interval' => 0)
        );
        $requests = $this->getMockedRequests();
        $this->assertEquals(2, count($requests));
        $this->assertContains('/distribution/foo/invalidation/bar', $requests[0]->getUrl());
    }

    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     */
    public function testDoesNotBufferOtherExceptions()
    {
        $client = $this->getServiceBuilder()->get('cloudfront');
        $this->setMockResponse($client, array(new Response(404)));
        $client->waitUntil('invalidation_completed', array('DistributionId' => 'foo', 'Id' => 'bar'));
    }
}
