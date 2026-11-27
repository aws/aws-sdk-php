<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

/**
 * Specifies the configuration for publishing messages to an Amazon Simple Queue Service (Amazon SQS) queue when Amazon
 * S3 detects specified events.
 */
final class QueueConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#QueueConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_QUEUE_ARN;
    private static Schema $SCHEMA_EVENTS;
    private static Schema $SCHEMA_ID;
    private static Schema $SCHEMA_FILTER;

    /**
     * @param ?string $queueArn The Amazon Resource Name (ARN) of the Amazon SQS queue to which Amazon S3 publishes a
     *        message when it detects events of the specified type.
     * @param list<\Aws\Services\S3\Shape\Event>|null $events
     */
    public function __construct(
        public readonly ?string $queueArn = null,
        public readonly ?array $events = null,
        public readonly ?string $id = null,
        public readonly ?NotificationConfigurationFilter $filter = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::queueConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_QUEUE_ARN = $m[0];
        self::$SCHEMA_EVENTS = $m[1];
        self::$SCHEMA_ID = $m[2];
        self::$SCHEMA_FILTER = $m[3];
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
        if (isset($this->queueArn)) {
            $serializer->serializeString(self::$SCHEMA_QUEUE_ARN, $this->queueArn, 0);
        }
        if (isset($this->events)) {
            $serializer->serializeList(self::$SCHEMA_EVENTS, $this->events, 1);
        }
        if (isset($this->id)) {
            $serializer->serializeString(self::$SCHEMA_ID, $this->id, 2);
        }
        if (isset($this->filter)) {
            $serializer->serializeStruct(self::$SCHEMA_FILTER, $this->filter, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->queueArn,
            1 => $this->events,
            2 => $this->id,
            3 => $this->filter,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->queueArn,
            $this->events,
            $this->id,
            $this->filter
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
