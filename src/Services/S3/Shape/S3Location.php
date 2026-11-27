<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

/**
 * Describes an Amazon S3 location that will receive the results of the restore request.
 */
final class S3Location implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#S3Location';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET_NAME;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_ENCRYPTION;
    private static Schema $SCHEMA_CANNED_ACL;
    private static Schema $SCHEMA_ACCESS_CONTROL_LIST;
    private static Schema $SCHEMA_TAGGING;
    private static Schema $SCHEMA_USER_METADATA;
    private static Schema $SCHEMA_STORAGE_CLASS;

    public readonly ?ObjectCannedACL $cannedACL;
    public readonly ?StorageClass $storageClass;

    /**
     * @param ?string $bucketName The name of the bucket where the restore results will be placed.
     * @param ?string $prefix The prefix that is prepended to the restore results for this request.
     * @param ?ObjectCannedACL $cannedACL The canned ACL to apply to the restore results.
     * @param list<\Aws\Services\S3\Shape\Grant>|null $accessControlList
     * @param ?Tagging $tagging The tag-set that is applied to the restore results.
     * @param list<\Aws\Services\S3\Shape\MetadataEntry>|null $userMetadata
     * @param ?StorageClass $storageClass The class of storage used to store the restore results.
     */
    public function __construct(
        public readonly ?string $bucketName = null,
        public readonly ?string $prefix = null,
        public readonly ?Encryption $encryption = null,
        ObjectCannedACL|string|null $cannedACL = null,
        public readonly ?array $accessControlList = null,
        public readonly ?Tagging $tagging = null,
        public readonly ?array $userMetadata = null,
        StorageClass|string|null $storageClass = null
    ) {
        $this->cannedACL = $cannedACL === null || $cannedACL instanceof ObjectCannedACL ? $cannedACL : ObjectCannedACL::fromValue($cannedACL);
        $this->storageClass = $storageClass === null || $storageClass instanceof StorageClass ? $storageClass : StorageClass::fromValue($storageClass);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::s3Location();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET_NAME = $m[0];
        self::$SCHEMA_PREFIX = $m[1];
        self::$SCHEMA_ENCRYPTION = $m[2];
        self::$SCHEMA_CANNED_ACL = $m[3];
        self::$SCHEMA_ACCESS_CONTROL_LIST = $m[4];
        self::$SCHEMA_TAGGING = $m[5];
        self::$SCHEMA_USER_METADATA = $m[6];
        self::$SCHEMA_STORAGE_CLASS = $m[7];
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
        if (isset($this->bucketName)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET_NAME, $this->bucketName, 0);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 1);
        }
        if (isset($this->encryption)) {
            $serializer->serializeStruct(self::$SCHEMA_ENCRYPTION, $this->encryption, 2);
        }
        if (isset($this->cannedACL)) {
            $serializer->serializeString(self::$SCHEMA_CANNED_ACL, $this->cannedACL->value, 3);
        }
        if (isset($this->accessControlList)) {
            $serializer->serializeList(self::$SCHEMA_ACCESS_CONTROL_LIST, $this->accessControlList, 4);
        }
        if (isset($this->tagging)) {
            $serializer->serializeStruct(self::$SCHEMA_TAGGING, $this->tagging, 5);
        }
        if (isset($this->userMetadata)) {
            $serializer->serializeList(self::$SCHEMA_USER_METADATA, $this->userMetadata, 6);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 7);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucketName,
            1 => $this->prefix,
            2 => $this->encryption,
            3 => $this->cannedACL,
            4 => $this->accessControlList,
            5 => $this->tagging,
            6 => $this->userMetadata,
            7 => $this->storageClass,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->bucketName,
            $this->prefix,
            $this->encryption,
            $this->cannedACL,
            $this->accessControlList,
            $this->tagging,
            $this->userMetadata,
            $this->storageClass
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
