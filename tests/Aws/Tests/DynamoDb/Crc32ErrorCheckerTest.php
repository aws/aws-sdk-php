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

use Aws\DynamoDb\Crc32ErrorChecker;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\DynamoDb\Crc32ErrorChecker
 */
class Crc32ErrorCheckerTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testPassesWhenHeaderIsNotSet()
    {
        $request = new Request('GET', 'http://example.com');
        $response = new Response(200);
        $checker = new Crc32ErrorChecker();
        $this->assertFalse($checker->getBackoffPeriod(0, $request, $response));
    }

    public function testOnlyListensForCompletedRequests()
    {
        $request = new Request('GET', 'http://example.com');
        $checker = new Crc32ErrorChecker();
        $this->assertFalse($checker->getBackoffPeriod(0, $request));
    }

    public function testReturnsTrueForMismatchedChecksums()
    {
        $request = new Request('GET', 'http://example.com');
        $response = new Response(200, array(
                'content-type' => 'application/x-amz-json-1.0',
                'x-amz-crc32'  => 123
            ), '{"foo":"bar"}'
        );
        $checker = new Crc32ErrorChecker();
        $this->assertSame(0, $checker->getBackoffPeriod(1, $request, $response));
    }

    public function testReturnsFalseWhenCrc32Matches()
    {
        $request = new Request('GET', 'http://example.com');
        $response = new Response(200, array('x-amz-crc32' => '3632233996'), 'test');
        $checker = new Crc32ErrorChecker();
        $this->assertFalse($checker->getBackoffPeriod(1, $request, $response));
    }
}
