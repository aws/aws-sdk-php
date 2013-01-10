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
 * Endpoint provider used to provide regions, services, and endpoints (combinations of the two)
 */
interface EndpointProviderInterface
{
    /**
     * Get an array of available regions
     *
     * @param string $serviceName You can optionally specify the name of the service to limit your results to only
     *                            return regions that are available to a particular service.
     *
     * @return array Returns an array of {@see Region} objects
     */
    public function getRegions($serviceName = null);

    /**
     * Get an array of available services
     *
     * @param string $regionName You can optionally specify the name of the region to limit your results to only
     *                           return services that are available in a particular region.
     *
     * @return array Returns an array of {@see Service} objects
     */
    public function getServices($regionName = null);

    /**
     * Get an {@see Endpoint} for a particular region and service combination
     *
     * @param string $serviceName Name of the service (e.g. s3)
     * @param string $regionName  Name of the region (e.g. us-west-1)
     *
     * @return Endpoint
     * @throws InvalidArgumentException if a region and service combination cannot be satisfied
     */
    public function getEndpoint($serviceName, $regionName);
}
