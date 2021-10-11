<?php

namespace Aws\Test\Sts\RegionalEndpoints;

use Aws\Sts\RegionalEndpoints\Configuration;
use Aws\Test\Polyfill\PHPUnit\PHPUnitCompatTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Sts\RegionalEndpoints\Configuration
 */
class ConfigurationTest extends TestCase
{
    use PHPUnitCompatTrait;

    public function testGetsCorrectValues()
    {
        $config = new Configuration('regional');
        $this->assertSame('regional', $config->getEndpointsType());
    }

    public function testToArray()
    {
        $config = new Configuration('regional');
        $expected = [
            'endpoints_type' => 'regional',
        ];
        $this->assertEquals($expected, $config->toArray());
    }

    public function testThrowsOnInvalidEndpointsType()
    {
        $this->expectExceptionMessage("Configuration parameter must either be 'legacy' or 'regional'.");
        $this->expectException(\InvalidArgumentException::class);
        new Configuration('invalid_type');
    }
}
