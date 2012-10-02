<?php

namespace Aws\Tests\S3\Waiter;

use Guzzle\Http\Message\Response;

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
        $client->waitUntil('bucket_not_exists', 'foo', array('interval' => 0));
        $this->assertEquals(2, count($this->getMockedRequests()));
    }

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage Maximum number of failures while waiting: 1
     */
    public function testDoesNotBuffer500Exceptions()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array(new Response(501)));
        $client->waitUntil('bucket_not_exists', 'foo', array('interval' => 0));
    }
}
