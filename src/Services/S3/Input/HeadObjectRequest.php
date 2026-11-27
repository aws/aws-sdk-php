<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumMode;
use Aws\Services\S3\Shape\RequestPayer;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

final class HeadObjectRequest implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#HeadObjectRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_IF_MATCH;
    private static Schema $SCHEMA_IF_MODIFIED_SINCE;
    private static Schema $SCHEMA_IF_NONE_MATCH;
    private static Schema $SCHEMA_IF_UNMODIFIED_SINCE;
    private static Schema $SCHEMA_RANGE;
    private static Schema $SCHEMA_RESPONSE_CACHE_CONTROL;
    private static Schema $SCHEMA_RESPONSE_CONTENT_DISPOSITION;
    private static Schema $SCHEMA_RESPONSE_CONTENT_ENCODING;
    private static Schema $SCHEMA_RESPONSE_CONTENT_LANGUAGE;
    private static Schema $SCHEMA_RESPONSE_CONTENT_TYPE;
    private static Schema $SCHEMA_RESPONSE_EXPIRES;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_PART_NUMBER;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_CHECKSUM_MODE;

    public readonly ?RequestPayer $requestPayer;
    public readonly ?ChecksumMode $checksumMode;

    /**
     * @param ?string $bucket The name of the bucket that contains the object. Directory buckets - When you use this
     *        operation with a directory bucket, you must use virtual-hosted-style requests in the format
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
     * @param ?string $key The object key.
     * @param ?string $ifMatch Return the object only if its entity tag (ETag) is the same as the one specified; otherwise,
     *        return a 412 (precondition failed) error. If both of the If-Match and If-Unmodified-Since headers are present
     * in the
     *        request as follows: If-Match condition evaluates to true, and; If-Unmodified-Since condition evaluates to
     * false; Then
     *        Amazon S3 returns 200 OK and the data requested. For more information about conditional requests, see RFC
     * 7232.
     * @param ?float $ifModifiedSince Return the object only if it has been modified since the specified time; otherwise,
     *        return a 304 (not modified) error. If both of the If-None-Match and If-Modified-Since headers are present in
     * the
     *        request as follows: If-None-Match condition evaluates to false, and; If-Modified-Since condition evaluates to
     * true;
     *        Then Amazon S3 returns the 304 Not Modified response code. For more information about conditional requests,
     * see RFC
     *        7232.
     * @param ?string $ifNoneMatch Return the object only if its entity tag (ETag) is different from the one specified;
     *        otherwise, return a 304 (not modified) error. If both of the If-None-Match and If-Modified-Since headers are
     * present
     *        in the request as follows: If-None-Match condition evaluates to false, and; If-Modified-Since condition
     * evaluates to
     *        true; Then Amazon S3 returns the 304 Not Modified response code. For more information about conditional
     * requests, see
     *        RFC 7232.
     * @param ?float $ifUnmodifiedSince Return the object only if it has not been modified since the specified time;
     *        otherwise, return a 412 (precondition failed) error. If both of the If-Match and If-Unmodified-Since headers
     * are
     *        present in the request as follows: If-Match condition evaluates to true, and; If-Unmodified-Since condition
     * evaluates
     *        to false; Then Amazon S3 returns 200 OK and the data requested. For more information about conditional
     * requests, see
     *        RFC 7232.
     * @param ?string $range HeadObject returns only the metadata for an object. If the Range is satisfiable, only the
     *        ContentLength is affected in the response. If the Range is not satisfiable, S3 returns a 416 - Requested Range
     * Not
     *        Satisfiable error.
     * @param ?string $responseCacheControl Sets the Cache-Control header of the response.
     * @param ?string $responseContentDisposition Sets the Content-Disposition header of the response.
     * @param ?string $responseContentEncoding Sets the Content-Encoding header of the response.
     * @param ?string $responseContentLanguage Sets the Content-Language header of the response.
     * @param ?string $responseContentType Sets the Content-Type header of the response.
     * @param ?float $responseExpires Sets the Expires header of the response.
     * @param ?string $versionId Version ID used to reference a specific version of the object. For directory buckets in
     *        this API operation, only the null value of the version ID is supported.
     * @param ?string $sSECustomerAlgorithm Specifies the algorithm to use when encrypting the object (for example, AES256).
     *        This functionality is not supported for directory buckets.
     * @param ?string $sSECustomerKey Specifies the customer-provided encryption key for Amazon S3 to use in encrypting
     *        data. This value is used to store the object and then it is discarded; Amazon S3 does not store the encryption
     * key.
     *        The key must be appropriate for use with the algorithm specified in the
     *        x-amz-server-side-encryption-customer-algorithm header. This functionality is not supported for directory
     * buckets.
     * @param ?string $sSECustomerKeyMD5 Specifies the 128-bit MD5 digest of the encryption key according to RFC 1321.
     *        Amazon S3 uses this header for a message integrity check to ensure that the encryption key was transmitted
     * without
     *        error. This functionality is not supported for directory buckets.
     * @param ?int $partNumber Part number of the object being read. This is a positive integer between 1 and 10,000.
     *        Effectively performs a 'ranged' HEAD request for the part specified. Useful querying about the size of the
     * part and
     *        the number of parts in this object.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     * @param ?ChecksumMode $checksumMode To retrieve the checksum, this parameter must be enabled. General purpose buckets
     *        - If you enable checksum mode and the object is uploaded with a checksum and encrypted with an Key Management
     * Service
     *        (KMS) key, you must have permission to use the kms:Decrypt action to retrieve the checksum. Directory buckets
     * - If
     *        you enable ChecksumMode and the object is encrypted with Amazon Web Services Key Management Service (Amazon
     * Web
     *        Services KMS), you must also have the kms:GenerateDataKey and kms:Decrypt permissions in IAM identity-based
     * policies
     *        and KMS key policies for the KMS key to retrieve the checksum of the object.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        public readonly ?string $ifMatch = null,
        public readonly ?float $ifModifiedSince = null,
        public readonly ?string $ifNoneMatch = null,
        public readonly ?float $ifUnmodifiedSince = null,
        public readonly ?string $range = null,
        public readonly ?string $responseCacheControl = null,
        public readonly ?string $responseContentDisposition = null,
        public readonly ?string $responseContentEncoding = null,
        public readonly ?string $responseContentLanguage = null,
        public readonly ?string $responseContentType = null,
        public readonly ?float $responseExpires = null,
        public readonly ?string $versionId = null,
        public readonly ?string $sSECustomerAlgorithm = null,
        /** @sensitive */
        public readonly ?string $sSECustomerKey = null,
        public readonly ?string $sSECustomerKeyMD5 = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?int $partNumber = null,
        public readonly ?string $expectedBucketOwner = null,
        ChecksumMode|string|null $checksumMode = null
    ) {
        $this->requestPayer = $requestPayer === null || $requestPayer instanceof RequestPayer ? $requestPayer : RequestPayer::fromValue($requestPayer);
        $this->checksumMode = $checksumMode === null || $checksumMode instanceof ChecksumMode ? $checksumMode : ChecksumMode::fromValue($checksumMode);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::headObjectRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_IF_MATCH = $m[2];
        self::$SCHEMA_IF_MODIFIED_SINCE = $m[3];
        self::$SCHEMA_IF_NONE_MATCH = $m[4];
        self::$SCHEMA_IF_UNMODIFIED_SINCE = $m[5];
        self::$SCHEMA_RANGE = $m[6];
        self::$SCHEMA_RESPONSE_CACHE_CONTROL = $m[7];
        self::$SCHEMA_RESPONSE_CONTENT_DISPOSITION = $m[8];
        self::$SCHEMA_RESPONSE_CONTENT_ENCODING = $m[9];
        self::$SCHEMA_RESPONSE_CONTENT_LANGUAGE = $m[10];
        self::$SCHEMA_RESPONSE_CONTENT_TYPE = $m[11];
        self::$SCHEMA_RESPONSE_EXPIRES = $m[12];
        self::$SCHEMA_VERSION_ID = $m[13];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[14];
        self::$SCHEMA_SSE_CUSTOMER_KEY = $m[15];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[16];
        self::$SCHEMA_REQUEST_PAYER = $m[17];
        self::$SCHEMA_PART_NUMBER = $m[18];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[19];
        self::$SCHEMA_CHECKSUM_MODE = $m[20];
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
        if (isset($this->ifMatch)) {
            $serializer->serializeString(self::$SCHEMA_IF_MATCH, $this->ifMatch, 2);
        }
        if (isset($this->ifModifiedSince)) {
            $serializer->serializeTimestamp(self::$SCHEMA_IF_MODIFIED_SINCE, $this->ifModifiedSince, 3);
        }
        if (isset($this->ifNoneMatch)) {
            $serializer->serializeString(self::$SCHEMA_IF_NONE_MATCH, $this->ifNoneMatch, 4);
        }
        if (isset($this->ifUnmodifiedSince)) {
            $serializer->serializeTimestamp(self::$SCHEMA_IF_UNMODIFIED_SINCE, $this->ifUnmodifiedSince, 5);
        }
        if (isset($this->range)) {
            $serializer->serializeString(self::$SCHEMA_RANGE, $this->range, 6);
        }
        if (isset($this->responseCacheControl)) {
            $serializer->serializeString(self::$SCHEMA_RESPONSE_CACHE_CONTROL, $this->responseCacheControl, 7);
        }
        if (isset($this->responseContentDisposition)) {
            $serializer->serializeString(self::$SCHEMA_RESPONSE_CONTENT_DISPOSITION, $this->responseContentDisposition, 8);
        }
        if (isset($this->responseContentEncoding)) {
            $serializer->serializeString(self::$SCHEMA_RESPONSE_CONTENT_ENCODING, $this->responseContentEncoding, 9);
        }
        if (isset($this->responseContentLanguage)) {
            $serializer->serializeString(self::$SCHEMA_RESPONSE_CONTENT_LANGUAGE, $this->responseContentLanguage, 10);
        }
        if (isset($this->responseContentType)) {
            $serializer->serializeString(self::$SCHEMA_RESPONSE_CONTENT_TYPE, $this->responseContentType, 11);
        }
        if (isset($this->responseExpires)) {
            $serializer->serializeTimestamp(self::$SCHEMA_RESPONSE_EXPIRES, $this->responseExpires, 12);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 13);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 14);
        }
        if (isset($this->sSECustomerKey)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY, $this->sSECustomerKey, 15);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 16);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 17);
        }
        if (isset($this->partNumber)) {
            $serializer->serializeInteger(self::$SCHEMA_PART_NUMBER, $this->partNumber, 18);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 19);
        }
        if (isset($this->checksumMode)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_MODE, $this->checksumMode->value, 20);
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
            2 => $this->ifMatch,
            3 => $this->ifModifiedSince,
            4 => $this->ifNoneMatch,
            5 => $this->ifUnmodifiedSince,
            6 => $this->range,
            7 => $this->responseCacheControl,
            8 => $this->responseContentDisposition,
            9 => $this->responseContentEncoding,
            10 => $this->responseContentLanguage,
            11 => $this->responseContentType,
            12 => $this->responseExpires,
            13 => $this->versionId,
            14 => $this->sSECustomerAlgorithm,
            15 => $this->sSECustomerKey,
            16 => $this->sSECustomerKeyMD5,
            17 => $this->requestPayer,
            18 => $this->partNumber,
            19 => $this->expectedBucketOwner,
            20 => $this->checksumMode,
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
            $this->ifMatch,
            $this->ifModifiedSince,
            $this->ifNoneMatch,
            $this->ifUnmodifiedSince,
            $this->range,
            $this->responseCacheControl,
            $this->responseContentDisposition,
            $this->responseContentEncoding,
            $this->responseContentLanguage,
            $this->responseContentType,
            $this->responseExpires,
            $this->versionId,
            $this->sSECustomerAlgorithm,
            $this->sSECustomerKey,
            $this->sSECustomerKeyMD5,
            $this->requestPayer,
            $this->partNumber,
            $this->expectedBucketOwner,
            $this->checksumMode
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
