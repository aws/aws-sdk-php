<?php

namespace Aws\Tests\S3\Model\MultipartUpload;

use Aws\S3\Model\MultipartUpload\TransferState;
use Aws\S3\Model\MultipartUpload\UploadId;

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
