<?php

namespace Aws\Tests\S3\Iterator;

use Aws\S3\Iterator\ListPartsIterator;

/**
 * @covers Aws\S3\Iterator\ListPartsIterator
 */
class ListPartsIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesListPartsCommand()
    {
        /** @var $client \Guzzle\Service\ClientInterface */
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array(
            's3/list_parts_page_1',
            's3/list_parts_page_2'
        ));

        // Create an iterator that will exercise the most code paths
        $command = $client->getCommand('ListBuckets', array(
            'bucket'   => 'bucket-1',
            'key'      => 'object-1',
            'uploadId' => 'upload-id-1',
        ));
        $iterator = new ListPartsIterator($command);

        // Verify that we got back everything back
        $actualParts = array();
        $expectedParts = array(1, 2);
        foreach ($iterator as $part) {
            $actualParts[] = (int) $part['PartNumber'];
        }
        $this->assertSame($expectedParts, $actualParts);

        // Verify that the number of requests are as expected
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(2, count($requests));
        $this->assertEquals(1, $iterator->getRequestCount());
    }
}
