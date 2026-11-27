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
 * Amazon S3 key format for log objects. Only one format, PartitionedPrefix or SimplePrefix, is allowed.
 */
final class TargetObjectKeyFormat implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#TargetObjectKeyFormat';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_SIMPLE_PREFIX;
    private static Schema $SCHEMA_PARTITIONED_PREFIX;

    /**
     * @param ?SimplePrefix $simplePrefix To use the simple format for S3 keys for log objects. To specify SimplePrefix
     *        format, set SimplePrefix to {}.
     * @param ?PartitionedPrefix $partitionedPrefix Partitioned S3 key for log objects.
     */
    public function __construct(
        public readonly ?SimplePrefix $simplePrefix = null,
        public readonly ?PartitionedPrefix $partitionedPrefix = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::targetObjectKeyFormat();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_SIMPLE_PREFIX = $m[0];
        self::$SCHEMA_PARTITIONED_PREFIX = $m[1];
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
        if (isset($this->simplePrefix)) {
            $serializer->serializeStruct(self::$SCHEMA_SIMPLE_PREFIX, $this->simplePrefix, 0);
        }
        if (isset($this->partitionedPrefix)) {
            $serializer->serializeStruct(self::$SCHEMA_PARTITIONED_PREFIX, $this->partitionedPrefix, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->simplePrefix,
            1 => $this->partitionedPrefix,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->simplePrefix,
            $this->partitionedPrefix
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
