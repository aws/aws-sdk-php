<?php
namespace Aws\Test\Api\ErrorParser;

use Aws\Api\ErrorParser\RestJsonErrorParser;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Api\ErrorParser\RestJsonErrorParser
 * @covers Aws\Api\ErrorParser\JsonParserTrait
 */
class RestJsonErrorParserTest extends TestCase
{
    public function testParsesClientErrorResponses()
    {
        $response = Psr7\parse_response(
            "HTTP/1.1 400 Bad Request\r\n" .
            "x-amzn-requestid: xyz\r\n\r\n" .
            '{ "type": "client", "message": "lorem ipsum", "code": "foo" }'
        );

        $parser = new RestJsonErrorParser();
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
        ), $parser($response));
    }

    public function testParsesClientErrorResponseWithCodeInHeader()
    {
        $response = Psr7\parse_response(
            "HTTP/1.1 400 Bad Request\r\n" .
            "x-amzn-RequestId: xyz\r\n" .
            "x-amzn-ErrorType: foo:bar\r\n\r\n" .
            '{"message": "lorem ipsum"}'
        );

        $parser = new RestJsonErrorParser();
        $this->assertEquals(array(
            'code'       => 'foo',
            'message'    => 'lorem ipsum',
            'type'       => 'client',
            'request_id' => 'xyz',
            'parsed'     => array(
                'message' => 'lorem ipsum',
            )
        ), $parser($response));
    }
}
