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

namespace Aws\Tests\Sqs;

use Aws\Sqs\SqsClient;
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;

class SqsClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Sqs\SqsClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = SqsClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://sqs.us-east-1.amazonaws.com', $client->getBaseUrl());
    }

    public function testGetQueueArn()
    {
        $url = 'https://sqs.us-east-1.amazonaws.com/057737625318/php-integ-sqs-queue-1359765974';
        $arn = 'arn:aws:sqs:us-east-1:057737625318:php-integ-sqs-queue-1359765974';
        $sqs = SqsClient::factory(array('region' => 'us-east-1'));

        $this->assertEquals($arn, $sqs->getQueueArn($url));
    }

    /**
     * @expectedException \Aws\Sqs\Exception\SqsException
     * @expectedExceptionMessage Body MD5 mismatch for
     */
    public function testValidatesSuccessfulMd5OfBody()
    {
        $mock = new MockPlugin(array(
            Response::fromMessage("HTTP/1.1 200 OK\r\nContent-Type: application/xml\r\n\r\n" .
                "<ReceiveMessageResponse>
                  <ReceiveMessageResult>
                    <Message>
                      <MD5OfBody>fooo</MD5OfBody>
                      <Body>This is a test message</Body>
                    </Message>
                  </ReceiveMessageResult>
                </ReceiveMessageResponse>"
            )
        ));
        $sqs = SqsClient::factory(array(
            'key'    => 'abc',
            'secret' => '123',
            'region' => 'us-east-1'
        ));
        $sqs->addSubscriber($mock);
        $sqs->receiveMessage(array('QueueUrl' => 'http://foo.com'));
    }
}
