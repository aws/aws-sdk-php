<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
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
final class CreateMultipartUploadOutput implements SerializableStructInterface, \ArrayAccess, JsonSerializable
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CreateMultipartUploadOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ABORT_DATE;
    private static Schema $SCHEMA_ABORT_RULE_ID;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_UPLOAD_ID;
    private static Schema $SCHEMA_SERVER_SIDE_ENCRYPTION;
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_SSEKMS_KEY_ID;
    private static Schema $SCHEMA_SSEKMS_ENCRYPTION_CONTEXT;
    private static Schema $SCHEMA_BUCKET_KEY_ENABLED;
    private static Schema $SCHEMA_REQUEST_CHARGED;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_CHECKSUM_TYPE;
    private static Schema $SCHEMA_VERSION_ID;

    public readonly ?ServerSideEncryption $serverSideEncryption;
    public readonly ?RequestCharged $requestCharged;
    public readonly ?ChecksumAlgorithm $checksumAlgorithm;
    public readonly ?ChecksumType $checksumType;

    /**
     * @param ?float $abortDate If the bucket has a lifecycle rule configured with an action to abort incomplete multipart
     *        uploads and the prefix in the lifecycle rule matches the object name in the request, the response includes
     * this
     *        header. The header indicates when the initiated multipart upload becomes eligible for an abort operation. For
     * more
     *        information, see Aborting Incomplete Multipart Uploads Using a Bucket Lifecycle Configuration in the Amazon S3
     * User
     *        Guide. The response also includes the x-amz-abort-rule-id header that provides the ID of the lifecycle
     * configuration
     *        rule that defines the abort action. This functionality is not supported for directory buckets.
     * @param ?string $abortRuleId This header is returned along with the x-amz-abort-date header. It identifies the
     *        applicable lifecycle configuration rule that defines the action to abort incomplete multipart uploads. This
     *        functionality is not supported for directory buckets.
     * @param ?string $bucket The name of the bucket to which the multipart upload was initiated. Does not return the access
     *        point ARN or access point alias if used. Access points are not supported by directory buckets.
     * @param ?string $key Object key for which the multipart upload was initiated.
     * @param ?string $uploadId ID for the initiated multipart upload.
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
     * @param ?string $sSEKMSEncryptionContext If present, indicates the Amazon Web Services KMS Encryption Context to use
     *        for object encryption. The value of this header is a Base64 encoded string of a UTF-8 encoded JSON, which
     * contains
     *        the encryption context as key-value pairs.
     * @param ?bool $bucketKeyEnabled Indicates whether the multipart upload uses an S3 Bucket Key for server-side
     *        encryption with Key Management Service (KMS) keys (SSE-KMS).
     * @param ?ChecksumAlgorithm $checksumAlgorithm The algorithm that was used to create a checksum of the object.
     * @param ?ChecksumType $checksumType Indicates the checksum type that you want Amazon S3 to use to calculate the
     *        object’s checksum value. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $versionId Version ID of the object. Returns the Version ID of the object for the initiated multipart
     *        upload, if bucket versioning is enabled. This functionality is not supported for directory buckets.
     */
    public function __construct(
        public readonly ?float $abortDate = null,
        public readonly ?string $abortRuleId = null,
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $uploadId = null,
        ServerSideEncryption|string|null $serverSideEncryption = null,
        public readonly ?string $sSECustomerAlgorithm = null,
        public readonly ?string $sSECustomerKeyMD5 = null,
        /** @sensitive */
        public readonly ?string $sSEKMSKeyId = null,
        /** @sensitive */
        public readonly ?string $sSEKMSEncryptionContext = null,
        public readonly ?bool $bucketKeyEnabled = null,
        RequestCharged|string|null $requestCharged = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null,
        ChecksumType|string|null $checksumType = null,
        public readonly ?string $versionId = null
    ) {
        $this->serverSideEncryption = $serverSideEncryption === null || $serverSideEncryption instanceof ServerSideEncryption ? $serverSideEncryption : ServerSideEncryption::fromValue($serverSideEncryption);
        $this->requestCharged = $requestCharged === null || $requestCharged instanceof RequestCharged ? $requestCharged : RequestCharged::fromValue($requestCharged);
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
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
        $s = Schemas::createMultipartUploadOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ABORT_DATE = $m[0];
        self::$SCHEMA_ABORT_RULE_ID = $m[1];
        self::$SCHEMA_BUCKET = $m[2];
        self::$SCHEMA_KEY = $m[3];
        self::$SCHEMA_UPLOAD_ID = $m[4];
        self::$SCHEMA_SERVER_SIDE_ENCRYPTION = $m[5];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[6];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[7];
        self::$SCHEMA_SSEKMS_KEY_ID = $m[8];
        self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT = $m[9];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[10];
        self::$SCHEMA_REQUEST_CHARGED = $m[11];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[12];
        self::$SCHEMA_CHECKSUM_TYPE = $m[13];
        self::$SCHEMA_VERSION_ID = $m[14];
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
        if (isset($this->abortDate)) {
            $serializer->serializeTimestamp(self::$SCHEMA_ABORT_DATE, $this->abortDate, 0);
        }
        if (isset($this->abortRuleId)) {
            $serializer->serializeString(self::$SCHEMA_ABORT_RULE_ID, $this->abortRuleId, 1);
        }
        if (isset($this->bucket)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET, $this->bucket, 2);
        }
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 3);
        }
        if (isset($this->uploadId)) {
            $serializer->serializeString(self::$SCHEMA_UPLOAD_ID, $this->uploadId, 4);
        }
        if (isset($this->serverSideEncryption)) {
            $serializer->serializeString(self::$SCHEMA_SERVER_SIDE_ENCRYPTION, $this->serverSideEncryption->value, 5);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 6);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 7);
        }
        if (isset($this->sSEKMSKeyId)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_KEY_ID, $this->sSEKMSKeyId, 8);
        }
        if (isset($this->sSEKMSEncryptionContext)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT, $this->sSEKMSEncryptionContext, 9);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 10);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 11);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 12);
        }
        if (isset($this->checksumType)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_TYPE, $this->checksumType->value, 13);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 14);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->abortDate,
            1 => $this->abortRuleId,
            2 => $this->bucket,
            3 => $this->key,
            4 => $this->uploadId,
            5 => $this->serverSideEncryption,
            6 => $this->sSECustomerAlgorithm,
            7 => $this->sSECustomerKeyMD5,
            8 => $this->sSEKMSKeyId,
            9 => $this->sSEKMSEncryptionContext,
            10 => $this->bucketKeyEnabled,
            11 => $this->requestCharged,
            12 => $this->checksumAlgorithm,
            13 => $this->checksumType,
            14 => $this->versionId,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->abortDate,
            $this->abortRuleId,
            $this->bucket,
            $this->key,
            $this->uploadId,
            $this->serverSideEncryption,
            $this->sSECustomerAlgorithm,
            $this->sSECustomerKeyMD5,
            $this->sSEKMSKeyId,
            $this->sSEKMSEncryptionContext,
            $this->bucketKeyEnabled,
            $this->requestCharged,
            $this->checksumAlgorithm,
            $this->checksumType,
            $this->versionId
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
