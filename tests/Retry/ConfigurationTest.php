<?php

namespace Aws\Test\Retry;

use Aws\Retry\Configuration;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Retry\Configuration
 */
class ConfigurationTest extends TestCase
{
    public function testGetsCorrectValues()
    {
        $config = new Configuration('adaptive', 8);
        $this->assertSame('adaptive', $config->getMode());
        $this->assertSame(8, $config->getMaxAttempts());
    }

    public function testToArray()
    {
        $config = new Configuration('standard', 25);
        $expected = [
            'mode' => 'standard',
            'max_attempts' => 25,
        ];
        $this->assertEquals($expected, $config->toArray());
    }

    public function testHandlesInvalidMaxAttempts()
    {
        $this->expectExceptionMessage("The 'maxAttempts' parameter has to be an integer >= 1");
        $this->expectException(\Aws\Retry\Exception\ConfigurationException::class);
        new Configuration('standard', 0);
    }

    public function testHandlesInvalidMode()
    {
        $this->expectExceptionMessage("'foo' is not a valid mode");
        $this->expectException(\Aws\Retry\Exception\ConfigurationException::class);
        new Configuration('foo', 5);
    }
}
