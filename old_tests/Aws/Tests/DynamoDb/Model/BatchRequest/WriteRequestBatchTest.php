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

namespace Aws\Tests\DynamoDb\Model\BatchRequest;

use Aws\DynamoDb\Exception\UnprocessedWriteRequestsException;
use Aws\DynamoDb\Model\BatchRequest\UnprocessedRequest;
use Aws\DynamoDb\Model\BatchRequest\WriteRequestBatch;
use Guzzle\Batch\FlushingBatch;
use Guzzle\Batch\Exception\BatchTransferException;

/**
 * @covers Aws\DynamoDb\Model\BatchRequest\WriteRequestBatch
 */
class WriteRequestBatchTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @return \Aws\DynamoDb\DynamoDbClient
     */
    public function getMockedClient()
    {
        return $this->getMockBuilder('Aws\DynamoDb\DynamoDbClient')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @param \PHPUnit_Framework_MockObject_Stub_Return $will
     *
     * @return FlushingBatch
     */
    protected function getWriteRequestBatchWithMockedBatch($will)
    {
        $batch = $this->getMock('Guzzle\Batch\BatchInterface');
        $batch->expects($this->any())
            ->method('isEmpty')
            ->will($this->onConsecutiveCalls(false, true));
        $batch->expects($this->any())
            ->method('flush')
            ->will($will);
        $batch = new FlushingBatch(new WriteRequestBatch($batch), 5);

        return $batch;
    }

    public function testFactoryCreatesCorrectBatch()
    {
        $batch = WriteRequestBatch::factory($this->getMockedClient());
        $decorators = array();
        foreach ($batch->getDecorators() as $decorator) {
            $decorators[] = get_class($decorator);
        }

        $this->assertEquals(array(
            'Guzzle\Batch\FlushingBatch',
            'Aws\DynamoDb\Model\BatchRequest\WriteRequestBatch',
        ), $decorators);
    }

    public function testFactoryCanAddNotifyingBatchDecorator()
    {
        $batch = WriteRequestBatch::factory($this->getMockedClient(), 10, function () {});
        $decorators = array_map('get_class', $batch->getDecorators());
        $this->assertContains('Guzzle\Batch\NotifyingBatch', $decorators);
    }

    public function getAddItemData()
    {
        $client = $this->getServiceBuilder()->get('dynamodb');
        $data   = array();

        // Exception when not a write request or command
        $data[] = array(null, true);

        // Works with a delete_item command
        $data[] = array(
            $client->getCommand('DeleteItem')
                ->set('TableName', 'foo')
                ->set('Key', array(
                    'HashKeyElement' => array('S' => 'bar')
                )),
            false
        );

        // Works with a put_item command
        $data[] = array(
            $client->getCommand('PutItem')
                ->set('TableName', 'foo')
                ->set('Item', array(
                    'id' => array('S' => 'bar')
                )),
            false
        );

        // Exception with a arbitrary command
        $data[] = array($client->getCommand('ListTables'), true);

        // Works with a write request
        $data[] = array($this->getMock('Aws\DynamoDb\Model\BatchRequest\WriteRequestInterface'), false);

        return $data;
    }

    /**
     * @dataProvider getAddItemData
     */
    public function testAddItem($item, $isEmpty)
    {
        $batch = WriteRequestBatch::factory($this->getMockedClient());

        try {
            $batch->add($item);
        } catch (\Aws\Common\Exception\InvalidArgumentException $e) {
            // Silently fail
        }

        $this->assertSame($isEmpty, $batch->isEmpty());
    }

    public function testFlush()
    {
        $batch = $this->getWriteRequestBatchWithMockedBatch($this->returnValue(array()));

        $this->assertEquals(array(), $batch->flush());
    }

    public function testFlushUnprocessedItems()
    {
        // Prepare the unprocessed items exception
        $item = new UnprocessedRequest(array('foo'), 'foo');
        $exceptionUnprocessed = new UnprocessedWriteRequestsException;
        $exceptionUnprocessed->addItem($item);
        $exceptionBatchTransfer = new BatchTransferException(
            array($item),
            array(),
            $exceptionUnprocessed,
            $this->getMock('Guzzle\Batch\BatchTransferInterface'),
            $this->getMock('Guzzle\Batch\BatchDivisorInterface')
        );

        $batch = $this->getWriteRequestBatchWithMockedBatch($this->throwException($exceptionBatchTransfer));

        $this->assertEquals(array(), $batch->flush());
    }

    /**
     * @expectedException \Guzzle\Batch\Exception\BatchTransferException
     */
    public function testFlushRandomExceptionFails()
    {
        $exceptionBatchTransfer = new \Guzzle\Batch\Exception\BatchTransferException(
            array($this->getMock('Aws\DynamoDb\Model\BatchRequest\WriteRequestInterface')),
            array(),
            $this->getMock('\Exception'),
            $this->getMock('Guzzle\Batch\BatchTransferInterface'),
            $this->getMock('Guzzle\Batch\BatchDivisorInterface')
        );

        $batch = $this->getWriteRequestBatchWithMockedBatch($this->throwException($exceptionBatchTransfer));
        $batch->flush();
    }
}
