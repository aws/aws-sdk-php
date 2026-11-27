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
 * Specifies the configuration and any analyses for the analytics filter of an Amazon S3 bucket.
 */
final class AnalyticsConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#AnalyticsConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ID;
    private static Schema $SCHEMA_STORAGE_CLASS_ANALYSIS;
    private static Schema $SCHEMA_FILTER;

    /**
     * @param ?string $id The ID that identifies the analytics configuration.
     * @param ?StorageClassAnalysis $storageClassAnalysis Contains data related to access patterns to be collected and made
     *        available to analyze the tradeoffs between different storage classes.
     * @param ?AnalyticsFilter $filter The filter used to describe a set of objects for analyses. A filter must have exactly
     *        one prefix, one tag, or one conjunction (AnalyticsAndOperator). If no filter is provided, all objects will be
     *        considered in any analysis.
     */
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?StorageClassAnalysis $storageClassAnalysis = null,
        public readonly ?AnalyticsFilter $filter = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::analyticsConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ID = $m[0];
        self::$SCHEMA_STORAGE_CLASS_ANALYSIS = $m[1];
        self::$SCHEMA_FILTER = $m[2];
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
        if (isset($this->id)) {
            $serializer->serializeString(self::$SCHEMA_ID, $this->id, 0);
        }
        if (isset($this->storageClassAnalysis)) {
            $serializer->serializeStruct(self::$SCHEMA_STORAGE_CLASS_ANALYSIS, $this->storageClassAnalysis, 1);
        }
        if (isset($this->filter)) {
            $serializer->serializeUnion(self::$SCHEMA_FILTER, $this->filter, 2);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->id,
            1 => $this->storageClassAnalysis,
            2 => $this->filter,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->id,
            $this->storageClassAnalysis,
            $this->filter
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
