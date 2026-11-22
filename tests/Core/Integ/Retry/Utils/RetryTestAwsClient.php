<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Utils;

use Aws\Core\Client\AbstractAwsClient;

/**
 * AWS client bound to the retry test service.
 */
final class RetryTestAwsClient extends AbstractAwsClient
{
    public function __construct(TestRetryAwsClientConfig $config)
    {
        parent::__construct(
            $config->withService(TestRetryService::instance())
        );
    }
}
