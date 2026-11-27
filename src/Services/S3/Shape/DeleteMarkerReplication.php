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
 * Specifies whether Amazon S3 replicates delete markers. If you specify a Filter in your replication configuration, you
 * must also include a DeleteMarkerReplication element. If your Filter includes a Tag element, including within a Not or
 * Or element, the DeleteMarkerReplication Status must be set to Disabled, because Amazon S3 does not support
 * replicating delete markers for tag-based rules. For an example configuration, see Basic Rule Configuration. For more
 * information about delete marker replication, see Basic Rule Configuration. If you are using an earlier version of the
 * replication configuration, Amazon S3 handles replication of delete markers differently. For more information, see
 * Backward Compatibility.
 */
final class DeleteMarkerReplication implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#DeleteMarkerReplication';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_STATUS;

    public readonly ?DeleteMarkerReplicationStatus $status;

    /**
     * @param ?DeleteMarkerReplicationStatus $status Indicates whether to replicate delete markers. Indicates whether to
     *        replicate delete markers.
     */
    public function __construct(
        DeleteMarkerReplicationStatus|string|null $status = null
    ) {
        $this->status = $status === null || $status instanceof DeleteMarkerReplicationStatus ? $status : DeleteMarkerReplicationStatus::fromValue($status);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::deleteMarkerReplication();
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
