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

namespace Aws\Common\Client;

use Aws\Common\Client\AwsClientInterface;
use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Log\LogAdapterInterface;
use Guzzle\Log\ClosureLogAdapter;
use Guzzle\Common\Collection;
use Guzzle\Plugin\Backoff\BackoffPlugin;
use Guzzle\Plugin\Backoff\BackoffLogger;

/**
 * Ensures that a valid 'client.exponential_backoff' option is present in the
 * configuration collection.  If the option is not present, this resolver
 * executes a callback to add an {@see BackoffPlugin} plugin to the config.
 */
class BackoffOptionResolver extends AbstractMissingFunctionOptionResolver
{
    /**
     * @param string $missingFunction Provide a callable function to call if 'client.exponential_backoff' is not set
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
        $plugin = $config->get(Options::BACKOFF);
        if (!$plugin && $this->missingFunction) {
            $plugin = call_user_func($this->missingFunction, $config, $client);
            $config->set(Options::BACKOFF, $plugin);

            // The log option can be set to `debug` or an instance of a LogAdapterInterface
            if ($logger = $config->get(Options::BACKOFF_LOGGER)) {
                $this->addLogger($plugin, $logger, $config->get(Options::BACKOFF_LOGGER_TEMPLATE));
            }
        }

        // Ensure that the plugin implements the correct interface
        if ($plugin && !($plugin instanceof BackoffPlugin)) {
            throw new InvalidArgumentException(
                Options::BACKOFF . ' must be an instance of Guzzle\Plugin\Backoff\BackoffPlugin'
            );
        }

        // Attach the BackoffPlugin to the client
        if ($client) {
            $client->addSubscriber($plugin, -255);
        }
    }

    /**
     * Add the exponential backoff logger to the backoff plugin
     *
     * @param BackoffPlugin $plugin Plugin to attach a logger to
     * @param mixed         $logger Logger to use with the plugin
     * @param string        $format Logger format option
     *
     * @throws InvalidArgumentException if the logger is not valid
     */
    private function addLogger(BackoffPlugin $plugin, $logger, $format = null)
    {
        if ($logger === 'debug') {
            $logger = new ClosureLogAdapter(function ($message) {
                trigger_error($message . "\n");
            });
        } elseif (!($logger instanceof LogAdapterInterface)) {
            throw new InvalidArgumentException(
                Options::BACKOFF_LOGGER . ' must be set to `debug` or an instance of '
                    . 'Guzzle\\Common\\Log\\LogAdapterInterface'
            );
        }

        // Create the plugin responsible for logging exponential backoff retries
        $logPlugin = new BackoffLogger($logger);
        // You can specify a custom format or use the default
        if ($format) {
            $logPlugin->setTemplate($format);
        }
        $plugin->addSubscriber($logPlugin);
    }
}
