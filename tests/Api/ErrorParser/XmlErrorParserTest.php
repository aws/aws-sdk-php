<?php
namespace Aws\Test\Api\ErrorParser;

use Aws\Api\ErrorParser\XmlErrorParser;
use Aws\Test\TestServiceTrait;
use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;
use GuzzleHttp\Psr7;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(XmlErrorParser::class)]
class XmlErrorParserTest extends TestCase
{
    use ArraySubsetAsserts;
    use TestServiceTrait;

    /**
     * @param string $response
     * @param string $protocol
     * @param string $parser
     * @param array $expected
     * @param string|null $expectedParsedType
     *
     * @throws \Exception
     */
    #[DataProvider('errorResponsesProvider')]
    public function testParsesClientErrorResponses(
        string $response,
        string $protocol,
        string $parser,
        array $expected,
        ?string $expectedParsedType
    ) {
        $service = $this->generateTestService($protocol);
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('TestOperation');
        $parser = new $parser($service);

        $response = Psr7\Message::parseResponse($response);
        $result = $parser($response, $command);
        $this->assertArraySubset($expected, $result);

        if (is_null($expectedParsedType)) {
            $this->assertNull($result['parsed']);
        } else {
            $this->assertInstanceOf($expectedParsedType, $result['parsed']);
        }
    }

    public static function errorResponsesProvider(): array
    {
        return [
            // ec2, modeled exception
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
                '<Response>' .
                '  <Errors>' .
                '    <Error>' .
                '      <Code>TestException</Code>' .
                '      <Message>Error Message</Message>' .
                '      <TestString>SomeString</TestString>' .
                '      <TestInt>456</TestInt>' .
                '    </Error>' .
                '  </Errors>' .
                '  <RequestId>xyz</RequestId>' .
                '</Response>',
                'ec2',
                XmlErrorParser::class,
                [
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'code' => 'TestException',
                    'message' => 'Error Message',
                    'body' => [
                        'TestHeaderMember' => 'foo-header',
                        'TestHeaders' => [
                            'foo' => 'foo-meta',
                            'bar' => 'bar-meta',
                        ],
                        'TestStatus' => 400,
                        'TestString' => 'SomeString',
                        'TestInt' => 456
                    ],
                ],
                'SimpleXMLElement',
            ],
            // ec2, no modeled shape
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
                '<Response>' .
                '  <Errors>' .
                '    <Error>' .
                '      <Code>NonExistentException</Code>' .
                '      <Message>Error Message</Message>' .
                '      <TestString>SomeString</TestString>' .
                '      <TestInt>456</TestInt>' .
                '    </Error>' .
                '  </Errors>' .
                '  <RequestId>xyz</RequestId>' .
                '</Response>',
                'ec2',
                XmlErrorParser::class,
                [
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'code' => 'NonExistentException',
                    'message' => 'Error Message',
                ],
                'SimpleXMLElement',
            ],
            // query, modeled exception
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '<ErrorResponse xmlns="http://sns.amazonaws.com/doc/2010-03-31/">' .
                '  <Error>' .
                '    <Type>ErrorType</Type>' .
                '    <Code>TestException</Code>' .
                '    <Message>Error Message</Message>' .
                '    <TestString>SomeString</TestString>' .
                '    <TestInt>456</TestInt>' .
                '  </Error>' .
                '  <RequestId>xyz</RequestId>' .
                '</ErrorResponse>',
                'query',
                XmlErrorParser::class,
                [
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'code' => 'TestException',
                    'message' => 'Error Message',
                    'body' => [
                        'TestHeaderMember' => 'foo-header',
                        'TestHeaders' => [
                            'foo' => 'foo-meta',
                            'bar' => 'bar-meta',
                        ],
                        'TestStatus' => 400,
                        'TestString' => 'SomeString',
                        'TestInt' => 456
                    ],
                ],
                'SimpleXMLElement',
            ],
            // query, no modeled shape
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '<ErrorResponse xmlns="http://sns.amazonaws.com/doc/2010-03-31/">' .
                '  <Error>' .
                '    <Type>ErrorType</Type>' .
                '    <Code>NonExistentException</Code>' .
                '    <Message>Error Message</Message>' .
                '    <TestString>SomeString</TestString>' .
                '    <TestInt>456</TestInt>' .
                '  </Error>' .
                '  <RequestId>xyz</RequestId>' .
                '</ErrorResponse>',
                'query',
                XmlErrorParser::class,
                [
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'code' => 'NonExistentException',
                    'message' => 'Error Message',
                ],
                'SimpleXMLElement',
            ],
            // rest-xml, modeled exception
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '<ErrorResponse xmlns="http://cloudfront.amazonaws.com/doc/2016-09-07/">' .
                '  <Error>' .
                '    <Type>ErrorType</Type>' .
                '    <Code>TestException</Code>' .
                '    <Message>Error Message</Message>' .
                '    <TestString>SomeString</TestString>' .
                '    <TestInt>456</TestInt>' .
                '  </Error>' .
                '  <RequestId>xyz</RequestId>' .
                '</ErrorResponse>',
                'query',
                XmlErrorParser::class,
                [
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'code' => 'TestException',
                    'message' => 'Error Message',
                    'body' => [
                        'TestHeaderMember'  => 'foo-header',
                        'TestHeaders'       => [
                            'foo' => 'foo-meta',
                            'bar' => 'bar-meta',
                        ],
                        'TestStatus' => 400,
                        'TestString' => 'SomeString',
                        'TestInt' => 456
                    ],
                ],
                'SimpleXMLElement',
            ],
            // rest-xml, no modeled shape
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '<ErrorResponse xmlns="http://cloudfront.amazonaws.com/doc/2016-09-07/">' .
                '  <Error>' .
                '    <Type>ErrorType</Type>' .
                '    <Code>NonExistentException</Code>' .
                '    <Message>Error Message</Message>' .
                '    <TestString>SomeString</TestString>' .
                '    <TestInt>456</TestInt>' .
                '  </Error>' .
                '  <RequestId>xyz</RequestId>' .
                '</ErrorResponse>',
                'query',
                XmlErrorParser::class,
                [
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'code' => 'NonExistentException',
                    'message' => 'Error Message',
                ],
                'SimpleXMLElement',
            ],
            // S3 format, modeled exception
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n\r\n" .
                '<Error>' .
                '  <Type>ErrorType</Type>' .
                '  <Code>TestException</Code>' .
                '  <Message>Error Message</Message>' .
                '  <RequestId>xyz</RequestId>' .
                '  <Resource>Foo</Resource>' .
                '  <TestString>SomeString</TestString>' .
                '  <TestInt>456</TestInt>' .
                '  <HostId>baz</HostId>' .
                '</Error>',
                'query',
                XmlErrorParser::class,
                [
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'code' => 'TestException',
                    'message' => 'Error Message',
                    'body' => [
                        'TestHeaderMember'  => 'foo-header',
                        'TestHeaders'       => [
                            'foo' => 'foo-meta',
                            'bar' => 'bar-meta',
                        ],
                        'TestStatus' => 400,
                        'TestString' => 'SomeString',
                        'TestInt' => 456
                    ],
                ],
                'SimpleXMLElement',
            ],
            // S3 format, no modeled shape
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n\r\n" .
                '<Error>' .
                '  <Type>ErrorType</Type>' .
                '  <Code>NonExistentException</Code>' .
                '  <Message>Error Message</Message>' .
                '  <RequestId>xyz</RequestId>' .
                '  <Resource>Foo</Resource>' .
                '  <TestString>SomeString</TestString>' .
                '  <TestInt>456</TestInt>' .
                '  <HostId>baz</HostId>' .
                '</Error>',
                'query',
                XmlErrorParser::class,
                [
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'code' => 'NonExistentException',
                    'message' => 'Error Message',
                ],
                'SimpleXMLElement',
            ],
            // S3 format, empty body, request id in header
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n" .
                "x-amz-request-id: xyz\r\n\r\n",
                'query',
                XmlErrorParser::class,
                [
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'body' => [],
                ],
                null
            ],
        ];
    }

    public function testParsesResponsesWithNoBodyAndNoRequestId()
    {
        $response = Psr7\Message::parseResponse(
            "HTTP/1.1 400 Bad Request\r\n\r\n"
        );
        $parser = new XmlErrorParser();
        $result = $parser($response);
        $this->assertSame('400 Bad Request', $result['message']);
        $this->assertNull($result['parsed']);
    }

    public function testParsesResponsesWithNoBody()
    {
        $response = $response = Psr7\Message::parseResponse(
            "HTTP/1.1 400 Bad Request\r\nX-Amz-Request-ID: Foo\r\n\r\n"
        );
        $parser = new XmlErrorParser();
        $result = $parser($response);
        $this->assertSame('400 Bad Request (Request-ID: Foo)', $result['message']);
        $this->assertSame('Foo', $result['request_id']);
    }

    public function testUsesNotFoundWhen404()
    {
        $response = $response = Psr7\Message::parseResponse(
            "HTTP/1.1 404 Not Found\r\nX-Amz-Request-ID: Foo\r\n\r\n"
        );
        $parser = new XmlErrorParser();
        $result = $parser($response);
        $this->assertSame('NotFound', $result['code']);
    }
}
