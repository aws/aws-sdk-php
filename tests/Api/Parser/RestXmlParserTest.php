<?php

namespace Aws\Tests\Api\Parser;

use Aws\Api\Parser\RestXmlParser;
use Aws\Api\Service;
use Aws\CommandInterface;
use GuzzleHttp\Psr7\Response;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Api\Parser\RestXmlParser
 */
class RestXmlParserTest extends TestCase
{
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
                'protocol' => 'rest-xml'
            ],
            'operations' => [
                'TestOperation' => [
                    'http' => ['method' => 'GET'],
                    'output' => $shape
                ]
            ],
            'shapes' => $shapes
        ], function () {});

        $parser = new RestXmlParser($api);

        $response = new Response(200, [
            'Content-Length' => '0',
            'X-Count' => '0',
            'X-Enabled' => 'false',
            'X-Ratio' => '0.0',
            'X-Tags' => null,  // Empty list
            'X-Empty' => ''  // Empty string should still be skipped
        ], '<?xml version="1.0" encoding="UTF-8"?><response/>');

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
