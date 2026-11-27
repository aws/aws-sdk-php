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
 * The Filter is used to identify objects that the S3 Intelligent-Tiering configuration applies to.
 */
final class IntelligentTieringFilter implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#IntelligentTieringFilter';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_TAG;
    private static Schema $SCHEMA_AND;

    /**
     * @param ?string $prefix An object key name prefix that identifies the subset of objects to which the rule applies.
     *        Replacement must be made for object keys containing special characters (such as carriage returns) when using
     * XML
     *        requests. For more information, see XML related object key constraints.
     * @param ?IntelligentTieringAndOperator $and A conjunction (logical AND) of predicates, which is used in evaluating a
     *        metrics filter. The operator must have at least two predicates, and an object must match all of the predicates
     * in
     *        order for the filter to apply.
     */
    public function __construct(
        public readonly ?string $prefix = null,
        public readonly ?Tag $tag = null,
        public readonly ?IntelligentTieringAndOperator $and = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::intelligentTieringFilter();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_PREFIX = $m[0];
        self::$SCHEMA_TAG = $m[1];
        self::$SCHEMA_AND = $m[2];
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
            $this->and
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
