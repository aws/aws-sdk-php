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
 * A Retention configuration for an object.
 */
final class ObjectLockRetention implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ObjectLockRetention';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_MODE;
    private static Schema $SCHEMA_RETAIN_UNTIL_DATE;
    private static Schema $SCHEMA_EVENT_HOLD;
    private static Schema $SCHEMA_EVENT_HOLD_DURATION;

    public readonly ?ObjectLockRetentionMode $mode;
    public readonly ?ObjectLockEventHold $eventHold;

    /**
     * @param ?ObjectLockRetentionMode $mode Indicates the Retention mode for the specified object.
     * @param ?float $retainUntilDate The date on which this Object Lock Retention will expire.
     * @param ?ObjectLockEventHold $eventHold The event hold status for the object. Set to ON to enable an event hold or OFF
     *        to disable it.
     * @param ?EventHoldDuration $eventHoldDuration The event hold duration for the object. Specifies how long the object
     *        remains protected after the event hold is released.
     */
    public function __construct(
        ObjectLockRetentionMode|string|null $mode = null,
        public readonly ?float $retainUntilDate = null,
        ObjectLockEventHold|string|null $eventHold = null,
        public readonly ?EventHoldDuration $eventHoldDuration = null
    ) {
        $this->mode = $mode === null || $mode instanceof ObjectLockRetentionMode ? $mode : ObjectLockRetentionMode::fromValue($mode);
        $this->eventHold = $eventHold === null || $eventHold instanceof ObjectLockEventHold ? $eventHold : ObjectLockEventHold::fromValue($eventHold);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::objectLockRetention();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_MODE = $m[0];
        self::$SCHEMA_RETAIN_UNTIL_DATE = $m[1];
        self::$SCHEMA_EVENT_HOLD = $m[2];
        self::$SCHEMA_EVENT_HOLD_DURATION = $m[3];
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
        if (isset($this->retainUntilDate)) {
            $serializer->serializeTimestamp(self::$SCHEMA_RETAIN_UNTIL_DATE, $this->retainUntilDate, 1);
        }
        if (isset($this->eventHold)) {
            $serializer->serializeString(self::$SCHEMA_EVENT_HOLD, $this->eventHold->value, 2);
        }
        if (isset($this->eventHoldDuration)) {
            $serializer->serializeStruct(self::$SCHEMA_EVENT_HOLD_DURATION, $this->eventHoldDuration, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->mode,
            1 => $this->retainUntilDate,
            2 => $this->eventHold,
            3 => $this->eventHoldDuration,
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
            $this->retainUntilDate,
            $this->eventHold,
            $this->eventHoldDuration
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
