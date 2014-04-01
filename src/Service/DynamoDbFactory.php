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

namespace Aws\Service;

use Aws\AwsClientInterface;
use Aws\Retry\ThrottlingFilter;
use Aws\Retry\Crc32Filter;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * @internal
 */
class DynamoDbFactory extends ClientFactory
{
    // Higher max due to smaller delays and faster response times.
    const DEFAULT_MAX_RETRIES = 11;

    protected function createClient(array $args)
    {
        $client = parent::createClient($args);

        // DynamoDB does not redirect, so there's no need to add the subscriber.
        $client->getHttpClient()->setDefaultOption('allow_redirects', false);

        return $client;
    }

    protected function handle_retries(
        $value,
        array &$args,
        AwsClientInterface $client
    ) {
        $client->getHttpClient()->getEmitter()->attach(new RetrySubscriber([
            'max' => $this->validateRetries($value),
            'delay' => function ($retries) {
                return $retries === 0
                    ? 0
                    : (50 * (int) pow(2, $retries - 1)) / 1000;
            },
            'filter' => RetrySubscriber::createChainFilter([
                new ThrottlingFilter($args['error_parser']),
                new Crc32Filter($args['error_parser']),
                RetrySubscriber::createStatusFilter(),
                RetrySubscriber::createCurlFilter()
            ])
        ]));
    }
}
