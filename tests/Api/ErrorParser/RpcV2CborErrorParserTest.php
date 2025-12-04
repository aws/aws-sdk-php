<?php
namespace Aws\Test\Api\ErrorParser;

use Aws\Api\Cbor\CborEncoder;
use Aws\Api\ErrorParser\RpcV2CborErrorParser;
use Aws\Test\TestServiceTrait;
use GuzzleHttp\Psr7\Response;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Api\ErrorParser\RpcV2CborErrorParser
 */
class RpcV2CborErrorParserTest extends TestCase
{
    use TestServiceTrait;

    private CborEncoder $encoder;

    protected function set_up(): void
    {
        $this->encoder = new CborEncoder();
    }

    /**
     * @dataProvider errorResponsesProvider
     */
    public function testParsesErrorResponses(
        $response,
        $command,
        $parser,
        $expected
    ): void
    {
        $parsed = $parser($response, $command);
        
        // Special handling for error_shape comparison
        if (isset($expected['error_shape'])) {
            $this->assertEquals(
                $expected['error_shape']->toArray(),
                $parsed['error_shape']->toArray()
            );
            unset($expected['error_shape'], $parsed['error_shape']);
        }
        
        // Compare the rest of the array
        $this->assertEquals($expected, $parsed);
    }

    public function errorResponsesProvider(): array
    {
        $service = $this->generateTestService('smithy-rpc-v2-cbor');
        $shapes = $service->getErrorShapes();
        $errorShape = $shapes[0];
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('TestOperation', []);
        $encoder = new CborEncoder();
        $parser = new RpcV2CborErrorParser();
        $parserWithService = new RpcV2CborErrorParser($service);

        return [
            'Error code in CBOR body' => [
                new Response(
                    400,
                    ['x-amzn-requestid' => 'xyz'],
                    $encoder->encode([
                        '__type' => 'BadRequestException',
                        'message' => 'lorem ipsum',
                    ])
                ),
                null,
                $parser,
                [
                    'code' => 'BadRequestException',
                    'message' => 'lorem ipsum',
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'parsed' => [
                        '__type' => 'BadRequestException',
                        'message' => 'lorem ipsum',
                    ],
                    'body' => [],
                ]
            ],
            'Error code with # suffix' => [
                new Response(
                    400,
                    ['x-amzn-requestid' => 'xyz'],
                    $encoder->encode([
                        '__type' => 'BadRequestException#',
                        'message' => 'lorem ipsum',
                    ])
                ),
                null,
                $parser,
                [
                    'code' => '',
                    'message' => 'lorem ipsum',
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'parsed' => [
                        '__type' => 'BadRequestException#',
                        'message' => 'lorem ipsum',
                    ],
                    'body' => [],
                ]
            ],
            'Error code with namespace prefix' => [
                new Response(
                    400,
                    ['x-amzn-requestid' => 'xyz'],
                    $encoder->encode([
                        '__type' => 'com.amazon.service#BadRequestException',
                        'message' => 'lorem ipsum',
                    ])
                ),
                null,
                $parser,
                [
                    'code' => 'BadRequestException',
                    'message' => 'lorem ipsum',
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'parsed' => [
                        '__type' => 'com.amazon.service#BadRequestException',
                        'message' => 'lorem ipsum',
                    ],
                    'body' => [],
                ]
            ],
            'Modeled exception with service' => [
                new Response(
                    400,
                    [
                        'TestHeader' => 'foo-header',
                        'x-meta-foo' => 'foo-meta',
                        'x-meta-bar' => 'bar-meta',
                        'x-amzn-requestid' => 'xyz',
                    ],
                    $encoder->encode([
                        '__type' => 'TestException',
                        'TestString' => 'foo',
                        'TestInt' => 123,
                        'NotModeled' => 'bar',
                    ])
                ),
                $command,
                $parserWithService,
                [
                    'code' => 'TestException',
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'parsed' => [
                        '__type' => 'TestException',
                        'teststring' => 'foo',
                        'testint' => 123,
                        'notmodeled' => 'bar',
                    ],
                    'body' => [
                        'TestString' => 'foo',
                        'TestInt' => 123,
                        'TestHeaderMember' => 'foo-header',
                        'TestHeaders' => [
                            'foo' => 'foo-meta',
                            'bar' => 'bar-meta',
                        ],
                        'TestStatus' => 400,
                    ],
                    'message' => null,
                    'error_shape' => $errorShape,
                ]
            ],
            'Error code using capital Message' => [
                new Response(
                    400,
                    ['x-amzn-requestid' => 'xyz'],
                    $encoder->encode([
                        '__type' => 'BadRequestException',
                        'Message' => 'lorem ipsum',
                    ])
                ),
                null,
                $parser,
                [
                    'code' => 'BadRequestException',
                    'message' => 'lorem ipsum',
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'parsed' => [
                        '__type' => 'BadRequestException',
                        'message' => 'lorem ipsum',
                    ],
                    'body' => [],
                ]
            ],
            'Missing __type field' => [
                new Response(
                    400,
                    ['x-amzn-requestid' => 'xyz'],
                    $encoder->encode([
                        'message' => 'lorem ipsum',
                    ])
                ),
                null,
                $parser,
                [
                    'code' => null,
                    'message' => null,
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'parsed' => [
                        'message' => 'lorem ipsum',
                    ],
                    'body' => [],
                ]
            ],
            'Server error (5xx)' => [
                new Response(
                    500,
                    ['x-amzn-requestid' => 'xyz'],
                    $encoder->encode([
                        '__type' => 'InternalServerError',
                        'message' => 'Something went wrong',
                    ])
                ),
                null,
                $parser,
                [
                    'code' => 'InternalServerError',
                    'message' => 'Something went wrong',
                    'type' => 'server',
                    'request_id' => 'xyz',
                    'parsed' => [
                        '__type' => 'InternalServerError',
                        'message' => 'Something went wrong',
                    ],
                    'body' => [],
                ]
            ],
            'Empty body' => [
                new Response(
                    400,
                    ['x-amzn-requestid' => 'xyz'],
                    ''
                ),
                null,
                $parser,
                [
                    'code' => null,
                    'message' => null,
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'parsed' => null,
                    'body' => [],
                ]
            ],
            'Zero values in headers (should be preserved)' => [
                new Response(
                    400,
                    [
                        'TestHeader' => '0',
                        'x-amzn-requestid' => 'xyz',
                    ],
                    $encoder->encode([
                        '__type' => 'TestException',
                    ])
                ),
                $command,
                $parserWithService,
                [
                    'code' => 'TestException',
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'parsed' => [
                        '__type' => 'TestException',
                    ],
                    'body' => [
                        'TestHeaderMember' => '0',
                        'TestHeaders' => [],
                        'TestStatus' => 400,
                    ],
                    'message' => null,
                    'error_shape' => $errorShape,
                ]
            ],
            'False value in header' => [
                new Response(
                    400,
                    [
                        'TestHeader' => 'false',
                        'x-amzn-requestid' => 'xyz',
                    ],
                    $encoder->encode([
                        '__type' => 'TestException',
                    ])
                ),
                $command,
                $parserWithService,
                [
                    'code' => 'TestException',
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'parsed' => [
                        '__type' => 'TestException',
                    ],
                    'body' => [
                        'TestHeaderMember' => 'false',
                        'TestHeaders' => [],
                        'TestStatus' => 400,
                    ],
                    'message' => null,
                    'error_shape' => $errorShape,
                ]
            ],
            'Empty string in header (should be skipped)' => [
                new Response(
                    400,
                    [
                        'TestHeader' => '',
                        'x-amzn-requestid' => 'xyz',
                    ],
                    $encoder->encode([
                        '__type' => 'TestException',
                    ])
                ),
                $command,
                $parserWithService,
                [
                    'code' => 'TestException',
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'parsed' => [
                        '__type' => 'TestException',
                    ],
                    'body' => [
                        'TestHeaders' => [],
                        'TestStatus' => 400,
                    ],
                    'message' => null,
                    'error_shape' => $errorShape,
                ]
            ],
            'Request ID variations' => [
                new Response(
                    400,
                    ['x-amzn-RequestId' => 'xyz'],
                    $encoder->encode([
                        '__type' => 'BadRequestException',
                        'message' => 'lorem ipsum',
                    ])
                ),
                null,
                $parser,
                [
                    'code' => 'BadRequestException',
                    'message' => 'lorem ipsum',
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'parsed' => [
                        '__type' => 'BadRequestException',
                        'message' => 'lorem ipsum',
                    ],
                    'body' => [],
                ]
            ],
            'Binary data in error message' => [
                new Response(
                    400,
                    ['x-amzn-requestid' => 'xyz'],
                    $encoder->encode([
                        '__type' => 'BadRequestException',
                        'message' => "Error\x00with\x00nulls",
                        'binaryField' => ['__cbor_bytes' => "Binary\x00data"],
                    ])
                ),
                null,
                $parser,
                [
                    'code' => 'BadRequestException',
                    'message' => "Error\x00with\x00nulls",
                    'type' => 'client',
                    'request_id' => 'xyz',
                    'parsed' => [
                        '__type' => 'BadRequestException',
                        'message' => "Error\x00with\x00nulls",
                        'binaryfield' => "Binary\x00data",
                    ],
                    'body' => [],
                ]
            ],
        ];
    }

    public function testHandlesNullValues(): void
    {
        $parser = new RpcV2CborErrorParser();
        $response = new Response(
            400,
            ['x-amzn-requestid' => 'xyz'],
            $this->encoder->encode([
                '__type' => 'BadRequestException',
                'message' => null,
                'details' => null,
            ])
        );

        $parsed = $parser($response, null);

        // Implementation doesn't filter null values in parsed
        $this->assertArrayHasKey('message', $parsed['parsed']);
        $this->assertNull($parsed['parsed']['message']);
        $this->assertArrayHasKey('details', $parsed['parsed']);
        $this->assertNull($parsed['parsed']['details']);
    }

    public function testHandlesZeroValues(): void
    {
        $parser = new RpcV2CborErrorParser();
        $response = new Response(
            400,
            ['x-amzn-requestid' => 'xyz'],
            $this->encoder->encode([
                '__type' => 'BadRequestException',
                'errorCode' => 0,
                'retryAfter' => 0.0,
                'isRetryable' => false,
            ])
        );

        $parsed = $parser($response, null);

        $expected = [
            '__type' => 'BadRequestException',
            'errorcode' => 0,
            'retryafter' => 0.0,
            'isretryable' => false,
        ];
        $this->assertSame($expected, $parsed['parsed']);
    }

    public function testHandlesSpecialFloatValues(): void
    {
        $parser = new RpcV2CborErrorParser();
        $response = new Response(
            400,
            ['x-amzn-requestid' => 'xyz'],
            $this->encoder->encode([
                '__type' => 'BadRequestException',
                'value1' => INF,
                'value2' => -INF,
                'value3' => NAN,
            ])
        );

        $parsed = $parser($response, null);

        $this->assertSame(INF, $parsed['parsed']['value1']);
        $this->assertSame(-INF, $parsed['parsed']['value2']);
        $this->assertNan($parsed['parsed']['value3']);
    }

    public function testHandlesEmptyCollections(): void
    {
        $parser = new RpcV2CborErrorParser();
        $response = new Response(
            400,
            ['x-amzn-requestid' => 'xyz'],
            $this->encoder->encode([
                '__type' => 'BadRequestException',
                'items' => [],
                'attributes' => [],
            ])
        );

        $parsed = $parser($response, null);

        $expected = [
            '__type' => 'BadRequestException',
            'items' => [],
            'attributes' => [],
        ];
        $this->assertSame($expected, $parsed['parsed']);
    }

    public function testHandlesNestedStructures(): void
    {
        $parser = new RpcV2CborErrorParser();
        $response = new Response(
            400,
            ['x-amzn-requestid' => 'xyz'],
            $this->encoder->encode([
                '__type' => 'ComplexException',
                'outer' => [
                    'inner' => [
                        'value' => 'nested',
                        'count' => 42,
                    ],
                ],
            ])
        );

        $parsed = $parser($response, null);

        $expected = [
            '__type' => 'ComplexException',
            'outer' => [
                'inner' => [
                    'value' => 'nested',
                    'count' => 42,
                ],
            ],
        ];
        $this->assertSame($expected, $parsed['parsed']);
    }

    /**
     * @dataProvider errorCodeFormatsProvider
     */
    public function testExtractsErrorCodeProperly(string $input, ?string $expected): void
    {
        $parser = new RpcV2CborErrorParser();
        $response = new Response(
            400,
            [],
            $this->encoder->encode(['__type' => $input])
        );
        
        $parsed = $parser($response, null);
        $this->assertSame($expected, $parsed['code']);
    }
    
    public function errorCodeFormatsProvider(): array
    {
        return [
            'Simple exception' => ['SimpleException', 'SimpleException'],
            'Exception with trailing #' => ['SimpleException#', null],  // Implementation doesn't strip trailing #
            'Exception with leading #' => ['#SimpleException', 'SimpleException'],
            'Namespaced exception' => ['com.amazon.service#SimpleException', 'SimpleException'],
            'Fully qualified exception' => ['com.amazon.service.model#SimpleException', 'SimpleException'],
            'Multiple # characters' => ['Namespace#Exception#', 'Exception#'],  // Implementation strips first part up to #
        ];
    }

    /**
     * @dataProvider errorTypesProvider
     */
    public function testDeterminesErrorType(
        int $statusCode,
        string $expectedType
    ): void
    {
        $parser = new RpcV2CborErrorParser();
        $response = new Response(
            $statusCode,
            [],
            $this->encoder->encode(['__type' => 'TestError'])
        );
        
        $parsed = $parser($response, null);
        $this->assertSame($expectedType, $parsed['type']);
    }
    
    public function errorTypesProvider(): array
    {
        return [
            'Client error 400' => [400, 'client'],
            'Client error 404' => [404, 'client'],
            'Client error 499' => [499, 'client'],
            'Server error 500' => [500, 'server'],
            'Server error 503' => [503, 'server'],
            'Server error 599' => [599, 'server'],
            'Redirect 301' => [301, 'server'],  // Implementation treats 3xx as server
            'Redirect 302' => [302, 'server'],
        ];
    }
}
