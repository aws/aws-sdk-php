<?php
namespace Aws\Common;

use Aws\Common\Exception\UnresolvedEndpointException;

/**
 * Provides endpoints for services based on a directory of rules files.
 */
class RulesEndpointProvider implements EndpointProviderInterface
{
    /** @var array */
    private $ruleSets;

    /**
     * @param array $ruleSets Rule sets to utilize
     */
    public function __construct(array $ruleSets)
    {
        $this->ruleSets = $ruleSets;
    }

    /**
     * Creates and returns the default RulesEndpointProvider based on the
     * public rule sets.
     *
     * @return array
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

        return new self(
            \GuzzleHttp\json_decode(file_get_contents($path), true)
        );
    }


    public function getEndpoint(array $args = [])
    {
        $this->prepareArguments($args);

        foreach ($this->ruleSets as $ruleSet) {

            // Ensure the region matches
            if (!empty($ruleSet['regionPrefix']) &&
                strpos($args['region'], $ruleSet['regionPrefix']) !== 0
            ) {
                continue;
            }

            foreach ($ruleSet['rules'] as $rule) {
                if (isset($rule['services']) &&
                    !in_array($args['service'], $rule['services'])
                ) {
                    continue;
                }

                $rule['config']['endpoint'] = \GuzzleHttp\uri_template(
                    $rule['config']['endpoint'], $args
                );

                return $rule['config'];
            }
        }

        throw $this->getUnresolvedException($args);
    }

    /**
     * Prepare and validate arguments to resolve an endpoint
     *
     * @param array $args Arguments passed by reference
     *
     * @throws \InvalidArgumentException if region or service are missing
     */
    private function prepareArguments(array &$args)
    {
        if (!isset($args['scheme'])) {
            $args['scheme'] = 'https';
        }

        if (!isset($args['service'])) {
            throw new \InvalidArgumentException('Requires a "service" value');
        }

        if (!isset($args['region'])) {
            throw new \InvalidArgumentException('Requires a "region" value');
        }
    }

    /**
     * Creates an unresolved endpoint exception and attempts to format a useful
     * error message based on the constrains of the matching service.
     */
    private function getUnresolvedException(array $args)
    {
        $message = sprintf(
            'Unable to resolve an endpoint for the "%s" service based on the'
            . ' provided configuration values: %s.',
            $args['service'],
            str_replace('&', ', ', http_build_query($args))
        );

        return new UnresolvedEndpointException($message);
    }
}
