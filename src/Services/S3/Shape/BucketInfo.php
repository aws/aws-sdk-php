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
 * Specifies the information about the bucket that will be created. For more information about directory buckets, see
 * Directory buckets in the Amazon S3 User Guide. This functionality is only supported by directory buckets.
 */
final class BucketInfo implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#BucketInfo';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DATA_REDUNDANCY;
    private static Schema $SCHEMA_TYPE;

    public readonly ?DataRedundancy $dataRedundancy;
    public readonly ?BucketType $type;

    /**
     * @param ?DataRedundancy $dataRedundancy The number of Zone (Availability Zone or Local Zone) that's used for
     *        redundancy for the bucket.
     * @param ?BucketType $type The type of bucket.
     */
    public function __construct(
        DataRedundancy|string|null $dataRedundancy = null,
        BucketType|string|null $type = null
    ) {
        $this->dataRedundancy = $dataRedundancy === null || $dataRedundancy instanceof DataRedundancy ? $dataRedundancy : DataRedundancy::fromValue($dataRedundancy);
        $this->type = $type === null || $type instanceof BucketType ? $type : BucketType::fromValue($type);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::bucketInfo();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DATA_REDUNDANCY = $m[0];
        self::$SCHEMA_TYPE = $m[1];
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
        if (isset($this->dataRedundancy)) {
            $serializer->serializeString(self::$SCHEMA_DATA_REDUNDANCY, $this->dataRedundancy->value, 0);
        }
        if (isset($this->type)) {
            $serializer->serializeString(self::$SCHEMA_TYPE, $this->type->value, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->dataRedundancy,
            1 => $this->type,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->dataRedundancy,
            $this->type
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
