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
 * Specifies a metrics configuration for the CloudWatch request metrics (specified by the metrics configuration ID) from
 * an Amazon S3 bucket. If you're updating an existing metrics configuration, note that this is a full replacement of
 * the existing metrics configuration. If you don't include the elements you want to keep, they are erased. For more
 * information, see PutBucketMetricsConfiguration.
 */
final class MetricsConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#MetricsConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ID;
    private static Schema $SCHEMA_FILTER;

    /**
     * @param ?string $id The ID used to identify the metrics configuration. The ID has a 64 character limit and can only
     *        contain letters, numbers, periods, dashes, and underscores.
     * @param ?MetricsFilter $filter Specifies a metrics configuration filter. The metrics configuration will only include
     *        objects that meet the filter's criteria. A filter must be a prefix, an object tag, an access point ARN, or a
     *        conjunction (MetricsAndOperator). Metrics configurations for directory buckets do not support tag filters.
     */
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?MetricsFilter $filter = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::metricsConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ID = $m[0];
        self::$SCHEMA_FILTER = $m[1];
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
        if (isset($this->id)) {
            $serializer->serializeString(self::$SCHEMA_ID, $this->id, 0);
        }
        if (isset($this->filter)) {
            $serializer->serializeUnion(self::$SCHEMA_FILTER, $this->filter, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->id,
            1 => $this->filter,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->id,
            $this->filter
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
