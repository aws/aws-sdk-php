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
 * Container for data related to the storage class analysis for an Amazon S3 bucket for export.
 */
final class StorageClassAnalysisDataExport implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#StorageClassAnalysisDataExport';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_OUTPUT_SCHEMA_VERSION;
    private static Schema $SCHEMA_DESTINATION;

    public readonly ?StorageClassAnalysisSchemaVersion $outputSchemaVersion;

    /**
     * @param ?StorageClassAnalysisSchemaVersion $outputSchemaVersion The version of the output schema to use when exporting
     *        data. Must be V_1.
     * @param ?AnalyticsExportDestination $destination The place to store the data for an analysis.
     */
    public function __construct(
        StorageClassAnalysisSchemaVersion|string|null $outputSchemaVersion = null,
        public readonly ?AnalyticsExportDestination $destination = null
    ) {
        $this->outputSchemaVersion = $outputSchemaVersion === null || $outputSchemaVersion instanceof StorageClassAnalysisSchemaVersion ? $outputSchemaVersion : StorageClassAnalysisSchemaVersion::fromValue($outputSchemaVersion);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::storageClassAnalysisDataExport();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_OUTPUT_SCHEMA_VERSION = $m[0];
        self::$SCHEMA_DESTINATION = $m[1];
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
        if (isset($this->outputSchemaVersion)) {
            $serializer->serializeString(self::$SCHEMA_OUTPUT_SCHEMA_VERSION, $this->outputSchemaVersion->value, 0);
        }
        if (isset($this->destination)) {
            $serializer->serializeStruct(self::$SCHEMA_DESTINATION, $this->destination, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->outputSchemaVersion,
            1 => $this->destination,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->outputSchemaVersion,
            $this->destination
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
