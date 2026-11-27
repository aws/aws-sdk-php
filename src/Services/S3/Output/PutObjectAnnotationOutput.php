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
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class PutObjectAnnotationOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PutObjectAnnotationOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_ANNOTATION_NAME;
    private static Schema $SCHEMA_OBJECT_VERSION_ID;
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
    private static Schema $SCHEMA_REQUEST_CHARGED;

    public readonly ?ChecksumType $checksumType;
    public readonly ?ServerSideEncryption $serverSideEncryption;
    public readonly ?RequestCharged $requestCharged;

    /**
     * @param ?string $key The object key.
     * @param ?string $annotationName The name of the annotation.
     * @param ?string $objectVersionId The version ID of the object that the annotation was attached to.
     * @param ?string $eTag The entity tag of the annotation.
     * @param ?string $checksumCRC32 The CRC32 checksum of the stored annotation.
     * @param ?string $checksumCRC32C The CRC32C checksum of the stored annotation.
     * @param ?string $checksumCRC64NVME The CRC64NVME checksum of the stored annotation.
     * @param ?string $checksumSHA1 The SHA1 checksum of the stored annotation.
     * @param ?string $checksumSHA256 The SHA256 checksum of the stored annotation.
     * @param ?string $checksumSHA512 The SHA512 checksum of the stored annotation.
     * @param ?string $checksumMD5 The MD5 checksum of the stored annotation.
     * @param ?string $checksumXXHASH64 The XXHASH64 checksum of the stored annotation.
     * @param ?string $checksumXXHASH3 The XXHASH3 checksum of the stored annotation.
     * @param ?string $checksumXXHASH128 The XXHASH128 checksum of the stored annotation.
     * @param ?ChecksumType $checksumType The type of checksum used.
     * @param ?ServerSideEncryption $serverSideEncryption The server-side encryption algorithm used to encrypt the
     *        annotation.
     */
    public function __construct(
        public readonly ?string $key = null,
        public readonly ?string $annotationName = null,
        public readonly ?string $objectVersionId = null,
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
        $s = Schemas::putObjectAnnotationOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_KEY = $m[0];
        self::$SCHEMA_ANNOTATION_NAME = $m[1];
        self::$SCHEMA_OBJECT_VERSION_ID = $m[2];
        self::$SCHEMA_E_TAG = $m[3];
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
        self::$SCHEMA_CHECKSUM_TYPE = $m[14];
        self::$SCHEMA_SERVER_SIDE_ENCRYPTION = $m[15];
        self::$SCHEMA_REQUEST_CHARGED = $m[16];
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
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 0);
        }
        if (isset($this->annotationName)) {
            $serializer->serializeString(self::$SCHEMA_ANNOTATION_NAME, $this->annotationName, 1);
        }
        if (isset($this->objectVersionId)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_VERSION_ID, $this->objectVersionId, 2);
        }
        if (isset($this->eTag)) {
            $serializer->serializeString(self::$SCHEMA_E_TAG, $this->eTag, 3);
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
        if (isset($this->checksumType)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_TYPE, $this->checksumType->value, 14);
        }
        if (isset($this->serverSideEncryption)) {
            $serializer->serializeString(self::$SCHEMA_SERVER_SIDE_ENCRYPTION, $this->serverSideEncryption->value, 15);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 16);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->key,
            1 => $this->annotationName,
            2 => $this->objectVersionId,
            3 => $this->eTag,
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
            14 => $this->checksumType,
            15 => $this->serverSideEncryption,
            16 => $this->requestCharged,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->key,
            $this->annotationName,
            $this->objectVersionId,
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
            $this->requestCharged
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
