<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

/**
 * <p>A conjunction (logical AND) of predicates, which is used in evaluating an analytics filter. The
      operator
 * must have at least two predicates.</p>
 */
/** @internal */
final readonly class AnalyticsFilterAnd extends AnalyticsFilter
{
    public function __construct(public AnalyticsAndOperator $value) {}

    public function getMemberIndex(): int
    {
        return 2;
    }

    public function tag(): string
    {
        return 'And';
    }

    public function value(): AnalyticsAndOperator
    {
        return $this->value;
    }
}
