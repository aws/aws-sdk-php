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

use Aws\Glacier\Model\MultipartUpload\AbstractTransfer;
use Aws\Glacier\Model\MultipartUpload\TransferState;
use Aws\Glacier\Model\MultipartUpload\UploadPart;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\Glacier\Model\MultipartUpload\AbstractTransfer
 */
class AbstractTransferTest extends \Guzzle\Tests\GuzzleTestCase
{
    /** @var \Aws\Glacier\GlacierClient */
    protected $client;

    /** @var \Aws\Glacier\Model\MultipartUpload\AbstractTransfer */
    protected $transfer;

    public function prepareTransfer($useRealClient = false)
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

        $generator = $this->getMockBuilder('Aws\Glacier\Model\MultipartUpload\UploadPartGenerator')
            ->disableOriginalConstructor()
            ->getMock();
        $generator->expects($this->any())
            ->method('getPartSize')
            ->will($this->returnValue(1024 * 1024));

        $body = EntityBody::factory(fopen(__FILE__, 'r'));

        if ($useRealClient) {
            $client = $this->getServiceBuilder()->get('glacier', true);
        } else {
            $client = $this->getMockBuilder('Aws\Glacier\GlacierClient')
                ->disableOriginalConstructor()
                ->getMock();
        }

        $state = $this->getMockBuilder('Aws\Glacier\Model\MultipartUpload\TransferState')
            ->disableOriginalConstructor()
            ->getMock();
        $state->expects($this->any())
            ->method('getUploadId')
            ->will($this->returnValue($uploadId));
        $state->expects($this->any())
            ->method('getPartGenerator')
            ->will($this->returnValue($generator));

        $this->client = $client;
        $this->transfer = $this->getMockForAbstractClass('Aws\Glacier\Model\MultipartUpload\AbstractTransfer', array(
            $client, $state, $body
        ));
    }

    protected function callProtectedMethod($object, $method, array $args = array())
    {
        $reflectedObject = new \ReflectionObject($object);
        $reflectedMethod = $reflectedObject->getMethod($method);
        $reflectedMethod->setAccessible(true);

        return $reflectedMethod->invokeArgs($object, $args);
    }

    public function testCanGetPartSize()
    {
        $this->prepareTransfer();
        $this->assertEquals(1024 * 1024, $this->callProtectedMethod($this->transfer, 'calculatePartSize'));
    }

    public function testCanCompleteMultipartUpload()
    {
        $this->prepareTransfer();

        $model = $this->getMockBuilder('Guzzle\Service\Resource\Model')
            ->disableOriginalConstructor()
            ->getMock();
        $command = $this->getMockBuilder('Guzzle\Service\Command\OperationCommand')
            ->disableOriginalConstructor()
            ->getMock();
        $command->expects($this->any())
            ->method('getResult')
            ->will($this->returnValue($model));
        $this->client->expects($this->any())
            ->method('getCommand')
            ->will($this->returnValue($command));

        $this->assertInstanceOf(
            'Guzzle\Service\Resource\Model',
            $this->callProtectedMethod($this->transfer, 'complete')
        );
    }

    public function testCanGetAbortCommand()
    {
        $this->prepareTransfer(true);

        $abortCommand = $this->callProtectedMethod($this->transfer, 'getAbortCommand');
        $this->assertInstanceOf('Guzzle\Service\Command\OperationCommand', $abortCommand);
        $this->assertEquals('foo', $abortCommand->get('vaultName'));
    }

    public function testCanGetCommandForUploadPart()
    {
        $this->prepareTransfer(true);

        $part = UploadPart::fromArray(array(
            'partNumber'  => 1,
            'checksum'    => 'foo',
            'contentHash' => 'bar',
            'size'        => 10,
            'offset'      => 5
        ));

        $command = $this->callProtectedMethod($this->transfer, 'getCommandForPart', array($part, true));
        $this->assertInstanceOf('Guzzle\Service\Command\OperationCommand', $command);
        $this->assertEquals('foo', $command->get('checksum'));
    }
}
