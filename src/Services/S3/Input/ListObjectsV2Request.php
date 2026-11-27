<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\EncodingType;
use Aws\Services\S3\Shape\RequestPayer;
use Smithy\Client\Pagination\PageSizePaginatedRequestInterface;
use Smithy\Client\Pagination\PaginatedRequestInterface;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class ListObjectsV2Request implements
    SerializableStructInterface,
    PaginatedRequestInterface,
    PageSizePaginatedRequestInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListObjectsV2Request';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_DELIMITER;
    private static Schema $SCHEMA_ENCODING_TYPE;
    private static Schema $SCHEMA_MAX_KEYS;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_FETCH_OWNER;
    private static Schema $SCHEMA_START_AFTER;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_OPTIONAL_OBJECT_ATTRIBUTES;

    public readonly ?EncodingType $encodingType;
    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket Directory buckets - When you use this operation with a directory bucket, you must use
     *        virtual-hosted-style requests in the format Bucket-name.s3express-zone-id.region-code.amazonaws.com.
     * Path-style
     *        requests are not supported. Directory bucket names must be unique in the chosen Zone (Availability Zone or
     * Local
     *        Zone). Bucket names must follow the format bucket-base-name--zone-id--x-s3 (for example,
     *        amzn-s3-demo-bucket--usw2-az1--x-s3). For information about bucket naming restrictions, see Directory bucket
     * naming
     *        rules in the Amazon S3 User Guide. Access points - When you use this action with an access point for general
     * purpose
     *        buckets, you must provide the alias of the access point in place of the bucket name or specify the access
     * point ARN.
     *        When you use this action with an access point for directory buckets, you must provide the access point name in
     * place
     *        of the bucket name. When using the access point ARN, you must direct requests to the access point hostname.
     * The
     *        access point hostname takes the form AccessPointName-AccountId.s3-accesspoint.Region.amazonaws.com. When using
     * this
     *        action with an access point through the Amazon Web Services SDKs, you provide the access point ARN in place of
     * the
     *        bucket name. For more information about access point ARNs, see Using access points in the Amazon S3 User
     * Guide.
     *        Object Lambda access points are not supported by directory buckets. S3 on Outposts - When you use this action
     * with S3
     *        on Outposts, you must direct requests to the S3 on Outposts hostname. The S3 on Outposts hostname takes the
     * form
     *        AccessPointName-AccountId.outpostID.s3-outposts.Region.amazonaws.com. When you use this action with S3 on
     * Outposts,
     *        the destination bucket must be the Outposts access point ARN or the access point alias. For more information
     * about S3
     *        on Outposts, see What is S3 on Outposts? in the Amazon S3 User Guide.
     * @param ?string $delimiter A delimiter is a character that you use to group keys. CommonPrefixes is filtered out from
     *        results if it is not lexicographically greater than the StartAfter value. Directory buckets - For directory
     * buckets,
     *        / is the only supported delimiter. Directory buckets - When you query ListObjectsV2 with a delimiter during
     *        in-progress multipart uploads, the CommonPrefixes response parameter contains the prefixes that are associated
     * with
     *        the in-progress multipart uploads. For more information about multipart uploads, see Multipart Upload Overview
     * in the
     *        Amazon S3 User Guide.
     * @param ?EncodingType $encodingType Encoding type used by Amazon S3 to encode the object keys in the response.
     *        Responses are encoded only in UTF-8. An object key can contain any Unicode character. However, the XML 1.0
     * parser
     *        can't parse certain characters, such as characters with an ASCII value from 0 to 10. For characters that
     * aren't
     *        supported in XML 1.0, you can add this parameter to request that Amazon S3 encode the keys in the response.
     * For more
     *        information about characters to avoid in object key names, see Object key naming guidelines. When using the
     * URL
     *        encoding type, non-ASCII characters that are used in an object's key name will be percent-encoded according to
     * UTF-8
     *        code values. For example, the object test_file(3).png will appear as test_file%283%29.png.
     * @param ?int $maxKeys Sets the maximum number of keys returned in the response. By default, the action returns up to
     *        1,000 key names. The response might contain fewer keys but will never contain more.
     * @param ?string $prefix Limits the response to keys that begin with the specified prefix. Directory buckets - For
     *        directory buckets, only prefixes that end in a delimiter (/) are supported.
     * @param ?string $continuationToken ContinuationToken indicates to Amazon S3 that the list is being continued on this
     *        bucket with a token. ContinuationToken is obfuscated and is not a real key. You can use this ContinuationToken
     * for
     *        pagination of the list results.
     * @param ?bool $fetchOwner The owner field is not present in ListObjectsV2 by default. If you want to return the owner
     *        field with each key in the result, then set the FetchOwner field to true. Directory buckets - For directory
     * buckets,
     *        the bucket owner is returned as the object owner for all objects.
     * @param ?string $startAfter StartAfter is where you want Amazon S3 to start listing from. Amazon S3 starts listing
     *        after this specified key. StartAfter can be any key in the bucket. This functionality is not supported for
     * directory
     *        buckets.
     * @param ?RequestPayer $requestPayer Confirms that the requester knows that she or he will be charged for the list
     *        objects request in V2 style. Bucket owners need not specify this parameter in their requests. This
     * functionality is
     *        not supported for directory buckets.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     * @param list<\Aws\Services\S3\Shape\OptionalObjectAttributes>|null $optionalObjectAttributes
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $delimiter = null,
        EncodingType|string|null $encodingType = null,
        public readonly ?int $maxKeys = null,
        public readonly ?string $prefix = null,
        public readonly ?string $continuationToken = null,
        public readonly ?bool $fetchOwner = null,
        public readonly ?string $startAfter = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $expectedBucketOwner = null,
        public readonly ?array $optionalObjectAttributes = null
    ) {
        $this->encodingType = $encodingType === null || $encodingType instanceof EncodingType ? $encodingType : EncodingType::fromValue($encodingType);
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
        $s = Schemas::listObjectsV2Request();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_DELIMITER = $m[1];
        self::$SCHEMA_ENCODING_TYPE = $m[2];
        self::$SCHEMA_MAX_KEYS = $m[3];
        self::$SCHEMA_PREFIX = $m[4];
        self::$SCHEMA_CONTINUATION_TOKEN = $m[5];
        self::$SCHEMA_FETCH_OWNER = $m[6];
        self::$SCHEMA_START_AFTER = $m[7];
        self::$SCHEMA_REQUEST_PAYER = $m[8];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[9];
        self::$SCHEMA_OPTIONAL_OBJECT_ATTRIBUTES = $m[10];
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
        return $this->maxKeys;
    }

    /**
     * Create a copy with a pagination page size.
     */
    public function withPaginationPageSize(int $pageSize): self
    {
        self::schema();

        return $this->withMemberValue(self::$SCHEMA_MAX_KEYS, $pageSize);
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
        if (isset($this->delimiter)) {
            $serializer->serializeString(self::$SCHEMA_DELIMITER, $this->delimiter, 1);
        }
        if (isset($this->encodingType)) {
            $serializer->serializeString(self::$SCHEMA_ENCODING_TYPE, $this->encodingType->value, 2);
        }
        if (isset($this->maxKeys)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_KEYS, $this->maxKeys, 3);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 4);
        }
        if (isset($this->continuationToken)) {
            $serializer->serializeString(self::$SCHEMA_CONTINUATION_TOKEN, $this->continuationToken, 5);
        }
        if (isset($this->fetchOwner)) {
            $serializer->serializeBoolean(self::$SCHEMA_FETCH_OWNER, $this->fetchOwner, 6);
        }
        if (isset($this->startAfter)) {
            $serializer->serializeString(self::$SCHEMA_START_AFTER, $this->startAfter, 7);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 8);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 9);
        }
        if (isset($this->optionalObjectAttributes)) {
            $serializer->serializeList(self::$SCHEMA_OPTIONAL_OBJECT_ATTRIBUTES, $this->optionalObjectAttributes, 10);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->delimiter,
            2 => $this->encodingType,
            3 => $this->maxKeys,
            4 => $this->prefix,
            5 => $this->continuationToken,
            6 => $this->fetchOwner,
            7 => $this->startAfter,
            8 => $this->requestPayer,
            9 => $this->expectedBucketOwner,
            10 => $this->optionalObjectAttributes,
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
            $this->delimiter,
            $this->encodingType,
            $this->maxKeys,
            $this->prefix,
            $this->continuationToken,
            $this->fetchOwner,
            $this->startAfter,
            $this->requestPayer,
            $this->expectedBucketOwner,
            $this->optionalObjectAttributes
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
