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
 * Specifies which Amazon S3 objects to replicate and where to store the replicas.
 */
final class ReplicationRule implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ReplicationRule';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_STATUS;
    private static Schema $SCHEMA_DESTINATION;
    private static Schema $SCHEMA_ID;
    private static Schema $SCHEMA_PRIORITY;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_FILTER;
    private static Schema $SCHEMA_SOURCE_SELECTION_CRITERIA;
    private static Schema $SCHEMA_EXISTING_OBJECT_REPLICATION;
    private static Schema $SCHEMA_DELETE_MARKER_REPLICATION;

    public readonly ?ReplicationRuleStatus $status;

    /**
     * @param ?ReplicationRuleStatus $status Specifies whether the rule is enabled.
     * @param ?Destination $destination A container for information about the replication destination and its configurations
     *        including enabling the S3 Replication Time Control (S3 RTC).
     * @param ?string $iD A unique identifier for the rule. The maximum value is 255 characters.
     * @param ?int $priority The priority indicates which rule has precedence whenever two or more replication rules
     *        conflict. Amazon S3 will attempt to replicate objects according to all replication rules. However, if there
     * are two
     *        or more rules with the same destination bucket, then objects will be replicated according to the rule with the
     *        highest priority. The higher the number, the higher the priority. For more information, see Replication in the
     * Amazon
     *        S3 User Guide.
     * @param ?string $prefix An object key name prefix that identifies the object or objects to which the rule applies. The
     *        maximum prefix length is 1,024 characters. To include all objects in a bucket, specify an empty string.
     * Replacement
     *        must be made for object keys containing special characters (such as carriage returns) when using XML requests.
     * For
     *        more information, see XML related object key constraints.
     * @param ?SourceSelectionCriteria $sourceSelectionCriteria A container that describes additional filters for
     *        identifying the source objects that you want to replicate. You can choose to enable or disable the replication
     * of
     *        these objects. Currently, Amazon S3 supports only the filter that you can specify for objects created with
     *        server-side encryption using a customer managed key stored in Amazon Web Services Key Management Service
     * (SSE-KMS).
     * @param ?ExistingObjectReplication $existingObjectReplication Optional configuration to replicate existing source
     *        bucket objects. This parameter is no longer supported. To replicate existing objects, see Replicating existing
     *        objects with S3 Batch Replication in the Amazon S3 User Guide.
     */
    public function __construct(
        ReplicationRuleStatus|string|null $status = null,
        public readonly ?Destination $destination = null,
        public readonly ?string $iD = null,
        public readonly ?int $priority = null,
        /** @deprecated */
        public readonly ?string $prefix = null,
        public readonly ?ReplicationRuleFilter $filter = null,
        public readonly ?SourceSelectionCriteria $sourceSelectionCriteria = null,
        public readonly ?ExistingObjectReplication $existingObjectReplication = null,
        public readonly ?DeleteMarkerReplication $deleteMarkerReplication = null
    ) {
        $this->status = $status === null || $status instanceof ReplicationRuleStatus ? $status : ReplicationRuleStatus::fromValue($status);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::replicationRule();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_STATUS = $m[0];
        self::$SCHEMA_DESTINATION = $m[1];
        self::$SCHEMA_ID = $m[2];
        self::$SCHEMA_PRIORITY = $m[3];
        self::$SCHEMA_PREFIX = $m[4];
        self::$SCHEMA_FILTER = $m[5];
        self::$SCHEMA_SOURCE_SELECTION_CRITERIA = $m[6];
        self::$SCHEMA_EXISTING_OBJECT_REPLICATION = $m[7];
        self::$SCHEMA_DELETE_MARKER_REPLICATION = $m[8];
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
        if (isset($this->destination)) {
            $serializer->serializeStruct(self::$SCHEMA_DESTINATION, $this->destination, 1);
        }
        if (isset($this->iD)) {
            $serializer->serializeString(self::$SCHEMA_ID, $this->iD, 2);
        }
        if (isset($this->priority)) {
            $serializer->serializeInteger(self::$SCHEMA_PRIORITY, $this->priority, 3);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 4);
        }
        if (isset($this->filter)) {
            $serializer->serializeStruct(self::$SCHEMA_FILTER, $this->filter, 5);
        }
        if (isset($this->sourceSelectionCriteria)) {
            $serializer->serializeStruct(self::$SCHEMA_SOURCE_SELECTION_CRITERIA, $this->sourceSelectionCriteria, 6);
        }
        if (isset($this->existingObjectReplication)) {
            $serializer->serializeStruct(self::$SCHEMA_EXISTING_OBJECT_REPLICATION, $this->existingObjectReplication, 7);
        }
        if (isset($this->deleteMarkerReplication)) {
            $serializer->serializeStruct(self::$SCHEMA_DELETE_MARKER_REPLICATION, $this->deleteMarkerReplication, 8);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->status,
            1 => $this->destination,
            2 => $this->iD,
            3 => $this->priority,
            4 => $this->prefix,
            5 => $this->filter,
            6 => $this->sourceSelectionCriteria,
            7 => $this->existingObjectReplication,
            8 => $this->deleteMarkerReplication,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->status,
            $this->destination,
            $this->iD,
            $this->priority,
            $this->prefix,
            $this->filter,
            $this->sourceSelectionCriteria,
            $this->existingObjectReplication,
            $this->deleteMarkerReplication
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
