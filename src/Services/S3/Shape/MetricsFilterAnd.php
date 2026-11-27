<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

/**
 * <p>A conjunction (logical AND) of predicates, which is used in evaluating a metrics filter. The
      operator must
 * have at least two predicates, and an object must match all of the predicates in order for
      the filter to
 * apply.</p>
 */
/** @internal */
final readonly class MetricsFilterAnd extends MetricsFilter
{
    public function __construct(public MetricsAndOperator $value) {}

    public function getMemberIndex(): int
    {
        return 3;
    }

    public function tag(): string
    {
        return 'And';
    }

    public function value(): MetricsAndOperator
    {
        return $this->value;
    }
}
