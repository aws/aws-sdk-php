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
 * If SSEKMS is specified for ObjectEncryption, this data type specifies the Amazon Web Services KMS key Amazon Resource
 * Name (ARN) to use and whether to use an S3 Bucket Key for server-side encryption using Key Management Service (KMS)
 * keys (SSE-KMS).
 */
final class SSEKMSEncryption implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#SSEKMSEncryption';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_KMS_KEY_ARN;
    private static Schema $SCHEMA_BUCKET_KEY_ENABLED;

    /**
     * @param ?string $kMSKeyArn Specifies the Amazon Web Services KMS key Amazon Resource Name (ARN) to use for the updated
     *        server-side encryption type. Required if ObjectEncryption specifies SSEKMS. You must specify the full Amazon
     * Web
     *        Services KMS key ARN. The KMS key ID and KMS key alias aren't supported. Pattern:
     *        (arn:aws[-a-z0-9]*:kms:[-a-z0-9]*:[0-9]{12}:key/.+)
     * @param ?bool $bucketKeyEnabled Specifies whether Amazon S3 should use an S3 Bucket Key for object encryption with
     *        server-side encryption using Key Management Service (KMS) keys (SSE-KMS). If this value isn't specified, it
     * defaults
     *        to false. Setting this value to true causes Amazon S3 to use an S3 Bucket Key for object encryption with
     * SSE-KMS. For
     *        more information, see Using Amazon S3 Bucket Keys in the Amazon S3 User Guide. Valid Values: true | false
     */
    public function __construct(
        /** @sensitive */
        public readonly ?string $kMSKeyArn = null,
        public readonly ?bool $bucketKeyEnabled = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::sSEKMSEncryption();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_KMS_KEY_ARN = $m[0];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[1];
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
        if (isset($this->kMSKeyArn)) {
            $serializer->serializeString(self::$SCHEMA_KMS_KEY_ARN, $this->kMSKeyArn, 0);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->kMSKeyArn,
            1 => $this->bucketKeyEnabled,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->kMSKeyArn,
            $this->bucketKeyEnabled
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
