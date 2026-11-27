<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumType;
use Aws\Services\S3\Shape\ReplicationStatus;
use Aws\Services\S3\Shape\RequestCharged;
use Aws\Services\S3\Shape\ServerSideEncryption;
use Psr\Http\Message\StreamInterface;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class GetObjectAnnotationOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#GetObjectAnnotationOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ANNOTATION_PAYLOAD;
    private static Schema $SCHEMA_OBJECT_VERSION_ID;
    private static Schema $SCHEMA_LAST_MODIFIED;
    private static Schema $SCHEMA_CONTENT_LENGTH;
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
    private static Schema $SCHEMA_REPLICATION_STATUS;

    public readonly string|StreamInterface $annotationPayload;
    public readonly ?ChecksumType $checksumType;
    public readonly ?ServerSideEncryption $serverSideEncryption;
    public readonly ?RequestCharged $requestCharged;
    public readonly ?ReplicationStatus $replicationStatus;

    /**
     * @param string|StreamInterface|null $annotationPayload The annotation payload.
     * @param ?string $objectVersionId The version ID of the object that the annotation is attached to.
     * @param ?float $lastModified The date and time the annotation was last modified.
     * @param ?int $contentLength The size of the annotation payload, in bytes.
     * @param ?string $eTag The entity tag of the annotation.
     * @param ?string $checksumCRC32 The CRC32 checksum of the annotation payload.
     * @param ?string $checksumCRC32C The CRC32C checksum of the annotation payload.
     * @param ?string $checksumCRC64NVME The CRC64NVME checksum of the annotation payload.
     * @param ?string $checksumSHA1 The SHA1 checksum of the annotation payload.
     * @param ?string $checksumSHA256 The SHA256 checksum of the annotation payload.
     * @param ?string $checksumSHA512 The SHA512 checksum of the annotation payload.
     * @param ?string $checksumMD5 The MD5 checksum of the annotation payload.
     * @param ?string $checksumXXHASH64 The XXHASH64 checksum of the annotation payload.
     * @param ?string $checksumXXHASH3 The XXHASH3 checksum of the annotation payload.
     * @param ?string $checksumXXHASH128 The XXHASH128 checksum of the annotation payload.
     * @param ?ChecksumType $checksumType The type of checksum used.
     * @param ?ServerSideEncryption $serverSideEncryption The server-side encryption algorithm used.
     * @param ?ReplicationStatus $replicationStatus The replication status of the annotation. Possible values include
     *        PENDING, COMPLETED, FAILED, and REPLICA.
     */
    public function __construct(
        string|StreamInterface|null $annotationPayload = null,
        public readonly ?string $objectVersionId = null,
        public readonly ?float $lastModified = null,
        public readonly ?int $contentLength = null,
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
        RequestCharged|string|null $requestCharged = null,
        ReplicationStatus|string|null $replicationStatus = null
    ) {
        $this->annotationPayload = $annotationPayload ?? '';
        $this->checksumType = $checksumType === null || $checksumType instanceof ChecksumType ? $checksumType : ChecksumType::fromValue($checksumType);
        $this->serverSideEncryption = $serverSideEncryption === null || $serverSideEncryption instanceof ServerSideEncryption ? $serverSideEncryption : ServerSideEncryption::fromValue($serverSideEncryption);
        $this->requestCharged = $requestCharged === null || $requestCharged instanceof RequestCharged ? $requestCharged : RequestCharged::fromValue($requestCharged);
        $this->replicationStatus = $replicationStatus === null || $replicationStatus instanceof ReplicationStatus ? $replicationStatus : ReplicationStatus::fromValue($replicationStatus);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::getObjectAnnotationOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ANNOTATION_PAYLOAD = $m[0];
        self::$SCHEMA_OBJECT_VERSION_ID = $m[1];
        self::$SCHEMA_LAST_MODIFIED = $m[2];
        self::$SCHEMA_CONTENT_LENGTH = $m[3];
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
        self::$SCHEMA_REQUEST_CHARGED = $m[17];
        self::$SCHEMA_REPLICATION_STATUS = $m[18];
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
        $serializer->serializeBlob(self::$SCHEMA_ANNOTATION_PAYLOAD, $this->annotationPayload, 0);
        if (isset($this->objectVersionId)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_VERSION_ID, $this->objectVersionId, 1);
        }
        if (isset($this->lastModified)) {
            $serializer->serializeTimestamp(self::$SCHEMA_LAST_MODIFIED, $this->lastModified, 2);
        }
        if (isset($this->contentLength)) {
            $serializer->serializeInteger(self::$SCHEMA_CONTENT_LENGTH, $this->contentLength, 3);
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
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 17);
        }
        if (isset($this->replicationStatus)) {
            $serializer->serializeString(self::$SCHEMA_REPLICATION_STATUS, $this->replicationStatus->value, 18);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->annotationPayload,
            1 => $this->objectVersionId,
            2 => $this->lastModified,
            3 => $this->contentLength,
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
            17 => $this->requestCharged,
            18 => $this->replicationStatus,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->annotationPayload,
            $this->objectVersionId,
            $this->lastModified,
            $this->contentLength,
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
            $this->requestCharged,
            $this->replicationStatus
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
