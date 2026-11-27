<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\ListBucketsRequest;
use Aws\Services\S3\Output\ListBucketsOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Returns a list of all buckets owned by the authenticated
 * sender of the request. To grant IAM permission to use this operation, you must add the s3:ListAllMyBuckets policy
 * action. For information about Amazon S3 buckets, see Creating, configuring, and working with Amazon S3 buckets. We
 * strongly recommend using only paginated ListBuckets requests. Unpaginated ListBuckets requests are only supported for
 * Amazon Web Services accounts set to the default general purpose bucket quota of 10,000. If you have an approved
 * general purpose bucket quota above 10,000, you must send paginated ListBuckets requests to list your account’s
 * buckets. All unpaginated ListBuckets requests will be rejected for Amazon Web Services accounts with a general
 * purpose bucket quota greater than 10,000. You must URL encode any signed header values that contain spaces. For
 * example, if your header value is my file.txt, containing two spaces after my, you must URL encode this value to
 * my%20%20file.txt.
 */
final class ListBucketsOperation implements OperationInterface
{
    public const NAME = 'ListBuckets';
    public const ID = 'com.amazonaws.s3#ListBuckets';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = ListBucketsRequest::class;
    public const OUTPUT_CLASS = ListBucketsOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [];

    private static ?self $INSTANCE = null;
    private static ?Schema $SCHEMA = null;

    public static function instance(): self
    {
        return self::$INSTANCE ??= new self();
    }

    private function __construct() {}

    public function getName(): string
    {
        return self::NAME;
    }

    public function getId(): string
    {
        return self::ID;
    }

    public function getServiceId(): string
    {
        return self::SERVICE_ID;
    }

    public function getServiceExceptionClass(): string
    {
        return S3Exception::class;
    }

    public function getRuntimeIdentity(): string
    {
        return self::class;
    }

    public function getEffectiveAuthSchemes(): array
    {
        return self::AUTH_SCHEMES;
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        return self::$SCHEMA ??= new Schema(
            id: 'com.amazonaws.s3#ListBuckets',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '/?x-id=ListBuckets',
                    'code' => 200,
                    'pathQueryString' => 'x-id=ListBuckets'
                ],
                Schema::T_PAGINATED => [
                    'inputToken' => 'ContinuationToken',
                    'outputToken' => 'ContinuationToken',
                    'items' => 'Buckets',
                    'pageSize' => 'MaxBuckets'
                ]
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return ListBucketsRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return ListBucketsOutput::schema();
    }

    public function getOutputSchema(): Schema
    {
        return self::outputSchema();
    }

    /**
     * @return list<Schema> Modeled error schemas.
     */
    public function getErrorSchemas(): array
    {
        return [];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return ListBucketsRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return ListBucketsOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return null;
    }

    public function getInputStreamMember(): ?Schema
    {
        return null;
    }

    public function getOutputStreamMember(): ?Schema
    {
        return null;
    }
}
