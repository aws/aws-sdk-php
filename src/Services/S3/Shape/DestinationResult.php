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
 * The destination information for the S3 Metadata configuration.
 */
final class DestinationResult implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#DestinationResult';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_TABLE_BUCKET_TYPE;
    private static Schema $SCHEMA_TABLE_BUCKET_ARN;
    private static Schema $SCHEMA_TABLE_NAMESPACE;

    public readonly ?S3TablesBucketType $tableBucketType;

    /**
     * @param ?S3TablesBucketType $tableBucketType The type of the table bucket where the metadata configuration is stored.
     *        The aws value indicates an Amazon Web Services managed table bucket, and the customer value indicates a
     *        customer-managed table bucket. V2 metadata configurations are stored in Amazon Web Services managed table
     * buckets,
     *        and V1 metadata configurations are stored in customer-managed table buckets.
     * @param ?string $tableBucketArn The Amazon Resource Name (ARN) of the table bucket where the metadata configuration is
     *        stored.
     * @param ?string $tableNamespace The namespace in the table bucket where the metadata tables for a metadata
     *        configuration are stored.
     */
    public function __construct(
        S3TablesBucketType|string|null $tableBucketType = null,
        public readonly ?string $tableBucketArn = null,
        public readonly ?string $tableNamespace = null
    ) {
        $this->tableBucketType = $tableBucketType === null || $tableBucketType instanceof S3TablesBucketType ? $tableBucketType : S3TablesBucketType::fromValue($tableBucketType);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::destinationResult();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_TABLE_BUCKET_TYPE = $m[0];
        self::$SCHEMA_TABLE_BUCKET_ARN = $m[1];
        self::$SCHEMA_TABLE_NAMESPACE = $m[2];
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
        if (isset($this->tableBucketType)) {
            $serializer->serializeString(self::$SCHEMA_TABLE_BUCKET_TYPE, $this->tableBucketType->value, 0);
        }
        if (isset($this->tableBucketArn)) {
            $serializer->serializeString(self::$SCHEMA_TABLE_BUCKET_ARN, $this->tableBucketArn, 1);
        }
        if (isset($this->tableNamespace)) {
            $serializer->serializeString(self::$SCHEMA_TABLE_NAMESPACE, $this->tableNamespace, 2);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->tableBucketType,
            1 => $this->tableBucketArn,
            2 => $this->tableNamespace,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->tableBucketType,
            $this->tableBucketArn,
            $this->tableNamespace
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
