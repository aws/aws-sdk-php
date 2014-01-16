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

namespace Aws\Tests\DynamoDb;

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Enum\Type;

class DynamoDbClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\DynamoDb\DynamoDbClient::formatValue
     */
    public function testFormatValueProducesCorrectArrayStructure()
    {
        $client = $this->getServiceBuilder()->get('dynamodb', true);
        $expected = array(Type::NUMBER => '100');
        $actual = $client->formatValue(100);

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Aws\DynamoDb\DynamoDbClient::formatAttributes
     */
    public function testFormatAttributesProducesCorrectArrayStructure()
    {
        $client = $this->getServiceBuilder()->get('dynamodb', true);
        $expected = array(
            'number' => array(Type::NUMBER => '100'),
            'string' => array(Type::STRING => 'foo'),
        );

        $actual = $client->formatAttributes(array(
            'number' => 100,
            'string' => 'foo',
        ));

        $this->assertSame($expected, $actual);
    }

    /**
     * This was an issue in earlier DynamoDB clients from several programming
     * languages
     *
     * @covers Aws\DynamoDb\DynamoDbClient::formatAttributes
     */
    public function testFormatAttributesWorksWithTypesAsKeys()
    {
        $client = $this->getServiceBuilder()->get('dynamodb', true);
        $expected = array(
            'N'  => array('N' => '1'),
            'S'  => array('S' => 'S'),
            'NS' => array('NS' => array('1', '2', '3', '4')),
            'SS' => array('SS' => array('N', 'S', 'NS', 'SS')),
        );

        $actual = $client->formatAttributes(array(
            'N'  => 1,
            'S'  => 'S',
            'NS' => array(1, 2, 3, 4),
            'SS' => array('N', 'S', 'NS', 'SS'),
        ));

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Aws\DynamoDb\DynamoDbClient::factory
     * @covers Aws\DynamoDb\DynamoDbClient::createBackoffPlugin
     */
    public function testFactoryInitializesClient()
    {
        $client = DynamoDbClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://dynamodb.us-east-1.amazonaws.com', $client->getBaseUrl());
    }

    /**
     * @covers Aws\DynamoDb\DynamoDbClient::calculateRetryDelay
     */
    public function testHasCustomRetryDelay()
    {
        $client = DynamoDbClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-1'
        ));

        $this->assertEquals(0, $client->calculateRetryDelay(0));
        $this->assertEquals(0.05, $client->calculateRetryDelay(1));
        $this->assertEquals(0.1, $client->calculateRetryDelay(2));
        $this->assertEquals(0.2, $client->calculateRetryDelay(3));
        $this->assertEquals(0.4, $client->calculateRetryDelay(4));
        $this->assertEquals(0.8, $client->calculateRetryDelay(5));
        $this->assertEquals(1.6, $client->calculateRetryDelay(6));
        $this->assertEquals(3.2, $client->calculateRetryDelay(7));
        $this->assertEquals(6.4, $client->calculateRetryDelay(8));
        $this->assertEquals(12.8, $client->calculateRetryDelay(9));
        $this->assertEquals(25.6, $client->calculateRetryDelay(10));
        $this->assertEquals(51.2, $client->calculateRetryDelay(11));
    }

    /**
     * @covers Aws\DynamoDb\DynamoDbClient::registerSessionHandler
     */
    public function testCanRegisterSessionHandlerFromClient()
    {
        $client = DynamoDbClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-west-1'
        ));

        $this->assertInstanceOf('Aws\DynamoDb\Session\SessionHandler', $client->registerSessionHandler());
    }
}
