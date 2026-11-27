<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Exception;

use Aws\Core\Exception\AwsException;
use Smithy\Core\Exception\ErrorFault;
use Smithy\Protocol\Aws\AwsExtendedRequestIdInterface;

/**
 * Base exception for all S3 service errors.
 *
 * Catch this to handle any error from the S3 service,
 * whether modeled or unmodeled.
 */
class S3Exception extends AwsException implements AwsExtendedRequestIdInterface
{
    private ?string $extendedRequestId = null;

    /**
     * Return the S3 extended request ID (`x-amz-id-2` header or the
     * `Error>HostId` body element), or null when the response has none.
     */
    public function getExtendedRequestId(): ?string
    {
        return $this->extendedRequestId;
    }

    /**
     * Set the S3 extended request ID.
     *
     * @internal Called by the S3 error interceptor.
     */
    public function setExtendedRequestId(?string $extendedRequestId): void
    {
        $this->extendedRequestId = $extendedRequestId;
    }

    /**
     * Create an unmodeled S3 error from AWS error metadata.
     */
    public static function fromAwsError(
        string $message,
        ErrorFault $fault,
        ?\Throwable $previous,
        ?string $awsErrorCode,
        ?string $requestId,
        ?int $httpStatusCode
    ): self
    {
        return new self(
            message: $message,
            fault: $fault,
            previous: $previous,
            awsErrorCode: $awsErrorCode,
            requestId: $requestId,
            httpStatusCode: $httpStatusCode
        );
    }
}
