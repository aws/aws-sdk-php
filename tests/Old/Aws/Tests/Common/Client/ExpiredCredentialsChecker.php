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

namespace Aws\Tests\Common\Client;

use Aws\Common\Client\ExpiredCredentialsChecker;
use Aws\Common\Credentials\RefreshableInstanceProfileCredentials;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Exception\Parser\DefaultXmlExceptionParser;
use Aws\Common\InstanceMetadata\InstanceMetadataClient;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;
use Guzzle\Log\ClosureLogAdapter;
use Guzzle\Plugin\Log\LogPlugin;

/**
 * @covers Aws\Common\Client\ExpiredCredentialsChecker
 */
class ExpiredCredentialsCheckerTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testOnlyListensFor400Errors()
    {
        $checker = new ExpiredCredentialsChecker(new DefaultXmlExceptionParser());
        $this->assertFalse($checker->getBackoffPeriod(0, new Request('GET', 'http://example.com'), new Response(200)));
    }

    public function testOnlyListensForCompletedRequests()
    {
        $checker = new ExpiredCredentialsChecker(new DefaultXmlExceptionParser());
        $this->assertFalse($checker->getBackoffPeriod(0, new Request('GET', 'http://example.com')));
    }

    public function testOnlyListensForRequestsWithClient()
    {
        $checker = new ExpiredCredentialsChecker(new DefaultXmlExceptionParser());
        $this->assertFalse($checker->getBackoffPeriod(0, new Request('GET', 'http://example.com'), new Response(403)));
    }

    public function dataForRetryableErrorTest()
    {
        $xmlBody1 = <<< XMLBODY
<?xml version="1.0" encoding="UTF-8"?>
<Error>
    <Code>RequestExpired</Code>
    <Message>baz</Message>
    <RequestId>DUMMY_REQUEST_ID</RequestId>
    <Bucket>DUMMY_BUCKET_NAME</Bucket>
    <HostId>DUMMY_HOST_ID</HostId>
    <Endpoint>s3.amazonaws.com</Endpoint>
</Error>
XMLBODY;

        $xmlBody2 = <<< XMLBODY
<?xml version="1.0" encoding="UTF-8"?>
<Error>
    <Code>Foo</Code>
    <Message>baz</Message>
    <RequestId>DUMMY_REQUEST_ID</RequestId>
    <Bucket>DUMMY_BUCKET_NAME</Bucket>
    <HostId>DUMMY_HOST_ID</HostId>
    <Endpoint>s3.amazonaws.com</Endpoint>
</Error>
XMLBODY;
        $headers = array('Content-Type' => 'application/xml');

        return array(
            array(new Response(403, $headers, $xmlBody1), true),
            array(new Response(403, $headers, $xmlBody2), false),
        );
    }

    /**
     * @dataProvider dataForRetryableErrorTest
     */
    public function testReturnsTrueForRetryableErrors(Response $response, $retry)
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $lines = array();
        $log = new LogPlugin(new ClosureLogAdapter(function ($message) use (&$lines) {
            $lines[] = $message;
        }), "{request}");
        $client->addSubscriber($log);
        $imc = InstanceMetadataClient::factory(array());
        $imc->setBaseUrl('http://localhost:123');
        $credentials = new RefreshableInstanceProfileCredentials(
            new Credentials('foo', 'baz', 'bar', time() + 10000),
            $imc
        );
        $mock = $this->setMockResponse($imc, array(
            'metadata/iam_security_credentials',
            'metadata/iam_security_credentials_webapp'
        ));

        $client->setCredentials($credentials);
        $this->setMockResponse($client, array(
            $response,
            new Response(200)
        ));

        $request = $client->get('/');

        try {
            $request->send();
            if (!$retry) {
                $this->fail('Should have thrown an exception');
            }
            // Ensure that the instance profile client sent two requests
            $this->assertEquals(2, count($mock->getReceivedRequests()));
            $this->assertEquals(2, count($lines));
            $this->assertContains('x-amz-security-token: bar', $lines[0]);
            $this->assertContains('x-amz-security-token: AxCusEXAMPLEFooBarBaz', $lines[1]);
        } catch (\Exception $e) {
            if ($retry) {
                $this->fail('Threw exception when not expected: ' . $e->getMessage());
            }
            $this->assertCount(0, $mock->getReceivedRequests());
        }
    }
}
