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
 * A container specifying S3 Replication Time Control (S3 RTC) related information, including whether S3 RTC is enabled
 * and the time when all objects and operations on objects must be replicated. Must be specified together with a Metrics
 * block.
 */
final class ReplicationTime implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ReplicationTime';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_STATUS;
    private static Schema $SCHEMA_TIME;

    public readonly ?ReplicationTimeStatus $status;

    /**
     * @param ?ReplicationTimeStatus $status Specifies whether the replication time is enabled.
     * @param ?ReplicationTimeValue $time A container specifying the time by which replication should be complete for all
     *        objects and operations on objects.
     */
    public function __construct(
        ReplicationTimeStatus|string|null $status = null,
        public readonly ?ReplicationTimeValue $time = null
    ) {
        $this->status = $status === null || $status instanceof ReplicationTimeStatus ? $status : ReplicationTimeStatus::fromValue($status);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::replicationTime();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_STATUS = $m[0];
        self::$SCHEMA_TIME = $m[1];
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
        if (isset($this->status)) {
            $serializer->serializeString(self::$SCHEMA_STATUS, $this->status->value, 0);
        }
        if (isset($this->time)) {
            $serializer->serializeStruct(self::$SCHEMA_TIME, $this->time, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->status,
            1 => $this->time,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->status,
            $this->time
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
