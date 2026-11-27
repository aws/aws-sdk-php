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
 * A collection of parts associated with a multipart upload.
 */
final class GetObjectAttributesParts implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#GetObjectAttributesParts';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_TOTAL_PARTS_COUNT;
    private static Schema $SCHEMA_PART_NUMBER_MARKER;
    private static Schema $SCHEMA_NEXT_PART_NUMBER_MARKER;
    private static Schema $SCHEMA_MAX_PARTS;
    private static Schema $SCHEMA_IS_TRUNCATED;
    private static Schema $SCHEMA_PARTS;

    /**
     * @param ?int $totalPartsCount The total number of parts.
     * @param ?string $partNumberMarker The marker for the current part.
     * @param ?string $nextPartNumberMarker When a list is truncated, this element specifies the last part in the list, as
     *        well as the value to use for the PartNumberMarker request parameter in a subsequent request.
     * @param ?int $maxParts The maximum number of parts allowed in the response.
     * @param ?bool $isTruncated Indicates whether the returned list of parts is truncated. A value of true indicates that
     *        the list was truncated. A list can be truncated if the number of parts exceeds the limit returned in the
     * MaxParts
     *        element.
     * @param list<\Aws\Services\S3\Shape\ObjectPart>|null $parts
     */
    public function __construct(
        public readonly ?int $totalPartsCount = null,
        public readonly ?string $partNumberMarker = null,
        public readonly ?string $nextPartNumberMarker = null,
        public readonly ?int $maxParts = null,
        public readonly ?bool $isTruncated = null,
        public readonly ?array $parts = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::getObjectAttributesParts();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_TOTAL_PARTS_COUNT = $m[0];
        self::$SCHEMA_PART_NUMBER_MARKER = $m[1];
        self::$SCHEMA_NEXT_PART_NUMBER_MARKER = $m[2];
        self::$SCHEMA_MAX_PARTS = $m[3];
        self::$SCHEMA_IS_TRUNCATED = $m[4];
        self::$SCHEMA_PARTS = $m[5];
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
        if (isset($this->totalPartsCount)) {
            $serializer->serializeInteger(self::$SCHEMA_TOTAL_PARTS_COUNT, $this->totalPartsCount, 0);
        }
        if (isset($this->partNumberMarker)) {
            $serializer->serializeString(self::$SCHEMA_PART_NUMBER_MARKER, $this->partNumberMarker, 1);
        }
        if (isset($this->nextPartNumberMarker)) {
            $serializer->serializeString(self::$SCHEMA_NEXT_PART_NUMBER_MARKER, $this->nextPartNumberMarker, 2);
        }
        if (isset($this->maxParts)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_PARTS, $this->maxParts, 3);
        }
        if (isset($this->isTruncated)) {
            $serializer->serializeBoolean(self::$SCHEMA_IS_TRUNCATED, $this->isTruncated, 4);
        }
        if (isset($this->parts)) {
            $serializer->serializeList(self::$SCHEMA_PARTS, $this->parts, 5);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->totalPartsCount,
            1 => $this->partNumberMarker,
            2 => $this->nextPartNumberMarker,
            3 => $this->maxParts,
            4 => $this->isTruncated,
            5 => $this->parts,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->totalPartsCount,
            $this->partNumberMarker,
            $this->nextPartNumberMarker,
            $this->maxParts,
            $this->isTruncated,
            $this->parts
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
