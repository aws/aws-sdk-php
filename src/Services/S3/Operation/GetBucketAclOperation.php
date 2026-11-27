<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\GetBucketAclRequest;
use Aws\Services\S3\Output\GetBucketAclOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. This implementation of the GET action uses the acl subresource
 * to return the access control list (ACL) of a bucket. To use GET to return the ACL of the bucket, you must have the
 * READ_ACP access to the bucket. If READ_ACP permission is granted to the anonymous user, you can return the ACL of the
 * bucket without using an authorization header. When you use this API operation with an access point, provide the alias
 * of the access point in place of the bucket name. When you use this API operation with an Object Lambda access point,
 * provide the alias of the Object Lambda access point in place of the bucket name. If the Object Lambda access point
 * alias in a request is not valid, the error code InvalidAccessPointAliasError is returned. For more information about
 * InvalidAccessPointAliasError, see List of Error Codes. If your bucket uses the bucket owner enforced setting for S3
 * Object Ownership, requests to read ACLs are still supported and return the bucket-owner-full-control ACL with the
 * owner being the account that created the bucket. For more information, see Controlling object ownership and disabling
 * ACLs in the Amazon S3 User Guide. You must URL encode any signed header values that contain spaces. For example, if
 * your header value is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 * The following operations are related to GetBucketAcl: ListObjects
 */
final class GetBucketAclOperation implements OperationInterface
{
    public const NAME = 'GetBucketAcl';
    public const ID = 'com.amazonaws.s3#GetBucketAcl';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = GetBucketAclRequest::class;
    public const OUTPUT_CLASS = GetBucketAclOutput::class;
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
            id: 'com.amazonaws.s3#GetBucketAcl',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?acl',
                    'code' => 200,
                    'pathQueryString' => 'acl'
                ]
            ],
            directTraitsById: [
                'smithy.rules#staticContextParams' => ['UseS3ExpressControlEndpoint' => ['value' => true]]
            ]
        );
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function inputSchema(): Schema
    {
        return GetBucketAclRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return GetBucketAclOutput::schema();
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
        return GetBucketAclRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return GetBucketAclOutput::fromMembers($members);
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
