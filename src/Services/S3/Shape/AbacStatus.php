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
 * The ABAC status of the general purpose bucket. When ABAC is enabled for the general purpose bucket, you can use tags
 * to manage access to the general purpose buckets as well as for cost tracking purposes. When ABAC is disabled for the
 * general purpose buckets, you can only use tags for cost tracking purposes. For more information, see Using tags with
 * S3 general purpose buckets.
 */
final class AbacStatus implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#AbacStatus';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_STATUS;

    public readonly ?BucketAbacStatus $status;

    /**
     * @param ?BucketAbacStatus $status The ABAC status of the general purpose bucket.
     */
    public function __construct(
        BucketAbacStatus|string|null $status = null
    ) {
        $this->status = $status === null || $status instanceof BucketAbacStatus ? $status : BucketAbacStatus::fromValue($status);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::abacStatus();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_STATUS = $m[0];
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
        if (isset($this->status)) {
            $serializer->serializeString(self::$SCHEMA_STATUS, $this->status->value, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->status,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->status
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
