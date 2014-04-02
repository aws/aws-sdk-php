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
use Guzzle\Service\Command\AbstractCommand;
use Guzzle\Service\Resource\Model;

/**
 * @covers Aws\Common\Iterator\AwsResourceIterator
 */
class AwsResourceIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    const EXCEPTION = '[EXCEPTION]';

    public function getDataForPageSizeTest()
    {
        return array(
            array(null, null, null, null),
            array(null, null, 8, null),
            array(null, 8, null, 8),
            array('limit', null, null, null),
            array('limit', 8, null, 8),
            array('limit', null, 4, null),
            array('limit', 8, 4, 4),
            array('limit', 4, 8, 4),
            array('limit', 8, 8, 8),
        );
    }

    /**
    * @dataProvider getDataForPageSizeTest
    */
    public function testPrepareRequestSetsPageSizeCorrectly($limitKey, $limit, $pageSize, $resultingLimit)
    {
        $command = $this->getMockedCommand();
        if ($limit) {
            $command->set($limitKey, $limit);
        }

        $iterator = new AwsResourceIterator($command, array('limit_key' => $limitKey));
        if ($pageSize) {
            $iterator->setPageSize($pageSize);
        }

        $property = new \ReflectionProperty($iterator, 'command');
        $property->setAccessible(true);
        $property->setValue($iterator, $command);

        $prepareRequest = new \ReflectionMethod($iterator, 'prepareRequest');
        $prepareRequest->setAccessible(true);
        $prepareRequest->invoke($iterator);

        $this->assertEquals($resultingLimit, $command->get($limitKey));
    }

    public function getDataForApplyNextTokenTest()
    {
        return array(
            array(null, null, null, false),
            array(null, '[MARKER]', null, false),
            array('Marker', '[MARKER]', '[MARKER]', false),
            array('Marker', array('value1', 'value2'), array('value1', 'value2'), false),
            array(array('marker1', 'marker2'), array('value1', 'value2'), array('value1', 'value2'), false),
            array(array('marker1', 'marker2', 'marker3'), array('value1', 'value2'), self::EXCEPTION, true),
        );
    }

    /**
     * @dataProvider getDataForApplyNextTokenTest
     */
    public function testApplyNextTokenSetsTokenCorrectly($inputToken, $nextToken, $resultingToken, $expectException)
    {
        $command = $this->getMockedCommand();
        $iterator = new AwsResourceIterator($command, array('input_token' => $inputToken));

        $property = new \ReflectionProperty($iterator, 'command');
        $property->setAccessible(true);
        $property->setValue($iterator, $command);

        $property = new \ReflectionProperty($iterator, 'nextToken');
        $property->setAccessible(true);
        $property->setValue($iterator, $nextToken);

        $applyNextToken = new \ReflectionMethod($iterator, 'applyNextToken');
        $applyNextToken->setAccessible(true);

        try {
            $applyNextToken->invoke($iterator);

            // Get results
            if (is_array($inputToken)) {
                $result = array();
                foreach ($inputToken as $token) {
                    $result[] = $command->get($token);
                }
            } else {
                $result = $command->get($inputToken);
            }
        } catch (\RuntimeException $e) {
            if ($expectException) {
                $result = self::EXCEPTION;
            } else {
                throw $e;
            }
        }

        $this->assertEquals($resultingToken, $result);
    }

    public function getDataForHandleResultsTest()
    {
        return array(
            array(null, '*', 0),
            array('Foo', array(1, 2, 3), 3),
            array('Foo', null, 0),
        );
    }

    /**
     * @dataProvider getDataForHandleResultsTest
     */
    public function testResultsAreHandledCorrectly($resultKey, $resultValue, $expectedCount)
    {
        $model = new Model(array($resultKey => $resultValue));
        $command = $this->getMockedCommand();
        $iterator = new AwsResourceIterator($command, array('result_key' => $resultKey));

        $handleResults = new \ReflectionMethod($iterator, 'handleResults');
        $handleResults->setAccessible(true);
        $this->assertCount($expectedCount, $handleResults->invoke($iterator, $model));
    }

    public function getDataForDetermineNextTokenTest()
    {
        return array(
            array(null, null, null, array()),
            array(null, 'NextToken', '[TOKEN]', array(
                'NextToken' => '[TOKEN]'
            )),
            array('HasMore', 'NextToken', null, array(
                'HasMore'  => null,
                'NextToken' => '[TOKEN]'
            )),
            array('HasMore', 'NextToken', '[TOKEN]', array(
                'HasMore'  => '[MORE]',
                'NextToken' => '[TOKEN]'
            )),
            array('HasMore', null, null, array(
                'HasMore' => '[MORE]'
            )),
            array('HasMore', array('NextToken1', 'NextToken2'), array('[TOKEN1]', '[TOKEN2]'), array(
                'HasMore'   => '[MORE]',
                'NextToken1' => '[TOKEN1]',
                'NextToken2' => '[TOKEN2]'
            ))
        );
    }

    /**
     * @dataProvider getDataForDetermineNextTokenTest
     */
    public function testCanDetermineNextTokenCorrectly(
        $moreResults,
        $outputToken,
        $nextToken,
        array $data
    ) {
        $model = new Model($data);
        $command = $this->getMockedCommand();
        $iterator = new AwsResourceIterator($command, array(
            'more_results' => $moreResults,
            'output_token' => $outputToken,
        ));

        $method = new \ReflectionMethod($iterator, 'determineNextToken');
        $method->setAccessible(true);
        $method->invoke($iterator, $model);

        $this->assertEquals($nextToken, $this->readAttribute($iterator, 'nextToken'));
    }

    public function testSendRequest()
    {
        $model1 = new Model(array('NextToken' => 'token'));
        $model2 = new Model(array());
        $command = $this->getMockedCommand();
        $command->expects($this->any())
            ->method('getResult')
            ->will($this->onConsecutiveCalls($model1, $model2));

        $iterator = new AwsResourceIterator($command, array(
            'output_token' => 'NextToken',
            'result_key'   => 'Results'
        ));

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

        $this->assertEquals(array(), $result);
        $this->assertSame($model2, $iterator->getLastResult());
    }

    /**
     * @return AbstractCommand
     */
    protected function getMockedCommand()
    {
        $command = $this->getMockBuilder('Guzzle\Service\Command\OperationCommand')
            ->disableOriginalConstructor()
            ->setMethods(array('getResult', 'getName', '__clone'))
            ->getMock();

        $command->expects($this->any())
            ->method('getName')
            ->will($this->returnValue('FooBar'));
        $command->expects($this->any())
            ->method('__clone')
            ->will($this->returnSelf());

        $command->set('foo', 'bar');

        return $command;
    }
}
