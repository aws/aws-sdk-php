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

namespace Aws\Tests\Sqs\Integration;

use Aws\Sqs\SqsClient;
use Aws\Sqs\Enum\QueueAttributeName as QueueAttr;
use Aws\Common\Waiter\CallableWaiter;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
     /**
     * @var SqsClient
     */
    protected $sqs;

    public function setUp()
    {
        $this->sqs = $this->getServiceBuilder()->get('Sqs');
    }

    public function testBasicOperations()
    {
        $queueName = 'php-integ-sqs-queue-' . time();
        $msgWait = 20;
        $msgDelay = 10;

        // Create a queue and make sure everything went OK.

        self::log('Create an SQS queue.');
        $result = $this->sqs->getCommand('CreateQueue', array(
            'QueueName'  => $queueName,
            'Attributes' => array(
                QueueAttr::RECEIVE_MESSAGE_WAIT_TIME_SECONDS => $msgWait,
                QueueAttr::DELAY_SECONDS                     => $msgDelay,
            ),
        ))->getResult();
        $createdQueueUrl = $result->get('QueueUrl');

        self::log('Get the queue URL.');
        $result = $this->sqs->getCommand('GetQueueUrl', array(
            'QueueName'  => $queueName
        ))->getResult();
        $queueUrl = $result->get('QueueUrl');
        $this->assertEquals($createdQueueUrl, $queueUrl);

        self::log('Get the queue attributes.');
        $result = $this->sqs->getCommand('GetQueueAttributes', array(
            'QueueUrl'       => $queueUrl,
            'AttributeNames' => array(QueueAttr::ALL)
        ))->getResult();
        $this->assertEquals($msgWait, $result->getPath('Attributes/' . QueueAttr::RECEIVE_MESSAGE_WAIT_TIME_SECONDS));
        $this->assertEquals($msgDelay, $result->getPath('Attributes/' . QueueAttr::DELAY_SECONDS));

        self::log('Make sure the custom ARN-calculating logic returns the actual ARN.');
        $this->assertEquals($this->sqs->getQueueArn($queueUrl), $result->getPath('Attributes/' . QueueAttr::QUEUE_ARN));

        // Send, receive, and delete messages

        $messagesToDelete = array();

        self::log('Send a message with no delay to the queue.');
        $this->sqs->getCommand('SendMessage', array(
            'QueueUrl'          => $queueUrl,
            'MessageBody'       => 'test message 1',
            'DelaySeconds'      => 0,
            'VisibilityTimeout' => 300
        ))->execute();

        self::log('Receive a message from the queue.');
        $result = $this->sqs->getCommand('ReceiveMessage', array(
            'QueueUrl' => $queueUrl
        ))->getResult();
        $messages = $result->get('Messages');
        $this->assertCount(1, $messages);
        $message = $messages[0];
        $this->assertEquals('test message 1', $message['Body']);
        $messagesToDelete[] = array(
            'Id'            => str_replace(' ', '-', $message['Body']),
            'ReceiptHandle' => $message['ReceiptHandle'],
        );

        self::log('Send and receive a delayed message and make sure long polling is working. Please wait.');
        $startTime = microtime(true);
        $this->sqs->getCommand('SendMessage', array(
            'QueueUrl'    => $queueUrl,
            'MessageBody' => 'test message 2',
        ))->execute();
        $result = $this->sqs->getCommand('ReceiveMessage', array(
            'QueueUrl' => $queueUrl,
        ))->getResult();
        $endTime = microtime(true);
        $this->assertGreaterThan(5, $endTime - $startTime);
        $message = $result->getPath('Messages/0');
        $messagesToDelete[] = array(
            'Id'            => str_replace(' ', '-', $message['Body']),
            'ReceiptHandle' => $message['ReceiptHandle'],
        );

        self::log('Delete the messages using batch delete and verify that the deletions are successful.');
        $result = $this->sqs->getCommand('DeleteMessageBatch', array(
            'QueueUrl' => $queueUrl,
            'Entries'  => $messagesToDelete,
        ))->getResult();
        $deletions = $result['Successful'];
        $this->assertCount(2, $deletions);
        foreach ($deletions as $deletion) {
            $this->assertRegExp('/^test\-message\-\d$/', $deletion['Id']);
        }

        // Delete the queue

        self::log('Delete the queue.');
        $this->sqs->getCommand('DeleteQueue', array(
            'QueueUrl'  => $queueUrl
        ))->execute();
    }

    /**
     * @expectedException \Aws\Sqs\Exception\SqsException
     */
    public function testErrorParsing()
    {
        $this->sqs->getQueueUrl(array('QueueName' => 'php-fake-queue'));
    }
}
