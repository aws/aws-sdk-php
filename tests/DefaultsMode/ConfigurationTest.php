<?php

namespace Aws\Test\DefaultsMode;

use Aws\DefaultsMode\Configuration;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\DefaultsMode\Configuration
 */
class ConfigurationTest extends TestCase
{
    public function testGetsCorrectValues()
    {
        $config = new Configuration('standard');
        $this->assertSame('standard', $config->getMode());
    }

    public function testToArray()
    {
        $config = new Configuration('standard');
        $configArray = $config->toArray();
        $this->assertArrayHasKey('mode', $configArray);
        $this->assertArrayHasKey('retry_mode', $configArray);
        $this->assertArrayHasKey('sts_regional_endpoints', $configArray);
        $this->assertArrayHasKey('s3_us_east_1_regional_endpoint', $configArray);
        $this->assertArrayHasKey('connect_timeout_in_milliseconds', $configArray);
        $this->assertArrayHasKey('http_request_timeout_in_milliseconds', $configArray);
    }

    public function testToArrayWithLegacy()
    {
        $config = new Configuration('legacy');
        $expected = [
            'mode' => 'legacy',
            'retry_mode' => null,
            'sts_regional_endpoints' => null,
            's3_us_east_1_regional_endpoint' => null,
            'connect_timeout_in_milliseconds' => null,
            'http_request_timeout_in_milliseconds' => null,
        ];
        $this->assertEquals($expected, $config->toArray());
    }

    public function testHandlesInvalidMode()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("'foo' is not a valid mode");
        new Configuration('foo');
    }
}
