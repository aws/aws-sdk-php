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

namespace Aws\Tests\Sns\MessageValidator;

use Aws\Sns\MessageValidator\Message;
use Guzzle\Common\Collection;

/**
 * @covers Aws\Sns\MessageValidator\Message
 */
class MessageTest extends \Guzzle\Tests\GuzzleTestCase
{
    public $messageData = array(
        'Message'        => 'a',
        'MessageId'      => 'b',
        'Timestamp'      => 'c',
        'TopicArn'       => 'd',
        'Type'           => 'e',
        'Subject'        => 'f',
        'Signature'      => 'g',
        'SigningCertURL' => 'h',
        'SubscribeURL'   => 'i',
        'Token'          => 'j',
    );

    public function testGetters()
    {
        $message = new Message(new Collection($this->messageData));

        $this->assertInstanceOf('Guzzle\Common\Collection', $message->getData());

        foreach ($this->messageData as $key => $expectedValue) {
            $this->assertEquals($expectedValue, $message->get($key));
        }
    }

    public function testFactorySucceedsWithGoodData()
    {
        $this->assertInstanceOf("Aws\\Sns\\MessageValidator\\Message", Message::fromArray($this->messageData));
    }

    public function testFactoryFailsWithNoType()
    {
        $this->setExpectedException('Aws\Common\Exception\InvalidArgumentException');
        $data = $this->messageData;
        unset($data['Type']);
        Message::fromArray($data);
    }

    public function testFactoryFailsWithMissingData()
    {
        $this->setExpectedException('Guzzle\Common\Exception\InvalidArgumentException');
        Message::fromArray(array('Type' => 'Notification'));
    }

    public function testCanCreateFromRawPost()
    {
        // Prep php://input with mocked data
        MockPhpStream::setStartingData(json_encode($this->messageData));
        stream_wrapper_unregister('php');
        stream_wrapper_register('php', __NAMESPACE__ . '\MockPhpStream');

        $message = Message::fromRawPostData();
        $this->assertInstanceOf('Aws\Sns\MessageValidator\Message', $message);

        stream_wrapper_restore("php");
    }

    public function testCreateFromRawPostFailsWithMissingData()
    {
        $this->setExpectedException('Aws\Common\Exception\UnexpectedValueException');
        Message::fromRawPostData();
    }

    /**
     * @dataProvider getDataForStringToSignTest
     */
    public function testBuildsStringToSignCorrectly(array $messageData, $expectedSubject, $expectedStringToSign)
    {
        $message = new Message(new Collection($messageData));
        $this->assertEquals($expectedSubject, $message->get('Subject'));
        $this->assertEquals($expectedStringToSign, $message->getStringToSign());
    }

    public function getDataForStringToSignTest()
    {
        $testCases = array();

        // Test case where one key is not signable
        $testCases[0] = array();
        $testCases[0][] = array(
            'TopicArn'  => 'd',
            'Message'   => 'a',
            'Timestamp' => 'c',
            'Type'      => 'e',
            'MessageId' => 'b',
            'FooBar'    => 'f',
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

        // Test case where all keys are signable
        $testCases[1] = array();
        $testCases[1][] = array(
            'TopicArn'  => 'e',
            'Message'   => 'a',
            'Timestamp' => 'd',
            'Type'      => 'f',
            'MessageId' => 'b',
            'Subject'   => 'c',
        );
        $testCases[1][] = 'c';
        $testCases[1][] = <<< STRINGTOSIGN
Message
a
MessageId
b
Subject
c
Timestamp
d
TopicArn
e
Type
f

STRINGTOSIGN;

        return $testCases;
    }
}
