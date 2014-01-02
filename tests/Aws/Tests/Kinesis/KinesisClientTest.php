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

namespace Aws\Tests\Kinesis;

use Aws\Kinesis\KinesisClient;
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;

/**
 * @covers Aws\Kinesis\KinesisClient
 */
class KinesisClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryInitializesClient()
    {
        $client = KinesisClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1',
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://kinesis.us-east-1.amazonaws.com', $client->getBaseUrl());
    }

    public function testTheGetShardIteratorOperationWorksViaMagicCall()
    {
        $client = KinesisClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1',
        ));
        $client->addSubscriber(new MockPlugin(array(new Response(200, null, '{"ShardIterator":"foobar"}'))));

        $result = $client->getShardIterator(array(
            'StreamName'        => 'test',
            'ShardId'           => 'test',
            'ShardIteratorType' => 'AT_SEQUENCE_NUMBER',
        ));
        $this->assertEquals('foobar', $result['ShardIterator']);
    }
}
