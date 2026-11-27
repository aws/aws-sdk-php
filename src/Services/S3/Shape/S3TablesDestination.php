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
 * The destination information for a V1 S3 Metadata configuration. The destination table bucket must be in the same
 * Region and Amazon Web Services account as the general purpose bucket. The specified metadata table name must be
 * unique within the aws_s3_metadata namespace in the destination table bucket. If you created your S3 Metadata
 * configuration before July 15, 2025, we recommend that you delete and re-create your configuration by using
 * CreateBucketMetadataConfiguration so that you can expire journal table records and create a live inventory table.
 */
final class S3TablesDestination implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#S3TablesDestination';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_TABLE_BUCKET_ARN;
    private static Schema $SCHEMA_TABLE_NAME;

    /**
     * @param ?string $tableBucketArn The Amazon Resource Name (ARN) for the table bucket that's specified as the
     *        destination in the metadata table configuration. The destination table bucket must be in the same Region and
     * Amazon
     *        Web Services account as the general purpose bucket.
     * @param ?string $tableName The name for the metadata table in your metadata table configuration. The specified
     *        metadata table name must be unique within the aws_s3_metadata namespace in the destination table bucket.
     */
    public function __construct(
        public readonly ?string $tableBucketArn = null,
        public readonly ?string $tableName = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::s3TablesDestination();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_TABLE_BUCKET_ARN = $m[0];
        self::$SCHEMA_TABLE_NAME = $m[1];
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
        if (isset($this->tableBucketArn)) {
            $serializer->serializeString(self::$SCHEMA_TABLE_BUCKET_ARN, $this->tableBucketArn, 0);
        }
        if (isset($this->tableName)) {
            $serializer->serializeString(self::$SCHEMA_TABLE_NAME, $this->tableName, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->tableBucketArn,
            1 => $this->tableName,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->tableBucketArn,
            $this->tableName
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
