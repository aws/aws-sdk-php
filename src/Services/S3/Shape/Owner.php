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
 * Container for the owner's display name and ID.
 */
final class Owner implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Owner';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DISPLAY_NAME;
    private static Schema $SCHEMA_ID;

    /**
     * @param ?string $displayName 
     * @param ?string $iD Container for the ID of the owner.
     */
    public function __construct(
        public readonly ?string $displayName = null,
        public readonly ?string $iD = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::owner();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DISPLAY_NAME = $m[0];
        self::$SCHEMA_ID = $m[1];
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
        if (isset($this->displayName)) {
            $serializer->serializeString(self::$SCHEMA_DISPLAY_NAME, $this->displayName, 0);
        }
        if (isset($this->iD)) {
            $serializer->serializeString(self::$SCHEMA_ID, $this->iD, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->displayName,
            1 => $this->iD,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->displayName,
            $this->iD
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
