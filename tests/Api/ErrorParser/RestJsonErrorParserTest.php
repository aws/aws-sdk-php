<?php
namespace Aws\Test\Api\ErrorParser;

use Aws\Api\ErrorParser\RestJsonErrorParser;
use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Service;
use Aws\AwsClient;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Api\ErrorParser\RestJsonErrorParser
 * @covers Aws\Api\ErrorParser\JsonParserTrait
 */
class RestJsonErrorParserTest extends TestCase
{
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
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('TestOperation', []);

        return [
            // Parser with code in body
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
                    ]
                ]
            ],
            // Parser with code in header
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
                    ]
                ]
            ],
            // Parser with code in body, and a modeled exception
            [
                "HTTP/1.1 400 Bad Request\r\n" .
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
                        'code'          => 'TestException'
                    ],
                    'TestString' => 'foo',
                    'TestInt'       => 123,
                    'NotModeled'    => 'bar',
                    'body' => [
                        'TestString'    => 'foo',
                        'TestInt'       => 123,
                    ],
                    'message' => null
                ]
            ],
            // Parser with code in header, and a modeled exception
            [
                "HTTP/1.1 400 Bad Request\r\n" .
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
                        'TestString'    => 'foo',
                        'TestInt'       => 123,
                    ],
                    'message' => null
                ]
            ],
        ];
    }

    public function testThrowsExceptionWhenModelNotFound()
    {
        $response = Psr7\parse_response("HTTP/1.1 400 Bad Request\r\n" .
        "x-amzn-ErrorType: NonExistentException\r\n" .
        "x-amzn-requestid: xyz\r\n\r\n" .
        '{ "TestString": "foo", "TestInt": 123, "NotModeled": "bar"}');

        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('TestOperation', []);
        $parser = new RestJsonErrorParser($service);

        try {
            $parser($response, $command);
        } catch (ParserException $e) {
            $this->assertEquals(
                "Shape for error code 'NonExistentException' not defined.",
                $e->getMessage()
            );
            $this->assertEquals('xyz', $e->getRequestId());
            $this->assertEquals('NonExistentException', $e->getErrorCode());
        };
    }

    private function generateTestClient(Service $service, $args = [])
    {
        return new AwsClient(
            array_merge(
                [
                    'service'      => 'foo',
                    'api_provider' => function () use ($service) {
                        return $service->toArray();
                    },
                    'region'       => 'us-east-1',
                    'version'      => 'latest',
                ],
                $args
            )
        );
    }

    private function generateTestService()
    {
        return new Service(
            [
                'metadata' => [
                    "protocol" => 'rest-json',
                    "apiVersion" => "2019-05-01"
                ],
                'shapes' => [
                    "Integer" => ["type" => "integer"],
                    "String" => ["type" => "string"],
                    "TestException"=>[
                        "type" => "structure",
                        "members" => [
                            "TestString" => ["shape" => "String"],
                            "TestInt" => ["shape" => "Integer"]
                        ],
                        "error" => ["httpStatusCode" => 502],
                        "exception" => true
                    ],
                    "TestInput"=>[
                        "type" => "structure",
                        "members" => [
                            "TestInput" => ["shape" => "String"]
                        ],
                    ]
                ],
                'operations' => [
                    "TestOperation"=> [
                        "name"=> "TestOperation",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input" => ["shape"=> "TestInput"],
                        "errors" => [
                            ["shape" => "TestException"]
                        ],
                    ],
                ],
            ],
            function () { return []; }
        );
    }
}
