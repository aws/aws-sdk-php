<?php
namespace Aws\Test\Api;

use Aws\Api\TimestampShape;
use Aws\Api\ShapeMap;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(TimestampShape::class)]
class TimestampShapeTest extends TestCase
{
    public static function formatProvider(): array
    {
        $t = strtotime('january 5, 1999');

        return [
            ['january 5, 1999', 'iso8601', '1999-01-05T00:00:00Z'],
            ['january 5, 1999', 'rfc822', 'Tue, 05 Jan 1999 00:00:00 GMT'],
            ['january 5, 1999', 'unixTimestamp', '915494400'],
            [$t, 'iso8601', '1999-01-05T00:00:00Z'],
            [$t, 'rfc822', 'Tue, 05 Jan 1999 00:00:00 GMT'],
            [new \DateTime('january 5, 1999'), 'unixTimestamp', '915494400'],
            [new \DateTime('january 5, 1999'), 'iso8601', '1999-01-05T00:00:00Z'],
            [new \DateTime('january 5, 1999'), 'rfc822', 'Tue, 05 Jan 1999 00:00:00 GMT'],
            [new \DateTimeImmutable('january 5, 1999'), 'unixTimestamp', '915494400'],
            [new \DateTimeImmutable('january 5, 1999'), 'iso8601', '1999-01-05T00:00:00Z'],
            [new \DateTimeImmutable('january 5, 1999'), 'rfc822', 'Tue, 05 Jan 1999 00:00:00 GMT'],
            [915494400.0, 'unixTimestamp', 915494400.0],
            [915494400.0, 'iso8601', '1999-01-05T00:00:00Z'],
            [915494400.0, 'rfc822', 'Tue, 05 Jan 1999 00:00:00 GMT'],
            [915494400.123, 'unixTimestamp', 915494400.123],
            [915494400.999, 'iso8601', '1999-01-05T00:00:00.999000Z'],
            [915494400.999, 'rfc822', 'Tue, 05 Jan 1999 00:00:00 GMT'], // rfc822 is whole seconds only
            // Sub-second precision is preserved for DateTimeInterface values
            [new \DateTime('1999-01-05 00:00:00.123456 UTC'), 'unixTimestamp', 915494400.123456],
            [new \DateTime('1999-01-05 00:00:00.123456 UTC'), 'iso8601', '1999-01-05T00:00:00.123456Z'],
            [new \DateTime('1999-01-05 00:00:00.123456 UTC'), 'rfc822', 'Tue, 05 Jan 1999 00:00:00 GMT'],
            [new \DateTimeImmutable('1999-01-05 00:00:00.5 UTC'), 'unixTimestamp', 915494400.5],
            [new \DateTimeImmutable('1999-01-05 00:00:00.5 UTC'), 'iso8601', '1999-01-05T00:00:00.500000Z'],
            // ... and for string values
            ['1999-01-05T00:00:00.123456Z', 'unixTimestamp', 915494400.123456],
            ['1999-01-05T00:00:00.123456Z', 'iso8601', '1999-01-05T00:00:00.123456Z'],
            ['1999-01-05T00:00:00.123456Z', 'rfc822', 'Tue, 05 Jan 1999 00:00:00 GMT'],
            // Whole-second values are unchanged (no fractional component emitted)
            [new \DateTime('1999-01-05 00:00:00.000000 UTC'), 'unixTimestamp', 915494400],
            [new \DateTime('1999-01-05 00:00:00.000000 UTC'), 'iso8601', '1999-01-05T00:00:00Z'],
            // Pre-epoch values with a fractional component
            [new \DateTime('1969-12-31 23:59:58.5 UTC'), 'unixTimestamp', -1.5],
            [new \DateTime('1969-12-31 23:59:58.5 UTC'), 'iso8601', '1969-12-31T23:59:58.500000Z'],
            [-1.5, 'iso8601', '1969-12-31T23:59:58.500000Z'],
        ];
    }

    #[DataProvider('formatProvider')]
    public function testFormatsData($value, $format, $result)
    {
        $s = new TimestampShape([], new ShapeMap([]));
        $this->assertEquals($result, $s->format($value, $format));
    }

    public function testUnixTimestampWithMicrosecondsIsRoundedOnce()
    {
        // 1 + 3691 / 10**6 gives 1.0036909999999999; the correctly rounded
        // value is 1.003691.
        $dt = new \DateTimeImmutable('@1.003691');
        $this->assertSame(1.003691, TimestampShape::format($dt, 'unixTimestamp'));
    }

    public function testUnixTimestampReturnsIntForWholeSeconds()
    {
        $this->assertSame(
            915494400,
            TimestampShape::format(new \DateTime('january 5, 1999'), 'unixTimestamp')
        );
        $this->assertSame(
            915494400,
            TimestampShape::format('january 5, 1999', 'unixTimestamp')
        );
    }

    public static function formatAsStringProvider(): array
    {
        return [
            // (string) 1704110400.123456 would give "1704110400.1235" under
            // the default precision=14 ini setting.
            [new \DateTime('2024-01-01T12:00:00.123456Z'), 'unixTimestamp', '1704110400.123456'],
            [1704110400.123456, 'unixTimestamp', '1704110400.123456'],
            ['2024-01-01T12:00:00.123456Z', 'unixTimestamp', '1704110400.123456'],
            [new \DateTime('2024-01-01T12:00:00.5Z'), 'unixTimestamp', '1704110400.5'],
            [-1.5, 'unixTimestamp', '-1.5'],
            // Whole seconds carry no fractional component
            [new \DateTime('2024-01-01T12:00:00Z'), 'unixTimestamp', '1704110400'],
            [1704110400, 'unixTimestamp', '1704110400'],
            [1704110400.0, 'unixTimestamp', '1704110400'],
            // Other formats are already strings
            [new \DateTime('2024-01-01T12:00:00.123456Z'), 'iso8601', '2024-01-01T12:00:00.123456Z'],
            [new \DateTime('2024-01-01T12:00:00.123456Z'), 'rfc822', 'Mon, 01 Jan 2024 12:00:00 GMT'],
        ];
    }

    #[DataProvider('formatAsStringProvider')]
    public function testFormatsDataAsString($value, $format, $result)
    {
        $this->assertSame($result, TimestampShape::formatAsString($value, $format));
    }

    public function testValidatesTimestampFormat()
    {
        $this->expectException(\UnexpectedValueException::class);
        $s = new TimestampShape([], new ShapeMap([]));
        $s->format('now', 'foo');
    }

    public function testValidatesTimestampValue()
    {
        $this->expectException(\InvalidArgumentException::class);
        $s = new TimestampShape([], new ShapeMap([]));
        $s->format(true, 'iso8601');
    }
}
