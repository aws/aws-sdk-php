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

final class StorageClass implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#StorageClass';

    /** @var array<array-key, self> */
    private static array $known = [];

    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function standard(): self
    {
        return self::$known['STANDARD'] ??= new self('STANDARD');
    }

    public static function reducedRedundancy(): self
    {
        return self::$known['REDUCED_REDUNDANCY'] ??= new self('REDUCED_REDUNDANCY');
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

    public static function glacier(): self
    {
        return self::$known['GLACIER'] ??= new self('GLACIER');
    }

    public static function deepArchive(): self
    {
        return self::$known['DEEP_ARCHIVE'] ??= new self('DEEP_ARCHIVE');
    }

    public static function outposts(): self
    {
        return self::$known['OUTPOSTS'] ??= new self('OUTPOSTS');
    }

    public static function glacierIr(): self
    {
        return self::$known['GLACIER_IR'] ??= new self('GLACIER_IR');
    }

    public static function snow(): self
    {
        return self::$known['SNOW'] ??= new self('SNOW');
    }

    public static function expressOnezone(): self
    {
        return self::$known['EXPRESS_ONEZONE'] ??= new self('EXPRESS_ONEZONE');
    }

    public static function fsxOpenzfs(): self
    {
        return self::$known['FSX_OPENZFS'] ??= new self('FSX_OPENZFS');
    }

    public static function fsxOntap(): self
    {
        return self::$known['FSX_ONTAP'] ??= new self('FSX_ONTAP');
    }

    public static function awsBackupWarm(): self
    {
        return self::$known['AWS_BACKUP_WARM'] ??= new self('AWS_BACKUP_WARM');
    }

    public static function awsBackupLowCostWarm(): self
    {
        return self::$known['AWS_BACKUP_LOW_COST_WARM'] ??= new self('AWS_BACKUP_LOW_COST_WARM');
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
            'STANDARD' => self::$known['STANDARD'] ??= new self('STANDARD'),
            'REDUCED_REDUNDANCY' => self::$known['REDUCED_REDUNDANCY'] ??= new self('REDUCED_REDUNDANCY'),
            'STANDARD_IA' => self::$known['STANDARD_IA'] ??= new self('STANDARD_IA'),
            'ONEZONE_IA' => self::$known['ONEZONE_IA'] ??= new self('ONEZONE_IA'),
            'INTELLIGENT_TIERING' => self::$known['INTELLIGENT_TIERING'] ??= new self('INTELLIGENT_TIERING'),
            'GLACIER' => self::$known['GLACIER'] ??= new self('GLACIER'),
            'DEEP_ARCHIVE' => self::$known['DEEP_ARCHIVE'] ??= new self('DEEP_ARCHIVE'),
            'OUTPOSTS' => self::$known['OUTPOSTS'] ??= new self('OUTPOSTS'),
            'GLACIER_IR' => self::$known['GLACIER_IR'] ??= new self('GLACIER_IR'),
            'SNOW' => self::$known['SNOW'] ??= new self('SNOW'),
            'EXPRESS_ONEZONE' => self::$known['EXPRESS_ONEZONE'] ??= new self('EXPRESS_ONEZONE'),
            'FSX_OPENZFS' => self::$known['FSX_OPENZFS'] ??= new self('FSX_OPENZFS'),
            'FSX_ONTAP' => self::$known['FSX_ONTAP'] ??= new self('FSX_ONTAP'),
            'AWS_BACKUP_WARM' => self::$known['AWS_BACKUP_WARM'] ??= new self('AWS_BACKUP_WARM'),
            'AWS_BACKUP_LOW_COST_WARM' => self::$known['AWS_BACKUP_LOW_COST_WARM'] ??= new self('AWS_BACKUP_LOW_COST_WARM'),
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
        return [self::standard(), self::reducedRedundancy(), self::standardIa(), self::onezoneIa(), self::intelligentTiering(), self::glacier(), self::deepArchive(), self::outposts(), self::glacierIr(), self::snow(), self::expressOnezone(), self::fsxOpenzfs(), self::fsxOntap(), self::awsBackupWarm(), self::awsBackupLowCostWarm()];
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
        return Schemas::storageClass();
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
