<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client\Utils;

use Aws\Core\Client\AbstractAwsClient;
use Aws\Core\Client\AbstractAwsClientConfig;
use Smithy\Client\Dynamic\{
    DynamicOperation,
    DynamicService
};
use Smithy\Client\Plugin\PluginCollection;
use Smithy\Client\Waiter\{
    WaiterConfig,
    WaiterResult
};
use Smithy\Core\Model\SmithyModel;
use Smithy\Core\Serde\SchemaConverter;
use Smithy\Core\Shape\ServiceInterface;

/**
 * Concrete subclass used to exercise the abstract class in tests.
 *
 * The client targets the runtime-loaded service in the client test model
 * unless a test passes another service.
 */
final class NoopAwsClient extends AbstractAwsClient
{
    public const MODEL = __DIR__ . '/../fixtures/aws-client-model.json';

    public function __construct(
        AbstractAwsClientConfig $config,
        PluginCollection $plugins = new PluginCollection(),
        ?ServiceInterface $service = null
    ) {
        parent::__construct(
            $config->withService(
                $service ?? self::service(SmithyModel::fromFile(self::MODEL))
            ),
            $plugins
        );
    }

    /**
     * Build a runtime-loaded service from a model.
     */
    public static function service(SmithyModel $model): DynamicService
    {
        return new DynamicService($model, new SchemaConverter($model));
    }

    /**
     * Poll the modeled `PingReady` waiter on the `Ping` operation.
     */
    public function waitUntilPingReady(
        ?WaiterConfig $config = null
    ): WaiterResult
    {
        $operation = $this->getConfig()->service?->getOperation('Ping');
        if (!$operation instanceof DynamicOperation) {
            throw new \LogicException('The client model has no Ping operation.');
        }

        return $this->createWaiter($operation, 'PingReady', $config)
            ->wait($operation->createInputFromValue([]), 5.0);
    }
}
