<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class PutBucketPolicyRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PutBucketPolicyRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_POLICY;
    private static Schema $SCHEMA_CONTENT_MD5;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_CONFIRM_REMOVE_SELF_BUCKET_ACCESS;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;

    public readonly ?ChecksumAlgorithm $checksumAlgorithm;

    /**
     * @param ?string $bucket The name of the bucket. Directory buckets - When you use this operation with a directory
     *        bucket, you must use path-style requests in the format
     *        https://s3express-control.region-code.amazonaws.com/bucket-name . Virtual-hosted-style requests aren't
     * supported.
     *        Directory bucket names must be unique in the chosen Zone (Availability Zone or Local Zone). Bucket names must
     * also
     *        follow the format bucket-base-name--zone-id--x-s3 (for example, DOC-EXAMPLE-BUCKET--usw2-az1--x-s3). For
     * information
     *        about bucket naming restrictions, see Directory bucket naming rules in the Amazon S3 User Guide
     * @param ?string $policy The bucket policy as a JSON document. For directory buckets, the only IAM action supported in
     *        the bucket policy is s3express:CreateSession.
     * @param ?string $contentMD5 The MD5 hash of the request body. For requests made using the Amazon Web Services Command
     *        Line Interface (CLI) or Amazon Web Services SDKs, this field is calculated automatically. This functionality
     * is not
     *        supported for directory buckets.
     * @param ?ChecksumAlgorithm $checksumAlgorithm Indicates the algorithm used to create the checksum for the request when
     *        you use the SDK. This header will not provide any additional functionality if you don't use the SDK. When you
     * send
     *        this header, there must be a corresponding x-amz-checksum-algorithm or x-amz-trailer header sent. Otherwise,
     * Amazon
     *        S3 fails the request with the HTTP status code 400 Bad Request. For the x-amz-checksum-algorithm header,
     * replace
     *        algorithm with the supported algorithm from the following list: CRC32 CRC32C CRC64NVME MD5 SHA1 SHA256 SHA512
     * XXHASH3
     *        XXHASH64 XXHASH128 For more information, see Checking object integrity in the Amazon S3 User Guide. If the
     * individual
     *        checksum value you provide through x-amz-checksum-algorithm doesn't match the checksum algorithm you set
     * through
     *        x-amz-sdk-checksum-algorithm, Amazon S3 fails the request with a BadDigest error. For directory buckets, when
     * you use
     *        Amazon Web Services SDKs, CRC32 is the default checksum algorithm that's used for performance.
     * @param ?bool $confirmRemoveSelfBucketAccess Set this parameter to true to confirm that you want to remove your
     *        permissions to change this bucket policy in the future. This functionality is not supported for directory
     * buckets.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied). For directory buckets, this header is not supported in this API operation. If you specify this
     * header, the
     *        request fails with the HTTP status code 501 Not Implemented.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $policy = null,
        public readonly ?string $contentMD5 = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null,
        public readonly ?bool $confirmRemoveSelfBucketAccess = null,
        public readonly ?string $expectedBucketOwner = null
    ) {
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
        $s = Schemas::putBucketPolicyRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_POLICY = $m[1];
        self::$SCHEMA_CONTENT_MD5 = $m[2];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[3];
        self::$SCHEMA_CONFIRM_REMOVE_SELF_BUCKET_ACCESS = $m[4];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[5];
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
        if (isset($this->policy)) {
            $serializer->serializeString(self::$SCHEMA_POLICY, $this->policy, 1);
        }
        if (isset($this->contentMD5)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_MD5, $this->contentMD5, 2);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 3);
        }
        if (isset($this->confirmRemoveSelfBucketAccess)) {
            $serializer->serializeBoolean(self::$SCHEMA_CONFIRM_REMOVE_SELF_BUCKET_ACCESS, $this->confirmRemoveSelfBucketAccess, 4);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 5);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->policy,
            2 => $this->contentMD5,
            3 => $this->checksumAlgorithm,
            4 => $this->confirmRemoveSelfBucketAccess,
            5 => $this->expectedBucketOwner,
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
            $this->policy,
            $this->contentMD5,
            $this->checksumAlgorithm,
            $this->confirmRemoveSelfBucketAccess,
            $this->expectedBucketOwner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
