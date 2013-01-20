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

use Aws\Common\Exception\RuntimeException;

/**
 * Abstract wait implementation
 */
abstract class AbstractWaiter implements WaiterInterface
{
    protected $attempts = 0;
    protected $maxAttempts = 10;
    protected $interval = 0;
    protected $config = array();

    /**
     * {@inheritdoc}
     */
    public function setMaxAttempts($maxAttempts)
    {
        $this->maxAttempts = $maxAttempts;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;

        return $this;
    }

    /**
     * Set config options associated with the waiter
     *
     * @param array $config Options to set
     *
     * @return self
     */
    public function setConfig(array $config)
    {
        $this->config = $config;

        if (isset($config['interval'])) {
            $this->interval = $config['interval'];
        }

        if (isset($config['max_attempts'])) {
            $this->maxAttempts = $config['max_attempts'];
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function wait()
    {
        $this->attempts = 0;

        do {
            if ($this->doWait()) {
                break;
            }

            if (++$this->attempts >= $this->maxAttempts) {
                throw new RuntimeException('Wait method never resolved to true after ' . $this->attempts . ' attempts');
            }

            if ($this->interval) {
                usleep($this->interval * 1000000);
            }

        } while (1);
    }

    /**
     * Method to implement in subclasses
     *
     * @return bool Return true when successful, false on failure
     */
    abstract protected function doWait();
}
