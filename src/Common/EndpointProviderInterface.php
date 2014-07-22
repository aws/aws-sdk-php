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
     * The args array accepts the following options:
     *
     * - region: Required region
     * - service: Required service name
     * - scheme: URL scheme (defaults to https)
     *
     * @param array $args Associative array of options used to resolve endpoints
     *
     * @return array Returns an array containing a 'uri' key and a 'properties'
     *               key containing an associative array of endpoint specific
     *               properties.
     *
     * @throws \Aws\Common\Exception\UnresolvedEndpointException
     */
    public function getEndpoint(array $args = []);
}
