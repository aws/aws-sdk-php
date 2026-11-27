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
 * Describes where logs are stored and the prefix that Amazon S3 assigns to all log object keys for a bucket. For more
 * information, see PUT Bucket logging in the Amazon S3 API Reference.
 */
final class LoggingEnabled implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#LoggingEnabled';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_TARGET_BUCKET;
    private static Schema $SCHEMA_TARGET_PREFIX;
    private static Schema $SCHEMA_TARGET_GRANTS;
    private static Schema $SCHEMA_TARGET_OBJECT_KEY_FORMAT;

    /**
     * @param ?string $targetBucket Specifies the bucket where you want Amazon S3 to store server access logs. You can have
     *        your logs delivered to any bucket that you own, including the same bucket that is being logged. You can also
     *        configure multiple buckets to deliver their logs to the same target bucket. In this case, you should choose a
     *        different TargetPrefix for each source bucket so that the delivered log files can be distinguished by key.
     * @param ?string $targetPrefix A prefix for all log object keys. If you store log files from multiple Amazon S3 buckets
     *        in a single bucket, you can use a prefix to distinguish which log files came from which bucket.
     * @param list<\Aws\Services\S3\Shape\TargetGrant>|null $targetGrants
     * @param ?TargetObjectKeyFormat $targetObjectKeyFormat Amazon S3 key format for log objects.
     */
    public function __construct(
        public readonly ?string $targetBucket = null,
        public readonly ?string $targetPrefix = null,
        public readonly ?array $targetGrants = null,
        public readonly ?TargetObjectKeyFormat $targetObjectKeyFormat = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::loggingEnabled();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_TARGET_BUCKET = $m[0];
        self::$SCHEMA_TARGET_PREFIX = $m[1];
        self::$SCHEMA_TARGET_GRANTS = $m[2];
        self::$SCHEMA_TARGET_OBJECT_KEY_FORMAT = $m[3];
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
        if (isset($this->targetBucket)) {
            $serializer->serializeString(self::$SCHEMA_TARGET_BUCKET, $this->targetBucket, 0);
        }
        if (isset($this->targetPrefix)) {
            $serializer->serializeString(self::$SCHEMA_TARGET_PREFIX, $this->targetPrefix, 1);
        }
        if (isset($this->targetGrants)) {
            $serializer->serializeList(self::$SCHEMA_TARGET_GRANTS, $this->targetGrants, 2);
        }
        if (isset($this->targetObjectKeyFormat)) {
            $serializer->serializeStruct(self::$SCHEMA_TARGET_OBJECT_KEY_FORMAT, $this->targetObjectKeyFormat, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->targetBucket,
            1 => $this->targetPrefix,
            2 => $this->targetGrants,
            3 => $this->targetObjectKeyFormat,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->targetBucket,
            $this->targetPrefix,
            $this->targetGrants,
            $this->targetObjectKeyFormat
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
