<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\ListBucketAnalyticsConfigurationsRequest;
use Aws\Services\S3\Output\ListBucketAnalyticsConfigurationsOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Lists the analytics configurations for the bucket. You can
 * have up to 1,000 analytics configurations per bucket. This action supports list pagination and does not return more
 * than 100 configurations at a time. You should always check the IsTruncated element in the response. If there are no
 * more configurations to list, IsTruncated is set to false. If there are more configurations to list, IsTruncated is
 * set to true, and there will be a value in NextContinuationToken. You use the NextContinuationToken value to continue
 * the pagination of the list by passing the value in continuation-token in the request to GET the next page. To use
 * this operation, you must have permissions to perform the s3:GetAnalyticsConfiguration action. The bucket owner has
 * this permission by default. The bucket owner can grant this permission to others. For more information about
 * permissions, see Permissions Related to Bucket Subresource Operations and Managing Access Permissions to Your Amazon
 * S3 Resources. For information about Amazon S3 analytics feature, see Amazon S3 Analytics – Storage Class Analysis.
 * The following operations are related to ListBucketAnalyticsConfigurations: GetBucketAnalyticsConfiguration
 * DeleteBucketAnalyticsConfiguration PutBucketAnalyticsConfiguration You must URL encode any signed header values that
 * contain spaces. For example, if your header value is my file.txt, containing two spaces after my, you must URL encode
 * this value to my%20%20file.txt.
 */
final class ListBucketAnalyticsConfigurationsOperation implements OperationInterface
{
    public const NAME = 'ListBucketAnalyticsConfigurations';
    public const ID = 'com.amazonaws.s3#ListBucketAnalyticsConfigurations';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = ListBucketAnalyticsConfigurationsRequest::class;
    public const OUTPUT_CLASS = ListBucketAnalyticsConfigurationsOutput::class;
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
            id: 'com.amazonaws.s3#ListBucketAnalyticsConfigurations',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?analytics&x-id=ListBucketAnalyticsConfigurations',
                    'code' => 200,
                    'pathQueryString' => 'analytics&x-id=ListBucketAnalyticsConfigurations'
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
        return ListBucketAnalyticsConfigurationsRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return ListBucketAnalyticsConfigurationsOutput::schema();
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
        return ListBucketAnalyticsConfigurationsRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return ListBucketAnalyticsConfigurationsOutput::fromMembers($members);
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
