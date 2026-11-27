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
 * A filter that identifies the subset of objects to which the replication rule applies. A Filter must specify exactly
 * one Prefix, Tag, And, or Not child element.
 */
final class ReplicationRuleFilter implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ReplicationRuleFilter';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_TAG;
    private static Schema $SCHEMA_AND;
    private static Schema $SCHEMA_NOT;

    /**
     * @param ?string $prefix An object key name prefix that identifies the subset of objects to which the rule applies.
     *        Replacement must be made for object keys containing special characters (such as carriage returns) when using
     * XML
     *        requests. For more information, see XML related object key constraints.
     * @param ?Tag $tag A container for specifying a tag key and value. The rule applies only to objects that have the tag
     *        in their tag set.
     * @param ?ReplicationRuleAndOperator $and A container for specifying rule filters. The filters determine the subset of
     *        objects to which the rule applies. This element is required only if you specify more than one filter. For
     * example: If
     *        you specify both a Prefix and a Tag filter, wrap these filters in an And tag. If you specify a filter based on
     *        multiple tags, wrap the Tag elements in an And tag.
     * @param ?ReplicationRuleNotOperator $not A container for specifying filters that exclude matching objects from the
     *        replication rule.
     */
    public function __construct(
        public readonly ?string $prefix = null,
        public readonly ?Tag $tag = null,
        public readonly ?ReplicationRuleAndOperator $and = null,
        public readonly ?ReplicationRuleNotOperator $not = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::replicationRuleFilter();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_PREFIX = $m[0];
        self::$SCHEMA_TAG = $m[1];
        self::$SCHEMA_AND = $m[2];
        self::$SCHEMA_NOT = $m[3];
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
        if (isset($this->and)) {
            $serializer->serializeStruct(self::$SCHEMA_AND, $this->and, 2);
        }
        if (isset($this->not)) {
            $serializer->serializeStruct(self::$SCHEMA_NOT, $this->not, 3);
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
            2 => $this->and,
            3 => $this->not,
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
            $this->and,
            $this->not
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
