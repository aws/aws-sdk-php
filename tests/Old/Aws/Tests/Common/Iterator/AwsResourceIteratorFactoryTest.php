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
                array('foo' => array()),
                array('foo' => array(
                    'input_token'  => null,
                    'output_token' => null,
                    'limit_key'    => null,
                    'result_key'   => null,
                    'more_results' => null,
                ))
            ),
            array(
                array('foo' => array(
                    'input_token'  => 'a',
                    'output_token' => 'b',
                )),
                array('foo' => array(
                    'input_token'  => 'a',
                    'output_token' => 'b',
                    'limit_key'    => null,
                    'result_key'   => null,
                    'more_results' => null,
                )),
            ),
        );
    }

    /**
     * @dataProvider getDataForOperationsTest
     */
    public function testOperationsAreDiscoveredInConstructor(array $config, $expectedResult)
    {
        $factory = new AwsResourceIteratorFactory($config);
        $actualResult = $this->readAttribute($factory, 'config');
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
            array($command, array('FooBar' => array()), null, true),
            array($command, array(), null, false),
            array($command, array(), $primaryFactory, true),
        );
    }

    /**
     * @dataProvider getDataForBuildTest
     */
    public function testBuildCreatesIterator($command, array $operations, $otherFactory, $successExpected)
    {
        $factory = new AwsResourceIteratorFactory($operations, $otherFactory);

        try {
            $iterator = $factory->build($command);
            $success = $iterator instanceof AwsResourceIterator;
        } catch (\InvalidArgumentException $e) {
            $success = false;
        }

        $this->assertEquals($successExpected, $factory->canBuild($command));
        $this->assertEquals($successExpected, $success);
    }

    public function testLegacyOptionsAreHandled()
    {
        $command = $this->getMockBuilder('Guzzle\Service\Command\CommandInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $command->expects($this->any())
            ->method('getName')
            ->will($this->returnValue('FooBar'));

        $providedOptions = array(
            'token_param' => 'a',
            'token_key'   => 'b',
            'limit_param' => 'c',
            'result_key'  => 'd',
            'more_key'    => 'e',
        );

        $expectedOptions = array(
            'input_token'  => 'a',
            'output_token' => 'b',
            'limit_key'    => 'c',
            'result_key'   => 'd',
            'more_results' => 'e',
        );

        $factory = new AwsResourceIteratorFactory(array('FooBar' => array()));
        $iterator = $factory->build($command, $providedOptions);
        $actualOptions = $this->readAttribute($iterator, 'data');

        $this->assertEquals($expectedOptions, $actualOptions);
    }
}
