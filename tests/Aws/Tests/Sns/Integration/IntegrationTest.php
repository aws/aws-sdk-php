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

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var SnsClient
     */
    protected $sns;
    protected static $topic = 'integtest';
    protected static $arn;

    public function setUp()
    {
        $this->sns = $this->getServiceBuilder()->get('Sns');
    }

    public static function tearDownAfterClass()
    {
        try {
            self::getServiceBuilder()->get('sns')->deleteTopic(array('TopicArn' => self::$arn));
        } catch (\Exception $e) {}
    }

    public function testCreatesTopic()
    {
        self::log('Creating topic');
        $result = $this->sns->createTopic(array('Name' => self::$topic));
        $this->assertArrayHasKey('TopicArn', $result->toArray());
        $this->assertArrayHasKey('ResponseMetadata', $result->toArray());
        self::$arn = $result['TopicArn'];
    }

    /**
     * @depends testCreatesTopic
     */
    public function testListsTopics()
    {
        self::log('Listing topics');
        $iterator = $this->sns->getIterator('ListTopics');
        $topics = iterator_to_array($iterator);
        $this->assertContains(self::$arn, $topics);
    }
}
