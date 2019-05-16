<?php
namespace Aws\Test\Api\ErrorParser;

use Aws\Api\ErrorParser\RestXmlErrorParser;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\ErrorParser\RestXmlErrorParser
 */
class RestXmlErrorParserTest extends TestCase
{
    use ErrorParserTestServiceTrait;

    /**
     * @dataProvider errorResponsesProvider
     *
     * @param $response
     * @param $command
     * @param $parser
     * @param $expected
     */
    public function testParsesClientErrorResponses(
        $response,
        $command,
        $parser,
        $expected
    ) {
        $response = Psr7\parse_response($response);
        $this->assertArraySubset(
            $expected,
            $parser($response, $command)
        );
    }

    public function errorResponsesProvider()
    {
        $service = $this->generateTestService('rest-xml');
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('TestOperation', []);

        return [
            // Modeled exception
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n" .
                "\"x-amzn-requestid: xyz\r\n\r\n" .
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
                $command,
                new RestXmlErrorParser($service),
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
            ],
            // Exception code without corresponding error shape
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n" .
                "\"x-amzn-requestid: xyz\r\n\r\n" .
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
                $command,
                new RestXmlErrorParser($service),
                [
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'code' => 'NonExistentException',
                    'message' => 'Error Message',
                ],
            ],
        ];
    }
}
