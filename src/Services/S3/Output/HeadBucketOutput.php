<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\LocationType;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class HeadBucketOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#HeadBucketOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET_ARN;
    private static Schema $SCHEMA_BUCKET_LOCATION_TYPE;
    private static Schema $SCHEMA_BUCKET_LOCATION_NAME;
    private static Schema $SCHEMA_BUCKET_REGION;
    private static Schema $SCHEMA_ACCESS_POINT_ALIAS;

    public readonly ?LocationType $bucketLocationType;

    /**
     * @param ?string $bucketArn The Amazon Resource Name (ARN) of the S3 bucket. ARNs uniquely identify Amazon Web Services
     *        resources across all of Amazon Web Services. This parameter is only supported for S3 directory buckets. For
     * more
     *        information, see Using tags with directory buckets.
     * @param ?LocationType $bucketLocationType The type of location where the bucket is created. This functionality is only
     *        supported by directory buckets.
     * @param ?string $bucketLocationName The name of the location where the bucket will be created. For directory buckets,
     *        the Zone ID of the Availability Zone or the Local Zone where the bucket is created. An example Zone ID value
     * for an
     *        Availability Zone is usw2-az1. This functionality is only supported by directory buckets.
     * @param ?string $bucketRegion The Region that the bucket is located.
     * @param ?bool $accessPointAlias Indicates whether the bucket name used in the request is an access point alias. For
     *        directory buckets, the value of this field is false.
     */
    public function __construct(
        public readonly ?string $bucketArn = null,
        LocationType|string|null $bucketLocationType = null,
        public readonly ?string $bucketLocationName = null,
        public readonly ?string $bucketRegion = null,
        public readonly ?bool $accessPointAlias = null
    ) {
        $this->bucketLocationType = $bucketLocationType === null || $bucketLocationType instanceof LocationType ? $bucketLocationType : LocationType::fromValue($bucketLocationType);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::headBucketOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET_ARN = $m[0];
        self::$SCHEMA_BUCKET_LOCATION_TYPE = $m[1];
        self::$SCHEMA_BUCKET_LOCATION_NAME = $m[2];
        self::$SCHEMA_BUCKET_REGION = $m[3];
        self::$SCHEMA_ACCESS_POINT_ALIAS = $m[4];
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
        if (isset($this->bucketArn)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET_ARN, $this->bucketArn, 0);
        }
        if (isset($this->bucketLocationType)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET_LOCATION_TYPE, $this->bucketLocationType->value, 1);
        }
        if (isset($this->bucketLocationName)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET_LOCATION_NAME, $this->bucketLocationName, 2);
        }
        if (isset($this->bucketRegion)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET_REGION, $this->bucketRegion, 3);
        }
        if (isset($this->accessPointAlias)) {
            $serializer->serializeBoolean(self::$SCHEMA_ACCESS_POINT_ALIAS, $this->accessPointAlias, 4);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucketArn,
            1 => $this->bucketLocationType,
            2 => $this->bucketLocationName,
            3 => $this->bucketRegion,
            4 => $this->accessPointAlias,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->bucketArn,
            $this->bucketLocationType,
            $this->bucketLocationName,
            $this->bucketRegion,
            $this->accessPointAlias
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
