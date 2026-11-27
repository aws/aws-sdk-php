<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\GetBucketNotificationConfigurationRequest;
use Aws\Services\S3\Output\NotificationConfiguration;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Returns the notification configuration of a bucket. If
 * notifications are not enabled on the bucket, the action returns an empty NotificationConfiguration element. By
 * default, you must be the bucket owner to read the notification configuration of a bucket. However, the bucket owner
 * can use a bucket policy to grant permission to other users to read this configuration with the
 * s3:GetBucketNotification permission. When you use this API operation with an access point, provide the alias of the
 * access point in place of the bucket name. When you use this API operation with an Object Lambda access point, provide
 * the alias of the Object Lambda access point in place of the bucket name. If the Object Lambda access point alias in a
 * request is not valid, the error code InvalidAccessPointAliasError is returned. For more information about
 * InvalidAccessPointAliasError, see List of Error Codes. For more information about setting and reading the
 * notification configuration on a bucket, see Setting Up Notification of Bucket Events. For more information about
 * bucket policies, see Using Bucket Policies. The following action is related to GetBucketNotification:
 * PutBucketNotification You must URL encode any signed header values that contain spaces. For example, if your header
 * value is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class GetBucketNotificationConfigurationOperation implements OperationInterface
{
    public const NAME = 'GetBucketNotificationConfiguration';
    public const ID = 'com.amazonaws.s3#GetBucketNotificationConfiguration';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = GetBucketNotificationConfigurationRequest::class;
    public const OUTPUT_CLASS = NotificationConfiguration::class;
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
            id: 'com.amazonaws.s3#GetBucketNotificationConfiguration',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'GET',
                    'uri' => '?notification',
                    'code' => 200,
                    'pathQueryString' => 'notification'
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
        return GetBucketNotificationConfigurationRequest::schema();
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function outputSchema(): Schema
    {
        return NotificationConfiguration::schema();
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
        return GetBucketNotificationConfigurationRequest::fromMembers($members);
    }

    public function createOutput(array $members): SerializableStructInterface
    {
        return NotificationConfiguration::fromMembers($members);
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
