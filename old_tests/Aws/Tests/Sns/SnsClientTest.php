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

use Aws\Sns\SnsClient;
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;

class SnsClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Sns\SnsClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = SnsClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://sns.us-east-1.amazonaws.com', $client->getBaseUrl());
    }

    public function testAttributesSerializeCorrectly()
    {
        $client = SnsClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        // Mock the response so no request is sent to the service
        $mockPlugin = new MockPlugin();
        $mockPlugin->addResponse(new Response(200));
        $client->addSubscriber($mockPlugin);

        // Listener to grab the request body about to be sent
        $client->getEventDispatcher()->addListener('request.before_send', function ($event) use (&$actualRequestBody) {
            list(, $actualRequestBody) = explode("\r\n\r\n", $event['request']);
        }, -255);

        // Expected serialization; extracted from service API documentation
        $expectedRequestBody = 'Action=SetPlatformApplicationAttributes&Version=2010-03-31&PlatformApplicationArn=arn%3'
            . 'Aaws%3Asns%3Aus-west-2%3A123456789012%3Aapp%2FGCM%2Fgcmpushapp&Attributes.entry.1.key=EventEndpointCreat'
            . 'ed&Attributes.entry.1.value=arn%3Aaws%3Asns%3Aus-west-2%3A123456789012%3Atopicarn';

        // Perform the operation
        $client->setPlatformApplicationAttributes(array(
            'PlatformApplicationArn' => 'arn:aws:sns:us-west-2:123456789012:app/GCM/gcmpushapp',
            'Attributes' => array(
                'EventEndpointCreated' => urldecode('arn:aws:sns:us-west-2:123456789012:topicarn'),
            )
        ));

        $this->assertEquals($expectedRequestBody, $actualRequestBody);
    }
}
