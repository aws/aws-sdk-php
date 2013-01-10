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

use Aws\S3\Model\MultipartUpload\TransferState;
use Aws\S3\Model\MultipartUpload\SerialTransfer;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\S3\Model\MultipartUpload\SerialTransfer
 */
class SerialTransferTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function prepComponents($seekable = true)
    {
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

        if ($seekable) {
            $body = EntityBody::factory('abc123');
        } else {
            $stream = fopen('php://temp', 'rw');
            fwrite($stream, 'abc123');
            fseek($stream, 0);
            $body = $this->getMockBuilder('Guzzle\Http\EntityBody')
                ->setMethods(array('isSeekable'))
                ->setConstructorArgs(array($stream))
                ->getMock();
            $body->expects($this->any())
                ->method('isSeekable')
                ->will($this->returnValue(false));
        }

        $client = $this->getServiceBuilder()->get('s3', true);
        $state = new TransferState($uploadId);
        $transfer = new SerialTransfer($client, $state, $body);

        // Modify the partSize for the test
        $refClass = new \ReflectionClass($transfer);
        $property = $refClass->getProperty('partSize');
        $property->setAccessible(true);
        $property->setValue($transfer, 3);

        return array($transfer, $client, $state);
    }

    public function dataForTransferTest()
    {
        return array(array(true), array(false));
    }

    /**
     * @dataProvider dataForTransferTest
     */
    public function testSuccessfulTransfer($seekable)
    {
        list($transfer, $client) = $this->prepComponents($seekable);

        $mock = $this->setMockResponse($client, array(
            's3/upload_part',
            's3/upload_part',
            's3/complete_multipart_upload'
        ))->readBodies(true);

        $result = $transfer->upload();

        $requests = $mock->getReceivedRequests();
        $this->assertEquals(3, count($requests));
        $this->assertEquals('PUT', $requests[0]->getMethod());
        $this->assertEquals('abc', (string) $requests[0]->getBody());
        $this->assertEquals('PUT', $requests[1]->getMethod());
        $this->assertEquals('123', (string) $requests[1]->getBody());
        $this->assertEquals('POST', $requests[2]->getMethod());
        $this->assertInstanceOf('Guzzle\Service\Resource\Model', $result);
    }

    public function testStoppingWillStopTransfer()
    {
        list($transfer) = $this->prepComponents();

        $transfer->getEventDispatcher()->addListener(SerialTransfer::BEFORE_PART_UPLOAD, function($event) {
            $event['transfer']->stop();
        });

        $result = $transfer->upload();

        $this->assertNull($result);
    }
}
