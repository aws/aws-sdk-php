<?php

namespace Aws\Tests\Api\Parser;

use Aws\Api\Parser\RestJsonParser;
use Aws\Api\Service;
use Aws\CommandInterface;
use Aws\Test\Api\Parser\ParserTestServiceTrait;
use GuzzleHttp\Psr7\Response;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Api\Parser\RestJsonParser
 */
class RestJsonParserTest extends TestCase
{
    use ParserTestServiceTrait;

    /**
     * @param string|array $value
     * @param array $expected
     *
     * @return void
     * @dataProvider parsesDocumentTypePayloadProvider
     */
    public function testParsesDocumentTypePayload(
        string $value,
        string|array $expected
    ): void
    {
        $service = $this->generateTestService('rest-json');
        $client = $this->generateTestClient(
            $service,
            $value
        );
        $command = $client->getCommand('DocumentTypeAsPayload');
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $result = $handler($command)->wait();
        self::assertEquals($expected, $result['documentValue']);
    }

    public function parsesDocumentTypePayloadProvider(): iterable
    {
        return [
            'string payload' => ["\"hello\"", 'hello'],
            'simple string field' => [
                '{"message":"Hello, world!"}',
                ['message' => 'Hello, world!'],
            ],
            'array with null value' =>[
                '{"result":null}',
                ['result' => null],
            ],
            'numeric and boolean types' => [
                '{"success":true,"count":3,"ratio":0.75}',
                ['success' => true, 'count' => 3, 'ratio' => 0.75],
            ],
            'empty object' => [
                '{}',
                [],
            ],
            'empty array' => [
                '{"items":[]}',
                ['items' => []],
            ],
            'nested object' => [
                '{"user":{"id":1,"name":"Jane"}}',
                ['user' => ['id' => 1, 'name' => 'Jane']],
            ],
            'array of objects' => [
                '{"records":[{"id":1},{"id":2}]}',
                ['records' => [['id' => 1], ['id' => 2]]],
            ],
            'deeply nested structure' => [
                '{"a":{"b":{"c":{"d":123}}}}',
                ['a' => ['b' => ['c' => ['d' => 123]]]],
            ],
            'mixed types in array' => [
                '{"data":["string",123,true,null]}',
                ['data' => ['string', 123, true, null]],
            ],
        ];
    }

    public function testParsesFalsyHeaderValues(): void
    {
        $shape = [
            'type' => 'structure',
            'members' => [
                'ContentLength' => [
                    'shape' => 'ContentLengthShape',
                    'location' => 'header',
                    'locationName' => 'Content-Length'
                ],
                'Count' => [
                    'shape' => 'IntegerShape',
                    'location' => 'header',
                    'locationName' => 'X-Count'
                ],
                'Enabled' => [
                    'shape' => 'BooleanShape',
                    'location' => 'header',
                    'locationName' => 'X-Enabled'
                ],
                'Ratio' => [
                    'shape' => 'FloatShape',
                    'location' => 'header',
                    'locationName' => 'X-Ratio'
                ],
                'Tags' => [
                    'shape' => 'ListShape',
                    'location' => 'header',
                    'locationName' => 'X-Tags'
                ],
                'Empty' => [
                    'shape' => 'StringShape',
                    'location' => 'header',
                    'locationName' => 'X-Empty'
                ]
            ]
        ];
        $shapes = [
            'ContentLengthShape' => ['type' => 'long'],
            'IntegerShape' => ['type' => 'integer'],
            'BooleanShape' => ['type' => 'boolean'],
            'FloatShape' => ['type' => 'float'],
            'ListShape' => [
                'type' => 'list',
                'member' => ['shape' => 'StringShape']
            ],
            'StringShape' => ['type' => 'string']
        ];

        $api = new Service([
            'metadata' => [
                'protocol' => 'rest-json'
            ],
            'operations' => [
                'TestOperation' => [
                    'http' => ['method' => 'GET'],
                    'output' => $shape
                ]
            ],
            'shapes' => $shapes
        ], function () {});

        $parser = new RestJsonParser($api);

        $response = new Response(200, [
            'Content-Length' => '0',
            'X-Count' => 0,
            'X-Enabled' => 'false',
            'X-Ratio' => '0.0',
            'X-Tags' => null,  // Empty list
            'X-Empty' => ''  // Empty string should still be skipped
        ], '{}');

        $command = $this->getMockBuilder(CommandInterface::class)->getMock();
        $command->method('getName')->willReturn('TestOperation');

        $result = $parser($command, $response);

        // Zero/false values should be preserved
        $this->assertArrayHasKey('ContentLength', $result);
        $this->assertSame(0, $result['ContentLength']);

        $this->assertArrayHasKey('Count', $result);
        $this->assertSame(0, $result['Count']);

        $this->assertArrayHasKey('Enabled', $result);
        $this->assertFalse($result['Enabled']);

        $this->assertArrayHasKey('Ratio', $result);
        $this->assertSame(0.0, $result['Ratio']);

        // Null values should still be skipped
        $this->assertArrayNotHasKey('Tags', $result);

        // Empty string should still be skipped
        $this->assertArrayNotHasKey('Empty', $result);
    }
}
