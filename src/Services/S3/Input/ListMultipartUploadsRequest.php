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
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class ListMultipartUploadsRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListMultipartUploadsRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_DELIMITER;
    private static Schema $SCHEMA_ENCODING_TYPE;
    private static Schema $SCHEMA_KEY_MARKER;
    private static Schema $SCHEMA_MAX_UPLOADS;
    private static Schema $SCHEMA_PREFIX;
    private static Schema $SCHEMA_UPLOAD_ID_MARKER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_REQUEST_PAYER;

    public readonly ?EncodingType $encodingType;
    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket The name of the bucket to which the multipart upload was initiated. Directory buckets - When
     *        you use this operation with a directory bucket, you must use virtual-hosted-style requests in the format
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
     * @param ?string $delimiter Character you use to group keys. All keys that contain the same string between the prefix,
     *        if specified, and the first occurrence of the delimiter after the prefix are grouped under a single result
     * element,
     *        CommonPrefixes. If you don't specify the prefix parameter, then the substring starts at the beginning of the
     * key. The
     *        keys that are grouped under CommonPrefixes result element are not returned elsewhere in the response.
     * CommonPrefixes
     *        is filtered out from results if it is not lexicographically greater than the key-marker. Directory buckets -
     * For
     *        directory buckets, / is the only supported delimiter.
     * @param ?string $keyMarker Specifies the multipart upload after which listing should begin. General purpose buckets -
     *        For general purpose buckets, key-marker is an object key. Together with upload-id-marker, this parameter
     * specifies
     *        the multipart upload after which listing should begin. If upload-id-marker is not specified, only the keys
     *        lexicographically greater than the specified key-marker will be included in the list. If upload-id-marker is
     *        specified, any multipart uploads for a key equal to the key-marker might also be included, provided those
     * multipart
     *        uploads have upload IDs lexicographically greater than the specified upload-id-marker. Directory buckets - For
     *        directory buckets, key-marker is obfuscated and isn't a real object key. The upload-id-marker parameter isn't
     *        supported by directory buckets. To list the additional multipart uploads, you only need to set the value of
     *        key-marker to the NextKeyMarker value from the previous response. In the ListMultipartUploads response, the
     * multipart
     *        uploads aren't sorted lexicographically based on the object keys.
     * @param ?int $maxUploads Sets the maximum number of multipart uploads, from 1 to 1,000, to return in the response
     *        body. 1,000 is the maximum number of uploads that can be returned in a response.
     * @param ?string $prefix Lists in-progress uploads only for those keys that begin with the specified prefix. You can
     *        use prefixes to separate a bucket into different grouping of keys. (You can think of using prefix to make
     * groups in
     *        the same way that you'd use a folder in a file system.) Directory buckets - For directory buckets, only
     * prefixes that
     *        end in a delimiter (/) are supported.
     * @param ?string $uploadIdMarker Together with key-marker, specifies the multipart upload after which listing should
     *        begin. If key-marker is not specified, the upload-id-marker parameter is ignored. Otherwise, any multipart
     * uploads
     *        for a key equal to the key-marker might be included in the list only if they have an upload ID
     * lexicographically
     *        greater than the specified upload-id-marker. This functionality is not supported for directory buckets.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $delimiter = null,
        EncodingType|string|null $encodingType = null,
        public readonly ?string $keyMarker = null,
        public readonly ?int $maxUploads = null,
        public readonly ?string $prefix = null,
        public readonly ?string $uploadIdMarker = null,
        public readonly ?string $expectedBucketOwner = null,
        RequestPayer|string|null $requestPayer = null
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
        $s = Schemas::listMultipartUploadsRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_DELIMITER = $m[1];
        self::$SCHEMA_ENCODING_TYPE = $m[2];
        self::$SCHEMA_KEY_MARKER = $m[3];
        self::$SCHEMA_MAX_UPLOADS = $m[4];
        self::$SCHEMA_PREFIX = $m[5];
        self::$SCHEMA_UPLOAD_ID_MARKER = $m[6];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[7];
        self::$SCHEMA_REQUEST_PAYER = $m[8];
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
        if (isset($this->delimiter)) {
            $serializer->serializeString(self::$SCHEMA_DELIMITER, $this->delimiter, 1);
        }
        if (isset($this->encodingType)) {
            $serializer->serializeString(self::$SCHEMA_ENCODING_TYPE, $this->encodingType->value, 2);
        }
        if (isset($this->keyMarker)) {
            $serializer->serializeString(self::$SCHEMA_KEY_MARKER, $this->keyMarker, 3);
        }
        if (isset($this->maxUploads)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_UPLOADS, $this->maxUploads, 4);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 5);
        }
        if (isset($this->uploadIdMarker)) {
            $serializer->serializeString(self::$SCHEMA_UPLOAD_ID_MARKER, $this->uploadIdMarker, 6);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 7);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 8);
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
            3 => $this->keyMarker,
            4 => $this->maxUploads,
            5 => $this->prefix,
            6 => $this->uploadIdMarker,
            7 => $this->expectedBucketOwner,
            8 => $this->requestPayer,
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
            $this->keyMarker,
            $this->maxUploads,
            $this->prefix,
            $this->uploadIdMarker,
            $this->expectedBucketOwner,
            $this->requestPayer
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
