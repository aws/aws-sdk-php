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
 * Describes the serialization format of the object.
 */
final class InputSerialization implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#InputSerialization';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_CSV;
    private static Schema $SCHEMA_COMPRESSION_TYPE;
    private static Schema $SCHEMA_JSON;
    private static Schema $SCHEMA_PARQUET;

    public readonly ?CompressionType $compressionType;

    /**
     * @param ?CSVInput $cSV Describes the serialization of a CSV-encoded object.
     * @param ?CompressionType $compressionType Specifies object's compression format. Valid values: NONE, GZIP, BZIP2.
     *        Default Value: NONE.
     * @param ?JSONInput $jSON Specifies JSON as object's input serialization format.
     * @param ?ParquetInput $parquet Specifies Parquet as object's input serialization format.
     */
    public function __construct(
        public readonly ?CSVInput $cSV = null,
        CompressionType|string|null $compressionType = null,
        public readonly ?JSONInput $jSON = null,
        public readonly ?ParquetInput $parquet = null
    ) {
        $this->compressionType = $compressionType === null || $compressionType instanceof CompressionType ? $compressionType : CompressionType::fromValue($compressionType);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::inputSerialization();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_CSV = $m[0];
        self::$SCHEMA_COMPRESSION_TYPE = $m[1];
        self::$SCHEMA_JSON = $m[2];
        self::$SCHEMA_PARQUET = $m[3];
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
        if (isset($this->compressionType)) {
            $serializer->serializeString(self::$SCHEMA_COMPRESSION_TYPE, $this->compressionType->value, 1);
        }
        if (isset($this->jSON)) {
            $serializer->serializeStruct(self::$SCHEMA_JSON, $this->jSON, 2);
        }
        if (isset($this->parquet)) {
            $serializer->serializeStruct(self::$SCHEMA_PARQUET, $this->parquet, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->cSV,
            1 => $this->compressionType,
            2 => $this->jSON,
            3 => $this->parquet,
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
            $this->compressionType,
            $this->jSON,
            $this->parquet
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
