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
 * A container that describes additional filters for identifying the source objects that you want to replicate. You can
 * choose to enable or disable the replication of these objects. Currently, Amazon S3 supports only the filter that you
 * can specify for objects created with server-side encryption using a customer managed key stored in Amazon Web
 * Services Key Management Service (SSE-KMS).
 */
final class SourceSelectionCriteria implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#SourceSelectionCriteria';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_SSE_KMS_ENCRYPTED_OBJECTS;
    private static Schema $SCHEMA_REPLICA_MODIFICATIONS;

    /**
     * @param ?SseKmsEncryptedObjects $sseKmsEncryptedObjects A container for filter information for the selection of Amazon
     *        S3 objects encrypted with Amazon Web Services KMS. If you include SourceSelectionCriteria in the replication
     *        configuration, this element is required.
     * @param ?ReplicaModifications $replicaModifications A filter that you can specify for selections for modifications on
     *        replicas. Amazon S3 doesn't replicate replica modifications by default. In the latest version of replication
     *        configuration (when Filter is specified), you can specify this element and set the status to Enabled to
     * replicate
     *        modifications on replicas. If you don't specify the Filter element, Amazon S3 assumes that the replication
     *        configuration is the earlier version, V1. In the earlier version, this element is not allowed
     */
    public function __construct(
        public readonly ?SseKmsEncryptedObjects $sseKmsEncryptedObjects = null,
        public readonly ?ReplicaModifications $replicaModifications = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::sourceSelectionCriteria();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_SSE_KMS_ENCRYPTED_OBJECTS = $m[0];
        self::$SCHEMA_REPLICA_MODIFICATIONS = $m[1];
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
        if (isset($this->sseKmsEncryptedObjects)) {
            $serializer->serializeStruct(self::$SCHEMA_SSE_KMS_ENCRYPTED_OBJECTS, $this->sseKmsEncryptedObjects, 0);
        }
        if (isset($this->replicaModifications)) {
            $serializer->serializeStruct(self::$SCHEMA_REPLICA_MODIFICATIONS, $this->replicaModifications, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->sseKmsEncryptedObjects,
            1 => $this->replicaModifications,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->sseKmsEncryptedObjects,
            $this->replicaModifications
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
