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

    public function testIgnoresEmptyBatches()
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
