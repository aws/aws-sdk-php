<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Smithy\Client\Pagination\PageSizePaginatedRequestInterface;
use Smithy\Client\Pagination\PaginatedRequestInterface;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class ListBucketsRequest implements
    SerializableStructInterface,
    PaginatedRequestInterface,
    PageSizePaginatedRequestInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListBucketsRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_MAX_BUCKETS;
    private static Schema $SCHEMA_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_BUCKET_REGION;

    /**
     * @param ?int $maxBuckets Maximum number of buckets to be returned in response. When the number is more than the count
     *        of buckets that are owned by an Amazon Web Services account, return all the buckets in response.
     * @param ?string $continuationToken ContinuationToken indicates to Amazon S3 that the list is being continued on this
     *        bucket with a token. ContinuationToken is obfuscated and is not a real key. You can use this ContinuationToken
     * for
     *        pagination of the list results. Length Constraints: Minimum length of 0. Maximum length of 1024. Required: No.
     * If you
     *        specify the bucket-region, prefix, or continuation-token query parameters without using max-buckets to set the
     *        maximum number of buckets returned in the response, Amazon S3 applies a default page size of 10,000 and
     * provides a
     *        continuation token if there are more buckets.
     * @param ?string $prefix Limits the response to bucket names that begin with the specified bucket name prefix.
     * @param ?string $bucketRegion Limits the response to buckets that are located in the specified Amazon Web Services
     *        Region. The Amazon Web Services Region must be expressed according to the Amazon Web Services Region code,
     * such as
     *        us-west-2 for the US West (Oregon) Region. For a list of the valid values for all of the Amazon Web Services
     * Regions,
     *        see Regions and Endpoints. Requests made to a Regional endpoint that is different from the bucket-region
     * parameter
     *        are not supported. For example, if you want to limit the response to your buckets in Region us-west-2, the
     * request
     *        must be made to an endpoint in Region us-west-2.
     */
    public function __construct(
        public readonly ?int $maxBuckets = null,
        public readonly ?string $continuationToken = null,
        public readonly ?string $prefix = null,
        public readonly ?string $bucketRegion = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::listBucketsRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_MAX_BUCKETS = $m[0];
        self::$SCHEMA_CONTINUATION_TOKEN = $m[1];
        self::$SCHEMA_PREFIX = $m[2];
        self::$SCHEMA_BUCKET_REGION = $m[3];
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
     * Get the pagination token.
     */
    public function getPaginationToken(): ?string
    {
        return $this->continuationToken;
    }

    /**
     * Create a copy with a pagination token.
     *
     * @param string|array<array-key, mixed>|null $token Token of type `string|null`.
     */
    public function withPaginationToken(string|array|null $token): self
    {
        self::schema();

        return $this->withMemberValue(self::$SCHEMA_CONTINUATION_TOKEN, $token);
    }

    /**
     * Get the pagination page size.
     */
    public function getPaginationPageSize(): ?int
    {
        return $this->maxBuckets;
    }

    /**
     * Create a copy with a pagination page size.
     */
    public function withPaginationPageSize(int $pageSize): self
    {
        self::schema();

        return $this->withMemberValue(self::$SCHEMA_MAX_BUCKETS, $pageSize);
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
        if (isset($this->maxBuckets)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_BUCKETS, $this->maxBuckets, 0);
        }
        if (isset($this->continuationToken)) {
            $serializer->serializeString(self::$SCHEMA_CONTINUATION_TOKEN, $this->continuationToken, 1);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 2);
        }
        if (isset($this->bucketRegion)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET_REGION, $this->bucketRegion, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->maxBuckets,
            1 => $this->continuationToken,
            2 => $this->prefix,
            3 => $this->bucketRegion,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->maxBuckets,
            $this->continuationToken,
            $this->prefix,
            $this->bucketRegion
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
