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
 * Specifies the redirect behavior of all requests to a website endpoint of an Amazon S3 bucket.
 */
final class RedirectAllRequestsTo implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#RedirectAllRequestsTo';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_HOST_NAME;
    private static Schema $SCHEMA_PROTOCOL;

    public readonly ?Protocol $protocol;

    /**
     * @param ?string $hostName Name of the host where requests are redirected.
     * @param ?Protocol $protocol Protocol to use when redirecting requests. The default is the protocol that is used in the
     *        original request.
     */
    public function __construct(
        public readonly ?string $hostName = null,
        Protocol|string|null $protocol = null
    ) {
        $this->protocol = $protocol === null || $protocol instanceof Protocol ? $protocol : Protocol::fromValue($protocol);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::redirectAllRequestsTo();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_HOST_NAME = $m[0];
        self::$SCHEMA_PROTOCOL = $m[1];
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
        if (isset($this->hostName)) {
            $serializer->serializeString(self::$SCHEMA_HOST_NAME, $this->hostName, 0);
        }
        if (isset($this->protocol)) {
            $serializer->serializeString(self::$SCHEMA_PROTOCOL, $this->protocol->value, 1);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->hostName,
            1 => $this->protocol,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->hostName,
            $this->protocol
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
