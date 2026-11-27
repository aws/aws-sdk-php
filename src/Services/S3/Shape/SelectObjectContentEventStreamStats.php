<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

/**
 * <p>The Stats Event.</p>
 */
/** @internal */
final readonly class SelectObjectContentEventStreamStats extends SelectObjectContentEventStream
{
    public function __construct(public StatsEvent $value) {}

    public function getMemberIndex(): int
    {
        return 1;
    }

    public function tag(): string
    {
        return 'Stats';
    }

    public function value(): StatsEvent
    {
        return $this->value;
    }
}
