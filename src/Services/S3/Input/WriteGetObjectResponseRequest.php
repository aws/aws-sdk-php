<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ObjectLockLegalHoldStatus;
use Aws\Services\S3\Shape\ObjectLockMode;
use Aws\Services\S3\Shape\ReplicationStatus;
use Aws\Services\S3\Shape\RequestCharged;
use Aws\Services\S3\Shape\ServerSideEncryption;
use Aws\Services\S3\Shape\StorageClass;
use JsonSerializable;
use Psr\Http\Message\StreamInterface;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

final class WriteGetObjectResponseRequest implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#WriteGetObjectResponseRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_REQUEST_ROUTE;
    private static Schema $SCHEMA_REQUEST_TOKEN;
    private static Schema $SCHEMA_BODY;
    private static Schema $SCHEMA_STATUS_CODE;
    private static Schema $SCHEMA_ERROR_CODE;
    private static Schema $SCHEMA_ERROR_MESSAGE;
    private static Schema $SCHEMA_ACCEPT_RANGES;
    private static Schema $SCHEMA_CACHE_CONTROL;
    private static Schema $SCHEMA_CONTENT_DISPOSITION;
    private static Schema $SCHEMA_CONTENT_ENCODING;
    private static Schema $SCHEMA_CONTENT_LANGUAGE;
    private static Schema $SCHEMA_CONTENT_LENGTH;
    private static Schema $SCHEMA_CONTENT_RANGE;
    private static Schema $SCHEMA_CONTENT_TYPE;
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
    private static Schema $SCHEMA_DELETE_MARKER;
    private static Schema $SCHEMA_E_TAG;
    private static Schema $SCHEMA_EXPIRES;
    private static Schema $SCHEMA_EXPIRATION;
    private static Schema $SCHEMA_LAST_MODIFIED;
    private static Schema $SCHEMA_MISSING_META;
    private static Schema $SCHEMA_METADATA;
    private static Schema $SCHEMA_OBJECT_LOCK_MODE;
    private static Schema $SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS;
    private static Schema $SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE;
    private static Schema $SCHEMA_PARTS_COUNT;
    private static Schema $SCHEMA_REPLICATION_STATUS;
    private static Schema $SCHEMA_REQUEST_CHARGED;
    private static Schema $SCHEMA_RESTORE;
    private static Schema $SCHEMA_SERVER_SIDE_ENCRYPTION;
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSEKMS_KEY_ID;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_STORAGE_CLASS;
    private static Schema $SCHEMA_TAG_COUNT;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_BUCKET_KEY_ENABLED;

    public readonly ?ObjectLockMode $objectLockMode;
    public readonly ?ObjectLockLegalHoldStatus $objectLockLegalHoldStatus;
    public readonly ?ReplicationStatus $replicationStatus;
    public readonly ?RequestCharged $requestCharged;
    public readonly ?ServerSideEncryption $serverSideEncryption;
    public readonly ?StorageClass $storageClass;

    /**
     * @param ?string $requestRoute Route prefix to the HTTP URL generated.
     * @param ?string $requestToken A single use encrypted token that maps WriteGetObjectResponse to the end user GetObject
     *        request.
     * @param string|StreamInterface|null $body The object data.
     * @param ?int $statusCode The integer status code for an HTTP response of a corresponding GetObject request. The
     *        following is a list of status codes. 200 - OK 206 - Partial Content 304 - Not Modified 400 - Bad Request 401 -
     *        Unauthorized 403 - Forbidden 404 - Not Found 405 - Method Not Allowed 409 - Conflict 411 - Length Required 412
     * -
     *        Precondition Failed 416 - Range Not Satisfiable 500 - Internal Server Error 503 - Service Unavailable
     * @param ?string $errorCode A string that uniquely identifies an error condition. Returned in the tag of the error XML
     *        response for a corresponding GetObject call. Cannot be used with a successful StatusCode header or when the
     *        transformed object is provided in the body. All error codes from S3 are sentence-cased. The regular expression
     *        (regex) value is "^[A-Z][a-zA-Z]+$".
     * @param ?string $errorMessage Contains a generic description of the error condition. Returned in the tag of the error
     *        XML response for a corresponding GetObject call. Cannot be used with a successful StatusCode header or when
     * the
     *        transformed object is provided in body.
     * @param ?string $acceptRanges Indicates that a range of bytes was specified.
     * @param ?string $cacheControl Specifies caching behavior along the request/reply chain.
     * @param ?string $contentDisposition Specifies presentational information for the object.
     * @param ?string $contentEncoding Specifies what content encodings have been applied to the object and thus what
     *        decoding mechanisms must be applied to obtain the media-type referenced by the Content-Type header field.
     * @param ?string $contentLanguage The language the content is in.
     * @param ?int $contentLength The size of the content body in bytes.
     * @param ?string $contentRange The portion of the object returned in the response.
     * @param ?string $contentType A standard MIME type describing the format of the object data.
     * @param ?string $checksumCRC32 This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This specifies the Base64 encoded, 32-bit CRC32 checksum of the object
     *        returned by the Object Lambda function. This may not match the checksum for the object stored in Amazon S3.
     * Amazon S3
     *        will perform validation of the checksum values only when the original GetObject request required checksum
     * validation.
     *        For more information about checksums, see Checking object integrity in the Amazon S3 User Guide. Only one
     * checksum
     *        header can be specified at a time. If you supply multiple checksum headers, this request will fail.
     * @param ?string $checksumCRC32C This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This specifies the Base64 encoded, 32-bit CRC32C checksum of the
     * object
     *        returned by the Object Lambda function. This may not match the checksum for the object stored in Amazon S3.
     * Amazon S3
     *        will perform validation of the checksum values only when the original GetObject request required checksum
     * validation.
     *        For more information about checksums, see Checking object integrity in the Amazon S3 User Guide. Only one
     * checksum
     *        header can be specified at a time. If you supply multiple checksum headers, this request will fail.
     * @param ?string $checksumCRC64NVME This header can be used as a data integrity check to verify that the data received
     *        is the same data that was originally sent. This header specifies the Base64 encoded, 64-bit CRC64NVME checksum
     * of the
     *        part. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA1 This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This specifies the Base64 encoded, 160-bit SHA1 digest of the object
     * returned
     *        by the Object Lambda function. This may not match the checksum for the object stored in Amazon S3. Amazon S3
     * will
     *        perform validation of the checksum values only when the original GetObject request required checksum
     * validation. For
     *        more information about checksums, see Checking object integrity in the Amazon S3 User Guide. Only one checksum
     * header
     *        can be specified at a time. If you supply multiple checksum headers, this request will fail.
     * @param ?string $checksumSHA256 This header can be used as a data integrity check to verify that the data received is
     *        the same data that was originally sent. This specifies the Base64 encoded, 256-bit SHA256 digest of the object
     *        returned by the Object Lambda function. This may not match the checksum for the object stored in Amazon S3.
     * Amazon S3
     *        will perform validation of the checksum values only when the original GetObject request required checksum
     * validation.
     *        For more information about checksums, see Checking object integrity in the Amazon S3 User Guide. Only one
     * checksum
     *        header can be specified at a time. If you supply multiple checksum headers, this request will fail.
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
     * @param ?bool $deleteMarker Specifies whether an object stored in Amazon S3 is (true) or is not (false) a delete
     *        marker. To learn more about delete markers, see Working with delete markers.
     * @param ?string $eTag An opaque identifier assigned by a web server to a specific version of a resource found at a
     *        URL.
     * @param ?string $expires The date and time at which the object is no longer cacheable.
     * @param ?string $expiration If the object expiration is configured (see PUT Bucket lifecycle), the response includes
     *        this header. It includes the expiry-date and rule-id key-value pairs that provide the object expiration
     * information.
     *        The value of the rule-id is URL-encoded.
     * @param ?float $lastModified The date and time that the object was last modified.
     * @param ?int $missingMeta Set to the number of metadata entries not returned in x-amz-meta headers. This can happen if
     *        you create metadata using an API like SOAP that supports more flexible metadata than the REST API. For
     * example, using
     *        SOAP, you can create metadata whose values are not legal HTTP headers.
     * @param array<string, string>|null $metadata
     * @param ?ObjectLockMode $objectLockMode Indicates whether an object stored in Amazon S3 has Object Lock enabled. For
     *        more information about S3 Object Lock, see Object Lock.
     * @param ?ObjectLockLegalHoldStatus $objectLockLegalHoldStatus Indicates whether an object stored in Amazon S3 has an
     *        active legal hold.
     * @param ?float $objectLockRetainUntilDate The date and time when Object Lock is configured to expire.
     * @param ?int $partsCount The count of parts this object has.
     * @param ?ReplicationStatus $replicationStatus Indicates if request involves bucket that is either a source or
     *        destination in a Replication rule. For more information about S3 Replication, see Replication.
     * @param ?string $restore Provides information about object restoration operation and expiration time of the restored
     *        object copy.
     * @param ?ServerSideEncryption $serverSideEncryption The server-side encryption algorithm used when storing requested
     *        object in Amazon S3 or Amazon FSx. When accessing data stored in Amazon FSx file systems using S3 access
     * points, the
     *        only valid server side encryption option is aws:fsx.
     * @param ?string $sSECustomerAlgorithm Encryption algorithm used if server-side encryption with a customer-provided
     *        encryption key was specified for object stored in Amazon S3.
     * @param ?string $sSEKMSKeyId If present, specifies the ID (Key ID, Key ARN, or Key Alias) of the Amazon Web Services
     *        Key Management Service (Amazon Web Services KMS) symmetric encryption customer managed key that was used for
     * stored
     *        in Amazon S3 object.
     * @param ?string $sSECustomerKeyMD5 128-bit MD5 digest of customer-provided encryption key used in Amazon S3 to encrypt
     *        data stored in S3. For more information, see Protecting data using server-side encryption with
     * customer-provided
     *        encryption keys (SSE-C).
     * @param ?StorageClass $storageClass Provides storage class information of the object. Amazon S3 returns this header
     *        for all objects except for S3 Standard storage class objects. For more information, see Storage Classes.
     * @param ?int $tagCount The number of tags, if any, on the object.
     * @param ?string $versionId An ID used to reference a specific version of the object.
     * @param ?bool $bucketKeyEnabled Indicates whether the object stored in Amazon S3 uses an S3 bucket key for server-side
     *        encryption with Amazon Web Services KMS (SSE-KMS).
     */
    public function __construct(
        public readonly ?string $requestRoute = null,
        public readonly ?string $requestToken = null,
        public readonly string|StreamInterface|null $body = null,
        public readonly ?int $statusCode = null,
        public readonly ?string $errorCode = null,
        public readonly ?string $errorMessage = null,
        public readonly ?string $acceptRanges = null,
        public readonly ?string $cacheControl = null,
        public readonly ?string $contentDisposition = null,
        public readonly ?string $contentEncoding = null,
        public readonly ?string $contentLanguage = null,
        public readonly ?int $contentLength = null,
        public readonly ?string $contentRange = null,
        public readonly ?string $contentType = null,
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
        public readonly ?bool $deleteMarker = null,
        public readonly ?string $eTag = null,
        public readonly ?string $expires = null,
        public readonly ?string $expiration = null,
        public readonly ?float $lastModified = null,
        public readonly ?int $missingMeta = null,
        public readonly ?array $metadata = null,
        ObjectLockMode|string|null $objectLockMode = null,
        ObjectLockLegalHoldStatus|string|null $objectLockLegalHoldStatus = null,
        public readonly ?float $objectLockRetainUntilDate = null,
        public readonly ?int $partsCount = null,
        ReplicationStatus|string|null $replicationStatus = null,
        RequestCharged|string|null $requestCharged = null,
        public readonly ?string $restore = null,
        ServerSideEncryption|string|null $serverSideEncryption = null,
        public readonly ?string $sSECustomerAlgorithm = null,
        /** @sensitive */
        public readonly ?string $sSEKMSKeyId = null,
        public readonly ?string $sSECustomerKeyMD5 = null,
        StorageClass|string|null $storageClass = null,
        public readonly ?int $tagCount = null,
        public readonly ?string $versionId = null,
        public readonly ?bool $bucketKeyEnabled = null
    ) {
        $this->objectLockMode = $objectLockMode === null || $objectLockMode instanceof ObjectLockMode ? $objectLockMode : ObjectLockMode::fromValue($objectLockMode);
        $this->objectLockLegalHoldStatus = $objectLockLegalHoldStatus === null || $objectLockLegalHoldStatus instanceof ObjectLockLegalHoldStatus ? $objectLockLegalHoldStatus : ObjectLockLegalHoldStatus::fromValue($objectLockLegalHoldStatus);
        $this->replicationStatus = $replicationStatus === null || $replicationStatus instanceof ReplicationStatus ? $replicationStatus : ReplicationStatus::fromValue($replicationStatus);
        $this->requestCharged = $requestCharged === null || $requestCharged instanceof RequestCharged ? $requestCharged : RequestCharged::fromValue($requestCharged);
        $this->serverSideEncryption = $serverSideEncryption === null || $serverSideEncryption instanceof ServerSideEncryption ? $serverSideEncryption : ServerSideEncryption::fromValue($serverSideEncryption);
        $this->storageClass = $storageClass === null || $storageClass instanceof StorageClass ? $storageClass : StorageClass::fromValue($storageClass);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::writeGetObjectResponseRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_REQUEST_ROUTE = $m[0];
        self::$SCHEMA_REQUEST_TOKEN = $m[1];
        self::$SCHEMA_BODY = $m[2];
        self::$SCHEMA_STATUS_CODE = $m[3];
        self::$SCHEMA_ERROR_CODE = $m[4];
        self::$SCHEMA_ERROR_MESSAGE = $m[5];
        self::$SCHEMA_ACCEPT_RANGES = $m[6];
        self::$SCHEMA_CACHE_CONTROL = $m[7];
        self::$SCHEMA_CONTENT_DISPOSITION = $m[8];
        self::$SCHEMA_CONTENT_ENCODING = $m[9];
        self::$SCHEMA_CONTENT_LANGUAGE = $m[10];
        self::$SCHEMA_CONTENT_LENGTH = $m[11];
        self::$SCHEMA_CONTENT_RANGE = $m[12];
        self::$SCHEMA_CONTENT_TYPE = $m[13];
        self::$SCHEMA_CHECKSUM_CRC32 = $m[14];
        self::$SCHEMA_CHECKSUM_CRC32_C = $m[15];
        self::$SCHEMA_CHECKSUM_CRC64_NVME = $m[16];
        self::$SCHEMA_CHECKSUM_SHA1 = $m[17];
        self::$SCHEMA_CHECKSUM_SHA256 = $m[18];
        self::$SCHEMA_CHECKSUM_SHA512 = $m[19];
        self::$SCHEMA_CHECKSUM_MD5 = $m[20];
        self::$SCHEMA_CHECKSUM_XXHASH64 = $m[21];
        self::$SCHEMA_CHECKSUM_XXHASH3 = $m[22];
        self::$SCHEMA_CHECKSUM_XXHASH128 = $m[23];
        self::$SCHEMA_DELETE_MARKER = $m[24];
        self::$SCHEMA_E_TAG = $m[25];
        self::$SCHEMA_EXPIRES = $m[26];
        self::$SCHEMA_EXPIRATION = $m[27];
        self::$SCHEMA_LAST_MODIFIED = $m[28];
        self::$SCHEMA_MISSING_META = $m[29];
        self::$SCHEMA_METADATA = $m[30];
        self::$SCHEMA_OBJECT_LOCK_MODE = $m[31];
        self::$SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS = $m[32];
        self::$SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE = $m[33];
        self::$SCHEMA_PARTS_COUNT = $m[34];
        self::$SCHEMA_REPLICATION_STATUS = $m[35];
        self::$SCHEMA_REQUEST_CHARGED = $m[36];
        self::$SCHEMA_RESTORE = $m[37];
        self::$SCHEMA_SERVER_SIDE_ENCRYPTION = $m[38];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[39];
        self::$SCHEMA_SSEKMS_KEY_ID = $m[40];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[41];
        self::$SCHEMA_STORAGE_CLASS = $m[42];
        self::$SCHEMA_TAG_COUNT = $m[43];
        self::$SCHEMA_VERSION_ID = $m[44];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[45];
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
        if (isset($this->requestRoute)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_ROUTE, $this->requestRoute, 0);
        }
        if (isset($this->requestToken)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_TOKEN, $this->requestToken, 1);
        }
        if (isset($this->body)) {
            $serializer->serializeBlob(self::$SCHEMA_BODY, $this->body, 2);
        }
        if (isset($this->statusCode)) {
            $serializer->serializeInteger(self::$SCHEMA_STATUS_CODE, $this->statusCode, 3);
        }
        if (isset($this->errorCode)) {
            $serializer->serializeString(self::$SCHEMA_ERROR_CODE, $this->errorCode, 4);
        }
        if (isset($this->errorMessage)) {
            $serializer->serializeString(self::$SCHEMA_ERROR_MESSAGE, $this->errorMessage, 5);
        }
        if (isset($this->acceptRanges)) {
            $serializer->serializeString(self::$SCHEMA_ACCEPT_RANGES, $this->acceptRanges, 6);
        }
        if (isset($this->cacheControl)) {
            $serializer->serializeString(self::$SCHEMA_CACHE_CONTROL, $this->cacheControl, 7);
        }
        if (isset($this->contentDisposition)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_DISPOSITION, $this->contentDisposition, 8);
        }
        if (isset($this->contentEncoding)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_ENCODING, $this->contentEncoding, 9);
        }
        if (isset($this->contentLanguage)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_LANGUAGE, $this->contentLanguage, 10);
        }
        if (isset($this->contentLength)) {
            $serializer->serializeInteger(self::$SCHEMA_CONTENT_LENGTH, $this->contentLength, 11);
        }
        if (isset($this->contentRange)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_RANGE, $this->contentRange, 12);
        }
        if (isset($this->contentType)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_TYPE, $this->contentType, 13);
        }
        if (isset($this->checksumCRC32)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32, $this->checksumCRC32, 14);
        }
        if (isset($this->checksumCRC32C)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32_C, $this->checksumCRC32C, 15);
        }
        if (isset($this->checksumCRC64NVME)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC64_NVME, $this->checksumCRC64NVME, 16);
        }
        if (isset($this->checksumSHA1)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA1, $this->checksumSHA1, 17);
        }
        if (isset($this->checksumSHA256)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA256, $this->checksumSHA256, 18);
        }
        if (isset($this->checksumSHA512)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA512, $this->checksumSHA512, 19);
        }
        if (isset($this->checksumMD5)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_MD5, $this->checksumMD5, 20);
        }
        if (isset($this->checksumXXHASH64)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH64, $this->checksumXXHASH64, 21);
        }
        if (isset($this->checksumXXHASH3)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH3, $this->checksumXXHASH3, 22);
        }
        if (isset($this->checksumXXHASH128)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH128, $this->checksumXXHASH128, 23);
        }
        if (isset($this->deleteMarker)) {
            $serializer->serializeBoolean(self::$SCHEMA_DELETE_MARKER, $this->deleteMarker, 24);
        }
        if (isset($this->eTag)) {
            $serializer->serializeString(self::$SCHEMA_E_TAG, $this->eTag, 25);
        }
        if (isset($this->expires)) {
            $serializer->serializeString(self::$SCHEMA_EXPIRES, $this->expires, 26);
        }
        if (isset($this->expiration)) {
            $serializer->serializeString(self::$SCHEMA_EXPIRATION, $this->expiration, 27);
        }
        if (isset($this->lastModified)) {
            $serializer->serializeTimestamp(self::$SCHEMA_LAST_MODIFIED, $this->lastModified, 28);
        }
        if (isset($this->missingMeta)) {
            $serializer->serializeInteger(self::$SCHEMA_MISSING_META, $this->missingMeta, 29);
        }
        if (isset($this->metadata)) {
            $serializer->serializeMap(self::$SCHEMA_METADATA, $this->metadata, 30);
        }
        if (isset($this->objectLockMode)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_MODE, $this->objectLockMode->value, 31);
        }
        if (isset($this->objectLockLegalHoldStatus)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS, $this->objectLockLegalHoldStatus->value, 32);
        }
        if (isset($this->objectLockRetainUntilDate)) {
            $serializer->serializeTimestamp(self::$SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE, $this->objectLockRetainUntilDate, 33);
        }
        if (isset($this->partsCount)) {
            $serializer->serializeInteger(self::$SCHEMA_PARTS_COUNT, $this->partsCount, 34);
        }
        if (isset($this->replicationStatus)) {
            $serializer->serializeString(self::$SCHEMA_REPLICATION_STATUS, $this->replicationStatus->value, 35);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 36);
        }
        if (isset($this->restore)) {
            $serializer->serializeString(self::$SCHEMA_RESTORE, $this->restore, 37);
        }
        if (isset($this->serverSideEncryption)) {
            $serializer->serializeString(self::$SCHEMA_SERVER_SIDE_ENCRYPTION, $this->serverSideEncryption->value, 38);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 39);
        }
        if (isset($this->sSEKMSKeyId)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_KEY_ID, $this->sSEKMSKeyId, 40);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 41);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 42);
        }
        if (isset($this->tagCount)) {
            $serializer->serializeInteger(self::$SCHEMA_TAG_COUNT, $this->tagCount, 43);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 44);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 45);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->requestRoute,
            1 => $this->requestToken,
            2 => $this->body,
            3 => $this->statusCode,
            4 => $this->errorCode,
            5 => $this->errorMessage,
            6 => $this->acceptRanges,
            7 => $this->cacheControl,
            8 => $this->contentDisposition,
            9 => $this->contentEncoding,
            10 => $this->contentLanguage,
            11 => $this->contentLength,
            12 => $this->contentRange,
            13 => $this->contentType,
            14 => $this->checksumCRC32,
            15 => $this->checksumCRC32C,
            16 => $this->checksumCRC64NVME,
            17 => $this->checksumSHA1,
            18 => $this->checksumSHA256,
            19 => $this->checksumSHA512,
            20 => $this->checksumMD5,
            21 => $this->checksumXXHASH64,
            22 => $this->checksumXXHASH3,
            23 => $this->checksumXXHASH128,
            24 => $this->deleteMarker,
            25 => $this->eTag,
            26 => $this->expires,
            27 => $this->expiration,
            28 => $this->lastModified,
            29 => $this->missingMeta,
            30 => $this->metadata,
            31 => $this->objectLockMode,
            32 => $this->objectLockLegalHoldStatus,
            33 => $this->objectLockRetainUntilDate,
            34 => $this->partsCount,
            35 => $this->replicationStatus,
            36 => $this->requestCharged,
            37 => $this->restore,
            38 => $this->serverSideEncryption,
            39 => $this->sSECustomerAlgorithm,
            40 => $this->sSEKMSKeyId,
            41 => $this->sSECustomerKeyMD5,
            42 => $this->storageClass,
            43 => $this->tagCount,
            44 => $this->versionId,
            45 => $this->bucketKeyEnabled,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->requestRoute,
            $this->requestToken,
            $this->body,
            $this->statusCode,
            $this->errorCode,
            $this->errorMessage,
            $this->acceptRanges,
            $this->cacheControl,
            $this->contentDisposition,
            $this->contentEncoding,
            $this->contentLanguage,
            $this->contentLength,
            $this->contentRange,
            $this->contentType,
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
            $this->deleteMarker,
            $this->eTag,
            $this->expires,
            $this->expiration,
            $this->lastModified,
            $this->missingMeta,
            $this->metadata,
            $this->objectLockMode,
            $this->objectLockLegalHoldStatus,
            $this->objectLockRetainUntilDate,
            $this->partsCount,
            $this->replicationStatus,
            $this->requestCharged,
            $this->restore,
            $this->serverSideEncryption,
            $this->sSECustomerAlgorithm,
            $this->sSEKMSKeyId,
            $this->sSECustomerKeyMD5,
            $this->storageClass,
            $this->tagCount,
            $this->versionId,
            $this->bucketKeyEnabled
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
