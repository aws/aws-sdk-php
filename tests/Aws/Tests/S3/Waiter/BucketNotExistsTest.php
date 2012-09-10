<?php

namespace Aws\Tests\DynamoDb\Waiter;

use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;

/**
 * @covers Aws\S3\Waiter\BucketNotExists
 */
class BucketNotExistsTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testReturnsTrueIfBucketNotExists()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, 's3/head_failure');
        $client->waitUntil('bucket_not_exists', 'foo');
        $this->assertEquals(1, count($this->getMockedRequests()));
    }

    public function testRetriesUntilBucketNotExists()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array('s3/head_success', 's3/head_failure'));
        $client->waitUntil('bucket_not_exists', 'foo', array(
            'interval' => 0
        ));
        $this->assertEquals(2, count($this->getMockedRequests()));
    }

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage Maximum number of failures while waiting: 1
     */
    public function testDoesNotBuffer500Exceptions()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $mock = new MockPlugin(array(
            new Response(500)
        ));
        $client->getEventDispatcher()->addSubscriber($mock);
        $client->waitUntil('bucket_exists', 'foo', array(
            'interval' => 0
        ));
    }
}
