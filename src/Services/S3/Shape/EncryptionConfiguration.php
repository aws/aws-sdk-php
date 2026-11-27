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
 * Specifies encryption-related information for an Amazon S3 bucket that is a destination for replicated objects. If
 * you're specifying a customer managed KMS key, we recommend using a fully qualified KMS key ARN. If you use a KMS key
 * alias instead, then KMS resolves the key within the requester’s account. This behavior can result in data that's
 * encrypted with a KMS key that belongs to the requester, and not the bucket owner.
 */
final class EncryptionConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#EncryptionConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_REPLICA_KMS_KEY_ID;
    private static Schema $SCHEMA_USE_SOURCE_MULTI_REGION_KEY;

    /**
     * @param ?string $replicaKmsKeyID Specifies the ID (Key ARN or Alias ARN) of the customer managed Amazon Web Services
     *        KMS key stored in Amazon Web Services Key Management Service (KMS) for the destination bucket. Amazon S3 uses
     * this
     *        key to encrypt replica objects. Amazon S3 only supports symmetric encryption KMS keys. For more information,
     * see
     *        Asymmetric keys in Amazon Web Services KMS in the Amazon Web Services Key Management Service Developer Guide.
     * @param ?UseSourceMultiRegionKey $useSourceMultiRegionKey Specifies whether Amazon S3 uses the related multi-Region
     *        KMS key in the destination Amazon Web Services Region to encrypt the replica.
     */
    public function __construct(
        public readonly ?string $replicaKmsKeyID = null,
        public readonly ?UseSourceMultiRegionKey $useSourceMultiRegionKey = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::encryptionConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_REPLICA_KMS_KEY_ID = $m[0];
        self::$SCHEMA_USE_SOURCE_MULTI_REGION_KEY = $m[1];
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
        if (isset($this->replicaKmsKeyID)) {
            $serializer->serializeString(self::$SCHEMA_REPLICA_KMS_KEY_ID, $this->replicaKmsKeyID, 0);
        }
        if (isset($this->useSourceMultiRegionKey)) {
            $serializer->serializeStruct(self::$SCHEMA_USE_SOURCE_MULTI_REGION_KEY, $this->useSourceMultiRegionKey, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->replicaKmsKeyID,
            1 => $this->useSourceMultiRegionKey,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->replicaKmsKeyID,
            $this->useSourceMultiRegionKey
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
