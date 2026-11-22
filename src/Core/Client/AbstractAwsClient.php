<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Client;

use Aws\Core\Checksum\FlexibleChecksumPlugin;
use Aws\Core\Retry\StandardRetryPlugin;
use Aws\Core\UserAgent\UserAgentPlugin;
use Aws\Core\UserAgent\WaiterFeaturePlugin;
use Smithy\Client\AbstractClient;
use Smithy\Client\Plugin\PluginCollection;
use Smithy\Client\RequestOverrideConfig;
use Smithy\Client\Waiter\Waiter;
use Smithy\Client\Waiter\WaiterConfig;
use Smithy\Core\Shape\OperationInterface;

/**
 * Base class for AWS service clients.
 *
 * Sits between the generic {@see AbstractClient} and the generated
 * per-service client (`S3Client`, `StsClient`, ...). It:
 *
 *  - Requires an {@see AbstractAwsClientConfig} at construction time.
 *  - Installs the AWS plugin pipeline: client config resolution, flexible
 *    checksums when the service supports them, service default plugins,
 *    standard retry and user agent.
 *  - Marks waiter polls with the WAITER metric.
 *  - Narrows the return type of {@see getConfig()} so callers get the
 *    AWS-specific fields without casting.
 *
 * All operation dispatch flows through the inherited
 * {@see AbstractClient::executeOperation()}.
 */
abstract class AbstractAwsClient extends AbstractClient implements AwsClientInterface
{
    private const SERVICE_TRAIT = 'aws.api#service';

    public function __construct(
        AbstractAwsClientConfig $config,
        PluginCollection $plugins = new PluginCollection()
    ) {
        $plugins = $plugins->prepend(AwsClientConfigPlugin::instance());
        if ($config->supportsFlexibleChecksums()) {
            $plugins = $plugins->add(new FlexibleChecksumPlugin());
        }
        foreach ($config->getDefaultPlugins() as $plugin) {
            $plugins = $plugins->add($plugin);
        }
        $plugins = $plugins->add(StandardRetryPlugin::instance());
        $plugins = $plugins->add(UserAgentPlugin::instance());

        parent::__construct($config, $plugins);
    }

    /**
     * Create a waiter whose polling requests carry the WAITER metric.
     */
    protected function createWaiter(
        OperationInterface $operation,
        string $waiterName,
        ?WaiterConfig $config = null
    ): Waiter
    {
        $overrides = $config?->requestOverrides
            ?? RequestOverrideConfig::fromArray([]);

        return parent::createWaiter(
            $operation,
            $waiterName,
            new WaiterConfig(
                $config?->minDelay,
                $config?->maxDelay,
                $overrides->withPlugin(WaiterFeaturePlugin::instance())
            )
        );
    }

    public function getConfig(): AbstractAwsClientConfig
    {
        /** @var AbstractAwsClientConfig */
        return $this->config;
    }

    /**
     * The untransformed specification serviceId (aws.api#service sdkId) of the
     * service this client targets, for example "S3" or "SSO OIDC".
     *
     * The client and namespace names are the PascalCase transform of this
     * value; this accessor exposes the original, which runtime features
     * such as metrics and documentation present unchanged. It reuses the
     * sdkId already carried on the generated service schema and falls back
     * to the service name when the trait is absent.
     */
    public function sdkId(): string
    {
        $service = $this->getConfig()->service;
        if ($service === null) {
            return '';
        }

        $sdkId = $service->getSchema()
            ->getTraitById(self::SERVICE_TRAIT)['sdkId'] ?? null;

        return \is_string($sdkId) && $sdkId !== ''
            ? $sdkId
            : $service->getName();
    }
}
