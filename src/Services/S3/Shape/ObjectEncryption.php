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
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\SensitiveStringableTrait;
use Smithy\Core\Shape\ShapeType;
use Smithy\Core\Shape\UnionInterface;
use Smithy\Core\Shape\Utils\ArrayShapeSerializer;

/**
 * The updated server-side encryption type for this object. The UpdateObjectEncryption operation supports the SSE-S3 and
 * SSE-KMS encryption types. Valid Values: SSES3 | SSEKMS
 */
abstract readonly class ObjectEncryption implements UnionInterface, JsonSerializable
{
    use SensitiveStringableTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ObjectEncryption';

    abstract public function getMemberIndex(): int;

    abstract public function tag(): string;

    abstract public function value(): mixed;

    /**
     * Serialize the shape to the desired wire format.
     *
     * @return void
     */
    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeUnion(self::schema(), $this, $idx);
    }

    /**
     * <p>
      Specifies to update the object encryption type to server-side encryption with Key Management Service (KMS)
     * keys 
      (SSE-KMS). 
    </p>
     */
    public static function sSEKMS(SSEKMSEncryption $value): self
    {
        return new ObjectEncryptionSSEKMS($value);
    }

    /**
     * Create an unknown variant for forward-compatibility.
     */
    public static function unknown(string $tag, mixed $value): self
    {
        return new ObjectEncryptionUnknown($tag, $value);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        return Schemas::objectEncryption();
    }

    /**
     * Get the shape schema for this instance.
     */
    public function getSchema(): Schema
    {
        return self::schema();
    }


    /**
     * Create a union variant from a tag and value.
     *
     * @param string $tag The variant name
     * @param mixed $value The variant value
     * @return self
     */
    public static function create(string $tag, mixed $value): self
    {
        return match ($tag) {
            'SSEKMS' => new ObjectEncryptionSSEKMS($value instanceof SSEKMSEncryption ? $value : ArrayShapeSerializer::fromArray(SSEKMSEncryption::class, $value)),
            default => new ObjectEncryptionUnknown($tag, $value),
        };
    }

    /**
     * Create a known union variant from its schema member index.
     *
     * @param int $index The variant member index
     * @param mixed $value The variant value
     * @return self
     */
    public static function createByIndex(int $index, mixed $value): self
    {
        return match ($index) {
            0 => new ObjectEncryptionSSEKMS($value instanceof SSEKMSEncryption ? $value : ArrayShapeSerializer::fromArray(SSEKMSEncryption::class, $value)),
            default => throw new \InvalidArgumentException('Unknown ObjectEncryption variant index: ' . $index),
        };
    }
}
