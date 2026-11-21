<?php

declare(strict_types=1);

namespace Aws\Core\S3;

use Smithy\Client\ClientConfig;
use Smithy\Client\Plugin\AbstractPlugin;

/**
 * Register S3 error response customizations.
 *
 * Installs {@see S3ErrorInterceptor} and {@see S3Http200ErrorInterceptor}.
 * The generated `S3ClientConfig` and `AwsDynamicClient` enable the plugin by
 * default for the S3 service, so both interceptors apply to the generated and
 * dynamic S3 clients.
 */
final class S3ErrorPlugin extends AbstractPlugin
{
    /** @inheritDoc */
    public function configure(ClientConfig $config): ClientConfig
    {
        if (!$config->interceptorChain->contains(S3ErrorInterceptor::class)) {
            $config = $config->withInterceptor(new S3ErrorInterceptor());
        }
        if (!$config->interceptorChain->contains(
            S3Http200ErrorInterceptor::class
        )) {
            $config = $config->withInterceptor(
                new S3Http200ErrorInterceptor()
            );
        }

        return $config;
    }
}
