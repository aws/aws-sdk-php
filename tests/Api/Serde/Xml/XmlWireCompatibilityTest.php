<?php
namespace Aws\Test\Api\Serde\Xml;

use Aws\Api\DateTimeResult;
use Aws\Api\Parser\XmlParser;
use Aws\Api\Serializer\XmlBody;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use Aws\Api\StructureShape;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * Pins XML wire output for the cases the XML serde plan design lists, through
 * the public XmlBody and XmlParser entry points. Expected values were taken
 * from the pre-plan serializer and parser.
 */
#[CoversClass(XmlBody::class)]
#[CoversClass(XmlParser::class)]
class XmlWireCompatibilityTest extends TestCase
{
    private static function service(): Service
    {
        return new Service(
            ['metadata' => ['protocol' => 'rest-xml'], 'shapes' => []],
            function () {
                return [];
            }
        );
    }

    private static function root(array $members, array $extra = []): Shape
    {
        return Shape::create(
            ['type' => 'structure', 'name' => 'Root', 'members' => $members] + $extra,
            new ShapeMap([])
        );
    }

    private static function encode(Shape $shape, array $args): string
    {
        return (new XmlBody(self::service()))->build($shape, $args);
    }

    private static function doc(string $body): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . $body . "\n";
    }

    /**
     * Runs a callable and fails on any PHP warning, notice or deprecation.
     */
    private function withoutWarnings(callable $fn)
    {
        set_error_handler(function ($errno, $errstr) {
            $this->fail("Unexpected PHP error: {$errstr}");
        });
        try {
            return $fn();
        } finally {
            restore_error_handler();
        }
    }

    public static function encodeProvider(): array
    {
        return [
            'multiple attributes come first, in reverse input order' => [
                [
                    'E' => ['type' => 'string'],
                    'B' => ['type' => 'string', 'xmlAttribute' => true],
                    'A' => ['type' => 'string', 'xmlAttribute' => true],
                ],
                ['E' => 'e', 'B' => 'b', 'A' => 'a'],
                // Each attribute member is prepended, so later ones lead.
                '<Root A="a" B="b"><E>e</E></Root>',
            ],
            'namespace without prefix' => [
                ['C' => ['type' => 'structure', 'xmlNamespace' => ['uri' => 'http://a'], 'members' => [
                    'X' => ['type' => 'string'],
                ]]],
                ['C' => ['X' => 'x']],
                '<Root><C xmlns="http://a"><X>x</X></C></Root>',
            ],
            'namespace with prefix' => [
                ['C' => ['type' => 'structure', 'xmlNamespace' => ['uri' => 'http://a', 'prefix' => 'p'], 'members' => [
                    'X' => ['type' => 'string'],
                ]]],
                ['C' => ['X' => 'x']],
                '<Root><C xmlns:p="http://a"><X>x</X></C></Root>',
            ],
            'empty wrapped list' => [
                ['L' => ['type' => 'list', 'member' => ['type' => 'string']]],
                ['L' => []],
                '<Root><L/></Root>',
            ],
            'empty flattened list' => [
                ['L' => ['type' => 'list', 'flattened' => true, 'member' => ['type' => 'string']]],
                ['L' => []],
                '<Root/>',
            ],
            'empty wrapped map' => [
                ['M' => ['type' => 'map', 'key' => ['type' => 'string'], 'value' => ['type' => 'string']]],
                ['M' => []],
                '<Root><M/></Root>',
            ],
            'empty flattened map' => [
                ['M' => ['type' => 'map', 'flattened' => true,
                    'key' => ['type' => 'string'], 'value' => ['type' => 'string']]],
                ['M' => []],
                '<Root/>',
            ],
            'flattened map' => [
                ['M' => ['type' => 'map', 'flattened' => true,
                    'key' => ['type' => 'string'], 'value' => ['type' => 'string']]],
                ['M' => ['a' => '1', 'b' => '2']],
                '<Root><M><key>a</key><value>1</value></M><M><key>b</key><value>2</value></M></Root>',
            ],
            'nested list of lists' => [
                ['L' => ['type' => 'list', 'member' => [
                    'type' => 'list', 'member' => ['type' => 'string'],
                ]]],
                ['L' => [['a', 'b'], ['c']]],
                '<Root><L><member><member>a</member><member>b</member></member>'
                    . '<member><member>c</member></member></L></Root>',
            ],
            'map of lists' => [
                ['M' => ['type' => 'map', 'key' => ['type' => 'string'], 'value' => [
                    'type' => 'list', 'member' => ['type' => 'integer'],
                ]]],
                ['M' => ['k' => [1, 2]]],
                '<Root><M><entry><key>k</key><value><member>1</member><member>2</member></value></entry></M></Root>',
            ],
            'list of structures' => [
                ['L' => ['type' => 'list', 'member' => [
                    'type' => 'structure', 'locationName' => 'item', 'members' => [
                        'N' => ['type' => 'string'],
                    ],
                ]]],
                ['L' => [['N' => 'a'], ['N' => 'b']]],
                '<Root><L><item><N>a</N></item><item><N>b</N></item></L></Root>',
            ],
            'blob' => [
                ['B' => ['type' => 'blob']],
                ['B' => 'hello'],
                '<Root><B>aGVsbG8=</B></Root>',
            ],
            'timestamps in each format' => [
                [
                    'D' => ['type' => 'timestamp'],
                    'E' => ['type' => 'timestamp', 'timestampFormat' => 'unixTimestamp'],
                    'H' => ['type' => 'timestamp', 'timestampFormat' => 'rfc822'],
                ],
                ['D' => 0, 'E' => 0, 'H' => 0],
                '<Root><D>1970-01-01T00:00:00Z</D><E>0</E><H>Thu, 01 Jan 1970 00:00:00 GMT</H></Root>',
            ],
            'special floating-point values' => [
                [
                    'A' => ['type' => 'double'],
                    'B' => ['type' => 'double'],
                    'C' => ['type' => 'float'],
                ],
                ['A' => 'NaN', 'B' => 'Infinity', 'C' => '-Infinity'],
                '<Root><A>NaN</A><B>Infinity</B><C>-Infinity</C></Root>',
            ],
            'booleans' => [
                ['T' => ['type' => 'boolean'], 'F' => ['type' => 'boolean']],
                ['T' => true, 'F' => false],
                '<Root><T>true</T><F>false</F></Root>',
            ],
            'union writes the set member' => [
                ['U' => ['type' => 'structure', 'union' => true, 'members' => [
                    'S' => ['type' => 'string'],
                    'I' => ['type' => 'integer'],
                ]]],
                ['U' => ['I' => 4]],
                '<Root><U><I>4</I></U></Root>',
            ],
            'unknown input keys are dropped' => [
                ['A' => ['type' => 'string']],
                ['Nope' => 'x', 'A' => 'a'],
                '<Root><A>a</A></Root>',
            ],
        ];
    }

    #[DataProvider('encodeProvider')]
    public function testEncodeWireOutput(array $members, array $args, string $expected): void
    {
        $this->assertSame(self::doc($expected), self::encode(self::root($members), $args));
    }

    public function testInlineNestedShapesEncodeWithoutWarnings(): void
    {
        // Inline shapes have no 'name'. Only the root name may be resolved.
        $shape = self::root([
            'T' => ['type' => 'timestamp'],
            'L' => ['type' => 'list', 'member' => ['type' => 'integer']],
            'M' => ['type' => 'map', 'key' => ['type' => 'string'], 'value' => ['type' => 'string']],
            'C' => ['type' => 'structure', 'members' => ['X' => ['type' => 'string']]],
        ]);

        $xml = $this->withoutWarnings(function () use ($shape) {
            return self::encode($shape, [
                'T' => 0,
                'L' => [1],
                'M' => ['k' => 'v'],
                'C' => ['X' => 'x'],
            ]);
        });

        $this->assertSame(
            self::doc(
                '<Root><T>1970-01-01T00:00:00Z</T><L><member>1</member></L>'
                . '<M><entry><key>k</key><value>v</value></entry></M><C><X>x</X></C></Root>'
            ),
            $xml
        );
    }

    public function testRootNamePrefersShapeMapDefinitionLocationName(): void
    {
        $map = new ShapeMap(['Foo' => [
            'type' => 'structure',
            'locationName' => 'FromDefinition',
            'members' => ['A' => ['type' => 'string']],
        ]]);
        $shape = $map->resolve(['shape' => 'Foo', 'locationName' => 'FromReference']);

        $this->assertSame(
            self::doc('<FromDefinition><A>a</A></FromDefinition>'),
            self::encode($shape, ['A' => 'a'])
        );
    }

    public function testRootNameFallsBackToResolvedLocationName(): void
    {
        $map = new ShapeMap(['Foo' => [
            'type' => 'structure',
            'members' => ['A' => ['type' => 'string']],
        ]]);
        $shape = $map->resolve(['shape' => 'Foo', 'locationName' => 'FromReference']);

        $this->assertSame(
            self::doc('<FromReference><A>a</A></FromReference>'),
            self::encode($shape, ['A' => 'a'])
        );
    }

    public function testRootNameFallsBackToShapeName(): void
    {
        $map = new ShapeMap(['Foo' => [
            'type' => 'structure',
            'members' => ['A' => ['type' => 'string']],
        ]]);
        $shape = $map->resolve(['shape' => 'Foo']);

        $this->assertSame(
            self::doc('<Foo><A>a</A></Foo>'),
            self::encode($shape, ['A' => 'a'])
        );
    }

    /**
     * Replaces DateTimeResult and SimpleXMLElement values with strings so
     * results compare by value.
     */
    private static function normalize($value)
    {
        if ($value instanceof DateTimeResult) {
            return 'ts:' . $value->format('Y-m-d\TH:i:s\Z');
        }
        if ($value instanceof \SimpleXMLElement) {
            return 'xml:' . (string) $value;
        }
        if (is_array($value)) {
            return array_map([self::class, 'normalize'], $value);
        }
        return $value;
    }

    private static function decode(array $members, string $xml, array $extra = [])
    {
        /** @var StructureShape $shape */
        $shape = self::root($members, $extra);
        return self::normalize(
            (new XmlParser())->parse($shape, new \SimpleXMLElement($xml))
        );
    }

    public static function decodeProvider(): array
    {
        return [
            'empty wrapped list' => [
                ['L' => ['type' => 'list', 'member' => ['type' => 'string']]],
                '<Root><L/></Root>',
                ['L' => []],
            ],
            'absent flattened list' => [
                ['L' => ['type' => 'list', 'flattened' => true, 'member' => ['type' => 'string']]],
                '<Root/>',
                [],
            ],
            'empty wrapped map' => [
                ['M' => ['type' => 'map', 'key' => ['type' => 'string'], 'value' => ['type' => 'string']]],
                '<Root><M/></Root>',
                ['M' => []],
            ],
            'flattened list' => [
                ['L' => ['type' => 'list', 'flattened' => true, 'member' => ['type' => 'string']]],
                '<Root><L>a</L><L>b</L></Root>',
                ['L' => ['a', 'b']],
            ],
            'flattened map' => [
                ['M' => ['type' => 'map', 'flattened' => true,
                    'key' => ['type' => 'string'], 'value' => ['type' => 'string']]],
                '<Root><M><key>a</key><value>1</value></M><M><key>b</key><value>2</value></M></Root>',
                ['M' => ['a' => '1', 'b' => '2']],
            ],
            'nested list of lists' => [
                ['L' => ['type' => 'list', 'member' => [
                    'type' => 'list', 'member' => ['type' => 'integer'],
                ]]],
                '<Root><L><member><member>1</member><member>2</member></member>'
                    . '<member><member>3</member></member></L></Root>',
                ['L' => [[1, 2], [3]]],
            ],
            'map of structures' => [
                ['M' => ['type' => 'map', 'key' => ['type' => 'string'], 'value' => [
                    'type' => 'structure', 'members' => ['N' => ['type' => 'string']],
                ]]],
                '<Root><M><entry><key>k</key><value><N>n</N></value></entry></M></Root>',
                ['M' => ['k' => ['N' => 'n']]],
            ],
            'multiple attributes' => [
                [
                    'A' => ['type' => 'string', 'xmlAttribute' => true, 'locationName' => 'a'],
                    'B' => ['type' => 'string', 'xmlAttribute' => true, 'locationName' => 'b'],
                    'E' => ['type' => 'string'],
                ],
                '<Root a="1" b="2"><E>e</E></Root>',
                ['A' => '1', 'B' => '2', 'E' => 'e'],
            ],
            'blob' => [
                ['B' => ['type' => 'blob']],
                '<Root><B>aGVsbG8=</B></Root>',
                ['B' => 'hello'],
            ],
            'timestamps' => [
                [
                    'D' => ['type' => 'timestamp'],
                    'E' => ['type' => 'timestamp', 'timestampFormat' => 'unixTimestamp'],
                ],
                '<Root><D>1970-01-02T00:00:00Z</D><E>86400</E></Root>',
                ['D' => 'ts:1970-01-02T00:00:00Z', 'E' => 'ts:1970-01-02T00:00:00Z'],
            ],
            'special floating-point values' => [
                [
                    'A' => ['type' => 'double'],
                    'B' => ['type' => 'double'],
                    'C' => ['type' => 'float'],
                    'D' => ['type' => 'float'],
                ],
                '<Root><A>NaN</A><B>Infinity</B><C>-Infinity</C><D>1.5</D></Root>',
                ['A' => 'NaN', 'B' => 'Infinity', 'C' => '-Infinity', 'D' => 1.5],
            ],
            'booleans and integers' => [
                ['T' => ['type' => 'boolean'], 'F' => ['type' => 'boolean'], 'I' => ['type' => 'integer']],
                '<Root><T>true</T><F>false</F><I>42</I></Root>',
                ['T' => true, 'F' => false, 'I' => 42],
            ],
        ];
    }

    #[DataProvider('decodeProvider')]
    public function testDecodeResult(array $members, string $xml, array $expected): void
    {
        $this->assertSame($expected, self::decode($members, $xml));
    }

    public function testDecodeUnionKnownMember(): void
    {
        $this->assertSame(
            ['S' => 's'],
            self::decode(
                ['S' => ['type' => 'string'], 'I' => ['type' => 'integer']],
                '<Root><S>s</S></Root>',
                ['union' => true]
            )
        );
    }

    public function testDecodeUnionUnknownMember(): void
    {
        $this->assertSame(
            ['Unknown' => ['Inner' => 'xml:v']],
            self::decode(
                ['S' => ['type' => 'string']],
                '<Root><Other><Inner>v</Inner></Other></Root>',
                ['union' => true]
            )
        );
    }
}
