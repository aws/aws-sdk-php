<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\NoSuchKeyException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\GetObjectAclRequest;
use Aws\Services\S3\Output\GetObjectAclOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Returns the access control list (ACL) of an object. To use
 * this operation, you must have s3:GetObjectAcl permissions or READ_ACP access to the object. For more information, see
 * Mapping of ACL permissions and access policy permissions in the Amazon S3 User Guide This functionality is not
 * supported for Amazon S3 on Outposts. By default, GET returns ACL information about the current version of an object.
 * To return ACL information about a different version, use the versionId subresource. If your bucket uses the bucket
 * owner enforced setting for S3 Object Ownership, requests to read ACLs are still supported and return the
 * bucket-owner-full-control ACL with the owner being the account that created the bucket. For more information, see
 * Controlling object ownership and disabling ACLs in the Amazon S3 User Guide. The following operations are related to
 * GetObjectAcl: GetObject GetObjectAttributes DeleteObject PutObject You must URL encode any signed header values that
 * contain spaces. For example, if your header value is my file.txt, containing two spaces after my, you must URL encode
 * this value to my%20%20file.txt.
 */
final class GetObjectAclOperation implements OperationInterface
{
    public const NAME = 'GetObjectAcl';
    public const ID = 'com.amazonaws.s3#GetObjectAcl';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = GetObjectAclRequest::class;
    public const OUTPUT_CLASS = GetObjectAclOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [
        'com.amazonaws.s3#NoSuchKey' => 'com.amazonaws.s3#NoSuchKey',
        'NoSuchKey' => 'com.amazonaws.s3#NoSuchKey'
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
            id: 'com.amazonaws.s3#GetObjectAcl',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '/{Key+}?acl',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'acl'
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
        return GetObjectAclRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return GetObjectAclOutput::schema();
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
            NoSuchKeyException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return GetObjectAclRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return GetObjectAclOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'com.amazonaws.s3#NoSuchKey' => NoSuchKeyException::schema(),
            'NoSuchKey' => NoSuchKeyException::schema(),
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
