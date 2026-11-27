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
final class GetBucketMetadataTableConfigurationResult implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#GetBucketMetadataTableConfigurationResult';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_METADATA_TABLE_CONFIGURATION_RESULT;
    private static Schema $SCHEMA_STATUS;
    private static Schema $SCHEMA_ERROR;

    /**
     * @param ?MetadataTableConfigurationResult $metadataTableConfigurationResult The V1 S3 Metadata configuration for a
     *        general purpose bucket.
     * @param ?string $status The status of the metadata table. The status values are: CREATING - The metadata table is in
     *        the process of being created in the specified table bucket. ACTIVE - The metadata table has been created
     *        successfully, and records are being delivered to the table. FAILED - Amazon S3 is unable to create the
     * metadata
     *        table, or Amazon S3 is unable to deliver records. See ErrorDetails for details.
     * @param ?ErrorDetails $error If the CreateBucketMetadataTableConfiguration request succeeds, but S3 Metadata was
     *        unable to create the table, this structure contains the error code and error message.
     */
    public function __construct(
        public readonly ?MetadataTableConfigurationResult $metadataTableConfigurationResult = null,
        public readonly ?string $status = null,
        public readonly ?ErrorDetails $error = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::getBucketMetadataTableConfigurationResult();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_METADATA_TABLE_CONFIGURATION_RESULT = $m[0];
        self::$SCHEMA_STATUS = $m[1];
        self::$SCHEMA_ERROR = $m[2];
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
        if (isset($this->metadataTableConfigurationResult)) {
            $serializer->serializeStruct(self::$SCHEMA_METADATA_TABLE_CONFIGURATION_RESULT, $this->metadataTableConfigurationResult, 0);
        }
        if (isset($this->status)) {
            $serializer->serializeString(self::$SCHEMA_STATUS, $this->status, 1);
        }
        if (isset($this->error)) {
            $serializer->serializeStruct(self::$SCHEMA_ERROR, $this->error, 2);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->metadataTableConfigurationResult,
            1 => $this->status,
            2 => $this->error,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->metadataTableConfigurationResult,
            $this->status,
            $this->error
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
