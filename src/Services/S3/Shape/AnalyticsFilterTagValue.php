<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

/**
 * <p>The tag to use when evaluating an analytics filter.</p>
 */
/** @internal */
final readonly class AnalyticsFilterTagValue extends AnalyticsFilter
{
    public function __construct(public Tag $value) {}

    public function getMemberIndex(): int
    {
        return 1;
    }

    public function tag(): string
    {
        return 'Tag';
    }

    public function value(): Tag
    {
        return $this->value;
    }
}
