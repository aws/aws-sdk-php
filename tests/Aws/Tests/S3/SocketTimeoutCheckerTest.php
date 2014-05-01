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

namespace Aws\Tests\S3;

use Aws\S3\SocketTimeoutChecker;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Backoff\ExponentialBackoffStrategy;

/**
 * @covers Aws\S3\SocketTimeoutChecker
 */
class SocketTimeoutCheckerTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected $message;

    public function setUp()
    {
        $this->message = '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
            . '<Error><Code>RequestTimeout</Code><Message>Your socket connection to the server was not read from or '
            . 'written to within the timeout period. Idle connections will be closed.</Message>'
            . '<RequestId>FOO</RequestId><HostId>Bar</HostId></Error>';
    }

    public function testOnlyListensFor400Errors()
    {
        $request = new Request('GET', 'http://example.com');
        $response = new Response(200);
        $checker = new SocketTimeoutChecker();
        $this->assertFalse($checker->getBackoffPeriod(0, $request, $response));
    }

    public function testOnlyListensForCompletedRequests()
    {
        $request = new Request('GET', 'http://example.com');
        $checker = new SocketTimeoutChecker();
        $this->assertFalse($checker->getBackoffPeriod(0, $request));
    }

    public function testReturnsTrueForRetryableErrors()
    {
        $request = new Request('GET', 'http://example.com');
        $response = new Response(400, array('content-type' => 'application/xml'), $this->message);
        $checker = new SocketTimeoutChecker();
        $this->assertEquals(0, $checker->getBackoffPeriod(1, $request, $response));
        // Ensure it plays well with the chain
        $checker->setNext(new ExponentialBackoffStrategy());
        $this->assertEquals(8, $checker->getBackoffPeriod(3, $request, $response));
    }

    public function testBehavesProperlyAsChainLink()
    {
        $s = new ExponentialBackoffStrategy();
        $checker = new SocketTimeoutChecker($s);
        $this->assertTrue($checker->makesDecision());
        $this->assertSame($s, $checker->getNext());
    }
}
