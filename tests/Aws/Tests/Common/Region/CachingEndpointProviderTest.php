<?php

namespace Aws\Tests\Common\Region;

use Aws\Common\Region\CachingEndpointProvider;
use Aws\Common\Region\XmlEndpointProvider;
use Guzzle\Common\Cache\DoctrineCacheAdapter;
use Doctrine\Common\Cache\ArrayCache;

/**
 * @covers Aws\Common\Region\CachingEndpointProvider
 */
class CachingEndpointProviderTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @var ArrayCache
     */
    protected $cache;

    /**
     * @var DoctrineCacheAdapter
     */
    protected $adapter;

    /**
     * @var XmlEndpointProvider
     */
    protected $xml;

    /**
     * @var CachingEndpointProvider
     */
    protected $provider;

    public function setUp()
    {
        $this->cache = new ArrayCache();
        $this->adapter = new DoctrineCacheAdapter($this->cache);
        $this->xml = new XmlEndpointProvider();
        $this->provider = new CachingEndpointProvider($this->xml, $this->adapter);
    }

    public function testProxiesRegionAndServiceCalls()
    {
        $this->assertNotEmpty($this->provider->getRegions());
        $this->assertNotEmpty($this->provider->getServices());
    }

    public function testProxiesCallsOnCacheMiss()
    {
        $endpoint = $this->provider->getEndpoint('s3', 'us-east-1');
        $this->assertInstanceOf('Aws\Common\Region\Endpoint', $endpoint);
        $this->assertSame($endpoint, $this->cache->fetch('s3_us-east-1'));
        $this->assertSame($endpoint, $this->provider->getEndpoint('s3', 'us-east-1'));
    }
}
