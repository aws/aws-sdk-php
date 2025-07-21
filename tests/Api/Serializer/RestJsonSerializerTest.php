<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Service;
use Aws\Command;
use Aws\Api\Serializer\RestJsonSerializer;
use Aws\Endpoint\PartitionEndpointProvider;
use Aws\EndpointV2\Ruleset\RulesetEndpoint;
use Aws\Exception\InvalidJsonException;
use Aws\Middleware;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Api\Serializer\RestJsonSerializer
 */
class RestJsonSerializerTest extends TestCase
{
    use UsesServiceTrait;

    private function getTestService(): Service
    {
        return new Service(
            [
                'metadata'=> [
                    'targetPrefix' => 'test',
                    'jsonVersion' => '1.1',
                    'protocol' => 'rest-json',
                    'serviceIdentifier' => 'foo'
                ],
                'operations' => [
                    'foo' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'FooInput'],
                    ],
                    'doctype' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'DocTypeInput'],
                    ],
                    'bar' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'BarInput'],
                    ],
                    'baz' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'BazInput']
                    ],
                    'foobar' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'FooBarInput']
                    ],
                    'qux' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'QuxInput']
                    ],
                    'noPayload' => [
                        'http' => ['method' => 'GET'],
                        'input' => ['shape' => 'NoPayloadInput']
                    ],
                    'boolHeader' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'BoolHeaderInput']
                    ],
                    'requestUriOperation' =>[
                        'http' => [
                            'method' => 'POST',
                            'requestUri' => 'foo/{PathSegment}'
                        ],
                        'input' => ['shape' => 'RequestUriOperationInput'],
                    ],
                    'DocumentTypeAsPayload' => [
                        'name' => 'DocumentTypeAsPayload',
                        'http' => [
                            'method' => 'PUT',
                            'requestUri' => '/DocumentTypeAsPayload',
                            'responseCode' => 200
                        ],
                        'input' => [
                            'shape' => 'DocumentTypeAsPayloadInputOutput'
                        ],
                        'output' => [
                            'shape' => 'DocumentTypeAsPayloadInputOutput'
                        ],
                        'idempotent' => true
                    ]
                ],
                'shapes' => [
                    'FooInput' => [
                        'type' => 'structure',
                        'members' => [
                            'baz' => ['shape' => 'BazShape']
                        ]
                    ],
                    'DocTypeInput' => [
                        'type' => 'structure',
                        'members' => [
                            "DocumentValue" => [
                                "shape" => "DocumentType",
                            ]
                        ]
                    ],
                    'DocumentTypeAsPayloadInputOutput' => [
                        'type' => 'structure',
                        'members' => [
                            'documentValue' => [
                                'shape' => 'DocumentType'
                            ]
                        ],
                        'payload' => 'documentValue'
                    ],
                    'RequestUriOperationInput' => [
                        'required' => ['PathSegment'],
                        'type' => 'structure',
                        'members' => [
                            "PathSegment" => [
                                "shape" => "PathSegmentShape",
                                "location" => 'uri'
                            ],
                            'baz' => ['shape' => 'BazShape']
                        ]
                    ],
                    'DocumentType' => [
                        'type' => 'structure',
                        'members' => [],
                        'document' => true,
                    ],
                    'BarInput' => [
                        'type' => 'structure',
                        'members' => [
                            'baz' => ['shape' => 'BlobShape']
                        ],
                        'payload' => 'baz'
                    ],
                    'BazInput' => [
                        'type' => 'structure',
                        'members' => ['baz' => ['shape' => 'FooInput']],
                        'payload' => 'baz'
                    ],
                    'FooBarInput' => [
                        'type' => 'structure',
                        'members' => [
                            'baz' => [
                                'shape' => 'BazShape',
                                'location' => 'header',
                                'locationname' => 'Bar',
                                'jsonvalue' => true
                            ],
                        ]
                    ],
                    'QuxInput' => [
                        'type' => 'structure',
                        'members' => [
                            'bar' => [
                                'shape' => 'BazShape',
                                'location' => 'header',
                                'locationname' => 'Bar',
                                'jsonvalue' => true
                            ],
                            'baz' => ['shape' => 'BazShape']
                        ]
                    ],
                    'NoPayloadInput' => [
                        'type' => 'structure',
                        'members' => [
                            'baz' => [
                                'shape' => 'BazShape',
                                'location' => 'header',
                                'locationname' => 'Bar',
                                'jsonvalue' => true
                            ]
                        ]
                    ],
                    'BoolHeaderInput' => [
                        'type' => 'structure',
                        'members' => [
                            'bool' => [
                                'shape' => 'BoolShape',
                                'location' => 'header',
                                'locationName' => 'Is-Bool',
                            ],
                        ]
                    ],
                    'BlobShape' => ['type' => 'blob'],
                    'BazShape'  => ['type' => 'string'],
                    'BoolShape' => ['type' => 'boolean'],
                    'PathSegmentShape'  => ['type' => 'string'],
                ]
            ],
            function () {}
        );
    }

    private function getRequest(string $commandName, array $input): RequestInterface
    {
        $service = $this->getTestService();
        $command = new Command($commandName, $input);
        $j = new RestJsonSerializer($service, 'http://foo.com');
        return $j($command);
    }

    private function getPathEndpointRequest(
        string $commandName,
        array $input,
        ?array $options = []
    ): RequestInterface
    {
        $service = $this->getTestService();
        $command = new Command($commandName, $input);
        $path = $options['path'] ?? 'bar';
        $j = new RestJsonSerializer($service, 'http://foo.com/' . $path);
        return $j($command);
    }

    public function testPreparesRequestsWithContentType(): void
    {
        $request = $this->getRequest('foo', ['baz' => 'bar']);
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame('{"baz":"bar"}', (string) $request->getBody());
        $this->assertSame(
            'application/json',
            $request->getHeaderLine('Content-Type')
        );
    }

    public function testPreparesRequestsWithEndpointWithPath(): void
    {
        $request = $this->getPathEndpointRequest('foo', ['baz' => 'bar']);
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/bar', (string) $request->getUri());
        $this->assertSame('{"baz":"bar"}', (string) $request->getBody());
        $this->assertSame(
            'application/json',
            $request->getHeaderLine('Content-Type')
        );
    }

    public function testPreparesRequestsWithEndpointWithRequestUriAndPath(): void
    {
        $request = $this->getPathEndpointRequest(
            'requestUriOperation',
            ['PathSegment' => 'bar', 'baz' => 'bar']
        );
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/bar/foo/bar', (string) $request->getUri());
        $this->assertSame('{"baz":"bar"}', (string) $request->getBody());
        $this->assertSame(
            'application/json',
            $request->getHeaderLine('Content-Type')
        );
    }

    public function testPreparesRequestsWithJsonValueTraitString(): void
    {
        $jsonValueArgs = '{"a":"b"}';
        $request = $this->getRequest('foobar', ['baz' => $jsonValueArgs]);
        $this->assertSame('IntcImFcIjpcImJcIn0i', $request->getHeaderLine('baz'));
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame('', $request->getHeaderLine('Content-Type'));
    }

    public function testPreparesRequestsWithJsonValueTraitArray(): void
    {
        $jsonValueArgs = [
            "a" => "b"
        ];
        $request = $this->getRequest('foobar', ['baz' => $jsonValueArgs]);
        $this->assertSame('eyJhIjoiYiJ9', $request->getHeaderLine('baz'));
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame('', $request->getHeaderLine('Content-Type'));
    }

    public function testPreparesRequestsWithJsonValueTraitEmptyString(): void
    {
        $jsonValueArgs = '';
        $request = $this->getRequest('foobar', ['baz' => $jsonValueArgs]);
        $this->assertSame('IiI=', $request->getHeaderLine('baz'));
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame('', $request->getHeaderLine('Content-Type'));
    }

    public function testPreparesRequestsWithJsonValueTraitThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new \stdClass();
        $obj->obj = $obj;
        $this->getRequest('foobar', ['baz' => $obj]);
    }

    public function testPreparesRequestsWithStructPayload(): void
    {
        $request = $this->getRequest('baz', ['baz' => ['baz' => '1234']]);
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame('{"baz":"1234"}', (string) $request->getBody());
        $this->assertSame(
            'application/json',
            $request->getHeaderLine('Content-Type')
        );
    }

    /**
     * @dataProvider doctypeTestProvider
     * @param $input
     * @param $expectedOutput
     */
    public function testHandlesDoctype($input, $expectedOutput): void
    {
        $request = $this->getRequest('doctype', $input);
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame($expectedOutput, $request->getBody()->getContents());
        $this->assertSame(
            'application/json',
            $request->getHeaderLine('Content-Type')
        );
    }


    public function doctypeTestProvider(): iterable
    {
        return [
            [
                ['DocumentValue' =>
                    ['DocumentType' =>
                        [
                            'name' => "John",
                            'age'=> 31,
                            'active'=> true
                        ]
                    ]
                ],
                '{"DocumentValue":{"DocumentType":{"name":"John","age":31,"active":true}}}'
            ],
            [
                ['DocumentValue' =>
                    [
                        'DocumentType' => true
                    ]
                ],
                '{"DocumentValue":{"DocumentType":true}}'
            ],
            [
                ['DocumentValue' =>
                    [
                        'DocumentType' => 2
                    ]
                ],
                '{"DocumentValue":{"DocumentType":2}}'
            ],
        ];
    }


    /**
     * @dataProvider restJsonContentTypeProvider
     * @param string $operation
     * @param array $input
     */
    public function testRestJsonContentTypeNoPayload(
        string $operation,
        array $input
    ): void
    {
        $request = $this->getRequest($operation, $input);
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame("", $request->getBody()->getContents());
        $this->assertSame(
            "",
            $request->getHeaderLine('Content-Type')
        );
        self::assertEmpty($request->getHeader("Content-length"));
    }


    public function restJsonContentTypeProvider(): iterable
    {
        return [
            [
                "noPayload", ['baz' => 'bar'],
            ],
            [
                "noPayload", [],
            ],
        ];
    }

    /**
     * @dataProvider boolProvider
     * @param bool $arg
     * @param string $expected
     */
    public function testSerializesHeaderValueToBoolString(
        bool $arg,
        string $expected
    ): void
    {
        $request = $this->getRequest('boolHeader', ['bool' => $arg]);
        $this->assertSame($expected, $request->getHeaderLine('Is-Bool'));
    }

    public function boolProvider(): iterable
    {
        return [
            [true, 'true'],
            [false, 'false']
        ];
    }

    public function testDoesNotOverrideScheme(): void
    {
        $serializer = new RestJsonSerializer($this->getTestService(), 'http://foo.com');
        $cmd = new Command('foo', ['baz' => 'bar']);
        $endpoint = new RulesetEndpoint('https://foo.com');
        $request = $serializer($cmd, $endpoint);
        $this->assertSame('http://foo.com/', (string) $request->getUri());
    }

    /**
     * @param string|array $input
     * @param string $expectedOutput
     *
     * @return void
     * @dataProvider handlesDocTypeAsPayloadProvider
     */
    public function testHandlesDocTypeAsPayload(
        string|array $input,
        string $expectedOutput
    ): void
    {
        $request = $this->getRequest('DocumentTypeAsPayload', ['documentValue' => $input]);
        $this->assertSame('PUT', $request->getMethod());
        $this->assertSame('http://foo.com/DocumentTypeAsPayload', (string) $request->getUri());
        $this->assertSame($expectedOutput, $request->getBody()->getContents());
        $this->assertSame(
            'application/json',
            $request->getHeaderLine('Content-Type')
        );
    }

    public function handlesDocTypeAsPayloadProvider(): \Generator
    {
        yield 'string payload' => ['hello', '"hello"'];
        yield 'simple string field' => [
            ['message' => 'Hello, world!'],
            '{"message":"Hello, world!"}',
        ];
        yield 'numeric and boolean types' => [
            ['success' => true, 'count' => 3, 'ratio' => 0.75],
            '{"success":true,"count":3,"ratio":0.75}',
        ];
        yield 'null value' => [
            ['result' => null],
            '{"result":null}',
        ];
        yield 'empty object' => [
            [],
            '{}',
        ];
        yield 'empty array' => [
            ['items' => []],
            '{"items":[]}',
        ];
        yield 'nested object' => [
            ['user' => ['id' => 1, 'name' => 'Jane']],
            '{"user":{"id":1,"name":"Jane"}}',
        ];
        yield 'array of objects' => [
            ['records' => [['id' => 1], ['id' => 2]]],
            '{"records":[{"id":1},{"id":2}]}',
        ];
        yield 'deeply nested structure' => [
            ['a' => ['b' => ['c' => ['d' => 123]]]],
            '{"a":{"b":{"c":{"d":123}}}}',
        ];
        yield 'mixed types in array' => [
            ['data' => ['string', 123, true, null]],
            '{"data":["string",123,true,null]}',
        ];
    }

    /**
     * @param array|string $input
     *
     * @return void
     * @dataProvider rejectsInvalidJsonAsPayloadProvider
     */
    public function testRejectsInvalidJsonAsPayload(array|string $input): void
    {
        $this->expectException(InvalidJsonException::class);
        $this->expectExceptionMessage('Unable to encode JSON document');
        $this->getRequest('DocumentTypeAsPayload', ['documentValue' => $input]);
    }

    public function rejectsInvalidJsonAsPayloadProvider(): iterable
    {
        return [
            'malformed byte sequence' => ["\xB1\x31"],
            'invalid continuation byte' => ["\xC3\x28"],
            'overlong encoding' => ["\xE2\x28\xA1"],
            'invalid UTF-8 in nested array' => [
                'users' => [
                    ['name' => "Valid Name"],
                    ['name' => "\xB1\x31"]  // invalid UTF-8
                ]
            ]
        ];
    }

    /**
     * @param string $endpoint
     * @param string $requestUri
     * @param array $pathParams
     * @param array $queryParams
     * @param string $expected
     * @param string $description
     *
     * @return void
     * @dataProvider endpointResolutionProvider
     */
    public function testEndpointResolution(
        string $endpoint,
        string $requestUri,
        array $pathParams,
        array $queryParams,
        string $expected,
        string $description
    ): void
    {
        $service = $this->getEndpointTestService($requestUri);
        $command = new Command('testOperation', array_merge($pathParams, ['query' => $queryParams]));

        $serializer = new RestJsonSerializer($service, $endpoint);
        $request = $serializer($command);

        $this->assertEquals(
            $expected,
            (string) $request->getUri(),
            "Endpoint Resolution - {$description}"
        );
    }

    /**
     * @dataProvider endpointResolutionProvider
     */
    public function testEndpointV2Resolution(
        string $endpoint,
        string $requestUri,
        array $pathParams,
        array $queryParams,
        string $expected,
        string $description
    ): void
    {
        $service = $this->getEndpointTestService($requestUri);
        $command = new Command('testOperation', array_merge($pathParams, ['query' => $queryParams]));

        $serializer = new RestJsonSerializer($service, $endpoint);
        $endpointV2 = new RulesetEndpoint($endpoint);
        $request = $serializer($command, $endpointV2);

        $this->assertEquals(
            $expected,
            (string) $request->getUri(),
            "Endpoint V2 Resolution - {$description}"
        );
    }

    /**
     * @dataProvider geoServiceEndpointResolutionProvider
     */
    public function testGeoServiceEndpointResolution(
        string $endpoint,
        string $requestUri,
        array $pathParams,
        string $expected,
        string $description
    ): void
    {
        $service = $this->getGeoTestService($requestUri);
        $command = new Command('GetPlace', $pathParams);

        $serializer = new RestJsonSerializer($service, $endpoint);
        $request = $serializer($command);

        $this->assertEquals(
            $expected,
            (string) $request->getUri(),
            "Geo Service - {$description}"
        );
    }

    /**
     * @dataProvider geoServiceEndpointResolutionProvider
     */
    public function testGeoServiceEndpointV2Resolution(
        string $endpoint,
        string $requestUri,
        array $pathParams,
        string $expected,
        string $description
    ): void
    {
        $service = $this->getGeoTestService($requestUri);
        $command = new Command('GetPlace', $pathParams);

        $serializer = new RestJsonSerializer($service, $endpoint);
        $endpointV2 = new RulesetEndpoint($endpoint);
        $request = $serializer($command, $endpointV2);

        $this->assertEquals(
            $expected,
            (string) $request->getUri(),
            "Geo Service V2 - {$description}"
        );
    }

    public function endpointResolutionProvider(): \Generator
    {
        // Basic endpoints without path
        yield 'no_base_path_simple_request' => [
            'endpoint' => 'http://foo.com',
            'requestUri' => '/users',
            'pathParams' => [],
            'queryParams' => [],
            'expected' => 'http://foo.com/users',
            'description' => 'No base path + simple request path'
        ];

        yield 'no_base_path_root_request' => [
            'endpoint' => 'http://foo.com',
            'requestUri' => '/',
            'pathParams' => [],
            'queryParams' => [],
            'expected' => 'http://foo.com/',
            'description' => 'No base path + root request'
        ];

        // Endpoints with path (no trailing slash)
        yield 'base_path_no_slash_with_request' => [
            'endpoint' => 'http://foo.com/api',
            'requestUri' => '/users',
            'pathParams' => [],
            'queryParams' => [],
            'expected' => 'http://foo.com/api/users',
            'description' => 'Base path without trailing slash + request path'
        ];

        yield 'base_path_no_slash_root_request' => [
            'endpoint' => 'http://foo.com/api',
            'requestUri' => '/',
            'pathParams' => [],
            'queryParams' => [],
            'expected' => 'http://foo.com/api',
            'description' => 'Base path without trailing slash + root request'
        ];

        // Endpoints with path (trailing slash)
        yield 'base_path_with_slash_with_request' => [
            'endpoint' => 'http://foo.com/api/',
            'requestUri' => '/users',
            'pathParams' => [],
            'queryParams' => [],
            'expected' => 'http://foo.com/api/users',
            'description' => 'Base path with trailing slash + request path'
        ];

        yield 'base_path_with_slash_root_request' => [
            'endpoint' => 'http://foo.com/api/',
            'requestUri' => '/',
            'pathParams' => [],
            'queryParams' => [],
            'expected' => 'http://foo.com/api',
            'description' => 'Base path with trailing slash + root request'
        ];

        // Nested paths
        yield 'nested_path_simple' => [
            'endpoint' => 'http://foo.com/api/v2',
            'requestUri' => '/users',
            'pathParams' => [],
            'queryParams' => [],
            'expected' => 'http://foo.com/api/v2/users',
            'description' => 'Nested base path + request path'
        ];

        yield 'deep_nested_with_params' => [
            'endpoint' => 'http://foo.com/api/v2/service',
            'requestUri' => '/users/{id}',
            'pathParams' => ['id' => '123'],
            'queryParams' => [],
            'expected' => 'http://foo.com/api/v2/service/users/123',
            'description' => 'Deep nested path + parameterized request'
        ];

        // Query string handling
        yield 'query_params_via_opts' => [
            'endpoint' => 'http://foo.com',
            'requestUri' => '/users',
            'pathParams' => [],
            'queryParams' => ['active' => 'true', 'limit' => '10'],
            'expected' => 'http://foo.com/users?active=true&limit=10',
            'description' => 'Query parameters via opts'
        ];

        yield 'query_in_request_uri' => [
            'endpoint' => 'http://foo.com/api',
            'requestUri' => '/?location',
            'pathParams' => [],
            'queryParams' => [],
            'expected' => 'http://foo.com/api?location',
            'description' => 'Query in requestUri with base path'
        ];

        yield 'query_in_both_places' => [
            'endpoint' => 'http://foo.com/api',
            'requestUri' => '/users?type=admin',
            'pathParams' => [],
            'queryParams' => ['active' => 'true'],
            'expected' => 'http://foo.com/api/users?type=admin&active=true',
            'description' => 'Query in both requestUri and opts'
        ];

        // Path parameters
        yield 'multiple_path_params' => [
            'endpoint' => 'http://foo.com',
            'requestUri' => '/users/{userId}/posts/{postId}',
            'pathParams' => ['userId' => '456', 'postId' => '789'],
            'queryParams' => [],
            'expected' => 'http://foo.com/users/456/posts/789',
            'description' => 'Multiple path parameters'
        ];

        yield 'path_params_with_base' => [
            'endpoint' => 'http://foo.com/api',
            'requestUri' => '/{resource}/{id}',
            'pathParams' => ['resource' => 'users', 'id' => '123'],
            'queryParams' => [],
            'expected' => 'http://foo.com/api/users/123',
            'description' => 'Path parameters with base path'
        ];

        // Edge cases
        yield 'empty_request_uri' => [
            'endpoint' => 'http://foo.com/api',
            'requestUri' => '',
            'pathParams' => [],
            'queryParams' => [],
            'expected' => 'http://foo.com/api',
            'description' => 'Empty requestUri'
        ];

        yield 'empty_request_uri_trailing_slash' => [
            'endpoint' => 'http://foo.com/',
            'requestUri' => '',
            'pathParams' => [],
            'queryParams' => [],
            'expected' => 'http://foo.com/',
            'description' => 'Trailing slash endpoint with empty requestUri'
        ];

        // API Gateway patterns
        yield 'api_gateway_websocket' => [
            'endpoint' => 'https://api.example.com/prod',
            'requestUri' => '/@connections/{connectionId}',
            'pathParams' => ['connectionId' => 'abc123'],
            'queryParams' => [],
            'expected' => 'https://api.example.com/prod/@connections/abc123',
            'description' => 'API Gateway WebSocket endpoint'
        ];

        yield 'api_gateway_with_stage' => [
            'endpoint' => 'https://api.example.com/stage/',
            'requestUri' => '/resource',
            'pathParams' => [],
            'queryParams' => [],
            'expected' => 'https://api.example.com/stage/resource',
            'description' => 'API Gateway with stage'
        ];

        // URL encoding
        yield 'encoded_path_params' => [
            'endpoint' => 'http://foo.com',
            'requestUri' => '/users/{id}',
            'pathParams' => ['id' => 'user@example.com'],
            'queryParams' => [],
            'expected' => 'http://foo.com/users/user%40example.com',
            'description' => 'URL encoding in path parameters'
        ];

        yield 'encoded_query_params' => [
            'endpoint' => 'http://foo.com',
            'requestUri' => '/search',
            'pathParams' => [],
            'queryParams' => ['q' => 'hello world', 'filter' => 'a&b'],
            'expected' => 'http://foo.com/search?q=hello%20world&filter=a%26b',
            'description' => 'URL encoding in query parameters'
        ];

        // Greedy path parameters
        yield 'greedy_path_param' => [
            'endpoint' => 'http://foo.com',
            'requestUri' => '/files/{path+}',
            'pathParams' => ['path' => 'folder/subfolder/file.txt'],
            'queryParams' => [],
            'expected' => 'http://foo.com/files/folder/subfolder/file.txt',
            'description' => 'Greedy path parameter preserves slashes'
        ];
    }

    public function geoServiceEndpointResolutionProvider(): \Generator
    {
        yield 'geo_places_v2' => [
            'endpoint' => 'https://places.geo.region.amazonaws.com/v2',
            'requestUri' => '/place/{PlaceId}',
            'pathParams' => ['PlaceId' => 'test-place-id'],
            'expected' => 'https://places.geo.region.amazonaws.com/v2/place/test-place-id',
            'description' => 'Geo service with /v2 path'
        ];

        yield 'geo_places_v2_trailing_slash' => [
            'endpoint' => 'https://places.geo.region.amazonaws.com/v2/',
            'requestUri' => '/place/{PlaceId}',
            'pathParams' => ['PlaceId' => 'test-place-id'],
            'expected' => 'https://places.geo.region.amazonaws.com/v2/place/test-place-id',
            'description' => 'Geo service with /v2/ trailing slash'
        ];

        yield 'geo_routes_list' => [
            'endpoint' => 'https://routes.geo.region.amazonaws.com/v2',
            'requestUri' => '/routes',
            'pathParams' => [],
            'expected' => 'https://routes.geo.region.amazonaws.com/v2/routes',
            'description' => 'Geo routes service list operation'
        ];

        yield 'geo_maps_tiles' => [
            'endpoint' => 'https://maps.geo.us-east-1.amazonaws.com/v2',
            'requestUri' => '/maps/{MapName}/tiles/{Z}/{X}/{Y}',
            'pathParams' => ['MapName' => 'test-map', 'Z' => '10', 'X' => '512', 'Y' => '256'],
            'expected' => 'https://maps.geo.us-east-1.amazonaws.com/v2/maps/test-map/tiles/10/512/256',
            'description' => 'Geo maps with multiple path params'
        ];

        yield 'geo_with_query_params' => [
            'endpoint' => 'https://places.geo.region.amazonaws.com/v2',
            'requestUri' => '/search',
            'pathParams' => ['ApiKey' => 'test-key', 'Language' => 'en'],
            'expected' => 'https://places.geo.region.amazonaws.com/v2/search?key=test-key&lang=en',
            'description' => 'Geo service with query parameters via location'
        ];
    }

    /**
     * @dataProvider geoServiceE2EProvider
     */
    public function testGeoServiceEndpointResolutionE2E(
        string $service,
        string $region,
        string $operation,
        array $params,
        string $expected,
        string $description
    ): void {
        // uses EndpointV2 provider - default
        $client = $this->getTestClient($service, [
            'region' => $region,
            'credentials' => [
                'key' => 'foo',
                'secret' => 'bar'
            ]
        ]);

        $this->addMockResults($client, [new Result([])]);

        $client->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) use ($expected, $description) {
                $this->assertEquals(
                    $expected,
                    (string) $req->getUri(),
                    "E2E Geo Service - {$description}"
                );
            })
        );

        $client->{$operation}($params);
    }

    public function geoServiceE2EProvider(): \Generator
    {
        yield 'geo_places_simple' => [
            'service' => 'geo-places',
            'region' => 'us-east-1',
            'operation' => 'getPlace',
            'params' => ['PlaceId' => 'test-place-123'],
            'expected' => 'https://places.geo.us-east-1.amazonaws.com/v2/place/test-place-123',
            'description' => 'Geo Places with /v2 path'
        ];

        yield 'geo_places_different_region' => [
            'service' => 'geo-places',
            'region' => 'eu-west-1',
            'operation' => 'getPlace',
            'params' => ['PlaceId' => 'place-abc-456'],
            'expected' => 'https://places.geo.eu-west-1.amazonaws.com/v2/place/place-abc-456',
            'description' => 'Geo Places in EU region'
        ];

        yield 'geo_places_special_chars' => [
            'service' => 'geo-places',
            'region' => 'us-east-1',
            'operation' => 'getPlace',
            'params' => ['PlaceId' => 'place@test.com'],
            'expected' => 'https://places.geo.us-east-1.amazonaws.com/v2/place/place%40test.com',
            'description' => 'Geo Places with URL encoding'
        ];

        yield 'geo_routes_calculate' => [
            'service' => 'geo-routes',
            'region' => 'us-west-2',
            'operation' => 'calculateRoutes',
            'params' => [
                'Origin' => [-122.4194, 37.7749],
                'Destination' => [-118.2437, 34.0522],
            ],
            'expected' => 'https://routes.geo.us-west-2.amazonaws.com/v2/routes',
            'description' => 'Geo Routes calculate endpoint'
        ];

        yield 'geo_maps_get_tile' => [
            'service' => 'geo-maps',
            'region' => 'ap-southeast-1',
            'operation' => 'getTile',
            'params' => [
                'Tileset' => 'test-tileset',
                'Z' => '10',
                'X' => '512',
                'Y' => '256'
            ],
            'expected' => 'https://maps.geo.ap-southeast-1.amazonaws.com/v2/tiles/test-tileset/10/512/256',
            'description' => 'Geo Maps with multiple path parameters'
        ];
    }

    private function getEndpointTestService(string $requestUri): Service
    {
        return new Service(
            [
                'metadata' => [
                    'protocol' => 'rest-json',
                    'serviceIdentifier' => 'test'
                ],
                'operations' => [
                    'testOperation' => [
                        'http' => [
                            'method' => 'GET',
                            'requestUri' => $requestUri
                        ],
                        'input' => ['shape' => 'TestInput']
                    ]
                ],
                'shapes' => [
                    'TestInput' => [
                        'type' => 'structure',
                        'members' => [
                            'userId' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'userId'
                            ],
                            'postId' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'postId'
                            ],
                            'resource' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'resource'
                            ],
                            'id' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'id'
                            ],
                            'connectionId' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'connectionId'
                            ],
                            'path' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'path'
                            ],
                            'query' => [
                                'shape' => 'QueryMap',
                                'location' => 'querystring'
                            ]
                        ]
                    ],
                    'String' => ['type' => 'string'],
                    'QueryMap' => [
                        'type' => 'map',
                        'key' => ['shape' => 'String'],
                        'value' => ['shape' => 'String']
                    ]
                ]
            ],
            function () {}
        );
    }

    private function getGeoTestService(string $requestUri): Service
    {
        return new Service(
            [
                'metadata' => [
                    'protocol' => 'rest-json',
                    'serviceIdentifier' => 'geo-places'
                ],
                'operations' => [
                    'GetPlace' => [
                        'http' => [
                            'method' => 'GET',
                            'requestUri' => $requestUri
                        ],
                        'input' => ['shape' => 'GetPlaceInput']
                    ]
                ],
                'shapes' => [
                    'GetPlaceInput' => [
                        'type' => 'structure',
                        'members' => [
                            'PlaceId' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'PlaceId'
                            ],
                            'MapName' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'MapName'
                            ],
                            'X' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'X'
                            ],
                            'Y' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'Y'
                            ],
                            'Z' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'Z'
                            ],
                            'ResourceId' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'ResourceId'
                            ],
                            'ApiKey' => [
                                'shape' => 'String',
                                'location' => 'querystring',
                                'locationName' => 'key'
                            ],
                            'Language' => [
                                'shape' => 'String',
                                'location' => 'querystring',
                                'locationName' => 'lang'
                            ],
                        ]
                    ],
                    'String' => ['type' => 'string']
                ]
            ],
            function () {
            }
        );
    }
}
