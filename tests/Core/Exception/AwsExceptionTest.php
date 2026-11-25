<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Exception;

use Aws\Core\Exception\AwsException;
use Aws\Tests\Core\Exception\Utils\ServiceBaseException;
use PHPUnit\Framework\TestCase;
use Smithy\Core\Exception\ErrorFault;

final class AwsExceptionTest extends TestCase
{
    public function testFromAwsErrorBuildsAwsException(): void
    {
        $previous = new \RuntimeException('cause');

        $error = AwsException::fromAwsError(
            'boom',
            ErrorFault::Server,
            $previous,
            'InternalError',
            'req-1',
            500
        );

        $this->assertSame(AwsException::class, $error::class);
        $this->assertSame('boom', $error->getMessage());
        $this->assertSame(ErrorFault::Server, $error->fault);
        $this->assertSame('InternalError', $error->getAwsErrorCode());
        $this->assertSame('req-1', $error->getAwsRequestId());
        $this->assertSame(500, $error->getHttpStatusCode());
        $this->assertSame($previous, $error->getPrevious());
    }

    public function testFromAwsErrorBuildsCalledSubclass(): void
    {
        $error = ServiceBaseException::fromAwsError(
            'denied',
            ErrorFault::Client,
            null,
            'AccessDenied',
            'req-2',
            403
        );

        $this->assertSame(ServiceBaseException::class, $error::class);
        $this->assertSame('denied', $error->getMessage());
        $this->assertSame(ErrorFault::Client, $error->fault);
        $this->assertSame('AccessDenied', $error->getAwsErrorCode());
        $this->assertSame('req-2', $error->getAwsRequestId());
        $this->assertSame(403, $error->getHttpStatusCode());
        $this->assertNull($error->getPrevious());
    }
}
