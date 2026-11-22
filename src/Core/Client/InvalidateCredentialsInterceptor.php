<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Client;

use Aws\Core\Retry\RetryMetadataException;
use Smithy\Client\Interceptor\AbstractInterceptor;
use Smithy\Client\Interceptor\OutputContext;
use Smithy\Protocol\Aws\AwsErrorInterface;

/**
 * Invalidate credentials rejected by a target AWS service.
 *
 * Only errors that indicate invalid credentials trigger invalidation.
 * Authorization failures such as `AccessDenied` leave credentials intact.
 */
final class InvalidateCredentialsInterceptor extends AbstractInterceptor
{
    private const INVALID_CREDENTIAL_CODES = [
        'ExpiredToken',
        'InvalidToken'
    ];

    private static ?self $instance = null;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    private function __construct() {}

    public function readAfterAttempt(
        OutputContext $ctx,
        ?\Throwable $error
    ): void
    {
        if ($error === null
            || $ctx->identity === null
            || $ctx->identityResolver === null
            || !\in_array(
                self::errorCode($error),
                self::INVALID_CREDENTIAL_CODES,
                true
            )
        ) {
            return;
        }

        $ctx->identityResolver->invalidate($ctx->identity);
    }

    private static function errorCode(\Throwable $error): ?string
    {
        $error = RetryMetadataException::unwrap($error);
        if ($error instanceof AwsErrorInterface
            && $error->getAwsErrorCode() !== null
            && $error->getAwsErrorCode() !== ''
        ) {
            return $error->getAwsErrorCode();
        }

        $class = $error::class;
        if (\defined($class . '::AWS_QUERY_ERROR_CODE')) {
            $code = \constant($class . '::AWS_QUERY_ERROR_CODE');
            if (\is_string($code) && $code !== '') {
                return $code;
            }
        }

        if (\defined($class . '::SHAPE_ID')) {
            $shapeId = \constant($class . '::SHAPE_ID');
            if (\is_string($shapeId) && \str_contains($shapeId, '#')) {
                return \substr($shapeId, \strrpos($shapeId, '#') + 1);
            }
        }

        return null;
    }
}
