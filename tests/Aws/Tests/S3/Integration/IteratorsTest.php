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

namespace Aws\Tests\S3\Integration;

/**
 * @group integration
 */
class IteratorsTest extends \Aws\Tests\IntegrationTestCase
{
    public function testIteratesListBucketsCommand()
    {
        /** @var $client \Guzzle\Service\ClientInterface */
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array('s3/list_buckets'));

        // Create an iterator that will exercise the most code paths
        $iterator = $client->getIterator('ListBuckets', null, array('names_only' => true));

        // Verify that we got back everything back
        $expectedObjects = array('bucket-1', 'bucket-2');
        $this->assertSame($expectedObjects, $iterator->toArray());

        // Verify that the number of requests are as expected
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals(1, $iterator->getRequestCount());
    }

    public function testIteratesListObjectsCommand()
    {
        /** @var $client \Guzzle\Service\ClientInterface */
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array(
            's3/list_objects_page_1',
            's3/list_objects_page_2',
            's3/list_objects_page_3',
            's3/list_objects_page_4',
            's3/list_objects_page_5'
        ));

        // Create an iterator that will exercise the most code paths
        $iterator = $client->getIterator('ListObjects', array(
            'Bucket'    => 'foo',
            'MaxKeys'   => 5,
            'Delimiter' => '/'
        ), array(
            'page_size'       => 2,
            'return_prefixes' => true,
            'names_only'      => true,
            'sort_results'    => true
        ));

        // Verify that we got back everything back
        $expectedObjects = array('a/', 'b/', 'c', 'd/', 'e', 'f', 'g/');
        $this->assertSame($expectedObjects, $iterator->toArray());

        // Verify that 5 HTTP requests were made
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(5, count($requests));

        // Verify that only 4 iterations (not 5) were made
        $this->assertEquals(4, $iterator->getRequestCount());
    }

    public function testIteratesGetBucketObjectVersionsCommand()
    {
        /** @var $client \Guzzle\Service\ClientInterface */
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array(
            's3/get_bucket_object_versions_page_1',
            's3/get_bucket_object_versions_page_2'
        ));

        // Create an iterator that will exercise the most code paths
        $iterator = $client->getIterator('ListObjectVersions', array(
            'Bucket'    => 'bucket-1',
            'Delimiter' => '/'
        ), array(
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

    public function testIteratesListPartsCommand()
    {
        /** @var $client \Guzzle\Service\ClientInterface */
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array(
            's3/list_parts_page_1',
            's3/list_parts_page_2'
        ));

        // Create an iterator that will exercise the most code paths
        $iterator = $client->getIterator('ListParts', array(
            'Bucket'   => 'bucket-1',
            'Key'      => 'object-1',
            'UploadId' => 'upload-id-1',
        ));

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

    public function testIteratesListMultipartUploadsCommand()
    {
        /** @var $client \Guzzle\Service\ClientInterface */
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array(
            's3/list_multipart_uploads_page_1',
            's3/list_multipart_uploads_page_2'
        ));

        // Create an iterator that will exercise the most code paths
        $iterator = $client->getIterator('ListMultipartUploads', array(
            'Bucket'    => 'bucket-1',
            'Delimiter' => '/'
        ), array(
            'return_prefixes' => true
        ));

        // Verify that we got back everything back
        $actualUploads = array();
        $expectedUploads = array(
            'object-1|upload-id-1',
            'object-1|upload-id-2',
            'object-2|upload-id-1',
            'object-2|upload-id-2',
            'prefix-1/',
            'prefix-2/'
        );
        foreach ($iterator as $upload) {
            if (isset($upload['Key'])) {
                $actualUploads[] = "$upload[Key]|$upload[UploadId]";
            } else {
                $actualUploads[] = $upload['Prefix'];
            }
        }
        $this->assertSame($expectedUploads, $actualUploads);

        // Verify that the number of requests are as expected
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(2, count($requests));
        $this->assertEquals(1, $iterator->getRequestCount());
    }
}
