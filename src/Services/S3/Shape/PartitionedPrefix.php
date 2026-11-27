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
 * Amazon S3 keys for log objects are partitioned in the following format:
 * [DestinationPrefix][SourceAccountId]/[SourceRegion]/[SourceBucket]/[YYYY]/[MM]/[DD]/[YYYY]-[MM]-[DD]-[hh]-[mm]-[ss]-[
 * UniqueString] PartitionedPrefix defaults to EventTime delivery when server access logs are delivered.
 */
final class PartitionedPrefix implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PartitionedPrefix';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_PARTITION_DATE_SOURCE;

    public readonly ?PartitionDateSource $partitionDateSource;

    /**
     * @param ?PartitionDateSource $partitionDateSource Specifies the partition date source for the partitioned prefix.
     *        PartitionDateSource can be EventTime or DeliveryTime. For DeliveryTime, the time in the log file names
     * corresponds to
     *        the delivery time for the log files. For EventTime, The logs delivered are for a specific day only. The year,
     * month,
     *        and day correspond to the day on which the event occurred, and the hour, minutes and seconds are set to 00 in
     * the
     *        key.
     */
    public function __construct(
        PartitionDateSource|string|null $partitionDateSource = null
    ) {
        $this->partitionDateSource = $partitionDateSource === null || $partitionDateSource instanceof PartitionDateSource ? $partitionDateSource : PartitionDateSource::fromValue($partitionDateSource);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::partitionedPrefix();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_PARTITION_DATE_SOURCE = $m[0];
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
        if (isset($this->partitionDateSource)) {
            $serializer->serializeString(self::$SCHEMA_PARTITION_DATE_SOURCE, $this->partitionDateSource->value, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->partitionDateSource,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->partitionDateSource
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
