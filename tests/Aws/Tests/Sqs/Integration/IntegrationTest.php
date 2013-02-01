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
use Aws\Sqs\Enum\QueueAttributeName;

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
        $attrReceiveMessageWaitTimeSeconds = 20;
        $attrDelaySeconds = 10;

        // Create a queue and make sure everything went OK.

        self::log('Create an SQS queue.');
        $result = $this->sqs->getCommand('CreateQueue', array(
            'QueueName'  => $queueName,
            'Attributes' => array(
                'ReceiveMessageWaitTimeSeconds' => $attrReceiveMessageWaitTimeSeconds,
                'DelaySeconds'                  => $attrDelaySeconds
            ),
        ))->getResult();
        $createdQueueUrl = $result->get('QueueUrl');

        self::log('Wait a little while to make sure the queue exists.');
        // @todo Create a Waiter for this
        sleep(45);

        self::log('Test iterator for listing queues.');
        $listedQueueUrls = $this->sqs->getIterator('ListQueues')->toArray();
        $this->assertContains($createdQueueUrl, $listedQueueUrls);

        self::log('Get the queue URL.');
        $result = $this->sqs->getCommand('GetQueueUrl', array(
            'QueueName'  => $queueName
        ))->getResult();
        $queueUrl = $result->get('QueueUrl');
        $this->assertEquals($createdQueueUrl, $queueUrl);

        self::log('Get the queue attributes.');
        $result = $this->sqs->getCommand('GetQueueAttributes', array(
            'QueueUrl'       => $queueUrl,
            'AttributeNames' => array(QueueAttributeName::ALL)
        ))->getResult();
        $this->assertEquals($attrReceiveMessageWaitTimeSeconds, $result->getPath('Attributes/ReceiveMessageWaitTimeSeconds'));
        $this->assertEquals($attrDelaySeconds, $result->getPath('Attributes/DelaySeconds'));

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

        self::log('Wait a little while so both messages will be read at the same time.');
        // @todo Create a Waiter for this... maybe. This scenario doesn't make sense in practice since the purpose of me
        // receiving two messages in one response is to ensure that the XML is being marshaled correctly.
        sleep(15);

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

        self::log('Send a delayed message and make sure long polling is working.');
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
}
