<?php

declare(strict_types=1);

namespace Aws\Core\UserAgent;

use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Plugin\AbstractPlugin;

/**
 * Mark every request of one waiter call with the WAITER metric.
 *
 * Waiter polls add this plugin to their call-scoped request overrides, so
 * only those requests carry the metric.
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
    public function configure(AbstractClientConfig $config): AbstractClientConfig
    {
        return $config->withContext(UserAgentInterceptor::WAITER_KEY, true);
    }
}
