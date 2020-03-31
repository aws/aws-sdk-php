<?php

namespace Aws\Test\Retry;

use Aws\Retry\Configuration;
use PHPUnit\Framework\TestCase;

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

    /**
     * @expectedException \Aws\Retry\Exception\ConfigurationException
     * @expectedExceptionMessage The 'maxAttempts' parameter has to be an integer >= 1
     */
    public function testHandlesInvalidMaxAttempts()
    {
        new Configuration('standard', 0);
    }

    /**
     * @expectedException \Aws\Retry\Exception\ConfigurationException
     * @expectedExceptionMessage 'foo' is not a valid mode
     */
    public function testHandlesInvalidMode()
    {
        new Configuration('foo', 5);
    }
}
