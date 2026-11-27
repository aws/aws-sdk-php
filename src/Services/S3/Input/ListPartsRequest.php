<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\RequestPayer;
use JsonSerializable;
use Smithy\Client\Pagination\PageSizePaginatedRequestInterface;
use Smithy\Client\Pagination\PaginatedRequestInterface;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

final class ListPartsRequest implements
    SerializableStructInterface,
    PaginatedRequestInterface,
    PageSizePaginatedRequestInterface,
    JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListPartsRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_UPLOAD_ID;
    private static Schema $SCHEMA_MAX_PARTS;
    private static Schema $SCHEMA_PART_NUMBER_MARKER;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;

    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket The name of the bucket to which the parts are being uploaded. Directory buckets - When you use
     *        this operation with a directory bucket, you must use virtual-hosted-style requests in the format
     *        Bucket-name.s3express-zone-id.region-code.amazonaws.com. Path-style requests are not supported. Directory
     * bucket
     *        names must be unique in the chosen Zone (Availability Zone or Local Zone). Bucket names must follow the format
     *        bucket-base-name--zone-id--x-s3 (for example, amzn-s3-demo-bucket--usw2-az1--x-s3). For information about
     * bucket
     *        naming restrictions, see Directory bucket naming rules in the Amazon S3 User Guide. Access points - When you
     * use this
     *        action with an access point for general purpose buckets, you must provide the alias of the access point in
     * place of
     *        the bucket name or specify the access point ARN. When you use this action with an access point for directory
     * buckets,
     *        you must provide the access point name in place of the bucket name. When using the access point ARN, you must
     * direct
     *        requests to the access point hostname. The access point hostname takes the form
     *        AccessPointName-AccountId.s3-accesspoint.Region.amazonaws.com. When using this action with an access point
     * through
     *        the Amazon Web Services SDKs, you provide the access point ARN in place of the bucket name. For more
     * information
     *        about access point ARNs, see Using access points in the Amazon S3 User Guide. Object Lambda access points are
     * not
     *        supported by directory buckets. S3 on Outposts - When you use this action with S3 on Outposts, you must direct
     *        requests to the S3 on Outposts hostname. The S3 on Outposts hostname takes the form
     *        AccessPointName-AccountId.outpostID.s3-outposts.Region.amazonaws.com. When you use this action with S3 on
     * Outposts,
     *        the destination bucket must be the Outposts access point ARN or the access point alias. For more information
     * about S3
     *        on Outposts, see What is S3 on Outposts? in the Amazon S3 User Guide.
     * @param ?string $key Object key for which the multipart upload was initiated.
     * @param ?string $uploadId Upload ID identifying the multipart upload whose parts are being listed.
     * @param ?int $maxParts Sets the maximum number of parts to return.
     * @param ?string $partNumberMarker Specifies the part after which listing should begin. Only parts with higher part
     *        numbers will be listed.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     * @param ?string $sSECustomerAlgorithm The server-side encryption (SSE) algorithm used to encrypt the object. This
     *        parameter is needed only when the object was created using a checksum algorithm. For more information, see
     * Protecting
     *        data using SSE-C keys in the Amazon S3 User Guide. This functionality is not supported for directory buckets.
     * @param ?string $sSECustomerKey The server-side encryption (SSE) customer managed key. This parameter is needed only
     *        when the object was created using a checksum algorithm. For more information, see Protecting data using SSE-C
     * keys in
     *        the Amazon S3 User Guide. This functionality is not supported for directory buckets.
     * @param ?string $sSECustomerKeyMD5 The MD5 server-side encryption (SSE) customer managed key. This parameter is needed
     *        only when the object was created using a checksum algorithm. For more information, see Protecting data using
     * SSE-C
     *        keys in the Amazon S3 User Guide. This functionality is not supported for directory buckets.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $uploadId = null,
        public readonly ?int $maxParts = null,
        public readonly ?string $partNumberMarker = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $expectedBucketOwner = null,
        public readonly ?string $sSECustomerAlgorithm = null,
        /** @sensitive */
        public readonly ?string $sSECustomerKey = null,
        public readonly ?string $sSECustomerKeyMD5 = null
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
        $s = Schemas::listPartsRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_UPLOAD_ID = $m[2];
        self::$SCHEMA_MAX_PARTS = $m[3];
        self::$SCHEMA_PART_NUMBER_MARKER = $m[4];
        self::$SCHEMA_REQUEST_PAYER = $m[5];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[6];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[7];
        self::$SCHEMA_SSE_CUSTOMER_KEY = $m[8];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[9];
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
        return $this->partNumberMarker;
    }

    /**
     * Create a copy with a pagination token.
     *
     * @param string|array<array-key, mixed>|null $token Token of type `string|null`.
     */
    public function withPaginationToken(string|array|null $token): self
    {
        self::schema();

        return $this->withMemberValue(self::$SCHEMA_PART_NUMBER_MARKER, $token);
    }

    /**
     * Get the pagination page size.
     */
    public function getPaginationPageSize(): ?int
    {
        return $this->maxParts;
    }

    /**
     * Create a copy with a pagination page size.
     */
    public function withPaginationPageSize(int $pageSize): self
    {
        self::schema();

        return $this->withMemberValue(self::$SCHEMA_MAX_PARTS, $pageSize);
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
        if (isset($this->uploadId)) {
            $serializer->serializeString(self::$SCHEMA_UPLOAD_ID, $this->uploadId, 2);
        }
        if (isset($this->maxParts)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_PARTS, $this->maxParts, 3);
        }
        if (isset($this->partNumberMarker)) {
            $serializer->serializeString(self::$SCHEMA_PART_NUMBER_MARKER, $this->partNumberMarker, 4);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 5);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 6);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 7);
        }
        if (isset($this->sSECustomerKey)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY, $this->sSECustomerKey, 8);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 9);
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
            2 => $this->uploadId,
            3 => $this->maxParts,
            4 => $this->partNumberMarker,
            5 => $this->requestPayer,
            6 => $this->expectedBucketOwner,
            7 => $this->sSECustomerAlgorithm,
            8 => $this->sSECustomerKey,
            9 => $this->sSECustomerKeyMD5,
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
            $this->uploadId,
            $this->maxParts,
            $this->partNumberMarker,
            $this->requestPayer,
            $this->expectedBucketOwner,
            $this->sSECustomerAlgorithm,
            $this->sSECustomerKey,
            $this->sSECustomerKeyMD5
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
