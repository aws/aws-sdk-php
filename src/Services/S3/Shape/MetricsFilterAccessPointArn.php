<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

/**
 * <p>The access point ARN used when evaluating a metrics filter.</p>
 */
/** @internal */
final readonly class MetricsFilterAccessPointArn extends MetricsFilter
{
    public function __construct(public string $value) {}

    public function getMemberIndex(): int
    {
        return 2;
    }

    public function tag(): string
    {
        return 'AccessPointArn';
    }

    public function value(): string
    {
        return $this->value;
    }
}
