<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutBucketEncryptionRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation configures default encryption and Amazon S3 Bucket Keys for an existing bucket. You can also block
 * encryption types using this operation. Directory buckets - For directory buckets, you must make requests for this API
 * operation to the Regional endpoint. These endpoints support path-style requests in the format
 * https://s3express-control.region-code.amazonaws.com/bucket-name . Virtual-hosted-style requests aren't supported. For
 * more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory buckets in
 * Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see Concepts for
 * directory buckets in Local Zones in the Amazon S3 User Guide. By default, all buckets have a default encryption
 * configuration that uses server-side encryption with Amazon S3 managed keys (SSE-S3). General purpose buckets You can
 * optionally configure default encryption for a bucket by using server-side encryption with Key Management Service
 * (KMS) keys (SSE-KMS) or dual-layer server-side encryption with Amazon Web Services KMS keys (DSSE-KMS). If you
 * specify default encryption by using SSE-KMS, you can also configure Amazon S3 Bucket Keys. For information about the
 * bucket default encryption feature, see Amazon S3 Bucket Default Encryption in the Amazon S3 User Guide. If you use
 * PutBucketEncryption to set your default bucket encryption to SSE-KMS, you should verify that your KMS key ID is
 * correct. Amazon S3 doesn't validate the KMS key ID provided in PutBucketEncryption requests. Directory buckets - You
 * can optionally configure default encryption for a bucket by using server-side encryption with Key Management Service
 * (KMS) keys (SSE-KMS). We recommend that the bucket's default encryption uses the desired encryption configuration and
 * you don't override the bucket default encryption in your CreateSession requests or PUT object requests. Then, new
 * objects are automatically encrypted with the desired encryption settings. For more information about the encryption
 * overriding behaviors in directory buckets, see Specifying server-side encryption with KMS for new object uploads.
 * Your SSE-KMS configuration can only support 1 customer managed key per directory bucket's lifetime. The Amazon Web
 * Services managed key (aws/s3) isn't supported. S3 Bucket Keys are always enabled for GET and PUT operations in a
 * directory bucket and can’t be disabled. S3 Bucket Keys aren't supported, when you copy SSE-KMS encrypted objects
 * from general purpose buckets to directory buckets, from directory buckets to general purpose buckets, or between
 * directory buckets, through CopyObject, UploadPartCopy, the Copy operation in Batch Operations, or the import jobs. In
 * this case, Amazon S3 makes a call to KMS every time a copy request is made for a KMS-encrypted object. When you
 * specify an KMS customer managed key for encryption in your directory bucket, only use the key ID or key ARN. The key
 * alias format of the KMS key isn't supported. For directory buckets, if you use PutBucketEncryption to set your
 * default bucket encryption to SSE-KMS, Amazon S3 validates the KMS key ID provided in PutBucketEncryption requests. If
 * you're specifying a customer managed KMS key, we recommend using a fully qualified KMS key ARN. If you use a KMS key
 * alias instead, then KMS resolves the key within the requester’s account. This behavior can result in data that's
 * encrypted with a KMS key that belongs to the requester, and not the bucket owner. Also, this action requires Amazon
 * Web Services Signature Version 4. For more information, see Authenticating Requests (Amazon Web Services Signature
 * Version 4). Permissions General purpose bucket permissions - The s3:PutEncryptionConfiguration permission is required
 * in a policy. The bucket owner has this permission by default. The bucket owner can grant this permission to others.
 * For more information about permissions, see Permissions Related to Bucket Operations and Managing Access Permissions
 * to Your Amazon S3 Resources in the Amazon S3 User Guide. Directory bucket permissions - To grant access to this API
 * operation, you must have the s3express:PutEncryptionConfiguration permission in an IAM identity-based policy instead
 * of a bucket policy. Cross-account access to this API operation isn't supported. This operation can only be performed
 * by the Amazon Web Services account that owns the resource. For more information about directory bucket policies and
 * permissions, see Amazon Web Services Identity and Access Management (IAM) for S3 Express One Zone in the Amazon S3
 * User Guide. To set a directory bucket default encryption with SSE-KMS, you must also have the kms:GenerateDataKey and
 * the kms:Decrypt permissions in IAM identity-based policies and KMS key policies for the target KMS key. HTTP Host
 * header syntax Directory buckets - The HTTP Host header syntax is s3express-control.region-code.amazonaws.com. The
 * following operations are related to PutBucketEncryption: GetBucketEncryption DeleteBucketEncryption You must URL
 * encode any signed header values that contain spaces. For example, if your header value is my file.txt, containing two
 * spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class PutBucketEncryptionOperation implements OperationInterface
{
    public const NAME = 'PutBucketEncryption';
    public const ID = 'com.amazonaws.s3#PutBucketEncryption';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutBucketEncryptionRequest::class;
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
            id: 'com.amazonaws.s3#PutBucketEncryption',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '?encryption',
                    'code' => 200,
                    'pathQueryString' => 'encryption'
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
        return PutBucketEncryptionRequest::schema();
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
        return PutBucketEncryptionRequest::fromMembers($members);
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
