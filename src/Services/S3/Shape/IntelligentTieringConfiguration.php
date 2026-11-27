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
 * Specifies the S3 Intelligent-Tiering configuration for an Amazon S3 bucket. For information about the S3
 * Intelligent-Tiering storage class, see Storage class for automatically optimizing frequently and infrequently
 * accessed objects.
 */
final class IntelligentTieringConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#IntelligentTieringConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ID;
    private static Schema $SCHEMA_STATUS;
    private static Schema $SCHEMA_TIERINGS;
    private static Schema $SCHEMA_FILTER;

    public readonly ?IntelligentTieringStatus $status;

    /**
     * @param ?string $id The ID used to identify the S3 Intelligent-Tiering configuration.
     * @param ?IntelligentTieringStatus $status Specifies the status of the configuration.
     * @param list<\Aws\Services\S3\Shape\Tiering>|null $tierings
     * @param ?IntelligentTieringFilter $filter Specifies a bucket filter. The configuration only includes objects that meet
     *        the filter's criteria.
     */
    public function __construct(
        public readonly ?string $id = null,
        IntelligentTieringStatus|string|null $status = null,
        public readonly ?array $tierings = null,
        public readonly ?IntelligentTieringFilter $filter = null
    ) {
        $this->status = $status === null || $status instanceof IntelligentTieringStatus ? $status : IntelligentTieringStatus::fromValue($status);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::intelligentTieringConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ID = $m[0];
        self::$SCHEMA_STATUS = $m[1];
        self::$SCHEMA_TIERINGS = $m[2];
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
        if (isset($this->id)) {
            $serializer->serializeString(self::$SCHEMA_ID, $this->id, 0);
        }
        if (isset($this->status)) {
            $serializer->serializeString(self::$SCHEMA_STATUS, $this->status->value, 1);
        }
        if (isset($this->tierings)) {
            $serializer->serializeList(self::$SCHEMA_TIERINGS, $this->tierings, 2);
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
            0 => $this->id,
            1 => $this->status,
            2 => $this->tierings,
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
            $this->id,
            $this->status,
            $this->tierings,
            $this->filter
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
