<?php

namespace Aws\Tests\S3\Waiter;

use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;

/**
 * @covers Aws\S3\Waiter\ObjectExists
 */
class ObjectExistsTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testReturnsTrueIfObjectExists()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $mock = $this->setMockResponse($client, 's3/head_success');
        $client->waitUntil('object_exists', 'foo/bar');
        $this->assertEquals(1, count($this->getMockedRequests()));
        $requests = $mock->getReceivedRequests();
        $this->assertEquals('foo.s3.amazonaws.com', $requests[0]->getHost());
        $this->assertEquals('/bar', $requests[0]->getPath());
    }

    public function testRetriesUntilObjectExists()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array('s3/head_failure', 's3/head_success'));
        $client->waitUntil('object_exists', 'foo/bar', array(
            'interval' => 0
        ));
        $this->assertEquals(2, count($this->getMockedRequests()));
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage The resource ID must be in the form of bucket/key
     */
    public function testErrorsOutWhenAnInvalidResourceIdIsSpecified()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $mock = new MockPlugin(array(new Response(500)));
        $client->getEventDispatcher()->addSubscriber($mock);
        $client->waitUntil('object_exists', 'foo');
    }
}
