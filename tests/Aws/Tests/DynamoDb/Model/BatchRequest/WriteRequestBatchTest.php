<?php

namespace Aws\Tests\DynamoDb\Model\BatchRequest;

use Aws\DynamoDb\Model\BatchRequest\WriteRequestBatch;
use Guzzle\Common\Batch\NotifyingBatch;

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
     * @return \Guzzle\Common\Batch\BatchInterface
     */
    public function getMockedBatchForFlushTests($will)
    {
        $batch = $this->getMock('Guzzle\Common\Batch\BatchInterface');
        $batch->expects($this->any())
            ->method('count')
            ->will($this->onConsecutiveCalls(1, 0));
        $batch->expects($this->any())
            ->method('flush')
            ->will($will);

        return new \Guzzle\Common\Batch\FlushingBatch($batch, 5);
    }

    public function testFactoryCreatesCorrectBatch()
    {
        $batch = WriteRequestBatch::factory($this->getMockedClient());
        $decorators = array();
        foreach ($batch->getDecorators() as $decorator) {
            $decorators[] = get_class($decorator);
        }

        $this->assertEquals(array(
            'Aws\DynamoDb\Model\BatchRequest\WriteRequestBatch',
            'Guzzle\Common\Batch\FlushingBatch',
        ), $decorators);
    }

    public function testFactoryCanAddNotifyingBatchDecorator()
    {
        $batch = WriteRequestBatch::factory($this->getMockedClient(), 10, function () {});
        $found = false;
        foreach ($batch->getDecorators() as $decorator) {
            if ($decorator instanceof NotifyingBatch) {
                $found = true;
                break;
            }
        }

        if (!$found) {
            $this->fail('Did not find a notifying batch decorator');
        }
    }

    public function getAddItemData()
    {
        $client = $this->getServiceBuilder()->get('dynamo_db');
        $data   = array();

        // Exception when not a write request or command
        $data[] = array(null, 0);

        // Works with a delete_item command
        $data[] = array($client->getCommand('DeleteItem')
            ->set('TableName', 'foo')
            ->set('Key', array(
                'HashKeyElement' => array('S' => 'bar')
            )), 1
        );

        // Works with a put_item command
        $data[] = array($client->getCommand('PutItem')
            ->set('TableName', 'foo')
            ->set('Item', array(
                'id' => array('S' => 'bar')
            )), 1
        );

        // Exception with a arbitrary command
        $data[] = array($client->getCommand('ListTables'), 0);

        // Works with a write request
        $data[] = array($this->getMock('Aws\DynamoDb\Model\BatchRequest\WriteRequestInterface'), 1);

        return $data;
    }

    /**
     * @dataProvider getAddItemData
     */
    public function testAddItem($item, $count)
    {
        $batch = WriteRequestBatch::factory($this->getMockedClient());

        try {
            $batch->add($item);
        } catch (\Aws\Common\Exception\InvalidArgumentException $e) {
            // Silently fail
        }

        $this->assertEquals($count, $batch->count());
    }

    public function testFlush()
    {
        $batch = $this->getMockedBatchForFlushTests($this->returnValue(null));

        $writeRequestBatch = new WriteRequestBatch($batch);

        $this->assertEquals(array(), $writeRequestBatch->flush());
    }

    public function testFlushUnprocessedItems()
    {
        // Prepare the unprocessed items exception
        $item = new \Aws\DynamoDb\Model\BatchRequest\UnprocessedRequest(array('foo'), 'foo');
        $exceptionUnprocessed = new \Aws\DynamoDb\Exception\UnprocessedWriteRequestsException;
        $exceptionUnprocessed->addItem($item);
        $exceptionBatchTransfer = new \Guzzle\Common\Exception\BatchTransferException(
            array($item),
            $exceptionUnprocessed,
            $this->getMock('Guzzle\Common\Batch\BatchTransferInterface'),
            $this->getMock('Guzzle\Common\Batch\BatchDivisorInterface')
        );

        $batch = $this->getMockedBatchForFlushTests($this->throwException($exceptionBatchTransfer));

        $writeRequestBatch = new WriteRequestBatch($batch);

        $this->assertEquals(array(), $writeRequestBatch->flush());
    }

    public function testFlushRequestTooLarge()
    {
        $exceptionResponse = $this->getMockBuilder('\Guzzle\Http\Exception\ClientErrorResponseException')
            ->disableOriginalConstructor()
            ->getMock();
        $response = $this->getMockBuilder('\Guzzle\Http\Message\Response')
            ->disableOriginalConstructor()
            ->getMock();
        $response->expects($this->any())
            ->method('getStatusCode')
            ->will($this->returnValue(413));
        $exceptionResponse->expects($this->any())
            ->method('getResponse')
            ->will($this->returnValue($response));

        $exceptionBatchTransfer = new \Guzzle\Common\Exception\BatchTransferException(
            array($this->getMock('Aws\DynamoDb\Model\BatchRequest\WriteRequestInterface')),
            $exceptionResponse,
            $this->getMock('Guzzle\Common\Batch\BatchTransferInterface'),
            new \Guzzle\Common\Batch\BatchSizeDivisor(5)
        );

        $batch = $this->getMockedBatchForFlushTests($this->throwException($exceptionBatchTransfer));
        $batch->expects($this->any())
            ->method('setThreshold')
            ->will($this->returnValue(null));

        $writeRequestBatch = new WriteRequestBatch($batch);

        $this->assertEquals(array(), $writeRequestBatch->flush());
    }

    /**
     * @expectedException \Guzzle\Common\Exception\BatchTransferException
     */
    public function testFlushRandomExceptionFails()
    {
        $exceptionBatchTransfer = new \Guzzle\Common\Exception\BatchTransferException(
            array($this->getMock('Aws\DynamoDb\Model\BatchRequest\WriteRequestInterface')),
            $this->getMock('\Exception'),
            $this->getMock('Guzzle\Common\Batch\BatchTransferInterface'),
            $this->getMock('Guzzle\Common\Batch\BatchDivisorInterface')
        );

        $batch = $this->getMockedBatchForFlushTests($this->throwException($exceptionBatchTransfer));

        $writeRequestBatch = new WriteRequestBatch($batch);
        $writeRequestBatch->flush();
    }
}
