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

use Aws\Common\Exception\Parser\DefaultXmlExceptionParser;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\Common\Exception\Parser\DefaultXmlExceptionParser
 */
class DefaultXmlExceptionParserTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @return array
     */
    public function xmlDataProvider()
    {
        return array(
            array(
                '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
                '<Response>' .
                '  <Errors>' .
                '    <Error>' .
                '      <Code>Error code text</Code>' .
                '      <Message>Error message</Message>' .
                '    </Error>' .
                '  </Errors>' .
                '  <RequestID>xyz</RequestID>' .
                '</Response>'
            ),
            array(
                '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
                '<Error>' .
                '  <Code>Error code text</Code>' .
                '  <Message>Error message</Message>' .
                '  <Resource>Foo</Resource>' .
                '  <RequestId>xyz</RequestId>' .
                '</Error>'
            ),
            array(
                '<ErrorResponse xmlns="https://sts.amazonaws.com/doc/2011-06-15/">' .
                '  <Error>' .
                '    <Type>Error code text</Type>' .
                '    <Code>Error code text</Code>' .
                '    <Message>Error message</Message>' .
                '  </Error>' .
                '  <RequestId>xyz</RequestId>' .
                '</ErrorResponse>'
            )
        );
    }

    /**
     * @dataProvider xmlDataProvider
     */
    public function testParsesResponses($xml)
    {
        $request = new Request('GET', 'http://example.com');
        $response = Response::fromMessage("HTTP/1.1 400 Bad Request\r\n\r\n{$xml}");
        $parser = new DefaultXmlExceptionParser();
        $result = $parser->parse($request, $response);
        $this->assertInternalType('array', $result);
        $this->assertEquals('client', $result['type']);
        $this->assertEquals('Error code text', $result['code']);
        $this->assertEquals('Error message', $result['message']);
        $this->assertEquals('xyz', $result['request_id']);
        $this->assertInstanceOf('SimpleXMLElement', $result['parsed']);
    }

    public function testParsesResponsesWithNoBodyAndNoRequestId()
    {
        $request = new Request('GET', 'http://example.com');
        $response = Response::fromMessage("HTTP/1.1 400 Bad Request\r\n\r\n");
        $parser = new DefaultXmlExceptionParser();
        $result = $parser->parse($request, $response);
        $this->assertEquals('400 Bad Request', $result['message']);
        $this->assertNull($result['parsed']);
    }

    public function testParsesResponsesWithNoBody()
    {
        $request = new Request('GET', 'http://example.com');
        $response = Response::fromMessage("HTTP/1.1 400 Bad Request\r\nX-Amz-Request-ID: Foo\r\n\r\n");
        $parser = new DefaultXmlExceptionParser();
        $result = $parser->parse($request, $response);
        $this->assertEquals('400 Bad Request (Request-ID: Foo)', $result['message']);
        $this->assertEquals('Foo', $result['request_id']);
    }
}
