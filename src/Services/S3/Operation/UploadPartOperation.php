<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\UploadPartRequest;
use Aws\Services\S3\Output\UploadPartOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Uploads a part in a multipart upload. In this operation, you provide new data as a part of an object in your request.
 * However, you have an option to specify your existing Amazon S3 object as a data source for the part you are
 * uploading. To upload a part from an existing object, you use the UploadPartCopy operation. You must initiate a
 * multipart upload (see CreateMultipartUpload) before you can upload any part. In response to your initiate request,
 * Amazon S3 returns an upload ID, a unique identifier that you must include in your upload part request. Part numbers
 * can be any number from 1 to 10,000, inclusive. A part number uniquely identifies a part and also defines its position
 * within the object being created. If you upload a new part using the same part number that was used with a previous
 * part, the previously uploaded part is overwritten. For information about maximum and minimum part sizes and other
 * multipart upload specifications, see Multipart upload limits in the Amazon S3 User Guide. After you initiate
 * multipart upload and upload one or more parts, you must either complete or abort multipart upload in order to stop
 * getting charged for storage of the uploaded parts. Only after you either complete or abort multipart upload, Amazon
 * S3 frees up the parts storage and stops charging you for the parts storage. For more information on multipart
 * uploads, go to Multipart Upload Overview in the Amazon S3 User Guide . Directory buckets - For directory buckets, you
 * must make requests for this API operation to the Zonal endpoint. These endpoints support virtual-hosted-style
 * requests in the format https://amzn-s3-demo-bucket.s3express-zone-id.region-code.amazonaws.com/key-name . Path-style
 * requests are not supported. For more information about endpoints in Availability Zones, see Regional and Zonal
 * endpoints for directory buckets in Availability Zones in the Amazon S3 User Guide. For more information about
 * endpoints in Local Zones, see Concepts for directory buckets in Local Zones in the Amazon S3 User Guide. Permissions
 * General purpose bucket permissions - To perform a multipart upload with encryption using an Key Management Service
 * key, the requester must have permission to the kms:Decrypt and kms:GenerateDataKey actions on the key. The requester
 * must also have permissions for the kms:GenerateDataKey action for the CreateMultipartUpload API. Then, the requester
 * needs permissions for the kms:Decrypt action on the UploadPart and UploadPartCopy APIs. These permissions are
 * required because Amazon S3 must decrypt and read data from the encrypted file parts before it completes the multipart
 * upload. For more information about KMS permissions, see Protecting data using server-side encryption with KMS in the
 * Amazon S3 User Guide. For information about the permissions required to use the multipart upload API, see Multipart
 * upload and permissions and Multipart upload API and permissions in the Amazon S3 User Guide. Directory bucket
 * permissions - To grant access to this API operation on a directory bucket, we recommend that you use the
 * CreateSession API operation for session-based authorization. Specifically, you grant the s3express:CreateSession
 * permission to the directory bucket in a bucket policy or an IAM identity-based policy. Then, you make the
 * CreateSession API call on the bucket to obtain a session token. With the session token in your request header, you
 * can make API requests to this operation. After the session token expires, you make another CreateSession API call to
 * generate a new session token for use. Amazon Web Services CLI or SDKs create session and refresh the session token
 * automatically to avoid service interruptions when a session expires. For more information about authorization, see
 * CreateSession . If the object is encrypted with SSE-KMS, you must also have the kms:GenerateDataKey and kms:Decrypt
 * permissions in IAM identity-based policies and KMS key policies for the KMS key. Data integrity General purpose
 * bucket - To ensure that data is not corrupted traversing the network, specify the Content-MD5 header in the upload
 * part request. Amazon S3 checks the part data against the provided MD5 value. If they do not match, Amazon S3 returns
 * an error. If the upload request is signed with Signature Version 4, then Amazon Web Services S3 uses the
 * x-amz-content-sha256 header as a checksum instead of Content-MD5. For more information see Authenticating Requests:
 * Using the Authorization Header (Amazon Web Services Signature Version 4). Directory buckets - MD5 is not supported by
 * directory buckets. You can use checksum algorithms to check object integrity. Encryption General purpose bucket -
 * Server-side encryption is for data encryption at rest. Amazon S3 encrypts your data as it writes it to disks in its
 * data centers and decrypts it when you access it. You have mutually exclusive options to protect data using
 * server-side encryption in Amazon S3, depending on how you choose to manage the encryption keys. Specifically, the
 * encryption key options are Amazon S3 managed keys (SSE-S3), Amazon Web Services KMS keys (SSE-KMS), and
 * Customer-Provided Keys (SSE-C). Amazon S3 encrypts data with server-side encryption using Amazon S3 managed keys
 * (SSE-S3) by default. You can optionally tell Amazon S3 to encrypt data at rest using server-side encryption with
 * other key options. The option you use depends on whether you want to use KMS keys (SSE-KMS) or provide your own
 * encryption key (SSE-C). Server-side encryption is supported by the S3 Multipart Upload operations. Unless you are
 * using a customer-provided encryption key (SSE-C), you don't need to specify the encryption parameters in each
 * UploadPart request. Instead, you only need to specify the server-side encryption parameters in the initial Initiate
 * Multipart request. For more information, see CreateMultipartUpload. If you have server-side encryption with
 * customer-provided keys (SSE-C) blocked for your general purpose bucket, you will get an HTTP 403 Access Denied error
 * when you specify the SSE-C request headers while writing new data to your bucket. For more information, see Blocking
 * or unblocking SSE-C for a general purpose bucket. If you request server-side encryption using a customer-provided
 * encryption key (SSE-C) in your initiate multipart upload request, you must provide identical encryption information
 * in each part upload using the following request headers. x-amz-server-side-encryption-customer-algorithm
 * x-amz-server-side-encryption-customer-key x-amz-server-side-encryption-customer-key-MD5 For more information, see
 * Using Server-Side Encryption in the Amazon S3 User Guide. Directory buckets - For directory buckets, there are only
 * two supported options for server-side encryption: server-side encryption with Amazon S3 managed keys (SSE-S3)
 * (AES256) and server-side encryption with KMS keys (SSE-KMS) (aws:kms). Special errors Error Code: NoSuchUpload
 * Description: The specified multipart upload does not exist. The upload ID might be invalid, or the multipart upload
 * might have been aborted or completed. HTTP Status Code: 404 Not Found HTTP Host header syntax Directory buckets - The
 * HTTP Host header syntax is Bucket-name.s3express-zone-id.region-code.amazonaws.com. The following operations are
 * related to UploadPart: CreateMultipartUpload CompleteMultipartUpload AbortMultipartUpload ListParts
 * ListMultipartUploads You must URL encode any signed header values that contain spaces. For example, if your header
 * value is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class UploadPartOperation implements OperationInterface
{
    public const NAME = 'UploadPart';
    public const ID = 'com.amazonaws.s3#UploadPart';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = UploadPartRequest::class;
    public const OUTPUT_CLASS = UploadPartOutput::class;
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
            id: 'com.amazonaws.s3#UploadPart',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '/{Key+}?x-id=UploadPart',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'x-id=UploadPart'
                ],
                28 => ['requestAlgorithmMember' => 'ChecksumAlgorithm']
            ],
            traitsById: [
                'aws.protocols#httpChecksum' => ['requestAlgorithmMember' => 'ChecksumAlgorithm']
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return UploadPartRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return UploadPartOutput::schema();
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
        return UploadPartRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return UploadPartOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return null;
    }

    public function getInputStreamMember(): Schema
    {
        return UploadPartRequest::schema()->getMembersByIndex()[4];
    }

    public function getOutputStreamMember(): ?Schema
    {
        return null;
    }
}
