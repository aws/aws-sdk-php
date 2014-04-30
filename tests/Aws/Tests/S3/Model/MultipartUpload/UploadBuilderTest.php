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

namespace Aws\Tests\S3\Model\MultipartUpload;

use Aws\S3\Enum\Permission;
use Aws\S3\Model\Acp;
use Aws\S3\Model\Grantee;
use Aws\S3\Model\Grant;
use Aws\S3\Model\MultipartUpload\AbstractTransfer;
use Aws\S3\Model\MultipartUpload\TransferState;
use Aws\S3\Model\MultipartUpload\UploadBuilder;
use Aws\S3\Model\MultipartUpload\UploadId;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\S3\Model\MultipartUpload\UploadBuilder
 */
class UploadBuilderTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHasChainableMethodToInstantiate()
    {
        $this->assertInstanceOf('Aws\S3\Model\MultipartUpload\UploadBuilder', UploadBuilder::newInstance());
    }

    public function testHasChainableSetterMethods()
   {
       $acp = new Acp(new Grantee('123'));
       $b = UploadBuilder::newInstance();
       $b->setBucket('foo')
           ->setKey('bar')
           ->setConcurrency(1)
           ->setMd5('abc')
           ->calculateMd5(false)
           ->calculatePartMd5(true)
           ->setMinPartSize(10000)
           ->setAcp($acp)
           ->setOption('Metadata', array('Foo' => 'Baz'))
           ->setOption('Test', '123');

       $options = $this->readAttribute($b, 'commandOptions');
       $this->assertEquals('foo', $options['Bucket']);
       $this->assertEquals('bar', $options['Key']);
       $this->assertSame($acp, $options['ACP']);
       $this->assertEquals(array('Foo' => 'Baz'), $options['Metadata']);
       $this->assertEquals('123', $options['Test']);
       $this->assertEquals(1, $this->readAttribute($b, 'concurrency'));
       $this->assertEquals('abc', $this->readAttribute($b, 'md5'));
       $this->assertTrue($this->readAttribute($b, 'calculatePartMd5'));
       $this->assertFalse($this->readAttribute($b, 'calculateEntireMd5'));
       $this->assertEquals(AbstractTransfer::MIN_PART_SIZE, $this->readAttribute($b, 'minPartSize'));
   }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage You must specify a Bucket, Key, client, and source.
     */
    public function testValidatesThatRequiredFieldsAreSet()
    {
        UploadBuilder::newInstance()->build();
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage You cannot resume a transfer using a non-seekable source.
     */
    public function testValidatesThatNonSeekableStreamsCannotBeResumed()
    {
        $source = $this->getMockBuilder('Guzzle\Http\EntityBody')
            ->setMethods(array('isSeekable'))
            ->disableOriginalConstructor()
            ->getMock();
        $source->expects($this->any())
            ->method('isSeekable')
            ->will($this->returnValue(false));

        UploadBuilder::newInstance()
            ->setBucket('foo')
            ->setKey('bar')
            ->setSource($source)
            ->resumeFrom('abc')
            ->setClient($this->getServiceBuilder()->get('s3'))
            ->build();
    }

    public function testAllowsForExplicitStateObject()
    {
        $state = new TransferState(UploadId::fromParams(array(
            'Bucket'   => 'foo',
            'Key'      => 'bar',
            'UploadId' => 'baz'
        )));

        $uploader = UploadBuilder::newInstance()
            ->resumeFrom($state)
            ->setClient($this->getServiceBuilder()->get('s3'))
            ->setSource(EntityBody::factory('test'))
            ->build();
        $this->assertSame($state, $uploader->getState());
    }

    public function testCanResumeStateByLoadingFromS3()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array('s3/list_parts_page_2'));
        $transfer = UploadBuilder::newInstance()
            ->setBucket('foo')
            ->setKey('bar')
            ->resumeFrom('abc')
            ->setClient($client)
            ->setSource(EntityBody::factory('test'))
            ->build();
        $this->assertEquals(1, count($mock->getReceivedRequests()));
        $this->assertEquals(2, count($transfer->getState()));
    }

    public function testCanCreateNewStateByInitiatingMultipartUpload()
    {
        $acl = new Acp(new Grantee('123'));
        $acl->addGrant(new Grant(new Grantee('123'), Permission::READ));
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array('s3/initiate_multipart_upload'));
        $expires = time() + 1000;
        $transfer = UploadBuilder::newInstance()
            ->setBucket('foo')
            ->setKey('bar')
            ->setClient($client)
            ->setSource(__FILE__)
            ->setHeaders(array('Foo' => 'Bar'))
            ->setOption('Expires', $expires)
            ->setAcp($acl)
            ->calculateMd5(true)
            ->build();
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('/bar?uploads', $requests[0]->getResource());
        $this->assertEquals('Bar', (string) $requests[0]->getHeader('Foo'));
        $this->assertEquals($expires, strtotime((string) $requests[0]->getHeader('Expires')));
        $this->assertEquals('text/x-php', (string) $requests[0]->getHeader('Content-Type'));
        $this->assertNotEmpty((string) $requests[0]->getHeader('x-amz-meta-x-amz-Content-MD5'));
        $this->assertEquals('id="123"', (string) $requests[0]->getHeader('x-amz-grant-read'));
        $this->assertTrue($requests[0]->hasHeader('x-amz-grant-read'));
    }

    public function testBuildsDifferentUploaderBasedOnConcurrency()
    {
        $state = new TransferState(UploadId::fromParams(array(
            'Bucket'   => 'foo',
            'Key'      => 'bar',
            'UploadId' => 'baz'
        )));

        $b = UploadBuilder::newInstance()
            ->setClient($this->getServiceBuilder()->get('s3'))
            ->setSource(EntityBody::factory(fopen(__FILE__, 'r')))
            ->resumeFrom($state);

        $this->assertInstanceOf('Aws\S3\Model\MultipartUpload\SerialTransfer', $b->build());
        $b->setConcurrency(2);
        $this->assertInstanceOf('Aws\S3\Model\MultipartUpload\ParallelTransfer', $b->build());
    }

    public function testDoesNotClobberContentTypeParam()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $mock = $this->setMockResponse($client, array('s3/initiate_multipart_upload'));
        $transfer = UploadBuilder::newInstance()
            ->setBucket('foo')
            ->setKey('bar')
            ->setClient($client)
            ->setSource(__FILE__)
            ->setOption('ContentType', 'x-foo')
            ->build();
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('x-foo', (string) $requests[0]->getHeader('Content-Type'));
    }

    public function testDoesNotClobberContentTypeHeader()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $mock = $this->setMockResponse($client, array('s3/initiate_multipart_upload'));
        $transfer = UploadBuilder::newInstance()
            ->setBucket('foo')
            ->setKey('bar')
            ->setClient($client)
            ->setSource(__FILE__)
            ->setHeaders(array('Content-Type' => 'x-foo'))
            ->build();
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('x-foo', (string) $requests[0]->getHeader('Content-Type'));
    }
}
