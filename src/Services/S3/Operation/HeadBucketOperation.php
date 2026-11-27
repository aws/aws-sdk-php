<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\NotFoundException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\HeadBucketRequest;
use Aws\Services\S3\Output\HeadBucketOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * You can use this operation to determine if a bucket exists and if you have permission to access it. The action
 * returns a 200 OK HTTP status code if the bucket exists and you have permission to access it. You can make a
 * HeadBucket call on any bucket name to any Region in the partition, and regardless of the permissions on the bucket,
 * you will receive a response header with the correct bucket location so that you can then make a proper, signed
 * request to the appropriate Regional endpoint. If the bucket doesn't exist or you don't have permission to access it,
 * the HEAD request returns a generic 400 Bad Request, 403 Forbidden, or 404 Not Found HTTP status code. A message body
 * isn't included, so you can't determine the exception beyond these HTTP response codes. Authentication and
 * authorization General purpose buckets - Request to public buckets that grant the s3:ListBucket permission publicly do
 * not need to be signed. All other HeadBucket requests must be authenticated and signed by using IAM credentials
 * (access key ID and secret access key for the IAM identities). All headers with the x-amz- prefix, including
 * x-amz-copy-source, must be signed. For more information, see REST Authentication. Directory buckets - You must use
 * IAM credentials to authenticate and authorize your access to the HeadBucket API operation, instead of using the
 * temporary security credentials through the CreateSession API operation. Amazon Web Services CLI or SDKs handles
 * authentication and authorization on your behalf. Permissions General purpose bucket permissions - To use this
 * operation, you must have permissions to perform the s3:ListBucket action. The bucket owner has this permission by
 * default and can grant this permission to others. For more information about permissions, see Managing access
 * permissions to your Amazon S3 resources in the Amazon S3 User Guide. Directory bucket permissions - You must have the
 * s3express:CreateSession permission in the Action element of a policy. If no session mode is specified, the session
 * will be created with the maximum allowable privilege, attempting ReadWrite first, then ReadOnly if ReadWrite is not
 * permitted. If you want to explicitly restrict the access to be read-only, you can set the s3express:SessionMode
 * condition key to ReadOnly on the bucket. For more information about example bucket policies, see Example bucket
 * policies for S3 Express One Zone and Amazon Web Services Identity and Access Management (IAM) identity-based policies
 * for S3 Express One Zone in the Amazon S3 User Guide. HTTP Host header syntax Directory buckets - The HTTP Host header
 * syntax is Bucket-name.s3express-zone-id.region-code.amazonaws.com. You must make requests for this API operation to
 * the Zonal endpoint. These endpoints support virtual-hosted-style requests in the format
 * https://bucket-name.s3express-zone-id.region-code.amazonaws.com. Path-style requests are not supported. For more
 * information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory buckets in
 * Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see Concepts for
 * directory buckets in Local Zones in the Amazon S3 User Guide. You must URL encode any signed header values that
 * contain spaces. For example, if your header value is my file.txt, containing two spaces after my, you must URL encode
 * this value to my%20%20file.txt.
 */
final class HeadBucketOperation implements OperationInterface
{
    public const NAME = 'HeadBucket';
    public const ID = 'com.amazonaws.s3#HeadBucket';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = HeadBucketRequest::class;
    public const OUTPUT_CLASS = HeadBucketOutput::class;
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
            id: 'com.amazonaws.s3#HeadBucket',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'HEAD',
                    'uri' => '',
                    'code' => 200
                ],
                Schema::T_WAITABLE => [
                    'BucketExists' => [
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
                    'BucketNotExists' => [
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
        return HeadBucketRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return HeadBucketOutput::schema();
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
        return HeadBucketRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return HeadBucketOutput::fromMembers($members);
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
