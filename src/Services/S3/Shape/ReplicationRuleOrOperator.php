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
 * A container for specifying one or more prefix or tag filters.
 */
final class ReplicationRuleOrOperator implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ReplicationRuleOrOperator';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_PREFIXES;
    private static Schema $SCHEMA_TAGS;

    /**
     * @param list<string>|null $prefixes
     * @param list<\Aws\Services\S3\Shape\Tag>|null $tags
     */
    public function __construct(
        public readonly ?array $prefixes = null,
        public readonly ?array $tags = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::replicationRuleOrOperator();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_PREFIXES = $m[0];
        self::$SCHEMA_TAGS = $m[1];
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
        if (isset($this->prefixes)) {
            $serializer->serializeList(self::$SCHEMA_PREFIXES, $this->prefixes, 0);
        }
        if (isset($this->tags)) {
            $serializer->serializeList(self::$SCHEMA_TAGS, $this->tags, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->prefixes,
            1 => $this->tags,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->prefixes,
            $this->tags
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
