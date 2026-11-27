<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\TransitionDefaultMinimumObjectSize;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class PutBucketLifecycleConfigurationOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PutBucketLifecycleConfigurationOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_TRANSITION_DEFAULT_MINIMUM_OBJECT_SIZE;

    public readonly ?TransitionDefaultMinimumObjectSize $transitionDefaultMinimumObjectSize;

    /**
     * @param ?TransitionDefaultMinimumObjectSize $transitionDefaultMinimumObjectSize Indicates which default minimum object
     *        size behavior is applied to the lifecycle configuration. This parameter applies to general purpose buckets
     * only. It
     *        is not supported for directory bucket lifecycle configurations. all_storage_classes_128K - Objects smaller
     * than 128
     *        KB will not transition to any storage class by default. varies_by_storage_class - Objects smaller than 128 KB
     * will
     *        transition to Glacier Flexible Retrieval or Glacier Deep Archive storage classes. By default, all other
     * storage
     *        classes will prevent transitions smaller than 128 KB. To customize the minimum object size for any transition
     * you can
     *        add a filter that specifies a custom ObjectSizeGreaterThan or ObjectSizeLessThan in the body of your
     * transition rule.
     *        Custom filters always take precedence over the default transition behavior.
     */
    public function __construct(
        TransitionDefaultMinimumObjectSize|string|null $transitionDefaultMinimumObjectSize = null
    ) {
        $this->transitionDefaultMinimumObjectSize = $transitionDefaultMinimumObjectSize === null || $transitionDefaultMinimumObjectSize instanceof TransitionDefaultMinimumObjectSize ? $transitionDefaultMinimumObjectSize : TransitionDefaultMinimumObjectSize::fromValue($transitionDefaultMinimumObjectSize);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::putBucketLifecycleConfigurationOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_TRANSITION_DEFAULT_MINIMUM_OBJECT_SIZE = $m[0];
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
        if (isset($this->transitionDefaultMinimumObjectSize)) {
            $serializer->serializeString(self::$SCHEMA_TRANSITION_DEFAULT_MINIMUM_OBJECT_SIZE, $this->transitionDefaultMinimumObjectSize->value, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->transitionDefaultMinimumObjectSize,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->transitionDefaultMinimumObjectSize
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
