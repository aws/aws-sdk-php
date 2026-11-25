<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Exception;

use Smithy\Core\Exception\ApiException;
use Smithy\Core\Exception\ErrorFault;
use Smithy\Protocol\Aws\AwsErrorInterface;
use Smithy\Protocol\Aws\AwsErrorRetryTrait;

/**
 * Base exception for all AWS service errors.
 *
 * Extends ApiException with AWS-specific metadata: error code,
 * request ID, and HTTP status code. Service-specific exceptions
 * (e.g., StsException) extend this class.
 *
 * @todo Move to Aws\Exception\AwsException in the SDK package
 */
class AwsException extends ApiException implements AwsErrorInterface
{
    use AwsErrorRetryTrait;

    public function __construct(
        string $message = '',
        ErrorFault $fault = ErrorFault::Other,
        private ?string $awsErrorCode = null,
        private ?string $requestId = null,
        private ?int $httpStatusCode = null,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, $fault, $previous);
    }

    /**
     * Return the AWS error discriminator.
     */
    public function getAwsErrorCode(): ?string
    {
        return $this->awsErrorCode;
    }

    /**
     * Return the AWS response request ID.
     */
    public function getAwsRequestId(): ?string
    {
        return $this->requestId;
    }

    /**
     * Return the HTTP response status code.
     */
    public function getHttpStatusCode(): ?int
    {
        return $this->httpStatusCode;
    }

    /**
     * Create an AWS error without modeled members from response metadata.
     *
     * Each generated service base exception declares this factory again, so
     * unmodeled errors keep the service type.
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
        return new self($message, $fault, $awsErrorCode, $requestId, $httpStatusCode, $previous);
    }

    public function setAwsErrorMetadata(
        string $message,
        ?string $awsErrorCode,
        ?string $requestId,
        ?int $httpStatusCode
    ): void
    {
        if ($this->message === '') {
            $this->message = $message;
        }
        $this->awsErrorCode = $awsErrorCode;
        $this->requestId = $requestId;
        $this->httpStatusCode = $httpStatusCode;
    }
}
