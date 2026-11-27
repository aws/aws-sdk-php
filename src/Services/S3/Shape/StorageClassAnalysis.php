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
 * Specifies data related to access patterns to be collected and made available to analyze the tradeoffs between
 * different storage classes for an Amazon S3 bucket.
 */
final class StorageClassAnalysis implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#StorageClassAnalysis';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DATA_EXPORT;

    /**
     * @param ?StorageClassAnalysisDataExport $dataExport Specifies how data related to the storage class analysis for an
     *        Amazon S3 bucket should be exported.
     */
    public function __construct(
        public readonly ?StorageClassAnalysisDataExport $dataExport = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::storageClassAnalysis();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DATA_EXPORT = $m[0];
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
        if (isset($this->dataExport)) {
            $serializer->serializeStruct(self::$SCHEMA_DATA_EXPORT, $this->dataExport, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->dataExport,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->dataExport
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
