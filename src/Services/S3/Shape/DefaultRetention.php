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
 * The container element for optionally specifying the default Object Lock retention settings for new objects placed in
 * the specified bucket. The DefaultRetention settings require both a mode and a period. The DefaultRetention period can
 * be either Days or Years but you must select one. You cannot specify Days and Years at the same time.
 */
final class DefaultRetention implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#DefaultRetention';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_MODE;
    private static Schema $SCHEMA_DAYS;
    private static Schema $SCHEMA_YEARS;
    private static Schema $SCHEMA_DEFAULT_EVENT_HOLD;

    public readonly ?ObjectLockRetentionMode $mode;

    /**
     * @param ?ObjectLockRetentionMode $mode The default Object Lock retention mode you want to apply to new objects placed
     *        in the specified bucket. Must be used with either Days or Years.
     * @param ?int $days The number of days that you want to specify for the default retention period. Must be used with
     *        Mode.
     * @param ?int $years The number of years that you want to specify for the default retention period. Must be used with
     *        Mode.
     * @param ?EventHoldDuration $defaultEventHold The default event hold duration to be applied to new objects placed in
     *        the specified bucket. When configured, new objects will automatically have an event hold enabled with this
     * duration.
     */
    public function __construct(
        ObjectLockRetentionMode|string|null $mode = null,
        public readonly ?int $days = null,
        public readonly ?int $years = null,
        public readonly ?EventHoldDuration $defaultEventHold = null
    ) {
        $this->mode = $mode === null || $mode instanceof ObjectLockRetentionMode ? $mode : ObjectLockRetentionMode::fromValue($mode);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::defaultRetention();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_MODE = $m[0];
        self::$SCHEMA_DAYS = $m[1];
        self::$SCHEMA_YEARS = $m[2];
        self::$SCHEMA_DEFAULT_EVENT_HOLD = $m[3];
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
        if (isset($this->mode)) {
            $serializer->serializeString(self::$SCHEMA_MODE, $this->mode->value, 0);
        }
        if (isset($this->days)) {
            $serializer->serializeInteger(self::$SCHEMA_DAYS, $this->days, 1);
        }
        if (isset($this->years)) {
            $serializer->serializeInteger(self::$SCHEMA_YEARS, $this->years, 2);
        }
        if (isset($this->defaultEventHold)) {
            $serializer->serializeStruct(self::$SCHEMA_DEFAULT_EVENT_HOLD, $this->defaultEventHold, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->mode,
            1 => $this->days,
            2 => $this->years,
            3 => $this->defaultEventHold,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->mode,
            $this->days,
            $this->years,
            $this->defaultEventHold
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
