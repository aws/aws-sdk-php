<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\NoSuchBucketException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\ListObjectsRequest;
use Aws\Services\S3\Output\ListObjectsOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Returns some or all (up to 1,000) of the objects in a bucket.
 * You can use the request parameters as selection criteria to return a subset of the objects in a bucket. A 200 OK
 * response can contain valid or invalid XML. Be sure to design your application to parse the contents of the response
 * and handle it appropriately. This action has been revised. We recommend that you use the newer version,
 * ListObjectsV2, when developing applications. For backward compatibility, Amazon S3 continues to support ListObjects.
 * The following operations are related to ListObjects: ListObjectsV2 GetObject PutObject CreateBucket ListBuckets You
 * must URL encode any signed header values that contain spaces. For example, if your header value is my file.txt,
 * containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class ListObjectsOperation implements OperationInterface
{
    public const NAME = 'ListObjects';
    public const ID = 'com.amazonaws.s3#ListObjects';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = ListObjectsRequest::class;
    public const OUTPUT_CLASS = ListObjectsOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [
        'com.amazonaws.s3#NoSuchBucket' => 'com.amazonaws.s3#NoSuchBucket',
        'NoSuchBucket' => 'com.amazonaws.s3#NoSuchBucket'
    ];

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
            id: 'com.amazonaws.s3#ListObjects',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '',
                    'code' => 200
                ],
                Schema::T_ERRORS => self::ERRORS
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return ListObjectsRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return ListObjectsOutput::schema();
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
        return [
            NoSuchBucketException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return ListObjectsRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return ListObjectsOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'com.amazonaws.s3#NoSuchBucket' => NoSuchBucketException::schema(),
            'NoSuchBucket' => NoSuchBucketException::schema(),
            default => null
        };
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
