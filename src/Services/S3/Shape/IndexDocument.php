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
 * Container for the Suffix element.
 */
final class IndexDocument implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#IndexDocument';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_SUFFIX;

    /**
     * @param ?string $suffix A suffix that is appended to a request that is for a directory on the website endpoint. (For
     *        example, if the suffix is index.html and you make a request to samplebucket/images/, the data that is returned
     * will
     *        be for the object with the key name images/index.html.) The suffix must not be empty and must not include a
     * slash
     *        character. Replacement must be made for object keys containing special characters (such as carriage returns)
     * when
     *        using XML requests. For more information, see XML related object key constraints.
     */
    public function __construct(
        public readonly ?string $suffix = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::indexDocument();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_SUFFIX = $m[0];
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
        if (isset($this->suffix)) {
            $serializer->serializeString(self::$SCHEMA_SUFFIX, $this->suffix, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->suffix,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->suffix
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
