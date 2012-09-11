<?php

namespace Aws\Tests\Common\Exception\Parser;

use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\Common\Exception\Parser\JsonQueryExceptionParser
 */
class DefaultJsonExceptionParserTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testParsesClientErrorResponses()
    {
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
        ), $parser->parse($response));
    }

    public function testParsesServerErrorResponsesWithMixedCasing()
    {
        $response = Response::fromMessage(
            "HTTP/1.1 500 Internal Server Error\r\n" .
            "x-amzn-requestid: 123\r\n\r\n" .
            '{ "__Type": "abc#baz", "Message": "dolor" }'
        );

        $parser = new JsonQueryExceptionParser();
        $this->assertEquals(array(
            'code'       => 'baz',
            'message'    => 'dolor',
            'type'       => 'server',
            'request_id' => '123',
            'parsed'     => array(
                '__Type'  => 'abc#baz',
                'Message' => 'dolor'
            )
        ), $parser->parse($response));
    }
}
