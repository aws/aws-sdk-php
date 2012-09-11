<?php

namespace Aws\Tests\Common\Exception\Parser;

use Aws\Common\Exception\Parser\JsonRestExceptionParser;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\Common\Exception\Parser\JsonRestExceptionParser
 */
class JsonRestExceptionParserTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testParsesClientErrorResponses()
    {
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
        ), $parser->parse($response));
    }
}
