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
use Aws\S3\Model\MultipartUpload\UploadId;

/**
 * @covers Aws\S3\Model\MultipartUpload\TransferState
 */
class TransferStateTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFromUploadIdFactoryWorks()
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

        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array('s3/list_parts_page_2'));

        $state = TransferState::fromUploadId($client, $uploadId);
        $this->assertInstanceOf('Aws\S3\Model\MultipartUpload\TransferState', $state);
        $this->assertEquals(1, count($mock->getReceivedRequests()));
    }
}
