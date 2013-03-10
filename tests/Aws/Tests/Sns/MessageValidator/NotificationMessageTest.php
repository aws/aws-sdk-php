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

    public function testExtendsAbstractMessage()
    {
        $message = new NotificationMessage(new Collection());
        $this->assertTrue(is_subclass_of($message, 'Aws\Sns\MessageValidator\AbstractMessage'), 'Notification Message should extend Aws\Sns\MessageValidator\AbstractMessage');
    }

    public function getMessageDataTest()
    {
        $messageData = array(
            'Message'        => 'a',
            'MessageId'      => 'b',
            'Timestamp'      => 'c',
            'TopicArn'       => 'd',
            'Type'           => 'Notification',
            'Subject'        => 'f',
            'Signature'      => 'g',
            'SigningCertURL' => 'h',
        );

        $testCases = array(
            array($messageData, 'Message'       , $messageData['Message']),
            array($messageData, 'MessageId'     , $messageData['MessageId']),
            array($messageData, 'Subject'       , $messageData['Subject']),
            array($messageData, 'Timestamp'     , $messageData['Timestamp']),
            array($messageData, 'TopicArn'      , $messageData['TopicArn']),
            array($messageData, 'Type'          , $messageData['Type']),
            array($messageData, 'Subject'       , $messageData['Subject']),
            array($messageData, 'Signature'     , $messageData['Signature']),
            array($messageData, 'SigningCertURL', $messageData['SigningCertURL']),
        );

        return $testCases;
    }

    /**
     * @dataProvider getMessageDataTest
     */
    public function testGettersWhileConstructingFromCollection($messageData, $property, $value)
    {
        $message = new NotificationMessage(new Collection($messageData));
        $getterMethod = 'get' . $property;

        $this->assertEquals($value, $message->$getterMethod());
    }

    /**
     * @dataProvider getMessageDataTest
     */
    public function testGettersWhileConstructingFromArray($messageData, $property, $value)
    {
        $message = NotificationMessage::fromArray($messageData);
        $getterMethod = 'get' . $property;

        $this->assertEquals($value, $message->$getterMethod());
    }

    public function testConstructorInvalidArgumentException()
    {
        $this->setExpectedException('\Aws\Common\Exception\InvalidArgumentException');
        $message = NotificationMessage::fromArray(array(
            'Type' => 'foo'
        ));
    }

    public function testGetDataReturnType()
    {
        $message = new NotificationMessage(new Collection());
        $this->assertInstanceOf('Guzzle\Common\Collection', $message->getData());
    }
}
