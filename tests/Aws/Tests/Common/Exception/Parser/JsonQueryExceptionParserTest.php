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

namespace Aws\Tests\Common\Exception\Parser;

use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\Common\Exception\Parser\JsonQueryExceptionParser
 * @covers Aws\Common\Exception\Parser\AbstractJsonExceptionParser
 */
class JsonQueryExceptionParserTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testParsesClientErrorResponses()
    {
        $request = new Request('GET', 'http://example.com');
        $response = Response::fromMessage(
            "HTTP/1.1 400 Bad Request\r\n" .
            "x-amzn-requestid: xyz\r\n\r\n" .
            '{ "__type": "foo", "message": "lorem ipsum" }'
        );

        $parser = new JsonQueryExceptionParser();
        $this->assertEquals(array(
            'code'       => 'foo',
            'message'    => 'lorem ipsum',
            'type'       => 'client',
            'request_id' => 'xyz',
            'parsed'     => array(
                '__type'  => 'foo',
                'message' => 'lorem ipsum'
            )
        ), $parser->parse($request, $response));
    }

    public function testParsesServerErrorResponsesWithMixedCasing()
    {
        $request = new Request('GET', 'http://example.com');
        $response = Response::fromMessage(
            "HTTP/1.1 500 Internal Server Error\r\n" .
            "x-amzn-requestid: 123\r\n\r\n" .
            '{ "__Type": "abc#bazFault", "Message": "dolor" }'
        );

        $parser = new JsonQueryExceptionParser();
        $this->assertEquals(array(
            'code'       => 'baz',
            'message'    => 'dolor',
            'type'       => 'server',
            'request_id' => '123',
            'parsed'     => array(
                '__type'  => 'abc#bazFault',
                'message' => 'dolor'
            )
        ), $parser->parse($request, $response));
    }
}
