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

use Aws\S3\Iterator\ListObjectsIterator;

/**
 * @covers Aws\S3\Iterator\ListObjectsIterator
 */
class ListObjectsIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
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
        $command = $client->getCommand('ListObjects', array(
            'Bucket'    => 'foo',
            'MaxKeys'   => 5,
            'Delimiter' => '/'
        ));
        $iterator = new ListObjectsIterator($command, array(
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
}
