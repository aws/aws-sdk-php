<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\BucketCannedACL;
use Aws\Services\S3\Shape\BucketNamespace;
use Aws\Services\S3\Shape\CreateBucketConfiguration;
use Aws\Services\S3\Shape\ObjectOwnership;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class CreateBucketRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CreateBucketRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_ACL;
    private static Schema $SCHEMA_CREATE_BUCKET_CONFIGURATION;
    private static Schema $SCHEMA_GRANT_FULL_CONTROL;
    private static Schema $SCHEMA_GRANT_READ;
    private static Schema $SCHEMA_GRANT_READ_ACP;
    private static Schema $SCHEMA_GRANT_WRITE;
    private static Schema $SCHEMA_GRANT_WRITE_ACP;
    private static Schema $SCHEMA_OBJECT_LOCK_ENABLED_FOR_BUCKET;
    private static Schema $SCHEMA_OBJECT_OWNERSHIP;
    private static Schema $SCHEMA_BUCKET_NAMESPACE;

    public readonly ?BucketCannedACL $aCL;
    public readonly ?ObjectOwnership $objectOwnership;
    public readonly ?BucketNamespace $bucketNamespace;

    /**
     * @param ?string $bucket The name of the bucket to create. General purpose buckets - For information about bucket
     *        naming restrictions, see Bucket naming rules in the Amazon S3 User Guide. Directory buckets - When you use
     * this
     *        operation with a directory bucket, you must use path-style requests in the format
     *        https://s3express-control.region-code.amazonaws.com/bucket-name . Virtual-hosted-style requests aren't
     * supported.
     *        Directory bucket names must be unique in the chosen Zone (Availability Zone or Local Zone). Bucket names must
     * also
     *        follow the format bucket-base-name--zone-id--x-s3 (for example, DOC-EXAMPLE-BUCKET--usw2-az1--x-s3). For
     * information
     *        about bucket naming restrictions, see Directory bucket naming rules in the Amazon S3 User Guide
     * @param ?BucketCannedACL $aCL The canned ACL to apply to the bucket. This functionality is not supported for directory
     *        buckets.
     * @param ?CreateBucketConfiguration $createBucketConfiguration The configuration information for the bucket.
     * @param ?string $grantFullControl Allows grantee the read, write, read ACP, and write ACP permissions on the bucket.
     *        This functionality is not supported for directory buckets.
     * @param ?string $grantRead Allows grantee to list the objects in the bucket. This functionality is not supported for
     *        directory buckets.
     * @param ?string $grantReadACP Allows grantee to read the bucket ACL. This functionality is not supported for directory
     *        buckets.
     * @param ?string $grantWrite Allows grantee to create new objects in the bucket. For the bucket and object owners of
     *        existing objects, also allows deletions and overwrites of those objects. This functionality is not supported
     * for
     *        directory buckets.
     * @param ?string $grantWriteACP Allows grantee to write the ACL for the applicable bucket. This functionality is not
     *        supported for directory buckets.
     * @param ?bool $objectLockEnabledForBucket Specifies whether you want S3 Object Lock to be enabled for the new bucket.
     *        This functionality is not supported for directory buckets.
     * @param ?BucketNamespace $bucketNamespace Specifies the namespace where you want to create your general purpose
     *        bucket. When you create a general purpose bucket, you can choose to create a bucket in the shared global
     * namespace or
     *        you can choose to create a bucket in your account regional namespace. Your account regional namespace is a
     *        subdivision of the global namespace that only your account can create buckets in. For more information on
     * bucket
     *        namespaces, see Namespaces for general purpose buckets. General purpose buckets in your account regional
     * namespace
     *        must follow a specific naming convention. These buckets consist of a bucket name prefix that you create, and a
     * suffix
     *        that contains your 12-digit Amazon Web Services Account ID, the Amazon Web Services Region code, and ends with
     * -an.
     *        Bucket names must follow the format bucket-name-prefix-accountId-region-an (for example,
     *        amzn-s3-demo-bucket-111122223333-us-west-2-an). For information about bucket naming restrictions, see Account
     *        regional namespace naming rules in the Amazon S3 User Guide. This functionality is not supported for directory
     *        buckets.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        BucketCannedACL|string|null $aCL = null,
        public readonly ?CreateBucketConfiguration $createBucketConfiguration = null,
        public readonly ?string $grantFullControl = null,
        public readonly ?string $grantRead = null,
        public readonly ?string $grantReadACP = null,
        public readonly ?string $grantWrite = null,
        public readonly ?string $grantWriteACP = null,
        public readonly ?bool $objectLockEnabledForBucket = null,
        ObjectOwnership|string|null $objectOwnership = null,
        BucketNamespace|string|null $bucketNamespace = null
    ) {
        $this->aCL = $aCL === null || $aCL instanceof BucketCannedACL ? $aCL : BucketCannedACL::fromValue($aCL);
        $this->objectOwnership = $objectOwnership === null || $objectOwnership instanceof ObjectOwnership ? $objectOwnership : ObjectOwnership::fromValue($objectOwnership);
        $this->bucketNamespace = $bucketNamespace === null || $bucketNamespace instanceof BucketNamespace ? $bucketNamespace : BucketNamespace::fromValue($bucketNamespace);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::createBucketRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_ACL = $m[1];
        self::$SCHEMA_CREATE_BUCKET_CONFIGURATION = $m[2];
        self::$SCHEMA_GRANT_FULL_CONTROL = $m[3];
        self::$SCHEMA_GRANT_READ = $m[4];
        self::$SCHEMA_GRANT_READ_ACP = $m[5];
        self::$SCHEMA_GRANT_WRITE = $m[6];
        self::$SCHEMA_GRANT_WRITE_ACP = $m[7];
        self::$SCHEMA_OBJECT_LOCK_ENABLED_FOR_BUCKET = $m[8];
        self::$SCHEMA_OBJECT_OWNERSHIP = $m[9];
        self::$SCHEMA_BUCKET_NAMESPACE = $m[10];
        return self::$SCHEMA = $s;
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
        $serializer->serializeStruct(self::schema(), $this, $idx);
    }

    /**
     * Serialize the shape members to the desired wire format.
     *
     * @return void
     */
    public function serializeMembers(ShapeSerializerInterface $serializer): void
    {
        if (isset($this->bucket)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET, $this->bucket, 0);
        }
        if (isset($this->aCL)) {
            $serializer->serializeString(self::$SCHEMA_ACL, $this->aCL->value, 1);
        }
        if (isset($this->createBucketConfiguration)) {
            $serializer->serializeStruct(self::$SCHEMA_CREATE_BUCKET_CONFIGURATION, $this->createBucketConfiguration, 2);
        }
        if (isset($this->grantFullControl)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_FULL_CONTROL, $this->grantFullControl, 3);
        }
        if (isset($this->grantRead)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_READ, $this->grantRead, 4);
        }
        if (isset($this->grantReadACP)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_READ_ACP, $this->grantReadACP, 5);
        }
        if (isset($this->grantWrite)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_WRITE, $this->grantWrite, 6);
        }
        if (isset($this->grantWriteACP)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_WRITE_ACP, $this->grantWriteACP, 7);
        }
        if (isset($this->objectLockEnabledForBucket)) {
            $serializer->serializeBoolean(self::$SCHEMA_OBJECT_LOCK_ENABLED_FOR_BUCKET, $this->objectLockEnabledForBucket, 8);
        }
        if (isset($this->objectOwnership)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_OWNERSHIP, $this->objectOwnership->value, 9);
        }
        if (isset($this->bucketNamespace)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET_NAMESPACE, $this->bucketNamespace->value, 10);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->aCL,
            2 => $this->createBucketConfiguration,
            3 => $this->grantFullControl,
            4 => $this->grantRead,
            5 => $this->grantReadACP,
            6 => $this->grantWrite,
            7 => $this->grantWriteACP,
            8 => $this->objectLockEnabledForBucket,
            9 => $this->objectOwnership,
            10 => $this->bucketNamespace,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->bucket,
            $this->aCL,
            $this->createBucketConfiguration,
            $this->grantFullControl,
            $this->grantRead,
            $this->grantReadACP,
            $this->grantWrite,
            $this->grantWriteACP,
            $this->objectLockEnabledForBucket,
            $this->objectOwnership,
            $this->bucketNamespace
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
