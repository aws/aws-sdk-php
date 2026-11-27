<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\EnumInterface;

final class BucketLogsPermission implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#BucketLogsPermission';

    /** @var array<array-key, self> */
    private static array $known = [];

    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fullControl(): self
    {
        return self::$known['FULL_CONTROL'] ??= new self('FULL_CONTROL');
    }

    public static function read(): self
    {
        return self::$known['READ'] ??= new self('READ');
    }

    public static function write(): self
    {
        return self::$known['WRITE'] ??= new self('WRITE');
    }

    /**
     * Create an instance from a string value.
     *
     * Known values are cached as singletons.
     * Unknown values create a fresh instance
     * for forward-compatibility with newer service versions.
     *
     * @param string $value
     * @return self
     */
    public static function fromValue(string $value): self
    {
        return match ($value) {
            'FULL_CONTROL' => self::$known['FULL_CONTROL'] ??= new self('FULL_CONTROL'),
            'READ' => self::$known['READ'] ??= new self('READ'),
            'WRITE' => self::$known['WRITE'] ??= new self('WRITE'),
            default => new self($value),
        };
    }

    /**
     * Returns all known enum values.
     *
     * @return list<self>
     */
    public static function cases(): array
    {
        return [self::fullControl(), self::read(), self::write()];
    }

    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        return Schemas::bucketLogsPermission();
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
        $serializer->serializeString(self::schema(), $this->value, $idx);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
