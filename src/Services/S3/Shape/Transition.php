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
 * Specifies when an object transitions to a specified storage class. For more information about Amazon S3 lifecycle
 * configuration rules, see Transitioning Objects Using Amazon S3 Lifecycle in the Amazon S3 User Guide.
 */
final class Transition implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Transition';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DATE;
    private static Schema $SCHEMA_DAYS;
    private static Schema $SCHEMA_STORAGE_CLASS;

    public readonly ?TransitionStorageClass $storageClass;

    /**
     * @param ?float $date Indicates when objects are transitioned to the specified storage class. The date value must be in
     *        ISO 8601 format. The time is always midnight UTC.
     * @param ?int $days Indicates the number of days after creation when objects are transitioned to the specified storage
     *        class. The value can be 0 or any positive integer. Be aware that some storage classes have a minimum storage
     * duration
     *        and that you're charged for transitioning objects before their minimum storage duration. For more information,
     * see
     *        Constraints and considerations for transitions in the Amazon S3 User Guide.
     * @param ?TransitionStorageClass $storageClass The storage class to which you want the object to transition.
     */
    public function __construct(
        public readonly ?float $date = null,
        public readonly ?int $days = null,
        TransitionStorageClass|string|null $storageClass = null
    ) {
        $this->storageClass = $storageClass === null || $storageClass instanceof TransitionStorageClass ? $storageClass : TransitionStorageClass::fromValue($storageClass);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::transition();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DATE = $m[0];
        self::$SCHEMA_DAYS = $m[1];
        self::$SCHEMA_STORAGE_CLASS = $m[2];
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
        if (isset($this->date)) {
            $serializer->serializeTimestamp(self::$SCHEMA_DATE, $this->date, 0);
        }
        if (isset($this->days)) {
            $serializer->serializeInteger(self::$SCHEMA_DAYS, $this->days, 1);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 2);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->date,
            1 => $this->days,
            2 => $this->storageClass,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->date,
            $this->days,
            $this->storageClass
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
