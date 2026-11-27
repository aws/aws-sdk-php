<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class CreateBucketOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CreateBucketOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_LOCATION;
    private static Schema $SCHEMA_BUCKET_ARN;

    /**
     * @param ?string $location A forward slash followed by the name of the bucket for all account regional namespace
     *        buckets and all global general purpose buckets created in us-east-1. For example, /amzn-s3-demo-bucket. For
     * global
     *        general purpose buckets created in other Amazon Web Services Regions, the Location field is the global
     * endpoint URL.
     *        For example, http://amzn-s3-demo-bucket.s3.amazonaws.com/.
     * @param ?string $bucketArn The Amazon Resource Name (ARN) of the S3 bucket. ARNs uniquely identify Amazon Web Services
     *        resources across all of Amazon Web Services. This parameter is only supported for S3 directory buckets. For
     * more
     *        information, see Using tags with directory buckets.
     */
    public function __construct(
        public readonly ?string $location = null,
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
        $s = Schemas::createBucketOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_LOCATION = $m[0];
        self::$SCHEMA_BUCKET_ARN = $m[1];
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
        if (isset($this->location)) {
            $serializer->serializeString(self::$SCHEMA_LOCATION, $this->location, 0);
        }
        if (isset($this->bucketArn)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET_ARN, $this->bucketArn, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->location,
            1 => $this->bucketArn,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->location,
            $this->bucketArn
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
