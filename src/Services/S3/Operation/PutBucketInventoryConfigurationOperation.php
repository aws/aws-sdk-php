<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutBucketInventoryConfigurationRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This implementation of the PUT action adds an S3 Inventory configuration (identified by the inventory ID) to the
 * bucket. You can have up to 1,000 inventory configurations per bucket. Amazon S3 inventory generates inventories of
 * the objects in the bucket on a daily or weekly basis, and the results are published to a flat file. The bucket that
 * is inventoried is called the source bucket, and the bucket where the inventory flat file is stored is called the
 * destination bucket. The destination bucket must be in the same Amazon Web Services Region as the source bucket. When
 * you configure an inventory for a source bucket, you specify the destination bucket where you want the inventory to be
 * stored, and whether to generate the inventory daily or weekly. You can also configure what object metadata to include
 * and whether to inventory all object versions or only current versions. For more information, see Amazon S3 Inventory
 * in the Amazon S3 User Guide. You must create a bucket policy on the destination bucket to grant permissions to Amazon
 * S3 to write objects to the bucket in the defined location. For an example policy, see Granting Permissions for Amazon
 * S3 Inventory and Storage Class Analysis. Directory buckets - For directory buckets, you must make requests for this
 * API operation to the Regional endpoint. These endpoints support path-style requests in the format
 * https://s3express-control.region-code.amazonaws.com/bucket-name . Virtual-hosted-style requests aren't supported. For
 * more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory buckets in
 * Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see Concepts for
 * directory buckets in Local Zones in the Amazon S3 User Guide. Permissions To use this operation, you must have
 * permission to perform the s3:PutInventoryConfiguration action. The bucket owner has this permission by default and
 * can grant this permission to others. The s3:PutInventoryConfiguration permission allows a user to create an S3
 * Inventory report that includes all object metadata fields available and to specify the destination bucket to store
 * the inventory. A user with read access to objects in the destination bucket can also access all object metadata
 * fields that are available in the inventory report. General purpose bucket permissions - The
 * s3:PutInventoryConfiguration permission is required in a policy. For more information about general purpose buckets
 * permissions, see Using Bucket Policies and User Policies in the Amazon S3 User Guide. Directory bucket permissions -
 * To grant access to this API operation, you must have the s3express:PutInventoryConfiguration permission in an IAM
 * identity-based policy instead of a bucket policy. For more information about directory bucket policies and
 * permissions, see Amazon Web Services Identity and Access Management (IAM) for S3 Express One Zone in the Amazon S3
 * User Guide. To restrict access to an inventory report, see Restricting access to an Amazon S3 Inventory report in the
 * Amazon S3 User Guide. For more information about the metadata fields available in S3 Inventory, see Amazon S3
 * Inventory lists in the Amazon S3 User Guide. For more information about permissions, see Permissions related to
 * bucket subresource operations and Identity and access management in Amazon S3 in the Amazon S3 User Guide. HTTP Host
 * header syntax Directory buckets - The HTTP Host header syntax is s3express-control.region-code.amazonaws.com.
 * PutBucketInventoryConfiguration has the following special errors: HTTP 400 Bad Request Error Code: InvalidArgument
 * Cause: Invalid Argument HTTP 400 Bad Request Error Code: TooManyConfigurations Cause: You are attempting to create a
 * new configuration but have already reached the 1,000-configuration limit. HTTP 403 Forbidden Error Cause: You are not
 * the owner of the specified bucket, or you do not have the s3:PutInventoryConfiguration bucket permission to set the
 * configuration on the bucket. The following operations are related to PutBucketInventoryConfiguration:
 * GetBucketInventoryConfiguration DeleteBucketInventoryConfiguration ListBucketInventoryConfigurations You must URL
 * encode any signed header values that contain spaces. For example, if your header value is my file.txt, containing two
 * spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class PutBucketInventoryConfigurationOperation implements OperationInterface
{
    public const NAME = 'PutBucketInventoryConfiguration';
    public const ID = 'com.amazonaws.s3#PutBucketInventoryConfiguration';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutBucketInventoryConfigurationRequest::class;
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
            id: 'com.amazonaws.s3#PutBucketInventoryConfiguration',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
                    'uri' => '?inventory',
                    'code' => 200,
                    'pathQueryString' => 'inventory'
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
        return PutBucketInventoryConfigurationRequest::schema();
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
        return PutBucketInventoryConfigurationRequest::fromMembers($members);
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
