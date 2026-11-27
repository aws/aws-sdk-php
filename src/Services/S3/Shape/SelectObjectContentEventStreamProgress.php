<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

/**
 * <p>The Progress Event.</p>
 */
/** @internal */
final readonly class SelectObjectContentEventStreamProgress extends SelectObjectContentEventStream
{
    public function __construct(public ProgressEvent $value) {}

    public function getMemberIndex(): int
    {
        return 2;
    }

    public function tag(): string
    {
        return 'Progress';
    }

    public function value(): ProgressEvent
    {
        return $this->value;
    }
}
