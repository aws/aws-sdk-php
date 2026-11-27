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
 * The container element for Object Lock configuration parameters.
 */
final class ObjectLockConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ObjectLockConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_OBJECT_LOCK_ENABLED;
    private static Schema $SCHEMA_RULE;

    public readonly ?ObjectLockEnabled $objectLockEnabled;

    /**
     * @param ?ObjectLockEnabled $objectLockEnabled Indicates whether this bucket has an Object Lock configuration enabled.
     *        Enable ObjectLockEnabled when you apply ObjectLockConfiguration to a bucket.
     * @param ?ObjectLockRule $rule Specifies the Object Lock rule for the specified object. Enable the this rule when you
     *        apply ObjectLockConfiguration to a bucket. Bucket settings require both a mode and a period. The period can be
     * either
     *        Days or Years but you must select one. You cannot specify Days and Years at the same time.
     */
    public function __construct(
        ObjectLockEnabled|string|null $objectLockEnabled = null,
        public readonly ?ObjectLockRule $rule = null
    ) {
        $this->objectLockEnabled = $objectLockEnabled === null || $objectLockEnabled instanceof ObjectLockEnabled ? $objectLockEnabled : ObjectLockEnabled::fromValue($objectLockEnabled);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::objectLockConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_OBJECT_LOCK_ENABLED = $m[0];
        self::$SCHEMA_RULE = $m[1];
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
        if (isset($this->objectLockEnabled)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_ENABLED, $this->objectLockEnabled->value, 0);
        }
        if (isset($this->rule)) {
            $serializer->serializeStruct(self::$SCHEMA_RULE, $this->rule, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->objectLockEnabled,
            1 => $this->rule,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->objectLockEnabled,
            $this->rule
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
