<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

/**
 * Specifies the default server-side encryption configuration. General purpose buckets - If you're specifying a customer
 * managed KMS key, we recommend using a fully qualified KMS key ARN. If you use a KMS key alias instead, then KMS
 * resolves the key within the requester’s account. This behavior can result in data that's encrypted with a KMS key
 * that belongs to the requester, and not the bucket owner. Directory buckets - When you specify an KMS customer managed
 * key for encryption in your directory bucket, only use the key ID or key ARN. The key alias format of the KMS key
 * isn't supported.
 */
final class ServerSideEncryptionRule implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ServerSideEncryptionRule';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_APPLY_SERVER_SIDE_ENCRYPTION_BY_DEFAULT;
    private static Schema $SCHEMA_BUCKET_KEY_ENABLED;
    private static Schema $SCHEMA_BLOCKED_ENCRYPTION_TYPES;

    /**
     * @param ?ServerSideEncryptionByDefault $applyServerSideEncryptionByDefault Specifies the default server-side
     *        encryption to apply to new objects in the bucket. If a PUT Object request doesn't specify any server-side
     * encryption,
     *        this default encryption will be applied.
     * @param ?bool $bucketKeyEnabled Specifies whether Amazon S3 should use an S3 Bucket Key with server-side encryption
     *        using KMS (SSE-KMS) for new objects in the bucket. Existing objects are not affected. Setting the
     * BucketKeyEnabled
     *        element to true causes Amazon S3 to use an S3 Bucket Key. General purpose buckets - By default, S3 Bucket Key
     * is not
     *        enabled. For more information, see Amazon S3 Bucket Keys in the Amazon S3 User Guide. Directory buckets - S3
     * Bucket
     *        Keys are always enabled for GET and PUT operations in a directory bucket and can’t be disabled. S3 Bucket
     * Keys
     *        aren't supported, when you copy SSE-KMS encrypted objects from general purpose buckets to directory buckets,
     * from
     *        directory buckets to general purpose buckets, or between directory buckets, through CopyObject,
     * UploadPartCopy, the
     *        Copy operation in Batch Operations, or the import jobs. In this case, Amazon S3 makes a call to KMS every time
     * a copy
     *        request is made for a KMS-encrypted object.
     * @param ?BlockedEncryptionTypes $blockedEncryptionTypes A bucket-level setting for Amazon S3 general purpose buckets
     *        used to prevent the upload of new objects encrypted with the specified server-side encryption type. For
     * example,
     *        blocking an encryption type will block PutObject, CopyObject, PostObject, multipart upload, and replication
     * requests
     *        to the bucket for objects with the specified encryption type. However, you can continue to read and list any
     *        pre-existing objects already encrypted with the specified encryption type. For more information, see Blocking
     * or
     *        unblocking SSE-C for a general purpose bucket. Currently, this parameter only supports blocking or unblocking
     *        server-side encryption with customer-provided keys (SSE-C). For more information about SSE-C, see Using
     * server-side
     *        encryption with customer-provided keys (SSE-C).
     */
    public function __construct(
        public readonly ?ServerSideEncryptionByDefault $applyServerSideEncryptionByDefault = null,
        public readonly ?bool $bucketKeyEnabled = null,
        public readonly ?BlockedEncryptionTypes $blockedEncryptionTypes = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::serverSideEncryptionRule();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_APPLY_SERVER_SIDE_ENCRYPTION_BY_DEFAULT = $m[0];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[1];
        self::$SCHEMA_BLOCKED_ENCRYPTION_TYPES = $m[2];
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
        if (isset($this->applyServerSideEncryptionByDefault)) {
            $serializer->serializeStruct(self::$SCHEMA_APPLY_SERVER_SIDE_ENCRYPTION_BY_DEFAULT, $this->applyServerSideEncryptionByDefault, 0);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 1);
        }
        if (isset($this->blockedEncryptionTypes)) {
            $serializer->serializeStruct(self::$SCHEMA_BLOCKED_ENCRYPTION_TYPES, $this->blockedEncryptionTypes, 2);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->applyServerSideEncryptionByDefault,
            1 => $this->bucketKeyEnabled,
            2 => $this->blockedEncryptionTypes,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->applyServerSideEncryptionByDefault,
            $this->bucketKeyEnabled,
            $this->blockedEncryptionTypes
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
