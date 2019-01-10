<?php

namespace Aws\Test\EndpointDiscovery;

use Aws\EndpointDiscovery\Configuration;
use PHPUnit\Framework\TestCase;
use Psr\Log\InvalidArgumentException;

/**
 * @covers \Aws\EndpointDiscovery\Configuration
 */
class ConfigurationTest extends TestCase
{
    public function testGetsCorrectValues()
    {
        $config = new Configuration(true, 2000);
        $this->assertTrue($config->isEnabled());
        $this->assertSame(2000, $config->getCacheLimit());
    }

    public function testToArray()
    {
        $config = new Configuration(true, 3000);
        $expected = [
            'enabled' => true,
            'cache_limit' => 3000,
        ];
        $this->assertEquals($expected, $config->toArray());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testHandlesInvalidCacheLimit()
    {
        new Configuration(true, 'not_a_cache_limit');
    }

    public function testHandlesInvalidEnabled()
    {
        $config = new Configuration('not_a_bool', 4000);
        $this->assertFalse($config->isEnabled());
    }
}
