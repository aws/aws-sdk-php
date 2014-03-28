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

    public function prependRule($service, array $rule)
    {
        if (!isset($this->rules[$service])) {
            $this->rules[$service] = [];
        }

        array_unshift($this->rules[$service], $rule);
    }

    public function appendRule($service, array $rule)
    {
        $this->rules[$service][] = $rule;
    }

    private function checkRule(array $rule, array $args)
    {
        // Check each rule constraint against the provided region
        if (isset($rule['constraints'])) {
            foreach ($rule['constraints'] as $name => $constraint) {
                $value = isset($args[$name]) ? $args[$name] : null;
                $type = $constraint[0];
                $assertion = $constraint[1];

                if ($type == 'startsWith') {
                    if (strpos($value, $assertion) !== 0) {
                        return null;
                    }
                } elseif ($type == 'oneOf') {
                    if (!$value || !in_array($value, $assertion, true)) {
                        return null;
                    }
                } else {
                    return null;
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
