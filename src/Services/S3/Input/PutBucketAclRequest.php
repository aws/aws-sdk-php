<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\AccessControlPolicy;
use Aws\Services\S3\Shape\BucketCannedACL;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class PutBucketAclRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PutBucketAclRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_ACL;
    private static Schema $SCHEMA_ACCESS_CONTROL_POLICY;
    private static Schema $SCHEMA_CONTENT_MD5;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_GRANT_FULL_CONTROL;
    private static Schema $SCHEMA_GRANT_READ;
    private static Schema $SCHEMA_GRANT_READ_ACP;
    private static Schema $SCHEMA_GRANT_WRITE;
    private static Schema $SCHEMA_GRANT_WRITE_ACP;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;

    public readonly ?BucketCannedACL $aCL;
    public readonly ?ChecksumAlgorithm $checksumAlgorithm;

    /**
     * @param ?string $bucket The bucket to which to apply the ACL.
     * @param ?BucketCannedACL $aCL The canned ACL to apply to the bucket.
     * @param ?AccessControlPolicy $accessControlPolicy Contains the elements that set the ACL permissions for an object per
     *        grantee.
     * @param ?string $contentMD5 The Base64 encoded 128-bit MD5 digest of the data. This header must be used as a message
     *        integrity check to verify that the request body was not corrupted in transit. For more information, go to RFC
     * 1864.
     *        For requests made using the Amazon Web Services Command Line Interface (CLI) or Amazon Web Services SDKs, this
     * field
     *        is calculated automatically.
     * @param ?ChecksumAlgorithm $checksumAlgorithm Indicates the algorithm used to create the checksum for the request when
     *        you use the SDK. This header will not provide any additional functionality if you don't use the SDK. When you
     * send
     *        this header, there must be a corresponding x-amz-checksum or x-amz-trailer header sent. Otherwise, Amazon S3
     * fails
     *        the request with the HTTP status code 400 Bad Request. For more information, see Checking object integrity in
     * the
     *        Amazon S3 User Guide. If you provide an individual checksum, Amazon S3 ignores any provided ChecksumAlgorithm
     *        parameter.
     * @param ?string $grantFullControl Allows grantee the read, write, read ACP, and write ACP permissions on the bucket.
     * @param ?string $grantRead Allows grantee to list the objects in the bucket.
     * @param ?string $grantReadACP Allows grantee to read the bucket ACL.
     * @param ?string $grantWrite Allows grantee to create new objects in the bucket. For the bucket and object owners of
     *        existing objects, also allows deletions and overwrites of those objects.
     * @param ?string $grantWriteACP Allows grantee to write the ACL for the applicable bucket.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     */
    public function __construct(
        public readonly ?string $bucket = null,
        BucketCannedACL|string|null $aCL = null,
        public readonly ?AccessControlPolicy $accessControlPolicy = null,
        public readonly ?string $contentMD5 = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null,
        public readonly ?string $grantFullControl = null,
        public readonly ?string $grantRead = null,
        public readonly ?string $grantReadACP = null,
        public readonly ?string $grantWrite = null,
        public readonly ?string $grantWriteACP = null,
        public readonly ?string $expectedBucketOwner = null
    ) {
        $this->aCL = $aCL === null || $aCL instanceof BucketCannedACL ? $aCL : BucketCannedACL::fromValue($aCL);
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::putBucketAclRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_ACL = $m[1];
        self::$SCHEMA_ACCESS_CONTROL_POLICY = $m[2];
        self::$SCHEMA_CONTENT_MD5 = $m[3];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[4];
        self::$SCHEMA_GRANT_FULL_CONTROL = $m[5];
        self::$SCHEMA_GRANT_READ = $m[6];
        self::$SCHEMA_GRANT_READ_ACP = $m[7];
        self::$SCHEMA_GRANT_WRITE = $m[8];
        self::$SCHEMA_GRANT_WRITE_ACP = $m[9];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[10];
        return self::$SCHEMA = $s;
    }

    /**
     * Get the shape schema for this instance.
     */
    public function getSchema(): Schema
    {
        return self::schema();
    }

    /**
     * Serialize the shape to the desired wire format.
     *
     * @return void
     */
    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeStruct(self::schema(), $this, $idx);
    }

    /**
     * Serialize the shape members to the desired wire format.
     *
     * @return void
     */
    public function serializeMembers(ShapeSerializerInterface $serializer): void
    {
        if (isset($this->bucket)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET, $this->bucket, 0);
        }
        if (isset($this->aCL)) {
            $serializer->serializeString(self::$SCHEMA_ACL, $this->aCL->value, 1);
        }
        if (isset($this->accessControlPolicy)) {
            $serializer->serializeStruct(self::$SCHEMA_ACCESS_CONTROL_POLICY, $this->accessControlPolicy, 2);
        }
        if (isset($this->contentMD5)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_MD5, $this->contentMD5, 3);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 4);
        }
        if (isset($this->grantFullControl)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_FULL_CONTROL, $this->grantFullControl, 5);
        }
        if (isset($this->grantRead)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_READ, $this->grantRead, 6);
        }
        if (isset($this->grantReadACP)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_READ_ACP, $this->grantReadACP, 7);
        }
        if (isset($this->grantWrite)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_WRITE, $this->grantWrite, 8);
        }
        if (isset($this->grantWriteACP)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_WRITE_ACP, $this->grantWriteACP, 9);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 10);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->aCL,
            2 => $this->accessControlPolicy,
            3 => $this->contentMD5,
            4 => $this->checksumAlgorithm,
            5 => $this->grantFullControl,
            6 => $this->grantRead,
            7 => $this->grantReadACP,
            8 => $this->grantWrite,
            9 => $this->grantWriteACP,
            10 => $this->expectedBucketOwner,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->bucket,
            $this->aCL,
            $this->accessControlPolicy,
            $this->contentMD5,
            $this->checksumAlgorithm,
            $this->grantFullControl,
            $this->grantRead,
            $this->grantReadACP,
            $this->grantWrite,
            $this->grantWriteACP,
            $this->expectedBucketOwner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
