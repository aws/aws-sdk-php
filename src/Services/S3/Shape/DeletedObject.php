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
 * Information about the deleted object.
 */
final class DeletedObject implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#DeletedObject';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_DELETE_MARKER;
    private static Schema $SCHEMA_DELETE_MARKER_VERSION_ID;

    /**
     * @param ?string $key The name of the deleted object.
     * @param ?string $versionId The version ID of the deleted object. This functionality is not supported for directory
     *        buckets.
     * @param ?bool $deleteMarker Indicates whether the specified object version that was permanently deleted was (true) or
     *        was not (false) a delete marker before deletion. In a simple DELETE, this header indicates whether (true) or
     * not
     *        (false) the current version of the object is a delete marker. To learn more about delete markers, see Working
     * with
     *        delete markers. This functionality is not supported for directory buckets.
     * @param ?string $deleteMarkerVersionId The version ID of the delete marker created as a result of the DELETE
     *        operation. If you delete a specific object version, the value returned by this header is the version ID of the
     * object
     *        version deleted. This functionality is not supported for directory buckets.
     */
    public function __construct(
        public readonly ?string $key = null,
        public readonly ?string $versionId = null,
        public readonly ?bool $deleteMarker = null,
        public readonly ?string $deleteMarkerVersionId = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::deletedObject();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_KEY = $m[0];
        self::$SCHEMA_VERSION_ID = $m[1];
        self::$SCHEMA_DELETE_MARKER = $m[2];
        self::$SCHEMA_DELETE_MARKER_VERSION_ID = $m[3];
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
        if (isset($this->deleteMarker)) {
            $serializer->serializeBoolean(self::$SCHEMA_DELETE_MARKER, $this->deleteMarker, 2);
        }
        if (isset($this->deleteMarkerVersionId)) {
            $serializer->serializeString(self::$SCHEMA_DELETE_MARKER_VERSION_ID, $this->deleteMarkerVersionId, 3);
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
            2 => $this->deleteMarker,
            3 => $this->deleteMarkerVersionId,
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
            $this->deleteMarker,
            $this->deleteMarkerVersionId
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
