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
 * Contains the bucket name, file format, bucket owner (optional), and prefix (optional) where S3 Inventory results are
 * published.
 */
final class InventoryS3BucketDestination implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#InventoryS3BucketDestination';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_FORMAT;
    private static Schema $SCHEMA_ACCOUNT_ID;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_ENCRYPTION;

    public readonly ?InventoryFormat $format;

    /**
     * @param ?string $bucket The Amazon Resource Name (ARN) of the bucket where inventory results will be published.
     * @param ?InventoryFormat $format Specifies the output format of the inventory results.
     * @param ?string $accountId The account ID that owns the destination S3 bucket. If no account ID is provided, the owner
     *        is not validated before exporting data. Although this value is optional, we strongly recommend that you set it
     * to
     *        help prevent problems if the destination bucket ownership changes.
     * @param ?string $prefix The prefix that is prepended to all inventory results.
     * @param ?InventoryEncryption $encryption Contains the type of server-side encryption used to encrypt the inventory
     *        results.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        InventoryFormat|string|null $format = null,
        public readonly ?string $accountId = null,
        public readonly ?string $prefix = null,
        public readonly ?InventoryEncryption $encryption = null
    ) {
        $this->format = $format === null || $format instanceof InventoryFormat ? $format : InventoryFormat::fromValue($format);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::inventoryS3BucketDestination();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_FORMAT = $m[1];
        self::$SCHEMA_ACCOUNT_ID = $m[2];
        self::$SCHEMA_PREFIX = $m[3];
        self::$SCHEMA_ENCRYPTION = $m[4];
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
        if (isset($this->format)) {
            $serializer->serializeString(self::$SCHEMA_FORMAT, $this->format->value, 1);
        }
        if (isset($this->accountId)) {
            $serializer->serializeString(self::$SCHEMA_ACCOUNT_ID, $this->accountId, 2);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 3);
        }
        if (isset($this->encryption)) {
            $serializer->serializeStruct(self::$SCHEMA_ENCRYPTION, $this->encryption, 4);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->format,
            2 => $this->accountId,
            3 => $this->prefix,
            4 => $this->encryption,
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
            $this->format,
            $this->accountId,
            $this->prefix,
            $this->encryption
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
