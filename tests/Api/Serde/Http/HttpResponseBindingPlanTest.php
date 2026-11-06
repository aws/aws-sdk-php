<?php

namespace Aws\Test\Api\Serde\Http;

use Aws\Api\DateTimeResult;
use Aws\Api\Parser\AbstractRestParser;
use Aws\Api\Parser\DecodingEventStreamIterator;
use Aws\Api\Parser\EventParsingIterator;
use Aws\Api\Parser\RestJsonParser;
use Aws\Api\Parser\RestXmlParser;
use Aws\Api\Serde\Http\HttpResponseBindingPlan as Plan;
use Aws\Api\Serde\Http\HttpResponseBindingPlanProvider;
use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Command;
use GuzzleHttp\Psr7\FnStream;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;

/**
 * Response binding plans: packed layout, lifecycle, and representative REST
 * response behavior. Expected results match the request-plan branch oracle.
 */
class HttpResponseBindingPlanTest extends TestCase
{
    public function testCompilesExactPackedPlanLayoutWithoutDiagnostics(): void
    {
        $output = [
            'type' => 'structure',
            'members' => [
                'Body' => ['type' => 'string'],
                'Header' => ['type' => 'string', 'location' => 'header'],
                'Float' => ['type' => 'double', 'location' => 'header'],
                'Integer' => ['type' => 'long', 'location' => 'header'],
                'Boolean' => ['type' => 'boolean', 'location' => 'header'],
                'Blob' => ['type' => 'blob', 'location' => 'header'],
                'Timestamp' => [
                    'type' => 'timestamp',
                    'location' => 'header',
                    'timestampFormat' => 'unixTimestamp',
                ],
                'Json' => [
                    'type' => 'string',
                    'location' => 'header',
                    'locationName' => 'x-json',
                    'jsonvalue' => true,
                ],
                'BooleanList' => [
                    'type' => 'list',
                    'location' => 'header',
                    'member' => ['type' => 'boolean'],
                ],
                'StringList' => [
                    'type' => 'list',
                    'location' => 'header',
                    'member' => ['type' => 'string'],
                ],
                'ColdList' => [
                    'type' => 'list',
                    'location' => 'header',
                    'member' => [],
                ],
                'ColdMetadata' => [
                    'type' => 'map',
                    'location' => 'headers',
                    'locationName' => [],
                    'key' => ['type' => 'string'],
                    'value' => ['type' => 'string'],
                ],
                'Metadata' => [
                    'type' => 'map',
                    'location' => 'headers',
                    'locationName' => 'x-meta-',
                    'key' => ['type' => 'string'],
                    'value' => ['type' => 'string'],
                ],
                'AllHeaders' => [
                    'type' => 'map',
                    'location' => 'headers',
                    'key' => ['type' => 'string'],
                    'value' => ['type' => 'string'],
                ],
                'Status' => ['type' => 'integer', 'location' => 'statusCode'],
            ],
        ];
        $operation = $this->service('rest-json', $output)->getOperation('Op');

        $plan = $this->withoutWarnings(
            fn() => (new HttpResponseBindingPlanProvider())->get($operation)
        );
        $coldHeaderShape = $operation->getOutput()->getMember('ColdList');
        $coldPrefixShape = $operation->getOutput()->getMember('ColdMetadata');
        $expected = [
            [Plan::HEADER, 'Header', 'Header', Plan::CONVERT_NONE, null],
            [Plan::HEADER, 'Float', 'Float', Plan::CONVERT_FLOAT, null],
            [Plan::HEADER, 'Integer', 'Integer', Plan::CONVERT_INT, null],
            [Plan::HEADER, 'Boolean', 'Boolean', Plan::CONVERT_BOOLEAN, null],
            [Plan::HEADER, 'Blob', 'Blob', Plan::CONVERT_BLOB, null],
            [
                Plan::HEADER,
                'Timestamp',
                'Timestamp',
                Plan::CONVERT_TIMESTAMP,
                'unixTimestamp',
            ],
            [Plan::HEADER, 'Json', 'x-json', Plan::CONVERT_JSONVALUE, null],
            [
                Plan::HEADER,
                'BooleanList',
                'BooleanList',
                Plan::CONVERT_BOOLEAN_LIST,
                null,
            ],
            [
                Plan::HEADER,
                'StringList',
                'StringList',
                Plan::CONVERT_NONE,
                null,
            ],
            [Plan::HEADER_SHAPE, 'ColdList', $coldHeaderShape],
            [Plan::PREFIX_HEADERS_SHAPE, 'ColdMetadata', $coldPrefixShape],
            [Plan::PREFIX_HEADERS, 'Metadata', 'x-meta-', 7],
            [Plan::PREFIX_HEADERS, 'AllHeaders', null, 0],
            [Plan::STATUS_CODE, 'Status'],
        ];

        $this->assertSame($operation->getOutput(), $plan->output);
        $this->assertTrue($plan->hasMembers);
        $this->assertSame(Plan::PAYLOAD_IMPLICIT, $plan->payloadKind);
        $this->assertSame($expected, $plan->bindings);

        foreach ($plan->bindings as $binding) {
            $this->assertTrue(array_is_list($binding));
            $tag = $binding[Plan::B_TAG];
            $this->assertCount([
                Plan::HEADER => 5,
                Plan::PREFIX_HEADERS => 4,
                Plan::STATUS_CODE => 2,
                Plan::HEADER_SHAPE => 3,
                Plan::PREFIX_HEADERS_SHAPE => 3,
            ][$tag], $binding);

            foreach ($binding as $value) {
                $shapeIndex = match ($tag) {
                    Plan::HEADER_SHAPE => Plan::H_SHAPE,
                    Plan::PREFIX_HEADERS_SHAPE => Plan::P_SHAPE,
                    default => null,
                };
                if ($shapeIndex !== null && $value === $binding[$shapeIndex]) {
                    $this->assertInstanceOf(Shape::class, $value);
                } else {
                    $this->assertNotInstanceOf(Shape::class, $value);
                }
            }
        }
    }

    public function testReusesCacheAndKeepsRequestAndResponseSlotsIndependent(): void
    {
        $output = [
            'type' => 'structure',
            'members' => [
                'ResponseHeader' => [
                    'type' => 'string',
                    'location' => 'header',
                    'locationName' => 'X-Response',
                ],
            ],
        ];
        $operation = $this->service('rest-json', $output)->getOperation('Op');
        $responseProvider = new HttpResponseBindingPlanProvider();
        $requestPlan = new \stdClass();
        $operation->cacheSerdePlan(
            ShapePlanCache::HTTP_REQUEST_BINDINGS,
            $requestPlan
        );
        $responsePlan = $responseProvider->get($operation);

        $this->assertSame($responsePlan, $responseProvider->get($operation));
        $this->assertSame(
            $requestPlan,
            $operation->getSerdePlan(ShapePlanCache::HTTP_REQUEST_BINDINGS)
        );
        $this->assertSame(
            $responsePlan,
            $operation->getSerdePlan(ShapePlanCache::HTTP_RESPONSE_BINDINGS)
        );
        $this->assertNotSame($requestPlan, $responsePlan);

        $operation->getOutput()->getMember('ResponseHeader')['locationName'] =
            'X-Changed';
        $rebuiltResponse = $responseProvider->get($operation);

        $this->assertNotSame($responsePlan, $rebuiltResponse);
        $this->assertSame('X-Changed', $rebuiltResponse->bindings[0][Plan::H_WIRE]);
        $this->assertNull(
            $operation->getSerdePlan(ShapePlanCache::HTTP_REQUEST_BINDINGS)
        );

        $rebuiltRequest = new \stdClass();
        $operation->cacheSerdePlan(
            ShapePlanCache::HTTP_REQUEST_BINDINGS,
            $rebuiltRequest
        );

        $this->assertNotSame($requestPlan, $rebuiltRequest);
        $this->assertSame(
            $rebuiltRequest,
            $operation->getSerdePlan(ShapePlanCache::HTTP_REQUEST_BINDINGS)
        );
        $this->assertSame($rebuiltResponse, $responseProvider->get($operation));
        $this->assertSame(
            $rebuiltResponse,
            $operation->getSerdePlan(ShapePlanCache::HTTP_RESPONSE_BINDINGS)
        );
    }

    #[DataProvider('restProtocolProvider')]
    public function testExactHeaderConversionsAndOmission(string $protocol): void
    {
        $output = [
            'type' => 'structure',
            'members' => [
                'String' => ['type' => 'string', 'location' => 'header'],
                'Float' => ['type' => 'float', 'location' => 'header'],
                'Infinity' => ['type' => 'double', 'location' => 'header'],
                'Integer' => ['type' => 'integer', 'location' => 'header'],
                'Boolean' => ['type' => 'boolean', 'location' => 'header'],
                'Blob' => ['type' => 'blob', 'location' => 'header'],
                'Timestamp' => [
                    'type' => 'timestamp',
                    'location' => 'header',
                    'timestampFormat' => 'unixTimestamp',
                ],
                'Json' => [
                    'type' => 'string',
                    'location' => 'header',
                    'jsonvalue' => true,
                ],
                'BooleanList' => [
                    'type' => 'list',
                    'location' => 'header',
                    'member' => ['type' => 'boolean'],
                ],
                'StringList' => [
                    'type' => 'list',
                    'location' => 'header',
                    'member' => ['type' => 'string'],
                ],
                'Absent' => ['type' => 'string', 'location' => 'header'],
                'Empty' => ['type' => 'string', 'location' => 'header'],
                'BadTimestamp' => ['type' => 'timestamp', 'location' => 'header'],
                'BadJson' => [
                    'type' => 'string',
                    'location' => 'header',
                    'jsonvalue' => true,
                ],
                'NullJson' => [
                    'type' => 'string',
                    'location' => 'header',
                    'jsonvalue' => true,
                ],
            ],
        ];
        $response = new Response(200, [
            'String' => 'value',
            'Float' => '-12.5',
            'Infinity' => 'Infinity',
            'Integer' => '-42',
            'Boolean' => 'yes',
            'Blob' => base64_encode("blob\0value"),
            'Timestamp' => '1700000000.25',
            'Json' => base64_encode('{"nested":true}'),
            'BooleanList' => 'true, FALSE, 1, off',
            'StringList' => 'one, two',
            'Empty' => '',
            'BadTimestamp' => 'not-a-timestamp',
            'BadJson' => base64_encode('{'),
            'NullJson' => base64_encode('null'),
        ]);
        $result = $this->parse($protocol, $output, $response)->toArray();

        $this->assertEquals([
            'String' => 'value',
            'Float' => -12.5,
            'Infinity' => 'Infinity',
            'Integer' => -42,
            'Boolean' => true,
            'Blob' => "blob\0value",
            'Timestamp' => DateTimeResult::fromTimestamp(
                '1700000000.25',
                'unixTimestamp'
            ),
            'Json' => ['nested' => true],
            'BooleanList' => [true, false, true, false],
            'StringList' => 'one, two',
        ], $result);
    }

    #[DataProvider('bodyProvider')]
    public function testPrefixStatusAndBodyResultsPreserveModeledOrder(
        string $protocol,
        string $body
    ): void
    {
        $output = [
            'type' => 'structure',
            'members' => [
                'Header' => [
                    'type' => 'string',
                    'location' => 'header',
                    'locationName' => 'X-Header',
                ],
                'Metadata' => [
                    'type' => 'map',
                    'location' => 'headers',
                    'locationName' => 'x-meta-',
                    'key' => ['type' => 'string'],
                    'value' => ['type' => 'string'],
                ],
                'Status' => ['type' => 'integer', 'location' => 'statusCode'],
                'Body' => ['type' => 'string'],
                'Missing' => ['type' => 'string', 'location' => 'header'],
                'NoMatches' => [
                    'type' => 'map',
                    'location' => 'headers',
                    'locationName' => 'x-none-',
                    'key' => ['type' => 'string'],
                    'value' => ['type' => 'string'],
                ],
            ],
        ];
        $result = $this->parse($protocol, $output, new Response(206, [
            'X-Header' => 'header',
            'X-MeTa-One' => ['a', 'b'],
            'Unmodeled' => 'ignored',
        ], $body))->toArray();

        $this->assertSame([
            'Body' => 'body',
            'Header' => 'header',
            'Metadata' => ['One' => 'a, b'],
            'Status' => 206,
            'NoMatches' => [],
        ], $result);
        $this->assertSame(
            ['Body', 'Header', 'Metadata', 'Status', 'NoMatches'],
            array_keys($result)
        );
    }

    #[DataProvider('payloadBodyProvider')]
    public function testParsesImplicitAndStructuredPayloads(
        string $protocol,
        string $implicitBody,
        string $structuredBody
    ): void
    {
        $implicit = [
            'type' => 'structure',
            'members' => ['Value' => ['type' => 'string']],
        ];
        $structured = [
            'type' => 'structure',
            'payload' => 'Body',
            'members' => [
                'Body' => [
                    'type' => 'structure',
                    'members' => ['Value' => ['type' => 'string']],
                ],
            ],
        ];

        $this->assertSame(
            ['Value' => 'implicit'],
            $this->parse(
                $protocol,
                $implicit,
                new Response(200, [], $implicitBody)
            )->toArray()
        );
        $this->assertSame(
            ['Body' => ['Value' => 'structured']],
            $this->parse(
                $protocol,
                $structured,
                new Response(200, [], $structuredBody)
            )->toArray()
        );
    }

    #[DataProvider('unionBodyProvider')]
    public function testRawAndUnionPayloadRoutes(
        string $protocol,
        string $unionBody
    ): void
    {
        $rawOutput = [
            'type' => 'structure',
            'payload' => 'Body',
            'members' => ['Body' => ['type' => 'blob']],
        ];
        $rawBody = Utils::streamFor('raw body');
        $rawResult = $this->parse(
            $protocol,
            $rawOutput,
            new Response(200, [], $rawBody)
        );
        $unionOutput = [
            'type' => 'structure',
            'payload' => 'Body',
            'members' => [
                'Body' => [
                    'type' => 'structure',
                    'union' => true,
                    'members' => ['Value' => ['type' => 'string']],
                ],
            ],
        ];

        $this->assertSame($rawBody, $rawResult['Body']);
        $this->assertSame(
            [],
            $this->parse(
                $protocol,
                $unionOutput,
                new Response(200, [], '')
            )->toArray()
        );
        $this->assertSame(
            ['Body' => ['Value' => 'selected']],
            $this->parse(
                $protocol,
                $unionOutput,
                new Response(200, [], $unionBody)
            )->toArray()
        );
    }

    #[DataProvider('restProtocolProvider')]
    public function testEventPayloadUsesOriginalStream(string $protocol): void
    {
        $eventStream = json_decode(file_get_contents(
            __DIR__ . '/../../eventstream_fixtures/eventstream_shape.json'
        ), true);
        $output = [
            'type' => 'structure',
            'payload' => 'Events',
            'members' => ['Events' => $eventStream],
        ];
        $bytes = base64_decode(file_get_contents(
            __DIR__ . '/../../eventstream_fixtures/input/headers_event'
        ));
        $body = Utils::streamFor($bytes);
        $iterator = $this->parse(
            $protocol,
            $output,
            new Response(200, [], $body)
        )['Events'];

        $this->assertInstanceOf(EventParsingIterator::class, $iterator);
        $this->assertSame($body, $this->eventIteratorStream($iterator));
        $events = iterator_to_array($iterator);
        $this->assertCount(1, $events);
        $this->assertSame('test', $events[0]['FooBar']['HeaderString']);
    }

    public function testMalformedListColdPathIsLazyUntilHeaderIsPresent(): void
    {
        $output = [
            'type' => 'structure',
            'members' => [
                'ColdList' => [
                    'type' => 'list',
                    'location' => 'header',
                    'locationName' => 'X-Cold-List',
                    'member' => [],
                ],
            ],
        ];
        $service = $this->service('rest-json', $output);
        $parser = new RestJsonParser($service);
        $command = new Command('Op');
        $diagnostics = [];

        set_error_handler(static function (
            $severity,
            $message
        ) use (&$diagnostics): bool {
            $diagnostics[] = [$severity, $message];
            return true;
        });
        try {
            $absent = $parser($command, new Response(200));
            $empty = $parser(
                $command,
                new Response(200, ['X-Cold-List' => ''])
            );
        } finally {
            restore_error_handler();
        }

        $plan = $service->getOperation('Op')->getSerdePlan(
            ShapePlanCache::HTTP_RESPONSE_BINDINGS
        );
        $this->assertSame([], $absent->toArray());
        $this->assertSame([], $empty->toArray());
        $this->assertSame([], $diagnostics);
        $this->assertSame(Plan::HEADER_SHAPE, $plan->bindings[0][Plan::B_TAG]);

        $diagnostics = [];
        $exception = null;
        set_error_handler(static function (
            $severity,
            $message
        ) use (&$diagnostics): bool {
            $diagnostics[] = [$severity, $message];
            return true;
        });
        try {
            try {
                $parser(
                    $command,
                    new Response(200, ['X-Cold-List' => 'value'])
                );
            } catch (\Throwable $e) {
                $exception = $e;
            }
        } finally {
            restore_error_handler();
        }

        $this->assertInstanceOf(\RuntimeException::class, $exception);
        $this->assertSame("Invalid type: Array\n(\n)\n", $exception->getMessage());
        $this->assertSame([
            [E_WARNING, 'Undefined array key "type"'],
            [
                E_DEPRECATED,
                'Using null as an array offset is deprecated, use an empty string instead',
            ],
        ], $diagnostics);
    }

    #[DataProvider('malformedPrefixBodyProvider')]
    public function testMalformedPrefixRunsAfterImplicitBodyHandling(
        string $bodyContents,
        bool $knownSize,
        bool $seekable,
        string $expectedExceptionClass,
        string $expectedExceptionMessage
    ): void
    {
        $body = Utils::streamFor($bodyContents);
        $overrides = [];
        if (!$knownSize) {
            $overrides['getSize'] = static function (): ?int {
                return null;
            };
        }
        if (!$seekable) {
            $overrides['isSeekable'] = static function (): bool {
                return false;
            };
            $overrides['seek'] = static function (): void {
                throw new \RuntimeException('Cannot seek');
            };
            $overrides['rewind'] = static function (): void {
                throw new \RuntimeException('Cannot rewind');
            };
        }
        if ($overrides) {
            $body = FnStream::decorate($body, $overrides);
        }

        $output = [
            'type' => 'structure',
            'members' => [
                'Body' => ['type' => 'string'],
                'Metadata' => [
                    'type' => 'map',
                    'location' => 'headers',
                    'locationName' => [],
                    'key' => ['type' => 'string'],
                    'value' => ['type' => 'string'],
                ],
            ],
        ];
        $service = $this->service('rest-json', $output);
        $parser = new RestJsonParser($service);
        $diagnostics = [];
        $exception = null;

        set_error_handler(static function (
            $severity,
            $message
        ) use (&$diagnostics): bool {
            $diagnostics[] = [$severity, $message];
            return true;
        });
        try {
            try {
                $parser(new Command('Op'), new Response(200, [], $body));
            } catch (\Throwable $e) {
                $exception = $e;
            }
        } finally {
            restore_error_handler();
        }

        $this->assertInstanceOf($expectedExceptionClass, $exception);
        $this->assertSame($expectedExceptionMessage, $exception->getMessage());
        $this->assertSame([], $diagnostics);
        $this->assertSame(strlen($bodyContents), $body->tell());
        if ($bodyContents !== '') {
            $this->assertTrue($body->eof());
        }

        $plan = $service->getOperation('Op')->getSerdePlan(
            ShapePlanCache::HTTP_RESPONSE_BINDINGS
        );
        $this->assertSame(
            [[
                Plan::PREFIX_HEADERS_SHAPE,
                'Metadata',
                $service->getOperation('Op')->getOutput()->getMember('Metadata'),
            ]],
            $plan->bindings
        );
    }

    public static function malformedPrefixBodyProvider(): iterable
    {
        $valid = '{"Body":"value"}';
        $invalid = '{';
        $prefixMessage = 'strlen(): Argument #1 ($string) must be of type string, array given';
        $jsonMessage = 'Error parsing JSON: Syntax error';

        foreach ([true, false] as $knownSize) {
            foreach ([true, false] as $seekable) {
                $stream = ($knownSize ? 'known' : 'unknown')
                    . ($seekable ? '-seekable' : '-nonseekable');
                yield "valid $stream" => [
                    $valid,
                    $knownSize,
                    $seekable,
                    \TypeError::class,
                    $prefixMessage,
                ];
                yield "invalid $stream" => [
                    $invalid,
                    $knownSize,
                    $seekable,
                    \Aws\Api\Parser\Exception\ParserException::class,
                    $jsonMessage,
                ];
            }
        }

        yield 'empty body still reaches unused malformed prefix' => [
            '',
            true,
            true,
            \TypeError::class,
            $prefixMessage,
        ];
    }

    public function testColdImplicitMalformedOutputConsumesUnknownSizeBodyBeforeFailing(): void
    {
        $contents = '{"Before":"value"}';
        $body = FnStream::decorate(Utils::streamFor($contents), [
            'getSize' => static function (): ?int {
                return null;
            },
            'isSeekable' => static function (): bool {
                return false;
            },
            'seek' => static function (): void {
                throw new \RuntimeException('Cannot seek');
            },
            'rewind' => static function (): void {
                throw new \RuntimeException('Cannot rewind');
            },
        ]);
        $output = [
            'type' => 'structure',
            'members' => [
                'Before' => ['type' => 'string'],
                'Broken' => ['shape' => 'Missing'],
            ],
        ];
        $parser = new RestJsonParser($this->service('rest-json', $output));
        $exception = null;

        try {
            $parser(new Command('Op'), new Response(200, [], $body));
        } catch (\Throwable $e) {
            $exception = $e;
        }

        $this->assertInstanceOf(\InvalidArgumentException::class, $exception);
        $this->assertSame('Shape not found: Missing', $exception->getMessage());
        $this->assertSame(strlen($contents), $body->tell());
        $this->assertTrue($body->eof());
    }

    public function testWarmFastBindingsDoNotDependOnTheLiveOutputModel(): void
    {
        $output = [
            'type' => 'structure',
            'members' => [
                'Header' => [
                    'type' => 'string',
                    'location' => 'header',
                    'locationName' => 'X-Header',
                ],
                'Metadata' => [
                    'type' => 'map',
                    'location' => 'headers',
                    'locationName' => 'x-meta-',
                    'key' => ['type' => 'string'],
                    'value' => ['type' => 'string'],
                ],
                'Status' => ['type' => 'integer', 'location' => 'statusCode'],
            ],
        ];
        $service = $this->service('rest-json', $output);
        $parser = new RestJsonParser($service);
        $command = new Command('Op');
        $response = static fn() => new Response(201, [
            'X-Header' => 'value',
            'X-Meta-Key' => 'metadata',
        ]);
        $cold = $parser($command, $response())->toArray();
        $operation = $service->getOperation('Op');
        $plan = $operation->getSerdePlan(
            ShapePlanCache::HTTP_RESPONSE_BINDINGS
        );

        foreach ($plan->bindings as $binding) {
            foreach ($binding as $value) {
                $this->assertNotInstanceOf(Shape::class, $value);
            }
        }
        $plan->output = null;
        $warm = $parser($command, $response())->toArray();

        $this->assertSame([
            'Header' => 'value',
            'Metadata' => ['Key' => 'metadata'],
            'Status' => 201,
        ], $cold);
        $this->assertSame($cold, $warm);
        $this->assertSame(
            $plan,
            $operation->getSerdePlan(ShapePlanCache::HTTP_RESPONSE_BINDINGS)
        );
    }

    #[DataProvider('payloadPlanProvider')]
    public function testCompilesPayloadRoutes(
        array $output,
        int $expectedKind,
        ?string $expectedName,
        bool $expectedUnion,
        bool $retainsOutput,
        bool $retainsMember
    ): void
    {
        $operation = $this->service('rest-json', $output)->getOperation('Op');
        $plan = (new HttpResponseBindingPlanProvider())->get($operation);

        $this->assertSame($expectedKind, $plan->payloadKind);
        $this->assertSame($expectedName, $plan->payloadName);
        $this->assertSame($expectedUnion, $plan->payloadUnion);
        $this->assertSame($retainsOutput, $plan->output === $operation->getOutput());
        $this->assertSame($retainsMember, $plan->payloadMember instanceof Shape);
    }

    public static function restProtocolProvider(): iterable
    {
        yield 'REST-JSON' => ['rest-json'];
        yield 'REST-XML' => ['rest-xml'];
    }

    public static function bodyProvider(): iterable
    {
        yield 'REST-JSON' => ['rest-json', '{"Body":"body"}'];
        yield 'REST-XML' => [
            'rest-xml',
            '<Response><Body>body</Body></Response>',
        ];
    }

    public static function payloadBodyProvider(): iterable
    {
        yield 'REST-JSON' => [
            'rest-json',
            '{"Value":"implicit"}',
            '{"Value":"structured"}',
        ];
        yield 'REST-XML' => [
            'rest-xml',
            '<Response><Value>implicit</Value></Response>',
            '<Body><Value>structured</Value></Body>',
        ];
    }

    public static function unionBodyProvider(): iterable
    {
        yield 'REST-JSON' => ['rest-json', '{"Value":"selected"}'];
        yield 'REST-XML' => [
            'rest-xml',
            '<Body><Value>selected</Value></Body>',
        ];
    }

    public static function payloadPlanProvider(): iterable
    {
        yield 'implicit' => [[
            'type' => 'structure',
            'members' => ['Value' => ['type' => 'string']],
        ], Plan::PAYLOAD_IMPLICIT, null, false, true, false];
        yield 'raw' => [[
            'type' => 'structure',
            'payload' => 'Body',
            'members' => ['Body' => ['type' => 'blob']],
        ], Plan::PAYLOAD_RAW, 'Body', false, false, false];
        yield 'structure' => [[
            'type' => 'structure',
            'payload' => 'Body',
            'members' => [
                'Body' => ['type' => 'structure', 'members' => []],
            ],
        ], Plan::PAYLOAD_STRUCTURE, 'Body', false, false, true];
        yield 'union' => [[
            'type' => 'structure',
            'payload' => 'Body',
            'members' => [
                'Body' => [
                    'type' => 'structure',
                    'union' => true,
                    'members' => [],
                ],
            ],
        ], Plan::PAYLOAD_STRUCTURE, 'Body', true, false, true];
        yield 'event stream' => [[
            'type' => 'structure',
            'payload' => 'Events',
            'members' => [
                'Events' => [
                    'type' => 'structure',
                    'eventstream' => true,
                    'members' => [],
                ],
            ],
        ], Plan::PAYLOAD_EVENT_STREAM, 'Events', false, false, true];
    }

    private function service(
        string $protocol,
        array $output,
        ?array $input = null
    ): Service
    {
        $operation = [
            'http' => ['method' => 'POST', 'requestUri' => '/'],
            'output' => $output,
        ];
        if ($input !== null) {
            $operation['input'] = $input;
        }

        return new Service([
            'metadata' => [
                'protocol' => $protocol,
                'serviceIdentifier' => 'foo',
                'endpointPrefix' => 'foo',
                'apiVersion' => '2020-01-01',
            ],
            'operations' => ['Op' => $operation],
            'shapes' => [],
        ], static function (): array {
            return [];
        });
    }

    private function parse(
        string $protocol,
        array $output,
        Response $response
    ) {
        $service = $this->service($protocol, $output);
        $parser = $this->parser($protocol, $service);

        return $parser(new Command('Op'), $response);
    }

    private function parser(
        string $protocol,
        Service $service
    ): AbstractRestParser
    {
        return $protocol === 'rest-json'
            ? new RestJsonParser($service)
            : new RestXmlParser($service);
    }

    private function eventIteratorStream(EventParsingIterator $iterator)
    {
        $decodingIterator = (new ReflectionProperty(
            EventParsingIterator::class,
            'decodingIterator'
        ))->getValue($iterator);

        return (new ReflectionProperty(
            DecodingEventStreamIterator::class,
            'stream'
        ))->getValue($decodingIterator);
    }

    private function withoutWarnings(callable $callback)
    {
        set_error_handler(static function ($severity, $message): bool {
            throw new \ErrorException($message, 0, $severity);
        });
        try {
            return $callback();
        } finally {
            restore_error_handler();
        }
    }
}
