<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumMode;
use Aws\Services\S3\Shape\RequestPayer;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class GetObjectAnnotationRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#GetObjectAnnotationRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_ANNOTATION_NAME;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_CHECKSUM_MODE;

    public readonly ?RequestPayer $requestPayer;
    public readonly ?ChecksumMode $checksumMode;

    /**
     * @param ?string $bucket The name of the bucket that contains the object.
     * @param ?string $key The object key.
     * @param ?string $annotationName The name of the annotation to retrieve. Length Constraints: Minimum length of 1.
     *        Maximum length of 512 bytes.
     * @param ?string $versionId The version ID of the object.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the bucket is owned by a
     *        different account, the request fails with an HTTP 403 (Access Denied) error.
     * @param ?ChecksumMode $checksumMode Set to ENABLED to validate the checksum of the annotation payload on retrieval.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $annotationName = null,
        public readonly ?string $versionId = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $expectedBucketOwner = null,
        ChecksumMode|string|null $checksumMode = null
    ) {
        $this->requestPayer = $requestPayer === null || $requestPayer instanceof RequestPayer ? $requestPayer : RequestPayer::fromValue($requestPayer);
        $this->checksumMode = $checksumMode === null || $checksumMode instanceof ChecksumMode ? $checksumMode : ChecksumMode::fromValue($checksumMode);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::getObjectAnnotationRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_ANNOTATION_NAME = $m[2];
        self::$SCHEMA_VERSION_ID = $m[3];
        self::$SCHEMA_REQUEST_PAYER = $m[4];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[5];
        self::$SCHEMA_CHECKSUM_MODE = $m[6];
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
        if (isset($this->checksumMode)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_MODE, $this->checksumMode->value, 6);
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
            6 => $this->checksumMode,
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
            $this->checksumMode
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
