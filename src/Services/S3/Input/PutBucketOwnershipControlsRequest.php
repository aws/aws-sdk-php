<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\OwnershipControls;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class PutBucketOwnershipControlsRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PutBucketOwnershipControlsRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_OWNERSHIP_CONTROLS;
    private static Schema $SCHEMA_CONTENT_MD5;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;

    public readonly ?ChecksumAlgorithm $checksumAlgorithm;

    /**
     * @param ?string $bucket The name of the Amazon S3 bucket whose OwnershipControls you want to set.
     * @param ?OwnershipControls $ownershipControls The OwnershipControls (BucketOwnerEnforced, BucketOwnerPreferred, or
     *        ObjectWriter) that you want to apply to this Amazon S3 bucket.
     * @param ?string $contentMD5 The MD5 hash of the OwnershipControls request body. For requests made using the Amazon Web
     *        Services Command Line Interface (CLI) or Amazon Web Services SDKs, this field is calculated automatically.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     * @param ?ChecksumAlgorithm $checksumAlgorithm Indicates the algorithm used to create the checksum for the object when
     *        you use the SDK. This header will not provide any additional functionality if you don't use the SDK. When you
     * send
     *        this header, there must be a corresponding x-amz-checksum-algorithm header sent. Otherwise, Amazon S3 fails
     * the
     *        request with the HTTP status code 400 Bad Request. For more information, see Checking object integrity in the
     * Amazon
     *        S3 User Guide. If you provide an individual checksum, Amazon S3 ignores any provided ChecksumAlgorithm
     * parameter.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?OwnershipControls $ownershipControls = null,
        public readonly ?string $contentMD5 = null,
        public readonly ?string $expectedBucketOwner = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null
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
        $s = Schemas::putBucketOwnershipControlsRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_OWNERSHIP_CONTROLS = $m[1];
        self::$SCHEMA_CONTENT_MD5 = $m[2];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[3];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[4];
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
        if (isset($this->ownershipControls)) {
            $serializer->serializeStruct(self::$SCHEMA_OWNERSHIP_CONTROLS, $this->ownershipControls, 1);
        }
        if (isset($this->contentMD5)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_MD5, $this->contentMD5, 2);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 3);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 4);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->ownershipControls,
            2 => $this->contentMD5,
            3 => $this->expectedBucketOwner,
            4 => $this->checksumAlgorithm,
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
            $this->ownershipControls,
            $this->contentMD5,
            $this->expectedBucketOwner,
            $this->checksumAlgorithm
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
