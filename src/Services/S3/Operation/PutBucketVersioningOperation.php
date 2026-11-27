<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutBucketVersioningRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. When you enable versioning on a bucket for the first time, it
 * might take a short amount of time for the change to be fully propagated. While this change is propagating, you might
 * encounter intermittent HTTP 404 NoSuchKey errors for requests to objects created or updated after enabling
 * versioning. We recommend that you wait for 15 minutes after enabling versioning before issuing write operations (PUT
 * or DELETE) on objects in the bucket. Sets the versioning state of an existing bucket. You can set the versioning
 * state with one of the following values: Enabled—Enables versioning for the objects in the bucket. All objects added
 * to the bucket receive a unique version ID. Suspended—Disables versioning for the objects in the bucket. All objects
 * added to the bucket receive the version ID null. If the versioning state has never been set on a bucket, it has no
 * versioning state; a GetBucketVersioning request does not return a versioning state value. In order to enable MFA
 * Delete, you must be the bucket owner. If you are the bucket owner and want to enable MFA Delete in the bucket
 * versioning configuration, you must include the x-amz-mfa request header and the Status and the MfaDelete request
 * elements in a request to set the versioning state of the bucket. If you have an object expiration lifecycle
 * configuration in your non-versioned bucket and you want to maintain the same permanent delete behavior when you
 * enable versioning, you must add a noncurrent expiration policy. The noncurrent expiration lifecycle configuration
 * will manage the deletes of the noncurrent object versions in the version-enabled bucket. (A version-enabled bucket
 * maintains one current and zero or more noncurrent object versions.) For more information, see Lifecycle and
 * Versioning. The following operations are related to PutBucketVersioning: CreateBucket DeleteBucket
 * GetBucketVersioning You must URL encode any signed header values that contain spaces. For example, if your header
 * value is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class PutBucketVersioningOperation implements OperationInterface
{
    public const NAME = 'PutBucketVersioning';
    public const ID = 'com.amazonaws.s3#PutBucketVersioning';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutBucketVersioningRequest::class;
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
            id: 'com.amazonaws.s3#PutBucketVersioning',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '?versioning',
                    'code' => 200,
                    'pathQueryString' => 'versioning'
                ],
                28 => ['requestAlgorithmMember' => 'ChecksumAlgorithm', 'requestChecksumRequired' => true]
            ],
            traitsById: [
                'aws.protocols#httpChecksum' => ['requestAlgorithmMember' => 'ChecksumAlgorithm', 'requestChecksumRequired' => true]
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
        return PutBucketVersioningRequest::schema();
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
        return PutBucketVersioningRequest::fromMembers($members);
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
