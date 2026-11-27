<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutBucketAnalyticsConfigurationRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Sets an analytics configuration for the bucket (specified by
 * the analytics configuration ID). You can have up to 1,000 analytics configurations per bucket. You can choose to have
 * storage class analysis export analysis reports sent to a comma-separated values (CSV) flat file. See the DataExport
 * request element. Reports are updated daily and are based on the object filters that you configure. When selecting
 * data export, you specify a destination bucket and an optional destination prefix where the file is written. You can
 * export the data to a destination bucket in a different account. However, the destination bucket must be in the same
 * Region as the bucket that you are making the PUT analytics configuration to. For more information, see Amazon S3
 * Analytics – Storage Class Analysis. You must create a bucket policy on the destination bucket where the exported
 * file is written to grant permissions to Amazon S3 to write objects to the bucket. For an example policy, see Granting
 * Permissions for Amazon S3 Inventory and Storage Class Analysis. To use this operation, you must have permissions to
 * perform the s3:PutAnalyticsConfiguration action. The bucket owner has this permission by default. The bucket owner
 * can grant this permission to others. For more information about permissions, see Permissions Related to Bucket
 * Subresource Operations and Managing Access Permissions to Your Amazon S3 Resources. PutBucketAnalyticsConfiguration
 * has the following special errors: HTTP Error: HTTP 400 Bad Request Code: InvalidArgument Cause: Invalid argument.
 * HTTP Error: HTTP 400 Bad Request Code: TooManyConfigurations Cause: You are attempting to create a new configuration
 * but have already reached the 1,000-configuration limit. HTTP Error: HTTP 403 Forbidden Code: AccessDenied Cause: You
 * are not the owner of the specified bucket, or you do not have the s3:PutAnalyticsConfiguration bucket permission to
 * set the configuration on the bucket. The following operations are related to PutBucketAnalyticsConfiguration:
 * GetBucketAnalyticsConfiguration DeleteBucketAnalyticsConfiguration ListBucketAnalyticsConfigurations You must URL
 * encode any signed header values that contain spaces. For example, if your header value is my file.txt, containing two
 * spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class PutBucketAnalyticsConfigurationOperation implements OperationInterface
{
    public const NAME = 'PutBucketAnalyticsConfiguration';
    public const ID = 'com.amazonaws.s3#PutBucketAnalyticsConfiguration';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutBucketAnalyticsConfigurationRequest::class;
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
            id: 'com.amazonaws.s3#PutBucketAnalyticsConfiguration',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '?analytics',
                    'code' => 200,
                    'pathQueryString' => 'analytics'
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
        return PutBucketAnalyticsConfigurationRequest::schema();
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
        return PutBucketAnalyticsConfigurationRequest::fromMembers($members);
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
