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
 * Container for elements related to a part.
 */
final class Part implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Part';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_PART_NUMBER;
    private static Schema $SCHEMA_LAST_MODIFIED;
    private static Schema $SCHEMA_E_TAG;
    private static Schema $SCHEMA_SIZE;
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

    /**
     * @param ?int $partNumber Part number identifying the part. This is a positive integer between 1 and 10,000.
     * @param ?float $lastModified Date and time at which the part was uploaded.
     * @param ?string $eTag Entity tag returned when the part was uploaded.
     * @param ?int $size Size in bytes of the uploaded part data.
     * @param ?string $checksumCRC32 The Base64 encoded, 32-bit CRC32 checksum of the part. This checksum is present if the
     *        object was uploaded with the CRC32 checksum algorithm. For more information, see Checking object integrity in
     * the
     *        Amazon S3 User Guide.
     * @param ?string $checksumCRC32C The Base64 encoded, 32-bit CRC32C checksum of the part. This checksum is present if
     *        the object was uploaded with the CRC32C checksum algorithm. For more information, see Checking object
     * integrity in
     *        the Amazon S3 User Guide.
     * @param ?string $checksumCRC64NVME The Base64 encoded, 64-bit CRC64NVME checksum of the part. This checksum is present
     *        if the multipart upload request was created with the CRC64NVME checksum algorithm, or if the object was
     * uploaded
     *        without a checksum (and Amazon S3 added the default checksum, CRC64NVME, to the uploaded object). For more
     *        information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA1 The Base64 encoded, 160-bit SHA1 checksum of the part. This checksum is present if the
     *        object was uploaded with the SHA1 checksum algorithm. For more information, see Checking object integrity in
     * the
     *        Amazon S3 User Guide.
     * @param ?string $checksumSHA256 The Base64 encoded, 256-bit SHA256 checksum of the part. This checksum is present if
     *        the object was uploaded with the SHA256 checksum algorithm. For more information, see Checking object
     * integrity in
     *        the Amazon S3 User Guide.
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
     */
    public function __construct(
        public readonly ?int $partNumber = null,
        public readonly ?float $lastModified = null,
        public readonly ?string $eTag = null,
        public readonly ?int $size = null,
        public readonly ?string $checksumCRC32 = null,
        public readonly ?string $checksumCRC32C = null,
        public readonly ?string $checksumCRC64NVME = null,
        public readonly ?string $checksumSHA1 = null,
        public readonly ?string $checksumSHA256 = null,
        public readonly ?string $checksumSHA512 = null,
        public readonly ?string $checksumMD5 = null,
        public readonly ?string $checksumXXHASH64 = null,
        public readonly ?string $checksumXXHASH3 = null,
        public readonly ?string $checksumXXHASH128 = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::part();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_PART_NUMBER = $m[0];
        self::$SCHEMA_LAST_MODIFIED = $m[1];
        self::$SCHEMA_E_TAG = $m[2];
        self::$SCHEMA_SIZE = $m[3];
        self::$SCHEMA_CHECKSUM_CRC32 = $m[4];
        self::$SCHEMA_CHECKSUM_CRC32_C = $m[5];
        self::$SCHEMA_CHECKSUM_CRC64_NVME = $m[6];
        self::$SCHEMA_CHECKSUM_SHA1 = $m[7];
        self::$SCHEMA_CHECKSUM_SHA256 = $m[8];
        self::$SCHEMA_CHECKSUM_SHA512 = $m[9];
        self::$SCHEMA_CHECKSUM_MD5 = $m[10];
        self::$SCHEMA_CHECKSUM_XXHASH64 = $m[11];
        self::$SCHEMA_CHECKSUM_XXHASH3 = $m[12];
        self::$SCHEMA_CHECKSUM_XXHASH128 = $m[13];
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
        if (isset($this->partNumber)) {
            $serializer->serializeInteger(self::$SCHEMA_PART_NUMBER, $this->partNumber, 0);
        }
        if (isset($this->lastModified)) {
            $serializer->serializeTimestamp(self::$SCHEMA_LAST_MODIFIED, $this->lastModified, 1);
        }
        if (isset($this->eTag)) {
            $serializer->serializeString(self::$SCHEMA_E_TAG, $this->eTag, 2);
        }
        if (isset($this->size)) {
            $serializer->serializeInteger(self::$SCHEMA_SIZE, $this->size, 3);
        }
        if (isset($this->checksumCRC32)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32, $this->checksumCRC32, 4);
        }
        if (isset($this->checksumCRC32C)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32_C, $this->checksumCRC32C, 5);
        }
        if (isset($this->checksumCRC64NVME)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC64_NVME, $this->checksumCRC64NVME, 6);
        }
        if (isset($this->checksumSHA1)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA1, $this->checksumSHA1, 7);
        }
        if (isset($this->checksumSHA256)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA256, $this->checksumSHA256, 8);
        }
        if (isset($this->checksumSHA512)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA512, $this->checksumSHA512, 9);
        }
        if (isset($this->checksumMD5)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_MD5, $this->checksumMD5, 10);
        }
        if (isset($this->checksumXXHASH64)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH64, $this->checksumXXHASH64, 11);
        }
        if (isset($this->checksumXXHASH3)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH3, $this->checksumXXHASH3, 12);
        }
        if (isset($this->checksumXXHASH128)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH128, $this->checksumXXHASH128, 13);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->partNumber,
            1 => $this->lastModified,
            2 => $this->eTag,
            3 => $this->size,
            4 => $this->checksumCRC32,
            5 => $this->checksumCRC32C,
            6 => $this->checksumCRC64NVME,
            7 => $this->checksumSHA1,
            8 => $this->checksumSHA256,
            9 => $this->checksumSHA512,
            10 => $this->checksumMD5,
            11 => $this->checksumXXHASH64,
            12 => $this->checksumXXHASH3,
            13 => $this->checksumXXHASH128,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->partNumber,
            $this->lastModified,
            $this->eTag,
            $this->size,
            $this->checksumCRC32,
            $this->checksumCRC32C,
            $this->checksumCRC64NVME,
            $this->checksumSHA1,
            $this->checksumSHA256,
            $this->checksumSHA512,
            $this->checksumMD5,
            $this->checksumXXHASH64,
            $this->checksumXXHASH3,
            $this->checksumXXHASH128
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
