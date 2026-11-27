<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\NoSuchBucketException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\ListObjectsV2Request;
use Aws\Services\S3\Output\ListObjectsV2Output;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Returns some or all (up to 1,000) of the objects in a bucket with each request. You can use the request parameters as
 * selection criteria to return a subset of the objects in a bucket. A 200 OK response can contain valid or invalid XML.
 * Make sure to design your application to parse the contents of the response and handle it appropriately. For more
 * information about listing objects, see Listing object keys programmatically in the Amazon S3 User Guide. To get a
 * list of your buckets, see ListBuckets. General purpose bucket - For general purpose buckets, ListObjectsV2 doesn't
 * return prefixes that are related only to in-progress multipart uploads. Directory buckets - For directory buckets,
 * ListObjectsV2 response includes the prefixes that are related only to in-progress multipart uploads. Directory
 * buckets - For directory buckets, you must make requests for this API operation to the Zonal endpoint. These endpoints
 * support virtual-hosted-style requests in the format
 * https://amzn-s3-demo-bucket.s3express-zone-id.region-code.amazonaws.com/key-name . Path-style requests are not
 * supported. For more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory
 * buckets in Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see
 * Concepts for directory buckets in Local Zones in the Amazon S3 User Guide. Permissions General purpose bucket
 * permissions - To use this operation, you must have READ access to the bucket. You must have permission to perform the
 * s3:ListBucket action. The bucket owner has this permission by default and can grant this permission to others. For
 * more information about permissions, see Permissions Related to Bucket Subresource Operations and Managing Access
 * Permissions to Your Amazon S3 Resources in the Amazon S3 User Guide. Directory bucket permissions - To grant access
 * to this API operation on a directory bucket, we recommend that you use the CreateSession API operation for
 * session-based authorization. Specifically, you grant the s3express:CreateSession permission to the directory bucket
 * in a bucket policy or an IAM identity-based policy. Then, you make the CreateSession API call on the bucket to obtain
 * a session token. With the session token in your request header, you can make API requests to this operation. After
 * the session token expires, you make another CreateSession API call to generate a new session token for use. Amazon
 * Web Services CLI or SDKs create session and refresh the session token automatically to avoid service interruptions
 * when a session expires. For more information about authorization, see CreateSession . Sorting order of returned
 * objects General purpose bucket - For general purpose buckets, ListObjectsV2 returns objects in lexicographical order
 * based on their key names. Directory bucket - For directory buckets, ListObjectsV2 does not return objects in
 * lexicographical order. HTTP Host header syntax Directory buckets - The HTTP Host header syntax is
 * Bucket-name.s3express-zone-id.region-code.amazonaws.com. This section describes the latest revision of this action.
 * We recommend that you use this revised API operation for application development. For backward compatibility, Amazon
 * S3 continues to support the prior version of this API operation, ListObjects. The following operations are related to
 * ListObjectsV2: GetObject PutObject CreateBucket You must URL encode any signed header values that contain spaces. For
 * example, if your header value is my file.txt, containing two spaces after my, you must URL encode this value to
 * my%20%20file.txt.
 */
final class ListObjectsV2Operation implements OperationInterface
{
    public const NAME = 'ListObjectsV2';
    public const ID = 'com.amazonaws.s3#ListObjectsV2';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = ListObjectsV2Request::class;
    public const OUTPUT_CLASS = ListObjectsV2Output::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [
        'com.amazonaws.s3#NoSuchBucket' => 'com.amazonaws.s3#NoSuchBucket',
        'NoSuchBucket' => 'com.amazonaws.s3#NoSuchBucket'
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
            id: 'com.amazonaws.s3#ListObjectsV2',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?list-type=2',
                    'code' => 200,
                    'pathQueryString' => 'list-type=2'
                ],
                Schema::T_PAGINATED => [
                    'inputToken' => 'ContinuationToken',
                    'outputToken' => 'NextContinuationToken',
                    'pageSize' => 'MaxKeys'
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
        return ListObjectsV2Request::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return ListObjectsV2Output::schema();
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
            NoSuchBucketException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return ListObjectsV2Request::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return ListObjectsV2Output::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'com.amazonaws.s3#NoSuchBucket' => NoSuchBucketException::schema(),
            'NoSuchBucket' => NoSuchBucketException::schema(),
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
