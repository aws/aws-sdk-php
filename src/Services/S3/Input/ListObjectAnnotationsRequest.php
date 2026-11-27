<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\RequestPayer;
use Smithy\Client\Pagination\PageSizePaginatedRequestInterface;
use Smithy\Client\Pagination\PaginatedRequestInterface;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class ListObjectAnnotationsRequest implements
    SerializableStructInterface,
    PaginatedRequestInterface,
    PageSizePaginatedRequestInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListObjectAnnotationsRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_MAX_ANNOTATION_RESULTS;
    private static Schema $SCHEMA_ANNOTATION_PREFIX;
    private static Schema $SCHEMA_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;

    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket The name of the bucket that contains the object.
     * @param ?string $key The object key.
     * @param ?string $versionId The version ID of the object.
     * @param ?int $maxAnnotationResults The maximum number of annotations to return in the response. Maximum is 1,000.
     * @param ?string $annotationPrefix Filter results to annotations whose name begins with the specified prefix.
     * @param ?string $continuationToken Continuation token returned by a previous request to retrieve the next page.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $versionId = null,
        public readonly ?int $maxAnnotationResults = null,
        public readonly ?string $annotationPrefix = null,
        public readonly ?string $continuationToken = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $expectedBucketOwner = null
    ) {
        $this->requestPayer = $requestPayer === null || $requestPayer instanceof RequestPayer ? $requestPayer : RequestPayer::fromValue($requestPayer);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::listObjectAnnotationsRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_VERSION_ID = $m[2];
        self::$SCHEMA_MAX_ANNOTATION_RESULTS = $m[3];
        self::$SCHEMA_ANNOTATION_PREFIX = $m[4];
        self::$SCHEMA_CONTINUATION_TOKEN = $m[5];
        self::$SCHEMA_REQUEST_PAYER = $m[6];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[7];
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
        return $this->maxAnnotationResults;
    }

    /**
     * Create a copy with a pagination page size.
     */
    public function withPaginationPageSize(int $pageSize): self
    {
        self::schema();

        return $this->withMemberValue(self::$SCHEMA_MAX_ANNOTATION_RESULTS, $pageSize);
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
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 1);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 2);
        }
        if (isset($this->maxAnnotationResults)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_ANNOTATION_RESULTS, $this->maxAnnotationResults, 3);
        }
        if (isset($this->annotationPrefix)) {
            $serializer->serializeString(self::$SCHEMA_ANNOTATION_PREFIX, $this->annotationPrefix, 4);
        }
        if (isset($this->continuationToken)) {
            $serializer->serializeString(self::$SCHEMA_CONTINUATION_TOKEN, $this->continuationToken, 5);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 6);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 7);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->key,
            2 => $this->versionId,
            3 => $this->maxAnnotationResults,
            4 => $this->annotationPrefix,
            5 => $this->continuationToken,
            6 => $this->requestPayer,
            7 => $this->expectedBucketOwner,
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
            $this->key,
            $this->versionId,
            $this->maxAnnotationResults,
            $this->annotationPrefix,
            $this->continuationToken,
            $this->requestPayer,
            $this->expectedBucketOwner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
