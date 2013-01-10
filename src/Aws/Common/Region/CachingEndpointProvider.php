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

namespace Aws\Common\Region;

use Guzzle\Cache\CacheAdapterInterface;

/**
 * Provides a caching layer to an endpoint provider
 */
class CachingEndpointProvider implements EndpointProviderInterface
{
    /**
     * @var EndpointProviderInterface The decorated endpoint provider
     */
    protected $provider;

    /**
     * @var CacheAdapterInterface Cache used to cache previously fetched endpoints
     */
    protected $cache;

    /**
     * Create a new CachingEndpointProvider
     *
     * @param EndpointProviderInterface $provider The decorated endpoint provider to cache
     * @param CacheAdapterInterface     $cache    Cache used to cache previously fetched endpoints
     *
     * @return self
     */
    public function __construct(EndpointProviderInterface $provider, CacheAdapterInterface $cache)
    {
        $this->provider = $provider;
        $this->cache = $cache;
    }

    /**
     * {@inheritdoc}
     */
    public function getRegions($serviceName = null)
    {
        return $this->provider->getRegions($serviceName);
    }

    /**
     * {@inheritdoc}
     */
    public function getServices($regionName = null)
    {
        return $this->provider->getServices($regionName);
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpoint($serviceName, $regionName)
    {
        $id = "{$serviceName}_{$regionName}";
        if ($endpoint = $this->cache->fetch($id)) {
            return $endpoint;
        } else {
            $endpoint = $this->provider->getEndpoint($serviceName, $regionName);
            $this->cache->save($id, $endpoint, 86400);
            return $endpoint;
        }
    }
}
