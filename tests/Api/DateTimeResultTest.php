<?php
namespace Aws\Test\Api;

use Aws\Api\DateTimeResult;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\DateTimeResult
 */
class DateTimeResultTest extends TestCase
{
    public function testCreatesFromEpoch()
    {
        $t = time();
        $d = DateTimeResult::fromEpoch($t);
        $this->assertSame((string) $t, $d->format('U'));
    }

    public function testCreatesFromEpochFloat()
    {
        $t = 16344171.123432;
        $d = DateTimeResult::fromEpoch($t);
        $this->assertSame('16344171', $d->format('U'));
        $this->assertSame(\PHP_VERSION_ID < 56000 ? '16344171.000000' : '16344171.123432', $d->format('U.u'));
    }

    public function testCreatesFromEpochFloatInForeignDecimalSeparatorFormat()
    {
        $oldLocale = setlocale(LC_ALL, 0);
        setlocale(LC_ALL, 'es_ES.UTF-8');
        $t = 16344171.123432;
        $d = DateTimeResult::fromEpoch($t);
        $this->assertSame('16344171', $d->format('U'));
        $this->assertSame('1970-07-09T04:02:51+00:00', (string)$d);
        $this->assertSame(\PHP_VERSION_ID < 56000 ? '16344171.000000' : '16344171.123432', $d->format('U.u'));
        setlocale(LC_ALL, $oldLocale);
    }

    public function testCastToIso8601String()
    {
        $t = time();
        $d = DateTimeResult::fromEpoch($t);
        $this->assertSame(gmdate('c', $t), (string) $d);
    }

    public function testJsonSerialzesAsIso8601()
    {
        $t = time();
        $d = DateTimeResult::fromEpoch($t);
        $this->assertSame('"' . gmdate('c', $t). '"', json_encode($d));
    }
}
