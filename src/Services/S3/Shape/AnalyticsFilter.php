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
 * The filter used to describe a set of objects for analyses. A filter must have exactly one prefix, one tag, or one
 * conjunction (AnalyticsAndOperator). If no filter is provided, all objects will be considered in any analysis.
 */
abstract readonly class AnalyticsFilter implements UnionInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#AnalyticsFilter';

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
     * <p>The prefix to use when evaluating an analytics filter.</p>
     */
    public static function prefix(string $value): self
    {
        return new AnalyticsFilterPrefix($value);
    }

    /**
     * <p>The tag to use when evaluating an analytics filter.</p>
     */
    public static function tagValue(Tag $value): self
    {
        return new AnalyticsFilterTagValue($value);
    }

    /**
     * <p>A conjunction (logical AND) of predicates, which is used in evaluating an analytics filter. The
      operator
     * must have at least two predicates.</p>
     */
    public static function and(AnalyticsAndOperator $value): self
    {
        return new AnalyticsFilterAnd($value);
    }

    /**
     * Create an unknown variant for forward-compatibility.
     */
    public static function unknown(string $tag, mixed $value): self
    {
        return new AnalyticsFilterUnknown($tag, $value);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        return Schemas::analyticsFilter();
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
            'Prefix' => new AnalyticsFilterPrefix($value),
            'Tag' => new AnalyticsFilterTagValue($value instanceof Tag ? $value : ArrayShapeSerializer::fromArray(Tag::class, $value)),
            'And' => new AnalyticsFilterAnd($value instanceof AnalyticsAndOperator ? $value : ArrayShapeSerializer::fromArray(AnalyticsAndOperator::class, $value)),
            default => new AnalyticsFilterUnknown($tag, $value),
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
            0 => new AnalyticsFilterPrefix($value),
            1 => new AnalyticsFilterTagValue($value instanceof Tag ? $value : ArrayShapeSerializer::fromArray(Tag::class, $value)),
            2 => new AnalyticsFilterAnd($value instanceof AnalyticsAndOperator ? $value : ArrayShapeSerializer::fromArray(AnalyticsAndOperator::class, $value)),
            default => throw new \InvalidArgumentException('Unknown AnalyticsFilter variant index: ' . $index),
        };
    }
}
