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

use Aws\Common\Exception\Parser\JsonRestExceptionParser;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\Common\Exception\Parser\JsonRestExceptionParser
 */
class JsonRestExceptionParserTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testParsesClientErrorResponses()
    {
        $request = new Request('GET', 'http://example.com');
        $response = Response::fromMessage(
            "HTTP/1.1 400 Bad Request\r\n" .
            "x-amzn-requestid: xyz\r\n\r\n" .
            '{ "type": "client", "message": "lorem ipsum", "code": "foo" }'
        );

        $parser = new JsonRestExceptionParser();
        $this->assertEquals(array(
            'code'       => 'foo',
            'message'    => 'lorem ipsum',
            'type'       => 'client',
            'request_id' => 'xyz',
            'parsed'     => array(
                'type'    => 'client',
                'message' => 'lorem ipsum',
                'code'    => 'foo'
            )
        ), $parser->parse($request, $response));
    }

    public function testParsesClientErrorResponseWithCodeInHeader()
    {
        $request = new Request('GET', 'http://example.com');
        $response = Response::fromMessage(
            "HTTP/1.1 400 Bad Request\r\n" .
            "x-amzn-RequestId: xyz\r\n" .
            "x-amzn-ErrorType: foo:bar\r\n\r\n" .
            '{ "message": "lorem ipsum"}'
        );

        $parser = new JsonRestExceptionParser();
        $this->assertEquals(array(
            'code'       => 'foo',
            'message'    => 'lorem ipsum',
            'type'       => 'client',
            'request_id' => 'xyz',
            'parsed'     => array(
                'message' => 'lorem ipsum',
            )
        ), $parser->parse($request, $response));
    }
}
