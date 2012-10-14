<?php

namespace Aws\Tests\S3\Model;

use Aws\S3\Model\MultipartUpload\TransferState;
use Aws\S3\Model\MultipartUpload\ParallelTransfer;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\S3\Model\MultipartUpload\ParallelTransfer
 */
class ParallelTransferTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage The source data must be a local file stream when uploading in parallel
     */
    public function testEnsuresTheFileIsLocalAndSeekable()
    {
        $transfer = new ParallelTransfer(
            $this->getServiceBuilder()->get('s3'),
            new TransferState('foo', 'baz', 'bar'),
            EntityBody::factory('foo')
        );
    }

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage The `concurrency` option must be specified when instantiating
     */
    public function testEnsuresConcurrencyIsSpecified()
    {
        $transfer = new ParallelTransfer(
            $this->getServiceBuilder()->get('s3'),
            new TransferState('foo', 'baz', 'bar'),
            EntityBody::factory(fopen(__FILE__, 'r'))
        );
    }

    public function testTransfersPartsInParallel()
    {
        // Calculate the result of the test (using the test file as a control)
        $totalSize = filesize(__FILE__);
        $partSize = 300;
        $partCount = (int) ceil($totalSize / $partSize);
        $concurrency = 3;

        // Build up the ParallelTransfer object
        $resource = fopen(__FILE__, 'r');
        $body = new EntityBody($resource);
        fseek($resource, 0);
        $state = new TransferState('foo', 'baz', 'bar');
        $client = $this->getServiceBuilder()->get('s3');
        $transfer = new ParallelTransfer($client, $state, $body, array(
            'concurrency' => $concurrency
        ));

        // Modify the partSize for the test
        $refClass = new \ReflectionClass($transfer);
        $property = $refClass->getProperty('partSize');
        $property->setAccessible(true);
        $property->setValue($transfer, $partSize);

        $mocks = array();
        for ($i = 0; $i < $partCount; $i++) {
            $mocks[] = 's3/upload_part';
        }
        $mocks[] = 's3/complete_multipart_upload';
        $mock = $this->setMockResponse($client, $mocks);

        $transfer->upload();
        $requests = $mock->getReceivedRequests();
        $this->assertEquals($partCount + 1, count($requests));
    }

    public function testStoppingWillStopTransfer()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array('s3/initiate_multipart_upload'));
        $transfer = new ParallelTransfer(
            $client,
            new TransferState('foo', 'baz', 'bar'),
            EntityBody::factory(fopen(__FILE__, 'r')),
            array('concurrency' => 1)
        );
        $transfer->getEventDispatcher()->addListener(ParallelTransfer::BEFORE_PART_UPLOAD, function($event) {
            $event['transfer']->stop();
        });
        $transfer->upload();
        $this->assertEquals(1, count($mock->getReceivedRequests()));
    }
}
