<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\RequestPayer;
use JsonSerializable;
use Psr\Http\Message\StreamInterface;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

final class UploadPartRequest implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#UploadPartRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_PART_NUMBER;
    private static Schema $SCHEMA_UPLOAD_ID;
    private static Schema $SCHEMA_BODY;
    private static Schema $SCHEMA_CONTENT_LENGTH;
    private static Schema $SCHEMA_CONTENT_MD5;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
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
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;

    public readonly ?ChecksumAlgorithm $checksumAlgorithm;
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
     * @param ?string $key Object key for which the multipart upload was initiated.
     * @param ?int $partNumber Part number of part being uploaded. This is a positive integer between 1 and 10,000.
     * @param ?string $uploadId Upload ID identifying the multipart upload whose part is being uploaded.
     * @param string|StreamInterface|null $body Object data.
     * @param ?int $contentLength Size of the body in bytes. This parameter is useful when the size of the body cannot be
     *        determined automatically.
     * @param ?string $contentMD5 The Base64 encoded 128-bit MD5 digest of the part data. This parameter is auto-populated
     *        when using the command from the CLI. This parameter is required if object lock parameters are specified. This
     *        functionality is not supported for directory buckets.
     * @param ?ChecksumAlgorithm $checksumAlgorithm Indicates the algorithm used to create the checksum for the object when
     *        you use the SDK. This header will not provide any additional functionality if you don't use the SDK. When you
     * send
     *        this header, there must be a corresponding x-amz-checksum or x-amz-trailer header sent. Otherwise, Amazon S3
     * fails
     *        the request with the HTTP status code 400 Bad Request. For more information, see Checking object integrity in
     * the
     *        Amazon S3 User Guide. If you provide an individual checksum, Amazon S3 ignores any provided ChecksumAlgorithm
     *        parameter. This checksum algorithm must be the same for all parts and it match the checksum value supplied in
     * the
     *        CreateMultipartUpload request.
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
     *        part. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA1 This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This header specifies the Base64 encoded, 160-bit SHA1 digest of the
     * object.
     *        For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA256 This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This header specifies the Base64 encoded, 256-bit SHA256 digest of the
     *        object. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA512 This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This header specifies the Base64 encoded, 512-bit SHA512 digest of the
     * part.
     *        For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumMD5 This header can be used as a data integrity check to verify that the data received is the
     *        same data that was originally sent. This header specifies the Base64 encoded, 128-bit MD5 digest of the part.
     * For
     *        more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH64 This header can be used as a data integrity check to verify that the data received
     *        is the same data that was originally sent. This header specifies the Base64 encoded, 64-bit XXHASH64 checksum
     * of the
     *        part. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH3 This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This header specifies the Base64 encoded, 64-bit XXHASH3 checksum of
     * the
     *        part. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH128 This header can be used as a data integrity check to verify that the data received
     *        is the same data that was originally sent. This header specifies the Base64 encoded, 128-bit XXHASH128
     * checksum of
     *        the part. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $sSECustomerAlgorithm Specifies the algorithm to use when encrypting the object (for example, AES256).
     *        This functionality is not supported for directory buckets.
     * @param ?string $sSECustomerKey Specifies the customer-provided encryption key for Amazon S3 to use in encrypting
     *        data. This value is used to store the object and then it is discarded; Amazon S3 does not store the encryption
     * key.
     *        The key must be appropriate for use with the algorithm specified in the
     *        x-amz-server-side-encryption-customer-algorithm header. This must be the same encryption key specified in the
     *        initiate multipart upload request. This functionality is not supported for directory buckets.
     * @param ?string $sSECustomerKeyMD5 Specifies the 128-bit MD5 digest of the encryption key according to RFC 1321.
     *        Amazon S3 uses this header for a message integrity check to ensure that the encryption key was transmitted
     * without
     *        error. This functionality is not supported for directory buckets.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?int $partNumber = null,
        public readonly ?string $uploadId = null,
        public readonly string|StreamInterface|null $body = null,
        public readonly ?int $contentLength = null,
        public readonly ?string $contentMD5 = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null,
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
        public readonly ?string $sSECustomerAlgorithm = null,
        /** @sensitive */
        public readonly ?string $sSECustomerKey = null,
        public readonly ?string $sSECustomerKeyMD5 = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $expectedBucketOwner = null
    ) {
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
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
        $s = Schemas::uploadPartRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_PART_NUMBER = $m[2];
        self::$SCHEMA_UPLOAD_ID = $m[3];
        self::$SCHEMA_BODY = $m[4];
        self::$SCHEMA_CONTENT_LENGTH = $m[5];
        self::$SCHEMA_CONTENT_MD5 = $m[6];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[7];
        self::$SCHEMA_CHECKSUM_CRC32 = $m[8];
        self::$SCHEMA_CHECKSUM_CRC32_C = $m[9];
        self::$SCHEMA_CHECKSUM_CRC64_NVME = $m[10];
        self::$SCHEMA_CHECKSUM_SHA1 = $m[11];
        self::$SCHEMA_CHECKSUM_SHA256 = $m[12];
        self::$SCHEMA_CHECKSUM_SHA512 = $m[13];
        self::$SCHEMA_CHECKSUM_MD5 = $m[14];
        self::$SCHEMA_CHECKSUM_XXHASH64 = $m[15];
        self::$SCHEMA_CHECKSUM_XXHASH3 = $m[16];
        self::$SCHEMA_CHECKSUM_XXHASH128 = $m[17];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[18];
        self::$SCHEMA_SSE_CUSTOMER_KEY = $m[19];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[20];
        self::$SCHEMA_REQUEST_PAYER = $m[21];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[22];
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
        if (isset($this->partNumber)) {
            $serializer->serializeInteger(self::$SCHEMA_PART_NUMBER, $this->partNumber, 2);
        }
        if (isset($this->uploadId)) {
            $serializer->serializeString(self::$SCHEMA_UPLOAD_ID, $this->uploadId, 3);
        }
        if (isset($this->body)) {
            $serializer->serializeBlob(self::$SCHEMA_BODY, $this->body, 4);
        }
        if (isset($this->contentLength)) {
            $serializer->serializeInteger(self::$SCHEMA_CONTENT_LENGTH, $this->contentLength, 5);
        }
        if (isset($this->contentMD5)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_MD5, $this->contentMD5, 6);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 7);
        }
        if (isset($this->checksumCRC32)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32, $this->checksumCRC32, 8);
        }
        if (isset($this->checksumCRC32C)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32_C, $this->checksumCRC32C, 9);
        }
        if (isset($this->checksumCRC64NVME)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC64_NVME, $this->checksumCRC64NVME, 10);
        }
        if (isset($this->checksumSHA1)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA1, $this->checksumSHA1, 11);
        }
        if (isset($this->checksumSHA256)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA256, $this->checksumSHA256, 12);
        }
        if (isset($this->checksumSHA512)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA512, $this->checksumSHA512, 13);
        }
        if (isset($this->checksumMD5)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_MD5, $this->checksumMD5, 14);
        }
        if (isset($this->checksumXXHASH64)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH64, $this->checksumXXHASH64, 15);
        }
        if (isset($this->checksumXXHASH3)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH3, $this->checksumXXHASH3, 16);
        }
        if (isset($this->checksumXXHASH128)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH128, $this->checksumXXHASH128, 17);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 18);
        }
        if (isset($this->sSECustomerKey)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY, $this->sSECustomerKey, 19);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 20);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 21);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 22);
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
            2 => $this->partNumber,
            3 => $this->uploadId,
            4 => $this->body,
            5 => $this->contentLength,
            6 => $this->contentMD5,
            7 => $this->checksumAlgorithm,
            8 => $this->checksumCRC32,
            9 => $this->checksumCRC32C,
            10 => $this->checksumCRC64NVME,
            11 => $this->checksumSHA1,
            12 => $this->checksumSHA256,
            13 => $this->checksumSHA512,
            14 => $this->checksumMD5,
            15 => $this->checksumXXHASH64,
            16 => $this->checksumXXHASH3,
            17 => $this->checksumXXHASH128,
            18 => $this->sSECustomerAlgorithm,
            19 => $this->sSECustomerKey,
            20 => $this->sSECustomerKeyMD5,
            21 => $this->requestPayer,
            22 => $this->expectedBucketOwner,
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
            $this->partNumber,
            $this->uploadId,
            $this->body,
            $this->contentLength,
            $this->contentMD5,
            $this->checksumAlgorithm,
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
            $this->sSECustomerAlgorithm,
            $this->sSECustomerKey,
            $this->sSECustomerKeyMD5,
            $this->requestPayer,
            $this->expectedBucketOwner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
