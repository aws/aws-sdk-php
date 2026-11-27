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
 * Container for the expiration for the lifecycle of the object. For more information see, Managing your storage
 * lifecycle in the Amazon S3 User Guide.
 */
final class LifecycleExpiration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#LifecycleExpiration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DATE;
    private static Schema $SCHEMA_DAYS;
    private static Schema $SCHEMA_EXPIRED_OBJECT_DELETE_MARKER;

    /**
     * @param ?float $date Indicates at what date the object is to be moved or deleted. The date value must conform to the
     *        ISO 8601 format. The time is always midnight UTC. This parameter applies to general purpose buckets only. It
     * is not
     *        supported for directory bucket lifecycle configurations.
     * @param ?int $days Indicates the lifetime, in days, of the objects that are subject to the rule. The value must be a
     *        non-zero positive integer.
     * @param ?bool $expiredObjectDeleteMarker Indicates whether Amazon S3 will remove a delete marker with no noncurrent
     *        versions. If set to true, the delete marker will be expired; if set to false the policy takes no action. This
     * cannot
     *        be specified with Days or Date in a Lifecycle Expiration Policy. This parameter applies to general purpose
     * buckets
     *        only. It is not supported for directory bucket lifecycle configurations.
     */
    public function __construct(
        public readonly ?float $date = null,
        public readonly ?int $days = null,
        public readonly ?bool $expiredObjectDeleteMarker = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::lifecycleExpiration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DATE = $m[0];
        self::$SCHEMA_DAYS = $m[1];
        self::$SCHEMA_EXPIRED_OBJECT_DELETE_MARKER = $m[2];
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
        if (isset($this->date)) {
            $serializer->serializeTimestamp(self::$SCHEMA_DATE, $this->date, 0);
        }
        if (isset($this->days)) {
            $serializer->serializeInteger(self::$SCHEMA_DAYS, $this->days, 1);
        }
        if (isset($this->expiredObjectDeleteMarker)) {
            $serializer->serializeBoolean(self::$SCHEMA_EXPIRED_OBJECT_DELETE_MARKER, $this->expiredObjectDeleteMarker, 2);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->date,
            1 => $this->days,
            2 => $this->expiredObjectDeleteMarker,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->date,
            $this->days,
            $this->expiredObjectDeleteMarker
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
