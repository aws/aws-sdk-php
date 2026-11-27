<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutBucketAclRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * End of support notice: As of October 1, 2025, Amazon S3 has discontinued support for Email Grantee Access Control
 * Lists (ACLs). If you attempt to use an Email Grantee ACL in a request after October 1, 2025, the request will receive
 * an HTTP 405 (Method Not Allowed) error. This change affects the following Amazon Web Services Regions: US East (N.
 * Virginia), US West (N. California), US West (Oregon), Asia Pacific (Singapore), Asia Pacific (Sydney), Asia Pacific
 * (Tokyo), Europe (Ireland), and South America (São Paulo). This operation is not supported for directory buckets.
 * Sets the permissions on an existing bucket using access control lists (ACL). For more information, see Using ACLs. To
 * set the ACL of a bucket, you must have the WRITE_ACP permission. You can use one of the following two ways to set a
 * bucket's permissions: Specify the ACL in the request body Specify permissions using request headers You cannot
 * specify access permission using both the body and the request headers. Depending on your application needs, you may
 * choose to set the ACL on a bucket using either the request body or the headers. For example, if you have an existing
 * application that updates a bucket ACL using the request body, then you can continue to use that approach. If your
 * bucket uses the bucket owner enforced setting for S3 Object Ownership, ACLs are disabled and no longer affect
 * permissions. You must use policies to grant access to your bucket and the objects in it. Requests to set ACLs or
 * update ACLs fail and return the AccessControlListNotSupported error code. Requests to read ACLs are still supported.
 * For more information, see Controlling object ownership in the Amazon S3 User Guide. Permissions You can set access
 * permissions by using one of the following methods: Specify a canned ACL with the x-amz-acl request header. Amazon S3
 * supports a set of predefined ACLs, known as canned ACLs. Each canned ACL has a predefined set of grantees and
 * permissions. Specify the canned ACL name as the value of x-amz-acl. If you use this header, you cannot use other
 * access control-specific headers in your request. For more information, see Canned ACL. Specify access permissions
 * explicitly with the x-amz-grant-read, x-amz-grant-read-acp, x-amz-grant-write-acp, and x-amz-grant-full-control
 * headers. When using these headers, you specify explicit access permissions and grantees (Amazon Web Services accounts
 * or Amazon S3 groups) who will receive the permission. If you use these ACL-specific headers, you cannot use the
 * x-amz-acl header to set a canned ACL. These parameters map to the set of permissions that Amazon S3 supports in an
 * ACL. For more information, see Access Control List (ACL) Overview. You specify each grantee as a type=value pair,
 * where the type is one of the following: id – if the value specified is the canonical user ID of an Amazon Web
 * Services account uri – if you are granting permissions to a predefined group emailAddress – if the value
 * specified is the email address of an Amazon Web Services account Using email addresses to specify a grantee is only
 * supported in the following Amazon Web Services Regions: US East (N. Virginia) US West (N. California) US West
 * (Oregon) Asia Pacific (Singapore) Asia Pacific (Sydney) Asia Pacific (Tokyo) Europe (Ireland) South America (São
 * Paulo) For a list of all the Amazon S3 supported Regions and endpoints, see Regions and Endpoints in the Amazon Web
 * Services General Reference. For example, the following x-amz-grant-write header grants create, overwrite, and delete
 * objects permission to LogDelivery group predefined by Amazon S3 and two Amazon Web Services accounts identified by
 * their email addresses. x-amz-grant-write: uri="http://acs.amazonaws.com/groups/s3/LogDelivery", id="111122223333",
 * id="555566667777" You can use either a canned ACL or specify access permissions explicitly. You cannot do both.
 * Grantee Values You can specify the person (grantee) to whom you're assigning access rights (using request elements)
 * in the following ways. For examples of how to specify these grantee values in JSON format, see the Amazon Web
 * Services CLI example in Enabling Amazon S3 server access logging in the Amazon S3 User Guide. By the person's ID:
 * IDGranteesEmail DisplayName is optional and ignored in the request By URI:
 * http://acs.amazonaws.com/groups/global/AuthenticatedUsers By Email address: Grantees@email.com& The grantee is
 * resolved to the CanonicalUser and, in a response to a GET Object acl request, appears as the CanonicalUser. Using
 * email addresses to specify a grantee is only supported in the following Amazon Web Services Regions: US East (N.
 * Virginia) US West (N. California) US West (Oregon) Asia Pacific (Singapore) Asia Pacific (Sydney) Asia Pacific
 * (Tokyo) Europe (Ireland) South America (São Paulo) For a list of all the Amazon S3 supported Regions and endpoints,
 * see Regions and Endpoints in the Amazon Web Services General Reference. The following operations are related to
 * PutBucketAcl: CreateBucket DeleteBucket GetObjectAcl You must URL encode any signed header values that contain
 * spaces. For example, if your header value is my file.txt, containing two spaces after my, you must URL encode this
 * value to my%20%20file.txt.
 */
final class PutBucketAclOperation implements OperationInterface
{
    public const NAME = 'PutBucketAcl';
    public const ID = 'com.amazonaws.s3#PutBucketAcl';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutBucketAclRequest::class;
    public const OUTPUT_CLASS = Unit::class;
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
            id: 'com.amazonaws.s3#PutBucketAcl',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '?acl',
                    'code' => 200,
                    'pathQueryString' => 'acl'
                ],
                28 => ['requestAlgorithmMember' => 'ChecksumAlgorithm', 'requestChecksumRequired' => true]
            ],
            traitsById: [
                'aws.protocols#httpChecksum' => ['requestAlgorithmMember' => 'ChecksumAlgorithm', 'requestChecksumRequired' => true]
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
        return PutBucketAclRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return Unit::schema();
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
        return PutBucketAclRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return Unit::fromMembers($members);
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
