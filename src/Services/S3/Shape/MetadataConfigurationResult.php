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
final class MetadataConfigurationResult implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#MetadataConfigurationResult';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DESTINATION_RESULT;
    private static Schema $SCHEMA_JOURNAL_TABLE_CONFIGURATION_RESULT;
    private static Schema $SCHEMA_INVENTORY_TABLE_CONFIGURATION_RESULT;
    private static Schema $SCHEMA_ANNOTATION_TABLE_CONFIGURATION_RESULT;

    /**
     * @param ?DestinationResult $destinationResult The destination settings for a metadata configuration.
     * @param ?JournalTableConfigurationResult $journalTableConfigurationResult The journal table configuration for a
     *        metadata configuration.
     * @param ?InventoryTableConfigurationResult $inventoryTableConfigurationResult The inventory table configuration for a
     *        metadata configuration.
     * @param ?AnnotationTableConfigurationResult $annotationTableConfigurationResult The annotation table configuration
     *        result, if an annotation table is configured.
     */
    public function __construct(
        public readonly ?DestinationResult $destinationResult = null,
        public readonly ?JournalTableConfigurationResult $journalTableConfigurationResult = null,
        public readonly ?InventoryTableConfigurationResult $inventoryTableConfigurationResult = null,
        public readonly ?AnnotationTableConfigurationResult $annotationTableConfigurationResult = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::metadataConfigurationResult();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DESTINATION_RESULT = $m[0];
        self::$SCHEMA_JOURNAL_TABLE_CONFIGURATION_RESULT = $m[1];
        self::$SCHEMA_INVENTORY_TABLE_CONFIGURATION_RESULT = $m[2];
        self::$SCHEMA_ANNOTATION_TABLE_CONFIGURATION_RESULT = $m[3];
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
        if (isset($this->destinationResult)) {
            $serializer->serializeStruct(self::$SCHEMA_DESTINATION_RESULT, $this->destinationResult, 0);
        }
        if (isset($this->journalTableConfigurationResult)) {
            $serializer->serializeStruct(self::$SCHEMA_JOURNAL_TABLE_CONFIGURATION_RESULT, $this->journalTableConfigurationResult, 1);
        }
        if (isset($this->inventoryTableConfigurationResult)) {
            $serializer->serializeStruct(self::$SCHEMA_INVENTORY_TABLE_CONFIGURATION_RESULT, $this->inventoryTableConfigurationResult, 2);
        }
        if (isset($this->annotationTableConfigurationResult)) {
            $serializer->serializeStruct(self::$SCHEMA_ANNOTATION_TABLE_CONFIGURATION_RESULT, $this->annotationTableConfigurationResult, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->destinationResult,
            1 => $this->journalTableConfigurationResult,
            2 => $this->inventoryTableConfigurationResult,
            3 => $this->annotationTableConfigurationResult,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->destinationResult,
            $this->journalTableConfigurationResult,
            $this->inventoryTableConfigurationResult,
            $this->annotationTableConfigurationResult
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
