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

namespace Aws\Tests\Common\Model\MultipartUpload;

use Aws\Common\Model\MultipartUpload\AbstractTransfer;
use Aws\Common\Model\MultipartUpload\AbstractTransferState;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\Common\Model\MultipartUpload\AbstractTransfer
 */
class AbstractTransferTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getMockedTransfer(\Closure $closure = null)
    {
        $state = $this->getMockBuilder('Aws\Common\Model\MultipartUpload\AbstractTransferState')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
        $transfer = $this->getMockBuilder('Aws\Common\Model\MultipartUpload\AbstractTransfer')
            ->setConstructorArgs(array(
                $this->getMockBuilder('Aws\Common\Client\AbstractClient')
                    ->disableOriginalConstructor()
                    ->getMockForAbstractClass(),
                $state,
                EntityBody::factory(),
                array('foo' => 'bar')
            ))
            ->getMockForAbstractClass();

        if ($closure) {
            $closure($transfer, $state);
        }

        return $transfer;
    }

    public function testHasEvents()
    {
        $this->assertInternalType('array', AbstractTransfer::getAllEvents());
    }

    public function testHasGetters()
    {
        $transfer = $this->getMockedTransfer();

        $this->assertInstanceOf('Aws\Common\Model\MultipartUpload\AbstractTransferState', $transfer->getState());
        $this->assertInternalType('array', $transfer->getOptions());
        $this->assertArrayHasKey('foo', $transfer->getOptions());
    }

    public function testCanAbortUpload()
    {

        $transfer = $this->getMockedTransfer();
        $model = $this->getMockBuilder('Guzzle\Service\Resource\Model')
            ->disableOriginalConstructor()
            ->getMock();
        $command = $this->getMockBuilder('Guzzle\Service\Command\OperationCommand')
            ->disableOriginalConstructor()
            ->getMock();
        $command->expects($this->any())
            ->method('getResult')
            ->will($this->returnValue($model));
        $transfer->expects($this->any())
            ->method('getAbortCommand')
            ->will($this->returnValue($command));

        $transfer->abort();
        $this->assertTrue($this->readAttribute($transfer, 'stopped'));
    }

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage The transfer has been aborted and cannot be uploaded
     */
    public function testThrowsExceptionWhenAttemptingToUploadAbortedTransfer()
    {
        $transfer = $this->getMockedTransfer(function ($transfer, $state) {
            $state->setAborted(true);
        });

        $transfer->upload();
    }

    /**
     * @expectedException Aws\Common\Exception\MultipartUploadException
     */
    public function testWrapsExceptionsThrownDuringUpload()
    {
        $transfer = $this->getMockedTransfer();
        $e = new \Exception('foo');
        $transfer->expects($this->once())
            ->method('transfer')
            ->will($this->throwException($e));

        $transfer->upload();
    }

    public function testCompletesUploadAndDispatchesEvents()
    {
        $transfer = $this->getMockedTransfer();
        $model = $this->getMockBuilder('Guzzle\Service\Resource\Model')
            ->disableOriginalConstructor()
            ->getMock();
        $transfer->expects($this->once())
            ->method('complete')
            ->will($this->returnValue($model));

        $observer = $this->getWildcardObserver($transfer);
        $this->assertInstanceOf('Guzzle\Service\Resource\Model', $transfer->upload());
        $this->assertEquals(array(
            $transfer::AFTER_UPLOAD,
            $transfer::AFTER_COMPLETE
        ), array_keys($observer->getGrouped()));
    }

    public function testStoppingReturnsState()
    {
        $transfer = $this->getMockedTransfer();
        $state = null;
        $transfer->getEventDispatcher()->addListener($transfer::BEFORE_UPLOAD, function ($event) use (&$state) {
            $state = $event['transfer']->stop();
        });
        $transfer->upload();
        $this->assertInstanceOf('Aws\Common\Model\MultipartUpload\AbstractTransferState', $state);
    }

    public function testIsInvokable()
    {
        $transfer = $this->getMockedTransfer();
        $transfer->expects($this->once())
            ->method('transfer');
        $transfer();
    }
}
