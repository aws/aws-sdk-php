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

use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Exception\UnprocessedWriteRequestsException;
use Aws\DynamoDb\Model\BatchRequest\WriteRequestBatchTransfer;
use Guzzle\Common\Exception\ExceptionCollection;

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
     * @return array Data for testTransfersBatches
     */
    public function getTransferBatchesData()
    {
        // Mock objects for 3rd test case
        $mockRequest = $this->getMockBuilder('Guzzle\Http\Message\EntityEnclosingRequestInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $mockRequest->expects($this->any())
            ->method('getBody')
            ->will($this->onConsecutiveCalls(
                '{"RequestItems":{"foo":[{"PutRequest":{}},{"PutRequest":{}}]}}',
                '{"RequestItems":{}}',
                '{"RequestItems":{}}'
            ));
        $mockResponse = $this->getMockBuilder('Guzzle\Http\Message\Response')
            ->disableOriginalConstructor()
            ->getMock();
        $mockResponse->expects($this->any())
            ->method('getStatusCode')
            ->will($this->returnValue(413));

        $tooBigException = new DynamoDbException();
        $tooBigException->setResponse($mockResponse);
        $tooBigException->setRequest($mockRequest);
        $exceptionCollection = new ExceptionCollection();
        $exceptionCollection->add($tooBigException);

        // Mock objects for 4th use case
        $exceptionCollectionWithDummy = new ExceptionCollection();
        $exceptionCollectionWithDummy->add(new \RuntimeException);

        // Provisioned throughput exceeded use case (#6)
        $throughputExceededException = new DynamoDbException();
        $throughputExceededException->setExceptionCode('ProvisionedThroughputExceededException');
        $mockRequestPTE = $this->getMockBuilder('Guzzle\Http\Message\EntityEnclosingRequestInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $mockRequestPTE->expects($this->any())
            ->method('getBody')
            ->will($this->returnValue(
                '{"RequestItems":{"foo":[{"PutRequest":{}},{"PutRequest":{}}]}}'
            ));
        $throughputExceededException->setRequest($mockRequestPTE);
        $exceptionCollectionThroughput = new ExceptionCollection();
        $exceptionCollectionThroughput->add($throughputExceededException);

        // Some DynamoDbException that will be rethrown, not handled (case #7)
        $unhandledDynamoDbException = new DynamoDbException();
        $unhandledDynamoDbException->setExceptionCode('UnhandledException');
        $exceptionCollectionUnhandled = new ExceptionCollection();
        $exceptionCollectionUnhandled->add($unhandledDynamoDbException);

        return array(
            array(
                array('UnprocessedItems' => array()),
                null,
                'all-items-transferred'
            ),
            array(
                array('UnprocessedItems' => array('foo' => array(array('foo')))),
                null,
                'some-unprocessed-items'
            ),
            array(
                array('UnprocessedItems' => array()),
                $this->throwException($exceptionCollection),
                'all-items-transferred'
            ),
            array(
                array('UnprocessedItems' => array()),
                $this->throwException($exceptionCollectionWithDummy),
                'exceptions-thrown'
            ),
            array(
                array('UnprocessedItems' => array()),
                $this->throwException($exceptionCollectionWithDummy),
                'exceptions-thrown'
            ),
            array(
                array('UnprocessedItems' => array()),
                $this->throwException($exceptionCollectionThroughput),
                'some-unprocessed-items'
            ),
            array(
                array('UnprocessedItems' => array()),
                $this->throwException($exceptionCollectionUnhandled),
                'exceptions-thrown'
            )
        );
    }

    /**
     * @dataProvider getTransferBatchesData
     */
    public function testTransfersBatches($commandResult, $executeResult, $expectedMessage)
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
            ->will($this->returnValue(array('foo')));

        // Prep the mock command execution and results
        $command = $this->getMock('Aws\Common\Command\JsonCommand', array(), array(array()));
        $command->expects($this->any())
            ->method('set')
            ->will($this->returnValue($command));
        $command->expects($this->any())
            ->method('isExecuted')
            ->will($this->returnValue(true));
        $command->expects($this->any())
            ->method('getResult')
            ->will($this->returnValue($commandResult));

        // Add the mocked command into the mock client
        $client = $this->getMockedClient();
        $client->expects($this->any())
            ->method('getCommand')
            ->will($this->returnValue($command));
        $client->expects($this->any())
            ->method('execute')
            ->will($executeResult ?: $this->returnValue(array($command)));

        // Do transfer and decide the message
        try {
            $batch = new WriteRequestBatchTransfer($client);
            $batch->transfer($requests);
            $actualMessage = 'all-items-transferred';
        } catch (UnprocessedWriteRequestsException $e) {
            $actualMessage = 'some-unprocessed-items';
        } catch (ExceptionCollection $e) {
            $actualMessage = 'exceptions-thrown';
        }

        $this->assertEquals($expectedMessage, $actualMessage);
    }
}
