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
 * Contains the current state of the annotation table associated with a bucket's Amazon S3 Metadata configuration,
 * including its provisioning status and identifiers.
 */
final class AnnotationTableConfigurationResult implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#AnnotationTableConfigurationResult';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_CONFIGURATION_STATE;
    private static Schema $SCHEMA_TABLE_STATUS;
    private static Schema $SCHEMA_ERROR;
    private static Schema $SCHEMA_TABLE_NAME;
    private static Schema $SCHEMA_TABLE_ARN;
    private static Schema $SCHEMA_ROLE;

    public readonly ?AnnotationConfigurationState $configurationState;

    /**
     * @param ?AnnotationConfigurationState $configurationState The current configuration state of the annotation table.
     * @param ?string $tableStatus The provisioning status of the annotation table. Possible values: CREATING, BACKFILLING,
     *        ACTIVE, FAILED.
     * @param ?string $tableName The name of the annotation table.
     * @param ?string $tableArn The ARN of the annotation table.
     * @param ?string $role The ARN of the IAM role associated with the annotation table.
     */
    public function __construct(
        AnnotationConfigurationState|string|null $configurationState = null,
        public readonly ?string $tableStatus = null,
        public readonly ?ErrorDetails $error = null,
        public readonly ?string $tableName = null,
        public readonly ?string $tableArn = null,
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
        $s = Schemas::annotationTableConfigurationResult();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_CONFIGURATION_STATE = $m[0];
        self::$SCHEMA_TABLE_STATUS = $m[1];
        self::$SCHEMA_ERROR = $m[2];
        self::$SCHEMA_TABLE_NAME = $m[3];
        self::$SCHEMA_TABLE_ARN = $m[4];
        self::$SCHEMA_ROLE = $m[5];
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
        if (isset($this->role)) {
            $serializer->serializeString(self::$SCHEMA_ROLE, $this->role, 5);
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
            5 => $this->role,
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
            $this->tableArn,
            $this->role
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
