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
 * A container for specifying rule filters. The filters determine the subset of objects to which the rule applies. This
 * element is required only if you specify more than one filter. For example: If you specify both a Prefix and a Tag
 * filter, wrap these filters in an And tag. If you specify a filter based on multiple tags, wrap the Tag elements in an
 * And tag.
 */
final class ReplicationRuleAndOperator implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ReplicationRuleAndOperator';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_TAGS;
    private static Schema $SCHEMA_NOT;

    /**
     * @param ?string $prefix An object key name prefix that identifies the subset of objects to which the rule applies.
     * @param list<\Aws\Services\S3\Shape\Tag>|null $tags
     * @param ?ReplicationRuleNotOperator $not A container for specifying filters that exclude matching objects from the
     *        replication rule.
     */
    public function __construct(
        public readonly ?string $prefix = null,
        public readonly ?array $tags = null,
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
        $s = Schemas::replicationRuleAndOperator();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_PREFIX = $m[0];
        self::$SCHEMA_TAGS = $m[1];
        self::$SCHEMA_NOT = $m[2];
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
        if (isset($this->not)) {
            $serializer->serializeStruct(self::$SCHEMA_NOT, $this->not, 2);
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
            2 => $this->not,
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
            $this->not
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
