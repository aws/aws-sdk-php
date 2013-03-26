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

use Aws\DynamoDb\DynamoDbClient;

abstract class AbstractSessionTestCase extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @return \Aws\DynamoDb\DynamoDbClient
     */
    public function getMockedClient()
    {
        $client = $this->getMockBuilder('Aws\DynamoDb\DynamoDbClient')
            ->disableOriginalConstructor()
            ->getMock();

        $description = $this->getMockBuilder('Guzzle\Service\Description\ServiceDescription')
            ->disableOriginalConstructor()
            ->getMock();

        $description->expects($this->any())
            ->method('getApiVersion')
            ->will($this->returnValue('2012-08-10'));

        $client->expects($this->any())
            ->method('getDescription')
            ->will($this->returnValue($description));

        return $client;
    }

    /**
     * @return \Aws\DynamoDb\Session\SessionHandlerConfig
     */
    public function getMockedConfig()
    {
        $config = $this->getMockBuilder('Aws\DynamoDb\Session\SessionHandlerConfig')
            ->disableOriginalConstructor()
            ->getMock();

        return $config;
    }

    /**
     * @return \Aws\Common\Command\JsonCommand
     */
    public function getMockedCommand(DynamoDbClient $client)
    {
        $command = $this->getMock('Aws\Common\Command\JsonCommand');
        $client->expects($this->any())
            ->method('getCommand')
            ->will($this->returnValue($command));

        return $command;
    }

}
