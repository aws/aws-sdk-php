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

namespace Aws\Tests\Common\Iterator;

use Aws\Common\Iterator\AwsResourceIterator;
use Aws\Common\Iterator\AwsResourceIteratorFactory;

/**
 * @covers Aws\Common\Iterator\AwsResourceIteratorFactory
 */
class AwsResourceIteratorFactoryTest extends \Guzzle\Tests\GuzzleTestCase
{
    const EXCEPTION = '[EXCEPTION]';

    public function getDataForOperationsTest()
    {
        return array(
            array(
                array('operations' => array('foo')),
                array('foo' => array())
            ),
            array(
                array('operations' => array('foo' => array('bar'))),
                array('foo' => array('bar'))
            ),
            array(
                array('operations' => array(1)),
                '[EXCEPTION]'
            ),
            array(
                array('operations' => array('foo' => 'bar')),
                '[EXCEPTION]'
            ),
        );
    }

    /**
     * @dataProvider getDataForOperationsTest
     */
    public function testOperationsAreDiscoveredInConstructor(array $config, $expectedResult)
    {
        try {
            $factory = new AwsResourceIteratorFactory($config);
            $actualResult = $this->readAttribute($factory, 'operations')->getAll();
        } catch (\InvalidArgumentException $e) {
            $actualResult = self::EXCEPTION;
        }

        $this->assertEquals($expectedResult, $actualResult);
    }

    public function getDataForBuildTest()
    {
        $command = $this->getMockBuilder('Guzzle\Service\Command\CommandInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $command->expects($this->any())
            ->method('getName')
            ->will($this->returnValue('FooBar'));

        $iterator = $this->getMockBuilder('Aws\Common\Iterator\AwsResourceIterator')
            ->disableOriginalConstructor()
            ->getMock();

        $primaryFactory = $this->getMockBuilder('Guzzle\Service\Resource\ResourceIteratorFactoryInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $primaryFactory->expects($this->any())
            ->method('build')
            ->will($this->returnValue($iterator));
        $primaryFactory->expects($this->any())
            ->method('canBuild')
            ->will($this->returnValue(true));

        return array(
            array($command, array('FooBar'), null, true),
            array($command, array(), null, false),
            array($command, array(), $primaryFactory, true),
        );
    }

    /**
     * @dataProvider getDataForBuildTest
     */
    public function testBuildCreatesIterator($command, array $operations, $otherFactory, $successExpected)
    {
        $success = false;

        try {
            $factory = new AwsResourceIteratorFactory(array('operations' => $operations), $otherFactory);
            $iterator = $factory->build($command);
            $success = $iterator instanceof AwsResourceIterator;
        } catch (\InvalidArgumentException $e) {
            if (!$successExpected) {
                $success = true;
            }
        }

        $this->assertTrue($success);
    }
}
