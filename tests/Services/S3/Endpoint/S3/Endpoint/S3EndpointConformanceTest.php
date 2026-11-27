<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Services\S3\Endpoint;

use Aws\Services\S3\Endpoint\S3EndpointBytecode;
use Aws\Tests\Core\Endpoint\EndpointConformanceTestCase;
use Smithy\Client\Endpoint\Bytecode\Bytecode;

/**
 * @generated Do not edit.
 */
final class S3EndpointConformanceTest extends EndpointConformanceTestCase
{
    protected static function generatedBytecode(): Bytecode
    {
        return S3EndpointBytecode::get();
    }

    protected static function fixturePath(): string
    {
        return __DIR__ . '/fixtures/endpoint-tests.php';
    }
}
