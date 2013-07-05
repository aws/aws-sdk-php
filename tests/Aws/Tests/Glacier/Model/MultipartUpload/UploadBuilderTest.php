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

namespace Aws\Tests\Glacier\Model\MultipartUpload;

use Aws\Glacier\Model\MultipartUpload\TransferState;
use Aws\Glacier\Model\MultipartUpload\UploadBuilder;
use Aws\Glacier\Model\MultipartUpload\UploadId;
use Aws\Glacier\Model\MultipartUpload\UploadPartGenerator;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\Glacier\Model\MultipartUpload\UploadBuilder
 */
class UploadBuilderTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHasChainableMethodToInstantiate()
    {
        $this->assertInstanceOf('Aws\Glacier\Model\MultipartUpload\UploadBuilder', UploadBuilder::newInstance());
    }

    public function testHasChainableSetterMethods()
    {
        /** @var $builder UploadBuilder */
        $builder = UploadBuilder::newInstance();
        $builder->setAccountId('foo')
            ->setVaultName('bar')
            ->setPartGenerator(UploadPartGenerator::factory(EntityBody::factory('foo'), 1024 * 1024))
            ->setConcurrency(1)
            ->setPartSize(1024 * 1024)
            ->setArchiveDescription('abc');

        $this->assertEquals('foo', $this->readAttribute($builder, 'accountId'));
        $this->assertEquals('bar', $this->readAttribute($builder, 'vaultName'));
        $this->assertEquals('abc', $this->readAttribute($builder, 'archiveDescription'));
        $this->assertEquals(1, $this->readAttribute($builder, 'concurrency'));
        $this->assertEquals(1024 * 1024, $this->readAttribute($builder, 'partSize'));
        $this->assertInstanceOf(
            'Aws\Glacier\Model\MultipartUpload\UploadPartGenerator',
            $this->readAttribute($builder, 'partGenerator')
        );
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage You must specify a vault name, client, and source.
     */
    public function testValidatesThatRequiredFieldsAreSet()
    {
        UploadBuilder::newInstance()->build();
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage You cannot upload from a non-seekable source.
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
            ->setVaultName('foo')
            ->setSource($source)
            ->resumeFrom('abc')
            ->setClient($this->getServiceBuilder()->get('glacier'))
            ->build();
    }

    public function testCanResumeStateByLoadingFromGlacier()
    {
        $generator = $this->getMockBuilder('Aws\Glacier\Model\MultipartUpload\UploadPartGenerator')
            ->disableOriginalConstructor()
            ->getMock();

        $client = $this->getServiceBuilder()->get('glacier');
        $mock = $this->setMockResponse($client, array('glacier/list_parts'));

        $transfer = UploadBuilder::newInstance()
            ->setVaultName('foo')
            ->resumeFrom('abc')
            ->setClient($client)
            ->setSource(EntityBody::factory('foo'))
            ->setPartGenerator($generator)
            ->build();

        $this->assertEquals(1, count($mock->getReceivedRequests()));
        $this->assertEquals(2, count($transfer->getState()));
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testResumeThrowsExceptionIfNoPartGenerator()
    {
        $client = $this->getServiceBuilder()->get('glacier');
        $transfer = UploadBuilder::newInstance()
            ->setVaultName('foo')
            ->resumeFrom('abc')
            ->setClient($client)
            ->setSource(EntityBody::factory('foo'))
            ->build();
    }

    public function testCanCreateNewStateByInitiatingMultipartUpload()
    {
        $generator = $this->getMockBuilder('Aws\Glacier\Model\MultipartUpload\UploadPartGenerator')
            ->disableOriginalConstructor()
            ->getMock();

        $client = $this->getServiceBuilder()->get('glacier');
        $mock = $this->setMockResponse($client, array('glacier/initiate_multipart_upload'));
        $transfer = UploadBuilder::newInstance()
            ->setVaultName('foo')
            ->setClient($client)
            ->setSource(EntityBody::factory('foo'))
            ->setPartGenerator($generator)
            ->build();
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertInstanceOf('Aws\Glacier\Model\MultipartUpload\TransferState', $transfer->getState());
    }

    public function testBuildsDifferentUploaderBasedOnConcurrency()
    {
        $generator = $this->getMockBuilder('Aws\Glacier\Model\MultipartUpload\UploadPartGenerator')
            ->setMethods(array('getPartSize'))
            ->disableOriginalConstructor()
            ->getMock();
        $generator->expects($this->any())
            ->method('getPartSize')
            ->will($this->returnValue(1024 * 1024));
        $state = new TransferState(UploadId::fromParams(array(
            'accountId' => 'foo',
            'vaultName' => 'baz',
            'uploadId'  => 'bar'
        )));
        $state->setPartGenerator($generator);

        $b = UploadBuilder::newInstance()
            ->setVaultName('foo')
            ->setPartGenerator($generator)
            ->setClient($this->getServiceBuilder()->get('glacier'))
            ->resumeFrom($state)
            ->setSource(EntityBody::factory(fopen(__FILE__, 'r')));

        $this->assertInstanceOf('Aws\Glacier\Model\MultipartUpload\SerialTransfer', $b->build());
        $b->setConcurrency(2);
        $this->assertInstanceOf('Aws\Glacier\Model\MultipartUpload\ParallelTransfer', $b->build());
    }
}
