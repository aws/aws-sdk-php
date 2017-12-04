<?php
namespace Aws\Test\Api\ErrorParser;

use Aws\Api\ErrorParser\JsonRpcErrorParser;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Api\ErrorParser\JsonRpcErrorParser
 * @covers Aws\Api\ErrorParser\JsonParserTrait
 */
class JsonRpcErrorParserTest extends TestCase
{
    public function testParsesClientErrorResponses()
    {

        $response = Psr7\parse_response(
            "HTTP/1.1 400 Bad Request\r\n" .
            "x-amzn-requestid: xyz\r\n\r\n" .
            '{ "__type": "foo", "message": "lorem ipsum" }'
        );

        $parser = new JsonRpcErrorParser();
        $this->assertEquals(array(
            'code'       => 'foo',
            'message'    => 'lorem ipsum',
            'type'       => 'client',
            'request_id' => 'xyz',
            'parsed'     => array(
                '__type'  => 'foo',
                'message' => 'lorem ipsum'
            )
        ), $parser($response));
    }

    public function testParsesServerErrorResponsesWithMixedCasing()
    {
        $response = Psr7\parse_response(
            "HTTP/1.1 500 Internal Server Error\r\n" .
            "x-amzn-requestid: 123\r\n\r\n" .
            '{"__Type": "abc#bazFault", "Message": "dolor"}'
        );

        $parser = new JsonRpcErrorParser();
        $this->assertEquals(array(
            'code'       => 'bazFault',
            'message'    => 'dolor',
            'type'       => 'server',
            'request_id' => '123',
            'parsed'     => array(
                '__type'  => 'abc#bazFault',
                'message' => 'dolor'
            )
        ), $parser($response));
    }
}
