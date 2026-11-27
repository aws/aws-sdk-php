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

final class ReplicationStatus implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#ReplicationStatus';

    /** @var array<array-key, self> */
    private static array $known = [];

    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function complete(): self
    {
        return self::$known['COMPLETE'] ??= new self('COMPLETE');
    }

    public static function pending(): self
    {
        return self::$known['PENDING'] ??= new self('PENDING');
    }

    public static function failed(): self
    {
        return self::$known['FAILED'] ??= new self('FAILED');
    }

    public static function replica(): self
    {
        return self::$known['REPLICA'] ??= new self('REPLICA');
    }

    public static function completed(): self
    {
        return self::$known['COMPLETED'] ??= new self('COMPLETED');
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
            'COMPLETE' => self::$known['COMPLETE'] ??= new self('COMPLETE'),
            'PENDING' => self::$known['PENDING'] ??= new self('PENDING'),
            'FAILED' => self::$known['FAILED'] ??= new self('FAILED'),
            'REPLICA' => self::$known['REPLICA'] ??= new self('REPLICA'),
            'COMPLETED' => self::$known['COMPLETED'] ??= new self('COMPLETED'),
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
        return [self::complete(), self::pending(), self::failed(), self::replica(), self::completed()];
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
        return Schemas::replicationStatus();
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
