<?php

declare(strict_types=1);

namespace Aws\Core\Retry;

use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\Client\AwsClientConfigResolver;
use Smithy\Client\ClientConfig;
use Smithy\Client\Plugin\AbstractPlugin;
use Smithy\Client\Retry\NoRetryStrategy;
use Smithy\Client\Retry\RetryRequestFlagResolverInterface;
use Smithy\Client\Retry\StandardRetryStrategy;

/**
 * Register standard retry behavior for AWS clients.
 */
final class StandardRetryPlugin extends AbstractPlugin
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

    public function configure(ClientConfig $config): ClientConfig
    {
        if (
            $config instanceof AbstractAwsClientConfig
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
                AwsRetryRequestFlagResolver::instance()
            );
        }

        if (
            $config->interceptorChain->contains(
                StandardRetryInterceptor::class
            )
        ) {
            return $config;
        }

        return $config->withPrependedInterceptor(
            StandardRetryInterceptor::instance()
        );
    }
}
