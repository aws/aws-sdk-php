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
 * Information about the delete marker.
 */
final class DeleteMarkerEntry implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#DeleteMarkerEntry';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_OWNER;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_IS_LATEST;
    private static Schema $SCHEMA_LAST_MODIFIED;

    /**
     * @param ?Owner $owner The account that created the delete marker.
     * @param ?string $key The object key.
     * @param ?string $versionId Version ID of an object.
     * @param ?bool $isLatest Specifies whether the object is (true) or is not (false) the latest version of an object.
     * @param ?float $lastModified Date and time when the object was last modified.
     */
    public function __construct(
        public readonly ?Owner $owner = null,
        public readonly ?string $key = null,
        public readonly ?string $versionId = null,
        public readonly ?bool $isLatest = null,
        public readonly ?float $lastModified = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::deleteMarkerEntry();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_OWNER = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_VERSION_ID = $m[2];
        self::$SCHEMA_IS_LATEST = $m[3];
        self::$SCHEMA_LAST_MODIFIED = $m[4];
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
        if (isset($this->owner)) {
            $serializer->serializeStruct(self::$SCHEMA_OWNER, $this->owner, 0);
        }
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 1);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 2);
        }
        if (isset($this->isLatest)) {
            $serializer->serializeBoolean(self::$SCHEMA_IS_LATEST, $this->isLatest, 3);
        }
        if (isset($this->lastModified)) {
            $serializer->serializeTimestamp(self::$SCHEMA_LAST_MODIFIED, $this->lastModified, 4);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->owner,
            1 => $this->key,
            2 => $this->versionId,
            3 => $this->isLatest,
            4 => $this->lastModified,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->owner,
            $this->key,
            $this->versionId,
            $this->isLatest,
            $this->lastModified
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
