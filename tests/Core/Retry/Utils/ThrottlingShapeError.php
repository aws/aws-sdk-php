<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Retry\Utils;

/**
 * Unmodeled error whose shape ID names a throttling error code.
 */
final class ThrottlingShapeError extends \RuntimeException
{
    public const SHAPE_ID = 'aws.tests#ThrottlingException';
}
