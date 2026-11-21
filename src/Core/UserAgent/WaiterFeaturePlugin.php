<?php

declare(strict_types=1);

namespace Aws\Core\UserAgent;

use Smithy\Client\ClientConfig;
use Smithy\Client\Plugin\AbstractPlugin;

/**
 * Mark every request of one waiter call with the WAITER metric.
 *
 * The AWS client base class adds this plugin to the call-scoped request
 * overrides of `waitUntil*` polls. Direct operation calls never see it.
 */
final class WaiterFeaturePlugin extends AbstractPlugin
{
    private static ?self $instance = null;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    private function __construct()
    {
    }

    /** @inheritDoc */
    public function configure(ClientConfig $config): ClientConfig
    {
        return $config->withContext(UserAgentInterceptor::WAITER_KEY, true);
    }
}
