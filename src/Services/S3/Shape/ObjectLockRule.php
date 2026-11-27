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
 * The container element for an Object Lock rule.
 */
final class ObjectLockRule implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ObjectLockRule';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DEFAULT_RETENTION;

    /**
     * @param ?DefaultRetention $defaultRetention The default Object Lock retention settings for new objects in this bucket.
     *        You can specify: A default retention period, by using Days or Years. A default event hold duration, by using
     *        DefaultEventHold. This setting also uses days or years. You can set one or both. You cannot use days and years
     * in the
     *        same setting.
     */
    public function __construct(
        public readonly ?DefaultRetention $defaultRetention = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::objectLockRule();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DEFAULT_RETENTION = $m[0];
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
        if (isset($this->defaultRetention)) {
            $serializer->serializeStruct(self::$SCHEMA_DEFAULT_RETENTION, $this->defaultRetention, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->defaultRetention,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->defaultRetention
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
