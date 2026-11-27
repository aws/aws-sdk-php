<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ServerSideEncryption;
use Aws\Services\S3\Shape\SessionMode;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

final class CreateSessionRequest implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CreateSessionRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_SESSION_MODE;
    private static Schema $SCHEMA_SERVER_SIDE_ENCRYPTION;
    private static Schema $SCHEMA_SSEKMS_KEY_ID;
    private static Schema $SCHEMA_SSEKMS_ENCRYPTION_CONTEXT;
    private static Schema $SCHEMA_BUCKET_KEY_ENABLED;

    public readonly ?SessionMode $sessionMode;
    public readonly ?ServerSideEncryption $serverSideEncryption;

    /**
     * @param ?string $bucket The name of the bucket that you create a session for.
     * @param ?SessionMode $sessionMode Specifies the mode of the session that will be created, either ReadWrite or
     *        ReadOnly. If no session mode is specified, the default behavior attempts to create a session with the maximum
     *        allowable privilege. It will first attempt to create a ReadWrite session, and if that is not allowed by
     * permissions,
     *        it will attempt to create a ReadOnly session. If neither session type is allowed, the request will return an
     * Access
     *        Denied error. A ReadWrite session is capable of executing all the Zonal endpoint API operations on a directory
     *        bucket. A ReadOnly session is constrained to execute the following Zonal endpoint API operations: GetObject,
     *        HeadObject, ListObjectsV2, GetObjectAttributes, ListParts, and ListMultipartUploads.
     * @param ?ServerSideEncryption $serverSideEncryption The server-side encryption algorithm to use when you store objects
     *        in the directory bucket. For directory buckets, there are only two supported options for server-side
     * encryption:
     *        server-side encryption with Amazon S3 managed keys (SSE-S3) (AES256) and server-side encryption with KMS keys
     *        (SSE-KMS) (aws:kms). By default, Amazon S3 encrypts data with SSE-S3. For more information, see Protecting
     * data with
     *        server-side encryption in the Amazon S3 User Guide. S3 access points for Amazon FSx - When accessing data
     * stored in
     *        Amazon FSx file systems using S3 access points, the only valid server side encryption option is aws:fsx. All
     * Amazon
     *        FSx file systems have encryption configured by default and are encrypted at rest. Data is automatically
     * encrypted
     *        before being written to the file system, and automatically decrypted as it is read. These processes are
     * handled
     *        transparently by Amazon FSx.
     * @param ?string $sSEKMSKeyId If you specify x-amz-server-side-encryption with aws:kms, you must specify the
     *        x-amz-server-side-encryption-aws-kms-key-id header with the ID (Key ID or Key ARN) of the KMS symmetric
     * encryption
     *        customer managed key to use. Otherwise, you get an HTTP 400 Bad Request error. Only use the key ID or key ARN.
     * The
     *        key alias format of the KMS key isn't supported. Also, if the KMS key doesn't exist in the same account that't
     *        issuing the command, you must use the full Key ARN not the Key ID. Your SSE-KMS configuration can only support
     * 1
     *        customer managed key per directory bucket's lifetime. The Amazon Web Services managed key (aws/s3) isn't
     * supported.
     * @param ?string $sSEKMSEncryptionContext Specifies the Amazon Web Services KMS Encryption Context as an additional
     *        encryption context to use for object encryption. The value of this header is a Base64 encoded string of a
     * UTF-8
     *        encoded JSON, which contains the encryption context as key-value pairs. This value is stored as object
     * metadata and
     *        automatically gets passed on to Amazon Web Services KMS for future GetObject operations on this object.
     * General
     *        purpose buckets - This value must be explicitly added during CopyObject operations if you want an additional
     *        encryption context for your object. For more information, see Encryption context in the Amazon S3 User Guide.
     *        Directory buckets - You can optionally provide an explicit encryption context value. The value must match the
     * default
     *        encryption context - the bucket Amazon Resource Name (ARN). An additional encryption context value is not
     * supported.
     * @param ?bool $bucketKeyEnabled Specifies whether Amazon S3 should use an S3 Bucket Key for object encryption with
     *        server-side encryption using KMS keys (SSE-KMS). S3 Bucket Keys are always enabled for GET and PUT operations
     * in a
     *        directory bucket and can’t be disabled. S3 Bucket Keys aren't supported, when you copy SSE-KMS encrypted
     * objects
     *        from general purpose buckets to directory buckets, from directory buckets to general purpose buckets, or
     * between
     *        directory buckets, through CopyObject, UploadPartCopy, the Copy operation in Batch Operations, or the import
     * jobs. In
     *        this case, Amazon S3 makes a call to KMS every time a copy request is made for a KMS-encrypted object.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        SessionMode|string|null $sessionMode = null,
        ServerSideEncryption|string|null $serverSideEncryption = null,
        /** @sensitive */
        public readonly ?string $sSEKMSKeyId = null,
        /** @sensitive */
        public readonly ?string $sSEKMSEncryptionContext = null,
        public readonly ?bool $bucketKeyEnabled = null
    ) {
        $this->sessionMode = $sessionMode === null || $sessionMode instanceof SessionMode ? $sessionMode : SessionMode::fromValue($sessionMode);
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
        $s = Schemas::createSessionRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_SESSION_MODE = $m[1];
        self::$SCHEMA_SERVER_SIDE_ENCRYPTION = $m[2];
        self::$SCHEMA_SSEKMS_KEY_ID = $m[3];
        self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT = $m[4];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[5];
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
        if (isset($this->bucket)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET, $this->bucket, 0);
        }
        if (isset($this->sessionMode)) {
            $serializer->serializeString(self::$SCHEMA_SESSION_MODE, $this->sessionMode->value, 1);
        }
        if (isset($this->serverSideEncryption)) {
            $serializer->serializeString(self::$SCHEMA_SERVER_SIDE_ENCRYPTION, $this->serverSideEncryption->value, 2);
        }
        if (isset($this->sSEKMSKeyId)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_KEY_ID, $this->sSEKMSKeyId, 3);
        }
        if (isset($this->sSEKMSEncryptionContext)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT, $this->sSEKMSEncryptionContext, 4);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 5);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->sessionMode,
            2 => $this->serverSideEncryption,
            3 => $this->sSEKMSKeyId,
            4 => $this->sSEKMSEncryptionContext,
            5 => $this->bucketKeyEnabled,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->bucket,
            $this->sessionMode,
            $this->serverSideEncryption,
            $this->sSEKMSKeyId,
            $this->sSEKMSEncryptionContext,
            $this->bucketKeyEnabled
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
