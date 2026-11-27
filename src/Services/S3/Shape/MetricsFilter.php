<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ShapeType;
use Smithy\Core\Shape\UnionInterface;
use Smithy\Core\Shape\Utils\ArrayShapeSerializer;

/**
 * Specifies a metrics configuration filter. The metrics configuration only includes objects that meet the filter's
 * criteria. A filter must be a prefix, an object tag, an access point ARN, or a conjunction (MetricsAndOperator). For
 * more information, see PutBucketMetricsConfiguration.
 */
abstract readonly class MetricsFilter implements UnionInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#MetricsFilter';

    abstract public function getMemberIndex(): int;

    abstract public function tag(): string;

    abstract public function value(): mixed;

    /**
     * Serialize the shape to the desired wire format.
     *
     * @return void
     */
    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeUnion(self::schema(), $this, $idx);
    }

    /**
     * <p>The prefix used when evaluating a metrics filter.</p>
     */
    public static function prefix(string $value): self
    {
        return new MetricsFilterPrefix($value);
    }

    /**
     * <p>The tag used when evaluating a metrics filter.</p>
         <note>
            <p>
               <code>Tag</code>
     * filters are not supported for directory buckets.</p>
         </note>
     */
    public static function tagValue(Tag $value): self
    {
        return new MetricsFilterTagValue($value);
    }

    /**
     * <p>The access point ARN used when evaluating a metrics filter.</p>
     */
    public static function accessPointArn(string $value): self
    {
        return new MetricsFilterAccessPointArn($value);
    }

    /**
     * <p>A conjunction (logical AND) of predicates, which is used in evaluating a metrics filter. The
      operator must
     * have at least two predicates, and an object must match all of the predicates in order for
      the filter to
     * apply.</p>
     */
    public static function and(MetricsAndOperator $value): self
    {
        return new MetricsFilterAnd($value);
    }

    /**
     * Create an unknown variant for forward-compatibility.
     */
    public static function unknown(string $tag, mixed $value): self
    {
        return new MetricsFilterUnknown($tag, $value);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        return Schemas::metricsFilter();
    }

    /**
     * Get the shape schema for this instance.
     */
    public function getSchema(): Schema
    {
        return self::schema();
    }


    /**
     * Create a union variant from a tag and value.
     *
     * @param string $tag The variant name
     * @param mixed $value The variant value
     * @return self
     */
    public static function create(string $tag, mixed $value): self
    {
        return match ($tag) {
            'Prefix' => new MetricsFilterPrefix($value),
            'Tag' => new MetricsFilterTagValue($value instanceof Tag ? $value : ArrayShapeSerializer::fromArray(Tag::class, $value)),
            'AccessPointArn' => new MetricsFilterAccessPointArn($value),
            'And' => new MetricsFilterAnd($value instanceof MetricsAndOperator ? $value : ArrayShapeSerializer::fromArray(MetricsAndOperator::class, $value)),
            default => new MetricsFilterUnknown($tag, $value),
        };
    }

    /**
     * Create a known union variant from its schema member index.
     *
     * @param int $index The variant member index
     * @param mixed $value The variant value
     * @return self
     */
    public static function createByIndex(int $index, mixed $value): self
    {
        return match ($index) {
            0 => new MetricsFilterPrefix($value),
            1 => new MetricsFilterTagValue($value instanceof Tag ? $value : ArrayShapeSerializer::fromArray(Tag::class, $value)),
            2 => new MetricsFilterAccessPointArn($value),
            3 => new MetricsFilterAnd($value instanceof MetricsAndOperator ? $value : ArrayShapeSerializer::fromArray(MetricsAndOperator::class, $value)),
            default => throw new \InvalidArgumentException('Unknown MetricsFilter variant index: ' . $index),
        };
    }
}
