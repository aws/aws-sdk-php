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

namespace Aws\Tests\Sqs\MessageValidator;

use Aws\Sns\MessageValidator\NotificationMessage;
use Guzzle\Common\Collection;

class NotificationMessageTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @dataProvider getDataForStringToSignTest
     * @covers Aws\Sns\MessageValidator\NotificationMessage::getStringToSign
     * @covers Aws\Sns\MessageValidator\NotificationMessage::getSubject
     */
    public function testBuildsStringToSignCorrectly(array $messageData, $expectedSubject, $expectedStringToSign)
    {
        $message = new NotificationMessage(new Collection($messageData));
        $this->assertEquals($expectedSubject, $message->getSubject());
        $this->assertEquals($expectedStringToSign, $message->getStringToSign());
    }

    public function getDataForStringToSignTest()
    {
        $testCases = array();

        // Test case where subject is not provided
        $testCases[0] = array();
        $testCases[0][] = array(
            'Message'        => 'a',
            'MessageId'      => 'b',
            'Timestamp'      => 'c',
            'TopicArn'       => 'd',
            'Type'           => 'e',
        );
        $testCases[0][] = null;
        $testCases[0][] = <<< STRINGTOSIGN
Message
a
MessageId
b
Timestamp
c
TopicArn
d
Type
e

STRINGTOSIGN;

        // Test case where subject is provided
        $testCases[1] = array();
        $testCases[1][] = array(
            'Message'        => 'a',
            'MessageId'      => 'b',
            'Timestamp'      => 'c',
            'TopicArn'       => 'd',
            'Type'           => 'e',
            'Subject'        => 'f',
        );
        $testCases[1][] = 'f';
        $testCases[1][] = <<< STRINGTOSIGN
Message
a
MessageId
b
Subject
f
Timestamp
c
TopicArn
d
Type
e

STRINGTOSIGN;

        return $testCases;
    }
}
