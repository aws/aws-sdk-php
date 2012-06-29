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

namespace Aws\Common\Client;

use Aws\Common\Client\AwsClientInterface;
use Aws\Common\Exception\InvalidArgumentException;
use Guzzle\Common\Collection;
use Guzzle\Http\Plugin\ExponentialBackoffPlugin;

/**
 * Ensures that a valid 'client.exponential_backoff' option is present in the
 * configuration collection.  If the option is not present, this resolver
 * executes a callback to add an {@see ExponentialBackoff} plugin to the config.
 */
class ExponentialBackoffOptionResolver extends AbstractMissingFunctionOptionResolver
{
    /**
     * @param string $missingFunction Provide a callable function to call if the
     *                                'client.exponential_backoff' parameter is not set
     */
    public function __construct($missingFunction = null)
    {
        if ($missingFunction) {
            $this->setMissingFunction($missingFunction);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(Collection $config, AwsClientInterface $client = null)
    {
        // A user can inject the plugin in their options array or have one
        // created for them by default
        $plugin = $config->get(AwsClientInterface::EXPONENTIAL_BACKOFF_OPTION);
        if (!$plugin && $this->missingFunction) {
            $plugin = call_user_func($this->missingFunction, $config, $client);
            $config->set(AwsClientInterface::EXPONENTIAL_BACKOFF_OPTION, $plugin);
        }

        // Ensure that the plugin implements the correct interface
        if ($plugin && !($plugin instanceof ExponentialBackoffPlugin)) {
            throw new InvalidArgumentException(
                'client.exponential_backoff must be an instance of ' .
                'Guzzle\\Http\\Plugin\\ExpontialBackoffPlugin'
            );
        }

        // Attach the ExponentialBackoffPlugin to the client
        if ($client) {
            $client->getEventDispatcher()->addSubscriber($plugin, -255);
        }
    }
}
