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
 * The journal table record expiration settings for a journal table in an S3 Metadata configuration.
 */
final class RecordExpiration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#RecordExpiration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_EXPIRATION;
    private static Schema $SCHEMA_DAYS;

    public readonly ?ExpirationState $expiration;

    /**
     * @param ?ExpirationState $expiration Specifies whether journal table record expiration is enabled or disabled.
     * @param ?int $days If you enable journal table record expiration, you can set the number of days to retain your
     *        journal table records. Journal table records must be retained for a minimum of 7 days. To set this value,
     * specify any
     *        whole number from 7 to 2147483647. For example, to retain your journal table records for one year, set this
     * value to
     *        365.
     */
    public function __construct(
        ExpirationState|string|null $expiration = null,
        public readonly ?int $days = null
    ) {
        $this->expiration = $expiration === null || $expiration instanceof ExpirationState ? $expiration : ExpirationState::fromValue($expiration);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::recordExpiration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_EXPIRATION = $m[0];
        self::$SCHEMA_DAYS = $m[1];
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
        if (isset($this->expiration)) {
            $serializer->serializeString(self::$SCHEMA_EXPIRATION, $this->expiration->value, 0);
        }
        if (isset($this->days)) {
            $serializer->serializeInteger(self::$SCHEMA_DAYS, $this->days, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->expiration,
            1 => $this->days,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->expiration,
            $this->days
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
