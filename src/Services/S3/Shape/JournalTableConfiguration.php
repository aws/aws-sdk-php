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
 * The journal table configuration for an S3 Metadata configuration.
 */
final class JournalTableConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#JournalTableConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_RECORD_EXPIRATION;
    private static Schema $SCHEMA_ENCRYPTION_CONFIGURATION;

    /**
     * @param ?RecordExpiration $recordExpiration The journal table record expiration settings for the journal table.
     * @param ?MetadataTableEncryptionConfiguration $encryptionConfiguration The encryption configuration for the journal
     *        table.
     */
    public function __construct(
        public readonly ?RecordExpiration $recordExpiration = null,
        public readonly ?MetadataTableEncryptionConfiguration $encryptionConfiguration = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::journalTableConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_RECORD_EXPIRATION = $m[0];
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
        if (isset($this->recordExpiration)) {
            $serializer->serializeStruct(self::$SCHEMA_RECORD_EXPIRATION, $this->recordExpiration, 0);
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
            0 => $this->recordExpiration,
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
            $this->recordExpiration,
            $this->encryptionConfiguration
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
