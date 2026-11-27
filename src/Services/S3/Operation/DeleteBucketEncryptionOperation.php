<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\DeleteBucketEncryptionRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This implementation of the DELETE action resets the default encryption for the bucket as server-side encryption with
 * Amazon S3 managed keys (SSE-S3). General purpose buckets - For information about the bucket default encryption
 * feature, see Amazon S3 Bucket Default Encryption in the Amazon S3 User Guide. Directory buckets - For directory
 * buckets, there are only two supported options for server-side encryption: SSE-S3 and SSE-KMS. For information about
 * the default encryption configuration in directory buckets, see Setting default server-side encryption behavior for
 * directory buckets. Permissions General purpose bucket permissions - The s3:PutEncryptionConfiguration permission is
 * required in a policy. The bucket owner has this permission by default. The bucket owner can grant this permission to
 * others. For more information about permissions, see Permissions Related to Bucket Operations and Managing Access
 * Permissions to Your Amazon S3 Resources. Directory bucket permissions - To grant access to this API operation, you
 * must have the s3express:PutEncryptionConfiguration permission in an IAM identity-based policy instead of a bucket
 * policy. Cross-account access to this API operation isn't supported. This operation can only be performed by the
 * Amazon Web Services account that owns the resource. For more information about directory bucket policies and
 * permissions, see Amazon Web Services Identity and Access Management (IAM) for S3 Express One Zone in the Amazon S3
 * User Guide. HTTP Host header syntax Directory buckets - The HTTP Host header syntax is
 * s3express-control.region-code.amazonaws.com. The following operations are related to DeleteBucketEncryption:
 * PutBucketEncryption GetBucketEncryption You must URL encode any signed header values that contain spaces. For
 * example, if your header value is my file.txt, containing two spaces after my, you must URL encode this value to
 * my%20%20file.txt.
 */
final class DeleteBucketEncryptionOperation implements OperationInterface
{
    public const NAME = 'DeleteBucketEncryption';
    public const ID = 'com.amazonaws.s3#DeleteBucketEncryption';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = DeleteBucketEncryptionRequest::class;
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
            id: 'com.amazonaws.s3#DeleteBucketEncryption',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'DELETE',
                    'uri' => '?encryption',
                    'code' => 204,
                    'pathQueryString' => 'encryption'
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
        return DeleteBucketEncryptionRequest::schema();
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
        return DeleteBucketEncryptionRequest::fromMembers($members);
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
