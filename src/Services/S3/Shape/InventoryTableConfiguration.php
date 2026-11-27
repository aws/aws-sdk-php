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
final class InventoryTableConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#InventoryTableConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_CONFIGURATION_STATE;
    private static Schema $SCHEMA_ENCRYPTION_CONFIGURATION;

    public readonly ?InventoryConfigurationState $configurationState;

    /**
     * @param ?InventoryConfigurationState $configurationState The configuration state of the inventory table, indicating
     *        whether the inventory table is enabled or disabled.
     * @param ?MetadataTableEncryptionConfiguration $encryptionConfiguration The encryption configuration for the inventory
     *        table.
     */
    public function __construct(
        InventoryConfigurationState|string|null $configurationState = null,
        public readonly ?MetadataTableEncryptionConfiguration $encryptionConfiguration = null
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
        $s = Schemas::inventoryTableConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_CONFIGURATION_STATE = $m[0];
        self::$SCHEMA_ENCRYPTION_CONFIGURATION = $m[1];
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
        if (isset($this->encryptionConfiguration)) {
            $serializer->serializeStruct(self::$SCHEMA_ENCRYPTION_CONFIGURATION, $this->encryptionConfiguration, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->configurationState,
            1 => $this->encryptionConfiguration,
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
            $this->encryptionConfiguration
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
