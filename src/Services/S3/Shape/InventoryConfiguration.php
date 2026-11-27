<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

/**
 * Specifies the S3 Inventory configuration for an Amazon S3 bucket. For more information, see GET Bucket inventory in
 * the Amazon S3 API Reference.
 */
final class InventoryConfiguration implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#InventoryConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DESTINATION;
    private static Schema $SCHEMA_IS_ENABLED;
    private static Schema $SCHEMA_ID;
    private static Schema $SCHEMA_INCLUDED_OBJECT_VERSIONS;
    private static Schema $SCHEMA_SCHEDULE;
    private static Schema $SCHEMA_FILTER;
    private static Schema $SCHEMA_OPTIONAL_FIELDS;

    public readonly ?InventoryIncludedObjectVersions $includedObjectVersions;

    /**
     * @param ?InventoryDestination $destination Contains information about where to publish the inventory results.
     * @param ?bool $isEnabled Specifies whether the inventory is enabled or disabled. If set to True, an inventory list is
     *        generated. If set to False, no inventory list is generated.
     * @param ?string $id The ID used to identify the inventory configuration.
     * @param ?InventoryIncludedObjectVersions $includedObjectVersions Object versions to include in the inventory list. If
     *        set to All, the list includes all the object versions, which adds the version-related fields VersionId,
     * IsLatest, and
     *        DeleteMarker to the list. If set to Current, the list does not contain these version-related fields.
     * @param ?InventorySchedule $schedule Specifies the schedule for generating inventory results.
     * @param ?InventoryFilter $filter Specifies an inventory filter. The inventory only includes objects that meet the
     *        filter's criteria.
     * @param list<\Aws\Services\S3\Shape\InventoryOptionalField>|null $optionalFields
     */
    public function __construct(
        public readonly ?InventoryDestination $destination = null,
        public readonly ?bool $isEnabled = null,
        public readonly ?string $id = null,
        InventoryIncludedObjectVersions|string|null $includedObjectVersions = null,
        public readonly ?InventorySchedule $schedule = null,
        public readonly ?InventoryFilter $filter = null,
        public readonly ?array $optionalFields = null
    ) {
        $this->includedObjectVersions = $includedObjectVersions === null || $includedObjectVersions instanceof InventoryIncludedObjectVersions ? $includedObjectVersions : InventoryIncludedObjectVersions::fromValue($includedObjectVersions);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::inventoryConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DESTINATION = $m[0];
        self::$SCHEMA_IS_ENABLED = $m[1];
        self::$SCHEMA_ID = $m[2];
        self::$SCHEMA_INCLUDED_OBJECT_VERSIONS = $m[3];
        self::$SCHEMA_SCHEDULE = $m[4];
        self::$SCHEMA_FILTER = $m[5];
        self::$SCHEMA_OPTIONAL_FIELDS = $m[6];
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
        if (isset($this->destination)) {
            $serializer->serializeStruct(self::$SCHEMA_DESTINATION, $this->destination, 0);
        }
        if (isset($this->isEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_IS_ENABLED, $this->isEnabled, 1);
        }
        if (isset($this->id)) {
            $serializer->serializeString(self::$SCHEMA_ID, $this->id, 2);
        }
        if (isset($this->includedObjectVersions)) {
            $serializer->serializeString(self::$SCHEMA_INCLUDED_OBJECT_VERSIONS, $this->includedObjectVersions->value, 3);
        }
        if (isset($this->schedule)) {
            $serializer->serializeStruct(self::$SCHEMA_SCHEDULE, $this->schedule, 4);
        }
        if (isset($this->filter)) {
            $serializer->serializeStruct(self::$SCHEMA_FILTER, $this->filter, 5);
        }
        if (isset($this->optionalFields)) {
            $serializer->serializeList(self::$SCHEMA_OPTIONAL_FIELDS, $this->optionalFields, 6);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->destination,
            1 => $this->isEnabled,
            2 => $this->id,
            3 => $this->includedObjectVersions,
            4 => $this->schedule,
            5 => $this->filter,
            6 => $this->optionalFields,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->destination,
            $this->isEnabled,
            $this->id,
            $this->includedObjectVersions,
            $this->schedule,
            $this->filter,
            $this->optionalFields
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
