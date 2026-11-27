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
 * Specifies updates to apply to the annotation table configuration. Used as the request body for
 * UpdateBucketMetadataAnnotationTableConfiguration.
 */
final class AnnotationTableConfigurationUpdates implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#AnnotationTableConfigurationUpdates';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_CONFIGURATION_STATE;
    private static Schema $SCHEMA_ENCRYPTION_CONFIGURATION;
    private static Schema $SCHEMA_ROLE;

    public readonly ?AnnotationConfigurationState $configurationState;

    /**
     * @param ?AnnotationConfigurationState $configurationState The new configuration state to apply.
     * @param ?string $role The new IAM role ARN to apply.
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
        $s = Schemas::annotationTableConfigurationUpdates();
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
