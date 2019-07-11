<?php
namespace Aws\Test\Api\ErrorParser;

use Aws\Api\ErrorParser\RestJsonErrorParser;
use Aws\Test\TestServiceTrait;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\ErrorParser\RestJsonErrorParser
 * @covers \Aws\Api\ErrorParser\JsonParserTrait
 */
class RestJsonErrorParserTest extends TestCase
{
    use TestServiceTrait;

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
        $this->assertEquals(
            $expected,
            $parser($response, $command)
        );
    }

    public function errorResponsesProvider()
    {
        $service = $this->generateTestService('rest-json');
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('TestOperation', []);

        return [
            // Error code in body
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '{ "type": "client", "message": "lorem ipsum", "code": "foo" }',
                null,
                new RestJsonErrorParser(),
                [
                    'code'       => 'foo',
                    'message'    => 'lorem ipsum',
                    'type'       => 'client',
                    'request_id' => 'xyz',
                    'parsed'     => [
                        'type'    => 'client',
                        'message' => 'lorem ipsum',
                        'code'    => 'foo'
                    ],
                    'body' => [],
                ]
            ],
            // Error code in header
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "x-amzn-RequestId: xyz\r\n" .
                "x-amzn-ErrorType: foo:bar\r\n\r\n" .
                '{"message": "lorem ipsum"}',
                null,
                new RestJsonErrorParser(),
                [
                    'code'       => 'foo',
                    'message'    => 'lorem ipsum',
                    'type'       => 'client',
                    'request_id' => 'xyz',
                    'parsed'     => [
                        'message' => 'lorem ipsum',
                    ],
                    'body' => [],
                ]
            ],
            // Error code in body, with service, modeled exception
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '{ "TestString": "foo", "TestInt": 123, "NotModeled": "bar", "code": "TestException" }',
                $command,
                new RestJsonErrorParser($service),
                [
                    'code'       => 'TestException',
                    'type'       => 'client',
                    'request_id' => 'xyz',
                    'parsed'     => [
                        'TestString'    => 'foo',
                        'TestInt'       => 123,
                        'NotModeled'    => 'bar',
                        'code'          => 'TestException',
                    ],
                    'TestString' => 'foo',
                    'TestInt'       => 123,
                    'NotModeled'    => 'bar',
                    'body' => [
                        'TestString'        => 'foo',
                        'TestInt'           => 123,
                        'TestHeaderMember'  => 'foo-header',
                        'TestHeaders'       => [
                            'foo' => 'foo-meta',
                            'bar' => 'bar-meta',
                        ],
                        'TestStatus'        => 400,
                    ],
                    'message' => null
                ]
            ],
            // Error code in header, with service, modeled exception
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n" .
                "x-amzn-ErrorType: TestException\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '{ "TestString": "foo", "TestInt": 123, "NotModeled": "bar"}',
                $command,
                new RestJsonErrorParser($service),
                [
                    'code'       => 'TestException',
                    'type'       => 'client',
                    'request_id' => 'xyz',
                    'parsed'     => [
                        'TestString'    => 'foo',
                        'TestInt'       => 123,
                        'NotModeled'    => 'bar'
                    ],
                    'TestString' => 'foo',
                    'TestInt'       => 123,
                    'NotModeled'    => 'bar',
                    'body' => [
                        'TestString'        => 'foo',
                        'TestInt'           => 123,
                        'TestHeaderMember'  => 'foo-header',
                        'TestHeaders'       => [
                            'foo' => 'foo-meta',
                            'bar' => 'bar-meta',
                        ],
                        'TestStatus'        => 400,
                    ],
                    'message' => null
                ]
            ],
            // Error code in header, with service, unmodeled code
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "x-amzn-RequestId: xyz\r\n" .
                "x-amzn-ErrorType: NonExistentException\r\n\r\n" .
                '{"message": "lorem ipsum"}',
                null,
                new RestJsonErrorParser($service),
                [
                    'code'       => 'NonExistentException',
                    'message'    => 'lorem ipsum',
                    'type'       => 'client',
                    'request_id' => 'xyz',
                    'parsed'     => [
                        'message' => 'lorem ipsum',
                    ],
                    'body' => [],
                ]
            ],
            // Error code in body, with service, unmodeled code
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '{ "type": "client", "message": "lorem ipsum", "code": "NonExistentException" }',
                null,
                new RestJsonErrorParser($service),
                [
                    'code'       => 'NonExistentException',
                    'message'    => 'lorem ipsum',
                    'type'       => 'client',
                    'request_id' => 'xyz',
                    'parsed'     => [
                        'type'    => 'client',
                        'message' => 'lorem ipsum',
                        'code'    => 'NonExistentException'
                    ],
                    'body' => [],
                ]
            ],
            // Error code in body, with service, unmodeled code, capitalized message
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '{ "type": "client", "Message": "lorem ipsum", "code": "NonExistentException" }',
                null,
                new RestJsonErrorParser($service),
                [
                    'code'       => 'NonExistentException',
                    'message'    => 'lorem ipsum',
                    'Message'    => 'lorem ipsum',
                    'type'       => 'client',
                    'request_id' => 'xyz',
                    'parsed'     => [
                        'type'    => 'client',
                        'Message' => 'lorem ipsum',
                        'code'    => 'NonExistentException'
                    ],
                    'body' => [],
                ]
            ],
        ];
    }
}
