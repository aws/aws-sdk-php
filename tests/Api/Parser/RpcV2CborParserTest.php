<?php
namespace Aws\Test\Api\Parser;

use Aws\Api\Cbor\CborEncoder;
use Aws\Api\DateTimeResult;
use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Parser\RpcV2CborParser;
use Aws\Api\Service;
use Aws\CommandInterface;
use DateTimeImmutable;
use GuzzleHttp\Psr7\Response;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Api\Parser\RpcV2CborParser
 */
class RpcV2CborParserTest extends TestCase
{
    private CborEncoder $encoder;

    protected function set_up(): void
    {
        $this->encoder = new CborEncoder();
    }

    private function getTestService(): Service
    {
        return new Service(
            [
                'metadata' => [
                    'protocol' => 'smithy-rpc-v2-cbor',
                    'serviceIdentifier' => 'testservice',
                ],
                'operations' => [
                    'SimpleOperation' => [
                        'http' => ['method' => 'POST'],
                        'output' => ['shape' => 'SimpleOutput'],
                    ],
                    'OperationWithTimestamp' => [
                        'http' => ['method' => 'POST'],
                        'output' => ['shape' => 'TimestampOutput'],
                    ],
                    'OperationWithBlob' => [
                        'http' => ['method' => 'POST'],
                        'output' => ['shape' => 'BlobOutput'],
                    ],
                    'OperationWithList' => [
                        'http' => ['method' => 'POST'],
                        'output' => ['shape' => 'ListOutput'],
                    ],
                    'OperationWithMap' => [
                        'http' => ['method' => 'POST'],
                        'output' => ['shape' => 'MapOutput'],
                    ],
                    'OperationWithNestedStructures' => [
                        'http' => ['method' => 'POST'],
                        'output' => ['shape' => 'NestedOutput'],
                    ],
                    'OperationWithHeaders' => [
                        'http' => ['method' => 'POST'],
                        'output' => ['shape' => 'HeadersOutput'],
                    ],
                    'OperationWithAllTypes' => [
                        'http' => ['method' => 'POST'],
                        'output' => ['shape' => 'AllTypesOutput'],
                    ],
                    'OperationWithSparseList' => [
                        'http' => ['method' => 'POST'],
                        'output' => ['shape' => 'SparseListOutput'],
                    ],
                    'NoOutputOperation' => [
                        'http' => ['method' => 'POST'],
                    ],
                ],
                'shapes' => [
                    'SimpleOutput' => [
                        'type' => 'structure',
                        'members' => [
                            'message' => ['shape' => 'StringShape'],
                            'count' => ['shape' => 'IntegerShape'],
                        ],
                    ],
                    'TimestampOutput' => [
                        'type' => 'structure',
                        'members' => [
                            'createdAt' => ['shape' => 'TimestampShape'],
                        ],
                    ],
                    'BlobOutput' => [
                        'type' => 'structure',
                        'members' => [
                            'data' => ['shape' => 'BlobShape'],
                        ],
                    ],
                    'ListOutput' => [
                        'type' => 'structure',
                        'members' => [
                            'items' => ['shape' => 'StringListShape'],
                        ],
                    ],
                    'MapOutput' => [
                        'type' => 'structure',
                        'members' => [
                            'attributes' => ['shape' => 'StringMapShape'],
                        ],
                    ],
                    'NestedOutput' => [
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
                    'HeadersOutput' => [
                        'type' => 'structure',
                        'members' => [
                            'bodyField' => ['shape' => 'StringShape'],
                            'headerField' => [
                                'shape' => 'StringShape',
                                'location' => 'header',
                                'locationName' => 'X-Custom-Header',
                            ],
                            'statusCode' => [
                                'shape' => 'IntegerShape',
                                'location' => 'statusCode',
                            ],
                        ],
                    ],
                    'AllTypesOutput' => [
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
                    'SparseListOutput' => [
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

    private function createCommand(string $name): CommandInterface
    {
        $command = $this->getMockBuilder(CommandInterface::class)->getMock();
        $command->method('getName')->willReturn($name);

        return $command;
    }

    public function testParsesSimpleStructure(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $body = $this->encoder->encode([
            'message' => 'Hello, World!',
            'count' => 42,
        ]);
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('SimpleOperation');
        $result = $parser($command, $response);
        
        $this->assertSame('Hello, World!', $result['message']);
        $this->assertSame(42, $result['count']);
    }

    public function testParsesTimestamp(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $timestamp = 1705315800; // 2024-01-15 10:30:00 UTC
        $body = $this->encoder->encode(['createdAt' => $timestamp]);
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithTimestamp');
        $result = $parser($command, $response);
        
        $this->assertInstanceOf(DateTimeResult::class, $result['createdAt']);
        $this->assertSame($timestamp, $result['createdAt']->getTimestamp());
    }

    public function testParsesBlob(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $binaryData = 'This is binary data';
        $body = $this->encoder->encode([
            'data' => ['__cbor_bytes' => $binaryData],
        ]);
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithBlob');
        $result = $parser($command, $response);
        
        // The decoder returns byte strings as plain strings
        $this->assertSame($binaryData, $result['data']);
    }

    public function testParsesList(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $items = ['item1', 'item2', 'item3'];
        $body = $this->encoder->encode([
            'items' => $items,
        ]);
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithList');
        $result = $parser($command, $response);
        
        $this->assertIsArray($result['items']);
        $this->assertSame($items, $result['items']);
    }

    public function testParsesMap(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $attributes = [
            'key1' => 'value1',
            'key2' => 'value2',
            'key3' => 'value3',
        ];
        $body = $this->encoder->encode([
            'attributes' => $attributes,
        ]);
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithMap');
        $result = $parser($command, $response);
        
        $this->assertIsArray($result['attributes']);
        $this->assertSame($attributes, $result['attributes']);
    }

    public function testParsesNestedStructures(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $nested = [
            'nested' => [
                'field1' => 'value1',
                'field2' => 123,
                'inner' => [
                    'value' => 'innerValue'
                ]
            ],
        ];
        $body = $this->encoder->encode($nested);
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithNestedStructures');
        $result = $parser($command, $response);
        
        $this->assertArrayHasKey('nested', $result);
        $this->assertSame('value1', $result['nested']['field1']);
        $this->assertSame(123, $result['nested']['field2']);
        $this->assertArrayHasKey('inner', $result['nested']);
        $this->assertSame('innerValue', $result['nested']['inner']['value']);
    }

    public function testParsesAllTypes(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $timestamp = new DateTimeImmutable('2024-01-15 10:30:00 UTC');
        $data = [
            'stringValue' => 'test string',
            'intValue' => 42,
            'longValue' => 9223372036854775807,
            'floatValue' => 3.14,
            'doubleValue' => 2.71828,
            'boolValue' => true,
            'blobValue' => ['__cbor_bytes' => 'binary data'], // Encode as byte string
            'timestampValue' => $timestamp->getTimestamp(),
            'listValue' => ['a', 'b', 'c'],
            'mapValue' => ['x' => 'y', 'z' => 'w'],
        ];
        $body = $this->encoder->encode($data);
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithAllTypes');
        $result = $parser($command, $response);
        
        $this->assertSame('test string', $result['stringValue']);
        $this->assertSame(42, $result['intValue']);
        $this->assertSame(9223372036854775807, $result['longValue']);
        $this->assertSame(3.14, $result['floatValue']);
        $this->assertSame(2.71828, $result['doubleValue']);
        $this->assertTrue($result['boolValue']);
        $this->assertSame('binary data', $result['blobValue']); // Decoder returns raw string
        $this->assertInstanceOf(DateTimeResult::class, $result['timestampValue']);
        $this->assertSame(
            $timestamp->getTimestamp(),
            $result['timestampValue']->getTimestamp()
        );
        $this->assertSame(['a', 'b', 'c'], $result['listValue']);
        $this->assertSame(['x' => 'y', 'z' => 'w'], $result['mapValue']);
    }

    public function testParsesEmptyResponse(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $body = $this->encoder->encode([]);
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('SimpleOperation');
        $result = $parser($command, $response);
        
        $this->assertCount(0, $result);
    }

    public function testParsesNoOutputOperation(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        
        $response = new Response(204, ['Smithy-Protocol' => 'rpc-v2-cbor'], '');
        $command = $this->createCommand('NoOutputOperation');
        $result = $parser($command, $response);
        
        $this->assertCount(0, $result);
    }

    public function testParsesSparseList(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $sparseList = [null, 'first', null, 'third', null, null, 'sixth'];
        $body = $this->encoder->encode([
            'sparseList' => $sparseList,
        ]);
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithSparseList');
        $result = $parser($command, $response);
        
        $this->assertSame($sparseList, $result['sparseList']);
    }

    public function testParsesNullValues(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $body = $this->encoder->encode(
            [
                'message' => null,
                'count' => null
            ]
        );
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('SimpleOperation');
        $result = $parser($command, $response);
        
        // Null values are filtered out by isset() in RpcV2ParserTrait
        $this->assertArrayNotHasKey('message', $result);
        $this->assertArrayNotHasKey('count', $result);
    }

    public function testParsesZeroValues(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $body = $this->encoder->encode(
            [
                'intValue' => 0,
                'floatValue' => 0.0,
                'boolValue' => false,
                'stringValue' => ''
            ]
        );
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithAllTypes');
        $result = $parser($command, $response);
        
        $this->assertSame(0, $result['intValue']);
        $this->assertSame(0.0, $result['floatValue']);
        $this->assertFalse($result['boolValue']);
        $this->assertSame('', $result['stringValue']);
    }

    public function testParsesSpecialFloatValues(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $body = $this->encoder->encode(
            [
                'floatValue' => INF,
                'doubleValue' => -INF
            ]
        );
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithAllTypes');
        $result = $parser($command, $response);
        
        $this->assertSame(INF, $result['floatValue']);
        $this->assertSame(-INF, $result['doubleValue']);
    }

    public function testParsesNaNValue(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $body = $this->encoder->encode(
            ['floatValue' => NAN]
        );
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithAllTypes');
        $result = $parser($command, $response);
        
        $this->assertNan($result['floatValue']);
    }

    public function testParsesNegativeIntegers(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $body = $this->encoder->encode(
            [
                'intValue' => -42,
                'longValue' => -9223372036854775808
            ]
        );
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithAllTypes');
        $result = $parser($command, $response);
        
        $this->assertSame(-42, $result['intValue']);
        $this->assertSame(-9223372036854775808, $result['longValue']);
    }

    public function testParsesEmptyCollections(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $body = $this->encoder->encode([
            'listValue' => [],
            'mapValue' => [],
        ]);
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithAllTypes');
        $result = $parser($command, $response);
        
        $this->assertSame([], $result['listValue']);
        $this->assertSame([], $result['mapValue']);
    }

    public function testParsesMalformedCbor(): void
    {
        $this->expectException(ParserException::class);
        $this->expectExceptionMessage('Malformed Response');
        
        $parser = new RpcV2CborParser($this->getTestService());
        $malformedCbor = "\xFF\xFF\xFF"; // Invalid CBOR
        
        $response = new Response(
            200,
            ['Smithy-Protocol' => 'rpc-v2-cbor'],
            $malformedCbor
        );
        $command = $this->createCommand('SimpleOperation');
        $parser($command, $response);
    }

    public function testParsesLargeIntegers(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $body = $this->encoder->encode([
            'longValue' => PHP_INT_MAX,
        ]);
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithAllTypes');
        $result = $parser($command, $response);
        
        $this->assertSame(PHP_INT_MAX, $result['longValue']);
    }

    public function testParsesBinaryDataWithNullBytes(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $binaryData = "Binary\x00data\x00with\x00nulls";
        
        // Encode as CBOR byte string
        $body = $this->encoder->encode([
            'data' => ['__cbor_bytes' => $binaryData],
        ]);
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('OperationWithBlob');
        $result = $parser($command, $response);
        
        $this->assertSame($binaryData, $result['data']);
    }

    public function testParsesUtf8Strings(): void
    {
        $parser = new RpcV2CborParser($this->getTestService());
        $utf8String = 'Hello 世界 🚀 こんにちは';
        $body = $this->encoder->encode([
            'message' => $utf8String,
        ]);
        
        $response = new Response(200, ['Smithy-Protocol' => 'rpc-v2-cbor'], $body);
        $command = $this->createCommand('SimpleOperation');
        $result = $parser($command, $response);
        
        $this->assertSame($utf8String, $result['message']);
    }

    /**
     * @dataProvider protocolHeaderProvider
     */
    public function testProtocolHeaderValidation(
        array $headers,
        int $statusCode,
        string $operationName,
        bool $expectException,
        ?string $expectedMessage
    ): void 
    {
        if ($expectException) {
            $this->expectException(ParserException::class);
            $this->expectExceptionMessage($expectedMessage);
        }

        $parser = new RpcV2CborParser($this->getTestService());
        
        // Create appropriate body based on operation
        $body = '';
        if ($operationName === 'SimpleOperation') {
            $body = $this->encoder->encode(
                ['message' => 'test', 'count' => 1]
            );
        }
        
        $response = new Response($statusCode, $headers, $body);
        $command = $this->createCommand($operationName);
        $result = $parser($command, $response);
        
        if (!$expectException) {
            if ($operationName === 'SimpleOperation' && $statusCode === 200) {
                $this->assertSame('test', $result['message']);
                $this->assertSame(1, $result['count']);
            } else {
                $this->assertCount(0, $result);
            }
        }
    }

    /**
     * Data provider for protocol header mismatch test cases
     */
    public function protocolHeaderProvider(): array
    {
        return [
            'missing_header' => [
                'headers' => [],
                'statusCode' => 200,
                'operationName' => 'SimpleOperation',
                'expectException' => true,
                'expectedMessage' => 'Malformed response: Smithy-Protocol header mismatch (HTTP 200). Expected rpc-v2-cbor'
            ],
            'incorrect_header_value' => [
                'headers' => ['Smithy-Protocol' => 'rpc-v2-json'],
                'statusCode' => 200,
                'operationName' => 'SimpleOperation',
                'expectException' => true,
                'expectedMessage' => 'Malformed response: Smithy-Protocol header mismatch (HTTP 200). Expected rpc-v2-cbor'
            ],
            'correct_header' => [
                'headers' => ['Smithy-Protocol' => 'rpc-v2-cbor'],
                'statusCode' => 200,
                'operationName' => 'SimpleOperation',
                'expectException' => false,
                'expectedMessage' => null
            ],
            'missing_header_no_output' => [
                'headers' => [],
                'statusCode' => 204,
                'operationName' => 'NoOutputOperation',
                'expectException' => true,
                'expectedMessage' => 'Malformed response: Smithy-Protocol header mismatch (HTTP 204). Expected rpc-v2-cbor'
            ],
            'case_insensitive_header' => [
                'headers' => ['smithy-protocol' => 'rpc-v2-cbor'],
                'statusCode' => 200,
                'operationName' => 'SimpleOperation',
                'expectException' => false,
                'expectedMessage' => null
            ],
        ];
    }
}
