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

final class ServerSideEncryption implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#ServerSideEncryption';

    /** @var array<array-key, self> */
    private static array $known = [];

    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function aes256(): self
    {
        return self::$known['AES256'] ??= new self('AES256');
    }

    public static function aws_fsx(): self
    {
        return self::$known['aws:fsx'] ??= new self('aws:fsx');
    }

    public static function aws_backup(): self
    {
        return self::$known['aws:backup'] ??= new self('aws:backup');
    }

    public static function aws_kms(): self
    {
        return self::$known['aws:kms'] ??= new self('aws:kms');
    }

    public static function aws_kms_dsse(): self
    {
        return self::$known['aws:kms:dsse'] ??= new self('aws:kms:dsse');
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
            'AES256' => self::$known['AES256'] ??= new self('AES256'),
            'aws:fsx' => self::$known['aws:fsx'] ??= new self('aws:fsx'),
            'aws:backup' => self::$known['aws:backup'] ??= new self('aws:backup'),
            'aws:kms' => self::$known['aws:kms'] ??= new self('aws:kms'),
            'aws:kms:dsse' => self::$known['aws:kms:dsse'] ??= new self('aws:kms:dsse'),
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
        return [self::aes256(), self::aws_fsx(), self::aws_backup(), self::aws_kms(), self::aws_kms_dsse()];
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
        return Schemas::serverSideEncryption();
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
