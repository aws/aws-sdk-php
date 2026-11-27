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
 * Specifies when noncurrent object versions expire. Upon expiration, Amazon S3 permanently deletes the noncurrent
 * object versions. You set this lifecycle configuration action on a bucket that has versioning enabled (or suspended)
 * to request that Amazon S3 delete noncurrent object versions at a specific period in the object's lifetime. This
 * parameter applies to general purpose buckets only. It is not supported for directory bucket lifecycle configurations.
 */
final class NoncurrentVersionExpiration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#NoncurrentVersionExpiration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_NONCURRENT_DAYS;
    private static Schema $SCHEMA_NEWER_NONCURRENT_VERSIONS;

    /**
     * @param ?int $noncurrentDays Specifies the number of days an object is noncurrent before Amazon S3 can perform the
     *        associated action. The value must be a non-zero positive integer. For information about the noncurrent days
     *        calculations, see How Amazon S3 Calculates When an Object Became Noncurrent in the Amazon S3 User Guide. This
     *        parameter applies to general purpose buckets only. It is not supported for directory bucket lifecycle
     * configurations.
     * @param ?int $newerNoncurrentVersions Specifies how many noncurrent versions Amazon S3 will retain. You can specify up
     *        to 100 noncurrent versions to retain. Amazon S3 will permanently delete any additional noncurrent versions
     * beyond the
     *        specified number to retain. For more information about noncurrent versions, see Lifecycle configuration
     * elements in
     *        the Amazon S3 User Guide. This parameter applies to general purpose buckets only. It is not supported for
     * directory
     *        bucket lifecycle configurations.
     */
    public function __construct(
        public readonly ?int $noncurrentDays = null,
        public readonly ?int $newerNoncurrentVersions = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::noncurrentVersionExpiration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_NONCURRENT_DAYS = $m[0];
        self::$SCHEMA_NEWER_NONCURRENT_VERSIONS = $m[1];
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
        if (isset($this->newerNoncurrentVersions)) {
            $serializer->serializeInteger(self::$SCHEMA_NEWER_NONCURRENT_VERSIONS, $this->newerNoncurrentVersions, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->noncurrentDays,
            1 => $this->newerNoncurrentVersions,
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
            $this->newerNoncurrentVersions
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
