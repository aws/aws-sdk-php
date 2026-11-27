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
 * Contains the type of server-side encryption used to encrypt the S3 Inventory results.
 */
final class InventoryEncryption implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#InventoryEncryption';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_SSES3;
    private static Schema $SCHEMA_SSEKMS;

    /**
     * @param ?SSES3 $sSES3 Specifies the use of SSE-S3 to encrypt delivered inventory reports.
     * @param ?SSEKMS $sSEKMS Specifies the use of SSE-KMS to encrypt delivered inventory reports.
     */
    public function __construct(
        public readonly ?SSES3 $sSES3 = null,
        public readonly ?SSEKMS $sSEKMS = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::inventoryEncryption();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_SSES3 = $m[0];
        self::$SCHEMA_SSEKMS = $m[1];
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
        if (isset($this->sSES3)) {
            $serializer->serializeStruct(self::$SCHEMA_SSES3, $this->sSES3, 0);
        }
        if (isset($this->sSEKMS)) {
            $serializer->serializeStruct(self::$SCHEMA_SSEKMS, $this->sSEKMS, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->sSES3,
            1 => $this->sSEKMS,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->sSES3,
            $this->sSEKMS
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
