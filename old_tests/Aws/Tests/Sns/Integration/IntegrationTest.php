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

namespace Aws\Tests\Sns\Integration;

use Aws\Sns\SnsClient;
use Aws\Sqs\SqsClient;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var SnsClient
     */
    protected $sns;
    /**
     * @var SqsClient
     */
    protected $sqs;

    protected static $topic = 'integtest';
    protected static $queueName = 'integtest';
    protected static $queueUrl;
    protected static $topicArn;
    protected static $subscriptionArn;

    public function setUp()
    {
        $this->sns = $this->getServiceBuilder()->get('sns');
        $this->sqs = $this->getServiceBuilder()->get('sqs');
    }

    public static function setUpBeforeClass()
    {
        self::$topic .= time();
        self::$queueName .= time();
    }

    public static function tearDownAfterClass()
    {
        // Delete the topic if it was created
        if (self::$topicArn) {
            try {
                self::getServiceBuilder()->get('sns')->deleteTopic(array('TopicArn' => self::$topicArn));
            } catch (\Exception $e) {}
        }

        // Delete the queue if it was created
        if (self::$queueUrl) {
            try {
                self::getServiceBuilder()->get('sqs')->deleteQueue(array('QueueUrl' => self::$queueUrl));
            } catch (\Exception $e) {}
        }
    }

    public function testCreatesTopic()
    {
        self::log('Creating topic');
        $result = $this->sns->createTopic(array('Name' => self::$topic));
        $this->assertArrayHasKey('TopicArn', $result->toArray());
        $this->assertArrayHasKey('ResponseMetadata', $result->toArray());
        self::$topicArn = $result['TopicArn'];

        return self::$topicArn;
    }

    /**
     * @depends testCreatesTopic
     */
    public function testListsTopics()
    {
        self::log('Listing topics');
        $iterator = $this->sns->getIterator('ListTopics');
        $topics = iterator_to_array($iterator);
        $this->assertContains(self::$topicArn, $topics);
    }

    /**
     * @depends testCreatesTopic
     */
    public function testSubscribesToTopic($topicArn)
    {
        // Create an SQS queue for the test
        self::log('Creating a SQS queue');
        $result = $this->sqs->createQueue(array('QueueName' => self::$queueName));
        self::$queueUrl = $result['QueueUrl'];
        $queueArn = $this->sqs->getQueueArn(self::$queueUrl);

        // Subscribe to the SNS topic using an SQS queue
        self::log('Subscribing to the topic using the queue');
        $result = $this->sns->subscribe(array(
            'TopicArn' => self::$topicArn,
            'Endpoint' => $queueArn,
            'Protocol' => 'sqs'
        ));

        // Ensure that the result has a SubscriptionArn
        self::log('Subscribe result: ' . var_export($result->toArray(), true));
        $this->assertArrayHasKey('SubscriptionArn', $result->toArray());
        self::$subscriptionArn = $result['SubscriptionArn'];

        return self::$subscriptionArn;
    }

    /**
     * @depends testSubscribesToTopic
     */
    public function testListsSubscriptions($subscriptionArn)
    {
        self::log('List subscriptions');
        $i = $this->sns->getIterator('ListSubscriptionsByTopic', array('TopicArn' => self::$topicArn));
        $data = iterator_to_array($i);
        self::log('Found the following subscriptions: ' . var_export($data, true));
        foreach ($data as $sub) {
            if ($sub['SubscriptionArn'] == self::$subscriptionArn) {
                return true;
            }
        }
        $this->fail('Did not find the subscription ARN of ' . self::$subscriptionArn);
    }

    /**
     * @depends testSubscribesToTopic
     */
    public function testPublishesTopic($subscriptionArn)
    {
        $result = $this->sns->publish(array(
            'Message'  => '{"default":"test","foo":"baz"}',
            'Subject'  => 'Testing',
            'TopicArn' => self::$topicArn
        ));
        $this->assertArrayHasKey('MessageId', $result->toArray());
        self::log('Published a message: ' . $result['MessageId']);
    }

    /**
     * @depends testCreatesTopic
     */
    public function testListsTopicAttributes($topicArn)
    {
        $result = $this->sns->getTopicAttributes(array('TopicArn' => $topicArn));
        $result = $result->toArray();
        // Ensure that the map was deserialized correctly
        $this->assertArrayHasKey('TopicArn', $result['Attributes']);
        $this->assertArrayHasKey('Policy', $result['Attributes']);
        $this->assertArrayHasKey('Owner', $result['Attributes']);
    }
}
