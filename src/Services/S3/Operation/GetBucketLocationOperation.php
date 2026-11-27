<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\GetBucketLocationRequest;
use Aws\Services\S3\Output\GetBucketLocationOutput;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Using the GetBucketLocation operation is no longer a best practice. To return the Region that a bucket resides in, we
 * recommend that you use the HeadBucket operation instead. For backward compatibility, Amazon S3 continues to support
 * the GetBucketLocation operation. Returns the Region the bucket resides in. You set the bucket's Region using the
 * LocationConstraint request parameter in a CreateBucket request. For more information, see CreateBucket. In a bucket's
 * home Region, calls to the GetBucketLocation operation are governed by the bucket's policy. In other Regions, the
 * bucket policy doesn't apply, which means that cross-account access won't be authorized. However, calls to the
 * HeadBucket operation always return the bucket’s location through an HTTP response header, whether access to the
 * bucket is authorized or not. Therefore, we recommend using the HeadBucket operation for bucket Region discovery and
 * to avoid using the GetBucketLocation operation. When you use this API operation with an access point, provide the
 * alias of the access point in place of the bucket name. When you use this API operation with an Object Lambda access
 * point, provide the alias of the Object Lambda access point in place of the bucket name. If the Object Lambda access
 * point alias in a request is not valid, the error code InvalidAccessPointAliasError is returned. For more information
 * about InvalidAccessPointAliasError, see List of Error Codes. This operation is not supported for directory buckets.
 * The following operations are related to GetBucketLocation: GetObject CreateBucket You must URL encode any signed
 * header values that contain spaces. For example, if your header value is my file.txt, containing two spaces after my,
 * you must URL encode this value to my%20%20file.txt.
 */
final class GetBucketLocationOperation implements OperationInterface
{
    public const NAME = 'GetBucketLocation';
    public const ID = 'com.amazonaws.s3#GetBucketLocation';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = GetBucketLocationRequest::class;
    public const OUTPUT_CLASS = GetBucketLocationOutput::class;
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
            id: 'com.amazonaws.s3#GetBucketLocation',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?location',
                    'code' => 200,
                    'pathQueryString' => 'location'
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
        return GetBucketLocationRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return GetBucketLocationOutput::schema();
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
        return GetBucketLocationRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return GetBucketLocationOutput::fromMembers($members);
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
