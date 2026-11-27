<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\BucketAlreadyExistsException;
use Aws\Services\S3\Exception\BucketAlreadyOwnedByYouException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\CreateBucketRequest;
use Aws\Services\S3\Output\CreateBucketOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This action creates an Amazon S3 bucket. To create an Amazon S3 on Outposts bucket, see CreateBucket . Creates a new
 * S3 bucket. To create a bucket, you must set up Amazon S3 and have a valid Amazon Web Services Access Key ID to
 * authenticate requests. Anonymous requests are never allowed to create buckets. By creating the bucket, you become the
 * bucket owner. There are two types of buckets: general purpose buckets and directory buckets. For more information
 * about these bucket types, see Creating, configuring, and working with Amazon S3 buckets in the Amazon S3 User Guide.
 * General purpose buckets exist in a global namespace, which means that each bucket name must be unique across all
 * Amazon Web Services accounts in all the Amazon Web Services Regions within a partition. A partition is a grouping of
 * Regions. Amazon Web Services currently has four partitions: aws (Standard Regions), aws-cn (China Regions),
 * aws-us-gov (Amazon Web Services GovCloud (US)), and aws-eusc (European Sovereign Cloud). When you create a general
 * purpose bucket, you can choose to create a bucket in the shared global namespace or you can choose to create a bucket
 * in your account regional namespace. Your account regional namespace is a subdivision of the global namespace that
 * only your account can create buckets in. For more information on account regional namespaces, see Namespaces for
 * general purpose buckets. General purpose buckets - If you send your CreateBucket request to the s3.amazonaws.com
 * global endpoint, the request goes to the us-east-1 Region. So the signature calculations in Signature Version 4 must
 * use us-east-1 as the Region, even if the location constraint in the request specifies another Region where the bucket
 * is to be created. If you create a bucket in a Region other than US East (N. Virginia), your application must be able
 * to handle 307 redirect. For more information, see Virtual hosting of buckets in the Amazon S3 User Guide. Directory
 * buckets - For directory buckets, you must make requests for this API operation to the Regional endpoint. These
 * endpoints support path-style requests in the format https://s3express-control.region-code.amazonaws.com/bucket-name .
 * Virtual-hosted-style requests aren't supported. For more information about endpoints in Availability Zones, see
 * Regional and Zonal endpoints for directory buckets in Availability Zones in the Amazon S3 User Guide. For more
 * information about endpoints in Local Zones, see Concepts for directory buckets in Local Zones in the Amazon S3 User
 * Guide. Permissions General purpose bucket permissions - In addition to the s3:CreateBucket permission, the following
 * permissions are required in a policy when your CreateBucket request includes specific headers: Access control lists
 * (ACLs) - In your CreateBucket request, if you specify an access control list (ACL) and set it to public-read,
 * public-read-write, authenticated-read, or if you explicitly specify any other custom ACLs, both s3:CreateBucket and
 * s3:PutBucketAcl permissions are required. In your CreateBucket request, if you set the ACL to private, or if you
 * don't specify any ACLs, only the s3:CreateBucket permission is required. Object Lock - In your CreateBucket request,
 * if you set x-amz-bucket-object-lock-enabled to true, the s3:PutBucketObjectLockConfiguration and
 * s3:PutBucketVersioning permissions are required. S3 Object Ownership - If your CreateBucket request includes the
 * x-amz-object-ownership header, then the s3:PutBucketOwnershipControls permission is required. To set an ACL on a
 * bucket as part of a CreateBucket request, you must explicitly set S3 Object Ownership for the bucket to a different
 * value than the default, BucketOwnerEnforced. Additionally, if your desired bucket ACL grants public access, you must
 * first create the bucket (without the bucket ACL) and then explicitly disable Block Public Access on the bucket before
 * using PutBucketAcl to set the ACL. If you try to create a bucket with a public ACL, the request will fail. For the
 * majority of modern use cases in S3, we recommend that you keep all Block Public Access settings enabled and keep ACLs
 * disabled. If you would like to share data with users outside of your account, you can use bucket policies as needed.
 * For more information, see Controlling ownership of objects and disabling ACLs for your bucket and Blocking public
 * access to your Amazon S3 storage in the Amazon S3 User Guide. S3 Block Public Access - If your specific use case
 * requires granting public access to your S3 resources, you can disable Block Public Access. Specifically, you can
 * create a new bucket with Block Public Access enabled, then separately call the DeletePublicAccessBlock API. To use
 * this operation, you must have the s3:PutBucketPublicAccessBlock permission. For more information about S3 Block
 * Public Access, see Blocking public access to your Amazon S3 storage in the Amazon S3 User Guide. Directory bucket
 * permissions - You must have the s3express:CreateBucket permission in an IAM identity-based policy instead of a bucket
 * policy. Cross-account access to this API operation isn't supported. This operation can only be performed by the
 * Amazon Web Services account that owns the resource. For more information about directory bucket policies and
 * permissions, see Amazon Web Services Identity and Access Management (IAM) for S3 Express One Zone in the Amazon S3
 * User Guide. The permissions for ACLs, Object Lock, S3 Object Ownership, and S3 Block Public Access are not supported
 * for directory buckets. For directory buckets, all Block Public Access settings are enabled at the bucket level and S3
 * Object Ownership is set to Bucket owner enforced (ACLs disabled). These settings can't be modified. For more
 * information about permissions for creating and working with directory buckets, see Directory buckets in the Amazon S3
 * User Guide. For more information about supported S3 features for directory buckets, see Features of S3 Express One
 * Zone in the Amazon S3 User Guide. HTTP Host header syntax Directory buckets - The HTTP Host header syntax is
 * s3express-control.region-code.amazonaws.com. The following operations are related to CreateBucket: PutObject
 * DeleteBucket You must URL encode any signed header values that contain spaces. For example, if your header value is
 * my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class CreateBucketOperation implements OperationInterface
{
    public const NAME = 'CreateBucket';
    public const ID = 'com.amazonaws.s3#CreateBucket';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = CreateBucketRequest::class;
    public const OUTPUT_CLASS = CreateBucketOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [
        'com.amazonaws.s3#BucketAlreadyExists' => 'com.amazonaws.s3#BucketAlreadyExists',
        'BucketAlreadyExists' => 'com.amazonaws.s3#BucketAlreadyExists',
        'com.amazonaws.s3#BucketAlreadyOwnedByYou' => 'com.amazonaws.s3#BucketAlreadyOwnedByYou',
        'BucketAlreadyOwnedByYou' => 'com.amazonaws.s3#BucketAlreadyOwnedByYou'
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
            id: 'com.amazonaws.s3#CreateBucket',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '',
                    'code' => 200
                ],
                Schema::T_ERRORS => self::ERRORS
            ],
            directTraitsById: [
                'smithy.rules#staticContextParams' => ['UseS3ExpressControlEndpoint' => ['value' => true], 'DisableAccessPoints' => ['value' => true]]
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return CreateBucketRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return CreateBucketOutput::schema();
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
            BucketAlreadyExistsException::schema(),
            BucketAlreadyOwnedByYouException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return CreateBucketRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return CreateBucketOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'com.amazonaws.s3#BucketAlreadyExists' => BucketAlreadyExistsException::schema(),
            'BucketAlreadyExists' => BucketAlreadyExistsException::schema(),
            'com.amazonaws.s3#BucketAlreadyOwnedByYou' => BucketAlreadyOwnedByYouException::schema(),
            'BucketAlreadyOwnedByYou' => BucketAlreadyOwnedByYouException::schema(),
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
