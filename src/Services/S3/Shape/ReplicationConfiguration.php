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
 * A container for replication rules. You can add up to 1,000 rules. The maximum size of a replication configuration is
 * 2 MB.
 */
final class ReplicationConfiguration implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#ReplicationConfiguration';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ROLE;
    private static Schema $SCHEMA_RULES;

    /**
     * @param ?string $role The Amazon Resource Name (ARN) of the Identity and Access Management (IAM) role that Amazon S3
     *        assumes when replicating objects. For more information, see How to Set Up Replication in the Amazon S3 User
     * Guide.
     * @param list<\Aws\Services\S3\Shape\ReplicationRule>|null $rules
     */
    public function __construct(
        public readonly ?string $role = null,
        public readonly ?array $rules = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::replicationConfiguration();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ROLE = $m[0];
        self::$SCHEMA_RULES = $m[1];
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
        if (isset($this->role)) {
            $serializer->serializeString(self::$SCHEMA_ROLE, $this->role, 0);
        }
        if (isset($this->rules)) {
            $serializer->serializeList(self::$SCHEMA_RULES, $this->rules, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->role,
            1 => $this->rules,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->role,
            $this->rules
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
