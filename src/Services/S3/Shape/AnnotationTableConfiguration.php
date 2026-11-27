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
 * Specifies the configuration for the annotation table associated with a bucket's Amazon S3 Metadata configuration. The
 * annotation table is an Iceberg table that records annotation events for objects in the bucket.
 */
final class AnnotationTableConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#AnnotationTableConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_CONFIGURATION_STATE;
    private static Schema $SCHEMA_ENCRYPTION_CONFIGURATION;
    private static Schema $SCHEMA_ROLE;

    public readonly ?AnnotationConfigurationState $configurationState;

    /**
     * @param ?AnnotationConfigurationState $configurationState The state of the annotation table. Valid values are ENABLED
     *        and DISABLED.
     * @param ?string $role The ARN of the IAM role used to manage the annotation table.
     */
    public function __construct(
        AnnotationConfigurationState|string|null $configurationState = null,
        public readonly ?MetadataTableEncryptionConfiguration $encryptionConfiguration = null,
        public readonly ?string $role = null
    ) {
        $this->configurationState = $configurationState === null || $configurationState instanceof AnnotationConfigurationState ? $configurationState : AnnotationConfigurationState::fromValue($configurationState);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::annotationTableConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_CONFIGURATION_STATE = $m[0];
        self::$SCHEMA_ENCRYPTION_CONFIGURATION = $m[1];
        self::$SCHEMA_ROLE = $m[2];
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
        if (isset($this->role)) {
            $serializer->serializeString(self::$SCHEMA_ROLE, $this->role, 2);
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
            2 => $this->role,
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
            $this->encryptionConfiguration,
            $this->role
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
