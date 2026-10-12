<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Serializer\XmlBody;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * Covers xmlAttribute handling in XmlBody. Only string shapes are written as
 * attributes; other types are written as elements but still ordered first.
 */
#[CoversClass(XmlBody::class)]
class XmlBodyTest extends TestCase
{
    public static function xmlAttributeProvider(): array
    {
        return [
            'string attribute' => [
                ['A' => ['type' => 'string', 'xmlAttribute' => true], 'B' => ['type' => 'string']],
                ['B' => 'b', 'A' => 'a'],
                '<Root A="a"><B>b</B></Root>',
            ],
            'string attribute uses locationName' => [
                ['A' => ['type' => 'string', 'xmlAttribute' => true, 'locationName' => 'xa']],
                ['A' => 'a'],
                '<Root xa="a"/>',
            ],
            'string attribute with locationNameAtStructureLevel' => [
                ['A' => [
                    'type' => 'string',
                    'xmlAttribute' => true,
                    'locationName' => 'xa',
                    'locationNameAtStructureLevel' => true,
                ]],
                ['A' => 'a'],
                '<Root xa="a"/>',
            ],
            'integer attribute is an element, ordered first' => [
                ['B' => ['type' => 'string'], 'N' => ['type' => 'integer', 'xmlAttribute' => true]],
                ['B' => 'b', 'N' => 7],
                '<Root><N>7</N><B>b</B></Root>',
            ],
            'long attribute is an element' => [
                ['N' => ['type' => 'long', 'xmlAttribute' => true, 'locationName' => 'n']],
                ['N' => 9],
                '<Root><n>9</n></Root>',
            ],
            'float attribute is an element' => [
                ['N' => ['type' => 'float', 'xmlAttribute' => true]],
                ['N' => 1.5],
                '<Root><N>1.5</N></Root>',
            ],
            'double attribute is an element' => [
                ['N' => ['type' => 'double', 'xmlAttribute' => true]],
                ['N' => 2.25],
                '<Root><N>2.25</N></Root>',
            ],
            'boolean attribute is an element' => [
                ['N' => ['type' => 'boolean', 'xmlAttribute' => true]],
                ['N' => true],
                '<Root><N>true</N></Root>',
            ],
            'timestamp attribute is an element' => [
                ['N' => ['type' => 'timestamp', 'xmlAttribute' => true]],
                ['N' => 0],
                '<Root><N>1970-01-01T00:00:00Z</N></Root>',
            ],
            'mixed attribute members' => [
                [
                    'S' => ['type' => 'string'],
                    'I' => ['type' => 'integer', 'xmlAttribute' => true],
                    'A' => ['type' => 'string', 'xmlAttribute' => true],
                ],
                ['S' => 's', 'I' => 3, 'A' => 'a'],
                '<Root A="a"><I>3</I><S>s</S></Root>',
            ],
            'nested structure attribute members' => [
                ['C' => ['type' => 'structure', 'members' => [
                    'I' => ['type' => 'integer', 'xmlAttribute' => true],
                    'A' => ['type' => 'string', 'xmlAttribute' => true],
                ]]],
                ['C' => ['I' => 1, 'A' => 'a']],
                '<Root><C A="a"><I>1</I></C></Root>',
            ],
            'flattened list of string attribute items' => [
                ['L' => ['type' => 'list', 'flattened' => true, 'member' => [
                    'type' => 'string',
                    'xmlAttribute' => true,
                    'locationName' => 'it',
                ]]],
                ['L' => ['x']],
                '<Root it="x"/>',
            ],
            'list of integer attribute items are elements' => [
                ['L' => ['type' => 'list', 'member' => ['type' => 'integer', 'xmlAttribute' => true]]],
                ['L' => [1, 2]],
                '<Root><L><member>1</member><member>2</member></L></Root>',
            ],
            'map string attribute key and value' => [
                ['M' => ['type' => 'map',
                    'key' => ['type' => 'string', 'xmlAttribute' => true],
                    'value' => ['type' => 'string', 'xmlAttribute' => true, 'locationName' => 'v'],
                ]],
                ['M' => ['k' => 'v1']],
                '<Root><M><entry key="k" v="v1"/></M></Root>',
            ],
            'map integer attribute value is an element' => [
                ['M' => ['type' => 'map',
                    'key' => ['type' => 'string'],
                    'value' => ['type' => 'integer', 'xmlAttribute' => true],
                ]],
                ['M' => ['k' => 5]],
                '<Root><M><entry><key>k</key><value>5</value></entry></M></Root>',
            ],
        ];
    }

    #[DataProvider('xmlAttributeProvider')]
    public function testXmlAttributeSerialization(
        array $members,
        array $args,
        string $expected
    ): void {
        $shape = Shape::create(
            [
                'type' => 'structure',
                'name' => 'Root',
                'members' => $members,
            ],
            new ShapeMap([])
        );
        $service = new Service(
            ['metadata' => ['protocol' => 'rest-xml'], 'shapes' => []],
            function () {
                return [];
            }
        );

        $xml = (new XmlBody($service))->build($shape, $args);

        $this->assertSame(
            '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . $expected . "\n",
            $xml
        );
    }
}
