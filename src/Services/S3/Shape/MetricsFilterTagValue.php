<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

/**
 * <p>The tag used when evaluating a metrics filter.</p>
         <note>
            <p>
               <code>Tag</code>
 * filters are not supported for directory buckets.</p>
         </note>
 */
/** @internal */
final readonly class MetricsFilterTagValue extends MetricsFilter
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
