<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\ListMultipartUploadsRequest;
use Aws\Services\S3\Output\ListMultipartUploadsOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation lists in-progress multipart uploads in a bucket. An in-progress multipart upload is a multipart upload
 * that has been initiated by the CreateMultipartUpload request, but has not yet been completed or aborted. Directory
 * buckets - If multipart uploads in a directory bucket are in progress, you can't delete the bucket until all the
 * in-progress multipart uploads are aborted or completed. To delete these in-progress multipart uploads, use the
 * ListMultipartUploads operation to list the in-progress multipart uploads in the bucket and use the
 * AbortMultipartUpload operation to abort all the in-progress multipart uploads. The ListMultipartUploads operation
 * returns a maximum of 1,000 multipart uploads in the response. The limit of 1,000 multipart uploads is also the
 * default value. You can further limit the number of uploads in a response by specifying the max-uploads request
 * parameter. If there are more than 1,000 multipart uploads that satisfy your ListMultipartUploads request, the
 * response returns an IsTruncated element with the value of true, a NextKeyMarker element, and a NextUploadIdMarker
 * element. To list the remaining multipart uploads, you need to make subsequent ListMultipartUploads requests. In these
 * requests, include two query parameters: key-marker and upload-id-marker. Set the value of key-marker to the
 * NextKeyMarker value from the previous response. Similarly, set the value of upload-id-marker to the
 * NextUploadIdMarker value from the previous response. Directory buckets - The upload-id-marker element and the
 * NextUploadIdMarker element aren't supported by directory buckets. To list the additional multipart uploads, you only
 * need to set the value of key-marker to the NextKeyMarker value from the previous response. For more information about
 * multipart uploads, see Uploading Objects Using Multipart Upload in the Amazon S3 User Guide. Directory buckets - For
 * directory buckets, you must make requests for this API operation to the Zonal endpoint. These endpoints support
 * virtual-hosted-style requests in the format
 * https://amzn-s3-demo-bucket.s3express-zone-id.region-code.amazonaws.com/key-name . Path-style requests are not
 * supported. For more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory
 * buckets in Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see
 * Concepts for directory buckets in Local Zones in the Amazon S3 User Guide. Permissions General purpose bucket
 * permissions - For information about permissions required to use the multipart upload API, see Multipart Upload and
 * Permissions in the Amazon S3 User Guide. Directory bucket permissions - To grant access to this API operation on a
 * directory bucket, we recommend that you use the CreateSession API operation for session-based authorization.
 * Specifically, you grant the s3express:CreateSession permission to the directory bucket in a bucket policy or an IAM
 * identity-based policy. Then, you make the CreateSession API call on the bucket to obtain a session token. With the
 * session token in your request header, you can make API requests to this operation. After the session token expires,
 * you make another CreateSession API call to generate a new session token for use. Amazon Web Services CLI or SDKs
 * create session and refresh the session token automatically to avoid service interruptions when a session expires. For
 * more information about authorization, see CreateSession . Sorting of multipart uploads in response General purpose
 * bucket - In the ListMultipartUploads response, the multipart uploads are sorted based on two criteria: Key-based
 * sorting - Multipart uploads are initially sorted in ascending order based on their object keys. Time-based sorting -
 * For uploads that share the same object key, they are further sorted in ascending order based on the upload initiation
 * time. Among uploads with the same key, the one that was initiated first will appear before the ones that were
 * initiated later. Directory bucket - In the ListMultipartUploads response, the multipart uploads aren't sorted
 * lexicographically based on the object keys. HTTP Host header syntax Directory buckets - The HTTP Host header syntax
 * is Bucket-name.s3express-zone-id.region-code.amazonaws.com. The following operations are related to
 * ListMultipartUploads: CreateMultipartUpload UploadPart CompleteMultipartUpload ListParts AbortMultipartUpload You
 * must URL encode any signed header values that contain spaces. For example, if your header value is my file.txt,
 * containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class ListMultipartUploadsOperation implements OperationInterface
{
    public const NAME = 'ListMultipartUploads';
    public const ID = 'com.amazonaws.s3#ListMultipartUploads';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = ListMultipartUploadsRequest::class;
    public const OUTPUT_CLASS = ListMultipartUploadsOutput::class;
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
            id: 'com.amazonaws.s3#ListMultipartUploads',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?uploads',
                    'code' => 200,
                    'pathQueryString' => 'uploads'
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
        return ListMultipartUploadsRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return ListMultipartUploadsOutput::schema();
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
        return ListMultipartUploadsRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return ListMultipartUploadsOutput::fromMembers($members);
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
