<?php

namespace Aws\Test\Api\Parser;

use Aws\Api\DateTimeResult;
use Aws\Api\Parser\AbstractRestParser;
use Aws\Api\Parser\EventParsingIterator;
use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Parser\RestJsonParser;
use Aws\Api\Parser\RestXmlParser;
use Aws\Api\Service;
use Aws\Api\ShapeMap;
use Aws\Api\StructureShape;
use Aws\Exception\EventStreamDataException;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Api\Parser\EventParsingIterator
 */
class EventParsingIteratorTest extends TestCase
{
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
    public function iteratorDataProvider()
    {
       foreach (self::$eventCases as $eventCase) {
            $shape = $this->loadEventStreamShapeFromJson($eventCase['shape']);
            $restParser = $this->createRestParser($eventCase['protocol']);
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
     *
     * @dataProvider iteratorDataProvider
     */
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
     *
     * @dataProvider iteratorDataProvider
     */
    public function testParsedEventsMatchExpectedType($iterator)
    {
        $reflectedIteratorClass = new \ReflectionClass(get_class($iterator));
        $shapeProperty = $reflectedIteratorClass->getProperty('shape');
        $shapeProperty->setAccessible(true);
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
        $shape = $this->loadEventStreamShapeFromJson(self::EVENT_STREAM_SHAPE);
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
        $shape = $this->loadEventStreamShapeFromJson(self::EVENT_STREAM_SHAPE);
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
        $shape = $this->loadEventStreamShapeFromJson(self::EVENT_STREAM_SHAPE);
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
    private function loadEventStreamShapeFromJson($jsonFilePath)
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
     * @return AbstractRestParser
     */
    private function createRestParser($protocol)
    {
        switch ($protocol) {
            case self::PROTOCOL_XML:
                return new RestXmlParser(new Service([], function () {
                    return [];
                }));
            case self::PROTOCOL_JSON:
                return new RestJsonParser(new Service([], function () {
                    return [];
                }));
            default:
                throw new ParserException('Unknown parser protocol "' . $protocol . '"');
        }
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
            $this->createRestParser(self::PROTOCOL_JSON)
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
        $iterator = new EventParsingIterator($stream, $structureShape, $this->createRestParser(self::PROTOCOL_JSON));

        $this->assertEquals(['initial-response' => []], $iterator->current());
    }

    /**
     * @param array $eventStreams
     * @param string $expectedExceptionMessage
     *
     * @return void
     *
     * @dataProvider handleEventWithExceptionsProvider
     *
     */
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
            $this->createRestParser(self::PROTOCOL_JSON)
        );
        foreach ($iterator as $_) {}
    }

    /**
     * @return array[]
     */
    public function handleEventWithExceptionsProvider(): array {
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
}
