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
use Aws\Glacier\Model\MultipartUpload\ParallelTransfer;
use Aws\Glacier\Model\MultipartUpload\UploadPartGenerator;
use Guzzle\Http\EntityBody;
use Guzzle\Http\EntityBodyInterface;

// Special test class for cheating the partSize :-(
class SpecialUploadPartGenerator extends UploadPartGenerator {
    protected function generateUploadParts(EntityBodyInterface $body) {
        $this->partSize = 1024;
        parent::generateUploadParts($body);
    }
}

/**
 * @covers Aws\Glacier\Model\MultipartUpload\ParallelTransfer
 */
class ParallelTransferTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getMockUploadId()
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

        return $uploadId;
    }

    protected function prepComponents()
    {
        $uploadId = $this->getMockUploadId();
        $body = EntityBody::factory(fopen(__FILE__, 'r'));

        $generator = SpecialUploadPartGenerator::factory($body, 1024 * 1024);
        $client = $this->getServiceBuilder()->get('glacier', true);
        $state = new TransferState($uploadId);
        $state->setPartGenerator($generator);
        $transfer = new ParallelTransfer($client, $state, $body, array('concurrency' => 2));

        return array($transfer, $client, $state);
    }

    public function testSuccessfulTransfer()
    {
        list($transfer, $client) = $this->prepComponents();

        $mocks = array();
        for ($i = 0; $i < intval(ceil(filesize(__FILE__) / 1024)); $i++) {
            $mocks[] = 'glacier/upload_part';
        }
        $mocks[] = 'glacier/complete_multipart_upload';
        $mock = $this->setMockResponse($client, $mocks);

        $result = $transfer->upload();

        $requests = $mock->getReceivedRequests();
        $this->assertEquals($i + 1, count($requests));
        for ($j = 0; $j < $i; $j++) {
            $this->assertEquals('PUT', $requests[$j]->getMethod());
        }
        $this->assertEquals('PUT', $requests[4]->getMethod());
        $this->assertInstanceOf('Guzzle\Service\Resource\Model', $result);
    }

    public function testStoppingWillStopTransfer()
    {
        list($transfer) = $this->prepComponents();

        $transfer->getEventDispatcher()->addListener(ParallelTransfer::BEFORE_PART_UPLOAD, function($event) {
            $event['transfer']->stop();
        });

        $result = $transfer->upload();

        $this->assertNull($result);
    }

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     */
    public function testEnsuresTheFileIsLocalAndSeekable()
    {
        $transfer = new ParallelTransfer(
            $this->getServiceBuilder()->get('glacier'),
            new TransferState($this->getMockUploadId()),
            EntityBody::factory('foo')
        );
    }

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     */
    public function testEnsuresConcurrencyIsSpecified()
    {
        $transfer = new ParallelTransfer(
            $this->getServiceBuilder()->get('glacier'),
            new TransferState($this->getMockUploadId()),
            EntityBody::factory(fopen(__FILE__, 'r'))
        );
    }
}
