<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Endpoint;

use Aws\Core\Endpoint\AwsFunctions;
use Aws\Core\Endpoint\Bytecode\{
    AwsOpcodeHandler,
    AwsOpcodes
};
use PHPUnit\Framework\TestCase;

final class AwsFunctionsTest extends TestCase
{
    public function testParseArnRejectsEmptyResource(): void
    {
        $arn = 'arn:aws:s3:us-west-2:123456789012:';

        self::assertNull(
            AwsFunctions::get('aws.parseArn')->apply1($arn)
        );
    }

    public function testFusedParseArnRejectsEmptyResource(): void
    {
        $handler = new AwsOpcodeHandler();
        $pc = 0;
        $stack = ['arn:aws:s3:us-west-2:123456789012:'];
        $sp = 1;
        $registers = [];

        $handler->handle(
            AwsOpcodes::PARSE_ARN,
            [],
            $pc,
            $stack,
            $sp,
            $registers,
            []
        );

        self::assertNull($stack[0]);
    }
}
