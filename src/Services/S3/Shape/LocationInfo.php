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
 * Specifies the location where the bucket will be created. For directory buckets, the location type is Availability
 * Zone or Local Zone. For more information about directory buckets, see Working with directory buckets in the Amazon S3
 * User Guide. This functionality is only supported by directory buckets.
 */
final class LocationInfo implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#LocationInfo';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_TYPE;
    private static Schema $SCHEMA_NAME;

    public readonly ?LocationType $type;

    /**
     * @param ?LocationType $type The type of location where the bucket will be created.
     * @param ?string $name The name of the location where the bucket will be created. For directory buckets, the name of
     *        the location is the Zone ID of the Availability Zone (AZ) or Local Zone (LZ) where the bucket will be created.
     * An
     *        example AZ ID value is usw2-az1.
     */
    public function __construct(
        LocationType|string|null $type = null,
        public readonly ?string $name = null
    ) {
        $this->type = $type === null || $type instanceof LocationType ? $type : LocationType::fromValue($type);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::locationInfo();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_TYPE = $m[0];
        self::$SCHEMA_NAME = $m[1];
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
        if (isset($this->type)) {
            $serializer->serializeString(self::$SCHEMA_TYPE, $this->type->value, 0);
        }
        if (isset($this->name)) {
            $serializer->serializeString(self::$SCHEMA_NAME, $this->name, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->type,
            1 => $this->name,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->type,
            $this->name
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
