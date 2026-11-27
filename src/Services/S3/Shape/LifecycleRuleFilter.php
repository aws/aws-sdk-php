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
 * The Filter is used to identify objects that a Lifecycle Rule applies to. A Filter can have exactly one of Prefix,
 * Tag, ObjectSizeGreaterThan, ObjectSizeLessThan, or And specified. If the Filter element is left empty, the Lifecycle
 * Rule applies to all objects in the bucket.
 */
final class LifecycleRuleFilter implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#LifecycleRuleFilter';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_TAG;
    private static Schema $SCHEMA_OBJECT_SIZE_GREATER_THAN;
    private static Schema $SCHEMA_OBJECT_SIZE_LESS_THAN;
    private static Schema $SCHEMA_AND;

    /**
     * @param ?string $prefix Prefix identifying one or more objects to which the rule applies. Replacement must be made for
     *        object keys containing special characters (such as carriage returns) when using XML requests. For more
     * information,
     *        see XML related object key constraints.
     * @param ?Tag $tag This tag must exist in the object's tag set in order for the rule to apply. This parameter applies
     *        to general purpose buckets only. It is not supported for directory bucket lifecycle configurations.
     * @param ?int $objectSizeGreaterThan Minimum object size to which the rule applies.
     * @param ?int $objectSizeLessThan Maximum object size to which the rule applies.
     */
    public function __construct(
        public readonly ?string $prefix = null,
        public readonly ?Tag $tag = null,
        public readonly ?int $objectSizeGreaterThan = null,
        public readonly ?int $objectSizeLessThan = null,
        public readonly ?LifecycleRuleAndOperator $and = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::lifecycleRuleFilter();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_PREFIX = $m[0];
        self::$SCHEMA_TAG = $m[1];
        self::$SCHEMA_OBJECT_SIZE_GREATER_THAN = $m[2];
        self::$SCHEMA_OBJECT_SIZE_LESS_THAN = $m[3];
        self::$SCHEMA_AND = $m[4];
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
        if (isset($this->tag)) {
            $serializer->serializeStruct(self::$SCHEMA_TAG, $this->tag, 1);
        }
        if (isset($this->objectSizeGreaterThan)) {
            $serializer->serializeInteger(self::$SCHEMA_OBJECT_SIZE_GREATER_THAN, $this->objectSizeGreaterThan, 2);
        }
        if (isset($this->objectSizeLessThan)) {
            $serializer->serializeInteger(self::$SCHEMA_OBJECT_SIZE_LESS_THAN, $this->objectSizeLessThan, 3);
        }
        if (isset($this->and)) {
            $serializer->serializeStruct(self::$SCHEMA_AND, $this->and, 4);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->prefix,
            1 => $this->tag,
            2 => $this->objectSizeGreaterThan,
            3 => $this->objectSizeLessThan,
            4 => $this->and,
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
            $this->tag,
            $this->objectSizeGreaterThan,
            $this->objectSizeLessThan,
            $this->and
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
