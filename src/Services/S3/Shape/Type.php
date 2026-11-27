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

final class Type implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#Type';

    /** @var array<array-key, self> */
    private static array $known = [];

    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function canonicalUser(): self
    {
        return self::$known['CanonicalUser'] ??= new self('CanonicalUser');
    }

    public static function amazonCustomerByEmail(): self
    {
        return self::$known['AmazonCustomerByEmail'] ??= new self('AmazonCustomerByEmail');
    }

    public static function group(): self
    {
        return self::$known['Group'] ??= new self('Group');
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
            'CanonicalUser' => self::$known['CanonicalUser'] ??= new self('CanonicalUser'),
            'AmazonCustomerByEmail' => self::$known['AmazonCustomerByEmail'] ??= new self('AmazonCustomerByEmail'),
            'Group' => self::$known['Group'] ??= new self('Group'),
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
        return [self::canonicalUser(), self::amazonCustomerByEmail(), self::group()];
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
        return Schemas::type();
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
