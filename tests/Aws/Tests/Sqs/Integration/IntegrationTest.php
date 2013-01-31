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
        $queueName = 'php-integ-sqs-queue';
        $attrReceiveMessageWaitTimeSeconds = 20;
        $attrDelaySeconds = 10;

        self::log('Create an SQS queue.');
        $result = $this->sqs->getCommand('CreateQueue', array(
            'QueueName'  => $queueName,
            'Attributes' => array(
                'ReceiveMessageWaitTimeSeconds' => $attrReceiveMessageWaitTimeSeconds,
                'DelaySeconds'                  => $attrDelaySeconds
            ),
        ))->getResult();
        $createdQueueUrl = $result->get('QueueUrl');

        self::log('Test iterating through queues.');
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

        self::log('Delete the queue.');
        $result = $this->sqs->getCommand('DeleteQueue', array(
            'QueueUrl'  => $queueUrl
        ))->getResult();

        self::log('Waiting 60 seconds for queue name to be freed.');
        sleep(60);
    }

   // public function

    /**
     * @expectedException \Aws\Sqs\Exception\QueueDoesNotExistException
     */
    public function todoTestErrorParsing()
    {
        $this->sqs->getQueueUrl(array('QueueName' => 'php-fake-queue'));
    }
}
