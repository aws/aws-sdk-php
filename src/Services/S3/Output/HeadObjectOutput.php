<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ArchiveStatus;
use Aws\Services\S3\Shape\ChecksumType;
use Aws\Services\S3\Shape\ObjectLockEventHold;
use Aws\Services\S3\Shape\ObjectLockLegalHoldStatus;
use Aws\Services\S3\Shape\ObjectLockMode;
use Aws\Services\S3\Shape\ReplicationStatus;
use Aws\Services\S3\Shape\RequestCharged;
use Aws\Services\S3\Shape\ServerSideEncryption;
use Aws\Services\S3\Shape\StorageClass;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class HeadObjectOutput implements SerializableStructInterface, \ArrayAccess, JsonSerializable
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#HeadObjectOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DELETE_MARKER;
    private static Schema $SCHEMA_ACCEPT_RANGES;
    private static Schema $SCHEMA_EXPIRATION;
    private static Schema $SCHEMA_RESTORE;
    private static Schema $SCHEMA_ARCHIVE_STATUS;
    private static Schema $SCHEMA_LAST_MODIFIED;
    private static Schema $SCHEMA_CONTENT_LENGTH;
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
    private static Schema $SCHEMA_E_TAG;
    private static Schema $SCHEMA_MISSING_META;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_CACHE_CONTROL;
    private static Schema $SCHEMA_CONTENT_DISPOSITION;
    private static Schema $SCHEMA_CONTENT_ENCODING;
    private static Schema $SCHEMA_CONTENT_LANGUAGE;
    private static Schema $SCHEMA_CONTENT_TYPE;
    private static Schema $SCHEMA_CONTENT_RANGE;
    private static Schema $SCHEMA_EXPIRES;
    private static Schema $SCHEMA_WEBSITE_REDIRECT_LOCATION;
    private static Schema $SCHEMA_SERVER_SIDE_ENCRYPTION;
    private static Schema $SCHEMA_METADATA;
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_SSEKMS_KEY_ID;
    private static Schema $SCHEMA_BUCKET_KEY_ENABLED;
    private static Schema $SCHEMA_STORAGE_CLASS;
    private static Schema $SCHEMA_REQUEST_CHARGED;
    private static Schema $SCHEMA_REPLICATION_STATUS;
    private static Schema $SCHEMA_PARTS_COUNT;
    private static Schema $SCHEMA_TAG_COUNT;
    private static Schema $SCHEMA_OBJECT_LOCK_MODE;
    private static Schema $SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE;
    private static Schema $SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS;
    private static Schema $SCHEMA_OBJECT_LOCK_EVENT_HOLD;
    private static Schema $SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_DAYS;
    private static Schema $SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_YEARS;

    public readonly ?ArchiveStatus $archiveStatus;
    public readonly ?ChecksumType $checksumType;
    public readonly ?ServerSideEncryption $serverSideEncryption;
    public readonly ?StorageClass $storageClass;
    public readonly ?RequestCharged $requestCharged;
    public readonly ?ReplicationStatus $replicationStatus;
    public readonly ?ObjectLockMode $objectLockMode;
    public readonly ?ObjectLockLegalHoldStatus $objectLockLegalHoldStatus;
    public readonly ?ObjectLockEventHold $objectLockEventHold;

    /**
     * @param ?bool $deleteMarker Specifies whether the object retrieved was (true) or was not (false) a Delete Marker. If
     *        false, this response header does not appear in the response. This functionality is not supported for directory
     *        buckets.
     * @param ?string $acceptRanges Indicates that a range of bytes was specified.
     * @param ?string $expiration If the object expiration is configured (see PutBucketLifecycleConfiguration ), the
     *        response includes this header. It includes the expiry-date and rule-id key-value pairs providing object
     * expiration
     *        information. The value of the rule-id is URL-encoded. Object expiration information is not returned in
     * directory
     *        buckets and this header returns the value "NotImplemented" in all responses for directory buckets.
     * @param ?string $restore If the object is an archived object (an object whose storage class is GLACIER), the response
     *        includes this header if either the archive restoration is in progress (see RestoreObject or an archive copy is
     *        already restored. If an archive copy is already restored, the header value indicates when Amazon S3 is
     * scheduled to
     *        delete the object copy. For example: x-amz-restore: ongoing-request="false", expiry-date="Fri, 21 Dec 2012
     * 00:00:00
     *        GMT" If the object restoration is in progress, the header returns the value ongoing-request="true". For more
     *        information about archiving objects, see Transitioning Objects: General Considerations. This functionality is
     * not
     *        supported for directory buckets. Directory buckets only support EXPRESS_ONEZONE (the S3 Express One Zone
     * storage
     *        class) in Availability Zones and ONEZONE_IA (the S3 One Zone-Infrequent Access storage class) in Dedicated
     * Local
     *        Zones.
     * @param ?ArchiveStatus $archiveStatus The archive state of the head object. This functionality is not supported for
     *        directory buckets.
     * @param ?float $lastModified Date and time when the object was last modified.
     * @param ?int $contentLength Size of the body in bytes.
     * @param ?string $checksumCRC32 The Base64 encoded, 32-bit CRC32 checksum of the object. This checksum is only present
     *        if the checksum was uploaded with the object. When you use an API operation on an object that was uploaded
     * using
     *        multipart uploads, this value may not be a direct checksum value of the full object. Instead, it's a
     * calculation
     *        based on the checksum values of each individual part. For more information about how checksums are calculated
     * with
     *        multipart uploads, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumCRC32C The Base64 encoded, 32-bit CRC32C checksum of the object. This checksum is only
     *        present if the checksum was uploaded with the object. When you use an API operation on an object that was
     * uploaded
     *        using multipart uploads, this value may not be a direct checksum value of the full object. Instead, it's a
     *        calculation based on the checksum values of each individual part. For more information about how checksums are
     *        calculated with multipart uploads, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumCRC64NVME The Base64 encoded, 64-bit CRC64NVME checksum of the object. For more information,
     *        see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA1 The Base64 encoded, 160-bit SHA1 digest of the object. This checksum is only present if
     *        the checksum was uploaded with the object. When you use the API operation on an object that was uploaded using
     *        multipart uploads, this value may not be a direct checksum value of the full object. Instead, it's a
     * calculation
     *        based on the checksum values of each individual part. For more information about how checksums are calculated
     * with
     *        multipart uploads, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA256 The Base64 encoded, 256-bit SHA256 digest of the object. This checksum is only present
     *        if the checksum was uploaded with the object. When you use an API operation on an object that was uploaded
     * using
     *        multipart uploads, this value may not be a direct checksum value of the full object. Instead, it's a
     * calculation
     *        based on the checksum values of each individual part. For more information about how checksums are calculated
     * with
     *        multipart uploads, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumSHA512 The Base64 encoded, 512-bit SHA512 digest of the object. For more information, see
     *        Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumMD5 The Base64 encoded, 128-bit MD5 digest of the object. For more information, see Checking
     *        object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH64 The Base64 encoded, 64-bit XXHASH64 checksum of the object. For more information,
     *        see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH3 The Base64 encoded, 64-bit XXHASH3 checksum of the object. For more information, see
     *        Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $checksumXXHASH128 The Base64 encoded, 128-bit XXHASH128 checksum of the object. For more information,
     *        see Checking object integrity in the Amazon S3 User Guide.
     * @param ?ChecksumType $checksumType The checksum type, which determines how part-level checksums are combined to
     *        create an object-level checksum for multipart objects. You can use this header response to verify that the
     * checksum
     *        type that is received is the same checksum type that was specified in CreateMultipartUpload request. For more
     *        information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?string $eTag An entity tag (ETag) is an opaque identifier assigned by a web server to a specific version of a
     *        resource found at a URL.
     * @param ?int $missingMeta This is set to the number of metadata entries not returned in x-amz-meta headers. This can
     *        happen if you create metadata using an API like SOAP that supports more flexible metadata than the REST API.
     * For
     *        example, using SOAP, you can create metadata whose values are not legal HTTP headers. This functionality is
     * not
     *        supported for directory buckets.
     * @param ?string $versionId Version ID of the object. This functionality is not supported for directory buckets.
     * @param ?string $cacheControl Specifies caching behavior along the request/reply chain.
     * @param ?string $contentDisposition Specifies presentational information for the object.
     * @param ?string $contentEncoding Indicates what content encodings have been applied to the object and thus what
     *        decoding mechanisms must be applied to obtain the media-type referenced by the Content-Type header field.
     * @param ?string $contentLanguage The language the content is in.
     * @param ?string $contentType A standard MIME type describing the format of the object data.
     * @param ?string $contentRange The portion of the object returned in the response for a GET request.
     * @param ?string $expires The date and time at which the object is no longer cacheable.
     * @param ?string $websiteRedirectLocation If the bucket is configured as a website, redirects requests for this object
     *        to another object in the same bucket or to an external URL. Amazon S3 stores the value of this header in the
     * object
     *        metadata. This functionality is not supported for directory buckets.
     * @param ?ServerSideEncryption $serverSideEncryption The server-side encryption algorithm used when you store this
     *        object in Amazon S3 or Amazon FSx. When accessing data stored in Amazon FSx file systems using S3 access
     * points, the
     *        only valid server side encryption option is aws:fsx.
     * @param array<string, string>|null $metadata
     * @param ?string $sSECustomerAlgorithm If server-side encryption with a customer-provided encryption key was requested,
     *        the response will include this header to confirm the encryption algorithm that's used. This functionality is
     * not
     *        supported for directory buckets.
     * @param ?string $sSECustomerKeyMD5 If server-side encryption with a customer-provided encryption key was requested,
     *        the response will include this header to provide the round-trip message integrity verification of the
     *        customer-provided encryption key. This functionality is not supported for directory buckets.
     * @param ?string $sSEKMSKeyId If present, indicates the ID of the KMS key that was used for object encryption.
     * @param ?bool $bucketKeyEnabled Indicates whether the object uses an S3 Bucket Key for server-side encryption with Key
     *        Management Service (KMS) keys (SSE-KMS).
     * @param ?StorageClass $storageClass Provides storage class information of the object. Amazon S3 returns this header
     *        for all objects except for S3 Standard storage class objects. For more information, see Storage Classes.
     * Directory
     *        buckets - Directory buckets only support EXPRESS_ONEZONE (the S3 Express One Zone storage class) in
     * Availability
     *        Zones and ONEZONE_IA (the S3 One Zone-Infrequent Access storage class) in Dedicated Local Zones.
     * @param ?ReplicationStatus $replicationStatus Amazon S3 can return this header if your request involves a bucket that
     *        is either a source or a destination in a replication rule. In replication, you have a source bucket on which
     * you
     *        configure replication and destination bucket or buckets where Amazon S3 stores object replicas. When you
     * request an
     *        object (GetObject) or object metadata (HeadObject) from these buckets, Amazon S3 will return the
     *        x-amz-replication-status header in the response as follows: If requesting an object from the source bucket,
     * Amazon S3
     *        will return the x-amz-replication-status header if the object in your request is eligible for replication. For
     *        example, suppose that in your replication configuration, you specify object prefix TaxDocs requesting Amazon
     * S3 to
     *        replicate objects with key prefix TaxDocs. Any objects you upload with this key name prefix, for example
     *        TaxDocs/document1.pdf, are eligible for replication. For any object request with this key name prefix, Amazon
     * S3 will
     *        return the x-amz-replication-status header with value PENDING, COMPLETED or FAILED indicating object
     * replication
     *        status. If requesting an object from a destination bucket, Amazon S3 will return the x-amz-replication-status
     * header
     *        with value REPLICA if the object in your request is a replica that Amazon S3 created and there is no replica
     *        modification replication in progress. When replicating objects to multiple destination buckets, the
     *        x-amz-replication-status header acts differently. The header of the source object will only return a value of
     *        COMPLETED when replication is successful to all destinations. The header will remain at value PENDING until
     *        replication has completed for all destinations. If one or more destinations fails replication the header will
     * return
     *        FAILED. For more information, see Replication. This functionality is not supported for directory buckets.
     * @param ?int $partsCount The count of parts this object has. This value is only returned if you specify partNumber in
     *        your request and the object was uploaded as a multipart upload.
     * @param ?int $tagCount The number of tags, if any, on the object, when you have the relevant permission to read object
     *        tags. You can use GetObjectTagging to retrieve the tag set associated with an object. This functionality is
     * not
     *        supported for directory buckets.
     * @param ?ObjectLockMode $objectLockMode The Object Lock mode, if any, that's in effect for this object. This header is
     *        only returned if the requester has the s3:GetObjectRetention permission. For more information about S3 Object
     * Lock,
     *        see Object Lock. This functionality is not supported for directory buckets.
     * @param ?float $objectLockRetainUntilDate The date and time when the Object Lock retention period expires. This header
     *        is only returned if the requester has the s3:GetObjectRetention permission. This functionality is not
     * supported for
     *        directory buckets.
     * @param ?ObjectLockLegalHoldStatus $objectLockLegalHoldStatus Specifies whether a legal hold is in effect for this
     *        object. This header is only returned if the requester has the s3:GetObjectLegalHold permission. This header is
     * not
     *        returned if the specified version of this object has never had a legal hold applied. For more information
     * about S3
     *        Object Lock, see Object Lock. This functionality is not supported for directory buckets.
     * @param ?ObjectLockEventHold $objectLockEventHold The event hold status for this object. This header is only returned
     *        if the requester has the s3:GetObjectRetention permission. This functionality is not supported for directory
     * buckets.
     * @param ?int $objectLockEventHoldDurationDays The event hold duration in days for this object. Only returned when the
     *        event hold is enabled. This functionality is not supported for directory buckets.
     * @param ?int $objectLockEventHoldDurationYears The event hold duration in years for this object. Only returned when
     *        the event hold is enabled. This functionality is not supported for directory buckets.
     */
    public function __construct(
        public readonly ?bool $deleteMarker = null,
        public readonly ?string $acceptRanges = null,
        public readonly ?string $expiration = null,
        public readonly ?string $restore = null,
        ArchiveStatus|string|null $archiveStatus = null,
        public readonly ?float $lastModified = null,
        public readonly ?int $contentLength = null,
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
        public readonly ?string $eTag = null,
        public readonly ?int $missingMeta = null,
        public readonly ?string $versionId = null,
        public readonly ?string $cacheControl = null,
        public readonly ?string $contentDisposition = null,
        public readonly ?string $contentEncoding = null,
        public readonly ?string $contentLanguage = null,
        public readonly ?string $contentType = null,
        public readonly ?string $contentRange = null,
        public readonly ?string $expires = null,
        public readonly ?string $websiteRedirectLocation = null,
        ServerSideEncryption|string|null $serverSideEncryption = null,
        public readonly ?array $metadata = null,
        public readonly ?string $sSECustomerAlgorithm = null,
        public readonly ?string $sSECustomerKeyMD5 = null,
        /** @sensitive */
        public readonly ?string $sSEKMSKeyId = null,
        public readonly ?bool $bucketKeyEnabled = null,
        StorageClass|string|null $storageClass = null,
        RequestCharged|string|null $requestCharged = null,
        ReplicationStatus|string|null $replicationStatus = null,
        public readonly ?int $partsCount = null,
        public readonly ?int $tagCount = null,
        ObjectLockMode|string|null $objectLockMode = null,
        public readonly ?float $objectLockRetainUntilDate = null,
        ObjectLockLegalHoldStatus|string|null $objectLockLegalHoldStatus = null,
        ObjectLockEventHold|string|null $objectLockEventHold = null,
        public readonly ?int $objectLockEventHoldDurationDays = null,
        public readonly ?int $objectLockEventHoldDurationYears = null
    ) {
        $this->archiveStatus = $archiveStatus === null || $archiveStatus instanceof ArchiveStatus ? $archiveStatus : ArchiveStatus::fromValue($archiveStatus);
        $this->checksumType = $checksumType === null || $checksumType instanceof ChecksumType ? $checksumType : ChecksumType::fromValue($checksumType);
        $this->serverSideEncryption = $serverSideEncryption === null || $serverSideEncryption instanceof ServerSideEncryption ? $serverSideEncryption : ServerSideEncryption::fromValue($serverSideEncryption);
        $this->storageClass = $storageClass === null || $storageClass instanceof StorageClass ? $storageClass : StorageClass::fromValue($storageClass);
        $this->requestCharged = $requestCharged === null || $requestCharged instanceof RequestCharged ? $requestCharged : RequestCharged::fromValue($requestCharged);
        $this->replicationStatus = $replicationStatus === null || $replicationStatus instanceof ReplicationStatus ? $replicationStatus : ReplicationStatus::fromValue($replicationStatus);
        $this->objectLockMode = $objectLockMode === null || $objectLockMode instanceof ObjectLockMode ? $objectLockMode : ObjectLockMode::fromValue($objectLockMode);
        $this->objectLockLegalHoldStatus = $objectLockLegalHoldStatus === null || $objectLockLegalHoldStatus instanceof ObjectLockLegalHoldStatus ? $objectLockLegalHoldStatus : ObjectLockLegalHoldStatus::fromValue($objectLockLegalHoldStatus);
        $this->objectLockEventHold = $objectLockEventHold === null || $objectLockEventHold instanceof ObjectLockEventHold ? $objectLockEventHold : ObjectLockEventHold::fromValue($objectLockEventHold);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::headObjectOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DELETE_MARKER = $m[0];
        self::$SCHEMA_ACCEPT_RANGES = $m[1];
        self::$SCHEMA_EXPIRATION = $m[2];
        self::$SCHEMA_RESTORE = $m[3];
        self::$SCHEMA_ARCHIVE_STATUS = $m[4];
        self::$SCHEMA_LAST_MODIFIED = $m[5];
        self::$SCHEMA_CONTENT_LENGTH = $m[6];
        self::$SCHEMA_CHECKSUM_CRC32 = $m[7];
        self::$SCHEMA_CHECKSUM_CRC32_C = $m[8];
        self::$SCHEMA_CHECKSUM_CRC64_NVME = $m[9];
        self::$SCHEMA_CHECKSUM_SHA1 = $m[10];
        self::$SCHEMA_CHECKSUM_SHA256 = $m[11];
        self::$SCHEMA_CHECKSUM_SHA512 = $m[12];
        self::$SCHEMA_CHECKSUM_MD5 = $m[13];
        self::$SCHEMA_CHECKSUM_XXHASH64 = $m[14];
        self::$SCHEMA_CHECKSUM_XXHASH3 = $m[15];
        self::$SCHEMA_CHECKSUM_XXHASH128 = $m[16];
        self::$SCHEMA_CHECKSUM_TYPE = $m[17];
        self::$SCHEMA_E_TAG = $m[18];
        self::$SCHEMA_MISSING_META = $m[19];
        self::$SCHEMA_VERSION_ID = $m[20];
        self::$SCHEMA_CACHE_CONTROL = $m[21];
        self::$SCHEMA_CONTENT_DISPOSITION = $m[22];
        self::$SCHEMA_CONTENT_ENCODING = $m[23];
        self::$SCHEMA_CONTENT_LANGUAGE = $m[24];
        self::$SCHEMA_CONTENT_TYPE = $m[25];
        self::$SCHEMA_CONTENT_RANGE = $m[26];
        self::$SCHEMA_EXPIRES = $m[27];
        self::$SCHEMA_WEBSITE_REDIRECT_LOCATION = $m[28];
        self::$SCHEMA_SERVER_SIDE_ENCRYPTION = $m[29];
        self::$SCHEMA_METADATA = $m[30];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[31];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[32];
        self::$SCHEMA_SSEKMS_KEY_ID = $m[33];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[34];
        self::$SCHEMA_STORAGE_CLASS = $m[35];
        self::$SCHEMA_REQUEST_CHARGED = $m[36];
        self::$SCHEMA_REPLICATION_STATUS = $m[37];
        self::$SCHEMA_PARTS_COUNT = $m[38];
        self::$SCHEMA_TAG_COUNT = $m[39];
        self::$SCHEMA_OBJECT_LOCK_MODE = $m[40];
        self::$SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE = $m[41];
        self::$SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS = $m[42];
        self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD = $m[43];
        self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_DAYS = $m[44];
        self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_YEARS = $m[45];
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
        if (isset($this->deleteMarker)) {
            $serializer->serializeBoolean(self::$SCHEMA_DELETE_MARKER, $this->deleteMarker, 0);
        }
        if (isset($this->acceptRanges)) {
            $serializer->serializeString(self::$SCHEMA_ACCEPT_RANGES, $this->acceptRanges, 1);
        }
        if (isset($this->expiration)) {
            $serializer->serializeString(self::$SCHEMA_EXPIRATION, $this->expiration, 2);
        }
        if (isset($this->restore)) {
            $serializer->serializeString(self::$SCHEMA_RESTORE, $this->restore, 3);
        }
        if (isset($this->archiveStatus)) {
            $serializer->serializeString(self::$SCHEMA_ARCHIVE_STATUS, $this->archiveStatus->value, 4);
        }
        if (isset($this->lastModified)) {
            $serializer->serializeTimestamp(self::$SCHEMA_LAST_MODIFIED, $this->lastModified, 5);
        }
        if (isset($this->contentLength)) {
            $serializer->serializeInteger(self::$SCHEMA_CONTENT_LENGTH, $this->contentLength, 6);
        }
        if (isset($this->checksumCRC32)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32, $this->checksumCRC32, 7);
        }
        if (isset($this->checksumCRC32C)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32_C, $this->checksumCRC32C, 8);
        }
        if (isset($this->checksumCRC64NVME)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC64_NVME, $this->checksumCRC64NVME, 9);
        }
        if (isset($this->checksumSHA1)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA1, $this->checksumSHA1, 10);
        }
        if (isset($this->checksumSHA256)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA256, $this->checksumSHA256, 11);
        }
        if (isset($this->checksumSHA512)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA512, $this->checksumSHA512, 12);
        }
        if (isset($this->checksumMD5)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_MD5, $this->checksumMD5, 13);
        }
        if (isset($this->checksumXXHASH64)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH64, $this->checksumXXHASH64, 14);
        }
        if (isset($this->checksumXXHASH3)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH3, $this->checksumXXHASH3, 15);
        }
        if (isset($this->checksumXXHASH128)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH128, $this->checksumXXHASH128, 16);
        }
        if (isset($this->checksumType)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_TYPE, $this->checksumType->value, 17);
        }
        if (isset($this->eTag)) {
            $serializer->serializeString(self::$SCHEMA_E_TAG, $this->eTag, 18);
        }
        if (isset($this->missingMeta)) {
            $serializer->serializeInteger(self::$SCHEMA_MISSING_META, $this->missingMeta, 19);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 20);
        }
        if (isset($this->cacheControl)) {
            $serializer->serializeString(self::$SCHEMA_CACHE_CONTROL, $this->cacheControl, 21);
        }
        if (isset($this->contentDisposition)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_DISPOSITION, $this->contentDisposition, 22);
        }
        if (isset($this->contentEncoding)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_ENCODING, $this->contentEncoding, 23);
        }
        if (isset($this->contentLanguage)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_LANGUAGE, $this->contentLanguage, 24);
        }
        if (isset($this->contentType)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_TYPE, $this->contentType, 25);
        }
        if (isset($this->contentRange)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_RANGE, $this->contentRange, 26);
        }
        if (isset($this->expires)) {
            $serializer->serializeString(self::$SCHEMA_EXPIRES, $this->expires, 27);
        }
        if (isset($this->websiteRedirectLocation)) {
            $serializer->serializeString(self::$SCHEMA_WEBSITE_REDIRECT_LOCATION, $this->websiteRedirectLocation, 28);
        }
        if (isset($this->serverSideEncryption)) {
            $serializer->serializeString(self::$SCHEMA_SERVER_SIDE_ENCRYPTION, $this->serverSideEncryption->value, 29);
        }
        if (isset($this->metadata)) {
            $serializer->serializeMap(self::$SCHEMA_METADATA, $this->metadata, 30);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 31);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 32);
        }
        if (isset($this->sSEKMSKeyId)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_KEY_ID, $this->sSEKMSKeyId, 33);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 34);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 35);
        }
        if (isset($this->requestCharged)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_CHARGED, $this->requestCharged->value, 36);
        }
        if (isset($this->replicationStatus)) {
            $serializer->serializeString(self::$SCHEMA_REPLICATION_STATUS, $this->replicationStatus->value, 37);
        }
        if (isset($this->partsCount)) {
            $serializer->serializeInteger(self::$SCHEMA_PARTS_COUNT, $this->partsCount, 38);
        }
        if (isset($this->tagCount)) {
            $serializer->serializeInteger(self::$SCHEMA_TAG_COUNT, $this->tagCount, 39);
        }
        if (isset($this->objectLockMode)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_MODE, $this->objectLockMode->value, 40);
        }
        if (isset($this->objectLockRetainUntilDate)) {
            $serializer->serializeTimestamp(self::$SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE, $this->objectLockRetainUntilDate, 41);
        }
        if (isset($this->objectLockLegalHoldStatus)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS, $this->objectLockLegalHoldStatus->value, 42);
        }
        if (isset($this->objectLockEventHold)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD, $this->objectLockEventHold->value, 43);
        }
        if (isset($this->objectLockEventHoldDurationDays)) {
            $serializer->serializeInteger(self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_DAYS, $this->objectLockEventHoldDurationDays, 44);
        }
        if (isset($this->objectLockEventHoldDurationYears)) {
            $serializer->serializeInteger(self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_YEARS, $this->objectLockEventHoldDurationYears, 45);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->deleteMarker,
            1 => $this->acceptRanges,
            2 => $this->expiration,
            3 => $this->restore,
            4 => $this->archiveStatus,
            5 => $this->lastModified,
            6 => $this->contentLength,
            7 => $this->checksumCRC32,
            8 => $this->checksumCRC32C,
            9 => $this->checksumCRC64NVME,
            10 => $this->checksumSHA1,
            11 => $this->checksumSHA256,
            12 => $this->checksumSHA512,
            13 => $this->checksumMD5,
            14 => $this->checksumXXHASH64,
            15 => $this->checksumXXHASH3,
            16 => $this->checksumXXHASH128,
            17 => $this->checksumType,
            18 => $this->eTag,
            19 => $this->missingMeta,
            20 => $this->versionId,
            21 => $this->cacheControl,
            22 => $this->contentDisposition,
            23 => $this->contentEncoding,
            24 => $this->contentLanguage,
            25 => $this->contentType,
            26 => $this->contentRange,
            27 => $this->expires,
            28 => $this->websiteRedirectLocation,
            29 => $this->serverSideEncryption,
            30 => $this->metadata,
            31 => $this->sSECustomerAlgorithm,
            32 => $this->sSECustomerKeyMD5,
            33 => $this->sSEKMSKeyId,
            34 => $this->bucketKeyEnabled,
            35 => $this->storageClass,
            36 => $this->requestCharged,
            37 => $this->replicationStatus,
            38 => $this->partsCount,
            39 => $this->tagCount,
            40 => $this->objectLockMode,
            41 => $this->objectLockRetainUntilDate,
            42 => $this->objectLockLegalHoldStatus,
            43 => $this->objectLockEventHold,
            44 => $this->objectLockEventHoldDurationDays,
            45 => $this->objectLockEventHoldDurationYears,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->deleteMarker,
            $this->acceptRanges,
            $this->expiration,
            $this->restore,
            $this->archiveStatus,
            $this->lastModified,
            $this->contentLength,
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
            $this->eTag,
            $this->missingMeta,
            $this->versionId,
            $this->cacheControl,
            $this->contentDisposition,
            $this->contentEncoding,
            $this->contentLanguage,
            $this->contentType,
            $this->contentRange,
            $this->expires,
            $this->websiteRedirectLocation,
            $this->serverSideEncryption,
            $this->metadata,
            $this->sSECustomerAlgorithm,
            $this->sSECustomerKeyMD5,
            $this->sSEKMSKeyId,
            $this->bucketKeyEnabled,
            $this->storageClass,
            $this->requestCharged,
            $this->replicationStatus,
            $this->partsCount,
            $this->tagCount,
            $this->objectLockMode,
            $this->objectLockRetainUntilDate,
            $this->objectLockLegalHoldStatus,
            $this->objectLockEventHold,
            $this->objectLockEventHoldDurationDays,
            $this->objectLockEventHoldDurationYears
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
