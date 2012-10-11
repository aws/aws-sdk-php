<?php

namespace Aws\Tests\S3\Iterator;

use Aws\S3\Iterator\ListObjectVersionsIterator;

/**
 * @covers Aws\S3\Iterator\ListObjectVersionsIterator
 */
class ListObjectVersionsIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesGetBucketObjectVersionsCommand()
    {
        /** @var $client \Guzzle\Service\ClientInterface */
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array(
            's3/get_bucket_object_versions_page_1',
            's3/get_bucket_object_versions_page_2'
        ));

        // Create an iterator that will exercise the most code paths
        $command = $client->getCommand('ListObjectVersions', array(
            'Bucket'    => 'bucket-1',
            'Delimiter' => '/'
        ));
        $iterator = new ListObjectVersionsIterator($command, array(
            'return_prefixes' => true
        ));

        // Verify that we got back everything back
        $actualKeys = array();
        $expectedKeys = array(
            'key-1|version-id-1',
            'key-2|version-id-1',
            'key-1|version-id-2',
            'key-2|version-id-2',
            'prefix-1/',
            'prefix-2/'
        );
        foreach ($iterator as $item) {
            if (isset($item['Key'])) {
                $actualKeys[] = "$item[Key]|$item[VersionId]";
            } else {
                $actualKeys[] = $item['Prefix'];
            }
        }
        $this->assertSame($expectedKeys, $actualKeys);

        // Verify that the number of requests are as expected
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(2, count($requests));
        $this->assertEquals(1, $iterator->getRequestCount());
    }
}
