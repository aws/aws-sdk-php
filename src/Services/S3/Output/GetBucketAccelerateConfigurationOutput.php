<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\BucketAccelerateStatus;
use Aws\Services\S3\Shape\RequestCharged;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class GetBucketAccelerateConfigurationOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#GetBucketAccelerateConfigurationOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_STATUS;
    private static Schema $SCHEMA_REQUEST_CHARGED;

    public readonly ?BucketAccelerateStatus $status;
    public readonly ?RequestCharged $requestCharged;

    /**
     * @param ?BucketAccelerateStatus $status The accelerate configuration of the bucket.
     */
    public function __construct(
        BucketAccelerateStatus|string|null $status = null,
        RequestCharged|string|null $requestCharged = null
    ) {
        $this->status = $status === null || $status instanceof BucketAccelerateStatus ? $status : BucketAccelerateStatus::fromValue($status);
        $this->requestCharged = $requestCharged === null || $requestCharged instanceof RequestCharged ? $requestCharged : RequestCharged::fromValue($requestCharged);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::getBucketAccelerateConfigurationOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_STATUS = $m[0];
        self::$SCHEMA_REQUEST_CHARGED = $m[1];
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
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->status,
            1 => $this->requestCharged,
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
            $this->requestCharged
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
