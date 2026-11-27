<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\GetBucketAnalyticsConfigurationRequest;
use Aws\Services\S3\Output\GetBucketAnalyticsConfigurationOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. This implementation of the GET action returns an analytics
 * configuration (identified by the analytics configuration ID) from the bucket. To use this operation, you must have
 * permissions to perform the s3:GetAnalyticsConfiguration action. The bucket owner has this permission by default. The
 * bucket owner can grant this permission to others. For more information about permissions, see Permissions Related to
 * Bucket Subresource Operations and Managing Access Permissions to Your Amazon S3 Resources in the Amazon S3 User
 * Guide. For information about Amazon S3 analytics feature, see Amazon S3 Analytics – Storage Class Analysis in the
 * Amazon S3 User Guide. The following operations are related to GetBucketAnalyticsConfiguration:
 * DeleteBucketAnalyticsConfiguration ListBucketAnalyticsConfigurations PutBucketAnalyticsConfiguration You must URL
 * encode any signed header values that contain spaces. For example, if your header value is my file.txt, containing two
 * spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class GetBucketAnalyticsConfigurationOperation implements OperationInterface
{
    public const NAME = 'GetBucketAnalyticsConfiguration';
    public const ID = 'com.amazonaws.s3#GetBucketAnalyticsConfiguration';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = GetBucketAnalyticsConfigurationRequest::class;
    public const OUTPUT_CLASS = GetBucketAnalyticsConfigurationOutput::class;
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
            id: 'com.amazonaws.s3#GetBucketAnalyticsConfiguration',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?analytics&x-id=GetBucketAnalyticsConfiguration',
                    'code' => 200,
                    'pathQueryString' => 'analytics&x-id=GetBucketAnalyticsConfiguration'
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
        return GetBucketAnalyticsConfigurationRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return GetBucketAnalyticsConfigurationOutput::schema();
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
        return GetBucketAnalyticsConfigurationRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return GetBucketAnalyticsConfigurationOutput::fromMembers($members);
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
