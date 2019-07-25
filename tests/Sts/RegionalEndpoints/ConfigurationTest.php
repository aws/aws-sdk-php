<?php

namespace Aws\Test\Sts\RegionalEndpoints;

use Aws\Sts\RegionalEndpoints\Configuration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Sts\RegionalEndpoints\Configuration
 */
class ConfigurationTest extends TestCase
{
    public function testGetsCorrectValues()
    {
        $config = new Configuration('regional');
        $this->assertEquals('regional', $config->getEndpointsType());
    }

    public function testToArray()
    {
        $config = new Configuration('regional');
        $expected = [
            'endpoints_type' => 'regional',
        ];
        $this->assertEquals($expected, $config->toArray());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Configuration parameter must either be 'legacy' or 'regional'.
     */
    public function testThrowsOnInvalidEndpointsType()
    {
        new Configuration('invalid_type');
    }
}
