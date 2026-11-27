<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
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
final class DeleteObjectOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#DeleteObjectOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DELETE_MARKER;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_REQUEST_CHARGED;

    public readonly ?RequestCharged $requestCharged;

    /**
     * @param ?bool $deleteMarker Indicates whether the specified object version that was permanently deleted was (true) or
     *        was not (false) a delete marker before deletion. In a simple DELETE, this header indicates whether (true) or
     * not
     *        (false) the current version of the object is a delete marker. To learn more about delete markers, see Working
     * with
     *        delete markers. This functionality is not supported for directory buckets.
     * @param ?string $versionId Returns the version ID of the delete marker created as a result of the DELETE operation.
     *        This functionality is not supported for directory buckets.
     */
    public function __construct(
        public readonly ?bool $deleteMarker = null,
        public readonly ?string $versionId = null,
        RequestCharged|string|null $requestCharged = null
    ) {
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
        $s = Schemas::deleteObjectOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DELETE_MARKER = $m[0];
        self::$SCHEMA_VERSION_ID = $m[1];
        self::$SCHEMA_REQUEST_CHARGED = $m[2];
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
        if (isset($this->deleteMarker)) {
            $serializer->serializeBoolean(self::$SCHEMA_DELETE_MARKER, $this->deleteMarker, 0);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 1);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 2);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->deleteMarker,
            1 => $this->versionId,
            2 => $this->requestCharged,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->deleteMarker,
            $this->versionId,
            $this->requestCharged
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
