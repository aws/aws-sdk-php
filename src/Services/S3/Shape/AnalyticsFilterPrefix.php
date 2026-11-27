<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

/**
 * <p>The prefix to use when evaluating an analytics filter.</p>
 */
/** @internal */
final readonly class AnalyticsFilterPrefix extends AnalyticsFilter
{
    public function __construct(public string $value) {}

    public function getMemberIndex(): int
    {
        return 0;
    }

    public function tag(): string
    {
        return 'Prefix';
    }

    public function value(): string
    {
        return $this->value;
    }
}
