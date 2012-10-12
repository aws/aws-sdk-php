<?php

namespace Aws\Tests\S3\Model;

use Aws\S3\Model\MultipartUpload\AbstractTransfer;
use Aws\S3\Model\MultipartUpload\TransferState;
use Aws\S3\Model\MultipartUpload\TransferInterface;
use Guzzle\Http\EntityBody;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\S3\Model\MultipartUpload\AbstractTransfer
 */
class AbstractTransferTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHasEvents()
    {
        $this->assertInternalType('array', AbstractTransfer::getAllEvents());
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
    public function testCalculatesPartSize($len, $partLen, $size, $throwException = null)
    {
        $body = $this->getMockBuilder('Guzzle\Http\EntityBody')
            ->disableOriginalConstructor()
            ->setMethods(array('getContentLength'))
            ->getMock();

        $body->expects($this->any())
            ->method('getContentLength')
            ->will($this->returnValue($len));

        try {
            $upload = $this->getMockBuilder('Aws\S3\Model\MultipartUpload\AbstractTransfer')
                ->setConstructorArgs(array(
                    $this->getServiceBuilder()->get('s3'),
                    new TransferState('foo', 'baz', 'bar'),
                    $body,
                    array('min_part_size' => $partLen)
                ))
                ->getMockForAbstractClass();
            $this->assertEquals($size, $this->readAttribute($upload, 'partSize'));
        } catch (\Exception $e) {
            if (!$throwException) {
                throw $e;
            } else {
                $this->assertInstanceOf($throwException, $e);
            }
        }
    }

    public function testHasGetters()
    {
        $state = new TransferState('foo', 'baz', 'bar');
        $upload = $this->getMockBuilder('Aws\S3\Model\MultipartUpload\AbstractTransfer')
            ->setConstructorArgs(array(
                $this->getServiceBuilder()->get('s3'),
                $state,
                EntityBody::factory()
            ))
            ->getMockForAbstractClass();
        $this->assertSame($state, $upload->getState());
        $options = $upload->getOptions();
        $this->assertEquals(true, $options['part_md5']);
        $this->assertEquals(5242880, $options['min_part_size']);
    }

    public function testAbortsMultipartUpload()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $state = new TransferState('foo', 'baz', 'bar');
        $upload = $this->getMockBuilder('Aws\S3\Model\MultipartUpload\AbstractTransfer')
            ->setConstructorArgs(array(
                $this->getServiceBuilder()->get('s3'),
                $state,
                EntityBody::factory()
            ))
            ->getMockForAbstractClass();

        $mock = $this->setMockResponse($client, array(Response::fromMessage("HTTP/1.1 204 OK\r\nContent-Length: 0\r\n\r\n")));
        $upload->abort();
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('DELETE', $requests[0]->getMethod());
        $this->assertEquals('/baz?uploadId=bar', $requests[0]->getResource());
        $this->assertTrue($state->isAborted());
    }

    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage The transfer has been aborted and cannot be uploaded
     */
    public function testThrowsExceptionWhenAttemptingToUploadAbortedTransfer()
    {
        $state = new TransferState('foo', 'baz', 'bar');
        $state->setAborted(true);
        $transfer = $this->getMockBuilder('Aws\S3\Model\MultipartUpload\AbstractTransfer')
            ->setConstructorArgs(array(
                $this->getServiceBuilder()->get('s3'),
                $state,
                EntityBody::factory()
            ))
            ->getMockForAbstractClass();
        $transfer->upload();
    }

    /**
     * @expectedException \Aws\S3\Exception\MultipartUploadException
     */
    public function testWrapsExceptionsThrownDuringUpload()
    {
        $transfer = $this->getMockBuilder('Aws\S3\Model\MultipartUpload\AbstractTransfer')
            ->setConstructorArgs(array(
                $this->getServiceBuilder()->get('s3'),
                new TransferState('foo', 'baz', 'bar'),
                EntityBody::factory()
            ))
            ->setMethods(array('transfer'))
            ->getMockForAbstractClass();

        $e = new \Exception('Foo');
        $transfer->expects($this->once())
            ->method('transfer')
            ->will($this->throwException($e));

        $transfer->upload();
    }

    public function testCompletesUploadAndDispatchesEvents()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, 's3/complete_multipart_upload');

        $state = new TransferState('foo', 'baz', 'bar');
        $state->addPart(1, '"abc"', 100, gmdate('r'));

        $transfer = $this->getMockBuilder('Aws\S3\Model\MultipartUpload\AbstractTransfer')
            ->setConstructorArgs(array(
                $client,
                $state,
                EntityBody::factory()
            ))
            ->setMethods(array('transfer'))
            ->getMockForAbstractClass();

        $transfer->expects($this->once())
            ->method('transfer')
            ->will($this->returnValue(true));

        $observer = $this->getWildcardObserver($transfer);
        $transfer->upload();
        $this->assertEquals(array(
            TransferInterface::AFTER_UPLOAD,
            TransferInterface::AFTER_COMPLETE
        ), array_keys($observer->getGrouped()));

        $requests = $mock->getReceivedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('POST', $requests[0]->getMethod());
        $this->assertEquals('/baz?uploadId=bar', $requests[0]->getResource());
        $this->assertContains('<PartNumber>1</PartNumber>', (string) $requests[0]->getBody());
        $this->assertContains('<ETag>"abc"</ETag>', (string) $requests[0]->getBody());
    }

    public function testStoppingReturnsState()
    {
        $state = new TransferState('foo', 'baz', 'bar');
        $transfer = $this->getMockBuilder('Aws\S3\Model\MultipartUpload\AbstractTransfer')
            ->setConstructorArgs(array(
                $this->getServiceBuilder()->get('s3'),
                $state,
                EntityBody::factory()
            ))
            ->setMethods(array('transfer'))
            ->getMockForAbstractClass();
        $this->assertSame($state, $transfer->stop());
        $this->assertEquals(true, $this->readAttribute($transfer, 'stopped'));
    }
}
