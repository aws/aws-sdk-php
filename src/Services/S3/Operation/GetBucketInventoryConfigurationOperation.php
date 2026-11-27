<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\GetBucketInventoryConfigurationRequest;
use Aws\Services\S3\Output\GetBucketInventoryConfigurationOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Returns an S3 Inventory configuration (identified by the inventory configuration ID) from the bucket. Directory
 * buckets - For directory buckets, you must make requests for this API operation to the Regional endpoint. These
 * endpoints support path-style requests in the format https://s3express-control.region-code.amazonaws.com/bucket-name .
 * Virtual-hosted-style requests aren't supported. For more information about endpoints in Availability Zones, see
 * Regional and Zonal endpoints for directory buckets in Availability Zones in the Amazon S3 User Guide. For more
 * information about endpoints in Local Zones, see Concepts for directory buckets in Local Zones in the Amazon S3 User
 * Guide. Permissions To use this operation, you must have permissions to perform the s3:GetInventoryConfiguration
 * action. The bucket owner has this permission by default. The bucket owner can grant this permission to others. For
 * more information about permissions, see Permissions Related to Bucket Subresource Operations and Managing Access
 * Permissions to Your Amazon S3 Resources. General purpose bucket permissions - The s3:GetInventoryConfiguration
 * permission is required in a policy. For more information about general purpose buckets permissions, see Using Bucket
 * Policies and User Policies in the Amazon S3 User Guide. Directory bucket permissions - To grant access to this API
 * operation, you must have the s3express:GetInventoryConfiguration permission in an IAM identity-based policy instead
 * of a bucket policy. For more information about directory bucket policies and permissions, see Amazon Web Services
 * Identity and Access Management (IAM) for S3 Express One Zone in the Amazon S3 User Guide. HTTP Host header syntax
 * Directory buckets - The HTTP Host header syntax is s3express-control.region-code.amazonaws.com. For information about
 * the Amazon S3 inventory feature, see Amazon S3 Inventory. The following operations are related to
 * GetBucketInventoryConfiguration: DeleteBucketInventoryConfiguration ListBucketInventoryConfigurations
 * PutBucketInventoryConfiguration You must URL encode any signed header values that contain spaces. For example, if
 * your header value is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class GetBucketInventoryConfigurationOperation implements OperationInterface
{
    public const NAME = 'GetBucketInventoryConfiguration';
    public const ID = 'com.amazonaws.s3#GetBucketInventoryConfiguration';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = GetBucketInventoryConfigurationRequest::class;
    public const OUTPUT_CLASS = GetBucketInventoryConfigurationOutput::class;
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
            id: 'com.amazonaws.s3#GetBucketInventoryConfiguration',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?inventory&x-id=GetBucketInventoryConfiguration',
                    'code' => 200,
                    'pathQueryString' => 'inventory&x-id=GetBucketInventoryConfiguration'
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
        return GetBucketInventoryConfigurationRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return GetBucketInventoryConfigurationOutput::schema();
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
        return GetBucketInventoryConfigurationRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return GetBucketInventoryConfigurationOutput::fromMembers($members);
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
