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
 * Container for the stats details.
 */
final class Stats implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Stats';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BYTES_SCANNED;
    private static Schema $SCHEMA_BYTES_PROCESSED;
    private static Schema $SCHEMA_BYTES_RETURNED;

    /**
     * @param ?int $bytesScanned The total number of object bytes scanned.
     * @param ?int $bytesProcessed The total number of uncompressed object bytes processed.
     * @param ?int $bytesReturned The total number of bytes of records payload data returned.
     */
    public function __construct(
        public readonly ?int $bytesScanned = null,
        public readonly ?int $bytesProcessed = null,
        public readonly ?int $bytesReturned = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::stats();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BYTES_SCANNED = $m[0];
        self::$SCHEMA_BYTES_PROCESSED = $m[1];
        self::$SCHEMA_BYTES_RETURNED = $m[2];
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
        if (isset($this->bytesScanned)) {
            $serializer->serializeInteger(self::$SCHEMA_BYTES_SCANNED, $this->bytesScanned, 0);
        }
        if (isset($this->bytesProcessed)) {
            $serializer->serializeInteger(self::$SCHEMA_BYTES_PROCESSED, $this->bytesProcessed, 1);
        }
        if (isset($this->bytesReturned)) {
            $serializer->serializeInteger(self::$SCHEMA_BYTES_RETURNED, $this->bytesReturned, 2);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bytesScanned,
            1 => $this->bytesProcessed,
            2 => $this->bytesReturned,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->bytesScanned,
            $this->bytesProcessed,
            $this->bytesReturned
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
