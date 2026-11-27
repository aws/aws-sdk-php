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
 * Specifies the Amazon S3 object key name to filter on. An object key name is the name assigned to an object in your
 * Amazon S3 bucket. You specify whether to filter on the suffix or prefix of the object key name. A prefix is a
 * specific string of characters at the beginning of an object key name, which you can use to organize objects. For
 * example, you can start the key names of related objects with a prefix, such as 2023- or engineering/. Then, you can
 * use FilterRule to find objects in a bucket with key names that have the same prefix. A suffix is similar to a prefix,
 * but it is at the end of the object key name instead of at the beginning.
 */
final class FilterRule implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#FilterRule';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_NAME;
    private static Schema $SCHEMA_VALUE;

    public readonly ?FilterRuleName $name;

    /**
     * @param ?FilterRuleName $name The object key name prefix or suffix identifying one or more objects to which the
     *        filtering rule applies. The maximum length is 1,024 characters. Overlapping prefixes and suffixes are not
     * supported.
     *        For more information, see Configuring Event Notifications in the Amazon S3 User Guide.
     * @param ?string $value The value that the filter searches for in object key names.
     */
    public function __construct(
        FilterRuleName|string|null $name = null,
        public readonly ?string $value = null
    ) {
        $this->name = $name === null || $name instanceof FilterRuleName ? $name : FilterRuleName::fromValue($name);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::filterRule();
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
            $serializer->serializeString(self::$SCHEMA_NAME, $this->name->value, 0);
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
