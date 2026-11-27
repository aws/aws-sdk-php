<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Aws\Services\S3\Shape\EventBridgeConfiguration;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * A container for specifying the notification configuration of the bucket. If this element is empty, notifications are
 * turned off for the bucket.
 *
 * @implements \ArrayAccess<string, mixed>
 */
final class NotificationConfiguration implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#NotificationConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_TOPIC_CONFIGURATIONS;
    private static Schema $SCHEMA_QUEUE_CONFIGURATIONS;
    private static Schema $SCHEMA_LAMBDA_FUNCTION_CONFIGURATIONS;
    private static Schema $SCHEMA_EVENT_BRIDGE_CONFIGURATION;

    /**
     * @param list<\Aws\Services\S3\Shape\TopicConfiguration>|null $topicConfigurations
     * @param list<\Aws\Services\S3\Shape\QueueConfiguration>|null $queueConfigurations
     * @param list<\Aws\Services\S3\Shape\LambdaFunctionConfiguration>|null $lambdaFunctionConfigurations
     * @param ?EventBridgeConfiguration $eventBridgeConfiguration Enables delivery of events to Amazon EventBridge.
     */
    public function __construct(
        public readonly ?array $topicConfigurations = null,
        public readonly ?array $queueConfigurations = null,
        public readonly ?array $lambdaFunctionConfigurations = null,
        public readonly ?EventBridgeConfiguration $eventBridgeConfiguration = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::notificationConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_TOPIC_CONFIGURATIONS = $m[0];
        self::$SCHEMA_QUEUE_CONFIGURATIONS = $m[1];
        self::$SCHEMA_LAMBDA_FUNCTION_CONFIGURATIONS = $m[2];
        self::$SCHEMA_EVENT_BRIDGE_CONFIGURATION = $m[3];
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
        if (isset($this->topicConfigurations)) {
            $serializer->serializeList(self::$SCHEMA_TOPIC_CONFIGURATIONS, $this->topicConfigurations, 0);
        }
        if (isset($this->queueConfigurations)) {
            $serializer->serializeList(self::$SCHEMA_QUEUE_CONFIGURATIONS, $this->queueConfigurations, 1);
        }
        if (isset($this->lambdaFunctionConfigurations)) {
            $serializer->serializeList(self::$SCHEMA_LAMBDA_FUNCTION_CONFIGURATIONS, $this->lambdaFunctionConfigurations, 2);
        }
        if (isset($this->eventBridgeConfiguration)) {
            $serializer->serializeStruct(self::$SCHEMA_EVENT_BRIDGE_CONFIGURATION, $this->eventBridgeConfiguration, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->topicConfigurations,
            1 => $this->queueConfigurations,
            2 => $this->lambdaFunctionConfigurations,
            3 => $this->eventBridgeConfiguration,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->topicConfigurations,
            $this->queueConfigurations,
            $this->lambdaFunctionConfigurations,
            $this->eventBridgeConfiguration
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
