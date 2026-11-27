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
 * Details of the parts that were uploaded.
 */
final class CompletedPart implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CompletedPart';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_E_TAG;
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
    private static Schema $SCHEMA_PART_NUMBER;

    /**
     * @param ?string $eTag Entity tag returned when the part was uploaded.
     * @param ?string $checksumCRC32 The Base64 encoded, 32-bit CRC32 checksum of the part. This checksum is present if the
     *        multipart upload request was created with the CRC32 checksum algorithm. For more information, see Checking
     * object
     *        integrity in the Amazon S3 User Guide.
     * @param ?string $checksumCRC32C The Base64 encoded, 32-bit CRC32C checksum of the part. This checksum is present if
     *        the multipart upload request was created with the CRC32C checksum algorithm. For more information, see
     * Checking
     *        object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumCRC64NVME The Base64 encoded, 64-bit CRC64NVME checksum of the part. This checksum is present
     *        if the multipart upload request was created with the CRC64NVME checksum algorithm. For more information, see
     * Checking
     *        object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA1 The Base64 encoded, 160-bit SHA1 checksum of the part. This checksum is present if the
     *        multipart upload request was created with the SHA1 checksum algorithm. For more information, see Checking
     * object
     *        integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA256 The Base64 encoded, 256-bit SHA256 checksum of the part. This checksum is present if
     *        the multipart upload request was created with the SHA256 checksum algorithm. For more information, see
     * Checking
     *        object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA512 The Base64 encoded, 512-bit SHA512 digest of the part. This checksum is present if the
     *        multipart upload request was created with the SHA512 checksum algorithm. For more information, see Checking
     * object
     *        integrity in the Amazon S3 User Guide.
     * @param ?string $checksumMD5 The Base64 encoded, 128-bit MD5 digest of the part. This checksum is present if the
     *        multipart upload request was created with the MD5 checksum algorithm. For more information, see Checking
     * object
     *        integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH64 The Base64 encoded, 64-bit XXHASH64 checksum of the part. This checksum is present
     *        if the multipart upload request was created with the XXHASH64 checksum algorithm. For more information, see
     * Checking
     *        object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH3 The Base64 encoded, 64-bit XXHASH3 checksum of the part. This checksum is present if
     *        the multipart upload request was created with the XXHASH3 checksum algorithm. For more information, see
     * Checking
     *        object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH128 The Base64 encoded, 128-bit XXHASH128 checksum of the part. This checksum is
     *        present if the multipart upload request was created with the XXHASH128 checksum algorithm. For more
     * information, see
     *        Checking object integrity in the Amazon S3 User Guide.
     * @param ?int $partNumber Part number that identifies the part. This is a positive integer between 1 and 10,000.
     *        General purpose buckets - In CompleteMultipartUpload, when a additional checksum (including
     * x-amz-checksum-crc32,
     *        x-amz-checksum-crc32c, x-amz-checksum-sha1, or x-amz-checksum-sha256) is applied to each part, the PartNumber
     * must
     *        start at 1 and the part numbers must be consecutive. Otherwise, Amazon S3 generates an HTTP 400 Bad Request
     * status
     *        code and an InvalidPartOrder error code. Directory buckets - In CompleteMultipartUpload, the PartNumber must
     * start at
     *        1 and the part numbers must be consecutive.
     */
    public function __construct(
        public readonly ?string $eTag = null,
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
        public readonly ?int $partNumber = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::completedPart();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_E_TAG = $m[0];
        self::$SCHEMA_CHECKSUM_CRC32 = $m[1];
        self::$SCHEMA_CHECKSUM_CRC32_C = $m[2];
        self::$SCHEMA_CHECKSUM_CRC64_NVME = $m[3];
        self::$SCHEMA_CHECKSUM_SHA1 = $m[4];
        self::$SCHEMA_CHECKSUM_SHA256 = $m[5];
        self::$SCHEMA_CHECKSUM_SHA512 = $m[6];
        self::$SCHEMA_CHECKSUM_MD5 = $m[7];
        self::$SCHEMA_CHECKSUM_XXHASH64 = $m[8];
        self::$SCHEMA_CHECKSUM_XXHASH3 = $m[9];
        self::$SCHEMA_CHECKSUM_XXHASH128 = $m[10];
        self::$SCHEMA_PART_NUMBER = $m[11];
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
        if (isset($this->eTag)) {
            $serializer->serializeString(self::$SCHEMA_E_TAG, $this->eTag, 0);
        }
        if (isset($this->checksumCRC32)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32, $this->checksumCRC32, 1);
        }
        if (isset($this->checksumCRC32C)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32_C, $this->checksumCRC32C, 2);
        }
        if (isset($this->checksumCRC64NVME)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC64_NVME, $this->checksumCRC64NVME, 3);
        }
        if (isset($this->checksumSHA1)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA1, $this->checksumSHA1, 4);
        }
        if (isset($this->checksumSHA256)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA256, $this->checksumSHA256, 5);
        }
        if (isset($this->checksumSHA512)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA512, $this->checksumSHA512, 6);
        }
        if (isset($this->checksumMD5)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_MD5, $this->checksumMD5, 7);
        }
        if (isset($this->checksumXXHASH64)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH64, $this->checksumXXHASH64, 8);
        }
        if (isset($this->checksumXXHASH3)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH3, $this->checksumXXHASH3, 9);
        }
        if (isset($this->checksumXXHASH128)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH128, $this->checksumXXHASH128, 10);
        }
        if (isset($this->partNumber)) {
            $serializer->serializeInteger(self::$SCHEMA_PART_NUMBER, $this->partNumber, 11);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->eTag,
            1 => $this->checksumCRC32,
            2 => $this->checksumCRC32C,
            3 => $this->checksumCRC64NVME,
            4 => $this->checksumSHA1,
            5 => $this->checksumSHA256,
            6 => $this->checksumSHA512,
            7 => $this->checksumMD5,
            8 => $this->checksumXXHASH64,
            9 => $this->checksumXXHASH3,
            10 => $this->checksumXXHASH128,
            11 => $this->partNumber,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->eTag,
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
            $this->partNumber
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
