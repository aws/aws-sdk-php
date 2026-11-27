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
 * Describes the default server-side encryption to apply to new objects in the bucket. If a PUT Object request doesn't
 * specify any server-side encryption, this default encryption will be applied. For more information, see
 * PutBucketEncryption. General purpose buckets - If you don't specify a customer managed key at configuration, Amazon
 * S3 automatically creates an Amazon Web Services KMS key (aws/s3) in your Amazon Web Services account the first time
 * that you add an object encrypted with SSE-KMS to a bucket. By default, Amazon S3 uses this KMS key for SSE-KMS.
 * Directory buckets - Your SSE-KMS configuration can only support 1 customer managed key per directory bucket's
 * lifetime. The Amazon Web Services managed key (aws/s3) isn't supported. Directory buckets - For directory buckets,
 * there are only two supported options for server-side encryption: SSE-S3 and SSE-KMS.
 */
final class ServerSideEncryptionByDefault implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ServerSideEncryptionByDefault';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_SSE_ALGORITHM;
    private static Schema $SCHEMA_KMS_MASTER_KEY_ID;

    public readonly ?ServerSideEncryption $sSEAlgorithm;

    /**
     * @param ?ServerSideEncryption $sSEAlgorithm Server-side encryption algorithm to use for the default encryption. For
     *        directory buckets, there are only two supported values for server-side encryption: AES256 and aws:kms.
     * @param ?string $kMSMasterKeyID Amazon Web Services Key Management Service (KMS) customer managed key ID to use for
     *        the default encryption. General purpose buckets - This parameter is allowed if and only if SSEAlgorithm is set
     * to
     *        aws:kms or aws:kms:dsse. Directory buckets - This parameter is allowed if and only if SSEAlgorithm is set to
     * aws:kms.
     *        You can specify the key ID, key alias, or the Amazon Resource Name (ARN) of the KMS key. Key ID:
     *        1234abcd-12ab-34cd-56ef-1234567890ab Key ARN:
     *        arn:aws:kms:us-east-2:111122223333:key/1234abcd-12ab-34cd-56ef-1234567890ab Key Alias: alias/alias-name If you
     * are
     *        using encryption with cross-account or Amazon Web Services service operations, you must use a fully qualified
     * KMS key
     *        ARN. For more information, see Using encryption for cross-account operations. General purpose buckets - If
     * you're
     *        specifying a customer managed KMS key, we recommend using a fully qualified KMS key ARN. If you use a KMS key
     * alias
     *        instead, then KMS resolves the key within the requester’s account. This behavior can result in data that's
     *        encrypted with a KMS key that belongs to the requester, and not the bucket owner. Also, if you use a key ID,
     * you can
     *        run into a LogDestination undeliverable error when creating a VPC flow log. Directory buckets - When you
     * specify an
     *        KMS customer managed key for encryption in your directory bucket, only use the key ID or key ARN. The key
     * alias
     *        format of the KMS key isn't supported. Amazon S3 only supports symmetric encryption KMS keys. For more
     * information,
     *        see Asymmetric keys in Amazon Web Services KMS in the Amazon Web Services Key Management Service Developer
     * Guide.
     */
    public function __construct(
        ServerSideEncryption|string|null $sSEAlgorithm = null,
        /** @sensitive */
        public readonly ?string $kMSMasterKeyID = null
    ) {
        $this->sSEAlgorithm = $sSEAlgorithm === null || $sSEAlgorithm instanceof ServerSideEncryption ? $sSEAlgorithm : ServerSideEncryption::fromValue($sSEAlgorithm);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::serverSideEncryptionByDefault();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_SSE_ALGORITHM = $m[0];
        self::$SCHEMA_KMS_MASTER_KEY_ID = $m[1];
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
        if (isset($this->sSEAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_ALGORITHM, $this->sSEAlgorithm->value, 0);
        }
        if (isset($this->kMSMasterKeyID)) {
            $serializer->serializeString(self::$SCHEMA_KMS_MASTER_KEY_ID, $this->kMSMasterKeyID, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->sSEAlgorithm,
            1 => $this->kMSMasterKeyID,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->sSEAlgorithm,
            $this->kMSMasterKeyID
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
