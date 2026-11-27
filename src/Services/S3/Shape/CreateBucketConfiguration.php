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
 * The configuration information for the bucket.
 */
final class CreateBucketConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CreateBucketConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_LOCATION_CONSTRAINT;
    private static Schema $SCHEMA_LOCATION;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_TAGS;

    public readonly ?BucketLocationConstraint $locationConstraint;

    /**
     * @param ?BucketLocationConstraint $locationConstraint Specifies the Region where the bucket will be created. You might
     *        choose a Region to optimize latency, minimize costs, or address regulatory requirements. For example, if you
     * reside
     *        in Europe, you will probably find it advantageous to create buckets in the Europe (Ireland) Region. If you
     * don't
     *        specify a Region, the bucket is created in the US East (N. Virginia) Region (us-east-1) by default.
     * Configurations
     *        using the value EU will create a bucket in eu-west-1. For a list of the valid values for all of the Amazon Web
     *        Services Regions, see Regions and Endpoints. This functionality is not supported for directory buckets.
     * @param ?LocationInfo $location Specifies the location where the bucket will be created. Directory buckets - The
     *        location type is Availability Zone or Local Zone. To use the Local Zone location type, your account must be
     * enabled
     *        for Local Zones. Otherwise, you get an HTTP 403 Forbidden error with the error code AccessDenied. To learn
     * more, see
     *        Enable accounts for Local Zones in the Amazon S3 User Guide. This functionality is only supported by directory
     *        buckets.
     * @param ?BucketInfo $bucket Specifies the information about the bucket that will be created. This functionality is
     *        only supported by directory buckets.
     * @param list<\Aws\Services\S3\Shape\Tag>|null $tags
     */
    public function __construct(
        BucketLocationConstraint|string|null $locationConstraint = null,
        public readonly ?LocationInfo $location = null,
        public readonly ?BucketInfo $bucket = null,
        public readonly ?array $tags = null
    ) {
        $this->locationConstraint = $locationConstraint === null || $locationConstraint instanceof BucketLocationConstraint ? $locationConstraint : BucketLocationConstraint::fromValue($locationConstraint);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::createBucketConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_LOCATION_CONSTRAINT = $m[0];
        self::$SCHEMA_LOCATION = $m[1];
        self::$SCHEMA_BUCKET = $m[2];
        self::$SCHEMA_TAGS = $m[3];
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
        if (isset($this->locationConstraint)) {
            $serializer->serializeString(self::$SCHEMA_LOCATION_CONSTRAINT, $this->locationConstraint->value, 0);
        }
        if (isset($this->location)) {
            $serializer->serializeStruct(self::$SCHEMA_LOCATION, $this->location, 1);
        }
        if (isset($this->bucket)) {
            $serializer->serializeStruct(self::$SCHEMA_BUCKET, $this->bucket, 2);
        }
        if (isset($this->tags)) {
            $serializer->serializeList(self::$SCHEMA_TAGS, $this->tags, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->locationConstraint,
            1 => $this->location,
            2 => $this->bucket,
            3 => $this->tags,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->locationConstraint,
            $this->location,
            $this->bucket,
            $this->tags
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
