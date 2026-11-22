<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Generated;

use Aws\Core\Client\AbstractAwsClient;
use Aws\Tests\Core\Integ\Retry\Generated\Input\RetryFixtureInput;
use Aws\Tests\Core\Integ\Retry\Generated\Operation\PutObjectOperation;
use Aws\Tests\Core\Integ\Retry\Generated\Operation\ReceiveMessageOperation;
use Aws\Tests\Core\Integ\Retry\Generated\Output\RetryFixtureOutput;
use Smithy\Client\Plugin\PluginCollection;

final class RetryFixtureClient extends AbstractAwsClient
{
    public function __construct(
        RetryFixtureClientConfig $config,
        PluginCollection $plugins = new PluginCollection()
    ) {
        parent::__construct(
            $config->withService(RetryFixtureService::instance()),
            $plugins
        );
    }

    public function putObject(RetryFixtureInput $input): RetryFixtureOutput
    {
        /** @var RetryFixtureOutput */
        return $this->executeOperation(
            PutObjectOperation::instance(),
            $input
        );
    }

    public function receiveMessage(
        RetryFixtureInput $input
    ): RetryFixtureOutput
    {
        /** @var RetryFixtureOutput */
        return $this->executeOperation(
            ReceiveMessageOperation::instance(),
            $input
        );
    }
}
