<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Credentials\Provider;

/**
 * Reads raw metadata from the instance metadata service.
 */
interface InstanceProfileClientInterface
{
    /**
     * Fetch metadata from the instance metadata service.
     *
     * @throws \RuntimeException When the service returns an error response.
     */
    public function get(string $path): string;
}
