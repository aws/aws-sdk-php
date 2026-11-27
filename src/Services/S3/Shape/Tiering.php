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
 * The S3 Intelligent-Tiering storage class is designed to optimize storage costs by automatically moving data to the
 * most cost-effective storage access tier, without additional operational overhead.
 */
final class Tiering implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Tiering';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DAYS;
    private static Schema $SCHEMA_ACCESS_TIER;

    public readonly ?IntelligentTieringAccessTier $accessTier;

    /**
     * @param ?int $days The number of consecutive days of no access after which an object will be eligible to be
     *        transitioned to the corresponding tier. The minimum number of days specified for Archive Access tier must be
     * at least
     *        90 days and Deep Archive Access tier must be at least 180 days. The maximum can be up to 2 years (730 days).
     * @param ?IntelligentTieringAccessTier $accessTier S3 Intelligent-Tiering access tier. See Storage class for
     *        automatically optimizing frequently and infrequently accessed objects for a list of access tiers in the S3
     *        Intelligent-Tiering storage class.
     */
    public function __construct(
        public readonly ?int $days = null,
        IntelligentTieringAccessTier|string|null $accessTier = null
    ) {
        $this->accessTier = $accessTier === null || $accessTier instanceof IntelligentTieringAccessTier ? $accessTier : IntelligentTieringAccessTier::fromValue($accessTier);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::tiering();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DAYS = $m[0];
        self::$SCHEMA_ACCESS_TIER = $m[1];
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
        if (isset($this->days)) {
            $serializer->serializeInteger(self::$SCHEMA_DAYS, $this->days, 0);
        }
        if (isset($this->accessTier)) {
            $serializer->serializeString(self::$SCHEMA_ACCESS_TIER, $this->accessTier->value, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->days,
            1 => $this->accessTier,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->days,
            $this->accessTier
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
