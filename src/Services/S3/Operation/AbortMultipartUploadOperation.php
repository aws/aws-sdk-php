<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\NoSuchUploadException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\AbortMultipartUploadRequest;
use Aws\Services\S3\Output\AbortMultipartUploadOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation aborts a multipart upload. After a multipart upload is aborted, no additional parts can be uploaded
 * using that upload ID. The storage consumed by any previously uploaded parts will be freed. However, if any part
 * uploads are currently in progress, those part uploads might or might not succeed. As a result, it might be necessary
 * to abort a given multipart upload multiple times in order to completely free all storage consumed by all parts. To
 * verify that all parts have been removed and prevent getting charged for the part storage, you should call the
 * ListParts API operation and ensure that the parts list is empty. Directory buckets - If multipart uploads in a
 * directory bucket are in progress, you can't delete the bucket until all the in-progress multipart uploads are aborted
 * or completed. To delete these in-progress multipart uploads, use the ListMultipartUploads operation to list the
 * in-progress multipart uploads in the bucket and use the AbortMultipartUpload operation to abort all the in-progress
 * multipart uploads. Directory buckets - For directory buckets, you must make requests for this API operation to the
 * Zonal endpoint. These endpoints support virtual-hosted-style requests in the format
 * https://amzn-s3-demo-bucket.s3express-zone-id.region-code.amazonaws.com/key-name . Path-style requests are not
 * supported. For more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory
 * buckets in Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see
 * Concepts for directory buckets in Local Zones in the Amazon S3 User Guide. Permissions General purpose bucket
 * permissions - For information about permissions required to use the multipart upload, see Multipart Upload and
 * Permissions in the Amazon S3 User Guide. Directory bucket permissions - To grant access to this API operation on a
 * directory bucket, we recommend that you use the CreateSession API operation for session-based authorization.
 * Specifically, you grant the s3express:CreateSession permission to the directory bucket in a bucket policy or an IAM
 * identity-based policy. Then, you make the CreateSession API call on the bucket to obtain a session token. With the
 * session token in your request header, you can make API requests to this operation. After the session token expires,
 * you make another CreateSession API call to generate a new session token for use. Amazon Web Services CLI or SDKs
 * create session and refresh the session token automatically to avoid service interruptions when a session expires. For
 * more information about authorization, see CreateSession . HTTP Host header syntax Directory buckets - The HTTP Host
 * header syntax is Bucket-name.s3express-zone-id.region-code.amazonaws.com. The following operations are related to
 * AbortMultipartUpload: CreateMultipartUpload UploadPart CompleteMultipartUpload ListParts ListMultipartUploads You
 * must URL encode any signed header values that contain spaces. For example, if your header value is my file.txt,
 * containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class AbortMultipartUploadOperation implements OperationInterface
{
    public const NAME = 'AbortMultipartUpload';
    public const ID = 'com.amazonaws.s3#AbortMultipartUpload';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = AbortMultipartUploadRequest::class;
    public const OUTPUT_CLASS = AbortMultipartUploadOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [
        'com.amazonaws.s3#NoSuchUpload' => 'com.amazonaws.s3#NoSuchUpload',
        'NoSuchUpload' => 'com.amazonaws.s3#NoSuchUpload'
    ];

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
            id: 'com.amazonaws.s3#AbortMultipartUpload',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'DELETE',
                    'uri' => '/{Key+}?x-id=AbortMultipartUpload',
                    'code' => 204,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'x-id=AbortMultipartUpload'
                ],
                Schema::T_ERRORS => self::ERRORS
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return AbortMultipartUploadRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return AbortMultipartUploadOutput::schema();
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
        return [
            NoSuchUploadException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return AbortMultipartUploadRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return AbortMultipartUploadOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'com.amazonaws.s3#NoSuchUpload' => NoSuchUploadException::schema(),
            'NoSuchUpload' => NoSuchUploadException::schema(),
            default => null
        };
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
