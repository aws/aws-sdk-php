<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\EnumInterface;

/**
 * <p>The bucket event for which to send notifications.</p>
 */
final class Event implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#Event';

    /** @var array<array-key, self> */
    private static array $known = [];

    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function s3_ReducedRedundancyLostObject(): self
    {
        return self::$known['s3:ReducedRedundancyLostObject'] ??= new self('s3:ReducedRedundancyLostObject');
    }

    public static function s3_ObjectCreated_(): self
    {
        return self::$known['s3:ObjectCreated:*'] ??= new self('s3:ObjectCreated:*');
    }

    public static function s3_ObjectCreated_Put(): self
    {
        return self::$known['s3:ObjectCreated:Put'] ??= new self('s3:ObjectCreated:Put');
    }

    public static function s3_ObjectCreated_Post(): self
    {
        return self::$known['s3:ObjectCreated:Post'] ??= new self('s3:ObjectCreated:Post');
    }

    public static function s3_ObjectCreated_Copy(): self
    {
        return self::$known['s3:ObjectCreated:Copy'] ??= new self('s3:ObjectCreated:Copy');
    }

    public static function s3_ObjectCreated_CompleteMultipartUpload(): self
    {
        return self::$known['s3:ObjectCreated:CompleteMultipartUpload'] ??= new self('s3:ObjectCreated:CompleteMultipartUpload');
    }

    public static function s3_ObjectRemoved_(): self
    {
        return self::$known['s3:ObjectRemoved:*'] ??= new self('s3:ObjectRemoved:*');
    }

    public static function s3_ObjectRemoved_Delete(): self
    {
        return self::$known['s3:ObjectRemoved:Delete'] ??= new self('s3:ObjectRemoved:Delete');
    }

    public static function s3_ObjectRemoved_DeleteMarkerCreated(): self
    {
        return self::$known['s3:ObjectRemoved:DeleteMarkerCreated'] ??= new self('s3:ObjectRemoved:DeleteMarkerCreated');
    }

    public static function s3_ObjectRestore_(): self
    {
        return self::$known['s3:ObjectRestore:*'] ??= new self('s3:ObjectRestore:*');
    }

    public static function s3_ObjectRestore_Post(): self
    {
        return self::$known['s3:ObjectRestore:Post'] ??= new self('s3:ObjectRestore:Post');
    }

    public static function s3_ObjectRestore_Completed(): self
    {
        return self::$known['s3:ObjectRestore:Completed'] ??= new self('s3:ObjectRestore:Completed');
    }

    public static function s3_Replication_(): self
    {
        return self::$known['s3:Replication:*'] ??= new self('s3:Replication:*');
    }

    public static function s3_Replication_OperationFailedReplication(): self
    {
        return self::$known['s3:Replication:OperationFailedReplication'] ??= new self('s3:Replication:OperationFailedReplication');
    }

    public static function s3_Replication_OperationNotTracked(): self
    {
        return self::$known['s3:Replication:OperationNotTracked'] ??= new self('s3:Replication:OperationNotTracked');
    }

    public static function s3_Replication_OperationMissedThreshold(): self
    {
        return self::$known['s3:Replication:OperationMissedThreshold'] ??= new self('s3:Replication:OperationMissedThreshold');
    }

    public static function s3_Replication_OperationReplicatedAfterThreshold(): self
    {
        return self::$known['s3:Replication:OperationReplicatedAfterThreshold'] ??= new self('s3:Replication:OperationReplicatedAfterThreshold');
    }

    public static function s3_ObjectRestore_Delete(): self
    {
        return self::$known['s3:ObjectRestore:Delete'] ??= new self('s3:ObjectRestore:Delete');
    }

    public static function s3_LifecycleTransition(): self
    {
        return self::$known['s3:LifecycleTransition'] ??= new self('s3:LifecycleTransition');
    }

    public static function s3_IntelligentTiering(): self
    {
        return self::$known['s3:IntelligentTiering'] ??= new self('s3:IntelligentTiering');
    }

    public static function s3_ObjectAcl_Put(): self
    {
        return self::$known['s3:ObjectAcl:Put'] ??= new self('s3:ObjectAcl:Put');
    }

    public static function s3_LifecycleExpiration_(): self
    {
        return self::$known['s3:LifecycleExpiration:*'] ??= new self('s3:LifecycleExpiration:*');
    }

    public static function s3_LifecycleExpiration_Delete(): self
    {
        return self::$known['s3:LifecycleExpiration:Delete'] ??= new self('s3:LifecycleExpiration:Delete');
    }

    public static function s3_LifecycleExpiration_DeleteMarkerCreated(): self
    {
        return self::$known['s3:LifecycleExpiration:DeleteMarkerCreated'] ??= new self('s3:LifecycleExpiration:DeleteMarkerCreated');
    }

    public static function s3_ObjectTagging_(): self
    {
        return self::$known['s3:ObjectTagging:*'] ??= new self('s3:ObjectTagging:*');
    }

    public static function s3_ObjectTagging_Put(): self
    {
        return self::$known['s3:ObjectTagging:Put'] ??= new self('s3:ObjectTagging:Put');
    }

    public static function s3_ObjectTagging_Delete(): self
    {
        return self::$known['s3:ObjectTagging:Delete'] ??= new self('s3:ObjectTagging:Delete');
    }

    public static function s3_ObjectAnnotation_(): self
    {
        return self::$known['s3:ObjectAnnotation:*'] ??= new self('s3:ObjectAnnotation:*');
    }

    public static function s3_ObjectAnnotation_Put(): self
    {
        return self::$known['s3:ObjectAnnotation:Put'] ??= new self('s3:ObjectAnnotation:Put');
    }

    public static function s3_ObjectAnnotation_Delete(): self
    {
        return self::$known['s3:ObjectAnnotation:Delete'] ??= new self('s3:ObjectAnnotation:Delete');
    }

    public static function s3_ObjectRetention_Put(): self
    {
        return self::$known['s3:ObjectRetention:Put'] ??= new self('s3:ObjectRetention:Put');
    }

    /**
     * Create an instance from a string value.
     *
     * Known values are cached as singletons.
     * Unknown values create a fresh instance
     * for forward-compatibility with newer service versions.
     *
     * @param string $value
     * @return self
     */
    public static function fromValue(string $value): self
    {
        return match ($value) {
            's3:ReducedRedundancyLostObject' => self::$known['s3:ReducedRedundancyLostObject'] ??= new self('s3:ReducedRedundancyLostObject'),
            's3:ObjectCreated:*' => self::$known['s3:ObjectCreated:*'] ??= new self('s3:ObjectCreated:*'),
            's3:ObjectCreated:Put' => self::$known['s3:ObjectCreated:Put'] ??= new self('s3:ObjectCreated:Put'),
            's3:ObjectCreated:Post' => self::$known['s3:ObjectCreated:Post'] ??= new self('s3:ObjectCreated:Post'),
            's3:ObjectCreated:Copy' => self::$known['s3:ObjectCreated:Copy'] ??= new self('s3:ObjectCreated:Copy'),
            's3:ObjectCreated:CompleteMultipartUpload' => self::$known['s3:ObjectCreated:CompleteMultipartUpload'] ??= new self('s3:ObjectCreated:CompleteMultipartUpload'),
            's3:ObjectRemoved:*' => self::$known['s3:ObjectRemoved:*'] ??= new self('s3:ObjectRemoved:*'),
            's3:ObjectRemoved:Delete' => self::$known['s3:ObjectRemoved:Delete'] ??= new self('s3:ObjectRemoved:Delete'),
            's3:ObjectRemoved:DeleteMarkerCreated' => self::$known['s3:ObjectRemoved:DeleteMarkerCreated'] ??= new self('s3:ObjectRemoved:DeleteMarkerCreated'),
            's3:ObjectRestore:*' => self::$known['s3:ObjectRestore:*'] ??= new self('s3:ObjectRestore:*'),
            's3:ObjectRestore:Post' => self::$known['s3:ObjectRestore:Post'] ??= new self('s3:ObjectRestore:Post'),
            's3:ObjectRestore:Completed' => self::$known['s3:ObjectRestore:Completed'] ??= new self('s3:ObjectRestore:Completed'),
            's3:Replication:*' => self::$known['s3:Replication:*'] ??= new self('s3:Replication:*'),
            's3:Replication:OperationFailedReplication' => self::$known['s3:Replication:OperationFailedReplication'] ??= new self('s3:Replication:OperationFailedReplication'),
            's3:Replication:OperationNotTracked' => self::$known['s3:Replication:OperationNotTracked'] ??= new self('s3:Replication:OperationNotTracked'),
            's3:Replication:OperationMissedThreshold' => self::$known['s3:Replication:OperationMissedThreshold'] ??= new self('s3:Replication:OperationMissedThreshold'),
            's3:Replication:OperationReplicatedAfterThreshold' => self::$known['s3:Replication:OperationReplicatedAfterThreshold'] ??= new self('s3:Replication:OperationReplicatedAfterThreshold'),
            's3:ObjectRestore:Delete' => self::$known['s3:ObjectRestore:Delete'] ??= new self('s3:ObjectRestore:Delete'),
            's3:LifecycleTransition' => self::$known['s3:LifecycleTransition'] ??= new self('s3:LifecycleTransition'),
            's3:IntelligentTiering' => self::$known['s3:IntelligentTiering'] ??= new self('s3:IntelligentTiering'),
            's3:ObjectAcl:Put' => self::$known['s3:ObjectAcl:Put'] ??= new self('s3:ObjectAcl:Put'),
            's3:LifecycleExpiration:*' => self::$known['s3:LifecycleExpiration:*'] ??= new self('s3:LifecycleExpiration:*'),
            's3:LifecycleExpiration:Delete' => self::$known['s3:LifecycleExpiration:Delete'] ??= new self('s3:LifecycleExpiration:Delete'),
            's3:LifecycleExpiration:DeleteMarkerCreated' => self::$known['s3:LifecycleExpiration:DeleteMarkerCreated'] ??= new self('s3:LifecycleExpiration:DeleteMarkerCreated'),
            's3:ObjectTagging:*' => self::$known['s3:ObjectTagging:*'] ??= new self('s3:ObjectTagging:*'),
            's3:ObjectTagging:Put' => self::$known['s3:ObjectTagging:Put'] ??= new self('s3:ObjectTagging:Put'),
            's3:ObjectTagging:Delete' => self::$known['s3:ObjectTagging:Delete'] ??= new self('s3:ObjectTagging:Delete'),
            's3:ObjectAnnotation:*' => self::$known['s3:ObjectAnnotation:*'] ??= new self('s3:ObjectAnnotation:*'),
            's3:ObjectAnnotation:Put' => self::$known['s3:ObjectAnnotation:Put'] ??= new self('s3:ObjectAnnotation:Put'),
            's3:ObjectAnnotation:Delete' => self::$known['s3:ObjectAnnotation:Delete'] ??= new self('s3:ObjectAnnotation:Delete'),
            's3:ObjectRetention:Put' => self::$known['s3:ObjectRetention:Put'] ??= new self('s3:ObjectRetention:Put'),
            default => new self($value),
        };
    }

    /**
     * Returns all known enum values.
     *
     * @return list<self>
     */
    public static function cases(): array
    {
        return [self::s3_ReducedRedundancyLostObject(), self::s3_ObjectCreated_(), self::s3_ObjectCreated_Put(), self::s3_ObjectCreated_Post(), self::s3_ObjectCreated_Copy(), self::s3_ObjectCreated_CompleteMultipartUpload(), self::s3_ObjectRemoved_(), self::s3_ObjectRemoved_Delete(), self::s3_ObjectRemoved_DeleteMarkerCreated(), self::s3_ObjectRestore_(), self::s3_ObjectRestore_Post(), self::s3_ObjectRestore_Completed(), self::s3_Replication_(), self::s3_Replication_OperationFailedReplication(), self::s3_Replication_OperationNotTracked(), self::s3_Replication_OperationMissedThreshold(), self::s3_Replication_OperationReplicatedAfterThreshold(), self::s3_ObjectRestore_Delete(), self::s3_LifecycleTransition(), self::s3_IntelligentTiering(), self::s3_ObjectAcl_Put(), self::s3_LifecycleExpiration_(), self::s3_LifecycleExpiration_Delete(), self::s3_LifecycleExpiration_DeleteMarkerCreated(), self::s3_ObjectTagging_(), self::s3_ObjectTagging_Put(), self::s3_ObjectTagging_Delete(), self::s3_ObjectAnnotation_(), self::s3_ObjectAnnotation_Put(), self::s3_ObjectAnnotation_Delete(), self::s3_ObjectRetention_Put()];
    }

    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        return Schemas::event();
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
        $serializer->serializeString(self::schema(), $this->value, $idx);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
