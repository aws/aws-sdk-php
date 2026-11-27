<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\DeleteObjectsRequest;
use Aws\Services\S3\Output\DeleteObjectsOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation enables you to delete multiple objects from a bucket using a single HTTP request. If you know the
 * object keys that you want to delete, then this operation provides a suitable alternative to sending individual delete
 * requests, reducing per-request overhead. The request can contain a list of up to 1,000 keys that you want to delete.
 * In the XML, you provide the object key names, and optionally, version IDs if you want to delete a specific version of
 * the object from a versioning-enabled bucket. For each key, Amazon S3 performs a delete operation and returns the
 * result of that delete, success or failure, in the response. If the object specified in the request isn't found,
 * Amazon S3 confirms the deletion by returning the result as deleted. Directory buckets - S3 Versioning isn't enabled
 * and supported for directory buckets. Directory buckets - For directory buckets, you must make requests for this API
 * operation to the Zonal endpoint. These endpoints support virtual-hosted-style requests in the format
 * https://amzn-s3-demo-bucket.s3express-zone-id.region-code.amazonaws.com/key-name . Path-style requests are not
 * supported. For more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory
 * buckets in Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see
 * Concepts for directory buckets in Local Zones in the Amazon S3 User Guide. The operation supports two modes for the
 * response: verbose and quiet. By default, the operation uses verbose mode in which the response includes the result of
 * deletion of each key in your request. In quiet mode the response includes only keys where the delete operation
 * encountered an error. For a successful deletion in a quiet mode, the operation does not return any information about
 * the delete in the response body. When performing this action on an MFA Delete enabled bucket, that attempts to delete
 * any versioned objects, you must include an MFA token. If you do not provide one, the entire request will fail, even
 * if there are non-versioned objects you are trying to delete. If you provide an invalid token, whether there are
 * versioned keys in the request or not, the entire Multi-Object Delete request will fail. For information about MFA
 * Delete, see MFA Delete in the Amazon S3 User Guide. Directory buckets - MFA delete is not supported by directory
 * buckets. Permissions General purpose bucket permissions - The following permissions are required in your policies
 * when your DeleteObjects request includes specific headers. s3:DeleteObject - To delete an object from a bucket, you
 * must always specify the s3:DeleteObject permission. s3:DeleteObjectVersion - To delete a specific version of an
 * object from a versioning-enabled bucket, you must specify the s3:DeleteObjectVersion permission. If the
 * s3:DeleteObject or s3:DeleteObjectVersion permissions are explicitly denied in your bucket policy, attempts to delete
 * any unversioned objects result in a 403 Access Denied error. Directory bucket permissions - To grant access to this
 * API operation on a directory bucket, we recommend that you use the CreateSession API operation for session-based
 * authorization. Specifically, you grant the s3express:CreateSession permission to the directory bucket in a bucket
 * policy or an IAM identity-based policy. Then, you make the CreateSession API call on the bucket to obtain a session
 * token. With the session token in your request header, you can make API requests to this operation. After the session
 * token expires, you make another CreateSession API call to generate a new session token for use. Amazon Web Services
 * CLI or SDKs create session and refresh the session token automatically to avoid service interruptions when a session
 * expires. For more information about authorization, see CreateSession . Content-MD5 request header General purpose
 * bucket - The Content-MD5 request header is required for all Multi-Object Delete requests. Amazon S3 uses the header
 * value to ensure that your request body has not been altered in transit. Directory bucket - The Content-MD5 request
 * header or a additional checksum request header (including x-amz-checksum-crc32, x-amz-checksum-crc32c,
 * x-amz-checksum-sha1, or x-amz-checksum-sha256) is required for all Multi-Object Delete requests. HTTP Host header
 * syntax Directory buckets - The HTTP Host header syntax is Bucket-name.s3express-zone-id.region-code.amazonaws.com.
 * The following operations are related to DeleteObjects: CreateMultipartUpload UploadPart CompleteMultipartUpload
 * ListParts AbortMultipartUpload You must URL encode any signed header values that contain spaces. For example, if your
 * header value is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class DeleteObjectsOperation implements OperationInterface
{
    public const NAME = 'DeleteObjects';
    public const ID = 'com.amazonaws.s3#DeleteObjects';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = DeleteObjectsRequest::class;
    public const OUTPUT_CLASS = DeleteObjectsOutput::class;
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
            id: 'com.amazonaws.s3#DeleteObjects',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'POST',
                    'uri' => '?delete',
                    'code' => 200,
                    'pathQueryString' => 'delete'
                ],
                28 => ['requestAlgorithmMember' => 'ChecksumAlgorithm', 'requestChecksumRequired' => true]
            ],
            traitsById: [
                'aws.protocols#httpChecksum' => ['requestAlgorithmMember' => 'ChecksumAlgorithm', 'requestChecksumRequired' => true]
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return DeleteObjectsRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return DeleteObjectsOutput::schema();
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
        return DeleteObjectsRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return DeleteObjectsOutput::fromMembers($members);
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
