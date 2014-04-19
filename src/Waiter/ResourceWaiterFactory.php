<?php
namespace Aws\Waiter;

use Aws\Api\ApiProviderInterface;
use Aws\AwsClientInterface;
use Aws\Exception\AwsException;
use Aws\Result;

/**
 * @internal Factory used to create Waiter objects service waiter configurations
 */
class ResourceWaiterFactory
{
    /** @var array Loaded/memoized waiter configuration data for the service */
    private static $waiters = [];

    /** @var array Default waiter configurations */
    private static $defaults = [
        'operation'     => null,
        'ignore_errors' => [],
        'description'   => null,
        'success_type'  => null,
        'success_path'  => null,
        'success_value' => null,
        'failure_type'  => null,
        'failure_path'  => null,
        'failure_value' => null,
    ];

    /** @var ApiProviderInterface Used to load waiter config data for service */
    private $apiProvider;

    /** @var string Name of the service */
    private $serviceName;

    /** @var string API version of the service */
    private $apiVersion;

    /**
     * @param ApiProviderInterface $apiProvider Used to load waiter config data
     * @param string               $serviceName Name of the service
     * @param string               $apiVersion  API version of the service
     */
    public function __construct(
        ApiProviderInterface $apiProvider,
        $serviceName,
        $apiVersion
    ) {
        $this->apiProvider = $apiProvider;
        $this->serviceName = $serviceName;
        $this->apiVersion = $apiVersion;
    }

    /**
     * Factory method for a Waiter object using a service's waiter configuration
     *
     * @param AwsClientInterface $client Client used to execute commands
     * @param string             $name   Waiter name
     * @param array              $args   Arguments for command
     * @param array              $config Waiter config tha overrides defaults
     *
     * @return Waiter
     */
    public function createWaiter(
        AwsClientInterface $client,
        $name,
        array $args = [],
        array $config = []
    ) {
        // Create and return a waiter with a callback that handles the AWS logic
        $config += $this->prepareConfig($name);
        return new Waiter(
            function () use ($client, $name, $args, $config) {
                try {
                    return $this->checkResult(
                        $client->{$config['operation']}($args),
                        $config
                    );
                } catch (AwsException $e) {
                    // Check if exception satisfies a success/failure acceptor
                    $transition = $this->checkErrorAcceptor($e, $config);
                    if (null !== $transition) {
                        return $transition;
                    }

                    // Check if this exception should be ignored
                    foreach ($config['ignore_errors'] as $ignore) {
                        if ($e->getAwsErrorCode() === $ignore) {
                            // This exception is ignored, so it counts as a
                            // failed attempt rather than a fast-fail
                            return false;
                        }
                    }

                    // Allow non-ignored exceptions to bubble up
                    throw $e;
                }
            },
            $config
        );
    }

    /**
     * Prepares and memoizes the config for the named waiter
     *
     * @param string $name Waiter name
     *
     * @return mixed
     * @throws \UnexpectedValueException if no waiter for the given name
     */
    private function prepareConfig($name)
    {
        // Create the key to the waiters cache
        $service = "{$this->serviceName}-{$this->apiVersion}";

        // Make sure the waiters configs have been loaded from the API provider
        if (!isset(self::$waiters[$service])) {
            $waiters = $this->apiProvider->getServiceWaiterConfig(
                $this->serviceName,
                $this->apiVersion
            );
            self::$waiters[$service] = $waiters['waiters'];
        }

        // Error if the waiter is not defined
        if (!isset(self::$waiters[$service][$name])) {
            throw new \UnexpectedValueException("There is no {$name} waiter "
                . " defined for the {$this->serviceName} service.");
        }

        // Resolve the configuration for the named waiter
        if (!isset(self::$waiters[$service][$name]['waiter_name'])) {
            // Extract the named waiter's config
            $config = self::$waiters[$service][$name];

            // Resolve extensions and defaults
            if (isset($config['extends'])) {
                $config += self::$waiters[$service][$config['extends']];
            }
            if (isset(self::$waiters[$service]['__default__'])) {
                $config += self::$waiters[$service]['__default__'];
            }
            $config += self::$defaults;

            // Merge acceptor settings into success/failure settings
            foreach ($config as $cfgKey => $cfgVal) {
                if (substr($cfgKey, 0, 9) == 'acceptor_') {
                    $option = substr($cfgKey, 9);
                    if (!isset($config["success_{$option}"])) {
                        $config["success_{$option}"] = $cfgVal;
                    }
                    if (!isset($config["failure_{$option}"])) {
                        $config["failure_{$option}"] = $cfgVal;
                    }
                    unset($config[$cfgKey]);
                }
            }

            // Add the waiter name and remove description
            $config['waiter_name'] = $name;
            unset($config['description']);

            // Store the resolved configuration
            self::$waiters[$service][$name] = $config;
        }

        return self::$waiters[$service][$name];
    }

    /**
     * Check if an exception satisfies a success or failure acceptor
     *
     * @param AwsException $e
     * @param array $config
     *
     * @return bool|null true/false for success/failure; null for no transition
     */
    private function checkErrorAcceptor(AwsException $e, array $config)
    {
        if ($config['success_type'] == 'error'
            && $e->getAwsErrorCode() == $config['success_value']
        ) {
            // Mark as a success
            return true;
        }

        // Mark as an attempt
        return null;
    }

    /**
     * Check to see if the result satisfies a success or failure state
     *
     * @param Result $result
     * @param array $config
     *
     * @return bool
     * @throws \RuntimeException
     */
    private function checkResult(Result $result, array $config)
    {
        // Check if the result evaluates to true based on the path & waiter data
        if ($config['success_type'] == 'output' &&
            $this->checkPath($result, $config['success_path'], $config['success_value'])
        ) {
            return true;
        }

        // It did not finish waiting yet. Determine if we need to fail-fast
        // based on the failure acceptor.
        if ($config['failure_type'] == 'output') {
            if ($failureValue = $config['failure_value']) {
                $key = $config['failure_path'];
                if ($this->checkPath($result, $key, $failureValue, false)) {
                    // Determine which of the results triggered the failure
                    $triggers = array_intersect(
                        (array) $config['failure_value'],
                        array_unique((array) $result->search($key))
                    );
                    // Fail fast because the failure case was satisfied
                    throw new \RuntimeException('A resource entered into an '
                        . 'invalid state of "' . implode(', ', $triggers) . '" '
                        . 'while waiting for "' . $config['waiter_name'] . '".'
                    );
                }
            }
        }

        return false;
    }

    /**
     * Check to see if the path of the output key is satisfied by the value
     *
     * @param Result       $result Result model
     * @param string       $key    Key to check
     * @param array|string $checks Compare the key to the value
     * @param bool         $all    Set to true to ensure all value match or
     *                             false to only match one
     *
     * @return bool
     */
    private function checkPath(Result $result, $key = null, $checks = [], $all = true)
    {
        // If no key is set, then just assume true because the request succeeded
        if (!$key) {
            return true;
        }

        // If the key doesn't exist, then assume false
        if (!($values = $result->search($key))) {
            return false;
        }

        // Count the value matches
        $total = $matches = 0;
        foreach ((array) $values as $value) {
            $total++;
            foreach ((array) $checks as $check) {
                if ($value == $check) {
                    $matches++;
                    break;
                }
            }
        }

        // When matching all values, ensure that the match count equals total
        if ($all && $total !== $matches) {
            return false;
        }

        // Otherwise, return true only if at least one value matched
        return $matches > 0;
    }
}
