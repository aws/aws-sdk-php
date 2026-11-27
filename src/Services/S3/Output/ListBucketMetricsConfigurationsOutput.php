<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Output;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\ReadonlyArrayAccessTrait;

/**
 * @implements \ArrayAccess<string, mixed>
 */
final class ListBucketMetricsConfigurationsOutput implements SerializableStructInterface, \ArrayAccess
{
    use ReadonlyArrayAccessTrait;
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ListBucketMetricsConfigurationsOutput';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_IS_TRUNCATED;
    private static Schema $SCHEMA_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_NEXT_CONTINUATION_TOKEN;
    private static Schema $SCHEMA_METRICS_CONFIGURATION_LIST;

    /**
     * @param ?bool $isTruncated Indicates whether the returned list of metrics configurations is complete. A value of true
     *        indicates that the list is not complete and the NextContinuationToken will be provided for a subsequent
     * request.
     * @param ?string $continuationToken The marker that is used as a starting point for this metrics configuration list
     *        response. This value is present if it was sent in the request.
     * @param ?string $nextContinuationToken The marker used to continue a metrics configuration listing that has been
     *        truncated. Use the NextContinuationToken from a previously truncated list response to continue the listing.
     * The
     *        continuation token is an opaque value that Amazon S3 understands.
     * @param list<\Aws\Services\S3\Shape\MetricsConfiguration>|null $metricsConfigurationList
     */
    public function __construct(
        public readonly ?bool $isTruncated = null,
        public readonly ?string $continuationToken = null,
        public readonly ?string $nextContinuationToken = null,
        public readonly ?array $metricsConfigurationList = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::listBucketMetricsConfigurationsOutput();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_IS_TRUNCATED = $m[0];
        self::$SCHEMA_CONTINUATION_TOKEN = $m[1];
        self::$SCHEMA_NEXT_CONTINUATION_TOKEN = $m[2];
        self::$SCHEMA_METRICS_CONFIGURATION_LIST = $m[3];
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
        if (isset($this->isTruncated)) {
            $serializer->serializeBoolean(self::$SCHEMA_IS_TRUNCATED, $this->isTruncated, 0);
        }
        if (isset($this->continuationToken)) {
            $serializer->serializeString(self::$SCHEMA_CONTINUATION_TOKEN, $this->continuationToken, 1);
        }
        if (isset($this->nextContinuationToken)) {
            $serializer->serializeString(self::$SCHEMA_NEXT_CONTINUATION_TOKEN, $this->nextContinuationToken, 2);
        }
        if (isset($this->metricsConfigurationList)) {
            $serializer->serializeList(self::$SCHEMA_METRICS_CONFIGURATION_LIST, $this->metricsConfigurationList, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->isTruncated,
            1 => $this->continuationToken,
            2 => $this->nextContinuationToken,
            3 => $this->metricsConfigurationList,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->isTruncated,
            $this->continuationToken,
            $this->nextContinuationToken,
            $this->metricsConfigurationList
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
