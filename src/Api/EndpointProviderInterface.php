<?php

namespace Aws\Api;

/**
 * Provides endpoints for services.
 */
interface EndpointProviderInterface
{
    /**
     * Get an endpoint for a service.
     *
     * @param string $service Name of the service
     * @param array  $args    Array of arguments used when constructing
     *
     * @return string
     */
    public function getEndpoint($service, array $args = []);
}
