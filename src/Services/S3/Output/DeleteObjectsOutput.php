<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\RequestCharged;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class DeleteObjectsOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#DeleteObjectsOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DELETED;
    private static Schema $SCHEMA_REQUEST_CHARGED;
    private static Schema $SCHEMA_ERRORS;

    public readonly ?RequestCharged $requestCharged;

    /**
     * @param list<\Aws\Services\S3\Shape\DeletedObject>|null $deleted
     * @param list<\Aws\Services\S3\Shape\Error>|null $errors
     */
    public function __construct(
        public readonly ?array $deleted = null,
        RequestCharged|string|null $requestCharged = null,
        public readonly ?array $errors = null
    ) {
        $this->requestCharged = $requestCharged === null || $requestCharged instanceof RequestCharged ? $requestCharged : RequestCharged::fromValue($requestCharged);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::deleteObjectsOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DELETED = $m[0];
        self::$SCHEMA_REQUEST_CHARGED = $m[1];
        self::$SCHEMA_ERRORS = $m[2];
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
        if (isset($this->deleted)) {
            $serializer->serializeList(self::$SCHEMA_DELETED, $this->deleted, 0);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 1);
        }
        if (isset($this->errors)) {
            $serializer->serializeList(self::$SCHEMA_ERRORS, $this->errors, 2);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->deleted,
            1 => $this->requestCharged,
            2 => $this->errors,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->deleted,
            $this->requestCharged,
            $this->errors
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
