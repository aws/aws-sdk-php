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
use Aws\Glacier\Model\MultipartUpload\SerialTransfer;
use Aws\Glacier\Model\MultipartUpload\UploadPartGenerator;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\Glacier\Model\MultipartUpload\SerialTransfer
 */
class SerialTransferTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function prepComponents()
    {
        $uploadId = $this->getMockBuilder('Aws\Glacier\Model\MultipartUpload\UploadId')
            ->setMethods(array('toParams'))
            ->getMock();
        $uploadId->expects($this->any())
            ->method('toParams')
            ->will($this->returnValue(array(
                'accountId' => '-',
                'vaultName' => 'foo',
                'uploadId'  => 'bar'
            )
        ));

        $body = EntityBody::factory(str_repeat('x', 1024 * 1024 + 1024));
        $generator = UploadPartGenerator::factory($body, 1024 * 1024);
        $client = $this->getServiceBuilder()->get('glacier', true);
        $state = new TransferState($uploadId);
        $state->setPartGenerator($generator);
        $transfer = new SerialTransfer($client, $state, $body);

        return array($transfer, $client, $state);
    }

    public function testSuccessfulTransfer()
    {
        list($transfer, $client) = $this->prepComponents();

        $mock = $this->setMockResponse($client, array(
            'glacier/upload_part',
            'glacier/upload_part',
            'glacier/complete_multipart_upload'
        ));

        $result = $transfer->upload();

        $requests = $mock->getReceivedRequests();
        $this->assertEquals(3, count($requests));
        $this->assertEquals('PUT', $requests[0]->getMethod());
        $this->assertEquals('PUT', $requests[1]->getMethod());
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
