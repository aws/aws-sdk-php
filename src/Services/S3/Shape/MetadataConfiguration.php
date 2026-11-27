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
 * The S3 Metadata configuration for a general purpose bucket.
 */
final class MetadataConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#MetadataConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_JOURNAL_TABLE_CONFIGURATION;
    private static Schema $SCHEMA_INVENTORY_TABLE_CONFIGURATION;
    private static Schema $SCHEMA_ANNOTATION_TABLE_CONFIGURATION;

    /**
     * @param ?JournalTableConfiguration $journalTableConfiguration The journal table configuration for a metadata
     *        configuration.
     * @param ?InventoryTableConfiguration $inventoryTableConfiguration The inventory table configuration for a metadata
     *        configuration.
     * @param ?AnnotationTableConfiguration $annotationTableConfiguration Optional annotation table configuration to include
     *        with the metadata configuration.
     */
    public function __construct(
        public readonly ?JournalTableConfiguration $journalTableConfiguration = null,
        public readonly ?InventoryTableConfiguration $inventoryTableConfiguration = null,
        public readonly ?AnnotationTableConfiguration $annotationTableConfiguration = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::metadataConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_JOURNAL_TABLE_CONFIGURATION = $m[0];
        self::$SCHEMA_INVENTORY_TABLE_CONFIGURATION = $m[1];
        self::$SCHEMA_ANNOTATION_TABLE_CONFIGURATION = $m[2];
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
        if (isset($this->journalTableConfiguration)) {
            $serializer->serializeStruct(self::$SCHEMA_JOURNAL_TABLE_CONFIGURATION, $this->journalTableConfiguration, 0);
        }
        if (isset($this->inventoryTableConfiguration)) {
            $serializer->serializeStruct(self::$SCHEMA_INVENTORY_TABLE_CONFIGURATION, $this->inventoryTableConfiguration, 1);
        }
        if (isset($this->annotationTableConfiguration)) {
            $serializer->serializeStruct(self::$SCHEMA_ANNOTATION_TABLE_CONFIGURATION, $this->annotationTableConfiguration, 2);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->journalTableConfiguration,
            1 => $this->inventoryTableConfiguration,
            2 => $this->annotationTableConfiguration,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->journalTableConfiguration,
            $this->inventoryTableConfiguration,
            $this->annotationTableConfiguration
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
