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

final class InventoryOptionalField implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#InventoryOptionalField';

    /** @var array<array-key, self> */
    private static array $known = [];

    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function size(): self
    {
        return self::$known['Size'] ??= new self('Size');
    }

    public static function lastModifiedDate(): self
    {
        return self::$known['LastModifiedDate'] ??= new self('LastModifiedDate');
    }

    public static function storageClass(): self
    {
        return self::$known['StorageClass'] ??= new self('StorageClass');
    }

    public static function eTag(): self
    {
        return self::$known['ETag'] ??= new self('ETag');
    }

    public static function isMultipartUploaded(): self
    {
        return self::$known['IsMultipartUploaded'] ??= new self('IsMultipartUploaded');
    }

    public static function replicationStatus(): self
    {
        return self::$known['ReplicationStatus'] ??= new self('ReplicationStatus');
    }

    public static function encryptionStatus(): self
    {
        return self::$known['EncryptionStatus'] ??= new self('EncryptionStatus');
    }

    public static function objectLockRetainUntilDate(): self
    {
        return self::$known['ObjectLockRetainUntilDate'] ??= new self('ObjectLockRetainUntilDate');
    }

    public static function objectLockMode(): self
    {
        return self::$known['ObjectLockMode'] ??= new self('ObjectLockMode');
    }

    public static function objectLockLegalHoldStatus(): self
    {
        return self::$known['ObjectLockLegalHoldStatus'] ??= new self('ObjectLockLegalHoldStatus');
    }

    public static function objectLockEventHoldStatus(): self
    {
        return self::$known['ObjectLockEventHoldStatus'] ??= new self('ObjectLockEventHoldStatus');
    }

    public static function objectLockEventHoldDuration(): self
    {
        return self::$known['ObjectLockEventHoldDuration'] ??= new self('ObjectLockEventHoldDuration');
    }

    public static function intelligentTieringAccessTier(): self
    {
        return self::$known['IntelligentTieringAccessTier'] ??= new self('IntelligentTieringAccessTier');
    }

    public static function bucketKeyStatus(): self
    {
        return self::$known['BucketKeyStatus'] ??= new self('BucketKeyStatus');
    }

    public static function checksumAlgorithm(): self
    {
        return self::$known['ChecksumAlgorithm'] ??= new self('ChecksumAlgorithm');
    }

    public static function objectAccessControlList(): self
    {
        return self::$known['ObjectAccessControlList'] ??= new self('ObjectAccessControlList');
    }

    public static function objectOwner(): self
    {
        return self::$known['ObjectOwner'] ??= new self('ObjectOwner');
    }

    public static function lifecycleExpirationDate(): self
    {
        return self::$known['LifecycleExpirationDate'] ??= new self('LifecycleExpirationDate');
    }

    public static function intelligentTieringReferenceDate(): self
    {
        return self::$known['IntelligentTieringReferenceDate'] ??= new self('IntelligentTieringReferenceDate');
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
            'Size' => self::$known['Size'] ??= new self('Size'),
            'LastModifiedDate' => self::$known['LastModifiedDate'] ??= new self('LastModifiedDate'),
            'StorageClass' => self::$known['StorageClass'] ??= new self('StorageClass'),
            'ETag' => self::$known['ETag'] ??= new self('ETag'),
            'IsMultipartUploaded' => self::$known['IsMultipartUploaded'] ??= new self('IsMultipartUploaded'),
            'ReplicationStatus' => self::$known['ReplicationStatus'] ??= new self('ReplicationStatus'),
            'EncryptionStatus' => self::$known['EncryptionStatus'] ??= new self('EncryptionStatus'),
            'ObjectLockRetainUntilDate' => self::$known['ObjectLockRetainUntilDate'] ??= new self('ObjectLockRetainUntilDate'),
            'ObjectLockMode' => self::$known['ObjectLockMode'] ??= new self('ObjectLockMode'),
            'ObjectLockLegalHoldStatus' => self::$known['ObjectLockLegalHoldStatus'] ??= new self('ObjectLockLegalHoldStatus'),
            'ObjectLockEventHoldStatus' => self::$known['ObjectLockEventHoldStatus'] ??= new self('ObjectLockEventHoldStatus'),
            'ObjectLockEventHoldDuration' => self::$known['ObjectLockEventHoldDuration'] ??= new self('ObjectLockEventHoldDuration'),
            'IntelligentTieringAccessTier' => self::$known['IntelligentTieringAccessTier'] ??= new self('IntelligentTieringAccessTier'),
            'BucketKeyStatus' => self::$known['BucketKeyStatus'] ??= new self('BucketKeyStatus'),
            'ChecksumAlgorithm' => self::$known['ChecksumAlgorithm'] ??= new self('ChecksumAlgorithm'),
            'ObjectAccessControlList' => self::$known['ObjectAccessControlList'] ??= new self('ObjectAccessControlList'),
            'ObjectOwner' => self::$known['ObjectOwner'] ??= new self('ObjectOwner'),
            'LifecycleExpirationDate' => self::$known['LifecycleExpirationDate'] ??= new self('LifecycleExpirationDate'),
            'IntelligentTieringReferenceDate' => self::$known['IntelligentTieringReferenceDate'] ??= new self('IntelligentTieringReferenceDate'),
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
        return [self::size(), self::lastModifiedDate(), self::storageClass(), self::eTag(), self::isMultipartUploaded(), self::replicationStatus(), self::encryptionStatus(), self::objectLockRetainUntilDate(), self::objectLockMode(), self::objectLockLegalHoldStatus(), self::objectLockEventHoldStatus(), self::objectLockEventHoldDuration(), self::intelligentTieringAccessTier(), self::bucketKeyStatus(), self::checksumAlgorithm(), self::objectAccessControlList(), self::objectOwner(), self::lifecycleExpirationDate(), self::intelligentTieringReferenceDate()];
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
        return Schemas::inventoryOptionalField();
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
