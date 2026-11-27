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
 * A metadata key-value pair to store with an object.
 */
final class MetadataEntry implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#MetadataEntry';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_NAME;
    private static Schema $SCHEMA_VALUE;

    /**
     * @param ?string $name Name of the object.
     * @param ?string $value Value of the object.
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $value = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::metadataEntry();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_NAME = $m[0];
        self::$SCHEMA_VALUE = $m[1];
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
        if (isset($this->name)) {
            $serializer->serializeString(self::$SCHEMA_NAME, $this->name, 0);
        }
        if (isset($this->value)) {
            $serializer->serializeString(self::$SCHEMA_VALUE, $this->value, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->name,
            1 => $this->value,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->name,
            $this->value
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
