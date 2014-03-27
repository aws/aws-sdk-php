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

namespace Aws\Subscriber;

use Aws\Credentials\AbstractRefreshableCredentials;
use Aws\AwsClientInterface;
use GuzzleHttp\Event\AbstractTransferEvent;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * Backoff logic that handles retrying requests when credentials expire
 */
class ExpiredCredentialsFilter
{
    /** @var callable Exception parser */
    private $exceptionParser;

    /** @var array Array of known retrying exception codes */
    private $retryable = [
        'RequestExpired'        => true,
        'ExpiredTokenException' => true,
        'ExpiredToken'          => true
    ];

    public function __construct(callable $exceptionParser)
    {
        $this->exceptionParser = $exceptionParser;
    }

    public function __invoke(AbstractTransferEvent $event)
    {
        // Doesn't retry networking errors.
        if (!($response = $event->getResponse())) {
            return RetrySubscriber::DEFER;
        }

        // Only retry 4xx responses.
        if (substr($response->getStatusCode(), 0, 1) != '4') {
            return RetrySubscriber::DEFER;
        }

        $parser = $this->exceptionParser;

        // Only retry if the code is known to be retryable.
        if (!isset($this->retryable[$parser($response)['code']])) {
            return RetrySubscriber::DEFER;
        }

        /** @var $client AwsClientInterface */
        $client = $event->getClient();

        // Only retry if the credentials can be refreshed
        if (!($client->getCredentials() instanceof AbstractRefreshableCredentials)) {
            return RetrySubscriber::DEFER;
        }

        // Resign the request using new credentials
        $client->getSignature()->signRequest(
            $event->getRequest(),
            $client->getCredentials()
        );

        return RetrySubscriber::RETRY;
    }
}
