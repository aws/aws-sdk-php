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

namespace Aws\Tests\DynamoDb\Session;

use Aws\Tests\DynamoDb\Session\AbstractSessionTestCase;
use Aws\DynamoDb\Session\SessionHandlerConfig;

/**
 * @covers Aws\DynamoDb\Session\SessionHandlerConfig
 */
class SessionHandlerConfigTest extends AbstractSessionTestCase
{
    public function getConstructorTestCases()
    {
        return array(
            array(
                array(
                    'dynamodb_client' => $this->getMockedClient()
                ),
                'Aws\DynamoDb\Session\SessionHandlerConfig'
            ),
            array(
                array(),
                'Aws\Common\Exception\InvalidArgumentException'
            )
        );
    }

    /**
     * @dataProvider getConstructorTestCases
     */
    public function testConstructorProperlyCreatesConfig(array $data, $expectedClass)
    {
        try {
            $config = new SessionHandlerConfig($data);
        } catch (\Aws\Common\Exception\InvalidArgumentException $e) {
            $config = $e;
        }

        $this->assertInstanceOf($expectedClass, $config);
    }

    public function testAddDefaultsPerformsMergeProperly()
    {
        $config = new SessionHandlerConfig(array(
            'dynamodb_client' => $this->getMockedClient()
        ));

        $this->assertNull($config->get('foo_bar'));
        $config->addDefaults(array('foo_bar' => 'baz'));
        $this->assertEquals('baz', $config->get('foo_bar'));
        $config->addDefaults(array('foo_bar' => 'CHANGED'));
        $this->assertEquals('baz', $config->get('foo_bar'));
    }
}
