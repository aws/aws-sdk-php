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
 * The V1 S3 Metadata configuration for a general purpose bucket. If you created your S3 Metadata configuration before
 * July 15, 2025, we recommend that you delete and re-create your configuration by using
 * CreateBucketMetadataConfiguration so that you can expire journal table records and create a live inventory table.
 */
final class MetadataTableConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#MetadataTableConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_S3_TABLES_DESTINATION;

    /**
     * @param ?S3TablesDestination $s3TablesDestination The destination information for the metadata table configuration.
     *        The destination table bucket must be in the same Region and Amazon Web Services account as the general purpose
     *        bucket. The specified metadata table name must be unique within the aws_s3_metadata namespace in the
     * destination
     *        table bucket.
     */
    public function __construct(
        public readonly ?S3TablesDestination $s3TablesDestination = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::metadataTableConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_S3_TABLES_DESTINATION = $m[0];
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
        if (isset($this->s3TablesDestination)) {
            $serializer->serializeStruct(self::$SCHEMA_S3_TABLES_DESTINATION, $this->s3TablesDestination, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->s3TablesDestination,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->s3TablesDestination
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
