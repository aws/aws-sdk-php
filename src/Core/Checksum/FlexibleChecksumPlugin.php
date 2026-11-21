<?php

declare(strict_types=1);

namespace Aws\Core\Checksum;

use Aws\Core\Client\AbstractAwsClientConfig;
use Smithy\Client\ClientConfig;
use Smithy\Client\Plugin\AbstractPlugin;

/**
 * Install flexible request and response checksum policy.
 */
final class FlexibleChecksumPlugin extends AbstractPlugin
{
    public function configure(ClientConfig $config): ClientConfig
    {
        if (!$config instanceof AbstractAwsClientConfig) {
            return $config;
        }

        return $config
            ->withInterceptor(new FlexibleChecksumRequestInterceptor(
                $config->requestChecksumCalculation
                    ?? RequestChecksumCalculation::WHEN_SUPPORTED
            ))
            ->withInterceptor(new FlexibleChecksumResponseInterceptor(
                $config->responseChecksumValidation
                    ?? ResponseChecksumValidation::WHEN_SUPPORTED
            ));
    }
}
