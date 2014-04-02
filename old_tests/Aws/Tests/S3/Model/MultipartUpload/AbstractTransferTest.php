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

use Aws\Common\Enum\DateFormat;
use Aws\S3\Model\MultipartUpload\AbstractTransfer;
use Aws\S3\Model\MultipartUpload\TransferState;
use Aws\S3\Model\MultipartUpload\UploadPart;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\S3\Model\MultipartUpload\AbstractTransfer
 */
class AbstractTransferTest extends \Guzzle\Tests\GuzzleTestCase
{
    /** @var \Aws\S3\S3Client */
    protected $client;

    /** @var \Aws\S3\Model\MultipartUpload\AbstractTransfer */
    protected $transfer;

    public function prepareTransfer(
        $useRealClient = false,
        $contentLength = AbstractTransfer::MIN_PART_SIZE,
        $partLength = AbstractTransfer::MIN_PART_SIZE
    ) {
        $uploadId = $this->getMockBuilder('Aws\S3\Model\MultipartUpload\UploadId')
            ->setMethods(array('toParams'))
            ->getMock();
        $uploadId->expects($this->any())
            ->method('toParams')
            ->will($this->returnValue(array(
                'Bucket'   => 'foo',
                'Key'      => 'bar',
                'UploadId' => 'baz'
            )
        ));

        $body = $this->getMockBuilder('Guzzle\Http\EntityBody')
            ->disableOriginalConstructor()
            ->setMethods(array('getContentLength'))
            ->getMock();
        $body->expects($this->any())
            ->method('getContentLength')
            ->will($this->returnValue($contentLength));

        if ($useRealClient) {
            $client = $this->getServiceBuilder()->get('s3', true);
        } else {
            $client = $this->getMockBuilder('Aws\S3\S3Client')
                ->disableOriginalConstructor()
                ->getMock();
        }

        $state = $this->getMockBuilder('Aws\S3\Model\MultipartUpload\TransferState')
            ->disableOriginalConstructor()
            ->getMock();
        $state->expects($this->any())
            ->method('getUploadId')
            ->will($this->returnValue($uploadId));
        $state->expects($this->any())
            ->method('getIterator')
            ->will($this->returnValue(new \ArrayIterator(array(
            UploadPart::fromArray(array(
                'PartNumber'   => 1,
                'ETag'         => 'aaa',
                'LastModified' => gmdate(DateFormat::RFC2822),
                'Size'         => 5
            )),
            UploadPart::fromArray(array(
                'PartNumber'   => 2,
                'ETag'         => 'bbb',
                'LastModified' => gmdate(DateFormat::RFC2822),
                'Size'         => 5
            ))
        ))));

        $this->client = $client;
        $this->transfer = $this->getMockForAbstractClass('Aws\S3\Model\MultipartUpload\AbstractTransfer', array(
            $client, $state, $body, array('min_part_size' => $partLength)
        ));
    }

    protected function callProtectedMethod($object, $method, array $args = array())
    {
        $reflectedObject = new \ReflectionObject($object);
        $reflectedMethod = $reflectedObject->getMethod($method);
        $reflectedMethod->setAccessible(true);

        return $reflectedMethod->invokeArgs($object, $args);
    }

    public function partSizeDataProvider()
    {
        return array(
            array(8242880, null, 5242880),
            array(8242880, 7242880, 7242880),
            array(false, 7242880, 7242880),
            array(false, 200, 5242880),
            array(false, 72428800000, 5368709120),
            array(false, null, null, 'Aws\Common\Exception\RuntimeException')
        );
    }

    /**
     * @dataProvider partSizeDataProvider
     */
    public function testCalculatesPartSize($length, $partLength, $size, $throwException = null)
    {
        try {
            $this->prepareTransfer(false, $length, $partLength);
            $this->assertEquals($size, $this->readAttribute($this->transfer, 'partSize'));
        } catch (\Exception $e) {
            if (!$throwException) {
                throw $e;
            } else {
                $this->assertInstanceOf($throwException, $e);
            }
        }
    }

    public function testCanCompleteMultipartUpload()
    {
        $this->prepareTransfer();

        $model = $this->getMockBuilder('Guzzle\Service\Resource\Model')
            ->disableOriginalConstructor()
            ->getMock();
        $command = $this->getMockBuilder('Guzzle\Service\Command\OperationCommand')
            ->disableOriginalConstructor()
            ->getMock();
        $command->expects($this->any())
            ->method('getResult')
            ->will($this->returnValue($model));
        $this->client->expects($this->any())
            ->method('getCommand')
            ->will($this->returnValue($command));

        $this->assertInstanceOf(
            'Guzzle\Service\Resource\Model',
            $this->callProtectedMethod($this->transfer, 'complete')
        );
    }

    public function testCanGetAbortCommand()
    {
        $this->prepareTransfer(true);

        $abortCommand = $this->callProtectedMethod($this->transfer, 'getAbortCommand');
        $this->assertInstanceOf('Guzzle\Service\Command\OperationCommand', $abortCommand);
        $this->assertEquals('foo', $abortCommand->get('Bucket'));
    }
}
