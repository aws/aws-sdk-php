<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumType;
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
final class CompleteMultipartUploadOutput implements SerializableStructInterface, \ArrayAccess, JsonSerializable
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CompleteMultipartUploadOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_LOCATION;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_EXPIRATION;
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
    private static Schema $SCHEMA_CHECKSUM_TYPE;
    private static Schema $SCHEMA_SERVER_SIDE_ENCRYPTION;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_SSEKMS_KEY_ID;
    private static Schema $SCHEMA_BUCKET_KEY_ENABLED;
    private static Schema $SCHEMA_REQUEST_CHARGED;

    public readonly ?ChecksumType $checksumType;
    public readonly ?ServerSideEncryption $serverSideEncryption;
    public readonly ?RequestCharged $requestCharged;

    /**
     * @param ?string $location The URI that identifies the newly created object.
     * @param ?string $bucket The name of the bucket that contains the newly created object. Does not return the access
     *        point ARN or access point alias if used. Access points are not supported by directory buckets.
     * @param ?string $key The object key of the newly created object.
     * @param ?string $expiration If the object expiration is configured, this will contain the expiration date
     *        (expiry-date) and rule ID (rule-id). The value of rule-id is URL-encoded. This functionality is not supported
     * for
     *        directory buckets.
     * @param ?string $eTag Entity tag that identifies the newly created object's data. Objects with different object data
     *        will have different entity tags. The entity tag is an opaque string. The entity tag may or may not be an MD5
     * digest
     *        of the object data. If the entity tag is not an MD5 digest of the object data, it will contain one or more
     *        nonhexadecimal characters and/or will consist of less than 32 or more than 32 hexadecimal digits. For more
     *        information about how the entity tag is calculated, see Checking object integrity in the Amazon S3 User Guide.
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
     * @param ?string $checksumCRC64NVME This header can be used as a data integrity check to verify that the data received
     *        is the same data that was originally sent. This header specifies the Base64 encoded, 64-bit CRC64NVME checksum
     * of the
     *        object. The CRC64NVME checksum is always a full object checksum. For more information, see Checking object
     * integrity
     *        in the Amazon S3 User Guide.
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
     * @param ?string $checksumSHA512 The Base64 encoded, 512-bit SHA512 digest of the object. For more information, see
     *        Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumMD5 The Base64 encoded, 128-bit MD5 digest of the object. For more information, see Checking
     *        object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH64 The Base64 encoded, 64-bit XXHASH64 checksum of the object. For more information,
     *        see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH3 The Base64 encoded, 64-bit XXHASH3 checksum of the object. For more information, see
     *        Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH128 The Base64 encoded, 128-bit XXHASH128 checksum of the object. For more information,
     *        see Checking object integrity in the Amazon S3 User Guide.
     * @param ?ChecksumType $checksumType The checksum type, which determines how part-level checksums are combined to
     *        create an object-level checksum for multipart objects. You can use this header as a data integrity check to
     * verify
     *        that the checksum type that is received is the same checksum type that was specified during the
     * CreateMultipartUpload
     *        request. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?ServerSideEncryption $serverSideEncryption The server-side encryption algorithm used when storing this object
     *        in Amazon S3. When accessing data stored in Amazon FSx file systems using S3 access points, the only valid
     * server
     *        side encryption option is aws:fsx.
     * @param ?string $versionId Version ID of the newly created object, in case the bucket has versioning turned on. This
     *        functionality is not supported for directory buckets.
     * @param ?string $sSEKMSKeyId If present, indicates the ID of the KMS key that was used for object encryption.
     * @param ?bool $bucketKeyEnabled Indicates whether the multipart upload uses an S3 Bucket Key for server-side
     *        encryption with Key Management Service (KMS) keys (SSE-KMS).
     */
    public function __construct(
        public readonly ?string $location = null,
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $expiration = null,
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
        ChecksumType|string|null $checksumType = null,
        ServerSideEncryption|string|null $serverSideEncryption = null,
        public readonly ?string $versionId = null,
        /** @sensitive */
        public readonly ?string $sSEKMSKeyId = null,
        public readonly ?bool $bucketKeyEnabled = null,
        RequestCharged|string|null $requestCharged = null
    ) {
        $this->checksumType = $checksumType === null || $checksumType instanceof ChecksumType ? $checksumType : ChecksumType::fromValue($checksumType);
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
        $s = Schemas::completeMultipartUploadOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_LOCATION = $m[0];
        self::$SCHEMA_BUCKET = $m[1];
        self::$SCHEMA_KEY = $m[2];
        self::$SCHEMA_EXPIRATION = $m[3];
        self::$SCHEMA_E_TAG = $m[4];
        self::$SCHEMA_CHECKSUM_CRC32 = $m[5];
        self::$SCHEMA_CHECKSUM_CRC32_C = $m[6];
        self::$SCHEMA_CHECKSUM_CRC64_NVME = $m[7];
        self::$SCHEMA_CHECKSUM_SHA1 = $m[8];
        self::$SCHEMA_CHECKSUM_SHA256 = $m[9];
        self::$SCHEMA_CHECKSUM_SHA512 = $m[10];
        self::$SCHEMA_CHECKSUM_MD5 = $m[11];
        self::$SCHEMA_CHECKSUM_XXHASH64 = $m[12];
        self::$SCHEMA_CHECKSUM_XXHASH3 = $m[13];
        self::$SCHEMA_CHECKSUM_XXHASH128 = $m[14];
        self::$SCHEMA_CHECKSUM_TYPE = $m[15];
        self::$SCHEMA_SERVER_SIDE_ENCRYPTION = $m[16];
        self::$SCHEMA_VERSION_ID = $m[17];
        self::$SCHEMA_SSEKMS_KEY_ID = $m[18];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[19];
        self::$SCHEMA_REQUEST_CHARGED = $m[20];
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
        if (isset($this->location)) {
            $serializer->serializeString(self::$SCHEMA_LOCATION, $this->location, 0);
        }
        if (isset($this->bucket)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET, $this->bucket, 1);
        }
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 2);
        }
        if (isset($this->expiration)) {
            $serializer->serializeString(self::$SCHEMA_EXPIRATION, $this->expiration, 3);
        }
        if (isset($this->eTag)) {
            $serializer->serializeString(self::$SCHEMA_E_TAG, $this->eTag, 4);
        }
        if (isset($this->checksumCRC32)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32, $this->checksumCRC32, 5);
        }
        if (isset($this->checksumCRC32C)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32_C, $this->checksumCRC32C, 6);
        }
        if (isset($this->checksumCRC64NVME)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC64_NVME, $this->checksumCRC64NVME, 7);
        }
        if (isset($this->checksumSHA1)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA1, $this->checksumSHA1, 8);
        }
        if (isset($this->checksumSHA256)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA256, $this->checksumSHA256, 9);
        }
        if (isset($this->checksumSHA512)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA512, $this->checksumSHA512, 10);
        }
        if (isset($this->checksumMD5)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_MD5, $this->checksumMD5, 11);
        }
        if (isset($this->checksumXXHASH64)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH64, $this->checksumXXHASH64, 12);
        }
        if (isset($this->checksumXXHASH3)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH3, $this->checksumXXHASH3, 13);
        }
        if (isset($this->checksumXXHASH128)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH128, $this->checksumXXHASH128, 14);
        }
        if (isset($this->checksumType)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_TYPE, $this->checksumType->value, 15);
        }
        if (isset($this->serverSideEncryption)) {
            $serializer->serializeString(self::$SCHEMA_SERVER_SIDE_ENCRYPTION, $this->serverSideEncryption->value, 16);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 17);
        }
        if (isset($this->sSEKMSKeyId)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_KEY_ID, $this->sSEKMSKeyId, 18);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 19);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 20);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->location,
            1 => $this->bucket,
            2 => $this->key,
            3 => $this->expiration,
            4 => $this->eTag,
            5 => $this->checksumCRC32,
            6 => $this->checksumCRC32C,
            7 => $this->checksumCRC64NVME,
            8 => $this->checksumSHA1,
            9 => $this->checksumSHA256,
            10 => $this->checksumSHA512,
            11 => $this->checksumMD5,
            12 => $this->checksumXXHASH64,
            13 => $this->checksumXXHASH3,
            14 => $this->checksumXXHASH128,
            15 => $this->checksumType,
            16 => $this->serverSideEncryption,
            17 => $this->versionId,
            18 => $this->sSEKMSKeyId,
            19 => $this->bucketKeyEnabled,
            20 => $this->requestCharged,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->location,
            $this->bucket,
            $this->key,
            $this->expiration,
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
            $this->checksumType,
            $this->serverSideEncryption,
            $this->versionId,
            $this->sSEKMSKeyId,
            $this->bucketKeyEnabled,
            $this->requestCharged
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
