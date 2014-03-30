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

namespace Aws\Tests\Sqs;

use Aws\Sqs\Md5ValidatorListener;
use Guzzle\Common\Event;
use Guzzle\Service\Resource\Model;
use Guzzle\Tests\Service\Mock\Command\MockCommand;

/**
 * @covers Aws\Sqs\Md5ValidatorListener
 */
class Md5ValidatorListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException \Aws\Sqs\Exception\SqsException
     */
    public function testValidatesMd5WithException()
    {
        $model  = new Model(array(
            'Messages' => array(
                array('MD5OfBody' => 'foo', 'Body' => 'Bar')
            )
        ));

        $command = $this->getMockBuilder('Guzzle\Tests\Service\Mock\MockCommand')
            ->setMethods(array('getName', 'getResult'))
            ->getMock();
        $command->expects($this->once())->method('getName')->will($this->returnValue('ReceiveMessage'));
        $command->expects($this->once())->method('getResult')->will($this->returnValue($model));

        $v = new Md5ValidatorListener();
        $v->onCommandBeforeSend(new Event(array('command' => $command)));
    }

    public function testValidatesMd5()
    {
        $model  = new Model(array(
            'Messages' => array(
                array('MD5OfBody' => 'fafb00f5732ab283681e124bf8747ed1', 'Body' => 'This is a test message')
            )
        ));

        $command = $this->getMockBuilder('Guzzle\Tests\Service\Mock\MockCommand')
            ->setMethods(array('getName', 'getResult'))
            ->getMock();
        $command->expects($this->once())->method('getName')->will($this->returnValue('ReceiveMessage'));
        $command->expects($this->once())->method('getResult')->will($this->returnValue($model));

        $v = new Md5ValidatorListener();
        $v->onCommandBeforeSend(new Event(array('command' => $command)));
    }
}
