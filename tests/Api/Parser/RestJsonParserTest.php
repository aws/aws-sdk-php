<?php

namespace Aws\Tests\Api\Parser;

use Aws\Test\Api\Parser\ParserTestServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Api\Parser\RestJsonParser
 */
class RestJsonParserTest extends TestCase
{
    use ParserTestServiceTrait;

    /**
     * @param $value
     * @param $expected
     * @return void
     * @dataProvider parsesDocumentTypePayloadProvider
     */
    public function testParsesDocumentTypePayload($value, $expected): void
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
}
