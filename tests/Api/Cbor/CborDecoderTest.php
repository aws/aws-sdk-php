<?php
namespace Aws\Test\Api\Cbor;

use Aws\Api\Cbor\CborDecoder;
use Aws\Api\Cbor\Exception\CborException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Api\Cbor\CborDecoder
 */
class CborDecoderTest extends TestCase 
{
    private CborDecoder $decoder;

    protected function setUp(): void
    {
        $this->decoder = new CborDecoder();
    }

    /**
     * Generate CBOR for a map with numeric keys 0 to n-1, all with value 0
     */
    private static function generateMapCbor(int $count): string
    {
        if ($count < 24) {
            $cbor = chr(0xA0 | $count);
        } elseif ($count < 256) {
            $cbor = "\xB8" . chr($count);
        } elseif ($count < 65536) {
            $cbor = "\xB9" . pack('n', $count);
        } else {
            $cbor = "\xBA" . pack('N', $count);
        }
        
        for ($i = 0; $i < $count; $i++) {
            // Encode key
            if ($i < 24) {
                $cbor .= chr($i);
            } elseif ($i < 256) {
                $cbor .= "\x18" . chr($i);
            } else {
                $cbor .= "\x19" . pack('n', $i);
            }
            // Value is always 0
            $cbor .= "\x00";
        }
        
        return $cbor;
    }

    /**
     * @dataProvider simpleValuesProvider
     */
    public function testDecodeSimpleValues(string $cbor, mixed $expected): void
    {
        $this->assertSame($expected, $this->decoder->decode($cbor));
    }

    public static function simpleValuesProvider(): array
    {
        return [
            'null' => ["\xF6", null],
            'null-undefined' => ["\xF7", null], // undefined also decodes to null
            'true' => ["\xF5", true],
            'false' => ["\xF4", false],
        ];
    }

    /**
     * @dataProvider unsignedIntegerProvider
     */
    public function testDecodeUnsignedInteger(string $cbor, int $expected): void
    {
        $this->assertSame($expected, $this->decoder->decode($cbor));
    }

    public static function unsignedIntegerProvider(): array
    {
        return [
            '0' => ["\x00", 0],
            '1' => ["\x01", 1],
            '10' => ["\x0A", 10],
            '23' => ["\x17", 23],
            '24' => ["\x18\x18", 24],
            '255' => ["\x18\xFF", 255],
            '256' => ["\x19\x01\x00", 256],
            '65535' => ["\x19\xFF\xFF", 65535],
            '65536' => ["\x1A\x00\x01\x00\x00", 65536],
            '4294967295' => ["\x1A\xFF\xFF\xFF\xFF", 4294967295],
            '4294967296' => ["\x1B\x00\x00\x00\x01\x00\x00\x00\x00", 4294967296],
            'max-int64' => ["\x1B\x7F\xFF\xFF\xFF\xFF\xFF\xFF\xFF", PHP_INT_MAX],
        ];
    }

    /**
     * @dataProvider negativeIntegerProvider
     */
    public function testDecodeNegativeInteger(string $cbor, int $expected): void
    {
        $this->assertSame($expected, $this->decoder->decode($cbor));
    }

    public static function negativeIntegerProvider(): array
    {
        return [
            '-1' => ["\x20", -1],
            '-10' => ["\x29", -10],
            '-24' => ["\x37", -24],
            '-25' => ["\x38\x18", -25],
            '-256' => ["\x38\xFF", -256],
            '-257' => ["\x39\x01\x00", -257],
            '-65536' => ["\x39\xFF\xFF", -65536],
            '-65537' => ["\x3A\x00\x01\x00\x00", -65537],
            '-4294967296' => ["\x3A\xFF\xFF\xFF\xFF", -4294967296],
            '-4294967297' => ["\x3B\x00\x00\x00\x01\x00\x00\x00\x00", -4294967297],
        ];
    }

    /**
     * @dataProvider floatProvider
     */
    public function testDecodeFloat(string $cbor, float $expected): void
    {
        $result = $this->decoder->decode($cbor);
        if (is_nan($expected)) {
            $this->assertTrue(is_nan($result));
        } else {
            $this->assertSame($expected, $result);
        }
    }

    public static function floatProvider(): array
    {
        return [
            'half-zero' => ["\xF9\x00\x00", 0.0],
            'half-one' => ["\xF9\x3C\x00", 1.0],
            'half-minus-one' => ["\xF9\xBC\x00", -1.0],
            'half-infinity' => ["\xF9\x7C\x00", INF],
            'half-neg-infinity' => ["\xF9\xFC\x00", -INF],
            'half-nan' => ["\xF9\x7E\x00", NAN],
            'single-zero' => ["\xFA\x00\x00\x00\x00", 0.0],
            'single-1.5' => ["\xFA\x3F\xC0\x00\x00", 1.5],
            'single-minus-4.25' => ["\xFA\xC0\x88\x00\x00", -4.25],
            'double-pi' => ["\xFB\x40\x09\x21\xFB\x54\x44\x2D\x18", 3.141592653589793],
            'double-infinity' => ["\xFB\x7F\xF0\x00\x00\x00\x00\x00\x00", INF],
            'double-neg-infinity' => ["\xFB\xFF\xF0\x00\x00\x00\x00\x00\x00", -INF],
            'double-nan' => ["\xFB\x7F\xF8\x00\x00\x00\x00\x00\x00", NAN],
        ];
    }

    /**
     * @dataProvider stringProvider
     */
    public function testDecodeString(string $cbor, string $expected): void
    {
        $this->assertSame($expected, $this->decoder->decode($cbor));
    }

    public static function stringProvider(): array
    {
        return [
            'empty' => ["\x60", ''],
            'single-char' => ["\x61a", 'a'],
            'hello' => ["\x65hello", 'hello'],
            '23-chars' => ["\x77" . str_repeat('x', 23), str_repeat('x', 23)],
            '24-chars' => ["\x78\x18" . str_repeat('y', 24), str_repeat('y', 24)],
            '255-chars' => ["\x78\xFF" . str_repeat('z', 255), str_repeat('z', 255)],
            '256-chars' => ["\x79\x01\x00" . str_repeat('a', 256), str_repeat('a', 256)],
            '65535-chars' => ["\x79\xFF\xFF" . str_repeat('b', 65535), str_repeat('b', 65535)],
            '65536-chars' => ["\x7A\x00\x01\x00\x00" . str_repeat('c', 65536), str_repeat('c', 65536)],
            'unicode' => ["\x6CHello 世界", 'Hello 世界'],
        ];
    }

    /**
     * @dataProvider byteStringProvider
     */
    public function testDecodeByteString(string $cbor, string $expected): void
    {
        $this->assertSame($expected, $this->decoder->decode($cbor));
    }

    public static function byteStringProvider(): array
    {
        return [
            'empty' => ["\x40", ''],
            'single-byte' => ["\x41x", 'x'],
            'small' => ["\x44test", 'test'],
            '23-bytes' => ["\x57" . str_repeat('b', 23), str_repeat('b', 23)],
            '24-bytes' => ["\x58\x18" . str_repeat('c', 24), str_repeat('c', 24)],
            '255-bytes' => ["\x58\xFF" . str_repeat('d', 255), str_repeat('d', 255)],
            '256-bytes' => ["\x59\x01\x00" . str_repeat('e', 256), str_repeat('e', 256)],
            '65535-bytes' => ["\x59\xFF\xFF" . str_repeat('f', 65535), str_repeat('f', 65535)],
            '65536-bytes' => ["\x5A\x00\x01\x00\x00" . str_repeat('g', 65536), str_repeat('g', 65536)],
            'binary-with-nulls' => ["\x44\x00\x01\x02\x03", "\x00\x01\x02\x03"],
        ];
    }

    /**
     * @dataProvider arrayProvider
     */
    public function testDecodeArray(string $cbor, array $expected): void
    {
        $this->assertSame($expected, $this->decoder->decode($cbor));
    }

    public static function arrayProvider(): array
    {
        return [
            'empty' => ["\x80", []],
            'single-element' => ["\x81\x01", [1]],
            'three-elements' => ["\x83\x01\x02\x03", [1, 2, 3]],
            'mixed-types' => ["\x83\x01\x61a\xF5", [1, 'a', true]],
            'nested-array' => ["\x82\x01\x82\x02\x03", [1, [2, 3]]],
            '24-elements' => ["\x98\x18" . str_repeat("\x00", 24), array_fill(0, 24, 0)],
            '256-elements' => ["\x99\x01\x00" . str_repeat("\x00", 256), array_fill(0, 256, 0)],
            '65536-elements' => ["\x9A\x00\x01\x00\x00" . str_repeat("\x00", 65536), array_fill(0, 65536, 0)],
        ];
    }

    /**
     * @dataProvider mapProvider
     */
    public function testDecodeMap(string $cbor, array $expected): void
    {
        $this->assertEquals($expected, $this->decoder->decode($cbor));
    }

    public static function mapProvider(): array
    {
        return [
            'empty' => ["\xA0", []],
            'single-string-key' => ["\xA1\x61a\x01", ['a' => 1]],
            'single-int-key' => ["\xA1\x01\x61a", [1 => 'a']],
            'multiple-string-keys' => ["\xA2\x61a\x01\x61b\x02", ['a' => 1, 'b' => 2]],
            'multiple-int-keys' => ["\xA2\x01\x61a\x02\x61b", [1 => 'a', 2 => 'b']],
            'nested-map' => ["\xA1\x61a\xA1\x61b\x01", ['a' => ['b' => 1]]],
            'map-with-array' => ["\xA1\x65items\x83\x01\x02\x03", ['items' => [1, 2, 3]]],
            '24-elements' => [
                self::generateMapCbor(24),
                array_fill_keys(range(0, 23), 0)
            ],
            '256-elements' => [
                self::generateMapCbor(256),
                array_fill_keys(range(0, 255), 0)
            ],
        ];
    }

    /**
     * @dataProvider indefiniteProvider
     */
    public function testDecodeIndefinite(string $cbor, mixed $expected): void
    {
        $this->assertEquals($expected, $this->decoder->decode($cbor));
    }

    public static function indefiniteProvider(): array
    {
        return [
            'indefinite-byte-string' => ["\x5F\x42\x01\x02\x42\x03\x04\xFF", "\x01\x02\x03\x04"],
            'indefinite-byte-string-empty' => ["\x5F\xFF", ''],
            'indefinite-text-string' => ["\x7F\x62ab\x62cd\xFF", 'abcd'],
            'indefinite-text-string-empty' => ["\x7F\xFF", ''],
            'indefinite-array' => ["\x9F\x01\x02\x03\xFF", [1, 2, 3]],
            'indefinite-array-empty' => ["\x9F\xFF", []],
            'indefinite-map' => ["\xBF\x61a\x01\x61b\x02\xFF", ['a' => 1, 'b' => 2]],
            'indefinite-map-empty' => ["\xBF\xFF", []],
            'nested-indefinite' => [
                "\x9F\xBF\x61a\x01\xFF\xFF",
                [['a' => 1]]
            ],
        ];
    }

    public function testDecodeTaggedValues(): void
    {
        // Tag 0: standard date/time string (we just skip the tag)
        $cbor = "\xC0\x65hello";
        $this->assertSame('hello', $this->decoder->decode($cbor));

        // Tag 1: epoch timestamp (we skip the tag and return the value)
        $cbor = "\xC1\x1A\x5F\x5E\x10\x00"; // Timestamp as int
        $this->assertSame(1600000000, $this->decoder->decode($cbor));

        // Multiple tags (nested)
        $cbor = "\xC0\xC1\x01";
        $this->assertSame(1, $this->decoder->decode($cbor));
    }

    public function testDecodeComplexStructures(): void
    {
        // Complex nested structure
        $cbor = "\xA3" .              // Map with 3 items
                "\x64name" .          // Key: "name"
                "\x64test" .          // Value: "test"
                "\x66values" .        // Key: "values"
                "\x83\x01\x02\x03" .  // Value: [1, 2, 3]
                "\x66nested" .        // Key: "nested"
                "\xA1" .              // Value: map with 1 item
                "\x64deep" .          // Key: "deep"
                "\xA1" .              // Value: map with 1 item
                "\x65value" .         // Key: "value"
                "\xF5";               // Value: true

        $expected = [
            'name' => 'test',
            'values' => [1, 2, 3],
            'nested' => [
                'deep' => [
                    'value' => true
                ]
            ]
        ];

        $this->assertEquals($expected, $this->decoder->decode($cbor));
    }

    public function testDecodeByteStringInComplexStructure(): void
    {
        // Map containing byte strings
        $cbor = "\xA2" .              // Map with 2 items
                "\x66binary" .        // Key: "binary"
                "\x44data" .          // Value: 4-byte byte string "data"
                "\x65files" .         // Key: "files"
                "\x82" .              // Value: array with 2 items
                "\x45first" .         // Item 1: 5-byte byte string "first"
                "\x46second";         // Item 2: 6-byte byte string "second"

        $expected = [
            'binary' => 'data',
            'files' => ['first', 'second']
        ];

        $this->assertEquals($expected, $this->decoder->decode($cbor));
    }

    public function testDecodeAll(): void
    {
        // Multiple values in sequence
        $cbor = "\x01" .              // 1
                "\x61a" .             // "a"
                "\xF5" .              // true
                "\x82\x02\x03";       // [2, 3]

        $expected = [1, 'a', true, [2, 3]];
        
        $this->assertSame($expected, $this->decoder->decodeAll($cbor));
    }

    public function testDecodeAllEmpty(): void
    {
        $this->assertSame([], $this->decoder->decodeAll(''));
    }

    public function testDecodeLargeMap65536Elements(): void
    {
        // Map with 65536 elements (4-byte count)
        $data = "\xBA\x00\x01\x00\x00";
        for ($i = 0; $i < 65536; $i++) {
            // Each key-value pair: small int key + small int value
            if ($i < 24) {
                $data .= chr($i) . "\x00";
            } elseif ($i < 256) {
                $data .= "\x18" . chr($i) . "\x00";
            } else {
                $data .= "\x19" . pack('n', $i) . "\x00";
            }
        }
        
        $result = $this->decoder->decode($data);
        $this->assertCount(65536, $result);
        $this->assertSame(0, $result[0]);
        $this->assertSame(0, $result[65535]);
    }

    public function testDecodeDeepNesting(): void
    {
        // Create 100 levels of nesting
        $cbor = str_repeat("\xA1\x61a", 100) . "\x01";
        
        $result = $this->decoder->decode($cbor);
        
        // Navigate to the deepest value
        $current = $result;
        for ($i = 0; $i < 100; $i++) {
            $this->assertIsArray($current);
            $this->assertArrayHasKey('a', $current);
            $current = $current['a'];
        }
        $this->assertSame(1, $current);
    }

    /**
     * @dataProvider errorProvider
     */
    public function testDecodeErrors(string $cbor, string $expectedMessage): void
    {
        $this->expectException(CborException::class);
        $this->expectExceptionMessage($expectedMessage);
        
        $this->decoder->decode($cbor);
    }

    public static function errorProvider(): array
    {
        return [
            'empty-data' => ['', 'No data to decode'],
            'unexpected-end' => ["\x81", 'Unexpected end of data'],
            'not-enough-data-int' => ["\x18", 'Not enough data'],
            'not-enough-data-string' => ["\x61", 'Not enough data'],
            'not-enough-data-array' => ["\x82\x01", 'Unexpected end of data'],
            'unexpected-break' => ["\xFF", 'Unexpected break'],
            'invalid-additional-info' => ["\x1C", 'Invalid additional info for integer: 28'],
            'invalid-chunk-byte-string' => ["\x5F\x61a\xFF", 'Invalid chunk in indefinite string'],
            'invalid-chunk-text-string' => ["\x7F\x41a\xFF", 'Invalid chunk in indefinite string'],
            'indefinite-unexpected-end-byte' => ["\x5F\x42ab", 'Unexpected end of data'],
            'indefinite-unexpected-end-text' => ["\x7F\x62ab", 'Unexpected end of data'],
            'indefinite-unexpected-end-array' => ["\x9F\x01", 'Unexpected end of data'],
            'indefinite-unexpected-end-map' => ["\xBF\x61a", 'Unexpected end of data'],
        ];
    }

    public function testDecodeUnknownSimpleValue(): void
    {
        $this->expectException(CborException::class);
        $this->expectExceptionMessage('Unknown simple value: 28');

        $this->decoder->decode(hex2bin('fc'));
    }

    public function testDecodeHalfPrecisionFloatSpecialValues(): void
    {
        // Half-precision denormalized number
        $cbor = "\xF9\x00\x01"; // Smallest positive denormalized
        $this->assertGreaterThan(0, $this->decoder->decode($cbor));
        
        // Half-precision negative zero
        $cbor = "\xF9\x80\x00";
        $this->assertSame(-0.0, $this->decoder->decode($cbor));
    }

    public function testDecodeMapFastPath(): void
    {
        // Test the fast path for maps with 0-23 elements
        for ($i = 0; $i < 24; $i++) {
            $cbor = chr(0xA0 | $i);
            for ($j = 0; $j < $i; $j++) {
                // Each key needs to be different
                $cbor .= chr($j) . "\x00"; // Key: $j, Value: 0
            }
            
            $result = $this->decoder->decode($cbor);
            $this->assertCount($i, $result);
        }
    }

    public function testDecodeStringFastPath(): void
    {
        // Test the fast path for strings with 0-23 characters
        for ($i = 0; $i < 24; $i++) {
            $cbor = chr(0x60 | $i) . str_repeat('x', $i);
            $result = $this->decoder->decode($cbor);
            $this->assertSame(str_repeat('x', $i), $result);
        }
    }

    public function testDecodeIntegerFastPath(): void
    {
        // Test the fast path for small unsigned integers 0-23
        for ($i = 0; $i < 24; $i++) {
            $this->assertSame($i, $this->decoder->decode(chr($i)));
        }
    }

    public function testDecodeArrayFastPath(): void
    {
        // Test the fast path for arrays with 0-23 elements
        for ($i = 0; $i < 24; $i++) {
            $cbor = chr(0x80 | $i) . str_repeat("\x00", $i);
            $result = $this->decoder->decode($cbor);
            $this->assertCount($i, $result);
        }
    }

    public function testDecodeComplexIndefinite(): void
    {
        // Indefinite array containing indefinite maps
        $cbor = "\x9F" .              // Indefinite array
                "\xBF" .              // Indefinite map
                "\x61a\x01" .         // "a": 1
                "\xFF" .              // End map
                "\xBF" .              // Indefinite map
                "\x61b\x02" .         // "b": 2
                "\xFF" .              // End map
                "\xFF";               // End array

        $expected = [
            ['a' => 1],
            ['b' => 2]
        ];

        $this->assertEquals($expected, $this->decoder->decode($cbor));
    }

    public function testDecodeMaxValues(): void
    {
        // Maximum 64-bit unsigned integer
        $cbor = "\x1B\xFF\xFF\xFF\xFF\xFF\xFF\xFF\xFF";
        if (PHP_INT_SIZE === 8) {
            $this->assertSame(-1, $this->decoder->decode($cbor)); // Wraps to -1 on 64-bit PHP
        }

        // Maximum negative integer that fits in PHP (-9223372036854775808)
        // CBOR encoding: major type 1, value = -1 - result, so value = 9223372036854775807
        $cbor = "\x3B\x7F\xFF\xFF\xFF\xFF\xFF\xFF\xFF";
        $this->assertSame(PHP_INT_MIN, $this->decoder->decode($cbor)); // PHP_INT_MIN constant
    }

    public function testDecodePerformance(): void
    {
        // Large complex structure
        $cbor = "\xBF"; // Start indefinite map
        for ($i = 0; $i < 10000; $i++) {
            $key = "field_$i";
            $keyLen = strlen($key);
            $cbor .= "\x78" . chr($keyLen) . $key;
            $value = "value_$i";
            $valueLen = strlen($value);
            $cbor .= "\x78" . chr($valueLen) . $value;
        }
        $cbor .= "\xFF"; // End indefinite map

        $start = microtime(true);
        $result = $this->decoder->decode($cbor);
        $duration = microtime(true) - $start;

        $this->assertLessThan(1.0, $duration);
        $this->assertCount(10000, $result);
    }

    /**
     * @dataProvider decodeSuccessFixtureProvider
     */
    public function testDecodeSuccessFromFixture(string $hex, mixed $expected): void
    {
        $cbor = hex2bin($hex);
        $actual = $this->decoder->decode($cbor);
        
        if (is_float($expected)) {
            if (is_nan($expected)) {
                $this->assertTrue(is_nan($actual));
            } elseif (is_infinite($expected)) {
                $this->assertEquals($expected, $actual);
            } else {
                $this->assertEqualsWithDelta($expected, $actual, 0.0000001);
            }
        } else {
            $this->assertEquals($expected, $actual);
        }
    }

    public static function decodeSuccessFixtureProvider(): \Generator
    {
        $file = __DIR__ . '/fixtures/decode-success-tests.json';
        if (!file_exists($file)) {
            return;
        }
        
        $fixtures = json_decode(file_get_contents($file), true);
        
        foreach ($fixtures as $fixture) {
            $description = $fixture['description'] ?? 'unknown';
            $input = $fixture['input'] ?? '';
            $expected = self::parseExpectedValue($fixture['expect'] ?? null);
            
            yield $description => [$input, $expected];
        }
    }

    /**
     * @dataProvider decodeErrorFixtureProvider
     */
    public function testDecodeErrorFromFixture(string $hex): void
    {
        $this->expectException(CborException::class);
        
        $cbor = hex2bin($hex);
        $this->decoder->decode($cbor);
    }

    public static function decodeErrorFixtureProvider(): \Generator
    {
        $file = __DIR__ . '/fixtures/decode-error-tests.json';
        if (!file_exists($file)) {
            return;
        }
        
        $fixtures = json_decode(file_get_contents($file), true);
        
        foreach ($fixtures as $fixture) {
            $description = $fixture['description'] ?? 'unknown';
            $input = $fixture['input'] ?? '';
            
            yield $description => [$input];
        }
    }

    /**
     * Parse expected value from fixture format to PHP value
     */
    private static function parseExpectedValue($expect): mixed
    {
        if (!is_array($expect)) {
            return $expect;
        }
        
        // Atomic types
        if (isset($expect['uint'])) {
            $uint = $expect['uint'];
            // Handle overflow for max uint64
            if ($uint == 18446744073709551615) {
                return -1; // 0xFFFFFFFFFFFFFFFF wraps to -1 in PHP
            }
            return (int)$uint;
        }
        if (isset($expect['negint'])) {
            $negint = $expect['negint'];
            // Handle overflow for large negative beyond PHP range
            if ($negint == -18446744073709551615) {
                return 1; // Wraps after overflow
            }
            return (int)$negint;
        }
        if (isset($expect['bool'])) {
            return (bool)$expect['bool'];
        }
        if (isset($expect['null'])) {
            return null;
        }
        if (isset($expect['string'])) {
            return (string)$expect['string'];
        }
        if (isset($expect['bytestring'])) {
            if (is_array($expect['bytestring'])) {
                return implode('', array_map('chr', $expect['bytestring']));
            }
            return '';
        }
        
        // Float32 - bit pattern to float
        if (isset($expect['float32'])) {
            $packed = pack('N', $expect['float32']);
            return unpack('G', $packed)[1];
        }
        
        // Float64 - bit pattern to float
        if (isset($expect['float64'])) {
            if (PHP_INT_SIZE >= 8) {
                $packed = pack('J', $expect['float64']);
            } else {
                // 32-bit PHP
                $high = ($expect['float64'] >> 32) & 0xFFFFFFFF;
                $low = $expect['float64'] & 0xFFFFFFFF;
                $packed = pack('NN', $high, $low);
            }
            return unpack('E', $packed)[1];
        }
        
        // Collections
        if (isset($expect['list'])) {
            return array_map([self::class, 'parseExpectedValue'], $expect['list']);
        }
        
        if (isset($expect['map'])) {
            $result = [];
            foreach ($expect['map'] as $key => $value) {
                $result[$key] = self::parseExpectedValue($value);
            }
            return $result;
        }
        
        // Tags - decoder skips tags
        if (isset($expect['tag'])) {
            return self::parseExpectedValue($expect['tag']['value'] ?? null);
        }
        
        return null;
    }
}
