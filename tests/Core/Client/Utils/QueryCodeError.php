<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client\Utils;

/**
 * Modeled error that names its code with an AWS query error code constant.
 */
final class QueryCodeError extends \RuntimeException
{
    public const AWS_QUERY_ERROR_CODE = 'ExpiredToken';
    public const SHAPE_ID = 'aws.tests#QueryCodeError';
}
