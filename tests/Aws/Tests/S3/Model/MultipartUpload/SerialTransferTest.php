<?php

namespace Aws\Tests\S3\Model;

use Aws\S3\Model\MultipartUpload\TransferState;
use Aws\S3\Model\MultipartUpload\SerialTransfer;
use Guzzle\Http\EntityBody;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Service\ClientInterface;

/**
 * @covers Aws\S3\Model\MultipartUpload\SerialTransfer
 */
class SerialTransferTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testTransfersSeekableStreams()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $state = new TransferState('foo', 'baz', 'bar');
        $body = EntityBody::factory('abc123');
        $transfer = new SerialTransfer($client, $state, $body);
        $mock = $this->prepareMocks($transfer, $client);
        $result = $transfer->upload();
        $this->validateRequests($mock);
        $this->assertInstanceOf('SimpleXMLElement', $result);
    }

    public function testTransfersNonSeekableStreams()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $state = new TransferState('foo', 'baz', 'bar');

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

        $transfer = new SerialTransfer($client, $state, $body);
        $mock = $this->prepareMocks($transfer, $client);
        $result = $transfer->upload();
        $this->assertInstanceOf('SimpleXMLElement', $result);
        $this->validateRequests($mock);
    }

    /**
     * Validate that the correct requests were sent
     *
     * @param MockPlugin MockPlugin to check
     */
    protected function validateRequests(MockPlugin $mock)
    {
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(3, count($requests));
        $this->assertEquals('PUT', $requests[0]->getMethod());
        $this->assertEquals('abc', (string) $requests[0]->getBody());
        $this->assertEquals('PUT', $requests[1]->getMethod());
        $this->assertEquals('123', (string) $requests[1]->getBody());
        $this->assertEquals('POST', $requests[2]->getMethod());
    }

    /**
     * Prepare the mocks for testing
     *
     * @param SerialTransfer  Transfer to add mocks to
     * @param ClientInterface $client Client to mock
     *
     * @return MockPlugin
     */
    protected function prepareMocks(SerialTransfer $transfer, ClientInterface $client)
    {
        // Modify the partSize for the test
        $refClass = new \ReflectionClass($transfer);
        $property = $refClass->getProperty('partSize');
        $property->setAccessible(true);
        $property->setValue($transfer, 3);

        // Queue up mock responses (two uploads and one complete request)
        $mock = $this->setMockResponse($client, array(
            's3/upload_part',
            's3/upload_part',
            's3/complete_multipart_upload'
        ))->readBodies(true);

        return $mock;
    }

    public function testStoppingWillStopTransfer()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array('s3/initiate_multipart_upload'));
        $body = EntityBody::factory(fopen(__FILE__, 'r'));
        $transfer = new SerialTransfer($client, new TransferState('foo', 'baz', 'bar'), $body);
        $transfer->getEventDispatcher()->addListener(SerialTransfer::BEFORE_PART_UPLOAD, function($event) {
            $event['transfer']->stop();
        });
        $transfer->upload();
        $this->assertEquals(1, count($mock->getReceivedRequests()));
    }
}
