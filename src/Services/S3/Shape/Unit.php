<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ShapeType;

/**
 * The Unit type represents an empty input/output shape.
 */
final class Unit implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    /** @var Schema|null */
    private static ?Schema $__schema = null;

    public function __construct() {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        return self::$__schema ??= new Schema(
            id: 'smithy.api#Unit',
            type: ShapeType::Structure,
            members: []
        );
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
    public function serializeMembers(ShapeSerializerInterface $serializer): void {}

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return null;
    }
}
