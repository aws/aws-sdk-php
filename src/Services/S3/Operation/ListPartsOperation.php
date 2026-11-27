<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\ListPartsRequest;
use Aws\Services\S3\Output\ListPartsOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Lists the parts that have been uploaded for a specific multipart upload. To use this operation, you must provide the
 * upload ID in the request. You obtain this uploadID by sending the initiate multipart upload request through
 * CreateMultipartUpload. The ListParts request returns a maximum of 1,000 uploaded parts. The limit of 1,000 parts is
 * also the default value. You can restrict the number of parts in a response by specifying the max-parts request
 * parameter. If your multipart upload consists of more than 1,000 parts, the response returns an IsTruncated field with
 * the value of true, and a NextPartNumberMarker element. To list remaining uploaded parts, in subsequent ListParts
 * requests, include the part-number-marker query string parameter and set its value to the NextPartNumberMarker field
 * value from the previous response. For more information on multipart uploads, see Uploading Objects Using Multipart
 * Upload in the Amazon S3 User Guide. Directory buckets - For directory buckets, you must make requests for this API
 * operation to the Zonal endpoint. These endpoints support virtual-hosted-style requests in the format
 * https://amzn-s3-demo-bucket.s3express-zone-id.region-code.amazonaws.com/key-name . Path-style requests are not
 * supported. For more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory
 * buckets in Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see
 * Concepts for directory buckets in Local Zones in the Amazon S3 User Guide. Permissions General purpose bucket
 * permissions - For information about permissions required to use the multipart upload API, see Multipart Upload and
 * Permissions in the Amazon S3 User Guide. If the upload was created using server-side encryption with Key Management
 * Service (KMS) keys (SSE-KMS) or dual-layer server-side encryption with Amazon Web Services KMS keys (DSSE-KMS), you
 * must have permission to the kms:Decrypt action for the ListParts request to succeed. Directory bucket permissions -
 * To grant access to this API operation on a directory bucket, we recommend that you use the CreateSession API
 * operation for session-based authorization. Specifically, you grant the s3express:CreateSession permission to the
 * directory bucket in a bucket policy or an IAM identity-based policy. Then, you make the CreateSession API call on the
 * bucket to obtain a session token. With the session token in your request header, you can make API requests to this
 * operation. After the session token expires, you make another CreateSession API call to generate a new session token
 * for use. Amazon Web Services CLI or SDKs create session and refresh the session token automatically to avoid service
 * interruptions when a session expires. For more information about authorization, see CreateSession . HTTP Host header
 * syntax Directory buckets - The HTTP Host header syntax is Bucket-name.s3express-zone-id.region-code.amazonaws.com.
 * The following operations are related to ListParts: CreateMultipartUpload UploadPart CompleteMultipartUpload
 * AbortMultipartUpload GetObjectAttributes ListMultipartUploads You must URL encode any signed header values that
 * contain spaces. For example, if your header value is my file.txt, containing two spaces after my, you must URL encode
 * this value to my%20%20file.txt.
 */
final class ListPartsOperation implements OperationInterface
{
    public const NAME = 'ListParts';
    public const ID = 'com.amazonaws.s3#ListParts';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = ListPartsRequest::class;
    public const OUTPUT_CLASS = ListPartsOutput::class;
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
            id: 'com.amazonaws.s3#ListParts',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '/{Key+}?x-id=ListParts',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'x-id=ListParts'
                ],
                Schema::T_PAGINATED => [
                    'inputToken' => 'PartNumberMarker',
                    'outputToken' => 'NextPartNumberMarker',
                    'items' => 'Parts',
                    'pageSize' => 'MaxParts'
                ]
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return ListPartsRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return ListPartsOutput::schema();
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
        return ListPartsRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return ListPartsOutput::fromMembers($members);
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
