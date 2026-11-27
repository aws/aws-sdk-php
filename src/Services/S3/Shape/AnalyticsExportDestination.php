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
 * Where to publish the analytics results.
 */
final class AnalyticsExportDestination implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#AnalyticsExportDestination';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_S3_BUCKET_DESTINATION;

    /**
     * @param ?AnalyticsS3BucketDestination $s3BucketDestination A destination signifying output to an S3 bucket.
     */
    public function __construct(
        public readonly ?AnalyticsS3BucketDestination $s3BucketDestination = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::analyticsExportDestination();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_S3_BUCKET_DESTINATION = $m[0];
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
        if (isset($this->s3BucketDestination)) {
            $serializer->serializeStruct(self::$SCHEMA_S3_BUCKET_DESTINATION, $this->s3BucketDestination, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->s3BucketDestination,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->s3BucketDestination
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
