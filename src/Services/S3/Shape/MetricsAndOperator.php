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
 * A conjunction (logical AND) of predicates, which is used in evaluating a metrics filter. The operator must have at
 * least two predicates, and an object must match all of the predicates in order for the filter to apply.
 */
final class MetricsAndOperator implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#MetricsAndOperator';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_TAGS;
    private static Schema $SCHEMA_ACCESS_POINT_ARN;

    /**
     * @param ?string $prefix The prefix used when evaluating an AND predicate.
     * @param list<\Aws\Services\S3\Shape\Tag>|null $tags
     * @param ?string $accessPointArn The access point ARN used when evaluating an AND predicate.
     */
    public function __construct(
        public readonly ?string $prefix = null,
        public readonly ?array $tags = null,
        public readonly ?string $accessPointArn = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::metricsAndOperator();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_PREFIX = $m[0];
        self::$SCHEMA_TAGS = $m[1];
        self::$SCHEMA_ACCESS_POINT_ARN = $m[2];
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
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 0);
        }
        if (isset($this->tags)) {
            $serializer->serializeList(self::$SCHEMA_TAGS, $this->tags, 1);
        }
        if (isset($this->accessPointArn)) {
            $serializer->serializeString(self::$SCHEMA_ACCESS_POINT_ARN, $this->accessPointArn, 2);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->prefix,
            1 => $this->tags,
            2 => $this->accessPointArn,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->prefix,
            $this->tags,
            $this->accessPointArn
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
