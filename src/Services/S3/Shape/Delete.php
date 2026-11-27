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
 * Container for the objects to delete.
 */
final class Delete implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Delete';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_OBJECTS;
    private static Schema $SCHEMA_QUIET;

    /**
     * @param list<\Aws\Services\S3\Shape\ObjectIdentifier>|null $objects
     * @param ?bool $quiet Element to enable quiet mode for the request. When you add this element, you must set its value
     *        to true.
     */
    public function __construct(
        public readonly ?array $objects = null,
        public readonly ?bool $quiet = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::delete();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_OBJECTS = $m[0];
        self::$SCHEMA_QUIET = $m[1];
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
        if (isset($this->objects)) {
            $serializer->serializeList(self::$SCHEMA_OBJECTS, $this->objects, 0);
        }
        if (isset($this->quiet)) {
            $serializer->serializeBoolean(self::$SCHEMA_QUIET, $this->quiet, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->objects,
            1 => $this->quiet,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->objects,
            $this->quiet
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
