<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\ListBucketIntelligentTieringConfigurationsRequest;
use Aws\Services\S3\Output\ListBucketIntelligentTieringConfigurationsOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Lists the S3 Intelligent-Tiering configuration from the
 * specified bucket. The S3 Intelligent-Tiering storage class is designed to optimize storage costs by automatically
 * moving data to the most cost-effective storage access tier, without performance impact or operational overhead. S3
 * Intelligent-Tiering delivers automatic cost savings in three low latency and high throughput access tiers. To get the
 * lowest storage cost on data that can be accessed in minutes to hours, you can choose to activate additional archiving
 * capabilities. The S3 Intelligent-Tiering storage class is the ideal storage class for data with unknown, changing, or
 * unpredictable access patterns, independent of object size or retention period. If the size of an object is less than
 * 128 KB, it is not monitored and not eligible for auto-tiering. Smaller objects can be stored, but they are always
 * charged at the Frequent Access tier rates in the S3 Intelligent-Tiering storage class. For more information, see
 * Storage class for automatically optimizing frequently and infrequently accessed objects. Operations related to
 * ListBucketIntelligentTieringConfigurations include: DeleteBucketIntelligentTieringConfiguration
 * PutBucketIntelligentTieringConfiguration GetBucketIntelligentTieringConfiguration You must URL encode any signed
 * header values that contain spaces. For example, if your header value is my file.txt, containing two spaces after my,
 * you must URL encode this value to my%20%20file.txt.
 */
final class ListBucketIntelligentTieringConfigurationsOperation implements OperationInterface
{
    public const NAME = 'ListBucketIntelligentTieringConfigurations';
    public const ID = 'com.amazonaws.s3#ListBucketIntelligentTieringConfigurations';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = ListBucketIntelligentTieringConfigurationsRequest::class;
    public const OUTPUT_CLASS = ListBucketIntelligentTieringConfigurationsOutput::class;
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
            id: 'com.amazonaws.s3#ListBucketIntelligentTieringConfigurations',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?intelligent-tiering&x-id=ListBucketIntelligentTieringConfigurations',
                    'code' => 200,
                    'pathQueryString' => 'intelligent-tiering&x-id=ListBucketIntelligentTieringConfigurations'
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
        return ListBucketIntelligentTieringConfigurationsRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return ListBucketIntelligentTieringConfigurationsOutput::schema();
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
        return ListBucketIntelligentTieringConfigurationsRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return ListBucketIntelligentTieringConfigurationsOutput::fromMembers($members);
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
