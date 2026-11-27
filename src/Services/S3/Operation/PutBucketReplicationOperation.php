<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutBucketReplicationRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Creates a replication configuration or replaces an existing
 * one. For more information, see Replication in the Amazon S3 User Guide. Specify the replication configuration in the
 * request body. In the replication configuration, you provide the name of the destination bucket or buckets where you
 * want Amazon S3 to replicate objects, the IAM role that Amazon S3 can assume to replicate objects on your behalf, and
 * other relevant information. You can invoke this request for a specific Amazon Web Services Region by using the
 * aws:RequestedRegion condition key. A replication configuration must include at least one rule, and can contain a
 * maximum of 1,000. Each rule identifies a subset of objects to replicate by filtering the objects in the source
 * bucket. To choose additional subsets of objects to replicate, add a rule for each subset. To specify a subset of the
 * objects in the source bucket to apply a replication rule to, add the Filter element as a child of the Rule element.
 * You can filter objects based on an object key prefix, one or more object tags, or both. When you add the Filter
 * element in the configuration, you must also add the following elements: DeleteMarkerReplication, Status, and
 * Priority. If you are using an earlier version of the replication configuration, Amazon S3 handles replication of
 * delete markers differently. For more information, see Backward Compatibility. For information about enabling
 * versioning on a bucket, see Using Versioning. Handling Replication of Encrypted Objects By default, Amazon S3 doesn't
 * replicate objects that are stored at rest using server-side encryption with KMS keys. To replicate Amazon Web
 * Services KMS-encrypted objects, add the following: SourceSelectionCriteria, SseKmsEncryptedObjects, Status,
 * EncryptionConfiguration, and ReplicaKmsKeyID. For information about replication configuration, see Replicating
 * Objects Created with SSE Using KMS keys. For information on PutBucketReplication errors, see List of
 * replication-related error codes Permissions To create a PutBucketReplication request, you must have
 * s3:PutReplicationConfiguration permissions for the bucket. By default, a resource owner, in this case the Amazon Web
 * Services account that created the bucket, can perform this operation. The resource owner can also grant others
 * permissions to perform the operation. For more information about permissions, see Specifying Permissions in a Policy
 * and Managing Access Permissions to Your Amazon S3 Resources. To perform this operation, the user or role performing
 * the action must have the iam:PassRole permission. The following operations are related to PutBucketReplication:
 * GetBucketReplication DeleteBucketReplication You must URL encode any signed header values that contain spaces. For
 * example, if your header value is my file.txt, containing two spaces after my, you must URL encode this value to
 * my%20%20file.txt.
 */
final class PutBucketReplicationOperation implements OperationInterface
{
    public const NAME = 'PutBucketReplication';
    public const ID = 'com.amazonaws.s3#PutBucketReplication';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutBucketReplicationRequest::class;
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
            id: 'com.amazonaws.s3#PutBucketReplication',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '?replication',
                    'code' => 200,
                    'pathQueryString' => 'replication'
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
        return PutBucketReplicationRequest::schema();
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
        return PutBucketReplicationRequest::fromMembers($members);
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
