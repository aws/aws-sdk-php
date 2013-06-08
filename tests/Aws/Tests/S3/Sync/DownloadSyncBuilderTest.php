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

namespace Aws\Tests\S3\Sync;

use Aws\S3\StreamWrapper;
use Aws\S3\Sync\DownloadSyncBuilder;

/**
 * @covers Aws\S3\Sync\DownloadSyncBuilder
 * @covers Aws\S3\Sync\AbstractSyncBuilder
 */
class DownloadSyncBuilderTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testGetInstance()
    {
        DownloadSyncBuilder::getInstance();
    }

    public function testCanBuild()
    {
        @stream_wrapper_unregister('s3');
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, 's3/list_objects_page_5');

        $b = $this->getMockBuilder('Aws\S3\Sync\DownloadSyncBuilder')
            ->setMethods(array('getTargetIterator'))
            ->getMock();

        $b = DownloadSyncBuilder::getInstance();
        $b->setDirectory(__DIR__)
            ->setClient($client)
            ->setBucket('foo')
            ->allowResumableDownloads(true)
            ->setOperationParams(array('Foo' => 'Bar'))
            ->build();
    }

    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage directory is required
     */
    public function testEnsuresDirectoryIsSet()
    {
        @stream_wrapper_unregister('s3');
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, 's3/list_objects_page_5');
        $b = DownloadSyncBuilder::getInstance();
        $b->setClient($client)->setBucket('foo')->build();
    }
}
