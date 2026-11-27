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
 * Specifies the byte range of the object to get the records from. A record is processed when its first byte is
 * contained by the range. This parameter is optional, but when specified, it must not be empty. See RFC 2616, Section
 * 14.35.1 about how to specify the start and end of the range.
 */
final class ScanRange implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ScanRange';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_START;
    private static Schema $SCHEMA_END;

    /**
     * @param ?int $start Specifies the start of the byte range. This parameter is optional. Valid values: non-negative
     *        integers. The default value is 0. If only start is supplied, it means scan from that point to the end of the
     * file.
     *        For example, 50 means scan from byte 50 until the end of the file.
     * @param ?int $end Specifies the end of the byte range. This parameter is optional. Valid values: non-negative
     *        integers. The default value is one less than the size of the object being queried. If only the End parameter
     * is
     *        supplied, it is interpreted to mean scan the last N bytes of the file. For example, 50 means scan the last 50
     * bytes.
     */
    public function __construct(
        public readonly ?int $start = null,
        public readonly ?int $end = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::scanRange();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_START = $m[0];
        self::$SCHEMA_END = $m[1];
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
        if (isset($this->start)) {
            $serializer->serializeInteger(self::$SCHEMA_START, $this->start, 0);
        }
        if (isset($this->end)) {
            $serializer->serializeInteger(self::$SCHEMA_END, $this->end, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->start,
            1 => $this->end,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->start,
            $this->end
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
