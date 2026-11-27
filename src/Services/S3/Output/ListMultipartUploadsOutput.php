<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\EncodingType;
use Aws\Services\S3\Shape\RequestCharged;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class ListMultipartUploadsOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListMultipartUploadsOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY_MARKER;
    private static Schema $SCHEMA_UPLOAD_ID_MARKER;
    private static Schema $SCHEMA_NEXT_KEY_MARKER;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_DELIMITER;
    private static Schema $SCHEMA_NEXT_UPLOAD_ID_MARKER;
    private static Schema $SCHEMA_MAX_UPLOADS;
    private static Schema $SCHEMA_IS_TRUNCATED;
    private static Schema $SCHEMA_UPLOADS;
    private static Schema $SCHEMA_COMMON_PREFIXES;
    private static Schema $SCHEMA_ENCODING_TYPE;
    private static Schema $SCHEMA_REQUEST_CHARGED;

    public readonly ?EncodingType $encodingType;
    public readonly ?RequestCharged $requestCharged;

    /**
     * @param ?string $bucket The name of the bucket to which the multipart upload was initiated. Does not return the access
     *        point ARN or access point alias if used.
     * @param ?string $keyMarker The key at or after which the listing began.
     * @param ?string $uploadIdMarker Together with key-marker, specifies the multipart upload after which listing should
     *        begin. If key-marker is not specified, the upload-id-marker parameter is ignored. Otherwise, any multipart
     * uploads
     *        for a key equal to the key-marker might be included in the list only if they have an upload ID
     * lexicographically
     *        greater than the specified upload-id-marker. This functionality is not supported for directory buckets.
     * @param ?string $nextKeyMarker When a list is truncated, this element specifies the value that should be used for the
     *        key-marker request parameter in a subsequent request.
     * @param ?string $prefix When a prefix is provided in the request, this field contains the specified prefix. The result
     *        contains only keys starting with the specified prefix. Directory buckets - For directory buckets, only
     * prefixes that
     *        end in a delimiter (/) are supported.
     * @param ?string $delimiter Contains the delimiter you specified in the request. If you don't specify a delimiter in
     *        your request, this element is absent from the response. Directory buckets - For directory buckets, / is the
     * only
     *        supported delimiter.
     * @param ?string $nextUploadIdMarker When a list is truncated, this element specifies the value that should be used for
     *        the upload-id-marker request parameter in a subsequent request. This functionality is not supported for
     * directory
     *        buckets.
     * @param ?int $maxUploads Maximum number of multipart uploads that could have been included in the response.
     * @param ?bool $isTruncated Indicates whether the returned list of multipart uploads is truncated. A value of true
     *        indicates that the list was truncated. The list can be truncated if the number of multipart uploads exceeds
     * the limit
     *        allowed or specified by max uploads.
     * @param list<\Aws\Services\S3\Shape\MultipartUpload>|null $uploads
     * @param list<\Aws\Services\S3\Shape\CommonPrefix>|null $commonPrefixes
     * @param ?EncodingType $encodingType Encoding type used by Amazon S3 to encode object keys in the response. If you
     *        specify the encoding-type request parameter, Amazon S3 includes this element in the response, and returns
     * encoded key
     *        name values in the following response elements: Delimiter, KeyMarker, Prefix, NextKeyMarker, Key.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $keyMarker = null,
        public readonly ?string $uploadIdMarker = null,
        public readonly ?string $nextKeyMarker = null,
        public readonly ?string $prefix = null,
        public readonly ?string $delimiter = null,
        public readonly ?string $nextUploadIdMarker = null,
        public readonly ?int $maxUploads = null,
        public readonly ?bool $isTruncated = null,
        public readonly ?array $uploads = null,
        public readonly ?array $commonPrefixes = null,
        EncodingType|string|null $encodingType = null,
        RequestCharged|string|null $requestCharged = null
    ) {
        $this->encodingType = $encodingType === null || $encodingType instanceof EncodingType ? $encodingType : EncodingType::fromValue($encodingType);
        $this->requestCharged = $requestCharged === null || $requestCharged instanceof RequestCharged ? $requestCharged : RequestCharged::fromValue($requestCharged);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::listMultipartUploadsOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY_MARKER = $m[1];
        self::$SCHEMA_UPLOAD_ID_MARKER = $m[2];
        self::$SCHEMA_NEXT_KEY_MARKER = $m[3];
        self::$SCHEMA_PREFIX = $m[4];
        self::$SCHEMA_DELIMITER = $m[5];
        self::$SCHEMA_NEXT_UPLOAD_ID_MARKER = $m[6];
        self::$SCHEMA_MAX_UPLOADS = $m[7];
        self::$SCHEMA_IS_TRUNCATED = $m[8];
        self::$SCHEMA_UPLOADS = $m[9];
        self::$SCHEMA_COMMON_PREFIXES = $m[10];
        self::$SCHEMA_ENCODING_TYPE = $m[11];
        self::$SCHEMA_REQUEST_CHARGED = $m[12];
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
        if (isset($this->keyMarker)) {
            $serializer->serializeString(self::$SCHEMA_KEY_MARKER, $this->keyMarker, 1);
        }
        if (isset($this->uploadIdMarker)) {
            $serializer->serializeString(self::$SCHEMA_UPLOAD_ID_MARKER, $this->uploadIdMarker, 2);
        }
        if (isset($this->nextKeyMarker)) {
            $serializer->serializeString(self::$SCHEMA_NEXT_KEY_MARKER, $this->nextKeyMarker, 3);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 4);
        }
        if (isset($this->delimiter)) {
            $serializer->serializeString(self::$SCHEMA_DELIMITER, $this->delimiter, 5);
        }
        if (isset($this->nextUploadIdMarker)) {
            $serializer->serializeString(self::$SCHEMA_NEXT_UPLOAD_ID_MARKER, $this->nextUploadIdMarker, 6);
        }
        if (isset($this->maxUploads)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_UPLOADS, $this->maxUploads, 7);
        }
        if (isset($this->isTruncated)) {
            $serializer->serializeBoolean(self::$SCHEMA_IS_TRUNCATED, $this->isTruncated, 8);
        }
        if (isset($this->uploads)) {
            $serializer->serializeList(self::$SCHEMA_UPLOADS, $this->uploads, 9);
        }
        if (isset($this->commonPrefixes)) {
            $serializer->serializeList(self::$SCHEMA_COMMON_PREFIXES, $this->commonPrefixes, 10);
        }
        if (isset($this->encodingType)) {
            $serializer->serializeString(self::$SCHEMA_ENCODING_TYPE, $this->encodingType->value, 11);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 12);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->keyMarker,
            2 => $this->uploadIdMarker,
            3 => $this->nextKeyMarker,
            4 => $this->prefix,
            5 => $this->delimiter,
            6 => $this->nextUploadIdMarker,
            7 => $this->maxUploads,
            8 => $this->isTruncated,
            9 => $this->uploads,
            10 => $this->commonPrefixes,
            11 => $this->encodingType,
            12 => $this->requestCharged,
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
            $this->keyMarker,
            $this->uploadIdMarker,
            $this->nextKeyMarker,
            $this->prefix,
            $this->delimiter,
            $this->nextUploadIdMarker,
            $this->maxUploads,
            $this->isTruncated,
            $this->uploads,
            $this->commonPrefixes,
            $this->encodingType,
            $this->requestCharged
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
