<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\NotFoundException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\HeadObjectRequest;
use Aws\Services\S3\Output\HeadObjectOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * The HEAD operation retrieves metadata from an object without returning the object itself. This operation is useful if
 * you're interested only in an object's metadata. A HEAD request has the same options as a GET operation on an object.
 * The response is identical to the GET response except that there is no response body. Because of this, if the HEAD
 * request generates an error, it returns a generic code, such as 400 Bad Request, 403 Forbidden, 404 Not Found, 405
 * Method Not Allowed, 412 Precondition Failed, or 304 Not Modified. It's not possible to retrieve the exact exception
 * of these error codes. Request headers are limited to 8 KB in size. For more information, see Common Request Headers.
 * Permissions General purpose bucket permissions - To use HEAD, you must have the s3:GetObject permission. You need the
 * relevant read object (or version) permission for this operation. For more information, see Actions, resources, and
 * condition keys for Amazon S3 in the Amazon S3 User Guide. For more information about the permissions to S3 API
 * operations by S3 resource types, see Required permissions for Amazon S3 API operations in the Amazon S3 User Guide.
 * If the object you request doesn't exist, the error that Amazon S3 returns depends on whether you also have the
 * s3:ListBucket permission. If you have the s3:ListBucket permission on the bucket, Amazon S3 returns an HTTP status
 * code 404 Not Found error. If you don’t have the s3:ListBucket permission, Amazon S3 returns an HTTP status code 403
 * Forbidden error. Directory bucket permissions - To grant access to this API operation on a directory bucket, we
 * recommend that you use the CreateSession API operation for session-based authorization. Specifically, you grant the
 * s3express:CreateSession permission to the directory bucket in a bucket policy or an IAM identity-based policy. Then,
 * you make the CreateSession API call on the bucket to obtain a session token. With the session token in your request
 * header, you can make API requests to this operation. After the session token expires, you make another CreateSession
 * API call to generate a new session token for use. Amazon Web Services CLI or SDKs create session and refresh the
 * session token automatically to avoid service interruptions when a session expires. For more information about
 * authorization, see CreateSession . If you enable x-amz-checksum-mode in the request and the object is encrypted with
 * Amazon Web Services Key Management Service (Amazon Web Services KMS), you must also have the kms:GenerateDataKey and
 * kms:Decrypt permissions in IAM identity-based policies and KMS key policies for the KMS key to retrieve the checksum
 * of the object. Encryption Encryption request headers, like x-amz-server-side-encryption, should not be sent for HEAD
 * requests if your object uses server-side encryption with Key Management Service (KMS) keys (SSE-KMS), dual-layer
 * server-side encryption with Amazon Web Services KMS keys (DSSE-KMS), or server-side encryption with Amazon S3 managed
 * encryption keys (SSE-S3). The x-amz-server-side-encryption header is used when you PUT an object to S3 and want to
 * specify the encryption method. If you include this header in a HEAD request for an object that uses these types of
 * keys, you’ll get an HTTP 400 Bad Request error. It's because the encryption method can't be changed when you
 * retrieve the object. If you encrypt an object by using server-side encryption with customer-provided encryption keys
 * (SSE-C) when you store the object in Amazon S3, then when you retrieve the metadata from the object, you must use the
 * following headers to provide the encryption key for the server to be able to retrieve the object's metadata. The
 * headers are: x-amz-server-side-encryption-customer-algorithm x-amz-server-side-encryption-customer-key
 * x-amz-server-side-encryption-customer-key-MD5 For more information about SSE-C, see Server-Side Encryption (Using
 * Customer-Provided Encryption Keys) in the Amazon S3 User Guide. Directory bucket - For directory buckets, there are
 * only two supported options for server-side encryption: SSE-S3 and SSE-KMS. SSE-C isn't supported. For more
 * information, see Protecting data with server-side encryption in the Amazon S3 User Guide. Versioning If the current
 * version of the object is a delete marker, Amazon S3 behaves as if the object was deleted and includes
 * x-amz-delete-marker: true in the response. If the specified version is a delete marker, the response returns a 405
 * Method Not Allowed error and the Last-Modified: timestamp response header. Directory buckets - Delete marker is not
 * supported for directory buckets. Directory buckets - S3 Versioning isn't enabled and supported for directory buckets.
 * For this API operation, only the null value of the version ID is supported by directory buckets. You can only specify
 * null to the versionId query parameter in the request. HTTP Host header syntax Directory buckets - The HTTP Host
 * header syntax is Bucket-name.s3express-zone-id.region-code.amazonaws.com. For directory buckets, you must make
 * requests for this API operation to the Zonal endpoint. These endpoints support virtual-hosted-style requests in the
 * format https://amzn-s3-demo-bucket.s3express-zone-id.region-code.amazonaws.com/key-name . Path-style requests are not
 * supported. For more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory
 * buckets in Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see
 * Concepts for directory buckets in Local Zones in the Amazon S3 User Guide. The following actions are related to
 * HeadObject: GetObject GetObjectAttributes You must URL encode any signed header values that contain spaces. For
 * example, if your header value is my file.txt, containing two spaces after my, you must URL encode this value to
 * my%20%20file.txt.
 */
final class HeadObjectOperation implements OperationInterface
{
    public const NAME = 'HeadObject';
    public const ID = 'com.amazonaws.s3#HeadObject';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = HeadObjectRequest::class;
    public const OUTPUT_CLASS = HeadObjectOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [
        'com.amazonaws.s3#NotFound' => 'com.amazonaws.s3#NotFound',
        'NotFound' => 'com.amazonaws.s3#NotFound'
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
            id: 'com.amazonaws.s3#HeadObject',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'HEAD',
                    'uri' => '/{Key+}',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 1, true]]
                ],
                Schema::T_WAITABLE => [
                    'ObjectExists' => [
                        'acceptors' => [
                            [
                                'state' => 'success',
                                'matcher' => [
                                    'success' => true
                                ]
                            ],
                            [
                                'state' => 'retry',
                                'matcher' => [
                                    'errorType' => 'NotFound'
                                ]
                            ]
                        ],
                        'minDelay' => 5
                    ],
                    'ObjectNotExists' => [
                        'acceptors' => [
                            [
                                'state' => 'success',
                                'matcher' => [
                                    'errorType' => 'NotFound'
                                ]
                            ]
                        ],
                        'minDelay' => 5
                    ]
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
        return HeadObjectRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return HeadObjectOutput::schema();
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
            NotFoundException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return HeadObjectRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return HeadObjectOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'com.amazonaws.s3#NotFound' => NotFoundException::schema(),
            'NotFound' => NotFoundException::schema(),
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
