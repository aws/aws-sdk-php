<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

/**
 * A bucket-level setting for Amazon S3 general purpose buckets used to prevent the upload of new objects encrypted with
 * the specified server-side encryption type. For example, blocking an encryption type will block PutObject, CopyObject,
 * PostObject, multipart upload, and replication requests to the bucket for objects with the specified encryption type.
 * However, you can continue to read and list any pre-existing objects already encrypted with the specified encryption
 * type. For more information, see Blocking or unblocking SSE-C for a general purpose bucket. This data type is used
 * with the following actions: PutBucketEncryption GetBucketEncryption DeleteBucketEncryption Permissions You must have
 * the s3:PutEncryptionConfiguration permission to block or unblock an encryption type for a bucket. You must have the
 * s3:GetEncryptionConfiguration permission to view a bucket's encryption type.
 */
final class BlockedEncryptionTypes implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#BlockedEncryptionTypes';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ENCRYPTION_TYPE;

    /**
     * @param list<\Aws\Services\S3\Shape\EncryptionType>|null $encryptionType
     */
    public function __construct(
        public readonly ?array $encryptionType = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::blockedEncryptionTypes();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ENCRYPTION_TYPE = $m[0];
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
        if (isset($this->encryptionType)) {
            $serializer->serializeList(self::$SCHEMA_ENCRYPTION_TYPE, $this->encryptionType, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->encryptionType,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->encryptionType
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
