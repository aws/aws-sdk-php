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

final class Permission implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#Permission';

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

    public static function write(): self
    {
        return self::$known['WRITE'] ??= new self('WRITE');
    }

    public static function writeAcp(): self
    {
        return self::$known['WRITE_ACP'] ??= new self('WRITE_ACP');
    }

    public static function read(): self
    {
        return self::$known['READ'] ??= new self('READ');
    }

    public static function readAcp(): self
    {
        return self::$known['READ_ACP'] ??= new self('READ_ACP');
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
            'WRITE' => self::$known['WRITE'] ??= new self('WRITE'),
            'WRITE_ACP' => self::$known['WRITE_ACP'] ??= new self('WRITE_ACP'),
            'READ' => self::$known['READ'] ??= new self('READ'),
            'READ_ACP' => self::$known['READ_ACP'] ??= new self('READ_ACP'),
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
        return [self::fullControl(), self::write(), self::writeAcp(), self::read(), self::readAcp()];
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
        return Schemas::permission();
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
