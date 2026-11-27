<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\RequestPayer;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class DeleteObjectAnnotationRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#DeleteObjectAnnotationRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_ANNOTATION_NAME;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_OBJECT_IF_MATCH;

    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket The name of the bucket that contains the object.
     * @param ?string $key The object key.
     * @param ?string $annotationName The name of the annotation to delete. Annotation names are UTF-8 encoded and cannot
     *        start with aws or s3 (case-insensitive). Length Constraints: Minimum length of 1. Maximum length of 512 bytes.
     * @param ?string $versionId The version ID of the object.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner.
     * @param ?string $objectIfMatch If specified, the operation only succeeds if the object's ETag matches the provided
     *        value.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $annotationName = null,
        public readonly ?string $versionId = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $expectedBucketOwner = null,
        public readonly ?string $objectIfMatch = null
    ) {
        $this->requestPayer = $requestPayer === null || $requestPayer instanceof RequestPayer ? $requestPayer : RequestPayer::fromValue($requestPayer);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::deleteObjectAnnotationRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_ANNOTATION_NAME = $m[2];
        self::$SCHEMA_VERSION_ID = $m[3];
        self::$SCHEMA_REQUEST_PAYER = $m[4];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[5];
        self::$SCHEMA_OBJECT_IF_MATCH = $m[6];
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
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 1);
        }
        if (isset($this->annotationName)) {
            $serializer->serializeString(self::$SCHEMA_ANNOTATION_NAME, $this->annotationName, 2);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 3);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 4);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 5);
        }
        if (isset($this->objectIfMatch)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_IF_MATCH, $this->objectIfMatch, 6);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->key,
            2 => $this->annotationName,
            3 => $this->versionId,
            4 => $this->requestPayer,
            5 => $this->expectedBucketOwner,
            6 => $this->objectIfMatch,
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
            $this->key,
            $this->annotationName,
            $this->versionId,
            $this->requestPayer,
            $this->expectedBucketOwner,
            $this->objectIfMatch
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
