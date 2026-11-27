<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ServerSideEncryption;
use Aws\Services\S3\Shape\SessionCredentials;
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
final class CreateSessionOutput implements SerializableStructInterface, \ArrayAccess, JsonSerializable
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CreateSessionOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_CREDENTIALS;
    private static Schema $SCHEMA_SERVER_SIDE_ENCRYPTION;
    private static Schema $SCHEMA_SSEKMS_KEY_ID;
    private static Schema $SCHEMA_SSEKMS_ENCRYPTION_CONTEXT;
    private static Schema $SCHEMA_BUCKET_KEY_ENABLED;

    public readonly ?ServerSideEncryption $serverSideEncryption;

    /**
     * @param ?SessionCredentials $credentials The established temporary security credentials for the created session.
     * @param ?ServerSideEncryption $serverSideEncryption The server-side encryption algorithm used when you store objects
     *        in the directory bucket. When accessing data stored in Amazon FSx file systems using S3 access points, the
     * only valid
     *        server side encryption option is aws:fsx.
     * @param ?string $sSEKMSKeyId If you specify x-amz-server-side-encryption with aws:kms, this header indicates the ID of
     *        the KMS symmetric encryption customer managed key that was used for object encryption.
     * @param ?string $sSEKMSEncryptionContext If present, indicates the Amazon Web Services KMS Encryption Context to use
     *        for object encryption. The value of this header is a Base64 encoded string of a UTF-8 encoded JSON, which
     * contains
     *        the encryption context as key-value pairs. This value is stored as object metadata and automatically gets
     * passed on
     *        to Amazon Web Services KMS for future GetObject operations on this object.
     * @param ?bool $bucketKeyEnabled Indicates whether to use an S3 Bucket Key for server-side encryption with KMS keys
     *        (SSE-KMS).
     */
    public function __construct(
        public readonly ?SessionCredentials $credentials = null,
        ServerSideEncryption|string|null $serverSideEncryption = null,
        /** @sensitive */
        public readonly ?string $sSEKMSKeyId = null,
        /** @sensitive */
        public readonly ?string $sSEKMSEncryptionContext = null,
        public readonly ?bool $bucketKeyEnabled = null
    ) {
        $this->serverSideEncryption = $serverSideEncryption === null || $serverSideEncryption instanceof ServerSideEncryption ? $serverSideEncryption : ServerSideEncryption::fromValue($serverSideEncryption);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::createSessionOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_CREDENTIALS = $m[0];
        self::$SCHEMA_SERVER_SIDE_ENCRYPTION = $m[1];
        self::$SCHEMA_SSEKMS_KEY_ID = $m[2];
        self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT = $m[3];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[4];
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
        if (isset($this->credentials)) {
            $serializer->serializeStruct(self::$SCHEMA_CREDENTIALS, $this->credentials, 0);
        }
        if (isset($this->serverSideEncryption)) {
            $serializer->serializeString(self::$SCHEMA_SERVER_SIDE_ENCRYPTION, $this->serverSideEncryption->value, 1);
        }
        if (isset($this->sSEKMSKeyId)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_KEY_ID, $this->sSEKMSKeyId, 2);
        }
        if (isset($this->sSEKMSEncryptionContext)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT, $this->sSEKMSEncryptionContext, 3);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 4);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->credentials,
            1 => $this->serverSideEncryption,
            2 => $this->sSEKMSKeyId,
            3 => $this->sSEKMSEncryptionContext,
            4 => $this->bucketKeyEnabled,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->credentials,
            $this->serverSideEncryption,
            $this->sSEKMSKeyId,
            $this->sSEKMSEncryptionContext,
            $this->bucketKeyEnabled
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
