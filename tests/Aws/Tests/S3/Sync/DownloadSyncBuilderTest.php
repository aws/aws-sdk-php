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

use Aws\S3\S3Client;
use Aws\S3\Command\S3Command;
use Aws\S3\ResumableDownload;
use Aws\S3\Sync\DownloadSync;
use Aws\S3\Sync\DownloadSyncBuilder;
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;

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
            ->setSourceIterator(new \ArrayIterator(array(new \SplFileInfo(__FILE__))))
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

    public function testDoesNotDownloadGlacierStorageObjects()
    {
        $res = <<<EOT
HTTP/1.1 200 OK
x-amz-id-2: XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
x-amz-request-id: XXXXXXXXXXXXXXXX
Date: Thu, 04 Jul 2012 12:00:00 GMT
Content-Type: application/xml
Server: AmazonS3

<?xml version="1.0" encoding="UTF-8"?>
<ListBucketResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <Name>bucket-1</Name>
    <Prefix></Prefix>
    <Marker></Marker>
    <MaxKeys></MaxKeys>
    <Delimiter>/</Delimiter>
    <IsTruncated>false</IsTruncated>
    <Contents>
        <Key>e</Key>
        <LastModified>2012-04-07T12:00:00.000Z</LastModified>
        <ETag>"XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"</ETag>
        <Size>0</Size>
        <Owner>
            <ID>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</ID>
            <DisplayName>XXXXXXXXXX</DisplayName>
        </Owner>
        <StorageClass>GLACIER</StorageClass>
    </Contents>
    <Contents>
        <Key>f</Key>
        <LastModified>2012-04-07T12:00:00.000Z</LastModified>
        <ETag>"XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"</ETag>
        <Size>0</Size>
        <Owner>
            <ID>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</ID>
            <DisplayName>XXXXXXXXXX</DisplayName>
        </Owner>
        <StorageClass>STANDARD</StorageClass>
    </Contents>
</ListBucketResult>
EOT;

        $s3 = S3Client::factory(array('key' => 'foo', 'secret' => 'bar'));
        $s3->getEventDispatcher()->addSubscriber(new MockPlugin(array(
            Response::fromMessage($res),
            new Response(200)
        )));

        $dir = __DIR__ . '/../../../../../build/artifacts';
        if (!is_dir($dir)) {
            mkdir($dir);
        }

        DownloadSyncBuilder::getInstance()
            ->setClient($s3)
            ->setBucket('Foo')
            ->setDirectory($dir)
            ->build()
            ->transfer();

        $this->assertFileNotExists($dir . '/e');
        $this->assertFileExists($dir . '/f');
        unlink($dir . '/f');
    }
}
