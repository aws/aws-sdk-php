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
 * Contains information about where to publish the analytics results.
 */
final class AnalyticsS3BucketDestination implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#AnalyticsS3BucketDestination';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_FORMAT;
    private static Schema $SCHEMA_BUCKET;
    private static Schema $SCHEMA_BUCKET_ACCOUNT_ID;
    private static Schema $SCHEMA_PREFIX;

    public readonly ?AnalyticsS3ExportFileFormat $format;

    /**
     * @param ?AnalyticsS3ExportFileFormat $format Specifies the file format used when exporting data to Amazon S3.
     * @param ?string $bucket The Amazon Resource Name (ARN) of the bucket to which data is exported.
     * @param ?string $bucketAccountId The account ID that owns the destination S3 bucket. If no account ID is provided, the
     *        owner is not validated before exporting data. Although this value is optional, we strongly recommend that you
     * set it
     *        to help prevent problems if the destination bucket ownership changes.
     * @param ?string $prefix The prefix to use when exporting data. The prefix is prepended to all results.
     */
    public function __construct(
        AnalyticsS3ExportFileFormat|string|null $format = null,
        public readonly ?string $bucket = null,
        public readonly ?string $bucketAccountId = null,
        public readonly ?string $prefix = null
    ) {
        $this->format = $format === null || $format instanceof AnalyticsS3ExportFileFormat ? $format : AnalyticsS3ExportFileFormat::fromValue($format);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::analyticsS3BucketDestination();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_FORMAT = $m[0];
        self::$SCHEMA_BUCKET = $m[1];
        self::$SCHEMA_BUCKET_ACCOUNT_ID = $m[2];
        self::$SCHEMA_PREFIX = $m[3];
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
        if (isset($this->format)) {
            $serializer->serializeString(self::$SCHEMA_FORMAT, $this->format->value, 0);
        }
        if (isset($this->bucket)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET, $this->bucket, 1);
        }
        if (isset($this->bucketAccountId)) {
            $serializer->serializeString(self::$SCHEMA_BUCKET_ACCOUNT_ID, $this->bucketAccountId, 2);
        }
        if (isset($this->prefix)) {
            $serializer->serializeString(self::$SCHEMA_PREFIX, $this->prefix, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->format,
            1 => $this->bucket,
            2 => $this->bucketAccountId,
            3 => $this->prefix,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->format,
            $this->bucket,
            $this->bucketAccountId,
            $this->prefix
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
