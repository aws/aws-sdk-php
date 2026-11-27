<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutBucketTaggingRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Sets the tags for a general purpose bucket if attribute based
 * access control (ABAC) is not enabled for the bucket. When you enable ABAC for a general purpose bucket, you can no
 * longer use this operation for that bucket and must use the TagResource or UntagResource operations instead. Use tags
 * to organize your Amazon Web Services bill to reflect your own cost structure. To do this, sign up to get your Amazon
 * Web Services account bill with tag key values included. Then, to see the cost of combined resources, organize your
 * billing information according to resources with the same tag key values. For example, you can tag several resources
 * with a specific application name, and then organize your billing information to see the total cost of that
 * application across several services. For more information, see Cost Allocation and Tagging and Using Cost Allocation
 * in Amazon S3 Bucket Tags. When this operation sets the tags for a bucket, it will overwrite any current tags the
 * bucket already has. You cannot use this operation to add tags to an existing list of tags. To use this operation, you
 * must have permissions to perform the s3:PutBucketTagging action. The bucket owner has this permission by default and
 * can grant this permission to others. For more information about permissions, see Permissions Related to Bucket
 * Subresource Operations and Managing Access Permissions to Your Amazon S3 Resources. PutBucketTagging has the
 * following special errors. For more Amazon S3 errors see, Error Responses. InvalidTag - The tag provided was not a
 * valid tag. This error can occur if the tag did not pass input validation. For more information, see Using Cost
 * Allocation in Amazon S3 Bucket Tags. MalformedXML - The XML provided does not match the schema. OperationAborted - A
 * conflicting conditional action is currently in progress against this resource. Please try again. InternalError - The
 * service was unable to apply the provided tag to the bucket. The following operations are related to PutBucketTagging:
 * GetBucketTagging DeleteBucketTagging You must URL encode any signed header values that contain spaces. For example,
 * if your header value is my file.txt, containing two spaces after my, you must URL encode this value to
 * my%20%20file.txt.
 */
final class PutBucketTaggingOperation implements OperationInterface
{
    public const NAME = 'PutBucketTagging';
    public const ID = 'com.amazonaws.s3#PutBucketTagging';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutBucketTaggingRequest::class;
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
            id: 'com.amazonaws.s3#PutBucketTagging',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '?tagging',
                    'code' => 200,
                    'pathQueryString' => 'tagging'
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
        return PutBucketTaggingRequest::schema();
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
        return PutBucketTaggingRequest::fromMembers($members);
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
