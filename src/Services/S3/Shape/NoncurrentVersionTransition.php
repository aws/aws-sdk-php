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
 * Container for the transition rule that describes when noncurrent objects transition to the STANDARD_IA, ONEZONE_IA,
 * INTELLIGENT_TIERING, GLACIER_IR, GLACIER, or DEEP_ARCHIVE storage class. If your bucket is versioning-enabled (or
 * versioning is suspended), you can set this action to request that Amazon S3 transition noncurrent object versions to
 * the STANDARD_IA, ONEZONE_IA, INTELLIGENT_TIERING, GLACIER_IR, GLACIER, or DEEP_ARCHIVE storage class at a specific
 * period in the object's lifetime.
 */
final class NoncurrentVersionTransition implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#NoncurrentVersionTransition';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_NONCURRENT_DAYS;
    private static Schema $SCHEMA_STORAGE_CLASS;
    private static Schema $SCHEMA_NEWER_NONCURRENT_VERSIONS;

    public readonly ?TransitionStorageClass $storageClass;

    /**
     * @param ?int $noncurrentDays Specifies the number of days an object is noncurrent before Amazon S3 can perform the
     *        associated action. For information about the noncurrent days calculations, see How Amazon S3 Calculates How
     * Long an
     *        Object Has Been Noncurrent in the Amazon S3 User Guide.
     * @param ?TransitionStorageClass $storageClass The class of storage used to store the object.
     * @param ?int $newerNoncurrentVersions Specifies how many noncurrent versions Amazon S3 will retain in the same storage
     *        class before transitioning objects. You can specify up to 100 noncurrent versions to retain. Amazon S3 will
     *        transition any additional noncurrent versions beyond the specified number to retain. For more information
     * about
     *        noncurrent versions, see Lifecycle configuration elements in the Amazon S3 User Guide.
     */
    public function __construct(
        public readonly ?int $noncurrentDays = null,
        TransitionStorageClass|string|null $storageClass = null,
        public readonly ?int $newerNoncurrentVersions = null
    ) {
        $this->storageClass = $storageClass === null || $storageClass instanceof TransitionStorageClass ? $storageClass : TransitionStorageClass::fromValue($storageClass);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::noncurrentVersionTransition();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_NONCURRENT_DAYS = $m[0];
        self::$SCHEMA_STORAGE_CLASS = $m[1];
        self::$SCHEMA_NEWER_NONCURRENT_VERSIONS = $m[2];
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
        if (isset($this->noncurrentDays)) {
            $serializer->serializeInteger(self::$SCHEMA_NONCURRENT_DAYS, $this->noncurrentDays, 0);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 1);
        }
        if (isset($this->newerNoncurrentVersions)) {
            $serializer->serializeInteger(self::$SCHEMA_NEWER_NONCURRENT_VERSIONS, $this->newerNoncurrentVersions, 2);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->noncurrentDays,
            1 => $this->storageClass,
            2 => $this->newerNoncurrentVersions,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->noncurrentDays,
            $this->storageClass,
            $this->newerNoncurrentVersions
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
