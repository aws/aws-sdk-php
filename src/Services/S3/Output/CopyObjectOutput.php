<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\CopyObjectResult;
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
final class CopyObjectOutput implements SerializableStructInterface, \ArrayAccess, JsonSerializable
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CopyObjectOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_COPY_OBJECT_RESULT;
    private static Schema $SCHEMA_EXPIRATION;
    private static Schema $SCHEMA_COPY_SOURCE_VERSION_ID;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_SERVER_SIDE_ENCRYPTION;
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_SSEKMS_KEY_ID;
    private static Schema $SCHEMA_SSEKMS_ENCRYPTION_CONTEXT;
    private static Schema $SCHEMA_BUCKET_KEY_ENABLED;
    private static Schema $SCHEMA_REQUEST_CHARGED;

    public readonly ?ServerSideEncryption $serverSideEncryption;
    public readonly ?RequestCharged $requestCharged;

    /**
     * @param ?CopyObjectResult $copyObjectResult Container for all response elements.
     * @param ?string $expiration If the object expiration is configured, the response includes this header. Object
     *        expiration information is not returned in directory buckets and this header returns the value "NotImplemented"
     * in all
     *        responses for directory buckets.
     * @param ?string $copySourceVersionId Version ID of the source object that was copied. This functionality is not
     *        supported when the source object is in a directory bucket.
     * @param ?string $versionId Version ID of the newly created copy. This functionality is not supported for directory
     *        buckets.
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
     *        for object encryption. The value of this header is a Base64 encoded UTF-8 string holding JSON with the
     * encryption
     *        context key-value pairs.
     * @param ?bool $bucketKeyEnabled Indicates whether the copied object uses an S3 Bucket Key for server-side encryption
     *        with Key Management Service (KMS) keys (SSE-KMS).
     */
    public function __construct(
        public readonly ?CopyObjectResult $copyObjectResult = null,
        public readonly ?string $expiration = null,
        public readonly ?string $copySourceVersionId = null,
        public readonly ?string $versionId = null,
        ServerSideEncryption|string|null $serverSideEncryption = null,
        public readonly ?string $sSECustomerAlgorithm = null,
        public readonly ?string $sSECustomerKeyMD5 = null,
        /** @sensitive */
        public readonly ?string $sSEKMSKeyId = null,
        /** @sensitive */
        public readonly ?string $sSEKMSEncryptionContext = null,
        public readonly ?bool $bucketKeyEnabled = null,
        RequestCharged|string|null $requestCharged = null
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
        $s = Schemas::copyObjectOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_COPY_OBJECT_RESULT = $m[0];
        self::$SCHEMA_EXPIRATION = $m[1];
        self::$SCHEMA_COPY_SOURCE_VERSION_ID = $m[2];
        self::$SCHEMA_VERSION_ID = $m[3];
        self::$SCHEMA_SERVER_SIDE_ENCRYPTION = $m[4];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[5];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[6];
        self::$SCHEMA_SSEKMS_KEY_ID = $m[7];
        self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT = $m[8];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[9];
        self::$SCHEMA_REQUEST_CHARGED = $m[10];
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
        if (isset($this->copyObjectResult)) {
            $serializer->serializeStruct(self::$SCHEMA_COPY_OBJECT_RESULT, $this->copyObjectResult, 0);
        }
        if (isset($this->expiration)) {
            $serializer->serializeString(self::$SCHEMA_EXPIRATION, $this->expiration, 1);
        }
        if (isset($this->copySourceVersionId)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE_VERSION_ID, $this->copySourceVersionId, 2);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 3);
        }
        if (isset($this->serverSideEncryption)) {
            $serializer->serializeString(self::$SCHEMA_SERVER_SIDE_ENCRYPTION, $this->serverSideEncryption->value, 4);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 5);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 6);
        }
        if (isset($this->sSEKMSKeyId)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_KEY_ID, $this->sSEKMSKeyId, 7);
        }
        if (isset($this->sSEKMSEncryptionContext)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT, $this->sSEKMSEncryptionContext, 8);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 9);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 10);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->copyObjectResult,
            1 => $this->expiration,
            2 => $this->copySourceVersionId,
            3 => $this->versionId,
            4 => $this->serverSideEncryption,
            5 => $this->sSECustomerAlgorithm,
            6 => $this->sSECustomerKeyMD5,
            7 => $this->sSEKMSKeyId,
            8 => $this->sSEKMSEncryptionContext,
            9 => $this->bucketKeyEnabled,
            10 => $this->requestCharged,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->copyObjectResult,
            $this->expiration,
            $this->copySourceVersionId,
            $this->versionId,
            $this->serverSideEncryption,
            $this->sSECustomerAlgorithm,
            $this->sSECustomerKeyMD5,
            $this->sSEKMSKeyId,
            $this->sSEKMSEncryptionContext,
            $this->bucketKeyEnabled,
            $this->requestCharged
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
