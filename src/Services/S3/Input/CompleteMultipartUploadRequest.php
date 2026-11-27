<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumType;
use Aws\Services\S3\Shape\CompletedMultipartUpload;
use Aws\Services\S3\Shape\RequestPayer;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

final class CompleteMultipartUploadRequest implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CompleteMultipartUploadRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_UPLOAD_ID;
    private static Schema $SCHEMA_MULTIPART_UPLOAD;
    private static Schema $SCHEMA_CHECKSUM_CRC32;
    private static Schema $SCHEMA_CHECKSUM_CRC32_C;
    private static Schema $SCHEMA_CHECKSUM_CRC64_NVME;
    private static Schema $SCHEMA_CHECKSUM_SHA1;
    private static Schema $SCHEMA_CHECKSUM_SHA256;
    private static Schema $SCHEMA_CHECKSUM_SHA512;
    private static Schema $SCHEMA_CHECKSUM_MD5;
    private static Schema $SCHEMA_CHECKSUM_XXHASH64;
    private static Schema $SCHEMA_CHECKSUM_XXHASH3;
    private static Schema $SCHEMA_CHECKSUM_XXHASH128;
    private static Schema $SCHEMA_CHECKSUM_TYPE;
    private static Schema $SCHEMA_MPU_OBJECT_SIZE;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_IF_MATCH;
    private static Schema $SCHEMA_IF_NONE_MATCH;
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;

    public readonly ?ChecksumType $checksumType;
    public readonly ?RequestPayer $requestPayer;

    /**
     * @param ?string $bucket Name of the bucket to which the multipart upload was initiated. Directory buckets - When you
     *        use this operation with a directory bucket, you must use virtual-hosted-style requests in the format
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
     * @param ?string $uploadId ID for the initiated multipart upload.
     * @param ?CompletedMultipartUpload $multipartUpload The container for the multipart upload request information.
     * @param ?string $checksumCRC32 This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This header specifies the Base64 encoded, 32-bit CRC32 checksum of the
     *        object. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumCRC32C This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This header specifies the Base64 encoded, 32-bit CRC32C checksum of
     * the
     *        object. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumCRC64NVME This header can be used as a data integrity check to verify that the data received
     *        is the same data that was originally sent. This header specifies the Base64 encoded, 64-bit CRC64NVME checksum
     * of the
     *        object. The CRC64NVME checksum is always a full object checksum. For more information, see Checking object
     * integrity
     *        in the Amazon S3 User Guide.
     * @param ?string $checksumSHA1 This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This header specifies the Base64 encoded, 160-bit SHA1 digest of the
     * object.
     *        For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA256 This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This header specifies the Base64 encoded, 256-bit SHA256 digest of the
     *        object. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA512 This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This header specifies the Base64 encoded, 512-bit SHA512 digest of the
     *        object. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumMD5 This header can be used as a data integrity check to verify that the data received is the
     *        same data that was originally sent. This header specifies the Base64 encoded, 128-bit MD5 digest of the
     * object. For
     *        more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH64 This header can be used as a data integrity check to verify that the data received
     *        is the same data that was originally sent. This header specifies the Base64 encoded, 64-bit XXHASH64 checksum
     * of the
     *        object. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH3 This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This header specifies the Base64 encoded, 64-bit XXHASH3 checksum of
     * the
     *        object. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH128 This header can be used as a data integrity check to verify that the data received
     *        is the same data that was originally sent. This header specifies the Base64 encoded, 128-bit XXHASH128
     * checksum of
     *        the object. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?ChecksumType $checksumType This header specifies the checksum type of the object, which determines how
     *        part-level checksums are combined to create an object-level checksum for multipart objects. You can use this
     * header
     *        as a data integrity check to verify that the checksum type that is received is the same checksum that was
     * specified.
     *        If the checksum type doesn’t match the checksum type that was specified for the object during the
     *        CreateMultipartUpload request, it’ll result in a BadDigest error. For more information, see Checking object
     *        integrity in the Amazon S3 User Guide.
     * @param ?int $mpuObjectSize The expected total object size of the multipart upload request. If there’s a mismatch
     *        between the specified object size value and the actual object size value, it results in an HTTP 400
     * InvalidRequest
     *        error.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     * @param ?string $ifMatch Uploads the object only if the ETag (entity tag) value provided during the WRITE operation
     *        matches the ETag of the object in S3. If the ETag values do not match, the operation returns a 412
     * Precondition
     *        Failed error. If a conflicting operation occurs during the upload S3 returns a 409 ConditionalRequestConflict
     *        response. On a 409 failure you should fetch the object's ETag, re-initiate the multipart upload with
     *        CreateMultipartUpload, and re-upload each part. Expects the ETag value as a string. For more information about
     *        conditional requests, see RFC 7232, or Conditional requests in the Amazon S3 User Guide.
     * @param ?string $ifNoneMatch Uploads the object only if the object key name does not already exist in the bucket
     *        specified. Otherwise, Amazon S3 returns a 412 Precondition Failed error. If a conflicting operation occurs
     * during the
     *        upload S3 returns a 409 ConditionalRequestConflict response. On a 409 failure you should re-initiate the
     * multipart
     *        upload with CreateMultipartUpload and re-upload each part. Expects the '*' (asterisk) character. For more
     * information
     *        about conditional requests, see RFC 7232, or Conditional requests in the Amazon S3 User Guide.
     * @param ?string $sSECustomerAlgorithm The server-side encryption (SSE) algorithm used to encrypt the object. This
     *        parameter is required only when the object was created using a checksum algorithm or if your bucket policy
     * requires
     *        the use of SSE-C. For more information, see Protecting data using SSE-C keys in the Amazon S3 User Guide. This
     *        functionality is not supported for directory buckets.
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
        public readonly ?CompletedMultipartUpload $multipartUpload = null,
        public readonly ?string $checksumCRC32 = null,
        public readonly ?string $checksumCRC32C = null,
        public readonly ?string $checksumCRC64NVME = null,
        public readonly ?string $checksumSHA1 = null,
        public readonly ?string $checksumSHA256 = null,
        public readonly ?string $checksumSHA512 = null,
        public readonly ?string $checksumMD5 = null,
        public readonly ?string $checksumXXHASH64 = null,
        public readonly ?string $checksumXXHASH3 = null,
        public readonly ?string $checksumXXHASH128 = null,
        ChecksumType|string|null $checksumType = null,
        public readonly ?int $mpuObjectSize = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $expectedBucketOwner = null,
        public readonly ?string $ifMatch = null,
        public readonly ?string $ifNoneMatch = null,
        public readonly ?string $sSECustomerAlgorithm = null,
        /** @sensitive */
        public readonly ?string $sSECustomerKey = null,
        public readonly ?string $sSECustomerKeyMD5 = null
    ) {
        $this->checksumType = $checksumType === null || $checksumType instanceof ChecksumType ? $checksumType : ChecksumType::fromValue($checksumType);
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
        $s = Schemas::completeMultipartUploadRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_UPLOAD_ID = $m[2];
        self::$SCHEMA_MULTIPART_UPLOAD = $m[3];
        self::$SCHEMA_CHECKSUM_CRC32 = $m[4];
        self::$SCHEMA_CHECKSUM_CRC32_C = $m[5];
        self::$SCHEMA_CHECKSUM_CRC64_NVME = $m[6];
        self::$SCHEMA_CHECKSUM_SHA1 = $m[7];
        self::$SCHEMA_CHECKSUM_SHA256 = $m[8];
        self::$SCHEMA_CHECKSUM_SHA512 = $m[9];
        self::$SCHEMA_CHECKSUM_MD5 = $m[10];
        self::$SCHEMA_CHECKSUM_XXHASH64 = $m[11];
        self::$SCHEMA_CHECKSUM_XXHASH3 = $m[12];
        self::$SCHEMA_CHECKSUM_XXHASH128 = $m[13];
        self::$SCHEMA_CHECKSUM_TYPE = $m[14];
        self::$SCHEMA_MPU_OBJECT_SIZE = $m[15];
        self::$SCHEMA_REQUEST_PAYER = $m[16];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[17];
        self::$SCHEMA_IF_MATCH = $m[18];
        self::$SCHEMA_IF_NONE_MATCH = $m[19];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[20];
        self::$SCHEMA_SSE_CUSTOMER_KEY = $m[21];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[22];
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
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 1);
        }
        if (isset($this->uploadId)) {
            $serializer->serializeString(self::$SCHEMA_UPLOAD_ID, $this->uploadId, 2);
        }
        if (isset($this->multipartUpload)) {
            $serializer->serializeStruct(self::$SCHEMA_MULTIPART_UPLOAD, $this->multipartUpload, 3);
        }
        if (isset($this->checksumCRC32)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32, $this->checksumCRC32, 4);
        }
        if (isset($this->checksumCRC32C)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32_C, $this->checksumCRC32C, 5);
        }
        if (isset($this->checksumCRC64NVME)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC64_NVME, $this->checksumCRC64NVME, 6);
        }
        if (isset($this->checksumSHA1)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA1, $this->checksumSHA1, 7);
        }
        if (isset($this->checksumSHA256)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA256, $this->checksumSHA256, 8);
        }
        if (isset($this->checksumSHA512)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA512, $this->checksumSHA512, 9);
        }
        if (isset($this->checksumMD5)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_MD5, $this->checksumMD5, 10);
        }
        if (isset($this->checksumXXHASH64)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH64, $this->checksumXXHASH64, 11);
        }
        if (isset($this->checksumXXHASH3)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH3, $this->checksumXXHASH3, 12);
        }
        if (isset($this->checksumXXHASH128)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH128, $this->checksumXXHASH128, 13);
        }
        if (isset($this->checksumType)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_TYPE, $this->checksumType->value, 14);
        }
        if (isset($this->mpuObjectSize)) {
            $serializer->serializeInteger(self::$SCHEMA_MPU_OBJECT_SIZE, $this->mpuObjectSize, 15);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 16);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 17);
        }
        if (isset($this->ifMatch)) {
            $serializer->serializeString(self::$SCHEMA_IF_MATCH, $this->ifMatch, 18);
        }
        if (isset($this->ifNoneMatch)) {
            $serializer->serializeString(self::$SCHEMA_IF_NONE_MATCH, $this->ifNoneMatch, 19);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 20);
        }
        if (isset($this->sSECustomerKey)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY, $this->sSECustomerKey, 21);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 22);
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
            3 => $this->multipartUpload,
            4 => $this->checksumCRC32,
            5 => $this->checksumCRC32C,
            6 => $this->checksumCRC64NVME,
            7 => $this->checksumSHA1,
            8 => $this->checksumSHA256,
            9 => $this->checksumSHA512,
            10 => $this->checksumMD5,
            11 => $this->checksumXXHASH64,
            12 => $this->checksumXXHASH3,
            13 => $this->checksumXXHASH128,
            14 => $this->checksumType,
            15 => $this->mpuObjectSize,
            16 => $this->requestPayer,
            17 => $this->expectedBucketOwner,
            18 => $this->ifMatch,
            19 => $this->ifNoneMatch,
            20 => $this->sSECustomerAlgorithm,
            21 => $this->sSECustomerKey,
            22 => $this->sSECustomerKeyMD5,
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
            $this->multipartUpload,
            $this->checksumCRC32,
            $this->checksumCRC32C,
            $this->checksumCRC64NVME,
            $this->checksumSHA1,
            $this->checksumSHA256,
            $this->checksumSHA512,
            $this->checksumMD5,
            $this->checksumXXHASH64,
            $this->checksumXXHASH3,
            $this->checksumXXHASH128,
            $this->checksumType,
            $this->mpuObjectSize,
            $this->requestPayer,
            $this->expectedBucketOwner,
            $this->ifMatch,
            $this->ifNoneMatch,
            $this->sSECustomerAlgorithm,
            $this->sSECustomerKey,
            $this->sSECustomerKeyMD5
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
