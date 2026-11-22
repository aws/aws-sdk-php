<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Retry;

use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\Client\AwsClientConfigResolver;
use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Plugin\AbstractPlugin;
use Smithy\Client\Retry\NoRetryStrategy;
use Smithy\Client\Retry\RetryRequestFlagResolverInterface;
use Smithy\Client\Retry\RetryRequestFlags;
use Smithy\Client\Retry\StandardRetryStrategy;
use Smithy\Core\Shape\OperationInterface;

/**
 * Register standard retry behavior for AWS clients.
 *
 * The plugin also resolves retry request flags. It marks the long-polling
 * operations listed in the retry specification until `aws.api#longPoll`
 * is available in generated operation schemas.
 */
final class StandardRetryPlugin extends AbstractPlugin
    implements RetryRequestFlagResolverInterface
{
    private static ?self $instance = null;

    private readonly AwsClientConfigResolver $configResolver;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    private function __construct()
    {
        $this->configResolver = new AwsClientConfigResolver();
    }

    public function configure(AbstractClientConfig $config): AbstractClientConfig
    {
        if ($config instanceof AbstractAwsClientConfig
            && !$config->hasExplicitRetryStrategy
            && $config->retryStrategy instanceof NoRetryStrategy
        ) {
            $context = $this->configResolver->storedContext($config);
            if ($context === null) {
                $context = $this->configResolver->resolveContext($config);
                $config = $this->configResolver->withContext($config, $context);
            }

            $settings = $this->configResolver->resolveRetrySettings(
                $config,
                $context
            );
            $config = $config->withResolvedRetryStrategy(
                new StandardRetryStrategy(
                    maxAttempts: $settings['maxAttempts'],
                    baseDelay: $settings['baseDelay']
                )
            );
        }

        $retryRequestFlagResolver = $config->context[
            RetryRequestFlagResolverInterface::CONFIG_KEY
        ] ?? null;
        if (!$retryRequestFlagResolver instanceof RetryRequestFlagResolverInterface) {
            $config = $config->withContext(
                RetryRequestFlagResolverInterface::CONFIG_KEY,
                $this
            );
        }

        if ($config->interceptorChain->contains(
                StandardRetryInterceptor::class
            )
        ) {
            return $config;
        }

        return $config->withPrependedInterceptor(
            StandardRetryInterceptor::instance()
        );
    }

    public function resolve(
        OperationInterface $operation,
        AbstractClientConfig $config
    ): int
    {
        if (!$config instanceof AbstractAwsClientConfig) {
            return 0;
        }

        return $this->isLongPolling($config->signingName, $operation->getName())
            ? RetryRequestFlags::LONG_POLLING
            : 0;
    }

    /**
     * Return true when the operation is a long-polling operation.
     */
    private function isLongPolling(
        string $signingName,
        string $operationName
    ): bool
    {
        return match ($signingName) {
            'sqs' => $operationName === 'ReceiveMessage',
            'states' => $operationName === 'GetActivityTask',
            'swf' => $operationName === 'PollForActivityTask'
                || $operationName === 'PollForDecisionTask',
            'kinesis' => $operationName === 'ReceiveQueueRecords'
                || $operationName === 'ReceiveDeadLetterQueueRecords',
            default => false,
        };
    }
}
