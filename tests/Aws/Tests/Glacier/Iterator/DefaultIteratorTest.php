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

use Aws\Glacier\Iterator\DefaultIterator;
use Guzzle\Service\Command\AbstractCommand;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Description\Parameter;

/**
 * @covers Aws\Glacier\Iterator\DefaultIterator
 */
class DefaultIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function getDataForPageSizeTest()
    {
        return array(
            array(null, null, null),
            array(8, null, 8),
            array(null, 4, null),
            array(8, 4, 4),
            array(4, 8, 4),
            array(8, 8, 8),
        );
    }

    /**
     * @dataProvider getDataForPageSizeTest
     */
    public function testPrepareRequestSetsPageSizeCorrectly($limit, $pageSize, $resultingLimit)
    {
        $command = $this->getMockedCommand();
        if ($limit) {
            $command->set('limit', $limit);
        }

        $iterator = new DefaultIterator($command);
        if ($pageSize) {
            $iterator->setPageSize($pageSize);
        }

        $property = new \ReflectionProperty($iterator, 'command');
        $property->setAccessible(true);
        $property->setValue($iterator, $command);

        $prepareRequest = new \ReflectionMethod($iterator, 'prepareRequest');
        $prepareRequest->setAccessible(true);
        $prepareRequest->invoke($iterator);

        $this->assertEquals($resultingLimit, $command->get('limit'));
    }

    public function testApplyNextTokenSetsTokenCorrectly()
    {
        $command = $this->getMockedCommand();
        $iterator = new DefaultIterator($command);

        $property = new \ReflectionProperty($iterator, 'command');
        $property->setAccessible(true);
        $property->setValue($iterator, $command);

        $property = new \ReflectionProperty($iterator, 'nextToken');
        $property->setAccessible(true);
        $property->setValue($iterator, '[MARKER]');

        $applyNextToken = new \ReflectionMethod($iterator, 'applyNextToken');
        $applyNextToken->setAccessible(true);
        $applyNextToken->invoke($iterator);

        $this->assertEquals('[MARKER]', $command->get('marker'));
    }

    public function testResultsAreHandledCorrectly()
    {
        $result = new Model(array(
            'VaultList' => array(
                array(/* ... */),
                array(/* ... */),
                array(/* ... */),
                array(/* ... */),
                array(/* ... */)
            ),
            'Marker' => '[MARKER]'
        ), new Parameter());

        $command = $this->getMockedCommand();
        $iterator = new DefaultIterator($command);

        $property = new \ReflectionProperty($iterator, 'command');
        $property->setAccessible(true);
        $property->setValue($iterator, $command);

        $handleResults = new \ReflectionMethod($iterator, 'handleResults');
        $handleResults->setAccessible(true);
        $this->assertCount(5, $handleResults->invoke($iterator, $result));

        $determineNextToken = new \ReflectionMethod($iterator, 'determineNextToken');
        $determineNextToken->setAccessible(true);
        $determineNextToken->invoke($iterator, $result);
        $nextToken = new \ReflectionProperty($iterator, 'nextToken');
        $nextToken->setAccessible(true);
        $this->assertEquals('[MARKER]', $nextToken->getValue($iterator));
    }

    /**
     * @return AbstractCommand
     */
    protected function getMockedCommand()
    {
        $command = $this->getMockBuilder('Guzzle\Service\Command\OperationCommand')
            ->disableOriginalConstructor()
            ->setMethods(array('execute', 'getName', '__clone'))
            ->getMock();

        $command->expects($this->any())
            ->method('getName')
            ->will($this->returnValue('ListVaults'));
        $command->expects($this->any())
            ->method('__clone')
            ->will($this->returnSelf());

        $command->set('foo', 'bar');

        return $command;
    }
}
