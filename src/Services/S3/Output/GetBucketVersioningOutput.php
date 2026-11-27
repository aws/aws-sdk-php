<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\BucketVersioningStatus;
use Aws\Services\S3\Shape\MFADeleteStatus;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class GetBucketVersioningOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#GetBucketVersioningOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_STATUS;
    private static Schema $SCHEMA_MFA_DELETE;

    public readonly ?BucketVersioningStatus $status;
    public readonly ?MFADeleteStatus $mFADelete;

    /**
     * @param ?BucketVersioningStatus $status The versioning state of the bucket.
     * @param ?MFADeleteStatus $mFADelete Specifies whether MFA delete is enabled in the bucket versioning configuration.
     *        This element is only returned if the bucket has been configured with MFA delete. If the bucket has never been
     * so
     *        configured, this element is not returned.
     */
    public function __construct(
        BucketVersioningStatus|string|null $status = null,
        MFADeleteStatus|string|null $mFADelete = null
    ) {
        $this->status = $status === null || $status instanceof BucketVersioningStatus ? $status : BucketVersioningStatus::fromValue($status);
        $this->mFADelete = $mFADelete === null || $mFADelete instanceof MFADeleteStatus ? $mFADelete : MFADeleteStatus::fromValue($mFADelete);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::getBucketVersioningOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_STATUS = $m[0];
        self::$SCHEMA_MFA_DELETE = $m[1];
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
        if (isset($this->mFADelete)) {
            $serializer->serializeString(self::$SCHEMA_MFA_DELETE, $this->mFADelete->value, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->status,
            1 => $this->mFADelete,
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
            $this->mFADelete
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
