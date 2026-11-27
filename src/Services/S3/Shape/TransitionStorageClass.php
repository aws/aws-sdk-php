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

final class TransitionStorageClass implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#TransitionStorageClass';

    /** @var array<array-key, self> */
    private static array $known = [];

    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function glacier(): self
    {
        return self::$known['GLACIER'] ??= new self('GLACIER');
    }

    public static function standardIa(): self
    {
        return self::$known['STANDARD_IA'] ??= new self('STANDARD_IA');
    }

    public static function onezoneIa(): self
    {
        return self::$known['ONEZONE_IA'] ??= new self('ONEZONE_IA');
    }

    public static function intelligentTiering(): self
    {
        return self::$known['INTELLIGENT_TIERING'] ??= new self('INTELLIGENT_TIERING');
    }

    public static function deepArchive(): self
    {
        return self::$known['DEEP_ARCHIVE'] ??= new self('DEEP_ARCHIVE');
    }

    public static function glacierIr(): self
    {
        return self::$known['GLACIER_IR'] ??= new self('GLACIER_IR');
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
            'GLACIER' => self::$known['GLACIER'] ??= new self('GLACIER'),
            'STANDARD_IA' => self::$known['STANDARD_IA'] ??= new self('STANDARD_IA'),
            'ONEZONE_IA' => self::$known['ONEZONE_IA'] ??= new self('ONEZONE_IA'),
            'INTELLIGENT_TIERING' => self::$known['INTELLIGENT_TIERING'] ??= new self('INTELLIGENT_TIERING'),
            'DEEP_ARCHIVE' => self::$known['DEEP_ARCHIVE'] ??= new self('DEEP_ARCHIVE'),
            'GLACIER_IR' => self::$known['GLACIER_IR'] ??= new self('GLACIER_IR'),
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
        return [self::glacier(), self::standardIa(), self::onezoneIa(), self::intelligentTiering(), self::deepArchive(), self::glacierIr()];
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
        return Schemas::transitionStorageClass();
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
