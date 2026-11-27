<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

/**
 * <p>The Continuation Event.</p>
 */
/** @internal */
final readonly class SelectObjectContentEventStreamCont extends SelectObjectContentEventStream
{
    public function __construct(public ContinuationEvent $value) {}

    public function getMemberIndex(): int
    {
        return 3;
    }

    public function tag(): string
    {
        return 'Cont';
    }

    public function value(): ContinuationEvent
    {
        return $this->value;
    }
}
