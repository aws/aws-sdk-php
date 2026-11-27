<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\RequestCharged;
use Aws\Services\S3\Shape\ServerSideEncryption;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class UploadPartOutput implements SerializableStructInterface, \ArrayAccess, JsonSerializable
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#UploadPartOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_SERVER_SIDE_ENCRYPTION;
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
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_SSEKMS_KEY_ID;
    private static Schema $SCHEMA_BUCKET_KEY_ENABLED;
    private static Schema $SCHEMA_REQUEST_CHARGED;
    private static Schema $SCHEMA_VERSION_ID;

    public readonly ?ServerSideEncryption $serverSideEncryption;
    public readonly ?RequestCharged $requestCharged;

    /**
     * @param ?ServerSideEncryption $serverSideEncryption The server-side encryption algorithm used when you store this
     *        object in Amazon S3 or Amazon FSx. When accessing data stored in Amazon FSx file systems using S3 access
     * points, the
     *        only valid server side encryption option is aws:fsx.
     * @param ?string $eTag Entity tag for the uploaded object.
     * @param ?string $checksumCRC32 The Base64 encoded, 32-bit CRC32 checksum of the part. This will only be present if the
     *        checksum was provided in the request. For more information, see Checking object integrity in the Amazon S3
     * User
     *        Guide.
     * @param ?string $checksumCRC32C The Base64 encoded, 32-bit CRC32C checksum of the part. This will only be present if
     *        the checksum was provided in the request. For more information, see Checking object integrity in the Amazon S3
     * User
     *        Guide.
     * @param ?string $checksumCRC64NVME The Base64 encoded, 64-bit CRC64NVME checksum of the part. This will only be
     *        present if the checksum was provided in the request. For more information, see Checking object integrity in
     * the
     *        Amazon S3 User Guide.
     * @param ?string $checksumSHA1 The Base64 encoded, 160-bit SHA1 checksum of the part. This will only be present if the
     *        checksum was provided in the request. For more information, see Checking object integrity in the Amazon S3
     * User
     *        Guide.
     * @param ?string $checksumSHA256 The Base64 encoded, 256-bit SHA256 checksum of the part. This will only be present if
     *        the checksum was provided in the request. For more information, see Checking object integrity in the Amazon S3
     * User
     *        Guide.
     * @param ?string $checksumSHA512 The Base64 encoded, 512-bit SHA512 checksum of the part. This will only be present if
     *        the checksum was provided in the request. For more information, see Checking object integrity in the Amazon S3
     * User
     *        Guide.
     * @param ?string $checksumMD5 The Base64 encoded, 128-bit MD5 checksum of the part. This will only be present if the
     *        checksum was provided in the request. For more information, see Checking object integrity in the Amazon S3
     * User
     *        Guide.
     * @param ?string $checksumXXHASH64 The Base64 encoded, 64-bit XXHASH64 checksum of the part. This will only be present
     *        if the checksum was provided in the request. For more information, see Checking object integrity in the Amazon
     * S3
     *        User Guide.
     * @param ?string $checksumXXHASH3 The Base64 encoded, 64-bit XXHASH3 checksum of the part. This will only be present if
     *        the checksum was provided in the request. For more information, see Checking object integrity in the Amazon S3
     * User
     *        Guide.
     * @param ?string $checksumXXHASH128 The Base64 encoded, 128-bit XXHASH128 checksum of the part. This will only be
     *        present if the checksum was provided in the request. For more information, see Checking object integrity in
     * the
     *        Amazon S3 User Guide.
     * @param ?string $sSECustomerAlgorithm If server-side encryption with a customer-provided encryption key was requested,
     *        the response will include this header to confirm the encryption algorithm that's used. This functionality is
     * not
     *        supported for directory buckets.
     * @param ?string $sSECustomerKeyMD5 If server-side encryption with a customer-provided encryption key was requested,
     *        the response will include this header to provide the round-trip message integrity verification of the
     *        customer-provided encryption key. This functionality is not supported for directory buckets.
     * @param ?string $sSEKMSKeyId If present, indicates the ID of the KMS key that was used for object encryption.
     * @param ?bool $bucketKeyEnabled Indicates whether the multipart upload uses an S3 Bucket Key for server-side
     *        encryption with Key Management Service (KMS) keys (SSE-KMS).
     * @param ?string $versionId Version ID of the object. Returns the Version ID of the object for the uploaded part, if
     *        bucket versioning is enabled. This functionality is not supported for directory buckets.
     */
    public function __construct(
        ServerSideEncryption|string|null $serverSideEncryption = null,
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
        public readonly ?string $sSECustomerAlgorithm = null,
        public readonly ?string $sSECustomerKeyMD5 = null,
        /** @sensitive */
        public readonly ?string $sSEKMSKeyId = null,
        public readonly ?bool $bucketKeyEnabled = null,
        RequestCharged|string|null $requestCharged = null,
        public readonly ?string $versionId = null
    ) {
        $this->serverSideEncryption = $serverSideEncryption === null || $serverSideEncryption instanceof ServerSideEncryption ? $serverSideEncryption : ServerSideEncryption::fromValue($serverSideEncryption);
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
        $s = Schemas::uploadPartOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_SERVER_SIDE_ENCRYPTION = $m[0];
        self::$SCHEMA_E_TAG = $m[1];
        self::$SCHEMA_CHECKSUM_CRC32 = $m[2];
        self::$SCHEMA_CHECKSUM_CRC32_C = $m[3];
        self::$SCHEMA_CHECKSUM_CRC64_NVME = $m[4];
        self::$SCHEMA_CHECKSUM_SHA1 = $m[5];
        self::$SCHEMA_CHECKSUM_SHA256 = $m[6];
        self::$SCHEMA_CHECKSUM_SHA512 = $m[7];
        self::$SCHEMA_CHECKSUM_MD5 = $m[8];
        self::$SCHEMA_CHECKSUM_XXHASH64 = $m[9];
        self::$SCHEMA_CHECKSUM_XXHASH3 = $m[10];
        self::$SCHEMA_CHECKSUM_XXHASH128 = $m[11];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[12];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[13];
        self::$SCHEMA_SSEKMS_KEY_ID = $m[14];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[15];
        self::$SCHEMA_REQUEST_CHARGED = $m[16];
        self::$SCHEMA_VERSION_ID = $m[17];
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
        if (isset($this->serverSideEncryption)) {
            $serializer->serializeString(self::$SCHEMA_SERVER_SIDE_ENCRYPTION, $this->serverSideEncryption->value, 0);
        }
        if (isset($this->eTag)) {
            $serializer->serializeString(self::$SCHEMA_E_TAG, $this->eTag, 1);
        }
        if (isset($this->checksumCRC32)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32, $this->checksumCRC32, 2);
        }
        if (isset($this->checksumCRC32C)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32_C, $this->checksumCRC32C, 3);
        }
        if (isset($this->checksumCRC64NVME)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC64_NVME, $this->checksumCRC64NVME, 4);
        }
        if (isset($this->checksumSHA1)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA1, $this->checksumSHA1, 5);
        }
        if (isset($this->checksumSHA256)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA256, $this->checksumSHA256, 6);
        }
        if (isset($this->checksumSHA512)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA512, $this->checksumSHA512, 7);
        }
        if (isset($this->checksumMD5)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_MD5, $this->checksumMD5, 8);
        }
        if (isset($this->checksumXXHASH64)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH64, $this->checksumXXHASH64, 9);
        }
        if (isset($this->checksumXXHASH3)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH3, $this->checksumXXHASH3, 10);
        }
        if (isset($this->checksumXXHASH128)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH128, $this->checksumXXHASH128, 11);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 12);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 13);
        }
        if (isset($this->sSEKMSKeyId)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_KEY_ID, $this->sSEKMSKeyId, 14);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 15);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 16);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 17);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->serverSideEncryption,
            1 => $this->eTag,
            2 => $this->checksumCRC32,
            3 => $this->checksumCRC32C,
            4 => $this->checksumCRC64NVME,
            5 => $this->checksumSHA1,
            6 => $this->checksumSHA256,
            7 => $this->checksumSHA512,
            8 => $this->checksumMD5,
            9 => $this->checksumXXHASH64,
            10 => $this->checksumXXHASH3,
            11 => $this->checksumXXHASH128,
            12 => $this->sSECustomerAlgorithm,
            13 => $this->sSECustomerKeyMD5,
            14 => $this->sSEKMSKeyId,
            15 => $this->bucketKeyEnabled,
            16 => $this->requestCharged,
            17 => $this->versionId,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->serverSideEncryption,
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
            $this->sSECustomerAlgorithm,
            $this->sSECustomerKeyMD5,
            $this->sSEKMSKeyId,
            $this->bucketKeyEnabled,
            $this->requestCharged,
            $this->versionId
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
