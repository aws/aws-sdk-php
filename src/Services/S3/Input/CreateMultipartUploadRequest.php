<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\ChecksumType;
use Aws\Services\S3\Shape\ObjectCannedACL;
use Aws\Services\S3\Shape\ObjectLockEventHold;
use Aws\Services\S3\Shape\ObjectLockLegalHoldStatus;
use Aws\Services\S3\Shape\ObjectLockMode;
use Aws\Services\S3\Shape\RequestPayer;
use Aws\Services\S3\Shape\ServerSideEncryption;
use Aws\Services\S3\Shape\StorageClass;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

final class CreateMultipartUploadRequest implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CreateMultipartUploadRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_ACL;
    private static Schema $SCHEMA_CACHE_CONTROL;
    private static Schema $SCHEMA_CONTENT_DISPOSITION;
    private static Schema $SCHEMA_CONTENT_ENCODING;
    private static Schema $SCHEMA_CONTENT_LANGUAGE;
    private static Schema $SCHEMA_CONTENT_TYPE;
    private static Schema $SCHEMA_EXPIRES;
    private static Schema $SCHEMA_GRANT_FULL_CONTROL;
    private static Schema $SCHEMA_GRANT_READ;
    private static Schema $SCHEMA_GRANT_READ_ACP;
    private static Schema $SCHEMA_GRANT_WRITE_ACP;
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
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_CHECKSUM_TYPE;

    public readonly ?ObjectCannedACL $aCL;
    public readonly ?ServerSideEncryption $serverSideEncryption;
    public readonly ?StorageClass $storageClass;
    public readonly ?RequestPayer $requestPayer;
    public readonly ?ObjectLockMode $objectLockMode;
    public readonly ?ObjectLockLegalHoldStatus $objectLockLegalHoldStatus;
    public readonly ?ObjectLockEventHold $objectLockEventHold;
    public readonly ?ChecksumAlgorithm $checksumAlgorithm;
    public readonly ?ChecksumType $checksumType;

    /**
     * @param ?string $bucket The name of the bucket where the multipart upload is initiated and where the object is
     *        uploaded. Directory buckets - When you use this operation with a directory bucket, you must use
     * virtual-hosted-style
     *        requests in the format Bucket-name.s3express-zone-id.region-code.amazonaws.com. Path-style requests are not
     *        supported. Directory bucket names must be unique in the chosen Zone (Availability Zone or Local Zone). Bucket
     * names
     *        must follow the format bucket-base-name--zone-id--x-s3 (for example, amzn-s3-demo-bucket--usw2-az1--x-s3). For
     *        information about bucket naming restrictions, see Directory bucket naming rules in the Amazon S3 User Guide.
     * Access
     *        points - When you use this action with an access point for general purpose buckets, you must provide the alias
     * of the
     *        access point in place of the bucket name or specify the access point ARN. When you use this action with an
     * access
     *        point for directory buckets, you must provide the access point name in place of the bucket name. When using
     * the
     *        access point ARN, you must direct requests to the access point hostname. The access point hostname takes the
     * form
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
     * @param ?string $key Object key for which the multipart upload is to be initiated.
     * @param ?ObjectCannedACL $aCL The canned ACL to apply to the object. Amazon S3 supports a set of predefined ACLs,
     *        known as canned ACLs. Each canned ACL has a predefined set of grantees and permissions. For more information,
     * see
     *        Canned ACL in the Amazon S3 User Guide. By default, all objects are private. Only the owner has full access
     * control.
     *        When uploading an object, you can grant access permissions to individual Amazon Web Services accounts or to
     *        predefined groups defined by Amazon S3. These permissions are then added to the access control list (ACL) on
     * the new
     *        object. For more information, see Using ACLs. One way to grant the permissions using the request headers is to
     *        specify a canned ACL with the x-amz-acl request header. This functionality is not supported for directory
     * buckets.
     *        This functionality is not supported for Amazon S3 on Outposts.
     * @param ?string $cacheControl Specifies caching behavior along the request/reply chain.
     * @param ?string $contentDisposition Specifies presentational information for the object.
     * @param ?string $contentEncoding Specifies what content encodings have been applied to the object and thus what
     *        decoding mechanisms must be applied to obtain the media-type referenced by the Content-Type header field. For
     *        directory buckets, only the aws-chunked value is supported in this header field.
     * @param ?string $contentLanguage The language that the content is in.
     * @param ?string $contentType A standard MIME type describing the format of the object data.
     * @param ?string $expires The date and time at which the object is no longer cacheable.
     * @param ?string $grantFullControl Specify access permissions explicitly to give the grantee READ, READ_ACP, and
     *        WRITE_ACP permissions on the object. By default, all objects are private. Only the owner has full access
     * control.
     *        When uploading an object, you can use this header to explicitly grant access permissions to specific Amazon
     * Web
     *        Services accounts or groups. This header maps to specific permissions that Amazon S3 supports in an ACL. For
     * more
     *        information, see Access Control List (ACL) Overview in the Amazon S3 User Guide. You specify each grantee as a
     *        type=value pair, where the type is one of the following: id – if the value specified is the canonical user
     * ID of an
     *        Amazon Web Services account uri – if you are granting permissions to a predefined group emailAddress – if
     * the
     *        value specified is the email address of an Amazon Web Services account Using email addresses to specify a
     * grantee is
     *        only supported in the following Amazon Web Services Regions: US East (N. Virginia) US West (N. California) US
     * West
     *        (Oregon) Asia Pacific (Singapore) Asia Pacific (Sydney) Asia Pacific (Tokyo) Europe (Ireland) South America
     * (São
     *        Paulo) For a list of all the Amazon S3 supported Regions and endpoints, see Regions and Endpoints in the
     * Amazon Web
     *        Services General Reference. For example, the following x-amz-grant-read header grants the Amazon Web Services
     *        accounts identified by account IDs permissions to read object data and its metadata: x-amz-grant-read:
     *        id="11112222333", id="444455556666" This functionality is not supported for directory buckets. This
     * functionality is
     *        not supported for Amazon S3 on Outposts.
     * @param ?string $grantRead Specify access permissions explicitly to allow grantee to read the object data and its
     *        metadata. By default, all objects are private. Only the owner has full access control. When uploading an
     * object, you
     *        can use this header to explicitly grant access permissions to specific Amazon Web Services accounts or groups.
     * This
     *        header maps to specific permissions that Amazon S3 supports in an ACL. For more information, see Access
     * Control List
     *        (ACL) Overview in the Amazon S3 User Guide. You specify each grantee as a type=value pair, where the type is
     * one of
     *        the following: id – if the value specified is the canonical user ID of an Amazon Web Services account uri
     * – if
     *        you are granting permissions to a predefined group emailAddress – if the value specified is the email
     * address of an
     *        Amazon Web Services account Using email addresses to specify a grantee is only supported in the following
     * Amazon Web
     *        Services Regions: US East (N. Virginia) US West (N. California) US West (Oregon) Asia Pacific (Singapore) Asia
     *        Pacific (Sydney) Asia Pacific (Tokyo) Europe (Ireland) South America (São Paulo) For a list of all the Amazon
     * S3
     *        supported Regions and endpoints, see Regions and Endpoints in the Amazon Web Services General Reference. For
     * example,
     *        the following x-amz-grant-read header grants the Amazon Web Services accounts identified by account IDs
     * permissions
     *        to read object data and its metadata: x-amz-grant-read: id="11112222333", id="444455556666" This functionality
     * is not
     *        supported for directory buckets. This functionality is not supported for Amazon S3 on Outposts.
     * @param ?string $grantReadACP Specify access permissions explicitly to allows grantee to read the object ACL. By
     *        default, all objects are private. Only the owner has full access control. When uploading an object, you can
     * use this
     *        header to explicitly grant access permissions to specific Amazon Web Services accounts or groups. This header
     * maps to
     *        specific permissions that Amazon S3 supports in an ACL. For more information, see Access Control List (ACL)
     * Overview
     *        in the Amazon S3 User Guide. You specify each grantee as a type=value pair, where the type is one of the
     * following:
     *        id – if the value specified is the canonical user ID of an Amazon Web Services account uri – if you are
     * granting
     *        permissions to a predefined group emailAddress – if the value specified is the email address of an Amazon
     * Web
     *        Services account Using email addresses to specify a grantee is only supported in the following Amazon Web
     * Services
     *        Regions: US East (N. Virginia) US West (N. California) US West (Oregon) Asia Pacific (Singapore) Asia Pacific
     *        (Sydney) Asia Pacific (Tokyo) Europe (Ireland) South America (São Paulo) For a list of all the Amazon S3
     * supported
     *        Regions and endpoints, see Regions and Endpoints in the Amazon Web Services General Reference. For example,
     * the
     *        following x-amz-grant-read header grants the Amazon Web Services accounts identified by account IDs
     * permissions to
     *        read object data and its metadata: x-amz-grant-read: id="11112222333", id="444455556666" This functionality is
     * not
     *        supported for directory buckets. This functionality is not supported for Amazon S3 on Outposts.
     * @param ?string $grantWriteACP Specify access permissions explicitly to allows grantee to allow grantee to write the
     *        ACL for the applicable object. By default, all objects are private. Only the owner has full access control.
     * When
     *        uploading an object, you can use this header to explicitly grant access permissions to specific Amazon Web
     * Services
     *        accounts or groups. This header maps to specific permissions that Amazon S3 supports in an ACL. For more
     * information,
     *        see Access Control List (ACL) Overview in the Amazon S3 User Guide. You specify each grantee as a type=value
     * pair,
     *        where the type is one of the following: id – if the value specified is the canonical user ID of an Amazon
     * Web
     *        Services account uri – if you are granting permissions to a predefined group emailAddress – if the value
     *        specified is the email address of an Amazon Web Services account Using email addresses to specify a grantee is
     * only
     *        supported in the following Amazon Web Services Regions: US East (N. Virginia) US West (N. California) US West
     *        (Oregon) Asia Pacific (Singapore) Asia Pacific (Sydney) Asia Pacific (Tokyo) Europe (Ireland) South America
     * (São
     *        Paulo) For a list of all the Amazon S3 supported Regions and endpoints, see Regions and Endpoints in the
     * Amazon Web
     *        Services General Reference. For example, the following x-amz-grant-read header grants the Amazon Web Services
     *        accounts identified by account IDs permissions to read object data and its metadata: x-amz-grant-read:
     *        id="11112222333", id="444455556666" This functionality is not supported for directory buckets. This
     * functionality is
     *        not supported for Amazon S3 on Outposts.
     * @param array<string, string>|null $metadata
     * @param ?ServerSideEncryption $serverSideEncryption The server-side encryption algorithm used when you store this
     *        object in Amazon S3 or Amazon FSx. Directory buckets - For directory buckets, there are only two supported
     * options
     *        for server-side encryption: server-side encryption with Amazon S3 managed keys (SSE-S3) (AES256) and
     * server-side
     *        encryption with KMS keys (SSE-KMS) (aws:kms). We recommend that the bucket's default encryption uses the
     * desired
     *        encryption configuration and you don't override the bucket default encryption in your CreateSession requests
     * or PUT
     *        object requests. Then, new objects are automatically encrypted with the desired encryption settings. For more
     *        information, see Protecting data with server-side encryption in the Amazon S3 User Guide. For more information
     * about
     *        the encryption overriding behaviors in directory buckets, see Specifying server-side encryption with KMS for
     * new
     *        object uploads. In the Zonal endpoint API calls (except CopyObject and UploadPartCopy) using the REST API, the
     *        encryption request headers must match the encryption settings that are specified in the CreateSession request.
     * You
     *        can't override the values of the encryption settings (x-amz-server-side-encryption,
     *        x-amz-server-side-encryption-aws-kms-key-id, x-amz-server-side-encryption-context, and
     *        x-amz-server-side-encryption-bucket-key-enabled) that are specified in the CreateSession request. You don't
     * need to
     *        explicitly specify these encryption settings values in Zonal endpoint API calls, and Amazon S3 will use the
     *        encryption settings values from the CreateSession request to protect new objects in the directory bucket. When
     * you
     *        use the CLI or the Amazon Web Services SDKs, for CreateSession, the session token refreshes automatically to
     * avoid
     *        service interruptions when a session expires. The CLI or the Amazon Web Services SDKs use the bucket's default
     *        encryption configuration for the CreateSession request. It's not supported to override the encryption settings
     * values
     *        in the CreateSession request. So in the Zonal endpoint API calls (except CopyObject and UploadPartCopy), the
     *        encryption request headers must match the default encryption configuration of the directory bucket. S3 access
     * points
     *        for Amazon FSx - When accessing data stored in Amazon FSx file systems using S3 access points, the only valid
     * server
     *        side encryption option is aws:fsx. All Amazon FSx file systems have encryption configured by default and are
     *        encrypted at rest. Data is automatically encrypted before being written to the file system, and automatically
     *        decrypted as it is read. These processes are handled transparently by Amazon FSx.
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
     *        metadata. This functionality is not supported for directory buckets.
     * @param ?string $sSECustomerAlgorithm Specifies the algorithm to use when encrypting the object (for example, AES256).
     *        This functionality is not supported for directory buckets.
     * @param ?string $sSECustomerKey Specifies the customer-provided encryption key for Amazon S3 to use in encrypting
     *        data. This value is used to store the object and then it is discarded; Amazon S3 does not store the encryption
     * key.
     *        The key must be appropriate for use with the algorithm specified in the
     *        x-amz-server-side-encryption-customer-algorithm header. This functionality is not supported for directory
     * buckets.
     * @param ?string $sSECustomerKeyMD5 Specifies the 128-bit MD5 digest of the customer-provided encryption key according
     *        to RFC 1321. Amazon S3 uses this header for a message integrity check to ensure that the encryption key was
     *        transmitted without error. This functionality is not supported for directory buckets.
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
     * @param ?string $sSEKMSEncryptionContext Specifies the Amazon Web Services KMS Encryption Context to use for object
     *        encryption. The value of this header is a Base64 encoded string of a UTF-8 encoded JSON, which contains the
     *        encryption context as key-value pairs. Directory buckets - You can optionally provide an explicit encryption
     * context
     *        value. The value must match the default encryption context - the bucket Amazon Resource Name (ARN). An
     * additional
     *        encryption context value is not supported.
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
     * @param ?string $tagging The tag-set for the object. The tag-set must be encoded as URL Query parameters. This
     *        functionality is not supported for directory buckets.
     * @param ?ObjectLockMode $objectLockMode Specifies the Object Lock mode that you want to apply to the uploaded object.
     *        This functionality is not supported for directory buckets.
     * @param ?float $objectLockRetainUntilDate Specifies the date and time when you want the Object Lock to expire. This
     *        functionality is not supported for directory buckets.
     * @param ?ObjectLockLegalHoldStatus $objectLockLegalHoldStatus Specifies whether you want to apply a legal hold to the
     *        uploaded object. This functionality is not supported for directory buckets.
     * @param ?ObjectLockEventHold $objectLockEventHold Specifies the event hold status to apply to the uploaded object. Set
     *        to ON to enable or OFF to disable. This functionality is not supported for directory buckets.
     * @param ?int $objectLockEventHoldDurationDays Specifies the event hold duration in days to apply to the uploaded
     *        object. You cannot specify a duration in both days and years. This functionality is not supported for
     * directory
     *        buckets.
     * @param ?int $objectLockEventHoldDurationYears Specifies the event hold duration in years to apply to the uploaded
     *        object. You cannot specify a duration in both days and years. This functionality is not supported for
     * directory
     *        buckets.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     * @param ?ChecksumAlgorithm $checksumAlgorithm Indicates the algorithm that you want Amazon S3 to use to create the
     *        checksum for the object. For more information, see Checking object integrity in the Amazon S3 User Guide.
     * @param ?ChecksumType $checksumType Indicates the checksum type that you want Amazon S3 to use to calculate the
     *        object’s checksum value. For more information, see Checking object integrity in the Amazon S3 User Guide.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?string $key = null,
        ObjectCannedACL|string|null $aCL = null,
        public readonly ?string $cacheControl = null,
        public readonly ?string $contentDisposition = null,
        public readonly ?string $contentEncoding = null,
        public readonly ?string $contentLanguage = null,
        public readonly ?string $contentType = null,
        public readonly ?string $expires = null,
        public readonly ?string $grantFullControl = null,
        public readonly ?string $grantRead = null,
        public readonly ?string $grantReadACP = null,
        public readonly ?string $grantWriteACP = null,
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
        public readonly ?string $expectedBucketOwner = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null,
        ChecksumType|string|null $checksumType = null
    ) {
        $this->aCL = $aCL === null || $aCL instanceof ObjectCannedACL ? $aCL : ObjectCannedACL::fromValue($aCL);
        $this->serverSideEncryption = $serverSideEncryption === null || $serverSideEncryption instanceof ServerSideEncryption ? $serverSideEncryption : ServerSideEncryption::fromValue($serverSideEncryption);
        $this->storageClass = $storageClass === null || $storageClass instanceof StorageClass ? $storageClass : StorageClass::fromValue($storageClass);
        $this->requestPayer = $requestPayer === null || $requestPayer instanceof RequestPayer ? $requestPayer : RequestPayer::fromValue($requestPayer);
        $this->objectLockMode = $objectLockMode === null || $objectLockMode instanceof ObjectLockMode ? $objectLockMode : ObjectLockMode::fromValue($objectLockMode);
        $this->objectLockLegalHoldStatus = $objectLockLegalHoldStatus === null || $objectLockLegalHoldStatus instanceof ObjectLockLegalHoldStatus ? $objectLockLegalHoldStatus : ObjectLockLegalHoldStatus::fromValue($objectLockLegalHoldStatus);
        $this->objectLockEventHold = $objectLockEventHold === null || $objectLockEventHold instanceof ObjectLockEventHold ? $objectLockEventHold : ObjectLockEventHold::fromValue($objectLockEventHold);
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
        $this->checksumType = $checksumType === null || $checksumType instanceof ChecksumType ? $checksumType : ChecksumType::fromValue($checksumType);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::createMultipartUploadRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_KEY = $m[1];
        self::$SCHEMA_ACL = $m[2];
        self::$SCHEMA_CACHE_CONTROL = $m[3];
        self::$SCHEMA_CONTENT_DISPOSITION = $m[4];
        self::$SCHEMA_CONTENT_ENCODING = $m[5];
        self::$SCHEMA_CONTENT_LANGUAGE = $m[6];
        self::$SCHEMA_CONTENT_TYPE = $m[7];
        self::$SCHEMA_EXPIRES = $m[8];
        self::$SCHEMA_GRANT_FULL_CONTROL = $m[9];
        self::$SCHEMA_GRANT_READ = $m[10];
        self::$SCHEMA_GRANT_READ_ACP = $m[11];
        self::$SCHEMA_GRANT_WRITE_ACP = $m[12];
        self::$SCHEMA_METADATA = $m[13];
        self::$SCHEMA_SERVER_SIDE_ENCRYPTION = $m[14];
        self::$SCHEMA_STORAGE_CLASS = $m[15];
        self::$SCHEMA_WEBSITE_REDIRECT_LOCATION = $m[16];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[17];
        self::$SCHEMA_SSE_CUSTOMER_KEY = $m[18];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[19];
        self::$SCHEMA_SSEKMS_KEY_ID = $m[20];
        self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT = $m[21];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[22];
        self::$SCHEMA_REQUEST_PAYER = $m[23];
        self::$SCHEMA_TAGGING = $m[24];
        self::$SCHEMA_OBJECT_LOCK_MODE = $m[25];
        self::$SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE = $m[26];
        self::$SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS = $m[27];
        self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD = $m[28];
        self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_DAYS = $m[29];
        self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_YEARS = $m[30];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[31];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[32];
        self::$SCHEMA_CHECKSUM_TYPE = $m[33];
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
        if (isset($this->cacheControl)) {
            $serializer->serializeString(self::$SCHEMA_CACHE_CONTROL, $this->cacheControl, 3);
        }
        if (isset($this->contentDisposition)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_DISPOSITION, $this->contentDisposition, 4);
        }
        if (isset($this->contentEncoding)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_ENCODING, $this->contentEncoding, 5);
        }
        if (isset($this->contentLanguage)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_LANGUAGE, $this->contentLanguage, 6);
        }
        if (isset($this->contentType)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_TYPE, $this->contentType, 7);
        }
        if (isset($this->expires)) {
            $serializer->serializeString(self::$SCHEMA_EXPIRES, $this->expires, 8);
        }
        if (isset($this->grantFullControl)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_FULL_CONTROL, $this->grantFullControl, 9);
        }
        if (isset($this->grantRead)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_READ, $this->grantRead, 10);
        }
        if (isset($this->grantReadACP)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_READ_ACP, $this->grantReadACP, 11);
        }
        if (isset($this->grantWriteACP)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_WRITE_ACP, $this->grantWriteACP, 12);
        }
        if (isset($this->metadata)) {
            $serializer->serializeMap(self::$SCHEMA_METADATA, $this->metadata, 13);
        }
        if (isset($this->serverSideEncryption)) {
            $serializer->serializeString(self::$SCHEMA_SERVER_SIDE_ENCRYPTION, $this->serverSideEncryption->value, 14);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 15);
        }
        if (isset($this->websiteRedirectLocation)) {
            $serializer->serializeString(self::$SCHEMA_WEBSITE_REDIRECT_LOCATION, $this->websiteRedirectLocation, 16);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 17);
        }
        if (isset($this->sSECustomerKey)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY, $this->sSECustomerKey, 18);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 19);
        }
        if (isset($this->sSEKMSKeyId)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_KEY_ID, $this->sSEKMSKeyId, 20);
        }
        if (isset($this->sSEKMSEncryptionContext)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT, $this->sSEKMSEncryptionContext, 21);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 22);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 23);
        }
        if (isset($this->tagging)) {
            $serializer->serializeString(self::$SCHEMA_TAGGING, $this->tagging, 24);
        }
        if (isset($this->objectLockMode)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_MODE, $this->objectLockMode->value, 25);
        }
        if (isset($this->objectLockRetainUntilDate)) {
            $serializer->serializeTimestamp(self::$SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE, $this->objectLockRetainUntilDate, 26);
        }
        if (isset($this->objectLockLegalHoldStatus)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS, $this->objectLockLegalHoldStatus->value, 27);
        }
        if (isset($this->objectLockEventHold)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD, $this->objectLockEventHold->value, 28);
        }
        if (isset($this->objectLockEventHoldDurationDays)) {
            $serializer->serializeInteger(self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_DAYS, $this->objectLockEventHoldDurationDays, 29);
        }
        if (isset($this->objectLockEventHoldDurationYears)) {
            $serializer->serializeInteger(self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_YEARS, $this->objectLockEventHoldDurationYears, 30);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 31);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 32);
        }
        if (isset($this->checksumType)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_TYPE, $this->checksumType->value, 33);
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
            3 => $this->cacheControl,
            4 => $this->contentDisposition,
            5 => $this->contentEncoding,
            6 => $this->contentLanguage,
            7 => $this->contentType,
            8 => $this->expires,
            9 => $this->grantFullControl,
            10 => $this->grantRead,
            11 => $this->grantReadACP,
            12 => $this->grantWriteACP,
            13 => $this->metadata,
            14 => $this->serverSideEncryption,
            15 => $this->storageClass,
            16 => $this->websiteRedirectLocation,
            17 => $this->sSECustomerAlgorithm,
            18 => $this->sSECustomerKey,
            19 => $this->sSECustomerKeyMD5,
            20 => $this->sSEKMSKeyId,
            21 => $this->sSEKMSEncryptionContext,
            22 => $this->bucketKeyEnabled,
            23 => $this->requestPayer,
            24 => $this->tagging,
            25 => $this->objectLockMode,
            26 => $this->objectLockRetainUntilDate,
            27 => $this->objectLockLegalHoldStatus,
            28 => $this->objectLockEventHold,
            29 => $this->objectLockEventHoldDurationDays,
            30 => $this->objectLockEventHoldDurationYears,
            31 => $this->expectedBucketOwner,
            32 => $this->checksumAlgorithm,
            33 => $this->checksumType,
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
            $this->cacheControl,
            $this->contentDisposition,
            $this->contentEncoding,
            $this->contentLanguage,
            $this->contentType,
            $this->expires,
            $this->grantFullControl,
            $this->grantRead,
            $this->grantReadACP,
            $this->grantWriteACP,
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
            $this->expectedBucketOwner,
            $this->checksumAlgorithm,
            $this->checksumType
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
