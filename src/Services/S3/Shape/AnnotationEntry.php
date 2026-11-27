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
 * Describes a single annotation attached to an object, including its name, last modified time, size, ETag, checksum
 * algorithm, and replication status. Returned in the response from ListObjectAnnotations.
 */
final class AnnotationEntry implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#AnnotationEntry';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ANNOTATION_NAME;
    private static Schema $SCHEMA_LAST_MODIFIED;
    private static Schema $SCHEMA_SIZE;
    private static Schema $SCHEMA_E_TAG;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_REPLICATION_STATUS;

    public readonly ?ReplicationStatus $replicationStatus;

    /**
     * @param ?string $annotationName The name of the annotation.
     * @param ?float $lastModified The date and time the annotation was last modified.
     * @param ?int $size The size of the annotation payload, in bytes.
     * @param ?string $eTag The entity tag of the annotation.
     * @param list<\Aws\Services\S3\Shape\ChecksumAlgorithm>|null $checksumAlgorithm
     * @param ?ReplicationStatus $replicationStatus The replication status of the annotation.
     */
    public function __construct(
        public readonly ?string $annotationName = null,
        public readonly ?float $lastModified = null,
        public readonly ?int $size = null,
        public readonly ?string $eTag = null,
        public readonly ?array $checksumAlgorithm = null,
        ReplicationStatus|string|null $replicationStatus = null
    ) {
        $this->replicationStatus = $replicationStatus === null || $replicationStatus instanceof ReplicationStatus ? $replicationStatus : ReplicationStatus::fromValue($replicationStatus);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::annotationEntry();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ANNOTATION_NAME = $m[0];
        self::$SCHEMA_LAST_MODIFIED = $m[1];
        self::$SCHEMA_SIZE = $m[2];
        self::$SCHEMA_E_TAG = $m[3];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[4];
        self::$SCHEMA_REPLICATION_STATUS = $m[5];
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
        if (isset($this->annotationName)) {
            $serializer->serializeString(self::$SCHEMA_ANNOTATION_NAME, $this->annotationName, 0);
        }
        if (isset($this->lastModified)) {
            $serializer->serializeTimestamp(self::$SCHEMA_LAST_MODIFIED, $this->lastModified, 1);
        }
        if (isset($this->size)) {
            $serializer->serializeInteger(self::$SCHEMA_SIZE, $this->size, 2);
        }
        if (isset($this->eTag)) {
            $serializer->serializeString(self::$SCHEMA_E_TAG, $this->eTag, 3);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeList(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm, 4);
        }
        if (isset($this->replicationStatus)) {
            $serializer->serializeString(self::$SCHEMA_REPLICATION_STATUS, $this->replicationStatus->value, 5);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->annotationName,
            1 => $this->lastModified,
            2 => $this->size,
            3 => $this->eTag,
            4 => $this->checksumAlgorithm,
            5 => $this->replicationStatus,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->annotationName,
            $this->lastModified,
            $this->size,
            $this->eTag,
            $this->checksumAlgorithm,
            $this->replicationStatus
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
