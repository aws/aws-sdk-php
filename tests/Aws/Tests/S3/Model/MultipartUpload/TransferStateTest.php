<?php

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
