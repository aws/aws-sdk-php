<?php

namespace Aws\Tests\S3\Iterator;

use Aws\S3\Iterator\ListBucketsIterator;

/**
 * @covers Aws\S3\Iterator\ListBucketsIterator
 */
class ListBucketsIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesListBucketsCommand()
    {
        /** @var $client \Guzzle\Service\ClientInterface */
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array(
            's3/list_buckets'
        ));

        // Create an iterator that will exercise the most code paths
        $command = $client->getCommand('ListBuckets');
        $iterator = new ListBucketsIterator($command, array(
            'names_only' => true
        ));

        // Verify that we got back everything back
        $expectedObjects = array('bucket-1', 'bucket-2');
        $this->assertSame($expectedObjects, $iterator->toArray());

        // Verify that the number of requests are as expected
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals(1, $iterator->getRequestCount());
    }
}
