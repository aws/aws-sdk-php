<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\GetPublicAccessBlockRequest;
use Aws\Services\S3\Output\GetPublicAccessBlockOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Retrieves the PublicAccessBlock configuration for an Amazon S3
 * bucket. This operation returns the bucket-level configuration only. To understand the effective public access
 * behavior, you must also consider account-level settings (which may inherit from organization-level policies). To use
 * this operation, you must have the s3:GetBucketPublicAccessBlock permission. For more information about Amazon S3
 * permissions, see Specifying Permissions in a Policy. When Amazon S3 evaluates the PublicAccessBlock configuration for
 * a bucket or an object, it checks the PublicAccessBlock configuration for both the bucket (or the bucket that contains
 * the object) and the bucket owner's account. Account-level settings automatically inherit from organization-level
 * policies when present. If the PublicAccessBlock settings are different between the bucket and the account, Amazon S3
 * uses the most restrictive combination of the bucket-level and account-level settings. For more information about when
 * Amazon S3 considers a bucket or an object public, see The Meaning of "Public". The following operations are related
 * to GetPublicAccessBlock: Using Amazon S3 Block Public Access PutPublicAccessBlock GetPublicAccessBlock
 * DeletePublicAccessBlock You must URL encode any signed header values that contain spaces. For example, if your header
 * value is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class GetPublicAccessBlockOperation implements OperationInterface
{
    public const NAME = 'GetPublicAccessBlock';
    public const ID = 'com.amazonaws.s3#GetPublicAccessBlock';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = GetPublicAccessBlockRequest::class;
    public const OUTPUT_CLASS = GetPublicAccessBlockOutput::class;
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
            id: 'com.amazonaws.s3#GetPublicAccessBlock',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?publicAccessBlock',
                    'code' => 200,
                    'pathQueryString' => 'publicAccessBlock'
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
        return GetPublicAccessBlockRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return GetPublicAccessBlockOutput::schema();
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
        return GetPublicAccessBlockRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return GetPublicAccessBlockOutput::fromMembers($members);
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
