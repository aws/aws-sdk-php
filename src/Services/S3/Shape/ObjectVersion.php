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
 * The version of an object.
 */
final class ObjectVersion implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ObjectVersion';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_E_TAG;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_CHECKSUM_TYPE;
    private static Schema $SCHEMA_SIZE;
    private static Schema $SCHEMA_STORAGE_CLASS;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_IS_LATEST;
    private static Schema $SCHEMA_LAST_MODIFIED;
    private static Schema $SCHEMA_OWNER;
    private static Schema $SCHEMA_RESTORE_STATUS;

    public readonly ?ChecksumType $checksumType;
    public readonly ?ObjectVersionStorageClass $storageClass;

    /**
     * @param ?string $eTag The entity tag is an MD5 hash of that version of the object.
     * @param list<\Aws\Services\S3\Shape\ChecksumAlgorithm>|null $checksumAlgorithm
     * @param ?ChecksumType $checksumType The checksum type that is used to calculate the object’s checksum value. For
     *        more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?int $size Size in bytes of the object.
     * @param ?ObjectVersionStorageClass $storageClass The class of storage used to store the object.
     * @param ?string $key The object key.
     * @param ?string $versionId Version ID of an object.
     * @param ?bool $isLatest Specifies whether the object is (true) or is not (false) the latest version of an object.
     * @param ?float $lastModified Date and time when the object was last modified.
     * @param ?Owner $owner Specifies the owner of the object.
     * @param ?RestoreStatus $restoreStatus Specifies the restoration status of an object. Objects in certain storage
     *        classes must be restored before they can be retrieved. For more information about these storage classes and
     * how to
     *        work with archived objects, see Working with archived objects in the Amazon S3 User Guide.
     */
    public function __construct(
        public readonly ?string $eTag = null,
        public readonly ?array $checksumAlgorithm = null,
        ChecksumType|string|null $checksumType = null,
        public readonly ?int $size = null,
        ObjectVersionStorageClass|string|null $storageClass = null,
        public readonly ?string $key = null,
        public readonly ?string $versionId = null,
        public readonly ?bool $isLatest = null,
        public readonly ?float $lastModified = null,
        public readonly ?Owner $owner = null,
        public readonly ?RestoreStatus $restoreStatus = null
    ) {
        $this->checksumType = $checksumType === null || $checksumType instanceof ChecksumType ? $checksumType : ChecksumType::fromValue($checksumType);
        $this->storageClass = $storageClass === null || $storageClass instanceof ObjectVersionStorageClass ? $storageClass : ObjectVersionStorageClass::fromValue($storageClass);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::objectVersion();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_E_TAG = $m[0];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[1];
        self::$SCHEMA_CHECKSUM_TYPE = $m[2];
        self::$SCHEMA_SIZE = $m[3];
        self::$SCHEMA_STORAGE_CLASS = $m[4];
        self::$SCHEMA_KEY = $m[5];
        self::$SCHEMA_VERSION_ID = $m[6];
        self::$SCHEMA_IS_LATEST = $m[7];
        self::$SCHEMA_LAST_MODIFIED = $m[8];
        self::$SCHEMA_OWNER = $m[9];
        self::$SCHEMA_RESTORE_STATUS = $m[10];
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
        if (isset($this->eTag)) {
            $serializer->serializeString(self::$SCHEMA_E_TAG, $this->eTag, 0);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeList(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm, 1);
        }
        if (isset($this->checksumType)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_TYPE, $this->checksumType->value, 2);
        }
        if (isset($this->size)) {
            $serializer->serializeInteger(self::$SCHEMA_SIZE, $this->size, 3);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 4);
        }
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 5);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 6);
        }
        if (isset($this->isLatest)) {
            $serializer->serializeBoolean(self::$SCHEMA_IS_LATEST, $this->isLatest, 7);
        }
        if (isset($this->lastModified)) {
            $serializer->serializeTimestamp(self::$SCHEMA_LAST_MODIFIED, $this->lastModified, 8);
        }
        if (isset($this->owner)) {
            $serializer->serializeStruct(self::$SCHEMA_OWNER, $this->owner, 9);
        }
        if (isset($this->restoreStatus)) {
            $serializer->serializeStruct(self::$SCHEMA_RESTORE_STATUS, $this->restoreStatus, 10);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->eTag,
            1 => $this->checksumAlgorithm,
            2 => $this->checksumType,
            3 => $this->size,
            4 => $this->storageClass,
            5 => $this->key,
            6 => $this->versionId,
            7 => $this->isLatest,
            8 => $this->lastModified,
            9 => $this->owner,
            10 => $this->restoreStatus,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->eTag,
            $this->checksumAlgorithm,
            $this->checksumType,
            $this->size,
            $this->storageClass,
            $this->key,
            $this->versionId,
            $this->isLatest,
            $this->lastModified,
            $this->owner,
            $this->restoreStatus
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
