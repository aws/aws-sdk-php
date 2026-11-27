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
 * A container specifying replication metrics-related settings enabling replication metrics and events.
 */
final class Metrics implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Metrics';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_STATUS;
    private static Schema $SCHEMA_EVENT_THRESHOLD;

    public readonly ?MetricsStatus $status;

    /**
     * @param ?MetricsStatus $status Specifies whether the replication metrics are enabled.
     * @param ?ReplicationTimeValue $eventThreshold A container specifying the time threshold for emitting the
     *        s3:Replication:OperationMissedThreshold event.
     */
    public function __construct(
        MetricsStatus|string|null $status = null,
        public readonly ?ReplicationTimeValue $eventThreshold = null
    ) {
        $this->status = $status === null || $status instanceof MetricsStatus ? $status : MetricsStatus::fromValue($status);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::metrics();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_STATUS = $m[0];
        self::$SCHEMA_EVENT_THRESHOLD = $m[1];
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
        if (isset($this->eventThreshold)) {
            $serializer->serializeStruct(self::$SCHEMA_EVENT_THRESHOLD, $this->eventThreshold, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->status,
            1 => $this->eventThreshold,
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
            $this->eventThreshold
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
