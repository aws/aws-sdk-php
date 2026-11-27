<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

/**
 * In terms of implementation, a Bucket is a resource.
 */
final class Bucket implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Bucket';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_NAME;
    private static Schema $SCHEMA_CREATION_DATE;
    private static Schema $SCHEMA_BUCKET_REGION;
    private static Schema $SCHEMA_BUCKET_ARN;

    /**
     * @param ?string $name The name of the bucket.
     * @param ?float $creationDate Date the bucket was created. This date can change when making changes to your bucket,
     *        such as editing its bucket policy.
     * @param ?string $bucketRegion BucketRegion indicates the Amazon Web Services region where the bucket is located. If
     *        the request contains at least one valid parameter, it is included in the response.
     * @param ?string $bucketArn The Amazon Resource Name (ARN) of the S3 bucket. ARNs uniquely identify Amazon Web Services
     *        resources across all of Amazon Web Services. This parameter is only supported for S3 directory buckets. For
     * more
     *        information, see Using tags with directory buckets.
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?float $creationDate = null,
        public readonly ?string $bucketRegion = null,
        public readonly ?string $bucketArn = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::bucket();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_NAME = $m[0];
        self::$SCHEMA_CREATION_DATE = $m[1];
        self::$SCHEMA_BUCKET_REGION = $m[2];
        self::$SCHEMA_BUCKET_ARN = $m[3];
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
        if (isset($this->name)) {
            $serializer->serializeString(self::$SCHEMA_NAME, $this->name, 0);
        }
        if (isset($this->creationDate)) {
            $serializer->serializeTimestamp(self::$SCHEMA_CREATION_DATE, $this->creationDate, 1);
        }
        if (isset($this->bucketRegion)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET_REGION, $this->bucketRegion, 2);
        }
        if (isset($this->bucketArn)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET_ARN, $this->bucketArn, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->name,
            1 => $this->creationDate,
            2 => $this->bucketRegion,
            3 => $this->bucketArn,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->name,
            $this->creationDate,
            $this->bucketRegion,
            $this->bucketArn
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
