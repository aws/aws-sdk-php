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
 * Container element that identifies who initiated the multipart upload.
 */
final class Initiator implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Initiator';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ID;
    private static Schema $SCHEMA_DISPLAY_NAME;

    /**
     * @param ?string $iD If the principal is an Amazon Web Services account, it provides the Canonical User ID. If the
     *        principal is an IAM User, it provides a user ARN value. Directory buckets - If the principal is an Amazon Web
     *        Services account, it provides the Amazon Web Services account ID. If the principal is an IAM User, it provides
     * a user
     *        ARN value.
     * @param ?string $displayName This functionality is not supported for directory buckets.
     */
    public function __construct(
        public readonly ?string $iD = null,
        public readonly ?string $displayName = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::initiator();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ID = $m[0];
        self::$SCHEMA_DISPLAY_NAME = $m[1];
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
        if (isset($this->iD)) {
            $serializer->serializeString(self::$SCHEMA_ID, $this->iD, 0);
        }
        if (isset($this->displayName)) {
            $serializer->serializeString(self::$SCHEMA_DISPLAY_NAME, $this->displayName, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->iD,
            1 => $this->displayName,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->iD,
            $this->displayName
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
