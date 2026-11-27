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
 * A container for specifying a filter that excludes matching objects from the replication rule. Specify exactly one
 * Prefix, Tag, or Or child element.
 */
final class ReplicationRuleNotOperator implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ReplicationRuleNotOperator';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_TAG;
    private static Schema $SCHEMA_OR;

    /**
     * @param ?string $prefix An object key name prefix that identifies objects to exclude from the replication rule.
     * @param ?Tag $tag A tag key and value that identify objects to exclude from the replication rule.
     * @param ?ReplicationRuleOrOperator $or A container for specifying prefixes and tags. An object is excluded from the
     *        replication rule if it matches any of the specified filters.
     */
    public function __construct(
        public readonly ?string $prefix = null,
        public readonly ?Tag $tag = null,
        public readonly ?ReplicationRuleOrOperator $or = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::replicationRuleNotOperator();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_PREFIX = $m[0];
        self::$SCHEMA_TAG = $m[1];
        self::$SCHEMA_OR = $m[2];
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
        if (isset($this->or)) {
            $serializer->serializeStruct(self::$SCHEMA_OR, $this->or, 2);
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
            2 => $this->or,
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
            $this->or
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
