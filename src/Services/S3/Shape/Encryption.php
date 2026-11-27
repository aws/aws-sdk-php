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
 * Contains the type of server-side encryption used.
 */
final class Encryption implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Encryption';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ENCRYPTION_TYPE;
    private static Schema $SCHEMA_KMS_KEY_ID;
    private static Schema $SCHEMA_KMS_CONTEXT;

    public readonly ?ServerSideEncryption $encryptionType;

    /**
     * @param ?ServerSideEncryption $encryptionType The server-side encryption algorithm used when storing job results in
     *        Amazon S3 (for example, AES256, aws:kms).
     * @param ?string $kMSKeyId If the encryption type is aws:kms, this optional value specifies the ID of the symmetric
     *        encryption customer managed key to use for encryption of job results. Amazon S3 only supports symmetric
     * encryption
     *        KMS keys. For more information, see Asymmetric keys in KMS in the Amazon Web Services Key Management Service
     *        Developer Guide.
     * @param ?string $kMSContext If the encryption type is aws:kms, this optional value can be used to specify the
     *        encryption context for the restore results.
     */
    public function __construct(
        ServerSideEncryption|string|null $encryptionType = null,
        /** @sensitive */
        public readonly ?string $kMSKeyId = null,
        public readonly ?string $kMSContext = null
    ) {
        $this->encryptionType = $encryptionType === null || $encryptionType instanceof ServerSideEncryption ? $encryptionType : ServerSideEncryption::fromValue($encryptionType);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::encryption();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ENCRYPTION_TYPE = $m[0];
        self::$SCHEMA_KMS_KEY_ID = $m[1];
        self::$SCHEMA_KMS_CONTEXT = $m[2];
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
            $serializer->serializeString(self::$SCHEMA_ENCRYPTION_TYPE, $this->encryptionType->value, 0);
        }
        if (isset($this->kMSKeyId)) {
            $serializer->serializeString(self::$SCHEMA_KMS_KEY_ID, $this->kMSKeyId, 1);
        }
        if (isset($this->kMSContext)) {
            $serializer->serializeString(self::$SCHEMA_KMS_CONTEXT, $this->kMSContext, 2);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->encryptionType,
            1 => $this->kMSKeyId,
            2 => $this->kMSContext,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->encryptionType,
            $this->kMSKeyId,
            $this->kMSContext
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
