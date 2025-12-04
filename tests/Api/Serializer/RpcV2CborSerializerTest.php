<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Cbor\CborDecoder;
use Aws\Api\Cbor\CborEncoder;
use Aws\Api\Exception\RpcV2CborException;
use Aws\Api\Serializer\RpcV2CborSerializer;
use Aws\Api\Service;
use Aws\Command;
use Aws\EndpointV2\Ruleset\RulesetEndpoint;
use Aws\Exception\AwsException;
use DateTime;
use DateTimeImmutable;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Api\Serializer\RpcV2CborSerializer
 */
class RpcV2CborSerializerTest extends TestCase
{
    private CborEncoder $encoder;
    private CborDecoder $decoder;

    protected function set_up(): void
    {
        $this->encoder = new CborEncoder();
        $this->decoder = new CborDecoder();
    }

    private function getTestService(): Service
    {
        return new Service(
            [
                'metadata' => [
                    'targetPrefix' => 'TestService',
                    'protocol' => 'smithy-rpc-v2-cbor',
                    'serviceIdentifier' => 'testservice',
                ],
                'operations' => [
                    'SimpleOperation' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'SimpleInput'],
                    ],
                    'OperationWithTimestamp' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'TimestampInput'],
                    ],
                    'OperationWithBlob' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'BlobInput'],
                    ],
                    'OperationWithList' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'ListInput'],
                    ],
                    'OperationWithMap' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'MapInput'],
                    ],
                    'OperationWithNestedStructures' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'NestedInput'],
                    ],
                    'OperationWithAllTypes' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'AllTypesInput'],
                    ],
                    'OperationWithSparseList' => [
                        'http' => ['method' => 'POST'],
                        'input' => ['shape' => 'SparseListInput'],
                    ],
                    'NoInputOperation' => [
                        'http' => ['method' => 'POST'],
                    ],
                ],
                'shapes' => [
                    'SimpleInput' => [
                        'type' => 'structure',
                        'members' => [
                            'message' => ['shape' => 'StringShape'],
                            'count' => ['shape' => 'IntegerShape'],
                        ],
                    ],
                    'TimestampInput' => [
                        'type' => 'structure',
                        'members' => [
                            'createdAt' => [
                                'shape' => 'TimestampShape',
                            ],
                        ],
                    ],
                    'BlobInput' => [
                        'type' => 'structure',
                        'members' => [
                            'data' => ['shape' => 'BlobShape'],
                        ],
                    ],
                    'ListInput' => [
                        'type' => 'structure',
                        'members' => [
                            'items' => ['shape' => 'StringListShape'],
                        ],
                    ],
                    'MapInput' => [
                        'type' => 'structure',
                        'members' => [
                            'attributes' => ['shape' => 'StringMapShape'],
                        ],
                    ],
                    'NestedInput' => [
                        'type' => 'structure',
                        'members' => [
                            'nested' => ['shape' => 'NestedStructure'],
                        ],
                    ],
                    'NestedStructure' => [
                        'type' => 'structure',
                        'members' => [
                            'field1' => ['shape' => 'StringShape'],
                            'field2' => ['shape' => 'IntegerShape'],
                            'inner' => ['shape' => 'InnerStructure'],
                        ],
                    ],
                    'InnerStructure' => [
                        'type' => 'structure',
                        'members' => [
                            'value' => ['shape' => 'StringShape'],
                        ],
                    ],
                    'AllTypesInput' => [
                        'type' => 'structure',
                        'members' => [
                            'stringValue' => ['shape' => 'StringShape'],
                            'intValue' => ['shape' => 'IntegerShape'],
                            'longValue' => ['shape' => 'LongShape'],
                            'floatValue' => ['shape' => 'FloatShape'],
                            'doubleValue' => ['shape' => 'DoubleShape'],
                            'boolValue' => ['shape' => 'BooleanShape'],
                            'blobValue' => ['shape' => 'BlobShape'],
                            'timestampValue' => ['shape' => 'TimestampShape'],
                            'listValue' => ['shape' => 'StringListShape'],
                            'mapValue' => ['shape' => 'StringMapShape'],
                        ],
                    ],
                    'SparseListInput' => [
                        'type' => 'structure',
                        'members' => [
                            'sparseList' => ['shape' => 'SparseStringListShape'],
                        ],
                    ],
                    'StringShape' => ['type' => 'string'],
                    'IntegerShape' => ['type' => 'integer'],
                    'LongShape' => ['type' => 'long'],
                    'FloatShape' => ['type' => 'float'],
                    'DoubleShape' => ['type' => 'double'],
                    'BooleanShape' => ['type' => 'boolean'],
                    'BlobShape' => ['type' => 'blob'],
                    'TimestampShape' => ['type' => 'timestamp'],
                    'StringListShape' => [
                        'type' => 'list',
                        'member' => ['shape' => 'StringShape'],
                    ],
                    'SparseStringListShape' => [
                        'type' => 'list',
                        'member' => ['shape' => 'StringShape'],
                        '@sparse' => true,
                    ],
                    'StringMapShape' => [
                        'type' => 'map',
                        'key' => ['shape' => 'StringShape'],
                        'value' => ['shape' => 'StringShape'],
                    ],
                ],
            ],
            function () {
            }
        );
    }

    private function getRequest(
        string $commandName,
        array $input = [])
    : RequestInterface
    {
        $service = $this->getTestService();
        $command = new Command($commandName, $input);
        $serializer = new RpcV2CborSerializer($service, 'http://example.com');
        return $serializer($command);
    }

    public function testSerializesSimpleStructure(): void
    {
        $request = $this->getRequest('SimpleOperation', [
            'message' => 'Hello, World!',
            'count' => 42,
        ]);

        $this->assertSame('POST', $request->getMethod());
        $this->assertSame(
            '/service/TestService/operation/SimpleOperation',
            $request->getUri()->getPath()
        );
        $this->assertSame('application/cbor', $request->getHeaderLine('Content-Type'));
        $this->assertSame('rpc-v2-cbor', $request->getHeaderLine('Smithy-Protocol'));
        
        $body = (string) $request->getBody();
        $decoded = $this->decoder->decode($body);
        
        $expected = [
            'message' => 'Hello, World!',
            'count' => 42,
        ];
        $this->assertSame($expected, $decoded);
    }

    /**
     * @dataProvider timestampProvider
     */
    public function testSerializesTimestamp($input, $expected): void
    {
        $request = $this->getRequest(
            'OperationWithTimestamp',
            ['createdAt' => $input]
        );

        $body = (string) $request->getBody();
        $decoded = $this->decoder->decode($body);

        $this->assertSame(['createdAt' => $expected], $decoded);
    }

    public function timestampProvider(): array
    {
        $dateTime = new DateTime('2024-01-15 10:30:00 UTC');
        $dateTimeImmutable = new DateTimeImmutable('2024-01-15 10:30:00 UTC');
        $dateTimeWithMicro = new DateTime('2024-01-15 10:30:00.123456 UTC');
        $timestamp = strtotime('2024-01-15 10:30:00 UTC');

        return [
            'DateTime' => [
                $dateTime,
                (float) $dateTime->getTimestamp(),
            ],
            'DateTimeImmutable' => [
                $dateTimeImmutable,
                (float) $dateTimeImmutable->getTimestamp(),
            ],
            'DateTime with microseconds' => [
                $dateTimeWithMicro,
                $dateTimeWithMicro->getTimestamp() + 0.123456,
            ],
            'integer timestamp' => [
                $timestamp,
                (float) $timestamp,
            ],
            'float timestamp' => [
                1705315800.5,
                1705315800.5,
            ],
            'numeric string' => [
                '1705315800',
                1705315800.0,
            ],
            'date string' => [
                '2024-01-15 10:30:00 UTC',
                (float) $timestamp,
            ],
        ];
    }

    public function testSerializesTimestampThrowsOnInvalidString(): void
    {
        $this->expectException(RpcV2CborException::class);
        $this->expectExceptionMessage('Invalid date/time');

        $this->getRequest(
            'OperationWithTimestamp',
            ['createdAt' => 'not a valid date']
        );
    }

    public function testSerializesBlob(): void
    {
        $binaryData = 'This is binary data';
        $request = $this->getRequest(
            'OperationWithBlob',
            ['data' => $binaryData,]
        );

        $body = (string) $request->getBody();
        $decoded = $this->decoder->decode($body);
        
        $expected = ['data' => $binaryData];
        $this->assertSame($expected, $decoded);
    }

    public function testSerializesList(): void
    {
        $items = ['item1', 'item2', 'item3'];
        $request = $this->getRequest(
            'OperationWithList',
            ['items' => $items,]);

        $body = (string) $request->getBody();
        $decoded = $this->decoder->decode($body);
        
        $expected = ['items' => $items];
        $this->assertSame($expected, $decoded);
    }

    public function testSerializesMap(): void
    {
        $attributes = [
            'key1' => 'value1',
            'key2' => 'value2',
            'key3' => 'value3',
        ];
        $request = $this->getRequest(
            'OperationWithMap',
            ['attributes' => $attributes,]
        );

        $body = (string) $request->getBody();
        $decoded = $this->decoder->decode($body);
        
        $expected = ['attributes' => $attributes];
        $this->assertSame($expected, $decoded);
    }

    public function testSerializesNestedStructures(): void
    {
        $input = [
            'nested' => [
                'field1' => 'value1',
                'field2' => 123,
                'inner' => [
                    'value' => 'innerValue',
                ],
            ],
        ];
        $request = $this->getRequest('OperationWithNestedStructures', $input);

        $body = (string) $request->getBody();
        $decoded = $this->decoder->decode($body);
        
        $this->assertSame($input, $decoded);
    }

    public function testSerializesAllTypes(): void
    {
        $timestamp = new DateTime('2024-01-15 10:30:00 UTC');
        $input = [
            'stringValue' => 'test string',
            'intValue' => 42,
            'longValue' => 9223372036854775807,
            'floatValue' => 3.14,
            'doubleValue' => 2.71828,
            'boolValue' => true,
            'blobValue' => 'binary data',
            'timestampValue' => $timestamp,
            'listValue' => ['a', 'b', 'c'],
            'mapValue' => ['x' => 'y', 'z' => 'w'],
        ];
        $request = $this->getRequest('OperationWithAllTypes', $input);

        $body = (string) $request->getBody();
        $decoded = $this->decoder->decode($body);
        
        $expected = [
            'stringValue' => 'test string',
            'intValue' => 42,
            'longValue' => 9223372036854775807,
            'floatValue' => 3.14,
            'doubleValue' => 2.71828,
            'boolValue' => true,
            'blobValue' => 'binary data',
            'timestampValue' => (float) $timestamp->getTimestamp(),
            'listValue' => ['a', 'b', 'c'],
            'mapValue' => ['x' => 'y', 'z' => 'w'],
        ];

        $this->assertSame($expected, $decoded);
    }

    public function testSerializesEmptyInput(): void
    {
        $request = $this->getRequest('SimpleOperation', []);

        $body = (string) $request->getBody();
        // Check for CBOR indefinite map (0xBF 0xFF)
        $bytes = unpack('C*', $body);
        $this->assertSame([1 => 0xBF, 2 => 0xFF], $bytes);
    }

    public function testSerializesNoInputOperation(): void
    {
        $request = $this->getRequest('NoInputOperation');

        // No body for operations without input (PSR-7 creates empty stream)
        $body = (string) $request->getBody();
        $this->assertSame('', $body);
        
        // Content-Type should not be set for operations without input
        $this->assertFalse($request->hasHeader('Content-Type'));
    }

    public function testSerializesSparseList(): void
    {
        $sparseList = [1 => 'first', 3 => 'third', 6 => 'sixth'];
        $request = $this->getRequest(
            'OperationWithSparseList',
            ['sparseList' => $sparseList,]
        );

        $body = (string) $request->getBody();
        $decoded = $this->decoder->decode($body);
        
        $expected = ['sparseList' => $sparseList];
        $this->assertSame($expected, $decoded);
    }

    public function testSerializesWithEndpointPath(): void
    {
        $service = $this->getTestService();
        $command = new Command('SimpleOperation', ['message' => 'test']);
        $serializer = new RpcV2CborSerializer($service, 'http://example.com/api/v1');
        $request = $serializer($command);

        $this->assertSame(
            '/api/v1/service/TestService/operation/SimpleOperation',
            $request->getUri()->getPath()
        );
    }

    public function testSerializesWithEndpointV2(): void
    {
        $service = $this->getTestService();
        $command = new Command('SimpleOperation', ['message' => 'test']);
        $serializer = new RpcV2CborSerializer($service, 'http://example.com');
        $endpoint = new RulesetEndpoint('https://custom.example.com/path');
        $request = $serializer($command, $endpoint);

        $this->assertSame(
            '/path/service/TestService/operation/SimpleOperation',
            $request->getUri()->getPath()
        );
    }

    public function testSerializesNullValues(): void
    {
        $request = $this->getRequest(
            'SimpleOperation',
            [
                'message' => null,
                'count' => null,
            ]
        );

        $body = (string) $request->getBody();
        // Null values are excluded from the serialized structure
        // Check for empty CBOR indefinite map (0xBF 0xFF)
        $bytes = unpack('C*', $body);
        $this->assertSame([1 => 0xBF, 2 => 0xFF], $bytes);
    }

    public function testSerializesZeroValues(): void
    {
        $request = $this->getRequest(
            'OperationWithAllTypes',
            [
                'intValue' => 0,
                'floatValue' => 0.0,
                'boolValue' => false,
                'stringValue' => ''
            ]
        );

        $body = (string) $request->getBody();
        $decoded = $this->decoder->decode($body);
        
        $expected = [
            'intValue' => 0,
            'floatValue' => 0.0,
            'boolValue' => false,
            'stringValue' => ''
        ];

        $this->assertSame($expected, $decoded);
    }

    public function testSerializesSpecialFloatValues(): void
    {
        $request = $this->getRequest(
            'OperationWithAllTypes',
            [
                'floatValue' => INF,
                'doubleValue' => -INF
            ]
        );

        $body = (string) $request->getBody();
        $decoded = $this->decoder->decode($body);
        
        $expected = [
            'floatValue' => INF,
            'doubleValue' => -INF,
        ];

        $this->assertSame($expected, $decoded);
    }

    public function testSerializesNegativeIntegers(): void
    {
        $request = $this->getRequest(
            'OperationWithAllTypes',
            [
                'intValue' => -42,
                'longValue' => PHP_INT_MIN
            ]
        );

        $body = (string) $request->getBody();
        $decoded = $this->decoder->decode($body);
        
        $expected = [
            'intValue' => -42,
            'longValue' => PHP_INT_MIN,
        ];

        $this->assertSame($expected, $decoded);
    }

    public function testSerializesEmptyCollections(): void
    {
        $request = $this->getRequest(
            'OperationWithAllTypes',
            [
                'listValue' => [],
                'mapValue' => []
            ]
        );

        $body = (string) $request->getBody();
        $decoded = $this->decoder->decode($body);
        
        $expected = [
            'listValue' => [],
            'mapValue' => [],
        ];

        $this->assertSame($expected, $decoded);
    }

    public function testSetsCborHeaders(): void
    {
        $request = $this->getRequest('SimpleOperation', ['message' => 'test']);

        $this->assertSame('application/cbor', $request->getHeaderLine('Content-Type'));
        $this->assertTrue($request->hasHeader('Smithy-Protocol'));
        $this->assertStringContainsString(
            'rpc-v2-cbor',
            $request->getHeaderLine('Smithy-Protocol')
        );
        $this->assertTrue($request->hasHeader('Content-Length'));
    }
}
