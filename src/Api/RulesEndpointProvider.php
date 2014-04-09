<?php
namespace Aws\Api;

use Aws\Exception\UnresolvedEndpointException;

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

        // Use the _default section if no rule is found by the given name.
        if (!isset($this->rules[$service])) {
            // Fall back to _default, and if it is not set, throw an exception.
            if (!isset($this->rules['_default'])) {
                throw new UnresolvedEndpointException('No service found');
            }
            $service = '_default';
        }

        if ($result = $this->checkSection($service, $args)) {
            return $result;
        }

        throw $this->getUnresolvedException($service, $args);
    }

    /**
     * Prepends a rule to the given service name.
     *
     * @param string $service Service name or _default to apply to all.
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
     * @param string $service Service name or _default to apply to all.
     * @param array  $rule    Rule to append
     */
    public function appendRule($service, array $rule)
    {
        $this->rules[$service][] = $rule;
    }

    /**
     * Checks the provided arguments against the rules of a service/section.
     *
     * @param string $name Service name
     * @param array  $args Arguments used to resolve rules.
     *
     * @return array|null
     */
    private function checkSection($name, array $args)
    {
        if (isset($this->rules[$name])) {
            foreach ($this->rules[$name] as $rule) {
                if ($endpoint = $this->checkRule($rule, $args)) {
                    return $endpoint;
                }
            }
        }

        if ($name !== '_default') {
            return $this->checkSection('_default', $args);
        }

        return null;
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
                    case 'equals':
                        if ($value !== $cons[2]) {
                            return null;
                        }
                        break;
                    case 'notEquals':
                        if ($value === $cons[2]) {
                            return null;
                        }
                        break;
                    default:
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

    /**
     * Creates an unresolved endpoint exception and attempts to format a useful
     * error message based on the constrains of the matching service.
     */
    private function getUnresolvedException($service, array $args)
    {
        $message = sprintf(
            'Unable to resolve an endpoint for the %s service based on the'
            . ' provided configuration values: %s',
            $args['service'],
            str_replace('&', ', ', http_build_query($args))
        );

        // Provide a better error message for the common case of omitting region
        if (!isset($args['region'])) {
            try {
                $this->getEndpoint($service, $args + ['region' => 'us-west-2']);
                $message .= '. This endpoint requires a valid "region" option.';
            } catch (UnresolvedEndpointException $e) {
                $message .= '. Perhaps this service requires a region option.';
            }
        }

        return new UnresolvedEndpointException($message);
    }
}
