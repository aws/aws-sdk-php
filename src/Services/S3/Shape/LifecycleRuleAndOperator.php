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
 * This is used in a Lifecycle Rule Filter to apply a logical AND to two or more predicates. The Lifecycle Rule will
 * apply to any object matching all of the predicates configured inside the And operator.
 */
final class LifecycleRuleAndOperator implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#LifecycleRuleAndOperator';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_TAGS;
    private static Schema $SCHEMA_OBJECT_SIZE_GREATER_THAN;
    private static Schema $SCHEMA_OBJECT_SIZE_LESS_THAN;

    /**
     * @param ?string $prefix Prefix identifying one or more objects to which the rule applies.
     * @param list<\Aws\Services\S3\Shape\Tag>|null $tags
     * @param ?int $objectSizeGreaterThan Minimum object size to which the rule applies.
     * @param ?int $objectSizeLessThan Maximum object size to which the rule applies.
     */
    public function __construct(
        public readonly ?string $prefix = null,
        public readonly ?array $tags = null,
        public readonly ?int $objectSizeGreaterThan = null,
        public readonly ?int $objectSizeLessThan = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::lifecycleRuleAndOperator();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_PREFIX = $m[0];
        self::$SCHEMA_TAGS = $m[1];
        self::$SCHEMA_OBJECT_SIZE_GREATER_THAN = $m[2];
        self::$SCHEMA_OBJECT_SIZE_LESS_THAN = $m[3];
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
        if (isset($this->objectSizeGreaterThan)) {
            $serializer->serializeInteger(self::$SCHEMA_OBJECT_SIZE_GREATER_THAN, $this->objectSizeGreaterThan, 2);
        }
        if (isset($this->objectSizeLessThan)) {
            $serializer->serializeInteger(self::$SCHEMA_OBJECT_SIZE_LESS_THAN, $this->objectSizeLessThan, 3);
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
            2 => $this->objectSizeGreaterThan,
            3 => $this->objectSizeLessThan,
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
            $this->objectSizeGreaterThan,
            $this->objectSizeLessThan
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
