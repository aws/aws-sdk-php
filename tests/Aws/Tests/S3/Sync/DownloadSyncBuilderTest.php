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

use Aws\S3\Command\S3Command;
use Aws\S3\ResumableDownload;
use Aws\S3\Sync\DownloadSync;
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
        $client = $this->getServiceBuilder()->get('s3', true);
        // Set a list object response and a HeadObject response to satisfy the stream wrapper
        $this->setMockResponse($client, array('s3/list_objects_empty'));
        $b = DownloadSyncBuilder::getInstance();
        $b->setClient($client)
            ->setDirectory(__DIR__)
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
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array('s3/list_objects_empty'));
        $b = DownloadSyncBuilder::getInstance();
        $b->setClient($client)->setBucket('foo')->build();
    }

    protected function getDebugSync()
    {
        $out = fopen('php://temp', 'r+');
        $sync = DownloadSyncBuilder::getInstance()
            ->enableDebugOutput($out)
            ->setClient($this->getServiceBuilder()->get('s3', true))
            ->setBucket('Foo')
            ->setDirectory(__DIR__)
            ->setSourceIterator(new \ArrayIterator(array(__FILE__)))
            ->build();

        return array($sync, $out);
    }

    public function testAddsDebugListenerForCommand()
    {
        list($sync, $out) = $this->getDebugSync();
        $command = new S3Command(array(
            'Bucket' => 'Foo',
            'Key'    => 'Bar',
            'SaveAs' => __FILE__
        ));
        $sync->dispatch(DownloadSync::BEFORE_TRANSFER, array('command' => $command));
        rewind($out);
        $this->assertContains('Downloading Foo/Bar -> ' . __FILE__, stream_get_contents($out));
    }

    public function testAddsDebugListenerForResumable()
    {
        list($sync, $out) = $this->getDebugSync();
        $r = new ResumableDownload($this->getServiceBuilder()->get('s3', true), 'Foo', 'Bar', __FILE__);
        $sync->dispatch(DownloadSync::BEFORE_TRANSFER, array('command' => $r));
        rewind($out);
        $this->assertContains('Resuming Foo/Bar -> ' . __FILE__, stream_get_contents($out));
    }
}
