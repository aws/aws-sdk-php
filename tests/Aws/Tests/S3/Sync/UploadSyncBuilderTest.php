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

use Aws\S3\Model\AcpBuilder;
use Aws\S3\Sync\UploadSyncBuilder;

/**
 * @covers Aws\S3\Sync\UploadSyncBuilder
 * @covers Aws\S3\Sync\UploadSync
 */
class UploadSyncBuilderTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getPreparedClient()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array('s3/list_objects_empty'));

        return $client;
    }

    public function testUploadsFromDirectory()
    {
        $b = UploadSyncBuilder::getInstance()
            ->uploadFromDirectory(__DIR__)->setBucket('foo')->setClient($this->getPreparedClient())->build();
        $i = $this->readAttribute($b, 'options')->get('iterator');
        $this->assertInstanceOf('Aws\S3\Sync\ChangedFilesIterator', $i);
        $this->assertInstanceOf('\NoRewindIterator', $i->getInnerIterator());
        $i = $i->getInnerIterator()->getInnerIterator();
        $this->assertInstanceOf('Guzzle\Iterator\FilterIterator', $i);
        $this->assertInstanceOf('RecursiveIteratorIterator', $i->getInnerIterator());
        $filenames = array_filter(iterator_to_array($i), function ($f) { return (string) $f; });
        $this->assertContains(__FILE__, $filenames);
    }

    public function testUploadsFromGlob()
    {
        $b = UploadSyncBuilder::getInstance()
            ->uploadFromGlob(__DIR__ . '/*.php')->setBucket('foo')->setClient($this->getPreparedClient())->build();
        $i = $this->readAttribute($b, 'options')->get('iterator');
        $this->assertInstanceOf('Aws\S3\Sync\ChangedFilesIterator', $i);
        $this->assertInstanceOf('\NoRewindIterator', $i->getInnerIterator());
        $i = $i->getInnerIterator()->getInnerIterator();
        $this->assertInstanceOf('Guzzle\Iterator\FilterIterator', $i);
        $this->assertInstanceOf('GlobIterator', $i->getInnerIterator());
        $filenames = array_filter(iterator_to_array($i), function ($f) { return (string) $f; });
        $this->assertContains(__FILE__, $filenames);
    }

    public function testCanSetAclOnPutObject()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array('s3/list_objects_empty', 's3/head_success'));
        $i = new \ArrayIterator(array(new \SplFileInfo(__FILE__)));
        $out = fopen('php://temp', 'r+');
        $b = UploadSyncBuilder::getInstance()
            ->setBaseDir(__DIR__)
            ->setSourceIterator($i)
            ->setBucket('foo')
            ->setClient($client)
            ->enableDebugOutput($out)
            ->setAcl('public-read')
            ->build();
        $b->transfer();
        $requests = $this->getMockedRequests();
        $this->assertCount(2, $requests);
        $put = $requests[1];
        $this->assertEquals('PUT', $put->getMethod());
        $this->assertEquals('/UploadSyncBuilderTest.php', $put->getResource());
        $this->assertEquals('public-read', $put->getHeader('x-amz-acl'));
        $this->assertEquals('foo.s3.amazonaws.com', $put->getHost());
        $this->assertNotNull($put->getHeader('Content-MD5'));

        rewind($out);
        $this->assertContains('Uploading ' . __FILE__ . ' -> /UploadSyncBuilderTest.php (', stream_get_contents($out));
    }

    public function testCanSetAcpOnMultipartUploadsAndEmitsDebug()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array(
            's3/list_objects_empty',
            's3/initiate_multipart_upload',
            's3/upload_part',
            's3/complete_multipart_upload'
        ));

        $out = fopen('php://temp', 'r+');

        UploadSyncBuilder::getInstance()
            ->setBucket('foo')
            ->setClient($client)
            ->setBaseDir(__DIR__)
            ->enableDebugOutput($out)
            ->setSourceIterator(new \ArrayIterator(array(new \SplFileInfo(__FILE__))))
            ->setOperationParams(array('Metadata' => array('foo' => 'bar')))
            ->setMultipartUploadSize(filesize(__FILE__) - 1)
            ->setAcp(AcpBuilder::newInstance()->setOwner('123')->addGrantForEmail('READ_ACP', 'foo@baz.com')->build())
            ->build()
            ->transfer();

        $requests = $this->getMockedRequests();
        $this->assertCount(4, $requests);
        $this->assertEquals('POST', $requests[1]->getMethod());
        $this->assertContains('?uploads', $requests[1]->getResource());
        $this->assertNotNull($requests[1]->getHeader('x-amz-grant-read-acp'));
        $this->assertEquals('bar', (string) $requests[1]->getHeader('x-amz-meta-foo'));
        $this->assertEquals('PUT', $requests[2]->getMethod());
        $this->assertEquals('POST', $requests[3]->getMethod());
        $this->assertContains('uploadId=', $requests[3]->getResource());

        rewind($out);
        $contents = stream_get_contents($out);
        $this->assertContains(
            'Beginning multipart upload: ' . __FILE__ . ' -> /UploadSyncBuilderTest.php (',
            $contents
        );
        $this->assertContains('- Part 1 (', $contents);
    }
}
