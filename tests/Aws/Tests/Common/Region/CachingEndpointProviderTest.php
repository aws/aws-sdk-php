<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Tests\Common\Region;

use Aws\Common\Region\CachingEndpointProvider;
use Aws\Common\Region\XmlEndpointProvider;
use Guzzle\Cache\DoctrineCacheAdapter;
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
