<?php
namespace Aws\Test\Api\Cbor;

use Aws\Api\Cbor\CborDecoder;
use Aws\Api\Cbor\CborEncoder;
use Aws\Api\Cbor\Exception\CborException;
use DateTime;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Api\Cbor\CborEncoder
 */
class CborEncoderTest extends TestCase
{
    private CborEncoder $encoder;
    private CborDecoder $decoder;

    protected function setUp(): void
    {
        $this->encoder = new CborEncoder();
        $this->decoder = new CborDecoder();
    }

    /**
     * @dataProvider nullProvider
     */
    public function testEncodeNull($value, string $expected): void
    {
        $this->assertSame($expected, $this->encoder->encode($value));
    }

    public static function nullProvider(): array
    {
        return [
            'null' => [null, "\xF6"],
        ];
    }

    /**
     * @dataProvider booleanProvider
     */
    public function testEncodeBoolean(bool $value, string $expected): void
    {
        $this->assertSame($expected, $this->encoder->encode($value));
    }

    public static function booleanProvider(): array
    {
        return [
            'true' => [true, "\xF5"],
            'false' => [false, "\xF4"],
        ];
    }

    /**
     * @dataProvider unsignedIntegerProvider
     */
    public function testEncodeUnsignedInteger(int $value, string $expected): void
    {
        $this->assertSame($expected, $this->encoder->encode($value));
    }

    public static function unsignedIntegerProvider(): \Generator
    {
        // Small integers 0-23 (inline)
        yield '0' => [0, "\x00"];
        yield '1' => [1, "\x01"];
        yield '10' => [10, "\x0A"];
        yield '23' => [23, "\x17"];

        // 1-byte integers
        yield '24' => [24, "\x18\x18"];
        yield '25' => [25, "\x18\x19"];
        yield '100' => [100, "\x18\x64"];
        yield '255' => [255, "\x18\xFF"];

        // 2-byte integers
        yield '256' => [256, "\x19\x01\x00"];
        yield '1000' => [1000, "\x19\x03\xE8"];
        yield '65535' => [65535, "\x19\xFF\xFF"];

        // 4-byte integers
        yield '65536' => [65536, "\x1A\x00\x01\x00\x00"];
        yield '1000000' => [1000000, "\x1A\x00\x0F\x42\x40"];
        yield '4294967295' => [4294967295, "\x1A\xFF\xFF\xFF\xFF"];

        // 8-byte integers
        yield '4294967296' => [4294967296, "\x1B\x00\x00\x00\x01\x00\x00\x00\x00"];
        yield 'large' => [9223372036854775807, "\x1B\x7F\xFF\xFF\xFF\xFF\xFF\xFF\xFF"];
    }

    /**
     * @dataProvider negativeIntegerProvider
     */
    public function testEncodeNegativeInteger(int $value, string $expected): void
    {
        $this->assertSame($expected, $this->encoder->encode($value));
    }

    public static function negativeIntegerProvider(): \Generator
    {
        // Small negative integers -1 to -24 (inline)
        yield '-1' => [-1, "\x20"];
        yield '-2' => [-2, "\x21"];
        yield '-10' => [-10, "\x29"];
        yield '-24' => [-24, "\x37"];

        // 1-byte negative integers
        yield '-25' => [-25, "\x38\x18"];
        yield '-100' => [-100, "\x38\x63"];
        yield '-256' => [-256, "\x38\xFF"];

        // 2-byte negative integers
        yield '-257' => [-257, "\x39\x01\x00"];
        yield '-1000' => [-1000, "\x39\x03\xE7"];
        yield '-65536' => [-65536, "\x39\xFF\xFF"];

        // 4-byte negative integers
        yield '-65537' => [-65537, "\x3A\x00\x01\x00\x00"];
        yield '-1000000' => [-1000000, "\x3A\x00\x0F\x42\x3F"];
    }

    /**
     * @dataProvider floatProvider
     */
    public function testEncodeFloat(float $value, string $expected): void
    {
        $this->assertSame($expected, $this->encoder->encode($value));
    }

    public static function floatProvider(): array
    {
        return [
            '0.0' => [0.0, "\xFB\x00\x00\x00\x00\x00\x00\x00\x00"],
            '1.5' => [1.5, "\xFB\x3F\xF8\x00\x00\x00\x00\x00\x00"],
            '-4.25' => [-4.25, "\xFB\xC0\x11\x00\x00\x00\x00\x00\x00"],
            'NaN' => [NAN, "\xFB\x7F\xF8\x00\x00\x00\x00\x00\x00"],
            'INF' => [INF, "\xFB\x7F\xF0\x00\x00\x00\x00\x00\x00"],
            '-INF' => [-INF, "\xFB\xFF\xF0\x00\x00\x00\x00\x00\x00"],
            'requires-double' => [3.141592653589793, "\xFB\x40\x09\x21\xFB\x54\x44\x2D\x18"],
        ];
    }

    /**
     * @dataProvider stringProvider
     */
    public function testEncodeString(string $value, string $expected): void
    {
        $this->assertSame($expected, $this->encoder->encode($value));
    }

    public static function stringProvider(): \Generator
    {
        // Empty and small strings (length 0-23)
        yield 'empty' => ['', "\x60"];
        yield 'single-char' => ['a', "\x61a"];
        yield 'hello' => ['hello', "\x65hello"];
        yield '23-chars' => [str_repeat('x', 23), "\x77" . str_repeat('x', 23)];

        // 1-byte length (24-255)
        yield '24-chars' => [str_repeat('y', 24), "\x78\x18" . str_repeat('y', 24)];
        yield '255-chars' => [str_repeat('z', 255), "\x78\xFF" . str_repeat('z', 255)];

        // 2-byte length (256-65535)
        yield '256-chars' => [str_repeat('a', 256), "\x79\x01\x00" . str_repeat('a', 256)];
        yield '1000-chars' => [str_repeat('b', 1000), "\x79\x03\xE8" . str_repeat('b', 1000)];

        // Unicode
        yield 'unicode' => ['Hello 世界', "\x6CHello 世界"];
    }

    /**
     * @dataProvider arrayProvider
     */
    public function testEncodeArray(array $value, string $expected): void
    {
        $this->assertSame($expected, $this->encoder->encode($value));
    }

    public static function arrayProvider(): array
    {
        return [
            'empty-array' => [[], "\x80"],
            'single-element' => [[1], "\x81\x01"],
            'multiple-elements' => [[1, 2, 3], "\x83\x01\x02\x03"],
            'mixed-types' => [[1, "a", true], "\x83\x01\x61a\xF5"],
            'nested-array' => [[1, [2, 3]], "\x82\x01\x82\x02\x03"],
            '24-elements' => [
                array_fill(0, 24, 1),
                "\x98\x18" . str_repeat("\x01", 24)
            ],
            '256-elements' => [
                array_fill(0, 256, 0),
                "\x99\x01\x00" . str_repeat("\x00", 256)
            ],
        ];
    }

    /**
     * @dataProvider mapProvider
     */
    public function testEncodeMap(array $value, string $expected): void
    {
        $this->assertSame($expected, $this->encoder->encode($value));
    }

    public static function mapProvider(): array
    {
        return [
            'empty-map' => [['key' => 'value'], "\xA1\x63key\x65value"],
            'int-keys' => [[1 => 'a', 2 => 'b'], "\xA2\x01\x61a\x02\x61b"],
            'mixed-keys' => [['a' => 1, 'b' => 2], "\xA2\x61a\x01\x61b\x02"],
            'nested-map' => [
                ['a' => ['b' => 1]],
                "\xA1\x61a\xA1\x61b\x01"
            ],
            'map-with-array' => [
                ['items' => [1, 2, 3]],
                "\xA1\x65items\x83\x01\x02\x03"
            ],
        ];
    }

    /**
     * @dataProvider timestampProvider
     */
    public function testEncodeTimestamp(array $value, float $expected): void
    {
        $encoded = $this->encoder->encode($value);

        // Tag 1 + float64
        $this->assertSame("\xC1", $encoded[0]);
        $this->assertSame("\xFB", $encoded[1]);

        // Verify decoded value
        $decoded = $this->decoder->decode($encoded);
        $this->assertSame($expected, $decoded);
    }

    public static function timestampProvider(): array
    {
        return [
            'integer-timestamp' => [
                ['__cbor_timestamp' => 1704067200.0],
                1704067200.0
            ],
            'float-timestamp' => [
                ['__cbor_timestamp' => 1704112245.5],
                1704112245.5
            ],
        ];
    }

    public function testEncodeTimestampWithMilliseconds(): void
    {
        $timestamp = 1704067200.123456;
        $encoded = $this->encoder->encode(['__cbor_timestamp' => $timestamp]);

        // Tag 1 + float64
        $this->assertSame("\xC1", $encoded[0]);
        $this->assertSame("\xFB", $encoded[1]);

        // Verify roundtrip preserves precision
        $decoded = $this->decoder->decode($encoded);
        $this->assertEqualsWithDelta($timestamp, $decoded, 0.000001);
    }

    public function testEncodeEmptyMap(): void
    {
        $this->assertSame("\xA0", $this->encoder->encodeEmptyMap());
    }

    public function testEncodeEmptyIndefiniteMap(): void
    {
        $this->assertSame("\xBF\xFF", $this->encoder->encodeEmptyIndefiniteMap());
    }

    public function testEncodeObjectThrowsForNonDateTime(): void
    {
        $this->expectException(CborException::class);
        $this->expectExceptionMessage('Cannot encode object of type: stdClass');

        $obj = new \stdClass();
        $obj->foo = 'bar';
        $obj->num = 42;

        $this->encoder->encode($obj);
    }

    public function testEncodeCachedIntegers(): void
    {
        // Test cached positive integers
        foreach ([0, 1, 10, 24, 25, 32, 100, 256, 1000, 1023] as $int) {
            $encoded = $this->encoder->encode($int);
            $this->assertIsString($encoded);
            $this->assertGreaterThan(0, strlen($encoded));
        }

        // Test cached negative integers
        foreach ([-1, -2, -5, -10, -25, -50, -100] as $int) {
            $encoded = $this->encoder->encode($int);
            $this->assertIsString($encoded);
            $this->assertGreaterThan(0, strlen($encoded));
        }
    }

    public function testEncodeNestedStructures(): void
    {
        $complex = [
            'name' => 'test',
            'values' => [1, 2, 3],
            'nested' => [
                'deep' => [
                    'value' => true
                ]
            ]
        ];

        $encoded = $this->encoder->encode($complex);

        // Should start with map major type
        $this->assertSame(0xA0, ord($encoded[0]) & 0xE0);
        $this->assertGreaterThan(10, strlen($encoded));
    }

    public function testEncodeLargeString(): void
    {
        // Test 4-byte length encoding
        $largeString = str_repeat('x', 70000);
        $encoded = $this->encoder->encode($largeString);

        // Should use 4-byte length (\x7A)
        $this->assertSame("\x7A", $encoded[0]);
        $this->assertSame(70000 + 5, strlen($encoded)); // 1 byte type + 4 bytes length + data
    }

    public function testEncodeBufferGrowth(): void
    {
        // Create encoder with small initial capacity
        $encoder = new CborEncoder(16);

        // Encode something larger than initial capacity
        $largeArray = array_fill(0, 100, 'test');
        $encoded = $encoder->encode($largeArray);

        // Should successfully encode without errors
        $this->assertGreaterThan(16, strlen($encoded));
    }

    public function testEncodeInvalidType(): void
    {
        $this->expectException(CborException::class);
        $this->expectExceptionMessage("Cannot encode value of type");

        $resource = fopen('php://memory', 'r');
        try {
            $this->encoder->encode($resource);
        } finally {
            fclose($resource);
        }
    }

    public function testEncodeMapWith24Elements(): void
    {
        $map = [];
        for ($i = 0; $i < 24; $i++) {
            $map["key$i"] = $i;
        }

        $encoded = $this->encoder->encode($map);

        // Should use 1-byte count encoding (\xB8)
        $this->assertSame("\xB8", $encoded[0]);
    }

    public function testEncodeMapWith256Elements(): void
    {
        $map = [];
        for ($i = 0; $i < 256; $i++) {
            $map["k$i"] = $i;
        }

        $encoded = $this->encoder->encode($map);

        // Should use 2-byte count encoding (\xB9)
        $this->assertSame("\xB9", $encoded[0]);
    }

    public function testEncodeRecursiveArrays(): void
    {
        $data = [
            [1, 2, [3, 4, [5, 6]]],
            ['a' => [1, 2], 'b' => [3, 4]]
        ];

        $encoded = $this->encoder->encode($data);

        // Should produce valid CBOR
        $this->assertIsString($encoded);
        $this->assertGreaterThan(10, strlen($encoded));
    }

    public function testEncodeAllSimpleValues(): void
    {
        // Test null, true, false
        $values = [
            [null, "\xF6"],
            [true, "\xF5"],
            [false, "\xF4"],
        ];

        foreach ($values as [$value, $expected]) {
            // Use base64 comparison to avoid display issues
            $this->assertSame(
                base64_encode($expected), 
                base64_encode($this->encoder->encode($value)),
                "Failed encoding " . var_export($value, true)
            );
        }
    }

    /**
     * @dataProvider byteStringProvider
     */
    public function testEncodeByteString(string $bytes, string $expected): void
    {
        $encoded = $this->encoder->encode(['__cbor_bytes' => $bytes]);
        $this->assertSame($expected, $encoded);
    }

    public static function byteStringProvider(): array
    {
        return [
            'empty' => ['', "\x40"],
            'single-byte' => ['x', "\x41x"],
            'small' => ['test', "\x44test"],
            '23-bytes' => [str_repeat('b', 23), "\x57" . str_repeat('b', 23)],
            '24-bytes' => [str_repeat('c', 24), "\x58\x18" . str_repeat('c', 24)],
            '255-bytes' => [str_repeat('d', 255), "\x58\xFF" . str_repeat('d', 255)],
            '256-bytes' => [str_repeat('e', 256), "\x59\x01\x00" . str_repeat('e', 256)],
            '65535-bytes' => [str_repeat('f', 65535), "\x59\xFF\xFF" . str_repeat('f', 65535)],
            '65536-bytes' => [str_repeat('g', 65536), "\x5A\x00\x01\x00\x00" . str_repeat('g', 65536)],
        ];
    }

    public function testEncodeByteStringInArray(): void
    {
        $data = [
            ['__cbor_bytes' => 'first'],
            ['__cbor_bytes' => 'second'],
        ];
        $encoded = $this->encoder->encode($data);
        
        // Array of 2 elements
        $this->assertSame("\x82", $encoded[0]);
        // First byte string (5 bytes)
        $this->assertSame("\x45", $encoded[1]);
        $this->assertSame('first', substr($encoded, 2, 5));
        // Second byte string (6 bytes)
        $this->assertSame("\x46", $encoded[7]);
        $this->assertSame('second', substr($encoded, 8, 6));
    }

    public function testEncodeByteStringInMap(): void
    {
        $data = ['binary' => ['__cbor_bytes' => 'data']];
        $encoded = $this->encoder->encode($data);
        
        // Map with 1 element
        $this->assertSame("\xA1", $encoded[0]);
        // Key "binary" (6 chars)
        $this->assertSame("\x66", $encoded[1]);
        $this->assertSame('binary', substr($encoded, 2, 6));
        // Value: byte string (4 bytes)
        $this->assertSame("\x44", $encoded[8]);
        $this->assertSame('data', substr($encoded, 9, 4));
    }

    public function testEncodeLargeArray65536Elements(): void
    {
        $array = array_fill(0, 65536, 0);
        $encoded = $this->encoder->encode($array);
        
        // Should use 4-byte count encoding (\x9A)
        $this->assertSame("\x9A", $encoded[0]);
        // Next 4 bytes should be 0x00010000 (65536 in big-endian)
        $this->assertSame("\x00\x01\x00\x00", substr($encoded, 1, 4));
    }

    public function testEncodeLargeMap65536Elements(): void
    {
        $map = [];
        for ($i = 0; $i < 65536; $i++) {
            // Use string keys to force map encoding instead of array
            $map["k$i"] = $i;
        }
        
        $encoded = $this->encoder->encode($map);
        
        // Should use 4-byte count encoding (\xBA)
        $this->assertSame("\xBA", $encoded[0]);
        // Next 4 bytes should be 0x00010000 (65536 in big-endian)
        $this->assertSame("\x00\x01\x00\x00", substr($encoded, 1, 4));
    }

    /**
     * @dataProvider integerBoundaryProvider
     */
    public function testIntegerBoundaries(int $value, string $expectedPrefix): void
    {
        $encoded = $this->encoder->encode($value);
        $this->assertStringStartsWith($expectedPrefix, $encoded);
    }

    public static function integerBoundaryProvider(): array
    {
        return [
            // Positive boundaries
            'exactly-24' => [24, "\x18\x18"],
            'exactly-256' => [256, "\x19\x01\x00"],
            'exactly-65536' => [65536, "\x1A\x00\x01\x00\x00"],
            'exactly-4294967296' => [4294967296, "\x1B\x00\x00\x00\x01\x00\x00\x00\x00"],
            
            // Negative boundaries
            'exactly-minus-25' => [-25, "\x38\x18"],
            'exactly-minus-257' => [-257, "\x39\x01\x00"],
            'exactly-minus-65537' => [-65537, "\x3A\x00\x01\x00\x00"],
            'exactly-minus-4294967297' => [-4294967297, "\x3B\x00\x00\x00\x01\x00\x00\x00\x00"],
        ];
    }

    public function testStringBoundaries(): void
    {
        // Exactly 65535 chars (max 2-byte length)
        $str65535 = str_repeat('x', 65535);
        $encoded = $this->encoder->encode($str65535);
        $this->assertSame("\x79\xFF\xFF", substr($encoded, 0, 3));
        
        // Exactly 65536 chars (min 4-byte length)
        $str65536 = str_repeat('y', 65536);
        $encoded = $this->encoder->encode($str65536);
        $this->assertSame("\x7A\x00\x01\x00\x00", substr($encoded, 0, 5));
    }

    public function testDeepNesting(): void
    {
        // Create 100 levels of nesting
        $data = ['value' => 1];
        for ($i = 0; $i < 100; $i++) {
            $data = ['nested' => $data];
        }
        
        $encoded = $this->encoder->encode($data);
        
        // Should start with map marker
        $this->assertSame(0xA0, ord($encoded[0]) & 0xE0);
        // Should be quite long due to nesting
        $this->assertGreaterThan(200, strlen($encoded));
    }

    public function testComplexNestedByteStrings(): void
    {
        $data = [
            'files' => [
                ['name' => 'file1', 'data' => ['__cbor_bytes' => 'content1']],
                ['name' => 'file2', 'data' => ['__cbor_bytes' => 'content2']],
            ],
            'metadata' => [
                'checksum' => ['__cbor_bytes' => hash('sha256', 'test', true)],
            ],
        ];
        
        $encoded = $this->encoder->encode($data);
        
        // Should be a map
        $this->assertSame(0xA0, ord($encoded[0]) & 0xE0);
        // Should contain byte string markers
        $this->assertStringContainsString("\x48content1", $encoded);
        $this->assertStringContainsString("\x48content2", $encoded);
    }

    public function testMaxInt64Values(): void
    {
        // PHP_INT_MAX on 64-bit systems
        $maxInt = PHP_INT_MAX;
        $encoded = $this->encoder->encode($maxInt);
        $this->assertSame("\x1B", $encoded[0]);
        
        // PHP_INT_MIN on 64-bit systems  
        $minInt = PHP_INT_MIN;
        $encoded = $this->encoder->encode($minInt);
        $this->assertSame("\x3B", $encoded[0]);
    }

    public function testByteStringWithNullBytes(): void
    {
        // Binary data with null bytes
        $binaryData = "test\x00data\x00with\x00nulls";
        $encoded = $this->encoder->encode(['__cbor_bytes' => $binaryData]);
        
        $expectedLength = strlen($binaryData);
        $this->assertSame(chr(0x40 | $expectedLength), $encoded[0]);
        $this->assertSame($binaryData, substr($encoded, 1));
    }
}
