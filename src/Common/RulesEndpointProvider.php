<?php
namespace Aws\Common;

use Aws\Common\Exception\UnresolvedEndpointException;
use GuzzleHttp\Utils;

/**
 * Provides endpoints based on a rules configuration file.
 */
class RulesEndpointProvider
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

    /**
     * Creates and returns the default RulesEndpointProvider based on the
     * public rule sets.
     *
     * @return self
     */
    public static function fromDefaults()
    {
        return new self(require __DIR__ . '/Resources/public-endpoints.php');
    }

    /**
     * Creates and returns a RulesEndpointProvider based on a JSON file.
     *
     * @param string $path Path to a JSON rules file
     *
     * @return array
     * @throws \InvalidArgumentException on error
     */
    public static function fromJsonFile($path)
    {
        if (!file_exists($path)) {
            throw new \InvalidArgumentException("File not found: $path");
        }

        return new self(Utils::jsonDecode(file_get_contents($path), true));
    }

    public function __invoke(array $args = [])
    {
        if (!isset($args['service'])) {
            throw new \InvalidArgumentException('Requires a "service" value');
        }

        if (!isset($args['region'])) {
            throw new \InvalidArgumentException('Requires a "region" value');
        }

        foreach ($this->getKeys($args['region'], $args['service']) as $key) {
            if (isset($this->patterns[$key])) {
                return $this->expand($this->patterns[$key], $args);
            }
        }

        throw new UnresolvedEndpointException();
    }

    private function expand(array $config, array $args)
    {
        $scheme = isset($args['scheme']) ? $args['scheme'] : 'https';
        $config['endpoint'] = $scheme . '://' . Utils::uriTemplate($config['endpoint'], $args);

        return $config;
    }

    private function getKeys($region, $service)
    {
        $regionPrefix = $this->regionPrefix($region);

        return $regionPrefix
            ? [
                "$region/$service",
                "$regionPrefix/$service",
                "$region/*",
                "$regionPrefix/*",
                "*/$service",
                "*/*"
            ] : [
                "$region/$service",
                "$region/*",
                "*/$service",
                "*/*"
            ];
    }

    private function regionPrefix($region)
    {
        $parts = explode('-', $region);
        if (count($parts) < 2) {
            return null;
        }

        array_pop($parts);

        return implode('-', $parts) . '-*';
    }
}
