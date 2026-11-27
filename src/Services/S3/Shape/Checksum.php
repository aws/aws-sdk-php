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
 * Contains all the possible checksum or digest values for an object.
 */
final class Checksum implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Checksum';

    private static Schema $SCHEMA;
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
    private static Schema $SCHEMA_CHECKSUM_TYPE;

    public readonly ?ChecksumType $checksumType;

    /**
     * @param ?string $checksumCRC32 The Base64 encoded, 32-bit CRC32 checksum of the object. This checksum is only present
     *        if the checksum was uploaded with the object. When you use an API operation on an object that was uploaded
     * using
     *        multipart uploads, this value may not be a direct checksum value of the full object. Instead, it's a
     * calculation
     *        based on the checksum values of each individual part. For more information about how checksums are calculated
     * with
     *        multipart uploads, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumCRC32C The Base64 encoded, 32-bit CRC32C checksum of the object. This checksum is only
     *        present if the checksum was uploaded with the object. When you use an API operation on an object that was
     * uploaded
     *        using multipart uploads, this value may not be a direct checksum value of the full object. Instead, it's a
     *        calculation based on the checksum values of each individual part. For more information about how checksums are
     *        calculated with multipart uploads, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumCRC64NVME The Base64 encoded, 64-bit CRC64NVME checksum of the object. This checksum is
     *        present if the object was uploaded with the CRC64NVME checksum algorithm, or if the object was uploaded
     * without a
     *        checksum (and Amazon S3 added the default checksum, CRC64NVME, to the uploaded object). For more information,
     * see
     *        Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA1 The Base64 encoded, 160-bit SHA1 digest of the object. This checksum is only present if
     *        the checksum was uploaded with the object. When you use the API operation on an object that was uploaded using
     *        multipart uploads, this value may not be a direct checksum value of the full object. Instead, it's a
     * calculation
     *        based on the checksum values of each individual part. For more information about how checksums are calculated
     * with
     *        multipart uploads, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA256 The Base64 encoded, 256-bit SHA256 digest of the object. This checksum is only present
     *        if the checksum was uploaded with the object. When you use an API operation on an object that was uploaded
     * using
     *        multipart uploads, this value may not be a direct checksum value of the full object. Instead, it's a
     * calculation
     *        based on the checksum values of each individual part. For more information about how checksums are calculated
     * with
     *        multipart uploads, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA512 The Base64 encoded, 512-bit SHA512 digest of the object. This checksum is present if
     *        the object was uploaded with the SHA512 checksum algorithm. For more information, see Checking object
     * integrity in
     *        the Amazon S3 User Guide.
     * @param ?string $checksumMD5 The Base64 encoded, 128-bit MD5 digest of the object. This checksum is present if the
     *        object was uploaded with the MD5 checksum algorithm. For more information, see Checking object integrity in
     * the
     *        Amazon S3 User Guide.
     * @param ?string $checksumXXHASH64 The Base64 encoded, 64-bit XXHASH64 checksum of the object. This checksum is present
     *        if the object was uploaded with the XXHASH64 checksum algorithm. For more information, see Checking object
     * integrity
     *        in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH3 The Base64 encoded, 64-bit XXHASH3 checksum of the object. This checksum is present
     *        if the object was uploaded with the XXHASH3 checksum algorithm. For more information, see Checking object
     * integrity
     *        in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH128 The Base64 encoded, 128-bit XXHASH128 checksum of the object. This checksum is
     *        present if the object was uploaded with the XXHASH128 checksum algorithm. For more information, see Checking
     * object
     *        integrity in the Amazon S3 User Guide.
     * @param ?ChecksumType $checksumType The checksum type that is used to calculate the object’s checksum value. For
     *        more information, see Checking object integrity in the Amazon S3 User Guide.
     */
    public function __construct(
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
        ChecksumType|string|null $checksumType = null
    ) {
        $this->checksumType = $checksumType === null || $checksumType instanceof ChecksumType ? $checksumType : ChecksumType::fromValue($checksumType);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::checksum();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_CHECKSUM_CRC32 = $m[0];
        self::$SCHEMA_CHECKSUM_CRC32_C = $m[1];
        self::$SCHEMA_CHECKSUM_CRC64_NVME = $m[2];
        self::$SCHEMA_CHECKSUM_SHA1 = $m[3];
        self::$SCHEMA_CHECKSUM_SHA256 = $m[4];
        self::$SCHEMA_CHECKSUM_SHA512 = $m[5];
        self::$SCHEMA_CHECKSUM_MD5 = $m[6];
        self::$SCHEMA_CHECKSUM_XXHASH64 = $m[7];
        self::$SCHEMA_CHECKSUM_XXHASH3 = $m[8];
        self::$SCHEMA_CHECKSUM_XXHASH128 = $m[9];
        self::$SCHEMA_CHECKSUM_TYPE = $m[10];
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
        if (isset($this->checksumCRC32)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32, $this->checksumCRC32, 0);
        }
        if (isset($this->checksumCRC32C)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32_C, $this->checksumCRC32C, 1);
        }
        if (isset($this->checksumCRC64NVME)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC64_NVME, $this->checksumCRC64NVME, 2);
        }
        if (isset($this->checksumSHA1)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA1, $this->checksumSHA1, 3);
        }
        if (isset($this->checksumSHA256)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA256, $this->checksumSHA256, 4);
        }
        if (isset($this->checksumSHA512)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA512, $this->checksumSHA512, 5);
        }
        if (isset($this->checksumMD5)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_MD5, $this->checksumMD5, 6);
        }
        if (isset($this->checksumXXHASH64)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH64, $this->checksumXXHASH64, 7);
        }
        if (isset($this->checksumXXHASH3)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH3, $this->checksumXXHASH3, 8);
        }
        if (isset($this->checksumXXHASH128)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH128, $this->checksumXXHASH128, 9);
        }
        if (isset($this->checksumType)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_TYPE, $this->checksumType->value, 10);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->checksumCRC32,
            1 => $this->checksumCRC32C,
            2 => $this->checksumCRC64NVME,
            3 => $this->checksumSHA1,
            4 => $this->checksumSHA256,
            5 => $this->checksumSHA512,
            6 => $this->checksumMD5,
            7 => $this->checksumXXHASH64,
            8 => $this->checksumXXHASH3,
            9 => $this->checksumXXHASH128,
            10 => $this->checksumType,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
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
            $this->checksumType
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
