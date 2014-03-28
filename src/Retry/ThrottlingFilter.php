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

namespace Aws\Retry;

use GuzzleHttp\Event\AbstractTransferEvent;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * Retries throttling responses.
 */
class ThrottlingFilter
{
    /** @var array Error codes that indicate throttling */
    private static $throttlingExceptions = [
        'RequestLimitExceeded'                   => true,
        'Throttling'                             => true,
        'ThrottlingException'                    => true,
        'ProvisionedThroughputExceededException' => true,
        'RequestThrottled'                       => true,
    ];

    /** @var callable */
    private $exceptionParser;

    /**
     * @param callable $exceptionParser Exception parser to use
     */
    public function __construct(callable $exceptionParser)
    {
        $this->exceptionParser = $exceptionParser;
    }

    public function __invoke($retries, AbstractTransferEvent $event)
    {
        // Doesn't mess with networking errors.
        if (!($response = $event->getResponse())) {
            return RetrySubscriber::DEFER;
        }

        // Only works on 4xx respsonses
        if (substr($response->getStatusCode(), 0, 1) != '4') {
            return RetrySubscriber::DEFER;
        }

        $parser = $this->exceptionParser;
        $parts = $parser($response);

        return isset(self::$throttlingExceptions[$parts['code']])
            ? RetrySubscriber::RETRY
            : RetrySubscriber::DEFER;
    }
}
