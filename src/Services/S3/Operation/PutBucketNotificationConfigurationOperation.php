<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Operation;

use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\PutBucketNotificationConfigurationRequest;
use Aws\Services\S3\Shape\Unit;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * This operation is not supported for directory buckets. Enables notifications of specified events for a bucket. For
 * more information about event notifications, see Configuring Event Notifications. Using this API, you can replace an
 * existing notification configuration. The configuration is an XML file that defines the event types that you want
 * Amazon S3 to publish and the destination where you want Amazon S3 to publish an event notification when it detects an
 * event of the specified type. By default, your bucket has no event notifications configured. That is, the notification
 * configuration will be an empty NotificationConfiguration. This action replaces the existing notification
 * configuration with the configuration you include in the request body. After Amazon S3 receives this request, it first
 * verifies that any Amazon Simple Notification Service (Amazon SNS) or Amazon Simple Queue Service (Amazon SQS)
 * destination exists, and that the bucket owner has permission to publish to it by sending a test notification. In the
 * case of Lambda destinations, Amazon S3 verifies that the Lambda function permissions grant Amazon S3 permission to
 * invoke the function from the Amazon S3 bucket. For more information, see Configuring Notifications for Amazon S3
 * Events. You can disable notifications by adding the empty NotificationConfiguration element. For more information
 * about the number of event notification configurations that you can create per bucket, see Amazon S3 service quotas in
 * Amazon Web Services General Reference. By default, only the bucket owner can configure notifications on a bucket.
 * However, bucket owners can use a bucket policy to grant permission to other users to set this configuration with the
 * required s3:PutBucketNotification permission. The PUT notification is an atomic operation. For example, suppose your
 * notification configuration includes SNS topic, SQS queue, and Lambda function configurations. When you send a PUT
 * request with this configuration, Amazon S3 sends test messages to your SNS topic. If the message fails, the entire
 * PUT action will fail, and Amazon S3 will not add the configuration to your bucket. If the configuration in the
 * request body includes only one TopicConfiguration specifying only the s3:ReducedRedundancyLostObject event type, the
 * response will also include the x-amz-sns-test-message-id header containing the message ID of the test notification
 * sent to the topic. The following action is related to PutBucketNotificationConfiguration:
 * GetBucketNotificationConfiguration You must URL encode any signed header values that contain spaces. For example, if
 * your header value is my file.txt, containing two spaces after my, you must URL encode this value to my%20%20file.txt.
 */
final class PutBucketNotificationConfigurationOperation implements OperationInterface
{
    public const NAME = 'PutBucketNotificationConfiguration';
    public const ID = 'com.amazonaws.s3#PutBucketNotificationConfiguration';
    public const SERVICE_ID = 'com.amazonaws.s3#AmazonS3';
    public const INPUT_CLASS = PutBucketNotificationConfigurationRequest::class;
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
            id: 'com.amazonaws.s3#PutBucketNotificationConfiguration',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP => [
                    'method' => 'PUT',
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
        return PutBucketNotificationConfigurationRequest::schema();
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
        return PutBucketNotificationConfigurationRequest::fromMembers($members);
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
