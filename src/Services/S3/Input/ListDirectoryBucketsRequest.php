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

final class ListDirectoryBucketsRequest implements
    SerializableStructInterface,
    PaginatedRequestInterface,
    PageSizePaginatedRequestInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListDirectoryBucketsRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_MAX_DIRECTORY_BUCKETS;

    /**
     * @param ?string $continuationToken ContinuationToken indicates to Amazon S3 that the list is being continued on
     *        buckets in this account with a token. ContinuationToken is obfuscated and is not a real bucket name. You can
     * use this
     *        ContinuationToken for the pagination of the list results.
     * @param ?int $maxDirectoryBuckets Maximum number of buckets to be returned in response. When the number is more than
     *        the count of buckets that are owned by an Amazon Web Services account, return all the buckets in response.
     */
    public function __construct(
        public readonly ?string $continuationToken = null,
        public readonly ?int $maxDirectoryBuckets = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::listDirectoryBucketsRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_CONTINUATION_TOKEN = $m[0];
        self::$SCHEMA_MAX_DIRECTORY_BUCKETS = $m[1];
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
        return $this->maxDirectoryBuckets;
    }

    /**
     * Create a copy with a pagination page size.
     */
    public function withPaginationPageSize(int $pageSize): self
    {
        self::schema();

        return $this->withMemberValue(self::$SCHEMA_MAX_DIRECTORY_BUCKETS, $pageSize);
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
        if (isset($this->continuationToken)) {
            $serializer->serializeString(self::$SCHEMA_CONTINUATION_TOKEN, $this->continuationToken, 0);
        }
        if (isset($this->maxDirectoryBuckets)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_DIRECTORY_BUCKETS, $this->maxDirectoryBuckets, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->continuationToken,
            1 => $this->maxDirectoryBuckets,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->continuationToken,
            $this->maxDirectoryBuckets
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
