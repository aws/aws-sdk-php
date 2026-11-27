<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

/**
 * Container for the MultipartUpload for the Amazon S3 object.
 */
final class MultipartUpload implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#MultipartUpload';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_UPLOAD_ID;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_INITIATED;
    private static Schema $SCHEMA_STORAGE_CLASS;
    private static Schema $SCHEMA_OWNER;
    private static Schema $SCHEMA_INITIATOR;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_CHECKSUM_TYPE;
    private static Schema $SCHEMA_VERSION_ID;

    public readonly ?StorageClass $storageClass;
    public readonly ?ChecksumAlgorithm $checksumAlgorithm;
    public readonly ?ChecksumType $checksumType;

    /**
     * @param ?string $uploadId Upload ID that identifies the multipart upload.
     * @param ?string $key Key of the object for which the multipart upload was initiated.
     * @param ?float $initiated Date and time at which the multipart upload was initiated.
     * @param ?StorageClass $storageClass The class of storage used to store the object. Directory buckets - Directory
     *        buckets only support EXPRESS_ONEZONE (the S3 Express One Zone storage class) in Availability Zones and
     * ONEZONE_IA
     *        (the S3 One Zone-Infrequent Access storage class) in Dedicated Local Zones.
     * @param ?Owner $owner Specifies the owner of the object that is part of the multipart upload. Directory buckets - The
     *        bucket owner is returned as the object owner for all the objects.
     * @param ?Initiator $initiator Identifies who initiated the multipart upload.
     * @param ?ChecksumAlgorithm $checksumAlgorithm The algorithm that was used to create a checksum of the object.
     * @param ?ChecksumType $checksumType The checksum type that is used to calculate the object’s checksum value. For
     *        more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $versionId Version ID of the object. Returns the Version ID of the object for the multipart upload, if
     *        bucket versioning is enabled. This functionality is not supported for directory buckets.
     */
    public function __construct(
        public readonly ?string $uploadId = null,
        public readonly ?string $key = null,
        public readonly ?float $initiated = null,
        StorageClass|string|null $storageClass = null,
        public readonly ?Owner $owner = null,
        public readonly ?Initiator $initiator = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null,
        ChecksumType|string|null $checksumType = null,
        public readonly ?string $versionId = null
    ) {
        $this->storageClass = $storageClass === null || $storageClass instanceof StorageClass ? $storageClass : StorageClass::fromValue($storageClass);
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
        $this->checksumType = $checksumType === null || $checksumType instanceof ChecksumType ? $checksumType : ChecksumType::fromValue($checksumType);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::multipartUpload();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_UPLOAD_ID = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_INITIATED = $m[2];
        self::$SCHEMA_STORAGE_CLASS = $m[3];
        self::$SCHEMA_OWNER = $m[4];
        self::$SCHEMA_INITIATOR = $m[5];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[6];
        self::$SCHEMA_CHECKSUM_TYPE = $m[7];
        self::$SCHEMA_VERSION_ID = $m[8];
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
        if (isset($this->uploadId)) {
            $serializer->serializeString(self::$SCHEMA_UPLOAD_ID, $this->uploadId, 0);
        }
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 1);
        }
        if (isset($this->initiated)) {
            $serializer->serializeTimestamp(self::$SCHEMA_INITIATED, $this->initiated, 2);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 3);
        }
        if (isset($this->owner)) {
            $serializer->serializeStruct(self::$SCHEMA_OWNER, $this->owner, 4);
        }
        if (isset($this->initiator)) {
            $serializer->serializeStruct(self::$SCHEMA_INITIATOR, $this->initiator, 5);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 6);
        }
        if (isset($this->checksumType)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_TYPE, $this->checksumType->value, 7);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 8);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->uploadId,
            1 => $this->key,
            2 => $this->initiated,
            3 => $this->storageClass,
            4 => $this->owner,
            5 => $this->initiator,
            6 => $this->checksumAlgorithm,
            7 => $this->checksumType,
            8 => $this->versionId,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->uploadId,
            $this->key,
            $this->initiated,
            $this->storageClass,
            $this->owner,
            $this->initiator,
            $this->checksumAlgorithm,
            $this->checksumType,
            $this->versionId
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
