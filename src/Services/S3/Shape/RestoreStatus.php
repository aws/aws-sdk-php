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
 * Specifies the restoration status of an object. Objects in certain storage classes must be restored before they can be
 * retrieved. For more information about these storage classes and how to work with archived objects, see Working with
 * archived objects in the Amazon S3 User Guide. This functionality is not supported for directory buckets. Directory
 * buckets only support EXPRESS_ONEZONE (the S3 Express One Zone storage class) in Availability Zones and ONEZONE_IA
 * (the S3 One Zone-Infrequent Access storage class) in Dedicated Local Zones.
 */
final class RestoreStatus implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#RestoreStatus';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_IS_RESTORE_IN_PROGRESS;
    private static Schema $SCHEMA_RESTORE_EXPIRY_DATE;

    /**
     * @param ?bool $isRestoreInProgress Specifies whether the object is currently being restored. If the object restoration
     *        is in progress, the header returns the value TRUE. For example: x-amz-optional-object-attributes:
     *        IsRestoreInProgress="true" If the object restoration has completed, the header returns the value FALSE. For
     * example:
     *        x-amz-optional-object-attributes: IsRestoreInProgress="false", RestoreExpiryDate="2012-12-21T00:00:00.000Z" If
     * the
     *        object hasn't been restored, there is no header response.
     * @param ?float $restoreExpiryDate Indicates when the restored copy will expire. This value is populated only if the
     *        object has already been restored. For example: x-amz-optional-object-attributes: IsRestoreInProgress="false",
     *        RestoreExpiryDate="2012-12-21T00:00:00.000Z"
     */
    public function __construct(
        public readonly ?bool $isRestoreInProgress = null,
        public readonly ?float $restoreExpiryDate = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::restoreStatus();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_IS_RESTORE_IN_PROGRESS = $m[0];
        self::$SCHEMA_RESTORE_EXPIRY_DATE = $m[1];
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
        if (isset($this->isRestoreInProgress)) {
            $serializer->serializeBoolean(self::$SCHEMA_IS_RESTORE_IN_PROGRESS, $this->isRestoreInProgress, 0);
        }
        if (isset($this->restoreExpiryDate)) {
            $serializer->serializeTimestamp(self::$SCHEMA_RESTORE_EXPIRY_DATE, $this->restoreExpiryDate, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->isRestoreInProgress,
            1 => $this->restoreExpiryDate,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->isRestoreInProgress,
            $this->restoreExpiryDate
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
