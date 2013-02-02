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

        // Send and receive messages

        self::log('Send two messages to the queue.');
        $this->sqs->getCommand('SendMessage', array(
            'QueueUrl'    => $queueUrl,
            'MessageBody' => 'test message 1',
            'DelaySeconds' => 0,
        ))->execute();
        $this->sqs->getCommand('SendMessage', array(
            'QueueUrl'     => $queueUrl,
            'MessageBody'  => 'test message 2',
            'DelaySeconds' => 0,
        ))->execute();

        self::log('Wait until both messages will be read at the same time.');
        $waiter = new CallableWaiter();
        $waiter->setInterval(2)
            ->setMaxAttempts(15)
            ->setCallable(array($this, 'waitUntilThereAreTwoMessagesInTheQueue'))
            ->setContext(array(
                'queue_url'      => $queueUrl,
                'valid_messages' => array('test message 1', 'test message 2')
            ))
            ->wait();

        self::log('Receive messages from the queue.');
        $result = $this->sqs->getCommand('ReceiveMessage', array(
            'QueueUrl'            => $queueUrl,
            'MaxNumberOfMessages' => 3
        ))->getResult();
        $messages = $result->get('Messages');
        $this->assertCount(2, $messages);
        $messagesToDelete = array();
        foreach ($messages as $message) {
            $this->assertRegExp('/^test message \d$/', $message['Body']);
            $messagesToDelete[] = array(
                'Id'            => str_replace(' ', '-', $message['Body']),
                'ReceiptHandle' => $message['ReceiptHandle'],
            );
        }

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

        // Test the long polling feature

        self::log('Send and receive a delayed message and make sure long polling is working. Please wait.');
        $startTime = microtime(true);
        $this->sqs->getCommand('SendMessage', array(
            'QueueUrl'    => $queueUrl,
            'MessageBody' => 'foo',
        ))->execute();
        $this->sqs->getCommand('ReceiveMessage', array(
            'QueueUrl' => $queueUrl,
        ))->execute();
        $endTime = microtime(true);
        $this->assertGreaterThan(5, $endTime - $startTime);

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

    /**
     * Returns true only if all of the specified valid messages can be found in the specified queue simultaneously
     *
     * @param int $attempts The number of the attempt of running this method
     * @param array $context Additional context for this method (`queue_url` and `valid_messages`)
     *
     * @return bool
     */
    public function waitUntilThereAreTwoMessagesInTheQueue($attempts, array $context)
    {
        $result = $this->sqs->getCommand('ReceiveMessage', array(
            'QueueUrl'            => $context['queue_url'],
            'MaxNumberOfMessages' => count($context['valid_messages']),
            'VisibilityTimeout'   => 1,
        ))->getResult();

        if (count(array_diff($result->getPath('Messages/*/Body'), $context['valid_messages'])) == 0) {
            self::log('Confirmed that two messages are in the queue. Wait for them to be visible again.');
            sleep(10 * count($context['valid_messages']));
            return true;
        }

        return false;
    }
}
