<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\NoSuchBucketException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\CreateSessionRequest;
use Aws\Services\S3\Output\CreateSessionOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Creates a session that establishes temporary security credentials to support fast authentication and authorization
 * for the Zonal endpoint API operations on directory buckets. For more information about Zonal endpoint API operations
 * that include the Availability Zone in the request endpoint, see S3 Express One Zone APIs in the Amazon S3 User Guide.
 * To make Zonal endpoint API requests on a directory bucket, use the CreateSession API operation. Specifically, you
 * grant s3express:CreateSession permission to a bucket in a bucket policy or an IAM identity-based policy. Then, you
 * use IAM credentials to make the CreateSession API request on the bucket, which returns temporary security credentials
 * that include the access key ID, secret access key, session token, and expiration. These credentials have associated
 * permissions to access the Zonal endpoint API operations. After the session is created, you don’t need to use other
 * policies to grant permissions to each Zonal endpoint API individually. Instead, in your Zonal endpoint API requests,
 * you sign your requests by applying the temporary security credentials of the session to the request headers and
 * following the SigV4 protocol for authentication. You also apply the session token to the x-amz-s3session-token
 * request header for authorization. Temporary security credentials are scoped to the bucket and expire after 5 minutes.
 * After the expiration time, any calls that you make with those credentials will fail. You must use IAM credentials
 * again to make a CreateSession API request that generates a new set of temporary credentials for use. Temporary
 * credentials cannot be extended or refreshed beyond the original specified interval. If you use Amazon Web Services
 * SDKs, SDKs handle the session token refreshes automatically to avoid service interruptions when a session expires. We
 * recommend that you use the Amazon Web Services SDKs to initiate and manage requests to the CreateSession API. For
 * more information, see Performance guidelines and design patterns in the Amazon S3 User Guide. You must make requests
 * for this API operation to the Zonal endpoint. These endpoints support virtual-hosted-style requests in the format
 * https://bucket-name.s3express-zone-id.region-code.amazonaws.com. Path-style requests are not supported. For more
 * information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory buckets in
 * Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see Concepts for
 * directory buckets in Local Zones in the Amazon S3 User Guide. CopyObject API operation - Unlike other Zonal endpoint
 * API operations, the CopyObject API operation doesn't use the temporary security credentials returned from the
 * CreateSession API operation for authentication and authorization. For information about authentication and
 * authorization of the CopyObject API operation on directory buckets, see CopyObject. HeadBucket API operation - Unlike
 * other Zonal endpoint API operations, the HeadBucket API operation doesn't use the temporary security credentials
 * returned from the CreateSession API operation for authentication and authorization. For information about
 * authentication and authorization of the HeadBucket API operation on directory buckets, see HeadBucket. Permissions To
 * obtain temporary security credentials, you must create a bucket policy or an IAM identity-based policy that grants
 * s3express:CreateSession permission to the bucket. In a policy, you can have the s3express:SessionMode condition key
 * to control who can create a ReadWrite or ReadOnly session. For more information about ReadWrite or ReadOnly sessions,
 * see x-amz-create-session-mode . For example policies, see Example bucket policies for S3 Express One Zone and Amazon
 * Web Services Identity and Access Management (IAM) identity-based policies for S3 Express One Zone in the Amazon S3
 * User Guide. To grant cross-account access to Zonal endpoint API operations, the bucket policy should also grant both
 * accounts the s3express:CreateSession permission. If you want to encrypt objects with SSE-KMS, you must also have the
 * kms:GenerateDataKey and the kms:Decrypt permissions in IAM identity-based policies and KMS key policies for the
 * target KMS key. Encryption For directory buckets, there are only two supported options for server-side encryption:
 * server-side encryption with Amazon S3 managed keys (SSE-S3) (AES256) and server-side encryption with KMS keys
 * (SSE-KMS) (aws:kms). We recommend that the bucket's default encryption uses the desired encryption configuration and
 * you don't override the bucket default encryption in your CreateSession requests or PUT object requests. Then, new
 * objects are automatically encrypted with the desired encryption settings. For more information, see Protecting data
 * with server-side encryption in the Amazon S3 User Guide. For more information about the encryption overriding
 * behaviors in directory buckets, see Specifying server-side encryption with KMS for new object uploads. For Zonal
 * endpoint (object-level) API operations except CopyObject and UploadPartCopy, you authenticate and authorize requests
 * through CreateSession for low latency. To encrypt new objects in a directory bucket with SSE-KMS, you must specify
 * SSE-KMS as the directory bucket's default encryption configuration with a KMS key (specifically, a customer managed
 * key). Then, when a session is created for Zonal endpoint API operations, new objects are automatically encrypted and
 * decrypted with SSE-KMS and S3 Bucket Keys during the session. Only 1 customer managed key is supported per directory
 * bucket for the lifetime of the bucket. The Amazon Web Services managed key (aws/s3) isn't supported. After you
 * specify SSE-KMS as your bucket's default encryption configuration with a customer managed key, you can't change the
 * customer managed key for the bucket's SSE-KMS configuration. In the Zonal endpoint API calls (except CopyObject and
 * UploadPartCopy) using the REST API, you can't override the values of the encryption settings
 * (x-amz-server-side-encryption, x-amz-server-side-encryption-aws-kms-key-id, x-amz-server-side-encryption-context, and
 * x-amz-server-side-encryption-bucket-key-enabled) from the CreateSession request. You don't need to explicitly specify
 * these encryption settings values in Zonal endpoint API calls, and Amazon S3 will use the encryption settings values
 * from the CreateSession request to protect new objects in the directory bucket. When you use the CLI or the Amazon Web
 * Services SDKs, for CreateSession, the session token refreshes automatically to avoid service interruptions when a
 * session expires. The CLI or the Amazon Web Services SDKs use the bucket's default encryption configuration for the
 * CreateSession request. It's not supported to override the encryption settings values in the CreateSession request.
 * Also, in the Zonal endpoint API calls (except CopyObject and UploadPartCopy), it's not supported to override the
 * values of the encryption settings from the CreateSession request. HTTP Host header syntax Directory buckets - The
 * HTTP Host header syntax is Bucket-name.s3express-zone-id.region-code.amazonaws.com. You must URL encode any signed
 * header values that contain spaces. For example, if your header value is my file.txt, containing two spaces after my,
 * you must URL encode this value to my%20%20file.txt.
 */
final class CreateSessionOperation implements OperationInterface
{
    public const NAME = 'CreateSession';
    public const ID = 'com.amazonaws.s3#CreateSession';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = CreateSessionRequest::class;
    public const OUTPUT_CLASS = CreateSessionOutput::class;
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
            id: 'com.amazonaws.s3#CreateSession',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?session',
                    'code' => 200,
                    'pathQueryString' => 'session'
                ],
                Schema::T_ERRORS => self::ERRORS
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
        return CreateSessionRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return CreateSessionOutput::schema();
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
        return CreateSessionRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return CreateSessionOutput::fromMembers($members);
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
