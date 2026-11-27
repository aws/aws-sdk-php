<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\DeleteBucketMetadataConfigurationRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Deletes an S3 Metadata configuration from a general purpose bucket. For more information, see Accelerating data
 * discovery with S3 Metadata in the Amazon S3 User Guide. You can use the V2 DeleteBucketMetadataConfiguration API
 * operation with V1 or V2 metadata configurations. However, if you try to use the V1
 * DeleteBucketMetadataTableConfiguration API operation with V2 configurations, you will receive an HTTP 405 Method Not
 * Allowed error. Permissions To use this operation, you must have the s3:DeleteBucketMetadataTableConfiguration
 * permission. For more information, see Setting up permissions for configuring metadata tables in the Amazon S3 User
 * Guide. The IAM policy action name is the same for the V1 and V2 API operations. The following operations are related
 * to DeleteBucketMetadataConfiguration: CreateBucketMetadataConfiguration GetBucketMetadataConfiguration
 * UpdateBucketMetadataInventoryTableConfiguration UpdateBucketMetadataJournalTableConfiguration You must URL encode any
 * signed header values that contain spaces. For example, if your header value is my file.txt, containing two spaces
 * after my, you must URL encode this value to my%20%20file.txt.
 */
final class DeleteBucketMetadataConfigurationOperation implements OperationInterface
{
    public const NAME = 'DeleteBucketMetadataConfiguration';
    public const ID = 'com.amazonaws.s3#DeleteBucketMetadataConfiguration';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = DeleteBucketMetadataConfigurationRequest::class;
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
            id: 'com.amazonaws.s3#DeleteBucketMetadataConfiguration',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'DELETE',
                    'uri' => '?metadataConfiguration',
                    'code' => 204,
                    'pathQueryString' => 'metadataConfiguration'
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
        return DeleteBucketMetadataConfigurationRequest::schema();
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
        return DeleteBucketMetadataConfigurationRequest::fromMembers($members);
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
