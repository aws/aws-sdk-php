<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\BucketLocationConstraint;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class GetBucketLocationOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#GetBucketLocationOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_LOCATION_CONSTRAINT;

    public readonly ?BucketLocationConstraint $locationConstraint;

    /**
     * @param ?BucketLocationConstraint $locationConstraint Specifies the Region where the bucket resides. For a list of all
     *        the Amazon S3 supported location constraints by Region, see Regions and Endpoints. Buckets in Region us-east-1
     * have a
     *        LocationConstraint of null. Buckets with a LocationConstraint of EU reside in eu-west-1.
     */
    public function __construct(
        BucketLocationConstraint|string|null $locationConstraint = null
    ) {
        $this->locationConstraint = $locationConstraint === null || $locationConstraint instanceof BucketLocationConstraint ? $locationConstraint : BucketLocationConstraint::fromValue($locationConstraint);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::getBucketLocationOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_LOCATION_CONSTRAINT = $m[0];
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
        if (isset($this->locationConstraint)) {
            $serializer->serializeString(self::$SCHEMA_LOCATION_CONSTRAINT, $this->locationConstraint->value, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->locationConstraint,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->locationConstraint
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
