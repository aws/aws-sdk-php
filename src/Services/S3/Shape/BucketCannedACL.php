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

final class BucketCannedACL implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#BucketCannedACL';

    /** @var array<array-key, self> */
    private static array $known = [];

    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function private(): self
    {
        return self::$known['private'] ??= new self('private');
    }

    public static function public_read(): self
    {
        return self::$known['public-read'] ??= new self('public-read');
    }

    public static function public_read_write(): self
    {
        return self::$known['public-read-write'] ??= new self('public-read-write');
    }

    public static function authenticated_read(): self
    {
        return self::$known['authenticated-read'] ??= new self('authenticated-read');
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
            'private' => self::$known['private'] ??= new self('private'),
            'public-read' => self::$known['public-read'] ??= new self('public-read'),
            'public-read-write' => self::$known['public-read-write'] ??= new self('public-read-write'),
            'authenticated-read' => self::$known['authenticated-read'] ??= new self('authenticated-read'),
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
        return [self::private(), self::public_read(), self::public_read_write(), self::authenticated_read()];
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
        return Schemas::bucketCannedACL();
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
