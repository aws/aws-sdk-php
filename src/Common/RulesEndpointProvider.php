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
     * @param string $pathOrData Path to an endpoint rules file, path to a
     *                           directory of endpoint rules files, or array of
     *                           endpoint rules file data. If no argument is
     *                           provided, the default public rules are
     *                           utilized.
     */
    public function __construct($pathOrData = null)
    {
        if (!$pathOrData) {
            $this->ruleSets = \GuzzleHttp\json_decode(
                file_get_contents(__DIR__ . '/Resources/endpoints/public.json'),
                true
            );
        } elseif (is_array($pathOrData)) {
            $this->ruleSets = $pathOrData;
        } else {
            $this->ruleSets = [];
            $this->addRulesFromPath($pathOrData);
        }
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
     * Merges in rules from the path to a file or directory of rules files.
     *
     * @param string $path Directory of rules files
     * @throws \InvalidArgumentException if the path is invalid
     */
    private function addRulesFromPath($path)
    {
        if (is_dir($path)) {
            foreach (glob(rtrim($path, '/') . '/*.json') as $file) {
                $this->addRulesFromFile($file);
            }
        } else {
            $this->addRulesFromFile($path);
        }

        // Sort the rules
        usort($this->ruleSets, function ($a, $b) {
            return $a['priority'] < $b['priority']
                ? -1
                : ($a['priority'] > $b['priority'] ? 1 : 0);
        });
    }

    /**
     * Merges in rules from a file.
     *
     * @param string $filename File to add
     * @throws \InvalidArgumentException if the filename is not readable
     */
    private function addRulesFromFile($filename)
    {
        if (!is_readable($filename)) {
            throw new \InvalidArgumentException($filename . ' is not readable');
        }

        $this->ruleSets = array_merge(
            $this->ruleSets,
            \GuzzleHttp\json_decode(file_get_contents($filename), true)
        );
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
