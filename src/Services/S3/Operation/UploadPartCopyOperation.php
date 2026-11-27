<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\UploadPartCopyRequest;
use Aws\Services\S3\Output\UploadPartCopyOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Uploads a part by copying data from an existing object as data source. To specify the data source, you add the
 * request header x-amz-copy-source in your request. To specify a byte range, you add the request header
 * x-amz-copy-source-range in your request. For information about maximum and minimum part sizes and other multipart
 * upload specifications, see Multipart upload limits in the Amazon S3 User Guide. Instead of copying data from an
 * existing object as part data, you might use the UploadPart action to upload new data as a part of an object in your
 * request. You must initiate a multipart upload before you can upload any part. In response to your initiate request,
 * Amazon S3 returns the upload ID, a unique identifier that you must include in your upload part request. For
 * conceptual information about multipart uploads, see Uploading Objects Using Multipart Upload in the Amazon S3 User
 * Guide. For information about copying objects using a single atomic action vs. a multipart upload, see Operations on
 * Objects in the Amazon S3 User Guide. Directory buckets - For directory buckets, you must make requests for this API
 * operation to the Zonal endpoint. These endpoints support virtual-hosted-style requests in the format
 * https://amzn-s3-demo-bucket.s3express-zone-id.region-code.amazonaws.com/key-name . Path-style requests are not
 * supported. For more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory
 * buckets in Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see
 * Concepts for directory buckets in Local Zones in the Amazon S3 User Guide. Authentication and authorization All
 * UploadPartCopy requests must be authenticated and signed by using IAM credentials (access key ID and secret access
 * key for the IAM identities). All headers with the x-amz- prefix, including x-amz-copy-source, must be signed. For
 * more information, see REST Authentication. Directory buckets - You must use IAM credentials to authenticate and
 * authorize your access to the UploadPartCopy API operation, instead of using the temporary security credentials
 * through the CreateSession API operation. Amazon Web Services CLI or SDKs handles authentication and authorization on
 * your behalf. Permissions You must have READ access to the source object and WRITE access to the destination bucket.
 * General purpose bucket permissions - You must have the permissions in a policy based on the bucket types of your
 * source bucket and destination bucket in an UploadPartCopy operation. If the source object is in a general purpose
 * bucket, you must have the s3:GetObject permission to read the source object that is being copied. If the destination
 * bucket is a general purpose bucket, you must have the s3:PutObject permission to write the object copy to the
 * destination bucket. To perform a multipart upload with encryption using an Key Management Service key, the requester
 * must have permission to the kms:Decrypt and kms:GenerateDataKey actions on the key. The requester must also have
 * permissions for the kms:GenerateDataKey action for the CreateMultipartUpload API. Then, the requester needs
 * permissions for the kms:Decrypt action on the UploadPart and UploadPartCopy APIs. These permissions are required
 * because Amazon S3 must decrypt and read data from the encrypted file parts before it completes the multipart upload.
 * For more information about KMS permissions, see Protecting data using server-side encryption with KMS in the Amazon
 * S3 User Guide. For information about the permissions required to use the multipart upload API, see Multipart upload
 * and permissions and Multipart upload API and permissions in the Amazon S3 User Guide. Directory bucket permissions -
 * You must have permissions in a bucket policy or an IAM identity-based policy based on the source and destination
 * bucket types in an UploadPartCopy operation. If the source object that you want to copy is in a directory bucket, you
 * must have the s3express:CreateSession permission in the Action element of a policy to read the object. If no session
 * mode is specified, the session will be created with the maximum allowable privilege, attempting ReadWrite first, then
 * ReadOnly if ReadWrite is not permitted. If you want to explicitly restrict the access to be read-only, you can set
 * the s3express:SessionMode condition key to ReadOnly on the copy source bucket. If the copy destination is a directory
 * bucket, you must have the s3express:CreateSession permission in the Action element of a policy to write the object to
 * the destination. The s3express:SessionMode condition key cannot be set to ReadOnly on the copy destination. If the
 * object is encrypted with SSE-KMS, you must also have the kms:GenerateDataKey and kms:Decrypt permissions in IAM
 * identity-based policies and KMS key policies for the KMS key. For example policies, see Example bucket policies for
 * S3 Express One Zone and Amazon Web Services Identity and Access Management (IAM) identity-based policies for S3
 * Express One Zone in the Amazon S3 User Guide. Encryption General purpose buckets - For information about using
 * server-side encryption with customer-provided encryption keys with the UploadPartCopy operation, see CopyObject and
 * UploadPart. If you have server-side encryption with customer-provided keys (SSE-C) blocked for your general purpose
 * bucket, you will get an HTTP 403 Access Denied error when you specify the SSE-C request headers while writing new
 * data to your bucket. For more information, see Blocking or unblocking SSE-C for a general purpose bucket. Directory
 * buckets - For directory buckets, there are only two supported options for server-side encryption: server-side
 * encryption with Amazon S3 managed keys (SSE-S3) (AES256) and server-side encryption with KMS keys (SSE-KMS)
 * (aws:kms). For more information, see Protecting data with server-side encryption in the Amazon S3 User Guide. For
 * directory buckets, when you perform a CreateMultipartUpload operation and an UploadPartCopy operation, the request
 * headers you provide in the CreateMultipartUpload request must match the default encryption configuration of the
 * destination bucket. S3 Bucket Keys aren't supported, when you copy SSE-KMS encrypted objects from general purpose
 * buckets to directory buckets, from directory buckets to general purpose buckets, or between directory buckets,
 * through UploadPartCopy. In this case, Amazon S3 makes a call to KMS every time a copy request is made for a
 * KMS-encrypted object. Special errors Error Code: NoSuchUpload Description: The specified multipart upload does not
 * exist. The upload ID might be invalid, or the multipart upload might have been aborted or completed. HTTP Status
 * Code: 404 Not Found Error Code: InvalidRequest Description: The specified copy source is not supported as a
 * byte-range copy source. HTTP Status Code: 400 Bad Request HTTP Host header syntax Directory buckets - The HTTP Host
 * header syntax is Bucket-name.s3express-zone-id.region-code.amazonaws.com. The following operations are related to
 * UploadPartCopy: CreateMultipartUpload UploadPart CompleteMultipartUpload AbortMultipartUpload ListParts
 * ListMultipartUploads You must URL encode any signed header values that contain spaces. For example, if your header
 * value is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class UploadPartCopyOperation implements OperationInterface
{
    public const NAME = 'UploadPartCopy';
    public const ID = 'com.amazonaws.s3#UploadPartCopy';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = UploadPartCopyRequest::class;
    public const OUTPUT_CLASS = UploadPartCopyOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [];

    private static ?self $INSTANCE = null;
    private static ?Schema $SCHEMA = null;

    public static function instance(): self
    {
        return self::$INSTANCE ??= new self();
    }

    private function __construct() {}

    public function getName(): string
    {
        return self::NAME;
    }

    public function getId(): string
    {
        return self::ID;
    }

    public function getServiceId(): string
    {
        return self::SERVICE_ID;
    }

    public function getServiceExceptionClass(): string
    {
        return S3Exception::class;
    }

    public function getRuntimeIdentity(): string
    {
        return self::class;
    }

    public function getEffectiveAuthSchemes(): array
    {
        return self::AUTH_SCHEMES;
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        return self::$SCHEMA ??= new Schema(
            id: 'com.amazonaws.s3#UploadPartCopy',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '/{Key+}?x-id=UploadPartCopy',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 2, true]],
                    'pathQueryString' => 'x-id=UploadPartCopy'
                ]
            ],
            directTraitsById: [
                'smithy.rules#staticContextParams' => ['DisableS3ExpressSessionAuth' => ['value' => true]]
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return UploadPartCopyRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return UploadPartCopyOutput::schema();
    }

    public function getOutputSchema(): Schema
    {
        return self::outputSchema();
    }

    /**
     * @return list<Schema> Modeled error schemas.
     */
    public function getErrorSchemas(): array
    {
        return [];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return UploadPartCopyRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return UploadPartCopyOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return null;
    }

    public function getInputStreamMember(): ?Schema
    {
        return null;
    }

    public function getOutputStreamMember(): ?Schema
    {
        return null;
    }
}
