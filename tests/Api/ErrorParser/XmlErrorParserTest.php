<?php
namespace Aws\Test\Api\ErrorParser;

use Aws\Api\ErrorParser\XmlErrorParser;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Api\ErrorParser\XmlErrorParser
 */
class XmlErrorParserTest extends TestCase
{
    /**
     * @return array
     */
    public function xmlDataProvider()
    {
        return [
            [
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
            ],
            [
                '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
                '<Error>' .
                '  <Code>Error code text</Code>' .
                '  <Message>Error message</Message>' .
                '  <Resource>Foo</Resource>' .
                '  <RequestId>xyz</RequestId>' .
                '</Error>'
            ],
            [
                '<ErrorResponse xmlns="https://sts.amazonaws.com/doc/2011-06-15/">' .
                '  <Error>' .
                '    <Type>Error code text</Type>' .
                '    <Code>Error code text</Code>' .
                '    <Message>Error message</Message>' .
                '  </Error>' .
                '  <RequestId>xyz</RequestId>' .
                '</ErrorResponse>'
            ]
        ];
    }

    /**
     * @dataProvider xmlDataProvider
     */
    public function testParsesResponses($xml)
    {
        $response = Psr7\parse_response(
            "HTTP/1.1 400 Bad Request\r\n\r\n{$xml}"
        );
        $parser = new XmlErrorParser();
        $result = $parser($response);
        $this->assertInternalType('array', $result);
        $this->assertEquals('client', $result['type']);
        $this->assertEquals('Error code text', $result['code']);
        $this->assertEquals('Error message', $result['message']);
        $this->assertEquals('xyz', $result['request_id']);
        $this->assertInstanceOf('SimpleXMLElement', $result['parsed']);
    }

    public function testParsesResponsesWithNoBodyAndNoRequestId()
    {
        $response = Psr7\parse_response(
            "HTTP/1.1 400 Bad Request\r\n\r\n"
        );
        $parser = new XmlErrorParser();
        $result = $parser($response);
        $this->assertEquals('400 Bad Request', $result['message']);
        $this->assertNull($result['parsed']);
    }

    public function testParsesResponsesWithNoBody()
    {
        $response = $response = Psr7\parse_response(
            "HTTP/1.1 400 Bad Request\r\nX-Amz-Request-ID: Foo\r\n\r\n"
        );
        $parser = new XmlErrorParser();
        $result = $parser($response);
        $this->assertEquals('400 Bad Request (Request-ID: Foo)', $result['message']);
        $this->assertEquals('Foo', $result['request_id']);
    }

    public function testUsesNotFoundWhen404()
    {
        $response = $response = Psr7\parse_response(
            "HTTP/1.1 404 Not Found\r\nX-Amz-Request-ID: Foo\r\n\r\n"
        );
        $parser = new XmlErrorParser();
        $result = $parser($response);
        $this->assertEquals('NotFound', $result['code']);
    }
}
