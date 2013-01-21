<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Common\Waiter;

use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Exception\RuntimeException;
use Aws\Common\Exception\ServiceResponseException;
use Guzzle\Service\Resource\Model;

/**
 * Resource waiter driven by configuration options
 */
class ConfigResourceWaiter extends AbstractResourceWaiter
{
    /**
     * @var WaiterConfig Waiter configuration
     */
    protected $waiterConfig;

    /**
     * @param WaiterConfig $waiterConfig Waiter configuration
     */
    public function __construct(WaiterConfig $waiterConfig)
    {
        $this->waiterConfig = $waiterConfig;
        $this->interval = $waiterConfig->get(WaiterConfig::INTERVAL);
        $this->maxAttempts = $waiterConfig->get(WaiterConfig::MAX_ATTEMPTS);
    }

    /**
     * Get the waiter's configuration data
     *
     * @return WaiterConfig
     */
    public function getWaiterConfig()
    {
        return $this->waiterConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function setConfig(array $config)
    {
        // Overwrite default waiter settings
        foreach ($config as $key => $value) {
            $this->waiterConfig->set($key, $value);
        }

        return parent::setConfig($config);
    }

    /**
     * {@inheritdoc}
     */
    public function setResource($resource)
    {
        $this->validateResource($resource);

        return parent::setResource($resource);
    }

    /**
     * Validate that a resource satisfies the configuration settings
     *
     * @param $resource Resource to validate
     *
     * @throws InvalidArgumentException
     */
    protected function validateResource($resource)
    {
        $input = $this->waiterConfig->get(WaiterConfig::INPUT);
        $name = $this->waiterConfig->get(WaiterConfig::WAITER_NAME);

        if (is_array($input)) {
            // Ensure that the input is an array
            if (!is_array($resource)) {
                throw new InvalidArgumentException(
                    "{$name} waiter requires a resource specified using an associative array containing the following "
                    . "keys: " . implode(', ', $input)
                );
            }
            // Ensure that the input include the required keys
            foreach ($input as $key) {
                if (!array_key_exists($key, $resource)) {
                    throw new InvalidArgumentException("{$name} waiter requires that a {$key} value is specified.");
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function doWait()
    {
        $input = $this->waiterConfig->get(WaiterConfig::INPUT);
        $params = is_array($input) ? $this->resource : array($input => $this->resource);
        $operation = $this->client->getCommand($this->waiterConfig->get(WaiterConfig::OPERATION), $params);

        try {
            return $this->checkResult($this->client->execute($operation));
        } catch (ServiceResponseException $e) {

            // Check if this exception satisfies a success or failure acceptor
            $transition = $this->checkErrorAcceptor($e);
            if (null !== $transition) {
                return $transition;
            }

            // Check if this exception should be ignored
            foreach ((array) $this->waiterConfig->get(WaiterConfig::IGNORE_ERRORS) as $ignore) {
                if ($e->getExceptionCode() == $ignore) {
                    // This exception is ignored, so it counts as a failed attempt rather than a fast-fail
                    return false;
                }
            }

            // Allow non-ignore exceptions to bubble through
            throw $e;
        }
    }

    /**
     * Check if an exception satisfies a success or failure acceptor
     *
     * @param ServiceResponseException $e
     *
     * @return bool|null Returns true for success, false for failure, and null for no transition
     */
    protected function checkErrorAcceptor(ServiceResponseException $e)
    {
        if ($this->waiterConfig->get(WaiterConfig::SUCCESS_TYPE) == 'error') {
            if ($e->getExceptionCode() == $this->waiterConfig->get(WaiterConfig::SUCCESS_VALUE)) {
                // Mark as a success
                return true;
            }
        }

        // Mark as an attempt
        return null;
    }

    /**
     * Check to see if the response model satisfies a success or failure state
     *
     * @param Model $result Result model
     * @return bool
     * @throws RuntimeException
     */
    protected function checkResult(Model $result)
    {
        // Check if the result evaluates to true based on the path and output model
        if ($this->waiterConfig->get(WaiterConfig::SUCCESS_TYPE) == 'output' &&
            $this->checkPath(
                $result,
                $this->waiterConfig->get(WaiterConfig::SUCCESS_PATH),
                $this->waiterConfig->get(WaiterConfig::SUCCESS_VALUE)
            )
        ) {
            return true;
        }

        // It did not finish waiting yet. Determine if we need to fail-fast based on the failure acceptor.
        if ($this->waiterConfig->get(WaiterConfig::FAILURE_TYPE) == 'output') {
            $key = $this->waiterConfig->get(WaiterConfig::FAILURE_PATH);
            if ($this->checkPath($result, $key, $this->waiterConfig->get(WaiterConfig::FAILURE_VALUE), false)) {
                // Determine which of the results triggered the failure
                $triggered = array_intersect(
                    (array) $this->waiterConfig->get(WaiterConfig::FAILURE_VALUE),
                    array_unique((array) $result->getPath($key))
                );
                // fast fail because the failure case was satisfied
                throw new RuntimeException(
                    'A resource entered into an invalid state of "'
                    . implode(', ', $triggered) . '" while waiting with the "'
                    . $this->waiterConfig->get(WaiterConfig::WAITER_NAME) . '" waiter.'
                );
            }
        }

        return false;
    }

    /**
     * Check to see if the path of the output key is satisfied by the value
     *
     * @param Model  $model      Result model
     * @param string $key        Key to check
     * @param string $checkValue Compare the key to the value
     * @param bool   $all        Set to true to ensure all value match or false to only match one
     *
     * @return bool
     */
    protected function checkPath(Model $model, $key = null, $checkValue, $all = true)
    {
        // If no key is set, then just assume true because the request succeeded
        if (!$key) {
            return true;
        }

        if (!($result = $model->getPath($key))) {
            return false;
        }

        $total = $matches = 0;
        foreach ((array) $result as $value) {
            $total++;
            foreach ((array) $checkValue as $check) {
                if ($value == $check) {
                    $matches++;
                    break;
                }
            }
        }

        // When matching all values, ensure that the match count matches the total count
        if ($all && $total != $matches) {
            return false;
        }

        return $matches > 0;
    }
}
