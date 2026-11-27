<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

/**
 * <p>The Records Event.</p>
 */
/** @internal */
final readonly class SelectObjectContentEventStreamRecords extends SelectObjectContentEventStream
{
    public function __construct(public RecordsEvent $value) {}

    public function getMemberIndex(): int
    {
        return 0;
    }

    public function tag(): string
    {
        return 'Records';
    }

    public function value(): RecordsEvent
    {
        return $this->value;
    }
}
