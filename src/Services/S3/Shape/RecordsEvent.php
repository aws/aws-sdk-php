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
 * The container for the records event.
 */
final class RecordsEvent implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#RecordsEvent';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_PAYLOAD;

    /**
     * @param ?string $payload The byte array of partial, one or more result records. S3 Select doesn't guarantee that a
     *        record will be self-contained in one record frame. To ensure continuous streaming of data, S3 Select might
     * split the
     *        same record across multiple record frames instead of aggregating the results in memory. Some S3 clients (for
     * example,
     *        the SDK for Java) handle this behavior by creating a ByteStream out of the response by default. Other clients
     * might
     *        not handle this behavior by default. In those cases, you must aggregate the results on the client side and
     * parse the
     *        response.
     */
    public function __construct(
        public readonly ?string $payload = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::recordsEvent();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_PAYLOAD = $m[0];
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
        if (isset($this->payload)) {
            $serializer->serializeBlob(self::$SCHEMA_PAYLOAD, $this->payload, 0);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->payload,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->payload
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
