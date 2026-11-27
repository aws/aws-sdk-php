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
 * Contains the event hold duration configuration, specified in either days or years.
 */
final class EventHoldDuration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#EventHoldDuration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DAYS;
    private static Schema $SCHEMA_YEARS;

    /**
     * @param ?int $days The number of days for the event hold duration. The minimum value is 1 and the maximum value is
     *        36,500.
     * @param ?int $years The number of years for the event hold duration. The minimum value is 1 and the maximum value is
     *        100.
     */
    public function __construct(
        public readonly ?int $days = null,
        public readonly ?int $years = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::eventHoldDuration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DAYS = $m[0];
        self::$SCHEMA_YEARS = $m[1];
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
        if (isset($this->days)) {
            $serializer->serializeInteger(self::$SCHEMA_DAYS, $this->days, 0);
        }
        if (isset($this->years)) {
            $serializer->serializeInteger(self::$SCHEMA_YEARS, $this->years, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->days,
            1 => $this->years,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->days,
            $this->years
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
