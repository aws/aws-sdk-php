<?php

declare(strict_types=1);

namespace Aws\Core\S3;

use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\Client\AwsClientConfigResolver;
use Smithy\Client\ClientConfig;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Plugin\AbstractPlugin;

/**
 * Apply the environment and shared-config `useArnRegion` setting to S3.
 *
 * An explicit client value is kept as given. Without one, the plugin reads
 * `AWS_S3_USE_ARN_REGION` and the profile's `s3_use_arn_region` through
 * {@see S3UseArnRegionResolver} and passes the result to the endpoint rules
 * as the `UseArnRegion` parameter. The generated `S3ClientConfig` and
 * `AwsDynamicClient` enable the plugin by default for the S3 service.
 */
final class S3UseArnRegionPlugin extends AbstractPlugin
{
    private readonly S3UseArnRegionResolver $resolver;

    public function __construct(private readonly ?bool $explicit = null)
    {
        $this->resolver = new S3UseArnRegionResolver();
    }

    /**
     * @inheritDoc
     *
     * @throws \InvalidArgumentException When the environment variable or the
     *     profile setting is neither `true` nor `false`.
     */
    public function configure(ClientConfig $config): ClientConfig
    {
        if (!$config instanceof AbstractAwsClientConfig
            || $this->explicit !== null
        ) {
            return $config;
        }

        $parameters = $config->context[
            EndpointResolverInterface::CONTEXT_PARAMETERS
        ] ?? [];
        if (!\is_array($parameters)
            || ($parameters['UseArnRegion'] ?? null) !== null
        ) {
            return $config;
        }

        $resolver = new AwsClientConfigResolver();
        $value = $this->resolver->resolve(
            $resolver->storedContext($config)
                ?? $resolver->resolveContext($config)
        );
        if ($value === null) {
            return $config;
        }

        return $config->withContext(
            EndpointResolverInterface::CONTEXT_PARAMETERS,
            [...$parameters, 'UseArnRegion' => $value]
        );
    }
}
