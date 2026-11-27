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
 * Object Identifier is unique value to identify objects.
 */
final class ObjectIdentifier implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ObjectIdentifier';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_E_TAG;
    private static Schema $SCHEMA_LAST_MODIFIED_TIME;
    private static Schema $SCHEMA_SIZE;

    /**
     * @param ?string $key Key name of the object. Replacement must be made for object keys containing special characters
     *        (such as carriage returns) when using XML requests. For more information, see XML related object key
     * constraints.
     * @param ?string $versionId Version ID for the specific version of the object to delete. This functionality is not
     *        supported for directory buckets.
     * @param ?string $eTag An entity tag (ETag) is an identifier assigned by a web server to a specific version of a
     *        resource found at a URL. This header field makes the request method conditional on ETags. Entity tags (ETags)
     * for S3
     *        Express One Zone are random alphanumeric strings unique to the object.
     * @param ?float $lastModifiedTime If present, the objects are deleted only if its modification times matches the
     *        provided Timestamp. This functionality is only supported for directory buckets.
     * @param ?int $size If present, the objects are deleted only if its size matches the provided size in bytes. This
     *        functionality is only supported for directory buckets.
     */
    public function __construct(
        public readonly ?string $key = null,
        public readonly ?string $versionId = null,
        public readonly ?string $eTag = null,
        public readonly ?float $lastModifiedTime = null,
        public readonly ?int $size = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::objectIdentifier();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_KEY = $m[0];
        self::$SCHEMA_VERSION_ID = $m[1];
        self::$SCHEMA_E_TAG = $m[2];
        self::$SCHEMA_LAST_MODIFIED_TIME = $m[3];
        self::$SCHEMA_SIZE = $m[4];
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
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 1);
        }
        if (isset($this->eTag)) {
            $serializer->serializeString(self::$SCHEMA_E_TAG, $this->eTag, 2);
        }
        if (isset($this->lastModifiedTime)) {
            $serializer->serializeTimestamp(self::$SCHEMA_LAST_MODIFIED_TIME, $this->lastModifiedTime, 3);
        }
        if (isset($this->size)) {
            $serializer->serializeInteger(self::$SCHEMA_SIZE, $this->size, 4);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->key,
            1 => $this->versionId,
            2 => $this->eTag,
            3 => $this->lastModifiedTime,
            4 => $this->size,
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
            $this->versionId,
            $this->eTag,
            $this->lastModifiedTime,
            $this->size
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
