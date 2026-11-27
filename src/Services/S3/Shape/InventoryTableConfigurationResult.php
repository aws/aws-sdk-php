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
 * The inventory table configuration for an S3 Metadata configuration.
 */
final class InventoryTableConfigurationResult implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#InventoryTableConfigurationResult';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_CONFIGURATION_STATE;
    private static Schema $SCHEMA_TABLE_STATUS;
    private static Schema $SCHEMA_ERROR;
    private static Schema $SCHEMA_TABLE_NAME;
    private static Schema $SCHEMA_TABLE_ARN;

    public readonly ?InventoryConfigurationState $configurationState;

    /**
     * @param ?InventoryConfigurationState $configurationState The configuration state of the inventory table, indicating
     *        whether the inventory table is enabled or disabled.
     * @param ?string $tableStatus The status of the inventory table. The status values are: CREATING - The inventory table
     *        is in the process of being created in the specified Amazon Web Services managed table bucket. BACKFILLING -
     * The
     *        inventory table is in the process of being backfilled. When you enable the inventory table for your metadata
     *        configuration, the table goes through a process known as backfilling, during which Amazon S3 scans your
     * general
     *        purpose bucket to retrieve the initial metadata for all objects in the bucket. Depending on the number of
     * objects in
     *        your bucket, this process can take several hours. When the backfilling process is finished, the status of your
     *        inventory table changes from BACKFILLING to ACTIVE. After backfilling is completed, updates to your objects
     * are
     *        reflected in the inventory table within one hour. ACTIVE - The inventory table has been created successfully,
     * and
     *        records are being delivered to the table. FAILED - Amazon S3 is unable to create the inventory table, or
     * Amazon S3 is
     *        unable to deliver records.
     * @param ?string $tableName The name of the inventory table.
     * @param ?string $tableArn The Amazon Resource Name (ARN) for the inventory table.
     */
    public function __construct(
        InventoryConfigurationState|string|null $configurationState = null,
        public readonly ?string $tableStatus = null,
        public readonly ?ErrorDetails $error = null,
        public readonly ?string $tableName = null,
        public readonly ?string $tableArn = null
    ) {
        $this->configurationState = $configurationState === null || $configurationState instanceof InventoryConfigurationState ? $configurationState : InventoryConfigurationState::fromValue($configurationState);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::inventoryTableConfigurationResult();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_CONFIGURATION_STATE = $m[0];
        self::$SCHEMA_TABLE_STATUS = $m[1];
        self::$SCHEMA_ERROR = $m[2];
        self::$SCHEMA_TABLE_NAME = $m[3];
        self::$SCHEMA_TABLE_ARN = $m[4];
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
        if (isset($this->configurationState)) {
            $serializer->serializeString(self::$SCHEMA_CONFIGURATION_STATE, $this->configurationState->value, 0);
        }
        if (isset($this->tableStatus)) {
            $serializer->serializeString(self::$SCHEMA_TABLE_STATUS, $this->tableStatus, 1);
        }
        if (isset($this->error)) {
            $serializer->serializeStruct(self::$SCHEMA_ERROR, $this->error, 2);
        }
        if (isset($this->tableName)) {
            $serializer->serializeString(self::$SCHEMA_TABLE_NAME, $this->tableName, 3);
        }
        if (isset($this->tableArn)) {
            $serializer->serializeString(self::$SCHEMA_TABLE_ARN, $this->tableArn, 4);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->configurationState,
            1 => $this->tableStatus,
            2 => $this->error,
            3 => $this->tableName,
            4 => $this->tableArn,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->configurationState,
            $this->tableStatus,
            $this->error,
            $this->tableName,
            $this->tableArn
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
