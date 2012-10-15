<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Aws\Tests\S3\Iterator;

use Aws\S3\Iterator\ListMultipartUploadsIterator;

/**
 * @covers Aws\S3\Iterator\ListMultipartUploadsIterator
 */
class ListMultipartUploadsIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesListMultipartUploadsCommand()
    {
        /** @var $client \Guzzle\Service\ClientInterface */
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array(
            's3/list_multipart_uploads_page_1',
            's3/list_multipart_uploads_page_2'
        ));

        // Create an iterator that will exercise the most code paths
        $command = $client->getCommand('ListMultipartUploads', array(
            'Bucket'    => 'bucket-1',
            'Delimiter' => '/'
        ));
        $iterator = new ListMultipartUploadsIterator($command, array(
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
