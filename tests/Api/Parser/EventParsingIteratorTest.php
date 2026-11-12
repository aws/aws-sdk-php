<?php

namespace Aws\Test\Api\Parser;

use Aws\Api\Cbor\CborEncoder;
use Aws\Api\DateTimeResult;
use Aws\Api\Parser\AbstractParser;
use Aws\Api\Parser\AbstractRestParser;
use Aws\Api\Parser\EventParsingIterator;
use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Parser\RestJsonParser;
use Aws\Api\Parser\RestXmlParser;
use Aws\Api\Parser\RpcV2CborParser;
use Aws\Api\Service;
use Aws\Api\ShapeMap;
use Aws\Api\StructureShape;
use Aws\Exception\EventStreamDataException;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(EventParsingIterator::class)]
class EventParsingIteratorTest extends TestCase
{
    use EventStreamMessageTrait;

    const PROTOCOL_XML = 'XML';
    const PROTOCOL_JSON = 'JSON';
    const EVENT_STREAM_SHAPE =  __DIR__ . '/../eventstream_fixtures/eventstream_shape.json';

    /** @var array */
    private static $eventCases = [
        [
            'shape' => self::EVENT_STREAM_SHAPE,
            'protocol' => self::PROTOCOL_XML,
            'eventNames' => [
                'end_event',
                'headers_event',
                'records_event',
                'stats_event',
            ]
        ],
        [
            'shape' => __DIR__ . '/../eventstream_fixtures/lambda_invoke_shape.json',
            'protocol' => self::PROTOCOL_JSON,
            'eventNames' => [
                'lambda_invoke_event'
            ]
        ],
        [
            'shape' => __DIR__ . '/../eventstream_fixtures/bedrock_invoke_model_shape.json',
            'protocol' => self::PROTOCOL_JSON,
            'eventNames' => [
                'bedrock_invoke_model_event'
            ]
        ],
        [
            'shape' => __DIR__ . '/../eventstream_fixtures/headers_payload_shape.json',
            'protocol' => self::PROTOCOL_JSON,
            'eventNames' => [
                'headers_payload_event'
            ]
        ]
    ];


    /**
     * This method is used to generate the event parsing iterator and the expected output
     * for a provided input from a test case.
     *
     * @return \Generator
     */
    public static function iteratorDataProvider(): \Generator
    {
       foreach (self::$eventCases as $eventCase) {
            $shape = self::loadEventStreamShapeFromJson($eventCase['shape']);
            $restParser = self::createRestParser($eventCase['protocol']);
            foreach ($eventCase['eventNames'] as $eventName) {
                $input = base64_decode(file_get_contents(
                    __DIR__ . '/../eventstream_fixtures/input/' . $eventName
                ));
                $output = json_decode(
                    file_get_contents(
                        __DIR__ . '/../eventstream_fixtures/output/' . $eventName . '.json'
                    ),
                    true
                );
                $iterator = new EventParsingIterator(Psr7\Utils::streamFor($input), $shape, $restParser);

                yield $eventName => [$iterator, $output];
            }
        }
    }

    /**
     * This test checks for whether the parsed event matches the expected output.
     * When the parsed message is an array with just one element in it then, we evaluate
     * this unique element against the expected output, otherwise we evaluate the whole array
     * against the expected output. The reason for this is to test parsing either single or multiple
     * events.
     */
    #[DataProvider('iteratorDataProvider')]
    public function testParsedEventsMatchExpectedOutput($iterator, $expectedOutput)
    {
        $parsedMessage = [];
        foreach ($iterator as $event) {
            $parsedMessage[] = $event;
        }

        if (count($parsedMessage) == 1) {
            $this->assertEquals($expectedOutput, $parsedMessage[0]);
        } else {
            $this->assertEquals($expectedOutput, $parsedMessage);
        }
    }

    /**
     * This method tests for whether the deserialized event members match the equivalent
     * shape member types.
     */
    #[DataProvider('iteratorDataProvider')]
    public function testParsedEventsMatchExpectedType($iterator)
    {
        $reflectedIteratorClass = new \ReflectionClass(get_class($iterator));
        $shapeProperty = $reflectedIteratorClass->getProperty('shape');
        $shape = $shapeProperty->getValue($iterator);
        foreach ($iterator as $event) {
            $this->parsedEventMatchesExpectedType($shape, $event);
        }
    }

    /**
     * This method is a helper of testParsedEventsMatchExpectedOutput for testing for whether
     * the deserialized event members match the equivalent shape member types.
     *
     * @param $shape
     * @param $event
     *
     * @return void
     */
    private function parsedEventMatchesExpectedType($shape, $event)
    {
        foreach ($event as $key => $value) {
            $this->assertTrue($shape->hasMember($key), "Shape has not member with name $key");
            $shapeMember = $shape->getMember($key);
            $this->assertTrue(
                $this->shapeTypeMatchesValue($shapeMember->getType(), $value),
                'Shape type "'. $shapeMember->getType(). '" does not match parsed value type "' . gettype($value) . '"'
            );
            if (is_array($value)) {
                $this->parsedEventMatchesExpectedType($shapeMember, $value);
            }
        }
    }

    /**
     * This method checks for whether the type for the provided value matches the equivalent
     * to the shape type as native type.
     *
     * @param string $shapeType
     * @param mixed $value
     *
     * @return bool true if matches type otherwise false.
     */
    private function shapeTypeMatchesValue($shapeType, $value)
    {
        switch ($shapeType) {
            case 'boolean':
                return is_bool($value);
            case 'blob':
                return $value instanceof StreamInterface || is_string($value);
            case 'byte':
            case 'integer':
            case 'long':
            case 'float':
                return is_numeric($value);
            case 'string':
                return is_string($value);
            case 'structure':
            case 'map':
            case 'list':
                return is_array($value) || is_object($value);
            case 'timestamp':
                return $value instanceof DateTimeResult || empty($value);
        }

        return false;
    }

    /**
     * This test checks for if an exception is thrown when an error is returned as an event.
     * In such case the header ':message-type' should be set to 'error'
     */
    public function testThrowsOnErrorEvent()
    {
        $stream = Psr7\Utils::streamFor(
            base64_decode(file_get_contents(
                __DIR__ . '/../eventstream_fixtures/input/error_event'
            ))
        );
        $shape = self::loadEventStreamShapeFromJson(self::EVENT_STREAM_SHAPE);
        $iterator = new EventParsingIterator(
            $stream,
            $shape,
            new RestXmlParser(
                new Service([], function () { return []; })
            )
        );

        try {
            $this->assertSame(0, $iterator->key());
            $iterator->current();
            $this->fail('Got event when error expected from stream.');
        } catch (EventStreamDataException $e) {
            $this->assertSame('Event Error', $e->getAwsErrorMessage());
            $this->assertSame('FooError', $e->getAwsErrorCode());
        } catch (\Exception $e) {
            $this->fail('Got other exception when error expected from stream.');
        }
    }

    /**
     * This test checks for if an exception is thrown when the header ':message-type'
     * is not set or has an unknown type.
     */
    public function testThrowsOnUnknownMessageType()
    {
        $this->expectExceptionMessage("Failed to parse unknown message type.");
        $this->expectException(\Aws\Api\Parser\Exception\ParserException::class);
        $shape = self::loadEventStreamShapeFromJson(self::EVENT_STREAM_SHAPE);
        $stream = Psr7\Utils::streamFor(
            base64_decode(file_get_contents(
                __DIR__ . '/../eventstream_fixtures/input/unknown_message_type'
            ))
        );
        $iterator = new EventParsingIterator(
            $stream,
            $shape,
            new RestXmlParser(
                new Service([], function () { return []; })
            )
        );

        $iterator->current();
    }

    /**
     * This test checks for if an exception is thrown when the header ':event-type'
     * is not set or has an unknown type.
     */
    public function testThrowsOnUnknownEventType()
    {
        $this->expectExceptionMessage("Failed to parse without event type.");
        $this->expectException(\Aws\Api\Parser\Exception\ParserException::class);
        $shape = self::loadEventStreamShapeFromJson(self::EVENT_STREAM_SHAPE);
        $stream = Psr7\Utils::streamFor(
            base64_decode(file_get_contents(
                __DIR__ . '/../eventstream_fixtures/input/unknown_event_type'
            ))
        );
        $iterator = new EventParsingIterator(
            $stream,
            $shape,
            new RestXmlParser(
                new Service([], function () {
                    return [];
                })
            )
        );

        $iterator->current();
    }

    /**
     * This method loads a shape defined in JSON format, from a specified path.
     *
     * @param string $jsonFilePath
     *
     * @return StructureShape
     */
    private static function loadEventStreamShapeFromJson($jsonFilePath): StructureShape
    {
       $shape = json_decode(
            file_get_contents($jsonFilePath),
            true
        );

        return new StructureShape(
            $shape,
            new ShapeMap(['EventStream' => $shape])
        );
    }

    /**
     * This method creates an instance of a RestParser class based on the protocol provided.
     *
     * @param $protocol
     *
     * @return AbstractRestParser
     */
    private static function createRestParser($protocol): AbstractRestParser
    {
        return match ($protocol) {
            self::PROTOCOL_XML => new RestXmlParser(new Service([], function () {
                return [];
            })),
            self::PROTOCOL_JSON => new RestJsonParser(new Service([], function () {
                return [];
            })),
            default => throw new ParserException('Unknown parser protocol "' . $protocol . '"'),
        };
    }

    public function testCanHandleNonSeekableStream()
    {
        $encodedEvents = <<<EOF
AAAAhQAAAExjTu0wDTptZXNzYWdlLXR5cGUHAAVldmVudAs6ZXZlbnQtdHlwZQcABnBlcnNvbg06Y29udGVudC10eXBlBwAQYXBwbGljYXRpb24vanNvbnsibmFtZSI6ImZvbyIsImxhc3ROYW1lIjo
iZnV6eiIsImFnZSI6Mjh9+hfixw==
EOF;
        $noSeekableStream = new Psr7\NoSeekStream(
            Psr7\Utils::streamFor(base64_decode($encodedEvents))
        );
        $structureShape = new StructureShape([
            'type' => 'structure',
            'members' => [
                'person' => [
                    'type' => 'structure',
                    'members' => [
                        'name' => [
                            'type' => 'string'
                        ],
                        'lastName' => [
                            'type' => 'string'
                        ],
                        'age' => [
                            'type' => 'integer'
                        ],
                        'DOB' => [
                            'type' => 'timestamp'
                        ]
                    ]
                ]
            ]
        ], new ShapeMap([]));
        $eventParsingIterator = new EventParsingIterator(
            $noSeekableStream,
            $structureShape,
            self::createRestParser(self::PROTOCOL_JSON)
        );
        $expected = [
            'person' => [
                'name' => 'foo',
                'lastName' => 'fuzz',
                'age' => 28
            ]
        ];
        $eventParsingIterator->rewind();

        $this->assertEquals($expected, $eventParsingIterator->current());
    }

    public function testHandleInitialResponse()
    {
        $event = <<<EOF
AAAAaAAAAFZOaBckDTptZXNzYWdlLXR5cGUHAAVldmVudAs6ZXZlbnQtdHlwZQcAEGluaXRpYWwtcmVzcG9uc2UNOmNvbnRlbnQtdHlwZQcAEGFwcGxpY2F0aW9uL2pzb25bXVB+KHc=
EOF;
        $stream = Psr7\Utils::streamFor(base64_decode($event));
        $structureShape = new StructureShape([], new ShapeMap([]));
        $iterator = new EventParsingIterator($stream, $structureShape, self::createRestParser(self::PROTOCOL_JSON));

        $this->assertEquals(['initial-response' => []], $iterator->current());
    }

    #[DataProvider('handleEventWithExceptionsProvider')]
    public function testHandleEventWithExceptions(
        array $eventStreams,
        string $expectedExceptionMessage,
    ) {
        $this->expectException(EventStreamDataException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $stream = Psr7\Utils::streamFor(base64_decode(join("\n", $eventStreams)));
        $structureShape = new StructureShape([
            'type' => 'structure',
            'members' => [
                'message' => [
                    'type' => 'structure',
                    'members' => [
                        'foo' => [
                            'type' => 'string'
                        ]
                    ]
                ]
            ]
        ], new ShapeMap([]));
        $iterator = new EventParsingIterator(
            $stream,
            $structureShape,
            self::createRestParser(self::PROTOCOL_JSON)
        );
        foreach ($iterator as $_) {}
    }

    /**
     * @return array[]
     */
    public static function handleEventWithExceptionsProvider(): array
    {
        return [
            'handle_event_with_exceptions_1' => [
                'event_streams' =>
                    [<<<EOF
AAAAogAAAFuTfJvjDzpleGNlcHRpb24tdHlwZQcADXRlc3RFeGNlcHRpb24NOmNvbnRlbnQtdHlwZQcAEGFwcGxpY2F0aW9uL2pzb24NOm1lc3NhZ2UtdHlwZQcACWV4Y2VwdGlvbnsibWVzc2FnZSI6IlRoZXJlIGlzIGFuIGlzc3VlIHByb2Nlc3NpbmcgdGhpcyByZXF1ZXN0In1r/iVF
EOF],
                'expected_exception_message' => 'There is an issue processing this request',
            ],
            'handle_event_with_exceptions_2' => [
                'event_streams' =>
                    [<<<EOF
AAAAfgAAAE0rrbzqDTpjb250ZW50LXR5cGUHABBhcHBsaWNhdGlvbi9qc29uDTptZXNzYWdlLXR5cGUHAAVldmVudAs6ZXZlbnQtdHlwZQcAB21lc3NhZ2VbeyJtZXNzYWdlIjp7ImZvbyI6IkZvbyBWYWx1ZSJ9fV0IT4Zv
EOF, <<<EOF
AAAAlAAAAFwjeUNmDzpleGNlcHRpb24tdHlwZQcADnRlc3RFeGNlcHRpb24yDTpjb250ZW50LXR5cGUHABBhcHBsaWNhdGlvbi9qc29uDTptZXNzYWdlLXR5cGUHAAlleGNlcHRpb257Im1lc3NhZ2UiOiJJbnZhbGlkIHJlcXVlc3QgZXhjZXB0aW9uISJ9UqcL8g==
EOF],
                'expected_exception_message' => 'Invalid request exception!',
            ]
        ];
    }

    #[DataProvider('stringPayloadParserProvider')]
    public function testStringEventPayloadIsText(AbstractParser $parser): void
    {
        $shape = new StructureShape([
            'type' => 'structure',
            'eventstream' => true,
            'members' => [
                'textEvent' => [
                    'type' => 'structure',
                    'event' => true,
                    'members' => [
                        'text' => ['type' => 'string', 'eventpayload' => true],
                    ],
                ],
            ],
        ], new ShapeMap([]));
        $message = self::stringHeaderMessage(
            [':message-type' => 'event', ':event-type' => 'textEvent', ':content-type' => 'text/plain'],
            'hello, world'
        );
        $iterator = new EventParsingIterator(Psr7\Utils::streamFor($message), $shape, $parser);

        $this->assertSame(['textEvent' => ['text' => 'hello, world']], $iterator->current());
    }

    public static function stringPayloadParserProvider(): array
    {
        return [
            'json' => [self::createRestParser(self::PROTOCOL_JSON)],
            'cbor' => [new RpcV2CborParser(new Service([], function () {
                return [];
            }))],
        ];
    }

    #[DataProvider('seekableProvider')]
    public function testCborImplicitPayloadIsDecodedAgainstEventShape(bool $seekable): void
    {
        $encoder = new CborEncoder();
        $payload = $encoder->encode([
            'strings' => ['a', 'b'],
            'counts' => ['x' => 1, 'y' => 2],
            'nested' => ['name' => 'inner', 'values' => ['v']],
            'time' => ['__cbor_timestamp' => 1609502096.5],
            'data' => ['__cbor_bytes' => "\x00\x01binary"],
            'flag' => true,
            'count' => 3,
        ]);
        $events = $this->collectCborEvents($seekable, [self::cborEvent('valuesEvent', $payload)]);

        $this->assertCount(1, $events);
        $values = $events[0]['valuesEvent'];
        $this->assertSame(['a', 'b'], $values['strings']);
        $this->assertSame(['x' => 1, 'y' => 2], $values['counts']);
        $this->assertSame(['name' => 'inner', 'values' => ['v']], $values['nested']);
        $this->assertInstanceOf(DateTimeResult::class, $values['time']);
        $this->assertSame('1609502096.500000', $values['time']->format('U.u'));
        $this->assertSame("\x00\x01binary", $values['data']);
        $this->assertTrue($values['flag']);
        $this->assertSame(3, $values['count']);
    }

    public function testCborStructureAndUnionEventPayload(): void
    {
        $encoder = new CborEncoder();
        $events = $this->collectCborEvents(true, [
            self::cborEvent('structPayloadEvent', $encoder->encode(['name' => 'n', 'values' => ['a']])),
            self::cborEvent(
                'unionPayloadEvent',
                $encoder->encode(['__type' => 'smithy.example#Choice', 'stringValue' => 's'])
            ),
        ]);

        $this->assertSame([
            ['structPayloadEvent' => ['payload' => ['name' => 'n', 'values' => ['a']]]],
            ['unionPayloadEvent' => ['payload' => ['stringValue' => 's']]],
        ], $events);
    }

    #[DataProvider('cborInitialResponseProvider')]
    public function testCborInitialResponseIsDecodedAgainstOutputShape(
        bool $seekable,
        string $payload,
        array $expected
    ): void {
        $events = $this->collectCborEvents($seekable, [self::cborEvent('initial-response', $payload)]);

        $this->assertCount(1, $events);
        $initial = $events[0]['initial-response'];
        if (isset($expected['startedAt'])) {
            $this->assertInstanceOf(DateTimeResult::class, $initial['startedAt']);
            $this->assertSame($expected['startedAt'], $initial['startedAt']->format('U'));
            unset($initial['startedAt'], $expected['startedAt']);
        }
        $this->assertSame($expected, $initial);
    }

    public static function cborInitialResponseProvider(): \Generator
    {
        $encoder = new CborEncoder();
        $members = $encoder->encode([
            'sessionId' => 'session-1',
            'timeout' => 30,
            'startedAt' => ['__cbor_timestamp' => 1609502096.0],
            'unmodeled' => 'dropped',
        ]);
        $withStream = $encoder->encode(['sessionId' => 'session-1', 'stream' => ['x' => 1]]);
        foreach ([[true, 'seekable'], [false, 'non-seekable']] as [$seekable, $label]) {
            yield "members, $label" => [
                $seekable,
                $members,
                ['sessionId' => 'session-1', 'timeout' => 30, 'startedAt' => '1609502096'],
            ];
            yield "empty map, $label" => [$seekable, $encoder->encodeEmptyMap(), []];
            yield "empty payload, $label" => [$seekable, '', []];
            yield "stream member in the payload, $label" => [$seekable, $withStream, ['sessionId' => 'session-1']];
        }
    }

    #[DataProvider('modeledExceptionProvider')]
    public function testCborModeledExceptionCarriesMessageAndMembers(
        string $exceptionType,
        string $messageMember
    ): void {
        $encoder = new CborEncoder();
        $payload = $encoder->encode([$messageMember => 'the request failed', 'code' => 57]);

        try {
            $this->collectCborEvents(true, [self::cborException($exceptionType, $payload)]);
            $this->fail('An exception event must throw.');
        } catch (EventStreamDataException $e) {
            $this->assertSame($exceptionType, $e->getAwsErrorCode());
            $this->assertSame('the request failed', $e->getAwsErrorMessage());
            $this->assertSame('the request failed', $e->getMessage());
            $this->assertTrue($e->hasKey('code'));
            $this->assertSame(57, $e->get('code'));
            $this->assertSame('the request failed', $e->get($messageMember));
        }
    }

    public static function modeledExceptionProvider(): array
    {
        return [
            'message member' => ['modeledError', 'message'],
            'Message member' => ['capitalMessageError', 'Message'],
        ];
    }

    public function testCborUnknownExceptionTypeKeepsCode(): void
    {
        $encoder = new CborEncoder();
        $payload = $encoder->encode(['message' => 'not modeled']);

        try {
            $this->collectCborEvents(true, [self::cborException('otherError', $payload)]);
            $this->fail('An exception event must throw.');
        } catch (EventStreamDataException $e) {
            $this->assertSame('otherError', $e->getAwsErrorCode());
            $this->assertSame('', $e->getAwsErrorMessage());
            $this->assertFalse($e->hasKey('message'));
            $this->assertNull($e->get('message'));
        }
    }

    #[DataProvider('seekableProvider')]
    public function testReadInitialResponseLeavesOtherFirstMessage(bool $seekable): void
    {
        $encoder = new CborEncoder();
        $iterator = self::createCborIterator($seekable, implode('', [
            self::cborEvent('structPayloadEvent', $encoder->encode(['name' => 'first'])),
            self::cborException('modeledError', $encoder->encode(['message' => 'after the event'])),
        ]));

        $this->assertSame([], $iterator->readInitialResponse());

        $events = [];
        try {
            foreach ($iterator as $event) {
                $events[] = $event;
            }
            $this->fail('The exception event must throw.');
        } catch (EventStreamDataException $e) {
            $this->assertSame('after the event', $e->getAwsErrorMessage());
        }
        $this->assertSame([['structPayloadEvent' => ['payload' => ['name' => 'first']]]], $events);
    }

    public static function seekableProvider(): array
    {
        return ['seekable' => [true], 'non-seekable' => [false]];
    }

    /**
     * A service with an rpcv2Cbor operation that has an output event stream.
     *
     * @return Service
     */
    private static function cborService(): Service
    {
        return new Service([
            'metadata' => ['protocol' => 'smithy-rpc-v2-cbor', 'targetPrefix' => 'StreamService'],
            'operations' => [
                'StreamOperation' => [
                    'http' => ['method' => 'POST', 'requestUri' => '/'],
                    'output' => ['shape' => 'StreamOutput'],
                ],
            ],
            'shapes' => [
                'StreamOutput' => [
                    'type' => 'structure',
                    'members' => [
                        'sessionId' => ['shape' => 'String'],
                        'timeout' => ['shape' => 'Integer'],
                        'startedAt' => ['shape' => 'Timestamp'],
                        'stream' => ['shape' => 'EventStream'],
                    ],
                ],
                'EventStream' => [
                    'type' => 'structure',
                    'eventstream' => true,
                    'members' => [
                        'valuesEvent' => ['shape' => 'ValuesEvent'],
                        'structPayloadEvent' => ['shape' => 'StructPayloadEvent'],
                        'unionPayloadEvent' => ['shape' => 'UnionPayloadEvent'],
                        'modeledError' => ['shape' => 'ModeledError'],
                        'capitalMessageError' => ['shape' => 'CapitalMessageError'],
                    ],
                ],
                'ValuesEvent' => [
                    'type' => 'structure',
                    'event' => true,
                    'members' => [
                        'strings' => ['shape' => 'StringList'],
                        'counts' => ['shape' => 'IntegerMap'],
                        'nested' => ['shape' => 'Nested'],
                        'time' => ['shape' => 'Timestamp'],
                        'data' => ['shape' => 'Blob'],
                        'flag' => ['shape' => 'Boolean'],
                        'count' => ['shape' => 'Integer'],
                    ],
                ],
                'StructPayloadEvent' => [
                    'type' => 'structure',
                    'event' => true,
                    'members' => ['payload' => ['shape' => 'Nested', 'eventpayload' => true]],
                ],
                'UnionPayloadEvent' => [
                    'type' => 'structure',
                    'event' => true,
                    'members' => ['payload' => ['shape' => 'Choice', 'eventpayload' => true]],
                ],
                'ModeledError' => [
                    'type' => 'structure',
                    'exception' => true,
                    'members' => [
                        'message' => ['shape' => 'String'],
                        'code' => ['shape' => 'Integer'],
                    ],
                ],
                'CapitalMessageError' => [
                    'type' => 'structure',
                    'exception' => true,
                    'members' => [
                        'Message' => ['shape' => 'String'],
                        'code' => ['shape' => 'Integer'],
                    ],
                ],
                'Nested' => [
                    'type' => 'structure',
                    'members' => [
                        'name' => ['shape' => 'String'],
                        'values' => ['shape' => 'StringList'],
                    ],
                ],
                'Choice' => [
                    'type' => 'structure',
                    'union' => true,
                    'members' => [
                        'stringValue' => ['shape' => 'String'],
                        'intValue' => ['shape' => 'Integer'],
                    ],
                ],
                'StringList' => ['type' => 'list', 'member' => ['shape' => 'String']],
                'IntegerMap' => ['type' => 'map', 'key' => ['shape' => 'String'], 'value' => ['shape' => 'Integer']],
                'String' => ['type' => 'string'],
                'Integer' => ['type' => 'integer'],
                'Boolean' => ['type' => 'boolean'],
                'Blob' => ['type' => 'blob'],
                'Timestamp' => ['type' => 'timestamp'],
            ],
        ], function () {
            return [];
        });
    }

    /**
     * Creates a shape-aware iterator over the given messages and collects its items.
     *
     * @param bool $seekable
     * @param string[] $messages
     *
     * @return array
     */
    private function collectCborEvents(bool $seekable, array $messages): array
    {
        $iterator = self::createCborIterator($seekable, implode('', $messages));
        $events = [];
        foreach ($iterator as $event) {
            $events[] = $event;
        }

        return $events;
    }

    private static function createCborIterator(bool $seekable, string $bytes): EventParsingIterator
    {
        $service = self::cborService();
        $output = $service->getOperation('StreamOperation')->getOutput();
        $stream = Psr7\Utils::streamFor($bytes);

        return new EventParsingIterator(
            $seekable ? $stream : new Psr7\NoSeekStream($stream),
            $output->getMember('stream'),
            new RpcV2CborParser($service),
            $output
        );
    }

    private static function cborEvent(string $eventType, string $payload): string
    {
        return self::stringHeaderMessage(
            [':message-type' => 'event', ':event-type' => $eventType, ':content-type' => 'application/cbor'],
            $payload
        );
    }

    private static function cborException(string $exceptionType, string $payload): string
    {
        return self::stringHeaderMessage(
            [
                ':message-type' => 'exception',
                ':exception-type' => $exceptionType,
                ':content-type' => 'application/cbor',
            ],
            $payload
        );
    }
}
