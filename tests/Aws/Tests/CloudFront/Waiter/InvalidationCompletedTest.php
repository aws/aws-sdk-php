<?php

namespace Aws\Tests\CloudFront\Waiter;

use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;

/**
 * @covers Aws\CloudFront\Waiter\InvalidationCompleted
 */
class InvalidationCompletedTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testValidatesInvalidationResource()
    {
        $client = $this->getServiceBuilder()->get('cloudfront');
        $client->waitUntil('InvalidationCompleted', 'foo');
    }

    public function testReturnsTrueIfDeployed()
    {
        $client = $this->getServiceBuilder()->get('cloudfront');
        $this->setMockResponse($client, array(
            'cloudfront/GetInvalidation_InProgress',
            'cloudfront/GetInvalidation_Completed'
        ));
        $client->waitUntil('InvalidationCompleted', 'foo/bar', array('interval' => 0));
        $requests = $this->getMockedRequests();
        $this->assertEquals(2, count($requests));
        $this->assertContains('/distribution/foo/invalidation/bar', $requests[0]->getUrl());
    }

    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage Maximum number of failures while waiting: 1
     */
    public function testDoesNotBufferOtherExceptions()
    {
        $client = $this->getServiceBuilder()->get('cloudfront');
        $this->setMockResponse($client, array(new Response(404)));
        $client->waitUntil('streaming_distribution_deployed', 'foo');
    }
}
