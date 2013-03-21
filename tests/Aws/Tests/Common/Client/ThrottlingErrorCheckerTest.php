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

use Aws\Common\Client\ThrottlingErrorChecker;
use Aws\Common\Exception\Parser\DefaultXmlExceptionParser;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Backoff\ExponentialBackoffStrategy;

/**
 * @covers Aws\Common\Client\ThrottlingErrorChecker
 */
class ThrottlingErrorCheckerTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testOnlyListensFor400Errors()
    {
        $request = new Request('GET', 'http://example.com');
        $response = new Response(200);
        $checker = new ThrottlingErrorChecker(new DefaultXmlExceptionParser());
        $this->assertFalse($checker->getBackoffPeriod(0, $request, $response));
    }

    public function testOnlyListensForCompletedRequests()
    {
        $request = new Request('GET', 'http://example.com');
        $checker = new ThrottlingErrorChecker(new DefaultXmlExceptionParser());
        $this->assertFalse($checker->getBackoffPeriod(0, $request));
    }

    public function dataForRetryableErrorTest()
    {
        $xmlBody = <<< XMLBODY
<?xml version="1.0" encoding="UTF-8"?>
<Response>
  <Errors>
    <Error>
      <Code>Throttling</Code>
      <Message>You Got Throttled!</Message>
    </Error>
  </Errors>
  <RequestID>xyz</RequestID>
</Response>
XMLBODY;

        $jsonBody = <<< JSONBODY
{"__type":"com.amazonaws.dynamodb.v20111205#ProvisionedThroughputExceededException",
"message":"The level of configured provisioned throughput for the table was exceeded."}
JSONBODY;

        return array(
            array('application/xml', $xmlBody, new DefaultXmlExceptionParser()),
            array('application/x-amz-json-1.0', $jsonBody, new JsonQueryExceptionParser()),
        );
    }

    /**
     * @dataProvider dataForRetryableErrorTest
     */
    public function testReturnsTrueForRetryableErrors($contentType, $contentBody, $exceptionParser)
    {
        $request = new Request('GET', 'http://example.com');
        $response = new Response(400, array('content-type' => $contentType), $contentBody);
        $checker = new ThrottlingErrorChecker($exceptionParser);
        $this->assertEquals(0, $checker->getBackoffPeriod(1, $request, $response));
        // Ensure it plays well with the chain
        $checker->setNext(new ExponentialBackoffStrategy());
        $this->assertEquals(8, $checker->getBackoffPeriod(3, $request, $response));
    }

    public function testBehavesProperlyAsChainLink()
    {
        $s = new ExponentialBackoffStrategy();
        $checker = new ThrottlingErrorChecker(new DefaultXmlExceptionParser(), $s);
        $this->assertTrue($checker->makesDecision());
        $this->assertSame($s, $checker->getNext());
    }
}
