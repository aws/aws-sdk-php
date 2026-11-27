<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Exception;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\IntelligentTieringAccessTier;
use Aws\Services\S3\Shape\StorageClass;
use Smithy\Core\Exception\ErrorFault;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

/**
 * Object is archived and inaccessible until restored. If the object you are retrieving is stored in the S3 Glacier
 * Flexible Retrieval storage class, the S3 Glacier Deep Archive storage class, the S3 Intelligent-Tiering Archive
 * Access tier, or the S3 Intelligent-Tiering Deep Archive Access tier, before you can retrieve the object you must
 * first restore a copy using RestoreObject. Otherwise, this operation returns an InvalidObjectState error. For
 * information about restoring archived objects, see Restoring Archived Objects in the Amazon S3 User Guide.
 */
final class InvalidObjectStateException extends S3Exception implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#InvalidObjectState';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_STORAGE_CLASS;
    private static Schema $SCHEMA_ACCESS_TIER;

    public readonly ?StorageClass $storageClass;
    public readonly ?IntelligentTieringAccessTier $accessTier;

    public function __construct(
        StorageClass|string|null $storageClass = null,
        IntelligentTieringAccessTier|string|null $accessTier = null
    ) {
        parent::__construct('', ErrorFault::Client);
        $this->storageClass = $storageClass === null || $storageClass instanceof StorageClass ? $storageClass : StorageClass::fromValue($storageClass);
        $this->accessTier = $accessTier === null || $accessTier instanceof IntelligentTieringAccessTier ? $accessTier : IntelligentTieringAccessTier::fromValue($accessTier);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::invalidObjectStateException();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_STORAGE_CLASS = $m[0];
        self::$SCHEMA_ACCESS_TIER = $m[1];
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
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 0);
        }
        if (isset($this->accessTier)) {
            $serializer->serializeString(self::$SCHEMA_ACCESS_TIER, $this->accessTier->value, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->storageClass,
            1 => $this->accessTier,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->storageClass,
            $this->accessTier
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
