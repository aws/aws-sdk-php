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
use Aws\Glacier\Model\MultipartUpload\UploadId;

/**
 * @covers Aws\Glacier\Model\MultipartUpload\TransferState
 */
class TransferStateTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFromUploadIdFactoryWorks()
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

        $client = $this->getServiceBuilder()->get('glacier');
        $mock = $this->setMockResponse($client, array('glacier/list_parts'));

        $state = TransferState::fromUploadId($client, $uploadId);
        $this->assertInstanceOf('Aws\Glacier\Model\MultipartUpload\TransferState', $state);
        $this->assertEquals(1, count($mock->getReceivedRequests()));
    }

    public function testGettersAndSetters()
    {
        $uploadId = $this->getMock('Aws\Glacier\Model\MultipartUpload\UploadId');
        $generator = $this->getMockBuilder('Aws\Glacier\Model\MultipartUpload\UploadPartGenerator')
            ->disableOriginalConstructor()
            ->getMock();

        $state = new TransferState($uploadId);
        $state->setPartGenerator($generator);
        $this->assertSame($generator, $state->getPartGenerator());
    }
}
