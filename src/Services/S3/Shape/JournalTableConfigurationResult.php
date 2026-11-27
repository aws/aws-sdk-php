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
 * The journal table configuration for the S3 Metadata configuration.
 */
final class JournalTableConfigurationResult implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#JournalTableConfigurationResult';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_TABLE_STATUS;
    private static Schema $SCHEMA_TABLE_NAME;
    private static Schema $SCHEMA_RECORD_EXPIRATION;
    private static Schema $SCHEMA_ERROR;
    private static Schema $SCHEMA_TABLE_ARN;

    /**
     * @param ?string $tableStatus The status of the journal table. The status values are: CREATING - The journal table is
     *        in the process of being created in the specified table bucket. ACTIVE - The journal table has been created
     *        successfully, and records are being delivered to the table. FAILED - Amazon S3 is unable to create the journal
     * table,
     *        or Amazon S3 is unable to deliver records.
     * @param ?string $tableName The name of the journal table.
     * @param ?RecordExpiration $recordExpiration The journal table record expiration settings for the journal table.
     * @param ?string $tableArn The Amazon Resource Name (ARN) for the journal table.
     */
    public function __construct(
        public readonly ?string $tableStatus = null,
        public readonly ?string $tableName = null,
        public readonly ?RecordExpiration $recordExpiration = null,
        public readonly ?ErrorDetails $error = null,
        public readonly ?string $tableArn = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::journalTableConfigurationResult();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_TABLE_STATUS = $m[0];
        self::$SCHEMA_TABLE_NAME = $m[1];
        self::$SCHEMA_RECORD_EXPIRATION = $m[2];
        self::$SCHEMA_ERROR = $m[3];
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
        if (isset($this->tableStatus)) {
            $serializer->serializeString(self::$SCHEMA_TABLE_STATUS, $this->tableStatus, 0);
        }
        if (isset($this->tableName)) {
            $serializer->serializeString(self::$SCHEMA_TABLE_NAME, $this->tableName, 1);
        }
        if (isset($this->recordExpiration)) {
            $serializer->serializeStruct(self::$SCHEMA_RECORD_EXPIRATION, $this->recordExpiration, 2);
        }
        if (isset($this->error)) {
            $serializer->serializeStruct(self::$SCHEMA_ERROR, $this->error, 3);
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
            0 => $this->tableStatus,
            1 => $this->tableName,
            2 => $this->recordExpiration,
            3 => $this->error,
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
            $this->tableStatus,
            $this->tableName,
            $this->recordExpiration,
            $this->error,
            $this->tableArn
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
