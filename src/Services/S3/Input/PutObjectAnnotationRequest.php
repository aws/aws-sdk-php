<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\RequestPayer;
use Psr\Http\Message\StreamInterface;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class PutObjectAnnotationRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PutObjectAnnotationRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_ANNOTATION_NAME;
    private static Schema $SCHEMA_ANNOTATION_PAYLOAD;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_OBJECT_IF_MATCH;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_CHECKSUM_CRC32;
    private static Schema $SCHEMA_CHECKSUM_CRC32_C;
    private static Schema $SCHEMA_CHECKSUM_CRC64_NVME;
    private static Schema $SCHEMA_CHECKSUM_SHA1;
    private static Schema $SCHEMA_CHECKSUM_SHA256;
    private static Schema $SCHEMA_CHECKSUM_SHA512;
    private static Schema $SCHEMA_CHECKSUM_MD5;
    private static Schema $SCHEMA_CHECKSUM_XXHASH64;
    private static Schema $SCHEMA_CHECKSUM_XXHASH3;
    private static Schema $SCHEMA_CHECKSUM_XXHASH128;
    private static Schema $SCHEMA_CONTENT_MD5;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;

    public readonly ?ChecksumAlgorithm $checksumAlgorithm;
    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket The name of the bucket that contains the object.
     * @param ?string $key The object key.
     * @param ?string $annotationName The name of the annotation. Length Constraints: Minimum length of 1. Maximum length of
     *        512 bytes.
     * @param string|StreamInterface|null $annotationPayload The annotation payload. Must be between 1 byte and 1 MiB in
     *        size, and must be valid UTF-8 encoded text. If the payload contains invalid UTF-8 bytes, the request fails
     * with HTTP
     *        415 (Unsupported Media Type). To store binary data, encode the payload using Base64 before uploading.
     * @param ?string $versionId The version ID of the object to attach the annotation to.
     * @param ?string $objectIfMatch If specified, the operation only succeeds if the object's ETag matches the provided
     *        value.
     * @param ?ChecksumAlgorithm $checksumAlgorithm The checksum algorithm to use. Supported values: CRC32, CRC32C,
     *        CRC64NVME, SHA1, SHA256, SHA512, MD5, XXHASH64, XXHASH3, XXHASH128.
     * @param ?string $checksumCRC32 Base64-encoded CRC32 checksum of the annotation payload.
     * @param ?string $checksumCRC32C Base64-encoded CRC32C checksum of the annotation payload.
     * @param ?string $checksumCRC64NVME Base64-encoded CRC64NVME checksum of the annotation payload.
     * @param ?string $checksumSHA1 Base64-encoded SHA1 checksum of the annotation payload.
     * @param ?string $checksumSHA256 Base64-encoded SHA256 checksum of the annotation payload.
     * @param ?string $checksumSHA512 Base64-encoded SHA512 checksum of the annotation payload.
     * @param ?string $checksumMD5 Base64-encoded MD5 checksum of the annotation payload.
     * @param ?string $checksumXXHASH64 Base64-encoded XXHASH64 checksum of the annotation payload.
     * @param ?string $checksumXXHASH3 Base64-encoded XXHASH3 checksum of the annotation payload.
     * @param ?string $checksumXXHASH128 Base64-encoded XXHASH128 checksum of the annotation payload.
     * @param ?string $contentMD5 Base64-encoded MD5 digest of the message.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the bucket is owned by a
     *        different account, the request fails with an HTTP 403 (Access Denied) error.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $annotationName = null,
        public readonly string|StreamInterface|null $annotationPayload = null,
        public readonly ?string $versionId = null,
        public readonly ?string $objectIfMatch = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null,
        public readonly ?string $checksumCRC32 = null,
        public readonly ?string $checksumCRC32C = null,
        public readonly ?string $checksumCRC64NVME = null,
        public readonly ?string $checksumSHA1 = null,
        public readonly ?string $checksumSHA256 = null,
        public readonly ?string $checksumSHA512 = null,
        public readonly ?string $checksumMD5 = null,
        public readonly ?string $checksumXXHASH64 = null,
        public readonly ?string $checksumXXHASH3 = null,
        public readonly ?string $checksumXXHASH128 = null,
        public readonly ?string $contentMD5 = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $expectedBucketOwner = null
    ) {
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
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
        $s = Schemas::putObjectAnnotationRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_ANNOTATION_NAME = $m[2];
        self::$SCHEMA_ANNOTATION_PAYLOAD = $m[3];
        self::$SCHEMA_VERSION_ID = $m[4];
        self::$SCHEMA_OBJECT_IF_MATCH = $m[5];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[6];
        self::$SCHEMA_CHECKSUM_CRC32 = $m[7];
        self::$SCHEMA_CHECKSUM_CRC32_C = $m[8];
        self::$SCHEMA_CHECKSUM_CRC64_NVME = $m[9];
        self::$SCHEMA_CHECKSUM_SHA1 = $m[10];
        self::$SCHEMA_CHECKSUM_SHA256 = $m[11];
        self::$SCHEMA_CHECKSUM_SHA512 = $m[12];
        self::$SCHEMA_CHECKSUM_MD5 = $m[13];
        self::$SCHEMA_CHECKSUM_XXHASH64 = $m[14];
        self::$SCHEMA_CHECKSUM_XXHASH3 = $m[15];
        self::$SCHEMA_CHECKSUM_XXHASH128 = $m[16];
        self::$SCHEMA_CONTENT_MD5 = $m[17];
        self::$SCHEMA_REQUEST_PAYER = $m[18];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[19];
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
        if (isset($this->annotationPayload)) {
            $serializer->serializeBlob(self::$SCHEMA_ANNOTATION_PAYLOAD, $this->annotationPayload, 3);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 4);
        }
        if (isset($this->objectIfMatch)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_IF_MATCH, $this->objectIfMatch, 5);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 6);
        }
        if (isset($this->checksumCRC32)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32, $this->checksumCRC32, 7);
        }
        if (isset($this->checksumCRC32C)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32_C, $this->checksumCRC32C, 8);
        }
        if (isset($this->checksumCRC64NVME)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC64_NVME, $this->checksumCRC64NVME, 9);
        }
        if (isset($this->checksumSHA1)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA1, $this->checksumSHA1, 10);
        }
        if (isset($this->checksumSHA256)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA256, $this->checksumSHA256, 11);
        }
        if (isset($this->checksumSHA512)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA512, $this->checksumSHA512, 12);
        }
        if (isset($this->checksumMD5)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_MD5, $this->checksumMD5, 13);
        }
        if (isset($this->checksumXXHASH64)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH64, $this->checksumXXHASH64, 14);
        }
        if (isset($this->checksumXXHASH3)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH3, $this->checksumXXHASH3, 15);
        }
        if (isset($this->checksumXXHASH128)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH128, $this->checksumXXHASH128, 16);
        }
        if (isset($this->contentMD5)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_MD5, $this->contentMD5, 17);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 18);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 19);
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
            3 => $this->annotationPayload,
            4 => $this->versionId,
            5 => $this->objectIfMatch,
            6 => $this->checksumAlgorithm,
            7 => $this->checksumCRC32,
            8 => $this->checksumCRC32C,
            9 => $this->checksumCRC64NVME,
            10 => $this->checksumSHA1,
            11 => $this->checksumSHA256,
            12 => $this->checksumSHA512,
            13 => $this->checksumMD5,
            14 => $this->checksumXXHASH64,
            15 => $this->checksumXXHASH3,
            16 => $this->checksumXXHASH128,
            17 => $this->contentMD5,
            18 => $this->requestPayer,
            19 => $this->expectedBucketOwner,
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
            $this->annotationPayload,
            $this->versionId,
            $this->objectIfMatch,
            $this->checksumAlgorithm,
            $this->checksumCRC32,
            $this->checksumCRC32C,
            $this->checksumCRC64NVME,
            $this->checksumSHA1,
            $this->checksumSHA256,
            $this->checksumSHA512,
            $this->checksumMD5,
            $this->checksumXXHASH64,
            $this->checksumXXHASH3,
            $this->checksumXXHASH128,
            $this->contentMD5,
            $this->requestPayer,
            $this->expectedBucketOwner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
