<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\GetBucketAccelerateConfigurationRequest;
use Aws\Services\S3\Output\GetBucketAccelerateConfigurationOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. This implementation of the GET action uses the accelerate
 * subresource to return the Transfer Acceleration state of a bucket, which is either Enabled or Suspended. Amazon S3
 * Transfer Acceleration is a bucket-level feature that enables you to perform faster data transfers to and from Amazon
 * S3. To use this operation, you must have permission to perform the s3:GetAccelerateConfiguration action. The bucket
 * owner has this permission by default. The bucket owner can grant this permission to others. For more information
 * about permissions, see Permissions Related to Bucket Subresource Operations and Managing Access Permissions to your
 * Amazon S3 Resources in the Amazon S3 User Guide. You set the Transfer Acceleration state of an existing bucket to
 * Enabled or Suspended by using the PutBucketAccelerateConfiguration operation. A GET accelerate request does not
 * return a state value for a bucket that has no transfer acceleration state. A bucket has no Transfer Acceleration
 * state if a state has never been set on the bucket. For more information about transfer acceleration, see Transfer
 * Acceleration in the Amazon S3 User Guide. The following operations are related to GetBucketAccelerateConfiguration:
 * PutBucketAccelerateConfiguration You must URL encode any signed header values that contain spaces. For example, if
 * your header value is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class GetBucketAccelerateConfigurationOperation implements OperationInterface
{
    public const NAME = 'GetBucketAccelerateConfiguration';
    public const ID = 'com.amazonaws.s3#GetBucketAccelerateConfiguration';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = GetBucketAccelerateConfigurationRequest::class;
    public const OUTPUT_CLASS = GetBucketAccelerateConfigurationOutput::class;
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
            id: 'com.amazonaws.s3#GetBucketAccelerateConfiguration',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?accelerate',
                    'code' => 200,
                    'pathQueryString' => 'accelerate'
                ]
            ],
            directTraitsById: [
                'smithy.rules#staticContextParams' => ['UseS3ExpressControlEndpoint' => ['value' => true]]
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return GetBucketAccelerateConfigurationRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return GetBucketAccelerateConfigurationOutput::schema();
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
        return GetBucketAccelerateConfigurationRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return GetBucketAccelerateConfigurationOutput::fromMembers($members);
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
