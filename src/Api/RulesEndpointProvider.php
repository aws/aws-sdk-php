<?php

namespace Aws\Api;

/**
 * Provides endpoints for services based on a rules engine.
 */
class RulesEndpointProvider implements EndpointProviderInterface
{
    /** @var array */
    private $rules;

    /**
     * @param array $rules Associative array of endpoint rules.
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    public function getEndpoint($service, array $args = [])
    {
        $args['service'] = $service;
        if (!isset($args['scheme'])) {
            $args['scheme'] = 'https';
        }

        if (isset($this->rules[$service])) {
            foreach ($this->rules[$service] as $rule) {
                if ($endpoint = $this->checkRule($rule, $args)) {
                    return $endpoint;
                }
            }
        }

        if (isset($this->rules['__defaults__'])) {
            foreach ($this->rules['__defaults__'] as $rule) {
                if ($endpoint = $this->checkRule($rule, $args)) {
                    return $endpoint;
                }
            }
        }

        // Note: throwing an exception is implementation specific
        throw new \RuntimeException('Unable to resolve an endpoint');
    }

    /**
     * Prepends a rule to the given service name.
     *
     * @param string $service Service name or __default__ to apply to all.
     * @param array  $rule    Rule to prepend
     */
    public function prependRule($service, array $rule)
    {
        if (!isset($this->rules[$service])) {
            $this->rules[$service] = [];
        }

        array_unshift($this->rules[$service], $rule);
    }

    /**
     * Appends a rule to the given service name.
     *
     * @param string $service Service name or __default__ to apply to all.
     * @param array  $rule    Rule to append
     */
    public function appendRule($service, array $rule)
    {
        $this->rules[$service][] = $rule;
    }

    private function checkRule(array $rule, array $args)
    {
        // Check each rule constraint against the provided region
        if (isset($rule['constraints'])) {
            foreach ($rule['constraints'] as $cons) {
                $value = isset($args[$cons[0]]) ? $args[$cons[0]] : null;
                switch ($cons[1]) {
                    case 'startsWith':
                        if (strpos($value, $cons[2]) !== 0) {
                            return null;
                        }
                        break;
                    case 'oneOf':
                        if (!$value || !in_array($value, $cons[2], true)) {
                            return null;
                        }
                        break;
                    default:
                        continue;
                }
            }
        }

        return [
            'uri' => \GuzzleHttp\uri_template($rule['uri'], $args),
            'properties' => isset($rule['properties'])
                    ? $rule['properties'] : []
        ];
    }
}
