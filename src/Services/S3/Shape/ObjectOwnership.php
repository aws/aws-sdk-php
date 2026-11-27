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

/**
 * <p>The container element for object ownership for a bucket's ownership controls.</p>
         <p>
           
 * <code>BucketOwnerPreferred</code> - Objects uploaded to the bucket change ownership to the bucket
      owner if the
 * objects are uploaded with the <code>bucket-owner-full-control</code> canned ACL.</p>
         <p>
           
 * <code>ObjectWriter</code> - The uploading account will own the object if the object is uploaded with
      the
 * <code>bucket-owner-full-control</code> canned ACL.</p>
         <p>
            <code>BucketOwnerEnforced</code> -
 * Access control lists (ACLs) are disabled and no longer affect
      permissions. The bucket owner automatically owns
 * and has full control over every object in the bucket.
      The bucket only accepts PUT requests that don't specify
 * an ACL or specify bucket owner full control ACLs
      (such as the predefined <code>bucket-owner-full-control</code>
 * canned ACL or a custom ACL in XML format
      that grants the same permissions).</p>
         <p>By default,
 * <code>ObjectOwnership</code> is set to <code>BucketOwnerEnforced</code> and ACLs are
      disabled. We recommend
 * keeping ACLs disabled, except in uncommon use cases where you must control access
      for each object individually.
 * For more information about S3 Object Ownership, see <a
 * href="https://docs.aws.amazon.com/AmazonS3/latest/userguide/about-object-ownership.html">Controlling
       
 * ownership of objects and disabling ACLs for your bucket</a> in the
        <i>Amazon S3 User Guide</i>. </p>
        
 * <note>
            <p>This functionality is not supported for directory buckets. Directory buckets use the bucket
 * owner enforced setting for S3 Object Ownership.</p>
         </note>
 */
final class ObjectOwnership implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#ObjectOwnership';

    /** @var array<array-key, self> */
    private static array $known = [];

    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function bucketOwnerPreferred(): self
    {
        return self::$known['BucketOwnerPreferred'] ??= new self('BucketOwnerPreferred');
    }

    public static function objectWriter(): self
    {
        return self::$known['ObjectWriter'] ??= new self('ObjectWriter');
    }

    public static function bucketOwnerEnforced(): self
    {
        return self::$known['BucketOwnerEnforced'] ??= new self('BucketOwnerEnforced');
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
            'BucketOwnerPreferred' => self::$known['BucketOwnerPreferred'] ??= new self('BucketOwnerPreferred'),
            'ObjectWriter' => self::$known['ObjectWriter'] ??= new self('ObjectWriter'),
            'BucketOwnerEnforced' => self::$known['BucketOwnerEnforced'] ??= new self('BucketOwnerEnforced'),
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
        return [self::bucketOwnerPreferred(), self::objectWriter(), self::bucketOwnerEnforced()];
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
        return Schemas::objectOwnership();
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
