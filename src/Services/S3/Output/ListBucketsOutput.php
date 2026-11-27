<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\Owner;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class ListBucketsOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListBucketsOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKETS;
    private static Schema $SCHEMA_OWNER;
    private static Schema $SCHEMA_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_PREFIX;

    /**
     * @param list<\Aws\Services\S3\Shape\Bucket>|null $buckets
     * @param ?Owner $owner The owner of the buckets listed.
     * @param ?string $continuationToken ContinuationToken is included in the response when there are more buckets that can
     *        be listed with pagination. The next ListBuckets request to Amazon S3 can be continued with this
     * ContinuationToken.
     *        ContinuationToken is obfuscated and is not a real bucket.
     * @param ?string $prefix If Prefix was sent with the request, it is included in the response. All bucket names in the
     *        response begin with the specified bucket name prefix.
     */
    public function __construct(
        public readonly ?array $buckets = null,
        public readonly ?Owner $owner = null,
        public readonly ?string $continuationToken = null,
        public readonly ?string $prefix = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::listBucketsOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKETS = $m[0];
        self::$SCHEMA_OWNER = $m[1];
        self::$SCHEMA_CONTINUATION_TOKEN = $m[2];
        self::$SCHEMA_PREFIX = $m[3];
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
        if (isset($this->buckets)) {
            $serializer->serializeList(self::$SCHEMA_BUCKETS, $this->buckets, 0);
        }
        if (isset($this->owner)) {
            $serializer->serializeStruct(self::$SCHEMA_OWNER, $this->owner, 1);
        }
        if (isset($this->continuationToken)) {
            $serializer->serializeString(self::$SCHEMA_CONTINUATION_TOKEN, $this->continuationToken, 2);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->buckets,
            1 => $this->owner,
            2 => $this->continuationToken,
            3 => $this->prefix,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->buckets,
            $this->owner,
            $this->continuationToken,
            $this->prefix
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
