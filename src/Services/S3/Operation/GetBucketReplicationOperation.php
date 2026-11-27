<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\GetBucketReplicationRequest;
use Aws\Services\S3\Output\GetBucketReplicationOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Returns the replication configuration of a bucket. It can take
 * a while to propagate the put or delete a replication configuration to all Amazon S3 systems. Therefore, a get request
 * soon after put or delete can return a wrong result. For information about replication configuration, see Replication
 * in the Amazon S3 User Guide. This action requires permissions for the s3:GetReplicationConfiguration action. For more
 * information about permissions, see Using Bucket Policies and User Policies. If you include the Filter element in a
 * replication configuration, you must also include the DeleteMarkerReplication and Priority elements. The response also
 * returns those elements. For information about GetBucketReplication errors, see List of replication-related error
 * codes The following operations are related to GetBucketReplication: PutBucketReplication DeleteBucketReplication You
 * must URL encode any signed header values that contain spaces. For example, if your header value is my file.txt,
 * containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class GetBucketReplicationOperation implements OperationInterface
{
    public const NAME = 'GetBucketReplication';
    public const ID = 'com.amazonaws.s3#GetBucketReplication';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = GetBucketReplicationRequest::class;
    public const OUTPUT_CLASS = GetBucketReplicationOutput::class;
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
            id: 'com.amazonaws.s3#GetBucketReplication',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?replication',
                    'code' => 200,
                    'pathQueryString' => 'replication'
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
        return GetBucketReplicationRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return GetBucketReplicationOutput::schema();
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
        return GetBucketReplicationRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return GetBucketReplicationOutput::fromMembers($members);
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
