<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

/**
 * <p>The End Event.</p>
 */
/** @internal */
final readonly class SelectObjectContentEventStreamEnd extends SelectObjectContentEventStream
{
    public function __construct(public EndEvent $value) {}

    public function getMemberIndex(): int
    {
        return 4;
    }

    public function tag(): string
    {
        return 'End';
    }

    public function value(): EndEvent
    {
        return $this->value;
    }
}
