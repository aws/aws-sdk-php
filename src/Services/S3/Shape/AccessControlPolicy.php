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
 * Contains the elements that set the ACL permissions for an object per grantee.
 */
final class AccessControlPolicy implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#AccessControlPolicy';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_GRANTS;
    private static Schema $SCHEMA_OWNER;

    /**
     * @param list<\Aws\Services\S3\Shape\Grant>|null $grants
     * @param ?Owner $owner Container for the bucket owner's display name and ID.
     */
    public function __construct(
        public readonly ?array $grants = null,
        public readonly ?Owner $owner = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::accessControlPolicy();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_GRANTS = $m[0];
        self::$SCHEMA_OWNER = $m[1];
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
        if (isset($this->grants)) {
            $serializer->serializeList(self::$SCHEMA_GRANTS, $this->grants, 0);
        }
        if (isset($this->owner)) {
            $serializer->serializeStruct(self::$SCHEMA_OWNER, $this->owner, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->grants,
            1 => $this->owner,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->grants,
            $this->owner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
