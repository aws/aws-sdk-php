<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutBucketLoggingRequest;
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
 * (Tokyo), Europe (Ireland), and South America (São Paulo). This operation is not supported for directory buckets. Set
 * the logging parameters for a bucket and to specify permissions for who can view and modify the logging parameters.
 * All logs are saved to buckets in the same Amazon Web Services Region as the source bucket. To set the logging status
 * of a bucket, you must be the bucket owner. The bucket owner is automatically granted FULL_CONTROL to all logs. You
 * use the Grantee request element to grant access to other people. The Permissions request element specifies the kind
 * of access the grantee has to the logs. If the target bucket for log delivery uses the bucket owner enforced setting
 * for S3 Object Ownership, you can't use the Grantee request element to grant access to others. Permissions can only be
 * granted using policies. For more information, see Permissions for server access log delivery in the Amazon S3 User
 * Guide. Grantee Values You can specify the person (grantee) to whom you're assigning access rights (by using request
 * elements) in the following ways. For examples of how to specify these grantee values in JSON format, see the Amazon
 * Web Services CLI example in Enabling Amazon S3 server access logging in the Amazon S3 User Guide. By the person's ID:
 * IDGranteesEmail DisplayName is optional and ignored in the request. By Email address: Grantees@email.com The grantee
 * is resolved to the CanonicalUser and, in a response to a GETObjectAcl request, appears as the CanonicalUser. By URI:
 * http://acs.amazonaws.com/groups/global/AuthenticatedUsers To enable logging, you use LoggingEnabled and its children
 * request elements. To disable logging, you use an empty BucketLoggingStatus request element: For more information
 * about server access logging, see Server Access Logging in the Amazon S3 User Guide. For more information about
 * creating a bucket, see CreateBucket. For more information about returning the logging status of a bucket, see
 * GetBucketLogging. The following operations are related to PutBucketLogging: PutObject DeleteBucket CreateBucket
 * GetBucketLogging You must URL encode any signed header values that contain spaces. For example, if your header value
 * is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class PutBucketLoggingOperation implements OperationInterface
{
    public const NAME = 'PutBucketLogging';
    public const ID = 'com.amazonaws.s3#PutBucketLogging';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutBucketLoggingRequest::class;
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
            id: 'com.amazonaws.s3#PutBucketLogging',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '?logging',
                    'code' => 200,
                    'pathQueryString' => 'logging'
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
        return PutBucketLoggingRequest::schema();
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
        return PutBucketLoggingRequest::fromMembers($members);
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
