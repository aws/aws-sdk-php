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

use Aws\Sns\MessageValidator\AbstractMessage;
use Guzzle\Common\Collection;

/**
 * @covers Aws\Sns\MessageValidator\AbstractMessage
 */
class AbstractMessageTest extends \Guzzle\Tests\GuzzleTestCase
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
        /** @var $message AbstractMessage */
        $message = $this->getMockForAbstractClass('Aws\Sns\MessageValidator\AbstractMessage', array(
            new Collection($this->messageData)
        ));

        // Make sure the data provided is available and unaltered
        $this->assertInstanceOf('Guzzle\Common\Collection', $message->getData());
        $this->assertEquals($this->messageData, $message->getData()->toArray());

        // Prepare the getRequiredKeys method to be called
        $class = new \ReflectionClass('Aws\Sns\MessageValidator\AbstractMessage');
        $getRequiredKeys = $class->getMethod('getRequiredKeys');
        $getRequiredKeys->setAccessible(true);

        // Make sure all of the getters for required keys work
        foreach ($getRequiredKeys->invoke(null) as $key) {
            $this->assertEquals($this->messageData[$key], $message->{"get{$key}"}(), "The get{$key} getter failed.");
        }
    }

    public function testFactorySucceedsWithGoodData()
    {
        $data = $this->messageData;

        foreach ($this->readAttribute('Aws\Sns\MessageValidator\AbstractMessage', 'validMessageTypes') as $type) {
            $data['Type'] = $type;
            $message = AbstractMessage::fromArray($data);
            $this->assertInstanceOf("Aws\\Sns\\MessageValidator\\{$type}Message", $message);
        }
    }

    public function testFactoryFailsWithInvalidType()
    {
        $this->setExpectedException('Aws\Common\Exception\InvalidArgumentException');
        AbstractMessage::fromArray(array('Type' => 'foo'));
    }

    public function testFactoryFailsWithNoType()
    {
        $this->setExpectedException('Aws\Common\Exception\InvalidArgumentException');
        $data = $this->messageData;
        unset($data['Type']);
        AbstractMessage::fromArray($data);
    }

    public function testFactoryFailsWithMissingData()
    {
        $this->setExpectedException('Guzzle\Common\Exception\InvalidArgumentException');
        AbstractMessage::fromArray(array('Type' => 'Notification'));
    }
}
