<?php
namespace Aws\Test\Api\ErrorParser;

use Aws\Api\ErrorParser\RestJsonErrorParser;
use Aws\Api\ErrorParser\RestXmlErrorParser;
use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Service;
use Aws\AwsClient;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Api\ErrorParser\RestXmlErrorParser
 */
class RestXmlErrorParserTest extends TestCase
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
        $this->assertArraySubset(
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
        ];
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
                    "protocol" => 'rest-xml',
                    "apiVersion" => "2019-05-01"
                ],
                'shapes' => [
                    "HeaderMap"=> [
                        "type"=> "map",
                        "key"=> [
                            "shape"=> "String"
                        ],
                        "value"=> [
                            "shape"=> "String"
                        ]
                    ],
                    "Integer" => ["type" => "integer"],
                    "String" => ["type" => "string"],
                    "TestException"=>[
                        "type" => "structure",
                        "members" => [
                            "TestString" => ["shape" => "String"],
                            "TestInt" => ["shape" => "Integer"],
                            "TestHeaderMember" => [
                                "shape" => "String",
                                "location" => "header",
                                "locationName" => "TestHeader",
                            ],
                            "TestHeaders" => [
                                "shape" => "HeaderMap",
                                "location" => "headers",
                                "locationName" => "x-meta-",
                            ],
                            "TestStatus" => [
                                "shape" => "Integer",
                                "location" => "statusCode",
                            ],
                        ],
                        "error" => ["httpStatusCode" => 502],
                        "exception" => true,
                    ],
                    "TestInput"=>[
                        "type" => "structure",
                        "members" => [
                            "TestInput" => ["shape" => "String"]
                        ],
                    ],
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
