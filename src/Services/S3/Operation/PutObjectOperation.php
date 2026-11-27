<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\EncryptionTypeMismatchException;
use Aws\Services\S3\Exception\InvalidRequestException;
use Aws\Services\S3\Exception\InvalidWriteOffsetException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Exception\TooManyPartsException;
use Aws\Services\S3\Input\PutObjectRequest;
use Aws\Services\S3\Output\PutObjectOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * End of support notice: As of October 1, 2025, Amazon S3 has discontinued support for Email Grantee Access Control
 * Lists (ACLs). If you attempt to use an Email Grantee ACL in a request after October 1, 2025, the request will receive
 * an HTTP 405 (Method Not Allowed) error. This change affects the following Amazon Web Services Regions: US East (N.
 * Virginia), US West (N. California), US West (Oregon), Asia Pacific (Singapore), Asia Pacific (Sydney), Asia Pacific
 * (Tokyo), Europe (Ireland), and South America (São Paulo). Adds an object to a bucket. Amazon S3 never adds partial
 * objects; if you receive a success response, Amazon S3 added the entire object to the bucket. You cannot use PutObject
 * to only update a single piece of metadata for an existing object. You must put the entire object with updated
 * metadata if you want to update some values. If your bucket uses the bucket owner enforced setting for Object
 * Ownership, ACLs are disabled and no longer affect permissions. All objects written to the bucket by any account will
 * be owned by the bucket owner. Directory buckets - For directory buckets, you must make requests for this API
 * operation to the Zonal endpoint. These endpoints support virtual-hosted-style requests in the format
 * https://amzn-s3-demo-bucket.s3express-zone-id.region-code.amazonaws.com/key-name . Path-style requests are not
 * supported. For more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory
 * buckets in Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see
 * Concepts for directory buckets in Local Zones in the Amazon S3 User Guide. Amazon S3 is a distributed system. If it
 * receives multiple write requests for the same object simultaneously, it overwrites all but the last object written.
 * However, Amazon S3 provides features that can modify this behavior: S3 Object Lock - To prevent objects from being
 * deleted or overwritten, you can use Amazon S3 Object Lock in the Amazon S3 User Guide. This functionality is not
 * supported for directory buckets. If-None-Match - Uploads the object only if the object key name does not already
 * exist in the specified bucket. Otherwise, Amazon S3 returns a 412 Precondition Failed error. If a conflicting
 * operation occurs during the upload, S3 returns a 409 ConditionalRequestConflict response. On a 409 failure, retry the
 * upload. Expects the * character (asterisk). For more information, see Add preconditions to S3 operations with
 * conditional requests in the Amazon S3 User Guide or RFC 7232. This functionality is not supported for S3 on Outposts.
 * S3 Versioning - When you enable versioning for a bucket, if Amazon S3 receives multiple write requests for the same
 * object simultaneously, it stores all versions of the objects. For each write request that is made to the same object,
 * Amazon S3 automatically generates a unique version ID of that object being stored in Amazon S3. You can retrieve,
 * replace, or delete any version of the object. For more information about versioning, see Adding Objects to
 * Versioning-Enabled Buckets in the Amazon S3 User Guide. For information about returning the versioning state of a
 * bucket, see GetBucketVersioning. This functionality is not supported for directory buckets. Permissions General
 * purpose bucket permissions - The following permissions are required in your policies when your PutObject request
 * includes specific headers. s3:PutObject - To successfully complete the PutObject request, you must always have the
 * s3:PutObject permission on a bucket to add an object to it. s3:PutObjectAcl - To successfully change the objects ACL
 * of your PutObject request, you must have the s3:PutObjectAcl. s3:PutObjectTagging - To successfully set the tag-set
 * with your PutObject request, you must have the s3:PutObjectTagging. Directory bucket permissions - To grant access to
 * this API operation on a directory bucket, we recommend that you use the CreateSession API operation for session-based
 * authorization. Specifically, you grant the s3express:CreateSession permission to the directory bucket in a bucket
 * policy or an IAM identity-based policy. Then, you make the CreateSession API call on the bucket to obtain a session
 * token. With the session token in your request header, you can make API requests to this operation. After the session
 * token expires, you make another CreateSession API call to generate a new session token for use. Amazon Web Services
 * CLI or SDKs create session and refresh the session token automatically to avoid service interruptions when a session
 * expires. For more information about authorization, see CreateSession . If the object is encrypted with SSE-KMS, you
 * must also have the kms:GenerateDataKey and kms:Decrypt permissions in IAM identity-based policies and KMS key
 * policies for the KMS key. Data integrity with Content-MD5 General purpose bucket - To ensure that data is not
 * corrupted traversing the network, use the Content-MD5 header. When you use this header, Amazon S3 checks the object
 * against the provided MD5 value and, if they do not match, Amazon S3 returns an error. Alternatively, when the
 * object's ETag is its MD5 digest, you can calculate the MD5 while putting the object to Amazon S3 and compare the
 * returned ETag to the calculated MD5 value. Directory bucket - This functionality is not supported for directory
 * buckets. HTTP Host header syntax Directory buckets - The HTTP Host header syntax is
 * Bucket-name.s3express-zone-id.region-code.amazonaws.com. Errors You might receive an InvalidRequest error for several
 * reasons. Depending on the reason for the error, you might receive one of the following messages: Cannot specify both
 * a write offset value and user-defined object metadata for existing objects. Checksum Type mismatch occurred, expected
 * checksum Type: sha1, actual checksum Type: crc32c. Request body cannot be empty when 'write offset' is specified. For
 * more information about related Amazon S3 APIs, see the following: CopyObject DeleteObject You must URL encode any
 * signed header values that contain spaces. For example, if your header value is my file.txt, containing two spaces
 * after my, you must URL encode this value to my%20%20file.txt.
 */
final class PutObjectOperation implements OperationInterface
{
    public const NAME = 'PutObject';
    public const ID = 'com.amazonaws.s3#PutObject';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutObjectRequest::class;
    public const OUTPUT_CLASS = PutObjectOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [
        'com.amazonaws.s3#EncryptionTypeMismatch' => 'com.amazonaws.s3#EncryptionTypeMismatch',
        'EncryptionTypeMismatch' => 'com.amazonaws.s3#EncryptionTypeMismatch',
        'com.amazonaws.s3#InvalidRequest' => 'com.amazonaws.s3#InvalidRequest',
        'InvalidRequest' => 'com.amazonaws.s3#InvalidRequest',
        'com.amazonaws.s3#InvalidWriteOffset' => 'com.amazonaws.s3#InvalidWriteOffset',
        'InvalidWriteOffset' => 'com.amazonaws.s3#InvalidWriteOffset',
        'com.amazonaws.s3#TooManyParts' => 'com.amazonaws.s3#TooManyParts',
        'TooManyParts' => 'com.amazonaws.s3#TooManyParts'
    ];

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
            id: 'com.amazonaws.s3#PutObject',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '/{Key+}?x-id=PutObject',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'x-id=PutObject'
                ],
                Schema::T_ERRORS => self::ERRORS,
                28 => ['requestAlgorithmMember' => 'ChecksumAlgorithm']
            ],
            traitsById: [
                'aws.protocols#httpChecksum' => ['requestAlgorithmMember' => 'ChecksumAlgorithm']
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return PutObjectRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return PutObjectOutput::schema();
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
        return [
            EncryptionTypeMismatchException::schema(),
            InvalidRequestException::schema(),
            InvalidWriteOffsetException::schema(),
            TooManyPartsException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return PutObjectRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return PutObjectOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'com.amazonaws.s3#EncryptionTypeMismatch' => EncryptionTypeMismatchException::schema(),
            'EncryptionTypeMismatch' => EncryptionTypeMismatchException::schema(),
            'com.amazonaws.s3#InvalidRequest' => InvalidRequestException::schema(),
            'InvalidRequest' => InvalidRequestException::schema(),
            'com.amazonaws.s3#InvalidWriteOffset' => InvalidWriteOffsetException::schema(),
            'InvalidWriteOffset' => InvalidWriteOffsetException::schema(),
            'com.amazonaws.s3#TooManyParts' => TooManyPartsException::schema(),
            'TooManyParts' => TooManyPartsException::schema(),
            default => null
        };
    }

    public function getInputStreamMember(): Schema
    {
        return PutObjectRequest::schema()->getMembersByIndex()[3];
    }

    public function getOutputStreamMember(): ?Schema
    {
        return null;
    }
}
