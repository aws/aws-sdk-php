<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client\Utils;

use Aws\Core\Client\AbstractAwsClient;

/**
 * Concrete client that uses the inherited AbstractAwsClient constructor as is.
 */
final class BareAwsClient extends AbstractAwsClient {}
