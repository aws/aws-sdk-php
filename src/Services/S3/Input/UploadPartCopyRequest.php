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
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

final class UploadPartCopyRequest implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#UploadPartCopyRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_COPY_SOURCE;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_PART_NUMBER;
    private static Schema $SCHEMA_UPLOAD_ID;
    private static Schema $SCHEMA_COPY_SOURCE_IF_MATCH;
    private static Schema $SCHEMA_COPY_SOURCE_IF_MODIFIED_SINCE;
    private static Schema $SCHEMA_COPY_SOURCE_IF_NONE_MATCH;
    private static Schema $SCHEMA_COPY_SOURCE_IF_UNMODIFIED_SINCE;
    private static Schema $SCHEMA_COPY_SOURCE_RANGE;
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_COPY_SOURCE_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_COPY_SOURCE_SSE_CUSTOMER_KEY;
    private static Schema $SCHEMA_COPY_SOURCE_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_EXPECTED_SOURCE_BUCKET_OWNER;

    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket The bucket name. Directory buckets - When you use this operation with a directory bucket, you
     *        must use virtual-hosted-style requests in the format Bucket-name.s3express-zone-id.region-code.amazonaws.com.
     *        Path-style requests are not supported. Directory bucket names must be unique in the chosen Zone (Availability
     * Zone or
     *        Local Zone). Bucket names must follow the format bucket-base-name--zone-id--x-s3 (for example,
     *        amzn-s3-demo-bucket--usw2-az1--x-s3). For information about bucket naming restrictions, see Directory bucket
     * naming
     *        rules in the Amazon S3 User Guide. Copying objects across different Amazon Web Services Regions isn't
     * supported when
     *        the source or destination bucket is in Amazon Web Services Local Zones. The source and destination buckets
     * must have
     *        the same parent Amazon Web Services Region. Otherwise, you get an HTTP 400 Bad Request error with the error
     * code
     *        InvalidRequest. Access points - When you use this action with an access point for general purpose buckets, you
     * must
     *        provide the alias of the access point in place of the bucket name or specify the access point ARN. When you
     * use this
     *        action with an access point for directory buckets, you must provide the access point name in place of the
     * bucket
     *        name. When using the access point ARN, you must direct requests to the access point hostname. The access point
     *        hostname takes the form AccessPointName-AccountId.s3-accesspoint.Region.amazonaws.com. When using this action
     * with an
     *        access point through the Amazon Web Services SDKs, you provide the access point ARN in place of the bucket
     * name. For
     *        more information about access point ARNs, see Using access points in the Amazon S3 User Guide. Object Lambda
     * access
     *        points are not supported by directory buckets. S3 on Outposts - When you use this action with S3 on Outposts,
     * you
     *        must direct requests to the S3 on Outposts hostname. The S3 on Outposts hostname takes the form
     *        AccessPointName-AccountId.outpostID.s3-outposts.Region.amazonaws.com. When you use this action with S3 on
     * Outposts,
     *        the destination bucket must be the Outposts access point ARN or the access point alias. For more information
     * about S3
     *        on Outposts, see What is S3 on Outposts? in the Amazon S3 User Guide.
     * @param ?string $copySource Specifies the source object for the copy operation. You specify the value in one of two
     *        formats, depending on whether you want to access the source object through an access point: For objects not
     * accessed
     *        through an access point, specify the name of the source bucket and key of the source object, separated by a
     * slash
     *        (/). For example, to copy the object reports/january.pdf from the bucket awsexamplebucket, use
     *        awsexamplebucket/reports/january.pdf. The value must be URL-encoded. For objects accessed through access
     * points,
     *        specify the Amazon Resource Name (ARN) of the object as accessed through the access point, in the format
     *        arn:aws:s3:::accesspoint//object/. For example, to copy the object reports/january.pdf through access point
     *        my-access-point owned by account 123456789012 in Region us-west-2, use the URL encoding of
     *        arn:aws:s3:us-west-2:123456789012:accesspoint/my-access-point/object/reports/january.pdf. The value must be
     * URL
     *        encoded. Amazon S3 supports copy operations using Access points only when the source and destination buckets
     * are in
     *        the same Amazon Web Services Region. Access points are not supported by directory buckets. Alternatively, for
     * objects
     *        accessed through Amazon S3 on Outposts, specify the ARN of the object as accessed in the format
     *        arn:aws:s3-outposts:::outpost//object/. For example, to copy the object reports/january.pdf through outpost
     *        my-outpost owned by account 123456789012 in Region us-west-2, use the URL encoding of
     *        arn:aws:s3-outposts:us-west-2:123456789012:outpost/my-outpost/object/reports/january.pdf. The value must be
     *        URL-encoded. If your bucket has versioning enabled, you could have multiple versions of the same object. By
     * default,
     *        x-amz-copy-source identifies the current version of the source object to copy. To copy a specific version of
     * the
     *        source object to copy, append ?versionId= to the x-amz-copy-source request header (for example,
     * x-amz-copy-source:
     *        /awsexamplebucket/reports/january.pdf?versionId=QUpfdndhfd8438MNFDN93jdnJFkdmqnh893). If the current version
     * is a
     *        delete marker and you don't specify a versionId in the x-amz-copy-source request header, Amazon S3 returns a
     * 404 Not
     *        Found error, because the object does not exist. If you specify versionId in the x-amz-copy-source and the
     * versionId
     *        is a delete marker, Amazon S3 returns an HTTP 400 Bad Request error, because you are not allowed to specify a
     * delete
     *        marker as a version for the x-amz-copy-source. Directory buckets - S3 Versioning isn't enabled and supported
     * for
     *        directory buckets.
     * @param ?string $key Object key for which the multipart upload was initiated.
     * @param ?int $partNumber Part number of part being copied. This is a positive integer between 1 and 10,000.
     * @param ?string $uploadId Upload ID identifying the multipart upload whose part is being copied.
     * @param ?string $copySourceIfMatch Copies the object if its entity tag (ETag) matches the specified tag. If both of
     *        the x-amz-copy-source-if-match and x-amz-copy-source-if-unmodified-since headers are present in the request as
     *        follows: x-amz-copy-source-if-match condition evaluates to true, and; x-amz-copy-source-if-unmodified-since
     * condition
     *        evaluates to false; Amazon S3 returns 200 OK and copies the data.
     * @param ?float $copySourceIfModifiedSince Copies the object if it has been modified since the specified time. If both
     *        of the x-amz-copy-source-if-none-match and x-amz-copy-source-if-modified-since headers are present in the
     * request as
     *        follows: x-amz-copy-source-if-none-match condition evaluates to false, and;
     * x-amz-copy-source-if-modified-since
     *        condition evaluates to true; Amazon S3 returns 412 Precondition Failed response code.
     * @param ?string $copySourceIfNoneMatch Copies the object if its entity tag (ETag) is different than the specified
     *        ETag. If both of the x-amz-copy-source-if-none-match and x-amz-copy-source-if-modified-since headers are
     * present in
     *        the request as follows: x-amz-copy-source-if-none-match condition evaluates to false, and;
     *        x-amz-copy-source-if-modified-since condition evaluates to true; Amazon S3 returns 412 Precondition Failed
     * response
     *        code.
     * @param ?float $copySourceIfUnmodifiedSince Copies the object if it hasn't been modified since the specified time. If
     *        both of the x-amz-copy-source-if-match and x-amz-copy-source-if-unmodified-since headers are present in the
     * request
     *        as follows: x-amz-copy-source-if-match condition evaluates to true, and; x-amz-copy-source-if-unmodified-since
     *        condition evaluates to false; Amazon S3 returns 200 OK and copies the data.
     * @param ?string $copySourceRange The range of bytes to copy from the source object. The range value must use the form
     *        bytes=first-last, where the first and last are the zero-based byte offsets to copy. For example, bytes=0-9
     * indicates
     *        that you want to copy the first 10 bytes of the source. You can copy a range only if the source object is
     * greater
     *        than 5 MB.
     * @param ?string $sSECustomerAlgorithm Specifies the algorithm to use when encrypting the object (for example, AES256).
     *        This functionality is not supported when the destination bucket is a directory bucket.
     * @param ?string $sSECustomerKey Specifies the customer-provided encryption key for Amazon S3 to use in encrypting
     *        data. This value is used to store the object and then it is discarded; Amazon S3 does not store the encryption
     * key.
     *        The key must be appropriate for use with the algorithm specified in the
     *        x-amz-server-side-encryption-customer-algorithm header. This must be the same encryption key specified in the
     *        initiate multipart upload request. This functionality is not supported when the destination bucket is a
     * directory
     *        bucket.
     * @param ?string $sSECustomerKeyMD5 Specifies the 128-bit MD5 digest of the encryption key according to RFC 1321.
     *        Amazon S3 uses this header for a message integrity check to ensure that the encryption key was transmitted
     * without
     *        error. This functionality is not supported when the destination bucket is a directory bucket.
     * @param ?string $copySourceSSECustomerAlgorithm Specifies the algorithm to use when decrypting the source object (for
     *        example, AES256). This functionality is not supported when the source object is in a directory bucket.
     * @param ?string $copySourceSSECustomerKey Specifies the customer-provided encryption key for Amazon S3 to use to
     *        decrypt the source object. The encryption key provided in this header must be one that was used when the
     * source
     *        object was created. This functionality is not supported when the source object is in a directory bucket.
     * @param ?string $copySourceSSECustomerKeyMD5 Specifies the 128-bit MD5 digest of the encryption key according to RFC
     *        1321. Amazon S3 uses this header for a message integrity check to ensure that the encryption key was
     * transmitted
     *        without error. This functionality is not supported when the source object is in a directory bucket.
     * @param ?string $expectedBucketOwner The account ID of the expected destination bucket owner. If the account ID that
     *        you provide does not match the actual owner of the destination bucket, the request fails with the HTTP status
     * code
     *        403 Forbidden (access denied).
     * @param ?string $expectedSourceBucketOwner The account ID of the expected source bucket owner. If the account ID that
     *        you provide does not match the actual owner of the source bucket, the request fails with the HTTP status code
     * 403
     *        Forbidden (access denied).
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $copySource = null,
        public readonly ?string $key = null,
        public readonly ?int $partNumber = null,
        public readonly ?string $uploadId = null,
        public readonly ?string $copySourceIfMatch = null,
        public readonly ?float $copySourceIfModifiedSince = null,
        public readonly ?string $copySourceIfNoneMatch = null,
        public readonly ?float $copySourceIfUnmodifiedSince = null,
        public readonly ?string $copySourceRange = null,
        public readonly ?string $sSECustomerAlgorithm = null,
        /** @sensitive */
        public readonly ?string $sSECustomerKey = null,
        public readonly ?string $sSECustomerKeyMD5 = null,
        public readonly ?string $copySourceSSECustomerAlgorithm = null,
        /** @sensitive */
        public readonly ?string $copySourceSSECustomerKey = null,
        public readonly ?string $copySourceSSECustomerKeyMD5 = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $expectedBucketOwner = null,
        public readonly ?string $expectedSourceBucketOwner = null
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
        $s = Schemas::uploadPartCopyRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_COPY_SOURCE = $m[1];
        self::$SCHEMA_KEY = $m[2];
        self::$SCHEMA_PART_NUMBER = $m[3];
        self::$SCHEMA_UPLOAD_ID = $m[4];
        self::$SCHEMA_COPY_SOURCE_IF_MATCH = $m[5];
        self::$SCHEMA_COPY_SOURCE_IF_MODIFIED_SINCE = $m[6];
        self::$SCHEMA_COPY_SOURCE_IF_NONE_MATCH = $m[7];
        self::$SCHEMA_COPY_SOURCE_IF_UNMODIFIED_SINCE = $m[8];
        self::$SCHEMA_COPY_SOURCE_RANGE = $m[9];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[10];
        self::$SCHEMA_SSE_CUSTOMER_KEY = $m[11];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[12];
        self::$SCHEMA_COPY_SOURCE_SSE_CUSTOMER_ALGORITHM = $m[13];
        self::$SCHEMA_COPY_SOURCE_SSE_CUSTOMER_KEY = $m[14];
        self::$SCHEMA_COPY_SOURCE_SSE_CUSTOMER_KEY_MD5 = $m[15];
        self::$SCHEMA_REQUEST_PAYER = $m[16];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[17];
        self::$SCHEMA_EXPECTED_SOURCE_BUCKET_OWNER = $m[18];
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
        if (isset($this->copySource)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE, $this->copySource, 1);
        }
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 2);
        }
        if (isset($this->partNumber)) {
            $serializer->serializeInteger(self::$SCHEMA_PART_NUMBER, $this->partNumber, 3);
        }
        if (isset($this->uploadId)) {
            $serializer->serializeString(self::$SCHEMA_UPLOAD_ID, $this->uploadId, 4);
        }
        if (isset($this->copySourceIfMatch)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE_IF_MATCH, $this->copySourceIfMatch, 5);
        }
        if (isset($this->copySourceIfModifiedSince)) {
            $serializer->serializeTimestamp(self::$SCHEMA_COPY_SOURCE_IF_MODIFIED_SINCE, $this->copySourceIfModifiedSince, 6);
        }
        if (isset($this->copySourceIfNoneMatch)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE_IF_NONE_MATCH, $this->copySourceIfNoneMatch, 7);
        }
        if (isset($this->copySourceIfUnmodifiedSince)) {
            $serializer->serializeTimestamp(self::$SCHEMA_COPY_SOURCE_IF_UNMODIFIED_SINCE, $this->copySourceIfUnmodifiedSince, 8);
        }
        if (isset($this->copySourceRange)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE_RANGE, $this->copySourceRange, 9);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 10);
        }
        if (isset($this->sSECustomerKey)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY, $this->sSECustomerKey, 11);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 12);
        }
        if (isset($this->copySourceSSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE_SSE_CUSTOMER_ALGORITHM, $this->copySourceSSECustomerAlgorithm, 13);
        }
        if (isset($this->copySourceSSECustomerKey)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE_SSE_CUSTOMER_KEY, $this->copySourceSSECustomerKey, 14);
        }
        if (isset($this->copySourceSSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE_SSE_CUSTOMER_KEY_MD5, $this->copySourceSSECustomerKeyMD5, 15);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 16);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 17);
        }
        if (isset($this->expectedSourceBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_SOURCE_BUCKET_OWNER, $this->expectedSourceBucketOwner, 18);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->copySource,
            2 => $this->key,
            3 => $this->partNumber,
            4 => $this->uploadId,
            5 => $this->copySourceIfMatch,
            6 => $this->copySourceIfModifiedSince,
            7 => $this->copySourceIfNoneMatch,
            8 => $this->copySourceIfUnmodifiedSince,
            9 => $this->copySourceRange,
            10 => $this->sSECustomerAlgorithm,
            11 => $this->sSECustomerKey,
            12 => $this->sSECustomerKeyMD5,
            13 => $this->copySourceSSECustomerAlgorithm,
            14 => $this->copySourceSSECustomerKey,
            15 => $this->copySourceSSECustomerKeyMD5,
            16 => $this->requestPayer,
            17 => $this->expectedBucketOwner,
            18 => $this->expectedSourceBucketOwner,
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
            $this->copySource,
            $this->key,
            $this->partNumber,
            $this->uploadId,
            $this->copySourceIfMatch,
            $this->copySourceIfModifiedSince,
            $this->copySourceIfNoneMatch,
            $this->copySourceIfUnmodifiedSince,
            $this->copySourceRange,
            $this->sSECustomerAlgorithm,
            $this->sSECustomerKey,
            $this->sSECustomerKeyMD5,
            $this->copySourceSSECustomerAlgorithm,
            $this->copySourceSSECustomerKey,
            $this->copySourceSSECustomerKeyMD5,
            $this->requestPayer,
            $this->expectedBucketOwner,
            $this->expectedSourceBucketOwner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
