<?php
namespace Aws\Common;

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
     * @return array Returns an array containing a 'uri' key and a 'properties'
     *               key containing an associative array of endpoint specific
     *               properties.
     */
    public function getEndpoint($service, array $args = []);
}
