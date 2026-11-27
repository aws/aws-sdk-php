<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\DeleteBucketMetricsConfigurationRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Deletes a metrics configuration for the Amazon CloudWatch request metrics (specified by the metrics configuration ID)
 * from the bucket. Note that this doesn't include the daily storage metrics. Directory buckets - For directory buckets,
 * you must make requests for this API operation to the Regional endpoint. These endpoints support path-style requests
 * in the format https://s3express-control.region-code.amazonaws.com/bucket-name . Virtual-hosted-style requests aren't
 * supported. For more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory
 * buckets in Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see
 * Concepts for directory buckets in Local Zones in the Amazon S3 User Guide. Permissions To use this operation, you
 * must have permissions to perform the s3:PutMetricsConfiguration action. The bucket owner has this permission by
 * default. The bucket owner can grant this permission to others. For more information about permissions, see
 * Permissions Related to Bucket Subresource Operations and Managing Access Permissions to Your Amazon S3 Resources.
 * General purpose bucket permissions - The s3:PutMetricsConfiguration permission is required in a policy. For more
 * information about general purpose buckets permissions, see Using Bucket Policies and User Policies in the Amazon S3
 * User Guide. Directory bucket permissions - To grant access to this API operation, you must have the
 * s3express:PutMetricsConfiguration permission in an IAM identity-based policy instead of a bucket policy.
 * Cross-account access to this API operation isn't supported. This operation can only be performed by the Amazon Web
 * Services account that owns the resource. For more information about directory bucket policies and permissions, see
 * Amazon Web Services Identity and Access Management (IAM) for S3 Express One Zone in the Amazon S3 User Guide. HTTP
 * Host header syntax Directory buckets - The HTTP Host header syntax is s3express-control.region-code.amazonaws.com.
 * For information about CloudWatch request metrics for Amazon S3, see Monitoring Metrics with Amazon CloudWatch. The
 * following operations are related to DeleteBucketMetricsConfiguration: GetBucketMetricsConfiguration
 * PutBucketMetricsConfiguration ListBucketMetricsConfigurations Monitoring Metrics with Amazon CloudWatch You must URL
 * encode any signed header values that contain spaces. For example, if your header value is my file.txt, containing two
 * spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class DeleteBucketMetricsConfigurationOperation implements OperationInterface
{
    public const NAME = 'DeleteBucketMetricsConfiguration';
    public const ID = 'com.amazonaws.s3#DeleteBucketMetricsConfiguration';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = DeleteBucketMetricsConfigurationRequest::class;
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
            id: 'com.amazonaws.s3#DeleteBucketMetricsConfiguration',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'DELETE',
                    'uri' => '?metrics',
                    'code' => 204,
                    'pathQueryString' => 'metrics'
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
        return DeleteBucketMetricsConfigurationRequest::schema();
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
        return DeleteBucketMetricsConfigurationRequest::fromMembers($members);
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
