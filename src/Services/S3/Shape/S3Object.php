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
 * An object consists of data and its descriptive metadata.
 */
final class S3Object implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Object';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_LAST_MODIFIED;
    private static Schema $SCHEMA_E_TAG;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_CHECKSUM_TYPE;
    private static Schema $SCHEMA_SIZE;
    private static Schema $SCHEMA_STORAGE_CLASS;
    private static Schema $SCHEMA_OWNER;
    private static Schema $SCHEMA_RESTORE_STATUS;

    public readonly ?ChecksumType $checksumType;
    public readonly ?ObjectStorageClass $storageClass;

    /**
     * @param ?string $key The name that you assign to an object. You use the object key to retrieve the object.
     * @param ?float $lastModified Creation date of the object.
     * @param ?string $eTag The entity tag is a hash of the object. The ETag reflects changes only to the contents of an
     *        object, not its metadata. The ETag may or may not be an MD5 digest of the object data. Whether or not it is
     * depends
     *        on how the object was created and how it is encrypted as described below: Objects created by the PUT Object,
     * POST
     *        Object, or Copy operation, or through the Amazon Web Services Management Console, and are encrypted by SSE-S3
     * or
     *        plaintext, have ETags that are an MD5 digest of their object data. Objects created by the PUT Object, POST
     * Object, or
     *        Copy operation, or through the Amazon Web Services Management Console, and are encrypted by SSE-C or SSE-KMS,
     * have
     *        ETags that are not an MD5 digest of their object data. If an object is created by either the Multipart Upload
     * or Part
     *        Copy operation, the ETag is not an MD5 digest, regardless of the method of encryption. If an object is larger
     * than 16
     *        MB, the Amazon Web Services Management Console will upload or copy that object as a Multipart Upload, and
     * therefore
     *        the ETag will not be an MD5 digest. Directory buckets - MD5 is not supported by directory buckets.
     * @param list<\Aws\Services\S3\Shape\ChecksumAlgorithm>|null $checksumAlgorithm
     * @param ?ChecksumType $checksumType The checksum type that is used to calculate the object’s checksum value. For
     *        more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?int $size Size in bytes of the object
     * @param ?ObjectStorageClass $storageClass The class of storage used to store the object. Directory buckets - Directory
     *        buckets only support EXPRESS_ONEZONE (the S3 Express One Zone storage class) in Availability Zones and
     * ONEZONE_IA
     *        (the S3 One Zone-Infrequent Access storage class) in Dedicated Local Zones.
     * @param ?Owner $owner The owner of the object Directory buckets - The bucket owner is returned as the object owner.
     * @param ?RestoreStatus $restoreStatus Specifies the restoration status of an object. Objects in certain storage
     *        classes must be restored before they can be retrieved. For more information about these storage classes and
     * how to
     *        work with archived objects, see Working with archived objects in the Amazon S3 User Guide. This functionality
     * is not
     *        supported for directory buckets. Directory buckets only support EXPRESS_ONEZONE (the S3 Express One Zone
     * storage
     *        class) in Availability Zones and ONEZONE_IA (the S3 One Zone-Infrequent Access storage class) in Dedicated
     * Local
     *        Zones.
     */
    public function __construct(
        public readonly ?string $key = null,
        public readonly ?float $lastModified = null,
        public readonly ?string $eTag = null,
        public readonly ?array $checksumAlgorithm = null,
        ChecksumType|string|null $checksumType = null,
        public readonly ?int $size = null,
        ObjectStorageClass|string|null $storageClass = null,
        public readonly ?Owner $owner = null,
        public readonly ?RestoreStatus $restoreStatus = null
    ) {
        $this->checksumType = $checksumType === null || $checksumType instanceof ChecksumType ? $checksumType : ChecksumType::fromValue($checksumType);
        $this->storageClass = $storageClass === null || $storageClass instanceof ObjectStorageClass ? $storageClass : ObjectStorageClass::fromValue($storageClass);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::s3Object();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_KEY = $m[0];
        self::$SCHEMA_LAST_MODIFIED = $m[1];
        self::$SCHEMA_E_TAG = $m[2];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[3];
        self::$SCHEMA_CHECKSUM_TYPE = $m[4];
        self::$SCHEMA_SIZE = $m[5];
        self::$SCHEMA_STORAGE_CLASS = $m[6];
        self::$SCHEMA_OWNER = $m[7];
        self::$SCHEMA_RESTORE_STATUS = $m[8];
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
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 0);
        }
        if (isset($this->lastModified)) {
            $serializer->serializeTimestamp(self::$SCHEMA_LAST_MODIFIED, $this->lastModified, 1);
        }
        if (isset($this->eTag)) {
            $serializer->serializeString(self::$SCHEMA_E_TAG, $this->eTag, 2);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeList(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm, 3);
        }
        if (isset($this->checksumType)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_TYPE, $this->checksumType->value, 4);
        }
        if (isset($this->size)) {
            $serializer->serializeInteger(self::$SCHEMA_SIZE, $this->size, 5);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 6);
        }
        if (isset($this->owner)) {
            $serializer->serializeStruct(self::$SCHEMA_OWNER, $this->owner, 7);
        }
        if (isset($this->restoreStatus)) {
            $serializer->serializeStruct(self::$SCHEMA_RESTORE_STATUS, $this->restoreStatus, 8);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->key,
            1 => $this->lastModified,
            2 => $this->eTag,
            3 => $this->checksumAlgorithm,
            4 => $this->checksumType,
            5 => $this->size,
            6 => $this->storageClass,
            7 => $this->owner,
            8 => $this->restoreStatus,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->key,
            $this->lastModified,
            $this->eTag,
            $this->checksumAlgorithm,
            $this->checksumType,
            $this->size,
            $this->storageClass,
            $this->owner,
            $this->restoreStatus
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
