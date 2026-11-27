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
 * Specifies a cross-origin access rule for an Amazon S3 bucket.
 */
final class CORSRule implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#CORSRule';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ALLOWED_METHODS;
    private static Schema $SCHEMA_ALLOWED_ORIGINS;
    private static Schema $SCHEMA_ID;
    private static Schema $SCHEMA_ALLOWED_HEADERS;
    private static Schema $SCHEMA_EXPOSE_HEADERS;
    private static Schema $SCHEMA_MAX_AGE_SECONDS;

    /**
     * @param list<string>|null $allowedMethods
     * @param list<string>|null $allowedOrigins
     * @param ?string $iD Unique identifier for the rule. The value cannot be longer than 255 characters.
     * @param list<string>|null $allowedHeaders
     * @param list<string>|null $exposeHeaders
     * @param ?int $maxAgeSeconds The time in seconds that your browser is to cache the preflight response for the specified
     *        resource.
     */
    public function __construct(
        public readonly ?array $allowedMethods = null,
        public readonly ?array $allowedOrigins = null,
        public readonly ?string $iD = null,
        public readonly ?array $allowedHeaders = null,
        public readonly ?array $exposeHeaders = null,
        public readonly ?int $maxAgeSeconds = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::cORSRule();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ALLOWED_METHODS = $m[0];
        self::$SCHEMA_ALLOWED_ORIGINS = $m[1];
        self::$SCHEMA_ID = $m[2];
        self::$SCHEMA_ALLOWED_HEADERS = $m[3];
        self::$SCHEMA_EXPOSE_HEADERS = $m[4];
        self::$SCHEMA_MAX_AGE_SECONDS = $m[5];
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
        if (isset($this->allowedMethods)) {
            $serializer->serializeList(self::$SCHEMA_ALLOWED_METHODS, $this->allowedMethods, 0);
        }
        if (isset($this->allowedOrigins)) {
            $serializer->serializeList(self::$SCHEMA_ALLOWED_ORIGINS, $this->allowedOrigins, 1);
        }
        if (isset($this->iD)) {
            $serializer->serializeString(self::$SCHEMA_ID, $this->iD, 2);
        }
        if (isset($this->allowedHeaders)) {
            $serializer->serializeList(self::$SCHEMA_ALLOWED_HEADERS, $this->allowedHeaders, 3);
        }
        if (isset($this->exposeHeaders)) {
            $serializer->serializeList(self::$SCHEMA_EXPOSE_HEADERS, $this->exposeHeaders, 4);
        }
        if (isset($this->maxAgeSeconds)) {
            $serializer->serializeInteger(self::$SCHEMA_MAX_AGE_SECONDS, $this->maxAgeSeconds, 5);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->allowedMethods,
            1 => $this->allowedOrigins,
            2 => $this->iD,
            3 => $this->allowedHeaders,
            4 => $this->exposeHeaders,
            5 => $this->maxAgeSeconds,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->allowedMethods,
            $this->allowedOrigins,
            $this->iD,
            $this->allowedHeaders,
            $this->exposeHeaders,
            $this->maxAgeSeconds
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
