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
        $this->assertEquals($t, $d->format('U'));
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
