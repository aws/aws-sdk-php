<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Exception\Utils;

use Aws\Core\Exception\AwsException;

/**
 * Service base exception that keeps the AwsException constructor.
 */
class ServiceBaseException extends AwsException {}
