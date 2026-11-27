<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\GetBucketLifecycleConfigurationRequest;
use Aws\Services\S3\Output\GetBucketLifecycleConfigurationOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Returns the lifecycle configuration information set on the bucket. For information about lifecycle configuration, see
 * Object Lifecycle Management. Bucket lifecycle configuration now supports specifying a lifecycle rule using an object
 * key name prefix, one or more object tags, object size, or any combination of these. Accordingly, this section
 * describes the latest API, which is compatible with the new functionality. The previous version of the API supported
 * filtering based only on an object key name prefix, which is supported for general purpose buckets for backward
 * compatibility. For the related API description, see GetBucketLifecycle. Lifecyle configurations for directory buckets
 * only support expiring objects and cancelling multipart uploads. Expiring of versioned objects, transitions and tag
 * filters are not supported. Permissions General purpose bucket permissions - By default, all Amazon S3 resources are
 * private, including buckets, objects, and related subresources (for example, lifecycle configuration and website
 * configuration). Only the resource owner (that is, the Amazon Web Services account that created it) can access the
 * resource. The resource owner can optionally grant access permissions to others by writing an access policy. For this
 * operation, a user must have the s3:GetLifecycleConfiguration permission. For more information about permissions, see
 * Managing Access Permissions to Your Amazon S3 Resources. Directory bucket permissions - You must have the
 * s3express:GetLifecycleConfiguration permission in an IAM identity-based policy to use this operation. Cross-account
 * access to this API operation isn't supported. The resource owner can optionally grant access permissions to others by
 * creating a role or user for them as long as they are within the same account as the owner and resource. For more
 * information about directory bucket policies and permissions, see Authorizing Regional endpoint APIs with IAM in the
 * Amazon S3 User Guide. Directory buckets - For directory buckets, you must make requests for this API operation to the
 * Regional endpoint. These endpoints support path-style requests in the format
 * https://s3express-control.region-code.amazonaws.com/bucket-name . Virtual-hosted-style requests aren't supported. For
 * more information about endpoints in Availability Zones, see Regional and Zonal endpoints for directory buckets in
 * Availability Zones in the Amazon S3 User Guide. For more information about endpoints in Local Zones, see Concepts for
 * directory buckets in Local Zones in the Amazon S3 User Guide. HTTP Host header syntax Directory buckets - The HTTP
 * Host header syntax is s3express-control.region.amazonaws.com. GetBucketLifecycleConfiguration has the following
 * special error: Error code: NoSuchLifecycleConfiguration Description: The lifecycle configuration does not exist. HTTP
 * Status Code: 404 Not Found The following operations are related to GetBucketLifecycleConfiguration:
 * GetBucketLifecycle PutBucketLifecycle DeleteBucketLifecycle You must URL encode any signed header values that contain
 * spaces. For example, if your header value is my file.txt, containing two spaces after my, you must URL encode this
 * value to my%20%20file.txt.
 */
final class GetBucketLifecycleConfigurationOperation implements OperationInterface
{
    public const NAME = 'GetBucketLifecycleConfiguration';
    public const ID = 'com.amazonaws.s3#GetBucketLifecycleConfiguration';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = GetBucketLifecycleConfigurationRequest::class;
    public const OUTPUT_CLASS = GetBucketLifecycleConfigurationOutput::class;
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
            id: 'com.amazonaws.s3#GetBucketLifecycleConfiguration',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?lifecycle',
                    'code' => 200,
                    'pathQueryString' => 'lifecycle'
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
        return GetBucketLifecycleConfigurationRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return GetBucketLifecycleConfigurationOutput::schema();
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
        return GetBucketLifecycleConfigurationRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return GetBucketLifecycleConfigurationOutput::fromMembers($members);
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
