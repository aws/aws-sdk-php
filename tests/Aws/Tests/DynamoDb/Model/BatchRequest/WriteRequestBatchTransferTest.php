<?php

namespace Aws\Tests\DynamoDb\Model\BatchRequest;

use Aws\DynamoDb\Model\BatchRequest\WriteRequestBatchTransfer;

/**
 * @covers Aws\DynamoDb\Model\BatchRequest\WriteRequestBatchTransfer
 */
class WriteRequestBatchTransferTest extends \Guzzle\Tests\GuzzleTestCase
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

    public function testDoesNotTransfersEmptyBatches()
    {
        $client = $this->getMockedClient();
        $batch  = new WriteRequestBatchTransfer($client);
        $batch->transfer(array());
    }

    /**
     * @expectedException Aws\Common\Exception\DomainException
     */
    public function testThrowsExceptionOnLargeBatches()
    {
        $client = $this->getMockedClient();
        $batch  = new WriteRequestBatchTransfer($client);
        $batch->transfer(array_fill(0, 26, null));
    }

    /**
     * @return array Data for getTransferBatchesData
     */
    public function getTransferBatchesData()
    {
        return array(
            array(array(), 'all-items-transferred'),
            array(array('UnprocessedItems' => array('foo' => array(array('foo')))), 'some-unprocessed-items')
        );
    }

    /**
     * @dataProvider getTransferBatchesData
     */
    public function testTransfersBatches($commandResult, $transferCompletionDescription)
    {
        // Prep mock DeleteRequests
        $requests = array(
            $this->getMockBuilder('Aws\DynamoDb\Model\BatchRequest\DeleteRequest')
                ->disableOriginalConstructor()
                ->getMock()
        );
        $requests[0]->expects($this->any())
            ->method('getTableName')
            ->will($this->returnValue('foo'));
        $requests[0]->expects($this->any())
            ->method('toArray')
            ->will($this->returnValue('foo'));

        // Prep the mock command execution and results
        $command = $this->getMock('Aws\Common\Command\JsonCommand');
        $client = $this->getMockedClient();
        $client->expects($this->any())
            ->method('getCommand')
            ->will($this->returnValue($command));
        $command->expects($this->any())
            ->method('set')
            ->will($this->returnValue($command));
        $command->expects($this->any())
            ->method('execute')
            ->will($this->returnValue($commandResult));

        // Do transfer
        try {
            $batch = new WriteRequestBatchTransfer($client);
            $batch->transfer($requests);
            $transferCompletionMessage = 'all-items-transferred';
        } catch (\Aws\DynamoDb\Exception\UnprocessedWriteRequestsException $e) {
            $transferCompletionMessage = 'some-unprocessed-items';
        }

        $this->assertEquals($transferCompletionDescription, $transferCompletionMessage);
    }
}
