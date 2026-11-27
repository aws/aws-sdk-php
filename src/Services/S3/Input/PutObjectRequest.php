<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\ObjectCannedACL;
use Aws\Services\S3\Shape\ObjectLockEventHold;
use Aws\Services\S3\Shape\ObjectLockLegalHoldStatus;
use Aws\Services\S3\Shape\ObjectLockMode;
use Aws\Services\S3\Shape\RequestPayer;
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

final class PutObjectRequest implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PutObjectRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_ACL;
    private static Schema $SCHEMA_BODY;
    private static Schema $SCHEMA_CACHE_CONTROL;
    private static Schema $SCHEMA_CONTENT_DISPOSITION;
    private static Schema $SCHEMA_CONTENT_ENCODING;
    private static Schema $SCHEMA_CONTENT_LANGUAGE;
    private static Schema $SCHEMA_CONTENT_LENGTH;
    private static Schema $SCHEMA_CONTENT_MD5;
    private static Schema $SCHEMA_CONTENT_TYPE;
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
    private static Schema $SCHEMA_EXPIRES;
    private static Schema $SCHEMA_IF_MATCH;
    private static Schema $SCHEMA_IF_NONE_MATCH;
    private static Schema $SCHEMA_GRANT_FULL_CONTROL;
    private static Schema $SCHEMA_GRANT_READ;
    private static Schema $SCHEMA_GRANT_READ_ACP;
    private static Schema $SCHEMA_GRANT_WRITE_ACP;
    private static Schema $SCHEMA_WRITE_OFFSET_BYTES;
    private static Schema $SCHEMA_METADATA;
    private static Schema $SCHEMA_SERVER_SIDE_ENCRYPTION;
    private static Schema $SCHEMA_STORAGE_CLASS;
    private static Schema $SCHEMA_WEBSITE_REDIRECT_LOCATION;
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_SSEKMS_KEY_ID;
    private static Schema $SCHEMA_SSEKMS_ENCRYPTION_CONTEXT;
    private static Schema $SCHEMA_BUCKET_KEY_ENABLED;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_TAGGING;
    private static Schema $SCHEMA_OBJECT_LOCK_MODE;
    private static Schema $SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE;
    private static Schema $SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS;
    private static Schema $SCHEMA_OBJECT_LOCK_EVENT_HOLD;
    private static Schema $SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_DAYS;
    private static Schema $SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_YEARS;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;

    public readonly ?ObjectCannedACL $aCL;
    public readonly ?ChecksumAlgorithm $checksumAlgorithm;
    public readonly ?ServerSideEncryption $serverSideEncryption;
    public readonly ?StorageClass $storageClass;
    public readonly ?RequestPayer $requestPayer;
    public readonly ?ObjectLockMode $objectLockMode;
    public readonly ?ObjectLockLegalHoldStatus $objectLockLegalHoldStatus;
    public readonly ?ObjectLockEventHold $objectLockEventHold;

    /**
     * @param ?string $bucket The bucket name to which the PUT action was initiated. Directory buckets - When you use this
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
     * @param ?string $key Object key for which the PUT action was initiated.
     * @param ?ObjectCannedACL $aCL The canned ACL to apply to the object. For more information, see Canned ACL in the
     *        Amazon S3 User Guide. When adding a new object, you can use headers to grant ACL-based permissions to
     * individual
     *        Amazon Web Services accounts or to predefined groups defined by Amazon S3. These permissions are then added to
     * the
     *        ACL on the object. By default, all objects are private. Only the owner has full access control. For more
     * information,
     *        see Access Control List (ACL) Overview and Managing ACLs Using the REST API in the Amazon S3 User Guide. If
     * the
     *        bucket that you're uploading objects to uses the bucket owner enforced setting for S3 Object Ownership, ACLs
     * are
     *        disabled and no longer affect permissions. Buckets that use this setting only accept PUT requests that don't
     * specify
     *        an ACL or PUT requests that specify bucket owner full control ACLs, such as the bucket-owner-full-control
     * canned ACL
     *        or an equivalent form of this ACL expressed in the XML format. PUT requests that contain other ACLs (for
     * example,
     *        custom grants to certain Amazon Web Services accounts) fail and return a 400 error with the error code
     *        AccessControlListNotSupported. For more information, see Controlling ownership of objects and disabling ACLs
     * in the
     *        Amazon S3 User Guide. This functionality is not supported for directory buckets. This functionality is not
     * supported
     *        for Amazon S3 on Outposts.
     * @param string|StreamInterface|null $body Object data.
     * @param ?string $cacheControl Can be used to specify caching behavior along the request/reply chain. For more
     *        information, see http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.9.
     * @param ?string $contentDisposition Specifies presentational information for the object. For more information, see
     *        https://www.rfc-editor.org/rfc/rfc6266#section-4.
     * @param ?string $contentEncoding Specifies what content encodings have been applied to the object and thus what
     *        decoding mechanisms must be applied to obtain the media-type referenced by the Content-Type header field. For
     * more
     *        information, see https://www.rfc-editor.org/rfc/rfc9110.html#field.content-encoding.
     * @param ?string $contentLanguage The language the content is in.
     * @param ?int $contentLength Size of the body in bytes. This parameter is useful when the size of the body cannot be
     *        determined automatically. For more information, see
     * https://www.rfc-editor.org/rfc/rfc9110.html#name-content-length.
     * @param ?string $contentMD5 The Base64 encoded 128-bit MD5 digest of the message (without the headers) according to
     *        RFC 1864. This header can be used as a message integrity check to verify that the data is the same data that
     * was
     *        originally sent. Although it is optional, we recommend using the Content-MD5 mechanism as an end-to-end
     * integrity
     *        check. For more information about REST request authentication, see REST Authentication. The Content-MD5 or
     *        x-amz-sdk-checksum-algorithm header is required for any request to upload an object with a retention period
     *        configured using Amazon S3 Object Lock. For more information, see Uploading objects to an Object Lock enabled
     * bucket
     *        in the Amazon S3 User Guide. This functionality is not supported for directory buckets.
     * @param ?string $contentType A standard MIME type describing the format of the contents. For more information, see
     *        https://www.rfc-editor.org/rfc/rfc9110.html#name-content-type.
     * @param ?ChecksumAlgorithm $checksumAlgorithm Indicates the algorithm used to create the checksum for the object when
     *        you use the SDK. This header will not provide any additional functionality if you don't use the SDK. When you
     * send
     *        this header, there must be a corresponding x-amz-checksum-algorithm or x-amz-trailer header sent. Otherwise,
     * Amazon
     *        S3 fails the request with the HTTP status code 400 Bad Request. For the x-amz-checksum-algorithm header,
     * replace
     *        algorithm with the supported algorithm from the following list: CRC32 CRC32C CRC64NVME MD5 SHA1 SHA256 SHA512
     * XXHASH3
     *        XXHASH64 XXHASH128 For more information, see Checking object integrity in the Amazon S3 User Guide. If the
     * individual
     *        checksum value you provide through x-amz-checksum-algorithm doesn't match the checksum algorithm you set
     * through
     *        x-amz-sdk-checksum-algorithm, Amazon S3 fails the request with a BadDigest error. The Content-MD5 or
     *        x-amz-sdk-checksum-algorithm header is required for any request to upload an object with a retention period
     *        configured using Amazon S3 Object Lock. For more information, see Uploading objects to an Object Lock enabled
     * bucket
     *        in the Amazon S3 User Guide. For directory buckets, when you use Amazon Web Services SDKs, CRC32 is the
     * default
     *        checksum algorithm that's used for performance.
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
     * @param ?string $expires The date and time at which the object is no longer cacheable. For more information, see
     *        https://www.rfc-editor.org/rfc/rfc7234#section-5.3.
     * @param ?string $ifMatch Uploads the object only if the ETag (entity tag) value provided during the WRITE operation
     *        matches the ETag of the object in S3. If the ETag values do not match, the operation returns a 412
     * Precondition
     *        Failed error. If a conflicting operation occurs during the upload S3 returns a 409 ConditionalRequestConflict
     *        response. On a 409 failure you should fetch the object's ETag and retry the upload. Expects the ETag value as
     * a
     *        string. For more information about conditional requests, see RFC 7232, or Conditional requests in the Amazon
     * S3 User
     *        Guide.
     * @param ?string $ifNoneMatch Uploads the object only if the object key name does not already exist in the bucket
     *        specified. Otherwise, Amazon S3 returns a 412 Precondition Failed error. If a conflicting operation occurs
     * during the
     *        upload S3 returns a 409 ConditionalRequestConflict response. On a 409 failure you should retry the upload.
     * Expects
     *        the '*' (asterisk) character. For more information about conditional requests, see RFC 7232, or Conditional
     * requests
     *        in the Amazon S3 User Guide.
     * @param ?string $grantFullControl Gives the grantee READ, READ_ACP, and WRITE_ACP permissions on the object. This
     *        functionality is not supported for directory buckets. This functionality is not supported for Amazon S3 on
     * Outposts.
     * @param ?string $grantRead Allows grantee to read the object data and its metadata. This functionality is not
     *        supported for directory buckets. This functionality is not supported for Amazon S3 on Outposts.
     * @param ?string $grantReadACP Allows grantee to read the object ACL. This functionality is not supported for directory
     *        buckets. This functionality is not supported for Amazon S3 on Outposts.
     * @param ?string $grantWriteACP Allows grantee to write the ACL for the applicable object. This functionality is not
     *        supported for directory buckets. This functionality is not supported for Amazon S3 on Outposts.
     * @param ?int $writeOffsetBytes Specifies the offset for appending data to existing objects in bytes. The offset must
     *        be equal to the size of the existing object being appended to. If no object exists, setting this header to 0
     * will
     *        create a new object. This functionality is only supported for objects in the Amazon S3 Express One Zone
     * storage class
     *        in directory buckets.
     * @param array<string, string>|null $metadata
     * @param ?ServerSideEncryption $serverSideEncryption The server-side encryption algorithm that was used when you store
     *        this object in Amazon S3 or Amazon FSx. General purpose buckets - You have four mutually exclusive options to
     * protect
     *        data using server-side encryption in Amazon S3, depending on how you choose to manage the encryption keys.
     *        Specifically, the encryption key options are Amazon S3 managed keys (SSE-S3), Amazon Web Services KMS keys
     * (SSE-KMS
     *        or DSSE-KMS), and customer-provided keys (SSE-C). Amazon S3 encrypts data with server-side encryption by using
     * Amazon
     *        S3 managed keys (SSE-S3) by default. You can optionally tell Amazon S3 to encrypt data at rest by using
     * server-side
     *        encryption with other key options. For more information, see Using Server-Side Encryption in the Amazon S3
     * User
     *        Guide. Directory buckets - For directory buckets, there are only two supported options for server-side
     * encryption:
     *        server-side encryption with Amazon S3 managed keys (SSE-S3) (AES256) and server-side encryption with KMS keys
     *        (SSE-KMS) (aws:kms). We recommend that the bucket's default encryption uses the desired encryption
     * configuration and
     *        you don't override the bucket default encryption in your CreateSession requests or PUT object requests. Then,
     * new
     *        objects are automatically encrypted with the desired encryption settings. For more information, see Protecting
     * data
     *        with server-side encryption in the Amazon S3 User Guide. For more information about the encryption overriding
     *        behaviors in directory buckets, see Specifying server-side encryption with KMS for new object uploads. In the
     * Zonal
     *        endpoint API calls (except CopyObject and UploadPartCopy) using the REST API, the encryption request headers
     * must
     *        match the encryption settings that are specified in the CreateSession request. You can't override the values
     * of the
     *        encryption settings (x-amz-server-side-encryption, x-amz-server-side-encryption-aws-kms-key-id,
     *        x-amz-server-side-encryption-context, and x-amz-server-side-encryption-bucket-key-enabled) that are specified
     * in the
     *        CreateSession request. You don't need to explicitly specify these encryption settings values in Zonal endpoint
     * API
     *        calls, and Amazon S3 will use the encryption settings values from the CreateSession request to protect new
     * objects in
     *        the directory bucket. When you use the CLI or the Amazon Web Services SDKs, for CreateSession, the session
     * token
     *        refreshes automatically to avoid service interruptions when a session expires. The CLI or the Amazon Web
     * Services
     *        SDKs use the bucket's default encryption configuration for the CreateSession request. It's not supported to
     * override
     *        the encryption settings values in the CreateSession request. So in the Zonal endpoint API calls (except
     * CopyObject
     *        and UploadPartCopy), the encryption request headers must match the default encryption configuration of the
     * directory
     *        bucket. S3 access points for Amazon FSx - When accessing data stored in Amazon FSx file systems using S3
     * access
     *        points, the only valid server side encryption option is aws:fsx. All Amazon FSx file systems have encryption
     *        configured by default and are encrypted at rest. Data is automatically encrypted before being written to the
     * file
     *        system, and automatically decrypted as it is read. These processes are handled transparently by Amazon FSx.
     * @param ?StorageClass $storageClass By default, Amazon S3 uses the STANDARD Storage Class to store newly created
     *        objects. The STANDARD storage class provides high durability and high availability. Depending on performance
     * needs,
     *        you can specify a different Storage Class. For more information, see Storage Classes in the Amazon S3 User
     * Guide.
     *        Directory buckets only support EXPRESS_ONEZONE (the S3 Express One Zone storage class) in Availability Zones
     * and
     *        ONEZONE_IA (the S3 One Zone-Infrequent Access storage class) in Dedicated Local Zones. Amazon S3 on Outposts
     * only
     *        uses the OUTPOSTS Storage Class.
     * @param ?string $websiteRedirectLocation If the bucket is configured as a website, redirects requests for this object
     *        to another object in the same bucket or to an external URL. Amazon S3 stores the value of this header in the
     * object
     *        metadata. For information about object metadata, see Object Key and Metadata in the Amazon S3 User Guide. In
     * the
     *        following example, the request header sets the redirect to an object (anotherPage.html) in the same bucket:
     *        x-amz-website-redirect-location: /anotherPage.html In the following example, the request header sets the
     * object
     *        redirect to another website: x-amz-website-redirect-location: http://www.example.com/ For more information
     * about
     *        website hosting in Amazon S3, see Hosting Websites on Amazon S3 and How to Configure Website Page Redirects in
     * the
     *        Amazon S3 User Guide. This functionality is not supported for directory buckets.
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
     * @param ?string $sSEKMSKeyId Specifies the KMS key ID (Key ID, Key ARN, or Key Alias) to use for object encryption. If
     *        the KMS key doesn't exist in the same account that's issuing the command, you must use the full Key ARN not
     * the Key
     *        ID. General purpose buckets - If you specify x-amz-server-side-encryption with aws:kms or aws:kms:dsse, this
     * header
     *        specifies the ID (Key ID, Key ARN, or Key Alias) of the KMS key to use. If you specify
     *        x-amz-server-side-encryption:aws:kms or x-amz-server-side-encryption:aws:kms:dsse, but do not provide
     *        x-amz-server-side-encryption-aws-kms-key-id, Amazon S3 uses the Amazon Web Services managed key (aws/s3) to
     * protect
     *        the data. Directory buckets - To encrypt data using SSE-KMS, it's recommended to specify the
     *        x-amz-server-side-encryption header to aws:kms. Then, the x-amz-server-side-encryption-aws-kms-key-id header
     *        implicitly uses the bucket's default KMS customer managed key ID. If you want to explicitly set the
     *        x-amz-server-side-encryption-aws-kms-key-id header, it must match the bucket's default customer managed key
     * (using
     *        key ID or ARN, not alias). Your SSE-KMS configuration can only support 1 customer managed key per directory
     * bucket's
     *        lifetime. The Amazon Web Services managed key (aws/s3) isn't supported. Incorrect key specification results in
     * an
     *        HTTP 400 Bad Request error.
     * @param ?string $sSEKMSEncryptionContext Specifies the Amazon Web Services KMS Encryption Context as an additional
     *        encryption context to use for object encryption. The value of this header is a Base64 encoded string of a
     * UTF-8
     *        encoded JSON, which contains the encryption context as key-value pairs. This value is stored as object
     * metadata and
     *        automatically gets passed on to Amazon Web Services KMS for future GetObject operations on this object.
     * General
     *        purpose buckets - This value must be explicitly added during CopyObject operations if you want an additional
     *        encryption context for your object. For more information, see Encryption context in the Amazon S3 User Guide.
     *        Directory buckets - You can optionally provide an explicit encryption context value. The value must match the
     * default
     *        encryption context - the bucket Amazon Resource Name (ARN). An additional encryption context value is not
     * supported.
     * @param ?bool $bucketKeyEnabled Specifies whether Amazon S3 should use an S3 Bucket Key for object encryption with
     *        server-side encryption using Key Management Service (KMS) keys (SSE-KMS). General purpose buckets - Setting
     * this
     *        header to true causes Amazon S3 to use an S3 Bucket Key for object encryption with SSE-KMS. Also, specifying
     * this
     *        header with a PUT action doesn't affect bucket-level settings for S3 Bucket Key. Directory buckets - S3 Bucket
     * Keys
     *        are always enabled for GET and PUT operations in a directory bucket and can’t be disabled. S3 Bucket Keys
     * aren't
     *        supported, when you copy SSE-KMS encrypted objects from general purpose buckets to directory buckets, from
     * directory
     *        buckets to general purpose buckets, or between directory buckets, through CopyObject, UploadPartCopy, the Copy
     *        operation in Batch Operations, or the import jobs. In this case, Amazon S3 makes a call to KMS every time a
     * copy
     *        request is made for a KMS-encrypted object.
     * @param ?string $tagging The tag-set for the object. The tag-set must be encoded as URL Query parameters. (For
     *        example, "Key1=Value1") This functionality is not supported for directory buckets.
     * @param ?ObjectLockMode $objectLockMode The Object Lock mode that you want to apply to this object. This functionality
     *        is not supported for directory buckets.
     * @param ?float $objectLockRetainUntilDate The date and time when you want this object's Object Lock to expire. Must be
     *        formatted as a timestamp parameter. This functionality is not supported for directory buckets.
     * @param ?ObjectLockLegalHoldStatus $objectLockLegalHoldStatus Specifies whether a legal hold will be applied to this
     *        object. For more information about S3 Object Lock, see Object Lock in the Amazon S3 User Guide. This
     * functionality is
     *        not supported for directory buckets.
     * @param ?ObjectLockEventHold $objectLockEventHold Specifies the event hold status to apply to this object. Set to ON
     *        to enable or OFF to disable. This functionality is not supported for directory buckets.
     * @param ?int $objectLockEventHoldDurationDays Specifies the event hold duration in days to apply to this object. You
     *        cannot specify a duration in both days and years. This functionality is not supported for directory buckets.
     * @param ?int $objectLockEventHoldDurationYears Specifies the event hold duration in years to apply to this object. You
     *        cannot specify a duration in both days and years. This functionality is not supported for directory buckets.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        ObjectCannedACL|string|null $aCL = null,
        public readonly string|StreamInterface|null $body = null,
        public readonly ?string $cacheControl = null,
        public readonly ?string $contentDisposition = null,
        public readonly ?string $contentEncoding = null,
        public readonly ?string $contentLanguage = null,
        public readonly ?int $contentLength = null,
        public readonly ?string $contentMD5 = null,
        public readonly ?string $contentType = null,
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
        public readonly ?string $expires = null,
        public readonly ?string $ifMatch = null,
        public readonly ?string $ifNoneMatch = null,
        public readonly ?string $grantFullControl = null,
        public readonly ?string $grantRead = null,
        public readonly ?string $grantReadACP = null,
        public readonly ?string $grantWriteACP = null,
        public readonly ?int $writeOffsetBytes = null,
        public readonly ?array $metadata = null,
        ServerSideEncryption|string|null $serverSideEncryption = null,
        StorageClass|string|null $storageClass = null,
        public readonly ?string $websiteRedirectLocation = null,
        public readonly ?string $sSECustomerAlgorithm = null,
        /** @sensitive */
        public readonly ?string $sSECustomerKey = null,
        public readonly ?string $sSECustomerKeyMD5 = null,
        /** @sensitive */
        public readonly ?string $sSEKMSKeyId = null,
        /** @sensitive */
        public readonly ?string $sSEKMSEncryptionContext = null,
        public readonly ?bool $bucketKeyEnabled = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $tagging = null,
        ObjectLockMode|string|null $objectLockMode = null,
        public readonly ?float $objectLockRetainUntilDate = null,
        ObjectLockLegalHoldStatus|string|null $objectLockLegalHoldStatus = null,
        ObjectLockEventHold|string|null $objectLockEventHold = null,
        public readonly ?int $objectLockEventHoldDurationDays = null,
        public readonly ?int $objectLockEventHoldDurationYears = null,
        public readonly ?string $expectedBucketOwner = null
    ) {
        $this->aCL = $aCL === null || $aCL instanceof ObjectCannedACL ? $aCL : ObjectCannedACL::fromValue($aCL);
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
        $this->serverSideEncryption = $serverSideEncryption === null || $serverSideEncryption instanceof ServerSideEncryption ? $serverSideEncryption : ServerSideEncryption::fromValue($serverSideEncryption);
        $this->storageClass = $storageClass === null || $storageClass instanceof StorageClass ? $storageClass : StorageClass::fromValue($storageClass);
        $this->requestPayer = $requestPayer === null || $requestPayer instanceof RequestPayer ? $requestPayer : RequestPayer::fromValue($requestPayer);
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
        $s = Schemas::putObjectRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_ACL = $m[2];
        self::$SCHEMA_BODY = $m[3];
        self::$SCHEMA_CACHE_CONTROL = $m[4];
        self::$SCHEMA_CONTENT_DISPOSITION = $m[5];
        self::$SCHEMA_CONTENT_ENCODING = $m[6];
        self::$SCHEMA_CONTENT_LANGUAGE = $m[7];
        self::$SCHEMA_CONTENT_LENGTH = $m[8];
        self::$SCHEMA_CONTENT_MD5 = $m[9];
        self::$SCHEMA_CONTENT_TYPE = $m[10];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[11];
        self::$SCHEMA_CHECKSUM_CRC32 = $m[12];
        self::$SCHEMA_CHECKSUM_CRC32_C = $m[13];
        self::$SCHEMA_CHECKSUM_CRC64_NVME = $m[14];
        self::$SCHEMA_CHECKSUM_SHA1 = $m[15];
        self::$SCHEMA_CHECKSUM_SHA256 = $m[16];
        self::$SCHEMA_CHECKSUM_SHA512 = $m[17];
        self::$SCHEMA_CHECKSUM_MD5 = $m[18];
        self::$SCHEMA_CHECKSUM_XXHASH64 = $m[19];
        self::$SCHEMA_CHECKSUM_XXHASH3 = $m[20];
        self::$SCHEMA_CHECKSUM_XXHASH128 = $m[21];
        self::$SCHEMA_EXPIRES = $m[22];
        self::$SCHEMA_IF_MATCH = $m[23];
        self::$SCHEMA_IF_NONE_MATCH = $m[24];
        self::$SCHEMA_GRANT_FULL_CONTROL = $m[25];
        self::$SCHEMA_GRANT_READ = $m[26];
        self::$SCHEMA_GRANT_READ_ACP = $m[27];
        self::$SCHEMA_GRANT_WRITE_ACP = $m[28];
        self::$SCHEMA_WRITE_OFFSET_BYTES = $m[29];
        self::$SCHEMA_METADATA = $m[30];
        self::$SCHEMA_SERVER_SIDE_ENCRYPTION = $m[31];
        self::$SCHEMA_STORAGE_CLASS = $m[32];
        self::$SCHEMA_WEBSITE_REDIRECT_LOCATION = $m[33];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[34];
        self::$SCHEMA_SSE_CUSTOMER_KEY = $m[35];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[36];
        self::$SCHEMA_SSEKMS_KEY_ID = $m[37];
        self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT = $m[38];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[39];
        self::$SCHEMA_REQUEST_PAYER = $m[40];
        self::$SCHEMA_TAGGING = $m[41];
        self::$SCHEMA_OBJECT_LOCK_MODE = $m[42];
        self::$SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE = $m[43];
        self::$SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS = $m[44];
        self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD = $m[45];
        self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_DAYS = $m[46];
        self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_YEARS = $m[47];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[48];
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
        if (isset($this->aCL)) {
            $serializer->serializeString(self::$SCHEMA_ACL, $this->aCL->value, 2);
        }
        if (isset($this->body)) {
            $serializer->serializeBlob(self::$SCHEMA_BODY, $this->body, 3);
        }
        if (isset($this->cacheControl)) {
            $serializer->serializeString(self::$SCHEMA_CACHE_CONTROL, $this->cacheControl, 4);
        }
        if (isset($this->contentDisposition)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_DISPOSITION, $this->contentDisposition, 5);
        }
        if (isset($this->contentEncoding)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_ENCODING, $this->contentEncoding, 6);
        }
        if (isset($this->contentLanguage)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_LANGUAGE, $this->contentLanguage, 7);
        }
        if (isset($this->contentLength)) {
            $serializer->serializeInteger(self::$SCHEMA_CONTENT_LENGTH, $this->contentLength, 8);
        }
        if (isset($this->contentMD5)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_MD5, $this->contentMD5, 9);
        }
        if (isset($this->contentType)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_TYPE, $this->contentType, 10);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 11);
        }
        if (isset($this->checksumCRC32)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32, $this->checksumCRC32, 12);
        }
        if (isset($this->checksumCRC32C)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC32_C, $this->checksumCRC32C, 13);
        }
        if (isset($this->checksumCRC64NVME)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_CRC64_NVME, $this->checksumCRC64NVME, 14);
        }
        if (isset($this->checksumSHA1)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA1, $this->checksumSHA1, 15);
        }
        if (isset($this->checksumSHA256)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA256, $this->checksumSHA256, 16);
        }
        if (isset($this->checksumSHA512)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_SHA512, $this->checksumSHA512, 17);
        }
        if (isset($this->checksumMD5)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_MD5, $this->checksumMD5, 18);
        }
        if (isset($this->checksumXXHASH64)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH64, $this->checksumXXHASH64, 19);
        }
        if (isset($this->checksumXXHASH3)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH3, $this->checksumXXHASH3, 20);
        }
        if (isset($this->checksumXXHASH128)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_XXHASH128, $this->checksumXXHASH128, 21);
        }
        if (isset($this->expires)) {
            $serializer->serializeString(self::$SCHEMA_EXPIRES, $this->expires, 22);
        }
        if (isset($this->ifMatch)) {
            $serializer->serializeString(self::$SCHEMA_IF_MATCH, $this->ifMatch, 23);
        }
        if (isset($this->ifNoneMatch)) {
            $serializer->serializeString(self::$SCHEMA_IF_NONE_MATCH, $this->ifNoneMatch, 24);
        }
        if (isset($this->grantFullControl)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_FULL_CONTROL, $this->grantFullControl, 25);
        }
        if (isset($this->grantRead)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_READ, $this->grantRead, 26);
        }
        if (isset($this->grantReadACP)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_READ_ACP, $this->grantReadACP, 27);
        }
        if (isset($this->grantWriteACP)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_WRITE_ACP, $this->grantWriteACP, 28);
        }
        if (isset($this->writeOffsetBytes)) {
            $serializer->serializeInteger(self::$SCHEMA_WRITE_OFFSET_BYTES, $this->writeOffsetBytes, 29);
        }
        if (isset($this->metadata)) {
            $serializer->serializeMap(self::$SCHEMA_METADATA, $this->metadata, 30);
        }
        if (isset($this->serverSideEncryption)) {
            $serializer->serializeString(self::$SCHEMA_SERVER_SIDE_ENCRYPTION, $this->serverSideEncryption->value, 31);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 32);
        }
        if (isset($this->websiteRedirectLocation)) {
            $serializer->serializeString(self::$SCHEMA_WEBSITE_REDIRECT_LOCATION, $this->websiteRedirectLocation, 33);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 34);
        }
        if (isset($this->sSECustomerKey)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY, $this->sSECustomerKey, 35);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 36);
        }
        if (isset($this->sSEKMSKeyId)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_KEY_ID, $this->sSEKMSKeyId, 37);
        }
        if (isset($this->sSEKMSEncryptionContext)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT, $this->sSEKMSEncryptionContext, 38);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 39);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 40);
        }
        if (isset($this->tagging)) {
            $serializer->serializeString(self::$SCHEMA_TAGGING, $this->tagging, 41);
        }
        if (isset($this->objectLockMode)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_MODE, $this->objectLockMode->value, 42);
        }
        if (isset($this->objectLockRetainUntilDate)) {
            $serializer->serializeTimestamp(self::$SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE, $this->objectLockRetainUntilDate, 43);
        }
        if (isset($this->objectLockLegalHoldStatus)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS, $this->objectLockLegalHoldStatus->value, 44);
        }
        if (isset($this->objectLockEventHold)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD, $this->objectLockEventHold->value, 45);
        }
        if (isset($this->objectLockEventHoldDurationDays)) {
            $serializer->serializeInteger(self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_DAYS, $this->objectLockEventHoldDurationDays, 46);
        }
        if (isset($this->objectLockEventHoldDurationYears)) {
            $serializer->serializeInteger(self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_YEARS, $this->objectLockEventHoldDurationYears, 47);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 48);
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
            2 => $this->aCL,
            3 => $this->body,
            4 => $this->cacheControl,
            5 => $this->contentDisposition,
            6 => $this->contentEncoding,
            7 => $this->contentLanguage,
            8 => $this->contentLength,
            9 => $this->contentMD5,
            10 => $this->contentType,
            11 => $this->checksumAlgorithm,
            12 => $this->checksumCRC32,
            13 => $this->checksumCRC32C,
            14 => $this->checksumCRC64NVME,
            15 => $this->checksumSHA1,
            16 => $this->checksumSHA256,
            17 => $this->checksumSHA512,
            18 => $this->checksumMD5,
            19 => $this->checksumXXHASH64,
            20 => $this->checksumXXHASH3,
            21 => $this->checksumXXHASH128,
            22 => $this->expires,
            23 => $this->ifMatch,
            24 => $this->ifNoneMatch,
            25 => $this->grantFullControl,
            26 => $this->grantRead,
            27 => $this->grantReadACP,
            28 => $this->grantWriteACP,
            29 => $this->writeOffsetBytes,
            30 => $this->metadata,
            31 => $this->serverSideEncryption,
            32 => $this->storageClass,
            33 => $this->websiteRedirectLocation,
            34 => $this->sSECustomerAlgorithm,
            35 => $this->sSECustomerKey,
            36 => $this->sSECustomerKeyMD5,
            37 => $this->sSEKMSKeyId,
            38 => $this->sSEKMSEncryptionContext,
            39 => $this->bucketKeyEnabled,
            40 => $this->requestPayer,
            41 => $this->tagging,
            42 => $this->objectLockMode,
            43 => $this->objectLockRetainUntilDate,
            44 => $this->objectLockLegalHoldStatus,
            45 => $this->objectLockEventHold,
            46 => $this->objectLockEventHoldDurationDays,
            47 => $this->objectLockEventHoldDurationYears,
            48 => $this->expectedBucketOwner,
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
            $this->aCL,
            $this->body,
            $this->cacheControl,
            $this->contentDisposition,
            $this->contentEncoding,
            $this->contentLanguage,
            $this->contentLength,
            $this->contentMD5,
            $this->contentType,
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
            $this->expires,
            $this->ifMatch,
            $this->ifNoneMatch,
            $this->grantFullControl,
            $this->grantRead,
            $this->grantReadACP,
            $this->grantWriteACP,
            $this->writeOffsetBytes,
            $this->metadata,
            $this->serverSideEncryption,
            $this->storageClass,
            $this->websiteRedirectLocation,
            $this->sSECustomerAlgorithm,
            $this->sSECustomerKey,
            $this->sSECustomerKeyMD5,
            $this->sSEKMSKeyId,
            $this->sSEKMSEncryptionContext,
            $this->bucketKeyEnabled,
            $this->requestPayer,
            $this->tagging,
            $this->objectLockMode,
            $this->objectLockRetainUntilDate,
            $this->objectLockLegalHoldStatus,
            $this->objectLockEventHold,
            $this->objectLockEventHoldDurationDays,
            $this->objectLockEventHoldDurationYears,
            $this->expectedBucketOwner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
