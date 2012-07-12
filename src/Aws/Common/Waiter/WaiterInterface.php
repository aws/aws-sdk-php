<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

/**
 * WaiterInterface used to wait on something to be in a particular state
 */
interface WaiterInterface
{
    /**
     * Set the maximum number of attempts to make when waiting
     *
     * @param int $maxAttempts Max number of attempts
     *
     * @return self
     */
    public function setMaxAttempts($maxAttempts);

    /**
     * Set the maximum number of failures to allow while waiting
     *
     * @param int $maxFailures Max failures
     *
     * @return self
     */
    public function setMaxFailures($maxFailures);

    /**
     * Set the amount of time to interval between attempts
     *
     * @param int $interval Interval in seconds
     *
     * @return self
     */
    public function setInterval($interval);

    /**
     * Set config options associated with the waiter
     *
     * @param array $config Options to set
     *
     * @return self
     */
    public function setConfig(array $config);

    /**
     * Begin the waiting loop
     *
     * @throw RuntimeException if the method never resolves to true
     */
    public function wait();
}
