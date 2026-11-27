<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\CopyPartResult;
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
final class UploadPartCopyOutput implements SerializableStructInterface, \ArrayAccess, JsonSerializable
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#UploadPartCopyOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_COPY_SOURCE_VERSION_ID;
    private static Schema $SCHEMA_COPY_PART_RESULT;
    private static Schema $SCHEMA_SERVER_SIDE_ENCRYPTION;
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_SSEKMS_KEY_ID;
    private static Schema $SCHEMA_BUCKET_KEY_ENABLED;
    private static Schema $SCHEMA_REQUEST_CHARGED;
    private static Schema $SCHEMA_VERSION_ID;

    public readonly ?ServerSideEncryption $serverSideEncryption;
    public readonly ?RequestCharged $requestCharged;

    /**
     * @param ?string $copySourceVersionId The version of the source object that was copied, if you have enabled versioning
     *        on the source bucket. This functionality is not supported when the source object is in a directory bucket.
     * @param ?CopyPartResult $copyPartResult Container for all response elements.
     * @param ?ServerSideEncryption $serverSideEncryption The server-side encryption algorithm used when you store this
     *        object in Amazon S3 or Amazon FSx. When accessing data stored in Amazon FSx file systems using S3 access
     * points, the
     *        only valid server side encryption option is aws:fsx.
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
     * @param ?string $versionId Version ID of the object. Returns the Version ID of the object for the copied part, if
     *        bucket versioning is enabled. This functionality is not supported for directory buckets.
     */
    public function __construct(
        public readonly ?string $copySourceVersionId = null,
        public readonly ?CopyPartResult $copyPartResult = null,
        ServerSideEncryption|string|null $serverSideEncryption = null,
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
        $s = Schemas::uploadPartCopyOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_COPY_SOURCE_VERSION_ID = $m[0];
        self::$SCHEMA_COPY_PART_RESULT = $m[1];
        self::$SCHEMA_SERVER_SIDE_ENCRYPTION = $m[2];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[3];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[4];
        self::$SCHEMA_SSEKMS_KEY_ID = $m[5];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[6];
        self::$SCHEMA_REQUEST_CHARGED = $m[7];
        self::$SCHEMA_VERSION_ID = $m[8];
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
        if (isset($this->copySourceVersionId)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE_VERSION_ID, $this->copySourceVersionId, 0);
        }
        if (isset($this->copyPartResult)) {
            $serializer->serializeStruct(self::$SCHEMA_COPY_PART_RESULT, $this->copyPartResult, 1);
        }
        if (isset($this->serverSideEncryption)) {
            $serializer->serializeString(self::$SCHEMA_SERVER_SIDE_ENCRYPTION, $this->serverSideEncryption->value, 2);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 3);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 4);
        }
        if (isset($this->sSEKMSKeyId)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_KEY_ID, $this->sSEKMSKeyId, 5);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 6);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 7);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 8);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->copySourceVersionId,
            1 => $this->copyPartResult,
            2 => $this->serverSideEncryption,
            3 => $this->sSECustomerAlgorithm,
            4 => $this->sSECustomerKeyMD5,
            5 => $this->sSEKMSKeyId,
            6 => $this->bucketKeyEnabled,
            7 => $this->requestCharged,
            8 => $this->versionId,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->copySourceVersionId,
            $this->copyPartResult,
            $this->serverSideEncryption,
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
