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
 * The container element for an ownership control rule.
 */
final class OwnershipControlsRule implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#OwnershipControlsRule';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_OBJECT_OWNERSHIP;

    public readonly ?ObjectOwnership $objectOwnership;

    public function __construct(
        ObjectOwnership|string|null $objectOwnership = null
    ) {
        $this->objectOwnership = $objectOwnership === null || $objectOwnership instanceof ObjectOwnership ? $objectOwnership : ObjectOwnership::fromValue($objectOwnership);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::ownershipControlsRule();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_OBJECT_OWNERSHIP = $m[0];
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
        if (isset($this->objectOwnership)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_OWNERSHIP, $this->objectOwnership->value, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->objectOwnership,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->objectOwnership
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
