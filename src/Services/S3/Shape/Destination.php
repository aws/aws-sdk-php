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
 * Specifies information about where to publish analysis or configuration results for an Amazon S3 bucket and S3
 * Replication Time Control (S3 RTC).
 */
final class Destination implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Destination';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_ACCOUNT;
    private static Schema $SCHEMA_STORAGE_CLASS;
    private static Schema $SCHEMA_ACCESS_CONTROL_TRANSLATION;
    private static Schema $SCHEMA_ENCRYPTION_CONFIGURATION;
    private static Schema $SCHEMA_REPLICATION_TIME;
    private static Schema $SCHEMA_METRICS;

    public readonly ?StorageClass $storageClass;

    /**
     * @param ?string $bucket The Amazon Resource Name (ARN) of the bucket where you want Amazon S3 to store the results.
     * @param ?string $account Destination bucket owner account ID. In a cross-account scenario, if you direct Amazon S3 to
     *        change replica ownership to the Amazon Web Services account that owns the destination bucket by specifying the
     *        AccessControlTranslation property, this is the account ID of the destination bucket owner. For more
     * information, see
     *        Replication Additional Configuration: Changing the Replica Owner in the Amazon S3 User Guide.
     * @param ?StorageClass $storageClass The storage class to use when replicating objects, such as S3 Standard or reduced
     *        redundancy. By default, Amazon S3 uses the storage class of the source object to create the object replica.
     * For valid
     *        values, see the StorageClass element of the PUT Bucket replication action in the Amazon S3 API Reference.
     * FSX_OPENZFS
     *        is not an accepted value when replicating objects.
     * @param ?AccessControlTranslation $accessControlTranslation Specify this only in a cross-account scenario (where
     *        source and destination bucket owners are not the same), and you want to change replica ownership to the Amazon
     * Web
     *        Services account that owns the destination bucket. If this is not specified in the replication configuration,
     * the
     *        replicas are owned by same Amazon Web Services account that owns the source object.
     * @param ?EncryptionConfiguration $encryptionConfiguration A container that provides information about encryption. If
     *        SourceSelectionCriteria is specified, you must specify this element.
     * @param ?ReplicationTime $replicationTime A container specifying S3 Replication Time Control (S3 RTC), including
     *        whether S3 RTC is enabled and the time when all objects and operations on objects must be replicated. Must be
     *        specified together with a Metrics block.
     * @param ?Metrics $metrics A container specifying replication metrics-related settings enabling replication metrics and
     *        events.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $account = null,
        StorageClass|string|null $storageClass = null,
        public readonly ?AccessControlTranslation $accessControlTranslation = null,
        public readonly ?EncryptionConfiguration $encryptionConfiguration = null,
        public readonly ?ReplicationTime $replicationTime = null,
        public readonly ?Metrics $metrics = null
    ) {
        $this->storageClass = $storageClass === null || $storageClass instanceof StorageClass ? $storageClass : StorageClass::fromValue($storageClass);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::destination();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_ACCOUNT = $m[1];
        self::$SCHEMA_STORAGE_CLASS = $m[2];
        self::$SCHEMA_ACCESS_CONTROL_TRANSLATION = $m[3];
        self::$SCHEMA_ENCRYPTION_CONFIGURATION = $m[4];
        self::$SCHEMA_REPLICATION_TIME = $m[5];
        self::$SCHEMA_METRICS = $m[6];
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
        if (isset($this->bucket)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET, $this->bucket, 0);
        }
        if (isset($this->account)) {
            $serializer->serializeString(self::$SCHEMA_ACCOUNT, $this->account, 1);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 2);
        }
        if (isset($this->accessControlTranslation)) {
            $serializer->serializeStruct(self::$SCHEMA_ACCESS_CONTROL_TRANSLATION, $this->accessControlTranslation, 3);
        }
        if (isset($this->encryptionConfiguration)) {
            $serializer->serializeStruct(self::$SCHEMA_ENCRYPTION_CONFIGURATION, $this->encryptionConfiguration, 4);
        }
        if (isset($this->replicationTime)) {
            $serializer->serializeStruct(self::$SCHEMA_REPLICATION_TIME, $this->replicationTime, 5);
        }
        if (isset($this->metrics)) {
            $serializer->serializeStruct(self::$SCHEMA_METRICS, $this->metrics, 6);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->account,
            2 => $this->storageClass,
            3 => $this->accessControlTranslation,
            4 => $this->encryptionConfiguration,
            5 => $this->replicationTime,
            6 => $this->metrics,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->bucket,
            $this->account,
            $this->storageClass,
            $this->accessControlTranslation,
            $this->encryptionConfiguration,
            $this->replicationTime,
            $this->metrics
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
