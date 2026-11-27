<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

/**
 * The established temporary security credentials of the session. Directory buckets - These session credentials are only
 * supported for the authentication and authorization of Zonal endpoint API operations on directory buckets.
 */
final class SessionCredentials implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#SessionCredentials';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_ACCESS_KEY_ID;
    private static Schema $SCHEMA_SECRET_ACCESS_KEY;
    private static Schema $SCHEMA_SESSION_TOKEN;
    private static Schema $SCHEMA_EXPIRATION;

    /**
     * @param ?string $accessKeyId A unique identifier that's associated with a secret access key. The access key ID and the
     *        secret access key are used together to sign programmatic Amazon Web Services requests cryptographically.
     * @param ?string $secretAccessKey A key that's used with the access key ID to cryptographically sign programmatic
     *        Amazon Web Services requests. Signing a request identifies the sender and prevents the request from being
     * altered.
     * @param ?string $sessionToken A part of the temporary security credentials. The session token is used to validate the
     *        temporary security credentials.
     * @param ?float $expiration Temporary security credentials expire after a specified interval. After temporary
     *        credentials expire, any calls that you make with those credentials will fail. So you must generate a new set
     * of
     *        temporary credentials. Temporary credentials cannot be extended or refreshed beyond the original specified
     * interval.
     */
    public function __construct(
        public readonly ?string $accessKeyId = null,
        /** @sensitive */
        public readonly ?string $secretAccessKey = null,
        /** @sensitive */
        public readonly ?string $sessionToken = null,
        public readonly ?float $expiration = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::sessionCredentials();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_ACCESS_KEY_ID = $m[0];
        self::$SCHEMA_SECRET_ACCESS_KEY = $m[1];
        self::$SCHEMA_SESSION_TOKEN = $m[2];
        self::$SCHEMA_EXPIRATION = $m[3];
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
        if (isset($this->accessKeyId)) {
            $serializer->serializeString(self::$SCHEMA_ACCESS_KEY_ID, $this->accessKeyId, 0);
        }
        if (isset($this->secretAccessKey)) {
            $serializer->serializeString(self::$SCHEMA_SECRET_ACCESS_KEY, $this->secretAccessKey, 1);
        }
        if (isset($this->sessionToken)) {
            $serializer->serializeString(self::$SCHEMA_SESSION_TOKEN, $this->sessionToken, 2);
        }
        if (isset($this->expiration)) {
            $serializer->serializeTimestamp(self::$SCHEMA_EXPIRATION, $this->expiration, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->accessKeyId,
            1 => $this->secretAccessKey,
            2 => $this->sessionToken,
            3 => $this->expiration,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->accessKeyId,
            $this->secretAccessKey,
            $this->sessionToken,
            $this->expiration
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
