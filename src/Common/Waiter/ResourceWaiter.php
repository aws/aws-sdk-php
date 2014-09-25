<?php
namespace Aws\Common\Waiter;

use Aws\Common\AwsClientInterface;
use Aws\Common\Exception\AwsException;
use Aws\Common\Result;

class ResourceWaiter extends Waiter
{
    /**
     * A waiter associated with an AWS resource (e.g. EC2 instance) that waits
     * until the resource is in a particular state. The configuration for the
     * waiter must include information about the operation and the conditions
     * for wait completion.
     *
     * @param AwsClientInterface $client Client used to execute commands
     * @param string             $name   Waiter name
     * @param array              $args   Arguments for command
     * @param array              $config Waiter config that overrides defaults
     */
    public function __construct(
        AwsClientInterface $client,
        $name,
        array $args = [],
        array $config = []
    ) {
        // Create a wait callback using the named waiter's configuration
        $callback = function () use ($client, $name, $args, $config) {
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
        };

        parent::__construct($callback, $config);
    }

    /**
     * Check if an exception satisfies a success or failure acceptor.
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
     * Check to see if the result satisfies a success or failure state.
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
     * Check to see if the path of the output key is satisfied by the value.
     *
     * @param Result       $result Result model
     * @param string       $key    Key to check
     * @param array|string $checks Compare the key to the value
     * @param bool         $all    Set to true to ensure all value match or
     *                             false to only match one
     *
     * @return bool
     */
    private function checkPath(
        Result $result,
        $key = null,
        $checks = [],
        $all = true
    ) {
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
