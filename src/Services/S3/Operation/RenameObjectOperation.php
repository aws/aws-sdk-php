<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\IdempotencyParameterMismatchException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\RenameObjectRequest;
use Aws\Services\S3\Output\RenameObjectOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Renames an existing object in a directory bucket that uses the S3 Express One Zone storage class. You can use
 * RenameObject by specifying an existing object’s name as the source and the new name of the object as the
 * destination within the same directory bucket. RenameObject is only supported for objects stored in the S3 Express One
 * Zone storage class. To prevent overwriting an object, you can use the If-None-Match conditional header. If-None-Match
 * - Renames the object only if an object with the specified name does not already exist in the directory bucket. If you
 * don't want to overwrite an existing object, you can add the If-None-Match conditional header with the value ‘*’
 * in the RenameObject request. Amazon S3 then returns a 412 Precondition Failed error if the object with the specified
 * name already exists. For more information, see RFC 7232. Permissions To grant access to the RenameObject operation on
 * a directory bucket, we recommend that you use the CreateSession operation for session-based authorization.
 * Specifically, you grant the s3express:CreateSession permission to the directory bucket in a bucket policy or an IAM
 * identity-based policy. Then, you make the CreateSession API call on the directory bucket to obtain a session token.
 * With the session token in your request header, you can make API requests to this operation. After the session token
 * expires, you make another CreateSession API call to generate a new session token for use. The Amazon Web Services CLI
 * and SDKs will create and manage your session including refreshing the session token automatically to avoid service
 * interruptions when a session expires. In your bucket policy, you can specify the s3express:SessionMode condition key
 * to control who can create a ReadWrite or ReadOnly session. A ReadWrite session is required for executing all the
 * Zonal endpoint API operations, including RenameObject. For more information about authorization, see CreateSession .
 * To learn more about Zonal endpoint API operations, see Authorizing Zonal endpoint API operations with CreateSession
 * in the Amazon S3 User Guide. HTTP Host header syntax Directory buckets - The HTTP Host header syntax is
 * Bucket-name.s3express-zone-id.region-code.amazonaws.com. You must URL encode any signed header values that contain
 * spaces. For example, if your header value is my file.txt, containing two spaces after my, you must URL encode this
 * value to my%20%20file.txt.
 */
final class RenameObjectOperation implements OperationInterface
{
    public const NAME = 'RenameObject';
    public const ID = 'com.amazonaws.s3#RenameObject';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = RenameObjectRequest::class;
    public const OUTPUT_CLASS = RenameObjectOutput::class;
    public const AUTH_SCHEMES = [
        'aws.auth#sigv4'
    ];
    public const ERRORS = [
        'com.amazonaws.s3#IdempotencyParameterMismatch' => 'com.amazonaws.s3#IdempotencyParameterMismatch',
        'IdempotencyParameterMismatch' => 'com.amazonaws.s3#IdempotencyParameterMismatch'
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
            id: 'com.amazonaws.s3#RenameObject',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '/{Key+}?renameObject',
                    'code' => 200,
                    'pathSegments' => [['/', null, false], [null, 1, true]],
                    'pathQueryString' => 'renameObject'
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
        return RenameObjectRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return RenameObjectOutput::schema();
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
            IdempotencyParameterMismatchException::schema()
        ];
    }

    public function createInput(array $members): SerializableStructInterface
    {
        return RenameObjectRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return RenameObjectOutput::fromMembers($members);
    }

    public function getRequestTarget(): ?string
    {
        return null;
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        return match ($discriminator) {
            'com.amazonaws.s3#IdempotencyParameterMismatch' => IdempotencyParameterMismatchException::schema(),
            'IdempotencyParameterMismatch' => IdempotencyParameterMismatchException::schema(),
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
