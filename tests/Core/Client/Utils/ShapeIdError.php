<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client\Utils;

/**
 * Modeled error that names its code with its shape ID only.
 */
final class ShapeIdError extends \RuntimeException
{
    public const SHAPE_ID = 'aws.tests#InvalidToken';
}
