<?php
namespace Aws\Endpoint;

use GuzzleHttp\Utils;

/**
 * Provides endpoints based on an endpoint pattern configuration array.
 */
class PatternEndpointProvider
{
    /** @var array */
    private $patterns;

    /**
     * @param array $patterns Hash of endpoint patterns mapping to endpoint
     *                        configurations.
     */
    public function __construct(array $patterns)
    {
        $this->patterns = $patterns;
    }

    public function __invoke(array $args = [])
    {
        $service = isset($args['service']) ? $args['service'] : '';
        $region = isset($args['region']) ? $args['region'] : '';
        $keys = ["{$region}/{$service}", "{$region}/*", "*/{$service}", "*/*"];

        foreach ($keys as $key) {
            if (isset($this->patterns[$key])) {
                return $this->expand($this->patterns[$key], $args);
            }
        }

        return null;
    }

    private function expand(array $config, array $args)
    {
        $scheme = isset($args['scheme']) ? $args['scheme'] : 'https';
        $config['endpoint'] = $scheme . '://'
            . Utils::uriTemplate($config['endpoint'], $args);

        return $config;
    }
}
