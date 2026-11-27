<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutBucketAccelerateConfigurationRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Sets the accelerate configuration of an existing bucket.
 * Amazon S3 Transfer Acceleration is a bucket-level feature that enables you to perform faster data transfers to Amazon
 * S3. To use this operation, you must have permission to perform the s3:PutAccelerateConfiguration action. The bucket
 * owner has this permission by default. The bucket owner can grant this permission to others. For more information
 * about permissions, see Permissions Related to Bucket Subresource Operations and Managing Access Permissions to Your
 * Amazon S3 Resources. The Transfer Acceleration state of a bucket can be set to one of the following two values:
 * Enabled – Enables accelerated data transfers to the bucket. Suspended – Disables accelerated data transfers to
 * the bucket. The GetBucketAccelerateConfiguration action returns the transfer acceleration state of a bucket. After
 * setting the Transfer Acceleration state of a bucket to Enabled, it might take up to thirty minutes before the data
 * transfer rates to the bucket increase. The name of the bucket used for Transfer Acceleration must be DNS-compliant
 * and must not contain periods ("."). For more information about transfer acceleration, see Transfer Acceleration. The
 * following operations are related to PutBucketAccelerateConfiguration: GetBucketAccelerateConfiguration CreateBucket
 * You must URL encode any signed header values that contain spaces. For example, if your header value is my file.txt,
 * containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class PutBucketAccelerateConfigurationOperation implements OperationInterface
{
    public const NAME = 'PutBucketAccelerateConfiguration';
    public const ID = 'com.amazonaws.s3#PutBucketAccelerateConfiguration';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutBucketAccelerateConfigurationRequest::class;
    public const OUTPUT_CLASS = Unit::class;
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
            id: 'com.amazonaws.s3#PutBucketAccelerateConfiguration',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '?accelerate',
                    'code' => 200,
                    'pathQueryString' => 'accelerate'
                ],
                28 => ['requestAlgorithmMember' => 'ChecksumAlgorithm']
            ],
            traitsById: [
                'aws.protocols#httpChecksum' => ['requestAlgorithmMember' => 'ChecksumAlgorithm']
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
        return PutBucketAccelerateConfigurationRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return Unit::schema();
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
        return PutBucketAccelerateConfigurationRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return Unit::fromMembers($members);
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
