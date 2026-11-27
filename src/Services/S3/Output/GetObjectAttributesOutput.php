<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\Checksum;
use Aws\Services\S3\Shape\GetObjectAttributesParts;
use Aws\Services\S3\Shape\RequestCharged;
use Aws\Services\S3\Shape\StorageClass;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class GetObjectAttributesOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#GetObjectAttributesOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DELETE_MARKER;
    private static Schema $SCHEMA_LAST_MODIFIED;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_REQUEST_CHARGED;
    private static Schema $SCHEMA_E_TAG;
    private static Schema $SCHEMA_CHECKSUM;
    private static Schema $SCHEMA_OBJECT_PARTS;
    private static Schema $SCHEMA_STORAGE_CLASS;
    private static Schema $SCHEMA_OBJECT_SIZE;

    public readonly ?RequestCharged $requestCharged;
    public readonly ?StorageClass $storageClass;

    /**
     * @param ?bool $deleteMarker Specifies whether the object retrieved was (true) or was not (false) a delete marker. If
     *        false, this response header does not appear in the response. To learn more about delete markers, see Working
     * with
     *        delete markers. This functionality is not supported for directory buckets.
     * @param ?float $lastModified Date and time when the object was last modified.
     * @param ?string $versionId The version ID of the object. This functionality is not supported for directory buckets.
     * @param ?string $eTag An ETag is an opaque identifier assigned by a web server to a specific version of a resource
     *        found at a URL.
     * @param ?Checksum $checksum The checksum or digest of the object.
     * @param ?GetObjectAttributesParts $objectParts A collection of parts associated with a multipart upload.
     * @param ?StorageClass $storageClass Provides the storage class information of the object. Amazon S3 returns this
     *        header for all objects except for S3 Standard storage class objects. For more information, see Storage
     * Classes.
     *        Directory buckets - Directory buckets only support EXPRESS_ONEZONE (the S3 Express One Zone storage class) in
     *        Availability Zones and ONEZONE_IA (the S3 One Zone-Infrequent Access storage class) in Dedicated Local Zones.
     * @param ?int $objectSize The size of the object in bytes.
     */
    public function __construct(
        public readonly ?bool $deleteMarker = null,
        public readonly ?float $lastModified = null,
        public readonly ?string $versionId = null,
        RequestCharged|string|null $requestCharged = null,
        public readonly ?string $eTag = null,
        public readonly ?Checksum $checksum = null,
        public readonly ?GetObjectAttributesParts $objectParts = null,
        StorageClass|string|null $storageClass = null,
        public readonly ?int $objectSize = null
    ) {
        $this->requestCharged = $requestCharged === null || $requestCharged instanceof RequestCharged ? $requestCharged : RequestCharged::fromValue($requestCharged);
        $this->storageClass = $storageClass === null || $storageClass instanceof StorageClass ? $storageClass : StorageClass::fromValue($storageClass);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::getObjectAttributesOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DELETE_MARKER = $m[0];
        self::$SCHEMA_LAST_MODIFIED = $m[1];
        self::$SCHEMA_VERSION_ID = $m[2];
        self::$SCHEMA_REQUEST_CHARGED = $m[3];
        self::$SCHEMA_E_TAG = $m[4];
        self::$SCHEMA_CHECKSUM = $m[5];
        self::$SCHEMA_OBJECT_PARTS = $m[6];
        self::$SCHEMA_STORAGE_CLASS = $m[7];
        self::$SCHEMA_OBJECT_SIZE = $m[8];
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
        if (isset($this->deleteMarker)) {
            $serializer->serializeBoolean(self::$SCHEMA_DELETE_MARKER, $this->deleteMarker, 0);
        }
        if (isset($this->lastModified)) {
            $serializer->serializeTimestamp(self::$SCHEMA_LAST_MODIFIED, $this->lastModified, 1);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 2);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 3);
        }
        if (isset($this->eTag)) {
            $serializer->serializeString(self::$SCHEMA_E_TAG, $this->eTag, 4);
        }
        if (isset($this->checksum)) {
            $serializer->serializeStruct(self::$SCHEMA_CHECKSUM, $this->checksum, 5);
        }
        if (isset($this->objectParts)) {
            $serializer->serializeStruct(self::$SCHEMA_OBJECT_PARTS, $this->objectParts, 6);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 7);
        }
        if (isset($this->objectSize)) {
            $serializer->serializeInteger(self::$SCHEMA_OBJECT_SIZE, $this->objectSize, 8);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->deleteMarker,
            1 => $this->lastModified,
            2 => $this->versionId,
            3 => $this->requestCharged,
            4 => $this->eTag,
            5 => $this->checksum,
            6 => $this->objectParts,
            7 => $this->storageClass,
            8 => $this->objectSize,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->deleteMarker,
            $this->lastModified,
            $this->versionId,
            $this->requestCharged,
            $this->eTag,
            $this->checksum,
            $this->objectParts,
            $this->storageClass,
            $this->objectSize
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
