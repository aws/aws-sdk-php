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

final class ChecksumAlgorithm implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#ChecksumAlgorithm';

    /** @var array<array-key, self> */
    private static array $known = [];

    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function crc32(): self
    {
        return self::$known['CRC32'] ??= new self('CRC32');
    }

    public static function crc32c(): self
    {
        return self::$known['CRC32C'] ??= new self('CRC32C');
    }

    public static function sha1(): self
    {
        return self::$known['SHA1'] ??= new self('SHA1');
    }

    public static function sha256(): self
    {
        return self::$known['SHA256'] ??= new self('SHA256');
    }

    public static function crc64nvme(): self
    {
        return self::$known['CRC64NVME'] ??= new self('CRC64NVME');
    }

    public static function sha512(): self
    {
        return self::$known['SHA512'] ??= new self('SHA512');
    }

    public static function md5(): self
    {
        return self::$known['MD5'] ??= new self('MD5');
    }

    public static function xxhash64(): self
    {
        return self::$known['XXHASH64'] ??= new self('XXHASH64');
    }

    public static function xxhash3(): self
    {
        return self::$known['XXHASH3'] ??= new self('XXHASH3');
    }

    public static function xxhash128(): self
    {
        return self::$known['XXHASH128'] ??= new self('XXHASH128');
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
            'CRC32' => self::$known['CRC32'] ??= new self('CRC32'),
            'CRC32C' => self::$known['CRC32C'] ??= new self('CRC32C'),
            'SHA1' => self::$known['SHA1'] ??= new self('SHA1'),
            'SHA256' => self::$known['SHA256'] ??= new self('SHA256'),
            'CRC64NVME' => self::$known['CRC64NVME'] ??= new self('CRC64NVME'),
            'SHA512' => self::$known['SHA512'] ??= new self('SHA512'),
            'MD5' => self::$known['MD5'] ??= new self('MD5'),
            'XXHASH64' => self::$known['XXHASH64'] ??= new self('XXHASH64'),
            'XXHASH3' => self::$known['XXHASH3'] ??= new self('XXHASH3'),
            'XXHASH128' => self::$known['XXHASH128'] ??= new self('XXHASH128'),
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
        return [self::crc32(), self::crc32c(), self::sha1(), self::sha256(), self::crc64nvme(), self::sha512(), self::md5(), self::xxhash64(), self::xxhash3(), self::xxhash128()];
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
        return Schemas::checksumAlgorithm();
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
