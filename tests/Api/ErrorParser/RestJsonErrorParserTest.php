<?php
namespace Aws\Test\Api\ErrorParser;

use Aws\Api\ErrorParser\RestJsonErrorParser;
use Aws\Test\TestServiceTrait;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Aws\Api\ErrorParser\RestJsonErrorParser::class)]
#[CoversClass(\Aws\Api\ErrorParser\JsonParserTrait::class)]
class RestJsonErrorParserTest extends TestCase
{
    use TestServiceTrait;

    /**
     *
     * @param string $response
     * @param string|null $commandName
     * @param bool $parserWithService
     * @param array $expected

 */
    #[DataProvider('errorResponsesProvider')]
    public function testParsesClientErrorResponses(
        string $response,
        ?string $commandName,
        bool $parserWithService,
        array $expected
    ) {
        $service = $this->generateTestService('rest-json');
        $shapes = $service->getErrorShapes();
        $errorShape = $shapes[0];
        $client = $this->generateTestClient($service);
        $command = $commandName === null
            ? null
            : $client->getCommand($commandName);
        $parser = $parserWithService
            ? new RestJsonErrorParser($service)
            : new RestJsonErrorParser();

        // If error shape required in the expected
        if ($expected['error_shape'] ?? false) {
            $expected['error_shape'] = $errorShape;
        }

        $response = Psr7\Message::parseResponse($response);
        $parsed = $parser($response, $command);
        $this->assertCount(
            count($expected),
            $parsed
        );
        foreach($parsed as $key => $value) {
            if ($key === 'error_shape') {
                $this->assertEquals(
                    $expected['error_shape']->toArray(),
                    $value->toArray()
                );
            } else {
                $this->assertEquals($expected[$key], $value);
            }
        }
    }

    public static function errorResponsesProvider(): array
    {
        return [
            // Error code in body
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '{ "type": "client", "message": "lorem ipsum", "code": "foo" }',
                null,
                false,
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
                false,
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
                'TestOperation',
                true,
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
                    'message' => null,
                    'error_shape' => true
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
                'TestOperation',
                true,
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
                    'message' => null,
                    'error_shape' => true
                ]
            ],
            // Error code in header, with service, unmodeled code
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "x-amzn-RequestId: xyz\r\n" .
                "x-amzn-ErrorType: NonExistentException\r\n\r\n" .
                '{"message": "lorem ipsum"}',
                null,
                true,
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
                true,
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
                true,
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
            // Test zero value in header
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: 0\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '{ "code": "TestException" }',
                'TestOperation',
                true,
                [
                    'code'       => 'TestException',
                    'type'       => 'client',
                    'request_id' => 'xyz',
                    'parsed'     => ['code' => 'TestException'],
                    'body' => [
                        'TestHeaderMember'  => '0',  // Zero preserved
                        'TestHeaders'       => [],   // Empty array
                        'TestStatus'        => 400,
                    ],
                    'message' => null,
                    'error_shape' => true
                ]
            ],
            // Test false value in header
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: false\r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '{ "code": "TestException" }',
                'TestOperation',
                true,
                [
                    'code'       => 'TestException',
                    'type'       => 'client',
                    'request_id' => 'xyz',
                    'parsed'     => ['code' => 'TestException'],
                    'body' => [
                        'TestHeaderMember'  => 'false',  // False preserved
                        'TestHeaders'       => [],        // Empty array
                        'TestStatus'        => 400,
                    ],
                    'message' => null,
                    'error_shape' => true
                ]
            ],
            // Test empty string in header (should be skipped)
            [
                "HTTP/1.1 400 Bad Request\r\n" .
                "TestHeader: \r\n" .
                "x-amzn-requestid: xyz\r\n\r\n" .
                '{ "code": "TestException" }',
                'TestOperation',
                true,
                [
                    'code'       => 'TestException',
                    'type'       => 'client',
                    'request_id' => 'xyz',
                    'parsed'     => ['code' => 'TestException'],
                    'body' => [
                        // TestHeaderMember should NOT be present
                        'TestHeaders'       => [],   // Empty array
                        'TestStatus'        => 400,
                    ],
                    'message' => null,
                    'error_shape' => true
                ]
            ]
        ];
    }
}
