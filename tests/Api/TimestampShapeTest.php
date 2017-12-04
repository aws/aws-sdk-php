<?php
namespace Aws\Test\Api;

use Aws\Api\TimestampShape;
use Aws\Api\ShapeMap;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\TimestampShape
 */
class TimestampShapeTest extends TestCase
{
    public function formatProvider()
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
            [new \DateTime('january 5, 1999'), 'rfc822', 'Tue, 05 Jan 1999 00:00:00 GMT']
        ];
    }

    /**
     * @dataProvider formatProvider
     */
    public function testFormatsData($value, $format, $result)
    {
        $s = new TimestampShape([], new ShapeMap([]));
        $this->assertEquals($result, $s->format($value, $format));
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testValidatesTimestampFormat()
    {
        $s = new TimestampShape([], new ShapeMap([]));
        $s->format('now', 'foo');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testValidatesTimestampValue()
    {
        $s = new TimestampShape([], new ShapeMap([]));
        $s->format(true, 'iso8601');
    }
}
