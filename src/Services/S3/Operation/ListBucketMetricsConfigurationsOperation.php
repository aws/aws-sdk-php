<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\ListBucketMetricsConfigurationsRequest;
use Aws\Services\S3\Output\ListBucketMetricsConfigurationsOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Lists the metrics configurations for the bucket. The metrics configurations are only for the request metrics of the
 * bucket and do not provide information on daily storage metrics. You can have up to 1,000 configurations per bucket.
 * Directory buckets - For directory buckets, you must make requests for this API operation to the Regional endpoint.
 * These endpoints support path-style requests in the format
 * https://s3express-control.region-code.amazonaws.com/bucket-name . Virtual-hosted-style requests aren't supported. For
 * more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory buckets in
 * Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see Concepts for
 * directory buckets in Local Zones in the Amazon S3 User Guide. This action supports list pagination and does not
 * return more than 100 configurations at a time. Always check the IsTruncated element in the response. If there are no
 * more configurations to list, IsTruncated is set to false. If there are more configurations to list, IsTruncated is
 * set to true, and there is a value in NextContinuationToken. You use the NextContinuationToken value to continue the
 * pagination of the list by passing the value in continuation-token in the request to GET the next page. Permissions To
 * use this operation, you must have permissions to perform the s3:GetMetricsConfiguration action. The bucket owner has
 * this permission by default. The bucket owner can grant this permission to others. For more information about
 * permissions, see Permissions Related to Bucket Subresource Operations and Managing Access Permissions to Your Amazon
 * S3 Resources. General purpose bucket permissions - The s3:GetMetricsConfiguration permission is required in a policy.
 * For more information about general purpose buckets permissions, see Using Bucket Policies and User Policies in the
 * Amazon S3 User Guide. Directory bucket permissions - To grant access to this API operation, you must have the
 * s3express:GetMetricsConfiguration permission in an IAM identity-based policy instead of a bucket policy.
 * Cross-account access to this API operation isn't supported. This operation can only be performed by the Amazon Web
 * Services account that owns the resource. For more information about directory bucket policies and permissions, see
 * Amazon Web Services Identity and Access Management (IAM) for S3 Express One Zone in the Amazon S3 User Guide. HTTP
 * Host header syntax Directory buckets - The HTTP Host header syntax is s3express-control.region-code.amazonaws.com.
 * For more information about metrics configurations and CloudWatch request metrics, see Monitoring Metrics with Amazon
 * CloudWatch. The following operations are related to ListBucketMetricsConfigurations: PutBucketMetricsConfiguration
 * GetBucketMetricsConfiguration DeleteBucketMetricsConfiguration You must URL encode any signed header values that
 * contain spaces. For example, if your header value is my file.txt, containing two spaces after my, you must URL encode
 * this value to my%20%20file.txt.
 */
final class ListBucketMetricsConfigurationsOperation implements OperationInterface
{
    public const NAME = 'ListBucketMetricsConfigurations';
    public const ID = 'com.amazonaws.s3#ListBucketMetricsConfigurations';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = ListBucketMetricsConfigurationsRequest::class;
    public const OUTPUT_CLASS = ListBucketMetricsConfigurationsOutput::class;
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
            id: 'com.amazonaws.s3#ListBucketMetricsConfigurations',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?metrics&x-id=ListBucketMetricsConfigurations',
                    'code' => 200,
                    'pathQueryString' => 'metrics&x-id=ListBucketMetricsConfigurations'
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
        return ListBucketMetricsConfigurationsRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return ListBucketMetricsConfigurationsOutput::schema();
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
        return ListBucketMetricsConfigurationsRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return ListBucketMetricsConfigurationsOutput::fromMembers($members);
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
