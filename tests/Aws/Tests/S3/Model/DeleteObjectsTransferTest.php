<?php

namespace Aws\Tests\S3\Model;

use Aws\S3\Model\DeleteObjectsTransfer;
use Aws\S3\Exception\DeleteMultipleObjectsException;

/**
 * @covers Aws\S3\Model\DeleteObjectsTransfer
 */
class DeleteObjectsTransferTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException \Aws\S3\Exception\InvalidArgumentException
     */
    public function testValidatesBatchData()
    {
        list($client, $transfer) = $this->getBatch();
        $transfer->transfer(array('foo'));
    }

    public function testIngoresEmptyBatches()
    {
        list($client, $transfer) = $this->getBatch();
        $transfer->transfer(array());
    }

    public function testThrowsExceptionWhenKeysHaveErrors()
    {
        list($client, $transfer) = $this->getBatch();
        $mock = $this->setMockResponse($client, array('s3/delete_multiple_objects_errors'));

        try {
            $transfer->transfer(array(array('Key' => 'foo')));
            $this->fail('Did not throw expected exception');
        } catch (DeleteMultipleObjectsException $e) {
            $errors = $e->getErrors();
            $this->assertEquals(1, count($errors));
            $this->assertEquals('sample2.txt', $errors[0]['Key']);
            $this->assertEquals('AccessDenied', $errors[0]['Code']);
            $this->assertEquals('Access Denied', $errors[0]['Message']);
        }
    }

    public function testDeletesUsingCommands()
    {
        list($client, $transfer) = $this->getBatch();
        $transfer->setMfa('foo');
        $mock = $this->setMockResponse($client, array('s3/delete_multiple_objects'));
        $transfer->transfer(array(array('Key' => 'foo')));
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertContains('<Key>foo</Key>', (string) $requests[0]->getBody());
        $this->assertEquals('foo', (string) $requests[0]->getHeader('x-amz-mfa'));
    }

    /**
     * @expectedException \Aws\Common\Exception\OverflowException
     */
    public function testEnsuresBatchSizeIsLessThan1000()
    {
        list($client, $transfer) = $this->getBatch();
        $transfer->transfer(range(0, 1001));
    }

    /**
     * @return array
     */
    protected function getBatch()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $transfer = new DeleteObjectsTransfer($client, 'foo');

        return array($client, $transfer);
    }
}
