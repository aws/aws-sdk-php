<?php
namespace Aws\Test\Api\ErrorParser;

use Aws\Api\ErrorParser\JsonRpcErrorParser;
use Aws\Api\ErrorParser\RestJsonErrorParser;
use Aws\Test\TestServiceTrait;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\ErrorParser\JsonRpcErrorParser
 * @covers \Aws\Api\ErrorParser\JsonParserTrait
 */
class JsonRpcErrorParserTest extends TestCase
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
        $service = $this->generateTestService('json');
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('TestOperation', []);

        return [
            // Non-modeled exception, mixed casing
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '{ "__Type": "foo", "Message": "lorem ipsum" }',
                null,
                new JsonRpcErrorParser(),
                [
                    'code'       => 'foo',
                    'message'    => 'lorem ipsum',
                    'type'       => 'client',
                    'request_id' => 'xyz',
                    'parsed'     => [
                        'message' => 'lorem ipsum',
                        '__type'    => 'foo'
                    ],
                    'body' => [],
                ]
            ],
            // Modeled exception, with service
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '{ "TestString": "foo", "TestInt": 123, "NotModeled": "bar", "__type": "TestException", "message": "Test Message" }',
                $command,
                new JsonRpcErrorParser($service),
                [
                    'code'       => 'TestException',
                    'type'       => 'client',
                    'request_id' => 'xyz',
                    'parsed'     => [
                        'teststring'    => 'foo',
                        'testint'       => 123,
                        'notmodeled'    => 'bar',
                        '__type'        => 'TestException',
                        'message'       => 'Test Message'
                    ],
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
                    'message' => 'Test Message'
                ]
            ],
            // Unmodeled shape, with service
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: foo-header\r\n" .
                "x-meta-foo: foo-meta\r\n" .
                "x-meta-bar: bar-meta\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '{ "TestString": "foo", "TestInt": 123, "NotModeled": "bar", "__type": "NonExistentException", "message": "Test Message" }',
                null,
                new JsonRpcErrorParser($service),
                [
                    'code'       => 'NonExistentException',
                    'message'    => 'Test Message',
                    'type'       => 'client',
                    'request_id' => 'xyz',
                    'parsed'     => [
                        'teststring'    => 'foo',
                        'testint'       => 123,
                        'notmodeled'    => 'bar',
                        'message'       => 'Test Message',
                        '__type'        => 'NonExistentException',
                    ],
                    'body' => [],
                ]
            ],
        ];
    }
}
