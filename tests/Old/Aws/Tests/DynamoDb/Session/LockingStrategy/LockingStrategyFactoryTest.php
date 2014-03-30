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

namespace Aws\Tests\DynamoDb\Session\LockingStrategy;

use Aws\Tests\DynamoDb\Session\AbstractSessionTestCase;
use Aws\DynamoDb\Session\LockingStrategy\LockingStrategyFactory;

/**
 * @covers Aws\DynamoDb\Session\LockingStrategy\LockingStrategyFactory
 */
class LockingStrategyFactoryTest extends AbstractSessionTestCase
{
    public function getFactoryTestCases()
    {
        return array(
            array(null,          'Aws\DynamoDb\Session\LockingStrategy\LockingStrategyInterface'),
            array('null',        'Aws\DynamoDb\Session\LockingStrategy\LockingStrategyInterface'),
            array('pessimistic', 'Aws\DynamoDb\Session\LockingStrategy\LockingStrategyInterface'),
            array('foo',         'Aws\Common\Exception\InvalidArgumentException'),
            array(5,             'Aws\Common\Exception\InvalidArgumentException')
        );
    }

    /**
     * @dataProvider getFactoryTestCases
     */
    public function testFactoryWorksCorrectly($strategyName, $class)
    {
        // Setup mocks
        $config = $this->getMockedConfig();
        $client = $this->getMockedClient();
        $config->expects($this->any())
            ->method('get')
            ->will($this->returnCallback(function ($key) use ($client) {
                return ($key === 'dynamodb_client') ? $client : null;
            }));

        $factory = new LockingStrategyFactory('Aws\DynamoDb\Session\LockingStrategy');

        try {
            $strategy = $factory->factory($strategyName, $config);
        } catch (\Aws\Common\Exception\InvalidArgumentException $e) {
            $strategy = $e;
        }

        $this->assertInstanceOf($class, $strategy);
    }
}
