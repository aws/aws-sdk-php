<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\AnnotationDirective;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\MetadataDirective;
use Aws\Services\S3\Shape\ObjectCannedACL;
use Aws\Services\S3\Shape\ObjectLockEventHold;
use Aws\Services\S3\Shape\ObjectLockLegalHoldStatus;
use Aws\Services\S3\Shape\ObjectLockMode;
use Aws\Services\S3\Shape\RequestPayer;
use Aws\Services\S3\Shape\ServerSideEncryption;
use Aws\Services\S3\Shape\StorageClass;
use Aws\Services\S3\Shape\TaggingDirective;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

final class CopyObjectRequest implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CopyObjectRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_COPY_SOURCE;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_ACL;
    private static Schema $SCHEMA_CACHE_CONTROL;
    private static Schema $SCHEMA_CHECKSUM_ALGORITHM;
    private static Schema $SCHEMA_CONTENT_DISPOSITION;
    private static Schema $SCHEMA_CONTENT_ENCODING;
    private static Schema $SCHEMA_CONTENT_LANGUAGE;
    private static Schema $SCHEMA_CONTENT_TYPE;
    private static Schema $SCHEMA_COPY_SOURCE_IF_MATCH;
    private static Schema $SCHEMA_COPY_SOURCE_IF_MODIFIED_SINCE;
    private static Schema $SCHEMA_COPY_SOURCE_IF_NONE_MATCH;
    private static Schema $SCHEMA_COPY_SOURCE_IF_UNMODIFIED_SINCE;
    private static Schema $SCHEMA_EXPIRES;
    private static Schema $SCHEMA_GRANT_FULL_CONTROL;
    private static Schema $SCHEMA_GRANT_READ;
    private static Schema $SCHEMA_GRANT_READ_ACP;
    private static Schema $SCHEMA_GRANT_WRITE_ACP;
    private static Schema $SCHEMA_IF_MATCH;
    private static Schema $SCHEMA_IF_NONE_MATCH;
    private static Schema $SCHEMA_METADATA;
    private static Schema $SCHEMA_METADATA_DIRECTIVE;
    private static Schema $SCHEMA_TAGGING_DIRECTIVE;
    private static Schema $SCHEMA_ANNOTATION_DIRECTIVE;
    private static Schema $SCHEMA_SERVER_SIDE_ENCRYPTION;
    private static Schema $SCHEMA_STORAGE_CLASS;
    private static Schema $SCHEMA_WEBSITE_REDIRECT_LOCATION;
    private static Schema $SCHEMA_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY;
    private static Schema $SCHEMA_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_SSEKMS_KEY_ID;
    private static Schema $SCHEMA_SSEKMS_ENCRYPTION_CONTEXT;
    private static Schema $SCHEMA_BUCKET_KEY_ENABLED;
    private static Schema $SCHEMA_COPY_SOURCE_SSE_CUSTOMER_ALGORITHM;
    private static Schema $SCHEMA_COPY_SOURCE_SSE_CUSTOMER_KEY;
    private static Schema $SCHEMA_COPY_SOURCE_SSE_CUSTOMER_KEY_MD5;
    private static Schema $SCHEMA_REQUEST_PAYER;
    private static Schema $SCHEMA_TAGGING;
    private static Schema $SCHEMA_OBJECT_LOCK_MODE;
    private static Schema $SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE;
    private static Schema $SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS;
    private static Schema $SCHEMA_OBJECT_LOCK_EVENT_HOLD;
    private static Schema $SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_DAYS;
    private static Schema $SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_YEARS;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_EXPECTED_SOURCE_BUCKET_OWNER;

    public readonly ?ObjectCannedACL $aCL;
    public readonly ?ChecksumAlgorithm $checksumAlgorithm;
    public readonly ?MetadataDirective $metadataDirective;
    public readonly ?TaggingDirective $taggingDirective;
    public readonly ?AnnotationDirective $annotationDirective;
    public readonly ?ServerSideEncryption $serverSideEncryption;
    public readonly ?StorageClass $storageClass;
    public readonly ?RequestPayer $requestPayer;
    public readonly ?ObjectLockMode $objectLockMode;
    public readonly ?ObjectLockLegalHoldStatus $objectLockLegalHoldStatus;
    public readonly ?ObjectLockEventHold $objectLockEventHold;

    /**
     * @param ?string $bucket The name of the destination bucket. Directory buckets - When you use this operation with a
     *        directory bucket, you must use virtual-hosted-style requests in the format
     *        Bucket-name.s3express-zone-id.region-code.amazonaws.com. Path-style requests are not supported. Directory
     * bucket
     *        names must be unique in the chosen Zone (Availability Zone or Local Zone). Bucket names must follow the format
     *        bucket-base-name--zone-id--x-s3 (for example, amzn-s3-demo-bucket--usw2-az1--x-s3). For information about
     * bucket
     *        naming restrictions, see Directory bucket naming rules in the Amazon S3 User Guide. Copying objects across
     * different
     *        Amazon Web Services Regions isn't supported when the source or destination bucket is in Amazon Web Services
     * Local
     *        Zones. The source and destination buckets must have the same parent Amazon Web Services Region. Otherwise, you
     * get an
     *        HTTP 400 Bad Request error with the error code InvalidRequest. Access points - When you use this action with
     * an
     *        access point for general purpose buckets, you must provide the alias of the access point in place of the
     * bucket name
     *        or specify the access point ARN. When you use this action with an access point for directory buckets, you must
     *        provide the access point name in place of the bucket name. When using the access point ARN, you must direct
     * requests
     *        to the access point hostname. The access point hostname takes the form
     *        AccessPointName-AccountId.s3-accesspoint.Region.amazonaws.com. When using this action with an access point
     * through
     *        the Amazon Web Services SDKs, you provide the access point ARN in place of the bucket name. For more
     * information
     *        about access point ARNs, see Using access points in the Amazon S3 User Guide. Object Lambda access points are
     * not
     *        supported by directory buckets. S3 on Outposts - When you use this action with S3 on Outposts, you must use
     * the
     *        Outpost bucket access point ARN or the access point alias for the destination bucket. You can only copy
     * objects
     *        within the same Outpost bucket. It's not supported to copy objects across different Amazon Web Services
     * Outposts,
     *        between buckets on the same Outposts, or between Outposts buckets and any other bucket types. For more
     * information
     *        about S3 on Outposts, see What is S3 on Outposts? in the S3 on Outposts guide. When you use this action with
     * S3 on
     *        Outposts through the REST API, you must direct requests to the S3 on Outposts hostname, in the format
     *        AccessPointName-AccountId.outpostID.s3-outposts.Region.amazonaws.com. The hostname isn't required when you use
     * the
     *        Amazon Web Services CLI or SDKs.
     * @param ?string $copySource Specifies the source object for the copy operation. The source object can be up to 5 GB.
     *        If the source object is an object that was uploaded by using a multipart upload, the object copy will be a
     * single
     *        part object after the source object is copied to the destination bucket. You specify the value of the copy
     * source in
     *        one of two formats, depending on whether you want to access the source object through an access point: For
     * objects
     *        not accessed through an access point, specify the name of the source bucket and the key of the source object,
     *        separated by a slash (/). For example, to copy the object reports/january.pdf from the general purpose bucket
     *        awsexamplebucket, use awsexamplebucket/reports/january.pdf. The value must be URL-encoded. To copy the object
     *        reports/january.pdf from the directory bucket awsexamplebucket--use1-az5--x-s3, use
     *        awsexamplebucket--use1-az5--x-s3/reports/january.pdf. The value must be URL-encoded. For objects accessed
     * through
     *        access points, specify the Amazon Resource Name (ARN) of the object as accessed through the access point, in
     * the
     *        format arn:aws:s3:::accesspoint//object/. For example, to copy the object reports/january.pdf through access
     * point
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
     *        URL-encoded. If your source bucket versioning is enabled, the x-amz-copy-source header by default identifies
     * the
     *        current version of an object to copy. If the current version is a delete marker, Amazon S3 behaves as if the
     * object
     *        was deleted. To copy a different version, use the versionId query parameter. Specifically, append ?versionId=
     * to the
     *        value (for example, awsexamplebucket/reports/january.pdf?versionId=QUpfdndhfd8438MNFDN93jdnJFkdmqnh893). If
     * you don't
     *        specify a version ID, Amazon S3 copies the latest version of the source object. If you enable versioning on
     * the
     *        destination bucket, Amazon S3 generates a unique version ID for the copied object. This version ID is
     * different from
     *        the version ID of the source object. Amazon S3 returns the version ID of the copied object in the
     * x-amz-version-id
     *        response header in the response. If you do not enable versioning or suspend it on the destination bucket, the
     * version
     *        ID that Amazon S3 generates in the x-amz-version-id response header is always null. Directory buckets - S3
     * Versioning
     *        isn't enabled and supported for directory buckets.
     * @param ?string $key The key of the destination object.
     * @param ?ObjectCannedACL $aCL The canned access control list (ACL) to apply to the object. When you copy an object,
     *        the ACL metadata is not preserved and is set to private by default. Only the owner has full access control. To
     *        override the default ACL setting, specify a new ACL when you generate a copy request. For more information,
     * see Using
     *        ACLs. If the destination bucket that you're copying objects to uses the bucket owner enforced setting for S3
     * Object
     *        Ownership, ACLs are disabled and no longer affect permissions. Buckets that use this setting only accept PUT
     * requests
     *        that don't specify an ACL or PUT requests that specify bucket owner full control ACLs, such as the
     *        bucket-owner-full-control canned ACL or an equivalent form of this ACL expressed in the XML format. For more
     *        information, see Controlling ownership of objects and disabling ACLs in the Amazon S3 User Guide. If your
     * destination
     *        bucket uses the bucket owner enforced setting for Object Ownership, all objects written to the bucket by any
     * account
     *        will be owned by the bucket owner. This functionality is not supported for directory buckets. This
     * functionality is
     *        not supported for Amazon S3 on Outposts.
     * @param ?string $cacheControl Specifies the caching behavior along the request/reply chain.
     * @param ?ChecksumAlgorithm $checksumAlgorithm Indicates the algorithm that you want Amazon S3 to use to create the
     *        checksum for the object. For more information, see Checking object integrity in the Amazon S3 User Guide. When
     * you
     *        copy an object, if the source object has a checksum, that checksum value will be copied to the new object by
     * default.
     *        If the CopyObject request does not include this x-amz-checksum-algorithm header, the checksum algorithm will
     * be
     *        copied from the source object to the destination object (if it's present on the source object). You can
     * optionally
     *        specify a different checksum algorithm to use with the x-amz-checksum-algorithm header. Unrecognized or
     * unsupported
     *        values will respond with the HTTP status code 400 Bad Request. For directory buckets, when you use Amazon Web
     *        Services SDKs, CRC32 is the default checksum algorithm that's used for performance.
     * @param ?string $contentDisposition Specifies presentational information for the object. Indicates whether an object
     *        should be displayed in a web browser or downloaded as a file. It allows specifying the desired filename for
     * the
     *        downloaded file.
     * @param ?string $contentEncoding Specifies what content encodings have been applied to the object and thus what
     *        decoding mechanisms must be applied to obtain the media-type referenced by the Content-Type header field. For
     *        directory buckets, only the aws-chunked value is supported in this header field.
     * @param ?string $contentLanguage The language the content is in.
     * @param ?string $contentType A standard MIME type that describes the format of the object data.
     * @param ?string $copySourceIfMatch Copies the object if its entity tag (ETag) matches the specified tag. If both the
     *        x-amz-copy-source-if-match and x-amz-copy-source-if-unmodified-since headers are present in the request and
     * evaluate
     *        as follows, Amazon S3 returns 200 OK and copies the data: x-amz-copy-source-if-match condition evaluates to
     * true
     *        x-amz-copy-source-if-unmodified-since condition evaluates to false
     * @param ?float $copySourceIfModifiedSince Copies the object if it has been modified since the specified time. If both
     *        the x-amz-copy-source-if-none-match and x-amz-copy-source-if-modified-since headers are present in the request
     * and
     *        evaluate as follows, Amazon S3 returns the 412 Precondition Failed response code:
     * x-amz-copy-source-if-none-match
     *        condition evaluates to false x-amz-copy-source-if-modified-since condition evaluates to true
     * @param ?string $copySourceIfNoneMatch Copies the object if its entity tag (ETag) is different than the specified
     *        ETag. If both the x-amz-copy-source-if-none-match and x-amz-copy-source-if-modified-since headers are present
     * in the
     *        request and evaluate as follows, Amazon S3 returns the 412 Precondition Failed response code:
     *        x-amz-copy-source-if-none-match condition evaluates to false x-amz-copy-source-if-modified-since condition
     * evaluates
     *        to true
     * @param ?float $copySourceIfUnmodifiedSince Copies the object if it hasn't been modified since the specified time. If
     *        both the x-amz-copy-source-if-match and x-amz-copy-source-if-unmodified-since headers are present in the
     * request and
     *        evaluate as follows, Amazon S3 returns 200 OK and copies the data: x-amz-copy-source-if-match condition
     * evaluates to
     *        true x-amz-copy-source-if-unmodified-since condition evaluates to false
     * @param ?string $expires The date and time at which the object is no longer cacheable.
     * @param ?string $grantFullControl Gives the grantee READ, READ_ACP, and WRITE_ACP permissions on the object. This
     *        functionality is not supported for directory buckets. This functionality is not supported for Amazon S3 on
     * Outposts.
     * @param ?string $grantRead Allows grantee to read the object data and its metadata. This functionality is not
     *        supported for directory buckets. This functionality is not supported for Amazon S3 on Outposts.
     * @param ?string $grantReadACP Allows grantee to read the object ACL. This functionality is not supported for directory
     *        buckets. This functionality is not supported for Amazon S3 on Outposts.
     * @param ?string $grantWriteACP Allows grantee to write the ACL for the applicable object. This functionality is not
     *        supported for directory buckets. This functionality is not supported for Amazon S3 on Outposts.
     * @param ?string $ifMatch Copies the object if the entity tag (ETag) of the destination object matches the specified
     *        tag. If the ETag values do not match, the operation returns a 412 Precondition Failed error. If a concurrent
     *        operation occurs during the upload S3 returns a 409 ConditionalRequestConflict response. On a 409 failure you
     * should
     *        fetch the object's ETag and retry the upload. Expects the ETag value as a string. For more information about
     *        conditional requests, see RFC 7232.
     * @param ?string $ifNoneMatch Copies the object only if the object key name at the destination does not already exist
     *        in the bucket specified. Otherwise, Amazon S3 returns a 412 Precondition Failed error. If a concurrent
     * operation
     *        occurs during the upload S3 returns a 409 ConditionalRequestConflict response. On a 409 failure you should
     * retry the
     *        upload. Expects the '*' (asterisk) character. For more information about conditional requests, see RFC 7232.
     * @param array<string, string>|null $metadata
     * @param ?MetadataDirective $metadataDirective Specifies whether the metadata is copied from the source object or
     *        replaced with metadata that's provided in the request. When copying an object, you can preserve all metadata
     * (the
     *        default) or specify new metadata. If this header isn’t specified, COPY is the default behavior. General
     * purpose
     *        bucket - For general purpose buckets, when you grant permissions, you can use the s3:x-amz-metadata-directive
     *        condition key to enforce certain metadata behavior when objects are uploaded. For more information, see Amazon
     * S3
     *        condition key examples in the Amazon S3 User Guide. x-amz-website-redirect-location is unique to each object
     * and is
     *        not copied when using the x-amz-metadata-directive header. To copy the value, you must specify
     *        x-amz-website-redirect-location in the request header.
     * @param ?TaggingDirective $taggingDirective Specifies whether the object tag-set is copied from the source object or
     *        replaced with the tag-set that's provided in the request. The default value is COPY. Directory buckets - For
     *        directory buckets in a CopyObject operation, only the empty tag-set is supported. Any requests that attempt to
     * write
     *        non-empty tags into directory buckets will receive a 501 Not Implemented status code. When the destination
     * bucket is
     *        a directory bucket, you will receive a 501 Not Implemented response in any of the following situations: When
     * you
     *        attempt to COPY the tag-set from an S3 source object that has non-empty tags. When you attempt to REPLACE the
     * tag-set
     *        of a source object and set a non-empty value to x-amz-tagging. When you don't set the x-amz-tagging-directive
     * header
     *        and the source object has non-empty tags. This is because the default value of x-amz-tagging-directive is
     * COPY.
     *        Because only the empty tag-set is supported for directory buckets in a CopyObject operation, the following
     * situations
     *        are allowed: When you attempt to COPY the tag-set from a directory bucket source object that has no tags to a
     * general
     *        purpose bucket. It copies an empty tag-set to the destination object. When you attempt to REPLACE the tag-set
     * of a
     *        directory bucket source object and set the x-amz-tagging value of the directory bucket destination object to
     * empty.
     *        When you attempt to REPLACE the tag-set of a general purpose bucket source object that has non-empty tags and
     * set the
     *        x-amz-tagging value of the directory bucket destination object to empty. When you attempt to REPLACE the
     * tag-set of a
     *        directory bucket source object and don't set the x-amz-tagging value of the directory bucket destination
     * object. This
     *        is because the default value of x-amz-tagging is the empty value.
     * @param ?AnnotationDirective $annotationDirective Specifies whether you want to copy annotations from the source
     *        object or exclude them. If this header isn't specified, COPY is the default behavior. Valid Values: COPY |
     * EXCLUDE
     *        You can specify this directive as either an HTTP header (x-amz-object-annotation-directive) or as a query
     * string
     *        parameter. Use the query string form when generating presigned URLs that need to control annotation copy
     * behavior.
     *        When set to COPY, you must have s3:GetObjectAnnotation permission on the source object and
     * s3:PutObjectAnnotation
     *        permission on the destination. Each annotation copied is billed as a separate PUT request. If annotations on
     * the
     *        source are modified during the copy, Amazon S3 returns a retryable error. For directory buckets, annotations
     * are not
     *        supported. Use EXCLUDE to copy objects to directory buckets without errors. If you specify COPY for a
     * directory
     *        bucket, the request returns HTTP 501 (Not Implemented). When you copy objects using multipart upload (for
     * example,
     *        when the Amazon Web Services CLI or Amazon Web Services SDKs use Transfer Manager for objects larger than
     *        approximately 8 MB), annotations are not copied by default. To include annotations, specify --copy-props
     * default in
     *        the Amazon Web Services CLI or the equivalent SDK configuration. With this opt-in, the SDK reads source
     * annotations,
     *        completes the multipart upload, and then writes each annotation to the destination. Between the upload
     * completion and
     *        the last annotation write, the destination object exists without all its annotations.
     * @param ?ServerSideEncryption $serverSideEncryption The server-side encryption algorithm used when storing this object
     *        in Amazon S3. Unrecognized or unsupported values won’t write a destination object and will receive a 400 Bad
     *        Request response. Amazon S3 automatically encrypts all new objects that are copied to an S3 bucket. When
     * copying an
     *        object, if you don't specify encryption information in your copy request, the encryption setting of the target
     * object
     *        is set to the default encryption configuration of the destination bucket. By default, all buckets have a base
     * level
     *        of encryption configuration that uses server-side encryption with Amazon S3 managed keys (SSE-S3). If the
     * destination
     *        bucket has a different default encryption configuration, Amazon S3 uses the corresponding encryption key to
     * encrypt
     *        the target object copy. With server-side encryption, Amazon S3 encrypts your data as it writes your data to
     * disks in
     *        its data centers and decrypts the data when you access it. For more information about server-side encryption,
     * see
     *        Using Server-Side Encryption in the Amazon S3 User Guide. General purpose buckets For general purpose buckets,
     * there
     *        are the following supported options for server-side encryption: server-side encryption with Key Management
     * Service
     *        (KMS) keys (SSE-KMS), dual-layer server-side encryption with Amazon Web Services KMS keys (DSSE-KMS), and
     * server-side
     *        encryption with customer-provided encryption keys (SSE-C). Amazon S3 uses the corresponding KMS key, or a
     *        customer-provided key to encrypt the target object copy. When you perform a CopyObject operation, if you want
     * to use
     *        a different type of encryption setting for the target object, you can specify appropriate encryption-related
     * headers
     *        to encrypt the target object with an Amazon S3 managed key, a KMS key, or a customer-provided key. If the
     * encryption
     *        setting in your request is different from the default encryption configuration of the destination bucket, the
     *        encryption setting in your request takes precedence. Directory buckets For directory buckets, there are only
     * two
     *        supported options for server-side encryption: server-side encryption with Amazon S3 managed keys (SSE-S3)
     * (AES256)
     *        and server-side encryption with KMS keys (SSE-KMS) (aws:kms). We recommend that the bucket's default
     * encryption uses
     *        the desired encryption configuration and you don't override the bucket default encryption in your
     * CreateSession
     *        requests or PUT object requests. Then, new objects are automatically encrypted with the desired encryption
     * settings.
     *        For more information, see Protecting data with server-side encryption in the Amazon S3 User Guide. For more
     *        information about the encryption overriding behaviors in directory buckets, see Specifying server-side
     * encryption
     *        with KMS for new object uploads. To encrypt new object copies to a directory bucket with SSE-KMS, we recommend
     * you
     *        specify SSE-KMS as the directory bucket's default encryption configuration with a KMS key (specifically, a
     * customer
     *        managed key). The Amazon Web Services managed key (aws/s3) isn't supported. Your SSE-KMS configuration can
     * only
     *        support 1 customer managed key per directory bucket for the lifetime of the bucket. After you specify a
     * customer
     *        managed key for SSE-KMS, you can't override the customer managed key for the bucket's SSE-KMS configuration.
     * Then,
     *        when you perform a CopyObject operation and want to specify server-side encryption settings for new object
     * copies
     *        with SSE-KMS in the encryption-related request headers, you must ensure the encryption key is the same
     * customer
     *        managed key that you specified for the directory bucket's default encryption configuration. S3 access points
     * for
     *        Amazon FSx - When accessing data stored in Amazon FSx file systems using S3 access points, the only valid
     * server side
     *        encryption option is aws:fsx. All Amazon FSx file systems have encryption configured by default and are
     * encrypted at
     *        rest. Data is automatically encrypted before being written to the file system, and automatically decrypted as
     * it is
     *        read. These processes are handled transparently by Amazon FSx.
     * @param ?StorageClass $storageClass If the x-amz-storage-class header is not used, the copied object will be stored in
     *        the STANDARD Storage Class by default. The STANDARD storage class provides high durability and high
     * availability.
     *        Depending on performance needs, you can specify a different Storage Class. Directory buckets - Directory
     * buckets only
     *        support EXPRESS_ONEZONE (the S3 Express One Zone storage class) in Availability Zones and ONEZONE_IA (the S3
     * One
     *        Zone-Infrequent Access storage class) in Dedicated Local Zones. Unsupported storage class values won't write a
     *        destination object and will respond with the HTTP status code 400 Bad Request. Amazon S3 on Outposts - S3 on
     * Outposts
     *        only uses the OUTPOSTS Storage Class. You can use the CopyObject action to change the storage class of an
     * object that
     *        is already stored in Amazon S3 by using the x-amz-storage-class header. For more information, see Storage
     * Classes in
     *        the Amazon S3 User Guide. Before using an object as a source object for the copy operation, you must restore a
     * copy
     *        of it if it meets any of the following conditions: The storage class of the source object is GLACIER or
     * DEEP_ARCHIVE.
     *        The storage class of the source object is INTELLIGENT_TIERING and it's S3 Intelligent-Tiering access tier is
     * Archive
     *        Access or Deep Archive Access. For more information, see RestoreObject and Copying Objects in the Amazon S3
     * User
     *        Guide.
     * @param ?string $websiteRedirectLocation If the destination bucket is configured as a website, redirects requests for
     *        this object copy to another object in the same bucket or to an external URL. Amazon S3 stores the value of
     * this
     *        header in the object metadata. This value is unique to each object and is not copied when using the
     *        x-amz-metadata-directive header. Instead, you may opt to provide this header in combination with the
     *        x-amz-metadata-directive header. This functionality is not supported for directory buckets.
     * @param ?string $sSECustomerAlgorithm Specifies the algorithm to use when encrypting the object (for example, AES256).
     *        When you perform a CopyObject operation, if you want to use a different type of encryption setting for the
     * target
     *        object, you can specify appropriate encryption-related headers to encrypt the target object with an Amazon S3
     * managed
     *        key, a KMS key, or a customer-provided key. If the encryption setting in your request is different from the
     * default
     *        encryption configuration of the destination bucket, the encryption setting in your request takes precedence.
     * This
     *        functionality is not supported when the destination bucket is a directory bucket.
     * @param ?string $sSECustomerKey Specifies the customer-provided encryption key for Amazon S3 to use in encrypting
     *        data. This value is used to store the object and then it is discarded. Amazon S3 does not store the encryption
     * key.
     *        The key must be appropriate for use with the algorithm specified in the
     *        x-amz-server-side-encryption-customer-algorithm header. This functionality is not supported when the
     * destination
     *        bucket is a directory bucket.
     * @param ?string $sSECustomerKeyMD5 Specifies the 128-bit MD5 digest of the encryption key according to RFC 1321.
     *        Amazon S3 uses this header for a message integrity check to ensure that the encryption key was transmitted
     * without
     *        error. This functionality is not supported when the destination bucket is a directory bucket.
     * @param ?string $sSEKMSKeyId Specifies the KMS key ID (Key ID, Key ARN, or Key Alias) to use for object encryption.
     *        All GET and PUT requests for an object protected by KMS will fail if they're not made via SSL or using SigV4.
     * For
     *        information about configuring any of the officially supported Amazon Web Services SDKs and Amazon Web Services
     * CLI,
     *        see Specifying the Signature Version in Request Authentication in the Amazon S3 User Guide. Directory buckets
     * - To
     *        encrypt data using SSE-KMS, it's recommended to specify the x-amz-server-side-encryption header to aws:kms.
     * Then, the
     *        x-amz-server-side-encryption-aws-kms-key-id header implicitly uses the bucket's default KMS customer managed
     * key ID.
     *        If you want to explicitly set the x-amz-server-side-encryption-aws-kms-key-id header, it must match the
     * bucket's
     *        default customer managed key (using key ID or ARN, not alias). Your SSE-KMS configuration can only support 1
     * customer
     *        managed key per directory bucket's lifetime. The Amazon Web Services managed key (aws/s3) isn't supported.
     * Incorrect
     *        key specification results in an HTTP 400 Bad Request error.
     * @param ?string $sSEKMSEncryptionContext Specifies the Amazon Web Services KMS Encryption Context as an additional
     *        encryption context to use for the destination object encryption. The value of this header is a base64-encoded
     * UTF-8
     *        string holding JSON with the encryption context key-value pairs. General purpose buckets - This value must be
     *        explicitly added to specify encryption context for CopyObject requests if you want an additional encryption
     * context
     *        for your destination object. The additional encryption context of the source object won't be copied to the
     *        destination object. For more information, see Encryption context in the Amazon S3 User Guide. Directory
     * buckets - You
     *        can optionally provide an explicit encryption context value. The value must match the default encryption
     * context -
     *        the bucket Amazon Resource Name (ARN). An additional encryption context value is not supported.
     * @param ?bool $bucketKeyEnabled Specifies whether Amazon S3 should use an S3 Bucket Key for object encryption with
     *        server-side encryption using Key Management Service (KMS) keys (SSE-KMS). If a target object uses SSE-KMS, you
     * can
     *        enable an S3 Bucket Key for the object. Setting this header to true causes Amazon S3 to use an S3 Bucket Key
     * for
     *        object encryption with SSE-KMS. Specifying this header with a COPY action doesn’t affect bucket-level
     * settings for
     *        S3 Bucket Key. For more information, see Amazon S3 Bucket Keys in the Amazon S3 User Guide. Directory buckets
     * - S3
     *        Bucket Keys aren't supported, when you copy SSE-KMS encrypted objects from general purpose buckets to
     * directory
     *        buckets, from directory buckets to general purpose buckets, or between directory buckets, through CopyObject.
     * In this
     *        case, Amazon S3 makes a call to KMS every time a copy request is made for a KMS-encrypted object.
     * @param ?string $copySourceSSECustomerAlgorithm Specifies the algorithm to use when decrypting the source object (for
     *        example, AES256). If the source object for the copy is stored in Amazon S3 using SSE-C, you must provide the
     *        necessary encryption information in your request so that Amazon S3 can decrypt the object for copying. This
     *        functionality is not supported when the source object is in a directory bucket.
     * @param ?string $copySourceSSECustomerKey Specifies the customer-provided encryption key for Amazon S3 to use to
     *        decrypt the source object. The encryption key provided in this header must be the same one that was used when
     * the
     *        source object was created. If the source object for the copy is stored in Amazon S3 using SSE-C, you must
     * provide the
     *        necessary encryption information in your request so that Amazon S3 can decrypt the object for copying. This
     *        functionality is not supported when the source object is in a directory bucket.
     * @param ?string $copySourceSSECustomerKeyMD5 Specifies the 128-bit MD5 digest of the encryption key according to RFC
     *        1321. Amazon S3 uses this header for a message integrity check to ensure that the encryption key was
     * transmitted
     *        without error. If the source object for the copy is stored in Amazon S3 using SSE-C, you must provide the
     * necessary
     *        encryption information in your request so that Amazon S3 can decrypt the object for copying. This
     * functionality is
     *        not supported when the source object is in a directory bucket.
     * @param ?string $tagging The tag-set for the object copy in the destination bucket. This value must be used in
     *        conjunction with the x-amz-tagging-directive if you choose REPLACE for the x-amz-tagging-directive. If you
     * choose
     *        COPY for the x-amz-tagging-directive, you don't need to set the x-amz-tagging header, because the tag-set will
     * be
     *        copied from the source object directly. The tag-set must be encoded as URL Query parameters. The default value
     * is the
     *        empty value. Directory buckets - For directory buckets in a CopyObject operation, only the empty tag-set is
     *        supported. Any requests that attempt to write non-empty tags into directory buckets will receive a 501 Not
     *        Implemented status code. When the destination bucket is a directory bucket, you will receive a 501 Not
     * Implemented
     *        response in any of the following situations: When you attempt to COPY the tag-set from an S3 source object
     * that has
     *        non-empty tags. When you attempt to REPLACE the tag-set of a source object and set a non-empty value to
     *        x-amz-tagging. When you don't set the x-amz-tagging-directive header and the source object has non-empty tags.
     * This
     *        is because the default value of x-amz-tagging-directive is COPY. Because only the empty tag-set is supported
     * for
     *        directory buckets in a CopyObject operation, the following situations are allowed: When you attempt to COPY
     * the
     *        tag-set from a directory bucket source object that has no tags to a general purpose bucket. It copies an empty
     *        tag-set to the destination object. When you attempt to REPLACE the tag-set of a directory bucket source object
     * and
     *        set the x-amz-tagging value of the directory bucket destination object to empty. When you attempt to REPLACE
     * the
     *        tag-set of a general purpose bucket source object that has non-empty tags and set the x-amz-tagging value of
     * the
     *        directory bucket destination object to empty. When you attempt to REPLACE the tag-set of a directory bucket
     * source
     *        object and don't set the x-amz-tagging value of the directory bucket destination object. This is because the
     * default
     *        value of x-amz-tagging is the empty value.
     * @param ?ObjectLockMode $objectLockMode The Object Lock mode that you want to apply to the object copy. This
     *        functionality is not supported for directory buckets.
     * @param ?float $objectLockRetainUntilDate The date and time when you want the Object Lock of the object copy to
     *        expire. This functionality is not supported for directory buckets.
     * @param ?ObjectLockLegalHoldStatus $objectLockLegalHoldStatus Specifies whether you want to apply a legal hold to the
     *        object copy. This functionality is not supported for directory buckets.
     * @param ?ObjectLockEventHold $objectLockEventHold The event hold status to apply to the object copy. Set to ON to
     *        enable or OFF to disable. This functionality is not supported for directory buckets.
     * @param ?int $objectLockEventHoldDurationDays The event hold duration in days to apply to the object copy. You cannot
     *        specify a duration in both days and years. This functionality is not supported for directory buckets.
     * @param ?int $objectLockEventHoldDurationYears The event hold duration in years to apply to the object copy. You
     *        cannot specify a duration in both days and years. This functionality is not supported for directory buckets.
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
        ObjectCannedACL|string|null $aCL = null,
        public readonly ?string $cacheControl = null,
        ChecksumAlgorithm|string|null $checksumAlgorithm = null,
        public readonly ?string $contentDisposition = null,
        public readonly ?string $contentEncoding = null,
        public readonly ?string $contentLanguage = null,
        public readonly ?string $contentType = null,
        public readonly ?string $copySourceIfMatch = null,
        public readonly ?float $copySourceIfModifiedSince = null,
        public readonly ?string $copySourceIfNoneMatch = null,
        public readonly ?float $copySourceIfUnmodifiedSince = null,
        public readonly ?string $expires = null,
        public readonly ?string $grantFullControl = null,
        public readonly ?string $grantRead = null,
        public readonly ?string $grantReadACP = null,
        public readonly ?string $grantWriteACP = null,
        public readonly ?string $ifMatch = null,
        public readonly ?string $ifNoneMatch = null,
        public readonly ?array $metadata = null,
        MetadataDirective|string|null $metadataDirective = null,
        TaggingDirective|string|null $taggingDirective = null,
        AnnotationDirective|string|null $annotationDirective = null,
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
        public readonly ?string $copySourceSSECustomerAlgorithm = null,
        /** @sensitive */
        public readonly ?string $copySourceSSECustomerKey = null,
        public readonly ?string $copySourceSSECustomerKeyMD5 = null,
        RequestPayer|string|null $requestPayer = null,
        public readonly ?string $tagging = null,
        ObjectLockMode|string|null $objectLockMode = null,
        public readonly ?float $objectLockRetainUntilDate = null,
        ObjectLockLegalHoldStatus|string|null $objectLockLegalHoldStatus = null,
        ObjectLockEventHold|string|null $objectLockEventHold = null,
        public readonly ?int $objectLockEventHoldDurationDays = null,
        public readonly ?int $objectLockEventHoldDurationYears = null,
        public readonly ?string $expectedBucketOwner = null,
        public readonly ?string $expectedSourceBucketOwner = null
    ) {
        $this->aCL = $aCL === null || $aCL instanceof ObjectCannedACL ? $aCL : ObjectCannedACL::fromValue($aCL);
        $this->checksumAlgorithm = $checksumAlgorithm === null || $checksumAlgorithm instanceof ChecksumAlgorithm ? $checksumAlgorithm : ChecksumAlgorithm::fromValue($checksumAlgorithm);
        $this->metadataDirective = $metadataDirective === null || $metadataDirective instanceof MetadataDirective ? $metadataDirective : MetadataDirective::fromValue($metadataDirective);
        $this->taggingDirective = $taggingDirective === null || $taggingDirective instanceof TaggingDirective ? $taggingDirective : TaggingDirective::fromValue($taggingDirective);
        $this->annotationDirective = $annotationDirective === null || $annotationDirective instanceof AnnotationDirective ? $annotationDirective : AnnotationDirective::fromValue($annotationDirective);
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
        $s = Schemas::copyObjectRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_COPY_SOURCE = $m[1];
        self::$SCHEMA_KEY = $m[2];
        self::$SCHEMA_ACL = $m[3];
        self::$SCHEMA_CACHE_CONTROL = $m[4];
        self::$SCHEMA_CHECKSUM_ALGORITHM = $m[5];
        self::$SCHEMA_CONTENT_DISPOSITION = $m[6];
        self::$SCHEMA_CONTENT_ENCODING = $m[7];
        self::$SCHEMA_CONTENT_LANGUAGE = $m[8];
        self::$SCHEMA_CONTENT_TYPE = $m[9];
        self::$SCHEMA_COPY_SOURCE_IF_MATCH = $m[10];
        self::$SCHEMA_COPY_SOURCE_IF_MODIFIED_SINCE = $m[11];
        self::$SCHEMA_COPY_SOURCE_IF_NONE_MATCH = $m[12];
        self::$SCHEMA_COPY_SOURCE_IF_UNMODIFIED_SINCE = $m[13];
        self::$SCHEMA_EXPIRES = $m[14];
        self::$SCHEMA_GRANT_FULL_CONTROL = $m[15];
        self::$SCHEMA_GRANT_READ = $m[16];
        self::$SCHEMA_GRANT_READ_ACP = $m[17];
        self::$SCHEMA_GRANT_WRITE_ACP = $m[18];
        self::$SCHEMA_IF_MATCH = $m[19];
        self::$SCHEMA_IF_NONE_MATCH = $m[20];
        self::$SCHEMA_METADATA = $m[21];
        self::$SCHEMA_METADATA_DIRECTIVE = $m[22];
        self::$SCHEMA_TAGGING_DIRECTIVE = $m[23];
        self::$SCHEMA_ANNOTATION_DIRECTIVE = $m[24];
        self::$SCHEMA_SERVER_SIDE_ENCRYPTION = $m[25];
        self::$SCHEMA_STORAGE_CLASS = $m[26];
        self::$SCHEMA_WEBSITE_REDIRECT_LOCATION = $m[27];
        self::$SCHEMA_SSE_CUSTOMER_ALGORITHM = $m[28];
        self::$SCHEMA_SSE_CUSTOMER_KEY = $m[29];
        self::$SCHEMA_SSE_CUSTOMER_KEY_MD5 = $m[30];
        self::$SCHEMA_SSEKMS_KEY_ID = $m[31];
        self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT = $m[32];
        self::$SCHEMA_BUCKET_KEY_ENABLED = $m[33];
        self::$SCHEMA_COPY_SOURCE_SSE_CUSTOMER_ALGORITHM = $m[34];
        self::$SCHEMA_COPY_SOURCE_SSE_CUSTOMER_KEY = $m[35];
        self::$SCHEMA_COPY_SOURCE_SSE_CUSTOMER_KEY_MD5 = $m[36];
        self::$SCHEMA_REQUEST_PAYER = $m[37];
        self::$SCHEMA_TAGGING = $m[38];
        self::$SCHEMA_OBJECT_LOCK_MODE = $m[39];
        self::$SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE = $m[40];
        self::$SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS = $m[41];
        self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD = $m[42];
        self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_DAYS = $m[43];
        self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_YEARS = $m[44];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[45];
        self::$SCHEMA_EXPECTED_SOURCE_BUCKET_OWNER = $m[46];
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
        if (isset($this->aCL)) {
            $serializer->serializeString(self::$SCHEMA_ACL, $this->aCL->value, 3);
        }
        if (isset($this->cacheControl)) {
            $serializer->serializeString(self::$SCHEMA_CACHE_CONTROL, $this->cacheControl, 4);
        }
        if (isset($this->checksumAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_CHECKSUM_ALGORITHM, $this->checksumAlgorithm->value, 5);
        }
        if (isset($this->contentDisposition)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_DISPOSITION, $this->contentDisposition, 6);
        }
        if (isset($this->contentEncoding)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_ENCODING, $this->contentEncoding, 7);
        }
        if (isset($this->contentLanguage)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_LANGUAGE, $this->contentLanguage, 8);
        }
        if (isset($this->contentType)) {
            $serializer->serializeString(self::$SCHEMA_CONTENT_TYPE, $this->contentType, 9);
        }
        if (isset($this->copySourceIfMatch)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE_IF_MATCH, $this->copySourceIfMatch, 10);
        }
        if (isset($this->copySourceIfModifiedSince)) {
            $serializer->serializeTimestamp(self::$SCHEMA_COPY_SOURCE_IF_MODIFIED_SINCE, $this->copySourceIfModifiedSince, 11);
        }
        if (isset($this->copySourceIfNoneMatch)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE_IF_NONE_MATCH, $this->copySourceIfNoneMatch, 12);
        }
        if (isset($this->copySourceIfUnmodifiedSince)) {
            $serializer->serializeTimestamp(self::$SCHEMA_COPY_SOURCE_IF_UNMODIFIED_SINCE, $this->copySourceIfUnmodifiedSince, 13);
        }
        if (isset($this->expires)) {
            $serializer->serializeString(self::$SCHEMA_EXPIRES, $this->expires, 14);
        }
        if (isset($this->grantFullControl)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_FULL_CONTROL, $this->grantFullControl, 15);
        }
        if (isset($this->grantRead)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_READ, $this->grantRead, 16);
        }
        if (isset($this->grantReadACP)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_READ_ACP, $this->grantReadACP, 17);
        }
        if (isset($this->grantWriteACP)) {
            $serializer->serializeString(self::$SCHEMA_GRANT_WRITE_ACP, $this->grantWriteACP, 18);
        }
        if (isset($this->ifMatch)) {
            $serializer->serializeString(self::$SCHEMA_IF_MATCH, $this->ifMatch, 19);
        }
        if (isset($this->ifNoneMatch)) {
            $serializer->serializeString(self::$SCHEMA_IF_NONE_MATCH, $this->ifNoneMatch, 20);
        }
        if (isset($this->metadata)) {
            $serializer->serializeMap(self::$SCHEMA_METADATA, $this->metadata, 21);
        }
        if (isset($this->metadataDirective)) {
            $serializer->serializeString(self::$SCHEMA_METADATA_DIRECTIVE, $this->metadataDirective->value, 22);
        }
        if (isset($this->taggingDirective)) {
            $serializer->serializeString(self::$SCHEMA_TAGGING_DIRECTIVE, $this->taggingDirective->value, 23);
        }
        if (isset($this->annotationDirective)) {
            $serializer->serializeString(self::$SCHEMA_ANNOTATION_DIRECTIVE, $this->annotationDirective->value, 24);
        }
        if (isset($this->serverSideEncryption)) {
            $serializer->serializeString(self::$SCHEMA_SERVER_SIDE_ENCRYPTION, $this->serverSideEncryption->value, 25);
        }
        if (isset($this->storageClass)) {
            $serializer->serializeString(self::$SCHEMA_STORAGE_CLASS, $this->storageClass->value, 26);
        }
        if (isset($this->websiteRedirectLocation)) {
            $serializer->serializeString(self::$SCHEMA_WEBSITE_REDIRECT_LOCATION, $this->websiteRedirectLocation, 27);
        }
        if (isset($this->sSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_ALGORITHM, $this->sSECustomerAlgorithm, 28);
        }
        if (isset($this->sSECustomerKey)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY, $this->sSECustomerKey, 29);
        }
        if (isset($this->sSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_SSE_CUSTOMER_KEY_MD5, $this->sSECustomerKeyMD5, 30);
        }
        if (isset($this->sSEKMSKeyId)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_KEY_ID, $this->sSEKMSKeyId, 31);
        }
        if (isset($this->sSEKMSEncryptionContext)) {
            $serializer->serializeString(self::$SCHEMA_SSEKMS_ENCRYPTION_CONTEXT, $this->sSEKMSEncryptionContext, 32);
        }
        if (isset($this->bucketKeyEnabled)) {
            $serializer->serializeBoolean(self::$SCHEMA_BUCKET_KEY_ENABLED, $this->bucketKeyEnabled, 33);
        }
        if (isset($this->copySourceSSECustomerAlgorithm)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE_SSE_CUSTOMER_ALGORITHM, $this->copySourceSSECustomerAlgorithm, 34);
        }
        if (isset($this->copySourceSSECustomerKey)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE_SSE_CUSTOMER_KEY, $this->copySourceSSECustomerKey, 35);
        }
        if (isset($this->copySourceSSECustomerKeyMD5)) {
            $serializer->serializeString(self::$SCHEMA_COPY_SOURCE_SSE_CUSTOMER_KEY_MD5, $this->copySourceSSECustomerKeyMD5, 36);
        }
        if (isset($this->requestPayer)) {
            $serializer->serializeString(self::$SCHEMA_REQUEST_PAYER, $this->requestPayer->value, 37);
        }
        if (isset($this->tagging)) {
            $serializer->serializeString(self::$SCHEMA_TAGGING, $this->tagging, 38);
        }
        if (isset($this->objectLockMode)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_MODE, $this->objectLockMode->value, 39);
        }
        if (isset($this->objectLockRetainUntilDate)) {
            $serializer->serializeTimestamp(self::$SCHEMA_OBJECT_LOCK_RETAIN_UNTIL_DATE, $this->objectLockRetainUntilDate, 40);
        }
        if (isset($this->objectLockLegalHoldStatus)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_LEGAL_HOLD_STATUS, $this->objectLockLegalHoldStatus->value, 41);
        }
        if (isset($this->objectLockEventHold)) {
            $serializer->serializeString(self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD, $this->objectLockEventHold->value, 42);
        }
        if (isset($this->objectLockEventHoldDurationDays)) {
            $serializer->serializeInteger(self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_DAYS, $this->objectLockEventHoldDurationDays, 43);
        }
        if (isset($this->objectLockEventHoldDurationYears)) {
            $serializer->serializeInteger(self::$SCHEMA_OBJECT_LOCK_EVENT_HOLD_DURATION_YEARS, $this->objectLockEventHoldDurationYears, 44);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 45);
        }
        if (isset($this->expectedSourceBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_SOURCE_BUCKET_OWNER, $this->expectedSourceBucketOwner, 46);
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
            3 => $this->aCL,
            4 => $this->cacheControl,
            5 => $this->checksumAlgorithm,
            6 => $this->contentDisposition,
            7 => $this->contentEncoding,
            8 => $this->contentLanguage,
            9 => $this->contentType,
            10 => $this->copySourceIfMatch,
            11 => $this->copySourceIfModifiedSince,
            12 => $this->copySourceIfNoneMatch,
            13 => $this->copySourceIfUnmodifiedSince,
            14 => $this->expires,
            15 => $this->grantFullControl,
            16 => $this->grantRead,
            17 => $this->grantReadACP,
            18 => $this->grantWriteACP,
            19 => $this->ifMatch,
            20 => $this->ifNoneMatch,
            21 => $this->metadata,
            22 => $this->metadataDirective,
            23 => $this->taggingDirective,
            24 => $this->annotationDirective,
            25 => $this->serverSideEncryption,
            26 => $this->storageClass,
            27 => $this->websiteRedirectLocation,
            28 => $this->sSECustomerAlgorithm,
            29 => $this->sSECustomerKey,
            30 => $this->sSECustomerKeyMD5,
            31 => $this->sSEKMSKeyId,
            32 => $this->sSEKMSEncryptionContext,
            33 => $this->bucketKeyEnabled,
            34 => $this->copySourceSSECustomerAlgorithm,
            35 => $this->copySourceSSECustomerKey,
            36 => $this->copySourceSSECustomerKeyMD5,
            37 => $this->requestPayer,
            38 => $this->tagging,
            39 => $this->objectLockMode,
            40 => $this->objectLockRetainUntilDate,
            41 => $this->objectLockLegalHoldStatus,
            42 => $this->objectLockEventHold,
            43 => $this->objectLockEventHoldDurationDays,
            44 => $this->objectLockEventHoldDurationYears,
            45 => $this->expectedBucketOwner,
            46 => $this->expectedSourceBucketOwner,
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
            $this->aCL,
            $this->cacheControl,
            $this->checksumAlgorithm,
            $this->contentDisposition,
            $this->contentEncoding,
            $this->contentLanguage,
            $this->contentType,
            $this->copySourceIfMatch,
            $this->copySourceIfModifiedSince,
            $this->copySourceIfNoneMatch,
            $this->copySourceIfUnmodifiedSince,
            $this->expires,
            $this->grantFullControl,
            $this->grantRead,
            $this->grantReadACP,
            $this->grantWriteACP,
            $this->ifMatch,
            $this->ifNoneMatch,
            $this->metadata,
            $this->metadataDirective,
            $this->taggingDirective,
            $this->annotationDirective,
            $this->serverSideEncryption,
            $this->storageClass,
            $this->websiteRedirectLocation,
            $this->sSECustomerAlgorithm,
            $this->sSECustomerKey,
            $this->sSECustomerKeyMD5,
            $this->sSEKMSKeyId,
            $this->sSEKMSEncryptionContext,
            $this->bucketKeyEnabled,
            $this->copySourceSSECustomerAlgorithm,
            $this->copySourceSSECustomerKey,
            $this->copySourceSSECustomerKeyMD5,
            $this->requestPayer,
            $this->tagging,
            $this->objectLockMode,
            $this->objectLockRetainUntilDate,
            $this->objectLockLegalHoldStatus,
            $this->objectLockEventHold,
            $this->objectLockEventHoldDurationDays,
            $this->objectLockEventHoldDurationYears,
            $this->expectedBucketOwner,
            $this->expectedSourceBucketOwner
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
