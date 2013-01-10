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

use Aws\Common\Exception\InvalidArgumentException;

/**
 * Endpoints represent a specific region of a service
 */
class Endpoint implements \Serializable
{
    /**
     * @var array Array of URI schemes supported by the service (e.g. http/https)
     */
    protected $schemes = array();

    /**
     * @var Region Region of the endpoint
     */
    protected $region;

    /**
     * @var Service Service of the endpoint
     */
    protected $service;

    /**
     * @var string Hostname of the service
     */
    protected $host;

    /**
     * Create a new endpoint
     *
     * @param string  $host    Hostname of the endpoint
     * @param Region  $region  Endpoint region
     * @param Service $service Endpoint service
     * @param array   $schemes Supported URI schemes
     */
    public function __construct($host, Region $region, Service $service, array $schemes = array('http', 'https'))
    {
        $this->host = $host;
        $this->region = $region;
        $this->service = $service;
        $this->schemes = $schemes;
    }

    /**
     * Serialize the endpoint
     *
     * @return string
     */
    public function serialize()
    {
        return json_encode(array(
            'host'              => $this->host,
            'region.name'       => $this->region->getName(),
            'service.name'      => $this->service->getName(),
            'service.full_name' => $this->service->getFullName(),
            'schemes'           => $this->schemes
        ));
    }

    /**
     * Unserialize the endpoint
     *
     * @param string $serialized Serialized data
     */
    public function unserialize($serialized)
    {
        $data = json_decode($serialized, true);
        $this->host = $data['host'];
        $this->schemes = $data['schemes'];
        $this->region = new Region($data['region.name']);
        $this->service = new Service($data['service.name'], $data['service.full_name']);
    }

    /**
     * Get the service of the endpoint
     *
     * @return Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Get the region of the endpoint
     *
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Check if the region supports a particular URI scheme (e.g. http, https)
     *
     * @param string $scheme Scheme to check (e.g. http, https)
     *
     * @return string
     */
    public function supportsScheme($scheme)
    {
        return in_array($scheme, $this->schemes);
    }

    /**
     * Get the host of the endpoint
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Get the base URL used with a client
     *
     * @param string $scheme Scheme of the base URL
     *
     * @return string
     * @throws InvalidArgumentException if the scheme is not supported
     */
    public function getBaseUrl($scheme)
    {
        if (!$scheme) {
            throw new InvalidArgumentException('No URI scheme was provided');
        } elseif (!$this->supportsScheme($scheme)) {
            throw new InvalidArgumentException(
                sprintf(
                    'The %s region of %s does not support the %s URI scheme',
                    $this->getRegion()->getName(),
                    $this->getService()->getName(),
                    $scheme
            ));
        }

        return $scheme . '://' . $this->getHost();
    }
}
