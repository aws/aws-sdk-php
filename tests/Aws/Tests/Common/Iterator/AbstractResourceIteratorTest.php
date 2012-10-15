<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Aws\Tests\Common\Iterator;

use Aws\Common\Iterator\AbstractResourceIterator;
use Guzzle\Service\Description\Parameter;
use Guzzle\Service\Resource\Model;

/**
 * @covers Aws\Common\Iterator\AbstractResourceIterator
 */
class AbstractResourceIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testSendRequest()
    {
        $model = new Model(array(), new Parameter());
        // Mock Command
        $command = $this->getMockBuilder('Aws\Common\Command\JsonCommand')
            ->disableOriginalConstructor()
            ->getMock();
        $command->expects($this->any())
            ->method('execute')
            ->will($this->returnValue($model));

        // Mock the iterator
        $iterator = $this->getMockForAbstractClass(
            'Aws\Common\Iterator\AbstractResourceIterator',
            array(), '', false
        );
        $iterator->expects($this->any())
            ->method('handleResults')
            ->will($this->onConsecutiveCalls(array(), array('foo')));

        // Setup state
        $property = new \ReflectionProperty($iterator, 'nextToken');
        $property->setAccessible(true);
        $property->setValue($iterator, 'foo');

        $property = new \ReflectionProperty($iterator, 'originalCommand');
        $property->setAccessible(true);
        $property->setValue($iterator, $command);

        $property = new \ReflectionProperty($iterator, 'command');
        $property->setAccessible(true);
        $property->setValue($iterator, $command);

        // Execute method under test
        $sendRequest = new \ReflectionMethod($iterator, 'sendRequest');
        $sendRequest->setAccessible(true);
        $result = $sendRequest->invoke($iterator);

        $this->assertEquals(array('foo'), $result);
        $this->assertSame($model, $iterator->getLastResult());
    }
}
