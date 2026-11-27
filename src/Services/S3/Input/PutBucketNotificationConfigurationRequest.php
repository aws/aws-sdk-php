<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Input;

use Aws\Services\S3\Output\NotificationConfiguration;
use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

final class PutBucketNotificationConfigurationRequest implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#PutBucketNotificationConfigurationRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_NOTIFICATION_CONFIGURATION;
    private static Schema $SCHEMA_EXPECTED_BUCKET_OWNER;
    private static Schema $SCHEMA_SKIP_DESTINATION_VALIDATION;

    /**
     * @param ?string $bucket The name of the bucket.
     * @param ?string $expectedBucketOwner The account ID of the expected bucket owner. If the account ID that you provide
     *        does not match the actual owner of the bucket, the request fails with the HTTP status code 403 Forbidden
     * (access
     *        denied).
     * @param ?bool $skipDestinationValidation Skips validation of Amazon SQS, Amazon SNS, and Lambda destinations. True or
     *        false value.
     */
    public function __construct(
        public readonly ?string $bucket = null,
        public readonly ?NotificationConfiguration $notificationConfiguration = null,
        public readonly ?string $expectedBucketOwner = null,
        public readonly ?bool $skipDestinationValidation = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::putBucketNotificationConfigurationRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_BUCKET = $m[0];
        self::$SCHEMA_NOTIFICATION_CONFIGURATION = $m[1];
        self::$SCHEMA_EXPECTED_BUCKET_OWNER = $m[2];
        self::$SCHEMA_SKIP_DESTINATION_VALIDATION = $m[3];
        return self::$SCHEMA = $s;
    }

    /**
     * Get the shape schema for this instance.
     */
    public function getSchema(): Schema
    {
        return self::schema();
    }

    /**
     * Serialize the shape to the desired wire format.
     *
     * @return void
     */
    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeStruct(self::schema(), $this, $idx);
    }

    /**
     * Serialize the shape members to the desired wire format.
     *
     * @return void
     */
    public function serializeMembers(ShapeSerializerInterface $serializer): void
    {
        if (isset($this->bucket)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET, $this->bucket, 0);
        }
        if (isset($this->notificationConfiguration)) {
            $serializer->serializeStruct(self::$SCHEMA_NOTIFICATION_CONFIGURATION, $this->notificationConfiguration, 1);
        }
        if (isset($this->expectedBucketOwner)) {
            $serializer->serializeString(self::$SCHEMA_EXPECTED_BUCKET_OWNER, $this->expectedBucketOwner, 2);
        }
        if (isset($this->skipDestinationValidation)) {
            $serializer->serializeBoolean(self::$SCHEMA_SKIP_DESTINATION_VALIDATION, $this->skipDestinationValidation, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->bucket,
            1 => $this->notificationConfiguration,
            2 => $this->expectedBucketOwner,
            3 => $this->skipDestinationValidation,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->bucket,
            $this->notificationConfiguration,
            $this->expectedBucketOwner,
            $this->skipDestinationValidation
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
