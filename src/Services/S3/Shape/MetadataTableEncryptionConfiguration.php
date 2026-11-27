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
 * The encryption settings for an S3 Metadata journal table or inventory table configuration.
 */
final class MetadataTableEncryptionConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#MetadataTableEncryptionConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_SSE_ALGORITHM;
    private static Schema $SCHEMA_KMS_KEY_ARN;

    public readonly ?TableSseAlgorithm $sseAlgorithm;

    /**
     * @param ?TableSseAlgorithm $sseAlgorithm The encryption type specified for a metadata table. To specify server-side
     *        encryption with Key Management Service (KMS) keys (SSE-KMS), use the aws:kms value. To specify server-side
     * encryption
     *        with Amazon S3 managed keys (SSE-S3), use the AES256 value.
     * @param ?string $kmsKeyArn If server-side encryption with Key Management Service (KMS) keys (SSE-KMS) is specified,
     *        you must also specify the KMS key Amazon Resource Name (ARN). You must specify a customer-managed KMS key
     * that's
     *        located in the same Region as the general purpose bucket that corresponds to the metadata table configuration.
     */
    public function __construct(
        TableSseAlgorithm|string|null $sseAlgorithm = null,
        public readonly ?string $kmsKeyArn = null
    ) {
        $this->sseAlgorithm = $sseAlgorithm === null || $sseAlgorithm instanceof TableSseAlgorithm ? $sseAlgorithm : TableSseAlgorithm::fromValue($sseAlgorithm);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::metadataTableEncryptionConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_SSE_ALGORITHM = $m[0];
        self::$SCHEMA_KMS_KEY_ARN = $m[1];
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
        if (isset($this->sseAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_ALGORITHM, $this->sseAlgorithm->value, 0);
        }
        if (isset($this->kmsKeyArn)) {
            $serializer->serializeString(self::$SCHEMA_KMS_KEY_ARN, $this->kmsKeyArn, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->sseAlgorithm,
            1 => $this->kmsKeyArn,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->sseAlgorithm,
            $this->kmsKeyArn
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
