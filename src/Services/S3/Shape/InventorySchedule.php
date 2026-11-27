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
 * Specifies the schedule for generating S3 Inventory results.
 */
final class InventorySchedule implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#InventorySchedule';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_FREQUENCY;

    public readonly ?InventoryFrequency $frequency;

    /**
     * @param ?InventoryFrequency $frequency Specifies how frequently inventory results are produced.
     */
    public function __construct(
        InventoryFrequency|string|null $frequency = null
    ) {
        $this->frequency = $frequency === null || $frequency instanceof InventoryFrequency ? $frequency : InventoryFrequency::fromValue($frequency);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::inventorySchedule();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_FREQUENCY = $m[0];
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
        if (isset($this->frequency)) {
            $serializer->serializeString(self::$SCHEMA_FREQUENCY, $this->frequency->value, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->frequency,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->frequency
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
