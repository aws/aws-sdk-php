<?php

namespace Aws\Test\ConfigurationMode;

use Aws\ConfigurationMode\Configuration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\ConfigurationMode\Configuration
 */
class ConfigurationTest extends TestCase
{
    public function testGetsCorrectValues()
    {
        $data = \Aws\load_compiled_json(
            __DIR__ . '/fixtures/sdk-default-configuration.json'
        );
        $config = new Configuration($data, 'standard');
        $this->assertSame('standard', $config->getMode());
    }

    public function testToArray()
    {
        $data = \Aws\load_compiled_json(
            __DIR__ . '/fixtures/sdk-default-configuration.json'
        );
        $config = new Configuration($data,'standard');
        $expected = [
            'mode' => 'standard',
            'retry_mode' => 'standard',
            'sts_regional_endpoints' => 'regional',
            's3_us_east_1_regional_endpoint' => 'regional',
            'connect_timeout_in_milliseconds' => 2000,
            'http_request_timeout_in_milliseconds' => null,
        ];
        $this->assertEquals($expected, $config->toArray());
    }

    public function testToArrayWithLegacy()
    {
        $data = \Aws\load_compiled_json(
            __DIR__ . '/fixtures/sdk-default-configuration.json'
        );
        $config = new Configuration($data,'legacy');
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

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage 'foo' is not a valid mode
     */
    public function testHandlesInvalidMode()
    {
        $data = \Aws\load_compiled_json(
            __DIR__ . '/fixtures/sdk-default-configuration.json'
        );
        new Configuration($data, 'foo');
    }
}
