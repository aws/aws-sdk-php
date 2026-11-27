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
 * Container for the person being granted permissions.
 */
final class Grantee implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Grantee';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_TYPE;
    private static Schema $SCHEMA_DISPLAY_NAME;
    private static Schema $SCHEMA_EMAIL_ADDRESS;
    private static Schema $SCHEMA_ID;
    private static Schema $SCHEMA_URI;

    public readonly ?Type $type;

    /**
     * @param ?Type $type Type of grantee
     * @param ?string $displayName 
     * @param ?string $emailAddress 
     * @param ?string $iD The canonical user ID of the grantee.
     * @param ?string $uRI URI of the grantee group.
     */
    public function __construct(
        Type|string|null $type = null,
        public readonly ?string $displayName = null,
        public readonly ?string $emailAddress = null,
        public readonly ?string $iD = null,
        public readonly ?string $uRI = null
    ) {
        $this->type = $type === null || $type instanceof Type ? $type : Type::fromValue($type);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::grantee();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_TYPE = $m[0];
        self::$SCHEMA_DISPLAY_NAME = $m[1];
        self::$SCHEMA_EMAIL_ADDRESS = $m[2];
        self::$SCHEMA_ID = $m[3];
        self::$SCHEMA_URI = $m[4];
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
        if (isset($this->type)) {
            $serializer->serializeString(self::$SCHEMA_TYPE, $this->type->value, 0);
        }
        if (isset($this->displayName)) {
            $serializer->serializeString(self::$SCHEMA_DISPLAY_NAME, $this->displayName, 1);
        }
        if (isset($this->emailAddress)) {
            $serializer->serializeString(self::$SCHEMA_EMAIL_ADDRESS, $this->emailAddress, 2);
        }
        if (isset($this->iD)) {
            $serializer->serializeString(self::$SCHEMA_ID, $this->iD, 3);
        }
        if (isset($this->uRI)) {
            $serializer->serializeString(self::$SCHEMA_URI, $this->uRI, 4);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->type,
            1 => $this->displayName,
            2 => $this->emailAddress,
            3 => $this->iD,
            4 => $this->uRI,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->type,
            $this->displayName,
            $this->emailAddress,
            $this->iD,
            $this->uRI
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
