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
 * Describes how results of the Select job are serialized.
 */
final class OutputSerialization implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#OutputSerialization';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_CSV;
    private static Schema $SCHEMA_JSON;

    /**
     * @param ?CSVOutput $cSV Describes the serialization of CSV-encoded Select results.
     * @param ?JSONOutput $jSON Specifies JSON as request's output serialization format.
     */
    public function __construct(
        public readonly ?CSVOutput $cSV = null,
        public readonly ?JSONOutput $jSON = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::outputSerialization();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_CSV = $m[0];
        self::$SCHEMA_JSON = $m[1];
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
        if (isset($this->cSV)) {
            $serializer->serializeStruct(self::$SCHEMA_CSV, $this->cSV, 0);
        }
        if (isset($this->jSON)) {
            $serializer->serializeStruct(self::$SCHEMA_JSON, $this->jSON, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->cSV,
            1 => $this->jSON,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->cSV,
            $this->jSON
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
